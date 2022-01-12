<?php

namespace App\Http\Controllers;

use App\Models\StudentMark;
use App\Models\Subject;
use App\Repositories\StudentMarksRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMarksController extends Controller
{
    public function __construct(StudentMarksRepository $Data)
    {
        $this->Data = $Data;
    }

    public function index()
    {
        $subjects = Subject::all();
        $studentmarks = StudentMark::where('user_id', Auth::user()->id)->get();
        return view('Student.marks',compact('subjects','studentmarks'));
    }

    public function store(Request $request)
    {
        $result = $this->Data->store($request->all());
        return redirect()->route('show_marks',compact('result'));
    }
}
