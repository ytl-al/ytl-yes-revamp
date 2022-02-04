<?php

function check_child_page_template($template)
{
    global $post;
    if ($post->post_parent) {
        $parent = get_post(
            reset(array_reverse(get_post_ancestors($post->ID)))
        );
        if ($parent->post_name == 'ywos') {
            add_action('wp_enqueue_scripts', 'ywos_enqueue_scripts');
            $child_template = locate_template(
                [
                    'template-parts/ywos/page-' . $post->post_name . '.php',
                    'template-parts/ywos/page-' . $post->ID . '.php',
                    'page.php'
                ]
            );
            if ($child_template) return $child_template;
        }
    }
    return $template;
}

add_filter('page_template', 'check_child_page_template');


function ywos_enqueue_scripts()
{
    wp_enqueue_style('select-picker', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css', array(), '1.14.0');
    wp_enqueue_style('ywos-css', get_template_directory_uri() . '/template-parts/ywos/assets/css/ywos.css', array(), '1.0.0');

    wp_enqueue_script('vuejs', 'https://cdn.jsdelivr.net/npm/vue@2', array(), '2.6.14', true);
    wp_enqueue_script('axios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js', array(), '0.24.0', true);
    wp_enqueue_script('select-picker', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js', array(), '1.14.0', true);
    wp_enqueue_script('ywos-js', get_template_directory_uri() . '/template-parts/ywos/assets/js/ywos.js', array(), '1.0.0', true);
}
