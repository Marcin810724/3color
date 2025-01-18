<?php 
/* 
Template Name: Blog
*/ 
?>

<?php get_header() ;?>


<main id="blog">
    <section class="intro">
        <div class="section-content">
            <div class="block">
                <div class="left">
                    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    <div class="title">
                        <h1><?php the_title(); ?></h1>
                    </div>

                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                    <?php if( get_field('text_btn_intro_blog') ): ?>
                    <div class="section-buttons">

                        <?php 
                        $link1 = get_field('link_btn_intro_blog');

                        if( $link1 ): 
                            $link1_url = $link1['url'];
                            $link1_title = $link1['title'];
                            $link1_target = $link1['target'] ? $link1['target'] : '_self';
                        ?>

                        <a class="main-btn" href="<?php echo esc_url( $link1_url ); ?>" rel="dofollow"
                            title="<?php echo esc_html( $link1_title ); ?>">


                            <?php the_field('text_btn_intro_blog') ?>
                        </a>

                        <?php endif; ?>
                    </div>
                    <?php endif; ?>




                </div>
                <div class="right">
                    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Aktualna strona paginacji
    $args = array(
        'post_type' => 'post', // Typ wpisów (może być inny, jeśli potrzebujesz)
        'posts_per_page' => 1, // Ilość postów na stronie
        'paged' => $paged, // Aktualna strona paginacji
    );


    $featured_post = get_field('wybierz_wyrozniony_wpis_blog');
    $post_title = esc_html($featured_post->post_title);
    $large = get_the_post_thumbnail($featured_post, 'large'); // Możesz zmienić rozmiar miniaturki, używając innej nazwy rozmiaru
     $excerpt = get_the_excerpt($featured_post);
     $permalink = get_permalink($featured_post);
     $buttonMore = get_field('button_more_blog');



    if( $featured_post ): 

    $query = new WP_Query($args);
    

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
                    <a href="<?php echo $permalink; ?>" class="block-post" rel="dofollow"
                        title="<?php echo $post_title; ?>">
                        <div class="img-content">
                            <?php echo $large; ?>
                        </div>
                        <div class="post-content">
                            <div class="post-title">
                                <h2><?php echo esc_html( $featured_post->post_title ); ?></h2>
                            </div>
                            <div class="text-content">
                                <p><?php echo $excerpt ?></p>
                            </div>
                            <div class="content-button">
                                <button><?php echo $buttonMore; ?></button>
                            </div>
                        </div>
                    </a>

                    <?php  }

        wp_reset_postdata();
    } else {
        // Jeśli nie ma postów
        echo 'Brak postów do wyświetlenia.';
    }
    ?>
                    <?php endif; ?>

                </div>
            </div>
    </section>





    <section class="posts">
        <div class="section-content">

            <div class="filters">
                <form class="searchandfilter">
                    <ul>
                        <li class="sf-field-category" data-sf-field-name="_sft_category" data-sf-field-type="category"
                            data-sf-field-input-type="radio">
                            <ul class="">
                                <li><a href="/blog/" title="blog" rel="dofollow">Wszystkie</a></li>
                                <?php
    $categories = get_categories();
    foreach ($categories as $category) {
        $category_link = get_category_link($category->term_id);
        echo '<li><a href="' . esc_url($category_link) . '" class="category-link" data-category="' . $category->slug . '" rel="dofollow" title="' . esc_attr($category->name) . '">' . $category->name . '</a></li>';

    }
    ?>

                            </ul>
                        </li>
                    </ul>
                </form>
            </div>


            <div class="posts-content">
                <div class="search-filter-results">
                    <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Aktualna strona paginacji
                $args = array(
                    'post_type' => 'post', // Typ wpisów (może być inny, jeśli potrzebujesz)
                    'posts_per_page' => 3, // Ilość postów na stronie
                    'paged' => $paged, // Aktualna strona paginacji
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>

                    <a class="post-item" rel="dofollow" title="<?php the_title_attribute(); ?>"
                        href="<?php the_permalink(); ?>">
                        <div class="img-content">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <div class="post-content">
                            <div class="post-title">
                                <h3><?php the_title(); ?></h3>
                            </div>

                            <div class="text-content">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="content-button">
                                <button><?php the_field('przycisk_czytaj_artykul', 'options'); ?></button>
                            </div>
                        </div>
                    </a>

                    <?php }

                    wp_reset_postdata();


                    echo '<div class="pagination">';

                    // Dodaj paginację z klasą "pagination"
                    $pagination_args = array(
                        'total' => $query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                        'before_page_number' => '<div class="pagination-item">',
                        'after_page_number' => '</div>',
                    );
                    echo paginate_links($pagination_args);

                     // Zakończ paginację
                     echo '</div>';

                } else {
                    // Jeśli nie ma postów
                    echo 'Brak postów do wyświetlenia.';
                }
                ?>
                </div>
            </div>
        </div>
    </section>













    <!-- filtrowanie -->

    <!-- <div id="categories">
        <?php
    $categories = get_categories();
    foreach ($categories as $category) {
        $category_link = get_category_link($category->term_id);
        echo '<a href="' . $category_link . '" class="category-link" data-category="' . $category->slug . '">' . $category->name . '</a>';
    }
    ?>
    </div>

    <div id="filtered-posts">

    </div> -->








    <!--  -->








    <?php
        // ukryte pole
        include('app/themes/ifl-new/template-parts/sekcje/ukryta-sekcja.php');
    ?>



    <?php
        // Dołącz szybki leasing
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