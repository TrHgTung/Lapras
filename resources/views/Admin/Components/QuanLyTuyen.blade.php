@extends('Admin.layout')
@section('content')
      <h5>Quản lý Tuyến xe</h5>
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
              
              <th scope="col">Giá vé niêm yết (VND)</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getTuyenXe as $gettx)
            <tr>
              <td class="fw-bold">{{ $gettx->id }}</td>
              <td>{{ $gettx->DiemDau }}</td>
              <td>{{ $gettx->DiemDen }}</td>
              <td>{{ $gettx->NgayKhoiHanh }}-{{ $gettx->ThangKhoiHanh }}-2024</td>
              <td>{{ $gettx->GioKhoiHanh }}</td>
              <td>{{ $gettx->GioToiNoi }}</td>
              
              <td>{{ $gettx->GiaVe }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div>
        <small><i>*: Giờ khởi hành có thể bị thay đổi bởi các thông báo thiên tai, sự cố, ...</i></small>
      </div>
@endsection