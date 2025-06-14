document.addEventListener("DOMContentLoaded", async function () {
    const [projects, languages] = await Promise.all([
        getData("projects"),
        getData("languages"),
    ]);

    const projectsHTML = [];

    projects.forEach((project) => {
        projectsHTML.push(getHTMLprojectBox(project));
    });

    const contentBox = document.querySelector(".contentBox");
    contentBox.innerHTML = projectsHTML[0];
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

function getHTMLanguageBox(language) {}
