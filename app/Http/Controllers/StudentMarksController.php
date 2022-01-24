<?php

namespace App\Http\Controllers;

use App\Models\Addmission;
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

    public function store(Request $request)
    {
        $result = $this->Data->store($request->all());
        Session::flash('success', 'Marks Add Successfully !!');
        return redirect()->route('show_marks', compact('result'));
    }

    public function index()
    {
        $admission = Addmission::where('user_id', Auth::user()->id)->first();
        if ($admission == Null) {
            $subjects = Subject::all();
            $studentmarks = StudentMark::with('subject')->where('user_id', Auth::user()->id)->get();
            return view('Student.marks', compact('subjects', 'studentmarks'));
        } elseif ($admission->status == '2') {
            Session::flash('error', 'Your Admission Is Rejected By You. You Can Not Add Your Mark !!');
            return redirect()->route('home');
        } elseif ($admission->status == '1') {
            Session::flash('success', 'Your Admission Is Confirm By You. You Can Not Fill Again Marks!!');
            return redirect()->route('home');
        } else {
            $subjects = Subject::all();
            $studentmarks = StudentMark::with('subject')->where('user_id', Auth::user()->id)->get();
            return view('Student.marks', compact('subjects', 'studentmarks'));
        }
    }

    public function confirm(Request $request)
    {
        dd($request->all());
    }
}
