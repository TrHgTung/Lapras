<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin tuyến xe</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

<!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="https://getbootstrap.com/docs/4.0/examples/product/product.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('alertify/css/alertify.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('alertify/css/alertify.rtl.min.css')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100px;
    padding: 0 5%;
    position: absolute;
    width: 100%;
    z-index: 100;
}
header h1 {
    font-size: 40px;
    color: white;
}
header nav {
    display: flex;
    gap: 30px;
}
header nav a {
    text-decoration: none;
    font-size: 20px;
    font-weight: 600;
    padding: 8px 16px;
    border-radius: 99px;
    transition: 0.3s;
    color: white;
}
header nav a.active {
    background: #5247B9;
}
header nav a:hover {
    background: #5247B9;
}
header nav:hover > a:not(:hover) {
    background: none;
}

.home {
    display: flex;
    height: 100dvh;
    background: linear-gradient(to top, #D2E2FB 30%, #86A8DB);
    position: relative;
    overflow: hidden;
}

.home img {
    position: absolute;
    bottom: 0;
    width: 100%;
    pointer-events: none;
}

.home .title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 80px;
    text-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25);
}

.about {
    padding: 50px;
    background: #3B3291;
    color: white;
    position: relative;
    z-index: 100;
}
.about h1 {
    font-size: 40px;
}
    </style>
</head>
<body>

    <header>
        <h1 style="margin-top:10px">Nhóm 6</h1>
        <nav>
            <a href="{{URL::to('/lichdatxe')}}" class="active">Quay lại</a>
            <a href="{{URL::to('/')}}">Tr.Chủ</a>
            <!-- <a href="#">Services</a>
            <a href="#">Contact</a> -->
        </nav>
    </header>

    <section class="home">
        <img src="{{asset('images/assets/mount2.png')}}" class="mount2">
        <img src="{{asset('images/assets/mount1.png')}}" class="mount1">
        <img src="{{asset('images/assets/bush2.png')}}" class="bush2">

        <h1 class="title">Đổi mới sáng tạo & khởi nghiệp</h1>

        <img src="{{asset('images/assets/bush1.png')}}" class="bush1">
        <img src="{{asset('images/assets/leaf2.png')}}" class="leaf2">
        <img src="{{asset('images/assets/leaf1.png')}}" class="leaf1">
    </section>

    <section class="about">
        <h1>Thông tin về tuyến sắp chạy</h1><br>
        @foreach($mangDuLieu as $mdl)
        <h3>Ngày {{ $mdl['id'] }} tháng 4 năm 2024</h3>
        @endforeach
        <br>
        @foreach($mangDuLieu as $mdl)
        <strong>Điểm đón: </strong><p>{{ $mdl['DiemDau'] }}</p>
        <br>
        <strong>Điểm đến: </strong><p>{{ $mdl['DiemDen'] }}</p>
        <br>
        <strong>Giá vé: </strong><p>{{ $mdl['GiaVe'] }}</p><br>
        <strong>Ngày khởi hành: </strong><p>{{ $mdl['id'] }}/4/2024</p><br>
        @endforeach
        <p><strong>Liên hệ đặt vé: </strong> 0909 123 456</p>
    </section>
    <footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          <small class="d-block mb-3 text-muted">&copy; 2024 - Trường Đại học Công Thương</small>
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
            <li><a class="text-muted" href="#">Nhóm 6</a></li>
            <li><a class="text-muted" href="#"><i>Tên thành viên nhóm</i></a></li>
            <li><a class="text-muted" href="#"><i>Tên thành viên nhóm</i></a></li>
            <li><a class="text-muted" href="#"><i>Tên thành viên nhóm</i></a></li>
            <li><a class="text-muted" href="#"><i>Tên thành viên nhóm</i></a></li>
            <li><a class="text-muted" href="#">Gọi trực tuyến để hỗ trợ d.vụ (<strong>0909 123 456</strong>)</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <script>
        const title = document.querySelector('.title')
        const leaf1 = document.querySelector('.leaf1')
        const leaf2 = document.querySelector('.leaf2')
        const bush2 = document.querySelector('.bush2')
        const mount1 = document.querySelector('.mount1')
        const mount2 = document.querySelector('.mount2')

        document.addEventListener('scroll', function() {
            let value = window.scrollY
            // console.log(value)
            title.style.marginTop = value * 1.1 + 'px'

            leaf1.style.marginLeft = -value + 'px'
            leaf2.style.marginLeft = value + 'px'

            bush2.style.marginBottom = -value + 'px'

            mount1.style.marginBottom = -value * 1.1 + 'px'
            mount2.style.marginBottom = -value * 1.2 + 'px'

            function testBox1(){
        alertify.alert("Gọi đến số 0909 123 456 để đặt vé. Xin cảm ơn!");
    }
})
    </script>

</body>
</html>