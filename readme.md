<h1>LAPRAS - Một hệ thống vận hành theo nghiệp vụ 'Xe khách dịch vụ' (Role: Khách hàng || Nhà xe) - SSR với Laravel</h1>
<h2>GIỚI THIỆU</h2>
1. <b> Laravel </b>: <br>
- Tài liệu: https://laravel.com/ <br>
- Tham khảo: ChatGPT (https://chat.openai.com/), StackOverFlow (https://stackoverflow.com/), Laracasts (https://laracasts.com/) <br>
2. <b> Xuất Excel (PhpSpreadsheet)</b>: <br>
- Tài liệu: https://phpspreadsheet.readthedocs.io/en/latest/ <br>
- Tham khảo: https://youtu.be/F3uPQyc08jA <br>
3. <b> Hiển thị biểu đồ (ChartJS)</b>: <br>
- Tài liệu: https://www.chartjs.org/ <br>
- Tham khảo: https://www.chartjs.org/docs/latest/getting-started/integration.html <br>

<h2>YÊU CẦU PHẦN MỀM</h2>
1. Đã cài đặt XAMPP (có sẵn MySQL, PHP, Apache, ....) <br>
2. Kiểm tra PHP đã cài đặt chưa. Mở Command line: chạy lệnh `php --version` , yêu cầu phiên bản PHP phải lớn hơn 8.1 <br>
2.1. Nếu chạy lệnh `php --version` trả về lỗi, hãy tự tìm cách để thiết lập biến môi trường Windows cho PHP (Gợi ý từ khóa: set environment variable for windows - https://sebhastian.com/php-not-recognized-command-windows/) <br>
3. Đã cài đặt Composer (https://getcomposer.org/download/). Composer khi cài đặt phải nhận phiên bản PHP đang có trên máy <br>

<h2>CÁCH SETUP SOURCE</h2>

0. Chạy XAMPP với quyền admin, khởi động 2 dịch vụ: Apache và MySQL <br>
1. git clone source về, trong hệ quản trị CSDL MySQL (PHPMyAdmin : truy cập bằng trình duyệt với địa chỉ: 127.0.0.1:80/phpmyadmin) -> tạo 1 CSDL mới, đặt tên gì cũng được (VD: webdatxe)<br>
2. Mở command line: cd <tên thư mục chứa source>, chạy lệnh `composer update` (nếu ko được thì `composer install`) <br>
3. Copy file .env.example thành 1 file mới, và đổi tên file mới này thành .env <br>
4. Mở file .env mới tạo, tìm tới dòng DB_DATABASE=project và thay thế 'project' thành tên cơ sở dữ liệu được tạo trong MySQL (webdatxe)<br>
5. chạy lệnh `php artisan key:generate` để tạo khóa truy cập cho localhost (Laravel) <br>
6. chạy lệnh `php artisan migrate` để ánh xạ từ model lên cơ sở dữ liệu MySQL. Nếu lỗi xảy ra, hãy import file source_laravel.sql trong thư mục BackupDB vào MySQL. <br>
   6.1. (Kiểm tra dữ liệu trong CSDL) - Nếu sử dụng cách thức migrate vào CSDL, hãy vào MySQL để thêm một vài dữ liệu test. - Còn nếu import file backup thì không cần <br>
7. Chạy lệnh `php artisan serve --port 4401`. Lúc này ứng dụng sẽ chạy trên 127.0.0.1:4401, mở trình duyệt và truy cập bằng địa chỉ này <br>

<h2>CÁCH CHẠY SOURCE</h2>
1. Chạy Xampp với quyền admin, khởi động 2 dịch vụ: Apache và MySQL <br>
2. Chạy lệnh `php artisan serve --port 4401`. Lúc này ứng dụng sẽ chạy trên 127.0.0.1:4401, mở trình duyệt và truy cập bằng địa chỉ này <br>

<p>127.0.0.1 chính là địa chỉ localhost</p>
> <i>Tại sao dự án có tên là Lapras?</i> - Đây là tên của một loài P*kém*n có các đặc tính cũng như chiêu thức thích hợp với việc vận chuyển (Lapras Express)
