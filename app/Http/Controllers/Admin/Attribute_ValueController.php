<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attribute_Values;
use Illuminate\Http\Request;

class Attribute_ValueController extends Controller
{
    public function create()
    {
        $attribute = Attribute::all();
        return view("admin.attribute.create_attri_value",compact('attribute'));
    }
    public function saveAdd(Request $req)
    {
        $attValue = Attribute_Values::create([
            'values' => $req->values,
            'attribute_id' => $req->att_id,
        ]);
        $attValue->save();
        return redirect(route('create.attribute_values'));
    }
}