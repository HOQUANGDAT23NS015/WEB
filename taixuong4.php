<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuộc chạy đua 24/7</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: center;
            width: 80%;
            max-width: 1200px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            flex: 1;
        }

        img {
            width: 550px; /* Kích thước cho tất cả ảnh */
            height: auto;
            display: none; /* Ẩn tất cả ảnh ban đầu */
            margin-bottom: 10px;
        }

        .button {
            background-color: grey;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #555;
        }

        .sidebar {
            flex: 0 0 200px;
            background-color: #f5f5f5;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="https://thuthuatpc.vn/wp-content/uploads/2022/09/game-co-luot-tai-nhieu-nhat-the-gioi7.jpg" alt="Advertisement 1">
            <img src="https://bloganchoi.com/wp-content/uploads/2021/09/bia-bai-game.jpg" alt="Advertisement 2">
            <img src="https://symbols.vn/wp-content/uploads/2022/12/Game-Quay-Hu-Tang-Tien-Khi-Dang-Ky.jpg" alt="Advertisement 3">
            <img src="https://cdn.tgdd.vn/2021/10/campaign/top-20-game-co-luot-tai-nhieu-nhat-the-gioi-hay-va-cuc-hap-640x360.jpg" alt="Advertisement 4">
            <img src="https://mcdn.coolmate.me/image/April2022/tong-hop-cac-the-loai-game-khong-the-bo-qua.jpg" alt="Advertisement 5">
            <img src="https://gamevivu.net/wp-content/uploads/2016/11/Game-Trang-diem-cho-cong-chua-hinh-anh.jpg" alt="Advertisement 6">
        </div>
        <div class="content">
            <h2>Cách tải game Dò Mìn</h2>
            <img src="https://didongviet.vn/dchannel/wp-content/uploads/2024/02/cong-thuc-dang-guessing-game-minesweeper-didongviet@2x.jpg" alt="Ảnh 1" class="image" data-index="0" style="display: block;"> <!-- Ảnh đầu tiên hiển thị -->
            <button class="button loadMore" data-index="0">Xem thêm</button>

            <img src="./hinhanh/1.1.png" alt="Ảnh 2" class="image" data-index="1">
            <img src="./hinhanh/2.1.png" alt="Ảnh 3" class="image" data-index="2">
            <img src="./hinhanh/3.1.png" alt="Ảnh 4" class="image" data-index="3">
            <img src="./hinhanh/4.1.png" alt="Ảnh 5" class="image" data-index="4">
            <img src="./hinhanh/5.1.png" alt="Ảnh 6" class="image" data-index="5">
            <img src="./hinhanh/6.1.png" alt="Ảnh 7" class="image" data-index="6">
            <img src="./hinhanh/7.1.png" alt="Ảnh 8" class="image" data-index="7"> <!-- Ảnh cuối cùng -->
            <button class="button backButton" style="display: none;" onclick="window.location.href='./trangchinh.php';">Quay lại</button> <!-- Nút quay lại -->
        </div>
        <div class="sidebar">
            <img src="https://didongviet.vn/dchannel/wp-content/uploads/2022/06/cooking-city-game-nau-an-didongviet.jpg" alt="Advertisement 7">
            <img src="https://cungchoigame.biz/wp-content/uploads/2012/12/game-thoi-trang-hay-nhat.jpg" alt="Advertisement 8">
            <img src="https://i.ytimg.com/vi/MFTbVSSbGLM/maxresdefault.jpg" alt="Advertisement 9">
            <img src="https://i.ytimg.com/vi/HykH0trDdNA/maxresdefault.jpg" alt="Advertisement 10">
            <img src="https://tse2.mm.bing.net/th?id=OIP.zz-nIq203mYDKg_qjMcrDQHaEH&pid=Api&P=0&h=220" alt="Advertisement 11">
            <img src="https://tse3.mm.bing.net/th?id=OIP.0dsH9yWEeAyuaaK8djAoqgAAAA&pid=Api&P=0&h=220" alt="Advertisement 12">
        </div>
    </div>

    <script>
        const buttons = document.querySelectorAll('.loadMore');
        const images = document.querySelectorAll('.image');
        const backButton = document.querySelector('.backButton');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const index = parseInt(button.dataset.index);
                
                // Ẩn ảnh hiện tại
                images[index].style.display = 'none'; 
                
                // Hiện ảnh tiếp theo
                if (index + 1 < images.length) {
                    images[index + 1].style.display = 'block'; // Hiện ảnh tiếp theo
                    button.dataset.index = index + 1; // Cập nhật index cho nút
                }
                
                // Ẩn nút nếu là ảnh cuối cùng
                if (index + 1 === images.length - 1) {
                    button.style.display = 'none'; // Ẩn nút khi đến ảnh thứ 7
                    backButton.style.display = 'block'; // Hiện nút quay lại
                }
            });
        });
    </script>
</body>
</html>