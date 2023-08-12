<?php
/*
Template Name: Announcement
*/
get_header();
?>

<?php if( have_rows('asx_announcements') ): ?>
    <?php while( have_rows('asx_announcements') ): the_row(); ?>

        <?php if( get_row_layout() == 'banner' ): ?>
            <?php $banner_heading = get_sub_field('banner_heading'); ?>
           
        <?php elseif( get_row_layout() == 'tabs' ): 
            $tabs = get_sub_field('asx_announcements_tab');
        ?>
            
        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>


<section class="greybg blue">
    <?php if($banner_heading){ ?>
        <h1 class="hdng">
            <?php echo $banner_heading;?>
        </h1>
    <?php } ?>
    <?php if($tabs){ ?>
        <div class="team-a-section">
            <ul class="teamTabs" id="announceTab">   
                <?php 
                foreach( $tabs as $tab ) {
                    $button_text = $tab['tab_button_text']; ?>
                    <li> 
                        <a href="javascript:void(0);">
                            <?php echo $button_text ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</section>

<section class="container-fluid contentBoxOuter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-box inner">
                    <?php if($tabs){ ?>
                        <?php 
                        foreach( $tabs as $tab ) {
                            $tab_content_heading = $tab['tab_content_heading']; 
                            $tab_content_shortcode = $tab['tab_content_shortcode']; 
                            ?>
                            <div class="row changableContent" style="display:none;">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="subHdng"><?php echo $tab_content_heading ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inner borderTop">
                                        <?php echo do_shortcode($tab_content_shortcode)?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    body#global {
    margin: 0;
}

div#announcements-table_wrapper {
    position: relative;
}

div#announcements-table_wrapper th {
    position: relative;
    color: #141414;
    font-size: 18px;
    line-height: 1.2;
}

div#announcements-table_wrapper td {
    position: relative;
    color: #141414;
    font-size: 16px;
    line-height: 1.2;
}

div#announcements-table_wrapper 
 div#announcements-table_length {
    position: relative;
    padding: 15px 0;
}

div#announcements-table_wrapper div#announcements-table_length label {
    position: relative;
    color: #141414;
    font-size: 16px;
}

div#announcements-table_wrapper div#announcements-table_length label select {
    position: relative;
    min-width: 80px;
    padding: 5px;
    border: none;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    color: #141414;
    font-size: 16px;
    margin: 0 10px;
}

div#announcements-table_wrapper div#announcements-table_filter {
    position: relative;
    padding: 15px 0;
}

div#announcements-table_wrapper div#announcements-table_filter input[type="search"] {
    position: relative;
    font-size: 16px;
    padding: 10px;
    border: none;
    margin-left: 10px;
    min-width: 200px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}

div#announcements-table_wrapper div#announcements-table_filter label {
    font-size: 16px;
    color: #141414;
}
</style>

<?php
get_footer();
?>