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
    
    //fires every time window is scrolled
    window.addEventListener('scroll',function(){
        console.log($(window).scrollTop());
    });

    //main function
    function main(){
        //home page mainblock
        var mainblock_header=$(".main-cube h2").html("Before It's <i>Too Late</i>");
        //home page > block8
        //respond_container match size
        $("#respond_container").height($("#before_respond_container").height());
        if($(window).width()<541){
            homeWidth541();
        }else{
            $(".nav-link:last-child .dropdown-menu .dropdown-triangle").css({left:"45%"});
            $(".TWLA-services").css("width", "100%");
        }
        if($(window).width()<1025){
            homeWidth1025();
        }else{
            $('.ahsBuild').css("height","60vh");
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
    if(pathname.indexOf('shelter-map')>0){
        var wpgmza_map=document.getElementById("wpgmza_map_1");
        wpgmza_map.addEventListener('mouseup',function(){
            if($('#wpgmza_map_1').find($("#wpgmza_iw_holder_1")).length>0){
                var ds_wpgmza_holder=$("#wpgmza_iw_holder_1");
                var title=ds_wpgmza_holder.find(".wpgmza_iw_title").html();
                var address=ds_wpgmza_holder.find(".wpgmza_iw_address").html();
                var content=ds_wpgmza_holder.find(".wpgmza_iw_description").html();
                var button=ds_wpgmza_holder.find(".wpgmza_iw_buttons").html();
                $(".ds_wpgm_title").html(title);
                $(".ds_wpgm_address").html('<span class="ds_wpgm_li">Address:</span> '+address);
                $(".ds_wpgm_description").html(content);
                $(".ds_wpgm_button").html(button);
            }
        });
    }
});