<!DOCTYPE html>
<html lang="en">
<?php 
session_start(); 
include 'stylepost.php'; 
include 'config.php'; 
?>
<body>
    <?php include 'navigation.php'; ?>
    
    <?php 
    if(isset($_GET["id"])) {
        $sqlthongtinsanpham = "SELECT * FROM sanpham WHERE masanpham=" . intval($_GET["id"]); // Sanitize input
        $ketquathongtinsanpham = $conn->query($sqlthongtinsanpham);
        
        if($ketquathongtinsanpham && $ketquathongtinsanpham->num_rows > 0) {
            while($row = $ketquathongtinsanpham->fetch_assoc()) {
    ?>
    <div class="single">
        <div class="container">
            <div class="col-md-6">
                <img src="<?= htmlspecialchars(substr($row["hinhanh"], 1)) ?>" width="100%" alt="<?= htmlspecialchars($row["tensanpham"]) ?>">
            </div>
            <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
                <h3><?= htmlspecialchars($row["tensanpham"]) ?></h3>
                <p><span class="item_price"><?= number_format($row["dongia"]) ?> VNĐ</span></p>
                
                <div class="description">
                    <h5><?= htmlspecialchars($row["mota"]) ?></h5>
                </div>
                <div class="color-quality">
                    
                </div>
                
                <div class="clearfix"> </div>
                <div class="occasion-cart">
                    <form action="checkout.php" method="POST">
                        <input type="hidden" name="product_id" value="<?= intval($row["masanpham"]) ?>">
                        <input type="hidden" name="product_name" value="<?= htmlspecialchars($row["tensanpham"]) ?>">
                        <input type="hidden" name="product_price" value="<?= number_format($row["dongia"]) ?>">
                        <input type="hidden" name="product_image" value="<?= htmlspecialchars(substr($row["hinhanh"], 1)) ?>">
                        <input type="number" name="numsoluong" class="form-control" style="width: 30%" min="1" value="1"> <!-- Add min and value -->
                        <button type="submit" class="item_add hvr-outline-out button2">Add to Cart</button>
                    </form>
                </div>
    <?php 
            }
        } else {
            echo "<p>Product not found.</p>"; // Handle no results
        }
        $conn->close();
    } else {
        echo "<p>Invalid product ID.</p>"; // Handle missing ID
    }
    ?>                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>