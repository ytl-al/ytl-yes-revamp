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

<div class="wrap layer-ytlpdAdmin">
    <div class="page-header">
        <h1>YTL API Pull Data <span class="span-version"><em>v<?php echo YTL_PULL_DATA_VERSION; ?></em></span></h1>
    </div>
    <div class="nav-tab-wrapper">
        <a href="?page=ytl-pull-data" class="nav-tab">API Information Settings</a>
        <a href="javascript:void(0)" class="nav-tab nav-tab-active">Pull Plans Action</a>
        <a href="?page=ytl-pull-data-promo" class="nav-tab">Promo Data Upload</a>
        <a href="?page=ytl-pull-device-bundle-plan-data" class="nav-tab">Device Bundle Plan</a>
    </div>

    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">
            <h2>Pull Plans</h2>

            <?php settings_errors('ytlpd_messages'); ?>

            <form method="POST" id="form-pullAction">
                <?php wp_nonce_field('pull_plans_btn_clicked'); ?>

                <table class="form-table" role="presentation">
                    <tbody>
                        <?php if (get_option('ytlpd_updated_at') && get_option('ytlpd_plans_data')) : ?>
                        <tr>
                            <th scope="row">
                                <label for="ytlpd_updated_at">Last Pulled At</label>
                            </th>
                            <td>
                                <input type="text" class="regular-text" id="ytlpd_updated_at" name="ytlpd_updated_at" value="<?php echo date('Y-m-d H:i:s', get_option('ytlpd_updated_at')); ?>" readonly="readonly" />
                                <p class="description"><em><?php echo __('The timestamp for last successful data pulled and saved.', 'ytl-pull-data'); ?></em></p>
                            </td>
                        </tr>
                        <?php else : ?>
                        <tr>
                            <td><em><?php echo __('No plan pulled from API yet. Please click on the "Pull Data" button below to start pulling plan data.', 'ytl-pull-data'); ?></em></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=ytl-pull-data" />
                    <input type="hidden" name="trigger_pull_data" value="1" />
                    <input type="submit" name="btn-pull" id="btn-pullData" class="button button-primary" value="Pull Data" />
                </p>
            </form>
        </div>

        <?php 
            $plans_data = get_option('ytlpd_plans_data');
            $has_plans  = false;
            if ($plans_data) :
                $has_plans  = true;
                $plans_obj  = unserialize($plans_data);
        ?>
        <div class="layer-section">
            <div class="layer-preCode">
                <h2>Plans Data Object</h2>
                <pre><?php print_r($plans_obj); ?></pre>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script type="text/javascript">
    (function($) {
        var hasPlans = <?php echo ($has_plans) ? $has_plans : 0; ?>;
        $(document).ready(function() {
            $('#form-pullAction').on('submit', function(e) {
                var confirmText = (hasPlans) ? 'Are you sure you want to pull the plan data? The plan data will be overwritten if you proceed with the Pull Data action.' : 'Are you sure you want to pull the plan data?';
                var retConfirm  = confirm(confirmText);

                if (!retConfirm) {
                    var cancelText  = (hasPlans) ? 'Pull data action has been cancelled. Plan data will not be updated.' : 'Pull data action has been cancelled.';

                    setTimeout(function() {
                        alert(cancelText);
                    }, 500);

                    e.preventDefault();
                }
            });
        });
    })(jQuery);
</script>