<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Which Historical Villain Are You?</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=MedievalSharp&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0a0a0a;
            color: #e0e0e0;
            font-family: 'MedievalSharp', cursive;
        }
        .villain-title {
            font-family: 'Cinzel', serif;
        }
        .question-card {
            background: rgba(20, 20, 20, 0.9);
            border: 1px solid #333;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.1);
        }
        .option-btn {
            transition: all 0.3s ease;
        }
        .option-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
        }
        .music-control {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-b from-gray-900 to-black">
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    <!-- Music Control Button -->
    <div class="music-control">
        <button id="musicToggle" class="bg-red-600 hover:bg-red-700 text-white rounded-full p-3 shadow-lg transition-all transform hover:scale-110">
            <svg id="playIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <svg id="pauseIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </button>
    </div>

    <audio id="bgMusic" loop>
        <source src="{{ asset('audio/ambient.mp3') }}" type="audio/mpeg">
    </audio>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const music = document.getElementById('bgMusic');
            const musicToggle = document.getElementById('musicToggle');
            const playIcon = document.getElementById('playIcon');
            const pauseIcon = document.getElementById('pauseIcon');

            music.volume = 0.3;

            musicToggle.addEventListener('click', function() {
                if (music.paused) {
                    music.play();
                    playIcon.classList.add('hidden');
                    pauseIcon.classList.remove('hidden');
                } else {
                    music.pause();
                    playIcon.classList.remove('hidden');
                    pauseIcon.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
