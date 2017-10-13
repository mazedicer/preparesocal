<?php
/////////////////////////////////////////////////////////////////////////////////////////////
//FILTERS
/////////////////////////////////////////////////////////////////////////////////////////////
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
function theme_url_shortcode( $attrs = array(), $content = '' ) {
     
    $theme = ( is_child_theme() ? get_stylesheet_directory_uri() : get_template_directory_uri() );
 
    return $theme;
     
}

add_shortcode('theme', 'theme_url_shortcode' );

//use: &#91;theme&#93;


?>