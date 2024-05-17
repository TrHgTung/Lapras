<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">

    <title>Xác thực thanh toán ATM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .atm-card {
            width: 400px;
            height: 200px;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .atm-card .bank-name {
            font-size: 1.5em;
        }
        .atm-card .card-number{
            font-size: 1.2em;
            margin-top: 10px;
        }
        .atm-card .card-holder {
            font-size: 1.2em;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .atm-card .expiry-date{
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .atm-card .cvv-label{
            margin-top:5px;
            font-size: 0.8em;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form input {
            padding: 10px;
            margin: 5px 0;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-custom{
            border-color: #04AA6D;
            color: green;
            cursor: pointer;
        }
        .btn-custom2{
            border-color: #04AA6D;
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="atm-card mt-3" id="atm-card">
            <div class="bank-name" id="bank-name">Ngân hàng</div>
            <div class="card-number" id="card-number">1234 5678 9012 3456</div>
            <div class="card-holder" id="card-holder"> {{ $data['name'] }}</div>
            <div class="cvv-label" id="cvv-label">Hạn SD thẻ</div><div class="expiry-date" id="expiry-date">mm/yy</div>
        </div>
        <!-- form post dữ liệu -->
        <form id="card-form" method="post" action="{{URL::to('/transaction/payment/controller/hshe8r9jjff0098443')}}">
            {{ csrf_field() }}
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <label for="bank-name-input">Chọn 1 Ngân hàng: </label>
            <select id="bank-name-input" name="paymentMethod" required>
                <option value="Vietcombank">Vietcombank</option>
                <option value="Sacombank">Sacombank</option>
                <option value="TPBank">TPBank</option>
                <option value="Argibank">Argibank</option>
            </select>
            <label for="card-number-input">STK: </label><input type="text" id="card-number-input" placeholder="Số Tài khoản" maxlength="19" required>
            <label for="card-holder-input">Chủ thẻ: </label><input type="text" id="card-holder-input"  value="{{ $data['name'] }}" placeholder="Tên Chủ thẻ" required>
            <label for="expiry-date-input">Ngày hết hạn thẻ: </label><input type="text" id="expiry-date-input" placeholder="Ngày hết hạn (MM/YY)" required>
            <label for="atm-passcode">Mã thẻ: </label><input type="password" id="atm-passcode" placeholder="Mã bảo mật" required maxlength="6">
            <label for="giave">Giá vé: </label><input type="text" id="giave" disabled value="{{ $data['giave'] }}">
            <!-- <input type="hidden" name="giave" value="{{ $data['giave'] }}">
            <input type="hidden" name="timeUpdt" value="{{ $data['timeUpdt'] }}">
            <input type="hidden" name="diemdau" value="{{ $data['diemdau'] }}">
            <input type="hidden" name="diemden" value="{{ $data['diemden'] }}"> -->
            <input type="hidden" name="matuyenxe" value="{{ $data['matuyenxe'] }}">
            <input type="submit" value="Nhấn để thanh toán..." class="btn-custom">
        </form>
        <form action="{{URL::to('/transaction/payment/cancel')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="matuyenxe" value="{{ $data['matuyenxe'] }}">
            <input type="submit" value="Hủy bỏ giao dịch" class="btn-custom2">
        </form>
    </div>
    <script>
        const bankNameInput = document.getElementById('bank-name-input');
        const cardNumberInput = document.getElementById('card-number-input');
        const cardHolderInput = document.getElementById('card-holder-input');
        const expiryDateInput = document.getElementById('expiry-date-input');
        
        const bankNameDisplay = document.getElementById('bank-name');
        const cardNumberDisplay = document.getElementById('card-number');
        const cardHolderDisplay = document.getElementById('card-holder');
        const expiryDateDisplay = document.getElementById('expiry-date');
        
        bankNameInput.addEventListener('input', () => {
            bankNameDisplay.textContent = bankNameInput.value;
        });
        
        cardNumberInput.addEventListener('input', () => {
            cardNumberDisplay.textContent = cardNumberInput.value;
        });
        
        cardHolderInput.addEventListener('input', () => {
            cardHolderDisplay.textContent = cardHolderInput.value;
        });
        
        expiryDateInput.addEventListener('input', () => {
            expiryDateDisplay.textContent = expiryDateInput.value;
        });

        // kiểm tra ATM passcode
        const numberPasswordInput = document.getElementById('atm-passcode');

        numberPasswordInput.addEventListener('input', function(e) {
            // Loại bỏ các ký tự không phải là số
            this.value = this.value.replace(/[^\d]/g, '');
        });
        const numberATMNumberInput = document.getElementById('card-number-input');

        numberATMNumberInput.addEventListener('input', function(e) {
            // Loại bỏ các ký tự không phải là số
            this.value = this.value.replace(/[^\d]/g, '');
        });

        document.getElementById('input-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const numberPassword = numberPasswordInput.value;
            console.log(`Number Password: ${numberPassword}`);
        });
    </script>
</body>
</html>
