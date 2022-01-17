<?php

namespace App\Http\Controllers\College\Auth;

use App\DataTables\StudentAdmissionDatatable;
use App\Http\Controllers\Controller;
use App\Models\Addmission;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    public function index(StudentAdmissionDatatable $StudentAdmissionDatatable)
    {
        return $StudentAdmissionDatatable->render('College.StudentAdmission.index');
    }

    public function delete($id)
    {
        $admission = Addmission::find($id);
        $admission->delete();
    }
    public function confirm(Request $request)
    {
        dd($request->toArray());
    }
}
