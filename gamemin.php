<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cuộc chạy đua 24/7</title>
  <style>
    body {
      background-image: url('./hinhanh/giaodienbom.png');
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .game-container {
      display: grid;
      grid-template-columns: repeat(10, 40px);
      grid-template-rows: repeat(10, 40px);
      gap: 2px;
      background-color: #ccc;
      padding: 10px;
      border-radius: 5px;
    }

    .game-cell {
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .game-cell.revealed {
      background-color: #ddd;
    }

    .game-cell.mine {
      background-color: #ff6b6b;
      color: white;
    }

    .game-cell.flag {
      background-color: #4caf50;
      color: white;
    }

    .game-over-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      color: white;
      font-size: 24px;
      z-index: 1;
    }

    .game-over-overlay button {
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="game-container"></div>
  <div class="game-over-overlay" style="display: none;">
    <div id="game-over-message"></div>
    <button id="restart-button">Play Again</button>
  </div>

  <script>
    const GAME_WIDTH = 10;
    const GAME_HEIGHT = 10;
    const MINE_COUNT = 10;

    let gameBoard = [];
    let minePositions = [];
    let revealedCells = 0;
    let isGameOver = false;

    function createGameBoard() {
      const gameContainer = document.querySelector('.game-container');
      gameContainer.innerHTML = '';

      gameBoard = Array.from({ length: GAME_HEIGHT }, () =>
        Array.from({ length: GAME_WIDTH }, () => ({
          hasMine: false,
          revealedCount: 0,
          isRevealed: false,
          isFlagged: false,
        }))
      );

      placeMines();
      calculateMineNeighbors();

      gameBoard.forEach((row, y) => {
        row.forEach((_, x) => {
          const cell = document.createElement('div');
          cell.classList.add('game-cell');
          cell.dataset.x = x;
          cell.dataset.y = y;
          cell.addEventListener('click', handleCellClick);
          cell.addEventListener('contextmenu', handleCellRightClick);
          gameContainer.appendChild(cell);
        });
      });
    }

    function placeMines() {
      minePositions = [];
      while (minePositions.length < MINE_COUNT) {
        const x = Math.floor(Math.random() * GAME_WIDTH);
        const y = Math.floor(Math.random() * GAME_HEIGHT);
        if (!gameBoard[y][x].hasMine) {
          gameBoard[y][x].hasMine = true;
          minePositions.push({ x, y });
        }
      }
    }

    function calculateMineNeighbors() {
      gameBoard.forEach((row, y) => {
        row.forEach((cell, x) => {
          if (!cell.hasMine) {
            let mineCount = 0;
            for (let dx = -1; dx <= 1; dx++) {
              for (let dy = -1; dy <= 1; dy++) {
                const nx = x + dx;
                const ny = y + dy;
                if (nx >= 0 && nx < GAME_WIDTH && ny >= 0 && ny < GAME_HEIGHT && gameBoard[ny][nx].hasMine) {
                  mineCount++;
                }
              }
            }
            cell.revealedCount = mineCount;
          }
        });
      });
    }

    function handleCellClick(event) {
      if (isGameOver) return;

      const cell = event.target;
      const x = parseInt(cell.dataset.x);
      const y = parseInt(cell.dataset.y);

      if (gameBoard[y][x].isFlagged) return;

      if (gameBoard[y][x].hasMine) {
        revealMines();
        showGameOverMessage('You lose!');
      } else {
        revealCell(x, y);
        if (revealedCells === GAME_WIDTH * GAME_HEIGHT - MINE_COUNT) {
          revealMines();
          showGameOverMessage('You win!');
        }
      }
    }

    function handleCellRightClick(event) {
      event.preventDefault();

      if (isGameOver) return;

      const cell = event.target;
      const x = parseInt(cell.dataset.x);
      const y = parseInt(cell.dataset.y);

      if (!gameBoard[y][x].isRevealed) {
        gameBoard[y][x].isFlagged = !gameBoard[y][x].isFlagged;
        cell.classList.toggle('flag');
      }
    }

    function revealCell(x, y) {
      const cell = gameBoard[y][x];
      if (!cell.isRevealed) {
        cell.isRevealed = true;
        revealedCells++;
        const cellElement = document.querySelector(`[data-x="${x}"][data-y="${y}"]`);
        cellElement.classList.add('revealed');
        if (cell.revealedCount === 0) {
          for (let dx = -1; dx <= 1; dx++) {
            for (let dy = -1; dy <= 1; dy++) {
              const nx = x + dx;
              const ny = y + dy;
              if (nx >= 0 && nx < GAME_WIDTH && ny >= 0 && ny < GAME_HEIGHT && !gameBoard[ny][nx].isRevealed) {
                revealCell(nx, ny);
              }
            }
          }
        } else {
          cellElement.textContent = cell.revealedCount;
        }
      }
    }

    function revealMines() {
      isGameOver = true;
      minePositions.forEach(({ x, y }) => {
        const cellElement = document.querySelector(`[data-x="${x}"][data-y="${y}"]`);
        cellElement.classList.add('mine');
      });
    }

    function showGameOverMessage(message) {
      const gameOverOverlay = document.querySelector('.game-over-overlay');
      const gameOverMessage = document.getElementById('game-over-message');
      gameOverMessage.textContent = message;
      gameOverOverlay.style.display = 'flex';

      const restartButton = document.getElementById('restart-button');
      restartButton.addEventListener('click', restartGame);
    }

    function restartGame() {
      const gameOverOverlay = document.querySelector('.game-over-overlay');
      gameOverOverlay.style.display = 'none';
      isGameOver = false;
      revealedCells = 0;
      createGameBoard();
    }

    createGameBoard();
  </script>
</body>
</html>