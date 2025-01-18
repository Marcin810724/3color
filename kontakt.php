<?php 
/* 
Template Name: Kontakt
*/ 
?>

<?php get_header() ;?>


<main id="kontakt">


    <section class="section-intro">
        <div class="section-intro__container">
            <div class="section-intro__block">
                <div class="section-intro__block-left">
                    <div class="breadcrumbs">
                        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    </div>
                    <div class="section-intro__block-left-title">
                        <h1><?php the_field('kontakt_intro_title');?></h1>
                    </div>
                    <div class="section-intro__block-left-subtitle">
                        <h2><?php the_field('kontakt_intro_subtitle');?></h2>
                    </div>
                    <div class="section-intro__block-left-header">
                        <p><?php the_field('kontakt_intro_header');?></p>
                    </div>
                    <div class="section-intro__block-left-columns">
                        <div class="section-intro__block-left-columns-column">
                            <?php the_field('kontakt_intro_column_1');?>
                        </div>
                        <div class="section-intro__block-left-columns-column">
                            <?php the_field('kontakt_intro_column_2');?>
                        </div>
                        <div class="section-intro__block-left-columns-column">
                            <?php the_field('kontakt_intro_column_3');?>
                        </div>
                        <div class="section-intro__block-left-columns-column">
                            <?php the_field('kontakt_intro_column_4');?>
                        </div>
                    </div>

                    <div class="section-intro__block-full-width">
                        <?php the_field('kontakt_intro_column_5');?>
                    </div>
                </div>
                <div class="section-intro__block-right">
                    <div class="section-intro__block-right-form">
                        <?php the_field('kontakt_intro_form');?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-mapa">
        <div id="main_site_map" style="width: 100%"></div>
    </section>


    <?php
        // ukryte pole
        include('app/themes/ifl-new/template-parts/sekcje/ukryta-sekcja.php');
    ?>


    <section class="map">
        <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.787220647619!2d19.933889077180044!3d50.07154641457247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b06a4a4a63d%3A0x57a8b326fe39acef!2sInternetowy%20Fundusz%20Leasingowy%20S.A.!5e0!3m2!1spl!2spl!4v1707393398692!5m2!1spl!2spl" width="100%" height="450" allowfullscreen="allowfullscreen"></iframe>
    </section>





    <?php
        // Dołącz naszych partnerow
        include('app/themes/ifl-new/template-parts/sekcje/fundusz.php');
    ?>




</main>

<?php get_footer();?>