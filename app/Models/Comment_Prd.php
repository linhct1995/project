<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_Prd extends Model
{
    use HasFactory;
    protected $table = "comment_prd";
    public $fillable = [
        'id_comment','id_prd'
    ];
}
