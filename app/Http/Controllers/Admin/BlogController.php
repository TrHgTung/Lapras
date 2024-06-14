<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\TuyenXe;
use App\Models\TaiXe;
use App\Models\PhuongTien;
use App\Models\LichSuChuyenXe;
use App\Models\DoanhThu;
use DB;
use Session;
use Redirect;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function KiemTraXacThucAdmin(){
        $admin_check = Session::get('admin_email');
        if($admin_check == NULL || $admin_check == ''){
            return Redirect::to('/admin/dangnhap')->send();
        }
    }

    public function BlogView(){
        $this->KiemTraXacThucAdmin();

        $getAllBlogs = Blog::all();

        return view('Admin.Components.QuanLyBlog', compact('getAllBlogs'));
    }

    public function ThemBlog(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['TieuDe'] = $req->TieuDe;
        $data['NoiDung'] = $req->NoiDung;
        $data['status'] = '1';
        
        if ($req->hasFile('LinkThumbnail')) {
            $getImage = $req->file('LinkThumbnail');
            $XuLyImgName = $getImage->getClientOriginalName();
            $XuLyImgExtension = $getImage->getClientOriginalExtension();

            // Lấy phần tên của tệp ảnh (không bao gồm phần mở rộng)
            $ImgName_NameText = pathinfo($XuLyImgName, PATHINFO_FILENAME);

            // Tạo tên mới cho tệp ảnh
            $FinalImgName = 'IMG'.rand(1111,9999).'_'.$ImgName_NameText.'.'.$XuLyImgExtension; // ví dụ: IMG4632_abcxyz.jpg

            // Di chuyển tệp ảnh đến thư mục lưu trữ
            $getImage->move(public_path('storage'), $FinalImgName);

            // Lưu thông tin vào CSDL
            $data['LinkThumbnail'] = $FinalImgName;
            DB::table('blog')->insertGetId($data);

            // thông báo
            Session::put('success_blog_added', 'Đã thêm thành công');

            // Chuyển hướng
            return Redirect::to('admin/quanlyblog');
        } else {
            // Nếu không có tệp ảnh nào được tải lên, trả về thông báo lỗi
            // Session::put('err_blog_added', 'Lỗi!');
            return Redirect::back();
        }

        // $msg = "Đã thêm thành công";
        // Session::put('success_blog_added', $msg);
        // $user = DB::table('blog')->insertGetId($data);

        // return Redirect::to('/admin/quanlyblog');
    }

    public function XoaBlog(Request $req){
        $getBlogId = $req->blogId;
        $delBlog = Blog::where('id', $getBlogId)->update(array('status' => '0'));

        // không nên dùng phương thức delete, vì sẽ không khôi phục được du lieu
        return Redirect::to('/admin/quanlyblog');
    }
}
