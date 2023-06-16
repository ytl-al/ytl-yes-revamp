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
        <a href="?page=ytl-token-data-guest-login" class="nav-tab">Guest Login Token Details </a>
    </div>

    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">

            <?php
                if( isset($deviceData['type']) && $deviceData['type'] == 'edit-data'  ) {
                    require_once plugin_dir_path(dirname(__FILE__)) . 'partials/deviceBundle/ytl-pull-data-admin-edit-device-bundle.php';
                }else{
                    require_once plugin_dir_path(dirname(__FILE__)) . 'partials/deviceBundle/ytl-pull-data-admin-add-new-device-bundle.php';
                }
            ?>
        </div>
        <div class="layer-section">
            <?php require_once plugin_dir_path(dirname(__FILE__)) . 'partials/deviceBundle/ytl-pull-data-admin-device-bundle-table.php'; ?>
        </div>
    </div>
</div>
<script>
    jQuery(function() {
        jQuery(".ywos_view_device_plans").on("click", function() {
            jQuery(this).parents('tr').toggleClass("open").next(".fold").toggleClass("open");
        });

        jQuery(document).on('click', '.ywos_edit_device_plans', function(e) {
            e.preventDefault();
            jQuery(this).parents('form').find('[name="action"]').val('ytl-EditDeviceBundle');
            jQuery('#bundle_device_action').submit();
        });
    }); 
</script>
<?php
// echo "<pre>";
// print_r($device_bundle_plans);
// echo "</pre>";

?>