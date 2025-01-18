<?php 
/* 
Template Name: Rodo
*/ 
?>

<?php get_header() ;?>


<main id="rodo">

    <section class="section-intro">
        <div class="section-intro__container">
            <div class="breadcrumbs">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>
            <div class="section-intro__title">
                <h1><?php the_title();?></h1>
            </div>
            <div class="section-intro__content">
                <?php the_content();?>
            </div>
        </div>
    </section>

    <?php
        // Dołącz naszych partnerow
        include('app/themes/ifl-new/template-parts/sekcje/szybki-leasing.php');
    ?>

    <?php
        // Dołącz naszych partnerow
        include('app/themes/ifl-new/template-parts/sekcje/nasi-partnerzy.php');
    ?>

    <?php
        // Dołącz naszych partnerow
        include('app/themes/ifl-new/template-parts/sekcje/fundusz.php');
    ?>



</main>

<?php get_footer();?>