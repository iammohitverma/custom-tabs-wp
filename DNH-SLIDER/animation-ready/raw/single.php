<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<?php
		if ( et_builder_is_product_tour_enabled() ):
			// load fullwidth page in Product Tour mode
			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>
					</div>

				</article>

		<?php endwhile;
		else:
	?>
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				/**
				 * Fires before the title and post meta on single posts.
				 *
				 * @since 3.18.8
				 */
				do_action( 'et_before_post' );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<?php if ( ( 'off' !== $show_default_title && $is_page_builder_used ) || ! $is_page_builder_used ) { ?>
						<div class="et_post_meta_wrapper">
							<h1 class="entry-title"><?php the_title(); ?></h1>

						<?php
							if ( ! post_password_required() ) :

								// et_divi_post_meta();

								// Get the current post object
								global $post;

								// Get the post author's display name
								$author_display_name = get_the_author_meta('display_name');

								// Get the post publish date
								$publish_date = get_the_date();

								// Get the post categories
								$categories = get_the_category();
								$category_list = '';

								// Loop through each category and build the category list
								if (!empty($categories)) {
									foreach ($categories as $category) {
										$category_link = home_url('/articles/?category=' . $category->slug); // Construct custom URL
										$category_list .= '<a href="' . $category_link . '">' . esc_html($category->name) . '</a>, ';
									}
									// Remove the trailing comma and space
									$category_list = rtrim($category_list, ', ');
								}

								?>

								<!-- // Output the author, publish date, and category -->
								<p class="post-meta">
									<?php echo 'by ' . esc_html($author_display_name) . ' | ' . esc_html($publish_date) . ' | ' . $category_list; ?>
								</p>
								
								<?php							

								$thumb = '';

								$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

								$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
								$classtext = 'et_featured_image';
								$titletext = get_the_title();
								$alttext = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
								$thumbnail = get_thumbnail( $width, $height, $classtext, $alttext, $titletext, false, 'Blogimage' );
								$thumb = $thumbnail["thumb"];

								$post_format = et_pb_post_format();

								if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) {
									printf(
										'<div class="et_main_video_container">
											%1$s
										</div>',
										et_core_esc_previously( $first_video )
									);
								} else if ( ! in_array( $post_format, array( 'gallery', 'link', 'quote' ) ) && 'on' === et_get_option( 'divi_thumbnails', 'on' ) && '' !== $thumb ) {
									print_thumbnail( $thumb, $thumbnail["use_timthumb"], $alttext, $width, $height );
								} else if ( 'gallery' === $post_format ) {
									et_pb_gallery_images();
								}
							?>

							<?php
								$text_color_class = et_divi_get_post_text_color();

								$inline_style = et_divi_get_post_bg_inline_style();

								switch ( $post_format ) {
									case 'audio' :
										$audio_player = et_pb_get_audio_player();

										if ( $audio_player ) {
											printf(
												'<div class="et_audio_content%1$s"%2$s>
													%3$s
												</div>',
												esc_attr( $text_color_class ),
												et_core_esc_previously( $inline_style ),
												et_core_esc_previously( $audio_player )
											);
										}

										break;
									case 'quote' :
										printf(
											'<div class="et_quote_content%2$s"%3$s>
												%1$s
											</div>',
											et_core_esc_previously( et_get_blockquote_in_content() ),
											esc_attr( $text_color_class ),
											et_core_esc_previously( $inline_style )
										);

										break;
									case 'link' :
										printf(
											'<div class="et_link_content%3$s"%4$s>
												<a href="%1$s" class="et_link_main_url">%2$s</a>
											</div>',
											esc_url( et_get_link_url() ),
											esc_html( et_get_link_url() ),
											esc_attr( $text_color_class ),
											et_core_esc_previously( $inline_style )
										);

										break;
								}

							endif;
						?>
					</div>
				<?php  } ?>

					<div class="entry-content">
					<?php
						do_action( 'et_before_content' );

						the_content();

						wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div>
					<div class="et_post_meta_wrapper">
					<?php
					if ( et_get_option('divi_468_enable') === 'on' ){
						echo '<div class="et-single-post-ad">';
						if ( et_get_option('divi_468_adsense') !== '' ) echo et_core_intentionally_unescaped( et_core_fix_unclosed_html_tags( et_get_option('divi_468_adsense') ), 'html' );
						else { ?>
							<a href="<?php echo esc_url( strval( et_get_option( 'divi_468_url' ) ) ); ?>"><img src="<?php echo esc_attr( et_get_option( 'divi_468_image' ) ); ?>" alt="468" class="foursixeight" /></a>
				<?php 	}
						echo '</div>';
					}

					/**
					 * Fires after the post content on single posts.
					 *
					 * @since 3.18.8
					 */
					do_action( 'et_after_post' );

						if ( ( comments_open() || get_comments_number() ) && 'on' === et_get_option( 'divi_show_postcomments', 'on' ) ) {
							comments_template( '', true );
						}
					?>
					</div>
				</article>

			<?php endwhile; ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php
	// Get the current post ID
	$post_id = get_the_ID();

	// Get the categories of the current post
	$categories = get_the_category($post_id);

	if ($categories) {
		$category_ids = array();
		foreach ($categories as $category) {
			$category_ids[] = $category->term_id;
		}

		// Query for related posts
		$args = array(
			'post__not_in' => array($post_id),
			'posts_per_page' => 3, // Adjust the number of related posts to display
			'orderby' => 'date', // Get the latest related articles
			'order' => 'DESC', // Get the latest related articles in descending order
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $category_ids,
					'operator' => 'IN',
				),
			),
		);

	$related_posts_query = new WP_Query($args);

	// Display related posts
	if ($related_posts_query->have_posts()) { ?>
		<div class="wrapper__tm suggested_articles_sec">
			<div class="row__tm">
				<div class="col__full">
					<h3 class="mainHdng">
						Latest Articles
					</h3>
				</div>
				<?php while ($related_posts_query->have_posts()) {
					$related_posts_query->the_post(); 
					$blog_category = get_the_term_list(get_the_ID(), 'category', ',', ',');
					?>
						<div class="col__tm">
							<div class="bg_white">
								<?php if ( has_post_thumbnail() ) : ?>
									<figure><?php the_post_thumbnail(); ?></figure>
									<?php else : ?>
									<img src="/wp-content/uploads/2023/11/download.png" alt="post" />
								<?php endif; ?>
								<div class="cntnt__tm">
									<?php echo '<h3 class="hdng"> <a href="' . get_permalink() . '">' . get_the_title() . '</a> </h3> '; ?>
									<p class="info">
										by <?php the_author_posts_link(); ?> | <?php echo get_the_date( 'F j, Y' ); ?> |
										<?php $blogscategories = explode(',', $blog_category);
												foreach ($blogscategories as $blogcategory) {
										?>
													<?php echo $blogcategory; ?>
										<?php } ?>	
									</p>
									<?php  echo '<p class="desc"> ' . get_the_excerpt() . ' </p> '; ?>
								</div>
							</div>
						</div>
				<?php } wp_reset_postdata(); ?>
			</div>
		</div>	
	<?php } } ?>
	<?php endif; ?>
</div>

<?php

get_footer();
