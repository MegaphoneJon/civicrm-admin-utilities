<?php
/**
 * Network Settings Page Template.
 *
 * Handles markup for the Network Settings page.
 *
 * @package CiviCRM_Admin_Utilities
 * @since 0.8.1
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?><!-- assets/templates/network-settings.php -->
<div class="wrap">

	<h1><?php esc_html_e( 'CiviCRM Admin Utilities', 'civicrm-admin-utilities' ); ?></h1>

	<div class="updated">
		<?php if ( $this->plugin->is_civicrm_network_activated() ) : ?>
			<p><?php esc_html_e( 'CiviCRM is network-activated.', 'civicrm-admin-utilities' ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'CiviCRM is not network-activated.', 'civicrm-admin-utilities' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( $show_tabs ) : ?>
		<h1 class="nav-tab-wrapper">
			<a href="<?php echo $urls['settings_network']; ?>" class="nav-tab nav-tab-active"><?php esc_html_e( 'Network Settings', 'civicrm-admin-utilities' ); ?></a>
			<a href="<?php echo $urls['settings_site']; ?>" class="nav-tab"><?php esc_html_e( 'Site Settings', 'civicrm-admin-utilities' ); ?></a>
			<?php

			/**
			 * Allow others to add tabs.
			 *
			 * @since 0.5.4
			 *
			 * @param array $urls The array of subpage URLs.
			 * @param str The key of the active tab in the subpage URLs array.
			 */
			do_action( 'civicrm_admin_utilities_network_nav_tabs', $urls, 'settings' );

			?>
		</h1>
	<?php else : ?>
		<hr />
	<?php endif; ?>

	<?php if ( isset( $_GET['updated'] ) && $_GET['updated'] == 'true' ) : ?>
		<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
			<p><strong><?php esc_html_e( 'Settings saved.', 'civicrm-admin-utilities' ); ?></strong></p>
			<button type="button" class="notice-dismiss">
				<span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'civicrm-admin-utilities' ); ?></span>
			</button>
		</div>
	<?php endif; ?>

	<form method="post" id="civicrm_admin_utilities_settings_form" action="<?php echo $this->page_submit_url_get(); ?>">

		<?php wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false ); ?>
		<?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>
		<?php wp_nonce_field( 'cau_network_settings_action', 'cau_network_settings_nonce' ); ?>

		<div id="poststuff">

			<div id="post-body" class="metabox-holder columns-<?php echo $columns; ?>">

				<!--<div id="post-body-content">
				</div>--><!-- #post-body-content -->

				<div id="postbox-container-1" class="postbox-container">
					<?php do_meta_boxes( $screen->id, 'side', null ); ?>
				</div>

				<div id="postbox-container-2" class="postbox-container">
					<?php do_meta_boxes( $screen->id, 'normal', null ); ?>
					<?php do_meta_boxes( $screen->id, 'advanced', null ); ?>
				</div>

			</div><!-- #post-body -->
			<br class="clear">

		</div><!-- #poststuff -->

	</form>

</div><!-- /.wrap -->



