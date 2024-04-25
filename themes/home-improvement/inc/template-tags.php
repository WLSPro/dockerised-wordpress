<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package 'home-improvement'
 */

if ( ! function_exists( 'home_improvement_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function home_improvement_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);


		$posted_on = sprintf(
			/* translators: %s: post date. */

			esc_html_x( '%s', 'post date', 'home-improvement' ), // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'home_improvement_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function home_improvement_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'home-improvement' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'home_improvement_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function home_improvement_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'home-improvement' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'home-improvement' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'home-improvement' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'home-improvement' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'home-improvement' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'home-improvement' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
if ( ! function_exists( 'home_improvement_tags' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function home_improvement_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'home-improvement' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html( '%1$s', 'home-improvement' ) . '</span>', $tags_list ); // phpcs:ignore
			}
		}
	}
endif;

if ( ! function_exists( 'home_improvement_comment' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function home_improvement_comment() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
							/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'home-improvement' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;


if ( ! function_exists( 'home_improvement_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function home_improvement_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			if ( get_theme_mod( 'mod_data_singlePost_enable_featureImage', true ) ) :
				?>

				<div class="post-thumbnail feat-img-box">
				<?php the_post_thumbnail(); ?>
				</div>
				<!-- .post-thumbnail -->

				<?php 
				endif;
		else : 
			?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>
			<!-- .post-thumbnail -->

			<?php
		endif; // End is_singular().
	}
endif;

/**
 * Get HTML links for terms from custom taxonomies associated with a post.
 *
 * Retrieves and generates HTML links to terms from custom taxonomies associated
 * with a specific post. Optionally limits the number of terms per taxonomy.
 *
 * @param int|null $limit Optional. Limit the number of terms per taxonomy. Default is null (no limit).
 * @return string HTML markup for the terms' links or an empty string if no terms found.
 */
function home_improvement_custom_taxonomies_terms_links( $limit = null ) {
	// Get post by post ID.

	// phpcs:ignore
	if (!$post = get_post()) {
		return '';
	}

	// Get post-type by post.
	$post_type = $post->post_type;

	// Get post-type taxonomies.
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );

	$out = array();

	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ) {

		// Get the terms related to the post.
		$terms = get_the_terms( $post->ID, $taxonomy_slug );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

			if ( ! empty( $limit ) ) :
				$terms = array_slice( $terms, 0, $limit ); // Limiting to n terms.
			endif;

			$out[] = "\n<ul class='categories-list'>\n";
			foreach ( $terms as $term ) {
				$out[] = sprintf(
					'<li class="%3$s"><a href="%1$s">%2$s</a></li>',
					esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
					esc_attr( $term->name ),
					esc_attr( 'cat-item cat-item-' . $term->term_id )
				);
			}
			$out[] = "\n</ul>\n";
		}
	}
	return implode( '', $out );
}

// phpcs:disable
if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;
// phpcs:enable

if ( ! function_exists( 'home_improvement_post_content' ) ) :

	/**
	 * Modifies the excerpt more text.
	 *
	 * @param string $more The default more text.
	 * @return string The modified more text.
	 */
	function home_improvement_excerpt_more( $more ) {
		return ' ...';
	}
	add_filter( 'excerpt_more', 'home_improvement_excerpt_more' );


	/**
	 * Generates formatted post content.
	 *
	 * Retrieves the post-excerpt, trims it to the specified number of words, and applies paragraph formatting.
	 *
	 * @param int|null $num_words The number of words to limit the excerpt to. Default is null.
	 * @return string The formatted post content.
	 */
	function home_improvement_post_content( $num_words = null ) {
		return wpautop( wp_trim_words( get_the_excerpt(), ( $num_words > -1 ) ? $num_words : 100000, ( $num_words === 0 ) ? '' : ' ...' ) );
	}
endif;
