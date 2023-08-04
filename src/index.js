import Alpine from 'alpinejs'
import Glide from '@glidejs/glide'

import './index.css'

window.Alpine = Alpine;

Alpine.start();

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

window.addEventListener('resize', function() {
    glide.update({
        peek: { 
            before: 15, 
            after: window.innerWidth / 5
        }
    });
});