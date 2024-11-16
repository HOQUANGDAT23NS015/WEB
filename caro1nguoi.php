<!DOCTYPE html>
<html>
<head>
    <title>Cờ Caro</title>
    <style>
        body {
            background-image: url('./hinhanh/giaodien.png');
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        table {
            border-collapse: collapse;
            border: 2px solid grey;
        }
        td {
            width: 100px;
            height: 100px;
            text-align: center;
            vertical-align: middle;
            font-size: 50px;
            border: 1px solid #333;
            cursor: pointer;
            background-color: #fff;
        }
        #message {
            font-size: 30px;
            margin-top: 20px;
            color:white;
        }
    </style>
</head>
<body>
    <table id="board">
        <tr>
            <td id="0-0"></td>
            <td id="0-1"></td>
            <td id="0-2"></td>
        </tr>
        <tr>
            <td id="1-0"></td>
            <td id="1-1"></td>
            <td id="1-2"></td>
        </tr>
        <tr>
            <td id="2-0"></td>
            <td id="2-1"></td>
            <td id="2-2"></td>
        </tr>
    </table>
    <div id="message">Your turn</div>

    <script>
        const board = [];
        let currentPlayer = 'X';
        let gameOver = false;

        // Khởi tạo bàn cờ
        for (let i = 0; i < 3; i++) {
            board[i] = [];
            for (let j = 0; j < 3; j++) {
                board[i][j] = '';
                document.getElementById(`${i}-${j}`).addEventListener('click', handleClick);
            }
        }

        function handleClick(event) {
            const [row, col] = event.target.id.split('-').map(Number);
            if (board[row][col] === '' && !gameOver) {
                board[row][col] = currentPlayer;
                event.target.textContent = currentPlayer;
                checkWin();
                if (!gameOver) {
                    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
                    document.getElementById('message').textContent = `${currentPlayer}'s turn`;
                    setTimeout(aiMove, 500);
                }
            }
        }

        function aiMove() {
            let bestScore = -Infinity;
            let bestMove = null;

            for (let i = 0; i < 3; i++) {
                for (let j = 0; j < 3; j++) {
                    if (board[i][j] === '') {
                        board[i][j] = 'O';
                        const score = minimax(board, 0, false);
                        board[i][j] = '';
                        if (score > bestScore) {
                            bestScore = score;
                            bestMove = [i, j];
                        }
                    }
                }
            }

            board[bestMove[0]][bestMove[1]] = 'O';
            document.getElementById(`${bestMove[0]}-${bestMove[1]}`).textContent = 'O';
            checkWin();
            if (!gameOver) {
                currentPlayer = 'X';
                document.getElementById('message').textContent = `Your turn`;
            }
        }

        function minimax(board, depth, isMaximizing) {
            const result = checkWinnerOrDraw(board);
            if (result !== '') {
                return result === 'O' ? 1 : result === 'X' ? -1 : 0;
            }

            if (isMaximizing) {
                let bestScore = -Infinity;
                for (let i = 0; i < 3; i++) {
                    for (let j = 0; j < 3; j++) {
                        if (board[i][j] === '') {
                            board[i][j] = 'O';
                            const score = minimax(board, depth + 1, false);
                            board[i][j] = '';
                            bestScore = Math.max(bestScore, score);
                        }
                    }
                }
                return bestScore;
            } else {
                let bestScore = Infinity;
                for (let i = 0; i < 3; i++) {
                    for (let j = 0; j < 3; j++) {
                        if (board[i][j] === '') {
                            board[i][j] = 'X';
                            const score = minimax(board, depth + 1, true);
                            board[i][j] = '';
                            bestScore = Math.min(bestScore, score);
                        }
                    }
                }
                return bestScore;
            }
        }

        function checkWinnerOrDraw(board) {
            // Kiểm tra hàng ngang
            for (let i = 0; i < 3; i++) {
                if (board[i][0] === board[i][1] && board[i][1] === board[i][2] && board[i][0] !== '') {
                    return board[i][0];
                }
            }

            // Kiểm tra hàng dọc
            for (let i = 0; i < 3; i++) {
                if (board[0][i] === board[1][i] && board[1][i] === board[2][i] && board[0][i] !== '') {
                    return board[0][i];
                }
            }

            // Kiểm tra đường chéo
            if (board[0][0] === board[1][1] && board[1][1] === board[2][2] && board[0][0] !== '') {
                return board[0][0];
            }
            if (board[0][2] === board[1][1] && board[1][1] === board[2][0] && board[0][2] !== '') {
                return board[0][2];
            }

            // Kiểm tra hòa
            for (let i = 0; i < 3; i++) {
                for (let j = 0; j < 3; j++) {
                    if (board[i][j] === '') {
                        return '';
                    }
                }
            }

            return 'draw';
        }

        function checkWin() {
            const winner = checkWinnerOrDraw(board);
            if (winner !== '') {
                gameOver = true;
                document.getElementById('message').textContent = winner === 'draw' ? 'It\'s a draw!' : `${winner} wins!`;
            }
        }
    </script>
</body>
</html>