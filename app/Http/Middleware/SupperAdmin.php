<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SupperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth()->user()->parmission == 1) {
        //     return $next($request);
        // } else {
        //     return redirect()->route('admin_login');
        // }

        // Check if the user is authenticated and an admin
        if (Auth::check() && Auth::user()->parmission == 1) {
            return $next($request);
        }

        // Redirect non-admins to the home page or another appropriate route
        return redirect()->route('login');
    }
}
