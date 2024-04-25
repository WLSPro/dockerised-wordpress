<?php
/**
 * Template Name: Homepage Default
 *
 * @package 'home-improvement'
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php
		do_action( 'home_improvement_frontpage', false );
	?>
</main><!-- #main -->
<?php
get_footer();
