<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\models\users;

class LoginController extends Controller
{
   public function GetLogin()
   {
      return view('backend.login.login');
   }
   public function PostLogin(LoginRequest $request)
   {
     
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
      {
         return redirect('admin');
      }
      else {
         return redirect('login')->withInput()->with('thongbao','Tài khoản khoặc mật khẩu không chính xác!');
      }
   }

   public function GetIndex()
   {
       return view('backend.index');
   }

   public function Logout()
   {
       Auth::logout();
       return redirect('login');
   }

}
