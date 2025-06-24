import { buttonEvent } from "./info-functions.js";
import { setCloseEventToTabs } from "./info-functions.js";

document.addEventListener("DOMContentLoaded", function () {
    const globalInfoNameBlock = "personalInfoBlock";

    const state = {
        activeContentName: "",
        contentTabs: document.querySelector("#contentTabs"),
        contentTabsNames: [],
        contentObject: {
            null: "",
        },
        contentBox: document.querySelector("#contentBox"),
    };

    const buttons = {
        education: document.querySelector("#educationButton"),
        school: document.querySelector("#schoolButton"),
        college: document.querySelector("#collegeButton"),
        university: document.querySelector("#universityButton"),
        courses: document.querySelector("#coursesButton"),
        interests: document.querySelector("#interestsButton"),
        games: document.querySelector("#gamesButton"),
    };

    setCloseEventToTabs(state, globalInfoNameBlock);

    for (const key in buttons) {
        if (buttons.hasOwnProperty(key)) {
            buttonEvent(key, buttons[key], state, globalInfoNameBlock);
        }
    }
});
