<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuyenXe;
use App\Models\TaiXe;
use App\Models\PhuongTien;
use App\Models\LichSuChuyenXe;
use App\Models\DoanhThu;
use DB;
use Session;
use Redirect;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Style;


class DashboardController extends Controller
{
    
    public function KiemTraXacThuc(){
        $uid = Session::get('id'); // user check
        $admin_check = Session::get('admin_email'); // admin check
        if($admin_check || $admin_check != ''){ // xu ly chinh
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
    public function KiemTraXacThucAdmin(){
            $admin_check = Session::get('admin_email');
            if($admin_check == NULL || $admin_check == ''){
                return Redirect::to('/admin/dangnhap')->send();
            }
    }

    // public function index(){
    //     $this->KiemTraXacThucAdmin();

    //     // LẤY DU lIEU NGÀY
    //     $dates = DoanhThu::pluck('timeUpdt');
 
    //         // $dates = [
    //         //     "2024-05-18 05:24:02",
    //         //     "2024-05-19 05:24:59"
    //         // ];

    //     $getDay = [];

    //     foreach ($dates as $date) {
    //         // Tách ngày từ chuỗi datetime bằng hàm explode
    //         $tmp = explode(' ', $date);
    //         $dateMonthYearDta = $tmp[0]; // Lấy phần ngày tháng năm

            
    //         $dateOnly = explode('-', $dateMonthYearDta); // Tách ngày thành các thành phần
    //         $dayOnly = $dateOnly[2]; // Lấy ngày

    //         $getDay[] = $dayOnly; // Lưu ngày vào mảng dữ liệu mới
    //     }

    //     // LẤY DỮ LIỆU THANH TOÁN
    //     $getGiaVe = DoanhThu::pluck('giave');
    //     $getGiaVe_count = $getGiaVe->count();
    //     $GiaVe_IntConvert = [];

    //     $getGiaVe2 = $getGiaVe->toArray(); // Chuyển collection về mảng

    //     $GiaVe_IntConvert = array_map('intval', $getGiaVe2); // convert String sang Int
        
    //     // DỮ LIỆU THÁNG DOANH THU
    //     $months = DoanhThu::pluck('timeUpdt');

    //     $getMonth = [];

    //     foreach ($months as $m) {
    //         // Tách ngày từ chuỗi datetime bằng hàm explode
    //         $tmp = explode(' ', $m);
    //         $full_dateMonthYearDta = $tmp[0]; // Lấy phần ngày thangn năm

            
    //         $mOnly = explode('-', $full_dateMonthYearDta); // Tách thành các thành phần
    //         $monthOnly = $mOnly[1]; // Lấy thng

    //         $getMonth[] = $monthOnly; // Lưu thang vào mảng dữ liệu mới
    //     }
    //     $getOneMonth = $getMonth[0];


    //     // DỮ LIỆU NĂM DOANH THU
    //     $years = DoanhThu::pluck('timeUpdt');

    //     $getYear = [];

    //     foreach ($years as $y) {
    //         // Tách nam từ chuỗi datetime bằng hàm explode
    //         $tmp = explode(' ', $y);
    //         $full_dateMonthYearDta = $tmp[0]; // Lấy phần ngày thangn năm

            
    //         $yOnly = explode('-', $full_dateMonthYearDta); // Tách thành các thành phần
    //         $yearOnly = $yOnly[0]; // Lấy namw

    //         $getYear[] = $yearOnly; // Lưu nam vào mảng dữ liệu mới
    //     }
    //     $getOneYear = $getYear[0];


    //     // DỮ LIỆU ĐỂ RENDER BIỂU ĐỒ
    //     $data = [
    //         // 'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //         'labels' => $getDay,
    //         'datasets' => [
    //             [
    //                 'label' => 'Tổng Doanh thu (VND)',
    //                 'backgroundColor' => 'rgba(255,99,132,0.2)',
    //                 'borderColor' => 'rgba(255,99,132,1)',
    //                 'borderWidth' => 1,
    //                 // 'data' => [65, 59, 80, 81, 56, 55, 40],
    //                 'data' => $GiaVe_IntConvert,
    //             ]
    //         ],
           
    //     ];
    //     // $a = [];
    //     // $a[0] = Carbon::now()->day;
    //     // $a[1] = Carbon::now()->month;
    //     // $a[2] = Carbon::now()->year;
    //     return view('Admin.Components.Dashboard', compact('data', 'getOneMonth', 'getOneYear'));
    //     // return dd($a);
    // }


    public function index(){
        $this->KiemTraXacThucAdmin();

        Session::forget('admin_email_validation');
        Session::forget('success_admin_added');
        // LẤY DU lIEU NGÀY
        $days = DoanhThu::pluck('dayUpdt')->unique(); // [18 ; 19]  ==> (array)
 

        // LẤY DỮ LIỆU THANH TOÁN
        $getGiaVe = DoanhThu::pluck('giave');
        $getGiaVe_count = $getGiaVe->count();
        $GiaVe_IntConvert = [];

        $getGiaVe2 = $getGiaVe->toArray(); // Chuyển collection về mảng

        $GiaVe_IntConvert = array_map('intval', $getGiaVe2); // convert String sang Int
        
        // DỮ LIỆU THÁNG DOANH THU
        $months = DoanhThu::pluck('monthUpdt')->unique(); // => array


        // DỮ LIỆU NĂM DOANH THU
        $years = DoanhThu::pluck('yearUpdt')->unique();  // => array


        return view('Admin.Components.DashboardSelection', compact('days','months', 'years', 'GiaVe_IntConvert'));
        // return dd($a);
    }

    public function ShowChart( Request $req){
        $this->KiemTraXacThucAdmin();

        // LẤY DỮ LIỆU TỪ REQUEST
        $getMonth = $req->month;
        $getYear = $req->year;

        // LLẤY DỮ LIỆU NGÀY
        $getDay = DoanhThu::where('monthUpdt', $getMonth)->where('yearUpdt', $getYear)->pluck('dayUpdt');

        // LẤY DỮ LIỆU THANH TOÁN
        $getGiaVe = DoanhThu::where('monthUpdt', $getMonth)->where('yearUpdt', $getYear)->pluck('giave');
        // $getGiaVe_count = $getGiaVe->count();
        $GiaVe_IntConvert = [];

        $getGiaVe2 = $getGiaVe->toArray(); // Chuyển collection về mảng

        $GiaVe_IntConvert = array_map('intval', $getGiaVe2); // convert String sang Int

        $revenueData  = DoanhThu::where('monthUpdt', $getMonth)->where('yearUpdt', $getYear)->select('giave', 'dayUpdt')->get();

        // Mảng để lưu tổng doanh thu của mỗi ngày
        $dailyRevenue = [];

        // Tính tổng doanh thu của từng ngày
        foreach ($revenueData as $entry) {
            $day = $entry['dayUpdt'];
            $revenue = $entry['giave'];
            
            // Kiểm tra nếu ngày đó chưa tồn tại trong mảng thì khởi tạo
            if (!isset($dailyRevenue[$day])) {
                $dailyRevenue[$day] = 0;
            }
            
            // Cộng doanh thu vào ngày tương ứng
            $dailyRevenue[$day] += $revenue;
        }

        $dataBieuDo = array();

        // Lấy kết quả
        // foreach ($dailyRevenue as $day => $totalRevenue) {
        //     //echo "Ngày $day: $totalRevenue<br>";
            
        //     $dataBieuDo = [
        //         'labels' => $day,
        //         'datasets' => [
        //             [
        //                 'label' => 'Tổng Doanh thu (VND)',
        //                 'backgroundColor' => 'rgba(255,99,132,0.2)',
        //                 'borderColor' => 'rgba(255,99,132,1)',
        //                 'borderWidth' => 1,
        //                 'data' => $totalRevenue,
        //             ]
        //         ],
               
        //     ];
        // }


        
        // Dữ liệu xử lí ra được:
        // json [
        //     "18" => "190000",
        //     "19" => "885000"
        // ]
        // Solution: Chuyển thành collection --> tách key (g.trị bên trái) và value (g.trị bên phải)
        // vào 2 biến riêng biệt
        // Dùng 2 biến này để xử lí biểu đồ
        $convertToCollection = collect($dailyRevenue);
        // Tách keys và values
        $getActualDay = $convertToCollection->keys()->toArray();
        $getActualGiaVe = $convertToCollection->values()->toArray();
        // DỮ LIỆU ĐỂ RENDER BIỂU ĐỒ
        $dataBieuDo = [
            //  'labels' => ['17', '18', '19', '20', '21', '22', '23 (Hôm nay)'],
            'labels' => $getActualDay,
            'datasets' => [
                [
                    'label' => 'Tổng Doanh thu (VND)',
                    'backgroundColor' => 'rgba(255,99,132,0.2)',
                    'borderColor' => 'rgba(255,99,132,1)',
                    'borderWidth' => 1,
                    // 'data' => [65000, 59000, 80000, 81000, 56000, 55700, 40000],
                    'data' => $getActualGiaVe,
                ]
            ],
           
        ];

        // return dd($getActualDay);
        return view('Admin.Components.Dashboard', compact('getActualDay','getActualGiaVe', 'dataBieuDo', 'getMonth', 'getYear'));
    }

    // Xuat tat ca Doanh thu ra Excel
    public function XuatExcel(){
        $this->KiemTraXacThucAdmin();

        $dtaDoanhThu = DoanhThu::all();

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        // set font in dam (bold)
        // $boldFontStyle = (new Font())->setBold(true);
        // $headerStyle = (new Style())->setFont($boldFontStyle);
        
         $activeWorksheet->getStyle('A1:K1')->getFont()->setBold(true); 

        
        // Tieu de
        $activeWorksheet->setCellValue('A1', 'ID');
        $activeWorksheet->setCellValue('B1', 'Mã Doanh thu');
        $activeWorksheet->setCellValue('C1', 'Mã Tuyến xe');
        $activeWorksheet->setCellValue('D1', 'Giá bán vé');
        $activeWorksheet->setCellValue('E1', 'Ghi chú của khách');
        $activeWorksheet->setCellValue('F1', 'Email Khách');
        $activeWorksheet->setCellValue('G1', 'Điểm đón');
        $activeWorksheet->setCellValue('H1', 'Điểm trả');
        $activeWorksheet->setCellValue('I1', 'Ngày');
        $activeWorksheet->setCellValue('J1', 'Tháng');
        $activeWorksheet->setCellValue('K1', 'Năm');

        // $activeWorksheet->getStyle('A1:K1')->applyFromArray($headerStyle);
        // Data
        $row = 2;
        foreach ($dtaDoanhThu as $dta) {
            $activeWorksheet->setCellValue('A' . $row, $dta->id);
            $activeWorksheet->setCellValue('B' . $row, $dta->MaDoanhThu);
            $activeWorksheet->setCellValue('C' . $row, $dta->matuyenxe);
            $activeWorksheet->setCellValue('D' . $row, $dta->giave);
            $activeWorksheet->setCellValue('E' . $row, $dta->ghichu);
            $activeWorksheet->setCellValue('F' . $row, $dta->email);
            $activeWorksheet->setCellValue('G' . $row, $dta->diemdau);
            $activeWorksheet->setCellValue('H' . $row, $dta->diemden);
            $activeWorksheet->setCellValue('I' . $row, $dta->dayUpdt);
            $activeWorksheet->setCellValue('J' . $row, $dta->monthUpdt);
            $activeWorksheet->setCellValue('K' . $row, $dta->yearUpdt);
            $row++;
        }

        // // Redirect...
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="DoanhThuToanBo.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }


    // XUAT DATA EXCEL THEO THANG REQUEST
    public function XuatExcelTheoThang(Request $req){
        $this->KiemTraXacThucAdmin();

        $getMonth = $req->month;
        $getYear = $req->year;
        
        // LLẤY DỮ LIỆU 
        $getData = DoanhThu::where('monthUpdt', $getMonth)->where('yearUpdt', $getYear)->get();
        
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

         $activeWorksheet->getStyle('A1:K1')->getFont()->setBold(true); 

        $activeWorksheet->setCellValue('A1', 'ID');
        $activeWorksheet->setCellValue('B1', 'Mã Doanh thu');
        $activeWorksheet->setCellValue('C1', 'Mã Tuyến xe');
        $activeWorksheet->setCellValue('D1', 'Giá bán vé');
        $activeWorksheet->setCellValue('E1', 'Ghi chú của khách');
        $activeWorksheet->setCellValue('F1', 'Email Khách');
        $activeWorksheet->setCellValue('G1', 'Điểm đón');
        $activeWorksheet->setCellValue('H1', 'Điểm trả');
        $activeWorksheet->setCellValue('I1', 'Ngày');
        $activeWorksheet->setCellValue('J1', 'Tháng');
        $activeWorksheet->setCellValue('K1', 'Năm');

      
        $row = 2;
        foreach ($getData as $dta) {
            $activeWorksheet->setCellValue('A' . $row, $dta->id);
            $activeWorksheet->setCellValue('B' . $row, $dta->MaDoanhThu);
            $activeWorksheet->setCellValue('C' . $row, $dta->matuyenxe);
            $activeWorksheet->setCellValue('D' . $row, $dta->giave);
            $activeWorksheet->setCellValue('E' . $row, $dta->ghichu);
            $activeWorksheet->setCellValue('F' . $row, $dta->email);
            $activeWorksheet->setCellValue('G' . $row, $dta->diemdau);
            $activeWorksheet->setCellValue('H' . $row, $dta->diemden);
            $activeWorksheet->setCellValue('I' . $row, $dta->dayUpdt);
            $activeWorksheet->setCellValue('J' . $row, $dta->monthUpdt);
            $activeWorksheet->setCellValue('K' . $row, $dta->yearUpdt);
            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="DoanhThuTheoThang.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

        // return dd($getData);
    }

    public function QuanLyChuyen(){
        $this->KiemTraXacThucAdmin();
        // $getChuyenXe = LichSuChuyenXe::all();
        // $getTaiXe = TaiXe::all();
        $getTaiXe = TaiXe::where('status', '1')->get();
        // $getPhuongTien = PhuongTien::all();
        $getPhuongTien = PhuongTien::where('status', '1')->get();
        $lichSuChuyenXe = LichSuChuyenXe::all();
        $getTuyenXe = TuyenXe::all(); // Lấy dữ liệu Tuyến để hiển thị view, xong form post để truyền lưu dữ liệu vào Lịch sử chuyến
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyChuyen')->with('getTuyenXe',$getTuyenXe)->with('getPhuongTien', $getPhuongTien)->with('getTaiXe', $getTaiXe)->with('lichSuChuyenXe', $lichSuChuyenXe);
    }
    //POST
    public function LuuChuyen(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();
        $getCurrentTimeServer = Carbon::now();

        $data['MaTuyenXe'] = $req->MaTuyenXe;
        $data['NgayKhoiHanh'] = $req->NgayKhoiHanh;
        $data['ThangKhoiHanh'] = $req->ThangKhoiHanh;
        $data['GioKhoiHanh'] = ($req->GioKhoiHanh);
        $data['GioToiNoi'] = ($req->GioToiNoi);
        $data['MaSoXe'] = ($req->MaSoXe);
        $data['MaTaiXe'] = ($req->MaTaiXe);
        $data['status'] = ($req->status);
        $data['NguoiCapNhat'] = ($req->NguoiCapNhat);
        $data['ThoiDiemCapNhat'] = $getCurrentTimeServer;

        $getMaTX = $req->MaTuyenXe;
        $add_to_tuyenxe = ($req->status);
        TuyenXe::where('MaTuyenXe', $getMaTX)->update(array('status' => $add_to_tuyenxe));
        
       
        $user = DB::table('lichsuchuyenxe')->insertGetId($data);

        return Redirect::to('/admin/quanlychuyen');
    }


    public function QuanLyTuyen(){
        $this->KiemTraXacThucAdmin();
        $getTuyenXe = TuyenXe::all();
        $getCurrentMonthServer = Carbon::now()->month;
        $getCurrentYearServer = Carbon::now()->year;
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyTuyen')->with('getTuyenXe',$getTuyenXe)->with('getCurrentMonthServer',$getCurrentMonthServer)->with('getCurrentYearServer',$getCurrentYearServer);
    }

    public function XemToanTuyen(){
        $this->KiemTraXacThucAdmin();
        $getTuyenXe = TuyenXe::all();

        return view('Admin.Components.XemToanTuyen')->with('getTuyenXe',$getTuyenXe);
    }

    public function ThemTuyen(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['MaTuyenXe'] = $req->MaTuyenXe;
        $data['DiemDau'] = $req->DiemDau;
        $data['DiemDen'] = $req->DiemDen;
        $data['NgayKhoiHanh'] = $req->NgayKhoiHanh;
        $data['ThangKhoiHanh'] = $req->ThangKhoiHanh;
        $data['GioKhoiHanh'] = ($req->GioKhoiHanh);
        $data['GioToiNoi'] = ($req->GioToiNoi);
        $data['GiaVe'] = ($req->GiaVe);
        $data['status'] = ($req->status);

        $msg = "Đã thêm thành công";
        Session::put('success_route_added', $msg);
        $user = DB::table('tuyenxe')->insertGetId($data);

        return Redirect::to('/admin/quanlytuyen');
    }
    public function XoaTuyen(Request $req){
        $this->KiemTraXacThucAdmin();
        $getMaTuyenXe = $req->MaTuyenXe;
        $getTuyenXe = TuyenXe::where('MaTuyenXe', $getMaTuyenXe)->update(array('status' => 'cancel'));
        //$getTuyenXe->delete(); // không nên dùng phương thức delete, vì sẽ không khôi phục được du lieu
        return Redirect::to('/admin/xemtoanbotuyen');
    }

    // quan ly phuong tien
    public function QuanLyPhuongTien(){
        $this->KiemTraXacThucAdmin();
        $getPhuongTien = PhuongTien::all();
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyPhuongTien')->with('getPhuongTien',$getPhuongTien);
    }

    public function ThemPhuongTien(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['MaSoXe'] = $req->MaSoXe;
        
        $data['HangXe'] = $req->HangXe;
        $data['SoGhe'] = ($req->SoGhe);
        $data['HanDangKiem'] = ($req->HanDangKiem);
        $data['status'] = '1';
       
        $msg = "Đã thêm thành công";
        Session::put('success_vehicle_added', $msg);
        $user = DB::table('phuongtien')->insertGetId($data);

        return Redirect::to('/admin/quanlyphuongtien');
    }

    public function XoaPhuongTien(Request $req){
        $this->KiemTraXacThucAdmin();
        $getMaSoXe = $req->MaSoXe;
        // $inactive_vehicle_day = ((int)Carbon::now()->day) - 1;
        // $inactive_vehicle_month = Carbon::now()->month;
        // $inactive_vehicle_year = Carbon::now()->year;
        // $inactive_vehicle_time_updt = $inactive_vehicle_day.'/'.$inactive_vehicle_month.'/'.$inactive_vehicle_year;
        $getPhuongTien = PhuongTien::where('MaSoXe', $getMaSoXe)->update(array('status' => '0'));

        //$getTuyenXe->delete(); // không nên dùng phương thức delete, vì sẽ không khôi phục được du lieu
        return Redirect::to('/admin/quanlyphuongtien');
    }
    public function HieuLucPhuongTien(Request $req){
        $this->KiemTraXacThucAdmin();
        $getMaSoXe = $req->MaSoXe;
        $getPhuongTien = PhuongTien::where('MaSoXe', $getMaSoXe)->update(array('status' => '1'));

        return Redirect::to('/admin/quanlyphuongtien');
    }

    public function SuaPhuongTien($id){
        $this->KiemTraXacThucAdmin();
        $getPhuongTien = PhuongTien::find($id);
        // return dd($getPhuongTien);
        return view('Admin.Components.SuaPhuongTien')->with('getPhuongTien', $getPhuongTien);
    }

    public function UpdatePhuongTien(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();
        $ptid = $req->ptid;

        $data['MaSoXe'] = $req->MaSoXe;
        
        $data['HangXe'] = $req->HangXe;
        $data['SoGhe'] = ($req->SoGhe);
        $data['HanDangKiem'] = ($req->HanDangKiem);
       
        // $msg = "Đã lưu thành công";
        // Session::put('success_vehicle_updt', $msg);
        $user = PhuongTien::where('id', $ptid)->update($data);

        return Redirect::to('/admin/quanlyphuongtien');
    }

    // quan ly tai xe
    public function QuanLyTaiXe(){
        $this->KiemTraXacThucAdmin();
        $getTaiXe = TaiXe::all();
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyTaiXe')->with('getTaiXe',$getTaiXe);
    }

    public function ThemTaiXe(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['MaTaiXe'] = $req->MaTaiXe;
        $data['HoTenTaiXe'] = $req->HoTenTaiXe;
        $data['status'] = 1;

        $msg = "Đã thêm thành công";
        Session::put('success_driver_added', $msg);
        $user = DB::table('taixe')->insertGetId($data);

        return Redirect::to('/admin/quanlytaixe');
    }

    public function XoaTaiXe(Request $req){
        $getMaTaiXe = $req->MaTaiXe;
        // $inactive_vehicle_day = ((int)Carbon::now()->day) - 1;
        // $inactive_vehicle_month = Carbon::now()->month;
        // $inactive_vehicle_year = Carbon::now()->year;
        // $inactive_vehicle_time_updt = $inactive_vehicle_day.'/'.$inactive_vehicle_month.'/'.$inactive_vehicle_year;
        $getTaiXe = TaiXe::where('MaTaiXe', $getMaTaiXe)->update(array('status' => '0'));

        //$getTuyenXe->delete(); // không nên dùng phương thức delete, vì sẽ không khôi phục được du lieu
        return Redirect::to('/admin/quanlytaixe');
    }
    public function HieuLucTaiXe(Request $req){
        $getMaTaiXe = $req->MaTaiXe;
        $getTaiXe = TaiXe::where('MaTaiXe', $getMaTaiXe)->update(array('status' => '1'));

        return Redirect::to('/admin/quanlytaixe');
    }

    public function SuaTaiXe($id){
        $this->KiemTraXacThucAdmin();
        $getTaiXe = TaiXe::find($id);
        // return dd($getPhuongTien);
        return view('Admin.Components.SuaTaiXe')->with('getTaiXe', $getTaiXe);
    }

    public function UpdateTaiXe(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();
        $id = $req->id;

        $data['MaTaiXe'] = $req->MaTaiXe;
        $data['HoTenTaiXe'] = $req->HoTenTaiXe;
       
        // $msg = "Đã lưu thành công";
        // Session::put('success_vehicle_updt', $msg);
        $user = TaiXe::where('id', $id)->update($data);

        return Redirect::to('/admin/quanlytaixe');
    }
}
