<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Subject;
use App\Models\University;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\University\EditProfileRequest;
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

    public function editProfile(EditProfileRequest $request,$id)
    {
        $data = University::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact_no = $request->contact_no;
        $data->address = $request->address;
        $data->save();
        return redirect()->route('university.show_edit_profile');
    }

    public function showChangePassword() {
        return view('University.Auth.change-password');
    }

    public function changePassword(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new-password'
        ]);

        //Change Password
        $university = University::where('id', Auth::user()->id)->first();
        $university->password = Hash::make($request->get('new-password'));
        $university->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }
}
