<?php
// Register Custom Post Type Tabs
function create_tabs_cpt() {

	$labels = array(
		'name' => _x( 'Tabs', 'Post Type General Name', 'elementoronly' ),
		'singular_name' => _x( 'Tabs', 'Post Type Singular Name', 'elementoronly' ),
		'menu_name' => _x( 'Tabs', 'Admin Menu text', 'elementoronly' ),
		'name_admin_bar' => _x( 'Tabs', 'Add New on Toolbar', 'elementoronly' ),
		'archives' => __( 'Tabs Archives', 'elementoronly' ),
		'attributes' => __( 'Tabs Attributes', 'elementoronly' ),
		'parent_item_colon' => __( 'Parent Tabs:', 'elementoronly' ),
		'all_items' => __( 'All Tabs', 'elementoronly' ),
		'add_new_item' => __( 'Add New Tab', 'elementoronly' ),
		'add_new' => __( 'Add New', 'elementoronly' ),
		'new_item' => __( 'New Tabs', 'elementoronly' ),
		'edit_item' => __( 'Edit Tabs', 'elementoronly' ),
		'update_item' => __( 'Update Tabs', 'elementoronly' ),
		'view_item' => __( 'View Tab', 'elementoronly' ),
		'view_items' => __( 'View tabs', 'elementoronly' ),
		'search_items' => __( 'Search Tabs', 'elementoronly' ),
		'not_found' => __( 'Not found', 'elementoronly' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'elementoronly' ),
		'featured_image' => __( 'Featured Image', 'elementoronly' ),
		'set_featured_image' => __( 'Set featured image', 'elementoronly' ),
		'remove_featured_image' => __( 'Remove featured image', 'elementoronly' ),
		'use_featured_image' => __( 'Use as featured image', 'elementoronly' ),
		'insert_into_item' => __( 'Insert into Tabs', 'elementoronly' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Tabs', 'elementoronly' ),
		'items_list' => __( 'tabs list', 'elementoronly' ),
		'items_list_navigation' => __( 'tabs list navigation', 'elementoronly' ),
		'filter_items_list' => __( 'Filter tabs list', 'elementoronly' ),
	);
	$args = array(
		'label' => __( 'Tabs', 'elementoronly' ),
		'description' => __( '', 'elementoronly' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes', 'post-formats'),
		'taxonomies' => array('category'),
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
	register_post_type( 'tabs', $args );

}
add_action( 'init', 'create_tabs_cpt', 0 );