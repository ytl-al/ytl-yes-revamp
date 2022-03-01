<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/includes
 * @author     YTL Digital Design [AL Latif Mohamad] <latif.mohamad@ytl.com>
 */
class Ytl_Pull_Data_Activator
{

    /**
     * The ytlpd prefix
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $ytlpd_prefix     	The ytlpd prefix
     */
    private $ytlpd_prefix;

    /**
     * The ytlpd db version
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $ytlpd_db_version     The ytlpd db version
     */
    private $ytlpd_db_version;

	public function __construct()
	{
		$this->ytlpd_prefix		= (defined(YTLPD_PREFIX)) ? YTLPD_PREFIX : 'ytlpd_';
        $this->ytlpd_db_version	= '1.0';
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		$prefix	= (defined(YTLPD_PREFIX)) ? YTLPD_PREFIX : 'ytlpd_';
        
        add_option($prefix."plans_data", '');
        add_option($prefix."updated_at", '');
        add_option($prefix."basic_auth_token", '');
        add_option($prefix."settings", '');

		self::create_table();
	}

	public function create_table() 
	{
		$prefix	= (defined(YTLPD_PREFIX)) ? YTLPD_PREFIX : 'ytlpd_';

		global $wpdb;

		$table_name			= $wpdb->prefix.'ywos_orders';
		$charset_collate 	= $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
					ID mediumint(9) NOT NULL AUTO_INCREMENT, 
					session_key VARCHAR(255) NULL DEFAULT '', 
					msisdn VARCHAR(255) NULL DEFAULT '', 
					plan_id VARCHAR(5) NULL DEFAULT '', 
					yos_order_id VARCHAR(255) NULL DEFAULT '', 
					yos_order_display_id VARCHAR(255) NULL DEFAULT '', 
					yos_order_meta TEXT NULL DEFAULT '', 
					yos_order_response TEXT NULL DEFAULT '', 
					xpay_order_id VARCHAR(255) NULL DEFAULT '', 
					xpay_order_meta TEXT NULL DEFAULT '', 
					xpay_order_response TEXT NULL DEFAULT '', 
					is_xpay_success INT(1) NULL DEFAULT 0, 
					order_created_at TIMESTAMP NULL DEFAULT NULL, 
					created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
					updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
					deleted_at TIMESTAMP NULL DEFAULT NULL, 
					PRIMARY KEY (id)
				) $charset_collate;";
		
		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		add_option($prefix."db_version", '1.0');
	}
}
