<?php
session_start();

// Tạo mã an toàn ngẫu nhiên
function generateSecurityCode() {
    return rand(1000, 9999); // Mã an toàn 4 chữ số
}

// Khởi tạo mã an toàn nếu chưa có
if (!isset($_SESSION['securityCode'])) {
    $_SESSION['securityCode'] = generateSecurityCode();
}

$securityCode = $_SESSION['securityCode'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra mã an toàn
    if ($_POST['inputSecurityCode'] != $securityCode) {
        $message = "Mã an toàn không đúng. Vui lòng nhập lại.";
        $_SESSION['securityCode'] = generateSecurityCode(); // Tạo mã mới
    } else {
        // Xử lý thanh toán ở đây
        // ...
        $message = "Thanh toán thành công!";
        unset($_SESSION['securityCode']); // Xóa mã an toàn sau khi thanh toán

        // Chuyển hướng về checkout.php
        header('Location: checkout1.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Thanh Toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-orange {
            background-color: orange;
        }
        .btn-gray {
            background-color: gray;
        }
        .required {
            color: red;
        }
        .message {
            color: red;
            margin-bottom: 10px;
        }
        .card-images img {
            width: 40px;
            margin-right: 5px;
            margin-left: 5px;
        }
        .link-gray {
            display: inline-block;
            padding: 10px;
            color: #fff;
            background-color: gray;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
        .link-orange {
            display: inline-block;
            padding: 10px;
            color: #fff;
            background-color: orange;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Thanh Toán</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="cardType">Loại thẻ <span class="required">*</span></label>
            <select id="cardType" name="cardType" required>
                <option value="">Chọn loại thẻ</option>
                <option value="visa">Visa</option>
                <option value="vietcombank">Vietcombank</option>
                <option value="bidv">BIDV</option>
                <option value="techcombank">Techcombank</option>
                <option value="tpbank">TPBank</option>
                <option value="agribank">Agribank</option>
                <option value="dongabank">DongA Bank</option>
            </select>
        </div>
        <div class="form-group card-images">
            <label>Hình ảnh thẻ:</label>
            <img src="https://logos-world.net/wp-content/uploads/2020/04/Visa-Symbol.png" alt="Visa">
            <img src="https://tse2.mm.bing.net/th?id=OIP.TWQyCQYjZJMcHdK-nPWb_AHaHa&pid=Api&P=0&h=220" alt="Vietcombank">
            <img src="https://tse1.mm.bing.net/th?id=OIP.6OylrjBdwVIvD_yrJhbfUAHaHa&pid=Api&P=0&h=220" alt="BIDV">
            <img src="http://1.bp.blogspot.com/-LmsCG9fnJvk/UkPMlSOaVyI/AAAAAAAACGY/oLjdrHKcQWk/s1600/techcombank-logo.jpg" alt="Techcombank">
            <img src="https://forbes.vn/wp-content/uploads/2022/06/LogoTop50_TPBank.jpg" alt="TPBank">
            <img src="https://thongtinnganhang.com.vn/wp-content/uploads/2020/08/agribank2.png" alt="Agribank">
            <img src="https://tse3.mm.bing.net/th?id=OIP.zwBwOPFGFxaFTZ9bxjkQUwHaHa&pid=Api&P=0&h=220" alt="DongA Bank">
        </div>
        <div class="form-group">
            <label for="cardNumber">Số thẻ <span class="required">*</span></label>
            <input type="text" id="cardNumber" name="cardNumber" required>
        </div>
        <div class="form-group">
            <label for="cardName">Tên in trên thẻ <span class="required">*</span></label>
            <input type="text" id="cardName" name="cardName" required>
        </div>
        <div class="form-group">
            <label for="expiryDate">Ngày hết hạn <span class="required">*</span></label>
            <input type="date" id="expiryDate" name="expiryDate" required>
        </div>
        <div class="form-group">
            <label for="inputSecurityCode">Mã an toàn <span class="required">*</span> (<?php echo $securityCode; ?>)</label>
            <input type="text" id="inputSecurityCode" name="inputSecurityCode" required>
        </div>
        <button type="submit" class="link-orange">Thanh Toán</button>
        <a href="quetma.php" class="link-gray">Chọn Thanh Toán Khác</a>
    </form>
    <p class="message"><?php echo $message; ?></p>
    <p><span class="required">*</span> Các trường có dấu * là bắt buộc phải nhập</p>
</div>

</body>
</html>