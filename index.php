<?php
    $a = 1;
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
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
        <link rel="stylesheet" href="./css/base.css">
        <link rel="stylesheet" href="./css/app.css" />
    </head>
    <body onload="getMainContent('home')">
        <div class="grid">
            <my-sidebar></my-sidebar>
            <my-header></my-header>
            <main class="main"></main>
            <my-music-player></my-music-player>
        </div>
        <script src="https://unpkg.com/wavesurfer.js"></script>
        <script src="javascript/main-content.js"></script>
        <script src="javascript/components.js"></script>
        <script src="javascript/app.js"></script>
    </body>
</html>
