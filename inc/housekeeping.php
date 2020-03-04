<?php
/**
 * Housekeeping file
 *
 * Any functions not directly related to the core functionality of this plugin.
 *
 * @link              https://markmarzeotti.com
 * @since             1.0.0
 * @package           My_Acf_Blocks
 */

/**
 * Check to make sure ACF Pro is active.
 */
function mab_check_dependencies() {

	if ( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
		$class   = 'notice notice-error';
		$message = __( 'This plugin "My ACF Blocks" relies on Advanced Custom Fields Pro. Please install and activate ACF Pro.', 'my-acf-blocks' );

		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
	}

}
add_action( 'admin_notices', 'mab_check_dependencies' );
