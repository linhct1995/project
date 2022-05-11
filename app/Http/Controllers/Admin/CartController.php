<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order_Detail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function list()
    {
        $cart = Cart::paginate(2);
        return view('admin.cart.list_cart',compact('cart'));
    }
    public function orderDetail($id)
    {
        $cart = Cart::find($id);
        $order_detail = Order_Detail::where('order_id', $id)->get();
        return view('admin.cart.order_detail',compact('cart','order_detail'));
    }
}
