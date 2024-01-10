export class Menu {

    constructor() {
        this.root = document.querySelector('[data-template="menu"]');
        
        if(!this.root) {
            return;
        }

        this.openMenuButton = document.querySelector("[data-open-menu]");
        this.closeMenuButton = document.querySelector("[data-close-menu]");
        this.header = document.querySelector("[data-header-mobile]");

        this.mount();
    }

    mount() {
        this.addEvents();
    }

    addEvents() {
        if (this.openMenuButton) {
            this.openMenuButton.addEventListener("click", () => this.openMenu());
        }

        if (this.closeMenuButton) {
            this.closeMenuButton.addEventListener("click", () => this.closeMenu());
        }
    }

    openMenu() {
        this.root.classList.remove("--is-closed");
        this.root.classList.add("--is-opened");
    }

    closeMenu() {
        this.root.classList.remove("--is-opened");
        this.root.classList.add("--is-closed");
    }
}

