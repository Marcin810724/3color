<?php 
/* 
Template Name: O firmie
*/ 
?>

<?php get_header() ;?>


<main id="about">
    <section class="section-about-leasing">
        <div class="section-about-leasing__container">
            <div class="block">
                <div class="left">
                    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    <div class="section-about-leasing__title">
                        <h1 class="title-H1"><?php the_field('title_about_page')?></h1>
                    </div>
                    <div class="section-about-leasing__text">
                        <?php the_field('text_about_page')?>
                    </div>
                </div>
                <div class="right">
                    <div class="logotype">
                        <div class="section-fundusz__logo">
                            <?php if( get_field('section_dodatkowe_loga_rep_about') ): ?>
                            <?php while( the_repeater_field('section_dodatkowe_loga_rep_about') ): ?><div
                                class="logo-item">
                                <?php $partnerzyAbout = get_sub_field('section_dodatkowe_loga_rep_img_about'); ?>
                                <img src="<?php echo $partnerzyAbout['sizes']['homepage-partnerzy-356x110']; ?>"
                                    width="<?php echo $partnerzyAbout['sizes']['homepage-partnerzy-356x110-width']; ?>"
                                    height="<?php echo $partnerzyAbout['sizes']['homepage-partnerzy-356x110-height']; ?>"
                                    alt="<?php echo esc_attr($partnerzyAbout['alt']); ?>" />
                            </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
    </section>


    <section class="person">
        <div class="section-content">
            <div class="list-person">
                <?php
                if( have_rows('dodaj_blok_z_dzialem_about') ):
                    while( have_rows('dodaj_blok_z_dzialem_about') ) : the_row(); ?>

                <div class="title-h2"><?php the_sub_field('nazwa_dzialu_zespol_about') ?></div>
                <div class="blocks">
                    <?php
                if( have_rows('dodaj_osoby_zespol_about') ):
                    while( have_rows('dodaj_osoby_zespol_about') ) : the_row(); ?>
                    <div class="cart">
                        <div class="left">
                            <?php if( get_sub_field('zdjecie_osoby_zespol_about') ): ?>
                            <div class="img-person">
                                <?php $imgPerson = get_sub_field('zdjecie_osoby_zespol_about'); ?>
                                <img src="<?php echo $imgPerson['sizes']['large']; ?>"
                                    width="<?php echo $imgPerson['sizes']['large-width']; ?>"
                                    height="<?php echo $imgPerson['sizes']['large-height']; ?>"
                                    alt="<?php echo esc_attr($imgPerson['alt']); ?>" />
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="right">
                            <div class="meta">
                                <div class="rola">
                                    <div class="title-h4"><?php the_sub_field('stanowiko_osoby_zespol_about') ?></div>
                                </div>
                                <div class="name">
                                    <div class="title-h3">
                                        <?php the_sub_field('imie_i_nazwisko_osoby_zespol_about') ?>
                                    </div>
                                </div>
                                <div class="text">
                                    <?php the_sub_field('tekst_osoby_zespol_about') ?>
                                </div>

                                <div class="social-list">
                                    <?php
                                if( have_rows('dodaj_social_media_osoby_zespol_about') ):
                                    while( have_rows('dodaj_social_media_osoby_zespol_about') ) : the_row(); ?>
                                    <?php if( get_sub_field('ikona_sm_osoby_zespol_about') ): ?>
                                    <a href="<?php the_sub_field('link_sm_osoby_zespol_about') ?>">
                                        <?php $imgIconSM = get_sub_field('ikona_sm_osoby_zespol_about'); ?>
                                        <img src="<?php echo $imgIconSM['sizes']['thumbnail']; ?>"
                                            width="<?php echo $imgIconSM['sizes']['thumbnail-width']; ?>"
                                            height="<?php echo $imgIconSM['sizes']['thumbnail-height']; ?>"
                                            alt="<?php echo esc_attr($imgIconSM['alt']); ?>" />
                                    </a>
                                    <?php endif; ?>
                                    <?php endwhile;
                                else :
                                endif;
                                ?>
                                </div>

                            </div>
                        </div>


                    </div>
                    <?php endwhile;
            else :
            endif;
            ?>
                </div>
                <?php endwhile;
            else :
            endif;
            ?>
            </div>
        </div>

    </section>


  <div class="section-content">
    <div class="about-contact">


        <?php 
                        $link1 = get_field('link_kontakt_page_about');

                        if( $link1 ): 
                            $link1_url = $link1['url'];
                            $link1_title = $link1['title'];
                            $link1_target = $link1['target'] ? $link1['target'] : '_self';
                        ?>

                        <a class="main-btn" href="<?php echo esc_url( $link1_url ); ?>" rel="dofollow"
                            title="<?php echo esc_html( $link1_title ); ?>">

                            <?php the_field('tekst_link_kontakt_page_about');?>
                        </a>
                        <?php endif; ?>




    </div>
  </div>

    <?php
        // ukryte pole
        include('app/themes/ifl-new/template-parts/sekcje/ukryta-sekcja.php');
    ?>

    <?php
        include('app/themes/ifl-new/template-parts/sekcje/fundusz.php');
    ?>

</main>






<?php get_footer();?>