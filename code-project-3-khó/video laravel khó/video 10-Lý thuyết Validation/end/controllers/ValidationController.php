<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function GetVali()
    {
        return view('validation.validation');
    }
    public function PostVali(Request $request)
    {
        $request->validate([
            'tk'=>'required|email|min:5',
            'mk'=>'required'
        ],[
            'tk.required'=>'Không được để trống tk',
            'tk.email'=>'Tài khoản phải là email',
            'tk.min'=>'Tài khoản Không được nhỏ hơn 5 ký tự',
            'mk.required'=>'Mật khẩu không được để trống',
        ]);
    }
}
