<?php
/**
* @package elevate
*/
namespace Inc\Api;

use \Inc\Base\Model;

class ElevateApi
{

    public $api_url = 'https://ydbp-identity-dev.azurewebsites.net/';
    public $api_authorization = 'connect/token';

    public $api_customer_create = 'api/Elevate/customer';
    public $api_customer_get_by_guid = 'api/Elevate/customer/Id';
    public $api_customer_get_by_nric = 'api/Elevate/customer/securityNumber';
    public $api_customer = 'api/Elevate/customer';

    public $api_order_create = 'api/Elevate/order';
    public $api_order_get_by_id = 'api/Elevate/order/Id';
    public $api_order_get_by_number = 'api/Elevate/order/orderNumber';

    public $api_contact = 'api/Elevate/contract';
    public $api_contact_get_by_id = 'api/Elevate/contract/Id';
    public $api_contact_get_by_nric = 'api/Elevate/contract/customerNRIC';

    public $api_product = 'api/Elevate/product';
    public $api_product_get_by_id = 'api/Elevate/product/Id';
    public $api_product_get_by_nric = 'api/Elevate/product/productId';

    public function __construct(){

    }

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