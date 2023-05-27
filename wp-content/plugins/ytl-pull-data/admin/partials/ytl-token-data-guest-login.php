<?php
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $data['set_token_data_guest_login'] = array(
        'token_url' => trim($_POST["token_url"]),
        'otp_url' => trim($_POST["otp_url"]),
        'client_id' => trim($_POST["client_id"]),
        'grant_type' => trim($_POST["grant_type"]),
        'client_secret' => trim($_POST["client_secret"]),
        'username' => trim($_POST["username"]),
        'password' => trim($_POST["password"]),
    );
    update_option('yes_gauest_login_token_data', $data);
}

$guestLoginData = get_option('yes_gauest_login_token_data', true);
foreach ($guestLoginData as $guestLogin) {
    $token_url = $guestLogin['token_url'];
    $otp_url = $guestLogin['otp_url'];
    $client_id = $guestLogin['client_id'];
    $grant_type = $guestLogin['grant_type'];
    $client_secret = $guestLogin['client_secret'];
    $username = $guestLogin['username'];
    $password = $guestLogin['password'];

}

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap layer-ytlpdAdmin">
    <div class="page-header">
        <h1>Guest Login Token data </em></span></h1>
    </div>
    <div class="nav-tab-wrapper">
        <a href="javascript:void(0)" class="nav-tab nav-tab-active">Guest Login API Settings</a>
        <!--a href="?page=elevate-pull" class="nav-tab">Pull Products</a-->
    </div>

    <div class="wrapper-ytlpdAdmin">
        <div class="layer-section">
            <h2>API Setting</h2>
            <form action="" id="ajax-contact-form" method="post">
                <table>
                    <tr>
                        <td><label>Token API URL</label></td>
                        <td><input type="text" name="token_url" id="token_url" class="form-control"
                                value="<?php echo $token_url = isset($token_url) ? $token_url : "null"; ?>" size="50"
                                required></td>
                    </tr>
                    <tr>
                        <td><label>OTP API URL</label></td>
                        <td><input type="text" name="otp_url" id="otp_url" class="form-control"
                                value="<?php echo $otp_url = isset($otp_url) ? $otp_url : "null"; ?>" size="50"
                                required></td>
                    </tr>

                    <tr>
                        <td><label>Client Id</label></td>
                        <td><input type="text" name="client_id" id="client_id" class="form-control"
                                value="<?php echo $client_id = isset($client_id) ? $client_id : "null"; ?>" size="50"
                                required></td>
                    </tr>
                    <tr>
                        <td><label>Client_Secret</label></td>
                        <td><input type="text" name="client_secret" id="client_secret" class="form-control"
                                value="<?php echo $client_secret = isset($client_secret) ? $client_secret : "null"; ?>"
                                size="50" required></td>
                    </tr>
                    <tr>
                        <td><label>Grant Type</label></td>
                        <td><input type="text" name="grant_type" id="grant_type" class="form-control"
                                value="<?php echo $grant_type = isset($grant_type) ? $grant_type : "null"; ?>"
                                size="50" required></td>
                    </tr>
                    <tr>
                        <td><label>UserName</label></td>
                        <td><input type="text" name="username" id="username" class="form-control"
                                value="<?php echo $username = isset($username) ? $username : "null"; ?>" size="50"
                                required></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="text" name="password" id="password" class="form-control"
                                value="<?php echo $password = isset($password) ? $password : "null"; ?>" size="50"
                                required></td>
                    </tr>


                </table>
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</div>