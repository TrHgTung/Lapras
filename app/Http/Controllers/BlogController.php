<?php

namespace App\Http\Controllers;

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
        $data['LinkThumbnail'] = '/system/test';
        $data['status'] = '1';

        $msg = "Đã thêm thành công";
        Session::put('success_blog_added', $msg);
        $user = DB::table('blog')->insertGetId($data);

        return Redirect::to('/admin/quanlyblog');
    }

    public function XoaBlog(Request $req){
        $getBlogId = $req->blogId;
        // $inactive_vehicle_day = ((int)Carbon::now()->day) - 1;
        // $inactive_vehicle_month = Carbon::now()->month;
        // $inactive_vehicle_year = Carbon::now()->year;
        // $inactive_vehicle_time_updt = $inactive_vehicle_day.'/'.$inactive_vehicle_month.'/'.$inactive_vehicle_year;
        $delBlog = Blog::where('id', $getBlogId)->update(array('status' => '0'));

        //$getTuyenXe->delete(); // không nên dùng phương thức delete, vì sẽ không khôi phục được du lieu
        return Redirect::to('/admin/quanlyblog');
    }
}
