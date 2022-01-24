<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class College extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $guard = 'college';
    public $table = 'colleges';

    protected $guarded = [
    ];
}
