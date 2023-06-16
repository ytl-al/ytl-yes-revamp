<?php
require_once(THEME_FUNCTIONS_PATH . '/custom-post-types-class/class-custom-post-types.php');

if (!function_exists('register_custom_post_types')) {
    /**
     * Function to add custom post types
     * 
     * @since    1.2.0
     */
    function register_custom_post_types()
    {
        $custom_post_types  = new Yes_custom_post_types_config();

        $custom_posts_args  = [
            [
                'name'          => 'Supported Devices',
                'singular_name' => 'Supported Device',
                'slug'          => 'supported-device',
                'menu_icon'     => 'dashicons-smartphone',
                'supports'      => ['title', 'thumbnail'],
                'reg_taxonomy'  => ['Uncategorized', 'Yes', 'Alcatel', 'Black Shark', 'Google', 'Huawei', 'Leagoo', 'Nokia', 'Oppo', 'Samsung', 'Realme', 'Sony', 'Xiaomi', 'Vivo'],
                'reg_tags'      => ['Data Only', 'Data + Voice over LTE', '5G'],
                'rewrite'       => 'rates-category',
                'category_names' => ['plural' => 'Brands', 'singular' => 'Brand'],
                'tag_names'     => ['plural' => 'Supports', 'singular' => 'Support'],
                'capabilities' => array(
                    'edit_post' => 'edit_supported-device',
                    'edit_posts' => 'edit_supported-devices',
                    'edit_others_posts' => 'edit_other_supported-devices',
                    'publish_posts' => 'publish_supported-devices',
                    'read_post' => 'read_supported-device',
                    'read_private_posts' => 'read_private_supported-devices',
                    'delete_post' => 'delete_supported-device'
                ),
            ],
            // [
            //     'name'          => 'News Room',
            //     'singular_name' => 'News Room',
            //     'slug'          => 'news-room',
            //     'menu_icon'     => 'dashicons-media-document',
            //     'supports'      => ['title', 'excerpt', 'thumbnail', 'editor'],
            //     'reg_taxonomy'  => ['Events', 'Announcement'],
            //     'reg_tags'      => ['US', 'Malaysia'],
            //     'rewrite'       => 'news-room-category',
            //     'category_names' => ['plural' => 'Categories', 'singular' => 'Category'],
            //     'tag_names'     => ['plural' => 'Locations', 'singular' => 'Location']
            // ],
            [
                'name'          => 'Roaming Rates',
                'singular_name' => 'Roaming Rate',
                'slug'          => 'roaming-rates',
                'menu_icon'     => 'dashicons-airplane',
                'supports'      => ['title'],
                'reg_taxonomy'  => null,
                'reg_tags'      => null,
                'rewrite'       => null,
                'category_names' => null,
                'tag_names'     => null,
                'capabilities'  => []
            ],
            [
                'name'          => 'IDD Rates',
                'singular_name' => 'IDD Rate',
                'slug'          => 'idd-rates',
                'menu_icon'     => 'dashicons-phone',
                'supports'      => ['title'],
                'reg_taxonomy'  => null,
                'reg_tags'      => null,
                'rewrite'       => null,
                'category_names' => null,
                'tag_names'     => null,
                'capabilities' => []
            ],
        ];

        $custom_post_types->register_post_types($custom_posts_args);
    }

    add_action('init', 'register_custom_post_types');
}

/**
 * This function is use for create create new roles in site
 *
 * @return void
 */
function yes_site_custom_role() {  
    // remove_role( 'maintainer' );

    add_role(
        'maintainer',
        'Maintainer',
        array(
            'read'                              => true,

            'edit_supported-device'             => true,
            'edit_supported-devices'            => true,
            'edit_other_supported-devices'      => true,
            'publish_supported-devices'         => true,
            'read_supported-device'             => true,
            'read_private_supported-devices'    => true,
            'delete_supported-device'           => true,
            
            'upload_files'                      => true,
            'manage_supported-device-Brands'    => true,
            'edit_supported-device-Brands'      => true,
            'delete_supported-device-Brands'    => true,
            'assign_supported-device-Brands'    => true,
            'manage_supported-device-Supports'  => true,
            'edit_supported-device-Supports'    => true,
            'delete_supported-device-Supports'  => true,
            'assign_supported-device-Supports'  => true
        )
    );
    $role = get_role( 'administrator' );
    $role->add_cap( 'edit_supported-device' ); 
    $role->add_cap( 'edit_supported-devices' ); 
    $role->add_cap( 'edit_other_supported-devices' ); 
    $role->add_cap( 'publish_supported-devices' ); 
    $role->add_cap( 'read_supported-device' ); 
    $role->add_cap( 'read_private_supported-devices' ); 
    $role->add_cap( 'delete_supported-device' ); 
    $role->add_cap( 'manage_supported-device-Brands' ); 
    $role->add_cap( 'edit_supported-device-Brands' ); 
    $role->add_cap( 'delete_supported-device-Brands' ); 
    $role->add_cap( 'assign_supported-device-Brands' ); 
    $role->add_cap( 'manage_supported-device-Supports' ); 
    $role->add_cap( 'edit_supported-device-Supports' ); 
    $role->add_cap( 'delete_supported-device-Supports' ); 
    $role->add_cap( 'assign_supported-device-Supports' ); 
}
add_action('admin_init', 'yes_site_custom_role');