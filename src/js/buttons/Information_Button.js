import { gsap } from "gsap";

export class Information_Button {

    constructor() {
        this.root = document.querySelectorAll('[data-button="information"]');
        this.infoContent = document.querySelector(".notification__content");
        this.closeButton = document.querySelector(".notification__close-button");
        this.infoBlock = document.querySelector(".notification__block");
        
        if(!this.root || !this.closeButton || !this.infoContent || !this.infoBlock) {
            return;
        }

        this.openInfoWindowHandler = () => this.openInfoWindow();
        this.closeInfoButtonHandler = () => this.closeInfoButton();

        this.mount();
    }

    mount() {
        this.addEvents();
    }

    addEvents() {
        this.root.forEach(button => {
            button.addEventListener("click", this.openInfoWindowHandler);
        });

        this.closeButton.addEventListener("click", this.closeInfoButtonHandler); 
    }

    removeEvents() {
        if (document.querySelector('[data-button="information"]')) {
            this.root.forEach(button => {
                button.removeEventListener("click", this.openInfoWindowHandler);
            });

            this.closeButton.removeEventListener("click", this.closeInfoButtonHandler); 
        }
    }

    openInfoWindow() {
        const tl = gsap.timeline();
        tl.set(this.infoContent, {zIndex: 11});
        tl.set(document.documentElement, {overflow: "hidden"});
        tl.addLabel("start");
        tl.to(this.infoContent, { backgroundColor: "rgba(0, 0, 0, 0.3)", duration: 0.1 }, "start");
        tl.to(this.infoBlock, { y: "-15%", duration: 0, ease: "power2.out" }, "start");
        
        this.closeButton.setAttribute('tabindex', '0');
    }

    closeInfoButton() {
        const tl = gsap.timeline();
        tl.addLabel("end");
        tl.to(this.infoBlock, { y: "150%", duration: 0, ease: "power2.out" }, "end");
        tl.to(this.infoContent, { backgroundColor: "rgba(0, 0, 0, 0)", duration: 0.3 }, "end");
        tl.set(this.infoContent, {zIndex: -1, delay: 0.3})
        tl.set(document.documentElement, {overflow: "auto"});

        this.closeButton.setAttribute('tabindex', '-1');
    }

}

 