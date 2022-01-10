<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index()
    {
        $university = College::all()->count();
        $subject = Subject::all()->count();
        return view('University.layouts.content',compact('university','subject'));
    }

    public function showForgetPasswordForm()
    {
        return view('University.forgot-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $university = University::where('email', $request['email'])->first();
        
        $forgot_token = Str::random(64);
        $seller->forgot_token = $forgot_token;
        $seller->save();

        Mail::send('emails.forgetPassword', ['forgot_token' => $forgot_token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
