import { gsap } from "gsap";

export class Cookies {

    constructor() {
        this.root = document.getElementById("js-cookies");
        this.cookiesBlock = this.root.querySelector(".cookie__block");

        if(!this.root || !this.cookiesBlock) {
            return;
        }

        this.openCookieButton = document.getElementById("open-cookie-window");
        this.mount();
    }

    mount() {
        this.addEvents();
    }

    addEvents() {
        // window.addEventListener("load", () => this.initCookies());

        if (this.openCookieButton) {
            this.openCookieButton.addEventListener("click", () => this.openCookieWindow());
        }
    }

    openCookieWindow() {
        const tl = gsap.timeline();
        tl.set(this.root, {zIndex: 11});
        tl.addLabel("start");
        tl.to(this.root, { backgroundColor: "rgba(0, 0, 0, 0.3)", duration: 0.1 }, "start");
        tl.to( this.cookiesBlock, { y: "-50%", duration: 0, ease: "power2.out" }, "start");
    }
}

