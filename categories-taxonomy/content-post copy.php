<?php

    $taxonomy = "mvcategory"; //this is custom taxonomy  (
    $args = array(
        'post_type' => 'team', //post for default
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' =>   $taxonomy, //taxonomy for default category is category 
                'field'    => 'slug',
                'terms'    => array('team-b')
            )
        )
    );
    $query = new WP_Query( $args );?>

    
<section class="post_sec">
    <div class="container">
        <div class="all_cats mb-5">
            <?php
                // $categories = get_categories(); //for default post's category
                // foreach( $categories as $category ) {
                //     echo $category->term_id . ', ' . $category->slug . ', ' . $category->name . '<br />';
                // }
                // echo "<pre>";
                // print_r( $categories);
                // echo "</pre>";




                
                // get categories from custom post type (taxonomy)
                // $args = array(
                //     'taxonomy' => $taxonomy,
                //     'orderby' => 'name',
                //     'order'   => 'ASC'
                // );
                // $cats = get_categories($args);
                // foreach($cats as $cat) {
                //     $catName = $cat -> name;
                //     $catSlug = $cat -> slug;
                //     $catTermId = $cat -> term_id;
                //     $catLink = get_category_link( $catTermId );
                // ?>
                <!-- //     <button class="btn btn-primary" data-filter="<?php // echo $catSlug;?>"><?php echo $catName;?></button> -->
                 <?php
                // }
                // echo "<pre>";
                // print_r( $cats);
                // echo "</pre>";




                // get child categories of parent category
                // $parentCatSlug = 'child-team-a';
                // $specific_term_obj = get_term_by('slug', $parentCatSlug, $taxonomy);
                // $specific_term_id = $specific_term_obj->term_taxonomy_id;
                // $termchildren = get_term_children( $specific_term_id, $taxonomy );
                // echo "<pre>";
                // print_r( $termchildren);
                // echo "</pre>";

                // echo '<ul>';
                // foreach ( $termchildren as $child ) {
                //     $term = get_term_by( 'id', $child, $taxonomy );
                //     echo '<li><a href="' . get_term_link( $child, $taxonomy ) . '">' . $term->name . '</a></li>';
                // }
                // echo '</ul>';
            ?>

        </div>
        <div class="all_posts">
            <div class="row">
                <?php if ( $query->have_posts() ) : 
                    while ( $query->have_posts() ) :
                        $query->the_post();
                        $title = get_the_title(); 
                        $featureImg = get_the_post_thumbnail_url(); 
                        $excerpt = get_the_excerpt(); 
                    ?>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="post_card">
                            <div class="img_box">
                                <img src="<?php echo $featureImg;?>" alt="">
                            </div>
                            <div class="details">
                                <h4><?php echo  $title;?></h4>
                                <p><?php echo $excerpt;?></p>
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
        </div>
    </div>
</section>

