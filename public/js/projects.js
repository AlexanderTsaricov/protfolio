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

    languageBox.addEventListener("click", function (event) {
        if (
            event.target.classList.contains("projectsSelectBox_label") ||
            event.target.type === "checkbox"
        ) {
            const languageButtons =
                document.querySelectorAll(".checkboxLanguage");
            const selected = getSelectedProjects(projects, languageButtons);
            addContent(contentBox, selected);
        }
    });

    const selectedProjects = getSelectedProjects(projects, languages);
    addContent(contentBox, selectedProjects);
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
            <img class="projectBox_image" src="http://alexvinportfolio.ru/storage/${project.image}" alt="Project image">
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
            <input 
              class="checkboxLanguage" 
              type="checkbox" 
              name="language[]" 
              value="${language.id}" 
            />
            <span class="projectsSelectBox_span">${language.name}</span>
        </label>
    `;
}

function getSelectedProjects(projects, languagesBtn) {
    const ids = Array.from(languagesBtn)
        .filter((languageBtn) => languageBtn.checked)
        .map((languageBtn) => languageBtn.value);
    if (ids.length == 0) {
        return projects;
    } else {
        const selectedProjects = projects.filter((project) => {
            return ids.every((id) => project.languages.includes(id));
        });
        return selectedProjects;
    }
}

function addContent(box, projects) {
    box.innerHTML = "";
    projects.forEach((project) => {
        box.innerHTML += project.html;
    });
}
