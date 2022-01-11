const song = document.getElementById("song");
const heart = document.querySelector(".heart");
const playBtn = document.querySelector(".play");
const prevBtn = document.querySelector(".play-skip-back");
const nextBtn = document.querySelector(".play-skip-forward");
const current = document.querySelector(".current");
const durationTime = document.querySelector(".duration");
const track = document.getElementById("track");
const volumeIcon = document.querySelector(".volume-icon");
const volumeBar = document.getElementById("volume");
let isPlaying = true;
let indexSong = 0;
const musics = [
    "nang-tho-hoang-dung.mp3",
    "tron-tim-den-vau.mp3",
    "vung-ki-uc-chillies.mp3",
];
function favorite(heart) {
    if (heart.innerHTML.includes('name="heart-outline"')) {
        heart.querySelector("ion-icon").setAttribute("name", "heart");
    } else {
        heart.querySelector("ion-icon").setAttribute("name", "heart-outline");
    }
}
song.volume = 1;
volumeBar.value = 1;
displayTimer();
let timer;
song.setAttribute("src", `./assets/music/${musics[indexSong]}`);
prevBtn.addEventListener("click", function () {
    changeSong(-1);
});
nextBtn.addEventListener("click", function () {
    changeSong(1);
});
song.addEventListener("ended", handleEndedSong);
function handleEndedSong() {
    changeSong(1);
}
function changeSong(direction) {
    if (direction === 1) {
        indexSong++;
        if (indexSong == musics.length) {
            indexSong = 0;
        }
        isPlaying = true;
    } else if (direction === -1) {
        indexSong--;
        if (indexSong < 0) {
            indexSong = musics.length - 1;
        }
        isPlaying = true;
    }
    song.setAttribute("src", `./assets/music/${musics[indexSong]}`);
    playPause();
}
playBtn.addEventListener("click", playPause);
function playPause() {
    if (isPlaying) {
        song.play();
        playBtn.innerHTML = `<ion-icon name="pause"></ion-icon>`;
        isPlaying = false;
        timer = setInterval(displayTimer, 500);
    } else {
        song.pause();
        playBtn.innerHTML = `<ion-icon name="play"></ion-icon>`;
        isPlaying = true;
        clearInterval(timer);
    }
}
function displayTimer() {
    const { duration, currentTime } = song;
    track.max = duration;
    track.value = currentTime;
    current.textContent = formatTimer(currentTime);
    if (!duration) {
        durationTime.textContent = "00:00";
    } else {
        durationTime.textContent = formatTimer(duration);
    }
}
function formatTimer(number) {
    let minutes = Math.floor(number / 60);
    let seconds = Math.floor(number % 60);
    return `${minutes < 10 ? "0" + minutes : minutes}:${
        seconds < 10 ? "0" + seconds : seconds
    }`;
}
track.addEventListener("change", handleChangeBar);
function handleChangeBar() {
    song.currentTime = track.value;
}
volumeBar.addEventListener("change", handleChangeVolume);
function handleChangeVolume() {
    song.volume = volumeBar.value;
    if (volumeBar.value <= 1) {
        volumeIcon.innerHTML = `<ion-icon name="volume-high"></ion-icon>`;
    }
    if (volumeBar.value <= 0.67) {
        volumeIcon.innerHTML = `<ion-icon name="volume-medium"></ion-icon>`;
    }
    if (volumeBar.value <= 0.33) {
        volumeIcon.innerHTML = `<ion-icon name="volume-low"></ion-icon>`;
    }
    if (volumeBar.value == 0) {
        volumeIcon.innerHTML = `<ion-icon name="volume-mute"></ion-icon>`;
    }
}