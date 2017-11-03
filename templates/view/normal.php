<style>
    .ahsContent {
        display:none !important;
    }
    #map {
        height: 400px;
    }
    div.section-googlemap {
        padding-left:0px;
        padding-right:0px;
    }
</style>
{ahs}
<div class="bodyContent">
    <div class="container normalPage" style="{mainContentCSS}">
        {breadcrumbs}
        {defaultContentEditor}
    </div>
    <section></section>
    {wpgm}
    {sections}
</div>
<script>
    $(document).ready(function() {
        //fires every time window is resized
        window.addEventListener('resize', function (){
            shelterMapHeaderTitle();
        });
        //shelter-map header title
        shelterMapHeaderTitle();
        function shelterMapHeaderTitle(){
            var shelter_header=$('div.header-overlay');
            shelter_header.css("padding-right", "80px");
            var shelter_hero=$('.ahsBuild');
            var dimh=(shelter_hero.height()/2)+(shelter_header.height());
            var winw=$(window).width();
            var dimw=(winw-340)/2;
            if($(window).width()<380){
                shelter_header.css("padding-right", "40px");
                var dimhb=(shelter_hero.height()/7)+(shelter_header.height());
                shelter_header.offset({top:dimhb,left:dimw});
            }else if($(window).width()<541){
                var dimhb=(shelter_hero.height()/7)+(shelter_header.height());
                shelter_header.offset({top:dimhb,left:dimw});
            }else if($(window).width()<769){
                var dimhc=(shelter_hero.height()/2)+(shelter_header.height());
                var dimwc=(winw-640)/2;
                shelter_header.offset({top:dimhc,left:dimwc});
            }else{
                shelter_header.offset({top:dimh});
            }
        }
    });
</script>
<script>
    ////////////////////////////////////////////////////////////////////
    // https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple
    ////////////////////////////////////////////////////////////////////

    function initMap() {
        var map_style=[ { "featureType": "administrative", 
                         "elementType": "labels", 
                         "stylers": [ { "visibility": "off" } ] }, 
                       { "featureType": "administrative.locality", 
                        "elementType": "geometry", 
                        "stylers": [ { "color": "#000000" }, 
                                    { "visibility": "on" }, 
                                    { "weight": 2 } ] }, 
                       { "featureType": "administrative.locality", 
                        "elementType": "geometry.stroke", 
                        "stylers": [ { "color": "#000000" }, 
                                    { "visibility": "on" }, 
                                    { "weight": 1.5 } ] }, 
                       { "featureType": "landscape", 
                        "stylers": [ { "visibility": "off" } ] }, 
                       { "featureType": "poi", 
                        "elementType": "labels.text", 
                        "stylers": [ { "visibility": "off" } ] }, 
                       { "featureType": "road", 
                        "stylers": [ { "visibility": "off" } ] }, 
                       { "featureType": "road", 
                        "elementType": "labels", 
                        "stylers": [ { "visibility": "off" } ] }, 
                       { "featureType": "road", 
                        "elementType": "labels.icon", 
                        "stylers": [ { "visibility": "off" } ] }, 
                       { "featureType": "transit", 
                        "stylers": [ { "visibility": "off" } ] }, 
                       { "featureType": "water", 
                        "elementType": "labels.text", 
                        "stylers": [ { "visibility": "off" } ] } ];
        var google_map_div=document.getElementById('map');
        var map = new google.maps.Map(google_map_div, {
            zoom: 8,
            minZoom: 4,
            maxZoom: 10,
            center: {lat: 32.569, lng: -116.954}
        });
        map.setOptions({styles:map_style});
        //map.setCenter(results[0].geometry.location);
        //icon: '../wp-content/uploads/arc-map-icon.png'
        geoCodeAddresses(addresses, function(results) {
            // Do something after getting done with Geocoding of multiple addresses
            for(var i = 0; i < results.length; i++) {
                //console.log(results[i].lat()+" "+results[i].lng());
                addresses[i]['Latitude']=results[i].lat();
                addresses[i]['Longitude']=results[i].lng();
                displayMarkers();
            }
        });
        function geoCodeAddresses(addresses, callback) {
            var coords = [];
            for(var i = 0; i < addresses.length; i++) {
                var address=addresses[i]['Address'];
                var geocoder = new google.maps.Geocoder();
                if (geocoder) {
                    geocoder.geocode({'address':address}, function (results, status) {
                        if (status === 'OK') {
                            coords.push(results[0].geometry.location);
                            if(coords.length == addresses.length) {
                                if( typeof callback == 'function' ) {
                                    callback(coords);
                                }
                            }
                        } 
                        else {
                            throw('No results found: ' + status);
                        }
                    });
                }
            }
        }
        // This function will iterate over markersData array
        // creating markers with createMarker function
        function displayMarkers(){
            // this variable sets the map bounds and zoom level according to markers position
            var bounds = new google.maps.LatLngBounds();
            // For loop that runs through the info on markersData making it possible to createMarker function to create the markers
            for (var i=0; i<addresses.length; i++){
                var latlng=new google.maps.LatLng(addresses[i]['Latitude'], addresses[i]['Longitude']);
                var title = addresses[i]['Title'];
                var address = addresses[i]['Address'];
                createMarker(latlng,title,address);
                // Marker’s Lat. and Lng. values are added to bounds variable
                bounds.extend(latlng); 
            }
            // Finally the bounds variable is used to set the map bounds
            // with API’s fitBounds() function
            map.fitBounds(bounds);
        }
        // This function creates each marker
        function createMarker(latlng, title, address){
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                title: title,
                icon: '../wp-content/uploads/arc-map-icon.png'
            });
            // This event expects a click on a marker
            // When this event is fired the infowindow content is created
            // and the infowindow is opened
            google.maps.event.addListener(marker, 'click', function() {
                console.log(title+" "+address);
                /* Variable to define the HTML content to be inserted in the infowindow
                var iwContent = '<div id="iw_container">' +
                    '<div class="iw_title">' + name + '</div>' +
                    '<div class="iw_content">' + address1 + '<br />' +
                    address2 + '<br />' +
                    postalCode + '</div></div>';
                // including content to the infowindow
                infoWindow.setContent(iwContent);
                // opening the infowindow in the current map and at the current marker location
                infoWindow.open(map, marker);*/
            });
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOURKEY&callback=initMap"></script>