<h1>YÊU CẦU PHẦN MỀM</h1>
1. Đã cài đặt XAMPP (full combo Apache, PHP, MySQL, ....) <br>
2. Kiểm tra phiên bản PHP. Mở Command line: chạy lệnh `php --version` , yêu cầu phiên bản PHP phải lớn hơn 8.1 <br>
2.1. Nếu chạy lệnh `php --version` trả về lỗi, hãy google cách để set biến môi trường windows cho PHP (từ khóa: set environment variable for windows php not found fix) - https://sebhastian.com/php-not-recognized-command-windows/ <br>
3. Đã cài đặt Composer (https://getcomposer.org/download/). Composer khi cài đặt phải nhận phiên bản PHP đang có trên máy <br>

<h1>CÁCH SETUP SOURCE</h1>

0. Chạy Xampp với quyền admin, khởi động 2 dịch vụ: Apache và MySQL <br>
1. git clone source về, trong hệ quản trị CSDL MySQL (PHPMyAdmin : truy cập bằng trình duyệt với địa chỉ: 127.0.0.1:80/phpmyadmin) -> tạo 1 CSDL mới, đặt tên gì cũng được (VD: webdatxe)<br>
2. Mở command line: cd <tên thư mục chứa source>, chạy lệnh `composer update` (nếu ko được thì `composer install`) <br>
3. Copy file .env.example thành 1 file mới, và đổi tên file mới này thành .env <br>
4. Mở file .env mới tạo, tìm tới dòng DB_DATABASE=project và thay thế 'project' thành tên cơ sở dữ liệu được tạo trong MySQL (webdatxe)<br>
5. chạy lệnh `php artisan key:generate` để tạo khóa truy cập cho localhost (Laravel) <br>
6. chạy lệnh `php artisan migrate` để ánh xạ từ model lên cơ sở dữ liệu MySQL. Nếu lỗi xảy ra, hãy import file source_laravel.sql trong thư mục BackupDB vào MySQL. <br>
6.1. (Kiểm tra dữ liệu trong CSDL) - Nếu sử dụng cách thức migrate vào CSDL, hãy vào MySQL để thêm một vài dữ liệu test. - Còn nếu import file backup thì không cần <br>
7. Chạy lệnh `php artisan serve --port 4401`. Lúc này ứng dụng sẽ chạy trên 127.0.0.1:4401, mở trình duyệt và truy cập bằng địa chỉ này <br>

<h1>CÁCH CHẠY SOURCE</h1>
1. Chạy Xampp với quyền admin, khởi động 2 dịch vụ: Apache và MySQL <br>
2. Chạy lệnh `php artisan serve --port 4401`. Lúc này ứng dụng sẽ chạy trên 127.0.0.1:4401, mở trình duyệt và truy cập bằng địa chỉ này <br>

<p>Lưu ý: 127.0.0.1 chính là địa chỉ localhost</p>
