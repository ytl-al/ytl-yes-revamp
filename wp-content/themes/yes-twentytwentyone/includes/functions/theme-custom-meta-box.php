<?php

require_once(THEME_FUNCTIONS_PATH . '/meta-box/meta-box.php');
require_once(THEME_FUNCTIONS_PATH . '/meta-box-class/my-meta-box-class.php');

if (is_admin()) {
    if (!function_exists('add_meta_page_post')) {
        /**
         * Function to add custom meta boxes to page and post post types
         * 
         * @since    1.0.0
         */
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
                        'rows'  => 10,
                        'sanitize_callback' => 'none'
                    ],
                    [
                        'type'  => 'textarea',
                        'name'  => esc_html__('Custom JavaScript', 'yes.my'),
                        'id'    => $prefix . 'custom_js',
                        'desc'  => esc_html__('Additional JavaScript code for this page', 'yes.my'),
                        'rows'  => 10,
                        'sanitize_callback' => 'none'
                    ]
                ]
            ];
            return $meta_boxes;
        }

        add_filter('rwmb_meta_boxes', 'add_meta_page_post');
    }

    if (!function_exists('add_meta_supported_device')) {
        /**
         * Function to add custom meta boxes to supported device post types
         * 
         * @since    1.2.0
         */
        function add_meta_supported_device()
        {
            $prefix     = 'yes_';
            $meta_boxes[] = [
                'title'         => esc_html__('Additional Info', 'yes.my'),
                'id'            => 'yes_release_date_meta',
                'post_types'    => ['supported-device'],
                'context'       => 'normal',
                'revision'      => true,
                'fields'        => [
                    [
                        'type'       => 'date',
                        'id'         =>  $prefix . 'release_date',
                        'name'  => esc_html__('Release date', 'yes.my'),

                        // Date picker options. See here http://api.jqueryui.com/datepicker
                        'js_options' => array(
                            'dateFormat'      => 'yy-mm-dd',
                            'showButtonPanel' => false,
                        ),

                        // Display inline?
                        'inline' => false,

                        // Save value as timestamp?
                        'timestamp' => false,
                    ]
                ]
            ];
            return $meta_boxes;
        }

        add_filter('rwmb_meta_boxes', 'add_meta_supported_device');
    }

    if (!function_exists('add_meta_newsroom')) {
        /**
         * Function to add custom meta boxes to newsroom post types
         * 
         * @since    1.2.0
         */
        function add_meta_newsroom()
        {
            $prefix     = 'yes_';
            $meta_boxes[] = [
                'title'         => esc_html__('Additional Info', 'yes.my'),
                'id'            => 'yes_release_date_meta',
                'post_types'    => ['news-room'],
                'context'       => 'normal',
                'revision'      => true,
                'fields'        => [
                    [
                        'type'       => 'date',
                        'id'         =>  $prefix . 'release_date',
                        'name'  => esc_html__('Release date', 'yes.my'),
                        'attributes' => [
                            //'required'  => true,
                        ],

                        // Date picker options. See here http://api.jqueryui.com/datepicker
                        'js_options' => array(
                            'dateFormat'      => 'yy-mm-dd',
                            'showButtonPanel' => false,
                        ),

                        // Display inline?
                        'inline' => false,

                        // Save value as timestamp?
                        'timestamp' => false,
                    ]
                ]
            ];
            return $meta_boxes;
        }

        // add_filter('rwmb_meta_boxes', 'add_meta_newsroom');
    }

    if (!function_exists('add_meta_roaming_rates')) {
        /**
         * Function to add custom meta boxes to roaming post types
         * 
         * @since    1.2.0
         */
        function add_meta_roaming_rates()
        {
            $prefix     = 'yesmy_roaming_';
            $config_custom_fields   = [
                'id'            => 'roaming_info',
                'title'         => 'Roaming Telco Information',
                'pages'         => ['roaming-rates'],
                'context'       => 'normal',
                'priority'      => 'high',
                'fields'        => [],
                'local_images'  => false,
                'use_with_theme' => true
            ];
            $meta_custom    = new AT_Meta_Box($config_custom_fields);
            $meta_fields    = [
                ['type' => 'text',      'id' => $prefix . "operator_name",        'name' => 'Roaming Operator Name <sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "internet_rate",        'name' => 'Roaming Internet Rate <sup>*</sup>'],
                ['type' => 'select',    'id' => $prefix . "internet_rate_type",   'name' => 'Roaming Internet Rate Type <sup>*</sup>', 'options' => ['' => 'Select Type', '/MB' => 'MB', '/Day' => 'Day', '/Week' => 'Week', '/Month' => 'Month']],
                ['type' => 'text',      'id' => $prefix . "daily_quota",          'name' => 'Roaming Daily Quota'],
                ['type' => 'textarea',  'id' => $prefix . "quota_disclaimer",     'name' => 'Roaming Quota Disclaimer', 'desc' => 'If telco has quota and disclaimer is blank, will default to display "Once the quota is finished, the data speed will be reduced until your day pass expires without additional cost."'],
                ['type' => 'checkbox',  'id' => $prefix . "is_4g_lte",            'name' => 'Roaming Is 4G LTE', 'desc' => 'Roaming is in 4G LTE'],
                ['type' => 'text',      'id' => $prefix . "call_rate",            'name' => 'Roaming Call Rate <sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "call_back",            'name' => 'Roaming Call Back to Malaysia <sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "call_other_country",   'name' => 'Roaming Call to Other Country <sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "receiving_calls",      'name' => 'Roaming Receiving Calls <sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "sms",                  'name' => 'Roaming SMS <sup>*</sup>'],
            ];

            foreach ($meta_fields as $field) {
                switch ($field['type']) {
                    case 'text':
                        $block_fields[] = $meta_custom->addText($field['id'], ['name' => $field['name']], true);
                        break;
                    case 'textarea':
                        $field_attrs    = ['name' => $field['name']];
                        if (isset($field['desc'])) $field_attrs['desc'] = $field['desc'];
                        $block_fields[] = $meta_custom->addTextarea($field['id'], $field_attrs, true);
                        break;
                    case 'select':
                        $block_fields[] = $meta_custom->addSelect($field['id'], $field['options'], ['name' => $field['name']], true);
                        break;
                    case 'checkbox':
                        $field_attrs    = ['name' => $field['name']];
                        // if (isset($field['desc'])) $field_attrs['desc'] = $field['desc'];
                        $block_fields[] = $meta_custom->addCheckbox($field['id'], $field_attrs, true);
                        break;
                    default:
                }
            }

            $meta_custom->addRepeaterBlock($prefix . "operator", ['name' => 'Telcos', 'fields' => $block_fields]);

            $meta_custom->Finish();
        }

        add_action('init', 'add_meta_roaming_rates');
    }

    if (!function_exists('add_meta_idd_postpaid_rates')) {
        /**
         * Function to add custom meta boxes to idd postpaid rates post types
         * 
         * @since    1.2.0
         */
        function add_meta_idd_postpaid_rates()
        {
            $prefix     = 'yesmy_idd_postpaid_';
            $config_custom_fields   = [
                'id'            => 'idd_postpaid_info',
                'title'         => 'Postpaid IDD Rates Information',
                'pages'         => ['idd-rates'],
                'context'       => 'normal',
                'priority'      => 'high',
                'fields'        => [],
                'local_images'  => false,
                'use_with_theme' => true
            ];
            $meta_custom    = new AT_Meta_Box($config_custom_fields);
            $meta_custom->addText($prefix . "country_code",       ['name' => "Country Code"]);
            $meta_custom->addText($prefix . "call_rate_fixed",    ['name' => "Fixed Call Rate"]);
            $meta_custom->addText($prefix . "call_rate_mobile",   ['name' => "Mobile Call Rate"]);
            $meta_custom->addText($prefix . "sms_rate",           ['name' => "SMS Rate"]);
            $meta_custom->Finish();
        }

        add_action('init', 'add_meta_idd_postpaid_rates');
    }

    if (!function_exists('add_meta_idd_prepaid_rates')) {
        /**
         * Function to add custom meta boxes to idd prepaid rates post types
         * 
         * @since    1.2.0
         */
        function add_meta_idd_prepaid_rates()
        {
            $prefix     = 'yesmy_idd_prepaid_';
            $config_custom_fields   = [
                'id'            => 'idd_prepaid_info',
                'title'         => 'Prepaid IDD Rates Information',
                'pages'         => ['idd-rates'],
                'context'       => 'normal',
                'priority'      => 'high',
                'fields'        => [],
                'local_images'  => false,
                'use_with_theme' => true
            ];
            $meta_custom    = new AT_Meta_Box($config_custom_fields);
            $meta_custom->addText($prefix . "country_code",       ['name' => "Country Code"]);
            $meta_custom->addText($prefix . "call_rate_fixed",    ['name' => "Fixed Call Rate"]);
            $meta_custom->addText($prefix . "call_rate_mobile",   ['name' => "Mobile Call Rate"]);
            $meta_custom->addText($prefix . "sms_rate",           ['name' => "SMS Rate"]);
            $meta_custom->Finish();
        }

        add_action('init', 'add_meta_idd_prepaid_rates');
    }
}
