<!doctype html>
<html lang="en">
  <head>
    <title>VietPro validate</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>

   <div class="container">
       <div class="row justify-content-md-center">
           <div class="col-md-4">
               @if (count($errors)>0)
                   @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$error}}</strong>
                    </div>
                   @endforeach
               @endif
            <form method="post">
                @csrf
               <h2 align='center'>Login Viet Pro</h2>
               <div class="form-group">
                 <label>Tên tài khản</label>
                 <input type="text" name="tk" class="form-control" placeholder="Tài khoản">
                 @if ($errors->has('tk'))
                    <div class="alert alert-danger" role="alert">
                    <strong>{{$errors->first('tk')}}</strong>
                    </div>
                 @endif
                
               </div>
               <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" name="mk" class="form-control" placeholder="Mật khẩu">
                    @if ($errors->has('mk'))
                    <div class="alert alert-danger" role="alert">
                    <strong>{{$errors->first('mk')}}</strong>
                    </div>
                 @endif
                </div>
                <div class="row">
                    <div class="col-md-6"><button type="submit">Đăng nhập</button></div>
                    <div class="col-md-6"><button type="reset">Nhập lại</button> </div>
                </div>
            </form>
           </div>
       </div>
   </div>
      
    
  </body>
</html>