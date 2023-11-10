import Alpine from 'alpinejs'
import Glide from '@glidejs/glide'
import anime from 'animejs/lib/anime.es.js';
import Swup from 'swup';
import SwupJsPlugin from '@swup/js-plugin';

import './index.css'

window.Alpine = Alpine;

Alpine.start();

const timeLine = anime.timeline()
    .add({
        targets: '#logo',
        opacity: '100%',
        duration: 800,
        easing: 'easeInOutCubic'
    })
    .add({
        targets: '#dash',
        width: '100%',
        duration: 3000,
        easing: 'easeInOutCubic'
    }, '-=100')


if (document.querySelector('.glide')) {
    let glide = new Glide('.glide', {
        type: 'carousel',
        startAt: 0,
        perView: 1,
        gap: 5,
        peek: {
            before: 15,
            after: window.innerWidth / 5
        }
    });

    glide.mount();

    window.addEventListener('resize', function () {
        glide.update({
            peek: {
                before: 15,
                after: window.innerWidth / 5
            }
        });
    });
}

// const swup = new Swup({
//     plugins: [
//       new SwupJsPlugin({ animations: [ {
//         from: '(.*)',
//         to: '(.*)',
//         out: (done) => {
//           const container = document.querySelector('#swup');
//           container.style.opacity = 1;
//           anime({ targets: container, opacity: 0, duration: 300, complete: done });
//         },
//         in: (done) => {
//           const container = document.querySelector('#swup');
//           container.style.opacity = 0;
//           anime({ targets: container, opacity: 1, duration: 300, complete: done });
//         }
//       } ] })
//     ]
//   });



