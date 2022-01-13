<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Models\MeritRound;
use App\Models\StudentMark;
use App\Repositories\AdmissionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdmissionRequest;
class AdminssionController extends Controller
{
    public function __construct(AdmissionRepository $Data)
    {
        $this->Data = $Data;
    }

    public function store(AdmissionRequest $request)
    {
        $data = $this->Data->store($request->all());
        return redirect()->route('admission_form',compact('data'));
    }
    public function showAdmissionForm()
    {
        $course = Course::all();
        $college = College::all();
        $studentmark = StudentMark::where('user_id', Auth::user()->id)->first();
        if ($studentmark == NULL) {
            $studentmark = '0';
            return view('Student.admissionform', compact('course', 'college', 'studentmark'));
        } else {
            return view('Student.admissionform', compact('course', 'college', 'studentmark'));
        }
    }


    public function selRoundNo(Request $request)
    {
        $course = MeritRound::where('course_id', $request->course_id)->get();
        return $course;
    }
}
