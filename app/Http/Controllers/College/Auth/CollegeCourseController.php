<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CollegeCourseDatatable;
use App\Http\Requests\College\CollegeCourseRequest;
use App\Http\Requests\College\EditCollegeCourseRequest;
use App\Models\CollegeCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CollegeCourseController extends Controller
{

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
        $data = new CollegeCourse();
        $data->college_id = Auth::user()->id;
        $data->course_id = $request->course_id;
        $data->seat_no = $request->seat_no;
        $data->reserved_seat = $request->reserved_seat;
        $data->merit_seat = $request->merit_seat;
        $data->save();
        return redirect()->route('college.college-course.index');
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
        $data = CollegeCourse::find($id);
        $data->course_id = $request->course_id;
        $data->seat_no = $request->seat_no;
        $data->reserved_seat = $request->reserved_seat;
        $data->merit_seat = $request->merit_seat;
        $data->save();
        return redirect()->route('college.college-course.index');
    }

    public function destroy($id)
    {
        $data = CollegeCourse::find($id);
        $data->delete();
        return $data;
    }
}
