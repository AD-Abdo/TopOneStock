<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::check()) {
            if(Auth::user()->role == 1 || Auth::user()->role == 2){
                return redirect('/dashboard/home');
            }else{
                return redirect('/');
            }
            
        }

        else{
            return $next($request);
        }
    }
}