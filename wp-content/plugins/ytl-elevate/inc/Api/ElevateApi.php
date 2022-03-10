<?php
/**
 * @package elevate
 */

namespace Inc\Api;

use \Inc\Base\Model;
use WP_REST_Request;
use WP_REST_Response;

class ElevateApi
{

    const  api_url = 'https://ydbp-api-dev.azurewebsites.net/';
    const  auth_path_auth = 'connect/token';

    const  api_customer_create = 'api/Elevate/customer';
    const  api_customer_get_by_guid = 'api/Elevate/customer/Id';
    const  api_customer_get_by_nric = 'api/Elevate/customer/securityNumber';
    const  api_customer = 'api/Elevate/customer';

    const  api_order_create = 'api/Elevate/order';
    const  api_order_get_by_id = 'api/Elevate/order/Id';
    const  api_order_get_by_number = 'api/Elevate/order/orderNumber';

    const  api_contact = 'api/Elevate/contract';
    const  api_contact_get_by_id = 'api/Elevate/contract/Id';
    const  api_contact_get_by_nric = 'api/Elevate/contract/customerNRIC';

    const  api_product = 'api/Elevate/product';
    const  api_product_get_by_id = 'api/Elevate/product/Id';
    const  api_product_get_by_nric = 'api/Elevate/product/productId';

    public function __construct()
    {
        $apiSetting = \Inc\Base\Model::getAPISettings();
        $this->api_url = $apiSetting['url'];
        $this->apiSetting = $apiSetting;
    }


	 public static function register()
     {
         add_action('rest_api_init', function () {
             register_rest_route('/elevate/v1', '/test', array(
                 'methods' => 'GET',
                 'callback' => array('\Inc\Api\ElevateApi', 'do_test'),
             ));

             register_rest_route('/elevate/v1', '/getProduct', array(
                 'methods' => 'GET',
                 'callback' => array('\Inc\Api\ElevateApi', 'getProduct'),
             ));

         });
     }



     public static function do_test()
     {

//         $product = \Inc\Base\Model::getProductByCode();

     }

    public static function getProduct(){
        $code = $_REQUEST['code'];
        $product = \Inc\Base\Model::getProductByCode($code);
        $response 	= new WP_REST_Response($product);
        $response->set_status(200);
        return $response;
    }

    public function get_token()
    {
        $tokenOption = get_option('elevate_auth_token');
        if (!$tokenOption) {
            $token = self::generate_auth_token();
        } else {
            $tokenArray = unserialize($tokenOption);
            if(strtotime("+3 months",strtotime($tokenArray['requestDate'])) <  strtotime("now")){
                $token = self::generate_auth_token();
            }else{
                $token = $tokenArray['basicAuthToken']->access_token;
                if(!$token){
                    $token = self::generate_auth_token();
                }
            }

        }
        return $token;
    }

    private function generate_auth_token()
    {
        $return = false;

        $apiSetting = \Inc\Base\Model::getAPISettings();

        $params = [
            'Client_Id' => $apiSetting['client_id'],
            'UserName' => $apiSetting['username'],
            'Password' => $apiSetting['password'],
            'grant_type' => $apiSetting['grant_type'],
            'Client_Secret' => $apiSetting['client_secret'],
        ];

        $args = [
            'headers' => array(
                'Cookie' => 'cookie',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ),
            'body' => $params,
            'method' => 'POST'
        ];


        $api_url = $apiSetting['url'] . self::auth_path_auth;

        $request = wp_remote_post($api_url, $args);
        $response = $request['response'];
        $res_code = $response['code'];

        if (is_wp_error($request)) {
            $error_message = $response->get_error_message();
            add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on generating auth token: ', 'elevate') . $error_message, 'error');
        } else if ($res_code != 200) {
            if (isset($response['message'])) {
                $error_message = $response['message'];
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on generating auth token: ', 'elevate') . "<strong><em>$error_message</em></strong>", 'error');
            }
        } else {
            $data = json_decode($request['body']);
            update_option('elevate_auth_token', serialize(['basicAuthToken' => $data, 'requestDate' => date("Y-m-d H:i:s")]), false);
            $return = $data->access_token;
        }
        return $return;
    }

    public static function pullProducts(){
        $params = array();
        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params,
            'method' => 'GET'
        ];


        $api_url = self::api_url . self::api_product;

        $request = wp_remote_get($api_url, $args);

        $response = $request['response'];
        $res_code = $response['code'];

        if (is_wp_error($request)) {
            $error_message = $response->get_error_message();
            add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on full data: ', 'elevate') . $error_message, 'error');
        } else if ($res_code != 200) {
            if (isset($response['message'])) {
                $error_message = $response['message'];
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on full data: ', 'elevate') . "<strong><em>$error_message</em></strong>", 'error');
            }
        } else {
            $data = json_decode($request['body'],true);
            $return = $data;
        }
        return $return;
    }

}