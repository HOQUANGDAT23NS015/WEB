<?php
include 'config.php';  // Bao gồm tệp cấu hình
session_start();

// Xử lý thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['numsoluong']) ? intval($_POST['numsoluong']) : 1; // Nhận số lượng từ form

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    $stmt = $conn->prepare("SELECT tensanpham, dongia FROM sanpham WHERE masanpham = ?");
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Kiểm tra nếu giỏ hàng đã tồn tại trong session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Thêm sản phẩm vào giỏ hàng
        $product_found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] === $product['tensanpham']) {
                $item['quantity'] += $quantity; // Cộng dồn số lượng
                $product_found = true;
                break;
            }
        }

        // Nếu sản phẩm chưa có trong giỏ hàng
        if (!$product_found) {
            $_SESSION['cart'][] = [
                'name' => $product['tensanpham'],
                'price' => $product['dongia'],
                'quantity' => $quantity // Lưu số lượng
            ];
        }
    }

    header('Location: checkout.php');
    exit();
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_item'])) {
    $item_name = $_POST['remove_item'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['name'] === $item_name) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
}

// Tính tổng tiền
$total = 0;

// Lấy danh sách sản phẩm từ cơ sở dữ liệu
$result = $conn->query("SELECT * FROM sanpham");
$products = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1, h2 {
            color: #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px; /* Điều chỉnh kích thước logo */
        }
        .top-image {
            max-width: 150px; /* Điều chỉnh kích thước hình ảnh góc trên bên phải */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ff9800; /* Màu cam cho tiêu đề bảng */
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
        }
        .pay-button {
            display: inline-block;
            background-color: #ff9800; /* Màu cam cho nút */
            color: white;
            padding: 10px 15px;
            text-decoration: none; /* Xóa gạch chân */
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .pay-button:hover {
            background-color: #fb8c00; /* Màu cam đậm khi hover */
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .product-form {
            display: inline;
        }
        .remove-button {
            background-color: #f44336; /* Màu đỏ cho nút xóa */
        }
        .remove-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="./HinhAnh/logo.png" alt="Logo" class="logo"> <!-- Logo ở góc trái -->
            <img src="./HinhAnh/hinh-anh-cute-nhat-the-gioi.jpg" alt="Top Image" class="top-image"> <!-- Hình ảnh góc phải -->
        </div>
      
        <center><h1>Giỏ hàng của bạn</h1></center>
        <form method="POST" action="">
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Chọn</th>
                </tr>
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= $item['quantity'] ?></td>
                            <td>
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="remove_item" value="<?= htmlspecialchars($item['name']) ?>">
                                    <button type="submit" class="remove-button">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total += $item['price'] * $item['quantity']; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Giỏ hàng trống.</td>
                    </tr>
                <?php endif; ?>
            </table>
            <h2 class="total">Tổng tiền: <?= number_format($total, 0, ',', '.') ?> VNĐ</h2>
            <a href="thanhtoan.php" class="pay-button">Thanh toán</a> <!-- Thay nút bằng liên kết -->
        </form>

        <h2>Chọn sản phẩm để thêm vào giỏ hàng</h2>
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Thêm vào giỏ hàng</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['tensanpham']) ?></td>
                    <td><?= number_format($product['dongia'], 0, ',', '.') ?> VNĐ</td>
                    <td>
                        <form method="POST" action="" class="product-form">
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['masanpham']) ?>">
                            <input type="number" name="numsoluong" class="form-control" style="width: 60px;" min="1" value="1"> <!-- Input số lượng -->
                            <button type="submit">Thêm vào giỏ hàng</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>