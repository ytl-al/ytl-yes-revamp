<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ytl.com/technology.asp
 * @since             1.0.0
 * @package           Ytl_Pull_Data
 *
 * @wordpress-plugin
 * Plugin Name:       YTL API Pull Data
 * Plugin URI:        https://www.ytl.com/
 * Description:       Plugin to pull and save the plans data to be used in Yes.my website.
 * Version:           1.0.0
 * Author:            YTL Digital Design [AL Latif Mohamad]
 * Author URI:        https://www.ytl.com/technology.asp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ytl-pull-data
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('YTL_PULL_DATA_VERSION', '1.0.0');

/**
 * Prefix for all plugin's options.
 */
define('YTLPD_PREFIX', 'ytlpd_');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ytl-pull-data-activator.php
 */
function activate_ytl_pull_data()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-ytl-pull-data-activator.php';
	Ytl_Pull_Data_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ytl-pull-data-deactivator.php
 */
function deactivate_ytl_pull_data()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-ytl-pull-data-deactivator.php';
	Ytl_Pull_Data_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_ytl_pull_data');
register_deactivation_hook(__FILE__, 'deactivate_ytl_pull_data');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-ytl-pull-data.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ytl_pull_data()
{

	$plugin = new Ytl_Pull_Data();
	$plugin->run();
}
run_ytl_pull_data();
