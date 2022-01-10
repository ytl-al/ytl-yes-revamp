<?php
if (!function_exists('get_access_token')) {
    /**
     * Function get_access_token()
     * Function to connect to STEP to get the access token to be used to do eligibility checking
     * 
     * @return   string     Returning the access token string
     * 
     * @since    1.0.2
     */
    function get_access_token()
    {
        $url    = STEP_URL . '/login';
        $args   = [
            'method'    => 'POST',
            'body'      => [
                'email'     => STEP_USERNAME,
                'password'  => STEP_PASSWORD
            ]
        ];
        $request    = wp_remote_post($url, $args);
        if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
            return false;
        }
        $response   = wp_remote_retrieve_body($request, true);
        $data       = json_decode($response);
        return $data->access_token;
    }
}


if (!function_exists('generate_hmac_key_from_api')) {
    // /**
    //  * Function generate_hmac_key_from_api()
    //  * Function to connect to STEP to generate the hmac hash to be used to do eligibility checking
    //  * 
    //  * @param    array      $params    The array consists of yes_number and nric
    //  * 
    //  * @return   string     Returning the hmac_key string
    //  * 
    //  * @since    1.0.2
    //  */
    // function generate_hmac_key_from_api($params = [])
    // {
    //     $url    = STEP_URL . '/4G5GConversion/hmac_key';
    //     $body   = [
    //         'msisdn'    => $params['yes_number'],
    //         'nric'      => $params['nric']
    //     ];
    //     $args   = [
    //         'method'    => 'GET',
    //         'headers'   => [
    //             'Content-Type'  => 'application/json',
    //             'Authorization' => 'Bearer ' . $params['access_token']
    //         ],
    //         'body'      => json_encode($body)
    //     ];
    //     echo '<pre>'; print_r(json_encode($body)); echo '</pre>';
    //     $request    = wp_remote_post($url, $args);
    //     // echo '<pre>'; print_r($request); echo '</pre>';
    //     if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
    //         return false;
    //     }
    //     $response   = wp_remote_retrieve_body($request, true);
    //     $data       = json_decode($response);
    //     if ($data->error) {
    //         return ['status' => 400, 'message' => $data->error];
    //     }
    //     return $data->hmac;
    // }
}


if (!function_exists('generate_hmac_key')) {
    /**
     * Function generate_hmac_key()
     * Function to generate the hmac hash to be used to do eligibility checking manually
     * 
     * @param    array      $params    The array consists of yes_number and nric
     * 
     * @return   string     Returning the hmac_key string
     * 
     * @since    1.0.2
     */
    function generate_hmac_key($params = [])
    {
        $data       = [
            'msisdn'    => $params['yes_number'],
            'nric'      => $params['nric']
        ];
        $hmac_key   = base64_encode(hash_hmac('sha256', json_encode($data), STEP_CLIENT_KEY, true));
        return $hmac_key;
    }
}


if (!function_exists('get_eligibility')) {
    /**
     * Function get_eligibility()
     * Function to connect to STEP do validation on 
     * 
     * @param    array      $params    The array consists of yes_number, nric, access_token (retrieved from get_access_token()), and hmac_key (retrieved from generate_hmac_key())
     * 
     * @return   object     Returning the object of the response from STEP
     * 
     * @since    1.0.2
     */
    function get_eligibility($params = [])
    {
        $url        = STEP_URL . '/4G5GConversion/eligible_check';
        $headers    = [
            'Content-Type'                      => 'application/json',
            'Authorization'                     => 'Bearer ' . $params['access_token'],
            'X-4G-5G-CONVERSION-HMAC-SHA256'    => $params['hmac_key']
        ];
        $body       = [
            'msisdn'    => $params['yes_number'],
            'nric'      => $params['nric']
        ];
        $args       = [
            'method'    => 'POST',
            'headers'   => $headers,
            'body'      => json_encode($body)
        ];
        $request    = wp_remote_post($url, $args);
        if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
            return new WP_Error('error_eligibility_check', "There's an error in checking eligibility", ['status' => 400]);
        }
        $response   = wp_remote_retrieve_body($request, true);
        $data       = json_decode($response);
        if ($data->error) {
            foreach ($data->error as $error) {
                return new WP_Error('error_eligibility_check', $error->EM, ['status' => 400]);
            }
        }
        return $data;
    }
}


if (!function_exists('check_eligibility')) {
    /**
     * Function check_eligibility()
     * Callback function to check the customer's eligibility through STEP for the '/yes/v1/5g-plan-upgrade-eligibility-check' endpoint
     * 
     * @param    array      $data       The array consists of yes_number and nric
     * 
     * @return   object     Returning the object of the response from STEP
     * 
     * @since    1.0.2
     */
    function check_eligibility($data = [])
    {
        if (isset($data['nric']) && isset($data['yes_number'])) {
            $access_token           = get_access_token();
            if (!$access_token) {
                return new WP_Error('error_getting_token', "There's an error in getting the access token", ['status' => 400]);
            }
            $data['access_token']   = $access_token;

            $get_hmac_key           = generate_hmac_key($data);
            if (is_array($get_hmac_key)) {
                return new WP_Error('error_generating_hmac_key', $get_hmac_key['message'], ['status' => 400]);
            }
            $data['hmac_key']       = $get_hmac_key;

            $eligibility            = get_eligibility($data);

            return $eligibility;
        }
        return new WP_Error('error_eligibility_check', "Parameters not complete", ['status' => 400]);
    }
}


if (!function_exists('ra_eligibility_check')) {
    /**
     * Function ra_eligibility_check()
     * Function to register the '/yes/v1/5g-plan-upgrade-eligibility-check' endpoint 
     * 
     * @param    array      $data       The array consists of yes_number and nric
     * 
     * @return   object     Returning the object of the response from STEP
     * 
     * @since    1.0.2
     */
    function ra_eligibility_check(WP_REST_Request $request)
    {
        $nric       = $request['nric'];
        $yes_number = $request['yes_number'];
        $args       = [
            'nric'          => $request['nric'],
            'yes_number'    => $request['yes_number']
        ];

        return check_eligibility($args);
        // get_access_token($request);

        // echo '<pre>nric: '; print_r($nric); echo '</pre>';
    }
    add_action('rest_api_init', function () {
        register_rest_route('yes/v1', '/5g-plan-upgrade-eligibility-check', [
            'methods'   => 'POST',
            'callback'  => 'ra_eligibility_check',
            'args'      => [
                'nric'  => [
                    'validate_callback' => function ($param, $request, $key) {
                        return is_string($param);
                    }
                ],
                'yes_number'    => [
                    'validate_callback' => function ($param, $request, $key) {
                        return is_numeric($param);
                    }
                ]
            ]
        ]);
    });
    add_filter("https_local_ssl_verify", "__return_false");
    add_filter("https_ssl_verify", "__return_false");
}