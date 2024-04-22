import "../scss/style.scss";

import LazyLoad from "vanilla-lazyload";

import { Slider } from "./blocks/Slider";
import { ServicesList } from "./blocks/ServicesList";
import { ReviewsSlider } from "./blocks/ReviewsSlider";
import { Menu } from "./blocks/Menu";
import { Information_Button } from "./buttons/Information_Button";
import { DropDown } from "./blocks/DropDown";
import { Services } from "./blocks/Services";
import { TeamMember } from "./blocks/TeamMember";
import { GoogleMaps } from "./blocks/GoogleMaps";
import { Cookies } from "./blocks/Cookies";

import { gsap } from "gsap";

import { getAttributeSafe } from "./helper";



// Mount -- Blocks

function blocksMount() {
    this.blocks = new Map();
    this.blocks.set("slider", new Slider());
    this.blocks.set("services-list", new ServicesList());
    this.blocks.set("reviews-slider", new ReviewsSlider());
    this.blocks.set("menu", new Menu());
    this.blocks.set("information_button", new Information_Button());
    this.blocks.set("drop-down", new DropDown());
    this.blocks.set("services", new Services());
    this.blocks.set("team-member", new TeamMember());
    this.blocks.set("google-maps", new GoogleMaps());
    this.blocks.set("cookies", new Cookies());
}

blocksMount();



// Overlay

document.addEventListener("DOMContentLoaded", function() {
    var overlay = document.getElementById("overlay");
    overlay.style.opacity = "0";
    overlay.parentNode.removeChild(overlay);

    setLazyLoading(); 
});



// Set Lazy Loading 

function setLazyLoading() {
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    }); 
}



// Insert Google Tag Manager

function insertGoogleTagManager() {
    const gtmId = "GTM-TX3JKFK3";

    if (document.getElementById("gtm-script") || document.getElementById("gtm-iframe")) {
        return;
    }

    // Insert Code GTM in <head>
    var gtmScriptNode = document.createElement("script");
    gtmScriptNode.id = "gtm-script";
    gtmScriptNode.innerHTML = "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':" +
    "new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0]," +
    "j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src="+
    "'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);"+
    "})(window,document,'script','dataLayer','" + gtmId + "');";
    document.head.appendChild(gtmScriptNode);

    // Insert noscript iframe after <body>
    var gtmIframeNode = document.createElement("noscript");
    gtmIframeNode.id = "gtm-iframe";
    var gtmIframe = document.createElement("iframe");
    gtmIframe.src = "https://www.googletagmanager.com/ns.html?id=" + gtmId;
    gtmIframe.style.height = "0";
    gtmIframe.style.width = "0";
    gtmIframe.style.display = "none";
    gtmIframe.style.visibility = "hidden";
    gtmIframeNode.appendChild(gtmIframe);
    document.body.insertBefore(gtmIframeNode, document.body.firstChild);
}

export { insertGoogleTagManager };



// Delete Google Tag Manager 

function removeGoogleTagManager() {
    var gtmScript = document.getElementById("gtm-script");
    if (gtmScript) {
        gtmScript.parentNode.removeChild(gtmScript);
    }

    var gtmIframe = document.getElementById("gtm-iframe");
    if (gtmIframe) {
        gtmIframe.parentNode.removeChild(gtmIframe);
    }

    document.querySelectorAll('script[src*="googletagmanager.com/gtm.js"]')
    .forEach(script => script.remove());
}

export { removeGoogleTagManager };



// Get Cookie

function getCookie(cname) {
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

export { getCookie };



// Check Cookies

function checkCookies() {
    if (!getCookie("cookieOptions")) {
        if (!window.location.href.includes("/impressum-datenschutz/")) {
           openCookieWindow(); 
        }
    } else {
        if (getCookie("cookieOptions") == "optional.settings") {
            insertGoogleTagManager();
        }
    }
}

export { checkCookies };



// Open Cookie Window 

function openCookieWindow() {
    const cookie = getCookie("cookieOptions");
    document.querySelector("#optional-cookies").checked = (cookie === "optional.settings");

    const tl = gsap.timeline();

    document.getElementById("js-cookies").style.zIndex = 11;
    document.body.style.overflow = "hidden";

    tl.addLabel("start");
    tl.to(document.getElementById("js-cookies"), { backgroundColor: "rgba(0, 0, 0, 0.3)", duration: 0.1 }, "start");
    tl.to(document.querySelector(".cookie__block"), { translateY: 0, duration: 0, ease: "power2.out" }, "start");
}

export { openCookieWindow };



// AJAX page Event listener

document.addEventListener("DOMContentLoaded", ajaxChangePage);



function ajaxChangePage() {
    whereAmI();
    const ajaxLinks = document.querySelectorAll(".ajax-link");

    ajaxLinks.forEach(link => {
        link.removeEventListener("click", ajaxClickHandler);
    });

    ajaxLinks.forEach(link => {
        link.addEventListener("click", ajaxClickHandler);
    }); 
}



function ajaxClickHandler(event) {
    event.preventDefault();
    const menu = new Menu();
    menu.closeMenu();

    scrollToTop();

    const url = this.getAttribute("href");

    loadPage(url);
}



// Load Page and Update Page

function loadPage(url, update = false) {
    return new Promise((resolve, reject) => {
        if (!update) {
            window.history.pushState({ path: url }, "", url);
            window.history.replaceState({ path: url }, "", url); 
        }

        const cachedPage = sessionStorage.getItem(url);

        if (!update && cachedPage) {
            displayPage(cachedPage);
            resolve(cachedPage);
        } else {
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.text();
                })
                .then(html => {
                    sessionStorage.setItem(url, html);
                    displayPage(html);
                    resolve(html);
                })
                .catch(error => {
                    console.error("There has been a problem with your fetch operation:", error);
                    reject(error);
                });
        }
    });
}



// Display Page

function displayPage(html) {
    clearMounts();

    takePagesToDisableCache()
    .then(result => {
        checkDisableCachePages(result);
    })

    let content = document.querySelector(".content");
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, "text/html");
    const metadata = extractMetadata(doc);
    const docContent = doc.querySelector(".content");
    const newTemplate = docContent.getAttribute("data-template");

    content.setAttribute("data-template", newTemplate);

    whereAmI();

    gsap.to(content, { opacity: 0, duration: 0.5, onComplete: () => {
            updatePageMetadata(metadata);
            
            content.innerHTML = "";
            content.innerHTML = docContent.innerHTML;
            gsap.fromTo(content, { opacity: 0 }, { opacity: 1, duration: 1 });

            updatePage();
            ajaxChangePage();

            setTimeout(() => {
                checkCookies();
            }, 500);

            removeGoogleMapsScriptAndStyle();

            attachEventListenersToLinks();
        }
    });
}



// Extract Metadata

function extractMetadata(doc) {
    return {
        title: doc.getElementById("title") ? doc.getElementById("title").innerText : "",
        description: getAttributeSafe(doc.querySelector("#description"), "content"),
        ogImage: getAttributeSafe(doc.querySelector("#og-image"), "content"),
        ogImageWidth: getAttributeSafe(doc.querySelector("#og-image-width"), "content"),
        ogImageHeight: getAttributeSafe(doc.querySelector("#og-image-height"), "content")
    };
}



// Update Page Meta Data

function updatePageMetadata({ title, description, ogImage, ogImageWidth, ogImageHeight }) {
    document.getElementById("title").innerText = title;
    document.getElementById("description").setAttribute("content", description);
    document.getElementById("og-image").setAttribute("content", ogImage);
    document.getElementById("og-image-width").setAttribute("content", ogImageWidth);
    document.getElementById("og-image-height").setAttribute("content", ogImageHeight);
}



// Load Page (Pop State Event)

window.addEventListener("popstate", () => {
    loadPage(window.location.href, true);
});



// Update Page 

function updatePage() {
    blocksMount();
    setLazyLoading();
}
   


// Scroll to Top

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}



// Clear All Mounts 

function clearMounts() {
    if (this.blocks) {
        this.blocks.forEach(block => block.removeEvents?.());
    }
}



// Set View Port 

window.addEventListener("resize", setViewport);
document.documentElement.style.setProperty("--vh", `${window.innerHeight / 100}px`);

function setViewport() {
    document.documentElement.style.setProperty("--vh", `${window.innerHeight / 100}px`);
}



// Where Am I function (highlight the page where I am)

function whereAmI() {
    const currentUrl = window.location.href;
    const menuLinks = document.querySelectorAll(".where-am-i");

    menuLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add("active"); 
        } else {
            link.classList.remove("active"); 
        }
    });

    const menuLinksMobile = document.querySelectorAll(".where-am-i__mobile");

    menuLinksMobile.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add("active"); 
        } else {
            link.classList.remove("active"); 
        }
    });
}



// Preload Pages

function takePagesToPrefetch() {
    const formData = new FormData();
    const ADMIN_AJAX_URL = window.location.origin + "/wp-admin/admin-ajax.php";

    formData.append("action", "prefetch_page");

    fetch(ADMIN_AJAX_URL, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        prefetchPagesWP(data);
    })
    .catch(error => {
        console.error("Error:", error);
        throw error;
    });
}

takePagesToPrefetch();



function prefetchPagesWP(data) {
    data.forEach(link => {
        const url = link["pageLink"];

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.text();
            })
            .then(html => {
                sessionStorage.setItem(url, html)
            })
            .catch(error => {
                console.error("There has been a problem with your fetch operation:", error);
            });
    })
}



// Pre fetch Links 

document.addEventListener("DOMContentLoaded", () => {
    attachEventListenersToLinks();
});



function attachEventListenersToLinks() {
    const links = document.querySelectorAll(".ajax-link:not([data-prefetched])");
    links.forEach(link => {
        if (!link.hasAttribute("data-event-prefetch")) {

            link.setAttribute("data-event-prefetch", "");

            link.addEventListener("mouseenter", function prefetchOnce() {
                const cachedPage = sessionStorage.getItem(link.getAttribute("href"));

                if (!cachedPage) {
                    prefetchResource(link.href);
                    link.removeEventListener("mouseenter", prefetchOnce);
                }
            });
        }
    });
}



function prefetchResource(url) {
    const prefetchLink = document.createElement("link");
    prefetchLink.rel = "prefetch";
    prefetchLink.href = url;
    document.head.appendChild(prefetchLink);
}



// Disable Caching Pages

async function takePagesToDisableCache() {
    const formData = new FormData();
    const ADMIN_AJAX_URL = window.location.origin + "/wp-admin/admin-ajax.php";

    formData.append("action", "disable_page_cache");

    try {
        const response = await fetch(ADMIN_AJAX_URL, {
            method: "POST",
            body: formData
        });
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error:", error);
        throw error;
    }
}

takePagesToDisableCache()
    .then(result => {
        checkDisableCachePages(result);
    })



function checkDisableCachePages(links) {
    const currentUrl = window.location.href;

    links.forEach(link => {
        if (link["pageLink"] == currentUrl) {
            sessionStorage.removeItem(currentUrl);
        }
    })
}



function removeGoogleMapsScriptAndStyle() {

    // Delete Script 

    var scripts = document.getElementsByTagName("script");
    var scriptsToRemove = [];

    for (var i = 0; i < scripts.length; i++) {
        var src = scripts[i].getAttribute("src");
        if (src && src.includes("maps.googleapis.com/maps")) {
            scriptsToRemove.push(scripts[i]);
        }
    }

    for (var j = 0; j < scriptsToRemove.length; j++) {
        scriptsToRemove[j].parentNode.removeChild(scriptsToRemove[j]);
    }

    // Delete Style

    var styleElements = document.getElementsByTagName('style');

    for (var i = 0; i < styleElements.length; i++) {
        var styleContent = styleElements[i].textContent;
        
        if (styleContent && styleContent.includes('.dismissButton')) {
            styleElements[i].parentNode.removeChild(styleElements[i]);
        }
    }
}