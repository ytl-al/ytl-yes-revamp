<?php 

if (!function_exists('redirect_maintenance')) {
    function redirect_maintenance() 
    {
        if (!is_admin() && !is_page('maintenance')) {
            if (!is_user_logged_in()) {
                wp_redirect('/maintenance', 301);
            }
        }
    }
    add_action('template_redirect', 'redirect_maintenance');
}