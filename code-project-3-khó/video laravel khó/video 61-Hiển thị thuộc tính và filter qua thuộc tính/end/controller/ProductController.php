<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,category,attribute,values};
class ProductController extends Controller
{
    public function ListProduct(request $request)
    {
        if($request->category)
        {
            $data['products']=category::find($request->category)->product()->where('img','<>','no-img.jpg')->paginate(12);
        }
       else  if($request->start)
        {
            $data['products']=product::whereBetween('price',[$request->start,$request->end])->where('img','<>','no-img.jpg')->paginate(12);
        }
        else  if($request->value)
        {
            $data['products']=values::find($request->value)->product()->where('img','<>','no-img.jpg')->paginate(12);
        }
        else
        {
            $data['products']=product::where('img','<>','no-img.jpg')->paginate(12);
        }


        $data['category']=category::all();
        $data['attrs']=attribute::all();
      
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
