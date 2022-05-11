<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    public $fillable = [
        'name_prd', 'image', 'price', 'quantity', 'order_id', 'totalPrice'
    ];
    // public function orderDetail()
    // {
    //     return $this->belongsTo(Cart::class, 'order_id', 'id');
    // }
}
