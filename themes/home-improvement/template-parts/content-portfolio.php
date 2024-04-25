<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col' ); ?>>
	<div class="cat-box">
		<?php echo wp_kses_post( home_improvement_custom_taxonomies_terms_links() ); ?>
	</div>
	<!-- .cat-box -->

	<?php home_improvement_post_thumbnail(); ?>

	<div class="text-box">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php home_improvement_posted_by(); ?>
					<?php home_improvement_posted_on(); ?>
					<?php home_improvement_entry_footer(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->


		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'home-improvement' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'home-improvement' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<!-- .entry-content -->

		<div class="entry-footer">
			<?php home_improvement_entry_footer(); ?>
		</div>
		<!-- .entry-footer -->
	</div>
	<!-- .text-box -->

</article>
<!-- #post-<?php the_ID(); ?> -->
