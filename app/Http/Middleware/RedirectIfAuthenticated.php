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
        if (Auth::guard($guard)->check() && (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'Admin')) {
            return redirect()->route('admin.dashboard');
        }elseif (Auth::guard($guard)->check() && (Auth::user()->user_role == 'user' || Auth::user()->user_role == 'User')){
            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}
