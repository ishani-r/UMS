<?php

namespace App\Interfaces\College;

interface CollegeCourseInterface
{
    public function store(array $array);
    public function update(array $array, $id);
}
