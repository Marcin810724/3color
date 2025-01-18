<section class="section-szybki-leasing">
    <div class="section-szybki-leasing__container">
        <div class="section-szybki-leasing__left">
            <div class="section-szybki-leasing__left-block">
                <div class="section-szybki-leasing__left-block-icon">
                    <?php $szybkileasin1 = get_field('global_section_szybki_leasing_img_1','options'); ?>
                    <img src="<?php echo $szybkileasin1['sizes']['homepage-czy-warto-100x100']; ?>"
                        width="<?php echo $szybkileasin1['sizes']['homepage-czy-warto-100x100-width']; ?>"
                        height="<?php echo $szybkileasin1['sizes']['homepage-czy-warto-100x100-height']; ?>"
                        alt="<?php echo esc_attr($szybkileasin1['alt']); ?>" />
                </div>
                <div class="section-szybki-leasing__left-block-text">
                    <div class="section-szybki-leasing__left-block-text-title">
                        <span><?php the_field('global_section_szybki_leasing_title_1','options');?></span>
                    </div>
                    <div class="section-szybki-leasing__left-block-text-main">
                        <?php the_field('global_section_szybki_leasing_text_1','options');?>
                    </div>
                </div>
            </div>
            <div class="section-szybki-leasing__left-block">
                <div class="section-szybki-leasing__left-block-icon">
                    <?php $szybkileasin2 = get_field('global_section_szybki_leasing_img_2','options'); ?>
                    <img src="<?php echo $szybkileasin2['sizes']['homepage-czy-warto-100x100']; ?>"
                        width="<?php echo $szybkileasin2['sizes']['homepage-czy-warto-100x100-width']; ?>"
                        height="<?php echo $szybkileasin2['sizes']['homepage-czy-warto-100x100-height']; ?>"
                        alt="<?php echo esc_attr($szybkileasin2['alt']); ?>" />
                </div>
                <div class="section-szybki-leasing__left-block-text">
                    <div class="section-szybki-leasing__left-block-text-title">
                        <span><?php the_field('global_section_szybki_leasing_title_2','options');?></span>
                    </div>
                    <div class="section-szybki-leasing__left-block-text-main">
                        <?php the_field('global_section_szybki_leasing_text_2','options');?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-szybki-leasing__right">
            <div class="section-szybki-leasing__right-title">
                <h2><?php the_field('global_section_szybki_leasing_title','options');?></h2>
            </div>
            <div class="section-szybki-leasing__right-subtitle">
                <h3><?php the_field('global_section_szybki_leasing_subtitle','options');?></h3>
            </div>
            <div class="section-szybki-leasing__right-text">
                <?php the_field('global_section_szybki_leasing_text','options');?>
            </div>
        </div>
    </div>
</section>