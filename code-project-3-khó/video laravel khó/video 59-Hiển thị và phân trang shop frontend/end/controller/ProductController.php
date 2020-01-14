<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;
class ProductController extends Controller
{
    public function ListProduct()
    {
        $data['products']=product::where('img','<>','no-img.jpg')->paginate(12);
        return view('frontend.product.shop',$data);
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
