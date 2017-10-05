$(document).ready(function() {
    //DROPDOWN
    $(".nav-link:last-child").on("click",function() {
        //show-hide dropdown
        $(".dropdown-menu").toggle();
        $(".material-icons.active-menu, .material-icons.inactive-menu").toggle();
        
        //position dropdown
        var parent_width=$(this).width();
        var parent_left=$(this).offset().left;
        var dropdown_menu_half=$(".dropdown-menu").width()/2;
        var dropdown_menu_left=$(".dropdown-menu").offset().left;
        var position = (parent_left+parent_width)-dropdown_menu_half;
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
});