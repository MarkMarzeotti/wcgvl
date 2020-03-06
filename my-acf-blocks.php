<?php
/**
 * My ACF Blocks
 *
 * @link              https://markmarzeotti.com
 * @since             1.0.0
 * @package           My_Acf_Blocks
 *
 * @wordpress-plugin
 * Plugin Name:       My ACF Blocks
 * Plugin URI:        https://markmarzeotti.com
 * Description:       A plugin built for WordCamp Greenville 2020. It contains Gutenberg Blocks.
 * Version:           1.0.0
 * Author:            Mark Marzeotti
 * Author URI:        https://markmarzeotti.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       my-acf-blocks
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'MY_ACF_BLOCKS_VERSION', '1.0.0' );

/**
 * Add plugin specific folder for acf-json.
 *
 * @param string $path The current path to acf-json.
 */
function mab_acf_json_save_point( $path ) {

	return plugin_dir_path( __FILE__ ) . 'acf-json';

}
add_filter( 'acf/settings/save_json', 'mab_acf_json_save_point' );

/**
 * Some light housekeeping to make sure everything runs smoothly.
 */
require plugin_dir_path( __FILE__ ) . 'inc/housekeeping.php';

/**
 * Functions restricting Gutenberg blocks and functionality.
 */
require plugin_dir_path( __FILE__ ) . 'inc/restrict-gutenberg.php';

/**
 * Functions extending Gutenberg blocks and functionality.
 */
require plugin_dir_path( __FILE__ ) . 'inc/extend-gutenberg.php';

/**
 * Testimonial Block.
 */
require plugin_dir_path( __FILE__ ) . 'blocks/blocks.php';
