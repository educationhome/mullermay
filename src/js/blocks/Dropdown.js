import { gsap } from "gsap";

export class DropDown {

    constructor() {
        this.root = document.querySelector('[data-template="drop-down"]');
        
        if(!this.root) {
            return;
        }
        
        this.dropDownQuestion = this.root.querySelectorAll(".fb-drop-down__question");
        this.dropDown = this.root.querySelectorAll(".fb-drop-down");

        this.dropDown.forEach(element => {
            this.saveHeight(element);
            this.hideDropDownText(element);
        });

        this.mount();
    }

    mount() {
        this.addEvents();
    }

    addEvents() {
        this.dropDownQuestion.forEach(element => {
            element.addEventListener("click", (e) => this.openDropDown(e));
        });

        addEventListener("resize", () => this.uploadHeightDataSet());
    }

    openDropDown(element) {
        let parentEl = element.target.parentElement;

        if (parentEl.classList.contains("fb-drop-down__question")) {
            parentEl = parentEl.parentElement;
        }

        if (parentEl.classList.contains("icon__drop-down-button")) {
            parentEl = parentEl.parentElement.parentElement;
        }
        
        const dropDownText = parentEl.querySelector(".fb-drop-down__text");
        const dropDownHeight = parentEl.dataset.height;

        parentEl.classList.toggle("fb-drop-down");
        parentEl.classList.toggle("fb-drop-down--is-opened");

        if (parentEl.classList.contains("fb-drop-down--is-opened")) {
            const tl = gsap.timeline();
            tl.to(dropDownText, { marginTop: "10px", duration: 0 })
            .to(dropDownText, { height: dropDownHeight + "px", duration: 0.4})
        } else {
            const tl = gsap.timeline();
            tl.to(dropDownText, { height: "0px", duration: 0.4})
            .to(dropDownText, { marginTop: "0", duration: 0 }, "-=0.1")
        }
    }

    getHeight(element) {
        const dropDownText = element.querySelector(".fb-drop-down__text");
        const dropDownHeight = dropDownText.clientHeight;
        return dropDownHeight;
    }

    saveHeight(element) {
        const height = this.getHeight(element);
        element.dataset.height = height;
    }

    hideDropDownText(element) {
        const dropDownText = element.querySelector(".fb-drop-down__text");
        dropDownText.style.height = 0 + "px";
    }

    uploadHeightDataSet() {
        const dropDowns = document.querySelectorAll(".fb-drop-down__text");
        dropDowns.forEach(element => {
            element.style.maxHeight = "none";
            element.style.height = "fit-content"

            this.saveHeight(element.parentElement);

            if (!element.parentElement.classList.contains("fb-drop-down--is-opened")) {
                this.hideDropDownText(element.parentElement);
            }
        });
    }

}

