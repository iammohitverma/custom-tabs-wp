<?php
global $post;
$article_slug = $_POST['article_slug'];

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
if($article_slug != 'all'){
$args = array(  
    'post_type' => 'team',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'ASC',
    'tax_query'         => array(
        array(
            'taxonomy'  => 'role',
            'field'     => 'slug',
            'terms'     => $article_slug
        )
    )
);
}else{
  
  $args = array(  
    'post_type' => 'team',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'ASC'
);
  
}

$loop = new WP_Query( $args ); 
?>
<div class="team_wrap_tm">
    <ul>
        <?php  while ( $loop->have_posts() ) : $loop->the_post(); 
            $excerpt = get_the_excerpt();
            $featured_image_id = get_post_thumbnail_id();
            $featured_image_url = wp_get_attachment_image_src($featured_image_id, 'full');
            if($featured_image_url == ""){
                $featured_image = "/wp-content/themes/divi-child/images/placeholder.png";
            }else{
                $featured_image = $featured_image_url[0];
            }
            $permalink = get_permalink();
            $terms = get_the_terms(get_the_ID(), 'role');
            $categories = array();
            foreach ($terms as $term) {
                $categories[] = $term->name; 
            }
            $all_categories = implode(', ', $categories);
             $category_name = get_post_custom_values( 'category_name' );
        ?>
       <li>
       <a href="<?php echo $permalink; ?>">
                    <figure>
                        <img src="<?php echo $featured_image;?>" alt="">
                    </figure>
                    <h3 class="hdng">
                        <?php echo $post->post_title; ?>
                    </h3>
                    <p class="cat">
                       <?php echo $excerpt;?>
                    </p>
                    <p class="pos">
                        <?php echo $category_name[0]; ?>
                    </p>
                    </a>
                </li>
        <?php endwhile; ?>
    </ul>
</div>