<?php

namespace App\Interfaces\University;

interface CollegeInterface
{
   public function store(array $array);
   public function show($id);
   public function edit($id);
   public function update(array $array, $id);
}
