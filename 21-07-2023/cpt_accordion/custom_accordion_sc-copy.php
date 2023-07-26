<?php

    // get value from shortcode
    $args = wp_parse_args(
        $args, 
        $attributes
    );

    $accordion_item_id = $args['accordion_item_id'];

    $the_query = new WP_Query( array(
        'p' => $accordion_item_id,
        'post_type' => 'accordion',
    ) );

    while ( $the_query->have_posts() ) :
        $the_query->the_post();
        $title = get_the_title();
    ?>

<h1><?php echo $title;?></h1>

<div class="custom_accordion_wrap">
    <div class="inner">
        <ul>
            <?php
            $accordion_repeater_field_name  = 'accordions';
            if( have_rows($accordion_repeater_field_name) ): ?>
                <?php while( have_rows($accordion_repeater_field_name) ): the_row(); 
                    $accordionItemTitle = get_sub_field('title');
                    $accordionItemDesc = get_sub_field('content');
                    ?>
                    <li class="accordion_item">
                        <div class="accordion_head">
                            <span class="icon"></span>
                            <h4><?php echo $accordionItemTitle;?></h4>
                        </div>
                        <div class="accordion_body">
                            <div class="inner">
                                <p><?php echo $accordionItemDesc;?></p>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>    
    </div>
</div>

<?php
    // Show Posts ...
    endwhile;

    /* Restore original Post Data 
    * NB: Because we are using new WP_Query we aren't stomping on the 
    * original $wp_query and it does not need to be reset.
    */
    wp_reset_postdata();
?>

