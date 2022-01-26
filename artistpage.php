<?php
//session_start();
include 'config.php';
$pdo = pdo_connect_mysql();

if (isset($_GET['id'])){
    $stmt1 = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt1->execute([ $_GET['id'] ]); $user = $stmt1->fetch(PDO::FETCH_ASSOC);
$stmt2 = $pdo->prepare('SELECT *,stagename FROM songs LEFT JOIN users on
songs.user_id=users.id WHERE songs.user_id = ?'); $stmt2->execute([ $_GET['id']
]); $songs = $stmt2->fetchAll(PDO::FETCH_ASSOC); } else{ exit(); } ?>

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
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
            rel="stylesheet"
        />
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
        <link rel="stylesheet" href="./css/base.css" />
        <link rel="stylesheet" href="./css/app.css" />
        <link rel="stylesheet" href="./css/search.css" />
    </head>
    <body>
        <div class="grid">
            <!-- Sidebar -->
            <?php include "templates/sidebar.html";?>
            <!-- Header -->
            <?php include "templates/header.php";?>
            <main class="main">
                <!-- Persional Page -->
                <section class="profile">
                    <img src="<?=($_SESSION["avatar"] ="./assets/avatar/".$user['image'])?>" alt="" class="profile__img" />
                    <div class="profile__info">
                        <div class="profile__auth">
                            <ion-icon name="checkmark-circle"></ion-icon>
                            Nghệ sĩ được xác minh
                        </div>
                        <h2 class="profile__name"><?= $user['stagename']?></h2>
                    </div>
                </section>
                <!-- Artist Playlist -->
                <section class="cards">
                    <div class="cards-top">
                        <h3 class="cards-title">Bài hát phổ biến</h3>
                    </div>
                    <div class="cards-bottom">
                        <?php if ($songs){ ?>
                        <?php foreach($songs as $song): ?>
                        <a
                            href="songpage.php?audio_id=<?=$song['audio_id']?>"
                            class="card card-song"
                        >
                            <!-- <a class="card card-song"> -->
                            <img src="<?=($_SESSION["links_pictures"].$song['thumbnail'])?>"
                            alt="" class="card-img" />
                            <div class="card-content">
                                <h4 class="card-title"><?=$song['title']?></h4>
                                <span class="card-desc"
                                    ><?=$song['stagename']?></span
                                >
                            </div>
                            <button class="play-song-btn">
                                <ion-icon
                                    class="play-icon"
                                    name="play"
                                ></ion-icon>
                            </button>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php } ?>
                </section>
            </main>
            <!-- Music Player -->
            <div class="music-player">
                <div class="waveform" style="display: none"></div>
                <div class="song">
                    <img
                        src="./assets/img/tron tim.jpg"
                        alt=""
                        class="song__thumb"
                    />
                    <div class="song__desc">
                        <h4 class="song__title">Trốn tìm</h4>
                        <p class="song__artist">Đen Vâu</p>
                    </div>
                    <div class="heart" onclick="favorite(this)">
                        <ion-icon name="heart-outline"></ion-icon>
                    </div>
                </div>
                <div class="player">
                    <div class="controls">
                        <ion-icon class="shuffle" name="shuffle"></ion-icon>
                        <ion-icon
                            class="play-skip-back"
                            name="play-skip-back"
                        ></ion-icon>
                        <div class="play">
                            <ion-icon class="play-icon" name="play"></ion-icon>
                        </div>
                        <ion-icon
                            class="play-skip-forward"
                            name="play-skip-forward"
                        ></ion-icon>
                        <ion-icon class="repeat" name="repeat"></ion-icon>
                    </div>
                    <div class="timer">
                        <div class="current">1:02</div>
                        <input
                            type="range"
                            name="track"
                            id="track"
                            class="range"
                        />
                        <audio
                            src="./assets/music/tron-tim-den-vau.mp3"
                            id="song"
                        ></audio>
                        <div class="duration">4:08</div>
                    </div>
                </div>
                <div class="action">
                    <a href="./assets/music/tron-tim-den-vau.mp3" download>
                        <ion-icon
                            class="cloud-download-outline"
                            name="cloud-download-outline"
                        ></ion-icon>
                    </a>
                    <div class="volume">
                        <div class="volume-icon">
                            <ion-icon
                                class="volume-high"
                                name="volume-high"
                            ></ion-icon>
                        </div>
                        <input
                            type="range"
                            name="volume"
                            id="volume"
                            class="range"
                            min="0"
                            max="1"
                            step="0.01"
                        />
                    </div>
                </div>
            </div>
        </div>
        <?php include "templates/script.php";?> 
    </body>
</html>
