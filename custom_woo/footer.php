<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CavesRoadOlives-theme
 */

?>

<footer>
    <div class="container">
        <div class="top">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php endif; ?>

                    <div class="contact_details_wrap">
                        <div class="left">
                            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                <?php dynamic_sidebar( 'footer-3' ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="right">
                            <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                                <?php dynamic_sidebar( 'footer-4' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="center">
            <?php if ( is_active_sidebar( 'footer-logo' ) ) : ?>
                <?php dynamic_sidebar( 'footer-logo' ); ?>
            <?php endif; ?>
        </div>
        <div class="bottom">
            <div class="copyright">
                <p>© 2023 Caves Road Olives. All rights reserved</p>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>


