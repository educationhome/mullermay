import { gsap } from "gsap";

export class TeamMember {

    constructor() {
        this.root = document.querySelector("[data-template='team-member']");
        
        if(!this.root) {
            return;
        }


        this.button = this.root.querySelectorAll(".fb-team-member__load-text-button");
        this.block = this.root.querySelectorAll(".fb-team-member__block");

        this.mount();
    }

    mount() {
        this.addEvents();
    }


    addEvents() {
        this.button.forEach(element => {
            element.addEventListener("click", (e) => this.toggleText(e));
        });

        addEventListener("DOMContentLoaded", () => {
            this.block.forEach(element => {
                this.saveHeight(element);
            });
        });

        addEventListener("resize", () => this.updateDataSetHeight());
    }

    toggleText(e) {
        const parentEl = e.target.parentElement;
        const content = parentEl.parentElement.querySelector(".text-content");
        const teamMemberText = parentEl.parentElement.querySelector(".fb-team-member__text");
        
        const teamMemberBlock = parentEl.parentElement.parentElement;
        const minHeight = teamMemberBlock.dataset.minHeight + "px";
        const maxHeight = teamMemberBlock.dataset.maxHeight + "px";

        if (content.classList.contains("--is-showed")) {
            this.hideText(parentEl, teamMemberText, minHeight);
        } else {
            this.showText(parentEl, teamMemberText, maxHeight);
        }
    }

    showText(parentEl, text, maxHeight) {
        text.classList.add("--is-showed");

        const tl = gsap.timeline({
            onStart: function () {
                parentEl.querySelector(".fb-team-member__text-open").classList.add("--hide");
                parentEl.querySelector(".fb-team-member__text-close").classList.remove("--hide");
                parentEl.querySelector(".icon__drop-down-button").style.transform = "rotate(0)";
            }
        });

        tl.to(text, { maxHeight: maxHeight, duration: 0.5, ease: "expo.out" })
    }

    hideText(parentEl, text, minHeight) {
        const tl = gsap.timeline({
            onComplete: function () {
                text.classList.remove("--is-showed");
            },

            onStart: function () {
                parentEl.querySelector(".fb-team-member__text-open").classList.remove("--hide");
                parentEl.querySelector(".fb-team-member__text-close").classList.add("--hide");
                parentEl.querySelector(".icon__drop-down-button").style.transform = "rotate(180deg)";
            },
        });
        
        tl.to(text, { maxHeight: minHeight, duration: 0.5, ease: "expo.out" })
    }

    updateDataSetHeight() {
        const textContainer = this.root.querySelectorAll(".fb-team-member__block");
        textContainer.forEach(element => {
            this.saveHeight(element);
        });
    }

    saveHeight(element) {
        const minHeight = this.getMinHeight(element);
        const maxHeight = this.getMaxHeight(element);

        element.dataset.minHeight = minHeight;
        element.dataset.maxHeight = maxHeight;
    }

    getMinHeight(element) {
        const textContainer = element.querySelector(".fb-team-member__text");
        textContainer.classList.remove("--is-showed");
        const minHeight = textContainer.clientHeight;

        return minHeight;
    }

    getMaxHeight(element) {
        const textContainer = element.querySelector(".fb-team-member__text");
        textContainer.style.maxHeight = "none";
        textContainer.classList.add("--is-showed");
        const maxHeight = textContainer.clientHeight;
        textContainer.classList.remove("--is-showed");

        return maxHeight;
    }

}