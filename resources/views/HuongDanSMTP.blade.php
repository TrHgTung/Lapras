<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hướng dẫn lấy SMTP Password từ Google</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9fafb;
      color: #333;
      line-height: 1.6;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h1 {
      color: #0073e6;
      text-align: center;
    }

    ol {
      padding-left: 20px;
    }

    li {
      margin-bottom: 15px;
    }

    a {
      color: #0073e6;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .note {
      background: #fff3cd;
      padding: 10px 15px;
      border-left: 4px solid #ffc107;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Hướng dẫn lấy Mật khẩu SMTP với Gmail</h1>
    <p>Để gửi email qua SMTP từ ứng dụng hoặc website sử dụng Gmail, bạn cần tạo một <strong>mật khẩu ứng dụng (App Password)</strong> nếu tài khoản của bạn đã bật xác minh 2 bước.</p>

    <h2>Bước thực hiện:</h2>
    <ol>
      <li>Truy cập <a href="https://myaccount.google.com/security" target="_blank">Google Tài khoản – Bảo mật</a>.</li>
      <li>Đảm bảo bạn đã bật <strong>Xác minh 2 bước (2-Step Verification)</strong>.</li>
      <li>Sau khi bật, cuộn xuống phần <strong>"Mật khẩu ứng dụng" (App passwords)</strong> và nhấn vào đó.</li>
      <li>Chọn ứng dụng: Chọn “Khác (Tùy chỉnh tên)” và nhập ví dụ “SMTP Email”.</li>
      <li>Nhấn nút <strong>Tạo</strong>, bạn sẽ thấy một mật khẩu gồm 16 ký tự xuất hiện. Nhớ xóa bỏ các dấu khoảng cách, một mật khẩu SMTP đúng sẽ có dạng: <i>abcdefghijklmnop</i></li>
      <li>Sao chép mật khẩu đó và sử dụng cho việc đăng ký tài khoản admin.</li>
    </ol>

    <div class="note">
      <strong>Lưu ý:</strong> Mật khẩu ứng dụng chỉ hiển thị 1 lần. Hãy lưu lại ở nơi an toàn.
    </div>
  </div>
</body>
</html>
