
<?php 

?>
<section class="agenda_sec">
    <div class="container px-0">
        <div class="row">
          <div class="agenda_tab">
            <div class="tab_head">
                <?php
                    if( have_rows('agenda') ):
                        while( have_rows('agenda') ) : the_row();

                            // Loop over sub repeater rows.
                            if( have_rows('agenda_content') ):
                                while( have_rows('agenda_content') ) : the_row();

                                    // Get sub value.
                                    $agenda_tab_button_day = get_sub_field('agenda_tab_button_day');
                                    $agenda_tab_button_date = get_sub_field('agenda_tab_button_date');
                                    ?>

                                    <?php if(($agenda_tab_button_day) || ($agenda_tab_button_date)):?>
                                        <button>
                                            <span class="day"><?php echo $agenda_tab_button_day; ?></span>
                                            <span class="date"><?php echo $agenda_tab_button_date; ?></span>
                                        </button>
                                        <?php
                                    endif;
                                endwhile;
                            endif;
                        endwhile;
                    endif;
                ?>
            </div>
            <div class="tab_content_wrap">
                <?php
                    if( have_rows('agenda') ):
                        while( have_rows('agenda') ) : the_row();
                        
                            // Loop over sub repeater rows.
                            if( have_rows('agenda_content') ):
                                while( have_rows('agenda_content') ) : the_row(); ?>
                                    <div class="tab_content">
                                        <div class="accordion_wrap">
                                        <?php
                                            // Loop over sub repeater rows.
                                            if( have_rows('agenda_tab_content') ):
                                                while( have_rows('agenda_tab_content') ) : the_row();

                                                    // Get sub value.
                                                    $accordion_button_time = get_sub_field('accordion_button_time');
                                                    $accordion_button_text = get_sub_field('accordion_button_text');
                                                    $accordion_item_content = get_sub_field('accordion_item_content');
                                                    $speakers_heading = get_sub_field('speakers_heading');
                                                    ?>

                                                    <div class="accordion_item">
                                                        <div class="accordion_head">
                                                            <?php if(($accordion_button_time) || ($accordion_button_text)):?>
                                                                <button>
                                                                    <?php if($accordion_button_time):?>
                                                                        <span class="time"><?php echo $accordion_button_time; ?></span>
                                                                    <?php endif;?>
                                                                    <?php if($accordion_button_text):?>
                                                                        <span class="text"><?php echo $accordion_button_text; ?></span>
                                                                    <?php endif;?>
                                                                </button>
                                                            <?php endif;?>
                                                        </div>
                                                        <div class="accordion_content">
                                                            <div class="inner">
                                                                <?php echo $accordion_item_content; ?>
                                                                <div class="accordion_speakers_sec">
                                                                    <h3><?php echo $speakers_heading; ?></h3>
                                                                    <div class="accordion_speakers_wrap">

                                                                    <?php
                                                                        // Loop over sub repeater rows.
                                                                        if( have_rows('speakers') ):
                                                                            while( have_rows('speakers') ) : the_row();

                                                                                // Get sub value.
                                                                                $speaker_image = get_sub_field('speaker_image');
                                                                                $speaker_title = get_sub_field('speaker_title');
                                                                                $speaker_designation = get_sub_field('speaker_designation');
                                                                                ?>


                                                                                <div class="speaker_item">
                                                                                    <div class="img_box">
                                                                                        <img
                                                                                            src="<?php echo $speaker_image['url'];?>"
                                                                                            alt="<?php echo $speaker_image['alt'];?>"
                                                                                            />
                                                                                    </div>
                                                                                    <div class="text_wrap">
                                                                                        <h4><?php echo $speaker_title;?></h4>
                                                                                        <h5 class="designation"><?php echo $speaker_designation;?></h5>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                            endwhile;
                                                                        endif;
                                                                    ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php                                            
                                                endwhile;
                                            endif;?>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>


    
   