const footerMediaQuery = window.matchMedia("(max-width: 525px)");

function handleMediaChange(e) {
    if (e.matches) {
        const footerLinkGit = document.querySelector("#gitHubLinkText");
        footerLinkGit.textContent = "";
        footerLinkGit.classList.add("footerBox__borderRight");

        const footerBox_link = document.querySelectorAll(".footerBox_link");
        const footerBox_text = document.querySelector(".footerBox_text");
        footerBox_link.forEach((element) => {
            element.classList.remove("footerBox__borderLeft");
            element.classList.add("footerBox__borderRight");
        });

        footerBox_text.classList.add("footerBox__borderRight");
    }
}

handleMediaChange(footerMediaQuery);

footerMediaQuery.addEventListener("change", handleMediaChange);
