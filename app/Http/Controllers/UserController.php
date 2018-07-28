<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\Common;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Messages;

use App\Models\Country;
use App\Models\PasswordResets;
use App\Models\Payment;
use App\Models\Notification;
use App\Models\Timezone;
use App\Models\Reviews;
use App\Models\Accounts;
use App\Models\UsersVerification;
use App\Models\Properties;
use App\Models\Payouts;
use App\Models\Bookings;

use Validator;
use Socialite;
use Mail;
use DateTime;
use Hash;
use Excel;
use DB;
use Image;
use Session;
use App\Http\Controllers\EmailController;

class UserController extends Controller
{
    protected $helper;
    
    public function __construct()
    {
        $this->helper = new Common;
    }

    public function create(Request $request, EmailController $email_controller)
    {
       $rules = array(
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'email'           => 'required|max:255|email|unique:users',
            'password'        => 'required|min:6',
            'birthday_day'    => 'required',
            'birthday_month'  => 'required',
            'birthday_year'   => 'required',
        );

        $messages = array(
            'required'                => ':attribute is required.',
            'birthday_day.required'   => 'Birth date field is required.',
            'birthday_month.required' => 'Birth date field is required.',
            'birthday_year.required'  => 'Birth date field is required.',
        );

        $fieldNames = array(
            'first_name'      => 'First name',
            'last_name'       => 'Last name',
            'email'           => 'Email',
            'password'        => 'Password',
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->setAttributeNames($fieldNames); 

        if ($validator->fails()) 
        {
            return back()->withErrors($validator)->withInput();
        }
        else
        {
            $user = new User;
            $user->first_name   =   $request->first_name;
            $user->last_name    =   $request->last_name;
            $user->email        =   $request->email;
            $user->password     =   bcrypt($request->password);
            $user->status       =   'Active';
            $user->save();

            $user_details             = new UserDetails;
            $user_details->user_id    = $user->id;
            $user_details->field      = 'date_of_birth';
            $user_details->value      = $request->birthday_year.'-'.$request->birthday_month.'-'.$request->birthday_day;
            $user_details->save();

            $user_verification  = new UsersVerification;
            $user_verification->user_id  =   $user->id;
            $user_verification->save();

            //$email_controller->welcome_email($user);
            
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                $this->helper->one_time_message('success', trans('messages.success.register_success'));
                return redirect()->intended('dashboard');
            }
            else
            {
                $this->helper->one_time_message('danger', trans('messages.error.login_error'));
                return redirect('login');
            }
        }
    }
    

    public function dashboard()
    {   
        $data['all_message'] = Messages::where('receiver_id', \Auth::user()->id)->get();
        return view('users.dashboard', $data);
    }

    public function profile(Request $request)
    {
        if($_POST){

            $rules = array(
                'first_name'      => 'required|max:255',
                'last_name'       => 'required|max:255',
                'email'           => 'required|max:255|email',
                'birthday_day'    => 'required',
                'birthday_month'  => 'required',
                'birthday_year'   => 'required',
            );

            $messages = array(
                'required'                => ':attribute is required.',
                'birthday_day.required'   => 'Birth date field is required.',
                'birthday_month.required' => 'Birth date field is required.',
                'birthday_year.required'  => 'Birth date field is required.',
            );

            $fieldNames = array(
                'first_name'      => 'First name',
                'last_name'       => 'Last name',
                'email'           => 'Email',
            );

            $validator = Validator::make($request->all(), $rules, $messages);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }else{
               
                $user = User::find(Auth::user()->id);
                $user->first_name = $request->first_name;
                $user->last_name  = $request->last_name;
                $user->email      = $request->email;
                $user->save();

                $temp_details = $request->details;
                $temp_details['date_of_birth'] = $request->birthday_year.'-'.$request->birthday_month.'-'.$request->birthday_day;
                foreach ($temp_details as $key => $value) {
                    if(!is_null($value) && $value != '')
                        UserDetails::updateOrCreate(['user_id' => Auth::user()->id, 'field' => $key],['value' => $value]);
                }

                $new_email = ($user->email != $request->email) ? 'yes' : 'no';

                if($new_email == 'yes')
                {
                    $email_controller->change_email_confirmation($user);

                    $this->helper->one_time_message('success', trans('messages.success.email_cofirmation_success'));
                }
                else
                {
                    $this->helper->one_time_message('success', trans('messages.profile.profile_updated'));
                }
            }
        }

        $data['timezone'] = Timezone::get()->pluck('zone', 'value');
        $data['country'] = Country::get()->pluck('name', 'short_name');
        $data['details'] = $details = UserDetails::where('user_id', Auth::user()->id)->pluck('value','field')->toArray();

        if(isset($details['date_of_birth'])) $data['date_of_birth'] = explode('-', $details['date_of_birth']);
        else $data['date_of_birth'] = [];
        return view('users.profile', $data);
    }

    public function media()
    {
        $data['result'] = User::find(Auth::user()->id);

        if(isset($_FILES["photos"]["name"]))
        {
            foreach($_FILES["photos"]["error"] as $key=>$error) 
            {
                $tmp_name = $_FILES["photos"]["tmp_name"][$key];

                $name = str_replace(' ', '_', $_FILES["photos"]["name"][$key]);
                
                $ext = pathinfo($name, PATHINFO_EXTENSION);

                $name = 'profile_'.time().'.'.$ext;

                $path = 'public/images/profile/'.Auth::user()->id;
                                
                if(!file_exists($path))
                {
                    mkdir($path, 0777, true);
                    copy(url('public/images/property/index.html'), $path.'/index.html');
                }
                                           
                if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif')   
                {            
                    if(move_uploaded_file($tmp_name, $path."/".$name))
                    {
                        $user                 = User::find(Auth::user()->id);
                        $user->profile_image  = $name;
                        $user->save();
                    }
                }
            }
        }

        return view('users.media', $data);
    }

    public function account_preferences(Request $request, EmailController $email_controller)
    {
        if(!$_POST)
        {
            $data['payouts'] = Accounts::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
            $data['country']   = Country::all()->pluck('name','short_name');
            return view('account/preferences', $data);
        }
        else
        {

            $account     =   new Accounts;
            $account->user_id           = Auth::user()->id;
            $account->address1          = $request->address1;
            $account->address2          = $request->address2;
            $account->city              = $request->city;
            $account->state             = $request->state;
            $account->postal_code       = $request->postal_code;
            $account->country           = $request->country;
            $account->payment_method_id = $request->payout_method;
            $account->account           = $request->account;
            $account->currency_code     = 'EUR';
            
            $account->save();

            $account_check = Accounts::where('user_id', Auth::user()->id)->where('selected','Yes')->get();

            if($account_check->count() == 0)
            {
                $account->selected = 'Yes';
                $account->save();
            }

            $email_controller->account_preferences($account->id);

            $this->helper->one_time_message('success', trans('messages.success.payout_update_success'));
            return redirect('users/account_preferences');
        }
    }

    public function account_delete(Request $request, EmailController $email_controller)
    {
        $account = Accounts::find($request->id);

        if($account->selected == 'Yes')
        {
            $this->helper->one_time_message('error', trans('messages.error.payout_error'));
            return redirect('users/account_preferences');
        }
        else
        {
            $email_controller->account_preferences($account->id, 'delete');
             
            $account->delete();

            $this->helper->one_time_message('success', trans('messages.success.payout_delete_success'));
            return redirect('users/account_preferences');
        }
    }

    public function account_default(Request $request, EmailController $email_controller)
    {
        $account = Accounts::find($request->id);

        if($account->selected == 'Yes')
        {
            $this->helper->one_time_message('error', trans('messages.error.payout_account_error'));
            return redirect('users/account_preferences');
        }
        else
        {
            $account_all = Accounts::where('user_id', \Auth::user()->id)->update(['selected'=>'No']);

            $account->selected = 'Yes';
            $account->save();

            $email_controller->account_preferences($account->id, 'default_update');

            $this->helper->one_time_message('success', trans('messages.success.default_payout_success'));
            return redirect('users/account_preferences');
        }
    }

    public function security(Request $request)
    {
        if($_POST){
            $rules = array(
            'old_password'          => 'required',
            'new_password'          => 'required|min:6|max:30|different:old_password',
            'password_confirmation' => 'required|same:new_password|different:old_password'
            );

            $fieldNames = array(
            'old_password'          => 'Old Password',
            'new_password'          => 'New Password',
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
                $user = User::find(Auth::user()->id);

                if(!Hash::check($request->old_password, $user->password))
                {
                    return back()->withInput()->withErrors(['old_password' => trans('messages.profile.pwd_not_correct')]);
                }

                $user->password = bcrypt($request->new_password);

                $user->save();

                $this->helper->one_time_message('success', trans('messages.profile.pwd_updated'));
                return redirect('users/security');
            }
        }
        return view('account.security');
    }

    public function show(Request $request)
    {
        $data['result'] = User::find($request->id);
        $data['details'] = UserDetails::where('user_id', $request->id)->pluck('value', 'field')->toArray();
        
        $data['reviews_from_guests'] = Reviews::where(['receiver_id'=>$request->id, 'reviwer'=>'guest']);
        $data['reviews_from_hosts'] = Reviews::where(['receiver_id'=>$request->id, 'reviwer'=>'host']);

        $data['reviews_count'] = $data['reviews_from_guests']->count() + $data['reviews_from_hosts']->count();

        $data['title'] = $data['result']->first_name."'s Profile ";

        return view('users.show', $data);
    }

    public function transaction_history(Request $request)
    {
        $data['lists'] = Properties::where('host_id', Auth::user()->id)->pluck('name','id');
        return view('account.transaction_history', $data);
    }

    public function get_completed_transaction(Request $request){
        $transaction = $this->transaction_result();
        $transaction_result = $transaction->paginate(10)->toJson();
        echo $transaction_result;
    }

    public function transaction_result()
    {
        $where['user_id'] = Auth::user()->id;
        $transaction = Payouts::where($where)->orderBy('updated_at','DESC');

        return $transaction;
    }
}
