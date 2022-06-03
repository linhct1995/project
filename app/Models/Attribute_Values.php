<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_Values extends Model
{
    use HasFactory;
    protected $table = "attribute_values";
    public $fillable = [
        'values','attribute_id'
    ];
}
