<?php

namespace App\Repositories;

use App\Interfaces\StudentMarksInterface;
use App\Models\Addmission;
use App\Models\CommonSetting;
use App\Models\StudentMark;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentMarksRepository implements StudentMarksInterface
{
   public function store(array $array)
   {
      DB::beginTransaction();
      try {
         foreach ($array['obtain_mark'] as $key => $val) {
            $result = StudentMark::updateOrCreate(
               [
                  'user_id' => Auth::user()->id,
                  'subject_id' => $key,
               ],
               [
                  'user_id' => Auth::user()->id,
                  'subject_id' => $key,
                  'total_mark' => 100,
                  'obtain_mark' => $val,
               ]
            );
         }
         // Merit 
         $studentmark = StudentMark::with('commonsetting')->where('user_id', Auth::guard('web')->user()->id)->get();
         $merit = 0;
         $com_total = 0;
         foreach ($studentmark as $studentmarks) {
            $total = ($studentmarks->obtain_mark * $studentmarks->commonsetting['marks'] ?? 0) / 100;
            $merit = $merit + $total;
            $com_total = $com_total + $studentmarks->commonsetting['marks'];
         }
         $final_merit = $merit / $com_total * 100;
         Addmission::updateOrCreate(
            [
               'user_id' => Auth::user()->id,
            ],
            [
               'user_id' => Auth::user()->id,
               'merit' => round($final_merit, 2),
               'status' => 1,
            ]
         );
         DB::commit();
         return $result;
      } catch (Exception $e) {
         DB::rollBack();
         Log::info($e);
         dd(1);
      }
   }
}
