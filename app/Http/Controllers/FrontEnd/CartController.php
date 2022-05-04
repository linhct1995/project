<?php

namespace App\Http\Controllers\FrontEnd;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddCart(Request $req,$id)
    {
        // $product = Products::where('id',$id)->get();
        $product = DB::table('products')->where('id',$id)->first();
        if ($product != null) {
            
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product,$id);
            // dd($newCart);
            $req->session()->put('Cart',$newCart);
        }
        return view('frontend.cart',compact('newCart'));
    }
}
