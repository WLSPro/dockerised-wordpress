<?php
/**
 * Home Improvement theme  'home-improvement' Theme Widgets
 *
 * @package 'home-improvement'
 */

// This theme uses wp_nav_menu() in one location.
register_nav_menus(
	array(
		'primary-menu'       => esc_html__( 'Primary Menu', 'home-improvement' ),
	// 'footer-top-menu'    => esc_html__( 'Footer Top Menu', 'home-improvement' ),
	// 'footer-bottom-menu' => esc_html__( 'Footer Bottom Menu', 'home-improvement' ),
	)
);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function home_improvement_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Widget 1', 'home-improvement' ),
			'id'            => 'footer-widget-1',
			'description'   => __( 'This is footer widget #1', 'home-improvement' ),
			'before_widget' => '<div id="%1$s" class="%1$s widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Widget 2', 'home-improvement' ),
			'id'            => 'footer-widget-2',
			'description'   => __( 'This is footer widget #2', 'home-improvement' ),
			'before_widget' => '<div id="%1$s" class="%1$s widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Widget 3', 'home-improvement' ),
			'id'            => 'footer-widget-3',
			'description'   => __( 'This is footer widget #3', 'home-improvement' ),
			'before_widget' => '<div id="%1$s" class="%1$s widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Widget 4', 'home-improvement' ),
			'id'            => 'footer-widget-4',
			'description'   => __( 'This is footer widget #4', 'home-improvement' ),
			'before_widget' => '<div id="%1$s" class="%1$s widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Default Sidebar', 'home-improvement' ),
			'id'            => 'sidebar-default',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'home-improvement' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'home_improvement_widgets_init' );
