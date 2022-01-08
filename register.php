<?php 
include 'db_connect.php';
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
if (isset($_POST['submit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (firstname, lastname, username, password)
					VALUES ('$firstname', '$lastname', '$username', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Đăng ký thành công.')</script>";
				$firstname = "";
				$lastname = "";
				$username = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
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
        <form action="" method="POST" class="form">
            <img src="./assets/Logo F5.svg" alt="F5MP3" class="logo" />
            <p class="desc">Trang chia sẻ và tải nhạc trực tuyến</p>
            <div class="form-group form-group--2">
                <input
                    type="text"
                    class="form-input"
                    placeholder="Họ"
                    name="firstname"
                />
                <input
                    type="text"
                    class="form-input"
                    placeholder="Tên"
                    name="lastname"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    class="form-input"
                    placeholder="Tên đăng nhập"
                    name="username"
                />
            </div>
            <div class="form-group">
                <input
                    type="password"
                    class="form-input"
                    placeholder="Mật khẩu"
                    name="password"
                />
            </div>
            <div class="form-group">
                <input
                    type="password"
                    class="form-input"
                    placeholder="Xác nhận mật khẩu"
                    name="cpassword"
                />
            </div>
            <div class="form-group">
                <input type="radio" name="upgrade" id="upgrade" />
                <label for="upgrade">Tôi muốn trở thành nghệ sĩ</label>
            </div>
            <div class="form-group">
                <input type="file" id="img" name="img" accept="image/*" />
            </div>
            <div class="form-group">
                <button class="primary-btn">Đăng ký</button>
            </div>
            <p class="login-register-text">
                Đã có tài khoản<a href="login.php">Đăng nhập</a>.
            </p>
        </form>
    </body>
</html>
