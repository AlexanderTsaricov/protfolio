import { setCloseEventToTabs } from "./info-functions.js";
import { addButtonEventsToAll } from "./info-functions.js";

document.addEventListener("DOMContentLoaded", function () {
    const globalInfoNameBlock = "professionalInfoBlock";

    const state = {
        activeContentName: "",
        contentTabs: document.querySelector("#contentTabs"),
        contentTabsNames: [],
        contentObject: { null: "" },
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

    const buttonsObj = {};
    for (const [key, button] of Object.entries(buttons)) {
        buttonsObj[key] = { button: button, event: false };
    }

    setCloseEventToTabs(state, globalInfoNameBlock, buttonsObj);
    addButtonEventsToAll(state, globalInfoNameBlock, buttonsObj);
});
