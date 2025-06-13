import { buttonEvent } from "./info-functions.js";
import { setCloseEventToTabs } from "./info-functions.js";

document.addEventListener("DOMContentLoaded", function () {
    const globalInfoNameBlock = "personalInfoBlock";

    const educationButton = document.querySelector("#educationButton");
    const schoolButton = document.querySelector("#schoolButton");
    const collegeButton = document.querySelector("#collegeButton");
    const universityButton = document.querySelector("#universityButton");
    const coursesButton = document.querySelector("#coursesButton");

    const interestsButton = document.querySelector("#interestsButton");
    const gamesButton = document.querySelector("#gamesButton");

    const state = {
        activeContentName: "",
        contentTabs: document.querySelector("#contentTabs"),
        contentTabsNames: [],
        contentObject: {
            null: "",
        },
        contentBox: document.querySelector("#contentBox"),
    };

    setCloseEventToTabs(state, globalInfoNameBlock);

    buttonEvent("education", educationButton, state, globalInfoNameBlock);
    buttonEvent("school", schoolButton, state, globalInfoNameBlock);
    buttonEvent("college", collegeButton, state, globalInfoNameBlock);
    buttonEvent("university", universityButton, state, globalInfoNameBlock);
    buttonEvent("courses", coursesButton, state, globalInfoNameBlock);

    buttonEvent("interests", interestsButton, state, globalInfoNameBlock);
    buttonEvent("games", gamesButton, state, globalInfoNameBlock);
});
