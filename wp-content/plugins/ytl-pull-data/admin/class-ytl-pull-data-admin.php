<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/admin
 * @author     YTL Digital Design [AL Latif Mohamad] <latif.mohamad@ytl.com>
 */
class Ytl_Pull_Data_Admin
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
     * The api path to auth.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $get_all_plans_path  The all plans path for API url to be used.
     */
    private $get_all_plans_path;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version, $prefix)
	{
        $this->plugin_name 	= $plugin_name;
        $this->version 		= $version;
        $this->prefix		= $prefix;
        $this->api_app_version      = '1.1';
        $this->api_locale           = 'EN';
        $this->auth_path_auth       = '/mobileyos/mobile/ws/v1/json/auth/getBasicAuth';
        $this->get_all_plans_path   = '/mobileyos/mobile/ws/v1/json/getAllPlans';
	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ytl-pull-data-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ytl-pull-data-admin.js', array('jquery'), $this->version, false);
	}

    /**
     * Register the settings page for the admin area.
     *
     * @since 	 1.0.0
     */
    public function register_settings_page()
    {
        add_menu_page(
            __('YTL API Pull Data', 'ytl-pull-data'),  		// page title
            __('YTL API Pull Data', 'ytl-pull-data'),  		// menu title
            'manage_options', 								// capability
            'ytl-pull-data', 								// menu slug
            array($this, 'display_settings_page'), 			// callable function
            'dashicons-open-folder', 						// icon url - https://developer.wordpress.org/resource/dashicons
            65												// menu position
        );
    }

    /**
     * Display the settings page content for the page we have created.
     *
     * @since 	 1.0.0
     */
    public function display_settings_page()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'admin/partials/ytl-pull-data-admin-display.php';
    }

	/**
	 * Register the settings for our settings page.
	 * 
	 * @since 	 1.0.0
	 */
    public function register_settings()
    {
        $settings_id 		= $this->prefix."settings";
        $settngs_section_id	= $this->prefix."settings_section";

        register_setting(
            $settings_id,
            $settings_id,
            array($this, 'sandbox_register_setting')
        );

        add_settings_section(
            $settngs_section_id,
            __('Settings', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_section'),
            $settings_id
        );

        add_settings_field(
            $this->prefix."api_url_domain",
            __('YTL Pull Data API URL Domain', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_field_input_url'),
            $settings_id,
            $settngs_section_id,
            array(
                'label_for'		=> $this->prefix."api_domain_url",
                'default' 		=> '',                      // https://jsonplaceholder.typicode.com/posts
                'description'	=> __('The URL domain for the YTL Pull Data API from CRM', 'ytl-pull-data')
            )
        );

        add_settings_field(
            $this->prefix."api_request_id",
            __('YTL Pull Data API Request ID', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_field_input_text'),
            $settings_id,
            $settngs_section_id,
            array(
                'label_for'		=> $this->prefix."api_request_id",
                'default' 		=> '',
                'description'	=> __('The request ID for YTL Pull Data API to retrieve the plans', 'ytl-pull-data')
            )
        );

        add_settings_field(
            $this->prefix."api_authorization_key",
            __('YTL Pull Data API Authorization Key', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_field_input_text'),
            $settings_id,
            $settngs_section_id,
            array(
                'label_for'		=> $this->prefix."api_authorization_key",
                'default' 		=> '',
                'description'	=> __('The authorization key used for YTL Pull Data API to retrieve the session id', 'ytl-pull-data')
            )
        );
    }

    /**
     * Sandbox our settings.
     *
     * @since 	 1.0.0
     */
    public function sandbox_register_setting($input)
    {
        $new_input 	    = array();
        $valid_submit   = true;

        if (isset($input)) {
            foreach ($input as $key => $value) {
                $new_input[$key] = sanitize_text_field($value);
                if ($value == '' || !$valid_submit) {
                    $valid_submit   = false;
                }
            }
        }

        if ($valid_submit) {
		    add_settings_error('ytlpd_messages', 'ytlpd_message', __('API Information has been saved! Please go to <a href="?page=ytl-pull-data-action">Pull Plans</a> page to pull the latest plans.', 'ytl-pull-data'), 'updated');
        } else {
            add_settings_error('ytlpd_messages', 'ytlpd_message', __('Please fill up the API URL & API Key fields!', 'ytl-pull-data'), 'error');
        }

        return $new_input;
    }

    /**
     * Sandbox our section for the settings.
     *
     * @since 	 1.0.0
     */
    public function sandbox_add_settings_section()
    {
        return;
    }

    /**
     * Sandbox our inputs with type url
     *
     * @since 	 1.0.0
     */
    public function sandbox_add_settings_field_input_url($args)
    {
        $field_id 		= $args['label_for'];
        $field_default	= $args['default'];
        $field_desc		= esc_html($args['description']);

        $options 	= get_option($this->prefix."settings");
        $option 	= $field_default;

        if (!empty($options[$field_id])) {
            $option = $options[$field_id];
        }

        $input_id 	= $this->prefix."settings[$field_id]";
        $input_name	= $this->prefix."settings[$field_id]";
        $input_value= esc_attr($option);
        $html_input = "	<input type='url' class='regular-text' id='$input_id' name='$input_name' value='$input_value' />
						<p class='description'><em>$field_desc</em></p>";

        echo $html_input;
    }

    /**
     * Sandbox our inputs with type text
     *
     * @since 	 1.0.0
     */
    public function sandbox_add_settings_field_input_text($args)
    {
        $field_id 		= $args['label_for'];
        $field_default	= $args['default'];
        $field_desc		= esc_html($args['description']);

        $options 	= get_option($this->prefix."settings");
        $option 	= $field_default;

        if (!empty($options[$field_id])) {
            $option = $options[$field_id];
        }

        $input_id 	= $this->prefix."settings[$field_id]";
        $input_name	= $this->prefix."settings[$field_id]";
        $input_value= esc_attr($option);
        $html_input = "	<input type='text' class='regular-text' id='$input_id' name='$input_name' value='$input_value' />
						<p class='description'><em>$field_desc</em></p>";

        echo $html_input;
    }

    /**
     * Register the action to pull plans page for the admin area.
     *
     * @since 	 1.0.0
     */
    public function register_action_page()
    {
        add_submenu_page(
            'ytl-pull-data',                             			// parent slug
            __('YTL API Pull Data - Pull Plans', 'ytl-pull-data'), 	// page title
            __('Pull Plans', 'ytl-pull-data'),      				// menu title
            'manage_options',                        				// capability
            'ytl-pull-data-action',                          		// menu_slug
            array( $this, 'display_action_page' )  					// callable function
        );
    }

    /**
     * Display the action page content for the page we have created.
     *
     * @since 	 1.0.0
     */
    public function display_action_page()
    {
        if (isset($_POST['trigger_pull_data']) && check_admin_referer('pull_plans_btn_clicked')) {
            $ytlpd_options	= get_option($this->prefix."settings");
            if (!empty($ytlpd_options['ytlpd_api_domain_url'])) {
                $domain_url	        = $ytlpd_options['ytlpd_api_domain_url'];
            }
            if (!empty($ytlpd_options['ytlpd_api_request_id'])) {
                $request_id         = $ytlpd_options['ytlpd_api_request_id'];
            }
            if (!empty($ytlpd_options['ytlpd_api_authorization_key'])) {
                $authorization_key  = $ytlpd_options['ytlpd_api_authorization_key'];
            }

            if (isset($domain_url) && isset($request_id) && isset($authorization_key)) {
				$this->ytlpd_pull_plans_api($domain_url, $request_id, $authorization_key);
            } else {
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Could not pull plans. Please check the API information in <a href="?page=ytl-pull-data">API Information Settings</a> page.', 'ytl-pull-data'), 'error');
            }
        }
        require_once plugin_dir_path(dirname(__FILE__)).'admin/partials/ytl-pull-data-admin-action-display.php';
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
    public function ytlpd_pull_plans_api($domain_url = null, $request_id = null, $authorization_key = null)
    {
        $generate_auth_token    = $this->generate_auth_token($domain_url, $request_id, $authorization_key);
        if ($generate_auth_token) {
            $get_session_data   = get_option($this->prefix."basic_auth_token");
            $session_data       = unserialize($get_session_data);
            $session_id         = $session_data['basicAuthToken'];

            $params     = ['appVersion' => $this->api_app_version, 'locale' => $this->api_locale, 'requestId' => $request_id, 'sessionId' => $session_id];
            $args       = [
                'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
                'body'          => json_encode($params),
                'method'        => 'POST', 
                'data_format'   => 'body' 
            ];
            $api_url    = $domain_url.$this->get_all_plans_path;
            $request    = wp_remote_post($api_url, $args);
            $response   = $request['response'];
            $res_code   = $response['code'];

            if (is_wp_error($request)) {
                $error_message  = $response->get_error_message();
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on getting all plans: ', 'ytl-pull-data').$error_message, 'error');
            } else if ($res_code != 200) {
                if (isset($response['message'])) {
                    $error_message  = $response['message'];
                    add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on getting all plans: ', 'ytl-pull-data')."<strong><em>$error_message</em></strong>", 'error');
                }
            } else {
                $data       = json_decode($request['body']);
                $plan_data  = array();
                foreach ($data->planDetails as $plan_details) {
                    $plan_data[$plan_details->planType][$plan_details->mobilePlanId]   = $plan_details;
                }
                update_option('ytlpd_plans_data', serialize($plan_data), false);
                update_option('ytlpd_updated_at', strtotime(current_time('mysql')), false);

                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Yes plans have been successfully pulled and saved!', 'ytl-pull-data'), 'updated');
        
                if (function_exists('w3tc_flush_all')) {
                    w3tc_flush_all();
                }
            }
        }
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
    private function generate_auth_token($domain_url = null, $request_id = null, $authorization_key = null) 
    {
        $return     = false;
        $params     = ['requestId' => $request_id, 'locale' => $this->api_locale];
        $args       = [
            'headers'       => array('Content-Type' => 'application/json; charset=utf-8', 'Authorization' => 'BASIC '.$authorization_key),
            'body'          => json_encode($params),
            'method'        => 'POST', 
            'data_format'   => 'body' 
        ];
        $api_url    = $domain_url.$this->auth_path_auth;
        $request    = wp_remote_post($api_url, $args);
        $response   = $request['response'];
        $res_code   = $response['code'];

        if (is_wp_error($request)) {
            $error_message  = $response->get_error_message();
            add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on generating auth token: ', 'ytl-pull-data').$error_message, 'error');
        } else if ($res_code != 200) {
            if (isset($response['message'])) {
                $error_message  = $response['message'];
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on generating auth token: ', 'ytl-pull-data')."<strong><em>$error_message</em></strong>", 'error');
            }
        } else {
            $data   = json_decode($request['body']);
            update_option('ytlpd_basic_auth_token', serialize(['basicAuthToken' => $data->basicAuthToken]), false);
            $return = $data->basicAuthToken;
        }
        return $return;
    }
}
