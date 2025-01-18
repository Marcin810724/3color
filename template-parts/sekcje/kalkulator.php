<section class="section-kalkulator">
    <div class="section-kalkulator__container">

        <?php 
							$linkForm = get_field('global_section_kalkulator_href','options');

							if( $linkForm ): 
								$linkForm_url = $linkForm['url'];
								$linkForm_title = $linkForm['title'];
								$linkForm_target = $linkForm['target'] ? $linkForm['target'] : '_self';
							?>

        <a href="<?php echo esc_url( $linkForm_url ); ?>" rel="dofollow"
            title="<?php echo esc_html( $linkForm_title ); ?>">
            <div class="section-kalkulator__block">
                <div class="section-kalkulator__block-left">
                    <div class="section-kalkulator__block-form">

                        <?php $kalkgif = get_field('global_section_kalkulator_gif','options'); ?>
                        <img src="<?php echo $kalkgif['sizes']['homepage-kalkulator-699x705']; ?>"
                            width="<?php echo $kalkgif['sizes']['homepage-kalkulator-699x705-width']; ?>"
                            height="<?php echo $kalkgif['sizes']['homepage-kalkulator-699x705-height']; ?>"
                            alt="<?php echo esc_attr($kalkgif['alt']); ?>" />

                    </div>
                </div>
                <div class="section-kalkulator__block-right">
                    <div class="section-kalkulator__block-img">
                        <?php $kalkimg = get_field('global_section_kalkulator_img','options'); ?>
                        <img src="<?php echo $kalkimg['sizes']['homepage-kalkulator-632x387']; ?>"
                            width="<?php echo $kalkimg['sizes']['homepage-kalkulator-632x387-width']; ?>"
                            height="<?php echo $kalkimg['sizes']['homepage-kalkulator-632x387-height']; ?>"
                            alt="<?php echo esc_attr($kalkimg['alt']); ?>" />
                    </div>
                    <div class="section-kalkulator__block-title">
                        <h2><?php the_field('global_section_kalkulator_title','options');?></h2>
                    </div>
                    <div class="section-kalkulator__block-text">
                        <?php the_field('global_section_kalkulator_text','options');?>
                    </div>
                </div>
            </div>
        </a>
        <?php endif; ?>
    </div>
</section>