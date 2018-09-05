/**
 * Created by LUIGGI on 6/11/2015.
 */
var map, marker, currentLat, currentLon, originLat, originLon, destinyLat, destinyLon,  geocoder, map2, infoWindow, address, origen, destino, p1,p2;
var marker1, marker2;
var poly, geodesicPoly;
var directionsService;
var directionsDisplay;
var distancia;
var duracion;

function initAutocomplete() {

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        //center: {lat:currentLat,lng:currentLon}
        center: {lat: -34.397, lng: 150.644}
    });


    geocoder = new google.maps.Geocoder;

    infoWindow = new google.maps.InfoWindow({map: map});

    mylocation();
    Buscador();
   /* map2 = new google.maps.Map(document.getElementById('map2'), {
        zoom: 11,
        center: {lat: -34.397, lng: 150.644}

    });*/

    var rendererOptions={
        map:map
    };
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

}

function mylocation(){
    //Localizacion actual
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var LatLng = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            currentLat = LatLng.lat;
            currentLon = LatLng.lng;
            ReverseGeocoding(currentLat,currentLon);

            infoWindow.setPosition(LatLng);
            infoWindow.setContent(address);

            map.setCenter(LatLng);
           // map2.setCenter(LatLng);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    }
}
// marker.setIcon('https://dl.dropboxusercontent.com/u/20056281/Iconos/male-2.png');


function Buscador() {
    // Create the search box and link it to the UI element.
    var input = document.getElementById('searchmap');
    var input2 = document.getElementById('searchmap1');
    var searchBox = new google.maps.places.SearchBox(input);
    var searchBox2 = new google.maps.places.SearchBox(input2);

    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
        searchBox2.setBounds(map.getBounds());
    });

    var markers = [];
    // Origen
    searchBox.addListener('places_changed', function () {
        origen = document.getElementById('searchmap');
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            /*var pos = markers.getPosition();
             originLat = pos.lat;
             originLon = pos.lng;*/


            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
        //google.maps.event.addListener(map, 'bounds_changed', function() {
        var pos = map.getCenter().toUrlValue();
        var coordsplit = pos.split(',');
        originLat = coordsplit[0];
        originLon = coordsplit[1];
        document.getElementById("check2").style.visibility='visible';

        //  alert(originLat+" cordenada de latitud y longitud "+originLon);
        //SplitBounds(pos,originLat,originLon);

        //});
        //descripcion posicion origen

        p1 = new google.maps.LatLng(originLat, originLon);
        /*navigator.geolocation.getCurrentPosition(function (position) {
         var LatLng = {
         lat: position.coords.latitude,
         lng: position.coords.longitude
         };


         //alert(originLat+" y "+originLon);
         // alert(/*originLat+' y '+originLonpos);
         //ReverseGeocoding(originLat, originLon);

         });*/
    });

    //Destino
    searchBox2.addListener('places_changed', function () {
        destino = document.getElementById('searchmap1');
        var places = searchBox2.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
        //google.maps.event.addListener(map, 'bounds_changed', function() {
        var pos2 = map.getCenter().toUrlValue();
        var coordsplit2 = pos2.split(',');
        destinyLat = coordsplit2[0];
        destinyLon = coordsplit2[1];
        document.getElementById("check").style.visibility='visible';
       // alert(destinyLat+" cordenada de latitud y longitud "+destinyLon);
        p2 = new google.maps.LatLng(destinyLat, destinyLon);
        //});
        /*navigator.geolocation.getCurrentPosition(function (position) {
         var LatLng = {
         lat: position.coords.latitude,
         lng: position.coords.longitude
         };


         alert(destinyLat+" y "+destinyLon);
         /*ReverseGeocoding(destinyLat,destinyLon);
         infoWindow.setPosition(LatLng);
         infoWindow.setContent(address);
         });*/
    });
}

function ReverseGeocoding(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    // This is making the Geocode request
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results);
            address = (results[0].formatted_address);
            //infoWindow.setContent(address);
        }
    });
}

/*   marker = new google.maps.Marker({
 position:{
 lat: currentLat,
 lng: currentLon
 },
 map: map,
 draggable: true,
 animation: google.maps.Animation.BOUNCE
 });
 marker.setIcon('https://dl.dropboxusercontent.com/u/20056281/Iconos/male-2.png');
 google.maps.event.addListener(marker, 'dragend', positionchanged );
 }*/
/*document.getElementById('submit').addEventListener('click', function() {
 });*/





//CARRUSEL SOLICITUD SERVICIO
$(document).ready(function() {
    $('.carousel').carousel({
        interval: false
    })
});

/*function Dragride(){
 map2.setZoom(8);
 marker1 = new google.maps.Marker({
 map: map2,
 draggable: true,
 position: {lat: originLat, lng: originLon}

 });

 marker2 = new google.maps.Marker({
 map: map2,
 draggable: true,
 position: {lat: destinyLat, lng: destinyLon}
 });

 var bounds = new google.maps.LatLngBounds(
 marker1.getPosition(), marker2.getPosition());
 bounds.extend(p1);
 //bounds.extend(p2);
 map2.fitBounds(bounds);

 google.maps.event.addListener(marker1, 'position_changed', update);
 google.maps.event.addListener(marker2, 'position_changed', update);

 poly = new google.maps.Polyline({
 strokeColor: '#FF0000',
 strokeOpacity: 1.0,
 strokeWeight: 3,
 map: map2
 });

 geodesicPoly = new google.maps.Polyline({
 strokeColor: '#CC0099',
 strokeOpacity: 1.0,
 strokeWeight: 3,
 geodesic: true,
 map: map2
 });

 update();
 }

 function update() {
 var path = [marker1.getPosition(), marker2.getPosition()];
 poly.setPath(path);
 geodesicPoly.setPath(path);
 //var heading = google.maps.geometry.spherical.computeHeading(path[0], path[1]);
 /*document.getElementById('heading').value = heading;
 document.getElementById('origin').value = path[0].toString();
 document.getElementById('destination').value = path[1].toString();*/
//}


//Calcula distancia entre 2 puntos
function calcDistance(){
    /*p1 = new google.maps.LatLng(originLat, originLon);
     p2 = new google.maps.LatLng(destinyLat, destinyLon);*/
    return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
        origin: document.getElementById('searchmap').value,
        destination: document.getElementById('searchmap1').value,
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC
    }, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            document.getElementById('distancia').value = (response.routes[0].legs[0].distance.value)/1000 + " Km";
            document.getElementById('distancia2').value = (response.routes[0].legs[0].distance.value)/1000 + " Km";


            var distanciaplit = document.getElementById('distancia').value.split(' ');
            distancia = distanciaplit[0];
            document.getElementById('monto').value = distanciaplit[0]*200;
            document.getElementById('monto2').value = distanciaplit[0]*200;






            document.getElementById('origen').value = document.getElementById('searchmap').value;;
            document.getElementById('origen2').value = document.getElementById('searchmap').value;;

            document.getElementById('reforigen').value = document.getElementById('reforigen1').value;;
            document.getElementById('reforigen2').value =  document.getElementById('reforigen1').value;;

            document.getElementById('destino').value =  document.getElementById('searchmap1').value;;
            document.getElementById('destino2').value =  document.getElementById('searchmap1').value;;

            document.getElementById('refdestino').value =  document.getElementById('refdestino1').value;;
            document.getElementById('refdestino2').value =  document.getElementById('refdestino1').value;;

            document.getElementById('servicio').value = document.getElementById('tiposervicio').value;;


        } else {
            window.alert('Fallo al solicitar la direccion ' + status);
        }
    });
}


function informacion(){
    var origin, reforigin, destiny, refdestiny, service;

    calculateAndDisplayRoute(directionsService,directionsDisplay);
    //DistanceandDuration();
    /*var rad = function(x) {
     return x * Math.PI / 180;
     };

     var calcular = function calc(p1, p2) {
     var R = 6378137; // Earth’s mean radius in meter
     var dLat = rad(p2.lat() - p1.lat());
     var dLong = rad(p2.lng() - p1.lng());
     var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
     Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) *
     Math.sin(dLong / 2) * Math.sin(dLong / 2);
     var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
     var d = R * c;
     return d; // returns the distance in meter
     };*/

    //document.getElementById('distancia').value = distancia+' Km';

    //alert(calcDistance());


}
/*
 $(document).ready(function(){
 $(document).mousemove(function(e){
 TweenLite.to($('#tf-home'),
 .5,
 { css:
 {
 backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
 }
 });
 });
 });*/
