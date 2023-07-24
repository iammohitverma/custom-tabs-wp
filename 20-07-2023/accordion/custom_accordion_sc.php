<div class="custom_accordion_wrap">
    <div class="inner">
        <ul>
            <?php
            $accordion_repeater_field_name  = 'accordions';
            if( have_rows($accordion_repeater_field_name) ): ?>
                <?php while( have_rows($accordion_repeater_field_name) ): the_row(); 
                    $accordionItemTitle = get_sub_field('title');
                    $accordionItemDesc = get_sub_field('description');
                    ?>
                    <li class="accordion_item">
                        <div class="accordion_head">
                            <span class="icon"></span>
                            <h4><?php echo $accordionItemTitle;?></h4>
                        </div>
                        <div class="accordion_body">
                            <p><?php echo $accordionItemDesc;?></p>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>    
    </div>
</div>
