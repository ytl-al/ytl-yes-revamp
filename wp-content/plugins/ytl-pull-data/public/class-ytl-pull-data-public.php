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
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The prefix for variables.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $prefix     The prefix for variables or options to be used.
	 */
	private $prefix;

	/**
	 * The api path to auth.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_app_version     The version for API to be used.
	 */
	private $api_app_version;

	/**
	 * The api path to auth.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_locale          The locale for API url to be used.
	 */
	private $api_locale;

	/**
	 * The api path to auth.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $auth_path_auth      The authentication path for API url to be used.
	 */
	private $auth_path_auth;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version, $prefix)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->prefix = $prefix;
		$this->api_app_version      = '1.1';
		$this->api_locale           = 'EN';
		$this->auth_path_auth       = '/mobileyos/mobile/ws/v1/json/auth/getBasicAuth';
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

	public function ra_reg_get_plan_by_id()
	{
		register_rest_route('ywos/v1', '/get-plan-by-id/(?P<plan_id>\d+)', array(
			'methods'	=> 'GET',
			'callback' 	=> array($this, 'ra_get_plan_by_id'),
			'args' 		=> array(
				'plan_id' 	=> array(
					'validate_callback'	=> function ($param, $request, $key) {
						return is_numeric($param);
					}
				)
			)
		));
	}

	public function ra_get_plan_by_id($data)
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

	/**
	 * Register REST APIs for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
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

	public function ra_reg_get_auth_token()
	{
		register_rest_route('ywos/v1', 'get-auth-token', array(
			'methods'	=> 'GET',
			'callback'	=> array($this, 'get_auth_token')
		));
	}

	public function get_auth_token()
	{
		$ytlpd_options	= get_option($this->prefix . "settings");
		if (!empty($ytlpd_options['ytlpd_api_domain_url'])) {
			$domain_url	= $ytlpd_options['ytlpd_api_domain_url'];
		}
		if (!empty($ytlpd_options['ytlpd_api_request_id'])) {
			$request_id         = $ytlpd_options['ytlpd_api_request_id'];
		}
		if (!empty($ytlpd_options['ytlpd_api_authorization_key'])) {
			$authorization_key  = $ytlpd_options['ytlpd_api_authorization_key'];
		}
		if (isset($domain_url) && isset($request_id) && isset($authorization_key)) {
			return $this->generate_auth_token($domain_url, $request_id, $authorization_key);
		}
		return new WP_Error('error_get_auth_token', "There's an error in fetching the auth token.", array('status' => 404));
	}

	/**
	 * Function to pull the plans through API, and save the data in the database. To retrieve the plan data, use this function - get_option('ytlpd_plans_data'). This function will also clear the cache from W3 Total Cache plugin.
	 * 
	 * @since    1.0.0
	 * 
	 * @param    string     $domain_url         The URL domain to the plans API.
	 * @param    string     $request_id         The request id to be used to call the API.
	 * @param    string     $authorization_key  The authorization key to be used to call the API.
	 */
	public function generate_auth_token($domain_url = null, $request_id = null, $authorization_key = null)
	{
		$params     = ['requestId' => $request_id, 'locale' => $this->api_locale];
		$args       = [
			'headers'       => array('Content-Type' => 'application/json; charset=utf-8', 'Authorization' => 'BASIC ' . $authorization_key),
			'body'          => json_encode($params),
			'method'        => 'POST',
			'data_format'   => 'body'
		];
		$api_url    = $domain_url . $this->auth_path_auth;
		$request    = wp_remote_post($api_url, $args);
		$data   	= json_decode($request['body']);
		if (!empty($data->basicAuthToken)) {
			$response 	= new WP_REST_Response(['token' => $data->basicAuthToken]);
			$response->set_status(200);
			return $response;
		}
		return new WP_Error('error_generating_auth_token', "There's an error in generating the auth token.", array('status' => 404));
	}
}
