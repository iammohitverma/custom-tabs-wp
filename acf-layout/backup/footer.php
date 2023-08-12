<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pyctherapeutics
 */

?>


<footer>
    <div class="top">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <a href="<?php echo get_site_url();?>" class="logo">
                            <img src="<?php echo get_theme_mod( 'logo_upload' ); ?>;" alt="footer logo">
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="footer_widget">
                            <h4 class="title">
                                <?php echo get_theme_mod( 'address_heading' ); ?>
                            </h4>
                            <p>
                                <?php echo get_theme_mod( 'address_text' ); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <?php if ( is_active_sidebar( 'footer-links' ) ) { ?>
                                <ul id="sidebar">
                                    <?php dynamic_sidebar('footer-links'); ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="footer_widget buttons">
                            <?php if ( is_active_sidebar( 'footer-buttons' ) ) { ?>
                                <?php dynamic_sidebar('footer-buttons'); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="left">
                    <p>
                        <?php echo get_theme_mod( 'copyright_text' ); ?>
                    </p>
                    <?php echo get_theme_mod( 'copyright_links' ); ?>                   
                </div>
                <div class="right">
                    <?php echo get_theme_mod( 'copyright_right' ); ?>                   
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

<script>
    $("#teamTabs li a").click(function(){
        console.log($(this).attr("data-id"));
        $cat_id = $(this).attr("data-id")

        $(".loading_wrapper").show();
        $(".teamTabs li a").removeClass("active");
        $(this).addClass("active");
        $.ajax({
            method: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'fetch_post_related_to_category',
                id: $cat_id,
            },
            success: function(response) {
                console.log(response);
                $("#replace-users").empty().html(response);
                $(".loading_wrapper").hide();
            }
        });
    })

    // announcement tabbing js 
    $("#announceTab li").click(function(){
        $(this).get(0).scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        $(".loading_wrapper").show();
        $(".teamTabs li a").removeClass("active");

        $(this).find('a').addClass("active");
        setTimeout(() => {
            $(".loading_wrapper").hide();
        }, 1000); // remove when ajax will setup
        // $.ajax({
        //     method: 'POST',
        //     url: '/wp-admin/admin-ajax.php',
        //     data: {
        //         action: 'fetch_post_related_to_category',
        //         id: $cat_id,
        //     },
        //     success: function(response) {
        //         console.log(response);
        //         $("#replace-users").empty().html(response);
        //         $(".loading_wrapper").hide();
        //     }
        // });
    })

    // dashboard tabbing js 
    $("#dashboardTab li").click(function(){
        $(this).get(0).scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        $(".loading_wrapper").show();
        $(".teamTabs li a").removeClass("active");

        $(this).find('a').addClass("active");
        setTimeout(() => {
            $(".loading_wrapper").hide();
        }, 1000); // remove when ajax will setup
        // $.ajax({
        //     method: 'POST',
        //     url: '/wp-admin/admin-ajax.php',
        //     data: {
        //         action: 'fetch_post_related_to_category',
        //         id: $cat_id,
        //     },
        //     success: function(response) {
        //         console.log(response);
        //         $("#replace-users").empty().html(response);
        //         $(".loading_wrapper").hide();
        //     }
        // });
    })
</script>

