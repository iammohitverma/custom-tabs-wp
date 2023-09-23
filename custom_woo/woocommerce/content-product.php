<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' );
?>


<div class="product_wrap_full">
	<div class="row">
		<div class="col-lg-6">
			<div class="img_wrap" data-aos="zoom-in" data-aos-delay="800" data-aos-offset="0">
				<a href="<?php echo get_permalink();?>">
					<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
				</a>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="product_details" data-aos="fade-left" data-aos-delay="1200" data-aos-offset="0">
				<a href="<?php echo get_permalink();?>">
					<?php do_action( 'woocommerce_shop_loop_item_title' );?>
				</a>
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
					<h5>AUD <?php do_action( 'woocommerce_after_shop_loop_item_title' );?></h5> <!--== Display Price-->
					<?php do_action( 'woocommerce_after_shop_loop_item' );?> <!--== Display Cart Button-->
				</div>
			</div>
		</div>
	</div>
</div>