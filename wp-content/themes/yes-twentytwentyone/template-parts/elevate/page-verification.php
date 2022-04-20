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
                    <span>2. ID verification</span>
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
                            ID Verification
                            <div class="mt-3" style="font-size: 14px;line-height: 20px;">
                                A few steps to verify your identity before we continue.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-5">
                        <div class="verify-body mt-3">
                            <h3 class="subtitle2 d-none d-md-block">Scan the QR code to begin verification</h3>
                            <div class="mt-5 mb-5">
                                <div class="d-none d-md-block" id="qrcode"></div>
                                <div class="text-center d-block d-md-none">
                                    <a id="cmdVerify" href="#" target="_blank" class="btn btn-danger mt-3">Verify Now</a>
                                </div>
                            </div>
                            <h3 class="subtitle2">Complete the verification in 2 simple steps!</h3>

                            <ul class="list-2 mt-5">
                                <li><div><span class="number">1</span></div>
                                    <div>
                                        <div class="subtitle2">ID Validation</div>
                                        <p>Scan your ID with the object in a well lit room facing on a flat surface with minimum reflection</p>
                                    </div></li>
                                <li class="mt-3"><div><span class="number">2</span></div>
                                    <div>
                                        <div class="subtitle2">Face Verification</div>
                                        <p>Ensure your face is within the frame for an accurate detection</p>
                                    </div></li>
                            </ul>
                            <a href="/elevate/personal/" class="btn btn-defalt mr-2">Passed</a>
                            <a href="/elevate/eligibility-failure/" class="btn btn-defalt">Failure</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

</main>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript"
        src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/qrcodejs/qrcode.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                ekyc_url: 'https://ekyc-web-dev.azurewebsites.net/',
                totalAttempt:0,
                maxAttempts:60,
                interval: null,
                qrcode: null,
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
                setTimeout(function () {
                    self.qrcode = new QRCode(document.getElementById("qrcode"), {
                        width: 100,
                        height: 100
                    });
                    self.pageInit();

                }, 500);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                        }
                        if (elevate.lsData.customer) {
                            self.customer = elevate.lsData.customer;
                        }

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
                    var params = {
                        uid: self.customer.id,
                        mykad: self.eligibility.mykad,
                        fname: self.eligibility.name
                    };
                    self.makeCode(self.customer.id);
                    self.interval = setInterval(function (){
                        self.eKYC_check();
                    },15000);

                },
                eKYC_check: function () {
                    var self = this;

                    self.totalAttempt++;
                    if( self.totalAttempt <= self.maxAttempts){
                        var params = {
                            uid: self.customer.id,
                            mykad: self.eligibility.mykad,
                            fname: self.eligibility.name
                        };
                        axios.post(apiEndpointURL_elevate + '/ekyc-check', params)
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){
                                    if(data.data.processStatus == "EKYC_Done"){
                                        //success
                                        clearInterval(self.interval);
										var front_url = data.data.fronImageFilePath; 
										var back_url = data.data.backImageFilePath;
										
                                        self.CAVerification(front_url, back_url);
                                    }else{
                                        //failure
                                        elevate.redirectToPage('/error/');

                                    }
                                }
                            })
                            .catch((error) => {
                                console.log(error, response);
                            });

                    }else{
                        elevate.redirectToPage('/eligibility-failure/');
                    }
                },

                CAVerification: function (front_url, back_url) {
                    var self = this;
                    var params = {
                        mykad: self.eligibility.mykad,
                        name:self.eligibility.name,
                        email:self.eligibility.email,
                        phone:self.eligibility.phone,
                        front_url:back_url,
                        back_url:back_url,
                    };
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/ca-verification', params)
                        .then((response) => {
							 
                            var data = response.data;
                            if (data.status == 1) {
                                elevate.redirectToPage('personal');
                            } else {
                                toggleOverlay(false);
                                $('#error').html("System error, please try again.");
                                console.log(data);
                                elevate.redirectToPage('/compasia-fail');
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            $('#error').html("System error, please try again.");
                            console.log(error, response);
                        });
                },
                redirectYWOS:function (){
                    var self = this;
                    toggleOverlay();
                    ywos.buyPlan(self.selectedPlan);
                },

                makeCode: function (uid) {
                    var self = this;
                    var url_verification = self.ekyc_url + 'EKYC/?fullName=' + self.eligibility.name + '&nric=' + self.eligibility.mykad + '&guid=' + uid ;
                    $('#cmdVerify').attr('href', url_verification);
                    self.qrcode.makeCode(url_verification);
                }

            }
        });
    });
</script>
