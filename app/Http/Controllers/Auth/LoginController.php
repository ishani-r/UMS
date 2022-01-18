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

    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);
    //     $meritround = MeritRound::where('status', '1')->first();
    //     $date_now = date("Y-m-d"); // this format is string comparable

    //     if ($date_now >= $meritround->merit_result_declare_date) {
    //         dd(1);
    //         // $user = User::where('email', $request->email)->first();
    //         // $admission = Addmission::where('user_id', $user->id)->first();
    //         // $merit = $admission->merit;
    //         // $first_sel_college = $admission->college_id[0];
    //         // $college_merit = CollegeMerit::where('college_id', $first_sel_college)->first();
    //         // if ($merit >= $college_merit->merit) {
    //         //     dd(1);
    //         if (
    //             method_exists($this, 'hasTooManyLoginAttempts') &&
    //             $this->hasTooManyLoginAttempts($request)
    //         ) {
    //             $this->fireLockoutEvent($request);
    //             return $this->sendLockoutResponse($request);
    //         }

    //         if ($this->attemptLogin($request)) {
    //             if ($request->hasSession()) {
    //                 $request->session()->put('auth.password_confirmed_at', time());
    //             }
    //             return $this->sendLoginResponse($request);
    //         }
    //         $this->incrementLoginAttempts($request);
    //         return $this->sendFailedLoginResponse($request);
    //         // } else {
    //         //     dd(3);
    //         // }
    //     } else if ($date_now > $meritround->end_date) {
    //         // dd(2);
    //         return redirect()->back()->with('error', 'You Can not Login Beacuse Admission Date is Expired Please Wait will Merit Declaration Date....');
    //     } else {
    //         // dd(3);
    //         if (
    //             method_exists($this, 'hasTooManyLoginAttempts') &&
    //             $this->hasTooManyLoginAttempts($request)
    //         ) {
    //             $this->fireLockoutEvent($request);
    //             return $this->sendLockoutResponse($request);
    //         }

    //         if ($this->attemptLogin($request)) {
    //             if ($request->hasSession()) {
    //                 $request->session()->put('auth.password_confirmed_at', time());
    //             }
    //             return $this->sendLoginResponse($request);
    //         }
    //         $this->incrementLoginAttempts($request);
    //     }
    // }
}
