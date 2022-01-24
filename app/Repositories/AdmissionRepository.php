<?php

namespace App\Repositories;

use App\Interfaces\AdmissionInterface;
use App\Models\Addmission;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdmissionRepository implements AdmissionInterface
{
   public function store(array $array)
   {
      DB::beginTransaction();
      try {
         $selected_college = (array)$array['college_id'];
         $course = Course::where('id', $array['course_id'])->select('name')->first();
         $addmission_code = '#' . $course->name . mt_rand(100, 999);
         // $a = 0;
         $admission = Addmission::where('user_id', Auth::user()->id)->first();
         if($admission == NULL){
            $data = Addmission::updateOrCreate(
               [
                  'user_id' => Auth::user()->id,
               ],
               [
                  'user_id' => Auth::user()->id,
                  'course_id' => $array['course_id'],
                  'merit_round_id' => '1',
                  'college_id' => $selected_college,
                  'addmission_date' => date("Y-m-d"),
                  'addmission_code' => $addmission_code,
               ]
            );
         } else {
            $data = Addmission::updateOrCreate(
               [
                  'user_id' => Auth::user()->id,
               ],
               [
                  'user_id' => Auth::user()->id,
                  'course_id' => $array['course_id'],
                  'merit_round_id' => $admission->merit_round_id + '1',
                  'college_id' => $selected_college,
                  'addmission_date' => date("Y-m-d"),
                  'addmission_code' => $addmission_code,
               ]
            );
         }
         DB::commit();
         return $data;
      } catch (Exception $e) {
         DB::rollBack();
         Log::info($e);
         dd(1);
      }
   }
}
