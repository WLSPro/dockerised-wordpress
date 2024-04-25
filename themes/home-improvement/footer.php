<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 'home-improvement'
 */

?>
<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="footer-section footer-top">
			<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
				<div class="footer-sidebar-column footer-col">
					<?php dynamic_sidebar( 'footer-widget-1' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
				<div class="footer-sidebar-column footer-col">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
				<div class="footer-sidebar-column footer-col">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
				<div class="footer-sidebar-column footer-col">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- .footer-top -->

		<?php if ( true === get_theme_mod( 'mod_data_footerBottomSection_enable', true ) ) : ?>
			<div class="footer-bottom">
				<div class="col">
					<div class="copyright-text">
						<?php $home_improvement_copyright = get_theme_mod( 'mod_data_copyright_text', 'Copyright © 2024 – TCS,  All Right Reserved' ); ?>
						<?php echo wp_kses_post( $home_improvement_copyright ); ?>
					</div>
					<!-- .site-info -->
				</div>

				<div class="col">
					<div class="footer-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-bottom-menu',
								'menu_id'        => 'footer-bottom-menu',
								'fallback_cb'    => false,
							)
						);
						?>
					</div>
					<!-- .footer-menu -->
				</div>
			</div>
		<?php endif; ?>
		<!-- .footer-bottom -->
	</div>
</footer><!-- #colophon -->
<?php do_action( 'home_improvement_after_footer' ); ?>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
