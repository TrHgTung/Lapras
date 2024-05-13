@extends('Admin.layout')
@section('content')
      <h5>Quản lý Tuyến xe - Tháng {{$getCurrentMonthServer}} (Tháng hiện tại)</h5>
      <small><i>Chỉ hiển thị những dữ liệu của tháng {{$getCurrentMonthServer}}/{{$getCurrentYearServer}}</i></small>
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
            </tr>
          </thead>
          <tbody>
            @foreach($getTuyenXe as $gettx)
            @if($gettx->ThangKhoiHanh == $getCurrentMonthServer)
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
            </tr>
           
            @endif
            @endforeach
          </tbody>
        </table>
        <div class="text-center mb-4">
          <a href="{{URL::to('/admin/xemtoanbotuyen')}}">Xem toàn bộ dữ liệu</a>
        </div>
      </div>
      <div>
        <small><i>*: Giờ khởi hành có thể bị thay đổi bởi các thông báo thiên tai, sự cố, ... Cập nhật <a href="{{URL::to('/admin/quanlychuyen')}}">ở đây</a></i></small>
      </div>
       <!-- Form them tai khoan admin -->
       <div class="mt-5 mb-5">
        <form class="form-signin" method="post" action="{{URL::to('/admin/themtuyen')}}">
            {{ csrf_field() }}
            <div class="text-center mb-4">
                <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Nhập Tuyến xe</h1>
            </div>
            <div class="text-center mb-3 mt-2 text-success">
                <?php echo Session::get('success_route_added'); ?>      
            </div>

            
            <div class="form-label-group mt-3">
                <label for="matuyen">Mã tuyến</label>
                <input type="text" id="matuyen" class="form-control" placeholder="" name="MaTuyenXe" required>
                
            </div>
            <div class="form-label-group mt-3">
                <label for="diemdau">Điểm đầu</label>
                <input type="text" id="diemdau" class="form-control" placeholder="" name="DiemDau" required>
                
            </div>
            
            <div class="form-label-group mt-3">
                <label for="diemden">Điểm đến </label>
                <input type="text" id="diemden" class="form-control" placeholder="" name="DiemDen" required>
                
            </div>

            <div class="form-label-group mt-3">
                <label for="ngaykh">Ngày khởi hành</label>
                <input type="text" id="ngaykh" class="form-control" placeholder="" name="NgayKhoiHanh" required>
            </div>
            <div class="form-label-group mt-3">
                <label for="thangkh">Tháng khởi hành</label>
                <input type="text" id="thangkh" class="form-control" placeholder="" name="ThangKhoiHanh" required>
            </div>
            <div class="form-label-group mt-3">
                <label for="giokh">Giờ khởi hành</label>
                <input type="text" id="giokh" class="form-control" placeholder="" name="GioKhoiHanh" required>
            </div>
            <div class="form-label-group mt-3">
                <label for="giotn">Giờ tới nơi (dự kiến)</label>
                <input type="text" id="giotn" class="form-control" placeholder="" name="GioToiNoi" required>
            </div>
            <div class="form-label-group mt-3">
                <label for="giave">Giá vé niêm yết (VND)</label>
                <input type="text" id="giave" class="form-control" placeholder="" name="GiaVe" required>
            </div>
            <input type="hidden" name="status" value="null">

            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Thêm Tuyến này</button>
        </div>
        <div class="text-center">
            <p>Hoặc bạn có thể nhập hàng loạt với tính năng nhập file Excel (đang phát triển)</p>
        </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Nhóm 6 - Đổi mới sáng tạo và khởi nghiệp</p>
        </form>
      </div>
      

@endsection