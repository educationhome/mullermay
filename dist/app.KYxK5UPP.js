var undefined$1 = undefined;

const root = document.getElementById("root");

/**
 * Helper to bind this to functions
 * @param thisArg
 * @param functionNames
 */
function bind(thisArg, ...functionNames) {
    functionNames.forEach((fn) => {
        if (thisArg.hasOwnProperty(fn)) return;

        thisArg[fn] = (thisArg[fn]).bind(thisArg);
    });
}



function historyBack() {
    window.history.back();
}

function createState(data, url) {
    return Object.assign(data, {
        url: url,
    });
}

function pushState({data = {}, title, url}) {
    data = createState(data, url);

    if (!title) {
        title = document.title;
    }

    console.log("pushState", data, title, url);

    window.history.pushState(data, title, url);
}

function replaceState({data = {}, title, url}) {
    data = createState(data, url);

    if (!title) {
        title = document.title;
    }

    console.log("replaceState", data, title, url);

    window.history.replaceState(data, title, url);
}

// import assets from "./data/assets";


class App extends EventEmitter {

    constructor() {
        super();

        this.mainContent = document.getElementById("main");
        this.html = document.documentElement;
        this.zero = document.getElementById("zero");
        this.body = document.body;

        this.uaString = null;
        this.url = window.location.href;
        this.tickTaskHandle = null;

        this.template = this._template;
        this.fallbackTemplate = "home";

        this.isNavigating = false;
        this.hasPrevPage = false;
        this.loadedItems = null;
        this.fetchCache = [];

        this.pageDataService = new PageDataService();
        this.pageDataService.setPageId(this.getPageId(this.mainContent));
        this.pageDataService.setPageTemplate(this.template);

        this.pageTransition = new PageTransition();

        this.handleUserAgent();
        this.handleZeroLayerElements();
        this.setViewportUnitSizes();
        this.setTransitions();
        this.setMainMenu();
        this.setCookieNotification();
        this.setResizeObserver();

        this.debugTakId = null;

        this.lazyLoad = new LazyLoad({
            callback_loaded: ($el) => {
                if ($el.tagName !== "VIDEO") {
                    return;
                }
                window.activeBlocks?.onUpdateLazyLoad?.();
            }
        });
        // this.scrollbar = new Scrollbar({
        //     elm: document.getElementById("page-scroll-bar"),
        //     scrollContainer: html,
        // });
        // this.scrollbar.mount();
        this.scrollbar = null;

        bind(
            this,

            "onPreloaderComplete",
            "onPageMount",

            "onResizeObserver",
        );


    }


    // Setup.

    addEventListeners() {
        
    }


    setPages() {
        this.pages = new Map();
        // this.pages.set("home", new Home({pageData: this.loadedItems.pageData}));

        this.pages.forEach((page) => {
            page.on("mount", this.onPageMount);
        });
    }


    // Navigation.

    async navigateTo({url = false, push = true, trigger = "code"}) {
        if (!url) {
            return Promise.resolve();
        }

        // if (this.url === url) {
        //     return Promise.resolve();
        // }
        if (this.isNavigating) {
            return Promise.resolve();
        }

        this.isNavigating = true;
        this.hasPrevPage = true;

        document.body.classList.add("disabled");


        const data = {
            current: {
                container: this.mainContent,
                url: this.url,
            },
            next: {
                container: null,
                url: url,
            },
            trigger: trigger,
        };

        const transition = this.findTransition(this.url, url);

        console.log("navigateTo - transition", transition);

        if (!transition) {
            console.error("No transition was found.");
            return Promise.resolve();
        }

        if (transition.sync) {
            await transition.beforeAdd(data);
            await transition.add(data, push);

            data.next.container = this.mainContent;

            await transition.leave(data);
        } else {
            await transition.beforeAdd(data);
            await transition.leave(data);
            await transition.add(data, push);

            data.next.container = this.mainContent;
        }

        await transition.enter(data);
        await transition.remove(data);


        document.body.classList.remove("disabled");

        this.url = url;
        this.isNavigating = false;

        return Promise.resolve();
    }

    async fetchPage(url) {
        const fetchURL = new URL(url);
        fetchURL.searchParams.set("isAJAX", "true");

        const item = this.fetchCache.find(item => item.url === fetchURL.toString());
        if (item) {
            return parseHTML(item.htmlString);
        }

        return fetch(fetchURL.toString()).then(response => response.text()).then((htmlString) => {
            this.fetchCache.push({
                url: fetchURL.toString(),
                htmlString: htmlString,
            });

            return parseHTML(htmlString);
        });
    }

    

    // Helpers.


    updateLazyLoad() {
        this.lazyLoad.update();
    }
}


window.addEventListener("load", () => {
    gsap.registerPlugin(ScrollTrigger);

    if ("scrollRestoration" in window.history) {
        window.history.scrollRestoration = "manual";
    }

    window.app = new App();

    // window.developer = () => {
    //     console.info("%cDeveloped by Paul Louis Schmidt", "font-size: 14px; color: #fff;");
    // };
});
