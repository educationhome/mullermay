export class GoogleMaps {

    constructor() {
        this.root = document.querySelector('[data-template="google-maps-block"]');

        if(!this.root) {
            return;
        }

        this.map;
        this.initMap();
    }


  
    async initMap() {

        const position = { lat: 49.872816, lng: 8.650423 };
        const { Map } = await google.maps.importLibrary("maps");
        // const { AdvancedMarkerView } = google.maps.importLibrary("marker");

        this.map = new Map(document.getElementById("map"), {
            zoom: 14,
            center: position,
        });
    }
    
}

