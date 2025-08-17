document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".personalInfoBlock_elementBox");

    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            const content = document.querySelector(`#content_${button.id}`);
            const tab = document.querySelector(`#tab_${button.id}`);
            // close all active contents and unactive all tabs
            buttons.forEach((button) => {
                const content = document.querySelector(`#content_${button.id}`);
                const tab = document.querySelector(`#tab_${button.id}`);
                content.classList.add("unactive");
                tab.className = tab.className.replace("__active", "");
            });

            // active cliked tab and active content
            tab.className = `${tab.className}__active`;
            tab.parentElement.classList.remove("unactive");
            content.classList.remove("unactive");

            const closeButton =
                tab.parentElement.querySelector(".tabBox_close");
            // add event to close in tab
            closeButton.addEventListener("click", function () {
                tab.parentElement.classList.add("unactive");
                content.classList.add("unactive");
                tab.className = tab.className.replace("__active", "");
            });

            const unactiveTabs = document.querySelectorAll(".tabBox_text");

            // add event to active tab by click on unactive tabs
            unactiveTabs.forEach((tab) => {
                tab.addEventListener("click", function () {
                    // close all active contents and unactive all tabs
                    buttons.forEach((button) => {
                        const content = document.querySelector(
                            `#content_${button.id}`
                        );
                        const tab = document.querySelector(`#tab_${button.id}`);
                        content.classList.add("unactive");
                        tab.className = tab.className.replace("__active", "");
                    });
                    const content = document.querySelector(`#content_${tab.id.split('_')[1]}`);
                    tab.className = `${tab.className}__active`;
                    tab.parentElement.classList.remove("unactive");
                    content.classList.remove("unactive");
                });
            });
        });
    });
});
