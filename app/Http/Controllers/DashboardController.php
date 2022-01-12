<?php

namespace App\Http\Controllers;

use App\Http\Requests\College\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function showEditProfile()
    {
        $student = User::where('id', Auth::user()->id)->first();
        return view('Student.edit-profile', compact('student'));
    }

    public function editProfile(EditProfileRequest $request,$id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact_no = $request->contact_no;
        $data->address = $request->address;
        $data->adhaar_card_no = $request->adhaar_card_no;
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
        $university = Auth::user()->id;
        $university->password = Hash::make($request->get('new-password'));
        $university->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }
}
