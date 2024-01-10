export class ReviewsSlider {

    constructor() {
        this.root = document.querySelector('[data-template="reviews-slider"]');

        if(!this.root) {
            return;
        }

        this.mount();
    }

    mount() {
        this.setSwiper();
    }

    setSwiper() {
        this.swiper = new Swiper(".reviewsSlider", {
            spaceBetween: 32,
            slidesPerView: 1,
            pagination: {
              el: ".reviews-pagination",
              clickable: true,
            },

            breakpoints: {
                768: {
                  slidesPerView: 2,
                },
            },
        });
    }
}

