<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
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
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MY_ACF_BLOCKS_VERSION', '1.0.0' );
