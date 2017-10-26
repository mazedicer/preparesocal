/**
 * Child JS.
 *
 * Child JS scripts.
 *
 * @since 1.0.0
 */
$(document).ready(function() {
    //GLOBAL HEADER DROPDOWN
    var pathname = window.location.pathname;
    $(".nav-link:last-child").on("click",function() {
        //show-hide dropdown
        $(".dropdown-menu").toggle();
        $(".material-icons.active-menu, .material-icons.inactive-menu").toggle();

        //position dropdown
        var parent_width=$(this).width();
        var parent_left=$(this).offset().left;
        var dropdown_menu_half=$(".dropdown-menu").width()/2;
        var dropdown_menu_left=$(".dropdown-menu").offset().left;
        var position = (parent_left+parent_width)-dropdown_menu_half-16;
        //if screen is <541
        if($(window).width()<541){
            position -= 75;
            $(".nav-link:last-child .dropdown-menu .dropdown-triangle").css({left:"78%"});
        }
        $(".dropdown-menu").offset({"left":position});
        //alignment tests
        //var $el=$("#second_navbar_container");
        //var bottom=$el.offset().top+$el.outerHeight(true);
        //var the_width=$(this).find("div").width();
        //var this_width=$(this).width();
        //var width=parseInt((the_width-this_width)/2);
        //console.log("parent_width="+parent_width+" parent_left="+parent_left+" dropdown_menu_half="+dropdown_menu_half+" dropdown_menu_left="+dropdown_menu_left);
    });
    //DROPDOWN SUB-MENU LINKS
    $(".dropdown-item").on("click",function(e){
        e.stopPropagation();
    });
    if($(".dropdown-item.has-child-links").length > 0){
        $(".dropdown-item.has-child-links").on("click",function(){
            $(this).find(".active-menu").toggle();
            $(this).find(".inactive-menu").toggle();
            var id = $(this).attr("id");
            $("."+id).toggle();
        });
    }

    //RESPONSIVE FIXES

    //fires every time the page is loaded
    main();

    //fires every time window is resized
    window.addEventListener('resize', function (){
        main();
    });

    //fires if window width is > 765 and window is scrolled
    if(pathname.indexOf('home')>0 || pathname.length<2){
        window.addEventListener('scroll',animateMe);
        var cim1={elem:".cim1",control_prop:"opacity"};
        var cim2={elem:".cim2",control_prop:"opacity"};
        var cim3={elem:".cim3",control_prop:"opacity"};
        var flipcard1={elem:".mc-flipcard1",control_prop:"transformx"};
        var flipcard2={elem:".mc-flipcard2",control_prop:"transformy"};
        var flipcard3={elem:".mc-flipcard3",control_prop:"transformx"};
        var flipcard4={elem:".mc-flipcard4",control_prop:"transformy"};
        var flipcard5={elem:".mc-flipcard5",control_prop:"transformx"};
        var flipcard6={elem:".mc-flipcard6",control_prop:"transformy"};
        var flipcard7={elem:".card-block6",control_prop:"transformxb"};
        var count_it={elem:".countup",control_prop:"count"};
        function animateMe(){
            var animatable=[cim1,cim2,cim3,flipcard1,flipcard2,flipcard3,flipcard4,flipcard5,flipcard6,flipcard7,count_it];
            for(var i=0;i<animatable.length;i++){
                animateElement(animatable[i]);
            }
        }
        //opacity & position animation
        function animateElement(animate_me){
            var css_options={};
            var css_options_start=animate_me.css_options_start;
            var css_options_end=animate_me.css_options_end;
            var top_pos=$(animate_me.elem).offset().top;
            var control_prop=animate_me.control_prop;
            if($(window).scrollTop()>(top_pos-$(window).height())){
                switch(control_prop){
                    case "opacity":
                        $(animate_me.elem).addClass("show-overlay",1000);
                        break;
                    case "transformx":
                        $(animate_me.elem).addClass("mc-flipitx",1000);
                        break;
                    case "transformxb":
                        $(animate_me.elem).addClass("mc-flipitxb",1000);
                        break;
                    case "transformy":
                        $(animate_me.elem).addClass("mc-flipity",1000);
                        break;
                    case "count":
                        countIt();
                        break;
                }
            }
        }
        var count_animation_run=false;
        function countIt(){
            if(count_animation_run){
                return false;
            }
            console.log("executed");
            count_animation_run = true;
            $('.countup').each(function () {
                $(this).animate({
                    Counter: $(this).text()
                    }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now,fx) {
                        console.log(now+" "+fx);
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
    }

    //main function
    function main(){
        //home page mainblock
        var mainblock_header=$(".ahsContent.hrFloat h2").html("Before It's <i>Too Late</i>");
        //home page > block8
        if($(window).width()<541){
            homeWidth541();
        }else{
            $(".nav-link:last-child .dropdown-menu .dropdown-triangle").css({left:"45%"});
            $(".TWLA-services").css("width", "100%");
        }
        if($(window).width()<1025){
            homeWidth1025();
        }else{
            $('.ahsBuild').css("height","70vh");
        }
        //shelter-map page > header title
        shelterMapHeaderTitle();
    }

    //homepage responsive js min-width 541
    function homeWidth541(){
        $(".nav-link:last-child .dropdown-menu .dropdown-triangle").css({left:"78%"});
        $(".no-gutter-left").css("padding-right",0);
        $(".no-gutter-right").css("padding-left",0);
        $(".side-borders").css({borderLeft:"none",borderRight:"none"});
        $(".btn-danger:eq(4)").css({position:"relative",left:"-5%"});
        $(".card-block5:eq(0)").css({position:"relative",top:"-65px"});
        $(".flex-row-reverse").css("justify-content","center");
        $(".flex-row").css("justify-content","center");
        $(".TWLA-services").css("width", "80%");
    }
    function homeWidth1025(){
        $('.ahsBuild').css("height","40vh");
    }
    //shelter-map header title
    function shelterMapHeaderTitle(){
        if(pathname.indexOf('shelter-map')>0){
            var shelter_header=$('div.header-overlay');
            var shelter_hero=$('.ahsBuild');
            var dimh=(shelter_hero.height()/2)+(shelter_header.height());
            var winw=$(window).width();
            var dimw=(winw-340)/2;
            if($(window).width()<541){
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
    }
    //shelter-map map marker infowindow
    /*
    strigified map location object
'{
"phone":"619-555-5555",
"capacity":50,
"status":"FULL",
"services":{
    "open24":1,
    "firstaid":1,
    "snacks":1
    }
}';
*/
    if(pathname.indexOf('shelter-map')>0){
        var wpgmza_map=document.getElementById("wpgmza_map_1");
        wpgmza_map.addEventListener('mouseup',function(){
            if($('#wpgmza_map_1').find($("#wpgmza_iw_holder_1")).length>0){
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
                var shelter_services="";
                //grab the content off of the wp google map plugin
                var ds_wpgmza_holder=$("#wpgmza_iw_holder_1");
                var title=ds_wpgmza_holder.find(".wpgmza_iw_title").html();
                var address=ds_wpgmza_holder.find(".wpgmza_iw_address").html();
                var content=ds_wpgmza_holder.find(".wpgmza_iw_description").html();
                var parsed_content=JSON.parse(content);
                var phone=parsed_content.phone;
                var capacity=parsed_content.capacity;
                var status=parsed_content.status;
                var services=parsed_content.services;
                var button=ds_wpgmza_holder.find(".wpgmza_iw_buttons").html();
                $(".ds_wpgm_title").html(title);
                $(".ds_wpgm_address").html('<span class="ds_wpgm_li">Address:</span> '+address);
                if(parsed_content.services.open24==1){
                    shelter_services+=open24_template;
                }
                if(parsed_content.services.firstaid==1){
                    shelter_services+=firstaid_template;
                }
                if(parsed_content.services.snacks==1){
                    shelter_services+=snacks_template;
                }
                if(status=="FULL"){
                    var new_status='<span class="text-danger">'+status+'</span>';
                }else{
                    var new_status=status;
                }
                var replace = ["{phone}","{capacity}","{status}","{shelter_services}"];
                var replace_with = [phone,capacity,new_status,shelter_services];
                var description=description_template.replaceArray(replace,replace_with);
                $(".ds_wpgm_description").html(description);
                $(".ds_wpgm_button").html(button);
            }
        });
    }
    //utility function to replace content using two arrays
    String.prototype.replaceArray = function(find, replace) {
        var replaceString = this;
        for (var i = 0; i < find.length; i++) {
            replaceString = replaceString.replace(find[i], replace[i]);
        }
        return replaceString;
    };

});