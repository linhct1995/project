<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin_User extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $table = "admin_user";
    protected $guarded = 'admin';
    public $fillable = [
        'name', 'email', 'password','type'
    ];
}
