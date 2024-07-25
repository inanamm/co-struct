import Alpine from "alpinejs";
import Glide from "@glidejs/glide";
import anime from "animejs/lib/anime.es.js";
import { lazyLoad } from 'unlazy'

import "./index.css";

window.Alpine = Alpine;

Alpine.start();

lazyLoad();

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
