import "../scss/style.scss";

import { Slider } from "./blocks/Slider";
import { Home } from "./pages/Home";
import { ServicesList } from "./blocks/ServicesList";
import { ReviewsSlider } from "./blocks/ReviewsSlider";
import { Menu } from "./blocks/Menu";
import { Information_Button } from "./buttons/Information_Button";
import { DropDown } from "./blocks/DropDown";

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
}

blocksMount();