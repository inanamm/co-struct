import Alpine from 'alpinejs'
import Glide from '@glidejs/glide'

import './index.css'

window.Alpine = Alpine;

Alpine.start();

new Glide('.glide', {
    type: 'carousel',
    startAt: 0,
    perView: 1.1,
    focusAt: 'center',
    gap: 0
}).mount()