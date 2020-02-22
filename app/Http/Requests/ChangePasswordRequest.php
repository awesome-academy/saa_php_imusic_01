<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required',
            'new_password' => 'required|min:8|same:new_password_confirmation'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Xin mời nhập password',
            'new_password.required' => 'Xin mời nhập mật khẩu mới',
            'new_password.same' => 'Mật khẩu không khớp',
            'new_password.min' => 'Mật khẩu phải có độ dài nhỏ nhất là 6'
        ];
    }
}
