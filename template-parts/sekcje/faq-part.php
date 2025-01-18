<div id="faq">
    <section class="faq">
        <div class="section-content">
            <div class="section-head-faq">
                <div class="title">
                    <h2><?php the_field('tytul_faq_kalk','options'); ?></h2>
                </div>
                <div class="subtitle">
                    <h3><?php the_field('podtytul_faq_kalk','options'); ?></h3>
                </div>
            </div>


            <?php
            if( have_rows('faq_rep_blocks_kalk','options') ):
                while( have_rows('faq_rep_blocks_kalk','options') ) : the_row(); ?>
            <div class="content">
                <div>
                    <input type="checkbox" id="question<?php echo get_row_index(); ?>" name="q" class="questions">
                    <div class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="11.115"
                            viewBox="0 0 18 11.115">
                            <path id="Icon_material-keyboard-arrow-up" data-name="Icon material-keyboard-arrow-up"
                                d="M11.115,12,18,18.87,24.885,12,27,14.115l-9,9-9-9Z" transform="translate(-9 -12)" />
                        </svg>
                    </div>
                    <label for="question<?php echo get_row_index(); ?>" class="question">
                        <h3><?php the_sub_field('faq_rep_que_kalk','options'); ?></h3>
                    </label>
                    <div class="answers">
                        <?php the_sub_field('faq_rep_answ_kalk','options'); ?></div>
                </div>
            </div>
            <?php endwhile;
            else :
            endif;
            ?>

        </div>
    </section>
</div>