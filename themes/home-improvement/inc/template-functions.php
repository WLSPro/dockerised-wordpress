<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package 'home-improvement'
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function home_improvement_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'home_improvement_body_classes' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 * @return string The template to be used: blank if is_home() is true (defaults to index.php),
 *                otherwise $template.
 */
function home_improvement_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'home_improvement_front_page_template' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function home_improvement_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'home_improvement_pingback_header' );

/**
 * BreadCrumb Settings
 */
if ( ! function_exists( 'home_improvement_breadcrumb' ) ) :
	/**
	 * Functions to manage breadcrumbs
	 */
	function home_improvement_breadcrumb() {
		$show_breadcrumbs = false;
		$show_breadcrumbs = get_theme_mod( 'mod_data_enable_breadcrumbs', true );
		if ( $show_breadcrumbs && ! is_front_page() ) {
			$breadcrumb_from = get_theme_mod( 'mod_data_breadcrumb_form' );
			echo '<div class="breadcrumbs-wrap"><div class="container">';
			if ( ( function_exists( 'yoast_breadcrumb' ) ) && ( $breadcrumb_from === 'yoast-breadcrumb' ) ) {
				yoast_breadcrumb();
			} elseif ( ( function_exists( 'rank_math_the_breadcrumbs' ) ) && ( $breadcrumb_from === 'rankmath-breadcrumb' ) ) {
				rank_math_the_breadcrumbs();
			} elseif ( ( function_exists( 'bcn_display' ) ) && ( $breadcrumb_from === 'breadcrumb-navxt' ) ) {
				bcn_display();
			} else {
				$breadcrumb_args = array(
					'container'   => 'div',
					'show_browse' => false,
				);
				breadcrumb_trail( $breadcrumb_args );
			}
			echo '</div></div>';
		}

	}
endif;
add_action( 'home_improvement_breadcrumb', 'home_improvement_breadcrumb', 10 );

if ( ! function_exists( 'home_improvement_style_parse_css' ) ) :

	/**
	 * Parses CSS.
	 *
	 * @param string|array $default_value Default value.
	 * @param string|array $output_value  Updated value.
	 * @param array        $css_output    Array of CSS.
	 * @param string       $min_media     Min Media breakpoint.
	 * @param string       $max_media     Max Media breakpoint.
	 *
	 * @return string Generated CSS.
	 */
	function home_improvement_style_parse_css( $default_value, $output_value, $css_output = array(), $min_media = '', $max_media = '' ) {

		// Return if default value matches.
		if ( $default_value === $output_value ) {
			return;
		}

		$parse_css = '';

		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( null === $properties ) {
					break;
				}

				if ( ! count( $properties ) ) {
					continue;
				}

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue;
					}

					$properties_added ++;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' !== $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = 'screen and (min-width:' . $min_media . 'px)';
				}

				if ( '' !== $max_media ) {
					$max_media_css = 'screen and (max-width:' . $max_media . 'px)';
				}

				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;
			}
		}

		return $parse_css;
	}
endif;

add_action( 'home_improvement_header', 'home_improvement_header' );
if ( ! function_exists( 'home_improvement_header' ) ) :

	function home_improvement_header() {
		if ( defined( 'HOME_IMPROVEMENT_COMPANION_PLUGIN_FILE' ) ) {
			return;
		}
		get_template_part( 'template-parts/headers/header', 'one' );
	};
endif;
