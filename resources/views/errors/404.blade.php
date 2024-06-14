<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang không tìm thấy</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="stylesheet" href="{{asset('@docsearch/css@3')}}">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">
<link href="{{asset('bootstrap5/bootstrap.min.css')}}" rel="stylesheet" >

  <style>
    body {
        /* background-image: url('{{asset('images/logo_original.jpg')}}'); */
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .link-no-under{
        text-decoration: none;
      }
  </style>
</head>
<body style="background-image: url('{{asset('images/404.jpg')}}');">
  <div class="mt-3 ms-3">
    <a href="{{URL::to('/')}}" class="link-no-under"> < Quay lại</a>
  </div>
  <div class="px-3 text-dark text-center">
      <h1>Uh Oh! (404).</h1>
      <p class="lead">Không tìm thấy trang mà bạn yêu cầu. Vui lòng quay lại</p>
      <p class="lead">
        <a href="{{URL::to('/')}}" class="btn btn-lg btn-light fw-bold border-white bg-white">Trang chủ</a>
      </p>
  </div>
</body>
</html>