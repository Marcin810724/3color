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
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() ) {
	?>




<?php
	while ( $query->have_posts() ) {
		$query->the_post();

		?>
<a class="post-item" href="<?php the_permalink(); ?>">
    <div class="img-content">
        <?php the_post_thumbnail( 'large' );?>
    </div>
    <div class="post-content">
        <div class="post-title">
            <h3><?php the_title(); ?></h3>
        </div>

        <div class="text-content">
            <?php the_excerpt(); ?>
        </div>
        <div class="content-button">
            <button><?php the_field('przycisk_czytaj_artykul','options'); ?></button>
        </div>
    </div>




</a>


<?php
	}
	?>


<div class="pagination">

    <?php
if ( $query->max_num_pages > 1 ) {
    echo '<div class="pagination">';
    for ( $i = 1; $i <= $query->max_num_pages; $i++ ) {
        echo '<span class="page-numbers';
        if ( $i == $query->query['paged'] ) {
            echo ' current';
        }
        echo '"><a href="' . get_pagenum_link( $i ) . '">' . $i . '</a></span>';
    }
    echo '</div>';
}
?>

</div>
<?php
} else {
	echo 'No Results Found';
}
?>