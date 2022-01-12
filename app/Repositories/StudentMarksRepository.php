<?php

namespace App\Repositories;

use App\Interfaces\StudentMarksInterface;
use App\Models\StudentMark;
use Illuminate\Support\Facades\DB;

class StudentMarksRepository implements StudentMarksInterface
{
   public function store(array $array)
   {
      dd($array['obtain_mark']);
      DB::beginTransaction();
      try {
         foreach ($array['obtain_mark'] as $key => $val) {
            $result = StudentMark::where('id', $key)->first();
            if (isset($result)) {
               $insertData = [
                  'subject_id' => $key,
                  'obtain_mark' => $val,
               ];
               $result->update($insertData);
            } else {
               $insertData = [
                  'subject_id' => $key,
                  'obtain_mark' => $val,
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
