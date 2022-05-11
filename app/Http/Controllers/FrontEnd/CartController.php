<?php

namespace App\Http\Controllers\FrontEnd;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Cart as ModelsCart;
use App\Models\Order_Detail;
use App\Models\Products;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddCart(Request $req, $id)
    {
        // $product = Products::where('id',$id)->get();
        $product = DB::table('products')->where('id', $id)->first();
        if ($product != null) {

            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            // dd($newCart);
            $req->session()->put('Cart', $newCart);
        }
        return view('frontend.cart');
    }

    public function DeleteItemCart(Request $req, $id)
    {

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (count($newCart->products) > 0) {
            $req->session()->put('Cart', $newCart);
        } else {
            $req->session()->forget('Cart');
        }
        // dd($newCart);

        return view('frontend.cart');
    }
    public function ListCart()
    {
        return view('frontend.list_cart');
    }
    public function DeleteListItemCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (count($newCart->products) > 0) {
            $req->session()->put('Cart', $newCart);
        } else {
            $req->session()->forget('Cart');
        }
        // dd($newCart);

        return view('frontend.list_cart_front');
    }
    public function SaveListItemCart(Request $req, $id, $quanty)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);
        $req->session()->put('Cart', $newCart);

        // dd($newCart);

        return view('frontend.list_cart_front');
    }
    public function Checkout()
    {
        return view('frontend.check_out');
    }
    public function SaveCheckout(Request $req)
    {
        // foreach(Session::get("Cart")->products as $item){
        //     dd($item['productInfo']->name);
        // }
        // dd(Session::get("Cart")->products);
        $order = ModelsCart::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'totalProduct' => Session::get("Cart")->totalQuanty,
            'totalPrice' => Session::get("Cart")->totaPrice,          
        ]);
        foreach(Session::get("Cart")->products as $item){
            Order_Detail::create([
                'order_id' => $order->id,
                'name_prd' => $item['productInfo']->name,
                'image' => $item['productInfo']->image,
                'price' => $item['productInfo']->price,
                'quantity' => $item['quanty'],
                'totalPrice' => $item['price'],
                
            ]);
        };
        $order->save();
    }
}
