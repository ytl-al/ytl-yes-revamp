<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/public
 * @author     YTL Digital Design [AL Latif Mohamad] <latif.mohamad@ytl.com>
 */
class Ytl_Pull_Data_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    						The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    							The current version of this plugin.
	 */
	private $version;

	/**
	 * The prefix for variables.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $prefix     							The prefix for variables or options to be used.
	 */
	private $prefix;

	/**
	 * The api timout.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      integer    $api_timeout 					The api timout.
	 */
	private $api_timeout;

	/**
	 * The api path to auth.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_app_version     				The version for API to be used.
	 */
	private $api_app_version;

	/**
	 * The api path to auth.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_locale          				The locale for API url to be used.
	 */
	private $api_locale;

	/**
	 * The api domain.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_domain      					The API's domain to be used for the API calls
	 */
	private $api_domain;

	/**
	 * The api request id
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_request_id						The API's request ID which to be used for the API calls
	 */
	private $api_request_id;

	/**
	 * The api authorization key
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_authorization_key				The API's authorization key which to be used for the API calls
	 */
	private $api_authorization_key;

	/**
	 * The api path to generate auth token.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_generate_auth_token      		The path to generate authentication token for service.
	 */
	private $path_generate_auth_token;

	/**
	 * The api path to get the add ons by plan.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_get_add_ons_by_plan  			The path to get the add ons by plan.
	 */
	private $path_get_add_ons_by_plan;

	/**
	 * The api path to generate otp for login.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_generate_otp_for_login  		The path to generate otp for login service.
	 */
	private $path_generate_otp_for_login;

	/**
	 * The api path to validate the login credentials.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_validate_login  				The path to validate the login service.
	 */
	private $path_validate_login;

	/**
	 * The api path to get all cities by state code.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_get_cities_by_state_code  		The path to get all cities by state code
	 */
	private $path_get_cities_by_state_code;

	/**
	 * The api path to generate otp for guest login.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_generate_otp_for_guest_login	The path to generate otp for guest login service.
	 */
	private $path_generate_otp_for_guest_login;

	/**
	 * The api path to validate the guest login credentials.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_validate_guest_login  			The path to validate the guest login service.
	 */
	private $path_validate_guest_login;

	/**
	 * The api path to validate the customer eligibilities against the plan.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_validate_customer_eligibilities 	The path to validate the customer eligibilities.
	 */
	private $path_validate_customer_eligibilities;

	/**
	 * The api path to verify the referral code.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_verify_referral_code  				The api path to verify the referral code.
	 */
	private $path_verify_referral_code;

	/**
	 * The api path to get all FPX bank list.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_get_fpx_bank_list  			The path to get all FPX bank list
	 */
	private $path_get_fpx_bank_list;

	/**
	 * The api path to record order with payment and addons.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_create_yos_order_and_payment		The api path to record order with payment and addons.
	 */
	private $path_create_yos_order_and_payment;

	/**
	 * The api path to check payment status.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_check_order_payment_status		The api path to check payment status.
	 */
	private $path_check_order_payment_status;

	/**
	 * The api path to get Maybank IPP tenure details.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_get_ipp_tenure_details		The api path to get Maybank IPP tenure details.
	 */
	private $path_get_ipp_tenure_details;

	/**
	 * The api path to get Maybank IPP monthly installment details.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_get_ipp_monthly_installment		The api path to get Maybank IPP monthly installment details.
	 */
	private $path_get_ipp_monthly_installment;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version, $prefix)
	{

		$this->plugin_name 	= $plugin_name;
		$this->version 		= $version;
		$this->prefix 		= $prefix;
		$this->api_timeout 	= 60;
		$this->api_app_version      = '1.1';
		$this->api_locale           = 'EN';
		$this->path_generate_auth_token 	= '/mobileyos/mobile/ws/v1/json/auth/getBasicAuth';
		$this->path_get_add_ons_by_plan 	= '/mobileyos/mobile/ws/v1/json/getEligibleAddonList';
		$this->path_generate_otp_for_login	= '/mobileyos/mobile/ws/v1/json/generateOTPForLogin';
		$this->path_validate_login			= '/mobileyos/mobile/ws/v1/json/validateLoginAndGetCustomerDetails';
		$this->path_get_cities_by_state_code = '/mobileyos/mobile/ws/v1/json/getAllCitiesByStateCode';
		$this->path_generate_otp_for_guest_login = '/mobileyos/mobile/ws/v1/json/generateOTPForGuestLogin';
		$this->path_validate_guest_login 	= '/mobileyos/mobile/ws/v1/json/validateGuestLogin';
		$this->path_validate_customer_eligibilities	= '/mobileyos/mobile/ws/v1/json/validateCustomerEligibilities';
		$this->path_verify_referral_code 	= '/mobileyos/mobile/ws/v1/json/verifyReferralCode';
		$this->path_get_fpx_bank_list 		= '/mobileyos/mobile/ws/v1/json/getFpxBankList';
		$this->path_create_yos_order_and_payment = '/mobileyos/mobile/ws/v1/json/createYOSOrderAndPaymentWithAddonAndReloads';
		$this->path_check_order_payment_status 	 = '/mobileyos/mobile/ws/v1/json/orderPaymentStatus';
		$this->path_get_ipp_tenure_details		 = '/mobileyos/mobile/ws/v1/json/getIPPTenureDetails';
		$this->path_get_ipp_monthly_installment  = '/mobileyos/mobile/ws/v1/json/getIPPMonthlyInstalment';

		$ytlpd_options				= get_option($this->prefix . "settings");
		$this->api_domain 			= (!empty($ytlpd_options['ytlpd_api_domain_url'])) ? $ytlpd_options['ytlpd_api_domain_url'] : '';
		$this->api_request_id 		= (!empty($ytlpd_options['ytlpd_api_request_id'])) ? $ytlpd_options['ytlpd_api_request_id'] : '';
		$this->api_authorization_key = (!empty($ytlpd_options['ytlpd_api_authorization_key'])) ? $ytlpd_options['ytlpd_api_authorization_key'] : '';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ytl_Pull_Data_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ytl_Pull_Data_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ytl-pull-data-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ytl_Pull_Data_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ytl_Pull_Data_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ytl-pull-data-public.js', array( 'jquery' ), $this->version, false );

	}

	public function ra_reg_apis()
	{
		$this->ra_reg_add_to_cart();
		$this->ra_reg_get_plan_by_id();
		$this->ra_reg_get_add_ons_by_plan();
		$this->ra_reg_get_auth_token();
		$this->ra_reg_generate_otp_for_login();
		$this->ra_reg_login_basic();
		$this->ra_reg_get_cities_by_state();
		$this->ra_reg_generate_otp_for_guest_login();
		$this->ra_reg_guest_login();
		$this->ra_reg_validate_customer_eligibilities();
		$this->ra_reg_verify_referral_code();
		$this->ra_reg_get_fpx_bank_list();
		$this->ra_reg_get_ipp_tenures();
		$this->ra_reg_get_ipp_monthly_installments();
		$this->ra_reg_create_yos_order();
		$this->ra_reg_check_order_payment_status();
	}

	public function ra_reg_add_to_cart()
	{
		register_rest_route('ywos/v1', 'add-to-cart', array(
			'methods'	=> 'POST',
			'callback'	=> array($this, 'ra_add_to_cart')
		));
	}

	public function ra_add_to_cart(WP_REST_Request $request)
	{
		global $wpdb;

		$table_name			= $wpdb->prefix . 'ywos_cart';
		$session_key 		= $request('session_key');
		$meta 				= $request('meta');
		$wpdb->insert(
			$table_name,
			array(
				'session_key'	=> $session_key,
				'meta'			=> $meta,
			),
			array(
				'%s',
				'%s'
			)
		);
	}

	public function ra_reg_get_plan_by_id()
	{
		register_rest_route('ywos/v1', '/get-plan-by-id/(?P<plan_id>\d+)', array(
			'methods'	=> 'GET',
			'callback' 	=> array($this, 'get_plan_by_id'),
			'args' 		=> array(
				'plan_id' 	=> array(
					'validate_callback'	=> function ($param, $request, $key) {
						return is_numeric($param);
					}
				)
			)
		));
	}

	public function get_plan_by_id($data)
	{
		$return 	= [];
		$get_plans 	= get_option($this->prefix . 'plans_data');
		if (empty($get_plans)) {
			return new WP_Error('no_plan', 'Invalid plan ID', array('status' => 404));
		}
		$plans_obj 	= unserialize($get_plans);
		foreach ($plans_obj as $plans) {
			foreach ($plans as $plan_id => $plan) {
				if ($plan_id == $data['plan_id']) {
					$return	= $plan;
					break;
				}
			}
		}
		if (empty($return)) {
			return new WP_Error('no_plan', 'Invalid plan ID', array('status' => 404));
		}

		return $return;
	}

	public function ra_reg_get_add_ons_by_plan()
	{
		register_rest_route('ywos/v1', '/get-add-ons-by-plan', array(
			'methods'	=> 'POST',
			'callback' 	=> array($this, 'get_add_ons_by_plan')
		));
	}

	public function get_add_ons_by_plan(WP_REST_Request $request)
	{
		$plan_name 	= (isset($request['plan_name']) && $request['plan_name'] != null) ? $request['plan_name'] : null;
		$plan_type 	= (isset($request['plan_type']) && $request['plan_type'] != null) ? $request['plan_type'] : null;

		if ($plan_name != null && $plan_type != null) {
			$add_ons 	= $this->ca_get_add_ons_by_plan($plan_name, $plan_type);
			$response 	= new WP_REST_Response($add_ons);
			$response->set_status(200);
			return $response;
		} else {
			return new WP_Error('error_fetching_add_ons', "Parameters not complete to fetch the add ons.", array('status' => 400));
		}
		return new WP_Error('error_fetching_add_ons', "There's an error in fetching the add ons.", array('status' => 400));
	}

	public function ca_get_add_ons_by_plan($plan_name = null, $plan_type = null)
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if ($plan_name && $plan_type && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params 	= [
				'requestId'	=> $this->api_request_id,
				'locale' 	=> $this->api_locale,
				'sessionId' => $session_id,
				'yesId' 	=> "",
				'planName' 	=> $plan_name,
				'planType' 	=> $plan_type
			];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_get_add_ons_by_plan;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);
			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;

				if (isset($data->addonListServiceTypes) && $data->addonListServiceTypes != '') {
					$add_ons 	= $data->addonListServiceTypes;
					return $add_ons;
				}
			} else if ($data->displayResponseMessage) {
				// return new WP_Error('error_fetching_add_ons', $data->displayResponseMessage, array('status' => 400));
			}
		} else {
			// return new WP_Error('error_fetching_add_ons', "Parameters not complete to fetch the add ons.", array('status' => 400));
		}
		// return new WP_Error('error_fetching_add_ons', "There's an error in fetching the add ons.", array('status' => 400));
		return [];
	}

	public function ra_reg_get_auth_token()
	{
		register_rest_route('ywos/v1', 'get-auth-token', array(
			'methods'	=> 'GET',
			'callback'	=> array($this, 'get_auth_token')
		));
	}

	public function get_auth_token($get_token_only = false)
	{
		return $this->ca_generate_auth_token();
	}

	public function ca_generate_auth_token($get_token_only = false)
	{
		if (isset($this->api_domain) && isset($this->api_request_id) && isset($this->api_authorization_key)) {
			$params     = ['requestId' => $this->api_request_id, 'locale' => $this->api_locale];
			$args       = [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8', 'Authorization' => 'BASIC ' . $this->api_authorization_key),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url    = $this->api_domain . $this->path_generate_auth_token;
			$request    = wp_remote_post($api_url, $args);
			$data   	= json_decode($request['body']);
			if (!empty($data->basicAuthToken)) {
				if ($get_token_only) {
					return $data->basicAuthToken;
				}
				$response 	= new WP_REST_Response(['token' => $data->basicAuthToken]);
				$response->set_status(200);
				return $response;
			}
		} else {
			return new WP_Error('error_generating_auth_token', "Parameters not complete to generate auth token.", array('status' => 400));
		}
		return new WP_Error('error_generating_auth_token', "There's an error in generating the auth token.", array('status' => 400));
	}

	public function ra_reg_generate_otp_for_login()
	{
		register_rest_route('ywos/v1', 'generate-otp-for-login', array(
			'methods'	=> 'POST',
			'callback'	=> array($this, 'generate_otp_for_login'),
			'args'		=> [
				'yes_number'	=> [
					'validate_callback'	=> function ($param, $request, $key) {
						return true;
					}
				]
			]
		));
	}

	public function generate_otp_for_login(WP_REST_Request $request)
	{
		$yes_id	= (trim($request['yes_number'])) ? $request['yes_number'] . '@YES.MY' : null;
		return $this->ca_generate_otp_for_login($yes_id);
	}

	public function ca_generate_otp_for_login($yes_id = null)
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if ($yes_id != null && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params 	= ['requestId' => $this->api_request_id, 'yesId' => $yes_id, 'locale' => $this->api_locale, 'sessionId' => $session_id];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_generate_otp_for_login;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);
			if ($data->responseCode > -1) {
				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			}
		} else {
			return new WP_Error('error_generating_otp_for_login', "Parameters not complete to generate OTP for login.", array('status' => 400));
		}
		return new WP_Error('error_generating_otp_for_login', "There's an error in generating OTP for login.", array('status' => 400));
	}

	public function ra_reg_login_basic()
	{
		register_rest_route('ywos/v1', 'validate-login', [
			'methods'	=> 'POST',
			'callback'	=> array($this, 'login_basic'),
			'args' 		=> [
				'yes_number'	=> [
					'validate_callback'	=> function ($param, $request, $key) {
						return is_numeric($param);
					}
				],
				'password' 		=> [
					'validate_callback'	=> function ($param, $request, $key) {
						return is_string($param);
					}
				],
				'auth_type'  	=> [
					'validate_callback'	=> function ($param, $request, $key) {
						return is_string($param);
					}
				]
			]
		]);
	}

	public function login_basic(WP_REST_Request $request)
	{
		$yes_id 	= $request['yes_number'] . '@YES.MY';
		$password	= $request['password'];
		$auth_type 	= $request['auth_type'];
		return $this->ca_validate_login($yes_id, $password, $auth_type);
	}

	public function ca_validate_login($yes_id = null, $password = null, $auth_type = 'password')
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if ($yes_id && $password && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params 	= [
				'requestId'	=> $this->api_request_id,
				'locale' 	=> $this->api_locale,
				'sessionId' => $session_id,
				'yesId' 	=> $yes_id,
				'password' 	=> $password,
				'authenticationType' => $auth_type
			];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_validate_login;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);
			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;

				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else if ($data->displayErrorMessage) {
				return new WP_Error('error_validate_login_with_message', $data->displayErrorMessage, array('status' => 400));
			} else {
				return new WP_Error('error_validate_login', "Credentials is wrong.", array('status' => 400));
			}
		} else {
			return new WP_Error('error_validate_login', "Parameters not complete to validate login.", array('status' => 400));
		}
		return new WP_Error('error_validate_login', "There's an error in validating login.", array('status' => 400));
	}

	public function ra_reg_get_cities_by_state()
	{
		register_rest_route('ywos/v1', '/get-cities-by-state/(?P<state_code>\w+)', [
			'methods' 	=> 'GET',
			'callback' 	=> array($this, 'get_cities_by_state'),
			'args' 		=> array(
				'state_code' => array(
					'validate_callback' => function ($param, $request, $key) {
						return is_string($param);
					}
				)
			)
		]);
	}

	public function get_cities_by_state($data)
	{
		$state_code = $data['state_code'];
		return $this->ca_get_cities_by_state($state_code);
	}

	public function ca_get_cities_by_state($state_code = null)
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if ($state_code && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params = ['requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'sessionId' => $session_id, 'stateCode' => $state_code];
			$args 	= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url	= $this->api_domain . $this->path_get_cities_by_state_code;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);
			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;
				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else {
				return new WP_Error('error_getting_cities_by_state', "State code is not valid.", array('status' => 400));
			}
		} else {
			return new WP_Error('error_getting_cities_by_state', "Parameters not complete to retrieve cities.", array('status' => 400));
		}
		return new WP_Error('error_getting_cities_by_state', "There's an error in retreiving cities.", array('status' => 400));
	}

	public function ra_reg_generate_otp_for_guest_login()
	{
		register_rest_route('ywos/v1', 'generate-otp-for-guest-login', array(
			'methods'	=> 'POST',
			'callback'	=> array($this, 'generate_otp_for_guest_login'),
			'args' 		=> [
				'phone_number' 	=> [
					'validate_callback'	=> function ($param, $request, $key) {
						return true;
					}
				]
			]
		));
	}

	public function generate_otp_for_guest_login(WP_REST_Request $request)
	{
		$msisdn = (trim($request['phone_number'])) ? $request['phone_number'] : null;
		return $this->ca_generate_otp_for_guest_login($msisdn);
	}

	public function ca_generate_otp_for_guest_login($msisdn = null)
	{
		$session_id = $this->ca_generate_auth_token(true);
		if ($msisdn != null && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params 	= ['requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'msisdn' => $msisdn, 'sessionId' => $session_id];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_generate_otp_for_guest_login;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);
			if ($data->responseCode > -1) {
				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else if ($data->displayErrorMessage) {
				return new WP_Error('error_generating_otp_for_guest_login_with_message', $data->displayErrorMessage, array('status' => 400));
			}
		} else {
			return new WP_Error('error_generating_otp_for_guest_login', "Parameters not complete to generate OTP for guest login.", array('status' => 400));
		}
		return new WP_Error('error_generating_otp_for_guest_login', "There's an error in generating OTP for guest login.", array('status' => 400));
	}

	public function ra_reg_guest_login()
	{
		register_rest_route('ywos/v1', 'validate-guest-login', array(
			'methods' 	=> 'POST',
			'callback'	=> array($this, 'validate_guest_login'),
			'args' 		=> [
				'phone_number' => [
					'validate_callback' => function ($param, $request, $key) {
						return true;
					}
				],
				'otp_password' => [
					'validate_callback' => function ($param, $request, $key) {
						return true;
					}
				]
			]
		));
	}

	public function validate_guest_login(WP_REST_Request $request)
	{
		$msisdn = (trim($request['phone_number'])) ? $request['phone_number'] : null;
		$otp_password = (trim($request['otp_password'])) ? $request['otp_password'] : null;
		return $this->ca_validate_guest_login($msisdn, $otp_password);
	}

	public function ca_validate_guest_login($msisdn = null, $otp_password = null)
	{
		$session_id = $this->ca_generate_auth_token(true);
		if ($msisdn != null && $otp_password != null && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params 	= ['requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'msisdn' => $msisdn, 'password' => $otp_password, 'sessionId' => $session_id];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_validate_guest_login;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);

			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;

				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else if ($data->displayErrorMessage) {
				return new WP_Error('error_validating_guest_login', $data->displayErrorMessage, array('status' => 400));
			}
		} else {
			return new WP_Error('error_validating_guest_login', "Parameters not complete to validate login.", array('status' => 400));
		}
		return new WP_Error('error_validating_guest_login', "There's an error in validating login.", array('status' => 400));
	}

	public function ra_reg_validate_customer_eligibilities()
	{
		register_rest_route('ywos/v1', 'validate-customer-eligibilities', array(
			'methods'	=> 'POST',
			'callback'	=> array($this, 'validate_customer_eligibilities')
		));
	}

	public function validate_customer_eligibilities(WP_REST_Request $order_info)
	{
		return $this->ca_validate_customer_eligibilities($order_info);
	}

	public function ca_validate_customer_eligibilities($order_info = [])
	{
		$phone_number 	= (isset($order_info['phone_number']) && !empty(trim($order_info['phone_number']))) 	? $order_info['phone_number'] 	: null;
		$customer_name 	= (isset($order_info['customer_name']) && !empty(trim($order_info['customer_name']))) 	? $order_info['customer_name'] 	: null;
		$email 			= (isset($order_info['email']) && !empty(trim($order_info['email']))) 					? $order_info['email'] 			: null;
		$security_type 	= (isset($order_info['security_type']) && !empty(trim($order_info['security_type']))) 	? $order_info['security_type'] 	: null;
		$security_id 	= (isset($order_info['security_id']) && !empty(trim($order_info['security_id']))) 		? $order_info['security_id'] 	: null;
		$address_line 	= (isset($order_info['address_line']) && !empty(trim($order_info['address_line']))) 	? $order_info['address_line'] 	: null;
		$city 			= (isset($order_info['city']) && !empty(trim($order_info['city']))) 					? $order_info['city'] 			: null;
		$city_code 		= (isset($order_info['city_code']) && !empty(trim($order_info['city_code']))) 			? $order_info['city_code'] 		: null;
		$state 			= (isset($order_info['state']) && !empty(trim($order_info['state']))) 					? $order_info['state'] 			: null;
		$state_code 	= (isset($order_info['state_code']) && !empty(trim($order_info['state_code']))) 		? $order_info['state_code'] 	: null;
		$postal_code 	= (isset($order_info['postal_code']) && !empty(trim($order_info['postal_code']))) 		? $order_info['postal_code'] 	: null;
		$country 		= (isset($order_info['country']) && !empty(trim($order_info['country']))) 				? $order_info['country'] 		: null;
		$plan_bundle_id = (isset($order_info['plan_bundle_id']) && !empty(trim($order_info['plan_bundle_id']))) ? $order_info['plan_bundle_id'] : null;
		$plan_type 		= (isset($order_info['plan_type']) && !empty(trim($order_info['plan_type']))) 			? $order_info['plan_type'] 		: null;
		$plan_name 		= (isset($order_info['plan_name']) && !empty(trim($order_info['plan_name']))) 			? $order_info['plan_name'] 		: null;

		$session_id 	= $this->ca_generate_auth_token(true);

		if ($phone_number != null && $customer_name != null && $email != null && $security_type != null && $security_id != null && $address_line != null && $city != null && $city_code != null && $state != null && $state_code != null && $postal_code != null && $country != null && $plan_bundle_id != 0 && $plan_type != null && $plan_name != null && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params 	= [
				'alternatePhoneNumber' 	=> $phone_number,
				'customerFullName' 		=> $customer_name,
				'email' 				=> $email,
				'securityType' 			=> $security_type,
				'securityId' 			=> $security_id,
				'addressLine' 			=> $address_line,
				'city' 					=> $city,
				'cityCode' 				=> $city_code,
				'state' 				=> $state,
				'stateCode' 			=> $state_code,
				'postalCode' 			=> $postal_code,
				'country' 				=> $country,
				'productBundleId' 		=> $plan_bundle_id,
				'planType' 				=> $plan_type,
				'planName' 				=> $plan_name,
				'appVersion' 			=> $this->api_app_version,
				'locale' 				=> $this->api_locale,
				'source' 				=> 'MYOS',
				'requestId' 			=> $this->api_request_id,
				'sessionId' 			=> $session_id
			];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_validate_customer_eligibilities;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);

			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;

				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else if ($data->displayErrorMessage) {
				return new WP_Error('error_validating_customer_eligibilities', $data->displayErrorMessage, array('status' => 400));
			}
		} else {
			return new WP_Error('error_validating_customer_eligibilities', "Parameters not complete to validate customer eligibilities.", array('status' => 400));
		}
		return new WP_Error('error_validating_customer_eligibilities', "There's an error in validating customer eligibilities.", array('status' => 400));
	}

	public function ra_reg_verify_referral_code()
	{
		register_rest_route('ywos/v1', 'verify-referral-code', array(
			'methods'	=> 'POST',
			'callback' 	=> array($this, 'verify_referral_code')
		));
	}

	public function verify_referral_code(WP_REST_Request $request)
	{
		$referral_code = (trim($request['referral_code'])) ? $request['referral_code'] : null;
		$security_type = (trim($request['security_type'])) ? $request['security_type'] : null;
		$security_id = (trim($request['security_id'])) ? $request['security_id'] : null;
		return $this->ca_verify_referral_code($referral_code, $security_type, $security_id);
	}

	public function ca_verify_referral_code($referral_code = null, $security_type = null, $security_id = null)
	{
		$session_id = $this->ca_generate_auth_token(true);
		if ($referral_code != null && $security_type != null && $security_id != null && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params		= ['requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'referralCode' => $referral_code, 'refereeSeucityType' => $security_type, 'refereeSecurityID' => $security_id, 'sessionId' => $session_id];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_verify_referral_code;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);

			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;

				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else if ($data->displayErrorMessage) {
				return new WP_Error('error_verify_referral_code', $data->displayErrorMessage, array('status' => 400));
			}
		} else {
			return new WP_Error('error_verify_referral_code', "Parameters not complete to verify the referral code.", array('status' => 400));
		}
		return new WP_Error('error_verify_referral_code', "There's an error in verifying the referral code.", array('status' => 400));
	}

	public function ra_reg_get_fpx_bank_list()
	{
		register_rest_route('ywos/v1', 'get-fpx-bank-list', array(
			'methods'	=> 'GET', 
			'callback' 	=> array($this, 'get_fpx_bank_list')
		));
	}

	public function get_fpx_bank_list() 
	{
		return $this->ca_get_fpx_bank_list();
	}

	public function ca_get_fpx_bank_list() 
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if (isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params = ['requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'sessionId' => $session_id];
			$args 	= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url	= $this->api_domain . $this->path_get_fpx_bank_list;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);
			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;
				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else {
				return new WP_Error('error_getting_fpx_bank_list', "There's an error in retrieving the bank list.", array('status' => 400));
			}
		} else {
			return new WP_Error('error_getting_fpx_bank_list', "Parameters not complete to retrieve cities.", array('status' => 400));
		}
		return new WP_Error('error_getting_fpx_bank_list', "There's an error in retrieving the bank list.", array('status' => 400));
	}

	public function ra_reg_get_ipp_tenures() 
	{
		register_rest_route('ywos/v1', 'get-ipp-tenures', array(
			'methods'	=> 'POST', 
			'callback' 	=> array($this, 'get_ipp_tenures')
		));
	}

	public function get_ipp_tenures(WP_REST_Request $request) 
	{
		$plan_name	= $request['plan_name'];
		return $this->ca_get_ipp_tenures($plan_name);
	}

	public function ca_get_ipp_tenures($plan_name = '') 
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if ($plan_name && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params = ['planName' => $plan_name, 'requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'sessionId' => $session_id];
			$args 	= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url	= $this->api_domain . $this->path_get_ipp_tenure_details;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);

			if ($data->responseCode > -1) {
				$response = new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else {
				return new WP_Error('error_getting_ipp_tenure', "There's an error in retrieving the Maybank IPP tenure details.", array('status' => 400));
			}
		} else {
			return new WP_Error('error_getting_ipp_tenure', "Parameters not complete to retrieve Maybank IPP tenure details.", array('status' => 400));
		}
		return new WP_Error('error_getting_ipp_tenure', "There's an error in retrieving the Maybank IPP tenure details.", array('status' => 400));
	}

	public function ra_reg_get_ipp_monthly_installments() 
	{
		register_rest_route('ywos/v1', 'get-ipp-monthly-installments', array(
			'methods'	=> 'POST', 
			'callback' 	=> array($this, 'get_ipp_monthly_installments')
		));
	}

	public function get_ipp_monthly_installments(WP_REST_Request $request) 
	{
		$total_amount 	= $request['total_amount'];
		$tenure_type 	= $request['tenure_type'];
		return $this->ca_get_ipp_monthly_installments($total_amount, $tenure_type);
	}

	public function ca_get_ipp_monthly_installments($total_amount = 0, $tenure_type = 0) 
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if ($total_amount && $tenure_type && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params = ['planAmount' => $total_amount, 'ippTenureType' => $tenure_type, 'requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'sessionId' => $session_id];
			$args 	= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url	= $this->api_domain . $this->path_get_ipp_monthly_installment;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);
			
			if ($data->responseCode > -1) {
				$response = new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else {
				return new WP_Error('error_getting_ipp_installment', "There's an error in retrieving the Maybank IPP installment details.", array('status' => 400));
			}
		} else {
			return new WP_Error('error_getting_ipp_installment', "Parameters not complete to retrieve Maybank IPP installment details.", array('status' => 400));
		}
		return new WP_Error('error_getting_ipp_installment', "There's an error in retrieving the Maybank IPP installment details.", array('status' => 400));
	}

	public function ra_reg_create_yos_order()
	{
		register_rest_route('ywos/v1', 'create-yos-order', array(
			'methods'	=> 'POST', 
			'callback' 	=> array($this, 'create_yos_order')
		));
	}

	public function create_yos_order(WP_REST_Request $order_info) 
	{
		return $this->ca_create_yos_order($order_info);
	}

	public function ca_create_yos_order($order_info = []) 
	{
		$session_key 	= $this->get_request_input($order_info, 'session_key');
		
		$phone_number 	= $this->get_request_input($order_info, 'phone_number');
		$customer_name	= $this->get_request_input($order_info, 'customer_name');
		$email 			= $this->get_request_input($order_info, 'email');
		$login_yes_id 	= $this->get_request_input($order_info, 'login_yes_id');
		$security_type	= $this->get_request_input($order_info, 'security_type');
		$security_id 	= $this->get_request_input($order_info, 'security_id');
		$school_name 	= $this->get_request_input($order_info, 'school_name');
		$school_code 	= $this->get_request_input($order_info, 'school_code');
		$university_name= $this->get_request_input($order_info, 'university_name');
		$dealer_code 	= $this->get_request_input($order_info, 'dealer_code');
		$dealer_login_id= $this->get_request_input($order_info, 'dealer_login_id');

		$plan_name 		= $this->get_request_input($order_info, 'plan_name');
		$plan_type 		= $this->get_request_input($order_info, 'plan_type');
		$product_bundle_id = $this->get_request_input($order_info, 'product_bundle_id');
		$referral_code 	= $this->get_request_input($order_info, 'referral_code');
		$addon_name 	= $this->get_request_input($order_info, 'addon_name');

		$address_line 	= $this->get_request_input($order_info, 'address_line');
		$city			= $this->get_request_input($order_info, 'city');
		$city_code 		= $this->get_request_input($order_info, 'city_code');
		$postal_code 	= $this->get_request_input($order_info, 'postal_code');
		$state 			= $this->get_request_input($order_info, 'state');
		$state_code 	= $this->get_request_input($order_info, 'state_code');
		$country 		= $this->get_request_input($order_info, 'country');
		
		$payment_method	= $this->get_request_input($order_info, 'payment_method');
		$process_name 	= $this->get_request_input($order_info, 'process_name');
		$amount 		= $this->get_float_number($order_info['amount']);
		$amount_sst 	= $this->get_float_number($order_info['amount_sst']);
		$total_amount 	= $this->get_float_number($order_info['total_amount']);
		$bank_code 		= $this->get_request_input($order_info, 'bank_code');
		$bank_name 		= $this->get_request_input($order_info, 'bank_name');
		$card_number 	= $this->get_request_input($order_info, 'card_number');
		$card_type 		= $this->get_request_input($order_info, 'card_type');
		$name_on_card 	= $this->get_request_input($order_info, 'name_on_card');
		$card_cvv 		= $this->get_request_input($order_info, 'card_cvv');
		$card_expiry_month 	= $this->get_request_input($order_info, 'card_expiry_month');
		$card_expiry_year 	= $this->get_request_input($order_info, 'card_expiry_year');
		$ippType 		= $this->get_request_input($order_info, 'ippType');

		$session_id 	= $this->ca_generate_auth_token(true);

		if (
			$phone_number != null && $customer_name != null && $email != null && $security_type != null && $security_id != null && 
			$plan_name != null && $plan_type != null && $product_bundle_id != null && 
			$address_line != null && $city != null && $city_code != null && $postal_code != null && $state != null && $state_code != null && $country != null &&
			$payment_method != null && $process_name != null && $amount != null && $amount_sst != null && $total_amount != null && 
			(
				($payment_method == 'FPX' && ($bank_code != null && $bank_name != null)) || 
				($payment_method == 'CREDIT_CARD' && ($card_number != null && $card_type != null && $name_on_card != null && $card_cvv != null && $card_expiry_month != null && $card_expiry_year != null)) || 
				($payment_method == 'CREDIT_CARD_IPP' && ($card_number != null && $card_type != null && $name_on_card != null && $card_cvv != null && $card_expiry_month != null && $card_expiry_year != null && $ippType != null))
			) &&
			isset($this->api_domain) && isset($this->api_request_id) && $session_id
		) {
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
					'addonName' 		=> $addon_name
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
					'amount' 			=> $amount, 
					'sst' 				=> $amount_sst, 
					'totalAmount' 		=> $total_amount, 
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

				'appVersion' 			=> $this->api_app_version,
				'locale' 				=> $this->api_locale,
				'source' 				=> 'MYOS',
				'requestId' 			=> $this->api_request_id,
				'sessionId' 			=> $session_id
			];
			$args 		= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url 	= $this->api_domain . $this->path_create_yos_order_and_payment;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);

			$yos_order_meta 		= $params;
			unset($yos_order_meta['sessionId']);
			$yos_order_id 			= $data->orderNumber;
			$yos_order_display_id	= $data->displayOrderNumber;
			$xpay_order_id 			= $data->xpayOrderId;
			$yos_order_response 	= $data->displayResponseMessage;
			$this->record_new_order($session_key, $phone_number, $product_bundle_id, $yos_order_meta, $yos_order_id, $yos_order_display_id, $xpay_order_id, $yos_order_response);
			
			if ($data->responseCode > -1) {
				$data->sessionId = $session_id;

				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else if ($data->displayResponseMessage) {
				return new WP_Error('error_creating_yos_order', $data->displayResponseMessage, array('status' => 400));
			}
		} else {
			return new WP_Error('error_creating_yos_order', "Parameters not complete to create YOS order.", array('status' => 400));
		}
		return new WP_Error('error_creating_yos_order', "There's an error in creating YOS order.", array('status' => 400));
	}

	public function ra_reg_check_order_payment_status() 
	{
		register_rest_route('ywos/v1', 'check-order-payment-status', array(
			'methods'	=> 'POST', 
			'callback' 	=> array($this, 'check_order_payment_status')
		));
	}

	public function check_order_payment_status(WP_REST_Request $request) 
	{
		$session_key	= $request['session_key'];
		$yos_order_id 	= $request['yos_order_id'];
		return $this->ca_check_order_payment_status($session_key, $yos_order_id);
	}

	public function ca_check_order_payment_status($session_key = null, $yos_order_id = 0) 
	{
		$session_id 	= $this->ca_generate_auth_token(true);
		if ($session_key != null && $yos_order_id && isset($this->api_domain) && isset($this->api_request_id) && $session_id) {
			$params = ['requestId' => $this->api_request_id, 'locale' => $this->api_locale, 'orderNumber' => $yos_order_id, 'sessionId' => $session_id];
			$args 	= [
				'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
				'body'          => json_encode($params),
				'method'        => 'POST',
				'data_format'   => 'body',
				'timeout'     	=> $this->api_timeout
			];
			$api_url	= $this->api_domain . $this->path_check_order_payment_status;
			$request 	= wp_remote_post($api_url, $args);
			$data 		= json_decode($request['body']);

			$xpay_order_response 	= $data->displayResponseMessage;
			$xpay_order_meta 		= $data;
			$is_xpay_success 		= ($data->responseCode == 0) ? 1 : 0;
			$this->update_order_record($session_key, $xpay_order_response, $is_xpay_success, $xpay_order_meta);
			
			if ($data->responseCode == 0) {
				$data->sessionId = $session_id;
				$response 	= new WP_REST_Response($data);
				$response->set_status(200);
				return $response;
			} else {
				return new WP_Error('error_checking_order_payment_status', $data->displayResponseMessage, array('status' => 400));
			}
		} else {
			return new WP_Error('error_checking_order_payment_status', "Parameters not complete to check order payment status.", array('status' => 400));
		}
		return new WP_Error('error_checking_order_payment_status', "There's an error in checking order payment status.", array('status' => 400));
	}

	public function get_request_input($order_info = [], $input_name = '') 
	{
		return (isset($order_info[$input_name]) && !empty(trim($order_info[$input_name]))) ? $order_info[$input_name] : null;
	}

	public function get_float_number($amount = 0.00, $decimal_plance = 2) 
	{
		return number_format((float) $amount, $decimal_plance, '.', '');
	}

	public function record_new_order($session_key = '', $msisdn = '', $plan_id = 0, $yos_order_meta = [], $yos_order_id = '', $yos_order_display_id = '', $xpay_order_id = '', $yos_order_response = '') 
	{
		global $wpdb;
		$table_name = $wpdb->prefix.'ywos_orders';

		$checkIfExists 	= $wpdb->get_var("SELECT ID FROM $table_name WHERE session_key = '$session_key'");
		$curTimestamp 	= current_time('mysql');
		$params 		= array(
			'session_key'	=> $session_key, 
			'msisdn' 		=> $msisdn, 
			'plan_id' 		=> $plan_id, 
			'yos_order_id' 	=> $yos_order_id, 
			'yos_order_display_id' 	=> $yos_order_display_id, 
			'yos_order_meta'=> serialize($yos_order_meta), 
			'yos_order_response' 	=> $yos_order_response, 
			'xpay_order_id'	=> $xpay_order_id, 
			'order_created_at'		=> $curTimestamp, 
			'created_at' 	=> $curTimestamp, 
			'updated_at' 	=> $curTimestamp 
		);
		if ($checkIfExists == null) {
			$wpdb->insert(
				$table_name, 
				$params
			);
		} else {
			unset($params['order_created_at']);
			unset($params['created_at']);
			$wpdb->update(
				$table_name,
				$params, 
				array(
					'ID' => $checkIfExists
				)
			);
		}
	}

	public function update_order_record($session_key = '', $xpay_order_response = '', $is_xpay_success = 0, $xpay_order_meta) 
	{
		global $wpdb;
		$table_name = $wpdb->prefix.'ywos_orders';

		$getRecordID 	= $wpdb->get_var("SELECT ID FROM $table_name WHERE session_key = '$session_key'");
		$curTimestamp 	= current_time('mysql');
		
		if ($getRecordID) {
			$params = [
				'xpay_order_response' 	=> $xpay_order_response, 
				'xpay_order_meta' 		=> serialize($xpay_order_meta),
				'is_xpay_success' 		=> $is_xpay_success, 
				'updated_at' 			=> $curTimestamp 
			];
			$wpdb->update(
				$table_name,
				$params, 
				array(
					'ID' => $getRecordID
				)
			);
		}
	}
}
