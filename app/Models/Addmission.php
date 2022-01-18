<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addmission extends Model
{
    use HasFactory;

    protected $table = 'addmissions';
    protected $fillable = [
        'user_id',
        'merit',
        'college_id',
        'addmission_date',
        'addmission_code',
        'status',
        'course_id',
        'merit_round_id',
    ];
    protected $casts = [
        'college_id' => 'array'
    ];
    public function college()
    {
        return $this->hasOne(College::class,'id','college_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
}
