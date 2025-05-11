<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cài đặt ứng dụng</title>
  <style>
        * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        }

        body {
        background: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        }

        .login-container {
        background: white;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 400px;
        }

        .login-container h2 {
        margin-bottom: 20px;
        text-align: center;
        }

        .input-group {
        margin-bottom: 15px;
        }

        .input-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        }

        .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        }

        button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        }

        button:hover {
        background-color: #0056b3;
        }

  </style>
</head>
<body>
  <div class="login-container">
    <h2>Cài đặt ứng dụng</h2>
    <p>Trước hết, bạn cần phải khởi tạo admin</p><br><br>
    <form auto-complete="off" method="POST" action="{{URL::to('/setup_application')}}">
    {{ csrf_field() }}
      <div class="input-group">
        <label for="name">Tên hiển thị</label>
        <input type="text" id="name" name="name" required>
      </div>
      
      <div class="input-group">
        <label for="email">Email đăng nhập</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="input-group">
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="input-group">
        <label for="smtp_password">Mật khẩu SMTP*</label>
        <input type="password" id="smtp_password" name="smtp_password" required>
      </div>

      <button type="submit">Đăng ký</button>
    </form><br><br>
    <small><strong>*: Mật khẩu SMTP: </strong>Mật khẩu SMTP là mật khẩu dùng để xác thực khi gửi email qua giao thức SMTP (Simple Mail Transfer Protocol). Mật khẩu này được sử dụng khi bạn cấu hình website cho tính năng gửi nhận e-mail. <a href="{{URL::to('/huongdan-smtp')}}" target="_blank">Tìm hiểu thêm</a></small>
  </div>
  
</body>
</html>
