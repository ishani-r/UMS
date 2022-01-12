<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Repositories\StudentMarksRepository;
use Illuminate\Http\Request;

class StudentMarksController extends Controller
{
    public function __construct(StudentMarksRepository $Data)
    {
        $this->Data = $Data;
    }

    public function index()
    {
        $subjects = Subject::all();
        return view('Student.marks',compact('subjects'));
    }

    public function store(Request $request)
    {
        return $this->Data->store($request->all());
    }
}
