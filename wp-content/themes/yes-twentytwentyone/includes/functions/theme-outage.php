<?php

// namespace Inc\Api;

// use GuzzleHttp\Psr7\Request;
// use \Inc\Base\Model;
use WP_REST_Request;
use WP_REST_Response;

public  function register()

    {
        add_action('rest_api_init', function () {
            register_rest_route('/elevate/v1', '/outage-details', array(
                'methods' => 'GET',
                'callback' => array($this, 'outage_details'),
                'permission_callback' => '__return_true'
            ));
        });
    }

    //4Goutage details map
    public function snm_get_session()
    {        
    $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/tokenget";
    $params = [
        'method' => 'GET',
        'headers' => array(
        'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
            'UserLogin' => 'otoborest',
            'Password' => 'otobo_v1_345',
            'Content-Type' => 'application/json'
        )
    ];
    $token_list = wp_remote_request($url, $params);
    //print_r($token_list['body']);
    $json_res = json_decode($token_list['body']);
    $final_res = $json_res->SessionID;
    // return $json_res.message;  
    return $final_res;
    } 

    public function outage_details() 
    { 
    $session_id = snm_get_session();
    //print_r($_GET['Latitude']);              
    set_time_limit(1000);
    $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/4GOutageDetails";
    $body = array(
        'SessionID' => $session_id,
        'Latitude' => $_GET['Latitude'],
        'Langitude' => $_GET['Langitude'], 
        //'Severity' => "S3",    
    // 'Latitude' => '3.11523888888889',
    // 'Langitude' => '101.67936944444466',
    );
    $params = array(
        'method' => 'GET',
        'timeout' => 120,
        'body' => $body,   
        //'sslverify' => false,     
        'headers' => array(
        'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
        'Content-Type' => 'application/json',
        )
    );
    //print_r($params); echo $url; echo "<br /><br /><br />";
    $list = wp_remote_get($url, $params);
        return $list;
    //print_r($list);
    }  

//End 4Goutage details map 


if (!function_exists('generate_outgoing_network_maintenance')) {

    function snm_get_session()
    {        
       $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/tokenget";
       $params = [
          'method' => 'GET',
          'headers' => array(
           'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
            'UserLogin' => 'otoborest',
            'Password' => 'otobo_v1_345',
            'Content-Type' => 'application/json'
          )
       ];
       $token_list = wp_remote_request($url, $params);
       //print_r($token_list['body']);
       $json_res = json_decode($token_list['body']);
       $final_res = $json_res->SessionID;
       // return $json_res.message;  
       return $final_res;
    } 

    function snm_4g_outage($session_id)
    {   $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/4GOutageDetails";
       $body = array(
           'SessionID' => $session_id,
            'SiteID' => "LMCPT00421",
            //'SiteName' => "TM Cyberjaya",
            'Severity' => "Unplanned",
            //'Region'   => "Central",
       );
        $params = array(
           'method' => 'GET',
           'body' => $body,           
            'headers' => array(
            'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
                'Content-Type' => 'application/json'
           )
      );
        //print_r($params); echo $url; echo "<br /><br /><br />";
        $list = wp_remote_request($url, $params);
        return $list;
    }

    // function snm_4g_outage_planed($session_id)
    // {   $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/WorkPermit4GDetailsOtobo";
    //    $body = array(
    //        'SessionID' => $session_id,
    //         'SiteID' => "LMCSE00016",
    //         'WorkPermitPriority' => "High",
    //         //'Severity' => "Unplanned",
    //    );
    //     $params = array(
    //        'method' => 'GET',
    //        'body' => $body,           
    //         'headers' => array(
    //         'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
    //             'Content-Type' => 'application/json'
    //        )
    //   );
    //     $list = wp_remote_request($url, $params);
    //     return $list;
    // }

    function snm_5g_outage($session_id)
    {   $url="https://apigateway.yes.my/api/v1/ytlc/pnoc/5GOutageDetails";
        $body = array(
           'SessionID' => $session_id,
            'SiteID'   => "DBSEP1317",
            //'SiteName' => "DBSEP1317_DESARIAVILLACONDOMINIUM",
            //'Severity' => "Partial",
            //'Region'   => "MY DNB CENTRAL",
       );
        $params = array(
           'method' => 'GET',
           'body' => $body,           
            'headers' => array(
            'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
                'Content-Type' => 'application/json'
           )
      );
        //print_r($params); echo $url; echo "<br /><br /><br />";
        $list = wp_remote_request($url, $params);
        return $list;
    }   

    function generate_outgoing_network_maintenance()
    {     
        $session_id = snm_get_session();
       //  print_r($session_id);
       //  die();
       $json_res_4g = $json_res_5g = $json_res = [];
        $outage_4g = snm_4g_outage($session_id);
        $json_res_4g = json_decode($outage_4g['body']);  

        // $outage_4g_planed = snm_4g_outage_planed($session_id);
        // $json_res_4g_planed = json_decode($outage_4g_planed['body']);   
        //  die();
        $outage_5g = snm_5g_outage($session_id); 
        $json_res_5g = json_decode($outage_5g['body']);
        $html_list = '';
        $json_res= array_merge((array)$json_res_4g,(array)$json_res_5g);

        foreach ($json_res as $key=>$outage) {
           //print_r($outage->DynamicField_Area);
            $DynamicField_DateTimeOccurred   = @$outage->DynamicField_DateTimeOccurred;
            $DynamicField_TargetTime         = @$outage->DynamicField_TargetTime;
            $DynamicField_SiteState          = @$outage->DynamicField_SiteState;
            $DynamicField_Area               = @$outage->DynamicField_Area;
            $html_list  .= "<tr>
                                <td>$DynamicField_DateTimeOccurred</td>
                                <td>$DynamicField_TargetTime</td>
                                <td>$DynamicField_SiteState</td>
                                <td>$DynamicField_Area</td>
                            </tr>";            
        }
        $html   = '<section class="data-section">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="titile-section">
                        <h3>
                            Here is the latest information on the affected areas.
                        </h3>
                    </div>
                         
                        <div class="table-responsive data-table-section">
        <table class="table table-bordered table-striped mb-0">
        <thead class="thead-bg">
                            <tr><th>Work Start</th>
                            <th>Work End</th>
                            <th>State</th>
                            <th>Area</th></tr>
                        </thead>
                        <tbody>
                            ' . $html_list . '
                        </tbody>
                    </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>'; 
        return $html;
    }
 
    add_shortcode('yes_network_maintenance_table', 'generate_outgoing_network_maintenance');
}
