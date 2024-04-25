<?php
/**
 * Team functionality.
 *
 * @package 'home-improvement'
 */

/** CLASS_NOTICE class. */
class HOME_IMPROVEMENT_NOTICE {

	/**
	 * Construct class
	 */
	public function __construct() {
		add_action( 'wp_loaded', array( $this, 'welcome_notice' ), 20 );
		add_action( 'wp_loaded', array( $this, 'hide_notices' ), 15 );
		add_action( 'wp_ajax_import_button', array( $this, 'welcome_notice_import_handler' ) );
	}

	/**
	 * Admin notices
	 */
	public function welcome_notice() {
		if ( ! function_exists( 'is_plugin_active' ) ) {
            // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		if ( is_plugin_inactive( 'home-improvement-companion/home-improvement-companion.php' ) && is_plugin_inactive( 'home-improvement-companion-pro/home-improvement-companion-pro.php' ) ) {
			delete_option( 'home_improvement_admin_notice_welcome' );} else {
			update_option( 'home_improvement_admin_notice_welcome', 1 );
			}

			if ( ! get_option( 'home_improvement_admin_notice_welcome' ) ) {
				add_action( 'admin_notices', array( $this, 'welcome_notice_markup' ) ); // Show notice.
			}
	}

	/**
	 * Button `Get started` CTA.
	 *
	 * @return string
	 */
	public function import_button_html() {
		$html = '<a class="btn-get-started button button-primary" href="#">' . esc_html__( 'Get started', 'home-improvement' ) . '</a>';
		return $html;
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice_markup() {
		$dismiss_url = wp_nonce_url(
			remove_query_arg( array( 'activated' ), add_query_arg( 'hide-notice', 'welcome' ) ),
			'hide_notices_security_nonce',
			'notice_security_nonce'
		);
		?>
		<div id="message" class="notice notice-success home-improvement-notice">
			<div class="notice-content">
				<div class="image">
					<img class="" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php esc_attr_e( 'logo', 'home-improvement' ); ?>" />
				</div>

				<div class="notice-text">
					<h2>
						<?php
						echo sprintf(
						/* translators: 1: html em tag, 2: close html em tag. */
							esc_html__(
								'Welcome! Thank you for choosing Us! To fully take advantage of the best our theme can offer, click on %1$s  Get Started Button%2$s.',
								'home-improvement'
							),
							'<em>',
							'</em>'
						);

						?>
					</h2>

					<div class="notice-cta">
						<?php echo wp_kses_post( $this->import_button_html() ); ?>
						<span class="plugin-install-notice">
						<?php 
						echo sprintf(
							esc_html__( 'Clicking the button will install and activate the %1$sHome Improvement Companion%2$s plugin.', 'home-improvement' ),
							'<strong>',
							'</strong>'
						); 
						?>
						</span>
					</div>
				</div>
			</div>
		</div> <!-- /.message__content -->
		<?php
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public function hide_notices() {
		if ( isset( $_GET['hide-notice'] ) && isset( $_GET['notice_security_nonce'] ) ) { // WPCS: input var ok.

			// phpcs:ignore WordPress.VIP.ValidatedSanitizedInput.InputNotSanitized
			if ( ! wp_verify_nonce( wp_unslash( $_GET['notice_security_nonce'] /* phpcs:ignore */ ), 'hide_notices_security_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'home-improvement' ) ); // phpcs:ignore xss ok.
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'home-improvement' ) ); // phpcs:ignore xss ok.
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['hide-notice'] ) );

			// Hide.
			if ( 'welcome' === $_GET['hide-notice'] ) {
				update_option( 'home_improvement_admin_notice_' . $hide_notice, 1 );
			} else { // Show.
				delete_option( 'home_improvement_admin_notice_' . $hide_notice );
			}
		}
	}

	/**
	 * Handle the AJAX process while import or get started button clicked.
	 */
	public function welcome_notice_import_handler() {
		check_ajax_referer( 'ajax-admin-security-nonce', 'security' );

		$status             = array(
			'install' => 'plugin',
		);
		$status['redirect'] = admin_url( '/admin.php?page=home-improvement-options' );

		if ( ! current_user_can( 'install_plugins' ) ) {
			$status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.', 'home-improvement' );
			wp_send_json_error( $status );
		}

		$plugins = array(
			array(
				'file' => 'home-improvement-companion/home-improvement-companion.php',
				'name' => 'Home Improvement Companion',
				'slug' => 'home-improvement-companion',
			),
		);

		if ( file_exists( WP_PLUGIN_DIR . '/home-improvement-companion-pro/home-improvement-companion-pro.php' ) ) {
			$plugins[] = array(
				'file' => 'home-improvement-companion-pro/home-improvement-companion-pro.php',
				'name' => 'Home Improvement Companion Pro',
				'slug' => 'home-improvement-companion-pro',
			);
		}

		foreach ( $plugins as $plugin ) :

			if ( is_plugin_active_for_network( $plugin ) || is_plugin_active( $plugin ) ) {
				continue;
			}


			if ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin['file'] ) ) {

				wp_enqueue_style( 'plugin-install' );
				wp_enqueue_script( 'plugin-install' );

				/**
				 * Install Plugin.
				 */
                include_once ABSPATH . '/wp-admin/includes/file.php'; //phpcs:ignore
                include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php'; //phpcs:ignore
                include_once ABSPATH . 'wp-admin/includes/plugin-install.php'; //phpcs:ignore


				$api = plugins_api(
					'plugin_information',
					array(
						'slug'   => sanitize_key( wp_unslash( $plugin['slug'] ) ),
						'fields' => array(
							'sections' => false,
						),
					)
				);



				if ( is_wp_error( $api ) ) {
					$status['errorMessage'] = $api->get_error_message();
					wp_send_json_error( $status );
				}

				$skin     = new WP_Ajax_Upgrader_Skin();
				$upgrader = new Plugin_Upgrader( $skin );
				$result   = $upgrader->install( $api->download_link );

				if ( is_wp_error( $result ) ) {
					$status['errorCode']    = $result->get_error_code();
					$status['errorMessage'] = $result->get_error_message();
					wp_send_json_error( $status );
				}
			}

			if ( ! current_user_can( 'activate_plugin' ) ) {
				$status['errorMessage'] = __( 'Sorry, you are not allowed to active plugins on this site.', 'home-improvement' );
				wp_send_json_error( $status );
			}

			$result = activate_plugin( $plugin['file'] );

			if ( is_wp_error( $result ) ) {
				$status['errorCode']    = $result->get_error_code();
				$status['errorMessage'] = $result->get_error_message();
				wp_send_json_error( $status );
			}
		endforeach;




		if ( class_exists( '\HomeImprovementCompanion\App\Backend\Ajax' ) ) {
			$ajax = new \HomeImprovementCompanion\App\Backend\Ajax(); // phpcs:ignore
			$ajax->InstallActivateRequiredPlugins();
		}

		wp_send_json_success( $status );

		exit();
	}

}

new HOME_IMPROVEMENT_NOTICE();
