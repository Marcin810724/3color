<section class="section-poznaj-naszych-partnerow">
    <div class="section-poznaj-naszych-partnerow__container">
        <div class="section-poznaj-naszych-partnerow-title">
            <h2><?php the_field('global_section_poznaj_naszych_partnerow_title','options');?></h2>
        </div>
        <div class="section-poznaj-naszych-partnerow-lista">
            <div class="swiper mySwiper-partnerzy">
                <div class="swiper-wrapper">
                    <?php if( get_field('global_section_poznaj_naszych_partnerow_rep','options') ): ?>
                    <?php while( the_repeater_field('global_section_poznaj_naszych_partnerow_rep', 'options') ): ?>

                    <div class="swiper-slide">
                        <img src="<?php the_sub_field('global_section_poznaj_naszych_partnerow_rep_img','options');?>"
                            alt="logo-partera" />
                    </div>

                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>