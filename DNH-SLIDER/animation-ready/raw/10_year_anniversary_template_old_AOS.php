<?php
/*
Template Name: 10th Year Anniversary Template AOS
*/
get_header();
?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- main start -->

    <?php
$field_group_key = 'group_6604092a59469';
   $fields = acf_get_fields($field_group_key);
if ($fields) {
    $tabheading = get_field('tab_heading');
    $beginningheading = get_field('beginning_heading');
    $beginningcontent = get_field('beginning_content');
    
     $secondtabheading = get_field('second_tab_heading');
     $journeyheading = get_field('journey_heading');
    $journeycontent = get_field('journey_content');
    
     $thirdtabheading = get_field('third_tab_heading');
     $aheadheading = get_field('ahead_heading');
    $aheadcontent = get_field('ahead_content');
?>
    <main>
      <div class="sections_area_wrap">
        <div class="tab_head_tm">
          <div class="container_tm">
            <div class="tab_buttons_tm">
              <!-- <button class="active" data-btn="beginning">BEGINNING</button>
              <button data-btn="journey">JOURNEY</button>
              <button data-btn="looking_ahead">LOOKING AHEAD</button> -->
              <a href="#beginning" class="active" data-btn="beginning"
                ><?php echo $tabheading; ?></a
              >
              <a href="#journey" data-btn="journey"><?php echo $secondtabheading; ?></a>
              <a href="#looking_ahead" data-btn="looking_ahead"><?php echo $thirdtabheading; ?></a>
            </div>
          </div>
        </div>
        <div class="sections_wrap active" id="beginning">
          <section class="example_classname sec_1">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <h3 data-aos="fade-right">
                      <?php echo $beginningheading; ?>
                    </h3>
                    <div data-aos="fade-up" data-aos-delay="300">
                      <?php echo $beginningcontent; ?>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm" data-aos="fade-left">
                  <div class="img_area_wrap">
                  <?php 
                    if( have_rows('beginning_images') ):
                    $x = 1;
                     while( have_rows('beginning_images') ) : the_row();
                      $image = get_sub_field('image');
                  ?>
                    <img src="<?php echo $image['url']; ?>" alt="" class="img_<?php echo $x; ?>" />
                    <?php
                    $x++;
                    endwhile;
                          else :
                          endif;
                    ?>
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php 
            if( have_rows('quoute_block') ):
            $sec = 2;
            while( have_rows('quoute_block') ) : the_row();
                      $quoute = get_sub_field('quoute');
                      $description = get_sub_field('description');
          ?>
          <section class="example_classname sec_<?php echo $sec; ?>">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm" data-aos="fade-right">
                  <div class="text_wrap">
                    <blockquote>
                      <?php echo $quoute; ?>
                    </blockquote>
                    <p>
                      <?php echo $description; ?>
                    </p>
                  </div>
                </div>
                <div class="col_6_tm" data-aos="fade-left">
                  <div class="img_area_wrap">
                  <?php if( have_rows('quote_block_image') ):
                  $x = 1;
                          while( have_rows('quote_block_image') ) : the_row();
                      $quote_image = get_sub_field('quote_image');
                  ?>
                    <img
                      src="<?php echo $quote_image['url']; ?>"
                      alt=""
                      class="img_<?php echo $x; ?>"
                    />
                  <?php 
                  $x++;
                  endwhile;
                  else :
                  endif; ?>                   
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php 
          $sec++;
          endwhile;
          else :
          endif;
          ?>
        </div>
        <div class="sections_wrap journey" id="journey">
          <section class="example_classname sec_1">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <h3 data-aos="fade-right">
                      <?php echo $journeyheading; ?>
                    </h3>
                    <div data-aos="fade-up" data-aos-delay="300">
                      <?php echo $journeycontent; ?>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm" data-aos="fade-left">
                  <div class="img_area_wrap">
                  <?php 
                    if( have_rows('journey_images') ):
                    $x = 1;
                     while( have_rows('journey_images') ) : the_row();
                      $image = get_sub_field('image');
                  ?>
                    <img src="<?php echo $image['url']; ?>" alt="" class="img_<?php echo $x; ?>" />
                    <?php
                    $x++;
                    endwhile;
                          else :
                          endif;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php 
            if( have_rows('journey_quote_block') ):
            $sec = 2;
            while( have_rows('journey_quote_block') ) : the_row();
                      $journeyquote = get_sub_field('journey_quote');
                      $journeydescription = get_sub_field('journey_quote_description');
                      $journeycontent = get_sub_field('journey_quote_content');
          ?>
          <section class="example_classname sec_<?php echo $sec; ?>">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm" data-aos="fade-right">
                  <div class="text_wrap">
                  <?php if(!empty($journeycontent)){ ?>
                   <p>
                      <?php echo $journeycontent; ?>
                    </p>
                  <?php } ?>
                    <blockquote>
                      <?php echo $journeyquote; ?>
                    </blockquote>
                    <p>
                      <?php echo $journeydescription; ?>
                    </p>
                  </div>
                </div>
                <div class="col_6_tm" data-aos="fade-left">
                  <div class="img_area_wrap">
                  <?php 
                    if( have_rows('journey_quote_images') ):
                    $x = 1;
                     while( have_rows('journey_quote_images') ) : the_row();
                      $journeyimage = get_sub_field('journey_image');
                  ?>
                    <img src="<?php echo $journeyimage['url'];?>" alt="" class="img_<?php echo $x; ?>" />
                    <?php
                    $x++;
                    endwhile;
                          else :
                          endif;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php
          $sec++;          
          endwhile;
          else :
          endif;
          ?>         
        </div>
        <div class="sections_wrap looking_ahead" id="looking_ahead">
          <section class="example_classname sec_1">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <h3 data-aos="fade-right">
                       <?php echo $aheadheading; ?>
                    </h3>
                    <div data-aos="fade-up" data-aos-delay="300">
                       <?php echo $aheadcontent; ?>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm" data-aos="fade-left">
                  <div class="img_area_wrap">
                    <?php 
                    if( have_rows('ahead_images') ):
                    $x = 1;
                     while( have_rows('ahead_images') ) : the_row();
                      $image = get_sub_field('image');
                  ?>
                    <img src="<?php echo $image['url'];?>" alt="" class="img_<?php echo $x; ?>" />
                    <?php
                    $x++;
                    endwhile;
                          else :
                          endif;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php 
            if( have_rows('ahead_quote_block') ):
            $sec = 2;
            while( have_rows('ahead_quote_block') ) : the_row();
                      $aheadquote = get_sub_field('ahead_quote');
          ?>
          <section class="example_classname sec_<?php echo $sec; ?>">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm" data-aos="fade-right">
                  <div class="text_wrap">
                    <blockquote>
                     <?php echo $aheadquote; ?>
                    </blockquote>
                  </div>
                </div>
                <div class="col_6_tm" data-aos="fade-left">
                  <div class="img_area_wrap">
                    <?php 
                    if( have_rows('ahead_quote_images') ):
                    $x = 1;
                     while( have_rows('ahead_quote_images') ) : the_row();
                      $aheadquoteimage = get_sub_field('ahead_quote_sec_image');
                  ?>
                    <img src="<?php echo $aheadquoteimage['url'];?>" alt="" class="img_<?php echo $x; ?>" />
                    <?php
                    $x++;
                    endwhile;
                          else :
                          endif;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
           <?php
          $sec++;          
          endwhile;
          else :
          endif;
          
          if (have_rows('section')) :
		while (have_rows('section')) : the_row();
			if (get_row_layout() == 'decade_of_dnh') :
      $decadeheading = get_sub_field('decade_heading');
      $decadebutton = get_sub_field('decade_button');
          
          ?>   
          <section class="Decadeo_section">
            <div class="container_tm">
              <div class="heading_wrap">
                <h3 data-aos="zoom-in"><?php echo $decadeheading; ?></h3>
              </div>
              <div class="images_wrap">
                <div class="row_tm">
                <?php 
                    if( have_rows('decade_image_block') ):
                    $x = 1;
                    $aos = array("right", "up", "left");
                     while( have_rows('decade_image_block') ) : the_row();
                      $decadeimage = get_sub_field('decade_image');
                  ?>
                  <div class="col_4_tm" data-aos="fade-<?php echo $aos[$x-1]; ?>">
                    <div class="image_wrap">
                      <img src="<?php echo $decadeimage['url'];?>" alt="" class="img_<?php echo $x; ?>" />
                    </div>
                  </div>
                  <?php
                    $x++;
                    endwhile;
                          else :
                          endif;
                    ?>
                </div>
              </div>
              <div class="btn_wrap" data-aos="zoom-in" data-aos-delay="300">
              <?php 
                if( $decadebutton ): 
              ?>
                <button href="<?php echo $decadebutton['url']; ?>" class="start_again"><?php echo $decadebutton['title']; ?></button>
                <?php endif; ?>
              </div>
            </div>
          </section>
           <?php
          endif;         
          endwhile;
          else :
          endif;
          ?>
        </div>
      </div>
    </main>
<?php } ?>

<!-- main start -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.21/jquery.scrollify.min.js"></script> -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
<script>
jQuery(document).ready(function () {
  // below listed default settings
  AOS.init({
      // Global settings:
      disable: window.innerWidth < 992, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
      startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
      initClassName: 'aos-init', // class applied after initialization
      animatedClassName: 'aos-animate', // class applied on animation
      useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
      disableMutationObserver: false, // disables automatic mutations' detections (advanced)
      debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
      throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


      // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
      offset: 0, // offset (in px) from the original trigger point
      delay: 30, // values from 0 to 3000, with step 50ms
      duration: 2000, // values from 0 to 3000, with step 50ms
      easing: 'ease-out-back', // default easing for AOS animations
      once: false, // whether animation should happen only once - while scrolling down
      mirror: true, // whether elements should animate out while scrolling past them
      anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
  });

  // Add active to menu when section in viewport
  $(window).on('scroll', function () {
      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();
      var viewportMid = (viewportTop + viewportBottom) / 2;

      $('.sections_wrap').each(function () {
          var sectionId = $(this).attr('id');
          var correspondingLink = $('a[data-btn="' + sectionId + '"]');

          var sections = $(this).find('section');
          var sectionInViewport = null;

          sections.each(function () {
              var sectionTop = $(this).offset().top;
              var sectionBottom = sectionTop + $(this).outerHeight();

              if (sectionTop <= viewportMid && sectionBottom >= viewportMid) {
                  sectionInViewport = $(this);
                  return false; // Exit the loop if a section is found
              }
          });

          if (sectionInViewport) {
              $(this).addClass('active');
              correspondingLink.addClass('active');
          } else {
              $(this).removeClass('active');
              correspondingLink.removeClass('active');
          }
      });
  });

  // Event listener for tab button clicks
  jQuery(".tab_head_tm .tab_buttons_tm a").click(function (e) {
      jQuery(".tab_head_tm .tab_buttons_tm a").removeClass("active");
      jQuery(this).addClass("active");
      let currBtn = jQuery(this).attr("data-btn");
      jQuery(".sections_area_wrap .sections_wrap").removeClass("active");
      jQuery(".sections_area_wrap .sections_wrap." + currBtn).addClass("active");
  });

    // Event listener for clicking on elements with class "start_again"
    jQuery('.start_again').on('click', function() {
        // Scroll to the top of the window with smooth animation
        jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    var tabHeadHeight = jQuery('.tab_head_tm').outerHeight();
    jQuery('body').css('--tabHeadHeight', tabHeadHeight + 'px');

    // $.scrollify({
    //     section: "main section",
    // });
    // jQuery(window).on("scroll", function () {
    //     let currentSection = $.scrollify.current();
    //     console.log(currentSection[0]);
    //     jQuery("main section").removeClass("current");
    //     jQuery(currentSection[0]).addClass("current");
    // });
    
});
</script>

<?php get_footer(); ?>


  