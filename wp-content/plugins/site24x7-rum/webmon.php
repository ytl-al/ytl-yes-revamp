<?php
if ( ! defined( 'ABSPATH' ) ) {exit; }// Exit if accessed directly
if (  isset( $_POST['s247submit'] ) ) {
if ( !wp_verify_nonce( $_POST['s247nonce'], 's247Action' ) ) 
{
print 'Sorry, your nonce did not verify.';
exit;
}
else{
$snippet = $_POST['s247codesnippet'];
$dc = $_POST['s247Dc'];
update_option('s247RumKeyDB',sanitize_key($snippet));
update_option('s247Datacentre',sanitize_key($dc));
}
}
wp_enqueue_style( 'site24x7-rum', plugins_url( '/css/site24x7-rum.css', __FILE__ ));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Site24x7 Website Monitoring</title>
</head>
<body>
<div class="main">
<h3 class="lvd_tit" style=" font-size:23px; font-weight:normal">
    <img src="<?php echo plugin_dir_url(__FILE__) . 'assets/logo.png'; ?>" height="57" width="57" style="vertical-align:middle; margin-right:5px"  />
    <span>Site24x7</span></h3>
    <div class="lvd_note" id="info_bar">
<b>Real User Monitoring (RUM) by Site24x7</b>
<br><br>
Real User Monitoring by Site24x7 gives accurate insight into real users’ application experience and helps visualise web app interaction patterns. Real User Monitoring provides deep insight into key performance metrics right from the initiation of the URL until the request is served back to the browser.  
<br><br>
The RUM plugin helps you add your Site24x7’s RUM code snippet to the FOOTER tag of your WordPress blog. Once added, Site24x7 immediately starts collecting data from your WordPress blog’s visitors. You can view all that collected data in your Site24x7 console at <a href="https://www.site24x7.com/app/apm#/apm/rum/list/"> https://www.site24x7.com/app/apm#/apm/rum/list/ </a>.
<br><br>
Please note that you need a <a href="https://www.site24x7.com/signup.html?pack=4&l=en">Site24x7 account</a> for this plugin. If you don’t have one, grab one at <a href="https://www.site24x7.com/signup.html?pack=4&l=en">site24x7.com</a>!</div>
<form method="post">
<div class="lvd_embd">
<div style="width:950px;">
<div class="lvd_embdrht">
<input id="s247codesnippet" onclick="this.select()" name="s247codesnippet" style="box-shadow:0px 0px 1px #83b633;width:400px" value="<?php  echo esc_textarea(get_option('s247RumKeyDB')) ?>" />
<?php
  $arr = array(
  "com" => "United States", 
  "eu" => "Europe", 
  "in" =>"India",
  "au" =>"Australia", 
  "cn" =>"China", 
  );
?>
<div style="margin-top: 40px">
    <select id="s247Dc" name="s247Dc">                      
       <?php
       $dcval = get_option('s247Datacentre')?: 'com';
       foreach (array_keys($arr) as $a){
        if($a == $dcval){
            echo "<option value='{$a}' selected='selected' >$arr[$a]</option>";
        }else{
            echo "<option value='{$a}' >$arr[$a]</option>";
        }
       }
       ?>
    </select>
</div>
<div class="lvds_btnmn">
<button type="submit" name="s247submit" class="button button-primary" value="Save Changes" >Save Changes</button>
    </div>
<?php $var = get_option('s247RumKeyDB');  if (!empty($var) && !preg_match( "/[\'a-z0-9\']{24,32}/i", $var )){ ?>
<script> document.getElementById("info_bar").innerHTML = "<b style='color:#900'>Please paste valid RUM Monitor code</b>";</script>
<?php } ?>
 </div>
               <div class="lvd_embdmid">→</div>
            <div class="lvd_embdlft">Please paste your Site24x7 RUM Key here. For steps to obtain a RUM key, please refer the steps below.<br> 
            <br>
            <div>Select your Site24x7 datacentre</div>
            <br>
            <div class="">If you don't have a Site24x7 account yet. Please <span><a target="_blank" href="https://www.site24x7.com/signup.html?pack=4&l=en">register here</a> for a free account.</span>    
            </div>
        </div>
    </div>
    </div>
<div class="lvd_sbdata">
        <h3 class="lvd_tit">Steps to get RUM Key</h3>
        <ul>
            <li><span>Log-in to your <a target="_blank" href="https://www.site24x7.com/login.html">Site24x7 </a> account.</span></li>
            <li><span>Go to APM tab -> Web RUM -> Add Application and enter an Application Name. Click Save to continue.</span></li>
        <li><span>Copy the RUM key from the Web RUM script and paste it above.</span></li>
        <li><span>Look for something like this: rumMOKey='7dh8cxiw6xxxze2nrf6driuwd'</span></li>
        <li><span>In this example above, the RUM key is: <em>7dh8cxiwxxx6ze2nrf6driuwd</em></span></li>
        <li><span>Refer <a target="_blank" href="https://www.site24x7.com/help/apm/rum.html">this user guide</a> for more information.</span></li>

        </ul>
</div>

   <?php wp_nonce_field( 's247Action', 's247nonce' ); ?>
</form>
    </div>
</body>
</html>