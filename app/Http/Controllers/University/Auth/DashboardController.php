<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Subject;
use App\Models\University;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $university = College::all()->count();
        $subject = Subject::all()->count();
        return view('University.layouts.content',compact('university','subject'));
    }

    public function showEditProfile()
    {
        $university = University::where('id', Auth::user()->id)->first();
        return view('University.Auth.edit-profile', compact('university'));
    }

    public function editProfile(Request $request,$id)
    {
        $data = University::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact_no = $request->contact_no;
        $data->address = $request->address;
        $data->save();
        return redirect()->route('university.show_edit_profile');
    }

    public function showForgetPasswordForm()
    {
        return view('University.forgot-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        // $university = University::where('email', $request['email'])->first();
        
        // $forgot_token = Str::random(64);
        // $seller->forgot_token = $forgot_token;
        // $seller->save();

        // Mail::send('emails.forgetPassword', ['forgot_token' => $forgot_token], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
