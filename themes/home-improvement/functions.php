<?php
/**
 * Home Improvement theme 'home-improvement' functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 'home-improvement'
 */

if ( ! defined( 'HOME_IMPROVEMENT_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'HOME_IMPROVEMENT_VERSION', '1.0.0' );
}

/**
 * Admin notice class file.
 */
require_once get_template_directory() . '/inc/admin/class-notice.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/** Theme Register */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/** Theme Support */
require_once get_template_directory() . '/inc/theme-register.php';
require_once get_template_directory() . '/inc/theme-support.php';

/** Theme enqueue_scripts */
require_once get_template_directory() . '/inc/theme-style-script.php';

/** Load customizer base css File */
require get_template_directory() . '/inc/dynamic-css/dynamic.css.php';

/** Load breadcrumb_trail File */
if ( ! function_exists( 'breadcrumb_trail' ) ) {
	require get_template_directory() . '/inc/vendor/breadcrumbs.php';
}

/** Load Social Sharing File */
if ( ! function_exists( 'home_improvement_social_sharing' ) ) {
	require get_template_directory() . '/inc/vendor/social-share.php';
}


