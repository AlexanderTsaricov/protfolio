import { addButtonEventsToAll, addDelegateEvent } from "./info-functions.js";
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

    const buttonsObj = {};
    for (const [key, button] of Object.entries(buttons)) {
        buttonsObj[key] = { button: button, event: false };
    }

    setCloseEventToTabs(state, globalInfoNameBlock, buttonsObj);
    addDelegateEvent()
});
