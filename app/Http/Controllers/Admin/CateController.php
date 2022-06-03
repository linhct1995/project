<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CateController extends Controller
{
    public function create()
    {
        $cate = Cate::all();
        return view('admin.categories.create_cate' , compact('cate'));
    }
    public function saveCate(Request $request)
    {
        $request->validate(
            [
                'name' => [
                    'required', 'max:30',
                    Rule::unique('categories')
                ],
            ],
            [
                'name.required' => 'Hãy nhập tên sản phẩm danh mục sp',
                'name.unique' => 'Tên đã tồn tại',
                'name.max' => 'Tên sản tối đa 50 ký tự',
            ]
        );
        if (isset(Cate::find($request->parent)->parent) == null ) {
            $cate = Cate::create([
                'name' => $request->name,
                'parent' => 0
            ]);
            $cate->save();        
        }else{
            $parent = Cate::find($request->parent)->id;
            $cate = Cate::create([
                'name' => $request->name,
                'parent' => $parent
            ]);
            $cate->save();
        }
        return redirect(route('create.cate'));
    }
    public function list()
    {
        $cate = Cate::all();
        return view('admin.categories.list_cate', compact('cate'));
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
        return view('admin.categories.edit_cate', compact('cate'));
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
        $cate = Cate::find($id);
        $cate->fill($request->all());
        $cate->save();
        return redirect(route('list.cate'));
    }
}
