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

   // const  api_url = 'https://ydbp-api-dev.azurewebsites.net/';

	const  auth_path_auth = 'connect/token';

    const  api_customer_create = 'api/Elevate/customer';
    const  api_customer_get_by_guid = 'api/Elevate/customer';
    const  api_customer_get_by_nric = 'api/Elevate/customer/securityNumber';
    const  api_customer = 'api/Elevate/customer';
    const  api_customer_pre_complete = '/api/Elevate/customer/GetAllCustmerDetailsByID';
    const  api_customer_check_contract = 'api/Elevate/customer/CheckActiveContract';
    const  api_customer_check_ddmf = 'api/app/d-dMFCheck/verification';
    const  api_ca_verification = 'api/Elevate/compAsia/Verification';

    const  api_order_create = 'api/Elevate/order';
    const  api_order_get_by_id = 'api/Elevate/order/Id';
    const  api_order_get_by_number = 'api/Elevate/order/orderNumber';
    const  api_order_yos_order = 'api/Elevate/createYOSOrder';
    const  api_order_update_payment = 'api/Elevate/order/UpdateOrderPayment';
    const api_oc_verification='/api/app/orix-check/verification';
    const  api_contract = 'api/Elevate/contract';
    const  api_contract_get_by_id = 'api/Elevate/contract/Id';
    const  api_contract_get_by_nric = 'api/Elevate/contract/customerNRIC';

    const  api_product = 'api/Elevate/product';
    const  api_product_all = 'api/Elevate/product/GetAllProducts';
    const  api_product_get_by_id = 'api/Elevate/product/Id';
    const  api_product_get_by_nric = 'api/Elevate/product/productId';
    const  api_product_bundle = 'api/Elevate/product/GetProductsByProductBundleId';
    const  api_product_bundle_by_code = 'api/Elevate/product/GetProductBundleByCode';

    const api_caeligibility = 'api/Elevate/compAsia/Eligibility';

    const  mobile_auth_path_auth = 'mobileyos/mobile/ws/v1/json/auth/getBasicAuth';
    const mobile_api_verify_eligbility = 'mobileyos/mobile/ws/v1/json/verifyEligibility';

    const  ekyc_api_check = 'api/EKYCProcessStatus/';

    const yos_order_token = '/wp-json/ywos/v1/get-auth-token';
    const yos_order_username = 'ytldd';
    const yos_order_password = 'ytldd123$';
    const yos_order = '/mobileyos/mobile/ws/v1/json/createYOSOrderAndPaymentWithAddonAndReloads';
    const yos_order_esim = '/mobileyos/mobile/ws/v1/json/createEsimOrderAndPaymentWithAddonAndReloads';
    const yos_order_without_payment = '/mobileyos/mobile/ws/v1/json/createeKYCOrder';
    const yos_check_order_status = '/mobileyos/mobile/ws/v1/json/orderPaymentStatus';

	const api_prequalifiedcustomer='api/Elevate/Prequalifiedcustomer';

    public function __construct()
    {
        $model= new \Inc\Base\Model();
        $apiSetting = $model->getAPISettings();

    }


    public  function register()
    {
        add_action('rest_api_init', function () {
            register_rest_route('/elevate/v1', '/test', array(
                'methods' => 'GET',
                'callback' => array('\Inc\Api\ElevateApi', 'do_test'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/getProduct', array(
                'methods' => 'GET',
                'callback' => array($this, 'getProduct'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/getProductByCode', array(
                'methods' => 'GET',
                'callback' => array($this, 'getProductByCode'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/customer', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_customer_insert'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', 'customer/update', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_customer_update'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/verify-eligibility', array(
                'methods' => 'POST',
                'callback' => array($this, 'verify_eligibility'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/ca-verification', array(
                'methods' => 'POST',
                'callback' => array($this, 'ca_verification'),
                'permission_callback' => '__return_true'
            ));
            register_rest_route('/elevate/v1', '/orix-check', array(
                'methods' => 'POST',
                'callback' => array($this, 'oc_verification'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/verify-caeligibility', array(
                'methods' => 'POST',
                'callback' => array($this, 'verify_caeligibility'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', '/check-active-contract', array(
                'methods' => 'POST',
                'callback' => array($this, 'yt_check_active_contract'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/ekyc-init', array(
                'methods' => 'POST',
                'callback' => array('\Inc\Api\ElevateApi', 'ekyc_init'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/ekyc-check', array(
                'methods' => 'POST',
                'callback' => array($this, 'ekyc_check'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', 'contract', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_contract'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', 'order/create', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_order_create'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', 'order/update', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_order_update'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', 'order/cancel', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_order_cancel'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'order/updatePayment', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_order_update_payment'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'qrcode/check', array(
                'methods' => 'GET',
                'callback' => array($this, 'elevate_delivery_qrcode_check'),
                'permission_callback' => '__return_true'
            ));
            register_rest_route('/elevate/v1', '/verify-ddmf', array(
                'methods' => 'POST',
                'callback' => array($this, 'ddmf_eligibility'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'qrcode/confirm', array(
                'methods' => 'POST',
                'callback' => array($this, 'elevate_delivery_qrcode_confirm'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'getPreRegisterUser', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_pre_register_user'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'getPreRegisterCompleted', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_pre_register_completed'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', 'create-yos-order', array(
                'methods' => 'POST',
                'callback' => array($this, 'make_yos_order'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'create-yos-free-order', array(
                'methods' => 'POST',
                'callback' => array($this, 'make_yos_order_without_payment'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'check-yos-order-status', array(
                'methods' => 'POST',
                'callback' => array($this, 'yos_check_order_status'),
                'permission_callback' => '__return_true'
            ));

			register_rest_route('/elevate/v1', 'del-prequalified-customer', array(
                'methods' => 'POST',
                'callback' => array($this, 'delete_prequalified_customer'),
                'permission_callback' => '__return_true'
            ));

            register_rest_route('/elevate/v1', '/check-stock', array(
                'methods' => 'GET',
                'callback' => array($this, 'check_stock'),
                'permission_callback' => '__return_true'
            ));


        });
    }


    public  function getProduct(WP_REST_Request $request)
    {
           
        // if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
		// 	exit("Request not valid");
		// }  
        $code = $request['code'];
        $product = (new \Inc\Base\Model)->refinde($this->pullBundleProduct($code));

        $response = new WP_REST_Response($product);
        $response->set_status(200);
        return $response;
    }

    private  function pullBundleProduct($code){
        $params = array(
            'productBundleId'=>$code
        );
        $token = $this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params,
            'method' => 'GET'
        ];
		$apiSetting = (new \Inc\Base\Model)->getAPISettings();

        $api_url = $apiSetting['url'] . self::api_product_bundle;
        $request = wp_remote_get($api_url, $args);

		//print_r($request);die($api_url);

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

    public  function getProductByCode(WP_REST_Request $request)
    {
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $code = $request['code'];
		$product = $this->pullBundleProductByCode($code);
        $product = (new \Inc\Base\Model)->refinde(array($product));

        $response = new WP_REST_Response($product);
        $response->set_status(200);
        return $response;
    }

    private  function pullBundleProductByCode($code){
        $params = array(
            'productCode'=>$code
        );
        $token =$this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params,
            'method' => 'GET'
        ];
        $apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_product_bundle_by_code;

        $request = wp_remote_get($api_url, $args);

        //print_r($request);die($api_url);

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
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
        return $return;
    }

    public  function verify_eligibility(WP_REST_Request $request)
    {
       
        // if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
		// 	exit("Request not valid");
		//  }  

        $token = $this->mobileservice_generate_auth_token();
        $mykad = $request['mykad'];
        $planType = $request['plan_type'];
        $bundleId = $request['bundleId'];

        $apiSetting = get_option("ytlpd_settings");
        $request_id = $apiSetting['ytlpd_api_request_id'];
        $params = array(
            'planType' => $planType,
            'bundleId' => $bundleId,
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

		$serverSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $serverSetting['mobile_url'] .'mobileyos/mobile/ws/v1/json/verifyEligibility';
        $return['url'] = $api_url;
        $request = wp_remote_post($api_url, $args);
		 //print_r($args);print_r($request);die($api_url);

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
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function ca_verification(WP_REST_Request $request)
    {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $mykad = $request['mykad'];
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $guid = $request['guid'];

        $PartneReferenceID = $request['PartneReferenceID'];
        $OCRConfidenceScore = round($request['OCRConfidenceScore']/100,2);

        $token = $this->get_token();

		$params = array(
            'myKadNumber' => $mykad,
            'fullName' => $name,
            'mobileNumber' => $phone,
            'email' => $email,
            'ocrConfidenceScore' => $OCRConfidenceScore."",
            'partnerReferenceID' => $PartneReferenceID,
        );

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
		$apiSetting =(new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_ca_verification;

        $request = wp_remote_post($api_url, $args);

		 //print_r($args);print_r($request);die($api_url);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $data = json_decode($request['body'], true);

            if ($data['response']) {
				$res = json_decode($data['response']);

				if($res->result == 'Success'){
					$return['status'] = 1;
				}else{
					$return['status'] = 0;
					$return['error'] = $res->reason;
				}
            } else {
                $return['status'] = 0;
            }
            $return['data'] = $data;
        }
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function oc_verification(WP_REST_Request $request)
    {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $mykad = $request['mykad'];
        $name = $request['name'];
        // $email = $request['email'];
        // $phone = $request['phone'];
        // $guid = $request['guid'];

        // $PartneReferenceID = $request['PartneReferenceID'];
        $OCRConfidenceScore = round($request['OCRConfidenceScore']/100,2);
        $token = $this->get_token();

		$params = array(
            'securityId' => $mykad,
            'fullName' => $name,
			'ocrConfidenceScore' => $OCRConfidenceScore."",
            'requestingSystem'=>'YOS',
            // 'mobileNumber' => $phone,
            // 'email' => $email,
            
            // 'partnerReferenceID' => $PartneReferenceID,
        );

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
		$apiSetting =(new \Inc\Base\Model)->getAPISettings();
        $api_url =$apiSetting['creditcheck_url'] . self::api_oc_verification;

        $request = wp_remote_post($api_url, $args);
		 //print_r($args);print_r($request);die($api_url);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $data = json_decode($request['body'], true);

            if ($data['response']) {
				$res = json_decode($data['response']);

				if($res->result == 'Success'){
					$return['status'] = 1;
				}else{
					$return['status'] = 0;
					$return['error'] = $res->reason;
				}
            } else {
                $return['status'] = 0;
            }
            $return['data'] = $data;
        }
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function ddmf_eligibility(WP_REST_Request $request)
    {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $token = $this->get_token();

		$params = array(
            'SecurityId' =>$request['mykad'],
            'fullName' => $request['name'],
        );

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
		$apiSetting = ( new \Inc\Base\Model)->getAPISettings();
        $api_url =$apiSetting['creditcheck_url'] .self::api_customer_check_ddmf;
        $request = wp_remote_post($api_url, $args);
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
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }
	

    public  function verify_caeligibility(WP_REST_Request $request)
    {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $token = $this->get_token();

		$params = array(
            'myKadNumber' =>$request['mykad'],
            'fullName' => $request['name'],
            'mobileNumber' => $request['phone'],
            'email' => $request['email'],
        );

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
		$apiSetting = ( new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] .self::api_caeligibility;

        $request = wp_remote_post($api_url, $args);
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
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function check_active_contract(WP_REST_Request $request)
    {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
		$mykad = $request['mykad'];

        $token = $this->get_token();

		$params = array(
        );

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'GET',
            'timeout' => self::API_TIMEOUT
        ];
		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_customer_check_contract.'?customerNRIC='.$mykad;
        $request = wp_remote_get($api_url, $args);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $return['status'] = 0;
            $return['error'] = @$request['response'];
        } else {
            $data = $request['body'];

            if ($data=='false') {
                $return['status'] = 1;
            } else {
                $return['status'] = 0;
				$return['error'] = 'User cannot buy more contract.';
            }
            $return['data'] = $data;
        }
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function elevate_customer_get($mykad)
    {
        $params = array(
            'securityNumber' => $mykad
        );
        $token = $this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params
        ];
		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_customer;
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
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
        return $return;
    }

    public  function elevate_customer_insert(WP_REST_Request $request)
    {
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
		if(!isset($request['referralCode'])) $request['referralCode'] = '';
		if(!isset($request['dealerUID'])) $request['dealerUID'] = '';
		if(!isset($request['dealerCode'])) $request['dealerCode'] = '';
		if(!isset($request['registrationChannel'])) $request['registrationChannel'] = 'WEB';

        $cardtype = ($request['cardtype'])?$request['cardtype']:1;
        $mykad = $request['mykad'];
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $productId = $request['productId'];

        $params = array(
            "customerID" => "",
            "securityType" => $cardtype,
            "securityNumber" => $mykad,
            "fullName" => $name,
            "gender" => $this->getGender($mykad),
            "dob" => $this->getDOB($mykad),
            "addressLine1" => isset($request['address'])?$request['address']:"",
            "addressLine2" => "",
            "state" => isset($request['state'])?$request['state']:"",
            "city" => isset($request['city'])?$request['city']:"",
            "postCode" => isset($request['postcode'])?$request['postcode']:"",
            "country" => "Malaysia",
            "mobileNumber" => $phone,
            "email" => $email,
            "msisdn" => "",
            "agreedTerms" => true,
            "referralCode"=> $request['referralCode'],
            "dealerUID"=> $request['dealerUID'],
            "dealerCode"=> $request['dealerCode'],
            "registrationChannel" => $request['registrationChannel'],
            "registrationDate" => date("c"),
            "productSelected" => $productId,
            "orderNumber" => "",
            "verificationStatus" => true,
            "verificationCode" => "",
            "verificationDate" => date("c"),
            "emailSent" => true
        );

        $token = $this->get_token();

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
		//echo json_encode($params);die();
		$apiSetting = ( new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_customer;

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
		
		//Write api log
		( new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function elevate_customer_update(WP_REST_Request $request)
    {
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  

		if(!isset($request['addressMore'])) $request['addressMore'] = '';
		if(!isset($request['msisdn'])) $request['msisdn'] = '';
		
		if(!isset($request['referralCode'])) $request['referralCode'] = '';
		if(!isset($request['dealerUID'])) $request['dealerUID'] = '';
		if(!isset($request['dealerCode'])) $request['dealerCode'] = '';
		if(!isset($request['registrationChannel'])) $request['registrationChannel'] = 'WEB';

        $id = $request['uid'];

        $params = array(
            "customerID" => "",
            "securityType" => 0,
            "securityNumber" => $request['mykad'],
            "fullName" => $request['name'],
            "gender" => $this->getGender($request['mykad']),
            "dob" => $this->getDOB($request['mykad']),
            "addressLine1" => $request['addressMore'],
            "addressLine2" => $request['address'],
            "state" => $request['state'],
            "city" => $request['city'],
            "postCode" => $request['postcode'],
            "country" => "Malaysia",
            "mobileNumber" => $request['phone'],
            "email" => $request['email'],
            "msisdn" => $request['msisdn'],
            "agreedTerms" => true,
            "agreedDataCollection" => true,
            "referralCode"=> $request['referralCode'],
            "dealerUID"=> $request['dealerUID'],
            "dealerCode"=> $request['dealerCode'],
            "registrationChannel" => $request['registrationChannel'],
            "registrationDate" => date("c"),
            "productSelected" => $request['productId'],
            "orderNumber" => "",
            "verificationStatus" => true,
            "verificationCode" => "",
            "verificationDate" => date("c"),
            "emailSent" => true,
            "lastModificationTime" => date("c")
        );
        $token = $this->get_token();

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
		$apiSetting = ( new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_customer . '?id=' . $id;

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
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

	public  function elevate_customer_get_by_uid($uid)
    {


        $params = array(
        );
        $token = $this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
        ];
		$apiSetting = ( new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_customer_get_by_guid . '/' . $uid;

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
		
		//Write api log
		( new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        return $return;
    }

    public  function elevate_contract(WP_REST_Request $request)
    {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
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
            "campaignID" => "",
            "alternateContactName" => $request['alternative_name'],
            "alternateContactNumber" => $request['alternative_phone']
        );

        $token = $this->get_token();

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


		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] .self::api_contract;

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
		
		//Write api log
		( new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function elevate_order_create(WP_REST_Request $request)
    {

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  

		if(!isset($request['referralCode'])) $request['referralCode'] = '';
		if(!isset($request['dealerUID'])) $request['dealerUID'] = '';
		if(!isset($request['dealerCode'])) $request['dealerCode'] = '';

        $params = array(
            "orderNumber"=> "",
            "customerGUID"=> $request['id'],
            "orderStatus"=> "New",
            "error"=> "",
            "deliveryStatus"=> "Processing Order",
            "deliveryDate"=> date("c"),
            "podurl"=> "",
            "comments"=> "",
            "referralCode"=> $request['referralCode'],
            "dealerUID"=> $request['dealerUID'],
            "dealerCode"=> $request['dealerCode'],
            "productSelected"=> $request['productSelected']
        );

        $token = $this->get_token();

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
		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_order_create;

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
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

	public  function elevate_order_get_by_number($orderNumber)
    {

        $params = array(
        );

        $token = $this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'timeout' => self::API_TIMEOUT
        ];
		$apiSetting = \Inc\Base\Model::getAPISettings();
        $api_url = $apiSetting['url'] . self::api_order_get_by_number.'?orderNumber='.$orderNumber ;

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
		
		//Write api log
		\Inc\Base\Model::apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

       return $return;
    }

    public  function elevate_order_update(WP_REST_Request $request)
    {
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
		if(!($request['referralCode'])) $request['referralCode'] = '';
		if(!($request['dealerUID'])) $request['dealerUID'] = '';
		if(!($request['dealerCode'])) $request['dealerCode'] = '';
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

        $token = $this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'PUT',
            'timeout' => $this->API_TIMEOUT,
            'data_format' => 'body'
        ];

		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_order_create.'?id='.$request['id'];

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
		
		//Write api log
		( new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function elevate_order_cancel(WP_REST_Request $request)
    {

		if(!isset($request['referralCode'])) $request['referralCode'] = '';
		if(!isset($request['dealerUID'])) $request['dealerUID'] = '';
		if(!isset($request['dealerCode'])) $request['dealerCode'] = '';

        $params = array(
            "orderNumber"=> $request['orderNumber'],
            "customerGUID"=> $request['customerGUID'],
            "orderStatus"=> "Failed",
            "error"=> $request['error'],
            "deliveryStatus"=> "Cancelled",
            "deliveryDate"=> $request['deliveryDate'],
            "podurl"=> "",
            "comments"=> "",
			"referralCode"=> $request['referralCode'],
            "dealerUID"=> $request['dealerUID'],
            "dealerCode"=> $request['dealerCode'],
			"productSelected"=> $request['productSelected'],
            "customerQRCodeScanned"=> false
        );

        $token = $this->get_token();

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
		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_order_create.'?id='.$request['id'];

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
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

	public  function elevate_order_update_payment(WP_REST_Request $request)
    {
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  

		if(!isset($request['orderNumber'])) $request['orderNumber'] = '';
		if(!isset($request['paymentRef'])) $request['paymentRef'] = '';
		if(!isset($request['status'])) $request['status'] = 0;

        $params = array(
            "orderNumber"=> $request['orderNumber'],
            "paymentRef"=> $request['paymentRef'],
            "status"=> $request['status'] //if APPROVED  then 2, COMPLETED 3, FAILED -1
        );

        $token = $this->get_token();

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
		$apiSetting =(new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_order_update_payment;

        $request = wp_remote_request($api_url, $args);
        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $return['error'] = @$request['response'];
            $return['params'] = $params;
            $return['token'] = $token;
        } else {
            $code = $request['response']['code'];
            $return['status'] = 1;
            $return['data'] = $request['body'];
        }
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

	public function elevate_delivery_qrcode_check(WP_REST_Request $request){
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
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
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
		$response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
	}

	public function elevate_delivery_qrcode_confirm(WP_REST_Request $request){

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
		$orderNumber = $request['SONO'];

		$order = $this->elevate_order_get_by_number($orderNumber);

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

				$token = $this->get_token();

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
				$apiSetting = (new \Inc\Base\Model)->getAPISettings();
				$api_url = $apiSetting['url'] . self::api_order_create.'?id='.$order['data']['id'];

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
		
		//Write api log
		( new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

		$response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
	}

    public  function ekyc_check(WP_REST_Request $request)
    {
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $uid = $request['uid'];
		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url =  $apiSetting['url'].'api/EKYCProcessStatus/' . $uid;
        $params = array();

        $token = $this->get_token();

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
		 
		
		if($request['response']['code'] != 204){
		//Write api log
		( new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		}
        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;

    }

	public  function get_pre_register_user(WP_REST_Request $request){
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $uid = $request['id'];
        $token = $this->get_token();
        $params = array();
        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params,
            'method' => 'GET'
        ];

		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . '/api/Elevate/Prequalifiedcustomer/'.$uid;
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
		
		//Write api log
		( new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
//        print_r($data);die();
        return $return;
    }

	public  function get_pre_register_completed(WP_REST_Request $request){
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $uid = $request['id'];
		  
		$token = $this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params,
            'method' => 'GET'
        ];

		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_customer_pre_complete.'/'.$uid;
		
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
        //print_r($data);die();
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
        $response = new WP_REST_Response($return[0]);
        $response->set_status(200);
        return $response;
    }

    public  function make_yos_order(WP_REST_Request $request){
        //$token = self::ydbp_identity_auth_token();

        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $token = $this->mobileservice_get_token();

        $phone_number 	= $request['phone_number'];
        $customer_name	= $request['customer_name'];
        $email 			= $request['email'];
        $login_yes_id 	= $request['login_yes_id'];
        $security_type	= $request['security_type'];
        $security_id 	= $request['security_id'];
        $school_name 	= $request['school_name'];
        $school_code 	= $request['school_code'];
        $university_name= $request['university_name'];
        $dealer_code 	= $request['dealer_code'];
        $dealer_login_id= $request['dealer_login_id'];

        $plan_name 		= $request['plan_name'];
        $plan_type 		= $request['plan_type'];
        $product_bundle_id = $request['product_bundle_id'];
        $referral_code 	= $request['referral_code'];
        $addon_name 	= $request['addon_name'];

        $address_line 	= $request['address_line'];
        $city			= $request['city'];
        $city_code 		= $request['city_code'];
        $postal_code 	= $request['postal_code'];
        $state 			= $request['state'];
        $state_code 	= $request['state_code'];
        $country 		= $request['country'];

        $payment_method	= $request['payment_method'];
        $process_name 	= $request['process_name'];
        $amount 		= $request['amount'];
        $amount_sst 	= $request['amount_sst'];
        $total_amount 	= $request['total_amount'];
        $bank_code 		= $request['bank_code'];
        $bank_name 		= $request['bank_name'];
        $card_number 	= $request['card_number'];
        $card_type 		= $request['card_type'];
        $name_on_card 	= $request['name_on_card'];
        $card_cvv 		= $request['card_cvv'];
        $card_expiry_month 	= $request['card_expiry_month'];
        $card_expiry_year 	= $request['card_expiry_year'];
        $ippType 		= $request['ippType'];
        $simType 		=  $request['esim'];
        $applicationSource = $request['MYOS'];

        $conversion = ($request['conversion'])?$request['conversion']:"";
        $existingMsisdn= ($request['existingMsisdn'])?$request['existingMsisdn']:"";
        $existingPlanName= ($request['existingPlanName'])?$request['existingPlanName']:"";
        $existingPlanType= ($request['existingPlanType'])?$request['existingPlanType']:"";

        $ytlpd_options = get_option("ytlpd_settings");
        $ytlpd_api_domain_url =  $ytlpd_options['ytlpd_api_domain_url'];
        $ytlpd_api_request_id =  $ytlpd_options['ytlpd_api_request_id'];


        if($simType =='true'){
            $api_url =  $ytlpd_api_domain_url.self::yos_order_esim;
        }else if($simType ==''){
             $api_url =  $ytlpd_api_domain_url.self::yos_order;
        }else{
             $api_url =  $ytlpd_api_domain_url.self::yos_order;
        }

        $params 	= [
            'eKYCCustomerDetail' 	=> [
                'alternatePhoneNumber' 	=> $phone_number,
                'customerFullName' 		=> $customer_name,
                'email' 				=> $email,
                'loginYesId' 			=> $login_yes_id,
                'planName' 				=> $plan_name,
                'planType' 				=> $plan_type,
                'securityType' 			=> $security_type,
                'securityId' 			=> $security_id,
                'schoolName' 			=> $school_name,
                'schoolCode' 			=> $school_code,
                'universityName' 		=> $university_name,
                'dealerCode' 			=> $dealer_code,
                'dealerLoginId' 		=> $dealer_login_id,
                'supportingDocUniqueId'	=> 1
            ],

            'orderDetail' 			=> [
                'planName' 			=> $plan_name,
                'planType' 			=> $plan_type,
                'productBundleId' 	=> $product_bundle_id,
                'referralCode' 		=> $referral_code,
                'addonName' 		=> $addon_name,
                "conversion"=> $conversion,
                "existingMsisdn"=> $existingMsisdn,
                "existingPlanName"=> $existingPlanName,
                "existingPlanType"=> $existingPlanType,
                'esim'              =>$simType,
                'applicationSource' => $applicationSource,
            ],

            'deliveryAddress' 		=> [
                'addressLine' 		=> $address_line,
                'city' 				=> $city,
                'cityCode' 			=> $city_code,
                'postalCode' 		=> $postal_code,
                'state' 			=> $state,
                'stateCode' 		=> $state_code,
                'country' 			=> $country
            ],

            'paymentInfo' 			=> [
                'paymentMethod' 	=> $payment_method,
                'processName' 		=> $process_name,
                'amount' 			=> number_format($amount, 2, '.', ''),
                'sst' 				=> number_format($amount_sst, 2, '.', ''),
                'totalAmount' 		=> number_format($total_amount, 2, '.', ''),
                'bankCode' 			=> $bank_code,
                'bankName' 			=> $bank_name,
                'cardNumber' 		=> $card_number,
                'cardType' 			=> $card_type,
                'nameOnCard' 		=> $name_on_card,
                'cardCVV' 			=> $card_cvv,
                'cardExpiryMonth' 	=> $card_expiry_month,
                'cardExpiryYear' 	=> $card_expiry_year,
                'ippType' 			=> $ippType,
                'isAutoSubscribe' 	=> false,
                'isSavedCard' 		=> false
            ],

            'appVersion' 			=> '1.0',
            'locale' 				=> 'en',
            'source' 				=> 'Elevate',
            'requestId' 			=> $ytlpd_api_request_id,
            'sessionId' 			=> $token
        ];

        $args = [
            'headers' => array(
                //'Accept' => 'text/plain',
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];
        //print_r($args); die($api_url);
        $request = wp_remote_post($api_url, $args);
        //echo '<pre>';
        //echo json_encode($params);
        //print_r($args); die($api_url);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
            $error = json_decode($request['body'],true);
            $return['error'] = $error['errorDescription'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);

            if($data['responseCode'] == -1){
                $return['status'] = 0;
                $return['error'] = $data['responseMessage'];
            }else{
                $return['status'] = 1;
                $return['data'] = $data;
            }

        }
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

    public  function make_yos_order_without_payment(WP_REST_Request $request){
     
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
        $token = $this->mobileservice_get_token();
		$phone_number = $request['phone_number'];
		$customer_name = $request['customer_name'];
		$dob = $request['dob'];
		$gender = $request['gender'];
		$email = $request['email'];
		$login_yes_id = $request['login_yes_id'];
		$security_id = $request['security_id'];
		$security_type = $request['security_type'];
		$dealer_code = $request['dealer_code'];
		$dealer_login_id = $request['dealer_login_id'];
		$referral_code = $request['referral_code'];
		$plan_name = $request['plan_name'];
		$plan_type = $request['plan_type'];
		$product_bundle_id = $request['product_bundle_id'];
		$address_line = $request['address_line'];
		$city = $request['city'];
		$city_code = $request['city_code'];
		$postal_code = $request['postal_code'];
		$state = $request['state'];
		$state_code = $request['state_code'];
		$country = $request['country'];

        $conversion = ($request['conversion'])?$request['conversion']:"";
        $existingMsisdn= ($request['existingMsisdn'])?$request['existingMsisdn']:"";
        $existingPlanName= ($request['existingPlanName'])?$request['existingPlanName']:"";
        $existingPlanType= ($request['existingPlanType'])?$request['existingPlanType']:"";

        $ytlpd_options = get_option("ytlpd_settings");
		$ytlpd_api_domain_url =  $ytlpd_options['ytlpd_api_domain_url'];
		$ytlpd_api_request_id =  $ytlpd_options['ytlpd_api_request_id'];

		$api_url =  $ytlpd_api_domain_url.self::yos_order_without_payment;
		$params = array(
            'eKYCCustomerDetail'=>array(
                "alternatePhoneNumber" =>$phone_number ,
                "customerFullName" => $customer_name,
                "email" => $email,
                "loginYesId" => $login_yes_id,
                "planName" => $plan_name,
                "planType" => $plan_type,
                "securityId" => $security_id,
                "securityType" => $security_type,
                "dealerCode" => $dealer_code,
                "dealerLoginId" => $dealer_login_id
            ),
            'deliveryAddress'=>array(
                "addressLine" => $address_line,
                "city" => $city,
                "cityCode" => $city_code,
                "country" => $country,
                "postalCode" => $postal_code,
                "state" => $state,
                "stateCode" => $state_code
            ),
            'orderDetail'=>array(
                "planName"=> $plan_name,
                "planType"=> $plan_type,
                "productBundleId"=> $product_bundle_id,
                "referralCode"=> $referral_code,
                "conversion"=> $conversion,
                "existingMsisdn"=> $existingMsisdn,
                "existingPlanName"=> $existingPlanName,
                "existingPlanType"=> $existingPlanType,
            ),
            "appVersion"=> "1.0",
            "locale"=> "en",
            "source"=> "Elevate",
            "requestId"=> $ytlpd_api_request_id,
            "sessionId"=> $token
        );

        $args = [
            'headers' => array(
                //'Accept' => 'text/plain',
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($params),
            'method' => 'POST',
            'timeout' => self::API_TIMEOUT,
            'data_format' => 'body'
        ];
		//print_r($args);print_r($request); die($api_url);
        $request = wp_remote_post($api_url, $args);
		//echo '<pre>';
		//echo json_encode($params);
		//print_r($args);print_r($request); die($api_url);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
			$error = json_decode($request['body'],true);
            $return['error'] = $error['errorDescription'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);

			if($data['responseCode'] == -1){
				$return['status'] = 0;
				$return['error'] = $data['responseMessage'];
			}else{
				$return['status'] = 1;
				$return['data'] = $data;
			}

        }
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }
	
	public  function yos_check_order_status(WP_REST_Request $request){ 
       
        $token = $this->mobileservice_get_token();
		$session_key  = $request['session_key'];
		 
        $ytlpd_options = get_option("ytlpd_settings");
		$ytlpd_api_domain_url =  $ytlpd_options['ytlpd_api_domain_url'];
		$ytlpd_api_request_id =  $ytlpd_options['ytlpd_api_request_id'];

		$api_url =  $ytlpd_api_domain_url.self::yos_order_without_payment;
		$params = array(
            "orderNumber"=>$request['yos_order_id'],
            "locale"=> "en", 
            "requestId"=> $ytlpd_api_request_id,
            "sessionId"=> $token
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
		//print_r($args);print_r($request); die($api_url);
        $request = wp_remote_post($api_url, $args);
		//echo '<pre>';
		//echo json_encode($params);
		//print_r($args);print_r($request); die($api_url);

        if (is_wp_error($request)) {
            $return['status'] = 0;
            $return['error'] = "Cannot connect to API server";
        } else if ($request['response']['code'] != 200) {
            $code = $request['response']['code'];
            $return['status'] = 0;
			$error = json_decode($request['body'],true);
            $return['error'] = $error['errorDescription'];
        } else {
            $code = $request['response']['code'];
            $data = json_decode($request['body'], true);

			if($data['responseCode'] == -1){
				$return['status'] = 0;
				$return['error'] = $data['responseMessage'];
			}else{
				$return['status'] = 1;
				$return['data'] = $data;
			}

        }
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        $response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
    }

	public  function delete_prequalified_customer(WP_REST_Request $request){
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "yes_nonce_key")) {
			exit("Request not valid");
		 }  
				$id = $request['id'];
				if($id){
					$params = array(
					);

					$token = $this->get_token();

					$args = [
						'headers' => array(
							//'Accept' => 'text/plain',
							'Authorization' => 'Bearer ' . $token,
							'Content-Type' => 'application/json'
						),
						'body' => $params,
						'method' => 'DELETE',
						'timeout' => self::API_TIMEOUT
					];
					$apiSetting = (new \Inc\Base\Model)->getAPISettings();
					$api_url = $apiSetting['url'] . self::api_prequalifiedcustomer.'?id='.$id;

					$request = wp_remote_request($api_url, $args);
					//print_r($args);print_r($request);die($api_url);
					if (is_wp_error($request)) {
						$return['status'] = 0;
						$return['error'] = "Cannot connect to API server";
					} else if ($request['response']['code'] != 200) {
						if($request['response']['code'] == 204){
							$data = json_decode($request['body'], true);
							$return['status'] = 1;
							$return['data'] = $data;
						}else{
							$code = $request['response']['code'];
							$return['status'] = 0;
							$return['error'] = @$request['response'];
						}

					} else {
						$code = $request['response']['code'];
						$data = json_decode($request['body'], true);
						$return['status'] = 1;
						$return['data'] = $data;
					}
				}else{
					$return['status'] = 0;
					$return['error'] = "Invalid request";
				}
				
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
		$response = new WP_REST_Response($return);
        $response->set_status(200);
        return $response;
	}


    public function get_token()
    {
        $token = $this->generate_auth_token();
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

        $apiSetting = (new \Inc\Base\Model)->getAPISettings();

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

        $api_url = $apiSetting['identity_url'] . self::auth_path_auth;

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
        $token = $this->mobileservice_generate_auth_token();
        return $token;
        /*$tokenOption = get_option('mobileservice_auth_token');

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
        return $token;*/
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
            'timeout' =>  (isset($this->API_TIMEOUT) ? $this->API_TIMEOUT : 120),
            'data_format' => 'body'
        ];

		$serverSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $serverSetting['mobile_url'] .'mobileyos/mobile/ws/v1/json/auth/getBasicAuth';

        $request = wp_remote_post($api_url, $args);

        if (is_wp_error($request)) {
            $return = false;
        } else {
            $response = $request['response'];
            $res_code = $response['code'];
            
            if ($res_code != 200) {
                $return = false;
            } else {
                $data = json_decode($request['body']);
                if (!empty($data->basicAuthToken)) {
                    update_option('mobileservice_auth_token', serialize(['basicAuthToken' => $data, 'requestDate' => date("Y-m-d H:i:s")]), false);
                }
                $return = $data->basicAuthToken;
            }
        }
        return $return;
    }

    public  function ydbp_identity_auth_token()
    {
        $return = false;

        $args = [
            'headers' => array(
						'Content-Type' => 'application/json; charset=utf-8',
						'Authorization' => 'Basic ' . base64_encode( self::yos_order_username.':'.self::yos_order_password )
						),
            'timeout' => self::API_TIMEOUT
        ];
        $api_url = site_url().self::yos_order_token;

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

    public  function pullProducts()
    {
        $params = array();
        $token = $this->get_token();

        $args = [
            'headers' => array(
                'Accept' => 'text/plain',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ),
            'body' => $params,
            'method' => 'GET'
        ];

		$apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] . self::api_product;

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
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));
		
        return $return;
    }

    public  function getDOB($nric)
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

    public  function getGender($nric)
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


//4Goutage details map
    public function snm_get_session()
    {        
       $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/tokenget";
       $params = [
          'method' => 'GET',
          'headers' => array(
           'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
            'UserLogin' => 'otoborest',
            'Password' => 'otobo_v1_345',
            'Content-Type' => 'application/json'
          )
       ];
       $token_list = wp_remote_request($url, $params);
       //print_r($token_list['body']);
       $json_res = json_decode($token_list['body']);
       $final_res = $json_res->SessionID;
       // return $json_res.message;  
       return $final_res;
    } 

    public function outage_details() 
    { 
    $session_id = snm_get_session();
    //print_r($_GET['Latitude']);              
    set_time_limit(1000);
    $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/4GOutageDetails";
    $body = array(
        'SessionID' => $session_id,
        'Latitude' => $_GET['Latitude'],
        'Langitude' => $_GET['Langitude'], 
        //'Severity' => "S3",    
      // 'Latitude' => '3.11523888888889',
     // 'Langitude' => '101.67936944444466',
    );
     $params = array(
        'method' => 'GET',
        'timeout' => 120,
        'body' => $body,   
        //'sslverify' => false,     
         'headers' => array(
         'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
         'Content-Type' => 'application/json',
        )
   );
     //print_r($params); echo $url; echo "<br /><br /><br />";
     $list = wp_remote_get($url, $params);
        return $list;
       //print_r($list);
    }  
    
//End 4Goutage details map    
    

    public function check_stock() 
    {
        
        $token  = $this->get_token();
        $args   = [
            'headers'   => [
                'Accept' => 'text/plan',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type'  => 'application/json'
            ],
            'body'      => [],
            'method'    => 'GET'
        ];
        $apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url    = $apiSetting['url'] . self::api_product_all . '?MaxResultCount=100';

        $request    = wp_remote_get($api_url, $args);
        $response   = $request['response'];
        $res_code   = $response['code'];

        $data 		= json_decode($request['body']);
		
		//Write api log
		(new \Inc\Base\Model)->apiLog(array('api'=>$api_url,'payload'=>json_encode($args),'response'=>$request['response'],'body'=>$request['body'],'status'=>$request['response']['code']));

        if ($res_code == 200) {
            $arr_return = [];
            foreach ($data as $item) {
                $existing_balance   = (isset($arr_return[$item->product->productBundleId]['balance'])) ? $arr_return[$item->product->productBundleId]['balance'] : 0;
                $arr_return[$item->product->productBundleId] = [
                    'productBundleId'   => $item->product->productBundleId,
                    'balance'           => $item->device->balance + $existing_balance
                ];
            }
            $response 	= new WP_REST_Response($arr_return);
            $response->set_status(200);
            return $response;
        }
        return false;
    }


    
    public function yt_check_active_contract(WP_REST_Request $request){

        $mykad = $request['mykad'];
        $apiSetting = (new \Inc\Base\Model)->getAPISettings();
        $api_url = $apiSetting['url'] .'api/Elevate/customer/CheckActiveContract'.'?customerNRIC='.$mykad;
        $token = $this->get_token();
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token,
            'Cookie: ARRAffinity=db7e7bf21bbdfb556bdf82b1fb67118b373ac34ca676a806883564f4d13394c1; ARRAffinitySameSite=db7e7bf21bbdfb556bdf82b1fb67118b373ac34ca676a806883564f4d13394c1'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        if(is_wp_error($response)){
            $ContractData="Cannot connect to API server";
        }else if($response != "true"){
            $ContractData=1;
        }else{
            $ContractData="User cannot buy more contract";
        }
        
        return $ContractData;

    }

}