<?php
// Register Custom Post Type Accordion
function create_accordion_cpt() {

	$labels = array(
		'name' => _x( 'Accordion', 'Post Type General Name', 'elementoronly' ),
		'singular_name' => _x( 'Accordion', 'Post Type Singular Name', 'elementoronly' ),
		'menu_name' => _x( 'Accordion', 'Admin Menu text', 'elementoronly' ),
		'name_admin_bar' => _x( 'Accordion', 'Add New on Toolbar', 'elementoronly' ),
		'archives' => __( 'Accordion Archives', 'elementoronly' ),
		'attributes' => __( 'Accordion Attributes', 'elementoronly' ),
		'parent_item_colon' => __( 'Parent Accordion:', 'elementoronly' ),
		'all_items' => __( 'All Accordion', 'elementoronly' ),
		'add_new_item' => __( 'Add New Accordion', 'elementoronly' ),
		'add_new' => __( 'Add New', 'elementoronly' ),
		'new_item' => __( 'New Accordion', 'elementoronly' ),
		'edit_item' => __( 'Edit Accordion', 'elementoronly' ),
		'update_item' => __( 'Update Accordion', 'elementoronly' ),
		'view_item' => __( 'View Accordion', 'elementoronly' ),
		'view_items' => __( 'View Accordion', 'elementoronly' ),
		'search_items' => __( 'Search Accordion', 'elementoronly' ),
		'not_found' => __( 'Not found', 'elementoronly' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'elementoronly' ),
		'featured_image' => __( 'Featured Image', 'elementoronly' ),
		'set_featured_image' => __( 'Set featured image', 'elementoronly' ),
		'remove_featured_image' => __( 'Remove featured image', 'elementoronly' ),
		'use_featured_image' => __( 'Use as featured image', 'elementoronly' ),
		'insert_into_item' => __( 'Insert into Accordion', 'elementoronly' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Accordion', 'elementoronly' ),
		'items_list' => __( 'Accordion list', 'elementoronly' ),
		'items_list_navigation' => __( 'Accordion list navigation', 'elementoronly' ),
		'filter_items_list' => __( 'Filter Accordion list', 'elementoronly' ),
	);
	$args = array(
		'label' => __( 'Accordion', 'elementoronly' ),
		'description' => __( '', 'elementoronly' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title'),
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
	register_post_type( 'accordion', $args );

	
}
add_action( 'init', 'create_accordion_cpt', 0 );




// add custom shortcode option td
add_filter('manage_accordion_posts_columns', function ($columns) {
	return array_merge($columns, ['shortcode' => __('Shortcode', 'elementoronly')]);
});

add_action('manage_accordion_posts_custom_column', function ($column_key, $post_id) {
	if ($column_key == 'shortcode') {
	?>
		<input type='text' id="myInput" onclick="clickFun()" readonly style="background-color:#fff; width: 370px" value='[custom_accordion_shortcode accordion_item_id="<?php echo $post_id; ?>" ]'>
		<script>
			function clickFun(e){
				// Get the text field
				var copyText = document.getElementById("myInput");
				// Select the text field
				copyText.select();
				copyText.setSelectionRange(0, 99999); // For mobile devices

				// Copy the text inside the text field
				setTimeout(() => {
					navigator.clipboard.writeText(copyText.value);	//clipboard works only when protocol is https:
				}, 1000);

				// Alert the copied text
				console.log("Copied" + copyText.value);
			}
		</script>
<?php
	}
}, 10, 2);

// reodering table columns
function wpdocs_accordion_columns( $columns ) {
    $custom_col_order = array(
        'cb' => $columns['cb'],
		'title' => $columns['title'],
        'shortcode' => $columns['shortcode'],
        'date' => $columns['date']
    );
    return $custom_col_order;
}
add_filter( 'manage_accordion_posts_columns', 'wpdocs_accordion_columns' );