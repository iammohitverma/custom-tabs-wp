
<?php
// Function For  Add Value in Form Field
function dynamic_field_values ( $tag, $unused ) {

    if ( $tag['name'] != 'kit_type' )
        return $tag;

    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'product',
        'orderby'       => 'title',
        'order'         => 'ASC',
		'meta_key'      => 'product_in_stock',
		'meta_value'    => 'yes'
    );

    $custom_posts = get_posts($args);

    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {

        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $custom_post->post_title;
        $tag['labels'][] = $custom_post->post_title;

    }

    return $tag;

}

add_filter( 'wpcf7_form_tag', 'dynamic_field_values', 10, 2);