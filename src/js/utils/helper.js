const root = document.getElementById("root");

/**
 * Helper to bind this to functions
 * @param thisArg
 * @param functionNames
 */
export function bind(thisArg, ...functionNames) {
    functionNames.forEach((fn) => {
        if (thisArg.hasOwnProperty(fn)) return;

        thisArg[fn] = (thisArg[fn]).bind(thisArg);
    });
}



export function historyBack() {
    window.history.back();
}

export function createState(data, url) {
    return Object.assign(data, {
        url: url,
    });
}

export function pushState({data = {}, title, url}) {
    data = createState(data, url);

    if (!title) {
        title = document.title;
    }

    console.log("pushState", data, title, url);

    window.history.pushState(data, title, url);
}

export function replaceState({data = {}, title, url}) {
    data = createState(data, url);

    if (!title) {
        title = document.title;
    }

    console.log("replaceState", data, title, url);

    window.history.replaceState(data, title, url);
}
