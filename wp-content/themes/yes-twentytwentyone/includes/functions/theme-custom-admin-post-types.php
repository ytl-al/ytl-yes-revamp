<?php

define('ADMIN_CUSTOM_POST_TYPE_CLASS_PATH', THEME_FUNCTIONS_PATH . '/custom-admin-post-types-class');

require_once(ADMIN_CUSTOM_POST_TYPE_CLASS_PATH . '/class-custom-admin-post-types-roaming-rates.php');
require_once(ADMIN_CUSTOM_POST_TYPE_CLASS_PATH . '/class-custom-admin-post-types-idd-rates.php');
require_once(ADMIN_CUSTOM_POST_TYPE_CLASS_PATH . '/class-custom-admin-post-types-supported-device.php');

if (!function_exists('yes_custom_posts_columns')) {
    /**
     * Function to add custom admin columns in custom post types
     * 
     * @since    1.2.0
     */
    function yes_custom_posts_columns()
    {
        if (post_type_exists('roaming-rates'))      new Yes_custom_admin_post_type_roaming_rates();
        if (post_type_exists('idd-rates'))          new Yes_custom_admin_post_type_idd_rates();
        if (post_type_exists('supported-device'))   new Yes_custom_admin_post_type_supported_device();
    }

    add_action('init', 'yes_custom_posts_columns');
}
