<?php


add_shortcode( 'justco_find_suite', 'justco_find_suite_shortcode_func' );
function justco_find_suite_shortcode_func( $atts ) {

    $atts = shortcode_atts(
		array(
			'for' => '',
		), $atts, 'justco_find_suite' );

    $findSuiteFor = $atts['for'];
    
?>

<div class="find_suite <?php echo $findSuiteFor?>">
        <!-- <form> -->
            <div class="inner">
                <label>
                    Find Your
                </label>
                <div class="input_wrap">
                    
    <!-- <select id="suite" name="suite">
                        <option value="" disabled readonly>Select Suite</option>
                        <option value="enterprise">Enterprise Office Suite</option>
                        <option value="meeting-rooms">Meeting Rooms</option>
                        <option value="hot-desks">Hot Desks</option>
                    </select> -->
    <select id="suite" name="suite">
        <option value="" disabled readonly>Select Suite</option>
        <?php
        $menu_name = 'suite';
                $menu_items = wp_get_nav_menu_items($menu_name);
                if ($menu_items) {
                    foreach ($menu_items as $menu_item) {
                        $value = esc_attr($menu_item->url);
                        $parsed_url = parse_url($value);
                        $suiteurl = isset($parsed_url['host']) ? $parsed_url['host'] . $parsed_url['path'] : $value;
                        $label = esc_html($menu_item->title);
                        echo '<option value="' . $suiteurl . '">' . $label . '</option>';
                    }
                }
        ?>
    </select>

                </div>
                <div class="input_wrap">
                    <select id="city" name="city">
        <option value="" disabled readonly>Select City</option>
                        <!-- <option value="sg">Singapore - Singapore</option>
                        <option value="au">Australia - Melbourne</option>
                        <option value="au">Australia - Sydney</option> -->
        <?php
        $menu_name = 'city';
                $menu_items = wp_get_nav_menu_items($menu_name);
                if ($menu_items) {
                    foreach ($menu_items as $menu_item) {
                        $value = esc_attr($menu_item->url);
                        $parsed_url = parse_url($value);
                        $cityurl = isset($parsed_url['host']) ? $parsed_url['host'] . $parsed_url['path'] : $value;
                        $label = esc_html($menu_item->title);
                        echo '<option value="' . $cityurl . '">' . $label . '</option>';
                    }
                }
        ?>
                    </select>
                </div>
                <div class="input_wrap">
    <a id="suiteurl" target="_blank" href="/">
                    <button type="submit">
    </button>
    </a>
                </div>
            </div>
        <!-- </form> -->
    </div> <!-- find_suite for desktop end -->
<script>
jQuery(document).ready(function() {
function updateHref() {
var suite = jQuery('#suite').val();
var city = jQuery('#city').val();
if(suite != null && city != null){
jQuery("#suiteurl").attr("href", "/" + city + "/" + suite);
}
}

jQuery('#suite, #city').on('change', updateHref);
updateHref(); // Call the function once to set the initial href
});

</script>
<?php

}

?>