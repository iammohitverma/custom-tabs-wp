<?php

/* Template Name: Shop Template */

get_header();
?>


<!-- shop hero start -->
<section class="shop_hero pt_100 pb_100">
    <div class="container">
        <div class="top">
            <div class="row">
                <div class="col-md-5">
                    <div class="text_wrap left" data-aos="fade-right">
                        <div class="heading left_arrow_heading">
                            <h1 class="cmn_fs_140">SHOP</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="text_wrap right" data-aos="fade-left"  data-aos-delay="400">
                        <p>Purchase some of small-batch  olive oil, lovingly created by our family run grove, shipped directly to your door.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop hero end -->

<!-- products listing start -->
<section class="products_listing hero cmn_flower_shape_v1">
    <div class="container">
        <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12
                );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;
            } else {
                echo __( 'No products found' );
            }
            wp_reset_postdata();
        ?>
    </div>
</section>
<!-- products listing end -->

<!-- delivery notes start -->
<section class="delivery_notes pt_60 pb_100 cmn_flower_shape_v2 top_right">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="img_wrap" data-aos="fade-up" data-aos-delay="0" data-aos-offset="200">
                    <img src="/wp-content/themes/CavesRoadOlives/assets/images/delivery_notes.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text_wrap" data-aos="fade-left" data-aos-delay="500" data-aos-offset="200">
                    <h2 class="cmn_sec_heading"> <span> Delivery </span> <br>  notes</h2>
                    <p class="cmn_sec_para">All olive oil is processed locally in Margaret River and then stored in Cottesloe, Perth WA. We offer free delivery in the Perth Metro region (within a 30km radius), or a flat $10 postage fee for all other locations. Please allow 3-5 working days for dispatch, or email us on info@cavesroadolives.com.au for queries.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- delivery notes end -->

<?php get_footer();?>
