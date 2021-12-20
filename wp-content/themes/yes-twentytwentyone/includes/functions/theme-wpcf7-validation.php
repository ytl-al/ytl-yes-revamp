<?php

if (!function_exists('footer_newsletter_email_already_registered') && !function_exists('footer_newsletter_email_validation')) {
    /**
     * Function footer_newsletter_email_already_registered()
     * Function to check if field value has been saved before
     * 
     * @param    integer    $cf_id              The ID for WP Contact Form 7 to be validated
     * @param    string     $form_field_name    The field name of the field to be validated
     * @param    string     $form_field_value   The field value of the field to be validated
     * 
     * @return   bool Return if field value has been registered or not
     * 
     * @since    1.0.0
     */
    function footer_newsletter_email_already_registered($cf_id, $form_field_name, $form_field_value)
    {
        global $wpdb;
        $form_id    = 'cf_' . WPCF7_FOOTER_NEWSLETTER_FORM_ID;
        $form_id_bm = 'cf_' . WPCF7_FOOTER_NEWSLETTER_FORM_ID_BM;
        $form_id_ch = 'cf_' . WPCF7_FOOTER_NEWSLETTER_FORM_ID_CH;
        $query      = " SELECT yvld.* 
                        FROM yes_vxcf_leads_detail AS yvld
                        LEFT JOIN yes_vxcf_leads AS yvl
                            ON yvld.lead_id = yvl.id
                        WHERE yvl.form_id IN ('$form_id', '$form_id_bm', '$form_id_ch')
                            AND yvld.name = '$form_field_name' 
                            AND yvld.value LIKE '%$form_field_value%'";
        $entry      = $wpdb->get_results($query);
        $found      = false;
        if (!empty($entry)) {
            $found = true;
        }
        return $found;
    }


    /**
     * Function display_widget_by_position()
     * Function to validate the WP Contact Form 7
     * 
     * @param    object $result     The widget's position ID which to be displayed. Default value is null.
     * @param    array  $tag        Flag to check if widget is active. Default value is false.
     * 
     * @return  string|bool Return WPCF7_Validation
     * 
     * @since    1.0.0
     */
    function footer_newsletter_email_validation($result, $tag)
    {
        $wpcf7              = WPCF7_ContactForm::get_current();
        $current_form_id    = $wpcf7->id;

        if ($current_form_id == WPCF7_FOOTER_NEWSLETTER_FORM_ID || $current_form_id == WPCF7_FOOTER_NEWSLETTER_FORM_ID_BM || $current_form_id == WPCF7_FOOTER_NEWSLETTER_FORM_ID_CH) {
            $cf_id              = $current_form_id;
            $form_field_name    = 'email';
            $errorMessage       = 'This email address is already registered';
            $name               = $tag['name'];
            if ($name == $form_field_name) {
                if (footer_newsletter_email_already_registered($cf_id, $form_field_name, $_POST[$name])) {
                    $result->invalidate($tag, $errorMessage);
                }
            }
        }

        return $result;
    }
    add_filter('wpcf7_validate_email*', 'footer_newsletter_email_validation', 10, 2);
}


if (!function_exists('prevent_cf7_multiple_emails')) {
    /**
     * Function prevent_cf7_multiple_emails()
     * Function to add JavaScript validation on WP Contact Form 7 to prevent multiple submissions and emails
     * 
     * @since    1.0.0
     */
    function prevent_cf7_multiple_emails()
    { ?>
        <script type="text/javascript">
            var submitText = jQuery(':input.wpcf7-submit').val();
            var ajaxLoader = jQuery('.ajax-loader');
            var disableSubmit = false;
            jQuery('input.wpcf7-submit[type="submit"]').click(function() {
                jQuery(ajaxLoader).css('visibility', 'visible');
                jQuery(':input[type="submit"]').attr('value', "Submitting...");
                if (disableSubmit == true) {
                    return false;
                }
                disableSubmit = true;
                return true;
            })

            var wpcf7Elm = document.querySelector('.wpcf7');
            if (jQuery(wpcf7Elm).length) {
                wpcf7Elm.addEventListener('wpcf7mailsent', function(event) {
                    jQuery(':input[type="submit"]').attr('value', "Submitted");
                    disableSubmit = false;
                    setTimeout(function() {
                        jQuery(ajaxLoader).css('visibility', 'hidden');
                        jQuery(':input[type="submit"]').attr('value', submitText);
                    }, 500);
                }, false);

                wpcf7Elm.addEventListener('wpcf7invalid', function(event) {
                    jQuery(':input[type="submit"]').attr('value', submitText);
                    disableSubmit = false;
                    setTimeout(function() {
                        jQuery(ajaxLoader).css('visibility', 'hidden');
                    }, 500);
                }, false);
            }
        </script>
    <?php
    }
    add_action('wp_footer', 'prevent_cf7_multiple_emails');
}


if (!function_exists('cf7_keep_vx_url')) {
    /**
     * Function cf7_keep_vx_url()
     * Function to add JavaScript to remove the extra urls in input hidden "vx_url" to prevent the cross site scripting vulnerabilities
     * 
     * @since    1.0.0
     */
    function cf7_keep_vx_url()
    { ?>
        <script type="text/javascript">
            setTimeout(function() {
                var elementURL = $('input[name="vx_url"]');
                $(elementURL).val(window.location.href.split('?')[0]);
            }, 1000);
        </script>
<?php
    }
    add_action('wp_footer', 'cf7_keep_vx_url');
}
