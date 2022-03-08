<?php
/**
* @package elevate
*/
namespace Inc\Base;

use \Inc\Base\BaseController; 

class Model extends BaseController
{
	private static $wpdb;

	public function __construct(){
		global $wpdb;
		self::$wpdb = $wpdb;
	}
	/**
	 * Creating database tables
	 */
	public static function plugin_install() {
		 

	}
 

}