import Alpine from 'alpinejs'
import Swiper from 'swiper';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import './index.css'
 
window.Alpine = Alpine;
 
Alpine.start();

const swiper = new Swiper(".swiper", {
    loop: true,
    slidesOffsetBefore: 30,
    slidesPerView: 1.1,
});