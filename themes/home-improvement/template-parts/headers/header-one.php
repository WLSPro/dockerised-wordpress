<?php
/**
 * Template part for Header
 *
 * @package 'home-improvement'
 */
?>
<header id="masthead" class="site-header">
	<div class="header-one">


		<div class="header-mid">
			<div class="container">
				<?php get_template_part( 'template-parts/headers/header-site-branding' ); ?>
			</div><!-- .container -->
		</div><!-- .header-mid -->

		<div class="header-bottom">
			<div class="container">
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php esc_html_e( 'Primary Menu', 'home-improvement' ); ?>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav>
				<!-- #site-navigation -->

			</div>
		</div><!-- .header-bottom -->
	</div><!-- .header-one -->
</header><!-- #masthead -->
