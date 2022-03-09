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
     
    if (!class_exists('Yesmy_custom_admin_post_type_deals')) {

        class Yesmy_custom_admin_post_type_deals {

            protected $post_type    = 'deals';

            public function __construct() 
            {
                add_filter("manage_{$this->post_type}_posts_columns", [$this, 'manage_admin_columns']);
                add_action("manage_{$this->post_type}_posts_custom_column", [$this, 'manage_admin_column'], 10, 2);
                add_filter("manage_edit-{$this->post_type}_sortable_columns", [$this, 'manage_admin_column_sortable']);
                add_action('pre_get_posts', [$this, 'manage_admin_columns_orderby']);
            }
        
            public function manage_admin_columns($columns) 
            {
                $new_columns    = [];
                $first_part_columns     = [
                    'cb'            => $columns['cb'], 
                    'logo_image'    => __('Logo Image', 'yes.my'), 
                ];
                $second_part_columns    = [
                    'deal_date'     => __('Deal Date', 'yes.my') 
                ];
                $new_columns    = array_merge($first_part_columns, $columns);
                $new_columns    = array_merge($new_columns, $second_part_columns);
                return $new_columns;
            }
        
            public function manage_admin_column($column_key, $post_id) 
            {
                switch ($column_key) {
                    case 'logo_image' : 
                        $img_logo   = get_post_meta($post_id, 'yesmy_deal_logo_image', true);
                        if ($img_logo) {
                            echo ($img_logo && isset($img_logo['url'])) ? "<img src='".$img_logo['url']."' />" : '';
                        }
                        break;
                    case 'deal_date' : 
                        echo get_post_meta($post_id, 'yesmy_deal_date', true);
                        break;
                    default: 
                }
            }
        
            public function manage_admin_column_sortable($columns) 
            {
                $columns['deal_date']   = 'sort_deal_date';
        
                return $columns;
            }
        
            public function manage_admin_columns_orderby($query) 
            {
                $post_type  = $query->get('post_type');
                if ((!is_admin() || !$query->is_main_query()) || (is_admin() && $post_type != $this->post_type)) return;
                
                $sort_by    = $query->get('orderby');
                $sort_order = $query->get('order');
                switch ($sort_by) {
                    case 'sort_deal_date' : 
                        $meta_key   = 'yesmy_deal_date';
                        $meta_type  = '';
                        break;
                    default : 
                        $meta_key   = 'title';
                        $sort_order = ($sort_order == '') ? 'ASC' : $sort_order;
                        $meta_type  = '';
                }
        
                if ($meta_key == 'title') {
                    $query->set('orderby', $meta_key);
                    $query->set('order', $sort_order);
                } else {
                    if ($meta_key != '') {
                        $query->set('meta_key', $meta_key);
                        $query->set('orderby', 'meta_value');
                        $query->set('order', $sort_order);
                    }
                    if ($meta_type != '') $query->set('meta_type', $meta_type);
                }
            }

        }

    }
    
?>