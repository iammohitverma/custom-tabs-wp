<?php
/*
Template Name: 10th Year Anniversary Template by mohit
*/
get_header();
?>


<!-- locomotive css-->
<link href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.css" rel="stylesheet">

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


<!-- preloader start -->
<div id="preloader">
  <h4>0%</h4>
</div> 


<!-- main start -->
<main>
    <!-- bg_anim -->
    <div class="bg_anim"></div>
    
    <!-- tab buttons -->
    <div class="tab_head_tm">
      <div class="container_tm">
        <div class="tab_buttons_tm">
            <a href="#beginning" class="active" data-btn="beginning"><?php echo $tabheading; ?></a>
            <a href="#journey" data-btn="journey"><?php echo $secondtabheading; ?></a>
            <a href="#looking_ahead" data-btn="looking_ahead"><?php echo $thirdtabheading; ?></a>
        </div>
      </div>
    </div>

    <!-- sections wrapper -->
    <div class="sections_area_wrap">
        <div class="sections_wrap active" id="beginning">
            <section class="example_classname sec_1">
                <div class="container_tm">
                    <div class="row_tm">
                        <div class="col_6_tm">
                            <div class="text_wrap">
                                <h3><?php echo $beginningheading; ?></h3>
                                <div>
                                    <?php echo $beginningcontent; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col_6_tm">
                            <div class="img_area_wrap">
                                <?php
                                if (have_rows('beginning_images')) :
                                    $x = 1;
                                    while (have_rows('beginning_images')) : the_row();
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
            if (have_rows('quoute_block')) :
                $sec = 2;
                while (have_rows('quoute_block')) : the_row();
                    $quoute = get_sub_field('quoute');
                    $description = get_sub_field('description');
            ?>
                    <section class="example_classname sec_<?php echo $sec; ?>">
                        <div class="container_tm">
                            <div class="row_tm">
                                <div class="col_6_tm">
                                    <div class="text_wrap">
                                        <blockquote>
                                            <?php echo $quoute; ?>
                                        </blockquote>
                                        <p>
                                            <?php echo $description; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col_6_tm">
                                    <div class="img_area_wrap">
                                        <?php if (have_rows('quote_block_image')) :
                                            $x = 1;
                                            while (have_rows('quote_block_image')) : the_row();
                                                $quote_image = get_sub_field('quote_image');
                                        ?>
                                                <img src="<?php echo $quote_image['url']; ?>" alt="" class="img_<?php echo $x; ?>" />
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
                                <h3><?php echo $journeyheading; ?></h3>
                                <div>
                                    <?php echo $journeycontent; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col_6_tm">
                            <div class="img_area_wrap">
                                <?php
                                if (have_rows('journey_images')) :
                                    $x = 1;
                                    while (have_rows('journey_images')) : the_row();
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
            if (have_rows('journey_quote_block')) :
                $sec = 2;
                while (have_rows('journey_quote_block')) : the_row();
                    $journeyquote = get_sub_field('journey_quote');
                    $journeydescription = get_sub_field('journey_quote_description');
                    $journeycontent = get_sub_field('journey_quote_content');
            ?>
                    <section class="example_classname sec_<?php echo $sec; ?>">
                        <div class="container_tm">
                            <div class="row_tm">
                                <div class="col_6_tm">
                                    <div class="text_wrap">
                                        <?php if (!empty($journeycontent)) { ?>
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
                                <div class="col_6_tm">
                                    <div class="img_area_wrap">
                                        <?php
                                        if (have_rows('journey_quote_images')) :
                                            $x = 1;
                                            while (have_rows('journey_quote_images')) : the_row();
                                                $journeyimage = get_sub_field('journey_image');
                                        ?>
                                                <img src="<?php echo $journeyimage['url']; ?>" alt="" class="img_<?php echo $x; ?>" />
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
                                <h3><?php echo $aheadheading; ?></h3>
                                <div>
                                    <?php echo $aheadcontent; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col_6_tm">
                            <div class="img_area_wrap">
                                <?php
                                if (have_rows('ahead_images')) :
                                    $x = 1;
                                    while (have_rows('ahead_images')) : the_row();
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
            if (have_rows('ahead_quote_block')) :
                $sec = 2;
                while (have_rows('ahead_quote_block')) : the_row();
                    $aheadquote = get_sub_field('ahead_quote');
            ?>
                    <section class="example_classname sec_<?php echo $sec; ?>">
                        <div class="container_tm">
                            <div class="row_tm">
                                <div class="col_6_tm">
                                    <div class="text_wrap">
                                        <blockquote>
                                            <?php echo $aheadquote; ?>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="col_6_tm">
                                    <div class="img_area_wrap">
                                        <?php
                                        if (have_rows('ahead_quote_images')) :
                                            $x = 1;
                                            while (have_rows('ahead_quote_images')) : the_row();
                                                $aheadquoteimage = get_sub_field('ahead_quote_sec_image');
                                        ?>
                                                <img src="<?php echo $aheadquoteimage['url']; ?>" alt="" class="img_<?php echo $x; ?>" />
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
                        <section class="decade_section">
                            <div class="container_tm">
                                <div class="heading_wrap">
                                    <h3><?php echo $decadeheading; ?></h3>
                                </div>
                                <div class="images_wrap">
                                    <div class="row_tm">
                                        <?php
                                        if (have_rows('decade_image_block')) :
                                            $x = 1;
                                            while (have_rows('decade_image_block')) : the_row();
                                                $decadeimage = get_sub_field('decade_image');
                                        ?>
                                                <div class="col_4_tm">
                                                    <div class="image_wrap">
                                                        <img src="<?php echo $decadeimage['url']; ?>" alt="" class="img_<?php echo $x; ?>" />
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
                                <div class="btn_wrap">
                                    <?php
                                    if ($decadebutton) :
                                    ?>
                                        <a href="javascript:void(0)" class="start_again"><?php echo $decadebutton['title']; ?></a>
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

<?php get_footer(); ?>

<!--  jquery/3.7.1  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!--  GSAP  -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<!--  GSAP ScrollTrigger -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<!-- anime js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<!-- anniversary_script_tm -->
<script src="/wp-content/themes/divi-child/anniversary_script_tm.js"></script>



  