document.addEventListener("DOMContentLoaded", function () {
    const educationButton = document.querySelector("#educationButton");
    const contentTabs = document.querySelector("#contentTabs");
    const contentTabsNames = [];
    const contentObject = {};
    const contentBox = document.querySelector("#contentBox");

    educationButton.addEventListener("click", function () {
        if (!contentTabsNames.includes("education")) {
            fetchContent(contentObject, "education", function () {
                updateContentBox(contentObject, contentBox, 'education');
            });
            educationButton.className = "personalInfoBlock_summary__active";
            contentTabsNames.push("education");
            updateTabs(contentTabsNames, contentTabs);

            const tabCloseButton = document.querySelector("#tabClose_education");
            tabCloseButton.addEventListener('click', function () {
                const index = contentTabsNames.indexOf('education');
                if (index !== -1) {
                    contentTabsNames.splice(index, 1);
                }
                updateTabs(contentTabsNames, contentTabs);
            });

        }
    });
});

function fetchContent(contentObject, contentName, callbackUpdate) {
    fetch(`/getContent/${contentName}`)
        .then((res) => res.text())
        .then((html) => {
            contentObject[contentName] = html;
        })
        .then(function () {
            callbackUpdate();
        });
}

function updateTabs(tabsArrays, contentTabs) {
    let htmlText = "";
    tabsArrays.forEach((tab) => {
        htmlText += `
            <div class="tabBox">
                <p class="tabBox_text">${tab}<p>
                <svg class="tabBox_close" id="tabClose_${tab}" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99999 4.05732L8.29999 0.757324L9.24266 1.69999L5.94266 4.99999L9.24266 8.29999L8.29999 9.24266L4.99999 5.94266L1.69999 9.24266L0.757324 8.29999L4.05732 4.99999L0.757324 1.69999L1.69999 0.757324L4.99999 4.05732Z" fill="#90A1B9" />
                </svg>
            </div>
        `;
    });
    contentTabs.innerHTML = htmlText;
}

function updateContentBox(contentObject, contentBox, activeContent) {
    if (contentObject.hasOwnProperty(activeContent)) {
        contentBox.innerHTML = contentObject[activeContent];
    }
}
