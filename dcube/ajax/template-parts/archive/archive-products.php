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

                        // get parent category slug
                        $obj = get_queried_object();
                        $parent_cat_slug = $obj->slug;

                        // get child categories of parent category
                        $parentCatSlug = $parent_cat_slug;
                        $specific_term_obj = get_term_by('slug', $parentCatSlug, $taxonomy);
                        $specific_term_id = $specific_term_obj->term_taxonomy_id;
                        $termchildren = get_term_children( $specific_term_id, $taxonomy );

                        foreach ( $termchildren as $child ) {
                            $term = get_term_by( 'id', $child, $taxonomy );
                            echo '<button class="tab_button" data-cat="'. $term->slug .'">' . $term->name . '</button>';
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
            <div class="tm__productList">
                <div class="row product_row">
                        <?php                            
                            // for getting default first child cat slug
                            $term_children_first = array_values($termchildren)[0];
                            $term_children_first_obj = get_term_by( 'id', $term_children_first, $taxonomy );
                            $firstChildCatSlug = $term_children_first_obj->slug;
                            
                            $args = array(
                            'post_type' => 'products', //post for default
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' =>   $taxonomy, //taxonomy for default category is category 
                                    'field'    => 'slug',
                                    'terms'    => array( $firstChildCatSlug )
                                ))
                            );
                            $query = new WP_Query( $args );
                            ?>

                        <?php if ( $query->have_posts() ) : 
                            while ( $query->have_posts() ) :
                                $query->the_post();
                                $title = get_the_title(); 
                                $featureImg = get_the_post_thumbnail_url(); 
                                $permalink = get_the_permalink(); 
                        ?>


                            
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="inner">
                                        <a href="<?php echo $permalink;?>">
                                            <figure class="hero_image">
                                                <img src="<?php echo $featureImg;?>" alt="">
                                            </figure>
                                        </a>
                                        <h3 class="title">
                                            <?php echo  $title;?>
                                        </h3>
                                        <span>
                                            Apps 055
                                        </span>

                                        <div class="downloadbtns">
                                            <a href="">
                                                DOWNLOAD 2D
                                            </a>
                                            <a href="">
                                                DOWNLOAD 3D
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                            endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="card_placeholders_mv">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="placeholder_card"></div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="placeholder_card"></div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="placeholder_card"></div>
                            </div>
                        </div>
                    </div>
                    <div class="post_not_found">
                        <h4>No Post Found</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>