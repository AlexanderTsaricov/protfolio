import { buttonEvent } from "./info-functions.js";
import { setCloseEventToTabs } from "./info-functions.js";

document.addEventListener("DOMContentLoaded", function () {
    const globalInfoNameBlock = "professionalInfoBlock";

    const frontendButton = document.querySelector("#frontendButton");
    const backendButton = document.querySelector("#backendButton");
    const jsButton = document.querySelector("#javaScript");
    const phpButton = document.querySelector("#php");
    const javaButton = document.querySelector("#java");
    const pythonButton = document.querySelector("#python");
    const cSharpButton = document.querySelector("#cSharp");
    const swiftButton = document.querySelector("#swift");
    const rubyButton = document.querySelector("#ruby");
    const sqlButton = document.querySelector("#sql");
    const visualBasicButton = document.querySelector("#visualBasic");

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
    buttonEvent("javaScript", jsButton, state, globalInfoNameBlock);
    buttonEvent("php", phpButton, state, globalInfoNameBlock);
    buttonEvent("java", javaButton, state, globalInfoNameBlock);
    buttonEvent("swift", swiftButton, state, globalInfoNameBlock);
    buttonEvent("python", pythonButton, state, globalInfoNameBlock);
    buttonEvent("cSharp", cSharpButton, state, globalInfoNameBlock);
    buttonEvent("ruby", rubyButton, state, globalInfoNameBlock);
    buttonEvent("sql", sqlButton, state, globalInfoNameBlock);
    buttonEvent("visualBasic", visualBasicButton, state, globalInfoNameBlock);
});
