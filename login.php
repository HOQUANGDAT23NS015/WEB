<?php
session_start(); // Bắt đầu phiên làm việc

try {
    $dsn = "mysql:host=localhost;dbname=web";
    $user = "root";
    $pass = "1234";
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Xử lý form đăng nhập
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        // Truy vấn kiểm tra tên người dùng và mật khẩu
        $stmt = $con->prepare("SELECT * FROM dangky WHERE uname = :uname AND pass = :pass");
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();

        // Kiểm tra kết quả
        if ($stmt->rowCount() > 0) {
            $_SESSION['uname'] = $uname; // Lưu tên người dùng vào phiên
            echo "Đăng nhập thành công! Chào mừng, " . htmlspecialchars($uname) . ".";
        } else {
            echo "Tên người dùng hoặc mật khẩu không đúng.";
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
    <title>Đăng Nhập</title>
</head>
<body>
    <h2>Đăng Nhập</h2>
    <form method="post" action="">
        <label for="uname">Tên người dùng:</label>
        <input type="text" id="uname" name="uname" required>
        <br>

        <label for="pass">Mật khẩu:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <center>
        <a href="./trangchinh.php" class="button">Đăng nhập</a>
        <a href="./quenpass.php" class="button">Quên mật khẩu?</a>
    </center>
       
        
    </form>
 
    <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p> 
</body>
</html>