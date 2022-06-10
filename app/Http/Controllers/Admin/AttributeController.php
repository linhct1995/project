<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function create()
    {
        return view("admin.attribute.create");
    }
    public function saveAdd(Request $req)
    {
        $property = new Attribute();
        $property->fill($req->all());
        $property->save();
        return redirect(route('create.attribute'));
    }
    public function list()
    {
        $attribute = Attribute::all();
        return view('admin.attribute.list_attr', compact('attribute'));
    }
    public function delete($id)
    {
        $attribute = Attribute::find($id);
        $attribute->attValue()->delete(); 
        $attribute->delete();    
        return redirect(route('list.attribute'));
    }
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        return view('admin.attribute.edit_attr' ,compact('attribute'));
    }
    public function saveEdit(Request $req , $id)
    {
        $attribute = Attribute::find($id);
        $attribute->fill($req->all());
        $attribute->save();
        return redirect(route('list.attribute'));
    }
}
