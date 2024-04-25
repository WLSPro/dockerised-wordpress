<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

get_header();
?>
	<div class="site-main-wrapper">
		<div class="container">
			<?php if ( get_theme_mod( 'mod_data_archive_sidebar_type', 'right-sidebar' ) === 'left-sidebar' ) : ?>
				<?php get_sidebar(); ?>
			<?php endif ?>
			<main id="primary" class="site-main">

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header class="page-header">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
				<?php else : ?>
					<header class="page-header">
						<h2 class="page-title"><?php esc_html_e( 'Posts', 'home-improvement' ); ?></h2>
					</header>
				<?php endif; ?>

				<div class="<?php echo esc_attr( get_post_type() ); ?>-wrap ap-post-grid ap-col-grid has-box-shadow" id="post-container">
					<?php if ( have_posts() ) : ?>
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</div><!-- End #post-container -->

				<?php get_template_part( 'template-parts/content', 'pagination' ); ?>
			</main><!-- #main -->

			<?php if ( get_theme_mod( 'mod_data_archive_sidebar_type', 'right-sidebar' ) === 'right-sidebar' ) : ?>
				<?php get_sidebar(); ?>
			<?php endif ?>
		</div><!-- .container -->
	</div><!-- .site-main-wrapper -->

<?php
get_footer();
