import { gsap } from "gsap";

export class Information_Button {

    constructor() {
        this.root = document.querySelectorAll('[data-button="information"]');
        this.infoContent = document.querySelector(".notification__content");
        this.closeButton = document.querySelector(".notification__close-button");
        this.infoBlock = document.querySelector(".notification__block");
        // console.log(this.root);
        
        if(!this.root || !this.closeButton || !this.infoContent || !this.infoBlock) {
            return;
        }

        this.mount();
    }

    mount() {
        this.addEvents();
    }

    addEvents() {
        this.root.forEach(button => {
            button.addEventListener("click", () => this.openInfoWindow());
        });

        this.closeButton.addEventListener("click", () => this.closeInfoButton()); 
    }

    openInfoWindow() {
        const tl = gsap.timeline();
        tl.to(this.infoContent, {zIndex: 11})
        .to(this.infoContent, { backgroundColor: "rgba(0, 0, 0, 0.3)" })
        .to(this.infoBlock, { y: "-35%", duration: 0.1, ease: "expo.out" }, "-=0.1")
    }

    closeInfoButton() {
        const tl = gsap.timeline();
        tl.to(this.infoBlock, { y: "100%", duration: 0.001 })
        .to(this.infoContent, { backgroundColor: "rgba(0, 0, 0, 0)", duration: 0.3 })
        .to(this.infoContent, {zIndex: -1, delay: 0.2})
    }

}

