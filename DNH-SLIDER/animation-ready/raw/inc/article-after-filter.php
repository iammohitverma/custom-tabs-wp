<?php
// ob_start();
global $post;
$article_slug = $_POST['article_slug'];

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

if($article_slug != 'all'){
$args = array(  
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 15, 
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'DESC',
    'tax_query'         => array(
        array(
            'taxonomy'  => 'category',
            'field'     => 'slug',
            'terms'     => $article_slug
        )
    )
);
}else{
  $args = array(  
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 15, 
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'DESC'
    );
}

$loop = new WP_Query( $args ); 
$totalPages = $loop->max_num_pages;
?>
<div class="article_response">
    <input type="hidden" class="article_slug_name" value="<?php echo $article_slug; ?>">
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
                <!--a href="<--?php echo $permalink; ?>">
                    Read More
                </a-->
            </div>
        </li>
        <?php endwhile; 
        wp_reset_query(); 
        ?>
    </ul>
</div>
<div class="ajax pagination">
    <?php
        for($i=1; $i<= $totalPages; $i++){ ?>
            <a href="javascript:void(0);" class="page-numbers" data-pageCount="<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

$(".page-numbers").on("click", function(){
    var article_slug_name = $(".article_slug_name").val();
    var article_page_count = $(this).attr("data-pageCount");
    if ($(".page-numbers").hasClass("disbaleElem")){
        $('.page-numbers').removeClass('disbaleElem')
    } else {
        $(this).addClass('disbaleElem');
    }
    
    jQuery.ajax({
        type: "post",
        url: "/wp-admin/admin-ajax.php",
        data: {
            action:'article_filter_paginate',
            article_slug_name: article_slug_name,
            article_page_count: article_page_count
        },
        success: function(result){
            $(".article_response").replaceWith(result);
        }
    });
})
</script>