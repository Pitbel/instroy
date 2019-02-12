var map;

$(document).ready(function () {
    'use strict';

    if ($('#map-leaflet').length) {
        map = L.map('map-leaflet', {
            zoom: 11,
            maxZoom: 18,
            tap: true,
            gestureHandling: true,
            center: [50.59, 36.58]
        });

        var marker_cluster = L.markerClusterGroup();

        var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            scrollWheelZoom: false,
            subdomains:['mt0','mt1','mt2','mt3'],
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.ajax('ajax/getJsonDataMainMap', {
            success: function (markers) {

                $.each(markers, function (index, value) {
                    var icon = L.divIcon({
                        html: value.icon,
                        iconSize: [50, 50],
                        iconAnchor: [50, 50],
                        popupAnchor: [-20, -42]
                    });

                    var marker = L.marker(value.center, {
                        icon: icon
                    }).addTo(map);

                    marker.bindPopup(
                        '<div class="listing-window-image-wrapper">' +
                        '<a href="/catalog/item/'+value.land_id+'/view">' +
                        '<div class="listing-window-image" style="background-image: url(' + value.image + ');"></div>' +
                        '<div class="listing-window-content">' +
                        '<div class="info">' +
                        '<h2>' + value.title + '</h2>' +
                        '<p>' + value.desc + '</p>' +
                        '<h3>' + value.price + '</h3>' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</div>'
                    );

                    marker_cluster.addLayer(marker);
                });

                map.addLayer(marker_cluster);
            }
        });

    }

    $('.map-filter').change(function() {
        marker_cluster.clearLayers();
        var region_id = $('.map-filter select').val();

        $.ajax({
            url: 'ajax/getJsonDataMainMap',
            data: {region_id: region_id},
            success: function (markers) {

                $.each(markers, function (index, value) {
                    var icon = L.divIcon({
                        html: value.icon,
                        iconSize: [50, 50],
                        iconAnchor: [50, 50],
                        popupAnchor: [-20, -42]
                    });

                    var marker = L.marker(value.center, {
                        icon: icon
                    }).addTo(map);

                    marker.bindPopup(
                        '<div class="listing-window-image-wrapper">' +
                        '<a href="/catalog/item/'+value.land_id+'/view">' +
                        '<div class="listing-window-image" style="background-image: url(' + value.image + ');"></div>' +
                        '<div class="listing-window-content">' +
                        '<div class="info">' +
                        '<h2>' + value.title + '</h2>' +
                        '<p>' + value.desc + '</p>' +
                        '<h3>' + value.price + '</h3>' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</div>'
                    );

                    marker_cluster.addLayer(marker);
                });

                map.addLayer(marker_cluster);
            }
        });
    });
});