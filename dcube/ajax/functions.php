<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dcube_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dcube_theme_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// Logo support
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => false, 
        );

        add_theme_support( 'custom-logo', $defaults );

        /**
         * Enqueue scripts and styles.
         */

        function dcube_scripts() {
            wp_enqueue_style( 'dcube-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'dcube-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dcube-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dcube-font-style-poppins', get_template_directory_uri() . '/assets/fonts/poppins/stylesheet.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'dcube-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'dcube-swiper-style', get_template_directory_uri() . '/assets/css/owl/swiper.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'dcube-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dcube-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'dcube-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'dcube-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'dcube-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'dcube-swiper-script', get_template_directory_uri() . '/assets/js/owl/swiper.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'dcube-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'dcube-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );

        }
        add_action( 'wp_enqueue_scripts', 'dcube_scripts' );
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'dcube' ),
			'footer'  => __( 'Footer Menu', 'dcube' ),
		) ); */
        
        
        /* ------ Admin Login Page Design ------ */
        require get_template_directory() . '/inc/theme/login_p_design.php';

        /* ------ Revert To Classic Editor & Classic Widgets ------ */
        require get_template_directory() . '/inc/theme/c_editor_c_widgets.php';

        /* ------ Register Custom Menus ------ */
        require get_template_directory() . '/inc/theme/menus.php';

        /* ------ Register Customizer ------ */
        require get_template_directory() . '/inc/theme/customizer.php';

        /* ------ Register Widgets ------ */
        require get_template_directory() . '/inc/theme/widgets.php';

        /* ------ Register Widgets ------ */
        require get_template_directory() . '/inc/theme/products_cpt_register.php';
        
        
        // Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
        //add_filter('wpcf7_autop_or_not', '__return_false');
 
	}
endif;
add_action( 'after_setup_theme', 'dcube_theme_setup' );




#get_filtered_posts_fun defined here
function fetchPostUsingAjaxTabs()
{
    $taxonomy = "products-categories"; 
	$dyn_obj = $_POST['obj'];
	$dyn_cat = $dyn_obj["cat"];
	$dyn_paged = $dyn_obj["paged"];
	$dyn_offset = $dyn_obj["offset"];   

    $ajaxposts = new WP_Query([
		'post_type' => 'products',
        'orderby'    => 'ID',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => $dyn_paged,
        'offset'        => $dyn_offset,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => array( $dyn_cat )
            )
        )
	]);
	
	$response = "";
	if($ajaxposts->have_posts()) {
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();

        $permalink = get_the_permalink();
		$featureImg = get_the_post_thumbnail_url();
		$title = get_the_title();
        // $location = get_field('location', get_the_ID());
		
	
		$card_data = ' <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="inner">
                    <a href="'. $permalink .'">
                        <figure class="hero_image">
                            <img src="'. $featureImg .'" alt="">
                        </figure>
                    </a>
                    <h3 class="title">
                            '. $title .'
                            </h3>
                    <span>
                        Apps 055
                    </span>

                    <div class="downloadbtns">
                        <a href="">
                            DOWNLOAD 2D
                        </a>
                        <a href="">
                            DOWNLOAD 3D
                        </a>
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
