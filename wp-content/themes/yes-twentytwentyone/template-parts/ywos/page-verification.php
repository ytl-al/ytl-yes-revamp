<?php include('header-ywos.php'); ?>


<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. Verification</span>
                </li>
                <li ui-sref="secondStep">
                    <span>2. Delivery Details</span>
                </li>
                <li ui-sref="thirdStep">
                    <span>3. Payment Info</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>4. Review and Pay</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Cart Body STARTS -->
    <section id="cart-body">
        <div class="container p-lg-5 p-3">
            <div class="row gx-5">
                <form class="col-lg-8 col-12 needs-validation" @submit="verificationSubmit">
                    <div>
                        <h1>Verification</h1>
                        <p class="sub mb-4">Please fill in your ID information and mobile number to proceed</p>
                        <div v-if="loginInfo.type == 'guest'">
                            <h2>ID Verification</h2>
                            <div class="row mb-4">
                                <div class="col-lg-4 col-12 mb-3 mb-lg-0">
                                    <div class="form-group">
                                        <label class="form-label" for="select-securityType">* ID Type</label>
                                        <select class="form-select" id="select-securityType" v-model="customerDetails.securityType" @input="watchAllowNext">
                                            <option value="" disabled="disabled" selected="selected">Select ID Type</option>
                                            <option value="NRIC">NRIC</option>
                                            <option value="Passport">Passport</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-securityId">* IC/Passport Number</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="input-securityId" v-model="customerDetails.securityId" @input="watchAllowNext" maxlength="14" placeholder="" />
                                            <!-- <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-5" v-if="loginInfo.type == 'guest'">
                            <h2>Mobile Verification</h2>
                            <div class="row mb-4 align-items-center g-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-otpPhoneNumber"><strong>Step 1:</strong> Key in your mobile number</label>
                                        <!-- <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/question-icon.png" /></a> -->
                                    </div>
                                </div>
                                <div class="col-lg-2 col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control text-center" value="MY +60" disabled="disabled" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="input-otpPhoneNumber" v-model="verify.input.phoneNumber" @input="watchAllowNext" placeholder="0181234567" />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12">
                                    <button type="button" class="white-btn2 mt-3 mt-lg-0" v-on:click="generateOTPForGuestLogin" :disabled="!allowRequestOTP">{{ requestOTPText }}</button>
                                </div>
                                <div class="invalid-feedback mt-1" id="em-otpPhoneNumber"></div>
                            </div>
                            <div class="row mb-3 align-items-center g-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-otpPassword"><strong>Step 2:</strong> Insert your TAC code and verify</label>
                                        <!-- <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/question-icon.png" /></a> -->
                                    </div>
                                </div>
                                <div class="col-lg-5 col-12 mb-3">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="input-otpPassword" v-model="verify.input.otpPassword" @input="watchAllowNext" maxlength="6" placeholder="******" />
                                    </div>
                                </div>
                                <p class="mb-3 panel-otpMessage" style="display: none;"><span class="span-message">Your TAC code has been sent. TAC code is valid for</span> <span class="span-timer">5:00</span>.</p>
                                <div class="invalid-feedback mt-1" id="em-otpPassword"></div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="" id="input-agree" v-model="isAgree" @change="watchAgree" />
                                    <label class="form-check-label label-small" for="input-agree">I hereby agree to subscribe to the YES postpaid/prepaid service as indicated in the online form submitted by me. I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a href="http://www.ytl.com/privacypolicy.asp" target="_blank">http://www.ytl.com/privacypolicy.asp</a>.</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <button class="pink-btn" type="submit" :disabled="!allowNext">Next: Insert delivery details</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-4 col-12">
                    <div class="summary-box">
                        <h1>Order summary</h1>
                        <h2>Due today after taxes and shipping</h2>
                        <div class="row">
                            <div class="col-6 pt-2 pb-2">
                                <h3>TOTAL</h3>
                            </div>
                            <div class="col-6 pt-2 pb-2 text-end">
                                <h3>RM{{ parseFloat(orderSummary.due.total).toFixed(2) }}</h3>
                            </div>
                        </div>
                        <div v-if="orderSummary.plan.planType != 'prepaid'">
                            <div class="monthly mb-4">
                                <div class="row">
                                    <div class="col-6">
                                        <p>Due Monthly</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p>RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <p class="large">{{ orderSummary.plan.displayName }}</p>
                            </div>
                            <div class="col-4 text-end">
                                <p class="large"><strong>RM{{ parseFloat(orderSummary.plan.totalAmount).toFixed(2) }}</strong></p>
                            </div>
                            <div class="col-6">
                                <p class="large">Add-Ons</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.addOns).toFixed(2) }}</strong></p>
                            </div>
                            <div class="col-6">
                                <p class="large">Taxes (SST)</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.taxesSST).toFixed(2) }}</strong></p>
                            </div>
                            <div class="col-6">
                                <p class="large">Shipping</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.shippingFees).toFixed(2) }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Body ENDS -->
</div>
<!-- Vue Wrapper ENDS -->

<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                currentStep: 1,
                customerDetails: {
                    securityType: '',
                    securityId: '',
                    msisdn: ''
                },
                orderSummary: {
                    plan: {},
                    due: {
                        addOns: 0.00,
                        taxesSST: 0.00,
                        shippingFees: 0.00,
                        total: 0.00
                    }
                },
                requestOTPText: 'Request TAC',
                verify: {
                    input: {
                        inputPhoneNumber: '#input-otpPhoneNumber',
                        inputOTPPassword: '#input-otpPassword',
                        phoneNumber: '',
                        otpPassword: ''
                    },
                    errorMessage: {
                        phoneNumber: '#em-otpPhoneNumber',
                        otpPassword: '#em-otpPassword'
                    }
                },
                loginInfo: {
                    type: 'guest',
                    yes_number: '',
                    password: ''
                },
                allowNext: false,
                isAgree: false,
                allowRequestOTP: true
            },
            mounted: function() {},
            created: function() {
                var self = this;
                setTimeout(function() {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function() {
                    var self = this;
                    if (ywos.validateSession(self.currentStep)) {
                        self.orderSummary = ywos.lsData.meta.orderSummary;
                        self.loginInfo.type = ywos.lsData.meta.loginType;
                        self.customerDetails = (ywos.lsData.meta.customerDetails) ? ywos.lsData.meta.customerDetails : self.customerDetails;

                        setTimeout(function() {
                            $('.form-select').selectpicker('refresh');
                        }, 100);

                        if (self.loginInfo.type == 'otp' || self.loginInfo.type == 'password') {
                            self.isAgree = true;
                            self.watchAllowNext();
                        }
                        toggleOverlay(false);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
                verificationSubmit: function(e) {
                    var self = this;
                    toggleOverlay();
                    self.redirectVerified();
                    e.preventDefault();
                },
                redirectVerified: function() {
                    var self = this;

                    ywos.lsData.meta.completedStep = self.currentStep;
                    ywos.lsData.meta.isLoggedIn = true;
                    ywos.lsData.meta.customerDetails = self.customerDetails;
                    ywos.updateYWOSLSData();

                    ywos.redirectToPage('delivery');
                },
                validateOTPNumber: function() {
                    var self = this;
                    var phoneNumber = self.verify.input.phoneNumber.trim();
                    if (isNaN(phoneNumber) || phoneNumber.length == 0) {
                        var inputPhoneNumber = self.verify.input.inputPhoneNumber;
                        var emVerifyPhoneNumber = self.verify.errorMessage.phoneNumber;

                        $(emVerifyPhoneNumber).html('Please insert valid phone number').show();
                        $(inputPhoneNumber).focus();
                        $(inputPhoneNumber).on('keydown', function() {
                            $(emVerifyPhoneNumber).hide().html('');
                        });
                        return false;
                    }
                    return true;
                },
                triggerOTPCountdown: function() {
                    var self = this;
                    self.allowRequestOTP = false;

                    var timer = 5 * 60,
                        minutes, seconds;
                    var interval = setInterval(function() {
                        timer -= 1;

                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        $('.span-timer').html(minutes + ':' + seconds);
                        if (timer == 0) {
                            clearInterval(interval);
                            self.allowRequestOTP = true;
                        }
                    }, 1000);
                },
                ajaxGenerateOTPForGuestLogin: function() {
                    var self = this;
                    setTimeout(function() {
                        toggleOverlay(false);
                        $('.panel-otpMessage').show();
                        self.triggerOTPCountdown();
                    }, 1000);
                },
                generateOTPForGuestLogin: function() {
                    var self = this;
                    if (self.validateOTPNumber()) {
                        toggleOverlay();
                        self.ajaxGenerateOTPForGuestLogin();

                        $(self.verify.errorMessage).hide().html('');
                    }
                },
                watchAgree: function() {
                    var self = this;
                    self.watchAllowNext();
                },
                watchAllowNext: function() {
                    var self = this;
                    var isFilled = true;

                    if (
                        !self.customerDetails.securityType.trim().length 
                        || !self.customerDetails.securityId.trim().length 
                        || !self.isAgree 
                        || !self.verify.input.phoneNumber.trim().length 
                        || !self.verify.input.otpPassword.trim().length
                    ) {
                        isFilled = false;
                    }

                    if (isFilled) {
                        self.customerDetails.msisdn = self.verify.input.phoneNumber.trim();
                        self.allowNext = true;
                    } else {
                        self.allowNext = false;
                    }
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>