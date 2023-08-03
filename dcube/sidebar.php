<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dcube-theme
 */

?>


<div class="sidebarWrapper">
    <div class="logoBox sideBarLogo">
        <figure class="logo">
            <a href="./">
                <img src="/wp-content/uploads/2023/08/logo.png" alt="">
            </a>
        </figure>
    </div>
    <div class="tm__hamburger">
        <div class="three col">
            <div class="hamburger" id="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
            </div>
        </div>
    </div>
    <div class="sidebarMenu">
        <?php 
            // add this code where you want to show your menu  
            wp_nav_menu(
                array(
                    'theme_location'   =>     'header',
                    'menu'             =>     'sidebar-menu',
                    'menu_class'       =>     'sidebar-nav',
                    'menu_id'          =>     'sidebar-nav',
                    'container_class'  =>     'menu-wrapper',
                )
            )
        ?>
    </div>
</div>