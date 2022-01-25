<?php 
include 'db_connect.php';
error_reporting(0);
session_start();

// if (isset($_SESSION['currUser'])) {
//     header("Location: login.php");
// }
if (isset($_POST['submit'])){
    $stagename = $_POST['stagename'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $type=$_POST['type'];
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size']; 
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts =explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($file_parts));
    $expensions= array("jpeg","jpg","png");
    if(in_array($file_ext,$expensions)=== false){
    $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
    if($file_size > 2097152) {
    $errors[]='Kích thước file không được lớn hơn 2MB';
}
    $image = $_FILES['image']['name'];
    $target = "assets/avatar/".basename($image);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (stagename, username, password, type, image)
                    VALUES ('$stagename', '$username', '$password', '$type', '$image')";
            $result = mysqli_query($conn, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

            }
            if ($result) {
                echo "<script>alert('Đăng ký thành công.')</script>";
                $firstname = "";
                $lastname = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header("Location: login.php");
            
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Tên đặng nhập đã đc dùng.')</script>";
        }
        
    } else {
        echo "<script>alert('Mật khẩu không trùng')</script>";
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
            href="./assets/Logo F5 ver2.svg"
            type="image/x-icon"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
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
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" class="form">
            <img src="./assets/Logo F5.svg" alt="F5MP3" class="logo" />
            <p class="desc">Trang chia sẻ và tải nhạc trực tuyến</p>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Nghệ danh" name="stagename" required/>
            </div>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Tên đăng nhập" name="username" required/>
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Mật khẩu" name="password" required/>
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Xác nhận mật khẩu" name="cpassword" required/>
            </div>
            <div class="form-group">
                <input type="radio" name="type" value="3" required>
                <label for="type">Đăng ký nghệ sĩ</label>
            </div>
            <div class="form-group">
                <input type="radio" name="type" value="2" required>
                <label for="type">Đăng ký người nghe</label>
            </div>
             <div class="form-group" >
             <input type="file" name="image" id = "image" required> 
            </div>
            <div class="form-group">
                <button name="submit" class="primary-btn">Đăng ký</button>
            </div>
           
            <p class="login-register-text"> Đã có tài khoản<a href="login.php">Đăng nhập</a>.</p>
        </form>
    </body>
</html>
