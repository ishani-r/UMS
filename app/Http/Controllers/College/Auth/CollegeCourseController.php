<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CollegeCourseDatatable;
use App\Http\Requests\College\CollegeCourseRequest;
use App\Http\Requests\College\EditCollegeCourseRequest;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Repositories\College\CollegeCourseRepository;
use Illuminate\Support\Facades\Auth;

class CollegeCourseController extends Controller
{

    public function __construct(CollegeCourseRepository $Data)
    {
        $this->Data = $Data;
    }

    public function index(CollegeCourseDatatable $CollegeCourseDatatable)
    {
        return $CollegeCourseDatatable->render('College.Course.index');
    }

    public function create()
    {
        $course = Course::all();
        return view('College.Course.create',compact('course'));
    }

    public function store(CollegeCourseRequest $request)
    {
        $data = $this->Data->store($request->all());
        return redirect()->route('college.college-course.index',compact('data'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = CollegeCourse::find($id);
        $course = Course::all();
        return view('College.Course.edit', compact('data','course'));
    }

    public function update(EditCollegeCourseRequest $request, $id)
    {
        $data = $this->Data->store($request->all(),$id);
        return redirect()->route('college.college-course.index',compact('data'));
    }

    public function destroy($id)
    {
        $data = CollegeCourse::find($id);
        $data->delete();
        return $data;
    }
}
