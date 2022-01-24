<?php

namespace App\Interfaces\College;

interface CollegeMeritInterface
{
   public function create();
   public function store(array $array);
   public function edit($id);
   public function update(array $array, $id);
}
