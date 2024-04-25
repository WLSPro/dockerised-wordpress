<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

?>
<?php
if ( is_singular() ) : 
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="team-single-page fullwidth">
			<div class="main-content-wrap">
				<div class="ap-col-grid team-detail-col-wrap">
					<div class="col img-box has-box-bg-left">
						<?php home_improvement_post_thumbnail(); ?>
					</div>

					<div class="col text-box">
						<?php the_title( '<h1 class="entry-title name">', '</h1>' ); ?>
						<?php $home_improvement_meta_data = get_post_meta( get_the_ID(), 'home_improvement_data_key', true ); ?>
						<?php if ( ! empty( $home_improvement_meta_data['team_designation'] ) ) : ?>
							<div class="designation"><?php echo esc_html( $home_improvement_meta_data['team_designation'] ); ?>
							</div>
						<?php endif; ?>
						<div class="desc">
							<?php the_content(); ?>
						</div>
						<?php if ( ! empty( $home_improvement_meta_data['team_facebook_link'] ) || ! empty( $home_improvement_meta_data['team_linkedin_link'] ) || ! empty( $home_improvement_meta_data['team_twitter_link'] ) || ! empty( $home_improvement_meta_data['team_instagram_link'] ) ) : ?>
							<div class="social-box">
								<h2><?php esc_html_e( 'Get In Touch', 'home-improvement' ); ?></h2>
								<?php $home_improvement_meta_data = get_post_meta( get_the_ID(), 'home_improvement_data_key', true ); ?>
								<ul>
									<?php if ( ! empty( $home_improvement_meta_data['team_facebook_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $home_improvement_meta_data['team_facebook_link'] ); ?>" target="_blank">
												<i class="fab fa-facebook-square"></i>
											</a>
										</li>
									<?php endif; ?>
									<?php if ( ! empty( $home_improvement_meta_data['team_linkedin_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $home_improvement_meta_data['team_linkedin_link'] ); ?>" target="_blank">
												<i class="fab fa-linkedin"></i>
											</a>
										</li>
									<?php endif; ?>
									<?php if ( ! empty( $home_improvement_meta_data['team_twitter_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $home_improvement_meta_data['team_twitter_link'] ); ?>" target="_blank">
												<i class="fab fa-twitter"></i>
											</a>
										</li>
									<?php endif; ?>
									<?php if ( ! empty( $home_improvement_meta_data['team_instagram_link'] ) ) : ?>
										<li>
											<a href="<?php echo esc_url( $home_improvement_meta_data['team_instagram_link'] ); ?>" target="_blank">
												<i class="fab fa-instagram"></i>
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->


<?php else : ?>
	<?php $home_improvement_meta_data = get_post_meta( get_the_ID(), 'home_improvement_data_key', true ); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col' ); ?>>
		<div class="img-box">
			<?php home_improvement_post_thumbnail(); ?>
		</div>
		<!-- .img-box -->

		<header class="entry-header">
			<?php
			the_title( '<h2 class="entry-title name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					home_improvement_posted_on();
					home_improvement_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header>
		<!-- .entry-header -->

		<?php if ( ! empty( $home_improvement_meta_data['team_designation'] ) ) : ?>
			<div class="designation"><?php echo esc_html( $home_improvement_meta_data['team_designation'] ); ?>
			</div>
			<!-- .designation -->
		<?php endif; ?>

		<div class="desc">
			<?php echo wp_kses_post( home_improvement_post_content() ); ?>
		</div>
		<!-- .desc -->

		<div class="social-box">
			<ul>
				<?php if ( ! empty( $home_improvement_meta_data['team_facebook_link'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $home_improvement_meta_data['team_facebook_link'] ); ?>" target="_blank">
							<i class="fab fa-facebook-square"></i>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $home_improvement_meta_data['team_linkedin_link'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $home_improvement_meta_data['team_linkedin_link'] ); ?>" target="_blank">
							<i class="fab fa-linkedin"></i>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $home_improvement_meta_data['team_twitter_link'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $home_improvement_meta_data['team_twitter_link'] ); ?>" target="_blank">
							<i class="fab fa-twitter"></i>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $home_improvement_meta_data['team_instagram_link'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $home_improvement_meta_data['team_instagram_link'] ); ?>" target="_blank">
							<i class="fab fa-instagram"></i>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<!-- .social-box -->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>
