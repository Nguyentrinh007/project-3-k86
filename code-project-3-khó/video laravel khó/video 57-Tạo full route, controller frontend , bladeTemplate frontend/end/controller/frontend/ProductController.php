<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ListProduct()
    {
        return view('frontend.product.shop');
    }

    public function DetailProduct()
    {
        return view('frontend.product.detail');
    }

    public function GetCart()
    {
        return view('frontend.product.cart');
    }
    

    public function CheckOut()
    {
        return view('frontend.checkout.checkout');
    }


    public function complate()
    {
        return view('frontend.product.complete');
    }
}
