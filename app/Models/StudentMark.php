<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $table = 'student_marks';
    protected $fillable = [
        'user_id',
        'subject_id',
        'total_mark',
        'obtain_mark',
    ];

    public function subject()
    {
        return $this->hasOne(Subject::class,'id','subject_id');
    }

    public function commonsetting()
    {
        return $this->hasOne(CommonSetting::class,'subject_id','subject_id');
    }
}
