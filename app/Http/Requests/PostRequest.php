<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'title'=>[
                'required',
                Rule::unique('post','id')->ignore($this->id),
//            'unique:product,id,'.$this->id
            ],

            'content'=>['required'],
            'short_desc'=>['required'],
            'author'=>['required'],
            'images'=>['mimes:jpg,jpeg,png'],

        ];
    }

    public function  messages()
    {
        return [
            'required' => 'Trường :attribute không được để trống',
            'mimes'=>'Trườn :attribute phải đúng định dạng ảnh',
            'unique' => 'Đã tồn tại tên sản phẩm , mời nhập tên sản phẩm khác',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'tên sản phẩm',
            'content' => 'chi tiết bài viết',
            'short_desc' => 'nội dung',
            'author'=>'tác giả',
            'images'=>'hình ảnh của sản phẩm',

        ];
    }
}
