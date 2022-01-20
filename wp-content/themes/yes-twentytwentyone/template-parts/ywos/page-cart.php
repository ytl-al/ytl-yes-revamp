<?php include('header-no-menu.php'); ?>


<style type="text/css">
    .layer-overlay {
        z-index: 10000;
    }
</style>

<!-- Vue Wrapper STARTS -->
<div id="main-vue">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <h1>Your Cart</h1>
        </div>
    </section>
    <!-- Banner End -->


    <!-- Cart Body STARTS -->
    <section id="cart-body">
        <div class="container" id="container-empty" v-if="isCartEmpty">
            <div class="row mb-5 gx-5">
                <div class="col-lg-8 col-12">
                    <div class="accordion">
                        <div class="packagebox mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-12 visualbg d-none">
                                    <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/kasiup-postpaid-visual.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col-12 p-3 px-5">
                                    <h3 class="mt-3 mt-lg-0">No item in the cart</h3>
                                    <p class="mb-3">You may browse the plans available <a href="/#popular-deals">here</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="container-hasItem" v-if="hasFetchPlan">
            <div class="row mb-5 gx-5">
                <div class="col-lg-8 col-12">
                    <div class="accordion" id="cart-accordion">
                        <div class="packagebox mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-12 visualbg" v-if="plan.planType == 'postpaid'">
                                    <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/kasiup-postpaid-visual.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col-lg-3 col-12 visualbg prepaid" v-if="plan.planType == 'prepaid'">
                                    <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/kasiup-prepaid-visual.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col-lg-5 col-12 ps-4 pe-4">
                                    <h3 class="mt-3 mt-lg-0">{{ plan.displayName }}</h3>
                                    <p class="mb-3">RM{{ parseFloat(plan.totalAmount).toFixed(0) }} for {{ plan.internetData }}</p>
                                    <div class="package-info" v-if="!packageInfos.length">
                                        <div class="row">
                                            <div class="col-6" v-for="(packageInfo, index) in packageInfos">
                                                <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/tickoutline.png" class="me-1" />{{ packageInfo }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 text-center mt-3 mb-3 mt-lg-0 mb-lg-0">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h3 class="price">RM{{ parseFloat(plan.totalAmount).toFixed(0) }}</h3>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#cart-accordion">
                            <div class="accordion-body">
                                <h1>One-time charges (due now)</h1>
                                <h2>Rate plan</h2>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <p>{{ plan.displayName }}</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p>RM{{ parseFloat(plan.totalAmount).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 pb-1 border-bottom">
                                        <p>Add-Ons</p>
                                    </div>
                                    <div class="col-6 pb-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(summary.due.addOns).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>Taxes</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(summary.due.taxesSST).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>Shipping fee</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(summary.due.shippingFees).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div class="d-none">
                                    <p class="bold mb-2">Device <a href="#">Choose a Device</a></p>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p>Device payment</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM0.00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="fw-bold">Total charges due now</p>
                                        <p class="small">This summary is not an invoice</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p class="large">RM{{ parseFloat(summary.due.total).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div v-if="plan.planType != 'prepaid'">
                                    <h1>Monthly charges</h1>
                                    <h2>Rate plan</h2>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p>{{ plan.displayName }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ parseFloat(plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="bold">Total monthly charges</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="bold">RM{{ parseFloat(plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>You have the option to <a href="/keep-your-number" target="_blank">Keep Your Number</a> during or after SIM activation.</p>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="summary-box">
                        <h1>Order summary</h1>
                        <h2>Due today after taxes and shipping</h2>
                        <div class="row">
                            <div class="col-6 pt-2 pb-2">
                                <h3>TOTAL</h3>
                            </div>
                            <div class="col-6 pt-2 pb-2 text-end">
                                <h3>RM{{ parseFloat(summary.due.total).toFixed(2) }}</h3>
                            </div>
                        </div>
                        <div class="monthly mb-4" v-if="plan.monthlyCommitment > 0">
                            <div class="row">
                                <div class="col-6">
                                    <p>Due Monthly</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>RM{{ parseFloat(plan.monthlyCommitment).toFixed(2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="referral-box mb-3"><input class="form-control referral" type="text" placeholder="Enter referral code (if any)"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/referral-tick.png" class="referral-check" alt=""></div>
                        <a href="#" class="pink-btn d-block" data-bs-toggle="modal" data-bs-target="#login-modal">Proceed to checkout</a>
                    </div>
                </div>
            </div>
            <div class="addons-container border-top d-none">
                <h1>Customise your plan with Postpaid data Add-Ons</h1>
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <a href="#" class="addon-box">
                            <h1>RM10</h1>
                            <p class="mb-2">10GB /month</p>
                            <p class="small">Valid for 30 days only*</p>
                            <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/add-icon.png" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-12">
                        <a href="#" class="addon-box">
                            <h1>RM10</h1>
                            <p class="mb-2">10GB /month</p>
                            <p class="small">Valid for 30 days only*</p>
                            <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/add-icon.png" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-12">
                        <a href="#" class="addon-box">
                            <h1>RM10</h1>
                            <p class="mb-2">10GB /month</p>
                            <p class="small">Valid for 30 days only*</p>
                            <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/add-icon.png" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Body ENDS -->


    <!-- Login Modal STARTS -->
    <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body pt-5 pb-5">
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-9 col-12 mb-lg-0 mb-2 align-self-center">
                            <a href="javascript:void(0)" class="white-btn2 d-block" v-on:click="redirectToVerification">Continue checkout as Guest</a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 mb-lg-0 mb-2 align-self-center">
                            <h1 class="mb-4">or sign in with your YES ID</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 mb-lg-0 mb-2 align-self-center">
                            <p class="bold text-center mb-3">Select your preference</p>
                            <ul class="nav justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-loginTac-tab" data-bs-toggle="pill" data-bs-target="#pills-loginTac" type="button" role="tab" aria-controls="pills-loginTac" aria-selected="true">TAC</button>
                                </li>
                                <li class="nav-item" role="presentation" style="margin-left: -20px;">
                                    <button class="nav-link" id="pills-loginPassword-tab" data-bs-toggle="pill" data-bs-target="#pills-loginPassword" type="button" role="tab" aria-controls="pills-loginPassword" aria-selected="false">Password</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-loginTac" role="tabpanel" aria-labelledby="pills-loginTac-tab">
                                    <form class="form-loginTac">
                                        <div class="input-box">
                                            <div class="w-100">
                                                <input type="text" class="form-control userid" id="input-otpYesNumber" v-model="login.input.otp.yesNumber" @input="watchOTPLoginFields" placeholder="YES ID" />
                                            </div>
                                            <div class=" w-100 border-top" id="box-otpPassword" style="display: none;">
                                                <input type="password" class="form-control password" id="input-otpPassword" v-model="login.input.otp.password" @input="watchOTPLoginFields" placeholder="********" />
                                            </div>
                                        </div>
                                        <div class="w-100 text-center mb-4">
                                            <p><em><a href="javascript:void(0)" v-on:click="generateOTPForLogin">Generate OTP</a></em></p>
                                            <div class="invalid-feedback mt-1" id="em-otpLogin"></div>
                                        </div>
                                        <!-- <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Keep me logged in</label>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2 mb-lg-0 mb-2 text-center">
                                                <input type="submit" value="LOGIN" class="pink-btn d-block mb-3 w-100" :disabled="!login.submitButton.allowOtp" />
                                                <a href="javascript:void(0)" class="forgotpassword">FORGOT PASSWORD?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-loginPassword" role="tabpanel" aria-labelledby="pills-loginPassword-tab">
                                    <form class="form-loginPassword" @submit="basicLoginSubmit">
                                        <div class="input-box">
                                            <div class="w-100 border-bottom">
                                                <input type="text" class="form-control userid" id="input-basicYesNumber" v-model="login.input.basic.yesNumber" @input="watchBasicLoginFields" placeholder="YES ID" />
                                            </div>
                                            <div class="w-100">
                                                <input type="password" class="form-control password" id="input-basicPassword" v-model="login.input.basic.password" @input="watchBasicLoginFields" placeholder="********" />
                                            </div>
                                        </div>
                                        <div class="w-100 text-center">
                                            <div class="invalid-feedback mb-4" id="em-basicLogin"></div>
                                        </div>
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">Keep me logged in</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2 mb-lg-0 mb-2 text-center">
                                                <input type="submit" value="LOGIN" class="pink-btn d-block mb-3 w-100" :disabled="!login.submitButton.allowBasic" />
                                                <a href="javascript:void(0)" class="forgotpassword">FORGOT PASSWORD?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal ENDS -->
</div>
<!-- Vue Wrapper ENDS -->

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();
    });
    var pageCart = new Vue({
        el: '#main-vue',
        data: {
            endpointURL: window.location.origin + '/wp-json/ywos/v1',
            ywosLocalStorageName: 'yesYWOS',
            ywosLocalStorageData: null,
            expiryYWOSCart: 60,
            ywosCart: null,
            planID: null,
            plan: {},
            packageInfos: [],
            summary: {
                plan: {},
                due: {
                    addOns: 0.00,
                    taxesSST: 0.00,
                    shippingFees: 0.00,
                    total: 0.00
                }
            },
            hasFetchPlan: false,
            isCartEmpty: false,
            login: {
                input: {
                    otp: {
                        inputYesNumber: '#input-otpYesNumber',
                        inputPassword: '#input-otpPassword',
                        yesNumber: '',
                        password: ''
                    },
                    basic: {
                        inputYesNumber: '#input-basicYesNumber',
                        inputPassword: '#input-basicPassword',
                        yesNumber: '',
                        password: ''
                    }
                },
                errorMessage: {
                    otp: '#em-otpLogin',
                    basic: '#em-basicLogin'
                },
                submitButton: {
                    allowOtp: false,
                    allowBasic: false
                }
            }
        },
        created: function() {
            var self = this;
            self.ywosLocalStorageData = JSON.parse(localStorage.getItem(self.ywosLocalStorageName));
            self.getPlanData();
        },
        methods: {
            checkExists: function() {
                var self = this;
                if (self.ywosLocalStorageData === null) {
                    return false;
                } else {
                    self.ywosCart = (typeof self.ywosLocalStorageData.ywosCart !== 'undefined') ? self.ywosLocalStorageData.ywosCart : null;
                    return true;
                }
            },
            checkExpiryValid: function() {
                var self = this;
                if (self.ywosCart !== null && typeof self.ywosCart.expiry !== 'undefined') {
                    if (Date.now() > self.ywosCart.expiry) {
                        return false;
                    } else {
                        self.updateYWOSExpiry();
                        return true;
                    }
                } else {
                    return false;
                }
            },
            checkItems: function() {
                var self = this;
                if (typeof self.ywosCart.meta !== 'undefined') {
                    return (typeof self.ywosCart.meta.planID === 'undefined') ? false : true;
                } else {
                    return false;
                }
                return true;
            },
            removeYWOSStorageData: function() {
                var self = this;
                localStorage.removeItem(self.ywosLocalStorageName);
            },
            updateYWOSStorageData: function() {
                var self = this;
                localStorage.setItem(self.ywosLocalStorageName, JSON.stringify(self.ywosLocalStorageData));
            },
            updateYWOSExpiry: function() {
                var self = this;
                var expiryLength = self.expiryYWOSCart * 60000;
                var ywosCartExpiry = Date.now() + expiryLength;
                self.ywosLocalStorageData.ywosCart.expiry = ywosCartExpiry;
                self.updateYWOSStorageData();
            },
            getPlanID: function() {
                var self = this;
                if (!self.checkExists()) {
                    console.log('Local storage data not found!');
                    self.removeYWOSStorageData();
                    return false;
                } else if (!self.checkExpiryValid()) {
                    console.log('Local storage data has been expired!');
                    self.removeYWOSStorageData();
                    return false;
                } else if (!self.checkItems()) {
                    console.log('Plan ID is not found!');
                    self.removeYWOSStorageData();
                    return false;
                } else {
                    self.planID = self.ywosCart.meta.planID;
                }
                return true;
            },
            updateSummary: function() {
                var self = this;
                var total = 0;
                self.summary.due.total = parseFloat(self.plan.totalAmount) + parseFloat(self.summary.due.addOns) + parseFloat(self.summary.due.taxesSST) + parseFloat(self.summary.due.shippingFees);
            },
            ajaxGetPlanData: function() {
                var self = this;
                axios.get(self.endpointURL + '/get-plan-by-id/' + self.planID)
                    .then((response) => {
                        if (typeof toggleOverlay == 'function') {

                        }
                        var data = response.data;
                        if (data.internetData == '∞') {
                            data.internetData = 'Unlimited';
                        }
                        self.plan = data;
                        self.hasFetchPlan = true;
                        self.updateSummary();
                        self.summary.plan = data;
                        setTimeout(function() {
                            toggleOverlay(false);
                        }, 500);
                        self.packageInfos = data.notes.split(',');
                    })
                    .catch((error) => {
                        console.log('error', error);
                    })
            },
            getPlanData: function() {
                var self = this;
                if (self.getPlanID()) {
                    self.ajaxGetPlanData();
                } else {
                    self.isCartEmpty = true;
                    setTimeout(function() {
                        toggleOverlay(false);
                    }, 1500);
                }
            },
            validateYesNumberOTP: function() {
                var self = this;
                var otpYesNumber = self.login.input.otp.yesNumber.replace(' ', '');
                if (isNaN(otpYesNumber) || otpYesNumber.length == 0) {
                    var inputOTPYesNumber = self.login.input.otp.inputYesNumber;
                    var emOTPForLogin = self.login.errorMessage.otp;

                    $(emOTPForLogin).html('Please insert valid YES Number').show();
                    $(inputOTPYesNumber).focus();
                    $(inputOTPYesNumber).on('keydown', function() {
                        $(emOTPForLogin).hide().html('');
                    });
                    return false;
                }
                return true;
            },
            generateOTPForLogin: function(event) {
                var self = this;
                if (self.validateYesNumberOTP()) {
                    toggleOverlay();
                    self.ajaxGenerateOTPForLogin();
                }
            },
            ajaxGenerateOTPForLogin: function() {
                var self = this;
                axios.post(self.endpointURL + '/generate-otp-for-login', {
                        'yes_number': self.login.input.otp.yesNumber
                    })
                    .then((response) => {
                        $('#box-otpPassword').show();
                        $(self.login.input.otp.inputPassword).focus();
                    })
                    .catch((error) => {
                        var response = error.response;
                        var data = response.data;
                        var errorMsg = data.message + ' Please try again later.';
                        $(self.login.errorMessage.otp).html(errorMsg).show();
                    })
                    .finally(() => {
                        console.log('finally');
                        toggleOverlay(false);
                    });
            },
            validateBasicLogin: function() {
                var self = this;
                var yesNumber = self.login.input.basic.yesNumber.replace(' ', '');
                var password = self.login.input.basic.password;
                if (isNaN(yesNumber) || yesNumber.length == 0 || password.length == 0) {
                    self.toggleErrorMessageLoginBasic('Please insert valid login credentials.');
                    return false;
                }
                return true;
            },
            basicLoginSubmit: function(e) {
                var self = this;
                if (self.validateBasicLogin()) {
                    toggleOverlay();
                    self.ajaxValidateLogin();
                }
                e.preventDefault();
            },
            ajaxValidateLogin: function() {
                var self = this;
                axios.post(self.endpointURL + '/validate-login', {
                        'yes_number': self.login.input.basic.yesNumber,
                        'password': self.login.input.basic.password
                    })
                    .then((response) => {
                        var data = response.data;
                        var customerDetails = data.customerDetails;
                        var sessionId = data.sessionId;
                        self.ywosLocalStorageData.ywosCart.meta.customerDetails = customerDetails;
                        self.ywosLocalStorageData.ywosCart.meta.orderSummary = self.summary;
                        self.ywosLocalStorageData.ywosCart.meta.sessionId = sessionId;
                        self.updateYWOSStorageData();
                        self.redirectLoggedIn();
                    })
                    .catch((error) => {
                        var response = error.response;
                        var data = response.data;
                        var errorMsg = data.message;

                        self.toggleErrorMessageLoginBasic(errorMsg);

                        toggleOverlay(false);
                    });
            },
            toggleErrorMessageLoginBasic: function(errorMessage) {
                var self = this;
                var inputYesNumber = self.login.input.basic.inputYesNumber;
                var inputPassword = self.login.input.basic.inputPassword;
                var emBasicLogin = self.login.errorMessage.basic;

                $(emBasicLogin).html(errorMessage).show();
                $(inputYesNumber).focus();
                $(inputYesNumber).on('keydown', function() {
                    $(emBasicLogin).hide().html('');
                });
                $(inputPassword).on('keydown', function() {
                    $(emBasicLogin).hide().html('');
                });
            },
            redirectLoggedIn: function() {
                window.location.href = window.location.origin + '/ywos/verification';
            },
            redirectToVerification: function() {
                toggleOverlay();
                var self = this;
                self.ywosLocalStorageData.ywosCart.meta.customerDetails = {};
                self.ywosLocalStorageData.ywosCart.meta.orderSummary = self.summary;
                self.ywosLocalStorageData.ywosCart.meta.sessionId = '';
                self.updateYWOSStorageData();
                window.location.href = window.location.origin + '/ywos/verification';
            },
            watchOTPLoginFields: function() {
                var self = this;
                var yesNumber = self.login.input.otp.yesNumber;
                var password = self.login.input.otp.password;
                if (yesNumber.length && password.length) {
                    self.login.submitButton.allowOtp = true;
                } else {
                    self.login.submitButton.allowOtp = false;
                }
            },
            watchBasicLoginFields: function() {
                var self = this;
                var yesNumber = self.login.input.basic.yesNumber;
                var password = self.login.input.basic.password;
                if (yesNumber.length && password.length) {
                    self.login.submitButton.allowBasic = true;
                } else {
                    self.login.submitButton.allowBasic = false;
                }
            }
        }
    });
</script>


<?php include('footer-no-newsletter.php'); ?>