<section class="section-fundusz">
    <div class="section-fundusz__break"></div>
    <div class="section-fundusz__main">
        <div class="section-fundusz__container">
            <?php if( get_field('global_section_dodatkowe_loga_rep','options') ): ?>
            <?php while( the_repeater_field('global_section_dodatkowe_loga_rep', 'options') ): ?>

            <div class="section-fundusz__logo">
                <?php $partnerzy = get_sub_field('global_section_dodatkowe_loga_rep_img'); ?>
                <img src="<?php echo $partnerzy['sizes']['homepage-partnerzy-356x110']; ?>"
                    width="<?php echo $partnerzy['sizes']['homepage-partnerzy-356x110-width']; ?>"
                    height="<?php echo $partnerzy['sizes']['homepage-partnerzy-356x110-height']; ?>"
                    alt="<?php echo esc_attr($partnerzy['alt']); ?>" />
            </div>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>