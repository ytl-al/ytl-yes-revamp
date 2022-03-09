<?php
/**
* @package elevate
*/
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{

	public function register(){
		//enqueue scripts in the admin panel
		add_action('admin_enqueue_scripts', array($this, 'enqueue'),9999);

		//enqueue scripts in the frontend
		add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend'),9999);
	}

	public function enqueue(){
		//css stylesheets


		//js scripts

	}

	public function enqueue_frontend(){
		//init media
        wp_enqueue_style('style', parent::$plugin_url . 'assets/css/style.css');
        wp_enqueue_script( 'elevate', parent::$plugin_url. 'assets/js/public.js' );
        wp_enqueue_script( 'elevate' );
	}

}