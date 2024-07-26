import Alpine from "alpinejs";
import Glide from "@glidejs/glide";
import anime from "animejs/lib/anime.es.js";
import {lazyLoad} from 'unlazy'
import Htmx from 'htmx.org';

import "./index.css";

window.htmx = Htmx;
window.Alpine = Alpine;

Alpine.start();

lazyLoad();
document.addEventListener('htmx:afterSwap', function (event) {
  if (event.detail.target.id === 'content') {
    lazyLoad('img[data-custom-lazy]')
  }
});

const timeLine = anime
  .timeline()
  .add({
    targets: "#logo",
    opacity: "100%",
    duration: 600,
    easing: "easeInOutCubic",
  })
  .add(
    {
      targets: "#dash",
      width: "100%",
      duration: 3000,
      easing: "easeInOutCubic",
    },
    "-=100",
  )

if (document.querySelector(".glide")) {
  let glide = new Glide(".glide", {
    type: "carousel",
    startAt: 0,
    perView: 1,
    gap: 5,
    peek: {
      before: 15,
      after: window.innerWidth / 5,
    },
  });

  glide.mount();

  window.addEventListener("resize", function () {
    glide.update({
      peek: {
        before: 15,
        after: window.innerWidth / 5,
      },
    });
  });
}

function removeFilterFromURL() {
  const url = new URL(window.location);
  const params = url.pathname.split('/').filter(param => !param.includes(`filter:`));
  const newPathname = params.join('/');
  history.pushState({}, '', newPathname);
}

const elements = document.querySelectorAll('.tag-button');
const homeButton = document.getElementById('home-button');

homeButton.addEventListener('click', function () {
  removeFilterFromURL()
  elements.forEach(el => {
    el.parentElement.classList.remove('pl-3', 'text-cslightblue');
  });
})
elements.forEach(element => {
  element.addEventListener('click', function () {
    removeFilterFromURL()
    elements.forEach(el => {
      el.parentElement.classList.remove('pl-3', 'text-cslightblue');
    });
    element.parentElement.classList.add('pl-3', 'text-cslightblue');
  })
});

