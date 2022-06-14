<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Branding;
use App\Models\Products;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $product = Products::all();
        $brand = Branding::all();
        return view('frontend.home',compact('product','brand'));
    }
}
