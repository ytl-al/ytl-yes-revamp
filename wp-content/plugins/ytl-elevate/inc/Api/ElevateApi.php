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

    const  mobile_api_url = 'https://mobileservicesiot.ytlcomms.my/';
    const  mobile_auth_path_auth = 'mobileyos/mobile/ws/v1/json/auth/getBasicAuth';

    const mobile_api_verify_eligbility = 'mobileyos/mobile/ws/v1/json/verifyEligibility';

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

             register_rest_route('/elevate/v1', '/customer', array(
                 'methods' => 'POST',
                 'callback' => array('\Inc\Api\ElevateApi', 'elevate_customer'),
             ));

             register_rest_route('/elevate/v1', '/verify-eligibility', array(
                 'methods' => 'POST',
                 'callback' => array('\Inc\Api\ElevateApi', 'verify_eligbility'),
             ));

             register_rest_route('/elevate/v1', '/verify-caeligibility', array(
                 'methods' => 'POST',
                 'callback' => array('\Inc\Api\ElevateApi', 'verify_caeligibility'),
             ));



         });
     }



     public static function do_test()
     {

       return  self::verify_eligbility();

     }

    public static function getProduct(){
        $code = $_REQUEST['code'];
        $product = \Inc\Base\Model::getProductByCode($code);
        $response 	= new WP_REST_Response($product);
        $response->set_status(200);
        return $response;
    }

    public static function verify_eligbility(WP_REST_Request $request){

        $token = self::mobileservice_generate_auth_token();
        $mykad = $request['mykad'];
        $planType = $request['plan_type'];

        $apiSetting =  get_option("ytlpd_settings");
        $request_id = $apiSetting['ytlpd_api_request_id'];
        $params = array(
            'planType'=> $planType,
            'locale'=>"en",
            'requestId'=> $request_id,
            'securityId'=>$mykad,
            'securityType'=>"NRIC",
            'sessionId'=>$token,
        );

        $args = [
            'headers' => array(
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'data_format' => 'body'
        ];

        $api_url = self::mobile_api_url . self::mobile_api_verify_eligbility;

        $request = wp_remote_post($api_url, $args);



        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ( $request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'],true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response 	= new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function verify_caeligibility(){
        $return['status'] = 1;
        $response 	= new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function elevate_customer(){
        $return['status'] = 1;
        $response 	= new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function eligibility_init(){
        $hash = md5(uniqid());

        $data = array(
            'hash'=>$hash,
            'mykad'=>$_POST['mykad'],
            'name'=>$_POST['name'],
            'phone'=>$_POST['phone'],
            'email'=>$_POST['email'],
            'status'=>0,
        );
        $id= \Inc\Base\Model::addEligibility($data);
        $qrcode= \Inc\Base\Model::getEligibility($hash);
        $info= array();
        $info['data'] = $qrcode;
        $response 	= new WP_REST_Response($info);
        $response->set_status(200);
        return $response;
    }

    public static function eligibility_check(){
        $hash = $_GET['hash'];

        $qrcode = \Inc\Base\Model::getEligibility($hash);

        $info = array(
            'hash'=>$hash,
            'mykad'=>$qrcode->mykad,
            'name'=>$qrcode->name,
            'phone'=>$qrcode->phone,
            'email'=>$qrcode->email,
            'status'=>$qrcode->status,
        );
        $response 	= new WP_REST_Response($info);
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
            if(strtotime("+19 minutes",strtotime($tokenArray['requestDate'])) <  strtotime("now")){
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

    public function mobileservice_get_token()
    {
        $tokenOption = get_option('mobileservice_auth_token');

        if (!$tokenOption) {
            $token = self::mobileservice_generate_auth_token();
        } else {
            $tokenArray = unserialize($tokenOption);
            if(strtotime("+19 minutes",strtotime($tokenArray['requestDate'])) <  strtotime("now")){
                $token = self::mobileservice_generate_auth_token();
            }else{
                $token = $tokenArray['basicAuthToken']->basicAuthToken;
                if(!$token){
                    $token = self::mobileservice_generate_auth_token();
                }
            }

        }
        return $token;
    }

    private function mobileservice_generate_auth_token()
    {
        $return = false;

        $apiSetting =  get_option("ytlpd_settings");
        $domain_url = $apiSetting['ytlpd_api_domain_url'];
        $request_id = $apiSetting['ytlpd_api_request_id'];
        $authorization_key = $apiSetting['ytlpd_api_authorization_key'];

        $params     = ['requestId' => $request_id, 'locale' => 60];
        $args       = [
            'headers'       => array('Content-Type' => 'application/json; charset=utf-8', 'Authorization' => 'BASIC '.$authorization_key),
            'body'          => json_encode($params),
            'method'        => 'POST',
            'data_format'   => 'body'
        ];
        $api_url    = self::mobile_api_url.self::mobile_auth_path_auth;

        $request    = wp_remote_post($api_url, $args);

        $response   = $request['response'];
        $res_code   = $response['code'];
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
            if (!empty($data->basicAuthToken)) {
                update_option('mobileservice_auth_token', serialize(['basicAuthToken' => $data, 'requestDate' => date("Y-m-d H:i:s")]), false);
            }
            $return = $data->basicAuthToken;
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