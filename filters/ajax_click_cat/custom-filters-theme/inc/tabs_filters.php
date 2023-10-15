<?php
// Register Custom Post Type Tabs
function create_tabs_cpt() {

	$labels = array(
		'name' => _x( 'Tabs', 'Post Type General Name', 'custom-filters' ),
		'singular_name' => _x( 'Tabs', 'Post Type Singular Name', 'custom-filters' ),
		'menu_name' => _x( 'Tabs', 'Admin Menu text', 'custom-filters' ),
		'name_admin_bar' => _x( 'Tabs', 'Add New on Toolbar', 'custom-filters' ),
		'archives' => __( 'Tabs Archives', 'custom-filters' ),
		'attributes' => __( 'Tabs Attributes', 'custom-filters' ),
		'parent_item_colon' => __( 'Parent Tabs:', 'custom-filters' ),
		'all_items' => __( 'All tabs', 'custom-filters' ),
		'add_new_item' => __( 'Add New Tabs', 'custom-filters' ),
		'add_new' => __( 'Add New', 'custom-filters' ),
		'new_item' => __( 'New Tabs', 'custom-filters' ),
		'edit_item' => __( 'Edit Tabs', 'custom-filters' ),
		'update_item' => __( 'Update Tabs', 'custom-filters' ),
		'view_item' => __( 'View Tabs', 'custom-filters' ),
		'view_items' => __( 'View tabs', 'custom-filters' ),
		'search_items' => __( 'Search Tabs', 'custom-filters' ),
		'not_found' => __( 'Not found', 'custom-filters' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'custom-filters' ),
		'featured_image' => __( 'Featured Image', 'custom-filters' ),
		'set_featured_image' => __( 'Set featured image', 'custom-filters' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom-filters' ),
		'use_featured_image' => __( 'Use as featured image', 'custom-filters' ),
		'insert_into_item' => __( 'Insert into Tabs', 'custom-filters' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Tabs', 'custom-filters' ),
		'items_list' => __( 'tabs list', 'custom-filters' ),
		'items_list_navigation' => __( 'tabs list navigation', 'custom-filters' ),
		'filter_items_list' => __( 'Filter tabs list', 'custom-filters' ),
	);
	$args = array(
		'label' => __( 'Tabs', 'custom-filters' ),
		'description' => __( '', 'custom-filters' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-network',
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
	register_post_type( 'tabs', $args );

}
add_action( 'init', 'create_tabs_cpt', 0 );


/*************************/
// taxonomy for categories
/************************/
function wpdocs_register_private_taxonomy() {
    $args1 = array(
       'label'        => 'Tabs Category',
       'public'       => true,
       'rewrite'      => false,
       'hierarchical' => true
   );
   
   register_taxonomy( 'tabs_post_cat', 'tabs', $args1 );

}
add_action( 'init', 'wpdocs_register_private_taxonomy', 0 );



/*******************/
// taxonomy for tags
/*******************/

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies() 
{
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
); 

register_taxonomy('tag','tabs',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
));
}
add_action( 'init', 'create_tag_taxonomies', 0 );