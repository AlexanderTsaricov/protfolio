document.addEventListener("DOMContentLoaded", async function () {
    const contentBox = document.querySelector(".contentBox");
    const languageBox = document.querySelector(".projectsSelectBox");

    const [projects, languages] = await Promise.all([
        getData("projects"),
        getData("languages"),
    ]);

    projects.forEach((project) => {
        project.html = "";
        project.html = getHTMLprojectBox(project);
    });

    languages.forEach((language) => {
        languageBox.innerHTML += getHTMLanguageBox(language);
    });

    contentBox.innerHTML = projects[0].html;
});

async function getData(resourse) {
    const response = await fetch(`/getProjectsData/${resourse}`);
    const data = await response.json();
    return data;
}

function getHTMLprojectBox(project) {
    return `
        <div class="projectBox">
            <p class="projectBox_name">${project.name}</p>
            <img class="projectBox_image" src="http://localhost:8000/storage/${project.image}" alt="Project image">
            <div class="projectBox_descriptionBox">
                <p class="projectBox_description">${project.description}</p>
                <a class="projectBox_link" href="${project.link}" target="_blank"
                    rel="noopener noreferrer">view-project</a>
            </div>
        </div>
    `;
}

function getHTMLanguageBox(language) {
    return `
        <label class="projectsSelectBox_label">
            <input type="checkbox" />
            <span class="projectsSelectBox_span">${language.name}</span>
        </label>
    `;
}
