<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Course;
use App\Models\MeritRound;
use App\Models\StudentMark;
use App\Repositories\AdmissionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdmissionRequest;
use App\Models\Addmission;
use Illuminate\Support\Facades\Session;

class AdminssionController extends Controller
{
    public function __construct(AdmissionRepository $Data)
    {
        $this->Data = $Data;
    }

    public function store(AdmissionRequest $request)
    {
        $data = $this->Data->store($request->all());
        return redirect()->route('admission_form', compact('data'));
    }
    public function showAdmissionForm()
    {
        $count=StudentMark::where('user_id',Auth::user()->id)->count();
        if($count==0)
        {
            Session::flash('error', 'First Insert Your Marks !!');
            return redirect()->route('show_marks');
        }
        $course = Course::all();
        $college = College::all();
        $studentmark = StudentMark::where('user_id', Auth::user()->id)->first();
        $admission = Addmission::where('user_id', Auth::user()->id)->first();
        $round = MeritRound::where('course_id', $admission->course_id)->get();

        if ($studentmark == NULL) {
            $studentmark = '0';
            return view('Student.admissionform', compact('course', 'college', 'studentmark', 'admission', 'round'));
        } else {
            return view('Student.admissionform', compact('course', 'college', 'studentmark', 'admission', 'round'));
        }
    }


    public function selRoundNo(Request $request)
    {
        $course = MeritRound::where('course_id', $request->course_id)->get();
        return $course;
    }
}
