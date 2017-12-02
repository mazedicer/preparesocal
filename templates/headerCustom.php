<?php
//Header Custom 
//TOOLS
$mc_theme_dir = get_stylesheet_directory_uri(); //http://preparecal.dev/wp-content/themes/persuader-child
//$mc_header_custom_script_url = $mc_theme_dir . "/assets/js/headerCustom.js";

//DYNAMIC WORDPRESS MENU from "Appearance>Menus>Primary Menu" term_id=307
/* 
menu object json_encode()d
{
   "ID":13089,
   "post_author":"1",
   "post_date":"2017-10-04 16:05:57",
   "post_date_gmt":"2017-10-04 23:05:57",
   "post_content":"",
   "post_title":"Design Studio",
   "post_excerpt":"",
   "post_status":"publish",
   "comment_status":"closed",
   "ping_status":"closed",
   "post_password":"",
   "post_name":"design-studio",
   "to_ping":"",
   "pinged":"",
   "post_modified":"2017-10-04 16:05:57",
   "post_modified_gmt":"2017-10-04 23:05:57",
   "post_content_filtered":"",
   "post_parent":0,
   "guid":"http:\/\/preparecal.dev\/?p=13089",
   "menu_order":3,
   "post_type":"nav_menu_item",
   "post_mime_type":"",
   "comment_count":"0",
   "filter":"raw",
   "db_id":13089,
   "menu_item_parent":"13087",
   "object_id":"13089",
   "object":"custom",
   "type":"custom",
   "type_label":"Custom Link",
   "title":"Design Studio",
   "url":"http:\/\/designstudio.com",
   "target":"",
   "attr_title":"",
   "description":"",
   "classes":[
      ""
   ],
   "xfn":""
}
sample code:
$mc_menu_obj=wp_get_nav_menu_object( "307" );
$mc_menu_items = wp_get_nav_menu_items($mc_menu_obj->term_id);
foreach ( (array) $mc_menu_items as $key => $menu_item ) {
        $id = $menu_item->ID;
        $title = $menu_item->title;
        $url = $menu_item->url;
        $parent = $menu_item->menu_item_parent; //no parent if 0 (ID)
}
*/
/*grab the Primary Menu in admin>dashboard>appearances>menus*/
//$mc_primary_menu=wp_nav_menu(array('menu'=>'Primary Menu','echo'=>false,'container_class'=>'main-nav-links'));
//$mc_primary_menu=wp_get_nav_menu_object("Primary Menu");
function mcReturnUtilityNav(){
    $mc_primary_menu=wp_get_nav_menu_object("Utility Nav");
    $mc_menu_items = wp_get_nav_menu_items($mc_primary_menu->term_id);
    $mc_link='<li class="nav-item"><a class="nav-link" href="{url}">{title}</a></li>';
    $utility_links='';
     foreach ( (array) $mc_menu_items as $key => $menu_item ) {
        $_id = $menu_item->ID;
        $_title = $menu_item->title;
        $_url = $menu_item->url;
        $utility_links.=str_replace(["{url}","{title}"],[$_url,$_title],$mc_link);
     }
     return $utility_links;
}
function mcReturnMainMenu(){
    $mc_primary_menu=wp_get_nav_menu_object("Primary Menu");
    $mc_menu_items = wp_get_nav_menu_items($mc_primary_menu->term_id);
    $mc_child_links=array();
    //$main_menu="";
    /*template for main navigation with links*/
    $mc_parent_link='<div class="dropdown"><a href="{url}">{title}</a>{dropdown}</div>';
    /*template for the dropdown menu*/
    $mc_dropdown_menu='<div class="dropdown-menu"><span class="dropdown-triangle">&#9650;</span>{dropdown_links}</div>';
    /*template for main navigation with NO links*/
    $mc_regular_link='<div class="dropdown"><a href="{url}">{title}</a></div>';
    /*template for sub links inside the dropdown*/
    $mc_sub_link='<a class="dropdown-item" href="{url}">{title}</a>';
    
    foreach ( (array) $mc_menu_items as $key => $menu_item ) {
        $_child_links=array();
        $_all_child_links='';
        $_id = $menu_item->ID;
        $_title = $menu_item->title;
        $_url = $menu_item->url;
         if(in_array($_id,$mc_child_links)){
            //skip. child links will be constructed below 
            continue;
        }
        $children_links=returnCHildLinks($menu_item,"Primary Menu");
         if(is_array($children_links)){
             foreach($children_links as $chl){
                if($chl != null){
                    array_push($_child_links,(string)$chl);
                    array_push($mc_child_links,(string)$chl);
                }
            }
            //mc_regular_link because it is at 1st level
            //$main_menu.=str_replace(["{url}","{title}"],[$_url,$_title],$mc_regular_link);
            //add child links to dropdown_menu_content
            foreach($_child_links as $__cl){
                $___cl_item=getLinkItem($__cl,"Primary Menu");
                /*gather up links*/
                $_all_child_links.=str_replace(["{url}","{title}"],[$___cl_item->url,$___cl_item->title],$mc_sub_link);
            }
            /*put links html into $mc_dropdown_menu*/
            $__mc_dropdown_menu_filled=str_replace("{dropdown_links}",$_all_child_links,$mc_dropdown_menu);
            $__dropdown_menu.=str_replace(["{url}","{title}","{dropdown}"],[$_url,$_title,$__mc_dropdown_menu_filled],$mc_parent_link);
            //$main_menu.=$__dropdown_menu;
         }else{
             $__dropdown_menu.=str_replace(["{url}","{title}"],[$_url,$_title],$mc_regular_link);
         }
    }
    return $__dropdown_menu;
}
function mcReturnDropDownMenu($wp_menu){
    $mc_regular_link='<button class="dropdown-item" type="button" data-url="{url}">{title}</button>';
    $mc_parent_link='<button id="_{id}" class="dropdown-item has-child-links" type="button">{title} <span class="active-menu">&#9660;</span><span class="inactive-menu">&#9650;</span></button>';
    $mc_child_link='<button class="dropdown-item sub-menu-item _{parent_id}" type="button" data-url="{url}">{title}</button>';
    $mc_dropdown_menu_content='';
    $mc_child_links=array();
    $mc_menu_obj=wp_get_nav_menu_object( $wp_menu );
    $mc_menu_items = wp_get_nav_menu_items($mc_menu_obj->term_id);
    foreach ( (array) $mc_menu_items as $key => $menu_item ) {
        $_child_links=array();
        $id = $menu_item->ID;
        $title = $menu_item->title;
        $url = $menu_item->url;
        if(in_array($id,$mc_child_links)){
            //skip. child links will be constructed below 
            continue;
        }
        $children_links=returnCHildLinks($menu_item,$wp_menu);
        if(is_array($children_links)){
            foreach($children_links as $chl){
                if($chl != null){
                    array_push($_child_links,(string)$chl);
                    array_push($mc_child_links,(string)$chl);
                }
            }
            //parent link because it has child links. Add to dropdown_menu_content 
            $mc_dropdown_menu_content.=str_replace(["{id}","{title}"],[$id,$title],$mc_parent_link);
            //add child links to dropdown_menu_content
            foreach($_child_links as $_cl){
                $_cl_item=getLinkItem($_cl,$wp_menu);
                $mc_dropdown_menu_content.=str_replace(["{parent_id}","{url}","{title}"],[$id,$_cl_item->url,$_cl_item->title],$mc_child_link);
            }
        }else{
            //regular link because it has no children links. Add to dropdown_menu_content
            $mc_dropdown_menu_content.=str_replace(["{url}","{title}"],[$url,$title],$mc_regular_link);
        }
    }
    return $mc_dropdown_menu_content;
}
function getLinkItem($_child_link,$wp_menu){
    $mc_menu_obj=wp_get_nav_menu_object($wp_menu);
    $mc_menu_items = wp_get_nav_menu_items($mc_menu_obj->term_id);
    foreach ( (array) $mc_menu_items as $key => $menu_item ) {
        $id = $menu_item->ID;
        if($id==$_child_link){
            return $menu_item;
        }
    }
    return null;
}
function returnCHildLinks($parent_menu_item,$wp_menu){
    $main_link=$parent_menu_item->ID;
    $_child_links=array();
    //iterate over $mc_menu_items and check for children
    $mc_menu_obj=wp_get_nav_menu_object($wp_menu);
    $mc_menu_items = wp_get_nav_menu_items($mc_menu_obj->term_id);
    foreach ( (array) $mc_menu_items as $key => $menu_item ) {
        $id = $menu_item->ID;
        $parent = $menu_item->menu_item_parent; //no parent if 0 (ID)
        if($main_link==$parent){
            array_push($_child_links,$id);
        }
    }
    if(count($_child_links)>0){
        return $_child_links;
    }
    return null;
}
/*grab the Utility Nav menu in admin>dashboard>appearances>menus*/
$utility_links=mcReturnUtilityNav();
/*grab the hamburger menu in admin>dashboard>appearances>menus*/
$mc_dropdown_menu_content=mcReturnDropDownMenu("hamburger");
$mc_primary_menu=mcReturnMainMenu();
//LOGO
$mc_logo_img = $mc_theme_dir . "/assets/img/LOGOS/prepare-socal-logo.png";

//EXTERNAL FONTS
//$mc_google_material_icons = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';

//EXTERNAL STYLES
$mc_bootstrap_stylesheet ='';// '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">';

//SCRIPTS
//$mc_script1 = '<script src="{script_url}"></script>';

/************************************************************************************************************************
UTILITIES NAVBAR BLOCK
***********************************************************************************************************************/
/*$first_nabvar_block_template = '<div id="first_navbar_container">
                                                    <div id="nav_container">
                                                        <ul class="nav justify-content-end">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">About</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">Contact</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#">Espa&#241;ol</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>';*/
$first_nabvar_block_template = '<div id="first_navbar_container">
                                                    <div id="nav_container">
                                                        <ul class="nav justify-content-end">
                                                            {utility_links}
                                                        </ul>
                                                    </div>
                                                </div>';
/************************************************************************************************************************
MAIN NAVBAR BLOCK
***********************************************************************************************************************/
/*$second_navbar_block_template = '<div id="second_navbar_container">
                            <nav class="navbar">
                                <div id="navbar_logo_div">
                                    <a href="/">
                                        <img src="{logo_url}" alt="Prepare Socal Logo">
                                    </a>
                                </div>
                                <div id="nav_container">
                                    <a class="nav-link" href="#">Get Prepared</a>
                                    <a class="nav-link" href="#">My Neighborhood</a>
                                    <a class="nav-link" href="#">How Can I Help?</a>
                                    <a class="nav-link" href="#" data-toggle="dropdown">
                                        <i class="material-icons active-menu">menu</i>
                                        <i class="material-icons inactive-menu">clear</i>
                                        {dropdown_menu}
                                    </a>
                                </div>
                            </nav>
                        </div>';*/
$second_navbar_block_template = '<div id="second_navbar_container">
                            <nav class="navbar">
                                <div id="navbar_logo_div">
                                    <a href="/">
                                        <img src="{logo_url}" alt="Prepare Socal Logo">
                                    </a>
                                </div>
                                <div id="nav_container">
                                    <div class="main-nav-links">
                                        <div id="menu-primary-menu">
                                            {main_navbar}
                                        </div>
                                    </div>
                                    <a class="nav-link" href="#" data-toggle="dropdown">
                                        <i class="material-icons active-menu">menu</i>
                                        <i class="material-icons inactive-menu">clear</i>
                                        {dropdown_menu}
                                    </a>
                                </div>
                            </nav>
                        </div>';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HAMBURGER MENU DROPDOWN
       /*<div class="dropdown-menu">
       <button id="_307" class="dropdown-item has-child-links" type="button">Action <span class="active-menu">&#9660;</span><span class="inactive-menu">&#9650;</span></button>
            <button class="dropdown-item sub-menu-item _307" type="button">Sub Action</button>
            <button class="dropdown-item sub-menu-item _307" type="button">Sub Action</button>
        <button class="dropdown-item" type="button">Another action</button>
        <button id="_308" class="dropdown-item has-child-links" type="button">Something else here <span class="active-menu">&#9660;</span><span class="inactive-menu">&#9650;</span></button>
            <button class="dropdown-item sub-menu-item _308" type="button">Sub Action</button>
            <button class="dropdown-item sub-menu-item _308" type="button">Sub Action</button>
            </div>
    */
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$mc_dropdown_menu_template='<div class="dropdown-menu-ham"><span class="dropdown-triangle">&#9650;</span>{dropdown_menu_content}</div>';
/* PUT IT ALL TOGETHER */
$utility_navbar=str_replace("{utility_links}",$utility_links,$first_nabvar_block_template);
$mc_dropdown_menu=str_replace("{dropdown_menu_content}",$mc_dropdown_menu_content,$mc_dropdown_menu_template);
//$mc_scripts_in=str_replace("{script_url}",$mc_header_custom_script_url,$mc_script1);
$mc_header_template=$mc_bootstrap_stylesheet.'<header>{content}</header>';
$second_navbar_replace=array("{logo_url}","{main_navbar}","{dropdown_menu}");
$second_navbar_replace_with=array($mc_logo_img,$mc_primary_menu,$mc_dropdown_menu);
$second_navbar_block = str_replace($second_navbar_replace,$second_navbar_replace_with,$second_navbar_block_template);
$mc_header = str_replace("{content}",$utility_navbar.$second_navbar_block,$mc_header_template);
echo $mc_header;
// quick edit blocks 
//$mc_block1=file_get_contents($mc_theme_dir."/templates/block1.php");
//$mc_block2=file_get_contents($mc_theme_dir."/templates/block2.php");
//$mc_block3=file_get_contents($mc_theme_dir."/templates/block3.php");
//$mc_block4=file_get_contents($mc_theme_dir."/templates/block4.php");
//$mc_block5=file_get_contents($mc_theme_dir."/templates/block5.php");
//$mc_block6=file_get_contents($mc_theme_dir."/templates/block6.php");
//$mc_block7=file_get_contents($mc_theme_dir."/templates/block7.php");
//$mc_shelter_block1=file_get_contents($mc_theme_dir."/templates/shelter-map-block1.php");
//$mc_shelter_block2=file_get_contents($mc_theme_dir."/templates/shelter-map-block2.php");
//echo $mc_shelter_block1;
//echo $mc_shelter_block2;
//include( get_stylesheet_directory() . '/templates/shelter-map-block3.php' );

?>

