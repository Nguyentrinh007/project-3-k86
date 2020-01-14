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

Route::get('','VietproController@getwelcome');

Route::get('viet-pro','VietproController@HelloVietpro' );

Route::get('xinchao/phuc', function () {
    echo 'xin chao phúc';
});

// truyền tham số trên route

// Route::get('xinchao/{name}', function ($name) {
//     echo 'xin chào :'.$name;
// });

// Route::get('xinchao/{name}/{year}', function ($name,$year) {
//     echo 'xin chào :'.$name;
//     echo '<br>Chào mừng năm :'.$year;
// });


//truyền tham số mặc định

Route::get('xinchao/{name?}','VietproController@GetXinchao');

//định danh cho route

Route::get('trang-dich','MyController')->name('dich');



Route::get('trang-nguon', function () {
    // cách 1
    return redirect()->route('add');
    //cách 2
    // return redirect('product/add');
});

// group route

Route::group(['prefix' => 'product'], function () {
    Route::get('add', function () {  echo 'Đây là trang thêm sản phẩm';  })->name('add');
    Route::get('edit', function () {  echo 'Đây là trang thêm sửa sản phẩm';  });
    Route::get('list', function () {  echo 'Đây là trang thêm danh sách sản phẩm';  });
});


