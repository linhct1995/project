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
        $property -> fill($req->all());
        $property->save();
        return redirect(route('create.attribute'));
    }
}
