// SIDEBAR
class MySidebar extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `<div class="sidebar">
            <img src="./assets/Logo F5.svg" alt="" class="logo" />
            <nav class="nav">
                <ul class="nav-top">
                    <li class="nav-item">
                        <a href="#" onclick="getMainContent('home')" class="nav-link selected">
                            <ion-icon name="home"></ion-icon>Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" onclick="getMainContent('favoritesongs')" class="nav-link">
                            <ion-icon name="disc"></ion-icon>Bài hát đã thích
                        </a>
                    </li>
                </ul>
                <ul class="nav-bottom">
                    <li class="nav-item">
                        <a href="#" onclick="getMainContent('settings')" class="nav-link">
                            <ion-icon name="settings"></ion-icon>Cài đặt
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        `;
    }
}
customElements.define("my-sidebar", MySidebar);

// HEADER
class MyHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `<header class="header">
            <div class="search-engine">
                <ion-icon name="search"></ion-icon>
                <input
                    type="text"
                    class="search-input"
                    placeholder="Tên nghệ sĩ hoặc bài hát"
                />
                <ul class="search-hints"></ul>
            </div>
            <div class="user">
                <img
                    src="./assets/img/ian-dooley-d1UPkiFd04A-unsplash.jpg"
                    alt="Avatar"
                    class="user-avatar"
                />
                <span class="user-name">Nguyễn Hoàng Minh</span>
                <ion-icon name="chevron-down-outline"></ion-icon>
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <ion-icon name="person"></ion-icon>Trang cá nhân
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <ion-icon name="log-out-outline"></ion-icon>Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        `;
    }
}
customElements.define("my-header", MyHeader);
// MAIN
// HOME
class HomeMain extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `<!-- Trending Songs -->
            <div><?php echo 'hello'; ?></div>  
                <section class="cards">
                    <div class="cards-top">
                        <h3 class="cards-title">Bài hát thịnh hành</h3>
                        <a href="" class="cards-more">Xem tất cả</a>
                    </div>
                    <div class="cards-bottom">
                        <a href="songpage.php" class="card">
                            <img src="./assets/img/tron tim.jpg" alt="" class="card-img" />
                            <div class="card-content">
                                <h4 class="card-title">Trốn tìm</h4>
                                <span class="card-desc">Đen Vâu</span>
                            </div>
                        </a>
                        <a href="" class="card">
                            <img
                                src="./assets/img/vu_BQN_poster.jpg"
                                alt=""
                                class="card-img"
                            />
                            <div class="card-content">
                                <h4 class="card-title">Bước qua nhau</h4>
                                <span class="card-desc">Vũ.</span>
                            </div>
                        </a>
                    </div>
                </section>

                <!-- Popular Artists -->
                <section class="cards">
                    <div class="cards-top">
                        <h3 class="cards-title">Nghệ sĩ phổ biến</h3>
                        <a href="" class="cards-more">Xem tất cả</a>
                    </div>
                    <div class="cards-bottom">
                        <a href="" class="card">
                            <img src="./assets/img/den-vau.jpg" alt="" class="card-img" />
                            <div class="card-content">
                                <h4 class="card-title">Đen Vâu</h4>
                                <span class="card-desc">Rapper</span>
                            </div>
                        </a>
                    </div>
                </section>
                <footer style="height: 100px"></footer>`;
    }
}
customElements.define("home-main", HomeMain);

// MUSIC PLAYER
class MyMusicPlayer extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `<div class="music-player">
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
            </div>`;
    }
}
customElements.define("my-music-player", MyMusicPlayer);
