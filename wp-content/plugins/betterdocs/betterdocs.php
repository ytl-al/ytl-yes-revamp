<?php

/**
 * Plugin Name:       BetterDocs
 * Plugin URI:        https://betterdocs.co/
 * Description:       Create stunning Knowledge base for your WordPress website and reduce support pressure with the help of BetterDocs. Get access to amazing templates and create fully customizable KB within minutes.
 * Version:           2.3.7
 * Author:            WPDeveloper
 * Author URI:        https://wpdeveloper.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       betterdocs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

define('BETTERDOCS_VERSION', '2.3.7');
define('BETTERDOCS_DB_VERSION', '1.0');
define('BETTERDOCS_DIR_PATH', plugin_dir_path(__FILE__));
define('BETTERDOCS_URL', plugin_dir_url(__FILE__));
define('BETTERDOCS_PUBLIC_URL', BETTERDOCS_URL . 'public/');
define('BETTERDOCS_ADMIN_URL', BETTERDOCS_URL . 'admin/');
define('BETTERDOCS_FILE', __FILE__);
define('BETTERDOCS_BASENAME', plugin_basename(__FILE__));

define('BETTERDOCS_ROOT_DIR_PATH', plugin_dir_path(__FILE__));
define('BETTERDOCS_ADMIN_DIR_PATH', BETTERDOCS_ROOT_DIR_PATH . 'admin/');
define('BETTERDOCS_PUBLIC_PATH', BETTERDOCS_ROOT_DIR_PATH . 'public/');
define(
	'BETTERDOCS_KSES_ALLOWED_HTML',
	array(
		'span' => array(
			'class' => array(),
			'style' => array()
		),
		'p' => array(
			'class' => array(),
			'style' => array()
		),
		'strong' => array(),
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array(),
		'h5' => array(),
		'h6' => array(),
		'div' => array(
			'class' => array(),
			'style' => array()
		)
	)
);

/**
 * WPML compatibility with Polylang
 */
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (is_plugin_active('polylang/polylang.php')) {
	define('PLL_WPML_COMPAT', false);
}

require_once plugin_dir_path(__FILE__) . 'includes/class-betterdocs-activator.php';
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-betterdocs-activator.php
 */
function activate_betterdocs()
{
	BetterDocs_Activator::activate();
}
add_action('activate_' . plugin_basename(__FILE__), 'activate_betterdocs');

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-betterdocs-deactivator.php
 */
function deactivate_betterdocs()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-betterdocs-deactivator.php';
	BetterDocs_Deactivator::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_betterdocs');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-betterdocs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_betterdocs()
{
	$plugin = new BetterDocs();
	$plugin->run();
	do_action('betterdocs_init');
}
run_betterdocs();
