<?php


function theme_setup() {
    // Dodaj obsługę logotypu
    add_theme_support('custom-logo', array(
        'height'      => 70, // Wysokość logotypu
        'width'       => 230, // Szerokość logotypu
        'flex-height' => true, // Elastyczna wysokość
        'flex-width'  => true, // Elastyczna szerokość
        'header-text' => array('site-title', 'site-description'), // Opcjonalne teksty
    ));
}
add_action('after_setup_theme', 'theme_setup');




// delete p from contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');



function filter_acf_the_content( $value ) {
if ( class_exists( 'iworks_orphan' )) {
$orphan = new iworks_orphan();
$value = $orphan->replace( $value );
}
 
return $value;
};

add_action('template_redirect', 'my_custom_disable_author_page');

function my_custom_disable_author_page() {
    global $wp_query;

    if ( is_author() ) {
        // Redirect to homepage, set status to 301 permenant redirect. 
        // Function defaults to 302 temporary redirect. 
        wp_redirect(get_option('/'), 301); 
        exit; 
    }
}

register_nav_menus( array(
	'primary' => __( 'Primary Menu', '3colortheme' ),
    'lastbutton' => __( 'Last Button Menu', '3colortheme' ),
    'bottom-menu' => __('Bottom-Menu', '3colortheme'),
) );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}




// Alternative
// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
wp_dequeue_style( 'wp-block-library' ); // Wordpress core
wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
wp_dequeue_style( 'wc-block-style' ); // WooCommerce
wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

//* TN Dequeue Styles - Remove Font Awesome from WordPress theme
add_action( 'wp_print_styles', 'tn_dequeue_font_awesome_style' );
function tn_dequeue_font_awesome_style() {
      wp_dequeue_style( 'fontawesome' );
      wp_deregister_style( 'fontawesome' );
}



//add option page to panel (ACF)
if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Stopka',
        'menu_title' => 'Stopka',
        'menu_slug'  => 'stopka',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-admin-tools', // Zmień ikonę
    ));

    acf_add_options_page(array(
        'page_title' => 'Sekcje Globalne',
        'menu_title' => 'Sekcje Globalne',
        'menu_slug'  => 'sekcje-globalne',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-layout', // Zmień ikonę
    ));
}


remove_action('wp_print_styles', 'print_emoji_styles'); // Usuwa style emoji
remove_action('wp_print_scripts', 'print_emoji_script'); // Usuwa skrypt emoji
remove_action('wp_footer', 'wp_emoji_settings'); // Usuwa ustawienia emoji w stopce
remove_filter('the_content_feed', 'wp_staticize_emoji'); // Usuwa emoji z treści w kanałach RSS
remove_filter('the_excerpt_feed', 'wp_staticize_emoji'); // Usuwa emoji z wyciągów w kanałach RSS

































//Ajax
// AJAX callback function to load posts by term slug
function load_posts_by_term() {
    $term_slug = sanitize_text_field($_POST['term_slug']); // Sanitize the input

    if ($term_slug === 'all') {
        $args = array(
            'post_type' => 'oferta-leasing', // Adjust to your custom post type
            'posts_per_page' => -1, // Retrieve all posts
        );
    } else {
        $term = get_term_by('slug', $term_slug, 'marka'); // Replace 'marka' with your taxonomy name
        if (!$term) {
            echo 'No posts found for the selected term.';
            die();
        }

        $args = array(
            'post_type' => 'oferta-leasing', // Adjust to your custom post type
            'posts_per_page' => -1, // Retrieve all posts
            'tax_query' => array(
                array(
                    'taxonomy' => 'marka', // Replace with your taxonomy name
                    'field' => 'term_id',
                    'terms' => $term->term_id,
                ),
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Output post content with separate <div> elements
            echo '<div class="post-item">';
            echo '<div class="post-thumbnail">' . get_the_post_thumbnail() . '</div>';
            echo '<div class="post-title">' . get_the_title() . '</div>';
            echo '<div class="post-year">' . get_field('new_single_year') . '</div>';
            echo '<a href="' . get_permalink() . '" class="post-button">Zobacz więcej</a>';
            echo '</div>';
        }
        wp_reset_postdata();
    } else {
        echo 'No posts found for the selected term.';
    }

    die();
}

// Hook for the above AJAX callback function
add_action('wp_ajax_load_posts_by_term', 'load_posts_by_term');
add_action('wp_ajax_nopriv_load_posts_by_term', 'load_posts_by_term');