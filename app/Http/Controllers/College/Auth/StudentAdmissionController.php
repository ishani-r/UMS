<?php

namespace App\Http\Controllers\College\Auth;

use App\DataTables\ReservedStudentDatatable;
use App\DataTables\StudentAdmissionDatatable;
use App\Http\Controllers\Controller;
use App\Mail\ReservedSeatMail;
use App\Models\Addmission;
use App\Models\AddmissionConfiram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StudentAdmissionController extends Controller
{
    public function index(StudentAdmissionDatatable $StudentAdmissionDatatable)
    {
        return $StudentAdmissionDatatable->render('College.StudentAdmission.index');
    }

    public function indexReserved(ReservedStudentDatatable $ReservedStudentDatatable)
    {
        return $ReservedStudentDatatable->render('College.StudentAdmission.indexReserved');
    }

    public function delete($id)
    {
        $admission = AddmissionConfiram::find($id);
        $admission->delete();
        return $admission;
    }

    public function reservedStatus(Request $request)
    {
        $data = Addmission::find($request->id);
        $user = User::where('id',$data->user_id)->first();
        $college_name = Auth::user()->name;
        // 1 = confirm 2 = rejected
        if ($request->is_approve == '1') {
            $data->status = '1';
            AddmissionConfiram::updateOrCreate(
                [
                    'addmission_id' => $data->id,
                ],
                [
                    'confirm_college_id' => Auth::user()->id,
                    'confirm_round_id' => '1',
                    'confirm_merit' => $data->merit,
                    'confirmation_type' => 'R'
                ]
            );
            $message = 'Congratulations, Your Admission is confirm ' . $college_name . 'in Reserved seat';
            Mail::to($user->email)->send(new ReservedSeatMail($message, $college_name));
        } else {
            $data->status = '2';
            $message = 'Sorry, Your Admission is Not confirm' . $college_name . 'in Reserved seat';
            Mail::to($user->email)->send(new ReservedSeatMail($message, $college_name));
        }
        $data->save();
        return $data;
    }
}
