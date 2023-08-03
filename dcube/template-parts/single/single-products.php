<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dcube-theme
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
if (has_post_thumbnail( $post->ID ) ): 
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
   
endif;
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
                        
                        // get parent cat id from current post                        
                        $post_id =  get_the_ID();
                        $category = get_the_terms( $post_id, $taxonomy);     
                        $specific_term_id;
                        foreach ( $category as $cat){
                            if($cat->parent) {
                                $specific_term_id = $cat->parent;
                            }
                        }
                        
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
        </div>
    </div>
</div>