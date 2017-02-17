<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
   public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && AUTH::user()->permission->permission_level == 3){
            
            // return redirect('/');
            return $next($request);


        } else {
            // dd(AUTH::user()->permission->permission_level);
            return redirect('/');

        }

        return $next($request);
    }
}
