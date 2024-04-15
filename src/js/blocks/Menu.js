export class Menu {

    constructor() {
        this.root = document.querySelector('[data-template="menu"]');
        
        if(!this.root) {
            return;
        }

        this.openMenuButton = document.querySelector("[data-open-menu]");
        this.closeMenuButton = document.querySelector("[data-close-menu]");
        this.header = document.querySelector("[data-header-mobile]");

        this.resizeThreshold = 896;

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

        window.addEventListener("resize", () => this.handleResize());
    }



    removeEvents() {
        if (document.querySelector('[data-template="menu"]')) {
            if (this.openMenuButton) {
                this.openMenuButton.removeEventListener("click", () => this.openMenu());
            }

            if (this.closeMenuButton) {
                this.closeMenuButton.removeEventListener("click", () => this.closeMenu());
            }

            window.removeEventListener("resize", () => this.handleResize());
        }
        
    }



    openMenu() {
        this.root.classList.remove("--is-closed");
        this.root.classList.add("--is-opened");
        document.documentElement.style.overflow = "hidden";
    }



    closeMenu() {
        this.root.classList.remove("--is-opened");
        this.root.classList.add("--is-closed");
        document.documentElement.style.overflow = "auto";
    }



    handleResize() {
        if (window.innerWidth > this.resizeThreshold) {
            this.closeMenu();
        }
    }
}

