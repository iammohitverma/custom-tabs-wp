<?php
// Register Custom Post Type Team
function create_team_cpt() {

	$labels = array(
		'name' => _x( 'Team', 'Post Type General Name', 'elementortest' ),
		'singular_name' => _x( 'Team', 'Post Type Singular Name', 'elementortest' ),
		'menu_name' => _x( 'Team', 'Admin Menu text', 'elementortest' ),
		'name_admin_bar' => _x( 'Team', 'Add New on Toolbar', 'elementortest' ),
		'archives' => __( 'Team Archives', 'elementortest' ),
		'attributes' => __( 'Team Attributes', 'elementortest' ),
		'parent_item_colon' => __( 'Parent Team:', 'elementortest' ),
		'all_items' => __( 'All Team', 'elementortest' ),
		'add_new_item' => __( 'Add New Team', 'elementortest' ),
		'add_new' => __( 'Add New', 'elementortest' ),
		'new_item' => __( 'New Team', 'elementortest' ),
		'edit_item' => __( 'Edit Team', 'elementortest' ),
		'update_item' => __( 'Update Team', 'elementortest' ),
		'view_item' => __( 'View Team', 'elementortest' ),
		'view_items' => __( 'View Team', 'elementortest' ),
		'search_items' => __( 'Search Team', 'elementortest' ),
		'not_found' => __( 'Not found', 'elementortest' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'elementortest' ),
		'featured_image' => __( 'Featured Image', 'elementortest' ),
		'set_featured_image' => __( 'Set featured image', 'elementortest' ),
		'remove_featured_image' => __( 'Remove featured image', 'elementortest' ),
		'use_featured_image' => __( 'Use as featured image', 'elementortest' ),
		'insert_into_item' => __( 'Insert into Team', 'elementortest' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team', 'elementortest' ),
		'items_list' => __( 'Team list', 'elementortest' ),
		'items_list_navigation' => __( 'Team list navigation', 'elementortest' ),
		'filter_items_list' => __( 'Filter Team list', 'elementortest' ),
	);
	$args = array(
		'label' => __( 'Team', 'elementortest' ),
		'description' => __( '', 'elementortest' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array('mvcategory'),
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
	register_post_type( 'team', $args );

    register_taxonomy( 'mvcategory', 'team', array(
		'label'        => __( 'Team Categories', 'elementortest' ),
		'rewrite'      => array( 'slug' => 'mvcategory' ),
		'hierarchical' => true,
	) );
}
add_action( 'init', 'create_team_cpt', 0 );
