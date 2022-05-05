<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalQuanty = 0; // tổng số lượng sp
    public $totaPrice = 0; // tổng giá

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalQuanty = $cart->totalQuanty;
            $this->totaPrice = $cart->totaPrice;
        }
    }
    public function AddCart($product, $id)
    {
        $newProduct = ['quanty' => 0, 'price' => $product->price, 'productInfo' => $product];
        if ($this->products) {
            if (array_key_exists($id,$this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] =  $newProduct['quanty'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totaPrice += $product->price;
        $this->totalQuanty++;
    }
    public function DeleteItemCart($id)
    {
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totaPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
