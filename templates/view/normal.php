<style>
    .ahsContent {
        display:none !important;
    }
    #map {
        height: 425px;
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
    /* driving directions */
    var map;
    var directionsDisplay;
    function toggleDirections(elem){
        //console.log($('#'+elem).attr('wpgm_addr_field'));
        var address=$('#'+elem).attr('wpgm_addr_field');
        $('#wpgmza_input_to').val(address);
        $('.ds_wpgm_directions').toggle('fast');
    }
    function wpgmza_reset_directions() {
        currentDirections = null;
        directionsDisplay.setMap(null);
        var currentDirections = null;
        $("#wpgmza_input_from").val('');
        $("#wpgmaps_directions_editbox").show();
        $("#directions_panel").hide();
        $("#directions_panel").html('');
        $("#wpgmaps_directions_notification").hide();
        $("#wpgmaps_directions_reset").hide();
        $("#wpgmaps_directions_notification").html('Fetching Directions..');
      }
    
        $('#wpgmza_show_options').on('click',function() {
          $("#wpgmza_options_box").show();
          $("#wpgmza_show_options").hide();
          $("#wpgmza_hide_options").show();
        });
        $('#wpgmza_hide_options').on('click',function() {
              $("#wpgmza_options_box").hide();
              $("#wpgmza_show_options").show();
              $("#wpgmza_hide_options").hide();
          });
    function calcRoute(start,end,travelmode,avoidtolls,avoidhighways,avoidferries) {
        var request = {
            origin:start,
            destination:end,
            provideRouteAlternatives: true,
            travelMode: google.maps.DirectionsTravelMode[travelmode],
            avoidHighways: avoidhighways,
            avoidTolls: avoidtolls,
            avoidTolls: avoidferries
        };

        dirflg = "c";

        if (travelmode === "DRIVING") { dirflg = "d"; }
        else if (travelmode === "WALKING") { dirflg = "w"; }
        else if (travelmode === "BICYCLING") { dirflg = "b"; }
        else if (travelmode === "TRANSIT") { dirflg = "t"; }
        else { dirflg = "c"; }


        
        directionsService = new google.maps.DirectionsService();
        var currentDirections = null;
        var oldDirections = [];

        $("#wpgmza_input_to").css("border","");
        $("#wpgmza_input_from").css("border","");
        $("#wpgmaps_directions_notification").html('Fetching Directions..');


        directionsDisplay = new google.maps.DirectionsRenderer({
             'map': map,
             'preserveViewport': true,
             'draggable': true
         });
        directionsDisplay.setPanel(document.getElementById("directions_panel"));


        google.maps.event.addListener(directionsDisplay, 'directions_changed',
          function() {
              if (currentDirections) {
                  oldDirections.push(currentDirections);
              }
              currentDirections = directionsDisplay.getDirections();
              $("#directions_panel").show();
              $("#wpgmaps_directions_notification").hide();
              $("#wpgmaps_directions_reset").show();
          });


        directionsService.route(request, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else if (status === "ZERO_RESULTS") {
                $("#wpgmaps_directions_editbox").show("fast");
                wpgmza_reset_directions();
                $("#wpgmaps_directions_notification").show();
                $("#wpgmaps_directions_notification").html("No results found.");

            } else if (status === "NOT_FOUND") {
                $("#wpgmaps_directions_editbox").show("fast");
                wpgmza_reset_directions();
                $("#wpgmaps_directions_notification").show();
                $("#wpgmaps_directions_notification").html("No results found.");
                if (typeof response.geocoded_waypoints[0] !== "undefined" && typeof response.geocoded_waypoints[0].geocoder_status !== "undefined" && response.geocoded_waypoints[0].geocoder_status == "ZERO_RESULTS") {
                    $("#wpgmza_input_from").css("border","1px solid red");
                }
                if (typeof response.geocoded_waypoints[1] !== "undefined" && typeof response.geocoded_waypoints[1].geocoder_status !== "undefined" && response.geocoded_waypoints[1].geocoder_status == "ZERO_RESULTS") {
                    $("#wpgmza_input_to").css("border","1px solid red");
                }

            }
        });

        $("#wpgmaps_print_directions").attr('href','https://maps.google.com/maps?saddr='+encodeURIComponent(start)+'&daddr='+encodeURIComponent(end)+'&dirflg='+dirflg+'&om=1');

    }
    $("body").on("click", ".wpgmaps_get_directions", function() {

     var avoidtolls = $('#wpgmza_tolls').is(':checked');
     var avoidhighways = $('#wpgmza_highways').is(':checked');
     var avoidferries = $('#wpgmza_ferries').is(':checked');


     var wpgmza_dir_type = $("#wpgmza_dir_type").val();
     var wpgmaps_from = $("#wpgmza_input_from").val();
     var wpgmaps_to = $("#wpgmza_input_to").val();

     if (wpgmaps_from === "" || wpgmaps_to === "") { alert(wpgmaps_lang_error1); }
     else { calcRoute(wpgmaps_from,wpgmaps_to,wpgmza_dir_type,avoidtolls,avoidhighways,avoidferries); $("#wpgmaps_directions_editbox").hide("slow"); $("#wpgmaps_directions_notification").show("slow");  }
});
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
        map = new google.maps.Map(google_map_div, {
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
            }
            displayMarkers();
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
            // For loop that runs through the info on addresses making it possible to createMarker function to create the markers
            for (var i=0; i<addresses.length; i++){
                var id=addresses[i]['ID'];
                var lat=addresses[i]['Latitude'];
                var lng=addresses[i]['Longitude'];
                var latlng=new google.maps.LatLng(lat,lng);
                var title=addresses[i]['Title'];
                var address=addresses[i]['Address'];
                var phone_number=addresses[i]['Phone Number'];
                var status=addresses[i]['Status'];
                var capacity=addresses[i]['Capacity'];
                var services=addresses[i]['Services'];
                createMarker(id,latlng,title,address,phone_number,status,capacity,services,lat,lng);
                // Marker’s Lat. and Lng. values are added to bounds variable
                bounds.extend(latlng); 
            }
            // Finally the bounds variable is used to set the map bounds
            // with API’s fitBounds() function
            map.fitBounds(bounds);
        }
        // This function creates each marker
        function createMarker(id,latlng,title,address,phone_number,status,capacity,services,lat,lng){
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
                $('.ds_wpgm_directions').hide('slide');
                setInfoContent(id,title,address,phone_number,status,capacity,services,lat,lng);
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
        function setInfoContent(id,title,address,phone_number,status,capacity,services,lat,lng){
            $(".ds_wpgm_title").html(title);
            $(".ds_wpgm_address").html('<span class="ds_wpgm_li">Address:</span> '+address);
             //map location template
                var description_template=`<div class="ds_wpgm_phone"><span class="ds_wpgm_li">Phone:</span> <p class="wpgmza_iw_address_p">{phone}</p></div>
                                            <div class="ds_wpgm_capacity"><span class="ds_wpgm_li">Capacity:</span> <p class="wpgmza_iw_address_p">{capacity}</p></div>
                                            <div class="ds_wpgm_status"><span class="ds_wpgm_li">Status:</span> <p class="wpgmza_iw_address_p">{status}</p></div>
                                            <hr>
                                            <h4>Shelter Services</h4>
                                            <div class="shelter-services">{shelter_services}</div>`;
                var open24_template=`<div class="shelter-service">
                                        <img src="/wp-content/uploads/open-24-hours-signboard.png" alt="open 24 hours" />
                                        <h6>Open 24 Hours</h6>
                                            </div>`;
                var firstaid_template=`<div class="shelter-service">
                                        <img src="/wp-content/uploads/nurse-head.png" alt="first aid" />
                                        <h6>First Aid</h6>
                                            </div>`;
                var snacks_template=`<div class="shelter-service">
                                        <img src="/wp-content/uploads/bananas.png" alt="free snacks" />
                                        <h6>Free Snacks</h6>
                                            </div>`;
                var button_template=`<a class="wpgmza_button wpgmza_left wpgmza_directions_button wpgmza_gd" gps="{lat},{lng}" href="javascript:toggleDirections({id});" id="{id}" wpgm_addr_field="{address}">Get Directions</a>`;
                var shelter_services="";

                if(Array.isArray(services)){
                    if(services.indexOf('open_twentyfour')>=0){
                        shelter_services+=open24_template;
                    }
                    if(services.indexOf('first_aid')>=0){
                        shelter_services+=firstaid_template;
                    }
                    if(services.indexOf('snacks')>=0){
                        shelter_services+=snacks_template;
                    }
                }
                
                if(status=="full"){
                    var new_status='<span class="text-danger">FULL</span>';
                }else{
                    var new_status='SPACE AVAILABLE!';
                }
                //description
                var replace = ["{phone}","{capacity}","{status}","{shelter_services}"];
                var replace_with = [phone_number,capacity,new_status,shelter_services];
                var description=description_template.replaceArray(replace,replace_with);
                $(".ds_wpgm_description").html(description);
                //button
                var replace_button = ["{lat}","{lng}","{id}","{id}","{address}"];
                var replace_with_button = [lat,lng,id,id,address];
                var dir_button=button_template.replaceArray(replace_button,replace_with_button);
                $(".ds_wpgm_button").html(dir_button);
        }
    }
    //utility function to replace content using two arrays
        String.prototype.replaceArray = function(find, replace) {
            var replaceString = this;
            for (var i = 0; i < find.length; i++) {
                replaceString = replaceString.replace(find[i], replace[i]);
            }
            return replaceString;
        }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA15oypl4nlP5eu4Rq9S-UMrYCuBNny9C8&callback=initMap"></script>