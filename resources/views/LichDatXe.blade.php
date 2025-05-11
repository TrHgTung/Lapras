
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="{{asset('alertify/alertify.js')}}"></script>
    <script src="{{asset('alertify/alertify.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.rtl.min.css')}}">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Xem Lịch Đặt Xe</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap4/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
    <style>
         body {
      font-family: Arial, sans-serif;
    }

    .calendar {
      width: 600px;
      margin: 0 auto;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
    }

    .month {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .days {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
    }

    .day {
      padding: 10px;
      border: 1px solid #ccc;
      font-size: 19px;
    }
    </style>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{URL::to('/')}}">< Quay lại</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{URL::to('/taikhoan')}}">Tài khoản</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/phanhoi')}}">Liên hệ & Phản hồi</a>
            </li>
            
          </ul>
          <a href="{{URL::to('/dangxuat')}}" 
          class="btn btn-secondary btn-outline-danger">
          Đăng xuất</a>
        </div>
      </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="{{asset('images/tphcm_dl.jpg')}}" style="filter: brightness(30%);" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><strong>TP.HCM -> Đà Lạt </strong></h1>
                <p>Giữa thời tiết nóng bức của mùa hè, còn gì tuyệt vời hơn là đi đến Đà Lạt.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="{{asset('images/dongvan.jpg')}}" style="filter: brightness(30%);"  alt="Second slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><strong>Cần Thơ -> Đồng Văn </strong></h1>
                <p>Ngại gì mà không đi để chiêm ngưỡng vẻ đẹp của Tổ quốc nhỉ.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="{{asset('images/dl_tphcm.jpg')}}" style="filter: brightness(30%);"  alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1><strong>TP.HCM -> Đà Lạt </strong></h1>
                <p>Giữa thời tiết nóng bức của mùa hè, còn gì tuyệt vời hơn là đi đến Đà Lạt.</p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/logo.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>Sự uy tín tuyệt đối</h2>
            <p>Sự uy tín đã được khẳng định qua kinh nghiệm làm việc lâu dài, với chất lượng đào tạo công nhân viên chuẩn chỉ.......</p>
            <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/logo.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>Phục vụ tận tâm vì khách hàng</h2>
            <p><i>Khách hàng là thượng đế</i>, đây là phương châm làm việc của chúng tôi. Chúng tôi không ngừng nâng cao chất lượng dichjvuj của mình.....</p>
            <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/logo.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>Cảm giác trên xe như ở nhà</h2>
            <p>Chúng tôi hoàn toàn tự tin khẳng định rằng, chúng tôi luôn là nhà xe tiên phong trong cung cấp các dịch vụ ân cần, chu đáo, tạo cảm giác bồng bềnh, thoải mái cho quý khách hàng của mình.........</p>
            <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <div class="calendar mt-4 mb-4">
          <div class="month"><h4>Tìm kiếm chuyến xe cho bạn</h4></div>
          <form action="{{URL::to('/chonthang')}}" method="post">
            {{ csrf_field() }}
              
              <label for="month" style="font-weight:700">Chọn tháng: </label>
            <select name="month" id="month">
              <option value="">?</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select> / 2025 >>>
            
              <br><br>
              <div class="mb-2">
                <strong>Chọn ngày: </strong>
              </div>
              <div class="days">
                <p class="day">1 <input class="form-check-input" type="radio" name="ngay" id="ngay" value="1"></p>
                <p class="day">2 <input class="form-check-input" type="radio" name="ngay" id="ngay" value="2"></p>
                <p class="day">3<input class="form-check-input" type="radio" name="ngay" id="ngay"  value="3"></p>
                <p class="day">4<input class="form-check-input" type="radio" name="ngay" id="ngay"  value="4"></p>
                <p class="day">5<input class="form-check-input" type="radio" name="ngay" id="ngay"  value="5"></p>
                <p class="day">6<input class="form-check-input" type="radio" name="ngay" id="ngay"  value="6"></p>
                <p class="day">7<input class="form-check-input" type="radio" name="ngay" id="ngay"  value="7"></p>
                <p class="day">8<input class="form-check-input" type="radio" name="ngay" id="ngay"  value="8"></p>
                <p class="day">9<input class="form-check-input" type="radio" name="ngay" id="ngay"  value="9"></p>
                <p class="day">10<input class="form-check-input" type="radio" name="ngay" id="ngay" value="10"></p>
                <p class="day">11<input class="form-check-input" type="radio" name="ngay" id="ngay" value="11"></p>
                <p class="day">12<input class="form-check-input" type="radio" name="ngay" id="ngay" value="12"></p>
                <p class="day">13<input class="form-check-input" type="radio" name="ngay" id="ngay" value="13"></p>
                <p class="day">14<input class="form-check-input" type="radio" name="ngay" id="ngay" value="14"></p>
                <p class="day">15<input class="form-check-input" type="radio" name="ngay" id="ngay" value="15"></p>
                <p class="day">16<input class="form-check-input" type="radio" name="ngay" id="ngay" value="16"></p>
                <p class="day">17<input class="form-check-input" type="radio" name="ngay" id="ngay" value="17"></p>
                <p class="day">18<input class="form-check-input" type="radio" name="ngay" id="ngay" value="18"></p>
                <p class="day">19<input class="form-check-input" type="radio" name="ngay" id="ngay" value="19"></p>
                <p class="day">20<input class="form-check-input" type="radio" name="ngay" id="ngay" value="20"></p>
                <p class="day">21<input class="form-check-input" type="radio" name="ngay" id="ngay" value="21"></p>
                <p class="day">22<input class="form-check-input" type="radio" name="ngay" id="ngay" value="22"></p>
                <p class="day">23<input class="form-check-input" type="radio" name="ngay" id="ngay" value="23"></p>
                <p class="day">24<input class="form-check-input" type="radio" name="ngay" id="ngay" value="24"></p>
                <p class="day">25<input class="form-check-input" type="radio" name="ngay" id="ngay" value="25"></p>
                <p class="day">26<input class="form-check-input" type="radio" name="ngay" id="ngay" value="26"></p>
                <p class="day">27<input class="form-check-input" type="radio" name="ngay" id="ngay" value="27"></p>
                <p class="day">28<input class="form-check-input" type="radio" name="ngay" id="ngay" value="28"></p>
                <p class="day">29<input class="form-check-input" type="radio" name="ngay" id="ngay" value="29"></p>
                <p class="day">30<input class="form-check-input" type="radio" name="ngay" id="ngay" value="30"></p>
                <p class="day">31<input class="form-check-input" type="radio" name="ngay" id="ngay" value="31"></p>
            </div>
            
            <input type="submit" value="Tìm kiếm" class="btn btn-sm btn-outline-secondary">
          </form>
        </div>

        <div class="calendar" class="mt-4 mb-4">
            <div class="text-center mt-3 mb-2">
                <small>Các kết quả sẽ xuất hiện tại đây</small>
            </div>
        </div>

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      
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
              <li><a class="text-muted" href="#">Web Đặt xe (Hoàng Tùng)</a></li>
              <li><a class="text-muted" href="#">Gọi trực tuyến để hỗ trợ d.vụ (<strong>0909 123 456</strong>)</a></li>
            </ul>
          </div>
        </div>
      </footer>
 
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
