<?php
get_header();

?>
<div class="container not-found__container">
    <section class="text-center">
        <h1 class="not-found__title">404</h1>
        <h2 class="not-found__subtitle"> <?php the_field('tresc_alertu_-_duza_czcionka_404','option') ?></h2>
        <p><?php the_field('tresc_alertu_dopisek_404','option') ?></p>
        <p><a class="text-secondary"
                href="/"><?php the_field('Tekst_powrotu_404','option') ?></a></p>
    </section>
</div>
<?php

get_footer();
?>
<style>
.not-found__container {
    margin: 150px auto 100px;
}

.text-center {
    text-align: center !important;
}

.not-found__title {
    color: #cc273f;
    font-weight: 400;
    font-size: 5rem !important;
}

.not-found__subtitle {
    font-weight: 400;
    font-size: 2rem !important;
}
</style>