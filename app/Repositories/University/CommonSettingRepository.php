<?php

namespace App\Repositories\University;

use App\Interfaces\University\CommonSettingInterface;
use App\Models\CommonSetting;
use App\Models\Subject;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommonSettingRepository implements CommonSettingInterface
{
    public function index()
    {
        $common_setting = CommonSetting::all();
        $subject = Subject::all();
        return [$common_setting,$subject];
    }

    public function store(array $array)
    {
        DB::beginTransaction();
        try {
            foreach ($array['marks'] as $key => $val) {
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
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
        }
    }
}
