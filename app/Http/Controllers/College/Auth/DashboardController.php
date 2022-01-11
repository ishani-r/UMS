<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\College\EditProfileRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('College.layouts.content');
    }
    
    public function showEditProfile()
    {
        $college = College::where('id', Auth::user()->id)->first();
        return view('College.Auth.edit-profile', compact('college'));
    }

    public function editProfile(EditProfileRequest $request,$id)
    {
        $data = College::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact_no = $request->contact_no;
        $data->address = $request->address;
        $data->save();
        return redirect()->route('college.show_edit_profile');
    }

    public function showChangePassword() {
        return view('College.Auth.change-password');
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
        $college = Auth::user();
        $college->password = Hash::make($request->get('new-password'));
        $college->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }
}
