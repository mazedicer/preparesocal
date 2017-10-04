<?php
//Header Custom 
//TOOLS
$theme_dir = get_stylesheet_directory_uri(); //http://preparecal.dev/wp-content/themes/persuader-child
$header_custom_script_url = $theme_dir . "/assets/js/headerCustom.js";

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
                                        <i class="material-icons">menu</i>
                                        {dropdown_menu}
                                    </a>
                                </div>
                            </nav>
                        </div>';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HAMBURGER MENU DROPDOWN
/*
in progress with triangle on top aligned right:
<div class="dropdown-menu">content</div>
css:
.dropdown-menu:before {
    content:"";
    position: absolute;
    left: 50%;
    top: -18px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 10px 10px 10px;
    border-color: transparent transparent #fff transparent;
    z-index:9999;
}
.dropdown-menu {
    background: #ccc;
    border: 8px solid #fffefe;
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
    float: left;
    position: absolute;
    margin: 0;
    top: 2.8em;
    width: 200px;
}
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$dropdown_menu =    '<div class="dropdown-menu">
                        <button class="dropdown-item" type="button">Action</button>
                        <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button>
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

