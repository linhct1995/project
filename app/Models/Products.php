<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    public $fillable = [
        'name', 'price','image','amount','cate_id','brand_id'
    ];
    public function cate()
    {
        return $this->belongsTo(Cate::class,'cate_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(Branding::class,'brand_id','id');
    }
    public function PrdAttValue()
    {
        return $this->hasMany(Product_ValueAtt::class,'id_prd','id');
    }
}
