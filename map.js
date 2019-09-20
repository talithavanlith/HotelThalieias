//marker = https://pixabay.com/en/icon-position-map-location-icon-2073973//

var map = (function(){
    "use strict";
    var map, hotel, apollon, zorbas, spartacos, church, winery, lookout;

    var pub = {};

    function onMapClick(e) {
        alert('You clicked the map at ' + e.latlng);
    }

    function centreMap() {
        var markerLocation, markerBounds;

        if (this.textContent === 'Spartacos Pizzeria:') {
            markerLocation = [spartacos.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else if (this.textContent === 'Apollon Restaurant:') {
            markerLocation = [apollon.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else if (this.textContent === 'Senor Zorba Cafe Bar:') {
            markerLocation = [zorbas.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else if (this.textContent === 'Epar Lookout:') {
            markerLocation = [lookout.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else if (this.textContent === 'Santo Winery:') {
            markerLocation = [winery.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else if (this.textContent === 'Ekklisia Agia Marina Church:') {
            markerLocation = [church.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else {
            markerLocation = [hotel.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }
    }

    function showFoodMarkers() {
        var markerLocation, markerBounds;

        spartacos = L.circle([36.386314, 25.430474],
            {
                radius: 30,
                color: 'orange',
                fillColor: 'orange',
                fillOpacity: 0.5
            }).addTo(map);  // checked



        apollon = L.circle( [36.385688, 25.429037],
            { radius: 30,
                color: 'orange',
                fillColor: 'orange',
                fillOpacity: 0.5 } ).addTo(map);
        zorbas = L.circle( [36.390728, 25.438982],
            { radius: 30,
                color: 'orange',
                fillColor: 'orange',
                fillOpacity: 0.5 } ).addTo(map);
    }

    function showActivityMarkers() {
        var markerLocation, markerBounds;

        church = L.circle( [36.380609, 25.429332],
            { radius: 30,
                color: 'orange',
                fillColor: 'orange',
                fillOpacity: 0.5 } ).addTo(map);
        lookout = L.circle( [36.391384, 25.432733],
            { radius: 30,
                color: 'orange',
                fillColor: 'orange',
                fillOpacity: 0.25 } ).addTo(map);
        winery = L.circle( [36.387532, 25.436509],
            { radius: 30,
                color: 'orange',
                fillColor: 'orange',
                fillOpacity: 0.25 } ).addTo(map);
    }

    pub.setup = function() {
        var headings, h;

        map = L.map('map').setView([36.387761, 25.431633], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                maxZoom: 18,
                attribution: 'Map data &copy; ' +
                    '<a href="http://www.openstreetmap.org/copyright">' +
                    'OpenStreetMap contributors</a> CC-BY-SA'
            }).addTo(map);

        map.on('click', onMapClick);

        showFoodMarkers();

        $("#food").click(function () {

            if($("#food").is(':checked')){
                showFoodMarkers();
            }else{
                spartacos.remove();
                apollon.remove();
                zorbas.remove();

            }
        });

        showActivityMarkers();

        $("#activity").click(function () {

            if($("#activity").is(':checked')){
                showActivityMarkers();
            }else{
                lookout.remove();
                church.remove();
                winery.remove();

            }
        });


        hotel = L.marker([36.387761, 25.431633]).addTo(map);


        spartacos.bindPopup("<img class=\"popup_img\" src=\"images/pizza.jpg\" alt=\"spartacos\" width='175px'><div> <p class='popup-text'><b>Spartacos Pizzeria:</b> <br>Address: Ormos Athinios 857 00<br> Phone: +30 3929 665367</p></div>");
        apollon.bindPopup("<img class=\"popup_img\" src=\"images/cocktail.jpg\" alt=\"apollon\" width='170px'><div> <p class='popup-text'><b>Apollon Restaurant:</b> <br>Address: Ormos Athinios 827 00<br> Phone: +30 2919 091029</p></div>");
        zorbas.bindPopup("<img class=\"popup_img\" src=\"images/cafe.jpg\" alt=\"zorbas\" width='160px'><div> <p class='popup-text'><b>Senor Zorba Cafe Bar:</b> <br>Address: Pirgos Thira 547 00<br> Phone: +30 2314 902910</p></div>");

        hotel.bindPopup("<img class=\"popup_img\" src=\"images/hotel.jpg\" alt=\"hotel\" width='200px'><div> <h2 class='popup-head'>Hotel Thaleoas</h2> <p class='popup-text'>Epar.Od. Ormou Athiniou<br> No. 750 00 <br> Phone: +30 9001 277227</p></div>");

        winery.bindPopup("<img class=\"popup_img\" src=\"images/wine.jpg\" alt=\"wine\" width='140px'><div> <p class='popup-text'><b>Santo Winery:</b> <br>Address: Thira 947 00<br> Phone: +30 8371 117282</p></div>");
        church.bindPopup("<img class=\"popup_img\" src=\"images/church.jpg\" alt=\"church\" width='180px'><div> <p class='popup-text'><b>Ekklisia Agia Marina Church:</b> <br>Address: Megalochori 987 00<br> Phone: +30 9800 108256</p></div>");
        lookout.bindPopup("<img class=\"popup_img\" src=\"images/lookout.jpg\" alt=\"lookout\" width='170px'><div> <p class='popup-text'><b>Epar Lookout:</b> <br>Address: Ormou Athiniou 537 00<br> Phone: +30 7284 111920</p></div>");

        $(".place").click(centreMap).css('cursor', 'pointer');
        //headings[h].style.cursor = "pointer";
    };



    return pub;

}());


$(document).ready(map.setup);