<?php

add_action('rest_api_init', function () {
    register_rest_route('/outage', '/outage-details', array(
        'methods' => 'GET',
        'callback' => 'outage_details',
        'permission_callback' => '__return_true'
    ));
});


//4Goutage details map

function outage_details()
{    //die('test');
    $session_id = snm_get_session();
    //print_r($_GET['Latitude']);              
    set_time_limit(1000);
    $url = NETWORK_MAINTENANCE_DOMAIN . "/api/v1/ytlc/pnocprod/4GOutageDetails";
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
        $url = NETWORK_MAINTENANCE_DOMAIN . "/api/v1/ytlc/pnocprod/tokenget";
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
    {
        $url = NETWORK_MAINTENANCE_DOMAIN . "/api/v1/ytlc/pnocprod/4GOutageDetails";
        $body = array(
            //'SessionID' => $session_id,
            //'SiteID' => "LMCPT00421",
            //'SiteName' => "TM Cyberjaya",
            //'Severity' => "Unplanned",
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

    function snm_4g_outage_planed($session_id)   
    { $url=NETWORK_MAINTENANCE_DOMAIN . "/api/v1/ytlc/pnocprod/WorkPermit4GDetailsOtobo";       
        //echo $session_id; die;
       $body = array(
           'SessionID' => $session_id,
            //'SiteID' => "LMCSE00016",
            //'WorkPermitPriority' => "High",
            //'Severity' => "Unplanned",
       );
        $params = array(
            'method' => 'GET',
            'body' => $body,
            'timeout' => 6,
            'headers' => array(
                'apikey' => 'jkweTq8hcOw5QxeWh8d13dfkjhdfsdgdd',
                'Content-Type' => 'application/json'
           )
      );
        $list = wp_remote_request($url, $params);   
        return $list;
    }

    function snm_5g_outage($session_id)
    {
        $url = NETWORK_MAINTENANCE_DOMAIN . "/api/v1/ytlc/pnocprod/5GOutageDetails";
        $body = array(
            'SessionID' => $session_id,
            //'SiteID'   => "DBSEP1317",
            //'SiteName' => "DBSEP1317_DESARIAVILLACONDOMINIUM",
            'Severity' => "Partial",
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
        $json_res_4g = $outage_4g_planed = $json_res_5g = $json_res = [];
        //$outage_4g = snm_4g_outage($session_id);
        //$json_res_4g = json_decode($outage_4g['body']);

        $outage_4g_planed = snm_4g_outage_planed($session_id);   
        $json_res_4g_planed = json_decode($outage_4g_planed['body'],true); 
        //$json_res_5g = json_decode($outage_5g['body']);
        //print_r($json_res_4g_planed); die;
        
        //$outage_5g = snm_5g_outage($session_id);
        //$json_res_5g = json_decode($outage_5g['body']);
        $html_list = '';
        //$json_res= array_merge((array)$json_res_4g,(array)$json_res_5g);
        $json_res = array();
        if(!empty($json_res_4g_planed)){
          $json_res = array_merge($json_res,(array)$json_res_4g_planed);
        }
      // print_r($json_res_4g_planed); die;
      // $json_res_4g_planed=array();
      
       if(!empty($json_res_4g_planed['Data'])){         
        foreach ($json_res_4g_planed as $key =>$outages) {
        //print_r($outages);
        //echo count($outage);
        foreach($outages as $df => $outakjge){
        foreach($outakjge as $outage){          
       
        // @$outage->DynamicField_DateTimeOccurred = $outage->DynamicField_ActivityDateTime?@$outage->DynamicField_ActivityDateTime:'';
        // @$outage->DynamicField_TargetTime = $outage->DynamicField_ActivityEndDateTime?@$outage->DynamicField_ActivityEndDateTime:'';
        //   @$outage->DynamicField_SiteState = @$outage->DynamicField_SiteState;
        //   @$outage->DynamicField_Area = @$outage->DynamicField_Area;
            //print_r($outage->DynamicField_Area);
            $DynamicField_DateTimeOccurred   = @$outage['DynamicField_ActivityDateTime']?date("d-m-Y h:i:s",strtotime(@$outage['DynamicField_ActivityDateTime'])):"";
            $DynamicField_TargetTime         = @$outage['DynamicField_ActivityEndDateTime']?date("d-m-Y h:i:s",strtotime(@$outage['DynamicField_ActivityEndDateTime'])):'';
            $DynamicField_SiteState          = @$outage['DynamicField_SiteState'];
            $DynamicField_Area               = @$outage['DynamicField_Area']?? '';  // $outage->DynamicField_Area ? $outage->DynamicField_Area : '';
                                                                                          
            $datavoice =  esc_html__('Data, Voice and SMS', 'network-yes.my');
            $html_list  .= "                    <tr>
                                                   <td>$DynamicField_SiteState</td>
                                                    <td>$DynamicField_Area</td>                                                                                                                                 
                                                    <td>$datavoice</td>
                                                    <td>$DynamicField_DateTimeOccurred</td>
                                                    <td>$DynamicField_TargetTime </td>                                                     
                                                </tr>";
        } } }
       // $table_data='';
        $State =  esc_html__('State', 'network-yes.my');
        $Area =  esc_html__('Area', 'network-yes.my');
        $Services_Impacted =  esc_html__('Services Impacted', 'network-yes.my');
        $Work_Start =  esc_html__('Work Start', 'network-yes.my');
        $Work_End =  esc_html__('Work End', 'network-yes.my');
   $table_data='
   <div class="table-responsive data-table-section">
                                        <table class="table table-bordered table-striped mb-0">
                                            <thead class="thead-bg">
                                            <tr>
                                               <th>'.$State.'</th>
                                                <th>'.$Area.'</th>
                                                <th>'.$Services_Impacted.'</th>
                                                <th>'.$Work_Start.'</th>
                                                <th>'.$Work_End.'</th>                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ' . $html_list .'
                                            </tbody>
                                        </table>
                                    </div>
   '
   ;
    }
    
                                                                 
    
    else{
        $lang = get_bloginfo("language");
                                    //$emptytable_message = get_site_url();

                                    if ($lang == "en-US") {
                                        $table_data = "<p class='para-sec'>There is no scheduled maintenance at the moment.
                                        We update this page on a regular basis, so please check back regularly.</p>";
                                    } elseif ($lang == "ms-MY") {
                                        $table_data = "<p class='para-sec'>Tiada penyelenggaraan berjadual buat masa ini. Kami mengemas kini halaman ini secara tetap, jadi sila semak semula dengan kerap.</p>";
                                    }   
        //$table_data=$emptytable_message;
    }
        
    $tiletable =  esc_html__('Here is the latest information on the affected areas.', 'network-yes.my');
        
        $html   = ' <section class="data-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="titile-section">
                                        <h3>'.$tiletable.'</h3>
                                    </div>
                                       '.$table_data.' 
                                    
                                </div>
                            </div>
                        </div>
                    </section>';
        return $html;
    }

    add_shortcode('yes_network_maintenance_table', 'generate_outgoing_network_maintenance');
}