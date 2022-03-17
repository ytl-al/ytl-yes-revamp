<?php require_once('includes/header.php') ?>
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img
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
                    <span>1. Personal Details</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>2. Yes Face ID</span>
                </li>
                <li ui-sref="thirdStep">
                    <span>3. Review & Order</span>
                </li>

            </ul>
        </div>
    </section>
    <!-- Banner End -->

    <section id="cart-body">
        <div class="container  p-lg-5 p-3" style="border: 0">
            <div class="row gx-5">
                <h2 class="subtitle">ID Verification</h2>
                <p>
                    A few steps to verify your identity before we continue.
                </p>
            </div>
            <div class="verify-body mt-3">
                <h3 class="subtitle2">Scan the QR code to begin verification</h3>
                <div class="mt-5 mb-5">
                    <div id="qrcode"></div>
                </div>
                <h3 class="subtitle2">Complete the verification in 2 simple steps!</h3>

                <ul class="list-2 mt-5">
                    <li>
                        <div><span class="number">1</span></div>
                        <div>
                            <div class="subtitle2">ID Validateion</div>
                            <p>Scan your ID with the object in a well lit room facing on a flat surface with minimum
                                reflection</p>
                        </div>
                    </li>
                    <li>
                        <div><span class="number">2</span></div>
                        <div>
                            <div class="subtitle2">Face Verification</div>
                            <p>Ensure your face is within the frame for an accurate detection</p>
                        </div>
                    </li>
                </ul>

                <a href="/elevate/personal/" class="btn btn-defalt mr-2">Passed</a>
                <a href="/elevate/eligibility-failure/" class="btn btn-defalt">Failure</a>
            </div>

        </div>
    </section>
    <div id="main-vue"></div>
</main>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript"
        src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/qrcodejs/qrcode.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                ekyc_url: 'https://ekyc-dev-web.azurewebsites.net/',
                totalAttempt:0,
                maxAttempts:10,
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
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/ekyc-init', params)
                        .then((response) => {
                            var data = response.data;

                            if(data.status == 1){
                                toggleOverlay(false);
                                self.eKYC_check();
                                setInterval(function (){
                                    self.eKYC_check();
                                },10000);

                            }else{
                                self.eKYC_init();
                            }

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                        });

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
                            })
                            .catch((error) => {
                                console.log(error, response);
                            });

                    }else{
                        elevate.redirectToPage('/eligibility-failure/');
                    }
                },

                makeCode: function (uid) {
                    var self = this;
                    var url_verification = self.ekyc_url + '?uid=' + uid + '&mykad=' + self.eligibility.mykad + '&fname=' + self.eligibility.name;
                    self.qrcode.makeCode(url_verification);
                }

            }
        });
    });
</script>
