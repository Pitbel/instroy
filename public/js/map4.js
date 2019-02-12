$(document).ready(function () {
	'use strict';

	if ($('#map-leaflet').length) {
		var map = L.map('map-leaflet', {
			zoom: 12,
			maxZoom: 20,
			tap: false,
			gestureHandling: true,
			center: [40.925372, -74.27654]
		});

		var marker_cluster = L.markerClusterGroup();

		var Hydda_Full = L.tileLayer('https://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png', {
			scrollWheelZoom: false,
			attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		$.ajax('js/markers.json', {
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
						'<a href="properties-details.html">' +
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

});