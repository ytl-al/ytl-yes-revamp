<?php 
    require_once(THEME_FUNCTIONS_PATH.'/custom-post-types-class/class-custom-post-types.php');

    if (!function_exists('register_custom_post_types')) {
        function register_custom_post_types() {
            $custom_post_types  = new Yesmy_custom_post_types_config();

            $custom_posts_args  = [
                [
                    'name'          => 'Supported Devices', 
                    'singular_name' => 'Supported Device', 
                    'slug'          => 'supported-device', 
                    'menu_icon'     => 'dashicons-smartphone', 
                    'supports'      => ['title', 'thumbnail'], 
                    'reg_taxonomy'  => ['Uncategorized', 'Yes', 'Alcatel', 'Black Shark', 'Google', 'Huawei', 'Leagoo', 'Nokia', 'Oppo', 'Samsung', 'Realme', 'Sony', 'Xiaomi', 'Vivo'], 
                    'reg_tags'      => ['Data Only', 'Data + Voice over LTE'], 
                    'rewrite'       => 'rates-category', 
                    'category_names'=> ['plural' => 'Brands', 'singular' => 'Brand'], 
                    'tag_names'     => ['plural' => 'Supports', 'singular' => 'Support'] 
                ]
            ];

            $custom_post_types->register_post_types($custom_posts_args);
        }

        add_action('init', 'register_custom_post_types');
    }
?>