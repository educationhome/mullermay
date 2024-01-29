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