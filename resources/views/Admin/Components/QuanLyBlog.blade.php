@extends('Admin.layout')
@section('content')
      <h5>Quản lý Bài viết</h5>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã số bài viết</th>
              <th scope="col">Tiêu đề</th>
              <th scope="col">Nội dung</th>
              <th scope="col">Ảnh</th>
              <th scope="col">Thao tác (Xóa)</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getAllBlogs as $getb)
            <tr>
              
              <!-- <td>{{ $getb->TieuDe }}</td>
              <td>{{ $getb->NoiDung }}</td>
              <td>{{ $getb->LinkThumbnail }}</td>
              <td><a href="{{URL::to('/admin/xoablog/'.$getb->id)}}" class="btn btn-sm btn-danger">Xóa</a></td> -->
              @if($getb->status == '1')
                <td class="fw-bold">{{ $getb->id }}</td>
                <td>{{ $getb->TieuDe }}</td>
                <td>{{ $getb->NoiDung }}</td>
                <!-- <td>{{ $getb->LinkThumbnail }}</td> -->
                <td><img src="{{asset('/storage/'.$getb->LinkThumbnail )}}" alt="{{$getb->TieuDe}}"></td>
                <td>
                
                <form action="{{URL::to('/admin/xoablog/')}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="blogId" value="{{ $getb->id }}">
                  <input type="submit" value="Xóa Blog" class="btn btn-danger btn-sm">
                </form>
              </td>
              @else
                
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
       <!-- Form them -->
       <div class="mt-5 mb-5">
        <form class="form-signin" method="post" action="{{URL::to('/admin/themblog')}}">
            {{ csrf_field() }}
            <div class="text-center mb-4">
                <img class="mb-4" src="{{asset('images/logo_original.jpg')}}" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Thêm mới Bài viết</h1>
            </div>
            <div class="text-center mb-3 mt-2 text-success">
                <?php echo Session::get('success_blog_added'); ?>      
            </div>

            
            <div class="form-label-group mt-3">
                <label for="mataixe">Tiêu đề</label>
                <input type="text" id="mataixe" class="form-control" placeholder="" name="TieuDe" required>
                
            </div>
            <div class="form-label-group mt-3">
                <label for="hoten">Nội dung</label>
                <input type="text" id="hoten" class="form-control" placeholder="" name="NoiDung" required>
            </div>
            <div class="form-label-group mt-3">
                <label for="b3">Chọn ảnh</label>
                <input type="file" class="form-control" id="b3" name="LinkThumbnail" accept=​"image/png, image/jpeg"  />
            </div>
            
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Thêm bài</button>
        </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; Hoàng Tùng</p>
        </form>
      </div>
      

@endsection