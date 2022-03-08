<?php

function check_child_page_template_elevate($template)
{
    global $post;
    if ($post->post_parent) {
        $parent = get_post(
            reset(array_reverse(get_post_ancestors($post->ID)))
        );
        if ($parent->post_name == 'elevate') {
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
