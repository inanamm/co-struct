import Alpine from "alpinejs";
import Glide from "@glidejs/glide";
import anime from "animejs/lib/anime.es.js";

import "./index.css";

window.Alpine = Alpine;

Alpine.start();

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
  .add(
    {
      targets: "#second",
      opacity: "100%",
      duration: 600,
      easing: "easeInOutCubic",
    },
    "-=2000",
  )
  .add(
    {
      targets: "#third",
      opacity: "100%",
      duration: 1000,
      easing: "easeInOutCubic",
    },
    "-=2800",
  )
  .add(
    {
      targets: "#four",
      opacity: "100%",
      duration: 400,
      easing: "easeInOutCubic",
    },
    "-=3000",
  );

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
