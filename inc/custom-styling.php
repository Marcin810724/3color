<?php

// Register thumbnails
	add_theme_support( 'post-thumbnails' );
    // add_image_size( 'footer-social-15x15', 15, 15 ); // Soft Crop Mode



function add_stylesheets_and_scripts()
{
wp_enqueue_style( 'style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all' );
wp_enqueue_style('custom', get_template_directory_uri() . '/assets/dist/css/main.min.css', array(), filemtime(get_template_directory() . '/assets/dist/css/main.min.css'), 'all' );
wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array('jquery'), '4.3.1', true);
wp_enqueue_script('menuMobile-js', get_template_directory_uri() . '/assets/src/js/menu-mobile/menu-mobile.js', array(), null, true);


// add scripts on specific webpages
global $template;

    if ( ( basename( $template ) === 'homepage.php' ) ) {
        wp_enqueue_script('swiperbundle-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);
        wp_enqueue_script('swiperDrive-js', get_template_directory_uri() . '/assets/src/js/swiper-drive/swiper-drive.js', array(), null, true);
        wp_enqueue_script('hideSection-js', get_template_directory_uri() . '/assets/src/js/hide-section/hide-section.js', array(), null, true);
        wp_enqueue_style( 'homepage-css', get_template_directory_uri() . '/assets/dist/css/homepage.min.css' );
    }
   
    if ( ( basename( $template ) === 'tpl-rodo.php' ) ) {
        wp_enqueue_script('swiperbundle-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);
        wp_enqueue_script('swiperDrive-js', get_template_directory_uri() . '/assets/src/js/swiper-drive/swiper-drive.js', array(), null, true);
        wp_enqueue_style( 'rodo-css', get_template_directory_uri() . '/assets/dist/css/rodo.min.css' );
        wp_enqueue_script('hideSection-js', get_template_directory_uri() . '/assets/src/js/hide-section/hide-section.js', array(), null, true);
    }

       if ( ( basename( $template ) === 'faq.php' ) ) {
        wp_enqueue_script('swiperbundle-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);
        wp_enqueue_script('swiperDrive-js', get_template_directory_uri() . '/assets/src/js/swiper-drive/swiper-drive.js', array(), null, true);
        wp_enqueue_style( 'faq-css', get_template_directory_uri() . '/assets/dist/css/faq.min.css' );
        wp_enqueue_script('hideSection-js', get_template_directory_uri() . '/assets/src/js/hide-section/hide-section.js', array(), null, true);
        wp_enqueue_script('hideSection-js', get_template_directory_uri() . '/assets/src/js/hide-section/hide-section.js', array(), null, true);
    }

    if ( ( basename( $template ) === 'about.php' ) ) {
        wp_enqueue_style( 'about-css', get_template_directory_uri() . '/assets/dist/css/about.min.css' );
        wp_enqueue_script('hideSection-js', get_template_directory_uri() . '/assets/src/js/hide-section/hide-section.js', array(), null, true);
    }
    if ( ( basename( $template ) === 'blog.php' ) || ( basename( $template ) === 'archive.php' ) ) {
        wp_enqueue_script('swiperbundle-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);
        wp_enqueue_script('swiperDrive-js', get_template_directory_uri() . '/assets/src/js/swiper-drive/swiper-drive.js', array(), null, true);
        wp_enqueue_style( 'blog-css', get_template_directory_uri() . '/assets/dist/css/blog.min.css' );
        wp_enqueue_script('hideSection-js', get_template_directory_uri() . '/assets/src/js/hide-section/hide-section.js', array(), null, true);
    }

    if ( ( basename( $template ) === 'single.php' ) ) {
        wp_enqueue_script('swiperbundle-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);
        wp_enqueue_script('swiperDrive-js', get_template_directory_uri() . '/assets/src/js/swiper-drive/swiper-drive.js', array(), null, true);
        wp_enqueue_style( 'single-css', get_template_directory_uri() . '/assets/dist/css/single.min.css' );
        wp_enqueue_script('hideSection-js', get_template_directory_uri() . '/assets/src/js/hide-section/hide-section.js', array(), null, true);
    }

}
add_action('wp_enqueue_scripts', 'add_stylesheets_and_scripts');