import "../scss/style.scss";

import LazyLoad from "vanilla-lazyload";

import { Slider } from "./blocks/Slider";
import { Home } from "./pages/Home";
import { ServicesList } from "./blocks/ServicesList";
import { ReviewsSlider } from "./blocks/ReviewsSlider";
import { Menu } from "./blocks/Menu";
import { Information_Button } from "./buttons/Information_Button";
import { DropDown } from "./blocks/DropDown";
import { Services } from "./blocks/Services";
import { TeamMember } from "./blocks/TeamMember";
import { GoogleMaps } from "./blocks/GoogleMaps";
import { Cookies } from "./blocks/Cookies";



// Mounts

function pagesMount() {
    this.pages = new Map();
    this.pages.set("home", new Home());
}

pagesMount();

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

window.onload = function() {
    
    var overlay = document.getElementById("overlay");
    overlay.style.opacity = "0";

    overlay.parentNode.removeChild(overlay);

    // Set Lazy Loading

    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });
    
};



// Insert Google Tag Manager

function insertGoogleTagManager() {
    const gtmId = 'GTM-TX3JKFK3';

    if (document.getElementById('gtm-script') || document.getElementById('gtm-iframe')) {
        return;
    }

    // Insert Code GTM in <head>
    var gtmScriptNode = document.createElement('script');
    gtmScriptNode.id = 'gtm-script';
    gtmScriptNode.innerHTML = "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':" +
    "new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0]," +
    "j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src="+
    "'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);"+
    "})(window,document,'script','dataLayer','" + gtmId + "');";
    document.head.appendChild(gtmScriptNode);

    // Insert noscript iframe after <body>
    var gtmIframeNode = document.createElement('noscript');
    gtmIframeNode.id = 'gtm-iframe';
    var gtmIframe = document.createElement('iframe');
    gtmIframe.src = 'https://www.googletagmanager.com/ns.html?id=' + gtmId;
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
    
    var gtmScript = document.getElementById('gtm-script');
    if (gtmScript) {
        gtmScript.parentNode.removeChild(gtmScript);
    }

    var gtmIframe = document.getElementById('gtm-iframe');
    if (gtmIframe) {
        gtmIframe.parentNode.removeChild(gtmIframe);
    }

    document.querySelectorAll('script[src*="googletagmanager.com/gtm.js"]')
    .forEach(script => script.remove());

}

export { removeGoogleTagManager };


document.documentElement.style.setProperty("--vh", `${window.innerHeight / 100}px`);