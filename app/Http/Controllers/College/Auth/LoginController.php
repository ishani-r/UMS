<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
       use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo ="/college/dashboard";

    public function __construct()
    {     
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest:college')->except('logout');
    }

    public function showLoginForm()
    {
        return view('College.Auth.login');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('college.login');
    }

    /**
    * Get the guard to be used during authentication.
    *
    * @return \Illuminate\Contracts\Auth\StatefulGuard
    */
    protected function guard()
    {
        return Auth::guard('college');
    }
}
