<?php

/**
 * Settings Controller
 *
 * Settings Controller manages Settings by admin. 
 *
 * @category   Settings
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2017 Techvillage
 * @license    
 * @version    1.3
 * @link       http://techvill.net
 * @email      support@techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Common;
use App\Models\Settings;
use App\Models\PaymentSetting;
use App\Models\Language;
use App\Models\Currency;
use App\Models\PropertyFees;
use Validator;

class SettingsController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new Common;
    }

    public function general(Request $request)
    {
        if(!$_POST)
        {
        	$general = Settings::where('type','general')->orWhere('type','googleMap')->get()->toArray();
        	$data['result'] = $this->helper->key_value('name', 'value', $general);
            $data['language'] = $this->helper->key_value('id', 'name', Language::get()->toArray());
            $data['currency'] = $this->helper->key_value('id', 'name', Currency::get()->toArray());

            return view('admin.settings.general', $data);
        }
        else if($_POST)
        {
            $rules = array(
                    'name' 		 		=> 'required',
                    'default_currency'  => 'required',
                    'default_language'  => 'required',
                );

            $fieldNames = array(
                    'name' 		 		=> 'Name',
                    'default_currency'  => 'Default Currency',
                    'default_language'  => 'required',
                 );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){
                    $head_code = is_null($request->head_code)?'':$request->head_code;
                    Settings::where(['name' => 'name'])->update(['value' => $request->name]);
                    Settings::where(['name' => 'head_code'])->update(['value' =>  $head_code]);
                    Settings::where(['name' => 'default_currency'])->update(['value' => $request->default_currency]);
                    Settings::where(['name' => 'default_language'])->update(['value' => $request->default_language]);
                    Language::where('default', '=', '1')->update(['default' => '0']);
                    Language::where('id', $request->default_language)->update(['default' => '1']);

                    Currency::where('default', '=', '1')->update(['default' => '0']);
                    Currency::where('id', $request->default_currency)->update(['default' => '1']);

                    foreach($_FILES["photos"]["error"] as $key=>$error) 
    	            {
    	                $tmp_name = $_FILES["photos"]["tmp_name"][$key];

    	                $name = str_replace(' ', '_', $_FILES["photos"]["name"][$key]);
    	                
    	                $ext = pathinfo($name, PATHINFO_EXTENSION);

    	                $name = $key.'.'.$ext;
    	                                           
    	                if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'ico')   
    	                {            
    		                if(move_uploaded_file($tmp_name, "public/images/logos/".$name))
    		                {
    		                    Settings::where(['name' => $key])->update(['value' => $name]);
    		                }
    	                }
    	            }
                }
                $this->helper->one_time_message('success', 'Updated Successfully');

                return redirect('admin/settings');
            }
        }
    }

    public function photos(Request $request)
    {
        if(!$_POST)
        {
            $photos = Settings::where('type','photos')->get()->toArray();
            $data['result'] = $this->helper->key_value('name', 'value', $photos);
            return view('admin.settings.photos', $data);
        }
        else if($_POST)
        {
            $rules = array(
                    'photo_min_height' => 'required',
                    'photo_min_width'  => 'required',
                    'photo_max_size'   => 'required'
                );

            
            $fieldNames = array(
                    'photo_min_height' => 'Minimum Height',
                    'photo_min_width'  => 'Minimum Width',
                    'photo_max_size'   => 'Max Size'
                 );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){
                    Settings::where(['name' => 'photo_min_height'])->update(['value' => $request->photo_min_height]);
                    Settings::where(['name' => 'photo_min_width'])->update(['value' => $request->photo_min_width]);
                    Settings::where(['name' => 'photo_max_size'])->update(['value' => $request->photo_max_size]);
                }

                $this->helper->one_time_message('success', 'Updated Successfully');

                return redirect('admin/settings/photos');
            }
        }
    }

    public function email(Request $request)
    {
        if(!$_POST)
        {
            $general = Settings::where('type','email')->get()->toArray();
            $data['result'] = $this->helper->key_value('name', 'value', $general);
            
            return view('admin.settings.email', $data);
        }
        else if($_POST)
        {
            $rules = array(
                    'driver'            => 'required',
                    'host'              => 'required',
                    'port'              => 'required',
                    'from_address'      => 'required',
                    'from_name'         => 'required',
                    'encryption'        => 'required',
                    'username'          => 'required',
                    'password'          => 'required',
                );

            $fieldNames = array(
                    'driver'            => 'Driver',
                    'host'              => 'Host',
                    'port'              => 'Port',
                    'from_address'      => 'From Address',
                    'from_name'         => 'From Name',
                    'encryption'        => 'Encryption',
                    'username'          => 'Username',
                    'password'          => 'Password',
                 );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){
                    Settings::where(['name' => 'driver'])->update(['value' => $request->driver]);
                    Settings::where(['name' => 'host'])->update(['value' => $request->host]);
                    Settings::where(['name' => 'port'])->update(['value' => $request->port]);
                    Settings::where(['name' => 'from_address'])->update(['value' => $request->from_address]);
                    Settings::where(['name' => 'from_name'])->update(['value' => $request->from_name]);
                    Settings::where(['name' => 'encryption'])->update(['value' => $request->encryption]);
                    Settings::where(['name' => 'username'])->update(['value' => $request->username]);
                    Settings::where(['name' => 'password'])->update(['value' => $request->password]);
                }

                $this->helper->one_time_message('success', 'Updated Successfully');

                return redirect('admin/settings/email');
            }
        }
    }

    public function payment_methods(Request $request)
    {
        
        if(!$_POST)
        {
            $paypal = Settings::where('type','paypal')->get()->toArray();
            $stripe = Settings::where('type','stripe')->get()->toArray();
            $bank_transfer = Settings::where('type','bank_transfer')->get()->toArray();
            $data['paypal'] = $this->helper->key_value('name', 'value', $paypal);
            $data['stripe'] = $this->helper->key_value('name', 'value', $stripe);
            $data['bank_transfer'] = $this->helper->key_value('name', 'value', $bank_transfer);            
            return view('admin.settings.payment', $data);
        }
        else if($_POST['gateway'] == 'paypal')
        {
           
            $rules = array(
                    'username'      => 'required',
                    'password'      => 'required',
                    'signature'     => 'required',
                    'mode'          => 'required',
                );

            
            $fieldNames = array(
                    'username'      => 'PayPal Username',
                    'password'      => 'PayPal Password',
                    'signature'     => 'PayPal Signature',
                    'mode'          => 'PayPal Mode',
                 );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                $data['success'] = 0;
                $data['errors'] = $validator->messages();
                echo json_encode($data);
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){
                    Settings::where(['name' => 'username', 'type' => 'paypal'])->update(['value' => $request->username]);
                    Settings::where(['name' => 'password', 'type' => 'paypal'])->update(['value' => $request->password]);
                    Settings::where(['name' => 'signature', 'type' => 'paypal'])->update(['value' => $request->signature]);
                    Settings::where(['name' => 'mode', 'type' => 'paypal'])->update(['value' => $request->mode]);
                }

                $data['message'] = 'Updated Successfully';
                $data['success'] = 1;
                echo json_encode($data);
            }
        }
        else if($_POST['gateway'] == 'stripe')
        {
            $rules = array(
                'secret_key'            => 'required',
                'publishable_key'       => 'required'
            );

            $fieldNames = array(
                'secret_key'        => 'Secret Key',
                'publishable_key'   => 'Publishable Key'
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                $data['success'] = 0;
                $data['errors'] = $validator->messages();
                echo json_encode($data);
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){
                    Settings::where(['name' => 'secret', 'type' => 'Stripe'])->update(['value' => $request->secret_key]);
                    Settings::where(['name' => 'publishable', 'type' => 'Stripe'])->update(['value' => $request->publishable_key]);
                }

                $data['message'] = 'Updated Successfully';
                $data['success'] = 1;
                echo json_encode($data);
            }
        }else if($_POST['gateway'] == 'bank_transfer')
        {           
            $rules = array(
                'bank_name'=> 'required',
                'account_holder_name' => 'required',
                'account_number' => 'required',
                'ifsc_code' => 'required',
                'iban' => 'required',
                'bic' => 'required',
                'instruction_note' => 'required'
            );

            $fieldNames = array(
                'bank_name'=> 'Bank Name',
                'account_holder_name' => 'Account Holder Name',
                'account_number' => 'Account Number',
                'ifsc_code' => 'IFSC code',
                'iban' => 'IBAN',
                'bic' => 'BIC',
                'instruction_note' => 'Insruction Note'
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                $data['success'] = 0;
                $data['errors'] = $validator->messages();
                echo json_encode($data);
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){                            
                    if(Settings::where(['name'=>'bank_name','type'=>'bank_transfer'])->first()){
                        Settings::where(['name'=>'bank_name','type'=>'bank_transfer'])->update(['name'=>'bank_name','value' => $request->bank_name]);
                        Settings::where(['name'=>'account_holder_name','type'=>'bank_transfer'])->update(['name'=>'account_holder_name','value' => $request->account_holder_name]);
                        Settings::where(['name'=>'account_number','type'=>'bank_transfer'])->update(['name'=>'account_number','value' => $request->account_number]);
                        Settings::where(['name'=>'ifsc_code','type'=>'bank_transfer'])->update(['name'=>'ifsc_code','value' => $request->ifsc_code]);
                        Settings::where(['name'=>'iban','type'=>'bank_transfer'])->update(['name'=>'iban','value' => $request->iban]);
                        Settings::where(['name'=>'bic','type'=>'bank_transfer'])->update(['name'=>'bic','value' => $request->bic]);
                        Settings::where(['name'=>'instruction_note','type'=>'bank_transfer'])->update(['name'=>'instruction_note','value' => $request->instruction_note]);
                    }else{
                        \DB::table('settings')->insert([
                            ['name' => 'bank_name', 'value' =>$request->bank_name, 'type' => 'bank_transfer'],
                            ['name' => 'account_holder_name', 'value' =>$request->account_holder_name, 'type' => 'bank_transfer'],
                            ['name' => 'account_number', 'value' =>$request->account_number, 'type' => 'bank_transfer'],
                            ['name' => 'ifsc_code', 'value' =>$request->ifsc_code, 'type' => 'bank_transfer'],
                            ['name' => 'iban', 'value' =>$request->iban, 'type' => 'bank_transfer'],
                            ['name' => 'bic', 'value' =>$request->bic, 'type' => 'bank_transfer'],
                            ['name' => 'instruction_note', 'value' =>$request->instruction_note, 'type' => 'bank_transfer'],                                                        
                            ]);
                    }                    
                }
                $data['message'] = 'Updated Successfully';
                $data['success'] = 1;
                echo json_encode($data);
            }
        }
    }

    public  function social_links(Request $request)
    {
        if(!$_POST)
        {
            $general = Settings::where('type','join_us')->get()->toArray();
            $data['result'] = $this->helper->key_value('name', 'value', $general);
            
            return view('admin.settings.social', $data);
        }
        else if($_POST)
        {
            
            $rules = array(
                    'facebook'          => 'required',
                    'google_plus'       => 'required',
                    'twitter'           => 'required',
                    'linkedin'          => 'required',
                    'pinterest'         => 'required',
                    'youtube'           => 'required',
                    'instagram'         =>'required'
                    
                );

            $fieldNames = array(
                    'facebook'            => 'Facebook',
                    'google_plus'         => 'Google Plus',
                    'twitter'             => 'Twitter',
                    'linkedin'            => 'Linkedin',
                    'pinterest'           => 'Pinterest',
                    'youtube'             => 'Youtube',
                    'instagram'           => 'Instagram'
                   
                 );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){
                    Settings::where(['name' => 'facebook'])->update(['value' => $request->facebook]);
                    Settings::where(['name' => 'google_plus'])->update(['value' => $request->google_plus]);
                    Settings::where(['name' => 'twitter'])->update(['value' => $request->twitter]);
                    Settings::where(['name' => 'linkedin'])->update(['value' => $request->linkedin]);
                    Settings::where(['name' => 'pinterest'])->update(['value' => $request->pinterest]);
                    Settings::where(['name' => 'youtube'])->update(['value' => $request->youtube]);
                    Settings::where(['name' => 'instagram'])->update(['value' => $request->instagram]);
                }

                $this->helper->one_time_message('success', 'Updated Successfully');
                return redirect('admin/settings/social_links');
            }
        }
    }

    public function api_informations(Request $request)
    {
        if(!$_POST)
        {
            $data['google'] = Settings::where('type', 'google')->pluck('value', 'name')->toArray();
            $data['google_map'] = Settings::where('type', 'googleMap')->pluck('value', 'name')->toArray();
            $data['facebook'] = Settings::where('type', 'facebook')->pluck('value', 'name')->toArray();
            return view('admin.api_credentials', $data);
        }
        else if($_POST)
        {
            $rules = array(
                    'facebook_client_id'     => 'required',
                    'facebook_client_secret' => 'required',
                    'google_client_id'       => 'required',
                    'google_client_secret'   => 'required',
                    'google_map_key'         => 'required',
                    );

            $fieldNames = array(
                        'facebook_client_id'     => 'Facebook Client ID',
                        'facebook_client_secret' => 'Facebook Client Secret',
                        'google_client_id'       => 'Google Client ID',
                        'google_client_secret'   => 'Google Client Secret',
                        'google_map_key'   => 'Google Map Browser Key',
                        'google_map_server_key'   => 'Google Map Server Key',
                        );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(env('APP_MODE', '') != 'test'){
                    Settings::where(['name' => 'client_id', 'type' => 'Facebook'])->update(['value' => $request->facebook_client_id]);

                    Settings::where(['name' => 'client_secret', 'type' => 'Facebook'])->update(['value' => $request->facebook_client_secret]);

                    Settings::where(['name' => 'client_id', 'type' => 'Google'])->update(['value' => $request->google_client_id]);

                    Settings::where(['name' => 'client_secret', 'type' => 'Google'])->update(['value' => $request->google_client_secret]);

                    Settings::where(['name' => 'key', 'type' => 'GoogleMap'])->update(['value' => $request->google_map_key]);

                    //ApiCredentials::where(['name' => 'server_key', 'site' => 'GoogleMap'])->update(['value' => $request->google_map_server_key]);

                    $this->helper->one_time_message('success', 'Updated Successfully'); 
                }
                
                return redirect('admin/settings/api_informations');
            }
        }
        else
        {
            return redirect('admin/settings/api_informations');
        }
    }

    public function fees(Request $request){
        if($_POST){
            $rules = array(
                    'more_then_seven'       => 'required',
                    'less_then_seven'       => 'required',
                    'guest_service_charge'  => 'required|numeric|max:99|min:0'
                );

            $fieldNames = array(
                    'more_then_seven'        => 'Field',
                    'less_then_seven'        => 'Field',
                    'guest_service_charge'   => 'Field'
                );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames); 

            if ($validator->fails()) 
            {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                PropertyFees::where(['field' => 'more_then_seven'])->update(['value' => $request->more_then_seven]);
                PropertyFees::where(['field' => 'less_then_seven'])->update(['value' => $request->less_then_seven]);
                PropertyFees::where(['field' => 'guest_service_charge'])->update(['value' => $request->guest_service_charge]);
                $this->helper->one_time_message('success', 'Updated Successfully');
            }
        }

        $fees = PropertyFees::pluck('value', 'field')->toArray();
        $data['result'] = $fees;
        return view('admin.settings.fees', $data);
    }
}
