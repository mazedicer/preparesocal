<?php
/**
 * Template Name: Shelter
 *
 * @package WordPress
 * @subpackage DesignStudio
 */
include_once(get_template_directory().'/head.php' );
//wp_head();

   get_template_part('/templates/content-page-shelter');

 //footer.php - includes the footer switcher and version
include_once(get_template_directory().'/footer.php');
//wp_footer();
?>