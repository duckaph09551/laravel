<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
                Rule::unique('users')->ignore($this->id)
            ],
            'email'=>[
                'required',
                'email',
                Rule::unique('users')->ignore($this->id)
            ],
            'password'=>[
                'required',
            ],
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được để trống',
            'unique'=>'Đã tồn tại , mời nhập thông tin khác',
            'email'=>'Nhập đúng định dạng email',
            'same'=> 'Định dạng mật khẩu không khớp mời nhập lại'
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'Tên tài khoản',
            'email'=>'Địa chỉ email',
            'password'=>'Mật khẩu'
        ];
    }
}
