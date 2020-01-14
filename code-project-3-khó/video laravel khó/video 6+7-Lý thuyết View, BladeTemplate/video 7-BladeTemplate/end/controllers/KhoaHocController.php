<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhoaHocController extends Controller
{

    public function GetMaster()
    {
        return view('master.master');
    }

    public function GetLaravel()
    {
        return view('laravel');
    }

    public function GetPHP()
    {
        return view('php');
    }

}
