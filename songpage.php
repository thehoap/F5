<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'db_connect.php';
include 'comment.inc.php';
//session_start();
include 'config.php';
$pdo = pdo_connect_mysql();

if (isset($_GET['audio_id'])){
    $stmt = $pdo->prepare('SELECT *,stagename,image FROM songs LEFT JOIN users on songs.user_id=users.id WHERE audio_id = ?');
    $stmt->execute([ $_GET['audio_id'] ]);
    $song1 = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo $song1['audio_id'];
    if(isset($_SESSION['currUser'])){
    $query = "SELECT * FROM likes WHERE user_id = :user_id AND audio_id = :audio_id";
    $statement = $pdo->prepare($query);
    $statement->execute(
        array(
                'user_id' => $_SESSION['currUser'],
                'audio_id' => $_GET['audio_id']
            )
            );
    $count = $statement->rowCount();
    }
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
        <link rel="stylesheet" href="./css/search.css" />
    </head>
    <body>
        <div class="grid">
            <!-- Sidebar -->
            <?php include "templates/sidebar.html";?>
            <!-- Header -->
            <?php include "templates/header.php";?>
            <main class="main">
                <section class="cover">
                    <div class="cover-content">
                        <!-- <div class="cover-info">
                            <button class="play-song-btn cover__play-song-btn" onclick="playPauseTrack(); return false;" >
                                <ion-icon class="play-icon" name="play" onclick="return false;"></ion-icon> 
                            </button>
                        </div> -->
                        <div class="cover-info">
                            <button class="play-song-btn cover__play-song-btn" onclick="playPauseTrack(); return false;" >
                                <ion-icon class="play-icon" name="play" onclick="return false;"></ion-icon> 
                            </button>
                            <div>
                                <h3 class="cover-title"><?=$song1['title']?></h3>
                                <span class="cover-desc"><?=$song1['stagename']?></span>
                            </div>
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
                    <a href="artistpage.php?id=<?=$song1['user_id']?>" class="card">
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
                        <?php
                            if(isset($_SESSION['currUser'])){
                            echo "<form method='POST' action='".setComments($conn)."' class='comment-top'>
                                <div>
                                <img
                                    src=".$_SESSION['avatar'].$_SESSION['path']."
                                    alt='Avatar'
                                    class='user-avatar'
                                />
                                <input type = 'hidden' name = 'uid' value=".$_SESSION['currUser'].">
                                <input type = 'hidden' name = 'audio_id' value=".$_GET['audio_id'].">
                                <input type = 'hidden' name = 'date' value = '".date('Y-m-d H:i:s')."'>
                                <textarea
                                    required
                                    name='message'
                                    id='comment-input'
                                    cols='30'
                                    rows='3'
                                    class='form-input'
                                    placeholder='Bạn nghĩ gì về bài nhạc này? '
                                ></textarea>
                                </div>
                                <button type = 'submit' class='primary-btn comment-btn' name= 'submitComment'>Bình luận</button>
                                </form>";
                            }
                            getComment($conn,$_GET['audio_id']);
        
                        ?>
                        
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
                    <?php if(isset($_SESSION['currUser'])){?>
                    <div class="heart" title="<?=$_GET['audio_id']?>">
                    <?php if($count>0){ ?>
                        <ion-icon name="heart"></ion-icon>
                    <?php }else{ ?>
                        <ion-icon name="heart-outline"></ion-icon>
                    <?php } ?>
                    </div>
                    <?php }?>
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
        </div>
        <?php include "templates/script.php";?>
    </body>
</html>
