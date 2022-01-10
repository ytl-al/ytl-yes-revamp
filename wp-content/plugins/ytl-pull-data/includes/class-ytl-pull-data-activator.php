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

		$table_name			= $wpdb->prefix.'ywos_cart';
		$charset_collate 	= $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					session_key varchar(255) DEFAULT '' NOT NULL, 
					meta text NOT NULL, 
					PRIMARY KEY (id)
				) $charset_collate;";
		
		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		add_option($prefix."db_version", '1.0');
	}
}
