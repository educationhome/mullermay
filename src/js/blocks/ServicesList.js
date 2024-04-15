export class ServicesList {

    constructor() {
        this.root = document.querySelector('[data-template="services-list"]');

        if(!this.root) {
            return;
        }

        this.paragraphText = this.root.querySelectorAll(".shortened");
        this.mount();
    }

    mount() {
        this.addEvents();
    }


    addEvents() {
        this.paragraphText.forEach(element => {
            element.addEventListener("DOMContentLoaded", this.hideText(element));
        });
    }

    removeEvents() {
        if (document.querySelector('[data-template="services-list"]')) {
            this.paragraphText.forEach(element => {
                element.removeEventListener("DOMContentLoaded", this.hideText(element));
            });
        }
        
    }

    hideText(paragraph) {
        const maxLength = 95; 

        if (paragraph.innerHTML.length > maxLength) {
            const truncatedText = paragraph.innerHTML.slice(0, maxLength) + "...";
            paragraph.innerHTML = truncatedText;
        }
    }
}