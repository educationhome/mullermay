// import {bind, transform} from "../utils/helper";


// class Dropdown {

//     constructor($target) {
//         this.$root = $target;
//         this.$header = $target.querySelector(".c-dropdown_header");
//         this.$body = $target.querySelector(".c-dropdown_body");
//         this.$content = $target.querySelector(".c-dropdown_body-content");
//         this.$background = $target.querySelector(".c-dropdown_bg");

//         this.contentHeight = null;
//         this.backgroundY = null;


//         bind(
//             this,
//             "onClickDropdownHeader",
//         );


//         this.calcValues();
//         this.mount();
//     }



//     // Lifetime functions.

//     mount() {
//         this.addEvents();
//     }

//     unmount() {
//         this.removeEvents();
//     }

//     addEvents() {
//         this.$header.addEventListener("click", this.onClickDropdownHeader, { passive: true });
//     }

//     removeEvents() {
//         this.$header.removeEventListener("click", this.onClickDropdownHeader);
//     }



//     // Setup.

//     // Helper.

//     calcValues() {
//         this.isMobileSize = window.innerWidth < 1024;
//         this.contentHeight = Math.max(this.$content.offsetHeight, this.isMobileSize ? 0 : 400);

//         if (this.$background && !this.isMobileSize) {
//             const dropdownBounds = this.$root.getBoundingClientRect();
//             const backgroundBounds = this.$background.getBoundingClientRect();
//             this.backgroundY = ((dropdownBounds.height + this.contentHeight) / 2) - (backgroundBounds.height / 2);
//         }
//     }

//     closeDropdown() {
//         if (this.$background && !this.isMobileSize) {
//             transform(this.$background, `translateY(0)`);
//         }

//         this.$body.style.height = 0;

//         this.$root.classList.remove("is-open");
//     }

//     openDropdown() {
//         this.$body.style.height = `${this.contentHeight}px`;

//         if (this.$background && !this.isMobileSize) {
//             transform(this.$background, `translateY(${this.backgroundY}px)`);
//         }

//         this.$root.classList.add("is-open");
//     }



//     // Event callbacks.

//     onResize(event) {
//         console.log("DDResize");

//         // this.calcValues();
//     }

//     onClickDropdownHeader(event) {
//         if (this.$root.classList.contains("is-open")) {
//             this.closeDropdown();
//         } else {
//             this.openDropdown();
//         }
//     }
// }

// export default Dropdown;