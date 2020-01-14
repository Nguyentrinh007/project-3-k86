<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//backend
Route::get('login','backend\LoginController@GetLogin');
Route::post('login','backend\LoginController@PostLogin');

Route::group(['prefix' => 'admin'], function () {
    Route::get('','backend\LoginController@GetIndex');
    Route::get('logout','backend\LoginController@Logout');
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('','backend\CategoryController@GetCategory');
        Route::post('','backend\CategoryController@PostCategory');
        Route::get('edit','backend\CategoryController@EditCategory');
        Route::post('edit','backend\CategoryController@PostEditCategory');
    });

    //product

    Route::group(['prefix' => 'product'], function () {
        Route::get('','backend\ProductController@ListProduct');
        Route::get('add','backend\ProductController@AddProduct');
        Route::post('add','backend\ProductController@PostProduct');

        Route::get('edit','backend\ProductController@EditProduct');
        Route::post('edit','backend\ProductController@PostEditProduct');

        Route::get('detail-attr','backend\ProductController@DetailAttr');
        Route::get('edit-attr','backend\ProductController@EditAttr');

        Route::get('edit-value','backend\ProductController@EditValue');

        Route::get('add-variant','backend\ProductController@AddVariant');
        Route::get('edit-variant','backend\ProductController@EditVariant');

    });


    //order

    Route::group(['prefix' => 'order'], function () {
        Route::get('','backend\OrderController@ListOrder');
        Route::get('detail','backend\OrderController@DetailOrder');
        Route::get('processed','backend\OrderController@Processed');
    });


});