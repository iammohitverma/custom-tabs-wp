<?php
// In functions.php (you can create separate file for creating shortcodes) start
function mohit_test_shortcode_func( $atts ) {
	$attributes = shortcode_atts( array(
		'fname' => 'Mohit',
		'lname' => 'verma',
	), $atts );
	
	ob_start();

	//include the file with args for which you want to create shortcode 
	get_template_part( 'inc/sc/mohit_test_sc', null, $attributes ); 

	return ob_get_clean();

}
add_shortcode( 'mohit_test_shortcode', 'mohit_test_shortcode_func' );
// In functions.php (you can create separate file for creating shortcodes) end


