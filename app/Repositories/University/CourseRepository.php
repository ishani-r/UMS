<?php

namespace App\Repositories\University;

use App\Interfaces\University\CourseInterface;
use App\Models\Course;

class CourseRepository implements CourseInterface
{
    public function store(array $array)
    {
        $course = new Course();
        $course->name = $array['name'];
        $course->status = '1';
        $course->save();
        return $course;
    }
}
