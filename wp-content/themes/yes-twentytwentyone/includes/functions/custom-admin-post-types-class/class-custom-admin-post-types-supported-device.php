<?php

    /*
     * Functions to manage the admin page for custom post type "IDD Rates"
     */
    
    /**
     * Customizing admin page for custom post type "IDD Rates".
     * 
     * @link https://developer.wordpress.org/reference/hooks/manage_posts_columns/
     * @link https://developer.wordpress.org/reference/hooks/manage_posts_custom_column/
     * @link https://developer.wordpress.org/reference/hooks/manage_this-screen-id_sortable_columns/
     * @link https://developer.wordpress.org/reference/hooks/pre_get_posts/
     */
     
    if (!class_exists('Yesmy_custom_admin_post_type_supported_device')) {

        class Yesmy_custom_admin_post_type_supported_device {

            protected $post_type    = 'supported-device';

            public function __construct() 
            {
                add_filter("manage_{$this->post_type}_posts_columns", [$this, 'manage_admin_columns']);
                add_action("manage_{$this->post_type}_posts_custom_column", [$this, 'manage_admin_column'], 10, 2);
                add_action('pre_get_posts', [$this, 'manage_admin_columns_orderby']);
            }
        
            public function manage_admin_columns($columns) 
            {
                $new_columns    = [
                    'cb'            => $columns['cb'], 
                    'device_image'  => __('Device Image')  
                ];
                return array_merge($new_columns, $columns);
            }
        
            public function manage_admin_column($column_key, $post_id) 
            {
                switch ($column_key) {
                    case 'device_image' : 
                        $thumbnail_url  = get_the_post_thumbnail_url($post_id);
                        if ($thumbnail_url) {
                            echo "<img src='$thumbnail_url' />";
                        }
                        break;
                    default: 
                }
            }
        
            public function manage_admin_columns_orderby($query) 
            {
                $post_type  = $query->get('post_type');
                if ((!is_admin() || !$query->is_main_query()) || (is_admin() && $post_type != $this->post_type)) return;
        
                $sort_by    = $query->get('orderby');
                $sort_order = ($query->get('order') == '') ? 'ASC' : $query->get('order');
        
                $query->set('orderby', 'title');
                $query->set('order', $sort_order);
            }

        }

    }
    
?>