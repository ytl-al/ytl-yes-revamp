<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/admin
 * @author     YTL Digital Design [AL Latif Mohamad] <latif.mohamad@ytl.com>
 */
class Ytl_Pull_Data_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * The prefix for variables.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $prefix     The prefix for variables or options to be used.
     */
    private $prefix;

    /**
     * The api path to auth.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $api_app_version     The version for API to be used.
     */
    private $api_app_version;

    /**
     * The api path to auth.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $api_locale          The locale for API url to be used.
     */
    private $api_locale;

    /**
     * The api path to auth.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $auth_path_auth      The authentication path for API url to be used.
     */
    private $auth_path_auth;

    /**
     * The api path to auth.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $get_all_plans_path  The all plans path for API url to be used.
     */
    private $get_all_plans_path;

    /**
     * The api path to auth.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $get_all_plans_with_addons_path  The all plans with addons path for API url to be used.
     */
    private $get_all_plans_with_addons_path;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version, $prefix)
    {
        $this->plugin_name     = $plugin_name;
        $this->version         = $version;
        $this->prefix        = $prefix;
        $this->api_app_version      = '1.1';
        $this->api_locale           = 'EN';
        $this->auth_path_auth       = '/mobileyos/mobile/ws/v1/json/auth/getBasicAuth';
        $this->get_all_plans_path   = '/mobileyos/mobile/ws/v1/json/getAllPlans';
        $this->get_all_plans_with_addons_path = '/mobileyos/mobile/ws/v1/json/getAllPlansWithAddons';
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Ytl_Pull_Data_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Ytl_Pull_Data_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ytl-pull-data-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Ytl_Pull_Data_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Ytl_Pull_Data_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ytl-pull-data-admin.js', array('jquery'), $this->version, false);
    }

    /**
     * Register the settings page for the admin area.
     *
     * @since 	 1.0.0
     */
    public function register_settings_page()
    {
        add_menu_page(
            __('YTL API Pull Data', 'ytl-pull-data'),          // page title
            __('YTL API Pull Data', 'ytl-pull-data'),          // menu title
            'manage_options',                                 // capability
            'ytl-pull-data',                                 // menu slug
            array($this, 'display_settings_page'),             // callable function
            'dashicons-open-folder',                         // icon url - https://developer.wordpress.org/resource/dashicons
            65                                                // menu position
        );
    }

    /**
     * Display the settings page content for the page we have created.
     *
     * @since 	 1.0.0
     */
    public function display_settings_page()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/ytl-pull-data-admin-display.php';
    }

    /**
     * Register the settings for our settings page.
     * 
     * @since 	 1.0.0
     */
    public function register_settings()
    {
        $settings_id         = $this->prefix . "settings";
        $settngs_section_id    = $this->prefix . "settings_section";

        register_setting(
            $settings_id,
            $settings_id,
            array($this, 'sandbox_register_setting')
        );

        add_settings_section(
            $settngs_section_id,
            __('Settings', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_section'),
            $settings_id
        );

        add_settings_field(
            $this->prefix . "api_url_domain",
            __('YTL Pull Data API URL Domain', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_field_input_url'),
            $settings_id,
            $settngs_section_id,
            array(
                'label_for'        => $this->prefix . "api_domain_url",
                'default'         => '',                      // https://jsonplaceholder.typicode.com/posts
                'description'    => __('The URL domain for the YTL Pull Data API from CRM', 'ytl-pull-data')
            )
        );

        add_settings_field(
            $this->prefix . "api_request_id",
            __('YTL Pull Data API Request ID', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_field_input_text'),
            $settings_id,
            $settngs_section_id,
            array(
                'label_for'        => $this->prefix . "api_request_id",
                'default'         => '',
                'description'    => __('The request ID for YTL Pull Data API to retrieve the plans', 'ytl-pull-data')
            )
        );

        add_settings_field(
            $this->prefix . "api_authorization_key",
            __('YTL Pull Data API Authorization Key', 'ytl-pull-data'),
            array($this, 'sandbox_add_settings_field_input_text'),
            $settings_id,
            $settngs_section_id,
            array(
                'label_for'        => $this->prefix . "api_authorization_key",
                'default'         => '',
                'description'    => __('The authorization key used for YTL Pull Data API to retrieve the session id', 'ytl-pull-data')
            )
        );
    }

    /**
     * Sandbox our settings.
     *
     * @since 	 1.0.0
     */
    public function sandbox_register_setting($input)
    {
        $new_input         = array();
        $valid_submit   = true;

        if (isset($input)) {
            foreach ($input as $key => $value) {
                $new_input[$key] = sanitize_text_field($value);
                if ($value == '' || !$valid_submit) {
                    $valid_submit   = false;
                }
            }
        }

        if ($valid_submit) {
            add_settings_error('ytlpd_messages', 'ytlpd_message', __('API Information has been saved! Please go to <a href="?page=ytl-pull-data-action">Pull Plans</a> page to pull the latest plans.', 'ytl-pull-data'), 'updated');
        } else {
            add_settings_error('ytlpd_messages', 'ytlpd_message', __('Please fill up the API URL & API Key fields!', 'ytl-pull-data'), 'error');
        }

        return $new_input;
    }

    /**
     * Sandbox our section for the settings.
     *
     * @since 	 1.0.0
     */
    public function sandbox_add_settings_section()
    {
        return;
    }

    /**
     * Sandbox our inputs with type url
     *
     * @since 	 1.0.0
     */
    public function sandbox_add_settings_field_input_url($args)
    {
        $field_id         = $args['label_for'];
        $field_default    = $args['default'];
        $field_desc        = esc_html($args['description']);

        $options     = get_option($this->prefix . "settings");
        $option     = $field_default;

        if (!empty($options[$field_id])) {
            $option = $options[$field_id];
        }

        $input_id     = $this->prefix . "settings[$field_id]";
        $input_name    = $this->prefix . "settings[$field_id]";
        $input_value = esc_attr($option);
        $html_input = "	<input type='url' class='regular-text' id='$input_id' name='$input_name' value='$input_value' />
						<p class='description'><em>$field_desc</em></p>";

        echo $html_input;
    }

    /**
     * Sandbox our inputs with type text
     *
     * @since 	 1.0.0
     */
    public function sandbox_add_settings_field_input_text($args)
    {
        $field_id         = $args['label_for'];
        $field_default    = $args['default'];
        $field_desc        = esc_html($args['description']);

        $options     = get_option($this->prefix . "settings");
        $option     = $field_default;

        if (!empty($options[$field_id])) {
            $option = $options[$field_id];
        }

        $input_id     = $this->prefix . "settings[$field_id]";
        $input_name    = $this->prefix . "settings[$field_id]";
        $input_value = esc_attr($option);
        $html_input = "	<input type='text' class='regular-text' id='$input_id' name='$input_name' value='$input_value' />
						<p class='description'><em>$field_desc</em></p>";

        echo $html_input;
    }

    /**
     * Register the action to pull plans page for the admin area.
     *
     * @since 	 1.0.0
     */
    public function register_action_page()
    {
        add_submenu_page(
            'ytl-pull-data',                                         // parent slug
            __('YTL API Pull Data - Pull Plans', 'ytl-pull-data'),     // page title
            __('Pull Plans', 'ytl-pull-data'),                      // menu title
            'manage_options',                                        // capability
            'ytl-pull-data-action',                                  // menu_slug
            array($this, 'display_action_page')                      // callable function
        );
    }

    /**
     * Display the action page content for the page we have created.
     *
     * @since 	 1.0.0
     */
    public function display_action_page()
    {
        /** Manual add additional plans STARTS */
        // $plans = get_option('ytlpd_plans_data');
        // $plans_obj = unserialize($plans);
        // $new_plans_standalone = json_decode('{ "displayName": "Yes Wireless Fibre 120Mbps", "planType": "postpaid", "planName": "Yes Wireless Fibre 120Mbps", "mobilePlanId": "946", "contractPeriod": "24 months", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "148.00", "monthlyCommitment": "148.00", "totalAmountWithoutSST": "148.00", "totalAmountWithSST": "156.90", "totalSST": "8.88", "roundingAdjustment": "0.02", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "5G", "supportingDocAgeLimit": null, "bundleName": null, "pricingComponentList": [ { "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "148.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" } ], "simplifiedItemPricingList": [], "supplementaryBundlePlans": [], "addonListServiceTypes": null, "addonListByCategory": null, "zoomPlan": false, "codEligible": false, "referralApplicable": false, "bundlePlan": true, "mnpApplicable": true, "supportingDocRequired": false }');
        // $new_plans_bundle = json_decode('{ "displayName": "Yes Wireless Fibre 120Mbps Bundle", "planType": "postpaid", "planName": "Yes Wireless Fibre 120Mbps Bundle", "mobilePlanId": "948", "contractPeriod": "24 months", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "229.00", "monthlyCommitment": "229.00", "totalAmountWithoutSST": "229.00", "totalAmountWithSST": "242.75", "totalSST": "13.74", "roundingAdjustment": "0.01", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "5G", "supportingDocAgeLimit": null, "bundleName": null, "pricingComponentList": [ { "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "229.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" } ], "simplifiedItemPricingList": [], "supplementaryBundlePlans": [ { "planName": "Infinite Basic_s", "planPrice": "0.00" }, { "planName": "Infinite Basic_s", "planPrice": "0.00" } ], "addonListServiceTypes": null, "addonListByCategory": null, "zoomPlan": false, "codEligible": false, "referralApplicable": false, "bundlePlan": true, "mnpApplicable": true, "supportingDocRequired": false }');
        // $plans_obj['postpaid'][946] = $new_plans_standalone;
        // $plans_obj['postpaid'][948] = $new_plans_bundle;
        // $new_plans_standalone = json_decode('{ "displayName": "Yes Wireless Fibre 120Mbps_Promo", "planType": "postpaid", "planName": "Yes Wireless Fibre 120Mbps_Promo", "mobilePlanId": "955", "contractPeriod": "24 months", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "129.00", "monthlyCommitment": "129.00", "totalAmountWithoutSST": "129.00", "totalAmountWithSST": "136.75", "totalSST": "7.74", "roundingAdjustment": "0.01", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "5G", "supportingDocAgeLimit": null, "bundleName": null, "pricingComponentList": [ { "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "129.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" } ], "simplifiedItemPricingList": [], "addonListServiceTypes": null, "addonListByCategory": null, "supplementaryBundlePlans": [], "referralApplicable": false, "bundlePlan": true, "mnpApplicable": false, "zoomPlan": false, "codEligible": false, "supportingDocRequired": false }');
        // $new_plans_bundle = json_decode('{ "displayName": "Yes Wireless Fibre 120Mbps Bundle_Promo", "planType": "postpaid", "planName": "Yes Wireless Fibre 120Mbps Bundle_Promo", "mobilePlanId": "957", "contractPeriod": "", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "199.00", "monthlyCommitment": "199.00", "totalAmountWithoutSST": "199.00", "totalAmountWithSST": "210.95", "totalSST": "11.94", "roundingAdjustment": "0.01", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "5G", "supportingDocAgeLimit": null, "bundleName": null, "pricingComponentList": [ { "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "199.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" } ], "simplifiedItemPricingList": [], "addonListServiceTypes": null, "addonListByCategory": null, "supplementaryBundlePlans": [ { "planName": "Infinite Basic Supplementary Bundle", "planPrice": 0.0 }, { "planName": "Infinite Basic Supplementary Bundle", "planPrice": 0.0 } ], "referralApplicable": false, "bundlePlan": true, "mnpApplicable": false, "zoomPlan": false, "codEligible": false, "supportingDocRequired": false }');
        // $plans_obj['postpaid'][955] = $new_plans_standalone;
        // $plans_obj['postpaid'][957] = $new_plans_bundle;
        // $plans_obj['postpaid']['998']->bundleName = 'Home Broadband';
        // $new_plan_960 = json_decode('{ "displayName": "Yes LTE 68_70GB_Zoom Promotion", "planType": "postpaid", "planName": "Yes LTE 68_70GB_Zoom Promotion", "mobilePlanId": "960", "contractPeriod": "12 months", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "68.00", "monthlyCommitment": "68.00", "totalAmountWithoutSST": "68.00", "totalAmountWithSST": "72.10", "totalSST": "4.08", "roundingAdjustment": "0.02", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "NORMAL", "supportingDocAgeLimit": null, "bundleName": "Home Broadband", "addonListServiceTypes": [{ "serviceTypeCategory": "LTE", "addonPackageInfoList": [{ "addonName": "Postpaid Data 10GB RM10", "displayAddonName": "Postpaid Data 10GB RM10", "amount": 10.0, "displayAmount": "RM 10.00", "totalAmount": 10.6, "displayTotalAmount": "RM 10.60", "validityDays": 7, "displayValidityDays": "7 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "10.0", "displayResourceValue": "10.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "0.60", "displayValue": "RM 0.60" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 20GB RM20", "displayAddonName": "Postpaid Data 20GB RM20", "amount": 20.0, "displayAmount": "RM 20.00", "totalAmount": 21.2, "displayTotalAmount": "RM 21.20", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "20.0", "displayResourceValue": "20.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.20", "displayValue": "RM 1.20" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 30GB RM30", "displayAddonName": "Postpaid Data 30GB RM30", "amount": 30.0, "displayAmount": "RM 30.00", "totalAmount": 31.8, "displayTotalAmount": "RM 31.80", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "30.0", "displayResourceValue": "30.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.80", "displayValue": "RM 1.80" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }]}], "pricingComponentList": [{ "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "68.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" }], "simplifiedItemPricingList": [], "zoomPlan": false, "codEligible": false, "referralApplicable": false, "bundlePlan": true, "mnpApplicable": false, "supportingDocRequired": false }');
        // $new_plan_961 = json_decode('{ "displayName": "Yes LTE 98_100GB_Zoom Promotion", "planType": "postpaid", "planName": "Yes LTE 98_100GB_Zoom Promotion", "mobilePlanId": "961", "contractPeriod": "12 months", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "98.00", "monthlyCommitment": "98.00", "totalAmountWithoutSST": "98.00", "totalAmountWithSST": "103.90", "totalSST": "5.88", "roundingAdjustment": "0.02", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "NORMAL", "supportingDocAgeLimit": null, "bundleName": "Home Broadband", "addonListServiceTypes": [{ "serviceTypeCategory": "LTE", "addonPackageInfoList": [{ "addonName": "Postpaid Data 10GB RM10", "displayAddonName": "Postpaid Data 10GB RM10", "amount": 10.0, "displayAmount": "RM 10.00", "totalAmount": 10.6, "displayTotalAmount": "RM 10.60", "validityDays": 7, "displayValidityDays": "7 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "10.0", "displayResourceValue": "10.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "0.60", "displayValue": "RM 0.60" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 20GB RM20", "displayAddonName": "Postpaid Data 20GB RM20", "amount": 20.0, "displayAmount": "RM 20.00", "totalAmount": 21.2, "displayTotalAmount": "RM 21.20", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "20.0", "displayResourceValue": "20.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.20", "displayValue": "RM 1.20" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 30GB RM30", "displayAddonName": "Postpaid Data 30GB RM30", "amount": 30.0, "displayAmount": "RM 30.00", "totalAmount": 31.8, "displayTotalAmount": "RM 31.80", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "30.0", "displayResourceValue": "30.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.80", "displayValue": "RM 1.80" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }]}], "pricingComponentList": [{ "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "98.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" }], "simplifiedItemPricingList": [], "zoomPlan": false, "codEligible": false, "referralApplicable": false, "bundlePlan": true, "mnpApplicable": false, "supportingDocRequired": false }');
        // $new_plan_962 = json_decode('{ "displayName": "Yes LTE 128_130GB_Zoom Promotion", "planType": "postpaid", "planName": "Yes LTE 128_130GB_Zoom Promotion", "mobilePlanId": "962", "contractPeriod": "12 months", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "128.00", "monthlyCommitment": "128.00", "totalAmountWithoutSST": "128.00", "totalAmountWithSST": "135.70", "totalSST": "7.68", "roundingAdjustment": "0.02", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "NORMAL", "supportingDocAgeLimit": null, "bundleName": "Home Broadband", "addonListServiceTypes": [{ "serviceTypeCategory": "LTE", "addonPackageInfoList": [{ "addonName": "Postpaid Data 10GB RM10", "displayAddonName": "Postpaid Data 10GB RM10", "amount": 10.0, "displayAmount": "RM 10.00", "totalAmount": 10.6, "displayTotalAmount": "RM 10.60", "validityDays": 7, "displayValidityDays": "7 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "10.0", "displayResourceValue": "10.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "0.60", "displayValue": "RM 0.60" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 20GB RM20", "displayAddonName": "Postpaid Data 20GB RM20", "amount": 20.0, "displayAmount": "RM 20.00", "totalAmount": 21.2, "displayTotalAmount": "RM 21.20", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "20.0", "displayResourceValue": "20.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.20", "displayValue": "RM 1.20" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 30GB RM30", "displayAddonName": "Postpaid Data 30GB RM30", "amount": 30.0, "displayAmount": "RM 30.00", "totalAmount": 31.8, "displayTotalAmount": "RM 31.80", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "30.0", "displayResourceValue": "30.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.80", "displayValue": "RM 1.80" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }]}], "pricingComponentList": [{ "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "128.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" }], "simplifiedItemPricingList": [], "zoomPlan": false, "codEligible": false, "referralApplicable": false, "bundlePlan": true, "mnpApplicable": false, "supportingDocRequired": false }');
        // $new_plan_963 = json_decode('{ "displayName": "Yes LTE 148_150GB_Zoom Promotion", "planType": "postpaid", "planName": "Yes LTE 148_150GB_Zoom Promotion", "mobilePlanId": "963", "contractPeriod": "12 months", "internetData": "", "internetVoice": null, "internetSms": null, "notes": "", "allowedCustomerType": null, "totalAmount": "148.00", "monthlyCommitment": "148.00", "totalAmountWithoutSST": "148.00", "totalAmountWithSST": "156.90", "totalSST": "8.88", "roundingAdjustment": "0.02", "foreignerDeposit": "200.00", "freePlan": false, "menuType": "NORMAL", "supportingDocAgeLimit": null, "bundleName": "Home Broadband", "addonListServiceTypes": [{ "serviceTypeCategory": "LTE", "addonPackageInfoList": [{ "addonName": "Postpaid Data 10GB RM10", "displayAddonName": "Postpaid Data 10GB RM10", "amount": 10.0, "displayAmount": "RM 10.00", "totalAmount": 10.6, "displayTotalAmount": "RM 10.60", "validityDays": 7, "displayValidityDays": "7 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "10.0", "displayResourceValue": "10.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "0.60", "displayValue": "RM 0.60" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 20GB RM20", "displayAddonName": "Postpaid Data 20GB RM20", "amount": 20.0, "displayAmount": "RM 20.00", "totalAmount": 21.2, "displayTotalAmount": "RM 21.20", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "20.0", "displayResourceValue": "20.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.20", "displayValue": "RM 1.20" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }, { "addonName": "Postpaid Data 30GB RM30", "displayAddonName": "Postpaid Data 30GB RM30", "amount": 30.0, "displayAmount": "RM 30.00", "totalAmount": 31.8, "displayTotalAmount": "RM 31.80", "validityDays": 30, "displayValidityDays": "30 DAYS", "addonResourceInfoList": [{ "serviceAlias": "LTE_DATA", "resourceType": "DATA", "resourceValue": "30.0", "displayResourceValue": "30.0 GB" }], "eligibleForYesCreditPurchase": false, "eligibleForMyRewardPurchase": false, "eligibleForPostpaidPaylater": false, "eligibleForAutoRenewal": false, "paymentDeductionInfoList": [{ "type": "SST", "value": "1.80", "displayValue": "RM 1.80" }], "rechargePackageName": null, "eligibleForPlanUpgrade": false, "konfem4GMessage": null, "konfem4GMessageType": null, "footNoteMessageList": null, "freeAddon": false, "autopayAddonPackageInfo": null, "unlimited": false }]}], "pricingComponentList": [{ "pricingComponentName": "Postpaid Foreigner Deposit", "pricingComponentValue": "200.00" }, { "pricingComponentName": "Postpaid Device Price", "pricingComponentValue": "0.00" }, { "pricingComponentName": "Plan Advanced Payment", "pricingComponentValue": "148.00" }, { "pricingComponentName": "Postpaid Device Upfront Payment", "pricingComponentValue": "0.00" }], "simplifiedItemPricingList": [], "zoomPlan": false, "codEligible": false, "referralApplicable": false, "bundlePlan": true, "mnpApplicable": false, "supportingDocRequired": false }');
        // $plans_obj['postpaid'][960] = $new_plan_960;
        // $plans_obj['postpaid'][961] = $new_plan_961;
        // $plans_obj['postpaid'][962] = $new_plan_962;
        // $plans_obj['postpaid'][963] = $new_plan_963;
        // print_r(serialize($plans_obj));
        // update_option('ytlpd_plans_data', serialize($plans_obj), false);
        // update_option('ytlpd_updated_at', strtotime(current_time('mysql')), false);
        /** Manual add additional plans ENDS */

        if (isset($_POST['trigger_pull_data']) && check_admin_referer('pull_plans_btn_clicked')) {
            $ytlpd_options    = get_option($this->prefix . "settings");
            if (!empty($ytlpd_options['ytlpd_api_domain_url'])) {
                $domain_url            = $ytlpd_options['ytlpd_api_domain_url'];
            }
            if (!empty($ytlpd_options['ytlpd_api_request_id'])) {
                $request_id         = $ytlpd_options['ytlpd_api_request_id'];
            }
            if (!empty($ytlpd_options['ytlpd_api_authorization_key'])) {
                $authorization_key  = $ytlpd_options['ytlpd_api_authorization_key'];
            }

            if (isset($domain_url) && isset($request_id) && isset($authorization_key)) {
                $this->ytlpd_pull_plans_api($domain_url, $request_id, $authorization_key);
            } else {
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Could not pull plans. Please check the API information in <a href="?page=ytl-pull-data">API Information Settings</a> page.', 'ytl-pull-data'), 'error');
            }
        }
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/ytl-pull-data-admin-action-display.php';
    }

    /**
     * Function to pull the plans through API, and save the data in the database. To retrieve the plan data, use this function - get_option('ytlpd_plans_data'). This function will also clear the cache from W3 Total Cache plugin.
     * 
     * @since    1.0.0
     * 
     * @param    string     $domain_url         The URL domain to the plans API.
     * @param    string     $request_id         The request id to be used to call the API.
     * @param    string     $authorization_key  The authorization key to be used to call the API.
     */
    public function ytlpd_pull_plans_api($domain_url = null, $request_id = null, $authorization_key = null)
    {
        $generate_auth_token    = $this->generate_auth_token($domain_url, $request_id, $authorization_key);
        if ($generate_auth_token) {
            $get_session_data   = get_option($this->prefix . "basic_auth_token");
            $session_data       = unserialize($get_session_data);
            $session_id         = $session_data['basicAuthToken'];

            $params     = ['appVersion' => $this->api_app_version, 'locale' => $this->api_locale, 'requestId' => $request_id, 'sessionId' => $session_id];
            $args       = [
                'headers'       => array('Content-Type' => 'application/json; charset=utf-8'),
                'body'          => json_encode($params),
                'method'        => 'POST',
                'data_format'   => 'body',
                'timeout'       => 180
            ];
            $api_url    = $domain_url . $this->get_all_plans_with_addons_path;
            $request    = wp_remote_post($api_url, $args);
            $response   = (!is_wp_error($request)) ? $request['response'] : [];
            $res_code   = (!is_wp_error($request)) ? $response['code'] : 0;

            if (is_wp_error($request)) {
                $error_message  = $response->get_error_message();
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on getting all plans: ', 'ytl-pull-data') . $error_message, 'error');
            } else if ($res_code != 200) {
                if (isset($response['message'])) {
                    $error_message  = $response['message'];
                    add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on getting all plans: ', 'ytl-pull-data') . "<strong><em>$error_message</em></strong>", 'error');
                }
            } else {
                $data       = json_decode($request['body']);
                $plan_data  = array();
                foreach ($data->planDetails as $plan_details) {
                    $plan_data[$plan_details->planType][$plan_details->mobilePlanId]   = $plan_details;
                }
                update_option('ytlpd_plans_data', serialize($plan_data), false);
                update_option('ytlpd_updated_at', strtotime(current_time('mysql')), false);

                add_settings_error('ytlpd_messages', 'ytlpd_message', __('YES plans have been successfully pulled and saved!', 'ytl-pull-data'), 'updated');

                if (function_exists('w3tc_flush_all')) {
                    w3tc_flush_all();
                }
            }
        }
    }

    /**
     * Function to pull the plans through API, and save the data in the database. To retrieve the plan data, use this function - get_option('ytlpd_plans_data'). This function will also clear the cache from W3 Total Cache plugin.
     * 
     * @since    1.0.0
     * 
     * @param    string     $domain_url         The URL domain to the plans API.
     * @param    string     $request_id         The request id to be used to call the API.
     * @param    string     $authorization_key  The authorization key to be used to call the API.
     */
    private function generate_auth_token($domain_url = null, $request_id = null, $authorization_key = null)
    {
        $return     = false;
        $params     = ['requestId' => $request_id, 'locale' => $this->api_locale];
        $args       = [
            'headers'       => array('Content-Type' => 'application/json; charset=utf-8', 'Authorization' => 'BASIC ' . $authorization_key),
            'body'          => json_encode($params),
            'method'        => 'POST',
            'data_format'   => 'body'
        ];
        $api_url    = $domain_url . $this->auth_path_auth;
        $request    = wp_remote_post($api_url, $args);
        $response   = $request['response'];
        $res_code   = $response['code'];

        if (is_wp_error($request)) {
            $error_message  = $response->get_error_message();
            add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on generating auth token: ', 'ytl-pull-data') . $error_message, 'error');
        } else if ($res_code != 200) {
            if (isset($response['message'])) {
                $error_message  = $response['message'];
                add_settings_error('ytlpd_messages', 'ytlpd_message', __('Something went wrong on generating auth token: ', 'ytl-pull-data') . "<strong><em>$error_message</em></strong>", 'error');
            }
        } else {
            $data   = json_decode($request['body']);
            update_option('ytlpd_basic_auth_token', serialize(['basicAuthToken' => $data->basicAuthToken]), false);
            $return = $data->basicAuthToken;
        }
        return $return;
    }

    public function register_promo_data_page()
    {
        add_submenu_page(
            'ytl-pull-data',                                                     // parent slug
            __('YTL API Pull Data - Promo Customer Data', 'ytl-pull-data'),     // page title
            __('Promo Customer Data', 'ytl-pull-data'),                          // menu title
            'manage_options',                                                    // capability
            'ytl-pull-data-promo',                                              // menu_slug
            array($this, 'display_promo_data_page')                              // callable function
        );
    }

    public function display_promo_data_page()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/ytl-pull-data-promo-data-display.php';
    }

    /**
     * This function is use for register submenu for mapping infinity data
     *
     * @return void
     */
    public function register_device_bundle_plan_page(): void
    {
        add_submenu_page(
            'ytl-pull-data',                                                     // parent slug
            __('Device Bundle plan', 'ytl-pull-data'),                           // page title
            __('Device Bundle plan', 'ytl-pull-data'),                              // menu title
            'manage_options',                                                    // capability
            'ytl-pull-device-bundle-plan-data',                                  // menu_slug
            array($this, 'display_map_infinity_data')                          // callable function
        );
    }

    /**
     * This function is use for show the mapped infinity data
     *
     * @return void
     */
    public function display_map_infinity_data(): Void
    {
        $deviceData = $this->bundle_device_plan_data();
        $device_bundle_plans = unserialize(get_option('ywos_device_bundle_plans', array()));
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/ytl-pull-device-bundle-plan-data.php';
    }

    /**
     * This function is use for save, update and delete bundle data
     *
     * @return void
     */
    protected function bundle_device_plan_data(): array
    {
        $res = [];
        if (isset($_POST['action']) && !empty($_POST['action']) && !is_array($_POST['action']) && $_POST['action'] === 'ytl-create_new_device') {
            $res = $this->save_bundle_devices($_POST);
        }
        if (isset($_POST['action']) && !empty($_POST['action']) && !is_array($_POST['action']) && $_POST['action'] === 'ytl-DeleteDeviceBundle') {
            if (isset($_POST['deviceBundleId'])) {
                $res = $this->delete_mapped_infinity_devices($_POST['deviceBundleId']);
            }
        }
        if (isset($_POST['action']) && !empty($_POST['action']) && !is_array($_POST['action']) && $_POST['action'] === 'ytl-EditDeviceBundle') {
            if (isset($_POST['deviceBundleId'])) {
                $res['type'] = 'edit-data';
                $res['data'] = $this->get_bundle_devices($_POST['deviceBundleId']);
            }
        }

        if (isset($_POST['action']) && !empty($_POST['action']) && !is_array($_POST['action']) && $_POST['action'] === 'ytl-update_device') {
            if (isset($_POST['deviceBundleId'])) {
                $this->update_mapped_infinity_devices($_POST, $_POST['deviceBundleId']);
            }
        }
        return $res;
    }

    /**
     * This function is use for save the device with mapped plan data
     *
     * @param Array $device_data
     * @return Array
     */
    protected function save_bundle_devices(array $device_data = array(), int $deviceID = -1): array
    {
        $response               = array();
        $device_capacity        = array();
        $device_plan_details    = array();
        $device_remark          = array();
        $image_upload_path      = 'YWOS-device-images';
        $plans                  = array();
        $get_plans              = get_option($this->prefix . 'plans_data', array()); // get all ywos plans data
        $device_bundle_plans = $this->get_bundle_devices();


        // prepare all the mapped plan data
        if (isset($device_data['planData']['plan_id']) && !empty($device_data['planData']['plan_id']) && is_array($device_data['planData']['plan_id'])) {
            foreach ($device_data['planData']['plan_id'] as $key => $plan_id) {

                //upload device image
                $image_arg = array();
                if (isset($_FILES['planData']['name']['device_image'][$key]) && !empty($_FILES['planData']['name']['device_image'][$key])) {
                    $image_arg['name'] = $_FILES['planData']['name']['device_image'][$key];
                }
                if (isset($_FILES['planData']['tmp_name']['device_image'][$key]) && !empty($_FILES['planData']['tmp_name']['device_image'][$key])) {
                    $image_arg['tmp_name'] = $_FILES['planData']['tmp_name']['device_image'][$key];
                }
                $device_image_url = $this->upload_images_in_specificPath((array) $image_arg, (string) $image_upload_path);

                //get the specific plan data using the plan ID
                $planData = new Ytl_Pull_Data_Public($this->plugin_name, $this->version, $this->prefix);
                $planData = $planData->get_plan_by_id(['plan_id' => $plan_id]);

                if (!$device_image_url) {
                    $device_image_url = $device_data['planData']['device_image_url'][$key];
                }
                // create array with all the plan and device details
                $plans[] = array(
                    'plan_id'       => (int) $plan_id,
                    'color_name'    => (string) $device_data['planData']['color_name'][$key],
                    'color_code'    => (string) $device_data['planData']['color_code'][$key],
                    'data'          => (array) $planData,
                    'device_image'  => (string) $device_image_url
                );
            }
        }

        if (isset($device_data['capacity']) && !empty($device_data['capacity']) && !is_array($device_data['capacity'])) {
            $device_capacity = (array) explode(",", $device_data['capacity']);
        }
        if (isset($device_data['plan_details']) && !empty($device_data['plan_details']) && !is_array($device_data['plan_details'])) {
            $device_plan_details = (array) explode(",", $device_data['plan_details']);
        }
        if (isset($device_data['remark']) && !empty($device_data['remark']) && !is_array($device_data['remark'])) {
            $device_remark = (array) explode(",", $device_data['remark']);
        }

        // Created array to store Device full data with mapped plan IDs
        $map_data = array(
            'device_name'   => (string) $device_data['device_name'] ? $device_data['device_name'] : '',
            'plan_name'     => (string) isset($device_data['plan_name']) ? $device_data['plan_name'] : '',
            'planData'      => (array) $plans,
            'details'       => (array) $device_plan_details,
            'capacity'      => (array) $device_capacity,
            'remark'        => (array) $device_remark
        );
        if ($deviceID == -1) { //Check we have a device id or not. If we have a deviceID then it will got to else part
            $device_bundle_plans[] = $map_data;
        } else {
            $device_bundle_plans[$deviceID] = $map_data;
        }
        // Add device bundle plan in option table
        $bool = update_option('ywos_device_bundle_plans', serialize($device_bundle_plans));
        if ($bool) {
            $response['error'] = false;
            $response['message'] = 'Device bundle added successfully';
            return $response;
        }
        $response['error'] = true;
        $response['message'] = 'Device bundle add failed';
        return $response;
    }

    /**
     * This function is use for upload image in specific path
     *
     * @param array $file
     * @param string $path
     * @return string
     */
    function upload_images_in_specificPath(array $file, string $path = 'ytl-images') :string
    {
        $uploaded_path = '';
        if (isset($file) && !empty($file) && is_array($file)) {
            $upload_dir = wp_upload_dir();

            if (!empty($upload_dir['basedir'])) {
                $user_dirname = $upload_dir['basedir'] . '/' . $path;
                if (!file_exists($user_dirname)) {
                    wp_mkdir_p($user_dirname);
                }

                $filename = wp_unique_filename($user_dirname, $file['name']);
                move_uploaded_file($file['tmp_name'], $user_dirname . '/' . $filename);
                $uploaded_path = $upload_dir['baseurl'] . '/' . $path . '/' . $filename;
            }
        }
        return $uploaded_path;
    }

    /**
     * This function is use for delete the mapped device using device id
     *
     * @param integer $device_id
     * @return array
     */
    protected function delete_mapped_infinity_devices(int $device_id): array
    {
        $response = [];
        $device_bundle_plans = $this->get_bundle_devices();
        $response['error'] = true;
        $response['message'] = 'Device Not Found';
        if (isset($device_bundle_plans[$device_id]) && !empty($device_bundle_plans[$device_id])) {
            unset($device_bundle_plans[$device_id]); // remove the device data using device id/key
            $bool = update_option('ywos_device_bundle_plans', serialize($device_bundle_plans)); // 
            $response['error'] = false;
            $response['message'] = 'Device delete failed';
            if ($bool) {
                $response['error'] = false;
                $response['message'] = 'Device Deleted Successfully!';
            }
        }
        return $response;
    }

    /**
     * This function is use for update the infinity devices using device id
     *
     * @param integer $device_id
     * @param array $device_updated_data
     * @return void
     */
    protected function update_mapped_infinity_devices(array $device_updated_data, int $device_id): void
    {
        $this->save_bundle_devices($device_updated_data, $device_id);
    }

    /**
     * This function is use for get the specific data using id and get all the data if id will not pass
     *
     * @param integer $deviceID
     * @return array
     */
    protected function get_bundle_devices(int $deviceID = -1): array
    {
        $device_bundle_plans = get_option('ywos_device_bundle_plans', array()); // in this line we get all the devices
        if (isset($device_bundle_plans) && !empty($device_bundle_plans) && !is_array($device_bundle_plans)) {
            $device_bundle_plans = unserialize($device_bundle_plans);
        }
        if ($deviceID == -1) {
            return $device_bundle_plans;
        }
        if (isset($device_bundle_plans[$deviceID]) && !empty($device_bundle_plans[$deviceID])) {
            return $device_bundle_plans[$deviceID];
        }
        return array();
    }
}
