<?php
    // Set up cache file path
    $cache_file = 'https://www.yes.my/wp-content/themes/yes-twentytwentyone/cache/google_sheet_data.csv';

    // Read the CSV file
    $csv_data = file_get_contents($cache_file);

    // Process CSV data
    $rows = array_map('str_getcsv', explode("\n", $csv_data));
    $headers = array_shift($rows);

    // Initialize data and filters
    $telco_data = [];
    $selected_device = isset($_GET['device']) ? $_GET['device'] : '';
    $selected_contract = isset($_GET['contract']) ? $_GET['contract'] : '';
    $selected_plan_range = isset($_GET['plan_range']) ? $_GET['plan_range'] : '';

    // Process each row
    foreach ($rows as $row) {
        if (count($row) < 13) continue; // Ensure row has enough columns
        
        // Process row data
        $device = $row[0];  
        $months = $row[8];  
        $plan_range = $row[9];  
        $telco = $row[1];  

        // Add to $telco_data array
        $telco_data[$telco][] = [
            'device'         => $device,
            'plan'           => $row[2], 
            'device_price'   => $row[4], 
            'plan_price'     => $row[5], 
            'total_price'    => $row[6], 
            'total_cost'     => $row[7], 
            'months'         => $months,
            'plan_range'     => $plan_range,
            'summary_k'      => $row[10],  
            'summary_l'      => $row[11],  
            'summary_m'      => $row[12]
        ];
    }

    // Generate and display filtered results
    echo generateFilteredResults($telco_data, $selected_device, $selected_contract, $selected_plan_range);


    function generateFilteredResults($telco_data, $device, $contract, $plan_range) {
        $output = '';
        if( $contract == 'No Contract' ) {
            $available_telcos = ['Yes 5G', 'Retailer A', 'Retailer S' , 'Retailer M'];
            $totalText = 'Total Device Cost';
        }else{
            $available_telcos = ['Yes 5G', 'Telco CD', 'Telco M' , 'Telco U'];
            $totalText = 'Total Cost of Ownership';
        }

        $output .= '
            <style>
                 .section-head.yes_5g {
                    background-color: #ff0084 !important;
                }

                .section-head.telco_cd {
                    background-color: #1360E5 !important;
                }

                .section-head.telco_m {
                    background-color: #43C706 !important;
                    ;
                }

                .section-head.telco_u {
                    background-color: #FF7900 !important;
                }
            </style>
        ';
    
        foreach ($available_telcos as $telco) {
            $telco_id = strtolower(str_replace(' ', '_', $telco));
            $filtered_plans = filterTelcoData($telco_data, $device, $contract, $plan_range);
            if (!empty($filtered_plans[$telco])) {
                $plans = $filtered_plans[$telco];
                usort($plans, function ($a, $b) {
                    return $b['plan_price'] <=> $a['plan_price'];
                });
                $output .= '<div class="col-lg-3 col-sm-3 col-md-3 col-xl-3 btn-prepaid mb-3 ' . htmlspecialchars($telco) . '"><div class="prepaid-card"><div class="prepaid-card-detail"><div class="prepaid-card-detail-cont yes-details"><div class="section-head select-w ' . htmlspecialchars($telco_id) . '"><h5>' . htmlspecialchars($telco) . '</h5>';
                // Find the index of the desired device
                // $desiredDeviceIndex = array_search('Infinite Cashback Ultra 178', array_column($plans, 'plan'));

                // // If the device is found and is not already at index 0
                // if ($desiredDeviceIndex !== false && $desiredDeviceIndex !== 0) {
                //     // Remove the desired device from its current position
                //     $desiredDevice = $plans[$desiredDeviceIndex];
                //     unset($plans[$desiredDeviceIndex]);
                    
                //     // Add it back to the start of the array
                //     array_unshift($plans, $desiredDevice);
                // }

                // // Output the modified array
                // $plans = array_values($plans);
                if( $contract != 'No Contract' || $telco == 'Yes 5G' ) {
                    $output .= '<select class="form-select" onchange="showPlanDetails(\'' . $telco_id . '\', this.value)">';
                    foreach ($plans as $index => $plan_data) {
                        $output .= '<option value="' . $index . '">' . htmlspecialchars($plan_data['plan']) . '</option>';
                    }
                    $output .= '</select>';
                }
                $output .= '</div>';
                
                foreach ($plans as $index => $plan_data) {
                    $planBreakdown = [];
                    if( $contract == 'No Contract' ) {
                        $planBreakdown['Device'] = htmlspecialchars($plan_data['device_price']);
                        $planBreakdown['Cashback'] = htmlspecialchars($plan_data['total_price']);
                    }else{
                        $planBreakdown['Plan'] = htmlspecialchars($plan_data['plan_price']).'<b>/ mth</b>';
                        $planBreakdown['Device'] = htmlspecialchars($plan_data['device_price']).'<b>/ mth</b>';
                        $planBreakdown['Total'] = htmlspecialchars($plan_data['total_price']).'<b>/ mth</b>';
                    }
                    $output .= '<div class="prepaid-card-list" id="' . $telco_id . '-plan-' . $index . '" style="display: ' . ($index === 0 ? 'block' : 'none') . ';">
                                <ul>';
                        if( isset($planBreakdown) && !empty($planBreakdown) && is_array($planBreakdown) ) {
                            foreach($planBreakdown as $breakdownName => $breakdownValue){
                                if( isset($breakdownValue) && !empty($breakdownValue) ) {
                                    $breakdownValue = '<b>RM</b> '.$breakdownValue;
                                }else{
                                    $breakdownValue = '--';
                                }
                                $output .= '<li><span class="l-text ' . htmlspecialchars($telco) . '">'.$breakdownName.'</span> <span class="r-price">' . $breakdownValue . ' </span></li>';
                            }
                        }
                    $output .= '</ul>
                            </div>
                            <div data-price="'.htmlspecialchars($plan_data['total_cost']).'" class="total-price-sec '.($index === 0 ? 'iphone_active_cost' : '').'" id="' . $telco_id . '-cost-' . $index . '" style="display: ' . ($index === 0 ? 'block' : 'none') . ';">
                                <h2 class="l-text '. htmlspecialchars($telco) . '"><b>RM</b>&nbsp;' . htmlspecialchars($plan_data['total_cost']) . '</h2>
                                <p class="l-text '. htmlspecialchars($telco) . '">'.$totalText.'</p>
                            </div>';
    
                    // Summary information
                    $summary = trim(implode(' ', array_filter([$plan_data['summary_k'], $plan_data['summary_l'], $plan_data['summary_m']])));
    
                    if ($summary) {
                        $output .= '<div class="summary-info bottom-sec-t '.($index === 0 ? 'iphone_active_summary' : '').'" id="' . $telco_id . '-summary-' . $index . '" style="display: ' . ($index === 0 ? 'block' : 'none') . ';">
                                    <p>' . htmlspecialchars($summary) . '</p>
                                </div>';
                    }
                }
                $output .= '</div></div></div></div>';
            } else {
                $output .= renderNoPlans($telco_id,$telco);
            }
        }
        return $output;
    }


    function renderNoPlans($telco_id, $telco) {
        return '
        <div class="col-lg-3 col-sm-3 col-md-3 col-xl-3 btn-prepaid mb-3 ' . htmlspecialchars($telco) . '">
            <div class="prepaid-card">
                <div class="prepaid-card-detail">
                    <div class="prepaid-card-detail-cont yes-details">
                        <div class="section-head ' . htmlspecialchars($telco_id) . '">
                            <h5>' . htmlspecialchars($telco) . '</h5>
                            <h6>–</h6>
                        </div>
                        <div class="prepaid-card-list">
                            <div class="n-Avail">
                                <h2>No Available Plan</h2>
                                <p>Try selecting a different range for this telco.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    
    function filterTelcoData($telco_data, $device, $contract, $plan_range) {
        
        $filtered_data = [];
        foreach ($telco_data as $telco => $plans) {
            foreach ($plans as $plan_data) {
                $contract = strtolower(str_replace(' ', '_', $contract));
                $plan_data['months'] = strtolower(str_replace(' ', '_', $plan_data['months']));
                if (
                    (empty($device) || $device === $plan_data['device']) &&
                    (empty($contract) || $contract === $plan_data['months']) &&
                    (empty($plan_range) || $plan_range === $plan_data['plan_range'])
                ) {
                    $filtered_data[$telco][] = $plan_data;
                }
            }
        }

        if (isset($filtered_data['C'])) {
            $filtered_data = ['C' => $filtered_data['C']] + $filtered_data;
            unset($filtered_data['C']);
        }
        return $filtered_data;
    }
?>