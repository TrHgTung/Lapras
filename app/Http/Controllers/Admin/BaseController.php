<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Session;
use DB;
use Redirect;

class BaseController extends Controller
{
    // public function KiemTraXacThucAdmin(){
    //     $admin_check = Session::get('admin_email');
    //     if($admin_check || $admin_check != ''){
    //         return Redirect::to('/admin')->send();
    //     }
    // }
    public function main(){
        $uid = Session::get('id'); // user check
        $admin_check = Session::get('admin_email'); // admin check
        if($admin_check || $admin_check != ''){
            return Redirect::to('/admin/dashboard')->send();
        }
        
        else if($uid || $uid != ''){
            return Redirect::to('/')->send();
        }
        else if(!$admin_check || $admin_check == ''){
            return Redirect::to('/admin/dangnhap')->send();
        }
        else{
            throw ValidationException::withMessages(['Error']);
        }
    }
}
