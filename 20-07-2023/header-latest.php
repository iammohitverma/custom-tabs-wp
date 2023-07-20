<style>
    /* style as per new design start*/
    @media(min-width: 1399.98px) {
        :is(.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl),
        header.new_header :is(.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl),
        footer.new_footer :is(.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl),
        .e-con>.e-con-inner {
            max-width: 1320px !important;
        }
    }
    @media(min-width: 1599.98px) {
		:is(.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl),
        header.new_header :is(.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl),
        footer.new_footer :is(.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl),
        .e-con>.e-con-inner {
            max-width: 1420px !important;
        }
    }
    /* style as per new design end*/
</style>
<!-- updated header start -->

<?php
	$officeSearchEnabled = get_field("header_with_office_suite_search");
?>
<header class="new_header currently_on_staging header_mv">
	<div class="top_header desktop">
		<div class="container">
			<div class="navigationWrap">
				<?php
					wp_nav_menu(  array(
						'menu_class'        => "main-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
						'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
						'theme_location'    => "header-menu_staging", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
						'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
						'after'                => '</div>', // (string) Text after the link text.
					) );
				?>
				
				<!-- lang for desktop version -->
				<ul class="lang">
					<li>
						<a href="#">EN</a>
					</li>
					<li>
						<a href="#">SG</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="bottom_header">
		<div class="container">
			<div class="inner">
				<div class="logoBx">
                    <?php 
                        $getLogo = get_theme_mod('justco_staging_logo');
                        ?>
                            <a href="<?php echo get_site_url()?>">
                                <img src="<?php echo $getLogo; ?>" alt="justco-logo">
                            </a>
                        <?php
                    ?>
				</div>
				<?php
					if($officeSearchEnabled){
						if($officeSearchEnabled == "yes"){
							?>
							<?php echo do_shortcode( '[justco_find_suite for="desktop"]' );?>
							<?php
						} else {
							?>
							<div class="navigationWrap desktop">
								<?php
									wp_nav_menu(  array(
										'menu_class'        => "bottom-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
										'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
										'theme_location'    => "header-menu_staging_bottom", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
										'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
										'after'                => '</div>', // (string) Text after the link text.
									) );
								?>
							</div>
							<?php
						}
					}
				?>
				<!-- menu_toggle wrap start-->
				<div class="menu_toggle_wrap mobile">
					<button class="menu_toggle">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- lang for mobile version -->
					<ul class="lang">
						<li>
							<a href="#">EN</a>
						</li>
						<li>
							<a href="#">SG</a>
						</li>
					</ul>
				</div> <!-- menu_toggle wrap end-->
				<div class="navigation mobile">
					<div class="navigationWrap">
						<?php
							wp_nav_menu(  array(
								'menu_class'        => "main-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
								'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
								'theme_location'    => "header-menu_staging", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
								'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
								'after'                => '</div>', // (string) Text after the link text.
							) );
						?>
					</div>
					<?php
					if($officeSearchEnabled){
						if($officeSearchEnabled == "yes"){
							?>
							<?php echo do_shortcode( '[justco_find_suite for="mobile"]' );?>
							<?php
						} else {
							?>
							<div class="navigationWrap mobile">
								<?php
									wp_nav_menu(  array(
										'menu_class'        => "bottom-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
										'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
										'theme_location'    => "header-menu_staging_bottom", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
										'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
										'after'                => '</div>', // (string) Text after the link text.
									) );
								?>
							</div>
							<?php
						}
					}
				?>
				</div>
			</div>
		</div>
	</div>
</header> <!-- header end -->