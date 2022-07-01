<?php require_once('includes/header.php') ?>
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/eligibilitycheck/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3">Check Out</h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main>

    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. Eligibility check</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>2. MyKAD verification</span>
                </li>
                <li ui-sref="thirdStep">
                    <span>3. Delivery details</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>4. Review and order</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->
    <section id="cart-body">
        <div class="container" style="border: 0">
            <div id="main-vue">
            <div class="border-box">
                <div class="row">
                    <div class="col-md-5 p-5 flex-column bg-checkout">
                        <div class="title text-white checkout-left">
                            MyKAD Verification
                            <div class="mt-3" style="font-size: 14px;line-height: 20px;">
                                A few steps to verify your identity<br> before we continue.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-5">
                        <div class="verify-body mt-3">
                            <h3 class="subtitle2 d-none d-md-block">Scan the QR code to begin verification</h3>
                            <div class="mt-5 mb-5">
                                <div class="d-none d-md-block" id="qrcode"></div>
                                <div class="text-center d-block d-md-none">
                                    <a id="cmdVerify" target="_blank" class="btn btn-danger mt-3">Verify Now</a>
                                </div>
                            </div>
                            <h3 class="subtitle2">Complete the verification in 2 simple steps!</h3>

                            <ul class="list-2 mt-5">
                                <li><div><span class="number">1</span></div>
                                    <div>
                                        <div class="subtitle2">MyKAD Validation</div>
                                        <p>Scan your MyKAD with the object in a well lit room facing on a flat surface with minimum reflection</p>
                                    </div></li>
                                <li class="mt-3"><div><span class="number">2</span></div>
                                    <div>
                                        <div class="subtitle2">Face Verification</div>
                                        <p>Ensure your face is within the frame for an accurate detection</p>
                                    </div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

</main>
<?php require_once('includes/footer.php'); ?>
<?php $apiSetting = \Inc\Base\Model::getAPISettings();?>
<script type="text/javascript"
        src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/qrcodejs/qrcode.min.js"></script>
<script type="text/javascript">
 var windows = [];
 $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                ekyc_url: '<?php echo $apiSetting["ekyc_url"]?>',
                ekyc_uid: '',
                totalAttempt:0,
                maxAttempts:60,
                interval: null,
                qrcode: null,
                verifyWindow: null,
                eligibility: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                customer:{
                    id:'',
                    securityNumber: '',
                    fullName: '',
                    productSelected:''
                },
                orderSummary: {
                    product: {
                        selected:{
                            productCode:'',
                            code:'',
                            nameEN:'',
                            shortDescriptionEN:'',
                            productBundleId:'',
                            extraProperties:'',
                            contractName:'',
                            capacity:'',
                            color:'',
                            contract:'',
                            devicePriceMonth:'',
                            planPerMonth:'',
                            upFrontPayment:0.0,
                            plan:{
                                planId:'',
                                nameEN:'',
                                shortDescriptionEN:'',
                            }
                        },
                        colors:[]
                    },
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        productCode: null,
                        orderItems:[]
                    },
                },
            },

            created: function () {
                var self = this;
                self.ekyc_uid = self.generateUUID();

                setTimeout(function () {

                    self.pageInit();

                }, 500);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                        }else{
							 elevate.redirectToPage('eligibilitycheck');
						}
                        if (elevate.lsData.customer) {
                            self.customer = elevate.lsData.customer;
                        }

                        self.dealer = elevate.lsData.meta.dealer;

                        if(!self.customer.id){
                            elevate.redirectToPage('eligibilitycheck');
                        }else{
                            self.eKYC_init();
                        }
                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                eKYC_init: function () {
                    var self = this;

                    self.makeCode(self.ekyc_uid);
                    self.interval = setInterval(function (){
                        self.eKYC_check();
                    },5000);

					$('#cmdVerify').click(function(){
						var url = $('#cmdVerify').data('url');
						windows.push(window.open(url, '_blank'));
					})

					$('#cmdVerifyClose').click(function(){
						for(var i = 0; i < windows.length; i++){
							windows[i].close()
						}
					})

                },
                eKYC_check: function () {
                    var self = this;

                    self.totalAttempt++;
                    if( self.totalAttempt <= self.maxAttempts){
                        var params = {
                            uid: self.ekyc_uid,
                            mykad: self.eligibility.mykad,
                            fname: self.eligibility.name
                        };
						var d = new Date();
                        axios.post(apiEndpointURL_elevate + '/ekyc-check?t='+d.getTime(), params)
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){
                                    if(data.data.processStatus && data.data.processStatus.toUpperCase() == "EKYC_DONE"){
                                        //success
                                        clearInterval(self.interval);
										for(var i = 0; i < windows.length; i++){
											windows[i].close()
										}
                                        self.CAVerification(data.data);
										//elevate.redirectToPage('personal');
                                    }

									if(data.data.processStatus && data.data.processStatus.toUpperCase() == "EKYC_FAILED"){
                                        //failure
                                        clearInterval(self.interval);
										for(var i = 0; i < windows.length; i++){
											windows[i].close()
										}
                                        toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, Your verification was rejected by eKYC system.',"elevate.redirectToPage('/error?ca=failure')")
                                        //elevate.redirectToPage('/error/');

                                    }
                                }
                            })
                            .catch((error) => {
                                console.log(error, response);
                            });

                    }else{
                        clearInterval(self.interval);
                        toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, We can\'t verify your eKYC because of time limit.',"elevate.redirectToPage('/eligibility-failure')")
                        //elevate.redirectToPage('/eligibility-failure/');
                    }
                },

                CAVerification: function (response) {

                    var self = this;
                    var params = {
                        mykad: self.eligibility.mykad,
                        name:self.eligibility.name,
                        email:self.eligibility.email,
                        phone:self.eligibility.phone,
                        PartneReferenceID:self.customer.id,
                        OCRConfidenceScore:response.sim,
                    };
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/ca-verification', params)
                        .then((response) => {

                            var data = response.data;

                            if (parseInt(data.status) == 1) {
                                elevate.redirectToPage('personal');
                            } else {
                                toggleOverlay(false);
                                toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful because your NRIC is not eligible.',"elevate.redirectToPage('/compasia-fail')")
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });
                },
                redirectYWOS:function (){
                    var self = this;
                    toggleOverlay();
                    ywos.buyPlan(self.selectedPlan);
                },

                generateUUID: function() {
                    var d = new Date().getTime();//Timestamp
                    var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
                    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                        var r = Math.random() * 16;
                        if(d > 0){
                            r = (d + r)%16 | 0;
                            d = Math.floor(d/16);
                        } else {
                            r = (d2 + r)%16 | 0;
                            d2 = Math.floor(d2/16);
                        }
                        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
                    });
                },

                makeCode: function (uid) {
                    var self = this;
                    var url_verification = self.ekyc_url + 'EKYC/?fullName=' + encodeURIComponent (self.eligibility.name) + '&nric=' + self.eligibility.mykad + '&guid=' + encodeURIComponent(uid);
                    $('#cmdVerify').data('url', url_verification);
                    //self.qrcode.makeCode(url_verification);
					const qrcode = new QRCode(document.getElementById('qrcode'), {
					  text: url_verification,
					  width: 128,
					  height: 128,
					  colorDark : '#000',
					  colorLight : '#fff',
					  correctLevel : QRCode.CorrectLevel.H
					});
                }
            }
        });
    });
</script>
