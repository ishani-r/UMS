<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\MeritRoundDatatable;
use App\Http\Requests\University\EditMeritRound;
use App\Models\Course;
use App\Models\MeritRound;
use App\Http\Requests\University\MeritRoundRequest;
use App\Repositories\University\MeriteRoundRepository;

class MeritRoundController extends Controller
{
    public function __construct(MeriteRoundRepository $Merit)
    {
        $this->Merit = $Merit;
    }

    public function index(MeritRoundDatatable $MeritRoundDatatable)
    {
        return $MeritRoundDatatable->render('University.Merit-Round.index');
    }

    public function create()
    {
        $course = Course::all();
        return view('University.Merit-Round.create', compact('course'));
    }

    public function store(MeritRoundRequest $request)
    {
        // $merits = MeritRound::where('round_no',$request->round_no)->where();
        $data = $this->Merit->store($request->all());
        return redirect()->route('university.meritround.index', compact('data'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = $this->Merit->edit($id);
        $course = $data[0];
        $merit = $data[1];
        return view('university.Merit-Round.edit', compact('course', 'merit'));
    }

    public function update(EditMeritRound $request, $id)
    {
        $data = $this->Merit->update($request->all(), $id);
        return redirect()->route('university.meritround.index', compact('data'));
    }

    public function destroy($id)
    {
        $meritround = MeritRound::find($id);
        $meritround->delete();
        return $meritround;
    }

    public function status(Request $request)
    {
        $id = $request['id'];
        $meritround = MeritRound::find($id);

        if ($meritround->status == "0") {
            $meritround->status = "1";
        } else {
            $meritround->status = "0";
        }
        $meritround->save();
        return $meritround;
    }
}
