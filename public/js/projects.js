document.addEventListener('DOMContentLoaded', function () {
    const selectBoxes = document.querySelectorAll('.projectsSelectBox_label');
    const listSelected = [];

    selectBoxes.forEach((selectBox) => {
        const checkbox = selectBox.querySelector('.checkboxLanguage');
        checkbox.addEventListener('change', function () {
            const checked = checkbox.checked;
            if (!checked) {
                const technologia = selectBox.querySelector('.projectsSelectBox_span').textContent;
                const indexInList = listSelected.indexOf(technologia);
                listSelected.splice(indexInList, 1);
            } else {
                const technologia = selectBox.querySelector('.projectsSelectBox_span').textContent;
                listSelected.push(technologia);
            }
            rerenderProjects(listSelected);
        });
    });
});


function rerenderProjects(selectedTechnologies) {
    const projects = document.querySelectorAll('.projectBox');
    console.log(selectedTechnologies);
    if (selectedTechnologies.length != 0) {
        projects.forEach((project) => {
            const jsSelectTechnologies = project.querySelectorAll('.jsSelectTechnologies');
            const listTechnologies = Array.from(jsSelectTechnologies).map(item => item.textContent);
            if (!selectedTechnologies.some(item => listTechnologies.includes(item))) {
                project.classList.add('invisibleProject');
            } else if (project.classList.contains('invisibleProject')) {
                project.classList.remove('invisibleProject');
            }
        });
    } else {
        projects.forEach((project) => {
            project.classList.remove('invisibleProject');
        });
    } 
}