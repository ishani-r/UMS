<?php

namespace App\Repositories;

use App\Interfaces\StudentMarksInterface;

class StudentMarksRepository implements StudentMarksInterface
{
   public function store(array $array)
   {
      dd($array);
   }
}
