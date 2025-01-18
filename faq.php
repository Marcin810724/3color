<?php 
/* 
Template Name: FAQ
*/ 
?>

<?php get_header() ;?>


<main id="faq">



    <section class="section-about-leasing">
        <div class="section-about-leasing__container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            <div class="section-about-leasing__title">
                <h1><?php the_title();?></h1>
            </div>
            <div class="section-about-leasing__text">
                <?php the_content();?>
            </div>
        </div>
    </section>




    <?php
        // Dołącz FAQ
        include('app/themes/ifl-new/template-parts/sekcje/faq-part.php');

        // ukryte pole
        include('app/themes/ifl-new/template-parts/sekcje/ukryta-sekcja.php');
        include('app/themes/ifl-new/template-parts/sekcje/szybki-leasing.php');
        include('app/themes/ifl-new/template-parts/sekcje/nasi-partnerzy.php');
        include('app/themes/ifl-new/template-parts/sekcje/fundusz.php');
    ?>

</main>






<?php get_footer();?>