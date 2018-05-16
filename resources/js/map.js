var Map = (function () {
    'use strict';

    function initMap() {

        var $map = $('#leaflet-map'),
            accessToken = $map.data('access-token'),
            lat = $map.data('lat'),
            lng = $map.data('lng'),
            popupContent = $map.data('popup');

        var mymap = L.map('leaflet-map', {
            scrollWheelZoom: false
        }).setView([lat, lng], 13);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + accessToken, {
            attribution: '',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: accessToken
        }).addTo(mymap);

        var divIcon = L.divIcon({
            html: '',
            iconSize: [60, 60],
            iconAnchor: [30, 60],
            popupAnchor: [0, -70]
        });

        var marker = L.marker([lat, lng], {icon: divIcon}).addTo(mymap);

        marker.bindPopup(popupContent).openPopup();
    }

    return {
        initMap: initMap
    }

})();