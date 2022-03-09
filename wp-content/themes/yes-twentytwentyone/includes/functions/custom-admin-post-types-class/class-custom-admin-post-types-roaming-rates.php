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
     
    if (!class_exists('Yesmy_custom_admin_post_type_roaming_rates')) {

        class Yesmy_custom_admin_post_type_roaming_rates {

            protected $post_type    = 'roaming-rates';

            public function __construct() 
            {
                add_filter("manage_{$this->post_type}_posts_columns", [$this, 'manage_admin_columns']);
                add_action("manage_{$this->post_type}_posts_custom_column", [$this, 'manage_admin_column'], 10, 2);
                add_filter("manage_edit-{$this->post_type}_sortable_columns", [$this, 'manage_admin_column_sortable']);
                add_action('pre_get_posts', [$this, 'manage_admin_columns_orderby']);
            }

            public function manage_admin_columns($columns) 
            {
                $new_columns    = [
                    'cb'            => $columns['cb'], 
                    'title'         => __('Title'), 
        
                    'telco_count'   => __('Number of Telcos', 'yes.my'), 
                    'telco_names'   => __('Telco Names', 'yes.my') 
                ];
                return array_merge($columns, $new_columns);
            }
        
            public function manage_admin_column($column_key, $post_id) 
            {
                $telcos     = get_post_meta($post_id, 'yesmy_roaming_operator', true);
                switch ($column_key) {
                    case 'telco_count' : 
                        echo count($telcos);
                        break;
                    case 'telco_names' : 
                        $telco_names    = '';
                        foreach ($telcos as $telco) {
                            $telco_names    .= $telco['yesmy_roaming_operator_name'].', ';
                        }
                        echo rtrim($telco_names, ', ');
                        break;
                    default: 
                }
            }
        
            public function manage_admin_column_sortable($columns) 
            {
                // $columns['telco_count'] = 'roaming_telco_count';
                // $columns['telco_names'] = 'roaming_telco_names';
        
                return $columns;
            }
        
            public function manage_admin_columns_orderby($query) 
            {
                $post_type  = $query->get('post_type');
                if ((!is_admin() || !$query->is_main_query()) || (is_admin() && $post_type != $this->post_type)) return;
        
                $sort_by    = $query->get('orderby');
                $sort_order = $query->get('order');
                switch ($sort_by) {
                    case 'roaming_telco_count' : 
                        $meta_key   = 'yesmy_idd_postpaid_country_code';
                        $meta_type  = 'numeric';
                        break;
                    case 'roaming_telco_count' : 
                        $meta_key   = 'yesmy_idd_postpaid_country_code';
                        $meta_type  = 'numeric';
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