<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function GetVali()
    {
        return view('validation.validation');
    }
    public function PostVali(LoginRequest $request)
    {
        
    }
}
