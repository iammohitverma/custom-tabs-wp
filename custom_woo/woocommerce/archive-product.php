<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

?>

<!-- shop hero start -->
<section class="shop_hero pt_100 pb_100">
    <div class="container">
        <div class="top">
            <div class="row">
                <div class="col-md-5">
                    <div class="text_wrap left" data-aos="fade-right">
                        <div class="heading left_arrow_heading">
                            <h1 class="cmn_fs_140">SHOP</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="text_wrap right" data-aos="fade-left"  data-aos-delay="400">
                        <p>Purchase some of small-batch  olive oil, lovingly created by our family run grove, shipped directly to your door.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop hero end -->

<!-- products listing start -->
<section class="products_listing cmn_flower_shape_v1">
    <div class="container">
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	// do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );
?>

	</div>
</section>
<!-- products listing end -->

<!-- delivery notes start -->
<section class="delivery_notes pt_60 pb_100 cmn_flower_shape_v2 top_right">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="img_wrap" data-aos="fade-up" data-aos-delay="0" data-aos-offset="200">
                    <img src="/wp-content/themes/CavesRoadOlives/assets/images/delivery_notes.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text_wrap" data-aos="fade-left" data-aos-delay="500" data-aos-offset="200">
                    <h2 class="cmn_sec_heading"> <span> Delivery </span> <br>  notes</h2>
                    <p class="cmn_sec_para">All olive oil is processed locally in Margaret River and then stored in Cottesloe, Perth WA. We offer free delivery in the Perth Metro region (within a 30km radius), or a flat $10 postage fee for all other locations. Please allow 3-5 working days for dispatch, or email us on info@cavesroadolives.com.au for queries.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- delivery notes end -->



<?php get_footer( 'shop' );
