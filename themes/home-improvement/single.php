<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 'home-improvement'
 */

get_header();
?>
<div class="site-main-wrapper">
	<div class="container">
		<?php
		$hi_sidebar_type = ( get_post_type() === 'post' ) ? 'mod_data_single_sidebar_type' : 'mod_data_default_sidebar_type';
		if ( get_theme_mod( $hi_sidebar_type, 'right-sidebar' ) === 'left-sidebar' ) :
			?>
			<?php get_sidebar(); ?>
		<?php endif ?>
		<main id="primary" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				if ( get_theme_mod( 'mod_data_single_enable_navigation', true ) ) :
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'home-improvement' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'home-improvement' ) . '</span> <span class="nav-title">%title</span>',
						)
					);
				endif;
				?>


				<?php
				if ( get_theme_mod( 'mod_data_singlePost_enable_comments', true ) ) :
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endif;
			endwhile; // End of the loop.
			?>

			<?php get_template_part( 'template-parts/content', 'related' ); ?>
		</main>
		<!-- #main -->

		<?php if ( get_theme_mod( $hi_sidebar_type, 'right-sidebar' ) === 'right-sidebar' ) : ?>
			<?php get_sidebar(); ?>
		<?php endif ?>
	</div>
	<!-- .container -->
</div>
<!-- .site-main-wrapper -->

<?php
get_footer();
