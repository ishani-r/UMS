<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddmissionConfiram extends Model
{
    use HasFactory;

    protected $table = 'addmission_confirmations';
    protected $fillable = [
        'addmission_id',
        'confirm_college_id',
        'confirm_merit',
        'confirm_round_id',
        'confirmation_type',
    ];
    public function college()
    {
        return $this->hasOne(College::class,'id','college_id');
    }
    public function admission()
    {
        return $this->hasOne(Addmission::class,'id','confirm_college_id');
    }
}
