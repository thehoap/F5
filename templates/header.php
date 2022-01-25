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
            <ul style ="list-style-type: none;padding: 0;margin: 0;" id="show-list">
            </ul>
        </div>
    </form>
    <?php if(isset($_SESSION['currUser'])){?>
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