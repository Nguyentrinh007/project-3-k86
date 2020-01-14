<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
   public function GetLogin()
   {
      return view('backend.login.login');
   }

   public function GetIndex()
   {
       return view('backend.index');
   }

}
