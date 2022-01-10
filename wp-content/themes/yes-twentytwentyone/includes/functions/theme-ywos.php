<?php

function check_child_page_template($template)
{
    global $post;
    if ($post->post_parent) {
        $parent = get_post(
            reset(array_reverse(get_post_ancestors($post->ID)))
        );
        if ($parent->post_name == 'ywos') {
            $child_template = locate_template(
                [
                    'template-parts/ywos/page-'.$post->post_name.'.php', 
                    'template-parts/ywos/page-'.$post->ID.'.php', 
                    'page.php' 
                ]
            );
            if ($child_template) return $child_template;
        }
    }
    return $template;
}

add_filter('page_template', 'check_child_page_template');
