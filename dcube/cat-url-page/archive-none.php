<?php

/**

 * Template when no post found in selected category/tags/author/date/month/day

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package dcube-theme

 */



?>



<div class="dcube_wrap">
    <div class="mainWrapper">
        <div class="left_sidebar">
            <?php get_sidebar(); ?>
        </div>
        <div class="right_main">
            <div class="tm__tabBox">
                <div></div>
                <div class="logoBox">
                    <figure class="logo">
                        <a href="./">
                            <img src="/wp-content/uploads/2023/08/logo.png" alt="">
                        </a>
                    </figure>
                </div>
            </div>
            <div class="error-404 not-found">
                <div class="container">
                    <div class="box">
                        <div class="inner">
                            <h1>404</h1>
                            <h2>Oops! Product not found</h2>
                            <p>Sorry, the Product you're looking for doesn't exist.</p>
                            <div class="btn-wrapper">
                                <a href="<?php echo get_site_url();?>" class="btn_primary">Home Page</a>
                                <button onclick="history.back()" class="btn_primary outline">Go Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- .error-404 -->
        </div>
    </div>
</div>

