<?php
// Define the custom post type and category 
$custom_post_type = 'current_openings';
$category1 = 'current-opening';
$category2 = 'internships';

// WP_Query  for the first category
$query1 = new WP_Query(array(
    'post_type' => $custom_post_type,
    'tax_query' => array(
        array(
            'taxonomy' => 'opening-category',
            'field' => 'slug',
            'terms' => $category1,
        ),
    ),
    'posts_per_page' => -1, 
));

// WP_Query for the second category
$query2 = new WP_Query(array(
    'post_type' => $custom_post_type,
    'tax_query' => array(
        array(
            'taxonomy' => 'opening-category', 
            'field' => 'slug',
            'terms' => $category2,
        ),
    ),
    'posts_per_page' => -1, 
));
?>
<div class="Current_Openings post_listings filter">
	<h3 class="heading-title"><strong><span style="font-family: Nunito;">Current Openings</span></strong></h3>
<?php if ($query1->have_posts()) : ?>
        <?php while ($query1->have_posts()) : $query1->the_post(); ?>
            <div id="co_listing_id">
                <div class="post_wrap">
                    <div class="inner">
                        <div class="left">
                            <h6><?php the_title(); ?></h6>
                            <p><?php the_content(); ?></p>
                            <span><a href="/career-openings-jo/"></a></span>
                        </div>
                        <div class="right">
                            <p><?php //echo get_the_term_list(get_the_ID(), 'opening-category'); ?></p>
                            <a href="/careers/application-requirements" class="hoverableIcon">
                                <span class="text"> APPLY NOW </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>   
<?php else : ?>
    <div class="no-post-wrapper first">
        <div>
            <p>Unfortunately, we have no current openings at the moment.</p>
            <a href="/careers/application-requirements">EXPLORE REQUIREMENTS</a>
        </div>
    </div>
<?php endif;

wp_reset_postdata();
?>
</div>
<div class="Current_Openings post_listings filter mt-30">
	<h3 class="heading-title"><strong><span style="font-family: Nunito;">Internships</span></strong></h3>
<?php if ($query2->have_posts()) : ?>  
        <?php while ($query2->have_posts()) : $query2->the_post(); ?>
            <div id="co_listing_id">
                <div class="post_wrap">
                    <div class="inner">
                        <div class="left">
                            <h6><?php the_title(); ?></h6>
                            <p><?php the_content(); ?></p>
                            <span><a href="/career-openings-jo/"></a></span>
                        </div>
                        <div class="right">
                            <p><?php //echo get_the_term_list(get_the_ID(), 'opening-category'); ?></p>
                            <a href="/careers/internship-opportunities/" class="hoverableIcon">
                                <span class="text"> LEARN MORE </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
<?php else : ?>
    <div class="no-post-wrapper first">
        <div>
            <p>Unfortunately, we have no internships at the moment.</p>
            <a href="/careers/internship-opportunities/">EXPLORE REQUIREMENTS</a>
        </div>
    </div>
<?php endif;

wp_reset_postdata();
?>
</div>