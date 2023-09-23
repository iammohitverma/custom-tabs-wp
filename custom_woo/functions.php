<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'CavesRoadOlives_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function CavesRoadOlives_theme_setup() {
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

        function CavesRoadOlives_scripts() {
            wp_enqueue_style( 'CavesRoadOlives-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'CavesRoadOlives-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'CavesRoadOlives-font-style', get_template_directory_uri() . '/assets/fonts/aeonik/stylesheet.css',false, _JN_VERSION,'all');

            wp_enqueue_style( 'CavesRoadOlives-kepler-std-font-all-style', get_template_directory_uri() . '/assets/fonts/kepler-std-font/all/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-kepler-std-font-black-style', get_template_directory_uri() . '/assets/fonts/kepler-std-font/black/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-kepler-std-font-bold-style', get_template_directory_uri() . '/assets/fonts/kepler-std-font/bold/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-kepler-std-font-light-style', get_template_directory_uri() . '/assets/fonts/kepler-std-font/light/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-kepler-std-font-medium-style', get_template_directory_uri() . '/assets/fonts/kepler-std-font/medium/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-kepler-std-font-semibold-style', get_template_directory_uri() . '/assets/fonts/kepler-std-font/semibold/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-nelipot-vp-font-style', get_template_directory_uri() . '/assets/fonts/nelipot-vp-font/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-tarzana-narrow-font-style', get_template_directory_uri() . '/assets/fonts/tarzana-narrow-font/stylesheet.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'CavesRoadOlives-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-owl-theme-style', get_template_directory_uri() . '/assets/css/owl/owl_theme.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-aos-style', get_template_directory_uri() . '/assets/css/aos/aos.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'CavesRoadOlives-swiper-style', get_template_directory_uri() . '/assets/css/owl/swiper.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-mohit-style', get_template_directory_uri() . '/assets/css/scss/mohit/mohit-style.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'CavesRoadOlives-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'CavesRoadOlives-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'CavesRoadOlives-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'CavesRoadOlives-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'CavesRoadOlives-aos-script', get_template_directory_uri() . '/assets/js/aos/aos.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'CavesRoadOlives-swiper-script', get_template_directory_uri() . '/assets/js/owl/swiper.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'CavesRoadOlives-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'CavesRoadOlives-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );

        }
        add_action( 'wp_enqueue_scripts', 'CavesRoadOlives_scripts' );
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'CavesRoadOlives' ),
			'footer'  => __( 'Footer Menu', 'CavesRoadOlives' ),
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

        /* ------ customize woocommerce ------ */
        require get_template_directory() . '/inc/theme/custom-woocommerce.php';
        
        
        // Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
        //add_filter('wpcf7_autop_or_not', '__return_false');
 
	}
endif;
add_action( 'after_setup_theme', 'CavesRoadOlives_theme_setup' );

