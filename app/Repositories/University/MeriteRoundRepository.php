<?php

namespace App\Repositories\University;

use App\Interfaces\University\MeriteRoundInterface;
use App\Models\MeritRound;

class MeriteRoundRepository implements MeriteRoundInterface
{
    public function store(array $array)
    {
        $data = new MeritRound();
        $data->round_no = $array['round_no'];
        $data->course_id = $array['course_id'];
        $data->start_date = $array['start_date'];
        $data->end_date = $array['end_date'];
        $data->merit_result_declare_date = $array['merit_result_declare_date'];
        $data->save();
        return $data;
    }
}
