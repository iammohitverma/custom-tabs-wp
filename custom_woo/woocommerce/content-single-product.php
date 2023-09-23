<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
// do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	// do_action( 'woocommerce_before_single_product_summary' );
	?>

	<!-- <div class="summary entry-summary"> -->
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		// do_action( 'woocommerce_single_product_summary' );
		?>
	<!-- </div> -->

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php
//  do_action( 'woocommerce_after_single_product' );
  ?>


<section class="single_product cmn_flower_shape_v2 top_right pt_100 pb_100">
	<div class="container">
		<div class="product_wrap_full">
			<div class="row">
				<div class="col-lg-6">
					
					<!-- <div class="slider owl-carousel owl-theme">
						<div class="item" data-hash="zero"><h4>1</h4></div>
						<div class="item" data-hash="one"><h4>2</h4></div>
						<div class="item" data-hash="two"><h4>3</h4></div>
						<div class="item" data-hash="tree"><h4>4</h4></div>
					</div>
					<div class="slider2 owl-carousel owl-theme">
						<a href="#zero" class="item" data-hash="zero"><h4>1</h4></a>
						<a href="#one" class="item" data-hash="one"><h4>2</h4></a>
						<a href="#two" class="item"data-hash="two"><h4>3</h4></a>
						<a href="#tree" class="item"data-hash="tree"><h4>4</h4></a>
					</div> -->

					<div class="product_slider_wrap">
						<div class="img_wrap product_single_image_slider" data-aos="zoom-in" data-aos-delay="800" data-aos-offset="0">
							<?php woocommerce_show_product_images()?>
						</div>
						<div class="product_thumb_image_slider">
							<?php woocommerce_show_product_images()?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product_details" data-aos="fade-left" data-aos-delay="1200" data-aos-offset="0">
					<h3 class="title"><?php woocommerce_template_single_title();?></h3>
						<p class="cmn_sec_para">
							<?php woocommerce_product_description_tab();?>
						</p>
						<ul>
							<?php
								global $product;
								$attributes = $product->get_attributes(); //for attributes
							?>
							<?php foreach ( $attributes as $product_attribute_key => $product_attribute ) : ?>
								<li <?php echo esc_attr( $product_attribute_key ); ?>>
									<div class="left">
										<p><?php echo wp_kses_post( $product_attribute['name'] ); ?></p>
									</div>
									<div class="right">
										<h4><?php echo wp_kses_post( $product_attribute['value'] ); ?></h4>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="add_to_cart">
                            <h5>AUD <?php woocommerce_template_single_price();?></h5>
							<?php do_action( 'woocommerce_after_shop_loop_item' );?> <!--== Display Cart Button-->
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- display related products -->
<?php woocommerce_output_related_products();?> 



