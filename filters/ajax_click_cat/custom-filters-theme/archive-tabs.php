<?php
    get_header();
?>


<section class="tabs_sec">
    <?php
        $cat_taxonomy = "tabs_post_cat"; //this is custom taxonomy for cat

        $args = array(
            'post_type' => 'tabs',
            'posts_per_page' => 8 
        );

        // the query
        $query = new WP_Query( $args );
    ?>

    <div class="container">
        <div class="tab_btns">
            <?php
                 // get categories from custom post type (taxonomy)
                 $args = array(
                     'taxonomy' => $cat_taxonomy,
                     'orderby' => 'name',
                     'order'   => 'ASC'
                    );
                $cats = get_categories($args);
                foreach($cats as $cat) {
                    $catName = $cat -> name;
                    $catSlug = $cat -> slug;
                    $catTermId = $cat -> term_id;
                    $catLink = get_category_link( $catTermId );
                ?>
                    <button class="btn btn-primary" data-filter="<?php echo $catSlug;?>"><?php echo $catName;?></button> 
            <?php  
                }
            ?>
        </div>
        <div class="tab_content_wrap">
            <div class="row post_row">
                
                <?php if ( $query->have_posts() ) : ?>

                    <!-- start of the loop. the_post() sets the global $post variable -->
                    <?php while ( $query->have_posts() ) : $query->the_post(); 
                        
                        $post_count = $query->found_posts; 
                    ?>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="post_card">
                            <div class="img_box">
                                <img src=" <?php the_post_thumbnail_url(); ?>" alt=" <?php the_title(); ?>">
                            </div>
                            <div class="details">
                                <h3>
                                    <a href="<?php the_permalink();?>"> 
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p> <?php the_excerpt(); ?> </p>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?> <!-- end of the loop -->

                <?php else: ?>

                <?php _e( 'Sorry, no posts matched your criteria.' ); ?>

                <?php endif; ?>
                <!-- reset global post variable. After this point, we are back to the Main Query object -->
                <?php wp_reset_postdata(); ?>
            </div>
           
            <div class="card_placeholders_mv" style="display:none;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <div class="placeholder_card"></div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <div class="placeholder_card"></div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <div class="placeholder_card"></div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <div class="placeholder_card"></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                if($post_count > 8){
                ?>
                    <div class="loadMoreWrap">
                        <button class="loadMore">Load More</button>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>
</section>

<?php
    get_footer();
?>

<script>
    jQuery(document).ready(function(){
        jQuery(".tabs_sec .tab_btns button").eq(0).addClass("active");
        jQuery(".tabs_sec .tab_btns button").click(function(){
            jQuery(".tabs_sec .tab_btns button").removeClass("active");
            jQuery(this).addClass("active");
            let currBtn = jQuery(this).attr("data-filter");
            jQuery(".tab_content_wrap .post_row").html("");
            jQuery(".card_placeholders_mv").show();
            jQuery(".loadMoreWrap").hide();
            setTimeout(() => {
                ajaxRunOnClickFun(currBtn);
            }, 1000);
        });


        let pageCount=1;
        let postOffset = 0; //global offset
        let postsPerPage = 8 //post per page

        function ajaxRunOnClickFun(currActive) {
            postOffset = 0; //after click we want all posts from 0 offset at initial state

            var dataObj = {
                cat: currActive,
                paged: postsPerPage,  //fetch 8 post from Wp and append 
                offset: postOffset,
            };
            $.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                dataType: "HTML",
                data: {
                    action: "fetchPostUsingAjax",
                    obj: dataObj,
                },
                success: function (res) {
                    if (res != 0) {
                        console.log(data);
                        var data = JSON.parse(res); // Parse the JSON response
                        var postCount = data.post_count;
                        var htmlContent = data.html;
                        if(postCount>8){
                            jQuery(".loadMoreWrap").show();
                        }else {
                            jQuery(".loadMoreWrap").hide();
                        }
                        jQuery(".tab_content_wrap .post_row").html(htmlContent);
                        jQuery(".card_placeholders_mv").hide();
                    } else {
                        console.log("No data found");
                        jQuery(".card_placeholders_mv").hide();
                    }
                },
            });
            pageCount=1;
        } //end ajaxRunOnClickFun


         // with load more btn click
        jQuery('.loadMore').on('click', function() {
            let currBtn = jQuery(".tabs_sec .tab_btns button.active").attr("data-filter");
            jQuery(".card_placeholders_mv").show();
            jQuery(".loadMoreWrap").hide();
            setTimeout(() => {
                loadMoreFun(currBtn);
            }, 1000);
        }); 
        function loadMoreFun(currActive) {
            postOffset = postsPerPage * pageCount;
            pageCount++;

            var dataObj = {
                cat: currActive,
                paged: postsPerPage,  //fetch 8 post from Wp and append 
                offset: postOffset,
            };
            $.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                dataType: "HTML",
                data: {
                    action: "fetchPostUsingAjax",
                    obj: dataObj,
                },
                success: function (res) {
                    if (res != 0) {
                        console.log(res);
                        var data = JSON.parse(res); // Parse the JSON response
                        var postCount = data.post_count;
                        var htmlContent = data.html;
                        if(postCount>8){
                            jQuery(".loadMoreWrap").show();
                        }else {
                            jQuery(".loadMoreWrap").hide();
                        }
                        jQuery(".tab_content_wrap .post_row").append(htmlContent);
                        jQuery(".card_placeholders_mv").hide();
                    } else {
                        console.log("No data found");
                        jQuery(".card_placeholders_mv").hide();
                    }
                },
            });
        }//end load more

    });
</script>