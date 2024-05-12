@extends('Admin.layout')
@section('content')
      <h5>Quản lý Tuyến xe</h5>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã biển số xe</th>
              <th scope="col">Hãng xe</th>
              <th scope="col">Số lượng ghế ngồi</th>
              <th scope="col">Hạn đăng kiểm</th>
              <th scope="col">Hành động</th>
              <th scope="col">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getPhuongTien as $gettx)
            <tr>
              <td class="fw-bold">{{ $gettx->MaSoXe }}</td>
              <td>{{ $gettx->HangXe }}</td>
              <td>{{ $gettx->SoGhe }}</td>
              <td>{{ $gettx->HanDangKiem }}</td>
              <td><a href="#"><button class="btn btn-secondary btn-sm">Sửa thông tin</button></a></td>
              <td><a href="#"><button class="btn btn-danger btn-sm">Xóa phương tiện</button></a></td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
       <!-- Form them -->
       <div class="mt-5 mb-5">
        <form class="form-signin" method="post" action="{{URL::to('/admin/themphuongtien')}}">
            {{ csrf_field() }}
            <div class="text-center mb-4">
                <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Nhập thêm Phương tiện</h1>
            </div>
            <div class="text-center mb-3 mt-2 text-success">
                <?php echo Session::get('success_vehicle_added'); ?>      
            </div>

            
            <div class="form-label-group mt-3">
                <label for="matuyen">Mã biển số xe</label>
                <input type="text" id="matuyen" class="form-control" placeholder="" name="MaSoXe" required>
                
            </div>
            <div class="form-label-group mt-3">
                <label for="diemdau">Hãng xe</label>
                <input type="text" id="diemdau" class="form-control" placeholder="" name="HangXe" required>
                
            </div>
            
            <div class="form-label-group mt-3">
                <label for="diemden"> 	Số lượng ghế ngồi</label>
                <input type="text" id="diemden" class="form-control" placeholder="" name="SoGhe" required>
                
            </div>

            <div class="form-label-group mt-3">
                <label for="ngaykh">Hạn đăng kiểm</label>
                <input type="text" id="ngaykh" class="form-control" placeholder="" name="HanDangKiem" required>
            </div>
            

            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Thêm P.tiện này</button>
        </div>
        <div class="text-center">
            <p>Hoặc bạn có thể nhập hàng loạt với tính năng nhập file Excel (đang phát triển)</p>
        </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Nhóm 6 - Đổi mới sáng tạo và khởi nghiệp</p>
        </form>
      </div>
      

@endsection