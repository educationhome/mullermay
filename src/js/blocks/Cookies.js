import { gsap } from "gsap";
import { insertGoogleTagManager, removeGoogleTagManager } from "../app";

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
        this.mount();
    }

    mount() {
        this.addEvents();
    }

    addEvents() {
        window.addEventListener("DOMContentLoaded", () => {
            setTimeout(() => {
                this.checkCookies();
            }, 500);
        });

        if (this.openCookieButton) {
            this.openCookieButton.addEventListener("click", () => this.openCookieWindow());
        }

        if (this.saveSettingsButton) {
            this.saveSettingsButton.addEventListener("click", (element) => this.closeCookieWindow(element));
        }

        if (this.saveAllSettingsButton) {
            this.saveAllSettingsButton.addEventListener("click", (element) => this.closeCookieWindow(element));
        }
    }

    openCookieWindow() {
        const cookie = this.getCookie("cookieOptions");
        const checkbox = this.root.querySelector("#optional-cookies");
        const tl = gsap.timeline();
        checkbox.checked = cookie === 'optional.settings';

        tl.set(this.root, {zIndex: 11});
        tl.set(this.root, {zIndex: 11});
        tl.set(document.body, {overflow: "hidden"});
        tl.addLabel("start");
        tl.to(this.root, { backgroundColor: "rgba(0, 0, 0, 0.3)", duration: 0.1 }, "start");
        tl.to(this.cookiesBlock, { translateY: 0, duration: 0, ease: "power2.out" }, "start");
    }

    closeCookieWindow(element) {
        const checkbox = this.root.querySelector("#optional-cookies");
        let timeout = 0;

        if (((element.target.parentElement.id == "js-save-all-settings") || (element.target.id == "js-save-all-settings")) && (!checkbox.checked)) {
            checkbox.checked = true;
            timeout = 500;
        }
        
        this.saveSettings();

        setTimeout(() => {
             const tl = gsap.timeline();
            tl.addLabel("end");
            tl.to(this.cookiesBlock, { translateY: "160%", duration: 0}, "end");
            tl.to(this.root, { backgroundColor: "rgba(0, 0, 0, 0)", duration: 0.3 }, "end");
            tl.set(this.root, {zIndex: -1, delay: 0.3})
            tl.set(document.body, {overflow: "auto"});
        }, timeout);
    }

    saveSettings() {
        const cookieValue = this.getSettings() ? "optional.settings" : "essential.settings";

        (cookieValue === "optional.settings") ? insertGoogleTagManager() : removeGoogleTagManager();

        let expiresDate = new Date();
        expiresDate.setFullYear(expiresDate.getFullYear() + 1);
        expiresDate = expiresDate.toUTCString();

        document.cookie = "cookieOptions=" + cookieValue + ";" + "expires=" + expiresDate + "; path=/";
    }

    checkCookies() {
        if (!this.getCookie("cookieOptions")) {
            if (!window.location.href.includes("/impressum-datenschutz/")) {
               this.openCookieWindow(); 
            }
        } else {
            if (this.getCookie("cookieOptions") == "optional.settings") {
                insertGoogleTagManager();
            }
        }
    }

    getSettings() {
        return this.root.querySelector("#optional-cookies").checked;
    }

    getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(";");
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == " ") {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

}