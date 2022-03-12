<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard == "university" && Auth::guard($guard)->check()) {
            return redirect()->route('university.main');
        }
        if ($guard == "college" && Auth::guard($guard)->check()) {
            return redirect()->route('college.main');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
        // $guards = empty($guards) ? [null] : $guards;
        // foreach ($guards as $guard) {
        //     if ($guard == 'university') {
        //         if (Auth::guard($guard)->check()) {
        //             return redirect(RouteServiceProvider::UNIVERSITY);
        //         }
        //     } elseif ($guard == 'college') {
        //         if (Auth::guard($guard)->check()) {
        //             return redirect(RouteServiceProvider::COLLEGE);
        //         }
        //     } else {
        //         if (Auth::guard($guard)->check()) {
        //             return redirect(RouteServiceProvider::HOME);
        //         }
        //     }
        // }
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        // return $next($request);
    }
}
