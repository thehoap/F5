<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>F5MP3</title>
        <link
            rel="shortcut icon"
            href="https://cdn-icons-png.flaticon.com/512/1384/1384061.png"
            type="image/x-icon"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
        <link
            rel="shortcut icon"
            href="./assets/Logo F5 ver2.svg"
            type="image/x-icon"
        />
        <script
            type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
        ></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
        ></script>
        <link rel="stylesheet" href="./css/base.css">
        <link rel="stylesheet" href="./css/app.css" />
    </head>
    <body>
        <div class="music-player">
            <div class="song">
                <img
                    src="./assets/img/tron tim.jpg"
                    alt=""
                    class="song song__thumb"
                />
                <div class="song song__desc">
                    <h4 class="song song__title">Trốn tìm</h4>
                    <p class="song song__artist">Đen Vâu</p>
                </div>
                <ion-icon class="heart-outline" name="heart-outline"></ion-icon>
            </div>
            <div class="player">
                <div class="controls">
                    <ion-icon class="shuffle" name="shuffle"></ion-icon>
                    <ion-icon class="play-skip-back" name="play-skip-back"></ion-icon>
                    <ion-icon class="play" name="play"></ion-icon>
                    <ion-icon class="play-skip-forward" name="play-skip-forward"></ion-icon>
                    <ion-icon class="repeat" name="repeat"></ion-icon>
                </div>
                <div class="timer">
                    <div class="current">1:02</div>
                    <input type="range" name="track" id="track" class="range"></input>
                    <div class="duration">4:08</div>
                </div>
            </div>
            <div class="action">
                <ion-icon class="cloud-download-outline" name="cloud-download-outline"></ion-icon>
                <div class="volume">
                    <ion-icon class="volume-high" name="volume-high"></ion-icon>
                    <input type="range" name="volume"  id="volume" class="range" >
                </div>
            </div>
        </div>
    </body>
</html>
