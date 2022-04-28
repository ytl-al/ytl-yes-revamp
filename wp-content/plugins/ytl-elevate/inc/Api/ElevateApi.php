<?php
/**
 * @package elevate
 */

namespace Inc\Api;

use GuzzleHttp\Psr7\Request;
use \Inc\Base\Model;
use WP_REST_Request;
use WP_REST_Response;

class ElevateApi
{

    const  API_TIMEOUT = 120;

    const  api_url = 'https://ydbp-api-dev.azurewebsites.net/';
    const  auth_path_auth = 'connect/token';

    const  api_customer_create = 'api/Elevate/customer';
    const  api_customer_get_by_guid = 'api/Elevate/customer';
    const  api_customer_get_by_nric = 'api/Elevate/customer/securityNumber';
    const  api_customer = 'api/Elevate/customer';
    const  api_ca_verification = 'api/Elevate/compAsia/Verification';

    const  api_order_create = 'api/Elevate/order';
    const  api_order_get_by_id = 'api/Elevate/order/Id';
    const  api_order_get_by_number = 'api/Elevate/order/orderNumber';
    const  api_order_yos_order = 'api/Elevate/createYOSOrder';

    const  api_contract = 'api/Elevate/contract';
    const  api_contract_get_by_id = 'api/Elevate/contract/Id';
    const  api_contract_get_by_nric = 'api/Elevate/contract/customerNRIC';

    const  api_product = 'api/Elevate/product';
    const  api_product_get_by_id = 'api/Elevate/product/Id';
    const  api_product_get_by_nric = 'api/Elevate/product/productId';
    const  api_product_bundle = 'api/Elevate/product/GetProductsByProductBundleId';

    const api_caeligibility = 'api/Elevate/compAsia/Eligibility';
    //const api_caeligibility = 'api/Elevate/compAsia/Eligibility';

    const  mobile_api_url = 'https://mobileservicesiot.ytlcomms.my/';
    const  mobile_auth_path_auth = 'mobileyos/mobile/ws/v1/json/auth/getBasicAuth';

    const mobile_api_verify_eligbility = 'mobileyos/mobile/ws/v1/json/verifyEligibility';

    const  ekyc_api_url = 'https://ekyc-dev-web.azurewebsites.net/';
    const  ekyc_api_check = 'https://ydbp-api-dev.azurewebsites.net/api/EKYCProcessStatus/';

    const yos_order_token = '/wp-json/ywos/v1/get-auth-token';
    const yos_order_username = 'ytldd';
    const yos_order_password = 'ytldd123$';

    const yos_order_without_payment = 'https://mobile.yes.my/mobileyos/mobile/ws/v1/json/createeKYCOrder';
    const yos_order_request_id = '88888888';


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
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_customer_insert'),
            ));

            register_rest_route('/elevate/v1', 'customer/update', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_customer_update'),
            ));

            register_rest_route('/elevate/v1', '/verify-eligibility', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'verify_eligibility'),
            ));

            register_rest_route('/elevate/v1', '/ca-verification', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'ca_verification'),
            ));

            register_rest_route('/elevate/v1', '/verify-caeligibility', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'verify_caeligibility'),
            ));

            register_rest_route('/elevate/v1', '/ekyc-init', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'ekyc_init'),
            ));

            register_rest_route('/elevate/v1', '/ekyc-check', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'ekyc_check'),
            ));

            register_rest_route('/elevate/v1', 'contract', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_contract'),
            ));

            register_rest_route('/elevate/v1', 'order/create', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_order_create'),
            ));

            register_rest_route('/elevate/v1', 'order/update', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_order_update'),
            ));

            register_rest_route('/elevate/v1', 'order/cancel', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_order_cancel'),
            ));
			
			register_rest_route('/elevate/v1', 'qrcode/check', array(
                'methods' => 'GET',
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_delivery_qrcode_check'),
            ));
			
			register_rest_route('/elevate/v1', 'qrcode/confirm', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'elevate_delivery_qrcode_confirm'),
            ));


        });
    }


    public static function do_test(WP_REST_Request $request)
    {
      
        return self::elevate_customer_get_by_uid($request['uid']);

    }

    public static function getProduct(WP_REST_Request $request)
    {
        $code = $request['code'];

//        $product = \Inc\Base\Model::getProductByCode($code);
        $product = \Inc\Base\Model::refinde(self::pullBundleProduct($code));

        $response = new WP_REST_Response($product);
        $response->set_status(200);
        return $response;
    }

    private static function pullBundleProduct($code){
        $params = array(
            'productBundleId'=>$code
        );
        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params,
            'method' => 'GET'
        ];


        $api_url = self::api_url . self::api_product_bundle;

        $request = wp_remote_get($api_url, $args);

        $response = $request['response'];
        $res_code = $response['code'];

        if (is_wp_error($request)) {
           return false;
        } else if ($res_code != 200) {
            return false;
        } else {
            $data = json_decode($request['body'], true);
            $return = $data;
        }
//        print_r($data);die();
        return $return;
    }

    public static function verify_eligibility(WP_REST_Request $request)
    {

        $token = self::mobileservice_generate_auth_token();
        $mykad = $request['mykad'];
        $planType = $request['plan_type'];

        $apiSetting = get_option("ytlpd_settings");
        $request_id = $apiSetting['ytlpd_api_request_id'];
        $params = array(
            'planType' => $planType,
            'locale' => "en",
            'requestId' => $request_id,
            'securityId' => $mykad,
            'securityType' => "NRIC",
            'sessionId' => $token,
        );

        $args = [
            'headers' => array(
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];

        $api_url = self::mobile_api_url . self::mobile_api_verify_eligbility;
        $return['url'] = $api_url;
        $request = wp_remote_post($api_url, $args);
		
		//print_r($request);die($api_url);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }
		
		//print_r($return);die($api_url);

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function ca_verification(WP_REST_Request $request)
    {

        $mykad = $request['mykad'];
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $front_url = $request['front_url'];
        $back_url = $request['back_url'];

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            )
        ];

        $api_url = self::api_url . self::api_ca_verification . '?MyKadNumber=' . $mykad . '&FullName=' . $name. '&email=' . $email. '&phone=' . $phone. '&front_url=' . $front_url. '&back_url=' . $back_url;
		 
        $request = wp_remote_get($api_url, $args);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $data = json_decode($request['body'], true);

            if ($data['response']) {
                $return['status'] = 1;
            } else {
                $return['status'] = 0;
            }
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function verify_caeligibility(WP_REST_Request $request)
    {


        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            )
        ];

        $api_url = self::api_url . self::api_caeligibility . '?MyKadNumber=' . $request['mykad'] . 'FullName=' . $request['name'];

        $request = wp_remote_get($api_url, $args);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $data = json_decode($request['body'], true);

            if ($data['response']) {
                $return['status'] = 1;
            } else {
                $return['status'] = 0;
            }
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function elevate_customer_get($mykad)
    {
        $params = array(
            'securityNumber' => $mykad
        );
        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params
        ];

        $api_url = self::api_url . self::api_customer;
        $return['status'] = 1;
        $return['api_url'] = $api_url;
        $request = wp_remote_get($api_url, $args);
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }
        return $return;
    }

    public static function elevate_customer_insert(WP_REST_Request $request)
    {
        $mykad = $request['mykad'];
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $productId = $request['productId'];

        $params = array(
            "customerID" => "",
            "securityType" => 0,
            "securityNumber" => $mykad,
            "fullName" => $name,
            "gender" => self::getGender($mykad),
            "dob" => self::getDOB($mykad),
            "addressLine1" => "",
            "addressLine2" => "",
            "state" => "",
            "city" => "",
            "postCode" => "",
            "country" => "Malaysia",
            "mobileNumber" => $phone,
            "email" => $email,
            "msisdn" => "",
            "agreedTerms" => true,
            "agreedDataCollection" => true,
            "referralCode" => "",
            "dealerUID" => "",
            "dealerCode" => "",
            "registrationChannel" => "WEB",
            "registrationDate" => date("c"),
            "productSelected" => $productId,
            "orderNumber" => "",
            "verificationStatus" => true,
            "verificationCode" => "",
            "verificationDate" => date("c"),
            "emailSent" => true
        );

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];

        $api_url = self::api_url . self::api_customer;

        $request = wp_remote_post($api_url, $args);
		//echo '<pre>'; print_r(json_encode($params));die();

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Sorry, cannot connect to Server, please try again.";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;

            $return['error'] = "Sorry, " . $request['response']['message'];
            $return['args'] = $args;
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function elevate_customer_update(WP_REST_Request $request)
    {

        $id = $request['uid'];
        $params = array(
            'securityNumber' => $request['mykad'],
            'fullName' => $request['name'],
            'addressLine1' => $request['address'],
            'addressLine2' => $request['addressMore'],
            'postCode' => $request['postcode'],
            'mobileNumber' => $request['phone'],
            'email' => $request['email'],
            'state' => $request['state'],
            'city' => $request['city']
        );
        $params = array(
            "customerID" => "",
            "securityType" => 0,
            "securityNumber" => $request['mykad'],
            "fullName" => $request['name'],
            "gender" => self::getGender($request['mykad']),
            "dob" => self::getDOB($request['mykad']),
            "addressLine1" => $request['address'],
            "addressLine2" => $request['addressMore'],
            "state" => $request['state'],
            "city" => $request['city'],
            "postCode" => $request['postcode'],
            "country" => "Malaysia",
            "mobileNumber" => $request['phone'],
            "email" => $request['email'],
            "msisdn" => "",
            "agreedTerms" => true,
            "agreedDataCollection" => true,
            "referralCode" => "",
            "dealerUID" => "",
            "dealerCode" => "",
            "registrationChannel" => "WEB",
            "registrationDate" => date("c"),
            "productSelected" => $request['productId'],
            "orderNumber" => "",
            "verificationStatus" => true,
            "verificationCode" => "",
            "verificationDate" => date("c"),
            "emailSent" => true,
            "lastModificationTime" => date("c")
        );
        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'PUT',
            'timeout' => self::API_TIMEOUT
        ];

        $api_url = self::api_url . self::api_customer . '?id=' . $id;

        $request = wp_remote_request($api_url, $args);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }
	
	public static function elevate_customer_get_by_uid($uid)
    {

         
        $params = array( 
        );
        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params), 
        ];

        $api_url = self::api_url . self::api_customer_get_by_guid . '/' . $uid;

        $request = wp_remote_get($api_url, $args);
		 
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        return $return;
    }

    public static function elevate_contract(WP_REST_Request $request)
    {
		 
        $params = array(
            "customerName" => $request['name'],
            "customerNRIC" => $request['mykad'],
            "orderID" => $request['orderId'],
            "orderDate" => date("c"),
            "tenure" => 0,
            "contractStartDate" => date("c"),
            "contractEndDate" => date("c", strtotime("+".$request['contract']." months")),
            "contractStatus" => 0,
            "contractValue" => 0,
            "contractSignedDate" => date("c"),
            "phoneSKU" => "",
            "phoneColourName" => "",
            "phoneColourHexCode" => "",
            "phoneIMEI" => "",
            "phonePrice" => 0,
            "phoneCapacity" => "",
            "deviceName" => "",
            "drvFees" => 0,
            "upFrontFees" => 0,
            "orixDeviceCost" => 0,
            "programFees" => 0,
            "contractPDFLocation" => "",
            "programName" => "",
            "campaignID" => ""
        );

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];

        

        $api_url = self::api_url . self::api_contract;
	 
        $request = wp_remote_post($api_url, $args);
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function elevate_order_create(WP_REST_Request $request)
    {

        $params = array(
            "orderNumber"=> "",
            "customerGUID"=> $request['id'],
            "orderStatus"=> "New",
            "error"=> "",
            "deliveryStatus"=> "Processing Order",
            "deliveryDate"=> date("c"),
            "podurl"=> "",
            "comments"=> "",
            "referralCode"=> "",
            "dealerUID"=> "",
            "dealerCode"=> "",
            "productSelected"=> $request['productSelected']
        );

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];

        $api_url = self::api_url . self::api_order_create;

        $request = wp_remote_post($api_url, $args);
		
		//print_r($request); print_r($args); die($api_url);
		
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }
	
	public static function elevate_order_get_by_number($orderNumber)
    {

        $params = array( 
        );

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'timeout' => self::API_TIMEOUT 
        ];

        $api_url = self::api_url . self::api_order_get_by_number.'?orderNumber='.$orderNumber ;

        $request = wp_remote_get($api_url, $args);
		
		//print_r($request); print_r($args); die($api_url);
		
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

       return $return;
    }

    public static function elevate_order_update(WP_REST_Request $request)
    {

        $params = array(
            "orderNumber"=> $request['orderNumber'],
            "customerGUID"=> $request['customerGUID'],
            "orderStatus"=> "New",
            "error"=> "",
            "deliveryStatus"=> "Processing Order",
            "deliveryDate"=> $request['deliveryDate'],
            "podurl"=> "",
            "comments"=> "",
			"referralCode"=> $request['referralCode'],
            "dealerUID"=> $request['dealerUID'],
            "dealerCode"=> $request['dealerCode'],
			"productSelected"=> $request['productSelected'],
            "customerQRCodeScanned"=> false
        );

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'PUT',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];

        $api_url = self::api_url . self::api_order_create.'?id='.$request['id'];

        $request = wp_remote_request($api_url, $args);
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public static function elevate_order_cancel(WP_REST_Request $request)
    {

        $params = array(
            "orderNumber"=> $request['orderNumber'],
            "customerGUID"=> $request['customerGUID'],
            "orderStatus"=> "Failed",
            "error"=> $request['error'],
            "deliveryStatus"=> "Cancelled",
            "deliveryDate"=> $request['deliveryDate'],
            "podurl"=> "",
            "comments"=> "",
			"referralCode"=> "",
            "dealerUID"=> "",
            "dealerCode"=> "",
			"productSelected"=> $request['productSelected'],
            "customerQRCodeScanned"=> false
        );

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'PUT',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];

        $api_url = self::api_url . self::api_order_create.'?id='.$request['id'];

        $request = wp_remote_request($api_url, $args);
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }
	
	public function elevate_delivery_qrcode_check(WP_REST_Request $request){
		$qrcode = $request['qrcode'];
		$return= array();
		$return['qrcode'] = $qrcode;
		if($qrcode){
			$AESEncryption_inputKey = "090911531ED5132896909CCB781E8C8657C28C897470A0BFF89FA906BA5A1986";
			$AESEncryption_iv = "C1620E617EE4FE95";
			$AESEncryption_blockSize = 256;

			$aes = new \Inc\Base\AESEncryption(base64_decode($qrcode), $AESEncryption_inputKey, $AESEncryption_iv, $AESEncryption_blockSize); 
			$dec = $aes->decrypt();
			$tmp = explode(':',$dec);
			
			$payload = array(
				'nric'=>$tmp[0],
				'name'=>$tmp[1],
				'uuid'=>$tmp[2],
				'order_no'=>$tmp[3]
			);
			 
			if($payload['order_no'] ){
				$return['status'] = 1;
				$return['data'] = $payload;
			}else{
				$return['status'] = 0;
				$return['error'] = 'Invalid QRCode';
			}
			
		}else{
			$return['status'] = 0;
			$return['error'] = 'Invalid QRCode';
		}
		$response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
	}
	
	public function elevate_delivery_qrcode_confirm(WP_REST_Request $request){
		$orderNumber = $request['SONO'];
		
		$order = ElevateApi::elevate_order_get_by_number($orderNumber);
		
		if($order['status']){
			if( $order['data']['orderStatus']== "New" && $order['data']['customerQRCodeScanned']== false){
				//update scan
				 $params = array(
					"orderNumber"=> $order['data']['orderNumber'],
					"customerGUID"=> $order['data']['customerGUID'],
					"orderStatus"=> $order['data']['orderStatus'],
					"error"=> $order['data']['error'],
					"deliveryStatus"=> $order['data']['deliveryStatus'],
					"deliveryDate"=> $order['data']['deliveryDate'],
					"podurl"=> $order['data']['podurl'],
					"comments"=> $order['data']['comments'],
					"referralCode"=> $order['data']['referralCode'],
					"dealerUID"=> $order['data']['dealerUID'],
					"dealerCode"=> $order['data']['dealerCode'],
					"productSelected"=> $order['data']['productSelected'],
					"customerQRCodeScanned"=> true
				);

				$token = self::get_token();

				$args = [
					'headers' => array(
						'Accept' => 'text/plain',
						'Authorization' => 'Bearer ' . $token,
						'Content-Type' => 'application/json'
					),
					'body' => json_encode($params),
					'method' => 'PUT',
					'timeout' => self::API_TIMEOUT,
					'data_format' => 'body'
				];

				$api_url = self::api_url . self::api_order_create.'?id='.$order['data']['id'];

				$request = wp_remote_request($api_url, $args);
				if (is_wp_error($request)) {
					$return['status'] = 0;
					$return['error'] = "Cannot connect to API server";
				} else if ($request['response']['code'] != 200) {
					$code = $request['response']['code'];
					$return['status'] = 0;
					$return['error'] = @$request['response'];
				} else {
					$code = $request['response']['code'];
					$data = json_decode($request['body'], true);
					$return['status'] = 1;
					$return['data'] = $data;
				}
			}
		}else{
			$return = $order;
		}
		 
		$response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
	}

    public static function ekyc_init(WP_REST_Request $request)
    {
        $uid = $request['uid'];
        $mykad = $request['mykad'];
        $fname = $request['fname'];
        $api_url = self::ekyc_api_url . '?uid=' . $uid . '&mykad=' . $mykad . '&fname=' . $fname;
        $params = array();

        $args = [
            'headers' => array(
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];
        $request = wp_remote_post($api_url, $args);


        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }
        //overwrite for test
        $return['status'] = 1;

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;

    }

    public static function ekyc_check(WP_REST_Request $request)
    {
        $uid = $request['uid'];
        $api_url =  self::ekyc_api_check . $uid;
        $params = array();

        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params
        ];
        $request = wp_remote_get($api_url, $args);
		
		//echo '<pre>';print_r($request);die();

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;

    }

    public function make_yos_order_without_payment(WP_REST_Request $request){
        $token = ydbp_identity_auth_token();

        $api_url =  self::yos_order_without_payment;
        $params = array(
            'eKYCCustomerDetail'=>array(
                "alternatePhoneNumber" =>"0181234567",
                "customerFullName" => "FIRSTNAME LASTNAME",
                "email" => "email@domain.com",
                "loginYesId" => "",
                "planName" => "YES Postpaid FT5G RM99",
                "planType" => "POSTPAID",
                "securityId" => "123456001234",
                "securityType" => "NRIC",
                "dealerCode" => "",
                "dealerLoginId" => ""
            ),
            'deliveryAddress'=>array(
                "addressLine" => "Address Line 1",
                "city" => "KUALA LUMPUR",
                "cityCode" => "KUALA LUMPUR",
                "country" => "Malaysia",
                "postalCode" => "50000",
                "state" => "WILAYAH PERSEKUTUAN-KUALA LUMPUR",
                "stateCode" => "KUL"
            ),
            'orderDetail'=>array(
                "planName"=> "YES Postpaid FT5G RM99",
                "planType"=> "POSTPAID",
                "productBundleId"=> "770",
                "referralCode"=> ""
            ),
            "locale"=> "en",
            "source"=> "Elevate",
            "requestId"=> self::yos_order_request_id,
            "sessionId"=> $token
        );

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params
        ];
        $request = wp_remote_get($api_url, $args);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = 'Sorry, '.@$request['response'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);
            $return['status'] = 1;
            $return['data'] = $data;
        }

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }
	 

    public function get_token()
    {
        $token = self::generate_auth_token();
        return $token;
        /*
        $tokenOption = get_option('elevate_auth_token');
        if (!$tokenOption) {
            $token = self::generate_auth_token();
        } else {
            $tokenArray = unserialize($tokenOption);
            if (strtotime("+5 minutes", strtotime($tokenArray['requestDate'])) < strtotime("now")) {
                $token = self::generate_auth_token();
            } else {
                $token = $tokenArray['basicAuthToken']->access_token;
                if (!$token) {
                    $token = self::generate_auth_token();
                }
            }

        }
        return $token;*/
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
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT
        ];


        $api_url = $apiSetting['url'] . self::auth_path_auth;

        $request = wp_remote_post($api_url, $args);

        if (is_wp_error($request)) {
            $return = false;
        } else if ($request['response']['code'] != 200) {
            $return = false;
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
            if (strtotime("+5 minutes", strtotime($tokenArray['requestDate'])) < strtotime("now")) {
                $token = self::mobileservice_generate_auth_token();
            } else {
                $token = $tokenArray['basicAuthToken']->basicAuthToken;
                if (!$token) {
                    $token = self::mobileservice_generate_auth_token();
                }
            }

        }
        return $token;
    }

    private function mobileservice_generate_auth_token()
    {
        $return = false;

        $apiSetting = get_option("ytlpd_settings");
        $domain_url = $apiSetting['ytlpd_api_domain_url'];
        $request_id = $apiSetting['ytlpd_api_request_id'];
        $authorization_key = $apiSetting['ytlpd_api_authorization_key'];

        $params = ['requestId' => $request_id, 'locale' => 60];
        $args = [
            'headers' => array('Content-Type' => 'application/json; charset=utf-8', 'Authorization' => 'BASIC ' . $authorization_key),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];
        $api_url = self::mobile_api_url . self::mobile_auth_path_auth;

        $request = wp_remote_post($api_url, $args);

        $response = $request['response'];
        $res_code = $response['code'];
        if (is_wp_error($request)) {
            $return = false;
        } else if ($res_code != 200) {
            $return = false;
        } else {
            $data = json_decode($request['body']);
            if (!empty($data->basicAuthToken)) {
                update_option('mobileservice_auth_token', serialize(['basicAuthToken' => $data, 'requestDate' => date("Y-m-d H:i:s")]), false);
            }
            $return = $data->basicAuthToken;
        }
        return $return;
    }

    public function ydbp_identity_auth_token()
    {
        $return = false;

        $args = [
            'headers' => array('Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'Basic ' . base64_encode( self::yos_order_username.':'.self::yos_order_password )),
            'timeout' => self::API_TIMEOUT
        ];
        $api_url = site_url().self::yos_order_token;;

        $request = wp_remote_get($api_url, $args);


        $response = $request['response'];
        $res_code = $response['code'];
        if (is_wp_error($request)) {
            $return = false;
        } else if ($res_code != 200) {
            $return = false;
        } else {
            $data = json_decode($request['body']);
            $return = $data->token;
        }
        return $return;
    }

    public static function pullProducts()
    {
        $params = array();
        $token = self::get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
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
            $data = json_decode($request['body'], true);
            $return = $data;
        }
        return $return;
    }

    public static function getDOB($nric)
    {
        //get  the dob from NRIC
        $dateString = substr($nric, 0, 6); //first 6 digits for nric

        $year = substr($dateString, 0, 2); //year
        $month = substr($dateString, 2, 2); //month
        $date = substr($dateString, 4, 2); //date

        if ($year > 20) {
            $year = "19" . $year;
        } else {
            $year = "20" . $year;
        }

        //$dob = $date . "/" . $month . "/" . $year;
        $dob = $year . '-' . $month . '-' . $date;
        return $dob;
    }

    public static function getGender($nric)
    {
        $genderDigit = substr($nric, 11, 1);

        if ($genderDigit % 2 == 0) //even
        {
            $gender = 0;// male
        } else //odd
        {
            $gender = 1;//female
        }
        return $gender;
    }

}