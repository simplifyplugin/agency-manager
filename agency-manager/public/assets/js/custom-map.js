function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: 0, lng: 0}
    });

    var bounds = new google.maps.LatLngBounds();

    agencyData.markers.forEach(function(marker) {
        var position = new google.maps.LatLng(marker.lat, marker.lng);
        bounds.extend(position);

        new google.maps.Marker({
            position: position,
            map: map,
            title: marker.title
        });
    });

    map.fitBounds(bounds);
}

google.maps.event.addDomListener(window, 'load', initMap);
