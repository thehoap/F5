const song = document.getElementById("song");
let songThumb = document.querySelector(".song__thumb");
let songTitle = document.querySelector(".song__title");
let songArtist = document.querySelector(".song__artist");
const heart = document.querySelector(".heart");
const playBtn = document.querySelector(".play");
const prevBtn = document.querySelector(".play-skip-back");
const nextBtn = document.querySelector(".play-skip-forward");
const current = document.querySelectorAll(".current");
const durationTime = document.querySelectorAll(".duration");
const track = document.getElementById("track");
const volumeIcon = document.querySelector(".volume-icon");
const volumeBar = document.getElementById("volume");
const musicPlayer = document.querySelector(".music-player");
const playSongBtn = document.querySelectorAll(".play-song-btn");
const cardSongAudio = document.querySelectorAll(".card-song__audio");
const cardSongThumb = document.querySelectorAll(".card-song__card-img");
const cardSongTitle = document.querySelectorAll(".card-song__card-title");
const cardSongArtist = document.querySelectorAll(".card-song__card-desc");

let isPlaying = true;
let indexSong;
function favorite(heart) {
    if (heart.innerHTML.includes('name="heart-outline"')) {
        heart.querySelector("ion-icon").setAttribute("name", "heart");
    } else {
        heart.querySelector("ion-icon").setAttribute("name", "heart-outline");
    }
}
displayTimer();
let timer;
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
    playSongBtn[
        indexSong
    ].innerHTML = `<ion-icon class="play-icon" name="play" onclick="return false;"></ion-icon> `;
    if (direction === 1) {
        indexSong++;
        if (indexSong == cardSongAudio.length) {
            indexSong = 0;
        }
        isPlaying = true;
    } else if (direction === -1) {
        indexSong--;
        if (indexSong < 0) {
            indexSong = cardSongAudio.length - 1;
        }
        isPlaying = true;
    }
    song.setAttribute("src", cardSongAudio[indexSong].getAttribute("src"));
    songThumb.setAttribute("src", cardSongThumb[indexSong].getAttribute("src"));
    songTitle.innerHTML = cardSongTitle[indexSong].innerHTML;
    songArtist.innerHTML = cardSongArtist[indexSong].innerHTML;
    playPauseTrack();
}
// Waveform
let waveform = WaveSurfer.create({
    container: ".waveform",
    waveColor: "#e7ecef",
    progressColor: "#274c77",
    barWidth: 3,
    cursorColor: "transparent",
});
waveform.on("seek", function () {
    track.value = waveform.getCurrentTime();
    song.currentTime = waveform.getCurrentTime();
});
waveform.setVolume(0);
waveform.load(song.getAttribute("src"));
for (let i = 0; i < playSongBtn.length; i++) {
    playSongBtn[i].addEventListener("click", function () {
        for (let i = 0; i < playSongBtn.length; i++) {
            playSongBtn[
                i
            ].innerHTML = `<ion-icon class="play-icon" name="play" onclick="return false;"></ion-icon> `;
        }
        waveform.playPause();
        if (i != indexSong) {
            indexSong = i;
            song.setAttribute(
                "src",
                cardSongAudio[indexSong].getAttribute("src")
            );
            songThumb.setAttribute(
                "src",
                cardSongThumb[indexSong].getAttribute("src")
            );
            songTitle.innerHTML = cardSongTitle[indexSong].innerHTML;
            songArtist.innerHTML = cardSongArtist[indexSong].innerHTML;
        } else {
            playPauseTrack();
        }
    });
    playSongBtn[i].addEventListener("click", playPauseTrack);
}
playBtn.addEventListener("click", playPauseTrack);
function playPauseTrack() {
    if (isPlaying) {
        song.play();
        waveform.playPause();
        playBtn.innerHTML = `<ion-icon name="pause"></ion-icon>`;
        playSongBtn[indexSong].innerHTML = playBtn.innerHTML;
        isPlaying = false;
        timer = setInterval(displayTimer, 500);
    } else {
        song.pause();
        waveform.pause();
        playBtn.innerHTML = `<ion-icon name="play"></ion-icon>`;
        playSongBtn[indexSong].innerHTML = playBtn.innerHTML;
        isPlaying = true;
        clearInterval(timer);
    }
}
function displayTimer() {
    const { duration, currentTime } = song;
    track.max = duration;
    track.value = currentTime;
    for (let i = 0; i < current.length; i++) {
        current[i].textContent = formatTimer(currentTime);
    }
    if (!duration) {
        for (let i = 0; i < durationTime.length; i++) {
            durationTime[i].textContent = "00:00";
        }
    } else {
        for (let i = 0; i < durationTime.length; i++) {
            durationTime[i].textContent = formatTimer(duration);
        }
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
    waveform.setCurrentTime(track.value);
}
song.volume = 1;
volumeBar.value = 1;
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
const showRangeProgress = (rangeInput) => {
    let x = (rangeInput.value / rangeInput.max) * 100;
    rangeInput.style.background = `linear-gradient(90deg, var(--secondary-color) ${x}%, var(--half-secondary-color) ${x}%)`;
};
// track.addEventListener("input", (e) => {
//     showRangeProgress(e.target);
// });
volumeBar.addEventListener("input", (e) => {
    showRangeProgress(e.target);
});
