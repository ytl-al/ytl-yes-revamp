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

<script>
    jQuery(document).on('click', '#add_new_plan', function() {
        let newPlan = '<tr>\
            <td><input name="planData[plan_id][]" type="number" /></td>\
            <td><input name="planData[color_name][]" type="text" /></td>\
            <td><input name="planData[color_code][]" type="color" /></td>\
            <td><input type="file" name="planData[device_image][]" /></td>\
            <td><button id="remove_plan" type="button">X</button></td>\
        </tr>';
        jQuery(this).parent().find('table tbody').append(newPlan);
    });
    jQuery(document).on('click', '#remove_plan', function() {
        jQuery(this).parents('tr')[0].remove();
    });
</script>

<div class="wrap layer-ytlpdAdmin">
    <div class="page-header">
        <h1>YTL API Pull Data <span class="span-version"><em>v<?php echo YTL_PULL_DATA_VERSION; ?></em></span></h1>
    </div>
    <div class="nav-tab-wrapper">
        <a href="?page=ytl-pull-data" class="nav-tab">API Information Settings</a>
        <a href="?page=ytl-pull-data-action" class="nav-tab">Pull Plans Action</a>
        <a href="javascript:void(0)" class="nav-tab">Promo Data Upload</a>
        <a href="?page=ytl-pull-device-bundle-plan-data" class="nav-tab nav-tab-active">Device Bundle Plan</a>
    </div>

    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">
            <h2>Add New Infinity Device</h2>

            <?php settings_errors('ytlpd_messages'); ?>

            <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                <?php wp_nonce_field('create_device_bundle_data'); ?>
                <table class="form-table device_bundle_form" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="input-device_name">Device Name</label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" id="input-device_name" name="device_name" value="" placeholder="Device name" />
                                <p class='description'><em>The device ID to be used for infinity device unique ID</em></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="input-capacity">Device Capacity</label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" id="input-capacity" name="capacity" value="" placeholder="Device Capacity" />
                                <!-- <p class='description'><em>The device ID to be used for infinity device unique ID</em></p> -->
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="input-plan_name">Plan Name</label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" id="input-plan_name" name="plan_name" value="" placeholder="Plan Name" />
                                <!-- <p class='description'><em>The device ID to be used for infinity device unique ID</em></p> -->
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="input-plan_details">Plan Details</label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" id="input-plan_details" name="plan_details" value="" placeholder="Plan Details" />
                                <!-- <p class='description'><em>The device ID to be used for infinity device unique ID</em></p> -->
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="input-remark">Remark</label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" id="input-remark" name="remark" value="" placeholder="Remark" />
                                <!-- <p class='description'><em>The device ID to be used for infinity device unique ID</em></p> -->
                            </td>
                        </tr>
                        <tr scope="row">
                            <th scope="row">
                                <label for="input-plan_id">Select Plan ID</label>
                            </th>
                            <td>
                                <button id="add_new_plan" type="button">
                                    Add Plan
                                </button>
                                <!-- <p class='description'><em>This plain id is use for purchase the infinity plan.</em></p> -->
                                <div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Plan ID</td>
                                                <td>Color Name</td>
                                                <td>Color Code</td>
                                                <td>Device Image</td>
                                                <td>Delete</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input name="planData[plan_id][]" type="number" /></td>
                                                <td><input name="planData[color_name][]" type="text" /></td>
                                                <td><input name="planData[color_code][]" type="color" /></td>
                                                <td><input type="file" name="planData[device_image][]" /></td>
                                                <td><button id="remove_plan" type="button">X</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=ytl-pull-data-map-infinity-data" />
                    <input type="hidden" name="trigger-upload-data" value="1" />
                    <input type="hidden" name="action" value="ytl-create_new_device" />
                    <input type="submit" name="btn-triggerForm" id="btn-pullData" class="button button-primary" value="Add New Device" />
                </p>
            </form>
        </div>
        <div class="layer-section">
            <h2>Device Bundle Plans</h2>
            <table width="100%" class="device__data__table">
                <thead>
                    <tr>
                        <td>Device ID</td>
                        <td>Device Name</td>
                        <td>Capacity</td>
                        <td>Color</td>
                        <td>Plan Name</td>
                        <td>Details</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($device_bundle_plans) && !empty($device_bundle_plans) && is_array($device_bundle_plans)) {
                        foreach ($device_bundle_plans as $device_id => $device) {
                        ?>
                            <tr class="view">
                                <td><?= isset($device_id) ? $device_id : '' ?></td>
                                <td><?= isset($device['device_name']) ? $device['device_name'] : '' ?></td>
                                <td><?= isset($device['capacity']) ? implode(',',$device['capacity']) : '' ?></td>
                                <td>
                                    <?php 
                                        $plan_color = [];
                                        if( isset($device['planData']) && !empty($device['planData']) && is_array($device['planData']) ) {
                                            foreach( $device['planData'] as $planData ) {
                                                $plan_color[] = $planData['color_name'];
                                            }
                                        }
                                        echo implode(', ',$plan_color);
                                    ?>
                                </td>
                                <td><?= isset($device['plan_name']) ? $device['plan_name'] : '' ?></td>
                                <td><?= implode(', <br>',$device['details']) ?></td>
                                <td>
                                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                        <input type="hidden" name="deviceBundleId" value="<?= isset($device_id) ? $device_id : '' ?>" />
                                        <input type="hidden" name="action" value="ytl-DeleteDeviceBundle" />
                                        <button type="submit" class="button"> Delete </button>
                                        <button type="button" class="ywos_view_device_plans button">
                                            View Plans
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr class="fold">
                                <td colspan="7">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Plan ID</td>
                                                <td>Color Name</td>
                                                <td>Color Code</td>
                                                <td>Device Image</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($device['planData']) && !empty($device['planData']) && is_array($device['planData'])) {
                                                foreach ($device['planData'] as $plan) {
                                                    $plan = (array) $plan;
                                                    ?>
                                                    <tr>
                                                        <td><?= isset($plan['plan_id']) ? $plan['plan_id'] : '' ?></td>
                                                        <td><?= isset($plan['color_name']) ? $plan['color_name'] : '' ?></td>
                                                        <td><?= isset($plan['color_code']) ? $plan['color_code'] : '' ?></td>
                                                        <td><img class="device_image" src="<?= isset($plan['device_image']) ? $plan['device_image'] : '' ?>" />
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    jQuery(function() {
        jQuery(".ywos_view_device_plans").on("click", function() {
            jQuery(this).parents('tr').toggleClass("open").next(".fold").toggleClass("open");
        });
    }); 
</script>
<?php
echo "<pre>";
print_r($device_bundle_plans);
echo "</pre>";

?>