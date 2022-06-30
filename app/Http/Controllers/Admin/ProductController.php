<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePrd;
use App\Models\Attribute;
use App\Models\Attribute_Values;
use App\Models\Branding;
use App\Models\Cate;
use App\Models\Comment;
use App\Models\Product_ValueAtt;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        $cate = Cate::all();
        $attribute = Attribute::all();
        $brands = Branding::all();
        return view('admin.products.create_prd', compact('cate', 'attribute', 'brands'));
    }
    public function saveAdd(ValidatePrd $request)
    {
        if ($image = $request->file('up_image')) {
            $destinationPath = 'image/products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $image = "$profileImage";
        }
        $products = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'cate_id' => $request->cate_id,
            'image' => $image,
            'brand_id' => $request->brand_id
        ]);
        foreach ($request->attribute_values as $key => $values) {
            Product_ValueAtt::create([
                'id_prd' => $products->id,
                'values_id' =>   $values,
                'attribute_id' => $request->attribute_id[$key]
            ]);
        }
        return redirect(route('list.prd'));
    }
    public function list(Request $request)
    {
        $productQuery = Products::where('name', 'like', "%" . $request->keyword . "%");
        $products = $productQuery->paginate(3);
        return view('admin.products.list_prd', compact('products'));
    }
    public function delete($id)
    {
        $products = Products::find($id);
        $products->Attribute()->detach();
        $products->delete();
        return redirect(route('list.prd'));
    }
    public function edit($id)
    {
        $products = Products::find($id);
        $cate = Cate::all();
        $brand = Branding::all();
        $attribute = Attribute::all();
        $prd_att = DB::table('product_attribute_values')->where('id_prd', $id)->get();
        $att_value = [];
        foreach($prd_att as $item){
            $att_value[$item->attribute_id] = $item->values_id;
        }
        return view('admin.products.edit_prd', compact('products', 'cate', 'brand', 'attribute','att_value'));
    }
    public function saveEdit($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'price' => 'required',
                'amount' => 'required',
                'up_image' => 'mimes:jpg,bmp,png',
            ],
            [
                'name.required' => 'Hãy nhập tên sản phẩm',
                'name.max' => 'Tên sản tối đa 50 ký tự',
                'price.required' => 'Hãy nhập giá sp',
                'amount.required' => 'Hãy nhập số lượng sp',
                'up_image.mimes' => 'Ảnh chỉ nhận đuôi :jpg,bmp,png'
            ]
        );
        $products = Products::find($id);
        if ($image = $request->file('up_image')) {
            $destinationPath = 'image/products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $products->image = "$profileImage";
        }
        foreach ($request->attribute_values as $key => $values) {
            $attr = Product_ValueAtt::where('id_prd', $products->id)
                ->where('attribute_id', $key)->first();
            $attr->fill([
                'values_id' => $values
            ]);
            $attr->save();
        }
        $products->save();
        return redirect(route('list.prd'));
    }
    public function detail($id)
    {
        $detail = Products::find($id);
        $getProductSame = Products::all();
        $ccc = $this->getProductSame($id);
        $getAttriValue =  $this->atribueteValue($id);
        $comment = Comment::select('content', 'customer_name','status')->where('id_prd', $id)->get();
        /*
        lấy dữ liệu product theo cate_id
        */
        return view('frontend.detail_prd', compact('detail', 'comment','getAttriValue','ccc'));
    }
    public function atribueteValue($id)
    {
        $zzz = [];
        $fff = Product_ValueAtt::where('id_prd',$id)->get();
        foreach($fff as $hhh){
            $zzz[Attribute::find($hhh->attribute_id)->name] = Attribute_Values::find($hhh->values_id)->values;
        }
       return $zzz;
    }
    public function getProductSame($id)
    {

        $vvv = Products::find($id);
            // lấy tất cả  sản phẩm có brand giống nhau
            $ccc = DB::table('products')->where('brand_id',$vvv->brand_id)->inRandomOrder()->limit(4)->get();
        return $ccc;
    }
}
