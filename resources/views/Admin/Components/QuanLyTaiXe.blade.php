@extends('Admin.layout')
@section('content')
      <h5>Quản lý Tuyến xe</h5>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã Tài xế</th>
              <th scope="col">Họ tên Tài xế</th>
              <th scope="col">Hành động</th>
              <th scope="col">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getTaiXe as $gettx)
            <tr>
              <td class="fw-bold">{{ $gettx->MaTaiXe }}</td>
              <td>{{ $gettx->HoTenTaiXe }}</td>
              <td><a href="#"><button class="btn btn-secondary btn-sm">Sửa thông tin</button></a></td>
              <td><a href="#"><button class="btn btn-danger btn-sm">Xóa Tài xế</button></a></td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
       <!-- Form them -->
       <div class="mt-5 mb-5">
        <form class="form-signin" method="post" action="{{URL::to('/admin/themtaixe')}}">
            {{ csrf_field() }}
            <div class="text-center mb-4">
                <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Thêm mới Tài xế</h1>
            </div>
            <div class="text-center mb-3 mt-2 text-success">
                <?php echo Session::get('success_driver_added'); ?>      
            </div>

            
            <div class="form-label-group mt-3">
                <label for="mataixe">Mã Tài xế</label>
                <input type="text" id="mataixe" class="form-control" placeholder="" name="MaTaiXe" required>
                
            </div>
            <div class="form-label-group mt-3">
                <label for="hoten">Họ và tên</label>
                <input type="text" id="hoten" class="form-control" placeholder="" name="HoTenTaiXe" required>
                
            </div>
            
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Thêm người này</button>
        </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Nhóm 6 - Đổi mới sáng tạo và khởi nghiệp</p>
        </form>
      </div>
      

@endsection