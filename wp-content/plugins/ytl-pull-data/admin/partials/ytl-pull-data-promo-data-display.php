<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Ytl_Pull_Data
 * @subpackage Ytl_Pull_Data/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->



<?php

use Shuchkin\SimpleXLSX;

require_once WP_PLUGIN_DIR . '/ytl-pull-data/admin/lib/SimpleXLSX.php';

$sample_file_path = plugin_dir_url(__FILE__) . '../assets/Book1.xlsx';

global $wpdb;
$table_name = $wpdb->prefix . 'ywos_targeted_promo_customers';

$get_promo_ids = $wpdb->get_results("SELECT promo_id FROM " . $table_name . " GROUP BY promo_id", ARRAY_A);
$arr_promo_ids = [];
foreach ($get_promo_ids as $promo) {
    $promo_id = $promo['promo_id'];
    $promo_name = ucwords(str_replace('-', ' ', $promo_id));
    $arr_promo_ids[$promo_id] = $promo_name;
}

if (isset($_POST['trigger-upload-data']) && check_admin_referer('upload_data_btn_clicked')) {
    if (!empty($_POST['promo_id'])) {
        $upload_promo_id = $_POST['promo_id'];
    } else {
        add_settings_error('ytlpd_messages', 'ytlpd_message', __('Please make sure the Promo ID is valid!', 'ytl-pull-data'), 'error');
    }

    $file = $_FILES['import_file']['tmp_name'];
    $extension = pathinfo($_FILES['import_file']['name'], PATHINFO_EXTENSION);

    if (!empty($_FILES['import_file']['name'] && $extension == 'xlsx') && $upload_promo_id) {
        if ($xlsx = SimpleXLSX::parse($file)) {
            $records = build_data_array_from_file($xlsx->rows());
            $arr_insert = [];
            $insert_values = '';
            $counter = 1;
            foreach ($records as $key => $data) {
                $user_meta = [
                    'accountNumber' => (isset($data['AccountNumber']) && $data['AccountNumber']) ? $data['AccountNumber'] : '',
                    'msisdn' => (isset($data['MSISDN']) && $data['MSISDN']) ? '0' . $data['MSISDN'] : '',
                    'nric' => (isset($data['NRIC']) && $data['NRIC']) ? $data['NRIC'] : '',
                    'name' => (isset($data['CustomerName']) && $data['CustomerName']) ? $data['CustomerName'] : '',
                    'gender' => (isset($data['Gender']) && $data['Gender']) ? $data['Gender'] : '',
                    'dateOfBirth' => (isset($data['DateOfBirth']) && $data['DateOfBirth']) ? date('d/m/Y', strtotime($data['DateOfBirth'])) : '',
                    'mobileNumber' => (isset($data['MobileNumber']) && $data['MobileNumber']) ? $data['MobileNumber'] : '',
                    'homeNumber' => (isset($data['HomeNumber']) && $data['HomeNumber']) ? $data['HomeNumber'] : '',
                    'officeNumber' => (isset($data['OfficeNumber']) && $data['OfficeNumber']) ? $data['OfficeNumber'] : '',
                    'email' => (isset($data['Email']) && $data['Email']) ? $data['Email'] : '',
                    'address' => (isset($data['Address']) && $data['Address']) ? $data['Address'] : '',
                    'city' => (isset($data['City']) && $data['City']) ? $data['City'] : '',
                    'state' => (isset($data['State']) && $data['State']) ? $data['State'] : '',
                    'postcode' => (isset($data['Postcode']) && $data['Postcode']) ? $data['Postcode'] : '',
                    'country' => (isset($data['Country']) && $data['Country']) ? $data['Country'] : '',
                    'securityType' => (isset($data['SecurityType']) && $data['SecurityType']) ? $data['SecurityType'] : '',
                    'securityId' => (isset($data['SecurityId']) && $data['SecurityId']) ? $data['SecurityId'] : '',
                    'citizenship' => (isset($data['Citizenship']) && $data['Citizenship']) ? $data['Citizenship'] : '',
                    'yesId' => (isset($data['YesID']) && $data['YesID']) ? $data['YesID'] : '',
                    'salutation' => (isset($data['Salutation']) && $data['Salutation']) ? $data['Salutation'] : '',
                    'preferredLanguage' => (isset($data['PreferredLanguage']) && $data['PreferredLanguage']) ? $data['PreferredLanguage'] : 0
                ];

                if (isset($data['UniqueID'])) {
                    $unique_user_id = $data['UniqueID'];
                    $curTimestamp 	= current_time('mysql');
                    $row = [
                        'promo_id' => $upload_promo_id, 
                        'unique_user_id' => $unique_user_id, 
                        'user_meta' => serialize($user_meta),
                        'created_at' => $curTimestamp,
                        'updated_at' => $curTimestamp
                    ];
                    $insert = $wpdb->insert($table_name, $row);
                    if (!$insert) {
                        break;
                    }
                    $counter++;
                }
            }
            add_settings_error('ytlpd_messages', 'ytlpd_message', __("Successfully imported $counter data into table!", 'ytl-pull-data'), 'updated');
        } else {
            add_settings_error('ytlpd_messages', 'ytlpd_message', SimpleXLSX::parseError(), 'error');
        }
    } else {
        add_settings_error('ytlpd_messages', 'ytlpd_message', __('Please make sure the xlsx file is valid!', 'ytl-pull-data'), 'error');
    }
}

function build_data_array_from_file($file_data)
{
    $array = $arr_keys = array();
    $i = 0;
    foreach ($file_data as $data) {
        if (empty($arr_keys)) {
            foreach ($data as $key => $value) {
                if ($value == 'Security Type (NRIC/Passport)') $value = 'SecurityType';
                if ($value == 'Security ID (NRIC No. / Passport No.)') $value = 'SecurityId';
                if ($value == 'Date of Birth') $value = 'dateOfBirth';
                $arr_keys[] = str_replace(' ', '', ucwords(trim($value)));
            }
            continue;
        }
        foreach ($data as $key => $value) {
            $array[$i][$arr_keys[$key]] = $value;
        }
        $i++;
    }
    return $array;
}

$customer_list = [];
$submitted_select_promo_id = FALSE;
if (isset($_POST['trigger-select-promo-id']) && check_admin_referer('select_promo_id_btn_clicked')) {
    $promo_id = $_POST['promo_id'];
    if ($promo_id) {
        $submitted_select_promo_id = TRUE;

        $customer_list = $wpdb->get_results("SELECT * FROM $table_name WHERE promo_id = '$promo_id' ORDER BY ID ASC", ARRAY_A);
    } else {
        add_settings_error('ytlpd_messages_2', 'ytlpd_messages', __('Please select a Promo ID!', 'ytl-pull-data'), 'error');
    }
}
?>

<div class="wrap layer-ytlpdAdmin">
    <div class="page-header">
        <h1>YTL API Pull Data <span class="span-version"><em>v<?php echo YTL_PULL_DATA_VERSION; ?></em></span></h1>
    </div>
    <div class="nav-tab-wrapper">
        <a href="?page=ytl-pull-data" class="nav-tab">API Information Settings</a>
        <a href="?page=ytl-pull-data-action" class="nav-tab">Pull Plans Action</a>
        <a href="javascript:void(0)" class="nav-tab nav-tab-active">Promo Data Upload</a>
    </div>

    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">
            <h2>Promo Data Upload</h2>

            <?php settings_errors('ytlpd_messages'); ?>

            <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                <?php wp_nonce_field('upload_data_btn_clicked'); ?>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="input-promo_id">Promo ID</label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" id="input-promo_id" name="promo_id" value="" placeholder="wireless-fibre-5g-promo" />
                                <p class='description'><em>The promo ID to be used to be used for customer data unique ID pair</em></p>
                            </td>
                        </tr>
                        <tr scope="row">
                            <th scope="row">
                                <label for="input-import_file">Upload XLSX File</label>
                            </th>
                            <td>
                                <input type="file" class="" id="input-import_file" name="import_file" />
                                <p class='description'><em>The file consists of the customer data to be inserted into table. <a href="<?php echo $sample_file_path; ?>" target="_blank">Example file</a></em></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=ytl-pull-data-promo" />
                    <input type="hidden" name="trigger-upload-data" value="1" />
                    <input type="submit" name="btn-triggerForm" id="btn-pullData" class="button button-primary" value="Upload" />
                </p>
            </form>
        </div>

        <div class="layer-section">
            <h2>View Uploaded Promo Data</h2>

            <?php settings_errors('ytlpd_messages_2'); ?>

            <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <?php wp_nonce_field('select_promo_id_btn_clicked'); ?>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="select-promo_id">Select Promo ID</label>
                            </th>
                            <td>
                                <select name="promo_id" id="select-promo_id">
                                    <option value="">Select Promo ID</option>
                                    <?php foreach ($arr_promo_ids as $promo_id => $promo_name) : ?>
                                        <option value="<?php echo $promo_id; ?>"><?php echo $promo_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=ytl-pull-data-promo" />
                    <input type="hidden" name="trigger-select-promo-id" value="1" />
                    <input type="submit" name="btn-triggerForm" id="btn-pullData" class="button button-primary" value="Select" />
                </p>
            </form>


            <?php if ($submitted_select_promo_id) : ?>
                <hr style="margin-top: 20px;" />

                <h3>Selected Promo ID: <?php echo $arr_promo_ids[$promo_id]; ?> [<?php echo $promo_id; ?>]</h3>
                <h4><em>Total Entries: <?php echo count($customer_list); ?></em></h4>

                <table class="wp-list-table widefat striped">
                    <thead>
                        <tr>
                            <th class="manage-column" width="40">No.</th>
                            <th class="manage-column">Unique ID</th>
                            <th class="manage-column">Name</th>
                            <th class="manage-column">Yes ID</th>
                            <th class="manage-column">Has Purchased</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        foreach ($customer_list as $customer) :
                            $customer_unique_id = ($customer['unique_user_id']) ? $customer['unique_user_id'] : '';
                            $customer_meta = unserialize($customer['user_meta']);
                            $customer_meta = (array) $customer_meta;
                            $customer_name = ($customer_meta['name']) ? $customer_meta['name'] : '';
                            $customer_yes_id = ($customer_meta['yesId']) ? $customer_meta['yesId'] : '';
                            $customer_has_purchased = ($customer['has_purchased']) ? 'Yes' : 'No';
                        ?>
                            <tr>
                                <td width="40"><?php echo $index; ?></td>
                                <td><a href="/<?php echo $promo_id; ?>/?id=<?php echo $customer_unique_id; ?>" target="_blank"><?php echo $customer_unique_id; ?></a></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_yes_id; ?></td>
                                <td><?php echo $customer_has_purchased; ?></td>
                            </tr>
                        <?php $index++;
                        endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>