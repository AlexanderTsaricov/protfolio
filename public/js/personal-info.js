document.addEventListener("DOMContentLoaded", function () {
    const educationButton = document.querySelector("#educationButton");
    const schoolButton = document.querySelector("#schoolButton");
    const state = {
        activeContentName: "",
        contentTabs: document.querySelector("#contentTabs"),
        contentTabsNames: [],
        contentObject: {
            null: "",
        },
        contentBox: document.querySelector("#contentBox"),
    };

    buttonEvent("education", educationButton, state);
    buttonEvent("school", schoolButton, state);
});

function buttonEvent(contentName, button, state) {
    button.addEventListener("click", function () {
        if (!state.contentTabsNames.includes(contentName)) {
            fetchContent(state, contentName, function () {
                updateContentBox(contentName, state);
            });
            button.className = "personalInfoBlock_summary__active";
            state.contentTabsNames.push(contentName);
            updateTabs(state);
            state.contentTabsNames.forEach((tabName) => {
                const tab = document.querySelector(`#tab_${tabName}`);
                tab.addEventListener("click", function () {
                    setActiveTabs(tabName, state);
                });
            });
            setActiveTabs(contentName, state);
            const tabCloseButton = document.querySelector(
                `#tabClose_${contentName}`
            );
            tabCloseButton.addEventListener("click", function () {
                const index = state.contentTabsNames.indexOf(contentName);
                if (index !== -1) {
                    state.contentTabsNames.splice(index, 1);
                }
                updateTabs(state);
                if (state.activeContentName == contentName) {
                    updateContentBox("null", state);
                }
            });
        }
    });
}

function setActiveTabs(newActiveContentName, state) {
    console.log(state);
    if (
        state.activeContentName != newActiveContentName &&
        state.contentTabsNames.includes(newActiveContentName)
    ) {
        if (state.activeContentName != "") {
            const oldActiveContentName = document.querySelector(
                `#tab_${state.activeContentName}`
            );
            oldActiveContentName.className = "tabBox_text";
        }
        const newActiveTab = document.querySelector(
            `#tab_${newActiveContentName}`
        );
        newActiveTab.className = "tabBox_text__active";
        state.activeContentName = newActiveContentName;
    }
}

function fetchContent(state, contentName, callbackUpdate) {
    if (!state.contentObject.hasOwnProperty(contentName)) {
        fetch(`/getContent/${contentName}`)
            .then((res) => res.text())
            .then((html) => {
                state.contentObject[contentName] = html;
            })
            .then(function () {
                callbackUpdate();
            });
    } else {
        callbackUpdate();
    }
}

function updateTabs(state) {
    let htmlText = "";
    state.contentTabsNames.forEach((tab) => {
        htmlText += `
            <div class="tabBox">
                <p class="tabBox_text" id="tab_${tab}">${tab}<p>
                <svg class="tabBox_close" id="tabClose_${tab}" width="10" height="10" 
                viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99999 4.05732L8.29999 0.757324L9.24266 1.69999L5.94266
                     4.99999L9.24266 8.29999L8.29999 9.24266L4.99999 5.94266L1.69999 
                     9.24266L0.757324 8.29999L4.05732 4.99999L0.757324 1.69999L1.69999 
                     0.757324L4.99999 4.05732Z" fill="#90A1B9" />
                </svg>
            </div>
        `;
    });
    state.contentTabs.innerHTML = htmlText;
}

function updateContentBox(activeContent, state) {
    if (state.contentObject.hasOwnProperty(activeContent)) {
        state.contentBox.innerHTML = state.contentObject[activeContent];
    }
}
