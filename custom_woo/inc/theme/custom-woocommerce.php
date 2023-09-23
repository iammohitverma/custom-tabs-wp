<?php

// Update Shop Page Heading Tag And Add CSS Class
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
function woocommerce_template_loop_product_title()
{
    echo '<h3 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title title')) . '">' . get_the_title() . '</h6>';
}




//for featured image
add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => "full",
    'gallery_thumbnail_image_width' => "full",
    'single_image_width' => "full",
) );




/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'bc_remove_wc_breadcrumbs' );
function bc_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


// Remove the product description Title
add_filter( 'woocommerce_product_description_heading', '__return_null' );



// remove anchor from single product images
add_filter('woocommerce_single_product_image_thumbnail_html','wc_remove_link_on_thumbnails' );

function wc_remove_link_on_thumbnails( $html ) {
     return strip_tags( $html,'<div class="img_wrap"><img></div>' );
} 



/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 2;
  return $cols;
}