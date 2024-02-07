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




// Another way
// slider_settings_shortcode_func
function slider_settings_shortcode_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/slider_settings_shortcode', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'slider_settings_shortcode', 'slider_settings_shortcode_func' );

