<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>


<div class="grid-container">

    <?php if ( $query->have_posts() )
{
	?>




    <?php
	while ($query->have_posts())  
	{
		$query->the_post();
?>

    <div class="grid-item">
        <a class="block_link" href="<?php echo get_permalink(); ?>" rel="dofollow"
            title="<?php the_title_attribute(); ?>">
            <?php if( get_field('ukryj_pojazd_leasingowy_sprzedany') ) {  ?><div class="sold">Sprzedany</div> <?php } ?>
        </a>
        <div
            class="block_single block_single_search <?php if( get_field('ukryj_pojazd_leasingowy_sprzedany') ) {  ?>sprzedany <?php } ?>">
            <a class="block_link" href="<?php echo get_permalink(); ?>" rel="dofollow"
                title="<?php the_title_attribute(); ?>">
                <div class="block_single-top">
                    <div class="block_single-top-title">
                        <span><?php echo get_the_title(); ?></span>
                    </div>
                    <div class="block_single-top-year">
                        <span><?php the_field('new_single_year');?></span>
                    </div>
                </div>
                <div class="block_single-bottom">
                    <div class="block_single-bottom-img">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" />
                    </div>
                    <div class="block_single-bottom-btn">
                        <button class="main-btn-white">Zobacz więcej</button>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <?php
	}
	?>


</div>

<div class="pagination">

    <div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>
    <div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
    <?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
</div>
<?php
}
else
{
	echo "<div class='noFound'>Brak realizacji w wybranej kategorii, wybierz inna kategorię</div>";
}
?>