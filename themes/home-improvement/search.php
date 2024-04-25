<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
				<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'home-improvement' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->
				<div class="post-wrap ap-col-grid ap-post-grid ap-col-fullwidth has-border-text-box has-box-shadow" id="post-container">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme, then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'post' );

					endwhile;

					echo '</div><!-- .ap-col-grid -->';
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				<?php get_template_part( 'template-parts/content', 'pagination' ); ?>
			</main><!-- #main -->
			<?php if ( get_theme_mod( 'mod_data_default_sidebar_type', 'right-sidebar' ) === 'right-sidebar' ) : ?>
				<?php get_sidebar(); ?>
			<?php endif ?>
		</div>
		<!-- .container -->
	</div>
	<!-- .site-main-wrapper -->
<?php
get_footer();
