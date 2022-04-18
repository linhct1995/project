<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $cate = Cate::all();
        return view('admin.products.create_prd',compact('cate'));
    }
    public function saveAdd(Request $request)
    {
        
        if ($request->hasFile('up_image')) {
            $path = $request->file('up_image')->storeAs('public/uploads/products',  $request->up_image->getClientOriginalName());
            $image = str_replace('public/', '', $path);
        }
        $products = Products::create([
            'name' => $request->name,
            'status' => $request->status,
            'price' => $request->price,
            'description' => $request->description,
            'amount' => $request->amount,
            'cate_id' => $request->cate_id,
            'image' =>$image,
        ]);
        $products->save();
        return redirect(route('list.prd'));
    }
    public function list(Request $request){
        // $products = Products::all();
        $productQuery = Products::where('name', 'like', "%" . $request->keyword . "%");
        $products = $productQuery->paginate(3);
        // if ($request->key!= "") {
        //     $products = Products::where('name','LIKE', "%".$request->keyword."%")->get();
        // }else{
        //     $products=Products::all();
        // }
        
        return view('admin.products.list_prd',compact('products'));
    }
     public function delete($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect(route('list.prd'));
    }
    public function edit($id)
    {
        $products = Products::find($id);
        return view('admin.products.edit_prd',compact('products'));
    }
    public function saveEdit($id,Request $request)
    {
        $products = Products::find($id);
        if ($request->hasFile('up_image')) {
            $path = $request->file('up_image')->storeAs('public/uploads/products',  $request->up_image->getClientOriginalName());
            $products->image = str_replace('public/', '', $path);
        }
        $products->fill($request->all());
        $products->save();
        return redirect(route('list.prd'));
    }
}
