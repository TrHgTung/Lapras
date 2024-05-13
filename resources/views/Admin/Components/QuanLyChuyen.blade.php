@extends('Admin.layout')
@section('content')
      <h5>Quản lý các Chuyến xe hiện hành</h5>
      <p class="text-danger"><strong>Lưu ý: </strong>Bạn phải thực hiện cập nhật thông tin cho tất cả các chuyến chậm nhất là 90 phút trước giờ khởi hành dự kiến</p>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã số chuyến</th>
              
              <th scope="col">Ngày tháng k.hành</th>
              <th scope="col">Giờ khởi hành (thực tế)</th>
              <th scope="col">Giờ tới nơi (thực tế)</th>
              
              <th scope="col">Mã biển số xe</th>
              <th scope="col">Tài xế - ID T.Xế</th>
              <th scope="col">B.cáo t.trạng sau cùng</th>
              <th scope="col">Hành động</th>

            </tr>
          </thead>
          <tbody>
            @foreach($getTuyenXe as $gettx)
              @if($gettx->status != 'complete' )
              @if($gettx->status != 'cancel' )
              <form action="{{URL::to('/admin/luuchuyen')}}" method="post">
                {{ csrf_field() }}
                <tr>
                  <td class="fw-bold">{{ $gettx->MaTuyenXe }}</td>
                  <input type="hidden" name="MaTuyenXe" value="{{ $gettx->MaTuyenXe }}">
                  
                  <td>{{ $gettx->NgayKhoiHanh }}-{{ $gettx->ThangKhoiHanh }}-2024</td>
                  <input type="hidden" name="NgayKhoiHanh" value="{{ $gettx->NgayKhoiHanh }}">
                  <input type="hidden" name="ThangKhoiHanh" value="{{ $gettx->ThangKhoiHanh }}">
                  <td><input type="text" name="GioKhoiHanh" id="" value="{{ $gettx->GioKhoiHanh }}" require></td>
                  <td><input type="text" name="GioToiNoi" id="" value="{{ $gettx->GioToiNoi }}" require></td>
                  
                  <td><select class="form-select form-select-sm" name="MaSoXe" aria-label=".form-select-sm example">
                  @foreach($getPhuongTien as $getpt)
                    <option value="{{ $getpt->MaSoXe }}">{{ $getpt->MaSoXe }}</option>
                  @endforeach
                  </select></td>

                  <td><select class="form-select form-select-sm" name="MaTaiXe" aria-label=".form-select-sm example">
                  @foreach($getTaiXe as $gettxe)
                    <option value=" {{ $gettxe->MaTaiXe }}">{{ $gettxe->HoTenTaiXe }} - ID: {{ $gettxe->MaTaiXe }}</option>
                  @endforeach
                  </select></td>
                  <td><select class="form-select form-select-sm" name="status" aria-label=".form-select-sm example">
                    <option value="null" selected>?</option>
                    <option value="running">Xe đang chạy</option>
                    <option value="complete">Hoàn thành</option>
                    <option value="delay">Bị hoãn</option>
                    <option value="cancel">Bị hủy bỏ</option>
                  </select></td>
                  <input type="hidden" name="NguoiCapNhat" value="<?php echo Session::get('admin_email'); ?>">
                  
                  <td><input type="submit" value="Cập nhật" class="btn btn-sm btn-danger"></td>
                  
                </tr>
              </form>
              @endif
              @endif
           @endforeach
          </tbody>
        </table>
      </div>
      <div class="mt-4">
        <p><b>Hướng dẫn cho admin: </b>Trên giao diện <i>Quản lý các Chuyến xe hiện hành</i>, mỗi dòng là dữ liệu thông tin của MỘT chuyến xe. Bạn phải kiểm tra kĩ các thông tin, cập nhật đúng các thông tin như: <i>Mã biển số xe</i>; <i>Tài xế - ID T.Xế</i> và <i>B.cáo t.trạng sau cùng</i> sau khi nắm được thông tin với tài xế phụ trách chuyến.<br>
        Một khi <i>B.cáo t.trạng sau cùng</i> của một chuyến xe được xác nhận là <b>Hoàn thành</b> hoặc <b>Hủy bỏ</b>, thì bạn sẽ không thể cập nhật tương tác với dữ liệu chuyến này được nữa. Hãy cẩn thận!</p>
      </div>
      <div>
        <h4>Bảng ghi các thao tác cập nhật</h4>
        
        <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã số chuyến</th>
              
              <th scope="col">Ngày tháng k.hành</th>
              <th scope="col">Giờ khởi hành (thực tế)</th>
              <th scope="col">Giờ tới nơi (thực tế)</th>
              
              <th scope="col">Mã biển số xe</th>
              <th scope="col">Tài xế - ID T.Xế</th>
              <th scope="col">T.trạng sau cùng</th>
              <th scope="col">Thời điểm cập nhật</th>
              <th scope="col">Người c.nhật</th>

            </tr>
          </thead>
          <tbody>
          @foreach($lichSuChuyenXe as $lscx)
            <tr>
              <td>{{ $lscx->MaTuyenXe }}</td>
              <td>{{ $lscx->NgayKhoiHanh }}-{{ $lscx->ThangKhoiHanh }}-2024</td>
              <td>{{ $lscx->GioKhoiHanh }}</td>
              <td>{{ $lscx->GioToiNoi }}</td>
              <td>{{ $lscx->MaSoXe }}</td>
              <td>{{ $lscx->MaTaiXe }}</td>
              <td>{{ $lscx->status }}</td>
              <td>{{ $lscx->ThoiDiemCapNhat }}</td>
              <td>{{ $lscx->NguoiCapNhat }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      </div>
@endsection