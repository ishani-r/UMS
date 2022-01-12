<?php

namespace App\Repositories\College;

use App\Interfaces\College\CollegeCourseInterface;
use App\Models\CollegeCourse;
use Illuminate\Support\Facades\Auth;

class CollegeCourseRepository implements CollegeCourseInterface
{
    public function store(array $array)
    {
        $data = new CollegeCourse();
        $data->college_id = Auth::user()->id;
        $data->course_id = $array['course_id'];
        $data->seat_no = $array['seat_no'];
        $data->reserved_seat = $array['reserved_seat'];
        $data->merit_seat = $array['merit_seat'];
        $data->save();
        return $data;
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
