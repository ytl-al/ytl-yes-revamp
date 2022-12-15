<?php

/**
 * Register a custom menu page for google sheet.
 */
function my_register_google_sheet_setting_menu_page()
{
    add_menu_page(
        'Google Sheet',
        'Google Sheet',
        'manage_options',
        'google_sheet_setting',
        'google_sheet_setting_page_callback',
        plugins_url('myplugin/images/icon.png'),
        6
    );
}
add_action('admin_menu', 'my_register_google_sheet_setting_menu_page');

/**
 * Display a custom menu page
 */
function google_sheet_setting_page_callback()
{
    if( isset($_GET['removeAccess']) && !empty($_GET['removeAccess']) && $_GET['removeAccess'] ) {
        update_option('my_google_sheet_refresh_token', '');
    }
    $options = get_option('ytl_google_sheet_options');
    $redirect_url = isset($options['redirect_uri']) ? $options['redirect_uri'] : '';
    $client_id = isset($options['client_id']) ? $options['client_id'] : '';
    ?>
        <style>
            .google-btn {
                width: 184px;
                height: 42px;
                background-color: #4285f4;
                border-radius: 2px;
                box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .25);
                cursor : pointer;
                margin-top : 20px;
            }

            .google-btn .google-icon-wrapper {
                position: absolute;
                margin-top: 1px;
                margin-left: 1px;
                width: 40px;
                height: 40px;
                border-radius: 2px;
                background-color: #fff;
            }

            .google-btn .google-icon {
                position: absolute;
                margin-top: 11px;
                margin-left: 11px;
                width: 18px;
                height: 18px;
            }

            .google-btn .btn-text {
                float: right;
                margin: 11px 11px 0 0;
                color: #fff;
                font-size: 14px;
                letter-spacing: 0.2px;
                font-family: "Roboto";
            }

            .google-btn:hover {
                box-shadow: 0 0 6px #4285f4;
            }

            .google-btn:active {
                background: #1669f2;
            }
        </style>
        <form action="options.php" method="post">
            <?php
            settings_fields('ytl_google_sheet_options');
            do_settings_sections('my_google_sheet_option'); ?>
            <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
        </form>
        <?php 
            if( !get_option('my_google_sheet_refresh_token', true) ) {
                ?>
                    <div class="google-btn" onclick="window.open('https://accounts.google.com/o/oauth2/auth?client_id=<?php echo $client_id ?>&redirect_uri=<?php echo $redirect_url ?>&access_type=offline&prompt=consent&response_type=code&scope=https://www.googleapis.com/auth/spreadsheets');" >
                        <div class="google-icon-wrapper">
                            <img class="google-icon" src="https://www.yes.my/wp-content/uploads/2022/12/Google__G__Logo.png" />
                        </div>
                        <p class="btn-text"><b>Sign in with google</b></p>
                    </div>
                    <?php
            }else{
                ?>
                    <div class="google-btn" onclick='window.location.href = "http://localhost/wp-admin/admin.php?page=google_sheet_setting&removeAccess=true"' >
                        <p class="btn-text"><b>Remove google access</b></p>
                    </div>
                <?php
            }
        ?>
    <?php
}

function ytl_register_settings()
{
    register_setting('ytl_google_sheet_options', 'ytl_google_sheet_options', 'ytl_google_sheet_options_validate');

    add_settings_section('api_settings', 'API Settings', 'ytl_google_sheet_heading', 'my_google_sheet_option');

    add_settings_field('ytl_google_sheet_setting_api_key', 'API Key', 'ytl_google_sheet_setting_api_key', 'my_google_sheet_option', 'api_settings');
    add_settings_field('ytl_google_client_id', 'Client ID', 'ytl_google_client_id', 'my_google_sheet_option', 'api_settings');
    add_settings_field('ytl_google_sheet_setting_client_secret', 'Client Secret', 'ytl_google_sheet_setting_client_secret', 'my_google_sheet_option', 'api_settings');
    add_settings_field('ytl_google_sheet_setting_redirect_uri', 'Redirect URI', 'ytl_google_sheet_setting_redirect_uri', 'my_google_sheet_option', 'api_settings');
    add_settings_field('my_google_sheet_setting_google_sheet_id', 'Google Sheet ID', 'my_google_sheet_setting_google_sheet_id', 'my_google_sheet_option', 'api_settings');
}
add_action('admin_init', 'ytl_register_settings');

function ytl_google_sheet_options_validate($input)
{
    return $input;
}

function ytl_google_sheet_heading()
{
    echo '<p>Please add google API</p>';
}

function ytl_google_client_id()
{
    $options = get_option('ytl_google_sheet_options');
    echo "<input id='ytl_google_client_id' name='ytl_google_sheet_options[client_id]' type='text' value='" . esc_attr($options['client_id']) . "' />";
}

function ytl_google_sheet_setting_redirect_uri()
{
    $options = get_option('ytl_google_sheet_options');
    echo "<input id='ytl_google_sheet_setting_redirect_uri' name='ytl_google_sheet_options[redirect_uri]' type='text' value='" . esc_attr($options['redirect_uri']) . "' />";
}

function ytl_google_sheet_setting_client_secret()
{
    $options = get_option('ytl_google_sheet_options');
    echo "<input id='ytl_google_sheet_setting_client_secret' name='ytl_google_sheet_options[client_secret]' type='text' value='" . esc_attr($options['client_secret']) . "' />";
}

function ytl_google_sheet_setting_api_key()
{
    $options = get_option('ytl_google_sheet_options');
    echo "<input id='ytl_google_sheet_setting_api_key' name='ytl_google_sheet_options[api_key]' type='text' value='" . esc_attr($options['api_key']) . "' />";
}

function my_google_sheet_setting_google_sheet_id()
{
    $options = get_option('ytl_google_sheet_options');
    echo "<input id='ytl_google_sheet_setting_api_key' name='ytl_google_sheet_options[google_sheet_id]' type='text' value='" . esc_attr($options['google_sheet_id']) . "' />";
}


function ytl_google_sheet_shortcode_callback()
{
    $bool = false;
    if (isset($_GET['code']) && !empty($_GET['code']) && !is_array($_GET['code'])) {
        $options = get_option('ytl_google_sheet_options');
        // $code = get_option('my_google_sheet_code', true);
        $refresh_token_data = my_generate_refresh_token(
            isset($_GET['code']) ? $_GET['code'] : '',
            isset($options['client_id']) ? $options['client_id'] : '',
            isset($options['redirect_uri']) ? $options['redirect_uri'] : '',
            isset($options['client_secret']) ? $options['client_secret'] : ''
        );
        $bool = update_option('my_google_sheet_refresh_token', json_encode($refresh_token_data));
    }
    // $bool = update_option('my_google_sheet_refresh_token', '');
    if( $bool ) {
        ?>
            <script>
                window.location.href = "/wp-admin/admin.php?page=google_sheet_setting";
            </script>
        <?php
    }
}

add_shortcode('ytl_google_sheet_shortcode', 'ytl_google_sheet_shortcode_callback');




// Add a new interval of 180 seconds
add_filter('cron_schedules', 'yes_add_every_three_minutes');
function yes_add_every_three_minutes($schedules)
{
    $schedules['every_two_hours'] = array(
        'interval'  => 7200,
        'display'   => 'Every 2 hours'
    );
    return $schedules;
}

// Schedule an action if it's not already scheduled
if (!wp_next_scheduled('yes_add_every_two_hours')) {
    wp_schedule_event(time(), 'every_two_hours', 'yes_add_every_two_hours');
}

/**
 * Hook into that action that'll fire every two hours
 * 
 * @param $client_id, $client_secret, $refresh_token
 * @return googleToken ARRAY
 * 
 */
add_action('yes_add_every_two_hours', 'every_two_hours_event_func');
function every_two_hours_event_func()
{
    $options = get_option('ytl_google_sheet_options');
    $refresh_token_data = get_option('my_google_sheet_refresh_token', true);
    if (!isset($refresh_token_data) || empty($refresh_token_data)) {
        return;
    }
    if (isset($refresh_token_data) && !empty($refresh_token_data) && !is_array($refresh_token_data)) {
        $refresh_token_data = json_decode($refresh_token_data, true);
    }
    $token = ytl_generate_google_token_using_refresh_token(
        isset($options['client_id']) ? $options['client_id'] : '',
        isset($options['client_secret']) ? $options['client_secret'] : '',
        isset($refresh_token_data['refresh_token']) ? $refresh_token_data['refresh_token'] : ''
    );

    if (isset($token['access_token']) && !empty($token['access_token']) && !is_array($token['access_token'])) {
        $data = "The time is " . date("h:i:sa");
        $spreadsheet_id = '1XmcqvHfDrLhh5JkBl-hkYsEDMQIMPnyhJCtR65HvhPw';
        $cell_value = 'Hello';
        $range = 'A1:A500';

        $google_sheet_data = get_google_sheet_data(
            $spreadsheet_id,
            isset($options['api_key']) ? $options['api_key'] : '',
            $range
        );
        $stock_data = get_product_stock_data();
        if (
            !isset($stock_data) || empty($stock_data) || !is_array($stock_data) ||
            !isset($google_sheet_data['values']) || empty($google_sheet_data['values']) || !is_array($google_sheet_data['values'])
        ) {
            return;
        }
        foreach ($stock_data as $product_stock_data) {
            $id = array_search($product_stock_data['productBundleId'], array_column($google_sheet_data['values'], '0'));
            if ($id) {
                $cell_value = 'out of stock';
                if ($product_stock_data['balance'] > 0) {
                    $cell_value = 'in stock';
                }
                $cell_address = 'D' . ($id + 1);
                update_google_sheet($token['access_token'], $spreadsheet_id, $cell_address, $cell_value);
            }
        }
    }
}

/**
 * This function is use for generate refresh token
 * 
 * @param $client_id, $client_secret, $refresh_token
 * @return googleToken ARRAY
 * 
 */
function ytl_generate_google_token_using_refresh_token($client_id, $client_secret, $refresh_token)
{
    $curl = curl_init();
    $post_data = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'refresh_token' => $refresh_token,
        'grant_type' => 'refresh_token'
    );
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.googleapis.com/oauth2/v4/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    if (isset($response) && !empty($response) && !is_array($response)) {
        $response = json_decode($response, true);
    }
    if (!isset($response['access_token']) || empty($response['access_token'])) {
        update_option('my_google_sheet_refresh_token', '');
    }
    return $response;
}

/**
 * This function is use for generate refresh token
 * 
 * @param $code, $client_id, $redirect_uri, $client_secret
 * @return UpdatedSheetDetails ARRAY
 * 
 */
function my_generate_refresh_token($code, $client_id, $redirect_uri, $client_secret)
{

    $curl = curl_init();
    $post_data = array(
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    );
    // die();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.googleapis.com/oauth2/v4/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $post_data,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    if (isset($response) && !empty($response) && !is_array($response)) {
        return json_decode($response, true);
    }
    return;
}

/**
 * This function is use for update the google sheet data using cellAddress
 * 
 * @param $token, $spreadsheet_id, $cell_address, $cell_value
 * @return UpdatedSheetDetails ARRAY
 * 
 */
function update_google_sheet($token, $spreadsheet_id, $cell_address, $cell_value)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sheets.googleapis.com/v4/spreadsheets/' . $spreadsheet_id . '/values/' . $cell_address . '?valueInputOption=USER_ENTERED',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => '{ "values": [["' . $cell_value . '"]] }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    if (isset($response) && !empty($response) && !is_array($response)) {
        $response = json_decode($response, true);
    }
    return $response;
}

/**
 * This function is use for get the google sheet data
 * 
 * @param $sheet_id, $key, $range
 * @return GoogleSheetData ARRAY
 * 
 */
function get_google_sheet_data($sheet_id, $key, $range)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sheets.googleapis.com/v4/spreadsheets/' . $sheet_id . '/values/' . $range . '?key=' . $key,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    if (isset($response) && !empty($response) && !is_array($response)) {
        $response = json_decode($response, true);
    }
    return $response;
}

/**
 * This function is use for get all the product stock data
 * 
 * @param none
 * @return StockData ARRAY
 * 
 */
function get_product_stock_data()
{
    $curl = curl_init();
    $url = get_site_url(null, '/wp-json/elevate/v1/check-stock', 'https');
    $url = 'https://yes.my/wp-json/elevate/v1/check-stock';
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: ARRAffinity=eb837974979a2c987486c86d36991ed7beb5f4b1b0cf71607b638a1cefee4e4a; ARRAffinitySameSite=eb837974979a2c987486c86d36991ed7beb5f4b1b0cf71607b638a1cefee4e4a'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    if (isset($response) && !empty($response) && !is_array($response)) {
        $response = json_decode($response, true);
    }
    return $response;
}
