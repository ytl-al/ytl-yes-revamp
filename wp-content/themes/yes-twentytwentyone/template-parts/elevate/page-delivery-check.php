<?php
use Inc\Api\ElevateApi;
use Inc\Base\AESEncryption;
require_once('includes/header.php');
$AESEncryption_inputKey = "090911531ED5132896909CCB781E8C8657C28C897470A0BFF89FA906BA5A1986";
$AESEncryption_iv = "C1620E617EE4FE95";
$AESEncryption_blockSize = 256;

$customerQRCodeScanned = false;
 //https://elevate-dev.azurewebsites.net/Delivery?val=GCNcr+mdJYDM2W+3nK9OAe4ujiM2QHGnZOmO7aRGbfpY4UkY9dxVi4EmheFa3fkRn1QIE1v4PAE=
	$val = @$_GET['val'];
	$error = [];
	$nric = '';
	$order_planNumber = '';
	$fullName = '';
	if($val){
		//$data =  json_encode(['nric'=>'123456789','uuid'=>'88908b55-e952-414c-b0ee-9ff1cb6a7e76','order_no'=>'2000015992']);

		$aes = new \Inc\Base\AESEncryption(base64_decode($val), $AESEncryption_inputKey, $AESEncryption_iv, $AESEncryption_blockSize);
		//$enc = $aes->encrypt();
		$dec = $aes->decrypt();
		//echo "After encryption: ".$enc."<br/>";
		//echo "After decryption: ".$dec."<br/>";

		$payload = explode(':',$dec);

		$order_planNumber = $payload[3];

		if($order_planNumber){
			$order_plan = ElevateApi::elevate_order_get_by_number($order_planNumber);
		}
		if($order_planNumber && $order_plan['status']){
			$customerQRCodeScanned = boolval($order_plan['data']['customerQRCodeScanned']);
			$customerGUID = $order_plan['data']['customerGUID'];
			$customer = ElevateApi::elevate_customer_get_by_uid($customerGUID);
			if($customer['status']){
				$nric = 'XXXXXX-XX-'.substr($customer['data']['securityNumber'],8,4);
				$fullName = $customer['data']['fullName'];
			}else{
				$error[] = "Invalid customer.";
			}
		}else{
			$error[] = "Invalid order request.";
		}
		//print_r($customer);
	}

?>

<script type="text/javascript" src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/instascan/instascan.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/instascan/QrCodeScanner.js"></script>
<style>
	.nav .nav-item{
		background-color: #407CF6;
		line-height:40px;
	}

	.nav .disabled{
		background-color: #ccc;
		line-height:40px;

	}

	.nav .disabled a{
		cursor:default;
	}

	.nav .active{
		background-color: red;
	}

	.nav .radius_left{
		border-radius: 5px 0 0 5px;
	}
	.nav .radius_right{
		border-radius: 0 5px 5px 0;
	}

    .nav .nav-item a{
		color:#fff
    }

	.tabcontent{
		display:none;
	}

	.btnCheck {
		display: block;
		width: 100px;
		height: 100px;
		border-radius: 100%;
		margin: auto;
		font-size: 19px;
		padding-top: 18px;
		border: 5px solid #cccc;
		line-height: 50px;
	}


    #preview {
        width: 100%;
        height: 100%;
    }

	body{
		background: url(/wp-content/uploads/2021/09/amazing-things-bg.png);
		background-size: cover;
		background-repeat: no-repeat;
	}

</style>
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/infinite-phone-bundles/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3">Delivery</h1>

            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main class="clearfix site-main">

    <section id="cart-body">
        <!--   Big container   -->
        <div class="container" style="border:0;max-width:750px;">
            <div class="row">
                <div class="col-12">
					<h3 class="text-center" style="margin-bottom:30px">Confirm Device Delivery</h3>
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" style="padding:30px" data-color="red" id="wizard">
							<input type="hidden" id="scanFlag" value="0"/>
                            <form id="frm_confirm">
                                <div class="wizard-navigation">
                                    <ul class="nav nav-pills nav-fill">
                                        <li class="nav-item radius_left"><a href="#info" id="info-nav" onclick="changeTab(this, 'info')">Customer Info</a></li>
                                        <li class="nav-item <?php echo(strtolower($order_plan['data']['orderStatus']) == "new"&& !$customerQRCodeScanned)?'':'disabled';?>" ><a href="#package" id="package-nav"   onclick="changeTab(this, 'package')">Package QR</a></li>
                                        <li class="nav-item radius_right <?php echo(strtolower($order_plan['data']['orderStatus']) == "new"&& !$customerQRCodeScanned)?'':'disabled';?>"><a href="#confirm" id="confirm-nav" onclick="changeTab(this, 'confirm')">Confirm</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane tabcontent" id="tab-info" style="text-align: -webkit-center">
										<div style="padding:30px;">
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-8">
                                                <div>
                                                    <div class="form-group label-floating">
                                                        <h4 class="control-label"><?php echo $fullName;?></h4>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">NRIC</label>
                                                        <input name="name" type="text" readonly value="<?php echo $nric?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Order No</label>
                                                        <input name="SONO" id="SONO" type="text" readonly value="<?php echo $order_planNumber?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-12">
											<?php

											if($order_plan['status']){
											switch(strtolower($order_plan['data']['orderStatus'])){
												case 'new':
													?>
													<div>
													<?php if($customerQRCodeScanned){
													?>
													<h5 style="color:green;" class="mt-3">This order has been scanned.</h5>
													<?php
													}else{?>
													<a class="btn btn_scan btn-danger mt-3 btnCheck">Scan</a>
													<?php }?>
													</div>
													<?php
														break;
													case 'Delivered':
													?>
													<div>
													<h3 class="mt-3" style="color:red">Device has been delivered.</h3>
													</div>
													<?php
													break;
												case 'void':
													?>
													<div>
													<h3 class="mt-3" style="color:red">Device has been Void.</h3>
													</div>
													<?php
													break;
												default:
													?>
													<div>
													<h3 class="mt-3" style="color:red">Order has been <?php echo $order_plan['data']['orderStatus']?></h3>
													</div>
													<?php
													break;
											}
											}else{
												?>
												<h3 class="mt-3" style="color:red">Sorry, Invalid Data.</h3>
												<?php
											}
											?>
											<div id="debug"></div>
											</div>
										</div>
										</div>
									</div>
                                    <div class="tab-pane tabcontent" id="tab-package" style="text-align: -webkit-center">
                                        <?php if(strtolower($order_plan['data']['orderStatus']) == "new" && !$customerQRCodeScanned):?>
										<h2 style="margin:20px;">Scan QR on package </h2>
                                        <div class="row">
                                            <div class="col-sm-12" style="text-align:center">
                                                <span id="QRVal" style="font-size:30px; font-weight: bold"></span>
                                                <video id="preview" class="video-back" playsinline></video>
                                            </div>

                                        </div>
										<?php endif;?>
                                    </div>
                                    <div class="tab-pane tabcontent" id="tab-confirm" style="text-align: -webkit-center">
										<?php if(strtolower($order_plan['data']['orderStatus']) == "new"&& !$customerQRCodeScanned):?>
										<div style="padding:30px;">
                                        <div class="row match" style="display:none">
                                            <h2 style="margin:20px;" >Order Matched </h4>
											<div>
                                            <a id="btn_finish" class="btn btn-success mt-3 btnCheck">Finish</a>
											</div>
                                        </div>
                                        <div class="row mismatch" style="display:none">

                                            <h2 style="margin:20px;" >Order Mismatched </h4>
                                            <div class="col-sm-12">
                                                <div id="orderNoDisplay" style="font-size:20px; font-weight: bold">Customer Order No: <?php echo $order_planNumber?></div>
                                                <div id="qrerr" style="font-size:20px; font-weight: bold"></div>
												<div>
												<a class="btn btn_scan btn-danger mt-3 btnCheck">Scan</a>
												</div>
                                            </div>
                                        </div>
										</div>
										<?php endif;?>
									</div>
                                </div>
                                <div class="wizard-footer">
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->
    </section>

</main>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('#info-nav').trigger('click');
		//var content ='eWtvSnNNbXBqWGNpODZmNXlwcEh2UlhVQk1sZk9ZaEM0aEs4MDJIaE85L0NoaENaVnVtczl0cmVrSXEvV2JWb2YyTnlGem9xV3FyaUZDaEk1YS9JWHA0L1l6ajJHNnNWZkJxVW1mcDN2Tkk9';
		//checkQRCode(content);

		$('.btn_scan').click(function(){
			$('#package-nav').trigger('click');
		});

		$('#btn_finish').click(function(){
			 confirmQRCode();
		});
    });

	function changeTab(obj, tab) {
		if($(obj).parent().hasClass('disabled')) {
			return;
		}
		switch(tab){
			case 'package':
				$('#preview').show();
				$("#QRVal").text("");
				break;

			case 'confirm':
				var flag = parseInt($('#scanFlag').val());
				if(!flag){
					$('.match').hide();
					$('.mismatch').show();
					$("#orderNoDisplay").css({'color':'red'}).text("Please scan Order QRCode.");
					$("#qrerr").text("");
				}
				break;

		}

        $('.wizard-navigation .active').removeClass('active');
        $(obj).parent().addClass('active');
        $('.tabcontent').hide();
        $('#tab-' + tab).show();
    }

	function checkQRCode(content){
		toggleOverlay();
		$.ajax({
                    url: '<?php echo site_url()?>/wp-json/elevate/v1/qrcode/check?qrcode='+content + '&nonce='+yesObj.nonce,
                    type: 'GET',
                    data: '',
					dataType:'json',
                    success: function (response) {
                        $("#QRVal").text("Verifying QRCode...");
						$('#preview').hide();

						toggleOverlay(false);
						$('#scanFlag').val(1);
						if(parseInt(response.status) == 1){
							$('#confirm-nav').trigger('click');
							var cusSO = $('#SONO').val();
							if(cusSO == response.data.order_no){
								$('.match').show();
								$('.mismatch').hide();


							}else{
								$('.match').hide();
								$('.mismatch').show();
								$("#QRVal").text("Sorry, Invalid QRCode.");
								$("#orderNoDisplay").css({'color':'black'}).text("Customer Order No: " + cusSO);
								$("#qrerr").text("Pacakge Order No: " + response.data.order_no);

							}
						}else{
							$("#QRVal").text("Sorry, Invalid QRCode.");
						}

                    },
                    error: function (e) {
                        toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                    }
                });
	}

	function confirmQRCode(){
		toggleOverlay();
		$.ajax({
                    url: '<?php echo site_url()?>/wp-json/elevate/v1/qrcode/confirm' +'?nonce='+yesObj.nonce,
                    type: 'POST',
                    data: $('#frm_confirm').serialize(),
					dataType:'json',
                    success: function (response) {
                        toggleOverlay(false);
						// console.log(response);
						location.reload();
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                });
	}

    window.addEventListener('load', (event) => {
        var scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview'),
                scanPeriod: 1,
                mirror: false
            });
        scanner.addListener('scan', function (content) {
			if(content){
				checkQRCode(content);
			}

        });
        Instascan.Camera.getCameras().then(function (cameras) {
			//$('#debug').html(JSON.stringify(cameras));
            if (cameras.length > 0) {
                let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;

                if (isMobile) { //if mobile then load back camera
					//alert(JSON.stringify(cameras[1]));
                    scanner.start(cameras[1]);
                }
                else { //else load front camera
					//alert(JSON.stringify(cameras[0]));
                    scanner.start(cameras[0]);
                }

            } else {
                alert('No cameras found or permission denied');
            }
        }).catch(function (e) {
            alert(e);
        });
    });

</script>