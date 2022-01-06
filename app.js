const song = document.getElementById("song");
const playBtn = document.querySelector(".play");
const prevBtn = document.querySelector(".play-skip-back");
const nextBtn = document.querySelector(".play-skip-forward");
const current = document.querySelector(".current");
const duration = document.querySelector(".duration");
let isPlaying = true;
let indexSong = 0;
const musics = [
    "nang-tho-hoang-dung.mp3",
    "tron-tim-den-vau.mp3",
    "vung-ki-uc-chillies.mp3",
];
song.setAttribute("src", `./assets/music/${musics[indexSong]}`);
prevBtn.addEventListener("click", function () {
    changeSong(-1);
});
nextBtn.addEventListener("click", function () {
    changeSong(1);
});
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
    } else {
        song.pause();
        playBtn.innerHTML = `<ion-icon name="play"></ion-icon>`;
        isPlaying = true;
    }
}
// function displayTimer() {
//     const 
// };
// displayTimer();