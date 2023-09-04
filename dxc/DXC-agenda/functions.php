<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dxc_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dxc_theme_setup() {
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

        function dxc_scripts() {
            wp_enqueue_style( 'dxc-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'dxc-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dxc-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'dxc-font-style', get_template_directory_uri() . '/assets/fonts/aeonik/stylesheet.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'dxc-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'dxc-swiper-style', get_template_directory_uri() . '/assets/css/owl/swiper.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'dxc-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dxc-open-sans', get_template_directory_uri() . '/assets/fonts/open-sans/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dxc-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dxc-agenda-style', get_template_directory_uri() . '/assets/css/agenda_sec.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'dxc-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'dxc-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'dxc-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'dxc-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'dxc-swiper-script', get_template_directory_uri() . '/assets/js/owl/swiper.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'dxc-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'dxc-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );

        }
        add_action( 'wp_enqueue_scripts', 'dxc_scripts' );
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'dxc' ),
			'footer'  => __( 'Footer Menu', 'dxc' ),
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
        
        
        // Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
        //add_filter('wpcf7_autop_or_not', '__return_false');
 
	}
endif;
add_action( 'after_setup_theme', 'dxc_theme_setup' );


// In functions.php (you can create separate file for creating shortcodes) start
function agenda_tabs_shortcode_func( $atts ) {
	$attributes = shortcode_atts( array(), $atts );
	
	ob_start();

	//include the file with args for which you want to create shortcode 
	get_template_part( 'inc/sc/agenda_tabs_sc', null, $attributes ); 

	return ob_get_clean();

}
add_shortcode( 'agenda_tabs_sc', 'agenda_tabs_shortcode_func' );
// In functions.php (you can create separate file for creating shortcodes) end