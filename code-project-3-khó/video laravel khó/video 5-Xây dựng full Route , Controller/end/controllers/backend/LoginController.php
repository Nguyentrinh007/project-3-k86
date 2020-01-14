<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
   public function GetLogin()
   {
       echo 'Đây là trang Login';
   }

   public function GetIndex()
   {
       echo 'Đây là trang quản trị';
   }

}
