<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 'home-improvement'
 */

?>
<?php if ( is_singular() ) : ?>
	<?php $home_improvement_meta_data = get_post_meta( get_the_ID(), 'home_improvement_data_key', true ); ?>
	<h1 class="title text-center">
		<?php
		if ( ! empty( $home_improvement_meta_data['testimonial_name'] ) ) :
			echo esc_html( $home_improvement_meta_data['testimonial_name'] );
		else :
			the_title();
		endif;
		?>
	</h1>
	<!-- .title -->

	<div class="ap-col-grid ap-col-fullwidth has-box-shadow testimonial-wrap">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'testimonial-item col' ); ?>>
			<div class="quote">
				<blockquote>
					<?php the_excerpt(); ?>
				</blockquote>
			</div>
			<!-- .quote -->

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="img">
					<?php the_post_thumbnail(); ?>

				</div>
			<?php endif; ?>
			<!-- .img -->

			<div class="quote-meta">
				<?php if ( ! empty( $home_improvement_meta_data['testimonial_name'] ) ) : ?>
					<div class="name">
						<?php echo esc_html( $home_improvement_meta_data['testimonial_name'] ); ?>
					</div>
					<!-- .name -->
				<?php else : ?>
					<?php the_title(); ?>
				<?php endif; ?>
			</div>
			<!-- .quote-meta -->

			<?php if ( ! empty( $home_improvement_meta_data['testimonial_company_name'] ) ) : ?>
				<div class="company">
					<?php
					$home_improvement_link = '';
					if ( ! empty( $home_improvement_meta_data['testimonial_company_link'] ) ) :
						$home_improvement_link = $home_improvement_meta_data['testimonial_company_link'];
					endif;

					?>
					<?php
					if ( ! empty( $home_improvement_link ) ) {
						echo '<a href="' . esc_url( $home_improvement_link ) . '">';
					}
					?>

					<?php echo esc_html( $home_improvement_meta_data['testimonial_company_name'] ); ?>
					<?php
					if ( isset( $home_improvement_link ) ) {
						echo '</a>';
					}
					?>
				</div>
				<!-- .company -->
			<?php endif; ?>

			<div class="quote-cat">
				<?php echo wp_kses_post( home_improvement_custom_taxonomies_terms_links() ); ?>
			</div>
			<!-- .quote-cat -->
		</article>
	</div>
	<!-- .testimonial-wrap -->


<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'testimonial-item col' ); ?>>
		<div class="quote">
			<blockquote>
				<?php echo wp_kses_post( home_improvement_post_content() ); ?>
			</blockquote>
		</div>
		<!-- .quote -->

		<?php if ( has_post_thumbnail() ) : ?>
		<div class="img">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
		<!-- .img -->

		<div class="quote-meta">
			<?php $home_improvement_meta_data = get_post_meta( get_the_ID(), 'home_improvement_data_key', true ); ?>
			<div class="name">
				<?php
				if ( ! empty( $home_improvement_meta_data['testimonial_name'] ) ) :
					echo esc_html( $home_improvement_meta_data['testimonial_name'] );
				else :
					the_title();
				endif;
				?>
			</div>
			<!-- .name -->

			<?php if ( ! empty( $home_improvement_meta_data['testimonial_company_name'] ) ) : ?>
				<div class="company">
					<?php
					$home_improvement_link = '';
					if ( ! empty( $home_improvement_meta_data['testimonial_company_link'] ) ) :
						$home_improvement_link = $home_improvement_meta_data['testimonial_company_link'];
					endif;

					?>
					<?php
					if ( ! empty( $home_improvement_link ) ) {
						echo '<a href="' . esc_url( $home_improvement_link ) . '">';
					}
					?>

					<?php echo esc_html( $home_improvement_meta_data['testimonial_company_name'] ); ?>
					<?php
					if ( isset( $home_improvement_link ) ) {
						echo '</a>';
					}
					?>
				</div>
				<!-- .company -->
			<?php endif; ?>

			<div class="quote-cat">
				<?php echo wp_kses_post( home_improvement_custom_taxonomies_terms_links() ); ?>
			</div>
			<!-- .quote-cat -->
		</div>
		<!-- .quote-meta -->
	</article>
	<!-- .testimonial-item -->
<?php endif; ?>
