function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            filterButtons.forEach(btn => btn.parentNode.classList.remove('pl-3'));
            filterButtons.forEach(btn => btn.parentNode.classList.remove('text-cslightblue'));

            filterButtons.forEach(btn => {
                if (btn.dataset.filter === this.dataset.filter) {
                    btn.parentElement.classList.add('text-cslightblue')
                    btn.parentElement.classList.add('pl-3')
                }
            });

            const filter = this.getAttribute('data-filter');
            fetchProjects(filter);
        });
    });

    function fetchProjects(filter) {
        fetch(`/ajax/projects?filter=${filter}`)
            .then(response => response.json())
            .then(data => updateProjects(JSON.parse(data.body)))
            .catch(error => console.error('Error:', error));
    }

    function updateProjects(projects) {
        const container = document.getElementById('project-container');
        container.innerHTML = '';

        let thumbnailWithProjectDetails = [];
        projects.forEach(project => {
            project.thumbs.forEach(thumb => {
                thumbnailWithProjectDetails.push({
                    url: project.url,
                    thumbnail: thumb,
                    title: project.title,
                });
            });
        });

        thumbnailWithProjectDetails = shuffleArray(thumbnailWithProjectDetails);

        thumbnailWithProjectDetails.forEach(thumb => {
            const projectElement = document.createElement('a');
            projectElement.href = thumb.url;
            projectElement.className = `pb-5 hover:text-cslightblue hover:brightness-105 w-full h-full`;
            projectElement.innerHTML = `${thumb.thumbnail} <p class="font-mono text-xs w-full">${thumb.title}</p>`;
            container.appendChild(projectElement);
        });
    }

});