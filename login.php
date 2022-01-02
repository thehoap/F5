<!DOCTYPE html>
<html lang="en">
    <? php
    require("funtion.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        get_user($username, $password);
    }
    ?>
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
        <form action="" method="post" class="form">
            <img src="./assets/Logo F5.svg" alt="F5MP3" class="logo" />
            <p class="desc">Trang chia sẻ và tải nhạc trực tuyến</p>
            <div class="form-group">
                <input
                    type="text"
                    class="form-input"
                    placeholder="Tên đăng nhập"
                    name = "username"
                />
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Mật khẩu" 
                name="password" 
                />
            </div>
            <div class="form-group">
                <button type = "submit" class="primary-btn">Đăng nhập</button>
            </div>
            <a href="" class="desc">Quên mật khẩu?</a>
            <hr />
            <div class="form-group">
                <button class="primary-btn">Đăng ký</button>
            </div>
        </form>
    </body>
    
</html>

