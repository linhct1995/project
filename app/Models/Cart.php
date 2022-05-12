<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "order";
    public $fillable = [
        'name','phone','address','totalProduct','totalPrice'
    ];
    // public function realtime()
    // {
    //     return $this->belongsToMany(self::class)
    // }
}
