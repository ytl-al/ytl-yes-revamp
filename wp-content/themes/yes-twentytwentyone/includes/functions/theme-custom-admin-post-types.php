<?php 
    define('ADMIN_CUSTOM_POST_TYPE_CLASS_PATH', THEME_FUNCTIONS_PATH.'/custom-admin-post-types-class');

    require_once(ADMIN_CUSTOM_POST_TYPE_CLASS_PATH.'/class-custom-admin-post-types-deals.php');
    require_once(ADMIN_CUSTOM_POST_TYPE_CLASS_PATH.'/class-custom-admin-post-types-roaming-rates.php');
    require_once(ADMIN_CUSTOM_POST_TYPE_CLASS_PATH.'/class-custom-admin-post-types-idd-rates.php');
    require_once(ADMIN_CUSTOM_POST_TYPE_CLASS_PATH.'/class-custom-admin-post-types-supported-device.php');

    if (!function_exists('yesmy_custom_posts_columns')) {
        function yesmy_custom_posts_columns() {
            if (post_type_exists('deals'))          new Yesmy_custom_admin_post_type_deals();
            if (post_type_exists('roaming-rates'))  new Yesmy_custom_admin_post_type_roaming_rates();
            if (post_type_exists('idd-rates'))      new Yesmy_custom_admin_post_type_idd_rates();
            if (post_type_exists('supported-device')) new Yesmy_custom_admin_post_type_supported_device();
        }
    
        add_action('init', 'yesmy_custom_posts_columns');
    }
?>