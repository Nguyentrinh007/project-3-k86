<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
class VietproController extends Controller
{
    public function getwelcome() {
        return view('welcome');
    }

    public function HelloVietpro() {
        echo 'Xin chào học viên VIETPRO';
    }

    public function GetXinchao($name='Nguyễn thế phúc') {
        echo 'xin chào :'.$name;
    }

    public function Ten_hanh_dong($bien_can_hung,Request $request)
    {
        
    }
    public function GetLogin() {
       return view('validation.validation');
    }
    public function PostLogin(LoginRequest $request) {
        $email=$request->tk;
        $password=$request->mk;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return view('laravel');
        }
        else
        {
            return redirect()->back()->with('thongbao','Tài khoan,mk khong chinh xác');
        }


     }

     public function logout() {
       Auth::logout();
       return redirect('login');
     }

}
