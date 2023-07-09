let locations;

function initAllMaps() {
    for (let id in locations) {
        initMap(id, locations[id].lat, locations[id].lng);
    }
}

function initMap(id, lat, lng) {
    let mapElement = document.getElementById("map-" + id);
    let location = {lat: lat, lng: lng};

    let map = new google.maps.Map(mapElement, {
        zoom: 13,
        center: location,
    });

    let marker = new google.maps.Marker({
        position: location,
        map: map,
        title: 'Location',
    });
}
