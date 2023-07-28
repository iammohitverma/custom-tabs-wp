<?php

/**
 * En Radishka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package En_Radishka
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.2');
}

if (!function_exists('en_radishka_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function en_radishka_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on En Radishka, use a find and replace
		 * to change 'en-radishka' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('en-radishka', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'en-radishka'),
			)
		);

		// add caret for submenus
		function radishka_menu_arrow($item_output, $item, $depth, $args) {
			if (in_array('menu-item-has-children', $item->classes)) {
				$arrow = '<span class="subMenuAngle"> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span>'; // Change the class to your font icon
				$item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
			}
			return $item_output;
		}
		add_filter('walker_nav_menu_start_el', 'radishka_menu_arrow', 10, 4);

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
				'en_radishka_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

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
endif;
add_action('after_setup_theme', 'en_radishka_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function en_radishka_content_width()
{
	$GLOBALS['content_width'] = apply_filters('en_radishka_content_width', 640);
}
add_action('after_setup_theme', 'en_radishka_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function en_radishka_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'en-radishka'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'en-radishka'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'en_radishka_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function en_radishka_scripts()
{
	wp_enqueue_style('en-radishka-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('en-owl-theme-default-min-css', 'https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('en-owl-carousel-min-css', 'https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css', array(), _S_VERSION);
	wp_style_add_data('en-radishka-style', 'rtl', 'replace');
    wp_enqueue_style('en-custom-style', get_template_directory_uri() . '/css/custom-style.css', array(), _S_VERSION);
	wp_enqueue_script('en-owl-carousel-js', 'https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js', array(), _S_VERSION);
	wp_enqueue_script('en-radishka-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('en-radishka-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
	wp_localize_script('en-radishka-main', 'en_radishka_AjaxObject', array(
        'ajax_url' => admin_url('admin-ajax.php')
	));
    wp_enqueue_script('en-custom-script', get_template_directory_uri() . '/js/custom-script.js', array(), _S_VERSION, true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'en_radishka_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// add wooocommerce theme supprt function

add_theme_support('woocommerce');

/**
 * Remove the breadcrumbs 
 */
add_action('init', 'woo_remove_wc_breadcrumbs');
function woo_remove_wc_breadcrumbs()
{
	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}

// popup cart product showing

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart()
{

	$varition_id = empty($_POST['varition_id']) ? '' : $_POST['varition_id'];
	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
	$quantity = empty($_POST['product_quantity']) ? 1 : wc_stock_amount($_POST['product_quantity']);
	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
	$product_status = get_post_status($product_id);
	$stock = get_post_meta($product_id, '_stock', true);
	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		if ($cart_item['product_id'] == $product_id) {
			WC()->cart->remove_cart_item($cart_item_key);
			break;
		}
	}

	if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $varition_id) && 'publish' === $product_status) {

		do_action('woocommerce_ajax_added_to_cart', $product_id);

		if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
			wc_add_to_cart_message(array($product_id => $quantity), true);
		}

		WC_AJAX::get_refreshed_fragments();
	} else {

		$data = "Out Of Stock";
		echo $data;
	}


	wp_die();
}

add_action('wp_ajax_remove_item_from_cart', 'remove_item_from_cart');
add_action('wp_ajax_nopriv_remove_item_from_cart', 'remove_item_from_cart');
function remove_item_from_cart()
{

	// $cart = WC()->instance()->cart;
	// $id = $_GET['product_id'];

	// $cart_id = $cart->generate_cart_id($id);
	// $cart_item_id = $cart->find_product_in_cart($cart_id);

	// if ($cart_item_id) {
	// 	$cart->set_quantity($cart_item_id, 0);
	// 	return true;
	// }
	// return false;
	// wp_die();



	ob_start();

	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		if ($cart_item['product_id'] == $_GET['product_id'] && $cart_item_key == $_GET['cartItemkey']) {
			WC()->cart->remove_cart_item($cart_item_key);
			WC_AJAX::get_refreshed_fragments();
		}
	}

	WC()->cart->calculate_totals();
	WC()->cart->maybe_set_cart_cookies();

	// woocommerce_mini_cart();

	// $mini_cart = ob_get_clean();

	// // Fragments and mini cart are returned
	// $data = array(
	// 	'fragments' => apply_filters('woocommerce_add_to_cart_fragments', array(
	// 		'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
	// 	)),
	// 	'cart_hash' => apply_filters('woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5(json_encode(WC()->cart->get_cart_for_session())) : '', WC()->cart->get_cart_for_session())
	// );

	// wp_send_json($data);

	wp_die();
}


/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
	global $woocommerce;

	ob_start();

?>
	<span class="cart-customlocation"> <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>
<?php
	$fragments['span.cart-customlocation'] = ob_get_clean();
	return $fragments;
}


add_action('wp_ajax_nopriv_contactUsformAjax', 'contactUsformAjax');
add_action('wp_ajax_contactUsformAjax', 'contactUsformAjax');
function contactUsformAjax()
{
	$firstName = sanitize_text_field($_POST['firstName']);
	$emailmsg = sanitize_email($_POST['email_msg']);
	$subjectmsg = sanitize_text_field($_POST['subject_msg']);
	$messagemsg = sanitize_text_field($_POST['message_msg']);
	if (!$emailmsg) {
		echo "<p class='text-danger text-center'>Enter valid email address!</p>";
	} else {
		$to = get_option('admin_email');
		$subject = $subjectmsg;
		$body = 'First Name: ' . $firstName . 
				'<br>Email: ' . $emailmsg.
				'<br>Subject: ' . $subjectmsg.
				'<br>Message: ' . $messagemsg;
		$headers = array('Content-Type: text/html; charset=UTF-8');

		$okay = wp_mail($to, $subject, $body, $headers);
		if ($okay) {
			echo "<p class='text-success text-center'>Message sent successfully!</p>";
		} else {
			echo "<p class='text-danger text-center'>Something went Wrong!</p>";
		}
	}
	wp_die();
}

// // Add WYSIWYG custom field in Variation Settings
// add_action('woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3);
// function variation_settings_fields($loop, $variation_data, $variation)
// {

// 	$text_area = get_post_meta($variation->ID, '_description2', true) ? get_post_meta($variation->ID, '_description2', true) : '';
// 	$args['textarea_rows'] = 6;

// 	echo '<p>' . __("Description 2", "woocommerce") . '</p>';

// 	wp_editor($text_area, "description2_$loop", $args);
// }
// // Save WYSIWYG custom field value as Variation post meta data
// add_action('woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2);
// function save_variation_settings_fields($variation_id, $loop)
// {
// 	if (isset($_POST["description2_$loop"]))
// 		update_post_meta($variation_id, '_description2', wp_kses_post($_POST["description2_$loop"]));
// }


/**
 * Adding variation specifications field
 * 
 * @param $loop
 * @param $variation_data
 * @param $variation
 */

// function demo_load_variation_fields($variations)
// {
// 	$variations['demo_variation_specs'] = get_post_meta(
// 		$variations['variation_id'],
// 		'_demo_variation_specs',
// 		true
// 	);

// 	return $variations;
// }

// function demo_product_variation_fields($loop, $variation_data, $variation)
// {
// 	// wp_enqueue_editor();

// 	woocommerce_wp_textarea_input(
// 		array(
// 			'id' => "demo_variation_specs{$loop}",
// 			'name' => "demo_variation_specs[{$loop}]",
// 			'value' => get_post_meta($variation->ID, '_demo_variation_specs', true),
// 			'label' => __('Specifications', 'woocommerce'),
// 			'desc_tip' => true,
// 			'description' => __('Some description.', 'woocommerce'),
// 			'wrapper_class' => 'form-row form-row-full',
// 		)
// 	);
// }

// function demo_save_product_variation_fields($variation_id, $loop)
// {
// 	$text_field = $_POST['demo_variation_specs'][$loop];

// 	update_post_meta($variation_id, '_demo_variation_specs', $text_field);
// }



// add_action('woocommerce_product_after_variable_attributes', 'demo_product_variation_fields', 10, 3);
// add_action('woocommerce_save_product_variation', 'demo_save_product_variation_fields', 10, 2);
// add_filter('woocommerce_available_variation', 'demo_load_variation_fields');

function demo_manage_admin_js()
{
	wp_enqueue_editor();

	$theme_version = wp_get_theme()->get('Version');

	wp_register_script(
		'variations-editor',
		get_bloginfo('stylesheet_directory') . '/js/variations-editor.js',
		array('jquery', 'quicktags'),
		$theme_version,
		true
	);

	wp_enqueue_script('variations-editor');
}

add_action('admin_enqueue_scripts', 'demo_manage_admin_js');


function add_custom_style_admin()
{
	echo '<style>
		.woocommerce-page .mce-notification-error{
			display: none!important;
	</style>';
}
add_action('admin_head', 'add_custom_style_admin');


// shipping

function custom_calculated_shipping()
{
	return 456465;
}

add_filter('woocommerce_package_rates', 'custom_shipping_rate_cost_calculation', 10, 2);
function custom_shipping_rate_cost_calculation($rates, $package)
{
	global $post;
	global $woocommerce;

	$final_shipping_rate = 0;

	if($woocommerce->customer->get_shipping_country() == 'AU'){
		$sm_size_ids = ['a4', '120cm-x-80cm'];
		$final_price = [];
		$final_price['water-color'] = ['qty'=> 0, 'price'=>0];
		$final_price['other-than-water-color-sm'] = ['qty'=> 0, 'price'=>0];
		$final_price['other-than-water-color-lg'] = ['qty'=> 0, 'price'=>0];
		$items = $woocommerce->cart->get_cart();

		foreach($items as $item){
			$size_attr_slug = $item['variation']['attribute_pa_size'];
			$terms = get_the_terms( $item['product_id'], 'product_cat' );
			if($terms[0]->slug == 'watercolour-print'){
				$final_price['water-color']['qty'] = $final_price['water-color']['qty'] + $item['quantity'];
				$final_price['water-color']['price'] = $final_price['water-color']['price'] + $item['line_total'];
			}else{
				if(in_array($size_attr_slug, $sm_size_ids)){
					$final_price['other-than-water-color-sm']['qty'] = $final_price['other-than-water-color-sm']['qty'] + $item['quantity'];
					$final_price['other-than-water-color-sm']['price'] = $final_price['other-than-water-color-sm']['price'] + $item['line_total'];
				}else{
					$final_price['other-than-water-color-lg']['qty'] = $final_price['other-than-water-color-lg']['qty'] + $item['quantity'];
					$final_price['other-than-water-color-lg']['price'] = $final_price['other-than-water-color-lg']['price'] + $item['line_total'];
				}
				
			}	
		}

		if(($final_price['water-color']['price'] < 120) && ($final_price['water-color']['price'] != 0)){
			$final_shipping_rate = $final_shipping_rate + 12.95;
		}
		if($final_price['other-than-water-color-sm']['price'] != 0){
			$final_shipping_rate = $final_shipping_rate + 25 + 5 * ($final_price['other-than-water-color-sm']['qty']-1);
		}
		if($final_price['other-than-water-color-lg']['price'] != 0){
			$final_shipping_rate = $final_shipping_rate + 40 + 20 * ($final_price['other-than-water-color-lg']['qty']-1);
		}

	}else{
		// international
		$final_price = [];
		$final_price['water-color'] = ['qty'=> 0, 'price'=>0];
		$items = $woocommerce->cart->get_cart();
		foreach($items as $item){
	
			$size_attr_slug = $item['variation']['attribute_pa_size'];
	
			$terms = get_the_terms( $item['product_id'], 'product_cat' );
			if($terms[0]->slug == 'watercolour-print'){
				$final_price['water-color']['qty'] = $final_price['water-color']['qty'] + $item['quantity'];
			}
		}
		$final_shipping_rate = $final_price['water-color']['qty'] * 25;
	}
	



	foreach ($rates as $rate_key => $rate) {
		if ('flat_rate' === $rate->method_id) {
			// Set Custom rate cost
			$rates[$rate_key]->cost = $final_shipping_rate;

		}
	}

	return $rates;
}



function is_block_international_user()
{
	global $post;
	global $woocommerce;
	if($woocommerce->customer->get_shipping_country() == 'AU'){

	$current_shipping_method = WC()->session->get( 'chosen_shipping_methods' );
	$shipping_method = $current_shipping_method[0];
	if($shipping_method == ""){
		return true;
	}else{
		return false;
	}

	// $total = $woocommerce->cart->total;
	$total = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->total) );
	$subtotal = $woocommerce->cart->get_subtotal();
	// print_r (explode("$",$subtotal));
	// print_r($total);
	
	// if($subtotal == $total){
	// 	return true;
	// }else{
		// return false;
	// }

		
	}else{	
		$final_price = [];
		$final_price['other-than-water-color'] = ['qty'=> 0];
		$items = $woocommerce->cart->get_cart();
	
		foreach($items as $item){
			$terms = get_the_terms( $item['product_id'], 'product_cat' );
			if($terms[0]->slug != 'watercolour-print'){
				$final_price['other-than-water-color']['qty'] = $final_price['other-than-water-color']['qty'] + $item['quantity'];				
			}	
		}
	
		if($final_price['other-than-water-color']['qty'] != 0){
			return true;
		}
		return false;
	}

}

// added by ridwan



function en_ra_custom_posttype()
{
    register_post_type(
        'homepage_slider',
        array(
            'labels' => array(
                'name' => __('Homepage Slider'),
                'singular_name' => __('Homepage Slider')
            ),
            'public' => true,
            "show_in_nav_menus" => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'excerpt','thumbnail')
        )
    );
  
}
add_action("init", "en_ra_custom_posttype");
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';


// added by ridwan


add_action( 'woocommerce_before_cart', 'bbloomer_check_category_in_cart' );
 
function bbloomer_check_category_in_cart() {
 
   // Set $cat_in_cart to false
   $cat_in_cart = false;
 
   // Loop through all products in the Cart
   foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
 
      // If Cart has category "download", set $cat_in_cart to true
      if ( has_term( 'original-oils', 'product_cat', $cart_item['product_id'] ) ) {
         $cat_in_cart = true;
         break;
      }
   }
 
   // Do something if category "download" is in the Cart
   if ( $cat_in_cart ) {
 
      echo '<script>
        setTimeout(function(){ 
		jQuery(".infoShipping").show();
            jQuery(".infoShipping").append("*Please enter your postcode to see accurate shipping options for Original Oils.");
			/* jQuery(".cart-collaterals").append("<div class=infoShipping>*Please enter your postcode to see accurate shipping options for Original Oils.</div>"); */
            jQuery(".cart-collaterals").addClass("infoShippingpadding");
        }, 1000)
      </script>';
 
      // Or maybe run your own function...
      // ..........
 
   }
}

// added by Sahil TM
// function hide_coupon_field_on_cart( $enabled ) {
// 	if ( is_cart() ) {
// 	  $enabled = false;
// 	}
// 	return $enabled;
//   }
  
//   add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_cart' );


/* */
add_action( 'woocommerce_checkout_before_customer_details', 'display_shipping_notice' );
function display_shipping_notice() {
    echo '<div class="shipping-notice-error shipping-notice woocommerce-message" role="alert" style="display:none">If you are shipping outside of Sydney, Australia, a custom shipping quote will be required. Please contact me to for shipping options and shipping quote prior to purchase. You can proceed with checkout and purchase the artwork through the website.  Your Original Oils artwork will be shipped to you once the quoted shipping fee has been paid.</div>';
}

add_action( 'woocommerce_after_checkout_form', 'show_shipping_notice_js' );
function show_shipping_notice_js(){
    ?>
    <script>
        jQuery(function($){
            var countryCode  = 'sydney', // Set the country code (That will display the message)
                cityField = 'input#billing_city', // The Field selector to target
                countryField = 'select#billing_country',
				stateField = 'select#billing_state'; // The Field selector to target
            
            function showHideShippingNotice( countryCode, cityField ){
                if( $(cityField).val() === countryCode && $(stateField).val() === "NSW" && $(countryField).val() === "AU"){
                    $('.shipping-notice').hide();
                }
                else {
                    $('.shipping-notice').show();
                }
            }

			function showHideShippingNoticecountry(countryField ){
                if( $(cityField).val() === countryCode && $(stateField).val() === "NSW" && $(countryField).val() === "AU"){
                    $('.shipping-notice').hide();
                }
                else {
                    $('.shipping-notice').show();
                }
            }

			function showHideShippingNoticestate(stateField ){
                if( $(cityField).val() === countryCode && $(stateField).val() === "NSW" && $(countryField).val() === "AU"){
                    $('.shipping-notice').hide();
                }
                else {
                    $('.shipping-notice').show();
                }
            }

            // On Ready (after DOM is loaded)
            showHideShippingNotice( countryCode, cityField );

            // On billing country change (Live event)
            $('form.checkout').on('focusout', cityField, function() {
                showHideShippingNotice( countryCode, cityField );
            });

			showHideShippingNoticecountry( cityField );

            // On billing country change (Live event)
            $('form.checkout').on('change', countryField, function() {
                showHideShippingNoticecountry(countryField );
            });

			showHideShippingNoticestate(stateField );

            // On billing country change (Live event)
            $('form.checkout').on('change', stateField, function() {
                showHideShippingNoticestate(stateField );
            });
        });
    </script>
    <?php
}