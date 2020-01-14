<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;
use App\models\attribute;
class ProductController extends Controller
{
    public function ListProduct()
   {
      $data['products']=product::paginate(3);
      return view('backend.product.listproduct',$data);
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
      $data['attrs']=attribute::all();
    return view('backend.attr.attr',$data);
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
