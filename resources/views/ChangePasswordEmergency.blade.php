
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Nhập mã Khôi phục MK</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('bootstrap4/floating-labels.css')}}" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" action="{{URL::to('/doiMatKhau')}}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <input type="hidden" name="email" value="<?php echo Session::get('receive_mail'); ?>">
        <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Phản hồi Khôi phục Password</h1>
        <p>Hãy nhập mã khôi phục mà bạn nhận được trong hộp thư E-mail (<?php echo Session::get('receive_mail'); ?>)*</p>
        <small>Chúng tôi chỉ giải quyết khi địa chỉ E-mail bạn cung cấp phải thật sự là thuộc về bạn</small>
      </div>

      <div class="form-label-group">
        <input type="text" id="Mail" class="form-control" value="<?php echo Session::get('receive_mail'); ?>" name=""  disabled="disabled" >
        <label for="Mail">E-mail của bạn</label>  
      </div>

      <div class="form-label-group">
        <input type="password" id="password" class="form-control" value="" name="password" required >
        <label for="password">Thiết lập mật khẩu mới</label>  
      </div>
      

      <button class="btn btn-lg btn-primary btn-block" type="submit">Xác thực thay đổi mật khẩu</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Hoàng Tùng</p>
    </form>
    
   
    
  </body>
</html>
