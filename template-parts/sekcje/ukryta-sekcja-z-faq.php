<?php if( get_field('hidden_text_field') ): ?>
<div class="hidden-area">
    <div class="section-o-nas__container">
        <div class="section-o-nas__text">
            <div class="content-hiddnen">
                <button type="button"
                    class="collapsible main-btn"><?php the_field('button_hidden_text_field') ?></button>



                <div class="text-content-hidden">
                    <?php the_field('hidden_text_field') ?>

                    <?php if( get_field('home_hidden_section_faq_true') ): ?>
                    <section class="section-faq-local">
                        <div class="section-faq__container">
                        <?php if( get_field('home_hidden_section_faq_title') ): ?>
                            <div class="section-faq__title">
                                <h2><?php the_field('home_hidden_section_faq_title');?></h2>
                            </div>
                            <?php endif; ?>

                            <?php if( get_field('home_hidden_section_faq_subtitle') ): ?>
                            <div class="section-faq__subtitle">
                                <span><?php the_field('home_hidden_section_faq_subtitle');?></span>
                            </div>
                            <?php endif; ?>


                            <div class="section-faq__lists">
                                <?php
                    if( have_rows('faq_rep_blocks_local') ):
                        while( have_rows('faq_rep_blocks_local') ) : the_row(); ?>
                                <div class="content">
                                    <div>
                                        <input type="checkbox" id="question<?php echo get_row_index(); ?>" name="q"
                                            class="questions">
                                        <div class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="11.115" viewBox="0 0 18 11.115">
                                                <path id="Icon_material-keyboard-arrow-up"
                                                    data-name="Icon material-keyboard-arrow-up"
                                                    d="M11.115,12,18,18.87,24.885,12,27,14.115l-9,9-9-9Z"
                                                    transform="translate(-9 -12)" />
                                            </svg>
                                        </div>
                                        <label for="question<?php echo get_row_index(); ?>" class="question">
                                            <h3><?php the_sub_field('faq_rep_que_local'); ?></h3>
                                        </label>
                                        <div class="answers">
                                            <?php the_sub_field('faq_rep_answ_local'); ?></div>
                                    </div>
                                </div>
                                <?php endwhile;
                    else :
                    endif;
                    ?>
                            </div>
                        </div>
                    </section>
                    <?php endif; ?>

                </div>


            </div>
        </div>
    </div>
</div>



<?php endif; ?>