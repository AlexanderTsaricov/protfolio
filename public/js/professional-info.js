import { buttonEvent } from "./info-functions.js";
import { setCloseEventToTabs } from "./info-functions.js";

document.addEventListener("DOMContentLoaded", function () {
    const globalInfoNameBlock = "professionalInfoBlock";

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
        frontend: document.querySelector("#frontendButton"),
        backend: document.querySelector("#backendButton"),
        javaScript: document.querySelector("#javaScript"),
        php: document.querySelector("#php"),
        java: document.querySelector("#java"),
        swift: document.querySelector("#swift"),
        python: document.querySelector("#python"),
        cSharp: document.querySelector("#cSharp"),
        ruby: document.querySelector("#ruby"),
        sql: document.querySelector("#sql"),
        visualBasic: document.querySelector("#visualBasic"),
    };

    setCloseEventToTabs(state, globalInfoNameBlock);
    for (const key in buttons) {
        if (buttons.hasOwnProperty(key)) {
            buttonEvent(key, buttons[key], state, globalInfoNameBlock);
        }
    }
});
