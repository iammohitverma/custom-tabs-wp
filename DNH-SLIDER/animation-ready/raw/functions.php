<?php /*
 Theme Name: Divi Child
 Theme URI: https://www.elegantthemes.com/gallery/divi/
 Description: Divi Child Theme
 Author: Elegant Themes
 Author URI: https://www.elegantthemes.com
 Template: Divi
 Version: 1.0.0
*/
 
/* =Theme customization starts here
------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    // Enqueue the parent theme's style.css
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Enqueue the child theme's style.css
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');

    // Enqueue custom script in the child theme
    wp_enqueue_script('custom-script-tm', get_stylesheet_directory_uri() . '/custom_script_tm.js', array('jquery'), null, true);

    // Enqueue custom css for 10th yers anniversary template
    wp_enqueue_style('anniversary-css-tm', get_stylesheet_directory_uri() . '/anniversary_style_tm.css');

    // Add a version number to bypass browser cache during development
    wp_script_add_data('custom-script-tm', 'version', '1.0');
}


function create_job_openings_post_type() {
    $labels = array(
        'name' => 'Job Openings',
        'singular_name' => 'Job Opening',
        'add_new' => 'Add New Job Opening',
        'add_new_item' => 'Add New Job Opening',
        'edit_item' => 'Edit Job Opening',
        'new_item' => 'New Job Opening',
        'view_item' => 'View Job Opening',
        'search_items' => 'Search Job Openings',
        'not_found' => 'No job openings found',
        'not_found_in_trash' => 'No job openings found in Trash',
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        // 'rewrite' => array('slug' => 'current_openings'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-businessman', // You can change this icon.
    );

    register_post_type('current_openings', $args);
    
}
add_action('init', 'create_job_openings_post_type');

function custom_opening_category_taxonomy() {
    $labels = array(
        'name' => _x('Opening Categories', 'taxonomy general name'),
        'singular_name' => _x('Opening Category', 'taxonomy singular name'),
        'search_items' => __('Search Opening Categories'),
        'all_items' => __('All Opening Categories'),
        'parent_item' => __('Parent Opening Category'),
        'parent_item_colon' => __('Parent Opening Category:'),
        'edit_item' => __('Edit Opening Category'),
        'update_item' => __('Update Opening Category'),
        'add_new_item' => __('Add New Opening Category'),
        'new_item_name' => __('New Opening Category Name'),
        'menu_name' => __('Opening Categories'),
    );

    $args = array(
        'hierarchical' => true, // Set this to false if it's not a hierarchical taxonomy
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'opening-category'), // Change the 'slug' to your desired URL structure
    );

    register_taxonomy('opening-category', 'current_openings', $args);
}

add_action('init', 'custom_opening_category_taxonomy');

//Shortcode For Create Job Section Start
function shortcode_for_job_section() {
    ob_start();
		include_once( get_stylesheet_directory() . '/inc/shortcodes/job_opening.php' ); 
    return ob_get_clean(); 
	
}
add_shortcode('job_section', 'shortcode_for_job_section');



function article_filter_sc(){
    ob_start();
    include 'inc/article-filter.php';
    return ob_get_clean();
} 
add_shortcode('ArticleFilter', 'article_filter_sc');

function article_filter_data() {

    include 'inc/article-after-filter.php';
    wp_die();
}

add_action( 'wp_ajax_nopriv_article_filter_data', 'article_filter_data' );
add_action( 'wp_ajax_article_filter_data', 'article_filter_data' );



// team shortcode and post type

// Register Team Custom Post Type.
function custom_post_type_team() {
    $args = array(
        'public' => true,
        'label'  => 'Team',
        'supports' => array( 'title','editor', 'thumbnail', 'custom-fields', 'excerpt' ),
        'rewrite' => array( 'slug' => 'team' ),
    );
    register_post_type( 'team', $args );
}
add_action( 'init', 'custom_post_type_team' );

// Register Custom Taxonomy.
function custom_taxonomy_role() {
    $args = array(
        'hierarchical' => true,
        'label' => 'Roles',
		'show_admin_column' => true,
        'rewrite' => array( 'slug' => 'role' ),
    );
    register_taxonomy( 'role', 'team', $args );
}
add_action( 'init', 'custom_taxonomy_role' );


function all_team_tm( $atts ) {
	$attributes = shortcode_atts( array(
		'accordion_item_id' => ''
	), $atts );
	
    ob_start();
   include 'inc/team-filter.php';
return ob_get_clean();
}
add_shortcode( 'dnh_all_team', 'all_team_tm' );

function team_filter_data() {
    include 'inc/team-after-filter.php';
    wp_die();
}

add_action( 'wp_ajax_nopriv_team_filter_data', 'team_filter_data' );
add_action( 'wp_ajax_team_filter_data', 'team_filter_data' );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
function fix_svg() {
echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

function article_filter_paginate() {
    include 'inc/article-after-paginate.php';
    wp_die();
}

add_action( 'wp_ajax_nopriv_article_filter_paginate', 'article_filter_paginate' );
add_action( 'wp_ajax_article_filter_paginate', 'article_filter_paginate' );