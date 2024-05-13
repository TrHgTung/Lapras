@extends('Admin.layout')
@section('content')
<div class="mb-4">
    <a href="{{URL::to('/admin/quanlytuyen')}}" class="link-no-under">< Quay lại</a>
</div>    
<h5>Toàn bộ dữ liệu Tuyến xe </h5>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã số tuyến</th>
              <th scope="col">Điểm đầu</th>
              <th scope="col">Điểm đến</th>
              <th scope="col">Ngày tháng khởi hành</th>
              <th scope="col">Giờ khởi hành*</th>
              <th scope="col">Giờ tới nơi (dự kiến)</th>
              <th scope="col">Giá vé niêm yết (VND)</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getTuyenXe as $gettx)
           
            <tr>
              <td class="fw-bold">{{ $gettx->MaTuyenXe }}</td>
              <td>{{ $gettx->DiemDau }}</td>
              <td>{{ $gettx->DiemDen }}</td>
              <td>{{ $gettx->NgayKhoiHanh }}-{{ $gettx->ThangKhoiHanh }}-2024</td>
              <td>{{ $gettx->GioKhoiHanh }}</td>
              <td>{{ $gettx->GioToiNoi }}</td>
              <td>{{ $gettx->GiaVe }}</td>
              @if($gettx->status == 'cancel')
                <td>Bị hủy bỏ</td>
              @elseif($gettx->status == 'complete')
                <td>Hoàn thành</td>
              @elseif($gettx->status == 'delay')
               <td>Bị hoãn lại</td>
              @else
                <td>Đang cập nhật</td>
              @endif
              @if($gettx->status != 'cancel')
                <td>
                    <form action="{{URL::to('/admin/xoatuyen')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="MaTuyenXe" value="{{ $gettx->MaTuyenXe }}">
                        <input type="submit" value="Xóa" class="btn btn-sm btn-danger">
                    </form>
                </td>
            @else
                <td>Không khả dụng</td>
            @endif

            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
      <div>
        <small><i>*: Giờ khởi hành có thể bị thay đổi bởi các thông báo thiên tai, sự cố, ... Cập nhật <a href="{{URL::to('/admin/quanlychuyen')}}">ở đây</a></i></small>
      </div>
@endsection