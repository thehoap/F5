var pages = {
    home: '<home-main></home-main>',
    favoritesongs: `<h1>Hoang Dung</h1> <br/><br/><img src='./assets/img/hoang-dung.jpg' style='width:500px;' />`,
    settings: `<h1Cassette</h1><br/><br/><img src='./assets/img/the-cassette.jpg' style='width:500px;' />`,
};

function getMainContent(page) {
    var contentToReturn;
    switch (page) {
        case "home":
            contentToReturn = pages.home;
            break;
        case "favoritesongs":
            contentToReturn = pages.favoritesongs;
            break;
        case "settings":
            contentToReturn = pages.settings;
            break;
        default:
            contentToReturn = pages.home;
            break;
    }
    document.querySelector("main").innerHTML = contentToReturn;
}
