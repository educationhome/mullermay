import { gsap } from "gsap";

export class Services {

    constructor() {
        this.root = document.querySelector("[data-template='services']");

        if(!this.root) {
            return;
        }

        this.button = this.root.querySelectorAll(".fb-service__load-text-button");
        this.block = this.root.querySelectorAll(".fb-service__block");

        this.mount();
    }

    mount() {
        this.block.forEach(element => this.saveHeight(element));
        this.addEvents();
    }

   

    addEvents() {
        this.button.forEach(element => element.addEventListener("click", e => this.toggleText(e)));
    
        window.addEventListener("resize", () => this.updateDataSetHeight());
    }

    

    removeEvents() {
        if (document.querySelector("[data-template='services']")) {
            this.button.forEach(element => element.addEventListener("click", e => this.toggleText(e)));
            window.addEventListener("resize", () => this.updateDataSetHeight());
        }
    }



    // Get Height

    getHeight(element, isMax) {
        const textContainer = element.querySelector(".fb-service__text");
        const isShowed = textContainer.classList.contains("--is-showed");

        textContainer.style.maxHeight = "none";

        if ((isMax && !isShowed) || (!isMax && isShowed)) {
            textContainer.classList.toggle("--is-showed");
        }

        const height = textContainer.clientHeight;

        if ((isMax && !isShowed) || (!isMax && isShowed)) {
            textContainer.classList.toggle("--is-showed");
        }

        return height;
    }



    // Save Height

    saveHeight(element, autoClosingWindow = true) {
        element.dataset.minHeight = this.getHeight(element, false);
        element.dataset.maxHeight = this.getHeight(element, true);

        const textContainer = element.querySelector(".fb-service__content .fb-service__text");

        if (autoClosingWindow) {
            textContainer.style.maxHeight = `${element.dataset.minHeight}px`;
        }
    }



    // Toogle Text 

    toggleText(element) {
        const serviceButton = element.currentTarget.closest(".fb-service__load-text-button");
        const serviceBlock = serviceButton.parentElement.parentElement;
        const serviceContent = serviceButton.parentElement.querySelector(".fb-service__text")
        const minHeight = serviceBlock.dataset.minHeight + "px";
        const maxHeight = serviceBlock.dataset.maxHeight + "px";
        
        serviceContent.classList.contains("--is-showed") ? this.hideText(serviceContent, minHeight) : this.showText(serviceContent, maxHeight);
    }

    

    // Show Text

    showText(content, maxHeight) {
        content.classList.add("--is-showed");

        const tl = gsap.timeline({
            onStart: function () {
                content.parentElement.querySelector(".fb-service__text-open").classList.add("--hide");
                content.parentElement.querySelector(".fb-service__text-close").classList.remove("--hide");
                content.parentElement.querySelector(".icon__drop-down-button").style.transform = "rotate(0)";
            }
        });

        tl.to(content, { maxHeight: maxHeight, duration: 0.5, ease: "expo.out" })
    }



    // Hide Text

    hideText(content, minHeight) {
        const tl = gsap.timeline({
            onComplete: function () {
                content.classList.remove("--is-showed");
            },

            onStart: function () {
                content.parentElement.querySelector(".fb-service__text-open").classList.remove("--hide");
                content.parentElement.querySelector(".fb-service__text-close").classList.add("--hide");
                content.parentElement.querySelector(".icon__drop-down-button").style.transform = "rotate(180deg)";
            },
        });

        tl.to(content, { maxHeight: minHeight, duration: 0.5, ease: "expo.out" });
    }



    // Update Height (resize Event)

    updateDataSetHeight() {
        const textContainer = this.root.querySelectorAll(".fb-service__block");
        textContainer.forEach(element => {
            this.saveHeight(element, false);
        });
    }

}