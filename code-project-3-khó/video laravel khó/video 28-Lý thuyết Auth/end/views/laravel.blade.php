@extends('master.master')
@section('title','Laravel')
@section('content')
    <!-- main -->
    <div id="main">
        <p class="khoa-hoc">{{Auth::user()->email}} Khoá học laravel</p>
        <hr>
        <div><a href="logout">Đăng xuất</a></div>
         <div class="container">
             <div class="row">
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/Laravel-5.png">  </div>
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/Laravel-5.png">  </div>
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/Laravel-5.png">  </div>
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/Laravel-5.png">  </div>
                 
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/laravel.jpg">  </div>
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/laravel.jpg">  </div>
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/laravel.jpg">  </div>
                 <div class="col-md-3">  <img class="img-thumbnail" src="public/img/laravel.jpg">  </div>
             </div>
         </div>
         <hr>
     </div>
     <!-- End main -->
@endsection

