
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Phản hồi ý kiến</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('bootstrap4/floating-labels.css')}}" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" action="{{URL::to('/khoiphucPost')}}">
      {{ csrf_field() }}
      <div class="text-center mb-4">
        <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Phản hồi ý kiến</h1>
        <p>Chúng tôi luôn lắng nghe ý kiến của bạn</p>
      </div>

      <div class="form-label-group">
        <input type="email" id="Mail" class="form-control" placeholder="" name="receive" required>
        <label for="Mail">Địa chỉ e-mail khôi phục</label>
      </div>
      

      <button class="btn btn-lg btn-primary btn-block" type="submit">Gửi yêu cầu khôi phục</button>
     <div class="mt-3 text-center"><a href="{{URL::to('/')}}" ><< Quay lại Trang chủ << </a></div> 
      <p class="mt-5 mb-3 text-muted text-center">&copy; Hoàng Tùng</p>
    </form>
    
   
    
  </body>
</html>
