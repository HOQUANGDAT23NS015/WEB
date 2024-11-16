<!DOCTYPE html>
<html>
<head>
  <title>Trò chơi "Nhìn hình đoán chữ"</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('./hinhanh/doachu.png');
      text-align: center;
      margin: 0;
      padding: 20px;
    }
    
    #game-container {
      max-width: 600px;
      margin: 0 auto;
    }
    
    img {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px;
    }
    
    input[type=text] {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
    }
    
    button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #3CB371;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }
    
    #result {
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div id="game-container">
    <h1>Trò chơi "Nhìn hình đoán chữ"</h1>
    <p>Hãy nhìn vào hình và gõ từ tương ứng vào ô bên dưới.</p>
    <img id="game-image" src="" alt="">
    <form id="game-form">
      <input type="text" id="guess-input" placeholder="Đoán từ" required>
      <button type="submit">Kiểm tra</button>
    </form>
    <div id="result"></div>
    <button onclick="showRandomImage()">Show Random Image</button>
  </div>

  <script>
    // Danh sách các từ và hình ảnh tương ứng
    const words = {
      "cá voi": "./hinhanh/dv1.png",
      "bánh rán": "./hinhanh/dv2.png",
      "tiếng anh": "./hinhanh/dv3.png",
      "phú yên": "./hinhanh/dv4.png",
      "cá lóc nướng trui": "./hinhanh/dv5.png",
      "yên bái": "./hinhanh/dv6.png",
      "trà ô long": "./hinhanh/dv7.png",
      "thủy tiên": "./hinhanh/dv8.png",
      "ô ăn quan": "./hinhanh/dv9.png",
      "cây kéo": "./hinhanh/dv10.png",
      "bắp rang bơ": "./hinhanh/dv11.png",
      "quang hải": "./hinhanh/dv12.png",
      "trà sữa": "./hinhanh/dv13.png",
      "ngô quyền": "./hinhanh/dv14.png",
      "hậu cần": "./hinhanh/dv15.png"
    };

    // Chọn ngẫu nhiên một từ từ danh sách
    function showRandomImage() {
      const selectedWord = Object.keys(words)[Math.floor(Math.random() * Object.keys(words).length)];
      document.getElementById("game-image").src = words[selectedWord];
      document.getElementById("game-image").alt = selectedWord;
    }

    // Xử lý dữ liệu từ người chơi
    let selectedWord;

    function showRandomImage() {
      selectedWord = Object.keys(words)[Math.floor(Math.random() * Object.keys(words).length)];
      document.getElementById("game-image").src = words[selectedWord];
      document.getElementById("game-image").alt = selectedWord;
      document.getElementById("guess-input").value = "";
      document.getElementById("result").textContent = "";
    }

    document.getElementById("game-form").addEventListener("submit", function(event) {
      event.preventDefault();
      const guess = document.getElementById("guess-input").value.toLowerCase();
      const result = document.getElementById("result");
      
      if (guess === selectedWord.toLowerCase()) {
        result.textContent = "Chúc mừng, bạn đã đoán đúng!";
      } else {
        result.textContent = "Rất tiếc, đáp án đúng là: " + selectedWord;
      }
    });
  </script>
</body>
</html>