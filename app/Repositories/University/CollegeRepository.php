<?php

namespace App\Repositories\University;

use App\Interfaces\University\BrandInterface;
use App\Models\BrandSelect;
use App\Models\University;
use Illuminate\Support\Facades\Auth;

class CollegeRepository implements BrandInterface
{
   public function selectedBrand(array $array)
   {
      $selected_brand_id = $array['select_id'];
      $a = implode(',' , $selected_brand_id);
      $id = Auth::user()->id;
      $seller = University::find($id);
      $seller->brand_id = $a;
      $seller->save();
      return $seller;
   }
}
