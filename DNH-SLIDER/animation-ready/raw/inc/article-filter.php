<?php
global $post;

$categories = get_terms([
    'taxonomy' => 'category'
]);

// Get category from URL parameter
$category_slug = isset($_GET['category']) ? $_GET['category'] : '';


$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$args = array(  
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 15, 
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'DESC',
);

// If category is specified in URL, add category filter to query
if (!empty($category_slug) && $category_slug != 'all') {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category_slug
        )
    );
}

$loop = new WP_Query( $args ); 
?>

<div class="post_container">
    <div class="inner">
        <div class="filterBox">
<!--
            <h3 class="hdng">
                Meet Our Team
            </h3>
-->
            <div class="filterWrap">
                <?php
                 // Check if category name is available
                 if (!empty($category_slug)) {
                   $cat = get_term_by( 'slug', $category_slug, 'category');

                     // If category name is available, store it in a variable
                     $filter_text = ucfirst($cat->name);
                 } else {
                     // If category name is not available, set filter text to "All"
                     $filter_text = 'All';
                 }
                 ?>
                 
                 <span class="filter_parent"><?php echo $filter_text; ?></span>
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
        <div class="article_response">
            <ul>
                <?php  while ( $loop->have_posts() ) : $loop->the_post(); 
                    $excerpt = get_the_excerpt();
                    $limited_excerpt = substr($excerpt, 0, 100);
                    $featured_image_id = get_post_thumbnail_id();
                    $featured_image_url = wp_get_attachment_image_src($featured_image_id, 'full');
                    if($featured_image_url == ""){
                        $featured_image = "/wp-content/themes/divi-child/images/placeholder.png";
                    }else{
                        $featured_image = $featured_image_url[0];
                    }
                    $permalink = get_permalink();
                    
                    $postdate = $post->post_date;
                    $newDate = date("M d, Y", strtotime($postdate));

                    $terms = get_the_terms(get_the_ID(), 'category');
                    $categories = array();
                    foreach ($terms as $term) {
                        $categories[] = $term->name; 
                    }
                    $all_categories = implode(', ', $categories);
                ?>
                <li>
                    <a href="<?php echo $permalink; ?>">
						<figure>
							<img src="<?php echo $featured_image;?>" alt="">
						</figure>
					</a>
                    <div class="cntntBox">
                        <a href="<?php echo $permalink; ?>">
                        <h3 class="hdng">
                            <?php echo $post->post_title; ?>
                        </h3>
                        </a>
                        <p class="date-cat">
                            <?php echo $newDate; ?> | <?php echo $all_categories;?>
                        </p>
                        <div class="desc">
                            <?php echo $limited_excerpt . '...'; ?>
                        </div>
<!--
                        <a href="<?php echo $permalink; ?>">
                            Read More
                        </a>
-->
                    </div>
                </li>
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </ul>
            
            <div class="pagination">
                <?php
                $big = 999999999;
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' =>  $loop->max_num_pages
                ) );
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {

    
$(".filterWrap").click(function(){
    $(this).toggleClass("show")
})

$(".filterWrap .filter_dropdown span").click(function(){
    var article_slug = $(this).attr("data-slug");
    var article_name = $(this).attr("data-name");
    $(this).closest(".filterWrap").find(".filter_parent").text(article_name);
    $(".ajax.pagination").remove(); //only this line added by mohit 
    
    
    jQuery.ajax({
        type: "post",
        url: "/wp-admin/admin-ajax.php",
        data: {
            action:'article_filter_data',
            article_slug: article_slug
        },
        success: function(result){
            $(".article_response").replaceWith(result);
        }
    });
})
});


</script>