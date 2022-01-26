<?php
include 'config.php';
$pdo = pdo_connect_mysql();
include 'db_connect.php';
if(isset($_SESSION['currUser'])){
    $id=$_SESSION['currUser'];
    $sql = "SELECT * FROM users WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $paths=$row['image'];
        $level=$row['type'];
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
    $user_id = $_SESSION['currUser'];
    $stmt1 = $pdo->prepare('SELECT *,stagename FROM songs LEFT JOIN likes on songs.audio_id=likes.audio_id 
                                                          LEFT JOIN users on songs.user_id=users.id WHERE likes.user_id = ?');
    $stmt1->execute([ $user_id ]);
    $list_songs = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['update_users'])){

    $stagename=$_POST['stagename'];
    $occupation=$_POST['occupation'];
    
    $query = "UPDATE `users` SET stagename='$stagename', occupation='$occupation' WHERE id='$id'";
    if ($conn->query($query) == TRUE) {
    echo "Record updated successfully";
    header("location:index.php");
    } else {
    echo "Error updating record: " . $conn->error;
    }
    $conn->close();
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

            <section class="cards">
                <div class="cards-top">
                    <h3 class="cards-title">Thông tin cá nhân</h3>
                </div>
                <form method="POST" class="form">
                <a href="update_avatar.php?>" class="card">
                    <img
                        src="<?='./assets/avatar/'.$paths?>"
                        alt="Avatar"
                        class="card-img"
                    />
                </a>
            </section>
                <br/>
               
                    <label>Nghệ danh: <input type="text" value="<?php echo $row['stagename']; ?>" name="stagename"></label><br/>
                <?php if ($level=='3'){?>
                    <label>Hoạt động: <input type="text" value="<?php echo $row['occupation']; ?>" name="occupation"></label><br/>
                <?php }?>
                <input type="submit" value="Chỉnh sửa thông tin" name="update_users">

                </form>
    
                <!-- Playlist -->
                <?php if(count($list_songs)>0){?>
                <section class="cards">
                    <div class="cards-top">
                        <h3 class="cards-title">Bài hát đã thích</h3>
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
                <?php }else{?>
                    <div class="cards-top">
                        <h3 class="cards-title">Thêm bài hát yêu thích của bạn bây giờ nào!</h3>  
                    </div>
                <?php }?>
                <footer style="height: 100px"></footer>

            </main>
            <!-- Music Player -->
            <div class="music-player">
                <div class="song">
                    <img
                        src="https://images.unsplash.com/photo-1494232410401-ad00d5433cfa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fG11c2ljfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                        alt=""
                        class="song__thumb"
                    />
                    <div class="song__desc">
                        <h4 class="song__title">Tên bài hát</h4>
                        <p class="song__artist">Nghệ sĩ</p>
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
                        <div class="current">00:00</div>
                        <input
                            type="range"
                            name="track"
                            id="track"
                            class="range"
                        />
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
