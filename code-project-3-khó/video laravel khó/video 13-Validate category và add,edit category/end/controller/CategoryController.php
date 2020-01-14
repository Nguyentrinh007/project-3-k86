<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function GetCategory()
   {
       return view('backend.category.category');
   }

   public function PostCategory(request $request)
   {
    $request->validate([
        'name'=>'required',
    ],[
        'name.required'=>'Tên danh mục không được để trống',
    ]);


   }

   public function EditCategory()
   {
    return view('backend.category.editcategory');
   }
   
   public function PostEditCategory(request $request)
   {
    $request->validate([
        'name'=>'required',
    ],[
        'name.required'=>'Tên danh mục không được để trống',
    ]);

   }
}
