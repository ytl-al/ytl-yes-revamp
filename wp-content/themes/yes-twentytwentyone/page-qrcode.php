<?php
use Inc\Api\ElevateApi;
use Inc\Base\AESEncryption;
$AESEncryption_inputKey = "090911531ED5132896909CCB781E8C8657C28C897470A0BFF89FA906BA5A1986";
$AESEncryption_iv = "C1620E617EE4FE95";
$AESEncryption_blockSize = 256;

$order_planNumber = $_GET['orderNumber'];

$order_plan = ElevateApi::elevate_order_get_by_number($order_planNumber);
if($order_planNumber && $order_plan['status']){
	$customerQRCodeScanned = boolval($order_plan['data']['customerQRCodeScanned']);
	$customerGUID = $order_plan['data']['customerGUID'];
	$customer = ElevateApi::elevate_customer_get_by_uid($customerGUID); 
	//print_r($customer);
} 

$data =  $customer['data']['securityNumber'].':'.$customer['data']['fullName'].':'.$customer['data']['id'].':'.$order_planNumber.':';
//json_encode(['nric'=>$customer['data']['securityNumber'],'uuid'=>$customer['data']['id'],'order_no'=>$order_planNumber]);
		
$aes = new \Inc\Base\AESEncryption($data , $AESEncryption_inputKey, $AESEncryption_iv, $AESEncryption_blockSize);
$enc = $aes->encrypt(); 
//$dec = $aes->decrypt();
//echo "After encryption: ".$enc."<br/>";
//echo "After decryption: ".$dec."<br/>";?>
<script type="text/javascript"
        src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/qrcodejs/qrcode.min.js"></script>
<table border="1" style="border-collapse: collapse;">
<tr><td>OrderNumber</td><td><?php echo $order_planNumber?></td></tr>
<tr><td>Status</td><td><?php echo $order_plan['data']['orderStatus']?></td></tr>
<tr><td>Name</td><td><?php echo $customer['data']['fullName']?></td></tr>
<tr><td>NRIC</td><td><?php echo $customer['data']['securityNumber']?></td></tr>
<tr><td>UUID</td><td><?php echo $customer['data']['id']?></td></tr>
<tr><td>Plain Text</td><td><?php echo $data;?></td></tr>
<tr><td>Encrypt Text</td><td><?php echo base64_encode($enc)?></td></tr>
<tr><td>Link For Scan</td><td><a href="https://yes-revamp.mynameislatif.net/elevate/delivery-check/?val=<?php echo base64_encode($enc)?>" target="_blank" style="display:inline-block; padding:5px 20px; border-radius:5px; background:blue; color:white";>Scan Now</a></td></tr>
<tr><td>QRCODE</td><td><div id="qrcode"></div> </td></tr>
</table>

<script>
	var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 300,
            height : 300
        });

        function makeCode () {
            var url_verification = '<?php echo base64_encode($enc)?>';

            qrcode.makeCode(url_verification);
        }

        makeCode();

</script>