<?php

$apiSetting =  \Inc\Base\Model::getAPISettings();
?>

    <!-- This file should primarily consist of HTML with a little bit of PHP. -->

    <div class="wrap layer-ytlpdAdmin">
    <div class="page-header">
        <h1>Elevate</em></span></h1>
    </div>
    <div class="nav-tab-wrapper">
        <a href="javascript:void(0)" class="nav-tab nav-tab-active">API Settings</a>
        <!--a href="?page=elevate-pull" class="nav-tab">Pull Products</a-->
    </div>

    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">
            <h2>API Setting</h2>

            <?php settings_errors('elevate_messages'); ?>

            <form action="" method="post">
                <table>
                    <tr>
                        <td><label>Identity API URL</label></td>
                        <td><input type="text" name="identity_url" class="form-control" value="<?= @$apiSetting['identity_url']; ?>" size="50"></td>
                    </tr>
					<tr>
                        <td><label>WEB API URL</label></td>
                        <td><input type="text" name="url" class="form-control" value="<?= @$apiSetting['url']; ?>" size="50"></td>
                    </tr>
					<tr>
                        <td><label>Mobile API URL</label></td>
                        <td><input type="text" name="mobile_url" class="form-control" value="<?= @$apiSetting['mobile_url']; ?>" size="50"></td>
                    </tr>
					<tr>
                        <td><label>eKYC URL</label></td>
                        <td><input type="text" name="ekyc_url" class="form-control" value="<?= @$apiSetting['ekyc_url']; ?>" size="50"></td>
                    </tr>
                    <tr>
                        <td><label>Client Id</label></td>
                        <td><input type="text" name="client_id" class="form-control" value="<?= @$apiSetting['client_id']; ?>" size="50"></td>
                    </tr>
                    <tr>
                        <td><label>UserName</label></td>
                        <td><input type="text" name="username" class="form-control" value="<?= @$apiSetting['username']; ?>" size="50"></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="text" name="password" class="form-control" value="<?= @$apiSetting['password']; ?>" size="50"></td>
                    </tr>
                    <tr>
                        <td><label>Grant Type</label></td>
                        <td><input type="text" name="grant_type" class="form-control" value="<?= @$apiSetting['grant_type']; ?>" size="50"></td>
                    </tr>
                    <tr>
                        <td><label>Client_Secret</label></td>
                        <td><input type="text" name="client_secret" class="form-control" value="<?= @$apiSetting['client_secret']; ?>" size="50"></td>
                    </tr>

                </table>
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
    </div><?php
