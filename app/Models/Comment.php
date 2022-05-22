<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comment";
    public $fillable = [
        'customer_name','content','status','id_prd'
    ];
    public function commentPrd()
    {
        return $this->belongsTo(Products::class, 'id_prd', 'id');
    }
}
