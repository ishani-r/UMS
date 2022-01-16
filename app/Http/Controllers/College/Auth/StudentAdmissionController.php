<?php

namespace App\Http\Controllers\College\Auth;

use App\DataTables\StudentAdmissionDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    public function index(StudentAdmissionDatatable $StudentAdmissionDatatable)
    {
        return $StudentAdmissionDatatable->render('College.StudentAdmission.index');
    }

    public function delete($id)
    {
        dd($id);
    }
}
