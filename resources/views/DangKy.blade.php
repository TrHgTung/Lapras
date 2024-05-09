
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Đăng ký tài khoản</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" action="{{URL::to('/dangkyPost')}}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Đăng ký</h1>
        <p>Vui lòng đăng ký để trải nghiệm các dịch vụ!</p>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputName" class="form-control" placeholder="Nguyễn Văn A" name="name" required autofocus>
        <label for="inputName">Họ và tên</label>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="nguyenvana@example.com" name="email" required>
        <label for="inputEmail">Email</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="***********" name="password" required>
        <label for="inputPassword">Mật khẩu</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng ký</button>  
      <a href="{{URL::to('/dangnhap')}}">Đã có tài khoản? Đăng nhập</a>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Nhóm 6 - Đổi mới sáng tạo và khởi nghiệp</p>
    

    </form>

  </body>
</html>
