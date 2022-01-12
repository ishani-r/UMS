<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\University\CommonSettingRepository;
use Illuminate\Http\Request;


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
        return view('University.Common-Setting.create', compact('common_setting','subject'));
    }

    public function store(Request $request)
    {
        $result = $this->data->store($request->all());
        return redirect()->route('university.common_setting',compact('result'));
    }
}
