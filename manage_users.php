<?php
include 'showsongs.php';
include 'db_connect.php';

if(isset($_SESSION['currAdmin'])){
    //dong so 5 ko can thiet
    $id=$_SESSION['currAdmin'];

    $sql = "SELECT * FROM users WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $name=$row['stagename'];
        $path=$row['image'];
        $_SESSION['name'] = $name;
        $_SESSION['path'] = $path;
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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
            <div class="sidebar">
                <img src="./assets/Logo F5.svg" alt="" class="logo" />
                <nav class="nav">
                    <ul class="nav-top">
                        <li class="nav-item">
                            <a href="manage_songs.php" class="nav-link">
                                <ion-icon name="disc"></ion-icon>Quản lý bài hát
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manage_users.php" class="nav-link">
                                <ion-icon name="person"></ion-icon>Quản lý người dùng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manage_artists.php" class="nav-link">
                                <ion-icon name="star"></ion-icon>Quản lý nghệ sĩ
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <header class="header">
                <form action="search.php" method="post" class="search-engine">
                    <ion-icon name="search"></ion-icon>
                    <input
                        type="text" name="search1" id="search"
                        class="search-input"
                        placeholder="Tên nghệ sĩ hoặc bài hát" autocomplete="off" required
                    />
                    <ul class="search-hints"></ul>
                    <div class="listGroup">
                        <ul style ="  list-style-type: none;padding: 0;margin: 0;" id="show-list">
                        </ul>
                    </div>
                </form>
                <?php if(isset($_SESSION['currAdmin'])){?>
                <div class="user">
                    <img
                        src="<?='./assets/avatar/'.$_SESSION['path']?>"
                        alt="Avatar"
                        class="user-avatar"
                    />
                    <span class="user-name"><?=$_SESSION['name']?></span>
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
                <style>
                    #songs {
                        font-family: Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    #songs td, #songs th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }

                    #songs tr:nth-child(even){background-color: #f2f2f2;}

                    #songs tr:hover {background-color: #ddd;}

                    #songs th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: #04AA6D;
                        color: white;
                    }
                </style>
                <h1>LIST USER</h1>
                <table id = "songs">
                    <tr>
                        <td>Mã Người Dùng</td>
                        <td>Họ Tên</td>
                        <td>Ngày Tạo Tài Khoản</td>
                        <td>Hành Động</td>
                    </tr>

                <?php
                    include 'db_connect.php';
                    $sql_song = "SELECT * FROM users where type = 2";
                    $result_song = mysqli_query($conn, $sql_song);


                    while($row=mysqli_fetch_array($result_song)){
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['stagename']; ?></td>
                        <td><?php echo $row['date_created']; ?></td>
    
                        <td>
                            <a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                       
                    </tr>
                <?php
                    }
                ?>
                </table>

                <footer style="height: 100px"></footer>
            </main>
        <script src="https://unpkg.com/wavesurfer.js"></script>
        <script src="javascript/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="search.js"></script>        
    </body>
</html>