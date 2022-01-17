<?php

namespace App\Repositories\College;

use App\Interfaces\College\CollegeMeritInterface;
use App\Models\CollegeCourse;
use App\Models\CollegeMerit;
use App\Models\Course;
use App\Models\MeritRound;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class CollegeMeritRepository implements CollegeMeritInterface
{
   public function create()
   {
      $course = CollegeCourse::with('course')->where('college_id', Auth::user()->id)->get();
      return $course;
   }

   public function store(array $array)
   {
      // dd($array);
      DB::beginTransaction();
      try {
         $merit = CollegeMerit::updateOrCreate(
            [
               'college_id' => Auth::user()->id,
               'course_id' => $array['course_id'],
               'merit_round_id' => $array['round_no'],
            ],
            [
               'college_id' => Auth::user()->id,
               'course_id' => $array['course_id'],
               'merit_round_id' => $array['round_no'],
               'merit' => $array['merit'],
            ]
         );
         // dd($merit);
         DB::commit();
         return $merit;
      } catch (Exception $e) {
         DB::rollBack();
         Log::info($e);
         dd(1);
      }
   }

   public function edit($id)
   {
      $merit = CollegeMerit::find($id);
      $course = CollegeCourse::with('course')->where('college_id', Auth::user()->id)->get();
      foreach ($course as $courses) {
         $round = MeritRound::where('course_id', $courses->course_id)->get();
      }
      return [$merit, $course, $round];
   }

   public function update(array $array, $id)
   {
      $merit = CollegeMerit::find($id);
      // $merit->course_id = $array['course_id'];
      // $merit->merit_round_id = $array['round_no'];
      $merit->merit = $array['merit'];
      $merit->save();
      return $merit;
   }
}
