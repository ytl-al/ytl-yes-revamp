<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https:// https://www.ytl.com/technology.asp
 * @since      1.0.0
 *
 * @package    Portal_Cdn_Sync
 * @subpackage Portal_Cdn_Sync/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<div class="wrap layer-ytlpdAdmin">
    <div class="page-header">
        <h1>SCRM API Data <span class="span-version"><em>v<?php echo PORTAL_CDN_SYNC_VERSION; ?></em></span></h1>
    </div>
    <div class="nav-tab-wrapper">
        <a href="javascript:void(0)" class="nav-tab nav-tab-active">API Information Settings</a>
        <!-- <a href="?page=ytl-pull-data-action" class="nav-tab">Pull Plans Action</a>
        <a href="?page=ytl-pull-data-promo" class="nav-tab">Promo Data Upload</a>
        <a href="?page=ytl-pull-device-bundle-plan-data" class="nav-tab">Device Bundle Plan</a>
        <a href="?page=ytl-token-data-guest-login" class="nav-tab">Guest Login Token Details </a> -->
    </div>
    
    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">
            <h2>API Information</h2>
            
            <?php settings_errors('scrm_messages'); ?>

            <form method="POST" action="options.php">
                <?php 
                    settings_fields(SCRM_PREFIX.'settings');
                    do_settings_sections(SCRM_PREFIX.'settings');
                    submit_button(__('Save Settings', 'scrm-api-data'));
                ?>
            </form>
        </div>
    </div>
</div>