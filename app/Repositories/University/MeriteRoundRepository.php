<?php

namespace App\Repositories\University;

use App\Interfaces\University\MeriteRoundInterface;
use App\Models\Course;
use App\Models\MeritRound;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class MeriteRoundRepository implements MeriteRoundInterface
{
    public function store(array $array)
    {
        DB::beginTransaction();
        try {
            $data = MeritRound::updateOrCreate(
                [
                    'round_no' => $array['round_no'],
                    'course_id' => $array['course_id'],
                ],
                [
                    'round_no' => $array['round_no'],
                    'course_id' => $array['course_id'],
                    'start_date' => $array['start_date'],
                    'end_date' => $array['end_date'],
                    'merit_result_declare_date' => $array['merit_result_declare_date'],
                ]
            );
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
        }
    }

    public function edit($id)
    {
        $course = Course::all();
        $merit = MeritRound::find($id);
        return [$course, $merit];
    }

    public function update(array $array, $id)
    {
        DB::beginTransaction();
        try {
            $data = MeritRound::find($id);
            $data->round_no = $array['round_no'];
            $data->course_id = $array['course_id'];
            $data->start_date = $array['start_date'];
            $data->end_date = $array['end_date'];
            $data->merit_result_declare_date = $array['merit_result_declare_date'];
            $data->save();
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
        }
    }
}
