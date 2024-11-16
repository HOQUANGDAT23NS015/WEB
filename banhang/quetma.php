<?php
session_start();

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['payment_receipt'])) {
    if ($_FILES['payment_receipt']['error'] == UPLOAD_ERR_OK) {
        $uploads_dir = 'uploads/';
        $file_name = basename($_FILES['payment_receipt']['name']);
        $target_file = $uploads_dir . $file_name;

        // Kiểm tra nếu thư mục uploads tồn tại, nếu không thì tạo nó
        if (!is_dir($uploads_dir)) {
            mkdir($uploads_dir, 0755, true);
        }

        if (move_uploaded_file($_FILES['payment_receipt']['tmp_name'], $target_file)) {
            $success_message = "Bạn đã thanh toán thành công.";
            // Chuyển hướng đến checkout.php
            header('Location: checkout1.php');
            exit();
        } else {
            $error_message = "Có lỗi xảy ra khi upload file.";
        }
    } else {
        $error_message = "Có lỗi xảy ra khi upload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
        }

        .qr-code {
            text-align: center;
            margin-bottom: 20px;
        }

        .qr-code img {
            max-width: 150px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkorange;
        }

        .message {
            margin-top: 20px;
            text-align: center;
        }

        .logo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .logo {
            width: 60px; /* Kích thước logo */
            margin: 5px;
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
    <div class="form-container">
        <div class="qr-code">
            <img src="./HinhAnh/qr.png" alt="QR Code">
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" id="payment_receipt" name="payment_receipt" required>
            </div>
            <button type="submit" class="link-orange">Thanh Toán</button>
        </form>

        <?php if (!empty($success_message)): ?>
            <div class="message" style="color: green;"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            <div class="message" style="color: red;"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <div class="logo-container">
            <img src="https://logos-world.net/wp-content/uploads/2020/04/Visa-Symbol.png" alt="Logo 1" class="logo">
            <img src="https://tse2.mm.bing.net/th?id=OIP.TWQyCQYjZJMcHdK-nPWb_AHaHa&pid=Api&P=0&h=220" alt="Logo 2" class="logo">
            <img src="https://tse1.mm.bing.net/th?id=OIP.6OylrjBdwVIvD_yrJhbfUAHaHa&pid=Api&P=0&h=220" alt="Logo 3" class="logo">
            <img src="http://1.bp.blogspot.com/-LmsCG9fnJvk/UkPMlSOaVyI/AAAAAAAACGY/oLjdrHKcQWk/s1600/techcombank-logo.jpg" alt="Logo 4" class="logo">
            <img src="https://forbes.vn/wp-content/uploads/2022/06/LogoTop50_TPBank.jpg" alt="Logo 5" class="logo">
        </div>
    </div>
</body>
</html>