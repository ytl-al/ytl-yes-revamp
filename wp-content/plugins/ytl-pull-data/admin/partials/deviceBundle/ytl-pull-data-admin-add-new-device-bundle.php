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