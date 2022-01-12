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
        <div class="grid">
            <?php include ("templates/sidebar.html");?>
            <?php include ("templates/header.html");?>
            <?php //include ("templates/main.html");?>
            <main class="main">
                <section class="cover">
                    <div class="cover-content">
                        <h3 class="cover-title">Trốn tìm</h3>
                        <span class="cover-desc">Đen Vâu</span>
                        <img
                            src="./assets/img/waveform-1640452797435 1.png"
                            alt=""
                        />
                    </div>
                    <img
                        src="./assets/img/tron tim.jpg"
                        alt=""
                        class="cover-thumb"
                    />
                </section>
                <section class="interaction">
                    <a href="./index copy.html" class="card">
                        <img
                            src="./assets/img/den-vau.jpg"
                            alt=""
                            class="card-img"
                        />
                        <div class="card-content">
                            <h4 class="card-title">Đen Vâu</h4>
                            <span class="card-desc">Rapper</span>
                        </div>
                    </a>
                    <section class="comment-box">
                        <form class="comment-top">
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
                            <button class="primary-btn comment-btn">Bình luận</button>
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
                                        những con beat ồn ào, dữ dội. Chỉ cần nhẹ nhàng
                                        thôi mà sâu thấm lòng người
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
                                        Bài hát nay mang một “cái tôi trong âm nhạc” của
                                        Đen rất rõ. Vì vậy hơi khó cảm được với đại đa
                                        số công chúng. Những ai đã trải qua thì mới thấy
                                        được cái hay “rất riêng” và “độc quyền” trong
                                        Trốn Tìm :3
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
                                        1 tháng trước Cám ơn Đen Vâu . Nhạc và lời bài
                                        hát thật sự rất rất hay ... nghe hoài nghe mãi
                                        mà vẫn thích nghe . Chúc mừng ĐEN VÂU nhé
                                        👍👍👏👏👏
                                    </p>
                                </div>
                            </li>
                        </ul>
                </section>
                </section>
            </main>
            <?php include ("templates/musicplayer.html");?>
        </div>
        <script src="app.js"></script>
    </body>
</html>