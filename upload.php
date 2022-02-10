<?php
include 'db_connect.php';
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{   $user_id= $_SESSION['currUser'];
	$title = $_POST['title'];
    $category = $_POST['category'];
    $errors= array();
    $file_name = $_FILES['thumbnail']['name'];
    $file_size = $_FILES['thumbnail']['size']; 
    $file_tmp = $_FILES['thumbnail']['tmp_name'];
    $file_type = $_FILES['thumbnail']['type'];
    $file_parts =explode('.',$_FILES['thumbnail']['name']);

    $thumbnail = $_FILES['thumbnail']['name'];
    $target = "assets/img/songs".basename($thumbnail);
	$audio_location = $_FILES['audio_location']['name'];
	$audio_path="assets/music/songs".basename($audio_location);

    $sql = "INSERT INTO songs (user_id, title, category, thumbnail, audio_location)
                    VALUES ('$user_id','$title', '$category', '$thumbnail', '$audio_location')";
    $result = mysqli_query($conn, $sql);
	move_uploaded_file($_FILES['audio_location']['tmp_name'],$audio_path);
	move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);
   
    echo "<script>alert('Tải lên thành công.')</script>";
    //chuyen de trang ca nhan                     
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
                <?php if(isset($_SESSION['currUser'])){ ?>
                <form action="" method="POST" enctype="multipart/form-data" class="form">       
                    <h3 class="upload-title">
                        <?=$_SESSION['name']?>
                    </h3>   
                    <div class="form-group">
                        <input type="text" name="title" required class="form-input" placeholder="Tên bài hát"/>
                    </div> 
                    <div class="form-group">
                        <select id="cars" name="category" class="form-input category-option">
                            <option value="" disabled selected>Thể loại</option>
                            <option value="vpop">V-pop</option>
                            <option value="kpop">K-pop</option>
                            <option value="hiphop">Hiphop</option>
                            <option value="poprap">Pop rap</option>
                            <option value="dance">Dance</option>
                        </select>
                    </div>
                    <div class="form-group form-group__file" >
                        <label for="image" class="avatar-file">
                            <ion-icon name="image-outline"></ion-icon>
                            Ảnh bài hát
                        </label>
                        <input type="file" name="thumbnail" id ="image" required accept="image/*"/>
                        <img class="avatar"/>
                    </div>           
                    <div class="form-group form-group__file" >
                        <label for="track-input" class="track-file">
                            <ion-icon name="musical-notes"></ion-icon>
                            Tệp bài hát
                        </label>
                        <input type="file" name="track" id ="track-input" required accept="audio/*" onchange="getFileName(this)"/>
                        <span class="track-file-name"></span>
                    </div>           
                    <div class="form-group">
                        <button name="submit" class="primary-btn">Tải nhạc lên</button>
                    </div>    
                </form>
                <?php }else{?>
                    <a href ="login.php" class="cards-title">Đăng nhập</a>
                <?php }?>
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
        <script src="javascript/register.js"></script>
        <script>
            $(document).ready(function(){
                $('input#track-input').change(function(e){
                    let fileName = e.target.files[0].name;
                    let trackFileName = document.querySelector(".track-file-name");
                    trackFileName.innerHTML = `Bạn đã chọn tệp "${fileName}" để tải lên`;
                });
            });
        </script>
    </body>
</html>