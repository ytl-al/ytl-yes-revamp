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
     
    if (!class_exists('Yesmy_custom_admin_post_type_idd_rates')) {

        class Yesmy_custom_admin_post_type_idd_rates {

            protected $post_type    = 'idd-rates';

            public function __construct() 
            {
                add_filter("manage_{$this->post_type}_posts_columns", [$this, 'manage_admin_columns']);
                add_action("manage_{$this->post_type}_posts_custom_column", [$this, 'manage_admin_column'], 10, 2);
                add_filter("manage_edit-{$this->post_type}_sortable_columns", [$this, 'manage_admin_column_sortable']);
                add_action('pre_get_posts', [$this, 'manage_admin_columns_orderby']);
            }

            public function idd_rates_filter_posts_columns($columns) 
            {
                $columns['country_code']        = __('Country Code', 'yes.my');
                $columns['postpaid_fixed_rate'] = __('Postpaid Fixed Call Rate', 'yes.my');
                $columns['postpaid_mobile_rate']= __('Postpaid Mobile Call Rate', 'yes.my');
                $columns['postpaid_sms_rate']   = __('Postpaid SMS Rate', 'yes.my');
        
                $columns['prepaid_fixed_rate']  = __('Prepaid Fixed Call Rate', 'yes.my');
                $columns['prepaid_mobile_rate'] = __('Prepaid Mobile Call Rate', 'yes.my');
                $columns['prepaid_sms_rate']    = __('Prepaid SMS Rate', 'yes.my');
        
                return $columns;
            }
        
            public function manage_admin_columns($columns) 
            {
                $new_columns    = [
                    'cb'                    => $columns['cb'], 
                    'title'                 => __('Title'), 
        
                    'country_code'          => __('Country Code', 'yes.my'), 
        
                    'postpaid_rate_fixed'   => __('Postpaid Fixed Call Rate', 'yes.my'), 
                    'postpaid_rate_mobile'  => __('Postpaid Mobile Call Rate', 'yes.my'), 
                    'postpaid_rate_sms'     => __('Postpaid SMS Rate', 'yes.my'), 
        
                    'prepaid_rate_fixed'    => __('Prepaid Fixed Call Rate', 'yes.my'), 
                    'prepaid_rate_mobile'   => __('Prepaid Mobile Call Rate', 'yes.my'), 
                    'prepaid_rate_sms'      => __('Prepaid SMS Rate', 'yes.my'), 
                ];
                return array_merge($columns, $new_columns);
            }
        
            public function manage_admin_column($column_key, $post_id) 
            {
                switch ($column_key) {
                    case 'country_code' : 
                        echo get_post_meta($post_id, 'yesmy_idd_postpaid_country_code', true);
                        break;
                    case 'postpaid_rate_fixed' : 
                        echo get_post_meta($post_id, 'yesmy_idd_postpaid_call_rate_fixed', true);
                        break;
                    case 'postpaid_rate_mobile' : 
                        echo get_post_meta($post_id, 'yesmy_idd_postpaid_call_rate_mobile', true);
                        break;
                    case 'postpaid_rate_sms' : 
                        echo get_post_meta($post_id, 'yesmy_idd_postpaid_sms_rate', true);
                        break;
                    case 'prepaid_rate_fixed' : 
                        echo get_post_meta($post_id, 'yesmy_idd_prepaid_call_rate_fixed', true);
                        break;
                    case 'prepaid_rate_mobile' : 
                        echo get_post_meta($post_id, 'yesmy_idd_prepaid_call_rate_mobile', true);
                        break;
                    case 'prepaid_rate_sms' : 
                        echo get_post_meta($post_id, 'yesmy_idd_prepaid_sms_rate', true);
                        break;
                    default: 
                }
            }
        
            public function manage_admin_column_sortable($columns) 
            {
                $columns['country_code']        = 'idd_country_code';
        
                $columns['postpaid_rate_fixed'] = 'idd_postpaid_rate_fixed';
                $columns['postpaid_rate_mobile']= 'idd_postpaid_rate_mobile';
                $columns['postpaid_rate_sms']   = 'idd_postpaid_rate_sms';
        
                $columns['prepaid_rate_fixed']  = 'idd_prepaid_rate_fixed';
                $columns['prepaid_rate_mobile'] = 'idd_prepaid_rate_mobile';
                $columns['prepaid_rate_sms']    = 'idd_prepaid_rate_sms';
        
                return $columns;
            }
        
            public function manage_admin_columns_orderby($query) 
            {
                $post_type  = $query->get('post_type');
                if ((!is_admin() || !$query->is_main_query()) || (is_admin() && $post_type != $this->post_type)) return;
        
                $sort_by    = $query->get('orderby');
                $sort_order = $query->get('order');
                switch ($sort_by) {
                    case 'idd_country_code' : 
                        $meta_key   = 'yesmy_idd_postpaid_country_code';
                        $meta_type  = 'numeric';
                        break;
                    case 'postpaid_rate_fixed' : 
                        $meta_key   = 'yesmy_idd_postpaid_call_rate_fixed';
                        $meta_type  = 'numeric';
                        break;
                    case 'postpaid_rate_mobile' : 
                        $meta_key   = 'yesmy_idd_postpaid_call_rate_mobile';
                        $meta_type  = 'numeric';
                        break;
                    case 'postpaid_rate_sms' : 
                        $meta_key   = 'yesmy_idd_postpaid_sms_rate';
                        $meta_type  = 'numeric';
                        break;
                    case 'prepaid_rate_fixed' : 
                        $meta_key   = 'yesmy_idd_prepaid_call_rate_fixed';
                        $meta_type  = 'numeric';
                        break;
                    case 'prepaid_rate_mobile' : 
                        $meta_key   = 'yesmy_idd_prepaid_call_rate_mobile';
                        $meta_type  = 'numeric';
                        break;
                    case 'prepaid_rate_sms' : 
                        $meta_key   = 'yesmy_idd_prepaid_sms_rate';
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