<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\MeritRoundDatatable;
use App\Models\Course;
use App\Models\MeritRound;
use App\Http\Requests\College\MeritRoundRequest;

class MeritRoundController extends Controller
{

    public function index(MeritRoundDatatable $MeritRoundDatatable)
    {
        return $MeritRoundDatatable->render('University.Merit-Round.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        return view('University.Merit-Round.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeritRoundRequest $request)
    {
        $data = new MeritRound();
        $data->round_no = $request->round_no;
        $data->course_id = $request->course_id;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->merit_result_declare_date = $request->merit_result_declare_date;
        $data->save();
        return redirect()->route('university.meritround.index');
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
