<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branding;
use Illuminate\Http\Request;

class BrandingController extends Controller
{
    public function create()
    {
        return view('admin.brand.create');
    }
    public function saveBrand( Request $request)
    {
        if ($image = $request->file('up_image')) {
            $destinationPath = 'image/brands/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $image = "$profileImage";
        }
        $brand = Branding::create([
            'name' => $request->name,
            'image' => $image,
        ]);
        $brand->save();
        return redirect(route('list.brand'));
    }
    public function list(Request $req)
    {
        $brandQuery = Branding::where('name', "like",'%'.$req->keyword.'%');
        $brand = $brandQuery->paginate(6);
        return view('admin.brand.list',compact('brand'));
    }

    public function delete($id)
    {
        $brand = Branding::find($id);
        $brand->delete();
        return redirect(route('list.brand'));
    }
    public function edit($id)
    {

        $brand = Branding::find($id);
        return view('admin.brand.edit_brand', compact('brand'));
    }
    public function saveEdit(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
            ],
            [
                'name.required' => 'Hãy nhập tên sản phẩm',
                'name.max' => 'Tên sản tối đa 50 ký tự',
            ]
        );
        $brand = Branding::find($id);
        if ($image = $request->file('up_image')) {
            $destinationPath = 'image/brands/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $brand->image = "$profileImage";
        }
        $brand->fill($request->all());
        $brand->save();
        return redirect(route('list.brand'));
    }
}
