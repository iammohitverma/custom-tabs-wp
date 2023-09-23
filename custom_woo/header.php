<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CavesRoadOlives-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-pageId="<?php echo get_the_id() ?>">
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header>
            <div class="container">
                <div class="inner">
                    <div class="logo">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            
                            //   if logo image does'nt exist call site title and tagline
                            if ( has_custom_logo() ) {
                                the_custom_logo();
                            } else {?>
                                <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                                <!-- <p><?php bloginfo('description'); ?></p> -->
                            <?php
                            }
                        ?>
                    </div>

                    <div class="right">
                        <button class="toggle-menu"></button>

                        <div class="navigationWrap desktop">
                            <?php
                                wp_nav_menu(  array(
                                    'menu'              => "primary", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                                    'menu_class'        => "main-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                    'menu_id'           => "primary-menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                                    'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                    'theme_location'    => "header", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                                    'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
                                    'after'                => '</div>', // (string) Text after the link text.
                                ) );
                            ?>
                        </div>

                        <div class="cart_btn_wrap">
                            <button class="cart_btn">
                                <i>
                                    <img src="/wp-content/uploads/2023/09/cart_icon.png" alt="cart-icon">
                                </i>
                                <span class="text"> Cart </span>
                                <span class="count">(0)</span>
                            </button>
                        </div>
                    </div>
                    <div class="navigationWrap mobile">
                            <?php
                                wp_nav_menu(  array(
                                    'menu'              => "primary", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                                    'menu_class'        => "main-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                    'menu_id'           => "primary-menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                                    'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                    'theme_location'    => "header", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                                    'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
                                    'after'                => '</div>', // (string) Text after the link text.
                                ) );
                            ?>
                        </div>
                </div>
            </div>
        </header>

