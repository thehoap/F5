<?php
include 'config.php';
$pdo = pdo_connect_mysql();

if (isset($_GET['category'])){
    $stmt1 = $pdo->prepare('SELECT *,stagename FROM songs LEFT JOIN users on songs.user_id=users.id WHERE category = ? ORDER BY view DESC LIMIT 5');
    $stmt1->execute([ $_GET['category'] ]);
    $list_songs = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    //Nghe si
    $stmt2 = $pdo->prepare('SELECT *,stagename,image FROM songs LEFT JOIN users on songs.user_id=users.id WHERE category = ? GROUP BY songs.user_id ORDER BY view DESC LIMIT 5');
    $stmt2->execute([ $_GET['category'] ]);
    $artists = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $stmt1 = $pdo->query('SELECT *,stagename FROM songs LEFT JOIN users on songs.user_id=users.id ORDER BY view DESC LIMIT 5');
    $list_songs = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    //Nghe si
    $stmt2 = $pdo->query('SELECT *,stagename,image FROM songs LEFT JOIN users on songs.user_id=users.id GROUP BY songs.user_id ORDER BY view DESC LIMIT 5');
    $artists = $stmt2->fetchAll(PDO::FETCH_ASSOC);
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
            <div class="sidebar">
                <img src="./assets/Logo F5.svg" alt="" class="logo" />
                <nav class="nav">
                    <ul class="nav-top">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link selected">
                                <ion-icon name="home"></ion-icon>Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="loves.php" class="nav-link">
                                <ion-icon name="disc"></ion-icon>Bài hát đã
                                thích
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="album.php" class="nav-link">
                                <ion-icon name="disc"></ion-icon>Album
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-bottom">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <ion-icon name="settings"></ion-icon>Cài đặt
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <header class="header">
                <div class="search-engine">
                    <ion-icon name="search"></ion-icon>
                    <input
                        type="text" name="search1" id="search"
                        class="search-input"
                        placeholder="Tên nghệ sĩ hoặc bài hát" autocomplete="off" required
                    />
                    <ul class="search-hints"></ul>
                </div>
                <!-- Cho t them vao-->
                <div class="listGroup">
                    <ul style ="  list-style-type: none;padding: 0;margin: 0;" id="show-list">
                      <!-- Here autocomplete list will be display -->
                    </ul>
                </div>
                <?php if(isset($_SESSION['currUser'])){?>
                <div class="user">
                    <img
                        src="<?='./assets/avatar/'.$_SESSION['path']?>"
                        alt="Avatar"
                        class="user-avatar"
                    />
                    <span class="user-name"><?=$_SESSION['name'] ?></span>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="view_user.php" class="nav-link">
                                <ion-icon name="person"></ion-icon>Trang cá nhân
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <ion-icon name="log-out-outline"></ion-icon>Đăng
                                xuất
                            </a>
                        </li>
                    </ul>
                </div>
                <?php }else{?>
                <div class="user">
                    <img
                        src="./assets/img/iconTrang.jpg"
                        alt="Avatar"
                        class="user-avatar"
                    />
                    <span class="user-name">Chưa có tài khoản</span>
                    <ion-icon name="chevron-down-outline"></ion-icon>
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">
                                <ion-icon name="log-out-outline"></ion-icon>Đăng
                                nhập
                            </a>
                        </li>
                    </ul>
                </div>
                <?php }?>
            </header>
            <main class="main">
                <!-- Trending Songs -->
                <section class="cards">
                    <div class="cards-top">
                        <h3 class="cards-title">Danh sách bài hát</h3>
                        <a href="" class="cards-more">Xem tất cả</a>
                    </div>
                    <div class="cards-bottom">
                    <?php foreach($list_songs as $list_song): ?>
                        <a href="songpage.php?audio_id=<?=$list_song['audio_id']?>" class="card">
                            <img
                                src="<?=($_SESSION["links_pictures"].$list_song['thumbnail'])?>"
                                
                                alt=""
                                class="card-img"
                            />
                            <div class="card-content">
                                <h4 class="card-title"><?=$list_song['title']?></h4>
                                <span class="card-desc"><?=$list_song['stagename']?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    </div>
                </section>

                <!-- Popular Artists -->
                <section class="cards">
                    <div class="cards-top">
                        <h3 class="cards-title">Nghệ sĩ đóng góp</h3>
                        <a href="" class="cards-more">Xem tất cả</a>
                    </div>
                    <div class="cards-bottom">
                    <?php for ($i = 0; $i < count($artists); $i++): ?>
                        <?php if(check_artist($artists[$i]['user_id'],$list_songs)== 1){?>
                        <a href="" class="card">
                            <img
                                src="<?=($_SESSION["avatar"].$artists[$i]['image'])?>"
                                alt=""
                                class="card-img"
                            />
                            <div class="card-content">
                                <h4 class="card-title"><?=($artists[$i]['stagename'])?></h4>
                                <span class="card-desc"><?=($artists[$i]['occupation'])?></span>
                            </div>
                        </a>
                    <?php }endfor; ?>
                    </div>
                </section>
                <footer style="height: 100px"></footer>
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
        <script src="https://unpkg.com/wavesurfer.js"></script>
        <script src="javascript/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="search.js"></script>        
    </body>
</html>