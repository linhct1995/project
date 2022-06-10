<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = "attribute";
    public $fillable = [
        'name'
    ];
    public function attValue()
    {
        return $this->hasMany(Attribute_Values::class,'attribute_id','id');
    }
    public function ccc(){
        return $this->belongsToMany(Products::class,'product_attribute_values', 'attribute_id' ,'id_prd' );
    }
}
