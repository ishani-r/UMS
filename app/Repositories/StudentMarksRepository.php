<?php

namespace App\Repositories;

use App\Interfaces\StudentMarksInterface;
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
            $result = StudentMark::where('id', $key)->first();
            if (isset($result)) {
               $insertData = [
                  'subject_id' => $key,
                  'obtain_mark' => $val,
               ];
               $result->update($insertData);
            } else {
               $insertData = [
                  'user_id' => Auth::user()->id,
                  'subject_id' => $key,
                  'total_mark' => 100,
                  'obtain_mark' => $val,
               ];
               $result = StudentMark::insert($insertData);
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
