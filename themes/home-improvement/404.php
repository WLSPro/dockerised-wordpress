<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package 'home-improvement'
 */

get_header();
?>

<div class="site-main-wrapper">
	<div class="container">
		<?php if ( get_theme_mod( 'mod_data_default_sidebar_type', 'right-sidebar' ) === 'left-sidebar' ) : ?>
			<?php get_sidebar(); ?>
		<?php endif ?>
		<main id="primary" class="site-main">
			<div class="container">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'home-improvement' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'home-improvement' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</main><!-- #main -->
		<?php if ( get_theme_mod( 'mod_data_default_sidebar_type', 'right-sidebar' ) === 'right-sidebar' ) : ?>
			<?php get_sidebar(); ?>
		<?php endif ?>
	</div>
</div>

<?php
get_footer();
