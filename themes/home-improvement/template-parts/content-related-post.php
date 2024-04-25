<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

?>
<div class="col post">
	<?php if ( has_post_thumbnail() && get_theme_mod( 'mod_data_singlePost_enable_relatedPostFeaturedImage', true ) ) : ?>
		<div class="img-box">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<?php if ( true === get_theme_mod( 'mod_data_homepage_blog_category_enable', true ) ) : ?>
		<div class="cat-links">
			<?php the_category( ' ' ); ?>
		</div>
	<?php endif; ?>

	<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

	<div class="post-meta">
		<?php home_improvement_posted_by(); ?>
		<?php home_improvement_posted_on(); ?>
		<?php home_improvement_comment(); ?>
		<?php home_improvement_tags(); ?>
	</div>

	<div class="post-excerpt">
		<?php
		$home_improvement_excerpt_limit = get_theme_mod( 'mod_data_homepage_blog_excerpt_limit', -1 );
		echo wp_kses_post( home_improvement_post_content( $home_improvement_excerpt_limit ) );
		?>
	</div>

	<a href="<?php the_permalink(); ?>" class="btn btn-link"><?php esc_html_e( 'Read More', 'home-improvement' ); ?> <i class="fas fa-arrow-right"></i></a>
</div>
