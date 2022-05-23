<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePrd;
use App\Models\Cate;
use App\Models\Comment;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        $cate = Cate::all();
        return view('admin.products.create_prd', compact('cate'));
    }
    public function saveAdd(ValidatePrd $request)
    {

        if ($request->hasFile('up_image')) {
            $path = $request->file('up_image')->storeAs('public/uploads/products',  $request->up_image->getClientOriginalName());
            $image = str_replace('public/', '', $path);
        }
        $products = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'amount' => $request->amount,
            'cate_id' => $request->cate_id,
            'image' => $image,
        ]);
        $products->save();
        return redirect(route('list.prd'));
    }
    public function list(Request $request)
    {
        // $products = Products::all();
        $productQuery = Products::where('name', 'like', "%" . $request->keyword . "%");
        $products = $productQuery->paginate(3);
        // if ($request->key!= "") {
        //     $products = Products::where('name','LIKE', "%".$request->keyword."%")->get();
        // }else{
        //     $products=Products::all();
        // }

        return view('admin.products.list_prd', compact('products'));
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
        return view('admin.products.edit_prd', compact('products'));
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate(
            [
                'name'=>'required|max:50',
                'price'=>'required',
                'amount'=>'required',
                'description'=>'required',
                'up_image'=>'mimes:jpg,bmp,png',
            ],
            [
                'name.required'=>'Hãy nhập tên sản phẩm',
                'name.max'=>'Tên sản tối đa 50 ký tự',
                'price.required'=>'Hãy nhập giá sp',
                'amount.required'=>'Hãy nhập số lượng sp',
                'description.required'=>'Hãy nhập mô tả sản phẩm',
                'up_image.mimes'=>'Ảnh chỉ nhận đuôi :jpg,bmp,png'
            ]
        );
        $products = Products::find($id);
        if ($request->hasFile('up_image')) {
            $path = $request->file('up_image')->storeAs('public/uploads/products',  $request->up_image->getClientOriginalName());
            $products->image = str_replace('public/', '', $path);
        }
        $products->fill($request->all());
        $products->save();
        return redirect(route('list.prd'));
    }
    public function detail($id)
    {
        $detail = Products::find($id);
        // $comment = DB::table('comment')
        //     ->select('content', 'customer_name')
        //     ->where('id_prd',$id)
        //     ->get();
        $comment = Comment::select('content','customer_name')->where('id_prd',$id)->get();
        return view('frontend.detail_prd',compact('detail','comment'));
    }
}
