<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class ValidatePrd extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>[
                'required',
                ValidationRule::unique('products')->ignore($this->id), // check trùng các bản ghi khác trừ chính nó 
                'max:50'
            ],
            'price'=>'required',
            'amount'=>'required',
            'description'=>'required',
            'up_image'=>'required|mimes:jpg,bmp,png',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Hãy nhập tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'name.max'=>'Tên sản tối đa 50 ký tự',
            'price.required'=>'Hãy nhập giá sp',
            'amount.required'=>'Hãy nhập số lượng sp',
            'description.required'=>'Hãy nhập mô tả sản phẩm',
            'up_image.mimes'=>'Ảnh chỉ nhận đuôi :jpg,bmp,png',
            'up_image.required'=>'Hãy nhập ảnh sản phẩm',
        ];
    }
}
