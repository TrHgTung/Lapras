
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Trang chủ - Bộ dự án TMĐT dành cho SV CNTT</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('bootstrap4/product.css')}}" rel="stylesheet">
  </head>

  <body>

    <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
          <img src="{{asset('images/logo.jpg')}}" alt="" srcset="" width="50px" height="50px">
        </a>
        <a class="py-2 d-none d-md-inline-block" href="{{URL::to('/lichdatxe')}}">Xem lịch đặt</a>
        <a class="py-2 d-none d-md-inline-block" href="{{URL::to('/minigame')}}">Mini Game</a>
        <a class="py-2 d-none d-md-inline-block" href="{{URL::to('/khoiphuctk')}}" target="_blank">Khôi phục t.khoản</a>
        <a class="py-2 d-none d-md-inline-block" href="{{URL::to('/phanhoi')}}">Liên hệ và phản hồi</a>
        <a class="py-2 d-none d-md-inline-block" href="{{URL::to('/giohang')}}">Xem tuyến đã đặt</a>
        <a class="py-2 d-none d-md-inline-block" href="{{URL::to('/taikhoan')}}"><?php  $checkSession = Session::get('id'); if($checkSession){echo 'Xem tài khoản';} else{ echo 'Đăng nhập'; } ?></a>
      </div>
    </nav>

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal"><strong>Lapras</strong></h1>
        <p class="lead font-weight-normal">Bộ dự án <i>Xe khách dịch vụ</i> <br> chuyên ngành Công nghệ phần mềm</p>
        <a class="btn btn-outline-secondary" href="{{URL::to('/blogs')}}" onclick="sayHello()"><?php
        $ktraNgDung = Session::get('id');
        if($ktraNgDung){
            echo 'Xin chào '.Session::get('name'). ', nhấn để xem Blog';
        } else{
            echo 'Xin chào bạn. Nhấn để xem Blog';
        }
    
    ?></a>
      </div>
      <div class="product-device box-shadow d-none d-md-block" style="background: #e6ffee;"></div>
      <div class="product-device product-device-2 box-shadow d-none d-md-block" style="background: #e6fff2;"></div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
      <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" style="background: #e6ffee;">
        <div class="my-3 py-3">
          <h2 class="display-5" style="color:black">Xem lịch các tuyến</h2>
          <p class="lead" style="color:black">Và chọn cho mình ngày phù hợp nhất.</p>
          <small class="text-dark"><i>Yêu cầu đăng nhập</i></small>
          <a href="{{URL::to('/lichdatxe')}}">
            <button class="btn btn-primary" style="background-color: green;">Xem ngay</button>
          </a>
        </div>
        <div class="box-shadow mx-auto" style="background: #e6f9ff; width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
      <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Liên hệ với nhà xe</h2>
          <p class="lead">Giải đáp những thắc mắc của bạn.</p>
          <small><i>Yêu cầu đăng nhập</i></small>
          <a href="{{URL::to('/phanhoi')}}">
          <button class="btn btn-secondary">Phản hồi</button>
          </a>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow mt-5">
      <h6 class="border-bottom border-gray pb-2 mb-0 text-center">Các phản hồi gần đây từ khách hàng</h6>
      @foreach($getFeedback as $gfb)  
        
        <div class="media text-muted pt-3">
          <img src="{{asset('images/logo_original.jpg')}}" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f1326bcc7%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f1326bcc7%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.836840629577637%22%20y%3D%2216.960000014305116%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{ $gfb->addressFrom }}</strong>
            {{ $gfb->feedbackContent }}.
          </p>
        </div>
      @endforeach
    </div>

    <footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          <small class="d-block mb-3 text-muted">&copy; 2025 - Trường Đại học Sư Phạm TP.HCM</small>
        </div>
        <div class="col-6 col-md">
          <h5>Các tính năng</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Xác thực người dùng</a></li>
            <li><a class="text-muted" href="#">Xem lịch đặt xe</a></li>
            <li><a class="text-muted" href="#">Đặt xe và xác thực email</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Công nghệ sử dụng</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Laravel (PHP)</a></li>
            <li><a class="text-muted" href="#">MySQL</a></li>
            <li><a class="text-muted" href="#">Bootstrap</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Giới thiệu</h5>
          <ul class="list-unstyled text-small">
            <li><b>Dự án: </b>Lapras</li>
            <li><b>Tác giả: </b>github/TrHgTung (Hoàng Tùng)</li>
            
            <li><b>Lưu ý: </b> Các dữ liệu của dự án đều chưa được xác thực, và chỉ phục vụ một mục đích học tập!</li>
          </ul>
        </div>
      </div>
      <div>
        <p><strong>Điều hướng:</strong></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.8209764651622!2d106.68083428383721!3d10.762053257904633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b8a072901%3A0x2fb4502ebd044212!2sHo%20Chi%20Minh%20City%20University%20of%20Education!5e0!3m2!1sen!2s!4v1718623867443!5m2!1sen!2s" width="900" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
      function sayHello(){
        window.alert("Xin chào bạn. Hi vọng chúng tôi sẽ làm hài lòng bạn, nhấn OK để tiếp tục đến Blogs")
      }
    </script>
  </body>
</html>
