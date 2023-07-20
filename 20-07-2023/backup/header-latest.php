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
<header class="new_header currently_on_staging header_mv">
	<div class="top_header desktop">
		<div class="container">
			<div class="navigationWrap">
				<?php
					wp_nav_menu(  array(
						'menu'              => "primary", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
						'menu_class'        => "main-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
						'menu_id'           => "primary-menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
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
				<!-- find_suite for desktop start -->
				<div class="find_suite desktop">
					<!-- <form> -->
						<div class="inner">
							<label>
								Find Your
							</label>
							<div class="input_wrap">
								
                <!-- <select id="suite" name="suite">
									<option value="" disabled readonly>Select Suite</option>
									<option value="enterprise">Enterprise Office Suite</option>
									<option value="meeting-rooms">Meeting Rooms</option>
									<option value="hot-desks">Hot Desks</option>
								</select> -->
                <select id="suite" name="suite">
                  <option value="" disabled readonly>Select Suite</option>
                  <?php
                  $menu_name = 'suite';
                          $menu_items = wp_get_nav_menu_items($menu_name);
                          if ($menu_items) {
                              foreach ($menu_items as $menu_item) {
                                  $value = esc_attr($menu_item->url);
                                  $parsed_url = parse_url($value);
                                  $suiteurl = isset($parsed_url['host']) ? $parsed_url['host'] . $parsed_url['path'] : $value;
                                  $label = esc_html($menu_item->title);
                                  echo '<option value="' . $suiteurl . '">' . $label . '</option>';
                              }
                          }
                  ?>
              </select>

							</div>
							<div class="input_wrap">
								<select id="city" name="city">
                  <option value="" disabled readonly>Select City</option>
									<!-- <option value="sg">Singapore - Singapore</option>
									<option value="au">Australia - Melbourne</option>
									<option value="au">Australia - Sydney</option> -->
                  <?php
                  $menu_name = 'city';
                          $menu_items = wp_get_nav_menu_items($menu_name);
                          if ($menu_items) {
                              foreach ($menu_items as $menu_item) {
                                  $value = esc_attr($menu_item->url);
                                  $parsed_url = parse_url($value);
                                  $cityurl = isset($parsed_url['host']) ? $parsed_url['host'] . $parsed_url['path'] : $value;
                                  $label = esc_html($menu_item->title);
                                  echo '<option value="' . $cityurl . '">' . $label . '</option>';
                              }
                          }
                  ?>
								</select>
							</div>
							<div class="input_wrap">
              <a id="suiteurl" target="_blank" href="/">
								<button type="submit">
                </button>
                </a>
							</div>
						</div>
					<!-- </form> -->
				</div> <!-- find_suite for desktop end -->
  <script>
 jQuery(document).ready(function() {
    function updateHref() {
        var suite = jQuery('#suite').val();
        var city = jQuery('#city').val();
        if(suite != null && city != null){
        jQuery("#suiteurl").attr("href", "/" + city + "/" + suite);
        }
    }

    jQuery('#suite, #city').on('change', updateHref);
    updateHref(); // Call the function once to set the initial href
});

  </script>
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
								'menu'              => "primary", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
								'menu_class'        => "main-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
								'menu_id'           => "primary-menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
								'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
								'theme_location'    => "header-menu_staging", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
								'before'               => '<div class="a-Wrap">', // (string) Text before the link text.
								'after'                => '</div>', // (string) Text after the link text.
							) );
						?>
					</div>
					<!-- find_suite mobile start -->
					<div class="find_suite mobile">
						<form>
							<div class="inner">
								<label>
									Find Your
								</label>
								<div class="input_wrap">
									<select name="suite">
										<option value="" disabled="" readonly="">Select Suite</option>
										<option value="Enterprise Office Suite">Enterprise Office Suite</option>
										<option value="Enterprise Office Suite">Enterprise Office Suite</option>
										<option value="Enterprise Office Suite">Enterprise Office Suite</option>
									</select>
								</div>
								<div class="input_wrap">
									<select name="city">
										<option value="" disabled="" readonly="">Select City</option>
										<option value="Enterprise Office Suite">Enterprise Office Suite</option>
										<option value="Enterprise Office Suite">Enterprise Office Suite</option>
									</select>
								</div>
								<div class="input_wrap">
									<button type="submit"></button>
								</div>
							</div>
						</form>
					</div><!-- find_suite mobile end -->
				</div>
			</div>
		</div>
	</div>
</header> <!-- header end -->