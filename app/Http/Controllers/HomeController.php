<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        // Feedback::all();
        $getFeedback = DB::table('feedback')->limit(10)->get(); // chỉ lấy 10 item
        return view('TrangChu')->with('getFeedback', $getFeedback);
    }    
}
