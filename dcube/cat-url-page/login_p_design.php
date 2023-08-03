<?php



/* Admin Login Logo Link URL  */

if (!function_exists('admin_login')) :

    function admin_login()

    {

        return home_url();

    }

    add_filter('login_headerurl', 'admin_login');



    function login_page_design()

    {

?>

        <style type="text/css">

            body.login {

                background: url(<?php echo get_template_directory_uri() . "/assets/images/login_bg.jpg" ?>) center / cover #000;

                position: relative;

                z-index: 1;

            }



            body.login::before {

                content: "";

                position: absolute;

                left: 0;

                right: 0;

                bottom: 0;

                top: 0;

                background: url(<?php echo get_site_url();?>/wp-content/uploads/2023/08/banner_home.jpg) no-repeat center / cover;

                z-index: -1;

            }



            body.login h1 a {

                background-image: url(<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>);
                background-size: 134px !important;
                width: auto !important;

                margin: 0;

                padding: 0;

                /* background-size: contain; */



            }



            #login {

                width: 100% !important;

                max-width: 400px;

            }



            .login form {

                background: #fff;

                border-radius: 5px;

            }



            .login form input:focus {

                box-shadow: 0 0 3px 0px #2699fb !important;

            }



            .login label {

                font-weight: 500;

                font-size: 16px;

                margin-bottom: 5px;

            }



            .login #nav,

            .login #backtoblog {

                padding: 0 !important;

            }



            .login #nav a,

            .login #backtoblog a {

                background: #2699fb !important;

                color: #fff !important;

                padding: 10px;

                border-radius: 5px;

                font-weight: 500;

                display: block;

                text-align: center;

                font-size: 16px;

                transition: 0.3s;

                border: 1px solid #2699fb;

            }



            .login #nav a:hover,

            .login #backtoblog a:hover,

            .login #nav a:focus,

            .login #backtoblog a:focus {

                background: #fff !important;

                color: #2699fb !important;

                box-shadow: 0 0 5px 0px #2699fb, 0 0 3px 0px rgb(255 255 255 / 80%) !important;

            }



            .login form input[type="submit"] {

                background: #2699fb;

                color: #fff;

                font-weight: 600;

                transition: 0.3s;

                border: 1px solid #2699fb;

            }



            .login form input[type="submit"]:hover,

            .login form input[type="submit"]:focus {

                color: #2699fb;

                background: #f5f5f5;

                border-color: #2699fb !important;

                box-shadow: 0 0 5px 0px #2699fb, 0 0 3px 0px rgb(255 255 255 / 80%) !important;

            }



            .login .button.wp-hide-pw {

                color: #2699fb !important;

            }

        </style>

<?php

    }

    add_action('login_enqueue_scripts', 'login_page_design');



endif;

