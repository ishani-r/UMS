<?php

namespace App\Interfaces\University;

interface MeriteRoundInterface
{
    public function store(array $array);
    public function edit($id);
    public function update(array $array, $id);
}
