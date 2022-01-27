<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\University\commonRequest;
use App\Repositories\University\CommonSettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommonSettingController extends Controller
{
    public function __construct(CommonSettingRepository $data)
    {
        $this->data = $data;
    }
    public function index()
    {
        $data = $this->data->index();
        $common_setting = $data[0];
        $subject = $data[1];
        return view('University.Common-Setting.create', compact('common_setting', 'subject'));
    }

    public function store(commonRequest $request)
    {
        $result = $this->data->store($request->all());
        Session::flash('success', 'Percentage Add Successfully !!');
        return redirect()->route('university.common_setting', compact('result'));
    }
}
