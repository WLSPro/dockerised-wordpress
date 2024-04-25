<?php
/**
 * The main dynamic css file
 *
 * @package 'home-improvement'
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


add_filter( 'home_improvement_dynamic_theme_css', 'home_improvement_dynamic_css' );
/**
 * Generates dynamic CSS based on provided CSS and filtered CSS.
 *
 * @param string $dynamic_css The original dynamic CSS.
 * @param string $dynamic_css_filtered The filtered dynamic CSS. Default is an empty string.
 * @return string The generated dynamic CSS.
 */
function home_improvement_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {
	// Generate dynamic CSS.
	$parse_css = '';

	$mod_data_archive_meta_separator     = get_theme_mod( 'mod_data_archive_metaSeparator', '/' );
	$encoding                            = 'UTF-8'; // Set the desired encoding explicitly.
	$mod_data_archive_meta_separator_css = array(
		'body .post-wrap .entry-meta > span:after' => array(

			'content' => "'" . html_entity_decode( $mod_data_archive_meta_separator, ENT_COMPAT, $encoding ) . "'",
		),
	);
	$parse_css                          .= home_improvement_style_parse_css( '', $mod_data_archive_meta_separator, $mod_data_archive_meta_separator_css );

	/*
	--------------------------------------------------------------
	# Primary button
	--------------------------------------------------------------
	*/

	$primary_button_type   = get_theme_mod( 'mod_data_button_primaryType', 'fill' );
	$primary_button_radius = get_theme_mod(
		'mod_data_button_primary_' . $primary_button_type . '_radius',
		array(
			'top'    => 0,
			'right'  => 0,
			'bottom' => 0,
			'left'   => 0,
		)
	);

	$primary_button_css = '';
	if ( $primary_button_type === 'fill' ) :
		$primary_button_css = array(
			'.btn.btn-primary' => array(
				'border-top-left-radius'     => $primary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $primary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $primary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $primary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_primary_fill_textColor', '#ffffff' ),
				'background-color'           => get_theme_mod( 'mod_data_button_primary_fill_background', '#0665b5' ),
			),
			'.btn.btn-primary:hover' => array(
				'color'            => get_theme_mod( 'mod_data_button_primary_fill_textColorHover', '#000' ),
				'background-color' => get_theme_mod( 'mod_data_button_primary_fill_backgroundHover', '#FFCD3A' ),
			),
			'.has-btn-primary input[type="submit"]' => array(
				'border-top-left-radius'     => $primary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $primary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $primary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $primary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_primary_fill_textColor', '#ffffff' ) . ' !important',
				'background-color'           => get_theme_mod( 'mod_data_button_primary_fill_background', '#0665b5' ) . ' !important',
			),
			'.has-btn-primary input[type="submit"]:hover' => array(
				'color'            => get_theme_mod( 'mod_data_button_primary_fill_textColorHover', '#000' ) . ' !important',
				'background-color' => get_theme_mod( 'mod_data_button_primary_fill_backgroundHover', '#FFCD3A' ) . ' !important',
			),
		);
	elseif ( $primary_button_type === 'outline' ) :
		$primary_button_css = array(
			'.btn.btn-primary' => array(
				'border-top-left-radius'     => $primary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $primary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $primary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $primary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_primary_outline_textColor', '#0665b5' ),
				'border'                     => '1px solid ' . get_theme_mod( 'mod_data_button_primary_outline_color', '#0665b5' ),
			),
			'.btn.btn-primary:hover' => array(
				'color'        => get_theme_mod( 'mod_data_button_primary_outline_textColorHover', '#FFCD3A' ),
				'border-color' => get_theme_mod( 'mod_data_button_primary_outline_colorHover', '#FFCD3A' ),
			),
			'.has-btn-primary input[type="submit"]' => array(
				'border-top-left-radius'     => $primary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $primary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $primary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $primary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_primary_fill_textColor', '#ffffff' ) . ' !important',
				'background-color'           => get_theme_mod( 'mod_data_button_primary_fill_background', '#0665b5' ) . ' !important',
			),
			'.has-btn-primary input[type="submit"]:hover' => array(
				'color'            => get_theme_mod( 'mod_data_button_primary_fill_textColorHover', '#000' ) . ' !important',
				'background-color' => get_theme_mod( 'mod_data_button_primary_fill_backgroundHover', '#FFCD3A' ) . ' !important',
			),
		);
	endif;

	$parse_css .= home_improvement_style_parse_css( '', $primary_button_type, $primary_button_css );

	/*
	--------------------------------------------------------------
	# Secondary button
	--------------------------------------------------------------
	*/
	$secondary_button_type   = get_theme_mod( 'mod_data_button_secondaryType', 'fill' );
	$secondary_button_radius = get_theme_mod(
		'mod_data_button_secondary_' . $secondary_button_type . '_radius',
		array(
			'top'    => 0,
			'right'  => 0,
			'bottom' => 0,
			'left'   => 0,
		)
	);


	$secondary_button_css = '';
	if ( $secondary_button_type === 'fill' ) :
		$secondary_button_css = array(
			'.btn.btn-secondary' => array(
				'border-top-left-radius'     => $secondary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $secondary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $secondary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $secondary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_secondary_fill_textColor', '#000000' ),
				'background-color'           => get_theme_mod( 'mod_data_button_secondary_fill_background', '#FFCD3A' ),
			),
			'.btn.btn-secondary:hover' => array(
				'color'            => get_theme_mod( 'mod_data_button_secondary_fill_textColorHover', '#ffffff' ),
				'background-color' => get_theme_mod( 'mod_data_button_secondary_fill_backgroundHover', '#0665b5' ),
			),
			'.has-btn-primary input[type="submit"]' => array(
				'border-top-left-radius'     => $secondary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $secondary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $secondary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $secondary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_secondary_fill_textColor', '#ffffff' ),
				'background-color'           => get_theme_mod( 'mod_data_button_secondary_fill_background', '#0665b5' ),
			),
			'.has-btn-primary input[type="submit"]:hover' => array(
				'color'            => get_theme_mod( 'mod_data_button_secondary_fill_textColorHover', '#000' ),
				'background-color' => get_theme_mod( 'mod_data_button_secondary_fill_backgroundHover', '#FFCD3A' ),
			),
		);
	elseif ( $secondary_button_type === 'outline' ) :
		$secondary_button_css = array(
			'.btn.btn-secondary' => array(
				'border-top-left-radius'     => $secondary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $secondary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $secondary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $secondary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_secondary_outline_textColor', '#FFCD3A' ),
				'border'                     => '1px solid ' . get_theme_mod( 'mod_data_button_secondary_outline_color', '#FFCD3A' ),
			),
			'.btn.btn-secondary:hover' => array(
				'color'        => get_theme_mod( 'mod_data_button_secondary_outline_textColorHover', '#0665B5' ),
				'border-color' => get_theme_mod( 'mod_data_button_secondary_outline_colorHover', '#0665B5' ),
			),
			'.has-btn-primary input[type="submit"]' => array(
				'border-top-left-radius'     => $secondary_button_radius['top'] . 'px',
				'border-top-right-radius'    => $secondary_button_radius['right'] . 'px',
				'border-bottom-right-radius' => $secondary_button_radius['bottom'] . 'px',
				'border-bottom-left-radius'  => $secondary_button_radius['left'] . 'px',
				'color'                      => get_theme_mod( 'mod_data_button_secondary_fill_textColor', '#ffffff' ),
				'background-color'           => get_theme_mod( 'mod_data_button_secondary_fill_background', '#0665b5' ),
			),
			'.has-btn-primary input[type="submit"]:hover' => array(
				'color'            => get_theme_mod( 'mod_data_button_secondary_fill_textColorHover', '#000' ),
				'background-color' => get_theme_mod( 'mod_data_button_secondary_fill_backgroundHover', '#FFCD3A' ),
			),
		);
	endif;


	$parse_css .= home_improvement_style_parse_css( '', $secondary_button_type, $secondary_button_css );

	$parse_css .= $dynamic_css;


	return $parse_css;
}
