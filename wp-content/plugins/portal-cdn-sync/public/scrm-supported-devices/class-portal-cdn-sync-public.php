<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https:// https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Portal_Cdn_Sync
 * @subpackage Portal_Cdn_Sync/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Portal_Cdn_Sync
 * @subpackage Portal_Cdn_Sync/public
 * @author     AJ <ajay.prakash@ytlcomms.my>
 */
class Portal_Cdn_Sync_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */



	/**
	 * The api domain.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_domain      					The API's domain to be used for the API calls
	 */
	private $api_domain;


	/**
	 * The prefix for variables.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $prefix     							The prefix for variables or options to be used.
	 */
	private $prefix;




	/**
	 * The api key scrm
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_key						The Api key scrm which to be used for the API calls
	 */
	private $api_key;

	/**
	 * The  api value scrm
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_value				The API's value scrm  which to be used for the API calls
	 */
	private $api_value;


		/**
	 * The  scrm api fetch supported devices 
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_fetch_supported_devices_list				The API's fetch supported devices value which to be used for the API calls
	 */
	private $path_fetch_supported_devices_list;


			/**
	 * The  scrm api fetch supported devices  Brands
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $path_fetch_supported_devices_brnads_list				The API's fetch Brands supported devices value which to be used for the API calls
	 */
	private $path_fetch_supported_devices_brnads_list;
	

	public function __construct( $plugin_name, $version ) {
		$prefix	= (defined(SCRM_PREFIX)) ? SCRM_PREFIX : 'scrm_';
		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->path_fetch_supported_devices_list		 = '/crm-ic/rnr/public/api/manage_device/device_list';
		$this->path_fetch_supported_devices_brnads_list		 = '/crm-ic/rnr/public/api/manage_device/brand';



		$scrm_options = get_option("scrm_settings");
		$this->api_domain = (!empty($scrm_options['scrm_api_domain_url'])) ? $scrm_options['scrm_api_domain_url'] : '';
		$this->api_key = (!empty($scrm_options['scrm_api_key'])) ? $scrm_options['scrm_api_key'] : '';
		$this->api_value = (!empty($scrm_options['scrm_api_value'])) ? $scrm_options['scrm_api_value'] : '';


	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Portal_Cdn_Sync_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Portal_Cdn_Sync_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/portal-cdn-sync-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Portal_Cdn_Sync_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Portal_Cdn_Sync_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/portal-cdn-sync-public.js', array( 'jquery' ), $this->version, false );

	}



	public function ra_reg_apis()
	{
		$this->fetch_supported_devices();
		$this->fetch_supported_brands();
		
	}




	public function fetch_supported_brands()
{
    register_rest_route(
        'ywos/v1',
        'fetch-supported-brands',
        array(
            'methods' => 'POST',
            'callback' => array($this, 'get_supported_brands'),
            'permission_callback' => '__return_true'
        )
    );
}

public function get_supported_brands()
{
    return $this->retrieve_supported_brands();
}

public function retrieve_supported_brands()
{
    if (isset($this->api_domain)) {
        $args = [
            'headers' => array(
                $this->api_key => $this->api_value,
                'Content-Type' => 'application/json'
            ),
            'timeout' => 150,
            'method' => 'GET'
        ];
        $api_url = $this->api_domain . $this->path_fetch_supported_devices_brnads_list;
        $request = wp_remote_get($api_url, $args);
        if (is_wp_error($request)) {
            return new WP_Error('error_fetching_supported_brands', 'Error fetching supported brands', array('status' => 400));
        }
        $data = wp_remote_retrieve_body($request);
        $response_code = wp_remote_retrieve_response_code($request);
        if ($response_code == 200) {
            $response = new WP_REST_Response(json_decode($data, true));
            $response->set_status(200);
            return $response;
        } else {
            return new WP_Error('error_fetching_supported_brands', 'Failed to fetch supported brands', array('status' => $response_code));
        }
    } else {
        return new WP_Error('error_fetching_supported_brands', 'Parameters not complete to fetch supported brands', array('status' => 400));
    }
}






	public function fetch_supported_devices()
	{

		register_rest_route(
			'ywos/v1',
			'fetch-supported-devices',
			array(
				'methods' => 'POST',
				'callback' => array($this, 'get_supported_devices'),
				'permission_callback' => '__return_true'
			)
		);
	}

	public function get_supported_devices(WP_REST_Request $request)
	{
		

		$brand_name=$request['brand'];
		$page=$request['page'];
		$device_supports=$request['device_supports'];
		$order=$request['order'];
		$device_name=$request['device_name'];
		return $this->retrieve_supported_devices($brand_name,$page,$device_supports,$order,$device_name);
	}

	public function retrieve_supported_devices($brand_name, $page, $device_supports, $order,$device_name)
{
    if (isset($this->api_domain)) {
        // Generate a unique cache key based on function parameters
        $cache_key = 'supported_devices_' . md5(json_encode(func_get_args()));

        // Define a custom cache group
        $cache_group = 'retrieve_supported_devices';

        // Try to get cached data
        $cached_response = wp_cache_get($cache_key, $cache_group);
        if ($cached_response !== false) {
            return new WP_REST_Response($cached_response, 200);
        }

        $args = [
            'headers' => array(
                $this->api_key => $this->api_value,
                'Content-Type' => 'application/json'
            ),
            'timeout' => 150,
            'method' => 'GET'
        ];

        $query_params = [
            'brand' => $brand_name,
            'page' => $page,
            'device_supports' => $device_supports,
            'order' => $order,
			'device_name' => $device_name
        ];


        // Filter out empty values
        $query_params = array_filter($query_params, function($value) {
            return (!empty($value) || $value === '0') && $value !== 'All';
        });

        // Build the query string
        $query_string = http_build_query($query_params);

        $api_url = $this->api_domain . $this->path_fetch_supported_devices_list . '?' . $query_string;
        $request = wp_remote_get($api_url, $args);
        if (is_wp_error($request)) {
            return new WP_Error('error_fetching_supported_devices', 'Error fetching supported devices', array('status' => 400));
        }
        $data = wp_remote_retrieve_body($request);
        $response_code = wp_remote_retrieve_response_code($request);
        if ($response_code == 200) {
            $response_data = json_decode($data, true);

            // Store the response in the cache for 12 hours
            wp_cache_set($cache_key, $response_data, $cache_group, 12 * HOUR_IN_SECONDS);

            $response = new WP_REST_Response($response_data);
            $response->set_status(200);
            return $response;
        } else {
            return new WP_Error('error_fetching_supported_devices', 'Failed to fetch supported devices', array('status' => $response_code));
        }
    } else {
        return new WP_Error('error_fetching_supported_devices', 'Parameters not complete to fetch supported devices', array('status' => 400));
    }
}

	

}
