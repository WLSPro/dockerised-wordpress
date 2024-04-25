<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

$hi_meta_orders = get_theme_mod( 'mod_data_archive_meta_order', array( 'author', 'data', 'comments', 'tags' ) );
ob_start();
?>
<div class="entry-meta">
	<?php
	foreach ( $hi_meta_orders as $hi_meta_order ) :
		switch ( $hi_meta_order ) :
			case 'author':
				home_improvement_posted_by();
				break;
			case 'date':
				home_improvement_posted_on();
				break;
			case 'comments':
				home_improvement_comment();
				break;
			case 'tags':
				home_improvement_tags();
				break;
		endswitch;
	endforeach;
	?>
</div><!-- .entry-meta -->
<?php
$hi_meta = ob_get_contents();
ob_end_clean();
?>
<?php if ( is_singular() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col' ); ?>>
		<?php home_improvement_post_thumbnail(); ?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>

		</header>
		<!-- .entry-header -->

		<?php
		if ( 'post' === get_post_type() ) :
			echo '<div class="entry-meta">';
			the_category( ' ' );
			echo '</div>';
		endif;
		?>

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

		<div class="main-content-meta-wrap">
			<div class="container">
				<?php if ( get_theme_mod( 'mod_data_singlePost_enable_tags', true ) ) : ?>
					<div class="tags-wrap">
						<?php esc_html_e( 'Tags:', 'home-improvement' ); ?>
						<?php the_tags( '<span class="tag">', '</span><span class="tag">', '</span>' ); ?>
					</div>
					<!-- .tags-wrap -->
				<?php endif; ?>


				<div class="social-share">
					<?php home_improvement_social_sharing( get_permalink(), wp_trim_words( get_the_excerpt(), 10 ), get_the_title() ); ?>
				</div>
				<!-- .social-share -->
			</div>
		</div>
	</article>
	<!-- #post-<?php the_ID(); ?> -->

	<?php
	if ( get_theme_mod( 'mod_data_singlePost_enable_authorBio', true ) ) :
		$hi_author_id          = get_post_field( 'post_author', get_the_ID() );
		$hi_author_name        = get_the_author_meta( 'display_name', $hi_author_id );
		$hi_author_description = get_the_author_meta( 'description', $hi_author_id );
		$hi_author_link        = get_author_posts_url( $hi_author_id );
		?>
		<div class="about-post-author-box">
			<div class="content-grid">
				<?php if ( get_theme_mod( 'mod_data_singlePost_enable_authorAvatar', true ) ) : ?>
					<div class="author-img">
						<?php echo get_avatar( $hi_author_id ); ?>
					</div>
					<!-- .author-img -->
				<?php endif; ?>

				<div class="author-desc">
					<h4><?php echo esc_html( $hi_author_name ); ?></h4>
					<p><?php echo esc_html( $hi_author_description ); ?></p>
					<p><a href="<?php echo esc_url( $hi_author_link ); ?>"><?php esc_html_e( 'Learn More', 'home-improvement' ); ?></a></p>
				</div>
				<!-- .author-desc -->
			</div>
			<!-- .content-grid -->
		</div>
		<!-- .about-post-author-box -->
	<?php endif; ?>
<?php else : ?>
	<?php
	$hi_content_orders = get_theme_mod( 'mod_data_archive_content_order', array( 'image', 'title', 'meta', 'category', 'excerpt', 'read-more' ) );
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col' ); ?>>
		<?php
		foreach ( $hi_content_orders as $hi_content_order ) :
			switch ( $hi_content_order ) :
				case 'image':
					if ( get_theme_mod( 'mod_data_archive_layout_blog_enable_featuredImage', true ) ) :
						home_improvement_post_thumbnail();
					endif;
					break;
				case 'title':
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					break;
				case 'meta':
					echo $hi_meta; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					break;
				case 'category':
					?>
					<div class="cat-links">
						<?php the_category( ' ' ); ?>
					</div>
					<?php
					break;
				case 'excerpt':
					?>
					<div class="entry-content">
						<?php echo wp_kses_post( home_improvement_post_content( get_theme_mod( 'mod_data_archive_excerpt_limit', -1 ) ) ); ?>
					</div>
					<?php
					break;
				case 'read-more':
					?>
					<a href="<?php the_permalink(); ?>" class="btn btn-link"><?php echo esc_html( get_theme_mod( 'mod_data_archive_button_label', 'Read More' ) ); ?>
						<i class="fas fa-arrow-right"></i></a>
					<?php
					break;
			endswitch;
		endforeach;
		?>


	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>
