@extends('Admin.layout')
@section('content')

      <h4>Tháng .../2024</h4>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Ngày</th>
              <th scope="col">Điểm đầu</th>
              <th scope="col">Điểm đến</th>
              <th scope="col">Phương tiện</th>
              <th scope="col">Tài xế</th>
              <th scope="col">Tổng số khách</th>
              <th scope="col">Thanh toán (VND)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>01</strong></td>
              <td>Tp.HCM</td>
              <td>Đà Lạt</td>
              <td>51G-678910</td>
              <td>Nguyễn Văn Lâm</td>
              <td>12</td>
              <td>2,400,000</td>
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
