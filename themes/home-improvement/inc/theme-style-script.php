<?php
/**
 * Home Improvement theme  'home-improvement' Themes javascript and stylesheet
 *
 * This file is used to load javascript and stylesheet function
 *
 * @package 'home-improvement'
 */

/**
 * Enqueue scripts and styles.
 */
function home_improvement_scripts() {
	wp_enqueue_style( 'home-improvement-style', get_stylesheet_uri(), array(), HOME_IMPROVEMENT_VERSION );
	wp_style_add_data( 'home-improvement-style', 'rtl', 'replace' );

	wp_enqueue_script( 'home-improvement-navigation', get_template_directory_uri() . '/js/navigation.js', array(), HOME_IMPROVEMENT_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'font-popping', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap', false, HOME_IMPROVEMENT_VERSION );
	wp_enqueue_style( 'font-lato', 'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap', false, HOME_IMPROVEMENT_VERSION );
	wp_enqueue_style( 'font-quicksand', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap', false, HOME_IMPROVEMENT_VERSION );

	/*Font-Awesome-5*/
	wp_enqueue_style( 'font-awesome-6', get_template_directory_uri() . '/assets/framework/font-awesome-6/css/all.min.css', '', HOME_IMPROVEMENT_VERSION );

	/* Slick Slider*/
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '1.8.1', true );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick/slick.css', '', '1.8.1' );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick/slick-theme.css', '', '1.8.1' );

	/*Custom css*/
	wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/css/custom.css', '', HOME_IMPROVEMENT_VERSION );

	wp_add_inline_style( 'custom-css', apply_filters( 'home_improvement_dynamic_theme_css', '' ) );

	/*Custom JS*/
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), HOME_IMPROVEMENT_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'home_improvement_scripts' );

/**
 * Enqueue scripts and styles for admin.
 */
function home_improvement_admin_scripts() {
	wp_enqueue_style( 'admin-custom-css', get_template_directory_uri() . '/assets/css/admin.css', array(), HOME_IMPROVEMENT_VERSION );
	wp_enqueue_script( 'plugin-install-helper', get_template_directory_uri() . '/assets/js/plugin-handle.js', array( 'jquery' ), HOME_IMPROVEMENT_VERSION, true );

	$welcome_data = array(
		'uri'                 => esc_url( admin_url( 'admin.php?page=business-services-options-tool' ) ),
		'btn_text'            => ! file_exists( WP_PLUGIN_DIR . '/home-improvement-companion/home-improvement-companion.php' ) ? esc_html__( 'Processing...', 'home-improvement' ) : ( file_exists( WP_PLUGIN_DIR . '/home-improvement-companion/home-improvement-companion.php' ) && is_plugin_inactive( '/home-improvement-companion/home-improvement-companion.php' ) ? esc_html__( 'Activating...', 'home-improvement' ) : esc_html__( 'Redirecting...', 'home-improvement' ) ),
		'security_nonce'      => wp_create_nonce( 'ajax-admin-security-nonce' ),
		'btn_text_activating' => esc_html__( 'Activating...', 'home-improvement' ),
		'btn_text_activated'  => esc_html__( 'Activated', 'home-improvement' ),
	);

	wp_localize_script( 'plugin-install-helper', 'adminAjaxObj', $welcome_data );
}

add_action( 'admin_enqueue_scripts', 'home_improvement_admin_scripts' );
