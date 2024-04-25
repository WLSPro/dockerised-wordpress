<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

?>
<?php if ( get_theme_mod( 'mod_data_singlePost_enable_relatedPost', true ) && get_post_type() === 'post' ) : ?>
	<div class="related-post-grid">
		<h3 class="section-title"><?php echo esc_html( get_theme_mod( 'mod_data_singlePost_relatedPostTitle', 'Related Posts' ) ); ?></h3>
		<div class="ap-col-grid ap-three-col ap-post-grid has-border-text-box has-box-shadow <?php echo esc_attr( 'grid-col-' . get_theme_mod( 'mod_data_singlePost_relatedPost_columns', '3' ) ); ?>">

			<?php

			$hi_args = array(
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => get_theme_mod( 'mod_data_singlePost_relatedPost_post_per_page', 3 ),
				'post__not_in'   => array( get_the_ID() ),
			);


			$hi_sort_by = get_theme_mod( 'mod_data_singlePost_relatedPost_sort_by', 'category' );
			if ( $hi_sort_by === 'category' ) :
				$hi_categories     = get_the_category( get_the_ID() );
				$hi_category_slugs = array();
				foreach ( $hi_categories as $hi_category ) {
					$hi_category_slugs[] = $hi_category->slug;
				}
				$hi_args['category_name'] = implode( ',', $hi_category_slugs );
			elseif ( $hi_sort_by === 'tag' ) :
				$hi_tags = get_the_tags( get_the_ID() );
				if ( $hi_tags ) :
					$hi_tag_slugs = array();
					foreach ( $hi_tags as $hi_tag ) {
						$hi_tag_slugs[] = $hi_tag->slug;
					}
					$hi_args['tag'] = implode( ',', $hi_tag_slugs );
				endif;
			elseif ( $hi_sort_by === 'author' ) :
				$hi_args['author'] = get_the_author();
			endif;


			$hi_query = new WP_Query( $hi_args );
			if ( $hi_query->have_posts() ) {
				while ( $hi_query->have_posts() ) {
					$hi_query->the_post();
					get_template_part( 'template-parts/content', 'related-post' );
				}
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
<?php endif; ?>
