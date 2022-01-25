<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CollegeMeritDatatable;
use App\Models\CollegeCourse;
use App\Models\Course;
use App\Models\MeritRound;
use App\Repositories\College\CollegeMeritRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\College\CollegeMeritRequest;
use App\Models\CollegeMerit;

class CollegeMeritController extends Controller
{
    public function __construct(CollegeMeritRepository $Data)
    {
        $this->Data = $Data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CollegeMeritDatatable $CollegeMeritDatatable)
    {
        return $CollegeMeritDatatable->render('College.Merit-Round.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = $this->Data->create();
        return view('College.Merit-Round.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollegeMeritRequest $request)
    {
        $merit = $this->Data->store($request->all());
        return redirect()->route('college.meritround.index', compact('merit'));
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
        $data = $this->Data->edit($id);
        $merit = $data[0];
        $course = $data[1];
        $round = $data[2];
        return view('College.Merit-Round.edit', compact('merit','course','round'));
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
        $merit = $this->Data->update($request->all(),$id);
        return redirect()->route('college.meritround.index',compact('merit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merit = CollegeMerit::find($id);
        $merit->delete();
        return $merit;
    }

    public function selRound(Request $request)
    {
        $meritround = MeritRound::where('course_id', $request->course)->get();
        return $meritround;
    }
    public function editSelRound(Request $request)
    {
        $meritround = MeritRound::where('course_id', $request->course)->get();
        return $meritround;
    }
}
