<?php
try {
    $dsn = "mysql:host=localhost;dbname=web";
    $user = "root";
    $pass = "1234";
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Xử lý form đăng ký
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $verify_pass = $_POST['verify_pass']; // Lấy mật khẩu xác thực từ form

        // Mã hóa mật khẩu
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        // Kiểm tra mật khẩu xác thực
        if (password_verify($verify_pass, $hashed_pass)) {
            // Sử dụng Prepared Statements để tránh SQL Injection
            $stmt = $con->prepare("INSERT INTO dangky (uname, email, pass) VALUES (:uname, :email, :pass)");
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $hashed_pass); // Lưu mật khẩu đã mã hóa

            if ($stmt->execute()) {
                // Chuyển hướng đến trang đăng nhập
                header("Location: login.php");
                exit();
            } else {
                echo "Đăng ký không thành công!";
            }
        } else {
            echo "Mật khẩu xác thực không đúng!";
        }
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Đăng Ký</title>
</head>
<body>
    <h2>Đăng Ký</h2>
    <form method="post" action="">
        <label for="uname">Tên người dùng:</label>
        <input type="text" id="uname" name="uname" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="pass">Mật khẩu:</label>
        <input type="password" id="pass" name="pass" required>
        <br>

        <label for="verify_pass">Xác thực mật khẩu:</label>
        <input type="password" id="verify_pass" name="verify_pass" required>
        <br>

        <!-- Nút gửi để đăng ký -->
        <center><button type="submit" class="button">Đăng ký</button></center>
    </form>

    <p>Đã có tài khoản? <a href="./login.php">Đăng nhập ngay</a></p>
</body>
</html>