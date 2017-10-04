<?php
//Header Custom 
$theme_dir = get_stylesheet_directory_uri(); //http://preparecal.dev/wp-content/themes/persuader-child
$logo_img = $theme_dir . "/assets/img/LOGOS/prepare-socal-logo.png";
$google_material_icons = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">';
$bootstrap_stylesheet = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">';
$header = $google_material_icons.$bootstrap_stylesheet.'<header>{content}</header>';
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
                                    <a class="nav-link" href="#"><i class="material-icons">menu</i></a>
                                </div>
                            </nav>
                        </div>';
$second_navbar_block = str_replace("{logout_url}",$logo_img,$second_navbar_block);
$replace=array('{content}');
$replace_with=array($first_nabvar_block.$second_navbar_block);
$header = str_replace($replace,$replace_with,$header);
echo $header;
?>

