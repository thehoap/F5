var navLink = document.querySelectorAll(".nav-link");
for (var i = 0; i < navLink.length; i++) {
    navLink[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("selected");
        if (current.length > 0) {
            current[0].className = current[0].className.replace(
                " selected",
                ""
            );
        }
        this.className += " selected";
    });
}
