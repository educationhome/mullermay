import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

export class Slider {

    constructor() {
        this.teamMemberElement = document.querySelector('[data-template="slider"]');

        if(!this.teamMemberElement) {
            return;
        }

        this.mount();
    }

    mount() {
        this.setSwiper();
    }


    setSwiper() {
        this.swiper = new Swiper(".mullermaySwiper", {
            slidesPerView: "auto",
            modules: [Navigation],
            navigation: {
                nextEl: ".swiper-arrow-button--is-next",
                prevEl: ".swiper-arrow-button--is-prev",
            },
        });
    }
}