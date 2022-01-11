<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CourseDatatable;
use App\DataTables\SubjectDatatable;
use App\Http\Requests\College\CourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(CourseDatatable $CourseDatatable)
    {
        return $CourseDatatable->render('University.Course.index');
    }

    public function indexSubject(SubjectDatatable $SubjectDatatable)
    {
        return $SubjectDatatable->render('University.Subject.index');
    }

    public function create()
    {
        return view('University.Course.create');
    }

    public function store(CourseRequest $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->status = '1';
        $course->save();
        return redirect()->route('university.course.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('University.Course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return $course;
    }
}
