<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Branding;
use App\Models\Products;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $req)
    {
        $productQuery = Products::where('name', 'like', "%" . $req->keyword . "%");
        $product = $productQuery->paginate(8);
        $brand = Branding::all();
        return view('frontend.home',compact('product','brand'));
    }
}
