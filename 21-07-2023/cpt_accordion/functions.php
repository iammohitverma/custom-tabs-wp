<?php

// In functions.php (you can create separate file for creating shortcodes) start
function custom_accordion_shortcode_func( $atts ) {
	$attributes = shortcode_atts( array(
		'accordion_item_id' => ''
	), $atts );
	
	ob_start();

	//include the file with args for which you want to create shortcode 
	get_template_part( 'inc/sc/custom_accordion_sc', null, $attributes ); 

	return ob_get_clean();

}
add_shortcode( 'custom_accordion_shortcode', 'custom_accordion_shortcode_func' );
// In functions.php (you can create separate file for creating shortcodes) end