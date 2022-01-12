<?php

namespace App\Http\Controllers\University\Auth;

use App\Http\Controllers\Controller;
use App\Models\CommonSetting;
use App\Models\Subject;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommonSettingController extends Controller
{
    public function index()
    {
        $common_setting = CommonSetting::all();
        $subject = Subject::all();
        return view('University.Common-Setting.create', compact('common_setting','subject'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->marks as $key => $val) {
                $result = CommonSetting::where('id', $key)->first();
                if (isset($result)) {
                    $insertData = [
                        'subject_id' => $key,
                        'marks' => $val,
                    ];
                    $result->update($insertData);
                } else {
                    $insertData = [
                        'subject_id' => $key,
                        'marks' => $val,
                    ];
                    $result = CommonSetting::insert($insertData);
                }
            }
            DB::commit();
            return redirect()->route('university.common_setting');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
        }
    }
}
