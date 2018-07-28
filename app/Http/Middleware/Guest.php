<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Guest
{
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard == 'users'){
            if (!Auth::check()) {
                return \Redirect::guest('login');
            }
            if(Auth::user()->status == 'Inactive')
            {
                $data['title'] = 'Disabled';
                return \View::make('users.disabled');
            }
        }else if($guard == 'admin'){
            if (!Auth::guard('admin')->check()) {
                return \Redirect::guest('admin/login');
            }
        }
        return $next($request);
    }
}
