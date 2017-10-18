/**
 * Child JS.
 *
 * Child JS scripts.
 *
 * @since 1.0.0
 */
$(document).ready(function() {
    //DROPDOWN
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
    //fire on page load
    onFirstLoadAndResize();
    //fire on window resize
    window.addEventListener('resize', function (){
        onFirstLoadAndResize();
    });
    function onFirstLoadAndResize(){
        //respond_container match size
        $("#respond_container").height($("#before_respond_container").height());
        //responsiveness
        if($(window).width()<541){
            //homepage
            responsiveWith541();
        }else{
            $(".nav-link:last-child .dropdown-menu .dropdown-triangle").css({left:"45%"});
        }
        //shelter-map
        shelterMapFixes();
    }
    //homepage responsive js min-width 541
    function responsiveWith541(){
        $(".nav-link:last-child .dropdown-menu .dropdown-triangle").css({left:"78%"});
        $(".no-gutter-left").css("padding-right",0);
        $(".no-gutter-right").css("padding-left",0);
        $(".side-borders").css({borderLeft:"none",borderRight:"none"});
        $(".btn-danger:eq(4)").css({position:"relative",left:"-5%"});
        $(".card-block5:eq(0)").css({position:"relative",top:"-65px"});
        $(".flex-row-reverse").css("justify-content","center");
        $(".flex-row").css("justify-content","center");
    }
    //shelter-map fixes
    function shelterMapFixes(){
        if(pathname.indexOf('shelter-map')>0){
            var shelter_header=$('div.header-overlay');
            var shelter_hero=$('.ahsBuild');
            var dimh=(shelter_hero.height()/2)+(shelter_header.height());
            var winw = $(window).width();
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
});