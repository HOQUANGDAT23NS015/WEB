<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cờ Caro</title>
  <style>
    body {
      background-image: url('./hinhanh/giaodien.png');
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .board {
      display: grid;
      grid-template-columns: repeat(3, 100px);
      grid-gap: 2px;
      background-color: #333;
      padding: 2px;
    }

    .cell {
      background-color:grey;
      width: 100px;
      height: 100px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 50px;
      cursor: pointer;
    }

    .cell.x {
      color: #f44336;
    }

    .cell.o {
      color: #4caf50;
    }

    .status {
      margin-top: 20px;
      font-size: 24px;
      font-weight: bold;
      color:white;
    }
  </style>
</head>
<body>
  <div class="game">
    <div class="board">
      <div class="cell"></div>
      <div class="cell"></div>
      <div class="cell"></div>
      <div class="cell"></div>
      <div class="cell"></div>
      <div class="cell"></div>
      <div class="cell"></div>
      <div class="cell"></div>
      <div class="cell"></div>
    </div>
    <div class="status">Lượt của Player 1</div>
  </div>

  <script>
    const cells = document.querySelectorAll('.cell');
    let currentPlayer = 'x';
    let gameOver = false;

    function checkWin(player) {
      // Kiểm tra các hàng ngang
      for (let i = 0; i < 9; i += 3) {
        if (
          cells[i].textContent === player &&
          cells[i + 1].textContent === player &&
          cells[i + 2].textContent === player
        ) {
          return true;
        }
      }

      // Kiểm tra các hàng dọc
      for (let i = 0; i < 3; i++) {
        if (
          cells[i].textContent === player &&
          cells[i + 3].textContent === player &&
          cells[i + 6].textContent === player
        ) {
          return true;
        }
      }

      // Kiểm tra các đường chéo
      if (
        (cells[0].textContent === player && cells[4].textContent === player && cells[8].textContent === player) ||
        (cells[2].textContent === player && cells[4].textContent === player && cells[6].textContent === player)
      ) {
        return true;
      }

      return false;
    }

    function handleCellClick(event) {
      if (gameOver) return;

      const cell = event.target;
      if (cell.textContent !== '') return;

      cell.textContent = currentPlayer;
      cell.classList.add(currentPlayer);

      if (checkWin(currentPlayer)) {
        document.querySelector('.status').textContent = `Người chơi ${currentPlayer} đã thắng!`;
        gameOver = true;
      } else if (Array.from(cells).every(cell => cell.textContent !== '')) {
        document.querySelector('.status').textContent = 'Hòa!';
        gameOver = true;
      } else {
        currentPlayer = currentPlayer === 'x' ? 'o' : 'x';
        document.querySelector('.status').textContent = `Lượt của Player ${currentPlayer}`;
      }
    }

    cells.forEach(cell => cell.addEventListener('click', handleCellClick));
  </script>
</body>
</html>