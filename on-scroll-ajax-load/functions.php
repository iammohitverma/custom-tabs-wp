<?php
/**
 * elementoronly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elementoronly
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elementoronly_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on elementoronly, use a find and replace
		* to change 'elementoronly' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'elementoronly', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'elementoronly' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'elementoronly_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'elementoronly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elementoronly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elementoronly_content_width', 640 );
}
add_action( 'after_setup_theme', 'elementoronly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elementoronly_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'elementoronly' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'elementoronly' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'elementoronly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elementoronly_scripts() {
	wp_enqueue_style( 'elementoronly-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'elementoronly-style', 'rtl', 'replace' );

	wp_enqueue_style( 'bootstrap-5.2-css', get_template_directory_uri() . '/assets/bootstrap-5.2/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/css/custom-style.css', array(), _S_VERSION);

	wp_enqueue_script( 'elementoronly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-5.2-js', get_template_directory_uri() . '/assets/bootstrap-5.2/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/jquery/code.jquery.com_jquery-3.7.0.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/isotope/isotope-layout@3.0.6_dist_isotope.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom-script.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elementoronly_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

// register cpt tabs
require get_template_directory() . '/inc/cpt-tabs.php';

// cpt tab sc
require get_template_directory() . '/inc/sc/tabs-listing-sc.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

#get_filtered_posts_fun defined here
function fetchPostUsingAjaxTabs()
{

	$dyn_obj = $_POST['obj'];
	$dyn_cat = $dyn_obj["cat"];
	$dyn_paged = $dyn_obj["paged"];
	$dyn_pffset = $dyn_obj["offset"];

	$ajaxposts = new WP_Query([
		'post_type' => 'tabs',
		'category_name' => $dyn_cat,
        'posts_per_page' => $dyn_paged,
        'offset'        => $dyn_pffset,
	]);
	
	$response = "";
	if($ajaxposts->have_posts()) {
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();

		$categories = get_the_category();
		$all_cats = "";
		foreach ( $categories as $key=>$category ) {
			$all_cats .= " " . $category->slug;
		}
		
		$url = get_the_permalink();
		$postThumbUrl = get_the_post_thumbnail_url();
		$the_title = get_the_title();
		$the_excerpt = get_the_excerpt();
		
		$card_data = '<div class="col-md-6 col-lg-3"><div class="grid-item '. $all_cats .' ">
			<div class="card">
				<div class="img_box">
					<img
					src="'. $postThumbUrl .'"
					class="card-img-top"
					alt="bike"
					/>
				</div>
				<div class="card-body">
					<h5 class="card-title">' . $the_title .'</h5>
					<p class="card-text">
					'. $the_excerpt .'
					</p>
					<a href="'.$url.'" class="btn btn-primary">Read More</a>
				</div>
				</div>
			</div>
		</div>';

		$response.= $card_data;

		endwhile;

	} else {
		echo "0";
	}

	echo $response;

	exit;
}
add_action('wp_ajax_fetchPostUsingAjaxTabs', 'fetchPostUsingAjaxTabs');
add_action('wp_ajax_nopriv_fetchPostUsingAjaxTabs', 'fetchPostUsingAjaxTabs');


// load more posts functionality for tabs
function load_more_posts_tabs_fun()
{
	$dyn_obj = $_POST['obj'];
	$dyn_cat = $dyn_obj["cat"];
	$dyn_paged = $dyn_obj["paged"];
	print_r($dyn_obj);

	
   
}
add_action('wp_ajax_load_more_posts_tabs_fun', 'load_more_posts_tabs_fun');
add_action('wp_ajax_nopriv_load_more_posts_tabs_fun', 'load_more_posts_tabs_fun');
