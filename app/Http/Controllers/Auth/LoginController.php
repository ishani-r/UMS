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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $meritround = MeritRound::first();
        $date_now = date("Y-m-d"); // this format is string comparable

        if ($date_now == $meritround->merit_result_declare_date) {
            $user = User::where('email',$request->email)->first();
            // dd($user->id);
            $admission = Addmission::where('user_id', $user->id)->first();
            dd($admission->merit);
            // $college_merit = CollegeMerit::where('college_id', Auth::user()->id)->first();
            // dd($college_merit);
            if (
                method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)
            ) {
                $this->fireLockoutEvent($request);
                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }
                return $this->sendLoginResponse($request);
            }
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        } else if ($date_now > $meritround->end_date) {
            return redirect()->back()->with('error', 'You Can not Login Beacuse Admission Date is Expired....');
        } else {
            if (
                method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)
            ) {
                $this->fireLockoutEvent($request);
                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }
                return $this->sendLoginResponse($request);
            }
            $this->incrementLoginAttempts($request);
        }
    }
}
