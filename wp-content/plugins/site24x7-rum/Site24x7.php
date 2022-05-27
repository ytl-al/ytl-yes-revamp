<?php
if ( ! defined( 'ABSPATH' ) ) {exit; }// Exit if accessed directly
/*
Plugin Name: Site24x7 RUM
Plugin URI: https://www.site24x7.com/real-user-monitoring.html
Description: Real User Monitoring (RUM) by Site24x7 provides deep and accurate insight into real users’ application experience on your WordPress setup. To get started: 1) Click the “<strong>Activate</strong>” link to the left of this description, 2) <a href="https://www.site24x7.com/signup.html?pack=4&l=en">Sign up for a free Site24x7 account</a> to get an RUM code, and 3) Go to your <a href="admin.php?page=S247_dashboard">Site24x7 configuration page</a>, and save your RUM code.
Version: 1.0
Author: Site24x7
Author URI: https://www.site24x7.com/
License: GPLv2 or later
Text Domain: Site24x7
*/
add_action('admin_menu', 's247_menu');   
function s247_menu() {
   add_menu_page('Account Configuration', 'Site24x7 RUM', 'administrator', 'S247_dashboard', 'S247_dashboard',plugins_url( '/assets/favicons247.png', __FILE__ ),'79');
}
function S247_dashboard() {
include ('webmon.php');
}
function s247_embedRumScript()
{
$s247code_str = trim(get_option('s247RumKeyDB'));
if ( !preg_match( "/[\'a-z0-9\']{24,34}/i", $s247code_str ) )
{
return;
}
$s247code_str = esc_attr($s247code_str);
$s247RumKeyVal = trim(get_option('s247RumKeyDB'));
$dataCentre = trim(get_option('s247Datacentre'));
//$s247CollDomain = 'https://static.site24x7rum.'.$dataCentre.'/beacon/site24x7rum-min.js?appKey=';
$params = array(
  'rumMOKey' => $s247RumKeyVal,
  'dataCentreExt' => $dataCentre
);
wp_enqueue_script( 'site24x7_rum_js', plugins_url( '/js/site24x7-rum.js', __FILE__ ));
wp_localize_script( 'site24x7_rum_js', 'phpParams', $params );
}
add_action("wp_head","s247_embedRumScript", 5);
?>
