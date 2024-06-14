<?php

/**
 * Plugin Name:       BetterDocs
 * Plugin URI:        https://betterdocs.co/
 * Description:       Create stunning Knowledge base for your WordPress website and reduce support pressure with the help of BetterDocs. Get access to amazing templates and create fully customizable KB with AI Write.
 * Version:           3.5.7
 * Author:            WPDeveloper
 * Author URI:        https://wpdeveloper.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       betterdocs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

define( 'BETTERDOCS_PLUGIN_FILE', __FILE__ );

require_once __DIR__ . '/includes/v2x-compatibility.php';
require_once __DIR__ . '/vendor/autoload.php';


/**
 * Intiate the BetterDocs Plugin
 *
 * @since 2.5.0
 * @return \WPDeveloper\BetterDocs\Plugin
 */
function betterdocs() {
    /**
     * Remove PRO Functionalities if pro is not updated.
     */
    if( ! function_exists('betterdocs_pro') ){
        remove_action( 'betterdocs_init', 'run_betterdocs_pro' );
    }

    return \WPDeveloper\BetterDocs\Plugin::get_instance();
}

/**
 * Initialize BetterDocs (Free)
 * Here, begins the execution of the plugin.
 *
 * Returns the main instance of BetterDocs.
 *
 * @since  3.0
 * @return \WPDeveloper\BetterDocs\Plugin
 */

betterdocs();
