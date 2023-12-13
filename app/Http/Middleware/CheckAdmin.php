<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role == 1 || Auth::user()->role == 2){
                return redirect()->route('admin.home');
            }
            else if(Auth::user()->status == 0 && Auth::user()->role == 0){
                Auth::guard()->logout();
                Session::flush();
                Session::regenerate();
                return redirect()->route('home')->with('message','يرجي الانتظار الحساب تحت المراجعة');

            }
        }
        return $next($request);
        
    }
}