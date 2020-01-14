<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\AddAttrRequest;
use App\Http\Requests\AddValueRequest;
use App\Http\Requests\EditAttrRequest;
use App\Http\Requests\EditValueRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;
use App\models\attribute;
use App\models\values;
class ProductController extends Controller
{
    public function ListProduct()
   {
      $data['products']=product::paginate(3);
      return view('backend.product.listproduct',$data);
   }

   public function AddProduct()
   {
      $data['attrs']=attribute::all();
    return view('backend.product.addproduct',$data);
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


   public function AddAttr(AddAttrRequest $request)
   {
      $attr= new attribute;
      $attr->name=$request->attr_name;
      $attr->save();

    return redirect()->back()->with('thongbao','Đã thêm thành công thuộc tính:'.$request->attr_name);

   }

   
   public function AddValue(AddValueRequest $request)
   {
    $value=new values;
    $value->attr_id=$request->attr_id;
    $value->value=$request->value_name;
    $value->save();
    return redirect()->back()->with('thongbao','Đã thêm giá trị:'.$request->value_name);

   }

   public function DetailAttr()
   {
      $data['attrs']=attribute::all();
    return view('backend.attr.attr',$data);
   }

   public function EditAttr($id)
   {
      $data['attr']=attribute::find($id);
    return view('backend.attr.editattr',$data);
   }

   public function PostAttr(EditAttrRequest $request,$id)
   {
      $attr= attribute::find($id);
      $attr->name=$request->attr_name;
      $attr->save();

    return redirect()->back()->with('thongbao','Đã sửa thuộc tính');
   }

   public function DelAttr($id)
   {
      attribute::destroy($id);
      return redirect('admin/product/detail-attr')->with('thongbao','Đã xoá thành công!');
   }


   public function EditValue($id)
   {
      $data['value']=values::find($id);
    return view('backend.attr.editvalue',$data);
   }

   public function PostEditValue(EditValueRequest $request,$id)
   {
  


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
