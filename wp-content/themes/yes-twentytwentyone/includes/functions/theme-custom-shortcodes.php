<?php
function wpb_supported_devices_shortcode() { 
    $message = '<div style="text-align:center;padding:1rem;color:#ff0000;font-weight:bold">Show dynamic supported devices here!</div>'; 
     
    return $message;
} 

// register shortcode
add_shortcode('supported_devices', 'wpb_supported_devices_shortcode'); 