import { gsap } from "gsap";
import { insertGoogleTagManager, removeGoogleTagManager, checkCookies, getCookie, openCookieWindow } from "../app";

export class Cookies {

    constructor() {
        this.root = document.getElementById("js-cookies");
        this.cookiesBlock = this.root.querySelector(".cookie__block");
        this.saveSettingsButton = this.root.querySelector("#js-save-settings");
        this.saveAllSettingsButton = this.root.querySelector("#js-save-all-settings"); 

        if(!this.root) {
            return;
        }

        this.openCookieButton = document.getElementById("open-cookie-window");
        this.optionalCheckbox = this.root.querySelector("#optional-cookies");

        this.saveSettingsHandler = () => this.closeCookieWindow(false);
        this.saveAllSettingsHandler = () => this.closeCookieWindow(true);
        this.openCookieHandler = () => openCookieWindow();

        this.mount();
    }



    mount() {
        this.addEvents();
    }

    

    addEvents() {
        window.addEventListener("DOMContentLoaded", () => {
            setTimeout(() => {
                checkCookies();
            }, 500);
        });

        if (this.openCookieButton) {
            this.openCookieButton.addEventListener("click", this.openCookieHandler);
        }

        this.saveSettingsButton.addEventListener("click", this.saveSettingsHandler);
        this.saveAllSettingsButton.addEventListener("click", this.saveAllSettingsHandler);
    }



    removeEvents() {
        if (document.getElementById("js-cookies")) {
            window.removeEventListener("DOMContentLoaded", () => {
                setTimeout(() => {
                    checkCookies();
                }, 500);
            });

            if (this.openCookieButton) {
                this.openCookieButton.removeEventListener("click", this.openCookieHandler);
            }

            this.saveSettingsButton.removeEventListener("click", this.saveSettingsHandler);
            this.saveAllSettingsButton.removeEventListener("click", this.saveAllSettingsHandler);
        }
        
    }



    openCookieWindow() {
        const cookie = getCookie("cookieOptions");
        this.optionalCheckbox.checked = (cookie === "optional.settings");

        const tl = gsap.timeline();

        this.root.style.zIndex = 11;
        document.body.style.overflow = "hidden";

        tl.addLabel("start");
        tl.to(this.root, { backgroundColor: "rgba(0, 0, 0, 0.3)", duration: 0.1 }, "start");
        tl.to(this.cookiesBlock, { translateY: 0, duration: 0, ease: "power2.out" }, "start");
    }



    closeCookieWindow(saveAllSettings) {
        let timeout = 0;

        if (saveAllSettings && !this.optionalCheckbox.checked) {
            timeout = 500;
            this.optionalCheckbox.checked = true;
        }

        const tl = gsap.timeline();

        setTimeout(() => {
            tl.addLabel("end");
            tl.to(this.cookiesBlock, { translateY: "160%", duration: 0}, "end");
            tl.to(this.root, { backgroundColor: "rgba(0, 0, 0, 0)", duration: 0.3}, "end");
            tl.set(document.body, {overflow: "auto"})
            tl.set(this.root, {zIndex: -1, delay: 0.3});
        }, timeout);

        this.saveSettings();
    }



    saveSettings() {
        const cookieValue = this.getSettings() ? "optional.settings" : "essential.settings";

        (cookieValue === "optional.settings") ? insertGoogleTagManager() : removeGoogleTagManager();

        let expiresDate = new Date();
        expiresDate.setFullYear(expiresDate.getFullYear() + 1);
        expiresDate = expiresDate.toUTCString();

        document.cookie = "cookieOptions=" + cookieValue + ";" + "expires=" + expiresDate + "; path=/";
    }



    // checkCookies() {
    //     if (!this.getCookie("cookieOptions")) {
    //         if (!window.location.href.includes("/impressum-datenschutz/")) {
    //            this.openCookieWindow(); 
    //         }
    //     } else {
    //         if (this.getCookie("cookieOptions") == "optional.settings") {
    //             insertGoogleTagManager();
    //         }
    //     }
    // }



    getSettings() {
        return this.root.querySelector("#optional-cookies").checked;
    }



    // Get Cookie

    // getCookie(cname) {
    //     let name = cname + "=";
    //     let decodedCookie = decodeURIComponent(document.cookie);
    //     let ca = decodedCookie.split(";");
    //     for (let i = 0; i < ca.length; i++) {
    //         let c = ca[i];
    //         while (c.charAt(0) == " ") {
    //             c = c.substring(1);
    //         }
    //         if (c.indexOf(name) == 0) {
    //             return c.substring(name.length, c.length);
    //         }
    //     }
    //     return "";
    // }

}