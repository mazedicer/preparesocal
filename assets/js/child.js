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
        window.location.href=$(this).attr('data-url');
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

    //fires if homepage
    if(pathname.indexOf('home')>0 || pathname.length<2){
        window.addEventListener('scroll',animateMe);
        var cim1={elem:".cim1",control_prop:"opacity"};
        var cim2={elem:".cim2",control_prop:"opacity"};
        var cim3={elem:".cim3",control_prop:"opacity"};
        var flipcard4={elem:".mc-flipcard4",control_prop:"transformy"};
        var flipcard5={elem:".mc-flipcard5",control_prop:"transformx"};
        var flipcard6={elem:".mc-flipcard6",control_prop:"transformy"};
        var flipcard7={elem:".card-block6",control_prop:"transformxb"};
        var count_it={elem:".countup",control_prop:"count"};
        function animateMe(){
            var animatable=[cim1,cim2,cim3,flipcard4,flipcard5,flipcard6,flipcard7,count_it];
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
        //block2 stats counter
        var count_animation_run=false;
        function countIt(){
            if(count_animation_run){
                return false;
            }
            //console.log("executed");
            count_animation_run = true;
            $('.countup').each(function () {
                $(this).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function (now,fx) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
        //block 4 social media blocks
        $(".text-xs-center.pt-1.pb-1.hidden-md-down").after('<div class="make_difference_sub_header"><p>Become a <span class="text-danger">#LocalHero</span>. If a disaster strikes, you can help save lives.</p></div>');
        //block7 time until next response, reset at 8min
        var response_time = "8:00";
        var response_interval = setInterval(responseTimer,1000);
        function responseTimer() {
            var timer = response_time.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if(minutes < 0){
                clearInterval(response_interval);
                response_time="8:00";
                var timer = response_time.split(':');
                //by parsing integer, I avoid all extra string processing
                var minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                response_interval = setInterval(responseTimer,1000);
            } 
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('.time_to').html(minutes + ':' + seconds);
            response_time=minutes + ':' + seconds;
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
    }

    //homepage responsive js min-width 541
    function homeWidth541(){
        $(".nav-link:last-child .dropdown-menu .dropdown-triangle").css({left:"78%"});
        $(".no-gutter-left").css("padding-right",0);
        $(".no-gutter-right").css("padding-left",0);
        $(".side-borders").css({borderLeft:"none",borderRight:"none"});
        $(".btn-danger:eq(4)").css({position:"relative",left:"-5%"});
        //$(".card-block5:eq(0)").css({position:"relative",top:"-65px"});
        $(".flex-row-reverse").css("justify-content","center");
        $(".flex-row").css("justify-content","center");
        $(".TWLA-services").css("width", "80%");
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
    //utility function to replace content using two arrays
    String.prototype.replaceArray = function(find, replace) {
        var replaceString = this;
        for (var i = 0; i < find.length; i++) {
            replaceString = replaceString.replace(find[i], replace[i]);
        }
        return replaceString;
    };

});