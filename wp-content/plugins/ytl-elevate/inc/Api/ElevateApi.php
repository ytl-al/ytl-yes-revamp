<?php
/**
* @package elevate
*/
namespace Inc\Api;

use \Inc\Base\Model;

class ElevateApi
{
	 public static function register(){
		 add_action( 'rest_api_init', function () {
			//insert 
			register_rest_route( 'api/v1', '/plan', array(
				'methods' => 'POST',
				'callback' => array('\Inc\Api\$response','get_plan'),
			) );
			 
		});
	 }
	 
	 public static function get_plan(){
	 
		$data = $_REQUEST;
		
		$response = array();
		echo json_encode($response);
		exit();

	}
 

}