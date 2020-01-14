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

    //foreign-key
    Route::get('create-info', function () {
        Schema::create('info', function ($table) {
            $table->increments('id');
            $table->string('id_number',100);
            $table->string('address');
            $table->string('phone');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    });


    // Tác động đến cột trong bảng
    //Thêm cột
    Route::get('create-col', function () {

        Schema::table('users', function ($table) {
            $table->string('col_new');
        });

    });
    //sửa tên cột
    Route::get('rename-col', function () {

        Schema::table('users', function ($table) {
            $table->renameColumn('col_new', 'colum');
        });

    });
    // đổi kiểu dữ liệu của cột

    Route::get('change', function () {

        Schema::table('users', function ($table) {
            $table->integer('colum')->unsigned()->change();
        });

    });

    // xoá cột

    Route::get('drop-col', function () {
        //kiểm tra cột có tồn tại hay không
        if (Schema::hasColumn('users', 'colum')) {
            Schema::table('users', function ($table) {
            
                $table->dropColumn('colum');
             });
        }
       
    });

});

//Query buider
Route::group(['prefix' => 'query'], function () {

    //Thêm dữ liệu trong bảng
    Route::get('insert-data', function () {
        // thêm 1 bản ghi vào bảng users
        // DB::table('users')->insert(['email'=>'A@gmail.com','password'=>'123456','level'=>1]);

        // Thêm nhiều bản ghi
        DB::table('users')->insert([
            ['id'=> 3, 'email'=>'B@gmail.com','password'=>'123456','level'=>2],
            ['id'=> 4, 'email'=>'C@gmail.com','password'=>'123456','level'=>1],
            ['id'=> 5, 'email'=>'D@gmail.com','password'=>'123456','level'=>2],
        ]);
    });
    //sửa dữ liệu trong bảng

    Route::get('update-data', function () {
        DB::table('users')->where('id','>',4)->update(['email'=>'E@gmail.com','password'=>'1234567','level'=>2]);
    });

    //Xoá
    Route::get('delete-data', function () {
        DB::table('users')->where('id','>',4)->delete();
    });

    //câu lệnh truy vấn cơ bản
    Route::get('get', function () {
        //lấy toàn bộ dữ liệu trong bảng
        $users=DB::table('users')->get();
        dd($users);

    });

    Route::get('first', function () {
        //lấy 1 bản ghi đầu tiên
        $user=DB::table('users')->first();
        dd($user);

    });
    Route::get('select', function () {
        //Chọn tên cột cần truy vấn
        $user=DB::table('users')->select('email','password')->get();
        dd($user);

    });

    Route::get('join', function () {
        //join bảng
        $users=DB::table('users')->join('info','users.id','=','info.users_id')->select('users.id','email','address')->get();
        dd($users);
    });

    Route::get('where-and', function () {
        
        // $users=DB::table('users')->where('id','>',2)->where('id','<',4)->get();
        $users=DB::table('users')->where('email','LIKE','A%')->get();
        dd($users);

    });

    Route::get('where-or', function () {
        
        $users=DB::table('users')->where('id','<',3)->orwhere('id','>',4)->get();
        dd($users);

    });

    
    Route::get('orderBy', function () {
        //desc giảm dần,asc tăng dần
        $users=DB::table('users')->orderBy('id', 'asc')->get();
        dd($users);

    });

    Route::get('skip-take', function () {
        
        $users=DB::table('users')->orderBy('id', 'desc')->take(2)->get();
        dd($users);

    });
    
    Route::get('increment', function () {
        
        DB::table('users')->where('id','>',3)->increment('level',4);
    });
});

//model
Route::group(['prefix' => 'model'], function () {

    //lấy toàn bộ dữ liệu trong bảng
    Route::get('all', function () {
        $users=App\users::all()->toarray();
        dd($users);
    });

    //Lấy 1 dòng dữ liệu thông qua khoá chính
    Route::get('find', function () {
        $user=App\users::find(1)->toarray();
        dd($user);
    });

    //Thêm dữ liệu vào bảng

   Route::get('insert', function () {
    $user=new App\users;
    $user->email='F@gmail.com';
    $user->password='123456';
    $user->level=1;
    $user->save();
   });

   //Sửa
   Route::get('update', function () {
    $user=App\users::find(8);
    $user->email='J@gmail.com';
    $user->password='123';
    $user->level=2;
    $user->save();
   });

   //xoá
   Route::get('destroy', function () {
    //  App\users::find(8)->delete();
    App\users::destroy(7);

   });
});

Route::get('conv', function () {
   $users = App\users::all();
   foreach($users as $user)
   {
       $a=App\users::find($user->id);
       $a->password=bcrypt('123456');
       $a->save();
   }

});


Route::get('login', 'VietproController@GetLogin');
Route::post('login', 'VietproController@PostLogin');
Route::get('logout', 'VietproController@logout');









