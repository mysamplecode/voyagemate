<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('settings')->delete();

        DB::table('settings')->insert([
        	['name' => 'name', 'value' => 'Vrent', 'type' => 'general'],
            ['name' => 'logo', 'value' => 'logo.png', 'type' => 'general'],
            ['name' => 'favicon', 'value' => 'favicon.ico', 'type' => 'general'],
            ['name' => 'head_code', 'value' => '', 'type' => 'general'],
            ['name' => 'default_currency', 'value' => 1, 'type' => 'general'],
            ['name' => 'default_language', 'value' => 1, 'type' => 'general'],
            ['name' => 'email_logo', 'value' => 'email_logo.png', 'type' => 'general'],
        	
            ['name' => 'username', 'value' => 'techvillage_business_api1.gmail.com', 'type' => 'PayPal'],
            ['name' => 'password', 'value' => '9DDYZX2JLA6QL668', 'type' => 'PayPal'],
            ['name' => 'signature', 'value' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31ABayz5pdk84jno7.Udj6-U8ffwbT', 'type' => 'PayPal'],
            ['name' => 'mode', 'value' => 'sandbox', 'type' => 'PayPal'],

            ['name' => 'publishable', 'value' => 'pk_test_c2TDWXsjPkimdM8PIltO6d8H', 'type' => 'Stripe'],
            ['name' => 'secret', 'value' => 'sk_test_UWTgGYIdj8igmbVMgTi0ILPm', 'type' => 'Stripe'],
            
            ['name' => 'driver', 'value' => 'smtp', 'type' => 'email'],
            ['name' => 'host', 'value' => 'smtp.gmail.com', 'type' => 'email'],
            ['name' => 'port', 'value' => '587', 'type' => 'email'],
            ['name' => 'from_address', 'value' => 'stockpile.techvill@gmail.com', 'type' => 'email'],
            ['name' => 'from_name', 'value' => 'Vrent', 'type' => 'email'],
            ['name' => 'encryption', 'value' => 'tls', 'type' => 'email'],
            ['name' => 'username', 'value' => 'stockpile.techvill@gmail.com', 'type' => 'email'],
            ['name' => 'password', 'value' => 'xgldhlpedszmglvj', 'type' => 'email'],

            ['name' => 'facebook', 'value' => '#', 'type' => 'join_us'],
            ['name' => 'google_plus', 'value' => '#', 'type' => 'join_us'],
            ['name' => 'twitter', 'value' => '#', 'type' => 'join_us'],
            ['name' => 'linkedin', 'value' => '#', 'type' => 'join_us'],
            ['name' => 'pinterest', 'value' => '#', 'type' => 'join_us'],
            ['name' => 'youtube', 'value' => '#', 'type' => 'join_us'],
            ['name' => 'instagram', 'value' => '#', 'type' => 'join_us'],

            ['name' => 'key', 'value' => 'AIzaSyC2lQCpLk6SZ3U5zBaV7y4n-lXfqjsMQXM', 'type' => 'googleMap'],
        
            ['name' => 'client_id', 'value' => '673970283138-om7qt5erh1bd3a92ftcvt4pv2tg4mhlj.apps.googleusercontent.com', 'type' => 'google'],
            ['name' => 'client_secret', 'value' => 'B8SZ7qyNwoGkRlSlXZpZWIjy', 'type' => 'google'],

            ['name' => 'client_id', 'value' => '337273813338799', 'type' => 'facebook'],
            ['name' => 'client_secret', 'value' => 'a678e247401b80488e7caffd48f89e32', 'type' => 'facebook'],
            
        ]);
    }
}
