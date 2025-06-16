const nameInput = document.querySelector("#nameInput");
const nameCode = document.querySelector("#name");

nameInput.addEventListener("input", function (event) {
    nameCode.textContent = `"${event.target.value}"`;
});

const emailInput = document.querySelector("#emailInput");
const emailCode = document.querySelector("#email");

emailInput.addEventListener("input", function (event) {
    emailCode.textContent = `"${event.target.value}"`;
});

const messageInput = document.querySelector("#messageInput");

messageInput.addEventListener("input", function (event) {
    const MAX_LEN = 40;
    const text = event.target.value.trim();
    const words = text ? text.split(/\s+/) : [];

    const lines = [];
    let current = "";
    words.forEach((word) => {
        if ((current + word + " ").length <= MAX_LEN) {
            current += word + " ";
        } else {
            lines.push(current.trim());
            current = word + " ";
        }
    });
    if (current) lines.push(current.trim());

    const messageLi = document.getElementById("messageLi");
    const messageSpan = document.getElementById("message");

    // remove old dynamic li
    document
        .querySelectorAll("#messageLi ~ li.dynamic")
        .forEach((li) => li.remove());

    // reset contents of first span
    if (lines.length === 0) {
        messageSpan.textContent = '""';
    } else if (lines.length === 1) {
        messageSpan.textContent = `"${lines[0]}"`;
    } else {
        messageSpan.textContent = `"${lines[0]} `;
        // remove the static comma after span
        let node = messageSpan.nextSibling;
        if (node && node.nodeType === 3 && node.textContent.trim() === ",") {
            node.remove();
        }
    }

    // build the rest of the li
    let prevLi = messageLi;
    for (let i = 1; i < lines.length; i++) {
        const li = document.createElement("li");
        li.className = "code_line dynamic";

        // indent
        const indent = document.createElement("span");
        indent.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;";
        li.appendChild(indent);

        // content
        const span = document.createElement("span");
        span.className = "code_orange";
        span.textContent = lines[i] + (i === lines.length - 1 ? '"' : "");
        li.appendChild(span);

        // comma only at the end of the last one
        if (i === lines.length - 1) {
            li.appendChild(document.createTextNode(","));
        }

        prevLi.after(li);
        prevLi = li;
    }
});
