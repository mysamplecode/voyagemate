<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Config;
use Auth;
use DateTime;
use DateTimeZone;
use App\Models\PasswordResets;
use App\Models\User;
use App\Models\Rooms;
use App\Models\Bookings;
use App\Models\SiteSettings;
use App\Models\Payouts;
use App\Models\Currency;
use App\Models\Accounts;
use App\Http\Helpers\Common;

class EmailController extends Controller
{
    private $helper;

    public function __construct(){
      $this->helper = new Common;
    }

    public function welcome_email($user)
    {
        $token = $this->helper->randomCode(100);

        $password_resets = new PasswordResets;
        $password_resets->email      = $user->email;
        $password_resets->token      = $token;
        $password_resets->created_at = date('Y-m-d H:i:s');
        $password_resets->save();

        $data['first_name'] = $user->first_name;
        $data['email'] = $user->email;
        $data['token'] = $token;
        $data['type'] = 'register';
        $data['url'] = url('/').'/';
        
        if(env('APP_MODE', '') != 'test'){
            @Mail::send('emails.email_confirm', $data, function($message) use($data) {
                $message->to($data['email'], $data['first_name'])->subject('Please confirm your e-mail address');
            });
        }
        return true;
    }

   
    public function forgot_password($user)
    {
        $token = $this->helper->randomCode(100);
        $exist = PasswordResets::where('token', $token)->count();
        while ($exist) {
            $token = $this->helper->randomCode(100);
            $exist = PasswordResets::where('token', $token)->count();
        }

        $password_resets = new PasswordResets;
        $password_resets->email      = $user->email;
        $password_resets->token      = $token;
        $password_resets->created_at = date('Y-m-d H:i:s');
        $password_resets->save();

        $data['first_name'] = $user->first_name;
        $data['token'] = $token;
        $data['url'] = url('/').'/';
        
        if(env('APP_MODE', '') != 'test'){
            @Mail::send('emails.forgot_password', $data, function($message) use($user) {
                $message->to($user->email, $user->first_name)->subject('Reset your Password');
            });
        }
        return true;
    }

    public function change_email_confirmation($user)
    {
        $token = $this->helper->randomCode(100);
       
        $password_resets = new PasswordResets;
        $password_resets->email      = $user->email;
        $password_resets->token      = $token;
        $password_resets->created_at = date('Y-m-d H:i:s');
        $password_resets->save();

        $data['first_name'] = $user->first_name;
        $data['token'] = $token;
        $data['type'] = 'change';
        $data['url'] = url('/').'/';

        if(env('APP_MODE', '') != 'test'){
            @Mail::send('emails.email_confirm', $data, function($message) use($user) {
                $message->to($user->email, $user->first_name)->subject('Please confirm your e-mail address');
            });
        }
        return true;
    }

    public function new_email_confirmation($user)
    {
        $token = $this->helper->randomCode(100);

        $password_resets = new PasswordResets;
        $password_resets->email      = $user->email;
        $password_resets->token      = $token;
        $password_resets->created_at = date('Y-m-d H:i:s');
        $password_resets->save();

        $data['first_name'] = $user->first_name;
        $data['token'] = $token;
        $data['type'] = 'new_confirm';
        $data['url'] = url('/').'/';

        if(env('APP_MODE', '') != 'test'){
            @Mail::send('emails.email_confirm', $data, function($message) use($user) {
                $message->to($user->email, $user->first_name)->subject('Please confirm your e-mail address');
            });
        }

        return true;
    }

    public function account_preferences($account_id, $type = 'update')
    {
        if($type != 'delete') {
            $result = Accounts::find($account_id);
            $user = $result->users;
            $data['first_name'] = $user->first_name;
            $data['updated_time'] = $result->updated_at_time;
            $data['updated_date'] = $result->updated_at_date;
        }else {
            $user = Auth::user();
            $data['first_name'] = $user->first_name;
            $now_dt = new DateTime(date('Y-m-d H:i:s'));
            $data['deleted_time'] = $now_dt->format('d M').' at '.$now_dt->format('H:i');
        }
        $data['type'] = $type;
        $data['url'] = url('/').'/';

        if($type == 'update')
            $subject = "Your Payout information has been updated in ".SITE_NAME;
        else if($type == 'delete')
            $subject = "Your payout information has been deleted in ".SITE_NAME;
        else if($type == 'default_update')
            $subject = "Your Default Payout Information Has Been Changed in ".SITE_NAME;

        if(env('APP_MODE', '') != 'test'){
            @Mail::send('emails.account_preferences', $data, function($message) use($user, $data, $subject) {
                $message->to($user->email, $user->first_name)->subject($subject);
            });
        }
        return true;
    }

    public function booking($booking_id)
    {
        $booking = Bookings::find($booking_id);
        $user = $booking->host;
        $data['url'] = url('/').'/';
        $data['result'] = Bookings::where('bookings.id', $booking_id)->with(['users', 'properties', 'host', 'currency', 'messages'])->first()->toArray();

        if(env('EMAIL_SEND', '') != 'false'){
            @Mail::send('emails.booking', $data, function($message) use($user, $data) {
                $message->to($user->email, $user->first_name)->subject("Booking inquiry for ".$data['result']['properties']['name']);
            });
        }
        return true;
    }

    //item sold --
    public function item_sold($photo){
        $user = $photo->users;
        $url = url('photo/single/'.$photo->id);
        $data['content'] = 'One of your <a href="'.$url.'">photo</a> sold';
        if(env('APP_MODE', '') != 'test'){
            @Mail::send('emails.custom_email', $data, function($message) use($user, $data) {
                $message->to($user->email, $user->first_name)->subject("Photo sold");
            });
        }
        return true;
    }

    public function need_pay_account($booking_id, $type)
    {
        $result       = Bookings::find($booking_id);
        $data['type'] = $type;
        
        if($type == 'guest') {
            $user = $result->users;
            $data['payout_amount'] = $result->admin_guest_payment;
        }
        else {
            $user = $result->host;
            $data['payout_amount'] = $result->admin_host_payment;
        }

        $data['currency_symbol'] = $result->currency->symbol;
        $data['first_name']      = $user->first_name;
        $data['user_id']         = $user->id;
        $data['url'] = url('/').'/';

        if(env('EMAIL_SEND', '') != 'false'){
            @Mail::send('emails.need_pay_account', $data, function($message) use($user, $data) {
                $message->to($user->email, $user->first_name)->subject("Please set a payment account");
            });
        }
        return true;
    }

}
