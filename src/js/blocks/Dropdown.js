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
        
        const dropDownText = parentEl.querySelector(".fb-drop-down__text");
        const dropDownHeight = parentEl.dataset.height;
        
        parentEl.classList.toggle("--is-opened");

        if (parentEl.classList.contains("--is-opened")) {
            dropDownText.style.display = "flex";

            const tl = gsap.timeline();
            tl.to(dropDownText, { marginTop: "10px", duration: 0 })
            .to(dropDownText, { maxHeight: dropDownHeight, duration: 0.5, ease: "expo.out" })
        } else {
            const tl = gsap.timeline();
            tl.to(dropDownText, { maxHeight: "0", duration: 0.5, ease: "expo.out" })
            .to(dropDownText, { display: "none", duration: 0 })
            .to(dropDownText, { marginTop: "0", duration: 0 }, "-=0.250")
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
        dropDownText.style.display = "none";
        dropDownText.style.maxHeight = 0;
    }

    uploadHeightDataSet() {
        const dropDowns = document.querySelectorAll(".fb-drop-down__text");
        dropDowns.forEach(element => {
            element.style.maxHeight = "none";
            element.style.display = "flex";

            this.saveHeight(element.parentElement);
            this.hideDropDownText(element.parentElement);
        });
    }

}

