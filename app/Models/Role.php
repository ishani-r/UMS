<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use HasFactory,Notifiable, HasRoles;

    protected $table = 'roles';
    protected $fillable = [
        'name',
        'guard_name'
    ];
    protected $guard='university';
}
