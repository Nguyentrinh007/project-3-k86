<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function GetCategory()
   {
       return view('backend.category.category');
   }

   public function PostCategory(AddCategoryRequest $request)
   {
  

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
