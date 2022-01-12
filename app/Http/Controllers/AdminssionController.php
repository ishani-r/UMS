<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class AdminssionController extends Controller
{
    public function showAdmissionForm()
    {
        $college = College::all();
        return view('Student.admissionform',compact('college'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
