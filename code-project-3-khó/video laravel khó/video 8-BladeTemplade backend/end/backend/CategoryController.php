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

   public function EditCategory()
   {
    return view('backend.category.editcategory');
   }
}
