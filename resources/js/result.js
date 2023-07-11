let locations;

function initAllMaps() {
    for (let i = 0; i < locations.length; i++) {
        initMap(locations[i].id, locations[i].lat, locations[i].lng);
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

window.onload = function() {
    initAllMaps();
}
