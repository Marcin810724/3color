<?php get_header() ;?>


<main id="blog">


    <section class="intro">
        <div class="section-content">
            <div class="block">
                <div class="title-archive">
                    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    <div class="title">
                        <?php
if (is_category()) {
    $title = single_cat_title('', false);
    echo "<h1>$title</h1>";
} elseif (is_tag()) {
    $title = single_tag_title('', false);
    echo "<h1>$title</h1>";
} elseif (is_author()) {
    $title = get_the_author();
    echo "<h1>$title</h1>";
} else {
    $title = 'Archiwum';
    echo "<h1>$title</h1>";
}
?>


                    </div>



                    <?php
if (is_category()) {
    $category = get_queried_object();
    $category_description = category_description($category->term_id);
    if (!empty($category_description)) {
        echo '<div class="text">' . $category_description . '</div>';
    }
}
?>


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
        echo '<li><a href="' . $category_link . '" class="category-link" data-category="' . $category->slug . '" rel="dofollow" title="' . esc_attr($category->name) . '">' . $category->name . '</a></li>';
        
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
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
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

                    // Dodaj paginację
                    the_posts_pagination(array(
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;',
                    ));

                } else {
                    // Jeśli nie ma postów
                    echo 'Brak postów do wyświetlenia.';
                }
                ?>
                </div>
            </div>
        </div>
    </section>























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