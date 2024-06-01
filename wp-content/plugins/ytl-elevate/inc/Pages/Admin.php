<?php

/**
 * @package elevate
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Base\Model;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
	public $settings;
	public $pages = array();
	public $subpages = array();
    public $prefix = 'ytl_elevate_';

	public function __construct()
	{
		$this->settings = new SettingsApi();
	}

	public function register()
	{
		 $this->pages = array(

			array(
				'page_title' => __('Settings', 'elevate'),
				'menu_title' => __('Elevate API', 'elevate'),
				'capability' => 'edit_posts',
				'menu_slug' => 'elevate-setting',
				'callback' =>  array($this, 'elevate_setting'),
				'icon_url' =>  'dashicons-editor-ol',
				'position' =>  70
			)

		);
		$this->settings->AddPage($this->pages)->register();

        $this->subpages = array(
            array(
                'parent_slug' => 'elevate-setting',
                'page_title' => __('API Settings', 'elevate'),
                'menu_title' => __('API Settings', 'elevate'),
                'capability' => 'manage_options',
                'menu_slug' => 'elevate-setting',
                'callback' =>  array($this, 'elevate_setting'),
            )
			,
            array(
                'parent_slug' => 'elevate-setting',
                'page_title' => __('Api Logs', 'elevate'),
                'menu_title' => __('Api Logs', 'elevate'),
                'capability' => 'manage_options',
                'menu_slug' =>  'elevate-log',
                'function' =>  array($this, 'elevate_logs')
            )
        );
		$this->settings->AddSubPage($this->subpages)->register();

	}

	public function elevate_setting()
	{
        if (isset($_POST['submit'])) {
            (new \Inc\Base\Model)->updateAPISettings($_POST);
        }
        require_once WP_PLUGIN_DIR .'/ytl-elevate/templates/settings_api.php';
	}

	public function elevate_pull()
	{
        if (isset($_POST['submit'])) {
            (new \Inc\Base\Model)->pullProductData();
        }

        require_once WP_PLUGIN_DIR .'/ytl-elevate/templates/settings_pull.php';
	}
	
	public function elevate_logs()
	{
		$act = strtolower($_GET['act']);
		switch($act){
			case 'detail':
				$id = intval($_GET['id']);
				$logItem = \Inc\Base\Model::gegtLogs($id); 
				require_once WP_PLUGIN_DIR .'/ytl-elevate/templates/logs_detail.php';
				break;
			case 'clear':
				\Inc\Base\Model::clearLogs(); 
				wp_redirect('admin.php?page=elevate-log');
				break;
			default:
				$api_logs = \Inc\Base\Model::gegtAPILogs(); 
				$total_log = \Inc\Base\Model::getLogTotal(); 
				require_once WP_PLUGIN_DIR .'/ytl-elevate/templates/logs.php';
		}
	}

	public static function get_role()
	{
		$current_user = wp_get_current_user();
		foreach ($current_user->roles as $role) {
			if ($role = "administrator" || $role = "editor") { return $role; }
		}
		return $role;
	}

	public static function get_user_id()
	{
		$current_user = wp_get_current_user();
		return $current_user->ID;
	}

    public function api_input_url($args)
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

}
