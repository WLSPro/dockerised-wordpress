<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * This is the template that is used for the Home page: fullwidth and no sidebar
 *
 * @package 'home-improvement'
 */

get_header();

?>
	<div class="site-main-wrapper">
		<div class="container">
			<main id="primary" class="site-main">

				<?php 
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop. 
				?>

			</main><!-- #main -->
		</div>
	</div><!-- .site-main-wrapper -->
<?php

get_footer();
