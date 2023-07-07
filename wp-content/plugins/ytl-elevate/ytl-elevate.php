<?php
/**
* @package elevate
*/
/*
Plugin Name: YTL Elevate
Description: A full featured plugin for elevate
Version:1.0
Author: Ludaka
Text Domain: elevate
*/

defined('ABSPATH') or die('Sorry.');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

register_activation_hook( __FILE__, 'activate_elevate' );
//activate plugin
function activate_elevate(){
	\Inc\Base\Activate::activate();
}

//deactivate plugin
function deactivate_elevate(){
	\Inc\Base\Deactivate::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_elevate' );
//instantiate classes
\Inc\Init::register_services();
/* Shortcode*/
\Inc\Base\Shortcode::register();
/* API Enpoint*/
$elvate_api= new \Inc\Api\ElevateApi();
$elvate_api->register();