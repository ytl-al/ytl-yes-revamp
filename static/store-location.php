<?php include('templates/header.php'); ?>

<?php
$array = $arr_keys = array();
$i = 0;
$file_to_read = fopen('https://docs.google.com/spreadsheets/d/e/2PACX-1vQI-x7j9XeZ0lmQx4tFI0nnup0du20jq9YQXtnUPdzsOWAAGA9dm0OEyAskIB6BuQ/pub?gid=349852332&single=true&output=csv', 'r');
if ($file_to_read !== FALSE) {
    while (($data = fgetcsv($file_to_read, 0, ',')) !== FALSE) {
        if (empty($arr_keys)) {
            $arr_keys = $data;
            continue;
        }
        $service_string = '';
        foreach ($data as $key => $value) {
            $service_string = build_service_string($service_string, $arr_keys[$key], $value);

            if ($key != '0') $array[$i][$arr_keys[$key]] = $value;                // Remove "No" from array
        }
        $array[$i]['Services'] = $service_string;
        $i++;
    }
    if (!feof($file_to_read)) {
        // echo 'Error: unexpected fgets() fail\n';
    }
    fclose($file_to_read);
}
// echo '<pre>'; print_r($array); echo '</pre>';

$arr_list = [];
if ($array) {
    foreach ($array as $list) {
        if ($list['State'] && $list['Address'] && $list['Is Active'] == 'Yes' && $list['Latitude'] && $list['Longitude']) {
            $arr_list[$list['State']][] = $list;
        }
    }
}
// ksort($arr_list);
// echo '<pre>'; print_r($arr_list); echo '</pre>';

function build_service_string($service_string = '', $key = '', $value = '')
{
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
?>

<style type="text/css">
    #location-top-banner {
        background: linear-gradient(83.24deg, #FF0084 10.6%, #2F3BF5 89.86%);
        padding: 90px 0px;
        text-align: center;
    }

    #location-top-banner h1 {
        font-size: 48px;
        font-weight: 800;
        color: #FFF;
    }

    #location-top-banner p {
        font-size: 20px;
        font-weight: 400;
        line-height: normal;
        color: #FFF;
    }

    #location-top-banner p.small {
        font-size: 15px;
    }

    #store-locations .filter-drop {
        border: 1px solid #C4C4C4;
        background-color: #FFF;
        border-radius: 10px;
        font-size: 17px;
        color: #000;
        font-weight: 400;
        padding: 15px 16px;
        text-align: left;
        width: 100%;
    }

    #store-locations .dropdown-toggle::after {
        position: absolute;
        right: 20px;
        top: 26px;
    }

    #store-locations .filter-drop:focus {
        outline: none;
        box-shadow: none;
    }

    #store-locations .dropdown-menu {
        border-radius: 10px;
        border: 1px solid #C4C4C4;
        background-color: #FFF;
        width: 100%;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.15));
    }

    #store-locations .dropdown-menu .form-check {
        padding-left: 20px;
        margin-bottom: 5px;
    }

    #store-locations h1 {
        color: #2B2B2B;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 24px;
    }

    #store-locations .store-box,
    #store-locations .layer-listBoxNoResults {
        width: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        background-color: #FFF;
        padding: 30px;
        padding-bottom: 15px;
        box-shadow: 0px 4px 10px 3px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    #store-locations .layer-listBoxNoResults {
        padding-bottom: 30px;
    }

    #store-locations .store-box:hover {
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.15));
    }

    #store-locations .store-box h2 {
        padding: 10px;
        border-radius: 0px;
        display: inline-block;
        background-color: #F5F5F5;
        color: #2B2B2B;
        font-size: 12px;
        font-weight: 700;
        /* text-transform: uppercase; */
    }

    #store-locations .store-box h3 {
        color: #000000;
        font-weight: 800;
        font-size: 18px;
        line-height: 23px;
        text-transform: uppercase;
    }

    #store-locations .store-box h3 .font-normal {
        text-transform: none;
    }

    #store-locations .store-box p {
        color: #2B2B2B;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        padding-right: 20%;
    }

    #store-locations .store-box p.time svg {
        margin-top: -4px;
        font-weight: 700;
    }

    #store-locations .store-box p.phone,
    #store-locations .store-box p.phone a {
        color: #525252;
        font-weight: 700;
    }

    #store-locations .store-box .map-btn {
        display: block;
        color: #2F3BF5;
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
        opacity: 60%;
    }

    #store-locations .filter-container {
        width: 100%;
        background-color: #FFF;
        padding: 15px 0px;
        display: flex;
        flex-direction: column;
    }

    #store-locations .filter-shadow {
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.15));
    }

    #store-locations .store-box .map-btn:hover {
        opacity: 100%;
    }

    #store-locations .store-box .map-btn img {
        vertical-align: middle;
        display: inline;
        margin-right: 10px;
    }

    #store-locations .is-hidden {
        display: none;
    }

    #store-locations .store-box h2.red {
        background-color: #D93832;
    }

    /* IPAD Portrait */

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {}

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
        #location-top-banner h1 {
            font-size: 40px;
        }

        #location-top-banner p {
            font-size: 20px;
        }

        #location-top-banner p.small {
            font-size: 13px;
        }
    }

    .sticky-top {
        z-index: 3;
    }

    #store-locations .filter-shadow {
        z-index: 1020;
    }

    .layer-page {
        overflow: unset;
    }

    #store-locations .store-box h2.red {
        background-color: #D93832;
        color: #FFF;
    }

    #store-locations .store-box h2.oem-color {
        background-color: #2F3BF5;
        color: #FFF;
    }

    .layer-storeLocatorFilter .navbar-toggler {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    @media (min-width: 992px) {
        .layer-storeLocatorFilter .navbar-toggler {
            display: none;
        }

        .layer-storeLocatorFilter .navbar-collapse {
            display: flex !important;
            flex-basis: auto;
        }
    }
</style>

<main class="clearfix site-main" id="primary" role="main">
    <!-- Article STARTS -->
    <article>
        <!-- Entry Content STARTS -->
        <div class="entry-content">

            <!-- Breadcrumb STARTS -->
            <div class="layer-breadcrumb">
                <div class="container breadcrumb-section">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/">Support</a></li>
                            <li class="breadcrumb-item active"><a href="/static/store-location.php">Store Locator</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Breadcrumb ENDS -->

            <!-- Banner Start -->
            <section id="location-top-banner">
                <div class="container">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div>
                                <h1>Store Locations</h1>
                                <p>To start your Yes journey</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Banner End -->

            <!-- Store Locations Start -->
            <section id="store-locations">
                <div class="filter-container sticky-top" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="layer-storeLocatorFilter">
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-storeLocatorFilter" aria-controls="tab-storeLocatorFilter" aria-expanded="false" alria-label="Filter"><span>Filter</span> <span class="navbar-toggler-icon"></span></button>
                        <div class="navbar-collapse tab-content collapse justify-content-center" id="tab-storeLocatorFilter">
                            <div class="container">
                                <div class="row justify-content-lg-center">
                                    <div class="col-12 col-lg-8">
                                        <div class="row">
                                            <div class="col-12 col-lg-3 mb-2 mb-lg-0 mt-3 mt-lg-0">
                                                <div class="dropdown">
                                                    <button class="btn filter-drop dropdown-toggle" type="button" id="dropdownStates" data-bs-toggle="dropdown" aria-expanded="false">All States</button>
                                                    <ul class="dropdown-menu states" aria-labelledby="dropdownStates" data-filter-type="state">
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBoxAll" data-filter-type="state" id="checkall" type="checkbox" value="All" checked /> <span>All</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="perlis" data-state-name="Perlis" checked /> <span>Perlis</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="terrengganu" data-state-name="Terengganu" checked /> <span>Terrengganu</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="kedah" data-state-name="Kedah" checked /> <span>Kedah</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="pulau pinang" data-state-name="Pulau Pinang" checked /> <span>Pulau Pinang</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="perak" data-state-name="Perak" checked /> <span>Perak</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="kuala lumpur" data-state-name="Kuala Lumpur" checked /> <span>Kuala Lumpur</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="negeri sembilan" data-state-name="Negeri Sembilan" checked /> <span>Negeri Sembilan</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="melaka" data-state-name="Melaka" checked /> <span>Melaka</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="johor" data-state-name="Johor" checked /> <span>Johor</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="pahang" data-state-name="Pahang" checked /> <span>Pahang</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="kelantan" data-state-name="Kelantan" checked /> <span>Kelantan</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="sabah" data-state-name="Sabah" checked /> <span>Sabah</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="selangor" data-state-name="Selangor" checked /> <span>Selangor</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="sarawak" data-state-name="Sarawak" checked /> <span>Sarawak</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox state" type="checkbox" value="labuan" data-state-name="Labuan" checked /> <span>Labuan</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check mb-0"><label><input class="cardCheckBox state" type="checkbox" value="putrajaya" data-state-name="Putrajaya" checked /> <span>Putrajaya</span></label></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-5 mb-2 mb-lg-0">
                                                <div class="dropdown">
                                                    <button class="btn filter-drop dropdown-toggle" type="button" id="dropdownProducts" data-bs-toggle="dropdown" aria-expanded="false">All Products &amp; Services</button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownProducts" data-filter-type="service">
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBoxAll" type="checkbox" value="All" data-filter-type="service" checked /> All</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="postpaid-activations" data-service-name="Postpaid Activations" checked /> <span>Postpaid Activations</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="prepaid-activations" data-service-name="Prepaid Activations" checked /> <span>Prepaid Activations</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="postpaid-bill-payment" data-service-name="Postpaid Bill Payment" checked /> <span>Postpaid Bill Payment</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="prepaid-topup" data-service-name="Prepaid Top Up" checked /> <span>Prepaid Top Up</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="prepaid-reload-card" data-service-name="Prepaid Reload Card" checked /> <span>Prepaid Reload Card</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="device-sales" data-service-name="Yes Device Sales Only" checked /> <span>Yes Device Sales Only</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="debit-online" data-service-name="Auto Debit Application (Online)" checked /> <span>Auto Debit Application (Online)</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="change-details" data-service-name="Change of Customer Details" checked /> <span>Change of Customer Details</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="trouble-shooting" data-service-name="Yes Device Troubleshooting" checked /> <span>Yes Device Troubleshooting</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="device-configuration" data-service-name="Yes Device Configuration" checked /> <span>Yes Device Configuration</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="faulty-device" data-service-name="Faulty Device Replacement (Yes Device Only)" checked /> <span>Faulty Device Replacement (Yes Device Only)</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="service-query" data-service-name="Service Query" checked /> <span>Service Query</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox service" type="checkbox" value="termination" data-service-name="Termination" checked /> <span>Termination</span></label></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                                                <div class="dropdown">
                                                    <button class="btn filter-drop dropdown-toggle" type="button" id="dropdownStoreTypes" data-bs-toggle="dropdown" aria-expanded="false">All Store Types</button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownStoreTypes" data-filter-type="store-type">
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBoxAll" type="checkbox" value="All" data-filter-type="store-type" checked /> All</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox store-type" type="checkbox" value="yes-stores" data-storetype="Yes Stores" checked /> <span>Yes Stores</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox store-type" type="checkbox" value="yes-service-store" data-storetype="Yes Store & Service Centre" checked /> <span>Yes Stores & Service Centre</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox store-type" type="checkbox" value="dealer-mynews" data-storetype="Dealer MyNews" checked /> <span>Dealer MyNews</span></label></div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check"><label><input class="cardCheckBox store-type" type="checkbox" value="oem-stores" data-storetype="OEM Stores" checked /> <span>OEM Stores</span></label></div>
                                                        </li>
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
                            <div class="row mt-3 mt-lg-5">
                                <?php
                                    foreach ($arr_list as $state => $stores) :
                                        $state_name     = ucwords(strtolower($state));
                                ?>
                                    <div class="col-12 mb-4 layer-state" data-state="<?php echo strtolower($state); ?>">
                                        <h1 class="mb-4"><?php echo $state_name; ?></h1>
                                        <?php
                                            foreach ($stores as $data) :
                                                $services       = $data['Services'];
                                                $store_type     = $data['Store Type'];
                                                $store_type_id  = $data['Store Type ID'];
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

                                                switch ($store_brand) {
                                                    case 'VIVO':
                                                        $store_name = "<span class='font-normal'>vivo</span> Concept Store";
                                                        break;
                                                    case 'OPPO':
                                                        $store_name = "$store_brand Brand Store";
                                                        break;
                                                    case 'SAMSUNG':
                                                        $store_name = "$store_brand Experience Store";
                                                        break;
                                                    case 'Xiaomi':
                                                        $store_name = "<span class='font-normal'>Mi</span> Store";
                                                        break;
                                                    default:
                                                        $store_name = $data['Store Name'];
                                                }
                                        ?>
                                            <div class="store-box layer-listBox mb-3" data-services="<?php echo $services; ?>">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h2 class="mb-3 <?php echo $class_store_type; ?>"><?php echo $store_type; ?></h2>
                                                        <h3 class="mb-3"><?php echo $store_name; ?></h3>
                                                    </div>
                                                    <div class="col-12 col-lg-8 col-xxl-9 mb-5 mb-lg-0">
                                                        <p class="mb-3"><?php echo $store_address; ?></p>
                                                        <?php if ($operating_hour != '') : ?>
                                                            <p class="mb-0 time">
                                                                <?php $i = 0;
                                                                foreach ($explode_hours as $hours) : ?>
                                                                    <span class="iconify align-middle" data-icon="akar-icons:clock"></span> <?php echo $hours; ?> <?php if ($i != count($explode_hours)) echo '<br />'; ?>
                                                                <?php $i++;
                                                                endforeach; ?>
                                                            </p>
                                                        <?php endif; ?>
                                                        <!-- <p class="phone d-none"><a href="tel:+6018-3330000">+60 18-333 0000</a></p> -->
                                                    </div>
                                                    <div class="col-12 col-lg-4 col-xxl-3 mt-auto">
                                                        <a href="<?php echo $link_waze; ?>" class="map-btn mb-3" target="_blank" rel="noopener"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/01/icon-waze.png"> Waze</a>
                                                        <a href="<?php echo $link_gmap; ?>" class="map-btn" target="_blank" rel="noopener"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/01/icon-gmap.png?"> Google Maps</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="layer-listBoxNoResults is-hidden">
                                            <h3>No results</h3>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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
            <!-- Store Locations End -->

        </div>
        <!-- Entry Content ENDS -->
    </article>
    <!-- Article ENDS -->
</main>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places,visualization&v=weekly&client=gme-ytlcommunications3&channel=publicyes"></script>
<script type="text/javascript">
    const cardsState = $('[data-state]');
    const cardListBox = $('.layer-listBox');
    const cardsCkbState = $('.cardCheckBox.state');
    const cardsCkbService = $('.cardCheckBox.service');
    const cardsCkbStoreType = $('.cardCheckBox.store-type');
    var arrCheckedStates = cardsCkbState.filter(':checked').get().map(el => el.value);
    var arrCheckedServices = cardsCkbService.filter(':checked').get().map(el => el.value);
    var arrCheckedStoreTypes = cardsCkbStoreType.filter(':checked').get().map(el => el.value);

    $(document).ready(function() {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var targetFilter = $('.sticky-top').offset().top;
            if (scroll >= targetFilter) {
                $('.sticky-top').addClass('filter-shadow');
            } else {
                $('.sticky-top').removeClass('filter-shadow');
            }
        });

        initFilterCheckbox();

        // toggleOverlay();

        // getLocation();
    });

    function handleSelectAll(dropdown, calledFromFilter = false) {
        var filterType = $(dropdown).data('filter-type') || $(dropdown).closest('[data-filter-type]').data('filter-type');
        if (calledFromFilter) {
            var cardsCkb = $('[data-filter-type="' + filterType + '"] .cardCheckBox');
            var selectAll = cardsCkb.length === cardsCkb.filter(':checked').length;
            $('[data-filter-type="' + filterType + '"] input.cardCheckBoxAll').prop('checked', selectAll);
        } else {
            $('[data-filter-type="' + filterType + '"] .cardCheckBox').prop('checked', $(dropdown).is(':checked')).change();
        }
    }

    function checkIfNoResults() {
        setTimeout(function() {
            AOS.refresh();
        }, 500);

        var activeBoxStates = $('.layer-state').not('.is-hidden');
        var boxNoResultsAll = $('#row-noResultsAll');
        if (!$(activeBoxStates).length) {
            $(boxNoResultsAll).removeClass('is-hidden');
        } else {
            var activeBoxServices = $('.store-box').not('.is-hidden');
            $(activeBoxStates).each(function(idx, stateBox) {
                var activeBoxServices = $(stateBox).find('.store-box').not('.is-hidden');
                var noResultBoxServices = $(stateBox).find('.layer-listBoxNoResults');
                if (!$(activeBoxServices).length) {
                    $(noResultBoxServices).removeClass('is-hidden');
                } else {
                    $(noResultBoxServices).addClass('is-hidden');
                }
            });
            $(boxNoResultsAll).addClass('is-hidden');
        }
    }

    function changeState(e) {
        var checkbox = $(e.target);
        handleSelectAll(checkbox, true);

        arrCheckedStates = cardsCkbState.filter(':checked').get().map(el => el.value);
        var selectedText = 'No State Selected';
        if (arrCheckedStates.length == cardsCkbState.length) {
            selectedText = 'All States';
        } else if (arrCheckedStates.length > 1) {
            selectedText = 'Multiple States';
        } else if (arrCheckedStates.length == 1) {
            selectedText = $('.cardCheckBox.state[value="' + arrCheckedStates[0] + '"]').closest('.form-check').find('span').html();
        }
        $('#dropdownStates').text(selectedText);

        if (!arrCheckedStates.length) {
            cardsState.addClass('is-hidden');
            checkIfNoResults();
            return;
        }

        cardsState.each(function() {
            const state = $(this).data('state');
            $(this).toggleClass('is-hidden', !arrCheckedStates.includes(state));
        });

        checkIfNoResults();
    }

    function toggleListBox() {
        cardListBox.addClass('is-hidden');

        arrCheckedStoreTypes = cardsCkbStoreType.filter(':checked').get().map(el => el.value);
        arrCheckedServices = cardsCkbService.filter(':checked').get().map(el => el.value);
        arrCheckedListBox = arrCheckedStoreTypes.concat(arrCheckedServices);

        // cardListBox.each(function(idx, target) {
        //     const service = $(this).data('services');
        //     $(target).addClass('is-hidden');
        //     for (var i = 0; i < arrCheckedListBox.length; i++) {
        //         if (service.indexOf(arrCheckedListBox[i]) > -1) {
        //             $(target).removeClass('is-hidden');
        //             break;
        //         }
        //     }

        // });

        cardListBox.each(function(idx, listBox) {
            var listBox = $(this);
            var service = $(this).data('services');
            for (var i = 0; i < arrCheckedStoreTypes.length; i++) {
                if (service.indexOf(arrCheckedStoreTypes[i]) > -1) {
                    var target = $(listBox);
                    var targetServices = $(target).data('services');
                    for (var j = 0; j < arrCheckedServices.length; j++) {
                        if (targetServices.indexOf(arrCheckedServices[j]) > -1) {
                            $(target).removeClass('is-hidden');
                            break;
                        }
                    }
                }
            }
        });

        checkIfNoResults();
    }

    function changeService(e) {
        var checkbox = $(e.target);
        handleSelectAll(checkbox, true);

        const arrCheckedServices = cardsCkbService.filter(':checked').get().map(el => el.value);
        switch (true) {
            case arrCheckedServices.length == cardsCkbService.length:
                selectedText = 'All Products & Services';
                break;
            case (arrCheckedServices.length > 1):
                selectedText = 'Multiple Products & Services';
                break;
            case (arrCheckedServices.length == 1):
                selectedText = $('.cardCheckBox.service[value="' + arrCheckedServices[0] + '"]').closest('.form-check').find('span').html();
                break;
            default:
                selectedText = 'No Products & Services Selected';
        }
        $('#dropdownProducts').text(selectedText);

        toggleListBox();

        // if (!arrCheckedServices.length) {
        //     cardListBox.addClass('is-hidden');
        //     checkIfNoResults();
        //     return;
        // }

        // cardListBox.each(function(idx, target) {
        //     const service = $(this).data('services');
        //     $(target).addClass('is-hidden');
        //     for (var i = 0; i < arrCheckedServices.length; i++) {
        //         if (service.indexOf(arrCheckedServices[i]) > -1) {
        //             $(target).removeClass('is-hidden');
        //             break;
        //         }
        //     }

        // });

        // checkIfNoResults();
    }

    function changeStoreType(e) {
        var checkbox = $(e.target);
        handleSelectAll(checkbox, true);

        arrCheckedStoreTypes = cardsCkbStoreType.filter(':checked').get().map(el => el.value);
        switch (true) {
            case arrCheckedStoreTypes.length == cardsCkbStoreType.length:
                selectedText = 'All Store Types';
                break;
            case (arrCheckedStoreTypes.length > 1):
                selectedText = 'Multiple Store Types';
                break;
            case (arrCheckedStoreTypes.length == 1):
                selectedText = $('.cardCheckBox.store-type[value="' + arrCheckedStoreTypes[0] + '"]').closest('.form-check').find('span').text();
                break;
            default:
                selectedText = 'No Store Type Selected';
        }
        $('#dropdownStoreTypes').text(selectedText);

        toggleListBox();

        // if (!arrCheckedStoreTypes.length) {
        //     cardsStoreTypes.addClass('is-hidden');
        //     checkIfNoResults();
        //     return;
        // }

        // cardsStoreTypes.each(function(idx, target) {
        //     const storeType = $(this).data('store-type');
        //     $(this).toggleClass('is-hidden', !arrCheckedStoreTypes.includes(storeType));
        // });

        // checkIfNoResults();
    }

    function initFilterCheckbox() {
        $('.cardCheckBoxAll[data-filter-type="state"]').prop('checked', true).trigger('change');
        $('.cardCheckBoxAll[data-filter-type="service"]').prop('checked', true).trigger('change');
        $('.cardCheckBoxAll[data-filter-type="store-type"]').prop('checked', true).trigger('change');

        $('ul.dropdown-menu').on('click', function(e) {
            var events = $._data(document, 'events') || {};
            events = events.click || [];
            for (var i = 0; i < events.length; i++) {
                if (events[i].selector) {
                    if ($(e.target).is(events[i].selector)) {
                        events[i].handler.call(event.target, event);
                    }
                    $(e.target).parents(events[i].selector).each(function() {
                        events[i].handler.call(this, e);
                    });
                }
            }
            e.stopPropagation();
        });

        $('input.cardCheckBoxAll').each(function(index, dropdown) {
            $(dropdown).on('change', function() {
                handleSelectAll(dropdown);
            });
        });

        $(cardsCkbState).on('change', function(event) {
            changeState(event);
        });

        $(cardsCkbService).on('change', function(event) {
            changeService(event);
        });

        $(cardsCkbStoreType).on('change', function(event) {
            changeStoreType(event);
        });
    }

    var x = document.getElementById("store-locations");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
        toggleOverlay(false);
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        displayLocation(lat, lon);
    }

    function showError(error) {
        var errMsg = '';
        switch (error.code) {
            case error.PERMISSION_DENIED:
                errMsg = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                errMsg = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                errMsg = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                errMsg = "An unknown error occurred."
                break;
        }
        console.log(errMsg);
    }

    function displayLocation(latitude, longitude) {
        var geocoder;
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(latitude, longitude);

        geocoder.geocode({
                'latLng': latlng
            },
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        var indices = 0;
                        var locState = '';
                        for (var j = 0; j < results.length; j++) {
                            if (results[j].types[0] == 'locality') {
                                indice = j;
                                break;
                            }
                        }
                        for (var i = 0; i < results[j].address_components.length; i++) {
                            if (results[j].address_components[i].types[0] == 'locality') {
                                var locObj = results[j].address_components[i];
                                locState = locObj.long_name;
                                break;
                            }
                        }
                        if (locState && $('.cardCheckBox.state[data-state-name="' + locState + '"]').length) {
                            $('.cardCheckBoxAll[data-filter-type="state"]').prop('checked', false).trigger('change');
                            $('.cardCheckBox.state[data-state-name="' + locState + '"]');
                            $('.cardCheckBox.state[data-state-name="' + locState + '"]').prop('checked', true).trigger('change');
                            AOS.refresh()
                        }
                    }
                } else {
                    console.log("Geocoder failed due to: " + status);
                }
            }
        );
    }
</script>

<?php include('templates/footer.php'); ?>