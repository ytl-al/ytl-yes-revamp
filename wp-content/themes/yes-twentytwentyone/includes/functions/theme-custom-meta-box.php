<?php

require_once(THEME_FUNCTIONS_PATH . '/meta-box/meta-box.php');
require_once(THEME_FUNCTIONS_PATH . '/meta-box-class/my-meta-box-class.php');

if (is_admin()) {
    if (!function_exists('add_meta_page_post')) {
        /**
         * Function to add custom meta boxes to page, post, supported-device, newsroom post types
         * 
         * @since    1.0.0
         */
        function add_meta_page_post()
        {
            $prefix = 'yes_';
            // Custom Meta Boxes for Page and Post
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
                    ],

                ]
            ];

            // Custom Meta Boxes for Supported Device
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

            // Custom Meta Boxes for Newsroom
            // $meta_boxes[] = [
            //     'title'         => esc_html__('Additional Info', 'yes.my'),
            //     'id'            => 'yes_release_date_meta',
            //     'post_types'    => ['newsroom'],
            //     'context'       => 'normal',
            //     'revision'      => true,
            //     'fields'        => [
            //         [
            //             'type'       => 'date',
            //             'id'         =>  $prefix . 'release_date',
            //             'name'  => esc_html__('Release date', 'yes.my'),
            //             'attributes' => [
            //                 //'required'  => true,
            //             ],

            //             // Date picker options. See here http://api.jqueryui.com/datepicker
            //             'js_options' => array(
            //                 'dateFormat'      => 'yy-mm-dd',
            //                 'showButtonPanel' => false,
            //             ),

            //             // Display inline?
            //             'inline' => false,

            //             // Save value as timestamp?
            //             'timestamp' => false,
            //         ]
            //     ]
            // ];




            $meta_boxes[] = [
                'title'         => esc_html__('Device Configuration', 'yes.my'),
                'id'            => 'yes_store_device_meta',
                'post_types'    => ['store-device'],
                'context'       => 'normal',
                'revision'      => true,
                'fields' => [
                    
                    [
                        'type' => 'text',
                        'id'   => $prefix . 'device_id',
                        'name' => 'Device Id<sup>*</sup>',
                    ],
                    // [
                    //     'type' => 'text',
                    //     'id'   => $prefix . 'device_name',
                    //     'name' => 'Device Name <sup>*</sup>',
                    // ],
                    [
                        'type' => 'text',
                        'id'   => $prefix . 'device_price_mth',
                        'name' => 'Device Price Monthly<sup>*</sup>',
                    ],
                    [
                        'type' => 'number',
                        'id'   => $prefix . 'device_rrp',
                        'name' => 'Device RRP<sup>*</sup>',
                    ],
                   
                    [
                        'type'    => 'select',
                        'id'      => $prefix . 'device_target',
                        'name'    => 'Device Target <sup>*</sup>',
                        'options' => [
                            ''          => 'Select Type',
                            'elevate'  => 'Elevate',
                            'ywos'     => 'Ywos',
                            'store'  => 'Store',
                        ],
                    ],
					[
                        'type'    => 'text',
                        'id'      => $prefix . 'device_promotion_label',
                        'name'    => 'Promotion Label <sup>*</sup>',
                        'placeholder' => 'Enter Promotion Label',
                        
                    ],
                    [
                        'type'    => 'checkbox',
                        'id'      => $prefix . 'device_features_free',
                        'name'    => 'Device Features Free <sup>*</sup>',
                        'options' => [
                            'free'  => 'Free',
                        ],
                    ],
                    [
                        'type'    => 'checkbox',
                        'id'      => $prefix . 'device_features_hot',
                        'name'    => 'Device Features Hot <sup>*</sup>',
                        'options' => [
                            'hot'  => 'Hot',
                        ],
                    ],

                    [
                        'type'    => 'checkbox',
                        'id'      => $prefix . 'featured_device',
                        'name'    => 'Featured Device <sup>*</sup>',
                        // 'options' => [
                        //     'hot'  => 'Hot',
                        // ],
                    ],

                ],
            ];
            return $meta_boxes;
        }

        add_filter('rwmb_meta_boxes', 'add_meta_page_post');
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

    if (!function_exists('add_meta_topup_roaming_rates')) {
        /**
         * Function to add custom meta boxes to idd postpaid rates post types
         * 
         * @since    1.2.0
         */
        function add_meta_topup_roaming_rates()
        {
            $prefix     = 'yesmy_roaming_topup_';
            $config_custom_fields   = [
                'id'            => 'roaming_topup_info',
                'title'         => 'Roaming top Information',
                'pages'         => ['roaming-rates'],
                'context'       => 'normal',
                'priority'      => 'high',
                'fields'        => [],
                'local_images'  => false,
                'use_with_theme' => true
            ];
            $meta_custom    = new AT_Meta_Box($config_custom_fields);
            $meta_custom->addNumber($prefix . "100mb_per_day",           ['name' => "100MB per day (MYR)"]);
            $meta_custom->addNumber($prefix . "150mb_per_day",           ['name' => "150MB per day (MYR)"]);
            $meta_custom->addNumber($prefix . "200mb_per_day",           ['name' => "200MB per day (MYR)"]);
            $meta_custom->addNumber($prefix . "300mb_per_day",           ['name' => "300MB per day (MYR)"]);
            $meta_custom->addNumber($prefix . "400mb_per_day",           ['name' => "400MB per day (MYR)"]);
            $meta_custom->addNumber($prefix . "500mb_per_day",           ['name' => "500MB per day (MYR)"]);
            $meta_custom->Finish();
        }

        add_action('init', 'add_meta_topup_roaming_rates');
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


    if (!function_exists('add_meta_devices')) {
        /**
         * Function to add custom meta boxes to devices
         * 
         * @since    1.2.0
         */
        function add_meta_devices()
        {
            $prefix     = 'yesmy_devices_';
            $config_custom_fields   = [
                'id'            => 'devices',
                'title'         => 'Device Configuration',
                'post_types'    => ['devices'],
                'context'       => 'normal',
                'priority'      => 'high',
                'fields'        => [],
                'local_images'  => false,
                'use_with_theme' => true
            ];
            $meta_custom    = new AT_Meta_Box($config_custom_fields);
            $meta_fields    = [
                ['type' => 'text',      'id' => $prefix . "device_id",          'name' => 'Device Id<sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "device_name",          'name' => 'Device Name <sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "device_price",        'name' => 'Device Price<sup>*</sup>'],
                ['type' => 'text',      'id' => $prefix . "device_type",          'name' => 'Device Type <sup>*</sup>'],
                ['type' => 'select',    'id' => $prefix . "device_source",        'name' => 'Device Source <sup>*</sup>', 'options' => ['' => 'Select Type', '/elevate' => 'Elevate', '/ywos' => 'Ywos']],

                // ['type' => 'checkbox',  'id' => $prefix . "is_4g_lte",            'name' => 'Roaming Is 4G LTE', 'desc' => 'Roaming is in 4G LTE'],
                // ['type' => 'text',      'id' => $prefix . "call_rate",            'name' => 'Roaming Call Rate <sup>*</sup>'],
                // ['type' => 'text',      'id' => $prefix . "call_back",            'name' => 'Roaming Call Back to Malaysia <sup>*</sup>'],
                // ['type' => 'text',      'id' => $prefix . "call_other_country",   'name' => 'Roaming Call to Other Country <sup>*</sup>'],
                // ['type' => 'text',      'id' => $prefix . "receiving_calls",      'name' => 'Roaming Receiving Calls <sup>*</sup>'],
                // ['type' => 'text',      'id' => $prefix . "sms",                  'name' => 'Roaming SMS <sup>*</sup>'],
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

        add_action('init', 'add_meta_devices');
    }

}
