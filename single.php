<?php get_header() ;?>

<main class="single-post" id="single-post">

    <section class="section-block">
        <div class="section-content">
            <div class="left">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                <div class="img-thispost-mobile">
                    <?php the_post_thumbnail('blog-thumbnailMB'); ?>
                </div>
                <div class="post_title">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
                <div class="post_text">
                    <?php while(have_posts()) : the_post(); ?>
                    <?php the_content();?>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="right">


                <div class="post_text">
                    <?php while(have_posts()) : the_post(); ?>
                    <?php if (has_post_thumbnail()) { ?>
                    <div class="img-thispost">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php } ?>
                    <?php endwhile; ?>
                </div>
                <?php echo do_shortcode('[ez-toc]') ?>

                <div class="post-list">
                    <div class="title">
                        <h4>Inne wpisy</h4>
                    </div>
                    <div class="posts">
                        <?php
                            // args query
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 2,
                                'post__not_in' => array( $post->ID )
                            );

                            // custom query
                            $recent_posts = new WP_Query($args);

                            // check that we have results
                            if($recent_posts->have_posts()) : $i=0; ?>

                        <?php 
                            // start loop
                            while ($recent_posts->have_posts() ) : $recent_posts->the_post(); ?>


                        <a href="<?php the_permalink(); ?>" rel="dofollow" title="<?php the_title_attribute(); ?>" class="recent-post">

                            <div class="img-recent-post">
                                <h3>
                                    <?php echo get_the_title(); ?>
                                </h3>
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="content">
                                <div class="text">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="section-buttons">
                                    <button class="btn btn-main">
                                        Przezytaj artykuł
                                    </button>
                                </div>
                            </div>
                        </a>



                        <?php endwhile; ?>
                        <?php wp_reset_query();?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>




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


<?php get_footer() ;?>