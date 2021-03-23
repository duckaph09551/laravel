<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'username'=>[
                'required',
            ],

            'contents'=>['required'],
            'title'=>['required'],
            'email'=>['required','email'],

        ];
    }

    public function  messages()
    {
        return [
            'required' => 'Trường :attribute không được để trống',
            'email' => 'Nhập đúng định dạng email'
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'tên người phản hồi',
            'contents' => 'chi tiết nội dung',
             'email' =>'email',
            'title'=>'tiêu đề'

        ];
    }
}
