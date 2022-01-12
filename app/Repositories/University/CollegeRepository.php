<?php

namespace App\Repositories\University;

use App\Interfaces\University\CollegeInterface;
use App\Models\BrandSelect;
use App\Models\College;
use App\Models\University;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\CollegeRegisterMail;
use Illuminate\Support\Facades\Mail;

class CollegeRepository implements CollegeInterface
{
   public function store(array $array)
   {
      $college = new College();
      $college->name = $array['name'];
      $college->email = $array['email'];
      $college->contact_no = $array['contact_no'];
      $college->address = $array['address'];
      $college->password = Hash::make($array['password']);
      $logo = uploadFile($array['logo'], 'college');
      $college->logo = $logo;
      $college->status = '0';
      $email = $array['email'];
      $password = $array['password'];
      Mail::to($array['email'])->send(new CollegeRegisterMail($email, $password));
      $college->save();
   }

   public function show($id)
   {
      $college = College::find($id);
      return $college;
   }

   public function edit($id)
   {
      $college = College::find($id);
      return $college;
   }

   public function update(array $array, $id)
   {
      $college = College::find($id);
      $college->name = $array['name'];
      $college->email = $array['email'];
      $college->contact_no = $array['contact_no'];
      $college->address = $array['address'];
      $logo = uploadFile($array['logo'], 'college');
      $college->logo = $logo;
      $college->save();
   }
}
