<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('College.Auth.register');
    }

    public function store(Request $request)
    {
        $college = new College();
        $college->name = $request->name;
        $college->email = $request->email;
        $college->contact_no = $request->contact_no;
        $college->address = $request->address;
        $college->password = $request->password;
        $logo = uploadFile($request['logo'], 'college');
        $college->logo = $logo;
        $college->status = '0';
        $college->save();
        Auth::guard('college')->login($college);
        return redirect()->route('college.main');
    }
}
