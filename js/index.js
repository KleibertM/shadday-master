let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -11.991999,  lng: -77.070442 },
    zoom: 8,
    });
}

window.initMap = initMap;