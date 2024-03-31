<?php
global $post;

$categories = get_terms([
    'taxonomy' => 'role',
    'orderby'  => 'id',
    'order'    => 'ASC',
]);

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$args = array(  
    'post_type' => 'team',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'ASC',
);

$loop = new WP_Query( $args ); 
?>

<div class="team-container">
        <div class="filterBox">
<!--
            <h3 class="hdng">
                Meet Our Team
            </h3>
-->
            <div class="filterWrap">
                <span class="filter_parent">All</span>
                <div class="filter_dropdown">
                <div>
                <span data-slug="all" data-name="All">All</span>
                </div>
                    <?php foreach($categories as $cat){ ?>
                    <div>
                        <span data-slug="<?php echo $cat->slug; ?>" data-name="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        
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
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(".filterWrap").click(function(){
    $(this).toggleClass("show")
})

$(".filterWrap .filter_dropdown span").click(function(){
  
    var article_slug = $(this).attr("data-slug");
    var article_name = $(this).attr("data-name");
    $(this).closest(".filterWrap").find(".filter_parent").text(article_name);
    
    jQuery.ajax({
        type: "post",
        url: "/wp-admin/admin-ajax.php",
        data: {
            action:'team_filter_data',
            article_slug: article_slug
        },
        success: function(result){
            $(".team_wrap_tm").replaceWith(result);
        }
    });
})
</script>