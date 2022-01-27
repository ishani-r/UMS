<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CollegeMerit;
use App\Models\Addmission;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\MeritRound;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        
        // Find User
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            Auth::guard('web')->login($authUser);
            return redirect()->route('home');
        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->social_login_id = $user->id;
            $newUser->password = uniqid(); // we dont need password for login
            $newUser->save();
            Auth::guard('web')->login($newUser);
            return redirect()->route('home');
        }
    }
}
