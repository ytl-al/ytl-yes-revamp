<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https:// https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Portal_Cdn_Sync
 * @subpackage Portal_Cdn_Sync/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Portal_Cdn_Sync
 * @subpackage Portal_Cdn_Sync/admin
 * @author     AJ <ajay.prakash@ytlcomms.my>
 */
class Portal_Cdn_Sync_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version) {
		$prefix	= (defined(SCRM_PREFIX)) ? SCRM_PREFIX : 'scrm_';
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->prefix        = $prefix;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/portal-cdn-sync-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/portal-cdn-sync-admin.js', array( 'jquery' ), $this->version, false );

	}


	   /**
     * Register the settings page for the admin area.
     *
     * @since 	 1.0.0
     */
    public function register_settings_page()
    {
        add_menu_page(
            __('SCRM API ', 'scrm-api-data'),          // page title
            __('SCRM API', 'scrm-api-data'),          // menu title
            'manage_options',                                 // capability
            'scrm-api-data',                                 // menu slug
            array($this, 'display_settings_page'),             // callable function
            'dashicons-open-folder',                         // icon url - https://developer.wordpress.org/resource/dashicons
            99                                               // menu position
        );
    }


	  /**
     * Display the settings page content for the page we have created.
     *
     * @since 	 1.0.0
     */
    public function display_settings_page()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/portal-cdn-sync-admin-display.php';
    }



	  /**
     * Register the settings for our settings page.
     * 
     * @since 	 1.0.0
     */
    public function register_settings()
    {
        $settings_id         = $this->prefix . "settings";
        $settngs_section_id    = $this->prefix . "settings_section";

        register_setting(
            $settings_id,
            $settings_id,
            array($this, 'sandbox_register_setting')
        );

        add_settings_section(
            $settngs_section_id,
            __('Settings', 'scrm-api-data'),
            array($this, 'sandbox_add_settings_section'),
            $settings_id
        );

        add_settings_field(
            $this->prefix . "api_url_domain",
            __('YTL SCRM API URL Domain', 'scrm-api-data'),
            array($this, 'sandbox_add_settings_field_input_url'),
            $settings_id,
            $settngs_section_id,
            array(
                'label_for'        => $this->prefix . "api_domain_url",
                'default'         => '',                      // https://jsonplaceholder.typicode.com/posts
                'description'    => __('The SCRM Api URL domain', 'scrm-api-data')
            )
        );

		add_settings_field(
			$this->prefix . "api_key",
			__('YTL SCRM API Key', 'scrm-api-data'),
			array($this, 'sandbox_add_settings_field_input_text'),
			$settings_id,
			$settngs_section_id,
			array(
				'label_for'    => $this->prefix . "api_key",
				'default'      => '',
				'description'  => __('The API key used for YTL SCRM API to access supported devices', 'scrm-api-data')
			)
		);
		
		add_settings_field(
			$this->prefix . "api_value",
			__('YTL SCRM API Value', 'scrm-api-data'),
			array($this, 'sandbox_add_settings_field_input_text'),
			$settings_id,
			$settngs_section_id,
			array(
				'label_for'    => $this->prefix . "api_value",
				'default'      => '',
				'description'  => __('The value associated with the YTL SCRM API key to retrieve the session id', 'scrm-api-data')
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
        $new_input         = array();
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
            add_settings_error('scrm_messages', 'scrm_message', __('API Information has been saved!', 'scrm-api-data'), 'updated');
        } else {
            add_settings_error('scrm_messages', 'scrm_message', __('Please fill up the API URL & API Key fields!', 'scrm-api-data'), 'error');
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
        $field_id         = $args['label_for'];
        $field_default    = $args['default'];
        $field_desc        = esc_html($args['description']);

        $options     = get_option($this->prefix . "settings");
        $option     = $field_default;

        if (!empty($options[$field_id])) {
            $option = $options[$field_id];
        }

        $input_id     = $this->prefix . "settings[$field_id]";
        $input_name    = $this->prefix . "settings[$field_id]";
        $input_value = esc_attr($option);
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
        $field_id         = $args['label_for'];
        $field_default    = $args['default'];
        $field_desc        = esc_html($args['description']);
        $options     = get_option($this->prefix . "settings");
        $option     = $field_default;

        if (!empty($options[$field_id])) {
            $option = $options[$field_id];
        }

        $input_id     = $this->prefix . "settings[$field_id]";
        $input_name    = $this->prefix . "settings[$field_id]";
        $input_value = esc_attr($option);
        $html_input = "	<input type='text' class='regular-text' id='$input_id' name='$input_name' value='$input_value' />
						<p class='description'><em>$field_desc</em></p>";

        echo $html_input;
    }

}
