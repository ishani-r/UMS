<?php

namespace App\Http\Controllers;

use App\Models\StudentMark;
use App\Models\Subject;
use App\Repositories\StudentMarksRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentMarksController extends Controller
{
    public function __construct(StudentMarksRepository $Data)
    {
        $this->Data = $Data;
    }

    public function index()
    {
        $subjects = Subject::all();
        $studentmarks = StudentMark::with('subject')->where('user_id', Auth::user()->id)->get();
        return view('Student.marks',compact('subjects','studentmarks'));
    }

    public function store(Request $request)
    {
        $result = $this->Data->store($request->all());
        Session::flash('success', 'Marks Add Successfully !!');
        // Session::flash('success', 'Admission Form Submit Successfully !!');
        return redirect()->route('show_marks',compact('result'));
    }

    public function confirm(Request $request)
    {
        dd($request->all());
    }
}
