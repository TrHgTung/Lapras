<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gương thần May mắn</title>
  <script src="{{asset('alertify/alertify.js')}}"></script>
  <script src="{{asset('alertify/alertify.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('alertify/alertify.css')}}">
  <link rel="stylesheet" href="{{asset('alertify/alertify.min.css')}}">
  <link href="{{asset('bootstrap4/bootstrap.min.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

  <style>
    body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  font-family: Arial, sans-serif;
  /* background-image: url("{{asset('public/frontend/images/promotion_Dec12.jpg')}}"); */
  background-image: url('{{asset('images/assets/bg.jpg')}}');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.wheel {
  position: relative;
}

.inner-wheel {
  width: 300px;
  height: 300px;
  border-radius: 50%;
  border: 2px solid transparent;
  overflow: hidden;
  position: relative;
}

.section {
  width: 100%;
  height: 50px;
  line-height: 50px;
  text-align: center;
  background-color: transparent;
  color: transparent;
}

.section:nth-child(odd) {
  background-color: transparent;
}

.spin-button {
  width: 100px;
  height: 150px;
  background-color: transparent;
  color: black;
  text-align: center;
  line-height: 40px;
  border-radius: 5px;
  cursor: pointer;
  position: absolute;
  bottom: 60px;
  left: 50%;
  /* right: 80px; */
  transform: translateX(-50%);
}

#hidden{
  color: transparent;
}
#text{
  color:white;
}
.text{
  color:white;
}
#result{
  color:white;
}
.waitBtn{
  width: 100px;
  height: 40px;
  background-color: transparent;
  text-align: center;
  line-height: 0px;
  border-radius: 0;
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
}
  </style>
</head>
<body>

<div class="container mt-5">
    <div class="mt-5">
        <div>
            <a href="{{URL::to('/')}}">< Quay lại</a>
            <p class="lead" id="result">
              <strong>GƯƠNG THẦN MAY MẮN</strong>
            </p>
        </div>
        <div>
            <p class="text"><small>Nếu may mắn trúng thưởng. Hãy sử dụng mã này bằng cách nhấn nút <i>Xác thực</i> phía dưới, cũng đừng quên chụp màn hình lại và chia sẻ công khai trên <i>Facebook</i> với hashtag <a href="#"><i>#WebDatXe</i></a> nhé!</small></p>
            <p class="text">Mã nhận thưởng cá nhân: <strong>{{$initPromoCode}}</strong></p>
            <small class="text"><i>Bản quyền thuộc về Hoàng Tùng - Đây là một tính năng của WebDatXe</i></small>
            <p class="text"><a href="https://www.facebook.com/sharer/sharer.php?u=https://github.com/TrHgTung/WebDatXe&hashtag=%23WebDatXe" class="btn btn-sm btn-primary">Chia sẻ lên Facebook</a></p>
        </div>
    </div>

    <!-- Button để mở Modal -->
    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Xác thực
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form method="POST" action="{{URL::to('/verify_giftPost')}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chứng thực kết quả trò chơi với hệ thống</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                      {{ csrf_field() }}
                      <input type="hidden" name="MaXacThuc" value="{{$initPromoCode}}">
                      <input type="hidden" name="Content" id="NoiDungXacThucPhanThuongKhongThayDoi1" value="NULL"> <!-- Nội dung phần thưognr -->
                      <p>Mã nhận thưởng: {{$initPromoCode}}</p>
                        <div class="mb-3">
                            <label for="inputData1" class="form-label">Nhập e-mail của bạn:</label>
                            <input type="email" class="form-control" id="inputData1" name="EmailKH" required>
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button> -->
                    <button type="submit" class="btn btn-primary">Xác minh</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="wheel">
        <div class="inner-wheel">
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">Chúc bạn may mắn lần sau</div>
          <div class="section" id="section">TUYỆT VỜI! BẠN ĐƯỢC TẶNG 1 SUẤT ĂN MIỄN PHÍ TẠI TRẠM DỪNG CHÂN</div>
        </div>
        <div class="spin-button" id="randomBtn" onclick="spinWheel(); generateRandomNumber()"><h1><p>&nbsp; <strong>LUCKY CHECK</strong> </p></h1></div>
      </div>
      <div>
        <p id="hidden">Mã nhận thưởng cá nhân: <strong>#12345</strong></p>
        <p id="hidden">Mã nhận thưởng cá nhân: <strong>#12345</strong></p>
        <p id="hidden">Mã nhận thưởng cá nhân: <strong>#12345</strong></p>
        <p id="hidden">Mã nhận thưởng cá nhân: <strong>#12345</strong></p>
        <p id="hidden">Mã nhận thưởng cá nhân: <strong>#12345</strong></p>
        <p id="hidden">Mã nhận thưởng cá nhân: <strong>#12345</strong></p>
        <p id="hidden">Mã nhận thưởng cá nhân: <strong>#12345</strong></p>
        <p id="hidden">g</p>
      </div>
</div>

  <script>
    const sections = document.querySelectorAll('.section');
    const spinButton = document.querySelector('.spin-button');

    let spinning = false;

    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
      if (e.keyCode == 123) {
        alert('Phím F12 không được phép thực thi!');
        e.preventDefault();
      }
    };

    function spinWheel() {
      if (spinning) return;
      spinning = true;

      const randomDegree = Math.floor(Math.random() * 360) + 3600;

      sections.forEach((section, index) => {
        const degree = index * (360 / sections.length);
        section.style.transform = `rotate(${randomDegree}deg)`;
      });

      setTimeout(() => {
        spinning = false;
        const chosenSection = Math.floor((360 - (randomDegree % 360)) / (360 / sections.length));
        alertify.alert(`${sections[chosenSection].textContent}`);
        //document.getElementById('NoiDungXacThucPhanThuongKhongThayDoi').innerText = `${sections[chosenSection].textContent}`;
        
        var getEl = document.getElementById('NoiDungXacThucPhanThuongKhongThayDoi1');
        getEl.value = `${sections[chosenSection].textContent}`;

      }, 5000);
      //document.getElementById('NoiDungXacThucPhanThuongKhongThayDoi').innerText = `${sections[chosenSection].textContent}`;

    }


    function generateRandomNumber() {
      const min = 100000; // Minimum value
      const max = 999999; // Maximum value

      const randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
      const buttonBtn = document.getElementById('randomBtn')

      buttonBtn.innerHTML = '<button class="waitBtn" onclick="alertMe();">Loading..</button>'
      document.getElementById('result').innerText = `Mã chứng thực: {{$initPromoCode}}`;
    }

    function alertMe(){
      alertify.alert('Bạn đã thực hiện lượt chơi của ngày hôm nay! Đóng tab này để quay lại mua hàng.')
    }
  </script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>