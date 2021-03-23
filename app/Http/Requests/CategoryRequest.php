<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            //
            'name'=>[
                'required',
                  Rule::unique('category')->ignore($this->id),
            ],
            'logo'=>[
                'mimes:jpeg,png,jpg,gif,svg',
            ],
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Trường :attribute không được để trống',
            'mimes'=>'Trường :attribute phải nhập đúng định dạng ảnh',
            'unique' => 'Đã tồn tại tên sản phẩm , mời nhập tên sản phẩm khác',
        ];
    }

    public function attributes()
    {
        return [

            'name' =>'Danh mục',
            'logo'=>'Logo'
        ];
    }
}
