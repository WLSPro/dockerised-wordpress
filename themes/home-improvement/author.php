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
		<main id="primary" class="site-main">
			<div class="container">
				<div class="author-single-page">
					<?php if ( have_posts() ) : ?>
						<div class="ap-col-grid ap-author-info-grid">
							<div class="col img-box">
								<?php 
								$hi_author_id = get_query_var( 'author' );
								echo get_avatar( $hi_author_id, 500 );
								?>
							</div>
							<!-- .img-box -->

							<div class="col text-box">
								<header class="page-header">
									<h1 class="page-title"><?php echo get_the_author(); ?></h1>

									<?php
									the_archive_description( '<div class="author-description">', '</div>' );
									?>
								</header>
								<!-- .page-header -->
							</div>
							<!-- .text-box -->
						</div>

						<div class="author-related-post-grid">
							<div class="heading-section text-center">
								<div class="heading">
									<h2> <?php esc_html_e( 'Articles Written by', 'home-improvement' ); ?> <?php echo get_the_author(); ?></h2>
								</div>
							</div>

							<div class="ap-col-grid ap-post-grid ap-three-col has-border-text-box has-box-shadow">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;
							the_posts_navigation();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
							</div>
						</div>
				</div>
			</div>
		</main><!-- #main -->

	</div>
	<!-- .container -->
</div>
<!-- .site-main-wrapper -->

<?php
get_footer();
