<?php
/**
 * Template part for displaying pagination
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

?>

<?php 
global $wp_query;
if ( have_posts() && $wp_query->found_posts > get_option( 'posts_per_page' ) ) : 
	?>
	<div class="pagination loading-wrap">
		<?php
		if ( defined( 'HOME_IMPROVEMENT_COMPANION_PRO' ) && ( ( get_post_type() === 'post' && get_theme_mod( 'mod_data_archive_enable_infiniteScroll', false ) || home_improvement_post_type() ) ) ) :
			?>
			<div id="loading-message"><span class="text"><?php esc_html_e( 'Load More', 'home-improvement' ); ?></span></div>
			<?php
		else :
			the_posts_pagination();
		endif;
		?>
	</div><!-- End .pagination -->
<?php endif; ?>
