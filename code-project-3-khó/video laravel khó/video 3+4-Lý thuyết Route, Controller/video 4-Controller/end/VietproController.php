<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
