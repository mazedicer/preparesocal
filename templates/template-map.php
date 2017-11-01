<?php
/**
 * Template Name: Flex
 *
 * @package WordPress
 * @subpackage DesignStudio Prelude
 * @since DS Prelude 1.0
 */
include_once( 'head.php' );

   get_template_part('templates/content-flex', get_post_type());

 //footer.php - includes the footer switcher and version
include_once('footer.php');

?>