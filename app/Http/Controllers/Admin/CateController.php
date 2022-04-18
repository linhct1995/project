<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function create()
    {
        return view('admin.categories.create_cate');
    }
    public function saveCate(Request $request)
    {
        $cate = Cate::create([
            'name' => $request->name
        ]);
        $cate->save();
        return redirect(route('list.cate'));
    }
    public function list()
    {
        $cate = Cate::all();
        return view('admin.categories.list_cate',compact('cate'));
    }
    public function delete($id)
    {
        $cate = Cate::find($id);
        $cate->delete();
        return redirect(route('list.cate'));
    }
    public function edit($id)
    {
        $cate = Cate::find($id);
        return view('admin.categories.edit_cate',compact('cate'));
    }
    public function saveEdit(Request $request,$id)
    {
        $cate = Cate::find($id);
        $cate ->fill($request->all());
        $cate->save();
        return redirect(route('list.cate'));
    }
    
}
