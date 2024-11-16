<?php
session_start();
$error = '';
$success = '';

// Hàm tạo mã xác minh ngẫu nhiên
function generateVerificationCode($length = 6) {
    return bin2hex(random_bytes($length / 2));
}

if (isset($_POST['reset_password'])) {
    $email = $_POST['email'];
    $verification_code = $_POST['verification_code'];
    $new_password = $_POST['new_password'];

    // Kiểm tra mã xác minh
    if ($verification_code == $_SESSION['verification_code']) {
        // Kết nối tới cơ sở dữ liệu
        try {
            $dsn = "mysql:host=localhost;dbname=web";
            $user = "root";
            $pass = "1234";
            $con = new PDO($dsn, $user, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Mã hóa mật khẩu mới
            $hashed_pass = password_hash($new_password, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu trong cơ sở dữ liệu
            $stmt = $con->prepare("UPDATE dangky SET pass = :pass WHERE email = :email");
            $stmt->bindParam(':pass', $hashed_pass);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                $success = "Đặt mật khẩu thành công!";
                // Tạo mã xác minh mới
                $_SESSION['verification_code'] = generateVerificationCode();
            } else {
                $error = "Đặt mật khẩu không thành công!";
                // Tạo mã xác minh mới
                $_SESSION['verification_code'] = generateVerificationCode();
            }
        } catch (PDOException $e) {
            $error = "Lỗi: " . $e->getMessage();
            // Tạo mã xác minh mới
            $_SESSION['verification_code'] = generateVerificationCode();
        }
    } else {
        $error = "Mã xác minh không đúng!";
        // Tạo mã xác minh mới
        $_SESSION['verification_code'] = generateVerificationCode();
    }
} else {
    // Tạo mã xác minh khi trang được tải lần đầu
    $_SESSION['verification_code'] = generateVerificationCode();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Quên mật khẩu</title>
</head>
<body>
    <div class="container">
        <h2>Quên Mật Khẩu</h2>
        <?php if ($error) echo "<p class='error'>$error</p>"; ?>
        <?php if ($success) echo "<p class='success'>$success</p>"; ?>
        <form method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <label for="verification_code">Mã xác minh:</label>
            <div class="verification-code">
                <?php echo $_SESSION['verification_code']; ?>
            </div>
            <input type="text" name="verification_code" required>
            
            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" name="new_password" required>
            
            <button type="submit" name="reset_password"><a href="./login.php">Đặt lại mật khảu</a></button>
        </form>
    </div>
</body>