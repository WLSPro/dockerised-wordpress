<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

get_header();
?>

	<div class="site-main-wrapper">
		<div class="container">
			<?php
			$hi_sidebar_type = ( get_post_type() === 'post' ) ? 'mod_data_archive_sidebar_type' : 'mod_data_default_sidebar_type';
			if ( get_theme_mod( $hi_sidebar_type, 'right-sidebar' ) === 'left-sidebar' ) :
				?>
				<?php get_sidebar(); ?>
			<?php endif ?>
			<main id="primary" class="site-main">
				<header class="page-header">
					<div class="heading">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</div>
				</header><!-- .page-header -->


				<?php $hi_post_layout_type = get_theme_mod( 'mod_data_archive_layout_blog_type', '' ); ?>
				<div class="<?php echo esc_attr( get_post_type() ); ?>-wrap ap-post-grid ap-col-grid has-box-shadow" id="post-container">
					<?php do_action( 'home_improvement_archive_filter' ); ?>
					<?php
					if ( have_posts() ) :
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

			<?php if ( get_theme_mod( $hi_sidebar_type, 'right-sidebar' ) === 'right-sidebar' ) : ?>
				<?php get_sidebar(); ?>
			<?php endif ?>
		</div><!-- .container -->
	</div><!-- .site-main-wrapper -->

<?php
get_footer();
