<?php

if (!function_exists('generate_scheduled_network_maintenance')) {
    /**
     * Function generate_scheduled_network_maintenance()
     * Function to register shortcode for the Scheduled Network Maintenance page
     * 
     * @since    1.2.0
     */
    function generate_scheduled_network_maintenance()
    {
        $array = $arr_keys = array();
        $i = 0;
        $file_to_read = fopen(FP_SCHEDULED_NETWORK_MAINTENANCE, 'r');
        if ($file_to_read !== FALSE) {
            while (($data = fgetcsv($file_to_read, 0, ',')) !== FALSE) {
                if (empty($arr_keys)) {
                    $arr_keys = $data;
                    continue;
                }
                $months = '';
                $date_string = '';
                foreach ($data as $key => $value) {
                    if ($arr_keys[$key] == 'Start Date') {
                        $start_date     = strtotime(str_replace('/', '-', $value));
                        $months         = date('F', $start_date);
                        $date_string    = date('jS', $start_date);
                        $array[$i]['Start Date Unix'] = $start_date;
                    } else if ($arr_keys[$key] == 'End Date') {
                        $end_date       = strtotime(str_replace('/', '-', $value));
                        $month          = date('F', $end_date);
                        $year           = date('Y', $end_date);
                        $end_date_string = date('jS', $end_date);
                        $array[$i]['End Date Unix'] = $end_date;
                        if ($months != $month) {
                            $date_string    .= " $months - $end_date_string $month, $year";
                            $months         .= ", $month";
                        } else if ($date_string != $end_date_string) {
                            $date_string    .= " - $end_date_string $month, $year";
                        } else {
                            $date_string    .= " $month, $year";
                        }
                    }
                    if ($key != '0') $array[$i][$arr_keys[$key]] = $value;                // Remove "No" from array
                }
                $array[$i]['Months'] = strtolower($months);
                $array[$i]['Date String'] = $date_string;
                $i++;
            }
            if (!feof($file_to_read)) {
                // echo 'Error: unexpected fgets() fail\n';
            }
            fclose($file_to_read);
        }

        usort($array, function ($a, $b) {
            return $a['Start Date Unix'] - $b['Start Date Unix'];                       // Sort by start date ascending
        });

        $arr_list = [];
        if ($array) {
            foreach ($array as $list) {
                if ($list['State'] && $list['Area'] && $list['Service Type'] && $list['Start Date'] && $list['End Date'] && $list['Time'] && $list['Show on Web'] == 'Yes') {
                    $arr_list[$list['State']][] = $list;
                }
            }
        }
        ksort($arr_list);                                                               // Sort by states alphabetically

        $lang           = get_bloginfo('language');
        $str_box_time   = 'Downtime Between';
        $str_box_area   = 'Affected Area';
        $str_box_type   = 'Service Type';
        if ($lang == 'ms-MY') {
            $str_box_time   = 'Masa';
            $str_box_area   = 'Kawasan Terjejas';
            $str_box_type   = 'Jenis Servis';
        } else if ($lang == 'zh-CN') {
        }

        $html_list  = '';

        foreach ($arr_list as $state => $data) {
            $html_list  .= '                <div class="layer-state col-12 mb-4" data-state="' . $state . '" data-aos="fade-up" data-aos-duration="500">
                                                <h2 class="heading-state">' . $state . '</h2>';
            foreach ($data as $list) {
                $html_list  .= '                <div class="layer-listBox" data-month="' . $list['Months'] . '">
                                                    <p class="panel-date">' . $list['Date String'] . '</p>
                                                    <div class="layer-listInfo">
                                                        <table class="table table-listInfo">
                                                            <tr>
                                                                <th>' . $str_box_time . ':</th>
                                                                <td>' . $list['Time'] . '</td>
                                                            </tr>
                                                            <tr>
                                                                <th>' . $str_box_area . ':</th>
                                                                <td>' . $list['Area'] . '</td>
                                                            </tr>
                                                            <tr>
                                                                <th>' . $str_box_type . ':</th>
                                                                <td>' . $list['Service Type'] . '</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>';
            }
            $html_list  .= '                    <div class="layer-listBoxNoResults is-hidden">
                                                    <h3>No results</h3>
                                                </div>
                                            </div>';
        }


        $html       = ' <!-- Section List STARTS -->
                        <section class="layer-section" id="section-list">
                            <div class="layer-filter filter-container sticky-top" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                <div class="layer-filterToggle">
                                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-storeLocatorFilter" aria-controls="tab-storeLocatorFilter" aria-expanded="false" alria-label="Filter"><span>'. esc_html__('Filter', 'yes.my') .'</span> <span class="navbar-toggler-icon"></span></button>
                                    <div class="navbar-collapse tab-content collapse justify-content-center" id="tab-storeLocatorFilter">
                                        <div class="container">
                                            <div class="row justify-content-lg-center">
                                                <div class="col-12 col-lg-8">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-3 mb-2 mb-lg-0 mt-3 mt-lg-0">
                                                            <div class="dropdown">
                                                                <button class="btn filter-drop dropdown-toggle" type="button" id="dropdown-states" data-bs-toggle="dropdown" aria-expanded="false">' . esc_html__('All States', 'yes.my') . '</button>
                                                                <ul class="dropdown-menu states" aria-labelledby="dropdown-states" data-filter-type="state">
                                                                    <li><div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="state" type="checkbox" value="All" checked /> <span>' . esc_html__('All', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Johor"              data-state-name="Johor" />              <span>Johor</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Kedah"              data-state-name="Kedah" />              <span>Kedah</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Kelantan"           data-state-name="Kelantan" />           <span>Kelantan</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Kuala Lumpur"       data-state-name="Kuala Lumpur" />       <span>Kuala Lumpur</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Melaka"             data-state-name="Melaka" />             <span>Melaka</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Negeri Sembilan"    data-state-name="Negeri Sembilan" />    <span>Negeri Sembilan</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Pahang"             data-state-name="Pahang" />             <span>Pahang</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Perak"              data-state-name="Perak" />              <span>Perak</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Perlis"             data-state-name="Perlis" />             <span>Perlis</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Pulau Pinang"       data-state-name="Pulau Pinang" />       <span>Pulau Pinang</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Sabah"              data-state-name="Sabah" />              <span>Sabah</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Sarawak"            data-state-name="Sarawak" />            <span>Sarawak</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Terengganu"         data-state-name="Terengganu" />         <span>Terengganu</span></label></div></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-4">
                                                            <div class="dropdown">
                                                                <button class="btn filter-drop dropdown-toggle" type="button" id="dropdown-months" data-bs-toggle="dropdown" aria-expanded="false">' . esc_html__('All Months', 'yes.my') . '</button>
                                                                <ul class="dropdown-menu month" aria-labelledby="dropdown-month" data-filter-type="month">
                                                                    <li><div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="month" type="checkbox" value="All" checked /> <span>' . esc_html__('All', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="january"            data-month-name="' . esc_html__('January', 'yes.my') . '" />            <span>' . esc_html__('January', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="february"           data-month-name="' . esc_html__('February', 'yes.my') . '" />           <span>' . esc_html__('February', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="march"              data-month-name="' . esc_html__('March', 'yes.my') . '" />              <span>' . esc_html__('March', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="april"              data-month-name="' . esc_html__('April', 'yes.my') . '" />              <span>' . esc_html__('April', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="may"                data-month-name="' . esc_html__('May', 'yes.my') . '" />                <span>' . esc_html__('May', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="june"               data-month-name="' . esc_html__('June', 'yes.my') . '" />               <span>' . esc_html__('June', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="july"               data-month-name="' . esc_html__('July', 'yes.my') . '" />               <span>' . esc_html__('July', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="august"             data-month-name="' . esc_html__('August', 'yes.my') . '" />             <span>' . esc_html__('August', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="september"          data-month-name="' . esc_html__('September', 'yes.my') . '" />          <span>' . esc_html__('September', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="october"            data-month-name="' . esc_html__('October', 'yes.my') . '" />            <span>' . esc_html__('October', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="november"           data-month-name="' . esc_html__('November', 'yes.my') . '" />           <span>' . esc_html__('November', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="december"           data-month-name="' . esc_html__('December', 'yes.my') . '" />           <span>' . esc_html__('December', 'yes.my') . '</span></label></div></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layer-list container">
                                <div class="row justify-content-lg-center">
                                    <div class="col-12 col-lg-8">
                                        <div class="row">
                                            ' . $html_list . '
                                        </div>
                                        <div class="row mb-4 is-hidden" id="row-noResultsAll">
                                            <div class="col-12">
                                                <div class="layer-listBoxNoResults mb-0">
                                                    <h3>No results</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Section List ENDS -->';

        return $html;
    }

    add_shortcode('yessc_scheduled_network_maintenance', 'generate_scheduled_network_maintenance');
}


if (!function_exists('display_widget_content')) {
    /**
     * Function display_widget_content()
     * Function to register shortcode to display the widget by ID
     * 
     * @since    1.2.0
     */
    function display_widget_content($atts)
    {
        extract(shortcode_atts(array(
            'widget_id' => FALSE
        ), $atts));

        ob_start();
        dynamic_sidebar($widget_id);
        $widget_content = ob_get_clean();
        $html = $widget_content;
        return $html;
    }
    add_shortcode('yes_display_widget', 'display_widget_content');
}


if (!function_exists('generate_store_locations')) {
    /**
     * Function generate_store_locations()
     * Function to register shortcode to generate the store location list
     * 
     * @since    1.2.1
     */
    function generate_store_locations()
    {
        $array = $arr_keys = array();
        $i = 0;
        $file_to_read = fopen(FP_STORE_LOCATIONS, 'r');
        if ($file_to_read !== FALSE) {
            while (($data = fgetcsv($file_to_read, 0, ',')) !== FALSE) {
                if (empty($arr_keys)) 
               {
                    $arr_keys = $data;
                    continue;
                }
                $service_string = '';
                foreach ($data as $key => $value) {
                    $service_string = build_service_string($service_string, $arr_keys[$key], $value);
                    if ($key != '0') $array[$i][$arr_keys[$key]] = $value;
                }
                $array[$i]['Services'] = $service_string;
                $i++;
            }
            if (!feof($file_to_read)) {
                // echo 'Error: unexpected fgets() fail\n';
            }
            fclose($file_to_read);
        }

        $arr_list = [];
        if ($array) {
            foreach ($array as $list) {
                if ($list['State'] && $list['Address'] && $list['Is Active'] == 'Yes' && $list['Latitude'] && $list['Longitude']) {
                    $arr_list[$list['State']][] = $list;
                }
            }
        }

        $html_list  = '';
		if( isset($arr_list['KUALA LUMPUR']) ) {
            $new_value = $arr_list['KUALA LUMPUR'];
            $arr_list = array_merge(["KUALA LUMPUR"=>$new_value], $arr_list);
        
        }
     
        foreach ($arr_list as $state => $stores) {
            $state_name     = ucwords(strtolower($state));
            $html_list      .= '            <div class="col-12 mb-4 layer-state" data-state="' . strtolower($state) . '">
            <h1 class="mb-4">' . $state_name . '</h1>';
        

            foreach ($stores as $data) 
            {
               
                $services   = $data['Services'];
                $services = str_replace(array('experience-stores','service-stores'),array('stores', 'stores'),$services);
             
                $store_type     = $data['Store Type'];
                $store_type = str_replace(array('Experience Store','Store & Service Centre'),array('Store','Store'),$store_type);
                $store_brand    = ($data['Brand']) ? $data['Brand'] : '';
                $store_address  = $data['Address'];
                $operating_hour = $data['Operation Hour'];
                $explode_hours  = explode(';', $operating_hour);
                $link_waze      = "https://www.waze.com/ul?ll=" . $data['Latitude'] . "%2C" . $data['Longitude'] . "&amp;navigate=yes";
                $link_gmap      = "https://www.google.com/maps/search/?api=1&amp;query=" . $data['Latitude'] . "%2C" . $data['Longitude'];

                $class_store_type = '';
                switch ($store_type) {
                    case 'OEM Store':
                        $class_store_type = 'oem-color';
                        break;
                    case 'MyNews':
                        $class_store_type = 'red';
                        break;
                    default;
                }

                $coming_soon = '';
                switch ($store_brand) {
                    case 'VIVO':
                        $store_name = "<span class='font-normal'>vivo</span> Concept Store";
                        break;
                    case 'OPPO':
                        $coming_soon= ($data['Ready to Sell'] == 'No') ? ' (' . esc_html__('Available Soon', 'yes.my') .')' : '';
                        $store_name = "$store_brand Brand Store" . $coming_soon;
                        break;
                    case 'SAMSUNG':
                        $coming_soon= ($data['Ready to Sell'] == 'No') ? ' (Available Soon)' : '';
                        $store_name = "$store_brand Experience Store" . $coming_soon;
                        break;
                    case 'Xiaomi': 
                        $store_name = "<span class='font-normal'>Mi</span> Store";
                        break;
                    default: 
                        $store_name = $data['Store Name'];
                }

                $html_hours = '';
                if ($operating_hour != '') {
                    $html_hours .= '                        <p class="mb-0 time">';
                    $i = 0;
                    foreach ($explode_hours as $hours) {
                        $html_hours     .= '                    <span class="iconify align-middle" data-icon="akar-icons:clock"></span> ' . $hours;
                        if ($i != count($explode_hours)) $html_hours .= '<br />';
                        $i++;
                    }
                    $html_hours .= '                        </p>';
                }

                $html_list  .= '                <div class="store-box layer-listBox mb-3" data-services="' . $services . '">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h2 class="mb-3 ' . $class_store_type . '">' . $store_type . '</h2>
                                                            <h3 class="mb-3">' . $store_name . '</h3>
                                                        </div>
                                                        <div class="col-12 col-lg-8 col-xxl-9 mb-5 mb-lg-0">
                                                            <p class="mb-3">' . $store_address . '</p>
                                                            ' . $html_hours . '
                                                            <!-- <p class="phone d-none"><a href="tel:+6018-3330000">+60 18-333 0000</a></p> -->
                                                        </div>
                                                        <div class="col-12 col-lg-4 col-xxl-3 mt-auto">
                                                            <a href="' . $link_waze . '" class="map-btn mb-3" target="_blank" rel="noopener"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/01/icon-waze.png"> Waze</a>
                                                            <a href="' . $link_gmap . '" class="map-btn" target="_blank" rel="noopener"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/01/icon-gmap.png?"> Google Maps</a>
                                                        </div>
                                                    </div>
                                                </div>';
            }

            $html_list      .= '                <div class="layer-listBoxNoResults is-hidden">
                                                    <h3>No results</h3>
                                                </div>
                                            </div>';
        }

        $html       = ' <!-- Store Locations Start -->
                        <section id="store-locations">
                            <div class="filter-container sticky-top" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                <div class="layer-storeLocatorFilter">
                                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-storeLocatorFilter" aria-controls="tab-storeLocatorFilter" aria-expanded="false" alria-label="Filter"><span>'. esc_html__('Filter', 'yes.my') .'</span> <span class="navbar-toggler-icon"></span></button>
                                    <div class="navbar-collapse tab-content collapse justify-content-center" id="tab-storeLocatorFilter">
                                        <div class="container">
                                            <div class="row justify-content-lg-center">
                                                <div class="col-12 col-lg-8">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-3 mb-2 mb-lg-0 mt-3 mt-lg-0">
                                                            <div class="dropdown">
                                                                <button class="btn filter-drop dropdown-toggle" type="button" id="dropdownStates" data-bs-toggle="dropdown" aria-expanded="false">' . esc_html__('All States', 'yes.my') . '</button>
                                                                <ul class="dropdown-menu states" aria-labelledby="dropdownStates" data-filter-type="state">
                                                                    <li><div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="state" id="checkall" type="checkbox" value="All" checked /> <span>' . esc_html__('All', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="perlis" data-state-name="Perlis" checked /> <span>Perlis</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="terengganu" data-state-name="Terengganu" checked /> <span>Terengganu</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="kedah" data-state-name="Kedah" checked /> <span>Kedah</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="pulau pinang" data-state-name="Pulau Pinang" checked /> <span>Pulau Pinang</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="perak" data-state-name="Perak" checked /> <span>Perak</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="kuala lumpur" data-state-name="Kuala Lumpur" checked /> <span>Kuala Lumpur</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="negeri sembilan" data-state-name="Negeri Sembilan" checked /> <span>Negeri Sembilan</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="melaka" data-state-name="Melaka" checked /> <span>Melaka</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="johor" data-state-name="Johor" checked /> <span>Johor</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="pahang" data-state-name="Pahang" checked /> <span>Pahang</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="kelantan" data-state-name="Kelantan" checked /> <span>Kelantan</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="sabah" data-state-name="Sabah" checked /> <span>Sabah</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="selangor" data-state-name="Selangor" checked /> <span>Selangor</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="sarawak" data-state-name="Sarawak" checked /> <span>Sarawak</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="labuan" data-state-name="Labuan" checked /> <span>Labuan</span></label></div></li>
                                                                    <li><div class="form-check mb-0"><label><input class="cardCheckBox state" type="checkbox" value="putrajaya" data-state-name="Putrajaya" checked /> <span>Putrajaya</span></label></div></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-5 mb-2 mb-lg-0">
                                                            <div class="dropdown">
                                                                <button class="btn filter-drop dropdown-toggle" type="button" id="dropdownProducts" data-bs-toggle="dropdown" aria-expanded="false">' . esc_html__('All Products & Services', 'yes.my') . '</button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownProducts" data-filter-type="service">
                                                                    <li><div class="form-check"><label><input class="cardCheckBoxAll" type="checkbox" value="All" data-filter-type="service" checked /> ' . esc_html__('All', 'yes.my') . '</label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="postpaid-activation" data-service-name="Postpaid Activations" checked /> <span>' . esc_html__('Postpaid Activations', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="prepaid-activation" data-service-name="Prepaid Activations" checked /> <span>' . esc_html__('Prepaid Activations', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="postpaid-bill-payment" data-service-name="Postpaid Bill Payment" checked /> <span>' . esc_html__('Postpaid Bill Payment', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="prepaid-topup" data-service-name="Prepaid Top Up" checked /> <span>' . esc_html__('Prepaid Top Up', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="prepaid-reload-card" data-service-name="Prepaid Reload Card" checked /> <span>' . esc_html__('Prepaid Reload Card', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="device-sales" data-service-name="Yes Device Sales Only" checked /> <span>' . esc_html__('Yes Device Sales Only', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="debit-online" data-service-name="Auto Debit Application (Online)" checked /> <span>' . esc_html__('Auto Debit Application (Online)', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="change-details" data-service-name="Change of Customer Details" checked /> <span>' . esc_html__('Change of Customer Details', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="trouble-shooting" data-service-name="Yes Device Troubleshooting" checked /> <span>' . esc_html__('Yes Device Troubleshooting', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="device-configuration" data-service-name="Yes Device Configuration" checked /> <span>' . esc_html__('Yes Device Configuration', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="faulty-device" data-service-name="Faulty Device Replacement (Yes Device Only)" checked /> <span>' . esc_html__('Faulty Device Replacement (Yes Device Only)', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="service-query" data-service-name="Service Query" checked /> <span>' . esc_html__('Service Query', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="termination" data-service-name="Termination" checked /> <span>' . esc_html__('Termination', 'yes.my') . '</span></label></div></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                                                            <div class="dropdown">
                                                                <button class="btn filter-drop dropdown-toggle" type="button" id="dropdownStoreTypes" data-bs-toggle="dropdown" aria-expanded="false">' . esc_html__('All Store Types', 'yes.my') . '</button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownStoreTypes" data-filter-type="store-type">
                                                                    <li><div class="form-check"><label><input class="cardCheckBoxAll" type="checkbox" value="All" data-filter-type="store-type" checked /> ' . esc_html__('All', 'yes.my') . '</label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox store-type" type="checkbox" value="yes-stores" data-storetype="Yes Stores" checked /> <span>Yes Stores</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox store-type" type="checkbox" value="yes-exclusive-stores" data-storetype="Yes Exclusive Stores" checked /> <span>Yes Exclusive Stores</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox store-type" type="checkbox" value="dealer-mynews" data-storetype="Dealer MyNews" checked /> <span>Dealer MyNews</span></label></div></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mb-5" data-aos="fade-up" data-aos-duration="500">
                                <div class="row justify-content-lg-center">
                                    <div class="col-12 col-lg-8">
                                        <div class="row mt-5">' . $html_list . '</div>
                                        <div class="row mb-4 mt-5 is-hidden" id="row-noResultsAll">
                                            <div class="col-12">
                                                <div class="layer-listBoxNoResults mb-0">
                                                    <h3>No results</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Store Locations End -->';

        return $html;
    }


    /**
     * Function build_service_string()
     * Function to build the service strings from the excel list
     * 
     * @since    1.2.1
     */
    function build_service_string($service_string = '', $key = '', $value = '')
    {
        // die();
        if (strpos($key, 'Service - ') !== false && $value == 'Yes') {
            switch ($key) {
                case 'Service - Postpaid Activation':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'postpaid-activation';
                    break;
                case 'Service - Prepaid Activation':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'prepaid-activation';
                    break;
                case 'Service - Postpaid Bill Payment':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'postpaid-bill-payment';
                    break;
                case 'Service - Prepaid Top Up':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'prepaid-topup';
                    break;
                case 'Service - Prepaid Reload Card':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'prepaid-reload-card';
                    break;
                case 'Service - Yes Device Sales Only':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'device-sales';
                    break;
                case 'Service - Auto Debit Application (Online)':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'debit-online';
                    break;
                case 'Service - Change of Customer Details':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'change-details';
                    break;
                case 'Service - Yes Device Troubleshooting':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'trouble-shooting';
                    break;
                case 'Service - Yes Device Configuration':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'device-configuration';
                    break;
                case 'Service - Faulty Device Replacement (Yes Device Only)':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'faulty-device';
                    break;
                case 'Service - Service Query':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'service-query';
                    break;
                case 'Service - Termination':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'termination';
                    break;
                default;
            }
        }

        if ($key == 'Store Type') {

                 switch ($value) {
                case 'Yes Store':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'yes-stores';
                    break;
                case 'Yes Store & Service Centre':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'yes-service-stores';
                    break;
                case 'Yes Experience Store': 
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'yes-experience-stores';
                    break;
                case 'Yes Exclusive Store': 
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'yes-exclusive-stores';
                    break;
                case 'MyNews':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'dealer-mynews';
                    break;
                case 'OEM Store':
                    if ($service_string != '') $service_string .= ',';
                    $service_string .= 'oem-stores';
                    break;
                default;
            }
        }
        return $service_string;
    }

    add_shortcode('yessc_store_locations_list', 'generate_store_locations');
}


if (!function_exists('generate_roadshow')) {
    /**
     * Function generate_roadshow()
     * Function to register shortcode for the Roadshow page
     * 
     * @since    1.2.0
     */
    function generate_roadshow()
    {
        $array = $arr_keys = array();
        $i = 0;
        $file_to_read = fopen(FP_ROADSHOW_SCHEDULE, 'r');
        if ($file_to_read !== FALSE) {
            while (($data = fgetcsv($file_to_read, 1000, ',')) !== FALSE) {
                if (empty($arr_keys)) {
                    $arr_keys = $data;
                    continue;
                }
                $months = '';
                $date_string = '';
                foreach ($data as $key => $value) {
                    if ($arr_keys[$key] == 'Start Date') {
                        $start_date     = strtotime(str_replace('/', '-', $value));
                        $months         = date('F', $start_date);
                        $date_string    = date('jS', $start_date);
                        $array[$i]['Start Date Unix'] = $start_date;
                    } else if ($arr_keys[$key] == 'End Date') {
                        $end_date       = strtotime(str_replace('/', '-', $value));
                        $month          = date('F', $end_date);
                        $end_date_string = date('jS', $end_date);
                        $array[$i]['End Date Unix'] = $end_date;
                        if ($months != $month) {
                            $date_string    .= " $months - $end_date_string $month";
                            $months         .= ", $month";
                        } else if ($date_string != $end_date_string) {
                            $date_string    .= " - $end_date_string $month";
                        } else {
                            $date_string    .= " $month";
                        }
                    }
                    if ($key != '0' && $arr_keys[$key] != '') $array[$i][$arr_keys[$key]] = str_replace(array("\r", "\n"), ' ', $value);;                // Remove "No" from array
                }
                $array[$i]['Months'] = strtolower($months);
                $array[$i]['Date String'] = $date_string;
                $i++;
            }
            if (!feof($file_to_read)) {
                // echo 'Error: unexpected fgets() fail\n';
            }
            fclose($file_to_read);
        }
        usort($array, function ($a, $b) {
            return $a['Start Date Unix'] - $b['Start Date Unix'];                       // Sort by start date ascending
        });
        $arr_list = [];
        if ($array) {
            foreach ($array as $list) {
                if ($list['State'] && $list['Address'] && $list['Time'] && $list['Start Date'] && $list['End Date'] && $list['Date String'] && $list['Latitude'] && $list['Longitude'] && $list['Show on Web'] == 'Yes') {
                    $arr_list[$list['State']][] = $list;
                }
            }
        }
        ksort($arr_list);                                                               // Sort by states alphabetically

        $lang           = get_bloginfo('language');
        $str_box_time   = 'Time';
        $str_box_address   = 'Address';
        if ($lang == 'ms-MY') {
            $str_box_time   = 'Masa';
            $str_box_address   = 'Alamat';
        } else if ($lang == 'zh-CN') {
        }

        $html_list  = '';

        foreach ($arr_list as $state => $data) {
            $html_list  .= '                <div class="layer-state col-12 mb-4" data-state="' . $state . '">
                                                <h2 class="heading-state">' . $state . '</h2>';
            foreach ($data as $list) {
                $html_list  .= '                <div class="layer-listBox" data-month="' . $list['Months'] . '">
                                                    <div class="row align-items-end">
                                                        <div class="col-12 col-lg-8 col-xxl-9 mb-4 mb-lg-0">
                                                            <p class="panel-date">' . $list['Date String'] . '</p>
                                                            <div class="layer-listInfo">
                                                                <table class="table table-listInfo">
                                                                    <tr>
                                                                        <th>' . $str_box_time . ':</th>
                                                                        <td>' . $list['Time'] . '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>' . $str_box_address . ':</th>
                                                                        <td>' . $list['Address'] . '</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-4 col-xxl-3">
                                                            <a href="https://www.waze.com/ul?ll=' . $list['Latitude'] . '%2C' . $list['Longitude'] . '&amp;navigate=yes" class="map-btn mb-3" target="_blank" rel="noopener"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/01/icon-waze.png"> Waze</a>
                                                            <a href="https://www.google.com/maps/search/?api=1&amp;query=' . $list['Latitude'] . '%2C' . $list['Longitude'] . '" class="map-btn" target="_blank" rel="noopener"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/01/icon-gmap.png?"> Google Maps</a>
                                                        </div>
                                                    </div>
                                                </div>';
            }
            $html_list  .= '                    <div class="layer-listBoxNoResults is-hidden">
                                                    <h3>No results</h3>
                                                </div>
                                            </div>';
        }


        $html       = ' <!-- Section List STARTS -->
                        <section class="layer-section" id="section-list">
                            <div class="layer-filter filter-container sticky-top" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                <div class="layer-filterToggle">
                                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-storeLocatorFilter" aria-controls="tab-storeLocatorFilter" aria-expanded="false" alria-label="Filter"><span>'. esc_html__('Filter', 'yes.my') .'</span> <span class="navbar-toggler-icon"></span></button>
                                    <div class="navbar-collapse tab-content collapse justify-content-center" id="tab-storeLocatorFilter">
                                        <div class="container">
                                            <div class="row justify-content-lg-center">
                                                <div class="col-12 col-lg-8">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-3 mb-2 mb-lg-0 mt-3 mt-lg-0">
                                                            <div class="dropdown">
                                                                <button class="btn filter-drop dropdown-toggle" type="button" id="dropdown-states" data-bs-toggle="dropdown" aria-expanded="false">' . esc_html__('All States', 'yes.my') . '</button>
                                                                <ul class="dropdown-menu states" aria-labelledby="dropdown-states" data-filter-type="state">
                                                                    <li><div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="state" type="checkbox" value="All" checked /> <span>' . esc_html__('All', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Johor"              data-state-name="Johor" />              <span>Johor</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Kedah"              data-state-name="Kedah" />              <span>Kedah</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Kelantan"           data-state-name="Kelantan" />           <span>Kelantan</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Kuala Lumpur"       data-state-name="Kuala Lumpur" />       <span>Kuala Lumpur</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Melaka"             data-state-name="Melaka" />             <span>Melaka</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Negeri Sembilan"    data-state-name="Negeri Sembilan" />    <span>Negeri Sembilan</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Pahang"             data-state-name="Pahang" />             <span>Pahang</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Perak"              data-state-name="Perak" />              <span>Perak</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Perlis"             data-state-name="Perlis" />             <span>Perlis</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Pulau Pinang"       data-state-name="Pulau Pinang" />       <span>Pulau Pinang</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Sabah"              data-state-name="Sabah" />              <span>Sabah</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Sarawak"            data-state-name="Sarawak" />            <span>Sarawak</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Selangor"           data-state-name="Selangor" />           <span>Selangor</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox state" type="checkbox" checked value="Terengganu"         data-state-name="Terengganu" />         <span>Terengganu</span></label></div></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-4">
                                                            <div class="dropdown">
                                                                <button class="btn filter-drop dropdown-toggle" type="button" id="dropdown-months" data-bs-toggle="dropdown" aria-expanded="false">' . esc_html__('All Months', 'yes.my') . '</button>
                                                                <ul class="dropdown-menu month" aria-labelledby="dropdown-month" data-filter-type="month">
                                                                    <li><div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="month" type="checkbox" value="All" checked /> <span>' . esc_html__('All', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="january"            data-month-name="' . esc_html__('January', 'yes.my') . '" />            <span>' . esc_html__('January', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="february"           data-month-name="' . esc_html__('February', 'yes.my') . '" />           <span>' . esc_html__('February', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="march"              data-month-name="' . esc_html__('March', 'yes.my') . '" />              <span>' . esc_html__('March', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="april"              data-month-name="' . esc_html__('April', 'yes.my') . '" />              <span>' . esc_html__('April', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="may"                data-month-name="' . esc_html__('May', 'yes.my') . '" />                <span>' . esc_html__('May', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="june"               data-month-name="' . esc_html__('June', 'yes.my') . '" />               <span>' . esc_html__('June', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="july"               data-month-name="' . esc_html__('July', 'yes.my') . '" />               <span>' . esc_html__('July', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="august"             data-month-name="' . esc_html__('August', 'yes.my') . '" />             <span>' . esc_html__('August', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="september"          data-month-name="' . esc_html__('September', 'yes.my') . '" />          <span>' . esc_html__('September', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="october"            data-month-name="' . esc_html__('October', 'yes.my') . '" />            <span>' . esc_html__('October', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="november"           data-month-name="' . esc_html__('November', 'yes.my') . '" />           <span>' . esc_html__('November', 'yes.my') . '</span></label></div></li>
                                                                    <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="december"           data-month-name="' . esc_html__('December', 'yes.my') . '" />           <span>' . esc_html__('December', 'yes.my') . '</span></label></div></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layer-list container">
                                <div class="row justify-content-lg-center">
                                    <div class="col-12 col-lg-8">
                                        <div class="row" data-aos="fade-up" data-aos-duration="500">
                                            ' . $html_list . '
                                        </div>
                                        <div class="row mb-4 is-hidden" id="row-noResultsAll">
                                            <div class="col-12">
                                                <div class="layer-listBoxNoResults mb-0">
                                                    <h3>No results</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Section List ENDS -->';

        return $html;
    }

    add_shortcode('yessc_roadshow_list', 'generate_roadshow');
}

if (!function_exists('yes_business_slider_callback')) {
    /**
     * Function yes_business_slider_callback()
     * Function to register shortcode to display the slider on the bussiness page
     * 
     * @since    1.2.0
     */
    function yes_business_slider_callback()
    {
        ob_start();
?>

        <style>
            #business-solutions-section {
                padding: 110px 0px 50px;
                width: 100%;
                background-color: #f7f8f9;
                overflow: hidden;
            }

            #business-solutions-section h2 {
                font-family: "Montserrat";
                font-size: 39px;
                font-weight: 600;
                line-height: 47px;
                letter-spacing: -0.02em;
                text-align: left;
                color: #1a1e47;
                max-width: 500px;
            }

            #business-solutions-section .business-solutions-carousel {
                padding-top: 30px;
            }

            #business-solutions-section .layer-planDevice {
                background-color: #fff;
                margin: 0;
                padding: 40px 0px 0px;
                position: relative;
                border-radius: 15px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1);
                display: flex;
                -webkit-align-items: stretch;
                align-items: stretch;
                -webkit-justify-content: stretch;
                justify-content: stretch;
                justify-content: stretch;
                height: auto !important;
                overflow: hidden;
            }

            .box-margin {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            #business-solutions-section .layer-planDevice .box-inner {
                padding: 0 40px;
            }

            #business-solutions-section .layer-planDevice h2 {
                font-family: "Montserrat";
                font-size: 28px;
                font-weight: 600;
                line-height: 34px;
                letter-spacing: -0.011em;
                text-align: left;
                margin-bottom: 10px;
                color: #000;
                height: 70px;
                padding: 0;
            }

            #business-solutions-section .layer-planDevice p {
                font-family: "Open Sans", sans-serif;
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                margin: 0 0 10px;
                text-align: left;
                color: #000;
                height: 100px;
                max-width: 210px;
            }

            #business-solutions-section .layer-planDevice p.panel-deviceImg {
                margin: 0 0 30px;
                position: relative;
                text-align: center;
                display: contents;
            }

            #business-solutions-section .layer-planDevice p.panel-deviceImg img {
                max-height: 220px;
                margin: 0px 0 0 auto;
                object-fit: contain;
            }

            #business-solutions-section .layer-planDevice p.panel-btn {
                margin: 0px 0 0px;
                text-align: left;
                height: auto;
            }

            #business-solutions-section .layer-planDevice p.panel-btn a {
                color: #2f3bf5;
                display: inline-block;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                font-family: Montserrat;
                font-size: 14px;
                font-weight: 700;
                line-height: 19px;
                letter-spacing: 0.1em;
                text-align: left;
                text-decoration: none;
            }

            #business-solutions-section .layer-planDevice p.panel-btn a:hover {
                text-decoration: underline;
            }

            #business-solutions-section .business-solutions-carousel .slick-track {
                display: flex !important;
                width: auto;
            }

            #business-solutions-section .business-solutions-carousel .slick-disabled {
                opacity: 0.3 !important;
            }

            #business-solutions-section .business-solutions-carousel .slick-slide {
                margin: 15px 15px;
            }

            #business-solutions-section .business-solutions-carousel .slick-list {
                overflow: visible;
            }

            #business-solutions-section .business-solutions-carousel .slick-dots {
                left: 0;
            }

            #business-solutions-section .business-solutions-carousel .slick-dots li.slick-active button:before {
                opacity: 0.75;
                color: #ff0084;
            }

            #business-solutions-section .business-solutions-carousel .slick-prev {
                left: unset;
                right: 80px;
            }

            #business-solutions-section .business-solutions-carousel .slick-next {
                right: 40px;
            }

            #business-solutions-section .business-solutions-carousel .slick-next,
            .slick-prev {
                top: -4%;
            }

            #business-solutions-section .business-solutions-carousel .prev-arrow svg,
            #business-solutions-section .business-solutions-carousel .next-arrow svg {
                width: 40px !important;
                height: 40px !important;
                color: #2f3bf5;
                background-color: #fff;
                border-radius: 50px;
                border: 1px solid #2f3bf5;
            }
            #business-solutions-section .business-solutions-carousel .prev-arrow svg{
                margin-right: 30px;
            }

            @media only screen and (max-width: 768px) {
                #business-solutions-section .layer-planDevice p.panel-deviceImg img {
                    max-height: 140px !important;
                }

                #business-solutions-section {
                    padding: 50px 0px 50px;
                }

                .business_inner_img {
                    height: 60px !important;
                }


                #business-solutions-section h2 {
                    font-size: 24px;
                    line-height: 28px;
                    text-align: center;
                    padding: 0 20px;
                }

                #business-solutions-section .layer-planDevice h2 {
                    font-size: 20px;
                    font-weight: 700;
                    line-height: 26px;
                    height: auto;
                }

                #business-solutions-section .layer-planDevice p {
                    font-size: 12px;
                    line-height: 18px;
                    height: auto;
                }
            }

            @media only screen and (max-width: 768px) {
                #business-solutions-section .business-solutions-carousel .slick-list {
                    overflow: hidden;
                    padding-right: 20%;
                }

                .slick-dots li button:before {
                    font-size: 15px !important;
                    top: 5px !important;
                }

                .comman_btn, .hero_bottom-section .button-submit {
                    max-width: 55%;
                }
            }
        </style>

        <!-- business solutions​ section -->
        <section id="business-solutions-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>Other 5G solutions that you might be interested​</h2>
                    </div>
                </div>

                <!-- <div class="col-12"> -->
                <div class="business-solutions-carousel">
                    <div class="layer-planDevice">
                        <div class="box-margin">
                            <div class="box-inner">
                                <h2>Yes 5G Biz Wireless Broadband</h2>
                                <p>
                                    With unlimited & Uncapped 5G, this is unbeatably the fastest
                                    connectivity to take your business a step ahead.​
                                </p>
                                <p class="panel-btn">
                                    <a href="/business/yes-biz-wireless-broadband/" class="">Learn More
                                        <span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                                </p>
                            </div>
                            <p class="panel-deviceImg">
                                <img decoding="async" src="/wp-content/uploads/2024/01/solutions_section1.png" />
                            </p>
                        </div>
                    </div>

                    <div class="layer-planDevice">
                        <div class="box-margin">
                            <div class="box-inner">
                                <h2>Yes 5G Mobile Plans​</h2>
                                <p>
                                    Malaysia's Most Affordable Unlimited 5G Mobile Plans to stay
                                    connected anytime, anywhere.​​
                                </p>
                                <p class="panel-btn">
                                    <a href="/mobile-plan/" class="">Learn More
                                        <span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                                </p>
                            </div>

                            <p class="panel-deviceImg">
                                <img decoding="async" src="/wp-content/uploads/2024/01/solutions_section2.png" />
                            </p>
                        </div>
                    </div>

                    <div class="layer-planDevice">
                        <div class="box-margin">
                            <div class="box-inner">
                                <h2>Yes Dedicated Internet Access​</h2>
                                <p>
                                    Dedicated connectivity supporting point-to-point line and data
                                    links.​​
                                </p>
                                <p class="panel-btn">
                                    <a href="/business/internet-access/yes-dia/" class="">Learn More
                                        <span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                                </p>
                            </div>

                            <p class="panel-deviceImg">
                                <img decoding="async" src="/wp-content/uploads/2024/01/solutions_section3.png" />
                            </p>
                        </div>
                    </div>

                    <div class="layer-planDevice">
                        <div class="box-margin">
                            <div class="box-inner">
                                <h2>Yes Dedicated Lease Line​</h2>
                                <p>
                                    Dedicated fixed bandwidth data connection with high network
                                    availability.​​
                                </p>
                                <p class="panel-btn">
                                    <a href="/business/private-network/yes-dedicated-leased-line/" class="">Learn More
                                        <span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                                </p>
                            </div>

                            <p class="panel-deviceImg">
                                <img decoding="async" src="/wp-content/uploads/2024/01/solutions_section4.png" />
                            </p>
                        </div>
                    </div>
                    <div class="layer-planDevice">
                        <div class="box-margin">
                            <div class="box-inner">
                                <h2>Yes SIPconnect​</h2>
                                <p>
                                    Voice over IP (VolP) service to handle high call volume with
                                    ease.​​
                                </p>
                                <p class="panel-btn">
                                    <a href="/business/voice-communication/yes-sipconnect/" class="">Learn More
                                        <span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                                </p>
                            </div>

                            <p class="panel-deviceImg">
                                <img decoding="async" src="/wp-content/uploads/2024/01/solutions_section5.png" />
                            </p>
                        </div>
                    </div>
                    <div class="layer-planDevice">
                        <div class="box-margin">
                            <div class="box-inner">
                                <h2>Yes 5G Private Network​</h2>
                                <p>Secure data sharing for your business at all times.​</p>
                                <p class="panel-btn">
                                    <a href="/business/private-network/private-5g/" class="">Learn More
                                        <span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                                </p>
                            </div>

                            <p class="panel-deviceImg">
                                <img decoding="async" src="/wp-content/uploads/2024/01/solutions_section6.png" />
                            </p>
                        </div>
                    </div>
                    <div class="layer-planDevice">
                        <div class="box-margin">
                            <div class="box-inner">
                                <h2>Yes Virtual Private Network (VPN)​</h2>
                                <p>
                                    Dedicated private network for your business to stay connected
                                    wirelessly 24/7.​​​
                                </p>
                                <p class="panel-btn">
                                    <a href="/business/private-network/yes-vpn/" class="">Learn More
                                        <span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                                </p>
                            </div>

                            <p class="panel-deviceImg">
                                <img decoding="async" src="/wp-content/uploads/2024/01/solutions_section7.png" />
                            </p>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </section>
        <!--  business solutions​ section End -->
        <script>
            $('.business-solutions-carousel').slick({
                prevArrow: '<a href="#" class="slide-arrow prev-arrow slick-arrow"><span class="iconify slick-prev" data-icon="eva:arrow-ios-back-fill"></span></a>',
                nextArrow: '<a href="#" class="slide-arrow next-arrow slick-arrow"><span class="iconify slick-next" data-icon="eva:arrow-ios-forward-fill"></span></a>',
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 3000,
                dots: false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        infinite: true,
                        dots: true,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        infinite: true,
                        dots: true,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }]
            });
        </script>

<?php
        return ob_get_clean();
    }
    add_shortcode('yes_business_slider', 'yes_business_slider_callback');
}
