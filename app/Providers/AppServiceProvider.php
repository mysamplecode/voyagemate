<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Settings;
class AppServiceProvider extends ServiceProvider
{
    
    public function boot()
    {

        if(env('DB_DATABASE') != '') {

            if(\Schema::hasTable('settings'))
            {
                $result = Settings::where('type', 'email')->pluck('value', 'name')->toArray();
            
                if(isset($result['driver']))
                \Config::set([
                        'mail.driver'     => $result['driver'],
                        'mail.host'       => $result['host'],
                        'mail.port'       => $result['port'],
                        'mail.from'       => [
                                              'address' => $result['from_address'],
                                              'name'    => $result['from_name'] 
                                            ],
                        'mail.encryption' => $result['encryption'],
                        'mail.username'   => $result['username'],
                        'mail.password'   => $result['password']
                        ]);
            }

        }
    }

    
    public function register()
    {
        //
    }
}
