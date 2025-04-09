<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>AlisaMeuclique</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: #f2f2f2;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        #present {
            cursor: pointer;
            transition: transform 0.3s;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #present:hover {
            transform: translate(-50%, -50%) scale(1.05);
        }

        #surpriseMessage {
            display: none;
            position: absolute;
            top: 10px;
            width: 100%;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: red;
            z-index: 2;
        }

        .gif-clone {
            position: absolute;
            width: 150px;
            pointer-events: none;
            animation: spin 5s infinite linear;
        }

        @keyframes spin {
            0% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }
    </style>
</head>
<body>
    <div id="surpriseMessage">🎉 VSF CANALHAA! 🎉</div>

    <img id="present" src="https://i.gifer.com/71Q4.gif" alt="Presente">

    <audio id="sound" loop>
        <source src="https://www.myinstants.com/media/sounds/edit_xJn6sm3.mp3" type="audio/mpeg">
        Seu navegador não suporta áudio.
    </audio>

    <script>
        const present = document.getElementById("present");
        const surpriseMessage = document.getElementById("surpriseMessage");
        const sound = document.getElementById("sound");

        function randomPosition() {
            const x = Math.random() * window.innerWidth;
            const y = Math.random() * window.innerHeight;
            return { x, y };
        }

        function spawnGif() {
            const gif = document.createElement("img");
            gif.src = "https://i.gifer.com/43nn.gif";
            gif.classList.add("gif-clone");
            const pos = randomPosition();
            gif.style.left = `${pos.x}px`;
            gif.style.top = `${pos.y}px`;
            document.body.appendChild(gif);
        }

        function startChaos() {
            surpriseMessage.style.display = "block";
            present.style.display = "none";
            sound.volume = 0.1;
            sound.play();

            let volume = 0.1;
            const volumeInterval = setInterval(() => {
                if (volume < 1) {
                    volume += 0.05;
                    sound.volume = Math.min(volume, 1);
                } else {
                    clearInterval(volumeInterval);
                }
            }, 500);

            let gifCount = 0;
            const gifInterval = setInterval(() => {
                spawnGif();
                gifCount++;
                if (gifCount >= 100) clearInterval(gifInterval); 
            }, 150);
        }

        present.addEventListener("click", startChaos);
    </script>
</body>
</html>
