@extends('Admin.layout')
@section('content')
      <h5>Quản lý Lịch trình chuyến xe</h5>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã số chuyến</th>
              <th scope="col">Điểm đầu</th>
              <th scope="col">Điểm đến</th>
              <th scope="col">Ngày tháng k.hành</th>
              <th scope="col">Giờ khởi hành*</th>
              <th scope="col">Giờ tới nơi (dự kiến)</th>
              <th scope="col">Số khách đã đặt</th>
              <th scope="col">Giá vé niêm yết (VND)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold">01</td>
              <td>Tp.HCM</td>
              <td>Đà Lạt</td>
              <td>01-06-2024</td>
              <td>04:45</td>
              <td>07:45</td>
              <td>1</td>
              <td>180,000</td>
            </tr>
            <tr>
              <td><strong>01</strong></td>
              <td>TP.HCM</td>
              <td>Cần Thơ</td>
              <td>51F1-657499</td>
              <td>Tô Văn Trực</td>
              <td>13</td>
              <td>2,360,000</td>
            </tr>
            <tr>
              <td><strong>02</strong></td>
              <td>TP.HCM</td>
              <td>Đà Lạt</td>
              <td>52C-567889</td>
              <td>Đặng Vĩnh Huy</td>
              <td>7</td>
              <td>1,147,000</td>
            </tr>
            <tr>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
              <td>...</td>
            </tr>
            <tr>
              <td><strong>30</strong></td>
              <td>TP.HCM</td>
              <td>Đà Lạt</td>
              <td>51F-19328</td>
              <td>Quách Tuấn Phong</td>
              <td>16</td>
              <td>2,510,000</td>
            </tr>
            <tr>
              <td><strong>30</strong></td>
              <td>TP.HCM</td>
              <td>Đà Lạt</td>
              <td>51F-19328</td>
              <td>Châu Tinh Trì</td>
              <td>16</td>
              <td>2,510,000</td>
            </tr>
            <tr>
              <td><strong>30</strong></td>
              <td>TP.HCM</td>
              <td>Đà Lạt</td>
              <td>51F-19328</td>
              <td>Tôn Diệp Lục</td>
              <td>16</td>
              <td>2,510,000</td>
            </tr>
            <tr>
              <td><strong>30</strong></td>
              <td>TP.HCM</td>
              <td>Đà Lạt</td>
              <td>51F-19328</td>
              <td>Cao Thái Giám</td>
              <td>16</td>
              <td>2,510,000</td>
            </tr>
            <tr class="fw-bold">
                <td>Tổng:</td>
                <td>_</td>
                <td>_</td>
                <td>_</td>
                <td>_</td>
                <td>656 (khách)</td>
                <td>342,454,000</td>
            </tr>
            <tr class="fw-bold">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>308,208,600</td>
            </tr>
            <tr class="fst-italic">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>(Thuế 10%: 34,245,400)</td>
            </tr>
            <p></p>
          </tbody>
        </table>
      </div>
@endsection