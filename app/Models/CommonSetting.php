<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonSetting extends Model
{
    use HasFactory;

    protected $table = 'common_settings';
    protected $fillable = [
        'subject_id',
        'marks',
    ];

    public function subject()
    {
        return $this->hasOne(Subject::class,'id','subject_id');
    }
}
