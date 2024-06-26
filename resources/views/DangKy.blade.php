
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Đăng ký tài khoản</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('bootstrap4/floating-labels.css')}}" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" action="{{URL::to('/dangkyPost')}}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <p class="text-danger"><?php echo Session::get('email_validation'); ?></p>
      </div>

      
      <div class="text-center mb-4">
        <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Đăng ký</h1>
        <p>Vui lòng đăng ký để trải nghiệm các dịch vụ!</p>
      </div>
  <input type="hidden" name="is_active" value="1">
      <div class="form-label-group">
        <input type="text" id="inputName" class="form-control" placeholder="Nguyễn Văn A" name="name"  autofocus>
        <label for="inputName">Họ và tên</label>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="nguyenvana@example.com" name="email" >
        <label for="inputEmail">Email</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="***********" name="password" >
        <label for="inputPassword">Mật khẩu</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng ký</button>  
      <a href="{{URL::to('/dangnhap')}}">Đã có tài khoản? Đăng nhập</a> hoặc Quay về<a href="{{URL::to('/')}}"> trang chủ</a>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Hoàng Tùng</p>
      
      <div class="form-label-group"> 
        <strong>Thông báo hệ thống: (Validation)</strong>
        @if(count($errors) > 0)
          @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
          @endforeach
        @else
          <p class="text-warning"><i>Không có</i></p>
        @endif
      </div>
      

    </form>

  </body>
</html>
