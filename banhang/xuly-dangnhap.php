<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xử lý đăng nhập</title>
</head>
<body>

    <?php 
        include 'config.php';
        session_start();
        $_SESSION["TenKhachHang"] = null;

        // Kiểm tra thông tin đăng nhập
        if ($_POST['username'] == "" || $_POST['password'] == '') {
            echo "<script>alert(\"Đăng nhập thất bại\"); 
                    window.location.href = 'login-register.php';
                </script>";
        } else {
            $taikhoan = $_POST['username'];
            $matkhau = $_POST['password'];
            $sql = "SELECT * FROM `nguoidung` WHERE TenTaiKhoan = '$taikhoan' AND MatKhau = '$matkhau' AND TrangThai = 1";
            $ketqua = $conn->query($sql);
            
            // Nếu đăng nhập thành công
            if ($ketqua->num_rows > 0) {
                while ($row = $ketqua->fetch_assoc()) {
                    $_SESSION["TenKhachHang"] = $row["HoTen"];
                    $_SESSION["TaiKhoan"] = $row["TenTaiKhoan"];
                }

                // Lấy trang cần chuyển hướng từ POST
                $redirectPage = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';

                echo "<script>alert(\"Đăng nhập thành công\"); 
                    window.location.href = '$redirectPage';
                </script>";
            } else {
                echo "<script>alert(\"Sai mật khẩu hoặc tên đăng nhập\"); 
                    window.location.href = 'login-register.php';
                </script>";
            }
            $conn->close();
        }
    ?>

</body>
</html>