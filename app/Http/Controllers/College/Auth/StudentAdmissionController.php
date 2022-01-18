<?php

namespace App\Http\Controllers\College\Auth;

use App\DataTables\StudentAdmissionDatatable;
use App\Http\Controllers\Controller;
use App\Models\AddmissionConfiram;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    public function index(StudentAdmissionDatatable $StudentAdmissionDatatable)
    {
        return $StudentAdmissionDatatable->render('College.StudentAdmission.index');
    }

    public function delete($id)
    {
        $admission = AddmissionConfiram::find($id);
        $admission->delete();
        return $admission;
    }
}
