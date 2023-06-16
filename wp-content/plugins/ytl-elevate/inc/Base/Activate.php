<?php
/**
* @package demo_form
*/
namespace Inc\Base;
class Activate{
	public static function activate(){
		flush_rewrite_rules();
		Model::plugin_install();
	}
}