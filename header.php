<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        if (is_home()) {
            bloginfo('name'); // Wyświetla nazwę witryny na stronie głównej

        } elseif (is_category()) {
            single_cat_title(); // Wyświetla nazwę kategorii

        } elseif (is_tag()) {
            single_tag_title(); // Wyświetla nazwę tagu

        } elseif (is_author()) {
            the_post();
            echo 'Autor: ' . get_the_author(); // Wyświetla nazwę autora
            rewind_posts();

        } elseif (is_day()) {
            echo 'Archiwum dla dnia: ' . get_the_date(); // Wyświetla datę dla archiwum dziennego

        } elseif (is_month()) {
            echo 'Archiwum dla miesiąca: ' . get_the_date('F Y'); // Wyświetla datę dla archiwum miesięcznego

        } elseif (is_year()) {
            echo 'Archiwum dla roku: ' . get_the_date('Y'); // Wyświetla datę dla archiwum rocznego

        } else {
            wp_title(''); // Wyświetla tytuł strony dla innych przypadków
        }
        ?>
    </title>
    <?php get_template_part( 'template-parts/header-scripts' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>

<body>

    <header>

        <div class="header-container">
            <div class="section-content">
                <div class="header-content">
                    <!-- custom logo start -->
                    <div class="navbar-logo">
                        <?php 
                          $custom_logo_id = get_theme_mod( 'custom_logo' );
                          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                          ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
                            title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img
                                src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo( 'name' ) ?>"></a>
                    </div>
                    <!--  custom logo stop -->

                    <div class="navbar-data">
                        <div class="navbar-menu">

                            <?php
                              wp_nav_menu( array(
                                  'theme_location'    => 'primary',
                                  'depth'             => 2,
                                  'container_id'      => 'navbarNavDropdown',
                                  'menu_class'        => 'nav navbar-desktop',
                                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                  'walker'            =>  new WP_Bootstrap_Navwalker(),
                                  
                              ) );

                              wp_nav_menu( array(
                                'theme_location'    => 'lastbutton',
                                'depth'             => 2,
                                'container_id'      => 'navbarNavDropdown',
                                'menu_class'        => 'nav navbar-desktop',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            =>  new WP_Bootstrap_Navwalker(),
                                
                            ) );
                              ?>
                        </div>

                        <div class="navbar-hamburger" id="nav-hamburger">
                            <button class="navbar-toggler first-button" type="button"
                                data-target="#navbarNavDropdown-mobile" aria-controls="navbarSupportedContent20"
                                aria-expanded="false" aria-label="Toggle navigation" id="nav-hamburger-inner">
                                <div class="animated-icon1">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="menu-mobile" id="menu-mobile">

            <?php
                          wp_nav_menu( array(
                              'theme_location'    => 'primary',
                              'depth'             => 2,
                              'container_id'      => 'navbarNavDropdown-mobile',
                              'menu_class'        => 'nav navbar-desktop',
                          ) );
                          ?>
            <div class="menu-img">

            </div>
        </div>

    </header>