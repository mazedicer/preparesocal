<?php
/**
 * Template Name: FAQ
 * 
 */
//head.php - includes the header switcher
include_once('headerCustom.php');
while(have_posts()){ 
    the_post();
    get_template_part('templates/content', 'page-faq');
}
//footer.php - includes the footer switcher and version
include_once('footerCustom.php');
?>