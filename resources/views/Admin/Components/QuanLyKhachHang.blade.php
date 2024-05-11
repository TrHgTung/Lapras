@extends('Admin.layout')
@section('content')

<h4>Quản lý tài khoản Khách hàng</h4>
<div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Họ và tên</th>
              <th scope="col">E-mail (username đăng nhập)</th>
              <th scope="col">Mật khẩu</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Hành động</th>
              
            </tr>
          </thead>
          <tbody>
            <!-- foreach -->
            @foreach($getUser as $dta)
            <tr>
              <td>{{ $dta->name }}</td>
              <td>{{ $dta->email }}</td>
              <td>*************</td>
            @if($dta->is_active == 1)
                <td>Còn hoạt động</td>
            @else
                <td>Đã bị khóa</td>
            @endif
              <td><input type="button" class="btn btn-sm btn-secondary" value="Khôi phục"></td>
            </tr>
            @endforeach
           <!-- endforeach -->
            <p></p>
          </tbody>
        </table>
      </div>

@endsection