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
        if ($request->hasFile('up_image')) {
            $path = $request->file('up_image')->storeAs('public/uploads/products',  $request->up_image->getClientOriginalName());
            $image = str_replace('public/', '', $path);
        }
        $brand = Branding::create([
            'name' => $request->name,
            'image' => $image,
        ]);
        $brand->save();
        return redirect(route('create.brand'));
    }
        
}
