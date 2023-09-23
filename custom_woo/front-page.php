<?php
/**
 * The template for displaying front page
 *
 * (Home Page of Website)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CavesRoadOlives-theme
 */
get_header();
?>

<div class="" id="home-page">
		<!-- hero section start -->
        <section class="hero cmn_flower_shape_v1 bottom_left">
			<div class="one_side_container ml_auto">
				<div class="top">
					<div class="row">
						<div class="col-md-5">
							<div class="text_wrap" data-aos="fade-right">
								<div class="logo_wrap">
									<img src="/wp-content/uploads/2023/09/logo-2.png">
								</div>
								<div class="heading left_arrow_heading">
									<h1>
										<span>Quality, small-batch olive oil.</span>
									</h1>
								</div>
							</div>
						</div>
						<div class="col-md-7 p-0">
							<div class="img_wrap text-end" data-aos="fade-left" data-aos-delay="500">
								<img src="/wp-content/uploads/2023/09/hero_img.png" alt="hero_img">
							</div>
						</div>
					</div>
				</div>
						
				<div class="bottom">
					<div class="row">
						<div class="col-12">
							<div class="btns_wrap" data-aos="fade-up" data-aos-delay="1000">
								<ul>
									<li>
										<a href="#" class="shape_btn pink">
											100% Natural Oil
										</a>
									</li>
									<li>
										<a href="#" class="shape_btn lightGreen">
											Extra Virgin
										</a>
									</li>
									<li>
										<a href="#" class="shape_btn sky">
											Cold Pressed
										</a>
									</li>
									<li>
										<a href="#" class="shape_btn yellow">
											Freshly Hand Picked
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- hero section end -->

		<!-- welcome_sec start -->
		<section class="welcome_sec">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="text_wrap"  data-aos="fade-right" data-aos-delay="0">
							<p>Welcome to the <b> Caves Road Olives. </b> Delight in the authentic taste of Margaret River with our locally grown and bottled olive oils. </p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="btn_wrap" data-aos="fade-left" data-aos-delay="500">
							<a href="#" class="shape_btn oliveGreen_with_arrow text-white">
								Shop Oil
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- welcome_sec end -->

		<!-- hand_planted start -->
		<section class="hand_planted">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="img_wrap" data-aos="fade-up" data-aos-delay="0" data-aos-offset="200">
							<img src="/wp-content/themes/CavesRoadOlives/assets/images/hand_planted.png" alt="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="text_wrap" data-aos="fade-left" data-aos-delay="500">
							<h2 class="cmn_sec_heading"> <span> Hand <br> Planted & </span> <br> Organically Farmed</h2>
							<p class="cmn_sec_para">Situated in the heart of Wilyaburup ,Caves Road Olives is more than just an olive grove. We're a family of passionate artisans dedicated to crafting the finest olive oil in Margaret River. With 1,800 hand planted and nurtured trees, each bottle captures the unique terroir of our land.</p>
							<a href="#" class="shape_btn oliveGreen_with_arrow text-white">
							About Us
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- hand_planted end -->

		<!-- Organically grown start -->
		<section class="organically_grown cmn_flower_shape_v2 top_right">
			<div class="container">
				<div class="heading"  data-aos="fade-up" data-aos-delay="0" data-aos-offset="200">
					<h3>Olive Oil</h3>
					<h2 class="cmn_fs_110"><span> Organically </span> <br> Grown</h2>
				</div>

				<div class="product_slider">
					<div class="owl-carousel home_product_slider">
						<?php
							$args = array(
								'post_type' => 'product',
								'posts_per_page' => 12,
								'tax_query'           => array(
									array(
										'taxonomy'      => 'product_cat',
										'field'         => 'slug',
										'terms'    => array( 'home-slider' ) //display product by specific category
									)
								)
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
				</div>
			</div>
		</section>
		<!-- Organically grown end -->

		<!-- view shop grown start -->
		<section class="view_shop_sec cmn_bot_shape btm_left">
			<div class="container">
				<div class="btn_wrap"  data-aos="fade-up" data-aos-delay="0" data-aos-offset="300">
					<a href="#" class="shape_btn oliveGreen_with_arrow text-white">
					Visit Shop
					</a>
				</div>
			</div>
		</section>
		<!-- view shop grown end -->
</div>
<?php get_footer();?>

