function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}

function setupFilterButtons() {
  const filterButtons = document.querySelectorAll(".filter-btn");
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => applyFilter(button));
  });
}

function applyFilter(button) {
  const filterButtons = document.querySelectorAll(".filter-btn");
  filterButtons.forEach((btn) => {
    btn.parentNode.classList.remove("pl-3", "text-cslightblue");
    if (btn.dataset.filter === button.dataset.filter) {
      btn.parentElement.classList.add("text-cslightblue", "pl-3");
    }
  });

  const filter = button.getAttribute("data-filter");
  fetchProjects(filter);
}

function fetchProjects(filter = "") {
  fetch(`/ajax/projects${filter ? "?filter=" + filter : ""}`)
    .then((response) => response.json())
    .then((data) => updateProjects(JSON.parse(data.body)))
    .catch((error) => console.error("Error:", error));
}

function updateProjects(projects) {
  const containers = document.querySelectorAll(".project-container");
  containers.forEach((container) => {
    container.innerHTML = "";
    let thumbnails = projects.flatMap((project) =>
      project.thumbs.map((thumb) => ({
        url: project.url,
        thumbnail: thumb,
        title: project.title,
      })),
    );

    shuffleArray(thumbnails).forEach((thumb) => {
      container.appendChild(createProjectElement(thumb));
    });
  });
}

function createProjectElement(thumb) {
  const projectElement = document.createElement("a");
  projectElement.href = thumb.url;
  projectElement.className =
    "pb-5 hover:text-cslightblue hover:brightness-105 w-full h-full";
  projectElement.innerHTML = `${thumb.thumbnail} <p class="font-mono text-xs w-full">${thumb.title}</p>`;
  return projectElement;
}

document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM loaded");
  setupFilterButtons();
  fetchProjects();
});
