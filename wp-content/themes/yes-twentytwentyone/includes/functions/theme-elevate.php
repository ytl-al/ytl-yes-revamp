<?php

function check_child_page_template_elevate($template)
{
    global $post;
    if ($post->post_parent) {
        $parent = get_post(
            reset(array_reverse(get_post_ancestors($post->ID)))
        );
        if ($parent->post_name == 'elevate') {
            add_action('wp_enqueue_scripts', 'elevate_enqueue_scripts');
            $child_template = locate_template(
                [
                    'template-parts/elevate/page-'.$post->post_name.'.php',
                    'template-parts/elevate/page-'.$post->ID.'.php',
                    'page.php'
                ]
            );
            if ($child_template) return $child_template;
        }
    }
    return $template;
}

add_filter('page_template', 'check_child_page_template_elevate');


function elevate_enqueue_scripts()
{
    wp_enqueue_style('select-picker', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css', array(), '1.14.0');

    wp_enqueue_script('vuejs', 'https://cdn.jsdelivr.net/npm/vue@2', array(), '2.6.14', true);
    wp_enqueue_script('axios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js', array(), '0.24.0', true);
//    wp_enqueue_script('elevatelib-js', get_template_directory_uri() . '/template-parts/elevate/assets/js/elevate.js', array(), '1.0.0', true);
wp_enqueue_script('elevatelib-js', 'http://localhost/elevate.js', array(), '1.0.0', true);
    wp_enqueue_script('xpaylib', XPAY_LIB_PATH, array(), '1.0.0', true);
    wp_enqueue_script('select-picker', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js', array(), '1.14.0', true);
}
