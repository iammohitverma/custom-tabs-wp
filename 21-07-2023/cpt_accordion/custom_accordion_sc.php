<?php

    // get value from shortcode
    $args = wp_parse_args(
        $args, 
        $attributes
    );

    $accordion_item_id = $args['accordion_item_id'];
    $singlePost = get_post( $accordion_item_id ); 
    $title = $singlePost->post_title;
?>


<h2><?php echo $title; ?></h2>

<div class="custom_accordion_wrap">
    <div class="inner">
        <ul>
            <?php
            $accordion_repeater_field_name  = 'accordions';
            $accordionData = get_field( $accordion_repeater_field_name, $accordion_item_id );
            if($accordionData){
                foreach ($accordionData as $data) {
                    $accordionItemTitle = $data['title'];
                    $accordionItemDesc = $data['content'];
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
                    <?php
                }  
            } ?>
        </ul>    
    </div>
</div>