<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class University extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles;
    protected $guard = 'university';
    public $table = 'universities';

    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'address',
        'password',
    ];
}


