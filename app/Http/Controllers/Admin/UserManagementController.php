<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Redirect;

class UserManagementController extends Controller
{
    public function KiemTraXacThucAdmin(){
        $admin_check = Session::get('admin_email');
        if($admin_check == NULL || $admin_check == ''){
            return Redirect::to('/admin/dangnhap')->send();
        }
    }

    public function index(){
        $this->KiemTraXacThucAdmin();
        $getUser = User::all();

        return view('Admin.Components.QuanLyKhachHang')->with('getUser', $getUser);
    }
}
