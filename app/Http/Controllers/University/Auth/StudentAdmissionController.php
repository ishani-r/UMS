<?php

namespace App\Http\Controllers\University\Auth;

use App\DataTables\AdmissionStudentDatatable;
use App\Http\Controllers\Controller;
use App\Models\Addmission;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdmissionStudentDatatable $AdmissionStudentDatatable)
    {
        return $AdmissionStudentDatatable->render('University.Student.index');
    }

    public function studentStatus(Request $request)
    {
        dd(1);
        $id = $request['id'];
        $college = Addmission::find($id);

        if ($college->status == "0") {
            $college->status = "1";
        } else {
            $college->status = "0";
        }
        $college->save();
        return $college;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
