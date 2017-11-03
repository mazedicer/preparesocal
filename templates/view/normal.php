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
            center: {lat: -34.397, lng: 150.644}
        });
        map.setOptions({styles:map_style});
                        var geocoder = new google.maps.Geocoder();
                        geocodeAddresses(geocoder,map);
                       }

                       function geocodeAddresses(geocoder, resultsMap) {
            for(var i=0;i<addresses.length;i++){
                geocoder.geocode({'address': addresses[i]}, function(results, status) {
                    if (status === 'OK') {
                        resultsMap.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: resultsMap,
                            position: results[0].geometry.location,
                            icon: '../wp-content/uploads/arc-map-icon.png'
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                    console.log(marker.length);
                });
            }
        }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA15oypl4nlP5eu4Rq9S-UMrYCuBNny9C8&callback=initMap"></script>