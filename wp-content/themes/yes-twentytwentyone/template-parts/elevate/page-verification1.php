<?php require_once('includes/header.php') ?>
<div id="main-vue">
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/eligibilitycheck/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> {{ renderText('back') }}</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3">{{ renderText('check_out') }}</h1>
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
                    <span>{{ renderText('elevate_step_1') }}</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>{{ renderText('elevate_step_2') }}</span>
                </li>
                <li ui-sref="thirdStep">
                    <span>{{ renderText('elevate_step_3') }}</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>{{ renderText('elevate_step_4') }}</span>
                </li>
                <li ui-sref="fifthStep">
                    <span>{{ renderText('elevate_step_5') }}</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->
    <section id="cart-body">
        <div class="container" style="border: 0">
            <div >
            <div class="border-box">
                <div class="row">
                    <div class="col-md-5 p-5 flex-column bg-checkout">
                        <div class="title text-white checkout-left">
                            {{ renderText('MyKAD_verification') }}
                            <div class="mt-3" style="font-size: 14px;line-height: 20px;" v-html="renderText('verify_label_1')">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-5">
                        <div class="verify-body mt-3">
                            <h3 class="subtitle2 d-none d-md-block">{{ renderText('verify_label_2') }} </h3>
                            <div class="mt-5 mb-5">
                                <div class="d-none d-md-block" id="qrcode"></div>
                                <div class="text-center d-block d-md-none">
                                    <a id="cmdVerify" target="_blank" class="btn btn-danger mt-3">{{ renderText('verify_now') }}</a>
                                </div>
                            </div>
                            <h3 class="subtitle2">{{ renderText('verify_label_3') }}</h3>

                            <ul class="list-2 mt-5">
                                <li><div><span class="number">1</span></div>
                                    <div>
                                        <div class="subtitle2">{{ renderText('verify_label_4') }}</div>
                                        <p>{{ renderText('verify_label_5') }}</p>
                                    </div></li>
                                <li class="mt-3"><div><span class="number">2</span></div>
                                    <div>
                                        <div class="subtitle2">{{ renderText('verify_label_6') }}</div>
                                        <p>{{ renderText('verify_label_7') }}</p>
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
</div>
<?php require_once('includes/footer.php'); ?>
<?php $apiSetting = ( new \Inc\Base\Model)->getAPISettings();?>
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
                        axios.post(apiEndpointURL_elevate + '/ekyc-check?t='+d.getTime() + '&nonce='+yesObj.nonce, params)
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){
                                    if(data.data.processStatus && data.data.processStatus.toUpperCase() == "EKYC_DONE"){
                                        //success
                                        clearInterval(self.interval);
										for(var i = 0; i < windows.length; i++){
											windows[i].close()
										}
                                        // self.CAVerification(data.data);
                                        self.OCVerification(data.data);
										//elevate.redirectToPage('personal');
                                    }

									if(data.data.processStatus && data.data.processStatus.toUpperCase() == "EKYC_FAILED"){
                                        //failure
                                        clearInterval(self.interval);
										for(var i = 0; i < windows.length; i++){
											windows[i].close()
										}
                                        toggleModalAlert('Error',this.renderText('eKYC_rejected'),"elevate.redirectToPage('/error?ca=failure')")
                                        //elevate.redirectToPage('/error/');

                                    }
                                }
                            })
                            .catch((error) => {
                                console.log(error, response);
                            });

                    }else{
                        clearInterval(self.interval);
                        toggleModalAlert('Error',this.renderText('eKYC_time_limit'),"elevate.redirectToPage('/eligibility-failure')")
                        //elevate.redirectToPage('/eligibility-failure/');
                    }
                },

                CAVerification: function (response) {
                    var self = this;
                    var params = {
                        mykad: self.eligibility.mykad,
                        name: self.eligibility.name,
                        email: self.eligibility.email,
                        phone: self.eligibility.phone,
                        PartneReferenceID: self.customer.id,  // Corrected the property name "PartneReferenceID" to "PartnerReferenceID"
                        OCRConfidenceScore: response.sim,
                    };
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/ca-verification' + '?nonce=' + yesObj.nonce, params)
                        .then((response) => {
                            var data = response.data;
                            if (parseInt(data.status) === 1) {  // Corrected the comparison operator from "==" to "==="
                                elevate.redirectToPage('select-sim-type');
                            } else {
                                if (elevate.lsData.product) {
                                    self.orderSummary.product = elevate.lsData.product;
                                }

                                if (self.orderSummary.product.selected.productCode) {
                                    const mapPlanId = {
                                        1125: {
                                            planID: 1161,
                                            deviceID: 1,
                                        },
                                        1127: {
                                            planID: 1163,
                                            deviceID: 1,
                                        },
                                        1129: {
                                            planID: 1165,
                                            deviceID: 2,
                                        },
                                        1131: {
                                            planID: 1167,
                                            deviceID: 2,
                                        },
                                        1133: {
                                            planID: 1169,
                                            deviceID: 2,
                                        },
                                        1135: {
                                            planID: 1171,
                                            deviceID: 3,
                                        },
                                        1137: {
                                            planID: 1173,
                                            deviceID: 3,
                                        },
                                        1139: {
                                            planID: 1175,
                                            deviceID: 3,
                                        },
                                        1141: {
                                            planID: 1177,
                                            deviceID: 4,
                                        },
                                        1143: {
                                            planID: 1179,
                                            deviceID: 4,
                                        },
                                        1145: {
                                            planID: 1181,
                                            deviceID: 5,
                                        },
                                        1147: {
                                            planID: 1183,
                                            deviceID: 5,
                                        },
                                        1149: {
                                            planID: 1185,
                                            deviceID: 5,
                                        },
                                        1151: {
                                            planID: 1187,
                                            deviceID: 5,
                                        },
                                        1153: {
                                            planID: 1189,
                                            deviceID: 6,
                                        },
                                        1155: {
                                            planID: 1191,
                                            deviceID: 6,
                                        },
                                        1157: {
                                            planID: 1193,
                                            deviceID: 6,
                                        },
                                        1159: {
                                            planID: 1195,
                                            deviceID: 6,
                                        },
                                        1205: {
                                            planID: 1209,
                                            deviceID: 7,
                                        },
                                        1207: {
                                            planID: 1211,
                                            deviceID: 7,
                                        },
                                        1221: {
                                            planID: 1225,
                                            deviceID: 8,
                                        },
                                        1223: {
                                            planID: 1227,
                                            deviceID: 8,
                                        },
                                        1213: {
                                            planID: 1217,
                                            deviceID: 8,
                                        },
                                        1215: {
                                            planID: 1219,
                                            deviceID: 8,
                                        },
                                        4514:{
                                            planID:4520,
                                            deviceId:9,
                                        },
                                        4516:{
                                            planID:4522,
                                            deviceId:9,
                                        },
                                        4518:{
                                            planID:4524,
                                            deviceId:9,
                                        },
                                        4526:{
                                            planID:4530,
                                            deviceId:9,
                                        },
                                        4528:{
                                            planID:4532,
                                            deviceId:9,
                                        },
                                        4534:{
                                            planID:4538,
                                            deviceId:9,
                                        },
                                        4536:{
                                            planID:4540,
                                            deviceId:9,
                                        },

                                       
                                    };

                                    if (mapPlanId[self.orderSummary.product.selected.productCode]) {
                                        self.upFrontPlanID = mapPlanId[self.orderSummary.product.selected.productCode].planID;
                                        if (self.upFrontPlanID !== '') {  // Corrected the comparison operator from "!=" to "!=="
                                            var data = JSON.parse(localStorage.getItem('yesElevate'));
                                            data.meta.isUpFrontPlanAvailable = 'true';
                                            data.meta.upFrontPlanID = self.upFrontPlanID;
                                            var upfrontData = JSON.stringify(data);
                                            localStorage.setItem('yesElevate', upfrontData);
                                            toggleModalAlert('Error', this.renderText('NRIC_is_not_eligible'), "elevate.redirectToPage('eligibility-fail-upfront')");
                                        }
                                    } else {
                                        toggleModalAlert('Error', this.renderText('NRIC_is_not_eligible'), "elevate.redirectToPage('eligibility-failure')");
                                    }
                                }
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });
                },


            OCVerification: function (response) {
                var self = this;
                var params = {
                    mykad: self.eligibility.mykad,
                    name:self.eligibility.name,
                    OCRConfidenceScore:response.sim,
                };

                toggleOverlay();
                axios.post(apiEndpointURL_elevate + '/orix-check' + '?nonce='+yesObj.nonce, params)
                    .then((response) => {
                        var data = response.data.data;
                        if (data.result == 'Success') {
                            elevate.redirectToPage('select-sim-type');
                        } else {
                            
                            if (elevate.lsData.product) {
                                self.orderSummary.product = elevate.lsData.product;
                            }

                            if (self.orderSummary.product.selected.productCode) {
                                const mapPlanId = {
                                    1125: {
                                            planID: 1161,
                                            deviceID: 1,
                                        },
                                        1127: {
                                            planID: 1163,
                                            deviceID: 1,
                                        },
                                        1129: {
                                            planID: 1165,
                                            deviceID: 2,
                                        },
                                        1131: {
                                            planID: 1167,
                                            deviceID: 2,
                                        },
                                        1133: {
                                            planID: 1169,
                                            deviceID: 2,
                                        },
                                        1135: {
                                            planID: 1171,
                                            deviceID: 3,
                                        },
                                        1137: {
                                            planID: 1173,
                                            deviceID: 3,
                                        },
                                        1139: {
                                            planID: 1175,
                                            deviceID: 3,
                                        },
                                        1141: {
                                            planID: 1177,
                                            deviceID: 4,
                                        },
                                        1143: {
                                            planID: 1179,
                                            deviceID: 4,
                                        },
                                        1145: {
                                            planID: 1181,
                                            deviceID: 5,
                                        },
                                        1147: {
                                            planID: 1183,
                                            deviceID: 5,
                                        },
                                        1149: {
                                            planID: 1185,
                                            deviceID: 5,
                                        },
                                        1151: {
                                            planID: 1187,
                                            deviceID: 5,
                                        },
                                        1153: {
                                            planID: 1189,
                                            deviceID: 6,
                                        },
                                        1155: {
                                            planID: 1191,
                                            deviceID: 6,
                                        },
                                        1157: {
                                            planID: 1193,
                                            deviceID: 6,
                                        },
                                        1159: {
                                            planID: 1195,
                                            deviceID: 6,
                                        },
                                        1205: {
                                            planID: 1209,
                                            deviceID: 7,
                                        },
                                        1207: {
                                            planID: 1211,
                                            deviceID: 7,
                                        },
                                        1221: {
                                            planID: 1225,
                                            deviceID: 8,
                                        },
                                        1223: {
                                            planID: 1227,
                                            deviceID: 8,
                                        },
                                        1213: {
                                            planID: 1217,
                                            deviceID: 8,
                                        },
                                        1215: {
                                            planID: 1219,
                                            deviceID: 8,
                                        },
                                        4514:{
                                            planID:4520,
                                            deviceId:9,
                                        },
                                        4516:{
                                            planID:4522,
                                            deviceId:9,
                                        },
                                        4518:{
                                            planID:4524,
                                            deviceId:9,
                                        },
                                        4526:{
                                            planID:4530,
                                            deviceId:9,
                                        },
                                        4528:{
                                            planID:4532,
                                            deviceId:9,
                                        },
                                        4534:{
                                            planID:4538,
                                            deviceId:9,
                                        },
                                        4536:{
                                            planID:4540,
                                            deviceId:9,
                                        },


                                };

                                if (mapPlanId[self.orderSummary.product.selected.productCode]) {
                                    self.upFrontPlanID = mapPlanId[self.orderSummary.product.selected.productCode].planID;
                                    if(self.upFrontPlanID !=''){
                                        var data = JSON.parse(localStorage.getItem('yesElevate'))
                                        data.meta.isUpFrontPlanAvailable='true';
                                        data.meta.upFrontPlanID=self.upFrontPlanID;
                                        var upfrontData=JSON.stringify(data)
                                        localStorage.setItem('yesElevate',upfrontData)
                                        toggleModalAlert('Error',this.renderText('NRIC_is_not_eligible'),"elevate.redirectToPage('eligibility-fail-upfront')");
                                    }
                                }else{
                                    
                                    toggleModalAlert('Error',this.renderText('NRIC_is_not_eligible'),"elevate.redirectToPage('eligibility-failure')");
                                }
                            }
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
                },

                renderText: function(strID) {
                    return elevate.renderText(strID, Elevate_lang);
                }
            }
        });
    });
</script>
