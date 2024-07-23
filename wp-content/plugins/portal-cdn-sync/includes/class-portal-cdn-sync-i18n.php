<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https:// https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Portal_Cdn_Sync
 * @subpackage Portal_Cdn_Sync/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Portal_Cdn_Sync
 * @subpackage Portal_Cdn_Sync/includes
 * @author     AJ <ajay.prakash@ytlcomms.my>
 */
class Portal_Cdn_Sync_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'portal-cdn-sync',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
