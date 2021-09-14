<?php
require_once(THEME_FUNCTIONS_PATH . '/meta-box/meta-box.php');

if (is_admin()) {
    /**
     * Function to add custom meta boxes to page and post post types
     * 
     * @since    1.0.0
     */
    if (!function_exists('add_meta_page_post')) {
        function add_meta_page_post()
        {
            $prefix = 'yes_';
            $meta_boxes[]   = [
                'title'         => esc_html__('Additional Content Code', 'yes.my'),
                'id'            => 'yes_code_meta',
                'post_types'    => ['post', 'page'],
                'context'       => 'normal',
                'revision'      => true,
                'fields'        => [
                    [
                        'type'  => 'textarea',
                        'name'  => esc_html__('Custom CSS', 'yes.my'),
                        'id'    => $prefix . 'custom_css',
                        'desc'  => esc_html__('Additional CSS code for this page', 'yes.my'),
                        'rows'  => 10
                    ],
                    [
                        'type'  => 'textarea',
                        'name'  => esc_html__('Custom JavaScript', 'yes.my'),
                        'id'    => $prefix . 'custom_js',
                        'desc'  => esc_html__('Additional JavaScript code for this page', 'yes.my'),
                        'rows'  => 10
                    ]
                ]
            ];
            return $meta_boxes;
        }

        add_filter('rwmb_meta_boxes', 'add_meta_page_post');
    }
}
