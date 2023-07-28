<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package En_Radishka
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() .
     "/css/style.css"; ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() .
     "/css/image-zoom.css"; ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() .
     "/css/bootstrap.min.css"; ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e(
      "Skip to content",
      "en-radishka"
  ); ?></a>
		<div class="loading"></div>
		<!--Header -->

		<!--Socail Mega Menu-->

		<div class="social-wrapper" style="height: 2px;">
			<div class="social-bg">
				<div class="social-height">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-5 col-sm-12 social-part-one">
								<div class="row header-contacts-left">
									<div class="content-title">
										<h6>Contact Me</h6>
									</div>
									<div class="spo-text-area">
										<p>
											<strong>Email</strong>
											<br>
											<a href="mailto:radishka@radishka.com"><i class="fa fa-envelope"></i> radishka@radishka.com</a>
										</p>

									</div>
								</div>
								<div class="footer-widget" style="padding-left: 65px">
									<aside id="themeworm_social-4" class="widget widget-themeworm_social">
										<h6 class="content-title"><span>Follow Us</span></h6>

										<div class="social-widget-inner">
											<a href="https://www.facebook.com/RadishkasArt" target="_blank">
												<i class="fa fa-facebook"></i>
											</a>
											<a href="https://www.instagram.com/radishka_art/" target="_blank">
												<i class="fa fa-instagram"></i>
											</a>
										</div>
									</aside>
								</div>
								<aside id="themeworm_author-3" class="widget author-meta header-widget-auther-meta">
									<h6 class="content-title text-white"><span>Bio</span></h6>
									<div class="author-description text-white">
										Radishka is a Sydney based Australian contemporary artist, who’s
										beautiful figurative works in oil, acrylics and water colours have
										captivated the attention of many.</div>
								</aside>
							</div>
							<div class="col-lg-6 col-md-7 col-sm-12 social-part-two">
								<div class="header-contacts-right">
									<h6 class="text-white mb-4">
										<span>Send a message</span>
									</h6>
									<!-- <div class="form-group">
										<label for="name">Your Name(required) </label>
										<input type="name" class="form-control require" id="firstName" placeholder="">
										<span class="cp-font-size text-center text-danger firstname-msg"></span>

									</div>
									<div class="form-group">
										<label for="email">Your Email(required)</label>
										<input type="email" class="form-control require" id="email-msg" aria-describedby="emailHelp" placeholder="">
										<span class="cp-font-size text-center text-danger email-msg"></span>
									</div>
									<div class="form-group">
										<label for="subject">Subject</label>
										<input type="subject" class="form-control" id="subject-msg" placeholder="">
									</div>
									<div class="form-check mb-3 pl-0">
										<label for="message">Your Message(required)</label>
										<textarea class="form-control" id="message-msg" rows="3"></textarea>
										<span class="cp-font-size text-center text-danger message-msg"></span>
									</div> 
									<button id="contact-submit-aj">Send</button> -->
									<div class="header_cf7">
										<?php echo do_shortcode('[contact-form-7 id="1203" title="HeaderContact"]'); ?>
									</div>
								</div>


								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="show-success-msg">

											</div>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>

			</div>

		</div>
		<div id="social-trigger" class="toggled-up">

		</div>
		<!--Socail Mega Menu-->

		<!--Navigation-->
		<div class="container customized_header">
            <?php
            $logo = get_theme_mod("custom_logo");
            $image = wp_get_attachment_image_src($logo, "full");
            ?>
			<div class="navigation-p-one">
				<div class="logo d-lg-none">
					<a href="<?php echo site_url(); ?>">
						<img class="" src="<?php echo $image[0]; ?>" alt="logo">
					</a>
				</div>
				<div class="logo logo-desktop d-none d-lg-block">
					<a href="<?php echo site_url(); ?>">
                
						<img class="" src="<?php echo $image[0]; ?>" alt="logo">
					</a>

				</div>
			</div>
			<button class="menu_toggle">
				<i class="fa fa-bars hamburger" aria-hidden="true"></i>
				<i class="fa fa-times close" aria-hidden="true"></i>
			</button>
			<div class="navigation-p-two">
				<div class="top-nav ">
					<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light">
						<div class="navigation_wrap_mv">
							<?php wp_nav_menu([
           "theme_location" => "menu-1",
           "menu_class" => "main-menu",
           "menu_id" => "primary-menu",
           "depth" => 3,
           "container" => "nav",
           "before" => '<div class="a-Wrap">',
           "after" => "</div>",
       ]); ?>
						</div>
						<ul class="mb-0 cart_icon_desktop">
							<li class="nav-item">
								<a href="<?php echo esc_url(
            wc_get_cart_url()
        ); ?>" class="nav-link text-dark mr-5 d-none d-md-block">
									<i class="fa fa-shopping-cart text-dark"></i> <span class="cart-customlocation"><?php echo sprintf(
             _n(
                 "%d",
                 "%d",
                 $woocommerce->cart->cart_contents_count,
                 "woothemes"
             ),
             $woocommerce->cart->cart_contents_count
         ); ?></span>
								</a>
							</li>
						</ul>
					</nav>

				</div>
			</div>
		</div>

		<!--Navigation End Here-->
		<!-- <nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e(
       "Primary Menu",
       "en-radishka"
   ); ?></button>
			<?php wp_nav_menu([
       "theme_location" => "menu-1",
       "menu_id" => "primary-menu",
   ]); ?>
		</nav> -->
		<div class="d-lg-none d-md-none">
			<div class="show-cart-for-mobile">
				<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="text-white mr-2">
					<i class="fa fa-shopping-cart text-white"></i> <span class="cart-customlocation"><?php echo sprintf(
         _n("%d", "%d", $woocommerce->cart->cart_contents_count, "woothemes"),
         $woocommerce->cart->cart_contents_count
     ); ?></span>
				</a>
			</div>
		</div>