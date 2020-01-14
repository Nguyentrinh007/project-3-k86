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


//Cách gọi view
// Gọi trang view php
Route::get('page-php', function () {
    $giatri=3;
    $giatri2='<b>Xin chào các bạn</b>';
    return view('php.trangphp',['giatri'=>$giatri,'giatri2'=>$giatri2]);
});

//Gọi trang view laravel

Route::get('page-laravel', function () {
    $giatri=3;
    $giatri2='<b>Xin chào các bạn</b>';
    return view('laravel.tranglaravel',['giatri'=>$giatri,'giatri2'=>$giatri2]);
});

// blade template
Route::get('page-master','KhoaHocController@GetMaster' );
Route::group(['prefix' => 'khoa-hoc'], function () {
    Route::get('laravel','KhoaHocController@GetLaravel');
    Route::get('php','KhoaHocController@GetPHP');
});


// validation
Route::get('validation','ValidationController@GetVali');
Route::post('validation','ValidationController@PostVali');

//session

//c1: session::phương Thức
//c2: session()->phương thức

// tạo session
Route::get('create-session', function () {
    //session
    session()->put('name','Nguyễn thế phúc');
    session()->put('year','Chào Mừng năm 2019');



    //session flash
    session()->flash('flash','VIETPRO');

});


// lấy dữ liệu trong session
Route::get('get-session', function () {
    echo session('name');
    echo '<br>'.session('year');
    echo '<br>'.session('flash');
});

//kiểm tra session tồn tại 
Route::get('check-session', function () {
   if(session()->has('name'))
    {
        echo 'Tồn tại session có key:name<br>';
    }
    
    else {
        echo 'Không Tồn tại session có key:name<br>';
    }


    if(session()->has('year'))
    {
        echo 'Tồn tại session có key:year<br>';
    }
    else {
        echo 'Không Tồn tại session có key:year<br>';
    }

    if(session()->has('flash'))
    {
        echo 'Tồn tại session có key:flash<br>';
    }
    else {
        echo 'Không Tồn tại session có key:flash<br>';
    }
});

//xoá 1 session có key xác định
Route::get('delete-session', function () {
    
    session()->forget('name');
});

//xoá toàn bộ session
Route::get('delete-all-session', function () {
    
    session()->flush();
});

//middlaware



Route::get('trang-start', function () {
    return "Đây là trang bắt đầu";
})->middleware('Check');

Route::get('trang-dich', function () {
    
    return "Đây là trang đích";
});

//Schema
Route::group(['prefix' => 'schema'], function () {

    //Tạo bảng
    Route::get('create-table', function () {
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('email',50)->default('A@gmail.com');
            $table->string('password')->nullable();
            $table->tinyInteger('level')->unsigned();
            $table->timestamps();
        });
        
    });
    
    //sửa tên bảng
    Route::get('rename-table', function () {
        Schema::rename('users', 'user');
        
    });
    //xoá bảng
    Route::get('drop-table', function () {
       Schema::drop('user');
    });




});




