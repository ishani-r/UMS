<?php

namespace App\Repositories\College;

use App\Interfaces\College\CollegeCourseInterface;
use App\Models\CollegeCourse;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CollegeCourseRepository implements CollegeCourseInterface
{
    public function store(array $array)
    {
        DB::beginTransaction();
        try {
            $data = CollegeCourse::updateOrCreate(
                [
                    'course_id' => $array['course_id'],
                ],
                [
                    'college_id' => Auth::user()->id,
                    'course_id' => $array['course_id'],
                    'seat_no' => $array['seat_no'],
                    'reserved_seat' => $array['reserved_seat'],
                    'merit_seat' => $array['merit_seat'],
                ]
            );
            DB::commit();
            return $data;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
        }
        // $data = new CollegeCourse();
        // $data->college_id = Auth::user()->id;
        // $data->course_id = $array['course_id'];
        // $data->seat_no = $array['seat_no'];
        // $data->reserved_seat = $array['reserved_seat'];
        // $data->merit_seat = $array['merit_seat'];
        // $data->save();
        // return $data;
    }

    public function update(array $array, $id)
    {
        $data = CollegeCourse::find($id);
        $data->course_id = $array['course_id'];
        $data->seat_no = $array['seat_no'];
        $data->reserved_seat = $array['reserved_seat'];
        $data->merit_seat = $array['merit_seat'];
        $data->save();
        return $data;
    }
}
