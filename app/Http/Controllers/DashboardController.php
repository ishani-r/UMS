<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\Addmission;
use App\Models\AddmissionConfiram;
use App\Models\College;
use App\Models\CollegeMerit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function indexs()
    {
        $admission = Addmission::where('user_id', Auth::user()->id)->first();
        $merit = $admission->merit;
        if ($admission) {
            return view('layouts.content', compact('merit'));
        } else {
            $merit = '0';
            return view('layouts.content', compact('merit'));
        }
    }

    public function showEditProfile()
    {
        $student = User::where('id', Auth::user()->id)->first();
        return view('Student.edit-profile', compact('student'));
    }

    public function editProfile(EditProfileRequest $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact_no = $request->contact_no;
        $data->address = $request->address;
        $data->adhaar_card_no = $request->adhaar_card_no;
        $image = uploadFile($request['image'], 'student');
        $data->image = $image;
        $data->save();
        return redirect()->route('show_edit_profile');
    }

    public function showChangePassword()
    {
        return view('Student.change-password');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new-password'
        ]);

        //Change Password
        $student = Auth::user()->id;
        $student->password = Hash::make($request->get('new-password'));
        $student->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }

    public function status(Request $request)
    {
        session()->forget('xyz');
        Session::put('xyz', $request->id);
        $admission = Addmission::where('user_id', Auth::user()->id)->first();
        $college_merit = CollegeMerit::where('college_id', $admission->college_id[0])->first();
       
        $id = $admission->id;
        $data = Addmission::find($id);

        if ($request->id == "4") {
            $data->status = "0";
            $data->merit_round_id = $admission->merit_round_id + 1;
        }  elseif ($request->id == "1") {
            $data->status = "1";
            AddmissionConfiram::updateOrCreate(
                [
                    'addmission_id' => $id,
                ],
                [
                    'confirm_college_id' => $request->checked_college,
                    'confirm_merit' => $admission->merit,
                    'confirm_round_id' => '1',
                    'confirmation_type' => 'M',
                ]
            );
        } elseif ($request->id == "6") {
            $data->status = "1";
            AddmissionConfiram::updateOrCreate(
                [
                    'addmission_id' => $id,
                ],
                [
                    'confirm_college_id' => $admission->college_id[0],
                    'confirm_merit' => $admission->merit,
                    'confirm_round_id' => '1',
                    'confirmation_type' => 'R',
                ]
            );
        } else {
            $data->status = "2";
        }
        $data->save();
        return $data;
    }
    // }
}
