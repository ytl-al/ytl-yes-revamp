<?php 

// if (!function_exists('redirect_maintenance')) {
//     function redirect_maintenance() 
//     {
//         if (!is_admin() && !is_page('maintenance')) {
//             if (!is_user_logged_in()) {
//                 wp_redirect('/maintenance', 301);
//             }
//         }
//     }
//     add_action('template_redirect', 'redirect_maintenance');
// }

// hn 4G-5G outage API
public function ra_reg_get_4g_outage()
{
register_rest_route('ywos/v1', '4GOutageDetails', array(
    'methods'	=> 'GET',
    'callback'	=> array($this, '4GOutageDetails'),
    'permission_callback' => '__return_true'
 ));
}