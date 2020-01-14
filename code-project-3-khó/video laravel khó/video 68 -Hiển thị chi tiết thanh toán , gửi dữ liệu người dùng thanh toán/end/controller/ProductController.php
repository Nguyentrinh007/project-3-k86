<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,category,attribute,values};
use Cart;
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

    public function DetailProduct($id)
    {
        $data['product']=product::find($id);
        $data['product_new']=product::where('img','<>','no-img.jpg')->orderby('created_at','DESC')->take(4)->get();
        return view('frontend.product.detail',$data);
    }

    public function AddCart(request $request)
    {
        $product=product::find($request->id_product);
        Cart::add(['id' => $product->product_code, 
        'name' => $product->name, 
        'qty' => $request->quantity, 
        'price' =>getprice($product,$request->attr),
        'options' => ['img' =>$product->img,'attr'=>$request->attr]]);
        return redirect('product/cart');
    }


    public function GetCart()
    {
     
        $data['cart']=Cart::Content();
        $data['total']=Cart::total(0,'',',');
        return view('frontend.product.cart',$data);
    }
    public function RemoveCart($id)
    {
        Cart::remove($id);
        return redirect('product/cart');
    }


    public function UpdateCart($rowId,$qty)
    {
        Cart::update($rowId, $qty);
    }

    public function CheckOut()
    {
        $data['cart']=Cart::Content();
        $data['total']=Cart::total(0,'',',');
        return view('frontend.checkout.checkout',$data);
    }

    public function PostCheckOut(Request $request)
    {
      dd($request->all());
       
    }
 
    public function complate()
    {
        return view('frontend.product.complete');
    }
}
