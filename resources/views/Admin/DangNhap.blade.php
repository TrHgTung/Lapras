
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Đăng nhập Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('bootstrap4/floating-labels.css')}}" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" action="{{URL::to('/admin/dangnhapPost')}}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Đăng nhập Quản trị viên</h1>
        <p>Phân quyền quản trị</p>
      </div>
      <div class="text-center mb-3 mt-2 text-danger">
        <?php echo Session::get('message_ban_notify');
              echo Session::get('admin_incorrect_auth_msg'); ?>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="nguyenvana@example.com" name="email" required>
        <label for="inputEmail">Email</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="***********" name="password" required>
        <label for="inputPassword">Mật khẩu</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>

      <p class="mt-5 mb-3 text-muted text-center">&copy; Hoàng Tùng</p>
    </form>
  </body>
</html>
