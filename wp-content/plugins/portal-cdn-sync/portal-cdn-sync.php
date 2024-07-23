<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https:// https://www.ytl.com/technology.asp
 * @since             1.0.0
 * @package           Portal_Cdn_Sync
 *
 * @wordpress-plugin
 * Plugin Name:       PortalCDN Sync
 * Plugin URI:        https://https://www.ytl.com/
 * Description:       A plugin to pull data from the CDN and portal, and save the plan data for use on the Yes.my website.







 * Version:           1.0.0
 * Author:            AJ
 * Author URI:        https:// https://www.ytl.com/technology.asp/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       portal-cdn-sync
 * Domain Path:       /languages
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
define( 'PORTAL_CDN_SYNC_VERSION', '1.0.0' );




/**
 * Prefix for all plugin's options.
 */
define('SCRM_PREFIX', 'scrm_');


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-portal-cdn-sync-activator.php
 */
function activate_portal_cdn_sync() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-portal-cdn-sync-activator.php';
	Portal_Cdn_Sync_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-portal-cdn-sync-deactivator.php
 */
function deactivate_portal_cdn_sync() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-portal-cdn-sync-deactivator.php';
	Portal_Cdn_Sync_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_portal_cdn_sync' );
register_deactivation_hook( __FILE__, 'deactivate_portal_cdn_sync' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-portal-cdn-sync.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_portal_cdn_sync() {

	$plugin = new Portal_Cdn_Sync();
	$plugin->run();

}
run_portal_cdn_sync();
