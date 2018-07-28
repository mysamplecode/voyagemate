<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\PasswordResets;
use App\Http\Helpers\Common;
use App\Http\Helpers\FacebookHelper;
use Socialite;
use DateTime;
use Session;

class LoginController extends Controller
{
    protected $helper;
    private $fbh;

    public function __construct(FacebookHelper $fbh)
    {
        $this->helper = new Common;
        $this->fbh = $fbh;
    }

    public function index()
    {   
        $data['facebook_url'] = $this->fbh->getUrlLogin();

        return view('login.view', $data);
    }

    public function authenticate(Request $request)
    {
        $rules = array(
        'email'           => 'required|email|max:200',
        'password'        => 'required'
        );

        $fieldNames = array(
        'email'           => 'Email',
        'password'        => 'Password',
        );

        $remember = ($request->remember_me) ? true : false;

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);

        if ($validator->fails()) 
        {
            return back()->withErrors($validator)->withInput();
        }
        else
        {
            $users = User::where('email', $request->email)->first();
            
            if(@$users->status != 'Inactive')
            {
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
                {
                    return redirect()->intended('dashboard');
                }
                else
                {
                    $this->helper->one_time_message('danger', trans('messages.error.login_info_error'));
                    return redirect('login');
                } 
            }
            else
            {
                $data['title'] = 'Disabled ';
                return view('users.disabled', $data);
            }
        }
    }

    public function signup(Request $request)
    {
        $data['facebook_url'] = $this->fbh->getUrlLogin();

        return view('home.signup_login', $data);
            
    }

    public function forgot_password(Request $request, EmailController $email_controller)
    {
        if(!$_POST){
            return view('login.forgot_password');
        }
        else
        {
            $rules = array(
            'email'           => 'required|email|exists:users,email|max:200'
            );

            $messages = array(
            'required'        => ':attribute is required.',
            'exists'          => 'No account exists for this email.'
            );

            $fieldNames = array(
            'email'           => 'Email'
            );

            $validator = Validator::make($request->all(), $rules, $messages);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $user = User::whereEmail($request->email)->first();

                $email_controller->forgot_password($user);

                $this->helper->one_time_message('success', trans('messages.success.reset_pass_send_success'));
                return redirect('login');
            }
        }
    }

    public function reset_password(Request $request)
    {
        if(!$_POST)
        {
            $password_resets = PasswordResets::whereToken($request->secret);
            
            if($password_resets->count())
            {
                $password_result = $password_resets->first();

                $datetime1 = new DateTime();
                $datetime2 = new DateTime($password_result->created_at);
                $interval  = $datetime1->diff($datetime2);
                $hours     = $interval->format('%h');

                if($hours >= 1)
                {
                    $password_resets->delete();

                    $this->helper->one_time_message('error', trans('messages.error.token_expire_error'));
                    return redirect('login');
                }

                $data['result'] = User::whereEmail($password_result->email)->first();
                $data['token']  = $request->secret;

                return view('login.reset_password', $data);
            }
            else
            {
                $this->helper->one_time_message('error', trans('Invalid Token'));
                return redirect('login');
            }
        }
        else
        {
            $rules = array(
            'password'              => 'required|min:6|max:30',
            'password_confirmation' => 'required|same:password'
            );

            $fieldNames = array(
            'password'              => 'New Password',
            'password_confirmation' => 'Confirm Password'
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $password_resets = PasswordResets::whereToken($request->token)->delete();

                $user = User::find($request->id);
                $user->password = bcrypt($request->password);
                $user->save();

                $this->helper->one_time_message('success', trans('messages.success.pass_change_success'));
                return redirect('login');
            }
        }
    }

    public function facebookAuthenticate(EmailController $email_controller)
    {
        if(!isset($_GET['error'])){
            $this->fbh->generateSessionFromRedirect();

            $response = $this->fbh->getData();

            $userNode = $response->getGraphUser();
            
            $email = ($userNode->getProperty('email') == '') ? $userNode->getId().'@fb.com' : $userNode->getProperty('email');
            
            $user = User::where('email',$email);

            if($user->count() > 0 )
            {
                $user = User::where('email',$email)->first();

                UserDetails::updateOrCreate(
                    ['user_id' => $user->id, 'field' => 'fb_id'],
                    ['value' => $userNode->getId()]
                );

                $user_id = $user->id;
            }
            else
            {
                $user = User::where('email', $email);

                if($user->count() > 0)
                {
                    $data['title'] = 'Disabled ';
                    return view('users.disabled', $data);
                }

                $user = new User;
                $user->first_name   =   $userNode->getFirstName();
                $user->last_name    =   $userNode->getLastName();
                $user->email        =   $email;
                $user->status       =   'Active';
                $user->save();

                $user_details             = new UserDetails;
                $user_details->user_id    = $user->id;
                $user_details->field      = 'fb_id';
                $user_details->value      = $userNode->getId();
                $user_details->save();

                $user_id = $user->id;
                $email_controller->welcome_email($user);
            }

            $users = User::where('id', $user_id)->first();
            
            if(@$users->status != 'Inactive')
            {
                if(Auth::loginUsingId($user_id))
                {
                    return redirect()->intended('dashboard');
                }
                else
                {
                    $this->helper->one_time_message('danger', trans('messages.login.login_failed'));
                    return redirect('login');
                }
            }
            else
            {
                $data['title'] = 'Disabled ';
                return view('users.disabled', $data);
            } 
        }else{
            return redirect('login');
        }
    }

    public function googleLogin()
    {
        return Socialite::with('google')->redirect();
    }

    public function googleAuthenticate(EmailController $email_controller)
    {
        if(!isset($_GET['error'])){
            $userNode = Socialite::with('google')->user();
            $verificationUser = Session::get('verification');
            if($verificationUser == 'yes') {
                return redirect('googleConnect/'.$userNode->getId());  
            }

            $ex_name = explode(' ',$userNode->getName());
            $firstName = $ex_name[0];
            $lastName = $ex_name[1];
            
            $email = ($userNode->getEmail() == '') ? $userNode->getId().'@gmail.com' : $userNode->getEmail();
            
            $user = User::where('email',$email);

            if($user->count() > 0 )
            {
                $user = User::where('email',$email)->first();

                $user_details = UserDetails::where('user_id', $user->id)->where('field', 'google_id')->first();
                $user_details->value  = $userNode->getId();
                $user_details->save();

                $user_id = $user->id;
            }
            else
            {
                $user = User::where('email', $email);

                if($user->count() > 0)
                {
                    $data['title'] = 'Disabled ';
                    return view('users.disabled', $data);
                }
                
                $user = new User;
                $user->first_name   =   $firstName;
                $user->last_name    =   $lastName;
                $user->email        =   $email;
                $user->status       =   'Active';
                $user->save();

                $user_details             = new UserDetails;
                $user_details->user_id    = $user->id;
                $user_details->field      = 'google_id';
                $user_details->value      = $userNode->getId();
                $user_details->save();

                $user_id = $user->id;

                $email_controller->welcome_email($user);
            }

            $users = User::where('id', $user_id)->first();
            
            if(@$users->status != 'Inactive')
            {
                if(Auth::loginUsingId($user_id))
                {
                    return redirect()->intended('dashboard');
                }
                else
                {
                    $this->helper->one_time_message('danger', trans('messages.login.login_failed'));
                    return redirect('login');
                } 
            }
            else
            {
                $data['title'] = 'Disabled ';
                return view('users.disabled', $data);
            }
        }else{
            return redirect('login');
        }
    }

}
