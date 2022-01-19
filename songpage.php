<?php
//session_start();
include 'config.php';
$pdo = pdo_connect_mysql();

if (isset($_GET['audio_id'])){
    $stmt = $pdo->prepare('SELECT *,stagename,image FROM songs LEFT JOIN users on songs.user_id=users.id WHERE audio_id = ?');
    $stmt->execute([ $_GET['audio_id'] ]);
    $song1 = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo $song1['audio_id'];
} 

?>

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
    </head>
    <body>
        <main class="main">
            <section class="cover">
                <div class="cover-content">
                    <div>
                        <h3 class="cover-title"><?=$song1['title']?></h3>
                        <span class="cover-desc"><?=$song1['stagename']?></span>
                    </div>
                    <div class="timer">
                        <div class="current">1:02</div>
                        <div class="waveform"></div>
                        <div class="duration">4:08</div>
                    </div>
                </div>
                <img
                    src="<?=($_SESSION["links_pictures"].$song1['thumbnail'])?>"
                    alt=""
                    class="cover-thumb"
                />
            </section>
            <section class="interaction">
                <a href="./index copy.html" class="card">
                    <img
                        src="<?=($_SESSION["avatar"].$song1['image'])?>"
                        alt=""
                        class="card-img"
                    />
                    <div class="card-content">
                        <h4 class="card-title"><?=($song1['stagename'])?></h4>
                        <span class="card-desc"><?=($song1['occupation'])?></span>
                    </div>
                </a>
                <section class="comment-box">
                    <form class="comment-top">
                        <div>
                            <img
                                src="./assets/img/ian-dooley-d1UPkiFd04A-unsplash.jpg"
                                alt="Avatar"
                                class="user-avatar"
                            />
                            <textarea
                                name="comment"
                                id="comment-input"
                                cols="30"
                                rows="3"
                                class="form-input"
                                placeholder="Bạn nghĩ gì về bài nhạc này? "
                            ></textarea>
                        </div>
                        <!-- <button type="reset" class="primary-btn comment-btn">Huy</button> -->
                        <button type="submit" class="primary-btn comment-btn">
                            Bình luận
                        </button>
                    </form>
                    <ul class="comment-bottom">
                        <li class="comment">
                            <img
                                src="./assets/img/andriyko-podilnyk-3p6RZXty-7c-unsplash.jpg"
                                alt=""
                                class="user-avatar"
                            />
                            <div class="comment__desc">
                                <span class="comment__name user-name">
                                    Huong Luu
                                </span>
                                <p class="comment__content">
                                    Rất thích những bài của Đen. Ko cần phải có
                                    những con beat ồn ào, dữ dội. Chỉ cần nhẹ
                                    nhàng thôi mà sâu thấm lòng người
                                </p>
                            </div>
                        </li>
                        <li class="comment">
                            <img
                                src="./assets/img/evan-wise-1wYswsLHXII-unsplash.jpg"
                                alt=""
                                class="user-avatar"
                            />
                            <div class="comment__desc">
                                <span class="comment__name user-name">
                                    Tài Nguyễn Hoàng Phú
                                </span>
                                <p class="comment__content">
                                    Bài hát nay mang một “cái tôi trong âm nhạc”
                                    của Đen rất rõ. Vì vậy hơi khó cảm được với
                                    đại đa số công chúng. Những ai đã trải qua
                                    thì mới thấy được cái hay “rất riêng” và
                                    “độc quyền” trong Trốn Tìm :3
                                </p>
                            </div>
                        </li>
                        <li class="comment">
                            <img
                                src="./assets/img/drew-colins-LIEQsu5JuoM-unsplash.jpg"
                                alt=""
                                class="user-avatar"
                            />
                            <div class="comment__desc">
                                <span class="comment__name user-name">
                                    Hồng Nguyễn
                                </span>
                                <p class="comment__content">
                                    1 tháng trước Cám ơn Đen Vâu . Nhạc và lời
                                    bài hát thật sự rất rất hay ... nghe hoài
                                    nghe mãi mà vẫn thích nghe . Chúc mừng ĐEN
                                    VÂU nhé 👍👍👏👏👏
                                </p>
                            </div>
                        </li>
                    </ul>
                </section>
            </section>
        </main>
        <div class="music-player">
            <div class="song">
                <img
                    src="<?=($_SESSION["links_pictures"].$song1['thumbnail'])?>"
                    alt=""
                    class="song__thumb"
                />
                <div class="song__desc">
                    <h4 class="song__title"><?=$song1['title']?></h4>
                    <p class="song__artist"><?=$song1['username']?></p>
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
                    <input type="range" name="track" id="track" class="range"/>
                    <audio
                        src="<?=($_SESSION["links_songs"].$song1['audio_location'])?>"
                        id="song"
                    ></audio>
                    <div class="duration">4:08</div>
                </div>
            </div>
            <div class="action">
                <a href="<?=($_SESSION["links_songs"].$song1['audio_location'])?>" download>
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

        <script src="https://unpkg.com/wavesurfer.js"></script>
        <script src="javascript/waveform.js"></script>
        <script src="javascript/app.js"></script>
    </body>
</html>