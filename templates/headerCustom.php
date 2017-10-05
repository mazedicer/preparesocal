<?php
//Header Custom 
//TOOLS
$theme_dir = get_stylesheet_directory_uri(); //http://preparecal.dev/wp-content/themes/persuader-child
$header_custom_script_url = $theme_dir . "/assets/js/headerCustom.js";

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
$menu_obj=wp_get_nav_menu_object( "307" );
$menu_items = wp_get_nav_menu_items($menu_obj->term_id);
foreach ( (array) $menu_items as $key => $menu_item ) {
        $id = $menu_item->ID;
        $title = $menu_item->title;
        $url = $menu_item->url;
        $parent = $menu_item->menu_item_parent; //no parent if 0 (ID)
}
*/

//LOGO
$logo_img = $theme_dir . "/assets/img/LOGOS/prepare-socal-logo.png";

//EXTERNAL FONTS
$google_material_icons = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">';

//EXTERNAL STYLES
$bootstrap_stylesheet = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">';

//SCRIPTS
$script1 = '<script src="{script_url}"></script>';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FIRST NAVBAR BLOCK
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$first_nabvar_block = '<div id="first_navbar_container">
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
                        </div>';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SECOND NAVBAR BLOCK
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$second_navbar_block = '<div id="second_navbar_container">
                            <nav class="navbar">
                                <div id="navbar_logo_div">
                                    <a href="#">
                                        <img src="{logout_url}" alt="Prepare Socal Logo">
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
                        </div>';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HAMBURGER MENU DROPDOWN
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$dropdown_menu =    '<div class="dropdown-menu">
                        <button id="_307" class="dropdown-item has-child-links" type="button">Action <span class="active-menu">&#9660;</span><span class="inactive-menu">&#9650;</span></button>
                            <button class="dropdown-item sub-menu-item _307" type="button">Sub Action</button>
                            <button class="dropdown-item sub-menu-item _307" type="button">Sub Action</button>
                        <button class="dropdown-item" type="button">Another action</button>
                        <button id="_308" class="dropdown-item has-child-links" type="button">Something else here <span class="active-menu">&#9660;</span><span class="inactive-menu">&#9650;</span></button>
                            <button class="dropdown-item sub-menu-item _308" type="button">Sub Action</button>
                            <button class="dropdown-item sub-menu-item _308" type="button">Sub Action</button>
                    </div>';

/* PUT IT ALL TOGETHER */
$scripts_in = str_replace("{script_url}",$header_custom_script_url,$script1);
$header = $google_material_icons.$bootstrap_stylesheet.$scripts_in.'<header>{content}</header>';
$second_navbar_replace=array("{logout_url}","{dropdown_menu}");
$second_navbar_replace_with=array($logo_img,$dropdown_menu);
$second_navbar_block = str_replace($second_navbar_replace,$second_navbar_replace_with,$second_navbar_block);
$replace=array('{content}');
$replace_with=array($first_nabvar_block.$second_navbar_block);
$header = str_replace($replace,$replace_with,$header);
echo $header;
?>

