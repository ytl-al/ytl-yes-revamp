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
                    <td><?= isset($device['capacity']) ? implode(',', $device['capacity']) : '' ?></td>
                    <td>
                        <?php
                        $plan_color = [];
                        if (isset($device['planData']) && !empty($device['planData']) && is_array($device['planData'])) {
                            foreach ($device['planData'] as $planData) {
                                $plan_color[] = $planData['color_name'];
                            }
                        }
                        echo implode(', ', $plan_color);
                        ?>
                    </td>
                    <td><?= isset($device['plan_name']) ? $device['plan_name'] : '' ?></td>
                    <td><?= implode(', <br>', $device['details']) ?></td>
                    <td>
                        <form id="" style="display:inline-block" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <input type="hidden" name="deviceBundleId" value="<?= isset($device_id) ? $device_id : '' ?>" />
                            <input type="hidden" name="action" value="ytl-DeleteDeviceBundle" />
                            <button type="submit" class="button"> Delete </button>
                        </form>
                        <form id="" style="display:inline-block" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <input type="hidden" name="deviceBundleId" value="<?= isset($device_id) ? $device_id : '' ?>" />
                            <input type="hidden" name="action" value="ytl-EditDeviceBundle" />
                            <button type="button" class="ywos_view_device_plans button">View Plans</button>
                            <button type="submit" class=" button">Edit Plans</button>
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