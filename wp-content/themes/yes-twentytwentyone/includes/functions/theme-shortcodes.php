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
                if ($list['State'] && $list['Area'] && $list['Service Type'] && $list['Start Date'] && $list['End Date'] && $list['Time']) {
                    $arr_list[$list['State']][] = $list;
                }
            }
        }
        ksort($arr_list);                                                               // Sort by states alphabetically

        $lang           = get_bloginfo('language');
        $str_box_time   = 'Time';
        $str_box_area   = 'Affected Area';
        $str_box_type   = 'Service Type';
        if ($lang == 'ms-MY') {
            $str_box_time   = 'Masa';
            $str_box_area   = 'Kawasan';
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
                            <div class="layer-filter filter-container sticky-top">
                                <div class="container">
                                    <div class="row justify-content-lg-center">
                                        <div class="col-12 col-lg-8">
                                            <div class="row">
                                                <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                                    <div class="dropdown">
                                                        <button class="btn filter-drop dropdown-toggle" type="button" id="dropdown-states" data-bs-toggle="dropdown" aria-expanded="false">All States</button>
                                                        <ul class="dropdown-menu states" aria-labelledby="dropdown-states" data-filter-type="state">
                                                            <li><div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="state" type="checkbox" value="All" checked /> <span>All</span></label></div></li>
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
                                                        <button class="btn filter-drop dropdown-toggle" type="button" id="dropdown-months" data-bs-toggle="dropdown" aria-expanded="false">All Months</button>
                                                        <ul class="dropdown-menu month" aria-labelledby="dropdown-month" data-filter-type="month">
                                                            <li><div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="month" type="checkbox" value="All" checked /> <span>All</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="january"            data-month-name="January" />            <span>January</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="february"           data-month-name="February" />           <span>February</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="march"              data-month-name="March" />              <span>March</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="april"              data-month-name="April" />              <span>April</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="may"                data-month-name="May" />                <span>May</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="june"               data-month-name="June" />               <span>June</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="july"               data-month-name="July" />               <span>July</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="august"             data-month-name="August" />             <span>August</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="september"          data-month-name="September" />          <span>September</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="october"            data-month-name="October" />            <span>October</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="november"           data-month-name="November" />           <span>November</span></label></div></li>
                                                            <li><div class="form-check"><label><input class="cardCheckBox month" type="checkbox" checked value="december"           data-month-name="December" />           <span>December</span></label></div></li>
                                                        </ul>
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
