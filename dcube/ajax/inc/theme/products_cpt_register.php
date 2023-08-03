<?php
// Register Custom Post Type Products
function create_products_cpt() {

	$labels = array(
		'name' => _x( 'Products', 'Post Type General Name', 'dcube' ),
		'singular_name' => _x( 'Products', 'Post Type Singular Name', 'dcube' ),
		'menu_name' => _x( 'Products', 'Admin Menu text', 'dcube' ),
		'name_admin_bar' => _x( 'Products', 'Add New on Toolbar', 'dcube' ),
		'archives' => __( 'Products Archives', 'dcube' ),
		'attributes' => __( 'Products Attributes', 'dcube' ),
		'parent_item_colon' => __( 'Parent Products:', 'dcube' ),
		'all_items' => __( 'All Products', 'dcube' ),
		'add_new_item' => __( 'Add New Products', 'dcube' ),
		'add_new' => __( 'Add New', 'dcube' ),
		'new_item' => __( 'New Products', 'dcube' ),
		'edit_item' => __( 'Edit Products', 'dcube' ),
		'update_item' => __( 'Update Products', 'dcube' ),
		'view_item' => __( 'View Products', 'dcube' ),
		'view_items' => __( 'View Products', 'dcube' ),
		'search_items' => __( 'Search Products', 'dcube' ),
		'not_found' => __( 'Not found', 'dcube' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'dcube' ),
		'featured_image' => __( 'Featured Image', 'dcube' ),
		'set_featured_image' => __( 'Set featured image', 'dcube' ),
		'remove_featured_image' => __( 'Remove featured image', 'dcube' ),
		'use_featured_image' => __( 'Use as featured image', 'dcube' ),
		'insert_into_item' => __( 'Insert into Products', 'dcube' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Products', 'dcube' ),
		'items_list' => __( 'Products list', 'dcube' ),
		'items_list_navigation' => __( 'Products list navigation', 'dcube' ),
		'filter_items_list' => __( 'Filter Products list', 'dcube' ),
	);
	$args = array(
		'label' => __( 'Products', 'dcube' ),
		'description' => __( '', 'dcube' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'products', $args );


      register_taxonomy(
        'products-categories',
        'products',
        array(
            'label' => __( 'Product Categories' ),
            'rewrite' => array( 'slug' => 'products-categories' ),
            'hierarchical' => true,
             'with_front' => false 
        )
    );
    
}
add_action( 'init', 'create_products_cpt', 0 );