const mediaQuery = window.matchMedia("(max-width: 614px)");

function handleMediaChange(e) {
    if (e.matches) {
        const menuOpenButton = document.querySelector(".headMenuBox_svg");
        const menuBox = document.querySelector(".headMenuBox_buttons");

        menuOpenButton.addEventListener("click", function (e) {
            if (getComputedStyle(menuBox).display == "none") {
                menuBox.style.display = "flex";
            } else {
                menuBox.style.display = "none";
            }
        });
    }
}

handleMediaChange(mediaQuery);

mediaQuery.addEventListener("change", handleMediaChange);
