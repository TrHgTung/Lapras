@extends('Admin.layout')
@section('content')

<h4>Quản lý tài khoản nhà quản trị (Administrators)</h4>
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
            <!-- Nếu is_master == '1' -->
            @if(Session::get('admin_is_master') == '1')
              <!-- foreach -->
              @foreach($getAdmin as $dta)
              <tr>
                <td>{{ $dta->name }}</td>
                <td>{{ $dta->email }}</td>
                <td>*************</td>
              @if($dta->is_active == 1)
                  <td>Còn hoạt động</td>
              @else
                  <td>Đã bị khóa</td>
              @endif
              @if($dta->is_active == '1')
                <td><form action="{{URL::to('/admin/disableadminaccount')}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="admin_id" value="{{ $dta->id }}">
                  <input type="submit" value="Khóa tài khoản" class="btn btn-sm btn-danger">
                </form></td>
              @else
              <td><form action="{{URL::to('/admin/reactivateadminaccount')}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="admin_id" value="{{ $dta->id }}">
                  <input type="submit" value="Hiệu lực tài khoản" class="btn btn-sm btn-success">
                </form></td>
              @endif
              </tr>
              @endforeach
            <!-- endforeach -->
            <!-- Nếu is_master == '0' -->
            @else
                <!-- foreach -->
                @foreach($getAdmin as $dta)
                  <tr>
                    <td>{{ $dta->name }}</td>
                    <td>{{ $dta->email }}</td>
                    <td>*************</td>
                  @if($dta->is_active == 1)
                      <td>Còn hoạt động</td>
                  @else
                      <td>Đã bị khóa</td>
                  @endif
                  <td>Ko có đủ quyền</td>
                  </tr>
                  @endforeach
                <!-- endforeach -->
            @endif
            <p></p>
          </tbody>
        </table>
      </div>

      <!-- Form them tai khoan admin -->
      <div>
        <form class="form-signin" method="post" action="{{URL::to('/admin/themadmin')}}">
            {{ csrf_field() }}
            <div class="text-center mb-4">
                <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Thêm Nhà quản trị</h1>
            </div>
            <div class="text-center mb-3 mt-2 text-success">
                <?php echo Session::get('success_admin_added'); ?>      
            </div>

            <input type="hidden" name="is_active" value="1">
            <div class="form-label-group mt-3">
                <label for="inputName">Họ Tên</label>
                <input type="text" id="inputName" class="form-control" placeholder="" name="name" required>
                
            </div>
            
            <div class="form-label-group mt-3">
                <label for="inputEmail">Email (username để đăng nhập Admin)</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="" name="email" required>
                
            </div>

            <div class="form-label-group mt-3">
                <label for="inputPassword">Mật khẩu</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="" name="password" required>
                
            </div>

            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Thêm tài khoản</button>

            <p class="mt-5 mb-3 text-muted text-center">&copy; Nhóm 6 - Đổi mới sáng tạo và khởi nghiệp</p>
        </form>
      </div>

@endsection