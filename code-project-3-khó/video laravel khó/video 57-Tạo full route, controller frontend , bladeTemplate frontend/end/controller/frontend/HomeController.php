<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function GetHome()
    {
       return view('frontend.index');
    }

    public function GetContact()
    {
        return view('frontend.contact');
    }

    public function GetAbout()
    {
        return view('frontend.about');
    }
}
