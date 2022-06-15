<?php 

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' ); 
function my_enqueue_assets() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'this-style', get_template_directory_uri().'/assets/css/style.css' ); 

} 

add_action( 'init', 'register_listing_post_type', 0);
function register_listing_post_type() {

	$labels = array(
		'name'                  => _x( 'Listings', 'Post Type General Name', 'violetweb-domain' ),
		'singular_name'         => _x( 'Listing', 'Post Type Singular Name', 'violetweb-domain' ),
		'menu_name'             => __( 'Listings', 'violetweb-domain' ),
		'name_admin_bar'        => __( 'Listings', 'violetweb-domain' ),
		'archives'              => __( 'Listing Archives', 'violetweb-domain' ),
		'attributes'            => __( 'Listing Attributes', 'violetweb-domain' ),
		'parent_item_colon'     => __( 'Parent Listing:', 'violetweb-domain' ),
		'all_items'             => __( 'All Listings', 'violetweb-domain' ),
		'add_new_item'          => __( 'Add New Listing', 'violetweb-domain' ),
		'add_new'               => __( 'Add New', 'violetweb-domain' ),
		'new_item'              => __( 'New Listing', 'violetweb-domain' ),
		'edit_item'             => __( 'Edit Listing', 'violetweb-domain' ),
		'update_item'           => __( 'Update Listing', 'violetweb-domain' ),
		'view_item'             => __( 'View Listing', 'violetweb-domain' ),
		'view_items'            => __( 'View Listings', 'violetweb-domain' ),
		'search_items'          => __( 'Search Listing', 'violetweb-domain' ),
		'not_found'             => __( 'Listing not found', 'violetweb-domain' ),
		'not_found_in_trash'    => __( 'Listing not found in Trash', 'violetweb-domain' ),
		'featured_image'        => __( 'Featured Image', 'violetweb-domain' ),
		'set_featured_image'    => __( 'Set featured image', 'violetweb-domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'violetweb-domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'violetweb-domain' ),
		'insert_into_item'      => __( 'Insert into Listing', 'violetweb-domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Listing', 'violetweb-domain' ),
		'items_list'            => __( 'Listings list', 'violetweb-domain' ),
		'items_list_navigation' => __( 'Listings list navigation', 'violetweb-domain' ),
		'filter_items_list'     => __( 'Filter Listings list', 'violetweb-domain' ),
	);
	$args = array(
		'label'                 => __( 'Listing', 'violetweb-domain' ),
		'description'           => __( 'Listings', 'violetweb-domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'description', 'thumbnail'),		
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false      
	);
	register_post_type( 'listings', $args );

}

add_action('wp_dashboard_setup', 'custom_dashboard_widgets');  
function custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_listing_widget', 'Theme Support', 'custom_dashboard_listing');
}

function custom_dashboard_listing() {
  //  echo '<h2>Dashboard</h2>'
  //  echo '<div style="background: green; color:#ffffff;><h3 style="float:left;">My Listings</h2><a style="display:block;float:left; text-align:right;" href="/join-now">Join Now</a></div>';
    $args = array(
        'post_type' => 'listings',
        ''

    );
  //  echo '<p>Welcome to the Listings! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="https://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}