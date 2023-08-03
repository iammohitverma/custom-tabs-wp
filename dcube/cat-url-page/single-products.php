<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package dcube-theme

 */



?>


<div class="dcube_wrap">
    <div class="mainWrapper">
        <div class="left_sidebar">
            <?php get_sidebar(); ?>
        </div>
        <div class="right_main">
            <div class="tm__tabBox">
                <div class="btn_wrap">
                    <?php 
                        $taxonomy = "products-categories"; //this is custom taxonomy for products cpt
                        $post_id =  get_the_ID();
                        $category = get_the_terms($post_id, $taxonomy);
                        $specific_term_id;
                        $currCatName;
                        foreach ($category as $cat) {
                            if ($cat->parent) {
                                $specific_term_id = $cat->parent;
                                $currCatName = $cat->name;
                            }
                        }
    
                        $termchildren = get_term_children($specific_term_id, $taxonomy);
                        // echo "<pre>";
                        // print_r( $termchildren );
                        // echo "</pre>";
    
                        foreach ($termchildren as $child) {
                            $term = get_term_by('id', $child, $taxonomy);?>
                            <a class="tab_button <?php if($currCatName  == $term->name){echo 'is-checked';} ?>" href="/products-categories/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                        <?php
                        }
                    ?>
                </div>
                <div class="logoBox">
                    <figure class="logo">
                        <a href="./">
                            <img src="/wp-content/uploads/2023/08/logo.png" alt="">
                        </a>
                    </figure>
                </div>
            </div>
            <div class="container-fluid p-0" id="single-post">
                <div class="container">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/single/single', get_post_type());
                    endwhile; // End of the loop.
                    ?>
                    <div class="container">
                        <div class="single_main">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product_left">
                                        <h2><?php echo get_field('sku_heading'); ?></h2>
                                        <p><?php echo get_field('sku'); ?></p>
                                        <h3><?php echo get_field('overview_heading'); ?></h3>
                                        <ul>
                                            <li>
                                                <span>Product </span>
                                                <?php the_content(); ?>
                                            </li>
                                        </ul>
                                        <div class="product_bottom">
                                            <h3><?php echo get_field('tags_heading'); ?></h3>
                                            <ul>
                                                <?php

                                                // Check rows existexists.
                                                if (have_rows('tags')) :

                                                    // Loop through rows.
                                                    while (have_rows('tags')) : the_row();
                                                ?>
                                                        <li>
                                                            <span><?php echo get_sub_field('label'); ?>:</span>
                                                            <h6><?php echo get_sub_field('value'); ?></h6>
                                                        </li>
                                                <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id)); ?>
                                <div class="col-lg-7">
                                    <div class="product_img">
                                        <img class="img-fluid" src=" <?php echo $feat_image; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>