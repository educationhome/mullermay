import {bind, getLastScrollPosition, warn} from "../utils/helper";
import EventEmitter from "./EventEmitter";
import {html} from "../utils/dom";
import ContactForm from "../components/ContactForm";



export default class Page extends EventEmitter {

    constructor() {
        super();



        this.domElms = {
            root: null,
        };
    }



    // Lifetime functions.

    mount() {
        if (this.isMounted) return;



        const lastScrollPosition = getLastScrollPosition();
        console.log("pageMount - lastScroll", lastScrollPosition);
        if (lastScrollPosition != null) {
            console.log("scrollTop - setOnPageMount");
            html.scrollTop = lastScrollPosition;
        }

        this.emit("mount", {instance: this});
    }

    unmount() {
        if (!this.isMounted) return;
        this.isMounted = false;

        if (this.contactForm) {
            this.contactForm.unmount();
        }
    }



    // Setup.



    // Helpers.


    show() {
        if (!this.canShow) {
            return Promise.resolve(false);
        }

        this.domElms.root.classList.add("-active");

        this.isVisible = true;

        return Promise.resolve(true);
    }

    hide() {
        if (!this.canHide) {
            return Promise.resolve(false);
        }

        this.domElms.root.classList.remove("-active");

        this.isVisible = false;

        return Promise.resolve(true);
    }



    // Event functions.

}
