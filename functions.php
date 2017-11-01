<?php
/////////////////////////////////////////////////////////////////////////////////////////////
//FILTERS
/////////////////////////////////////////////////////////////////////////////////////////////
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
/////////////////////////////////////////////////////////////////////////////////////////////
//SHORTCODE
/////////////////////////////////////////////////////////////////////////////////////////////
add_shortcode('theme', 'theme_url_shortcode' );
function theme_url_shortcode( $attrs = array(), $content = '' ) {
    $theme = ( is_child_theme() ? get_stylesheet_directory_uri() : get_template_directory_uri() );
    return $theme;
}
//use: &#91;theme&#93;

/////////////////////////////////////////////////////////////////////////////////////////////
//ACTIONS
/////////////////////////////////////////////////////////////////////////////////////////////
add_action( 'wp_enqueue_scripts', 'enqueueGoogleMaterialIcons' );
add_action( 'init', 'shelters', 0 );
add_action( 'init', 'createShelterTaxonomy' );
function enqueueGoogleMaterialIcons() {
    wp_enqueue_style( 'wp_google_material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
}

function shelters() {
	$labels = array(
		'name'              => __( 'Shelters'),
		'singular_name'     => __( 'Shelter'),
		'menu_name'         => __( 'Shelters'),
		'name_admin_bar'    => __( 'Shelters'),
		'archives'          => __( 'Shelters Archives'),
		'parent_item_colon' => __( 'Parent Shelter'),
		'all_items'         => __( 'All Shelters'),
		'add_new_item'      => __( 'Add New Shelter' ),
		'add_new'           => __( 'Add Shelter'),
		'new_item'          => __( 'New Shelter' ),
		'edit_item'         => __( 'Edit Shelter'),
		'update_item'       => __( 'Update Shelter'),
		'view_item'         => __( 'View Shelter'),
		'search_items'      => __( 'Search Shelter' ),
	);
	$args   = array(
		'label'               => __( 'Shelters', 'Shelters' ),
		'description'         => __( 'Shelters', 'Shelters' ),
		'labels'              => $labels,
		'supports'            => array('title','editor'),
		'taxonomies'          => array( 'category', 'shelter_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-plus-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'shelters', $args );
}

function createShelterTaxonomy() {
	register_taxonomy(
		'shelter_tag',
		'shelters',
		array(
			'label'                 => __( 'Shelter Tag' ),
			'rewrite'               => array( 'slug' => 'shelter-tag' ),
			'hierarchical'          => true,
			'update_count_callback' => '_update_post_term_count',
		)
	);
}
?>