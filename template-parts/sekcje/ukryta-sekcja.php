<?php if( get_field('hidden_text_field') ): ?>
<section class="section-o-nas">
    <div class="section-o-nas__container">
        <div class="section-o-nas__text">
            <div class="content-hiddnen">
                <button type="button"
                    class="collapsible main-btn"><?php the_field('button_hidden_text_field') ?></button>
                <div class="text-content-hidden">
                    <?php the_field('hidden_text_field') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>