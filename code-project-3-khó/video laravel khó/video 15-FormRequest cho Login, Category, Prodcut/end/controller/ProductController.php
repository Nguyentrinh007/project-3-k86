<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ListProduct()
   {
      return view('backend.product.listproduct');
   }

   public function AddProduct()
   {
    return view('backend.product.addproduct');
   }

   public function PostProduct(AddProductRequest $request)
   {
   


   }


   public function EditProduct()
   {
    return view('backend.product.editproduct');
   }
   
   public function PostEditProduct(EditProductRequest $request)
   {
      

    

   }



   public function DetailAttr()
   {
    return view('backend.attr.attr');
   }

   public function EditAttr()
   {
    return view('backend.attr.editattr');
   }


   public function EditValue()
   {
    return view('backend.attr.editvalue');
   }


   public function AddVariant()
   {
    return view('backend.variant.addvariant');
   }

   public function EditVariant()
   {
    return view('backend.variant.editvariant');
   }

}
