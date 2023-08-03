<?php
/**
 * The template for displaying front page
 *
 * (Home Page of Website)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dcube-theme
 */
get_header();
?>
<div class="" id="home-page">
    <div class="home_main">
        <div class="container">
            <div class="mainWrapper">
                <div class="left_sidebar">
                    <?php get_sidebar(); ?>
                </div>
                <div class="right_main">
                    <section class="first_banner">
                        <div class="container">
                            <div class="inner_wrap">
                                <div class="top_txt">
                                    <h1 class="main_hdng">D-Cube</h1>
                                    <p>Explore design scenarios curated by market
                                        and industry specificities.</p>
                                </div>
                                <div class="start_btn">
                                    <a href="#">Get Started</a>
                                </div>
                                <div class="bottom_txt">
                                    <h4>Leverage Data-Driven-Design for boundless possibilities.</h4>
                                    <p>D-Cube is a platform that hosts a variety of spatial thought-starters for diverse
                                        space typologies & work modes.<br>Insights from our data pool, inform our design
                                        recommendations.</p>
                                    <p>We are committed to delivering innovative solutions to our A&D partners.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="second_banner">
                        <div class="container">
                            <div class="inner_wrap">
                                <div class="top_txt">
                                    <h1 class="main_hdng">Get Started</h1>
                                </div>
                                <div class="boxes_main">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="<?php echo get_site_url().'/products-categories/workstation/'?>">
                                                <div class="box_main">
                                                    <h2>Workstation</h2>
                                                    <p>An individual's designated space for focused and productive work
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="<?php echo get_site_url().'/products-categories/individual-space/'?>">
                                                <div class="box_main">
                                                    <h2>Individual Space</h2>
                                                    <p>Spaces that offer privacy and seclusion for individual and/or
                                                        small
                                                        groups</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="<?php echo get_site_url().'/products-categories/collaboration/'?>">
                                                <div class="box_main">
                                                    <h2>Collaboration</h2>
                                                    <p>Spaces that foster teamwork, idea generation, and collaboration
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="<?php echo get_site_url().'/products-categories/social/'?>">
                                                <div class="box_main">
                                                    <h2>Social</h2>
                                                    <p>Spaces that promote relaxation, informal interactions and foster
                                                        relationships</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>

