<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 'home-improvement'
 */

?>
<aside id="secondary" class="widget-area">
	<?php
	if ( is_active_sidebar( 'sidebar-default' ) && ( get_post_type() === 'post' || get_post_type() === 'page' || is_search() || is_404() ) ) :
		dynamic_sidebar( 'sidebar-default' );
	else :
		do_action( 'home_improvement_sidebar' );
	endif;
	?>
</aside><!-- #secondary -->
