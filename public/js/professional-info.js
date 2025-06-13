import { buttonEvent } from "./info-functions.js";
import { setCloseEventToTabs } from "./info-functions.js";

document.addEventListener("DOMContentLoaded", function () {
    const globalInfoNameBlock = "professionalInfoBlock";

    const frontendButton = document.querySelector("#frontendButton");
    const backendButton = document.querySelector("#backendButton");

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

    buttonEvent("frontend", frontendButton, state, globalInfoNameBlock);
    buttonEvent("backend", backendButton, state, globalInfoNameBlock);
});
