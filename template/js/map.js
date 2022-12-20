let map;

function initMap() {
    const mapOptions = {
        zoom: 8,
        center: {
            lat: 49.84456111758925,
            lng: 24.027335399785493
        },
    };

    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    const marker = new google.maps.Marker({
        position: {
            lat: 49.84456111758925,
            lng: 24.027335399785493
        },
        map: map,
    });
    const infowindow = new google.maps.InfoWindow({
        content: "<p>Marker Location:" + marker.getPosition() + "</p>",
    });

    google.maps.event.addListener(marker, "click", () => {
        infowindow.open(map, marker);
    });
}