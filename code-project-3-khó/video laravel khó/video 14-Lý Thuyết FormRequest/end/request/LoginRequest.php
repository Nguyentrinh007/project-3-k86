<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'tk'=>'required|email|min:5',
            'mk'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'tk.required'=>'Không được để trống tk',
            'tk.email'=>'Tài khoản phải là email',
            'tk.min'=>'Tài khoản Không được nhỏ hơn 5 ký tự',
            'mk.required'=>'Mật khẩu không được để trống',
        ];
    }

}
