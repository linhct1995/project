<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_ValueAtt extends Model
{
    use HasFactory;
    protected $table = "product_attribute_values";
    public $fillable = [
        'values_id','id_prd','attribute_id'
    ];
    
}
