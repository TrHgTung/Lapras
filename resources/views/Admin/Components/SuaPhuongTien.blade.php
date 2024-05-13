@extends('Admin.layout')
@section('content')
<a href="{{URL::to('/admin/quanlyphuongtien')}}" class="link-no-under">< Quay lại</a>

<div class="mt-5 mb-5">
        <form class="form-signin" method="post" action="{{URL::to('/admin/updatephuongtien')}}">
            {{ csrf_field() }}
            <div class="text-center mb-4">
                <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Sửa t.tin Phương tiện</h1>
            </div>
            
            <input type="hidden" name="ptid" value="{{$getPhuongTien->id}}">
            <div class="form-label-group mt-3">
                <label for="matuyen">Mã biển số xe</label>
                <input type="text" id="matuyen" class="form-control" placeholder="" value="{{$getPhuongTien->MaSoXe}}" name="MaSoXe" required>
                
            </div>
            <div class="form-label-group mt-3">
                <label for="diemdau">Hãng xe</label>
                <input type="text" id="diemdau" class="form-control" placeholder="" value="{{$getPhuongTien->HangXe}}" name="HangXe" required>
                
            </div>
            
            <div class="form-label-group mt-3">
                <label for="diemden"> 	Số lượng ghế ngồi</label>
                <input type="text" id="diemden" class="form-control" placeholder="" value="{{$getPhuongTien->SoGhe}}" name="SoGhe" required>
                
            </div>

            <div class="form-label-group mt-3">
                <label for="ngaykh">Hạn đăng kiểm</label>
                <input type="text" id="ngaykh" class="form-control" placeholder="" value="{{$getPhuongTien->HanDangKiem}}" name="HanDangKiem" required>
            </div>
            

            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sửa P.tiện này ({{$getPhuongTien->MaSoXe}})</button>
        </div>
        <div class="text-center">
            <p>Hoặc bạn có thể nhập hàng loạt với tính năng nhập file Excel (đang phát triển)</p>
        </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Nhóm 6 - Đổi mới sáng tạo và khởi nghiệp</p>
        </form>
       
      </div>

@endsection