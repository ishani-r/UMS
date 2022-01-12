<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CollegeDatatable;
use App\Models\College;
use App\Http\Requests\University\CollegeRequest;

use App\Repositories\University\CollegeRepository;

class CollegeController extends Controller
{
    public function __construct(CollegeRepository $College)
    {
        $this->College = $College;
    }

    public function index(CollegeDatatable $CollegeDatatable)
    {
        return $CollegeDatatable->render('University.College.index');
    }

    public function create()
    {
        return view('University.College.create');
    }

    public function store(CollegeRequest $request)
    {
        $college = $this->College->store($request->all());
        return redirect()->route('university.college.index', compact('college'));
    }

    public function show($id)
    {
        $college = College::find($id);
        return view('University.College.show', compact('college'));
    }

    public function edit($id)
    {
        $college = College::find($id);
        return view('University.College.edit', compact('college'));
    }

    public function update(Request $request, $id)
    {
        $college = College::find($id);
        $college->name = $request->name;
        $college->email = $request->email;
        $college->contact_no = $request->contact_no;
        $college->address = $request->address;
        $logo = uploadFile($request['logo'], 'college');
        $college->logo = $logo;
        $college->save();
        return redirect()->route('university.college.index');
    }

    public function destroy($id)
    {
        $college = College::find($id);
        $college->delete();
        return $college;
    }

    public function status(Request $request)
    {
        $id = $request['id'];
        $college = College::find($id);

        if ($college->status == "0") {
            $college->status = "1";
        } else {
            $college->status = "0";
        }
        $college->save();
        return $college;
    }
}
