@extends('Admin.layout')
@section('content')
<a href="{{URL::to('/admin/quanlytaixe')}}" class="link-no-under">< Quay lại</a>

<div class="mt-5 mb-5">
        <form class="form-signin" method="post" action="{{URL::to('/admin/updatetaixe')}}">
            {{ csrf_field() }}
            <div class="text-center mb-4">
                <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Sửa t.tin Tài xế</h1>
            </div>
            
            <input type="hidden" name="id" value="{{$getTaiXe->id}}">
            <div class="form-label-group mt-3">
                <label for="matuyen">Mã Tài xế</label>
                <input type="text" id="matuyen" class="form-control" placeholder="" value="{{$getTaiXe->MaTaiXe}}" name="MaTaiXe" required>
                
            </div>
            <div class="form-label-group mt-3">
                <label for="diemdau">Họ và tên</label>
                <input type="text" id="diemdau" class="form-control" placeholder="" value="{{$getTaiXe->HoTenTaiXe}}" name="HoTenTaiXe" required>
                
            </div>
            
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Cập nhật {{$getTaiXe->MaTaiXe}}</button>
        </div>
        <div class="text-center">
            <p>Hoặc bạn có thể nhập hàng loạt với tính năng nhập file Excel (đang phát triển)</p>
        </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Hoàng Tùng</p>
        </form>
       
      </div>

@endsection