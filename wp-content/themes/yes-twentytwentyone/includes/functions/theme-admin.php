<?php

if (!function_exists('add_admin_style')) {
    /**
     * Function add_admin_style()
     * Function to enqueue admin asset files
     * 
     * @since    1.2.0
     */
    function add_admin_style()
    {
        wp_enqueue_style('yes-admin-styles', get_template_directory_uri() . '/assets/css/yes-admin.css');
    }
    add_action('admin_enqueue_scripts', 'add_admin_style');
}
