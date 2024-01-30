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
        tl.set(this.infoContent, {zIndex: 11});
        tl.set(document.body, {overflow: "hidden"});
        tl.addLabel("start");
        tl.to(this.infoContent, { backgroundColor: "rgba(0, 0, 0, 0.3)", duration: 0.1 }, "start");
        tl.to(this.infoBlock, { y: "-15%", duration: 0, ease: "power2.out" }, "start");
    }

    // tl set add Label
    closeInfoButton() {
        const tl = gsap.timeline();
        tl.addLabel("end");
        tl.to(this.infoBlock, { y: "100%", duration: 0 }, "end");
        tl.to(this.infoContent, { backgroundColor: "rgba(0, 0, 0, 0)", duration: 0.3 }, "end");
        tl.set(this.infoContent, {zIndex: -1, delay: 0.3})
        tl.set(document.body, {overflow: "auto"});
    }

}

