<?php

    $taxonomy = "mvcategory"; //this is custom taxonomy  
                

    $parentCatSlug = 'team-a'; //dynamic parent cat slug (as per tabbing set)
    $parentCatObj = get_term_by('slug', $parentCatSlug, $taxonomy);
    $parentCatId = $parentCatObj->term_taxonomy_id; //parent id created according to your slug

    $termchildren = get_term_children( $parentCatId, $taxonomy ); //get childrens with parent id
    
    // for getting default first child cat slug
    $term_children_first = array_values($termchildren)[0];
    $term_children_first_obj = get_term_by( 'id', $term_children_first, $taxonomy );
    $firstChildCatSlug = $term_children_first_obj->slug;



    $args = array(
        'post_type' => 'team', //post for default
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' =>   $taxonomy, //taxonomy for default category is category 
                'field'    => 'slug',
                'terms'    => array( $firstChildCatSlug )
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











                /***********************/
                // for archive post start
                /***********************/
                $taxonomy_name = 'mvcategory';
                $obj = get_queried_object();
                echo "<pre>";
                print_r($obj);
                echo "</pre>";

                if($obj->parent == 0){
                    $term_id =  $obj->term_id;
                }else {
                    $term_id =  $obj->parent;
                }

                // get cat without childrens  (only direct categories)
                $taxonomies = get_terms(array(
                    'taxonomy' => $taxonomy_name,
                    'hide_empty' => false,
                    'parent' => $term_id,
                ));
                echo $term_id;
                echo "<pre>";
                print_r($taxonomies);
                echo "</pre>";
                foreach ( $taxonomies as $child ) { ?>
                <a class="tab_button' <?php if($obj->name == $child->name){echo 'is-checked';} ?>" href="/products-categories/<?php echo $child->slug; ?>"><?php echo $child->name; ?></a>
                <?php }



                // get cat with nested childrens  (with nested childrens categories) 
                // $termchildren = get_term_children( $term_id, $taxonomy_name );

                // echo '<ul>';
                // foreach ( $termchildren as $child ) {
                    // 	$term = get_term_by( 'id', $child, $taxonomy_name ); ID Base
                // 	echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
                // }
                // echo '</ul>';
                
                /***********************/
                // for archive post end
                /***********************/







                /***********************/
                // for single post start
                /***********************/
                $taxonomy_name = 'mvcategory'; //this is custom taxonomy for products cpt
                $post_id =  get_the_ID();
                $category = get_the_terms($post_id, $taxonomy_name);
                $specific_term_id;
                $currCatName;
                foreach ($category as $cat) {
                    if ($cat->parent) {
                        $specific_term_id = $cat->parent;
                        $currCatName = $cat->name;
                    }
                }
                if($specific_term_id == 0){ //if selected only parent cat,, parent cat has 0 val 
                    $specific_term_id = $cat->term_id;
                }
                echo "<pre>";
                print_r($category);
                echo "</pre>";
                echo $specific_term_id;
                

                $taxonomies = get_terms(array(
                    'taxonomy' => $taxonomy_name,   
                    'hide_empty' => false,
                    'parent' => $specific_term_id,
                ));
                echo "<pre>";
                print_r( $taxonomies );
                echo "</pre>";

                foreach ( $taxonomies as $child ) { ?>
                    <a class="tab_button' <?php if($obj->name == $child->name){echo 'is-checked';} ?>" href="/products-categories/<?php echo $child->slug; ?>"><?php echo $child->name; ?></a>
                <?php }


   
                // get cat with nested childrens  (with nested childrens categories) 
                // $termchildren = get_term_children( $specific_term_id, $taxonomy_name );//ID base 
                // echo "<pre>";
                // print_r( $termchildren );
                // echo "</pre>";

                // echo '<ul>';
                // foreach ( $termchildren as $child ) {
                //     	$term = get_term_by( 'id', $child, $taxonomy_name ); id base
                // 	echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
                // }
                // echo '</ul>';
                
                /***********************/
                // for single post end
                /***********************/

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

