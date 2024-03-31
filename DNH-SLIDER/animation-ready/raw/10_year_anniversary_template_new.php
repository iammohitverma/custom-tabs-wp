<?php
/*
Template Name: 10th Year Anniversary Template New
*/
get_header();
?>

    <!-- main start -->

    <?php
// $field_group_key = 'group_6604092a59469';
$field_group_key = 'group_66068e11508c7';
   $fields = acf_get_fields($field_group_key);
if ($fields) {
    $tabheading = get_field('first_tab_heading');
    $beginningheading = get_field('beginning_heading');
    $beginningcontent = get_field('beginning_content');
    $beginningimagefirst = get_field('beginning_image_first');
    $beginningimagesecond = get_field('beginning_image_second');
    $beginningimagethird = get_field('beginning_image_third');
    $beginningblockquote = get_field('beginning_blockquote');
    $beginningblockquotecontent = get_field('beginning_blockquote_content');
    $beginningblockquoteimagefirst = get_field('beginning_blockquote_image_first');
    $beginningblockquoteimagesecond = get_field('beginning_blockquote_image_second');
    $beginningblockquoteimagethird = get_field('beginning_blockquote_image_third');
   
    $secondtabheading = get_field('second_tab_heading');
    $journeyheading = get_field('journey_heading');
    $journeycontent = get_field('journey_content');
    $journeyimagefirst = get_field('journey_image_first');
    $journeyimagesecond = get_field('journey_image_second');
    $journeyimagethird = get_field('journey_image_third');
   
    
    $thirdtabheading = get_field('third_tab_heading');
    $aheadheading = get_field('ahead_heading');
    $aheadcontent = get_field('ahead_content');
    $aheadimagefirst = get_field('ahead_image_first');
    $aheadimagesecond = get_field('ahead_image_second');
    $aheadimagethird = get_field('ahead_image_third');    
?>

<style>
#transform {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}
</style>

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
                  <div class="text_wrap" >
                    <h3
                      data-0="transform: translateY(0); opacity: 1"
                      data-500="transform: translateY(0); opacity: 0;"
                    >
                      <?php echo $beginningheading; ?>
                    </h3>
                    <div
                      data-0="transform: translateY(0); opacity: 1"
                      data-500="transform: translateY(0); opacity: 0;"
                    >
                      <p>
                        <?php echo $beginningcontent; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="transform: translateY(0) rotate(0deg); opacity: 1"
                    data-200="transform: translateY(0) rotate(0deg); opacity: 0;"
                    data-700="transform: translateY(0) rotate(0deg); opacity: 0;"
                  >
                  
                    <img src="<?php echo $beginningimagefirst['url']; ?>" alt="" class="img_1" />
                    <img src="<?php echo $beginningimagesecond['url']; ?>" alt="" class="img_2" />
                    <img src="<?php echo $beginningimagethird['url']; ?>" alt="" class="img_3" />
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="example_classname sec_2">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <blockquote 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-500="transform: translateY(200px); opacity: 0"
                      data-700="transform: translateY(0); opacity: 1;"
                      data-1200="transform: translateY(0); opacity: 0;"
                      >
                      <p>
                      <?php echo $beginningblockquote; ?>
                      </p>
                    </blockquote>
                    <div 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-700="transform: translateY(200px); opacity: 0"
                      data-1000="transform: translateY(0); opacity: 1;"
                      data-1200="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $beginningblockquotecontent; ?>
                    </p>
            </div>
                  </div>
                </div>
                <div class="col_6_tm">
                 <div class="img_area_wrap"
                  data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                  data-700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                  data-1000="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                  data-1500="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <!-- Your content here -->
                    <img
                      src="<?php echo $beginningblockquoteimagefirst['url']; ?>"
                      alt=""
                      class="img_1"
                    />
                     <img
                      src="<?php echo $beginningblockquoteimagesecond['url']; ?>"
                      alt=""
                      class="img_2"
                    />
                     <img
                      src="<?php echo $beginningblockquoteimagethird['url']; ?>"
                      alt=""
                      class="img_3"
                    />
                                
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="sections_wrap journey" id="journey">
          <section class="example_classname sec_1">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <h3
                      data-0="transform: translateX(-100%); opacity: 0"
                      data-1700="transform: translateY(0); opacity: 1;"
                    >
                      <?php echo $journeyheading; ?>
                    </h3>
                    <div
                      data-0="transform: translateY(200px); opacity: 0"
                      data-1500="transform: translateY(200px); opacity: 0"
                      data-1700="transform: translateY(0); opacity: 1;"
                      data-2000="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeycontent; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-1500="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-1700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-2000="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <img src="<?php echo $journeyimagefirst['url']; ?>" alt="" class="img_1" />
                    <img src="<?php echo $journeyimagesecond['url']; ?>" alt="" class="img_2" />
                    <img src="<?php echo $journeyimagethird['url']; ?>" alt="" class="img_3" />
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php
            $journeyblockquote = get_field('journey_blockquote');
            $journeyblockquotecontent = get_field('journey_blockquote_content');
            $Journeyblockquoteimagefirst = get_field('Journey_blockquote_image_first');
            $Journeyblockquoteimagesecond = get_field('Journey_blockquote_image_second');
            $Journeyblockquoteimagethird = get_field('Journey_blockquote_image_third');          
          ?>
          <section class="example_classname sec_2">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <blockquote
                      data-0="transform: translateY(200px); opacity: 0"
                      data-2200="transform: translateY(200px); opacity: 0"
                      data-2500="transform: translateY(0); opacity: 1;"
                      data-2800="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquote; ?>
                      </p>
                    </blockquote>
                    <div 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-2400="transform: translateY(200px); opacity: 0"
                      data-2600="transform: translateY(0); opacity: 1;"
                      data-2900="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquotecontent; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-1800="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-2200="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-2600="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-3200="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <img src="<?php echo $Journeyblockquoteimagefirst['url'];?>" alt="" class="img_1" />
                    <img src="<?php echo $Journeyblockquoteimagesecond['url'];?>" alt="" class="img_2" />
                    <img src="<?php echo $Journeyblockquoteimagethird['url'];?>" alt="" class="img_3" />
                  </div>
                </div>
              </div>
            </div>
          </section>  
        <?php
              $journeyblockquotesecond = get_field('journey_blockquote_second');
              $journeyblockquotesecondtopcontent = get_field('journey_blockquote_second_top_content');
              $journeyblockquotesecondbottomcontent = get_field('journey_blockquote_second_bottom_content');
              $secondblockquoteimagefirst = get_field('second_blockquote_image_first');
              $secondblockquoteimageSecond = get_field('second_blockquote_image_Second');
              $secondblockquoteimageThird = get_field('second_blockquote_image_Third');
        ?>
          <section class="example_classname sec_3">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                   <div 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-3000="transform: translateY(200px); opacity: 0"
                      data-3200="transform: translateY(0); opacity: 1;"
                      data-3600="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquotesecondtopcontent; ?>
                    </p>
                  </div>
                    <blockquote
                      data-0="transform: translateY(200px); opacity: 0"
                      data-3200="transform: translateY(200px); opacity: 0"
                      data-3400="transform: translateY(0); opacity: 1;"
                      data-3800="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquotesecond; ?>
                    </p>
                    </blockquote>
                    <div 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-3400="transform: translateY(200px); opacity: 0"
                      data-3600="transform: translateY(0); opacity: 1;"
                      data-4000="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquotesecondbottomcontent; ?>
                    </p>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-3000="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-3400="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-4000="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-4400="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <img src="<?php echo $secondblockquoteimagefirst['url'];?>" alt="" class="img_1" />
                    <img src="<?php echo $secondblockquoteimageSecond['url'];?>" alt="" class="img_2" />
                    <img src="<?php echo $secondblockquoteimageThird['url'];?>" alt="" class="img_3" />
                  </div>
                </div>
              </div>
            </div>
          </section> 
        <?php
              $journeyblockquotethird = get_field('journey_blockquote_third');
              $journeyblockquotethirdcontent = get_field('journey_blockquote_third_content');
              $journeyblockquotethirdimagefirst = get_field('journey_blockquote_third_image_first');
              $journeyblockquotethirdimagesecond = get_field('journey_blockquote_third_image_second');
              $journeyblockquotethirdimageThird = get_field('journey_blockquote_third_image_Third');
        ?>
          <section class="example_classname sec_4">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <blockquote
                      data-0="transform: translateY(200px); opacity: 0"
                      data-4000="transform: translateY(200px); opacity: 0"
                      data-4400="transform: translateY(0); opacity: 1;"
                      data-4800="transform: translateY(0); opacity: 0;"
                    >
                      <p>
                        <?php echo $journeyblockquotethird; ?>
                      </p>
                    </blockquote>
                    <div 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-4200="transform: translateY(200px); opacity: 0"
                      data-4600="transform: translateY(0); opacity: 1;"
                      data-5000="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquotethirdcontent; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-3800="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-4200="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-4700="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-5000="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <img src="<?php echo $journeyblockquotethirdimagefirst['url'];?>" alt="" class="img_1" />
                    <img src="<?php echo $journeyblockquotethirdimagesecond['url'];?>" alt="" class="img_2" />
                    <img src="<?php echo $journeyblockquotethirdimageThird['url'];?>" alt="" class="img_3" />
                  </div>
                </div>
              </div>
            </div>
          </section> 
        <?php
              $journeyblockquotefourth = get_field('journey_blockquote_fourth');
              $journeyblockquotefourthcontent = get_field('journey_blockquote_fourth_content');
              $journeyblockquotefourthimagefirst = get_field('journey_blockquote_fourth_image_first');
              $journeyblockquotefourthimagesecond = get_field('journey_blockquote_fourth_image_second');
              $journeyblockquotefourthimagethird = get_field('journey_blockquote_fourth_image_third');
        ?>
          <section class="example_classname sec_5">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <blockquote
                      data-0="transform: translateY(200px); opacity: 0"
                      data-5200="transform: translateY(200px); opacity: 0"
                      data-5400="transform: translateY(0); opacity: 1;"
                      data-5800="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquotefourth; ?>
                    </p>
                    </blockquote>
                    <div 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-5400="transform: translateY(200px); opacity: 0"
                      data-5600="transform: translateY(0); opacity: 1;"
                      data-6000="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                      <?php echo $journeyblockquotefourthcontent; ?>
                    </p>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-5000="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-5400="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-5900="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-6200="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <img src="<?php echo $journeyblockquotefourthimagefirst['url'];?>" alt="" class="img_1" />
                    <img src="<?php echo $journeyblockquotefourthimagesecond['url'];?>" alt="" class="img_2" />
                    <img src="<?php echo $journeyblockquotefourthimagethird['url'];?>" alt="" class="img_3" />
                  </div>
                </div>
              </div>
            </div>
          </section>           
        </div>
        <div class="sections_wrap looking_ahead" id="looking_ahead">
          <section class="example_classname sec_1">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <h3
                      data-0="transform: translateX(-100%); opacity: 0"
                      data-6000="transform: translateX(-100%); opacity: 0"
                      data-6400="transform: translateX(0); opacity: 1;"
                      data-6800="transform: translateX(0); opacity: 0;"
                    >
                       <?php echo $aheadheading; ?>
                    </h3>
                    <div
                      data-0="transform: translateY(200px); opacity: 0"
                      data-6000="transform: translateY(200px); opacity: 0"
                      data-6200="transform: translateY(0); opacity: 1;"
                      data-6700="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                       <?php echo $aheadcontent; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-5900="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-6200="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-6600="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-6700="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <img src="<?php echo $aheadimagefirst['url'];?>" alt="" class="img_1" />
                    <img src="<?php echo $aheadimagesecond['url'];?>" alt="" class="img_2" />
                    <img src="<?php echo $aheadimagethird['url'];?>" alt="" class="img_3" />
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php 
              $aheadblockquotefirst = get_field('ahead_blockquote_first');
              $aheadblockquotesecond = get_field('ahead_blockquote_second');
              $aheadblockquoteimagefirst = get_field('ahead_blockquote_image_first');
              $aheadblockquoteimagesecond = get_field('ahead_blockquote_image_second');
              $aheadblockquoteimageThird = get_field('ahead_blockquote_image_Third');            
          ?>
          <section class="example_classname sec_2">
            <div class="container_tm">
              <div class="row_tm">
                <div class="col_6_tm">
                  <div class="text_wrap">
                    <blockquote
                      data-0="transform: translateY(200px); opacity: 0"
                      data-6700="transform: translateY(200px); opacity: 0"
                      data-6900="transform: translateY(0); opacity: 1;"
                      data-7100="transform: translateY(0); opacity: 1;"
                      data-7400="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                     <?php echo $aheadblockquotefirst; ?>
                     </p>
                    </blockquote>
                  </div>
                  <div class="text_wrap">
                    <blockquote 
                      data-0="transform: translateY(200px); opacity: 0"
                      data-6900="transform: translateY(200px); opacity: 0"
                      data-7100="transform: translateY(0); opacity: 1;"
                      data-7400="transform: translateY(0); opacity: 0;"
                    >
                    <p>
                     <?php echo $aheadblockquotesecond; ?>
                     </p>
                    </blockquote>
                  </div>
                </div>
                <div class="col_6_tm">
                  <div class="img_area_wrap"
                    data-0="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-6600="opacity:0; transform: translateY(200px) rotate(180deg) scale(0.2);"
                    data-6800="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-7200="opacity:1; transform: translateY(0) rotate(0deg) scale(1);"
                    data-7400="opacity:0; transform: translateY(0) rotate(0deg) scale(0.2);"
                  >
                    <img src="<?php echo $aheadblockquoteimagefirst['url'];?>" alt="" class="img_1" />
                    <img src="<?php echo $aheadblockquoteimagesecond['url'];?>" alt="" class="img_2" />
                    <img src="<?php echo $aheadblockquoteimageThird['url'];?>" alt="" class="img_3" />
                  </div>
                </div>
              </div>
            </div>
          </section>
           <?php
          if (have_rows('section')) :
		while (have_rows('section')) : the_row();
			if (get_row_layout() == 'decade_of_dnh') :
      $decadeheading = get_sub_field('decade_heading');
      $decadebutton = get_sub_field('decade_button');
      $decade_image_first = get_sub_field('decade_image_first');
      $decade_image_second = get_sub_field('decade_image_second');
      $decade_image_third = get_sub_field('decade_image_third');
          
          ?>   
          <section class="Decadeo_section">
            <div class="container_tm">
              <div class="heading_wrap">
                <h3><?php echo $decadeheading; ?></h3>
              </div>
              <div class="images_wrap">
                <div class="row_tm">
                
                  <div class="col_4_tm">
                    <div class="image_wrap">
                      <img src="<?php echo $decade_image_first['url'];?>" alt="" class="img_1>" />
                    </div>
                  </div>
                  <div class="col_4_tm">
                    <div class="image_wrap">
                      <img src="<?php echo $decade_image_second['url'];?>" alt="" class="img_2" />
                    </div>
                  </div>
                  <div class="col_4_tm">
                    <div class="image_wrap">
                      <img src="<?php echo $decade_image_third['url'];?>" alt="" class="img_3" />
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="btn_wrap">
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
<script src="https://dnholdlive.dexsandbox.com/wp-content/themes/divi-child/skrollr.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script> -->
    
<script>
jQuery(document).ready(function () {
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

    
});
</script>

<script type="text/javascript">
 // Initialize Skrollr
 var skrollrInstance = skrollr.init();

// Function to destroy Skrollr
function destroySkrollr() {
  if (skrollrInstance) {
    skrollrInstance.destroy(); // Destroy Skrollr if it exists
    skrollrInstance = null; // Reset the Skrollr instance variable
  }
}

// Function to check window width and destroy Skrollr if necessary
function checkWindowWidth() {
  if (window.innerWidth < 992) {
    destroySkrollr(); // Destroy Skrollr if window width is under 992 pixels
  }
}

// Initial check on page load
checkWindowWidth();

// Event listener for window resize
window.addEventListener('resize', checkWindowWidth);
  window.onscroll = () => {
        let scrollY = this.scrollY;
        console.log(scrollY);
  }
</script>

<?php get_footer(); ?>


  