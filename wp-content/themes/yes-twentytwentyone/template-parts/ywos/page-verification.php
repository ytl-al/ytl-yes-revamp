<?php include('header-ywos.php'); ?>


<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. {{ renderText('strVerification') }}</span>
                </li>
                <li ui-sref="secondStep">
                    <span>2. {{ renderText('strSelectSimType') }}</span>
                </li>
                <li ui-sref="thirdStep">
                    <span>3. {{ renderText('strDelivery') }}</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>4. {{ renderText('strReview') }}</span>
                </li>
                <li ui-sref="fifthStep">
                    <span>5. {{ renderText('strPayment') }}</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Body STARTS -->
    <section id="cart-body">
        <div class="container p-lg-5 p-3">
            <div class="row d-lg-none mb-3">
                <div class="col">
                    <h1>Verification</h1>
                </div>
            </div>
            <div class="row gx-5" v-if="pageValid">
                <div class="col-lg-5 col-12 order-lg-2">
                    <?php include('section-order-summary.php'); ?>
                </div>
                <form class="col-lg-7 col-12 order-lg-1 mt-4 mt-lg-0 needs-validation" @submit="verificationSubmit">
                    <div>
                        <h1 class="d-none d-lg-block" >{{ renderText('strVerification') }}</h1>
                        <p class="sub mb-4">{{ renderText('strFillIn') }}</p>
                        <div>
                            <h2>{{ renderText('strIDVerification') }}</h2>
                            <div class="row mb-4">
                                <div class="col-lg-4 col-12 mb-3 mb-lg-0">
                                    <div class="form-group">
                                        <label class="form-label" for="select-securityType">* {{ renderText('strIDType') }}</label>
                                        <select class="form-select" id="select-securityType" v-model="customerDetails.securityType" @change="watchSecurityType" :disabled="!allowSecurityType">
                                            <!-- <option value="" disabled="disabled" selected="selected">{{ renderText('strIDTypeSelect') }}</option> -->
                                            <option value="NRIC">{{ renderText('strIDNRIC') }}</option>
                                            <option value="PASSPORT">{{ renderText('strIDPassport') }}</option>
                                            <option v-if="isLoggedIn && customerDetails.securityType == 'BRN'" value="BRN">BRN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-securityId">* {{ renderText('strIDNumber') }}</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="input-securityId" v-model="customerDetails.securityId" @input="watchAllowNext" @keypress="checkInput(event)" maxlength="14" placeholder="" :disabled="!allowSecurityId" />
                                            <!-- <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                            <div class="invalid-feedback mt-1" id="em-securityID"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-5">
                            <h2>{{ renderText('strMobileVerification') }}</h2>
                            <div class="row mb-4 align-items-center g-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-otpPhoneNumber" v-html="renderText('strMobileStep1')"></label>
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
                                        <input type="text" class="form-control" id="input-otpPhoneNumber" maxlength="10" v-model="verify.input.phoneNumber" @input="watchAllowNext" @keypress="checkInputCharacters(event, 'numeric', false)" placeholder="181234567" :disabled="!allowPhoneNumber" />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12" v-if="!isLoggedIn">
                                    <button type="button" class="white-btn3 mt-3 mt-lg-0" v-on:click="ajaxGenerateOTPForGuestLoginNew  " :disabled="!allowRequestOTP">{{ requestOTPText }}</button>
                                </div>
                                <div class="invalid-feedback mt-1" id="em-otpPhoneNumber"></div>
                            </div>
                            <div class="row mb-3 align-items-center g-2" v-if="!isLoggedIn">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-otpPassword" v-html="renderText('strMobileStep2')"></label>
                                        <!-- <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/question-icon.png" /></a> -->
                                    </div>
                                </div>
                                <div class="col-lg-5 col-12 mb-3">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="input-otpPassword" v-model="verify.input.otpPassword" @input="watchAllowNext" maxlength="6" placeholder="******" />
                                    </div>
                                <p class="mb-3 panel-otpMessage_error" style="display: none;"><span class="span-message"> <span class="span-timer">Try Again...!</span>.</p>
                                </div>
                                <p class="mb-3 panel-otpMessage" style="display: none;"><span class="span-message">Your TAC code has been sent.</span> {{ renderText('strTacCodeValid')}} <span class="span-timer">5:00</span>.</p>
                                <div class="invalid-feedback mt-1" id="em-otpPassword"></div>
                                <p class="mb-3 OTP_Message_not_genrated" style="display: none;"><span class="span-message">Invalid Details</p>
                                <div class="invalid-feedback mt-1" id="em-otpPassword"></div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-8 col-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="" id="input-agree" v-model="isAgree" @change="watchAgree" />
                                    <label class="form-check-label label-small" for="input-agree" v-html="renderText('strAgree')"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <button class="pink-btn" type="submit" :disabled="!allowNext">{{ renderText('strBtnSubmit') }}</button>
                                <div class="invalid-feedback mt-2" id="em-verification"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Body ENDS -->
</div>
<!-- Vue Wrapper ENDS -->

<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                simType: '',
                currentStep: 1,
                pageValid: false,
                upFrontPayment:'false',
                customerDetails: {
                    securityType: '',
                    securityId: '',
                    msisdn: ''
                },
                deliveryInfo: {
                    securityType: ''
                },
                allowSecurityType: true,
                allowSecurityId: true,
                allowPhoneNumber: true,

                orderSummary: {
                    plan: {},
                    due: {
                        addOns: 0.00,
                        taxesSST: 0.00,
                        shippingFees: 0.00,
                        rounding: 0.00,
                        foreignerDeposit: 0.00,
                        total: 0.00
                    },
                    addOn: null
                },
                requestOTPText: '',
                verify: {
                    input: {
                        inputSecurityID: '#input-securityId',
                        inputPhoneNumber: '#input-otpPhoneNumber',
                        inputOTPPassword: '#input-otpPassword',
                        phoneNumber: '',
                        otpPassword: ''
                    },
                    errorMessage: {
                        phoneNumber: '#em-otpPhoneNumber',
                        otpPassword: '#em-otpPassword',
                        form: '#em-verification',
                        securityID: '#em-securityID'
                    }
                },
                loginInfo: {
                    type: 'guest',
                    yes_number: '',
                    password: ''
                },
                isLoggedIn: false,
                allowNext: false,
                isAgree: false,
                allowRequestOTP: true,

                apiLocale: 'EN', 
                pageText: {
                    strVerification: { 'en-US': 'Verification', 'ms-MY': 'Pengesahan', 'zh-hans': 'Verification' },
                    strSelectSimType: { 'en-US': 'Select Sim Type', 'ms-MY': 'Select Sim Type', 'zh-hans': 'Select Sim Type' },

                    strDelivery: { 'en-US': 'Delivery Details', 'ms-MY': 'Butiran Penghantaran', 'zh-hans': 'Delivery Details' },
                    strReview: { 'en-US': 'Review', 'ms-MY': 'Semak', 'zh-hans': 'Review' },
                    strPayment: { 'en-US': 'Payment Info', 'ms-MY': 'Maklumat Pembayaran', 'zh-hans': 'Payment Info' },
                    
                    strFillIn: { 'en-US': 'Please fill in your ID information and mobile number to proceed', 'ms-MY': 'Sila isikan maklumat ID dan nombor mudah alih untuk teruskan', 'zh-hans': 'Please fill in your ID information and mobile number to proceed' },
                    
                    strIDVerification: { 'en-US': 'ID Verification', 'ms-MY': 'Pengesahan ID', 'zh-hans': 'ID Verification' },
                    strIDType: { 'en-US': 'ID Type', 'ms-MY': 'Jenis ID', 'zh-hans': 'ID Type' },
                    strIDTypeSelect: { 'en-US': 'Select ID Type', 'ms-MY': 'Pilih jenis ID', 'zh-hans': 'Select ID Type' },
                    strIDNRIC: { 'en-US': 'MyKad ', 'ms-MY': 'Kad Pengenalan', 'zh-hans': 'MyKad ' },
                    strIDPassport: { 'en-US': 'Passport', 'ms-MY': 'Pasport', 'zh-hans': 'Passport' },
                    strIDNumber: { 'en-US': 'ID/Passport Number', 'ms-MY': 'Nombor KP/Pasport', 'zh-hans': 'ID/Passport Number' },
                    
                    strMobileVerification: { 'en-US': 'Mobile Verification', 'ms-MY': 'Pengesahan Nombor Mudah Alih', 'zh-hans': 'Mobile Verification' },
                    strMobileStep1: { 'en-US': '<strong>Step 1</strong>: Key in your mobile number', 'ms-MY': '<strong>Langkah 1</strong>: Masukkan nombor telefon mudah alih anda', 'zh-hans': '<strong>Step 1</strong>: Key in your mobile number' },
                    strMobileStep2: { 'en-US': '<strong>Step 2</strong>: Insert your TAC code and verify', 'ms-MY': '<strong>Langkah 2</strong>: Masukkan TAC dan sahkan', 'zh-hans': '<strong>Step 2</strong>: Insert your TAC code and verify' },
                    strRequestTAC: { 'en-US': 'Request TAC', 'ms-MY': 'Minta TAC', 'zh-hans': 'Request TAC' },
                    strResendTAC: { 'en-US': 'Resend TAC', 'ms-MY': 'Minta Semula TAC', 'zh-hans': 'Resend TAC' },
                    strTacCodeValid: { 'en-US': 'TAC code is valid for', 'ms-MY': 'Kod TAC sah untuk', 'zh-hans': 'TAC code is valid for' },

                    strAgree: { 'en-US': 'I hereby agree to subscribe to the YES postpaid/prepaid service as indicated in the online form submitted by me. I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a href="http://www.ytl.com/privacypolicy.asp" target="_blank">http://www.ytl.com/privacypolicy.asp</a>.', 'ms-MY': 'Saya dengan ini bersetuju untuk melanggan pilihan Pelan Perkhidmatan Pascabayar/Prabayar dalam borang dalam talian yang saya hantar. <br />Saya selanjutnya memberi kebenaran kepada YTLC untuk memproses data peribadi saya mengikut Polisi Privasi Kumpulan YTL yang terkandung di <a href="http://www.ytl.com/privacypolicy.asp" target="_blank">http://www.ytl.com/privacypolicy.asp</a>.', 'zh-hans': 'I hereby agree to subscribe to the YES postpaid/prepaid service as indicated in the online form submitted by me. I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a href="http://www.ytl.com/privacypolicy.asp" target="_blank">http://www.ytl.com/privacypolicy.asp</a>.' },

                    strBtnSubmit: { 'en-US': 'Next: Insert delivery details', 'ms-MY': 'Seterusnya: Masukkan Butiran Penghantaran', 'zh-hans': 'Next: Insert delivery details' }, 
                    
                    strErrorNRIC: { 'en-US': 'Please insert valid MyKad  number', 'ms-MY': 'Sila masukkan nombor kad pengenalan yang sah', 'zh-hans': 'Please insert valid MyKad  number' },
                    strErrorPassport: { 'en-US': 'Please insert valid Passport number', 'ms-MY': 'Sila masukkan nombor passport yang sah', 'zh-hans': 'Please insert valid Passport number' },
                    strErrorPhoneNumber: { 'en-US': 'Please insert valid phone number', 'ms-MY': 'Sila masukkan nombor telefon bimbit yang sah', 'zh-hans': 'Please insert valid phone number' }, 

                    errorValidating: { 'en-US': "There's an error in validating your eligibility. Please try again later.", 'ms-MY': 'Ralat ketika mengesahkan kelayakan anda. Sila cuba lagi kemudian.', 'zh-hans': "There's an error in validating your eligibility. Please try again later." }, 
                    errorEligibilityCheck: { 'en-US': 'Customer eligibility check failed: ', 'ms-MY': 'Pengesahan kelayakan pelanggan gagal: ', 'zh-hans': 'Customer eligibility check failed: ' }
                }
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
                        self.pageValid = true;
                        self.orderSummary = ywos.lsData.meta.orderSummary;
                        self.loginInfo.type = ywos.lsData.meta.loginType;
                        self.isLoggedIn = ywos.lsData.meta.isLoggedIn;
                        self.customerDetails = (ywos.lsData.meta.customerDetails) ? ywos.lsData.meta.customerDetails : self.customerDetails;

                        if (self.isLoggedIn) {
                            self.deliveryInfo.securityType = self.customerDetails.securityType;
                            self.verify.input.phoneNumber = self.customerDetails.msisdn.slice(1);
                            self.isAgree = true;

                            self.watchAllowNext();
                        }

                        setTimeout(function() {
                            $('.form-select').selectpicker('refresh');
                        }, 100);

                        if (self.loginInfo.type == 'otp' || self.loginInfo.type == 'password') {
                            self.isAgree = true;
                            self.watchAllowNext();
                        }

                        self.requestOTPText = self.renderText('strRequestTAC');

                        self.apiLocale = (ywos.lsData.siteLang == 'ms-MY') ? 'MY' : 'EN';

                        toggleOverlay(false);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
                ajaxVerifyGuestLogin: function() {
                    var self = this;
                    
                    axios.post(apiEndpointURL + '/validate-guest-login', {
                            'phone_number': '0' + self.verify.input.phoneNumber.trim(),
                            'otp_password': self.verify.input.otpPassword.trim(),
                            'locale': self.apiLocale
                        })
                        .then((response) => {
                            // console.log(response);
                            self.redirectVerified();
                        })
                        .catch((error) => {
                            // console.log(error);
                            var response = error.response;
                            var data = response.data;
                            var errorMsg = '';
                            if (error.response.status == 500 || error.response.status == 503) {
                                errorMsg = self.renderText('errorValidating');
                            } else {
                                errorMsg = self.renderText('errorEligibilityCheck') + data.message;
                            }
                            
                            $('.panel-otpMessage').hide();
                            $(self.verify.errorMessage.form).html(errorMsg).show();

                            toggleOverlay(false);
                        });
                },

                ajaxVerifyGuestLoginNew: function() {
                    toggleOverlay(true);
                    var self = this;
                    axios.post(apiEndpointURL + '/api/app/SMS-notification/verify-oTP', {
                            'MobileNumber': '0' + self.verify.input.phoneNumber.trim(),
                            'OTPValue': self.verify.input.otpPassword.trim(),
                            'locale': self.apiLocale
                        })
                        
                        .then((response) => {
                            // console.log(response);
                            if(response.data == "true"){
                                self.redirectVerified();
                            }
                        })
                        .catch((error) => {
                            // console.log(error, "error");
                            var response = error.response;
                            var data = response.data;
                            var errorMsg = '';
                            if (error.response.status == 500 || error.response.status == 503) {
                                errorMsg = self.renderText('errorValidating');
                            } else {
                                errorMsg = self.renderText('errorEligibilityCheck') + data.message;
                            }
                            
                            $('.panel-otpMessage').hide();
                            $(self.verify.errorMessage.form).html(errorMsg).show();
                            toggleOverlay(false);
                        })
                        
                },




                validateSecurityID: function() {
                    var self = this;
                    if (self.customerDetails.securityType == 'NRIC') {
                        var pregTest = self.customerDetails.securityId.match(/^(\d{12})+$/);
                        if (pregTest == null) {
                            toggleOverlay(false);
                            $(self.verify.errorMessage.securityID).html(self.renderText('strErrorNRIC')).show();
                            $(self.verify.input.inputSecurityID).focus();
                            $(self.verify.input.inputSecurityID).on('keydown', function() {
                                $(self.verify.errorMessage.securityID).hide().html('');
                            });
                            return false;
                        }
                    } else if (self.customerDetails.securityType == 'PASSPORT') {
                        toggleOverlay(false);
                        if (!self.customerDetails.securityId.trim().length) {
                            $(self.verify.errorMessage.securityID).html(self.renderText('strErrorPassport')).show();
                            return false;
                        }
                    }
                    return true;
                },
                verificationSubmit: function(e) {
                    var self = this;
                    toggleOverlay(true);
                    var validateSecurityID = self.validateSecurityID();
                    if (validateSecurityID) {
                        if (!ywos.lsData.meta.isLoggedIn) {
                            self.ajaxVerifyGuestLoginNew();
                        } else {
                            self.redirectVerified();
                        }
                    }
                    e.preventDefault();
                },
                redirectVerified: function() {
                    var self = this;


                    self.customerDetails.mobileNumber = '0' + self.verify.input.phoneNumber.trim();
                    self.customerDetails.msisdn = '0' + self.verify.input.phoneNumber.trim();

                    if (!ywos.lsData.meta.isLoggedIn) {
                        ywos.lsData.meta.completedStep = self.currentStep;
                        ywos.lsData.meta.isLoggedIn = true;
                        ywos.lsData.meta.orderSummary = self.orderSummary;
                        ywos.lsData.meta.customerDetails = self.customerDetails;
                        ywos.updateYWOSLSData();
                    } else {
                        ywos.lsData.meta.customerDetails = self.customerDetails;
                        if (ywos.lsData.meta.deliveryInfo) {
                            ywos.lsData.meta.deliveryInfo.securityType = self.customerDetails.securityType;
                            ywos.lsData.meta.deliveryInfo.securityId = self.customerDetails.securityId;
                            ywos.lsData.meta.deliveryInfo.mobileNumber = '0' + self.verify.input.phoneNumber.trim();
                            ywos.lsData.meta.deliveryInfo.msisdn = '0' + self.verify.input.phoneNumber.trim();
                        }
                        ywos.updateYWOSLSData();
                    }

                    ywos.redirectToPage('sim-type');
                },
                validateOTPNumber: function() {
                    var self = this;
                    var phoneNumber = self.verify.input.phoneNumber.trim();
                    // console.lg(phoneNumber);
                    if (isNaN(phoneNumber) || phoneNumber.length == 0) {
                        var inputPhoneNumber = self.verify.input.inputPhoneNumber;
                        var emVerifyPhoneNumber = self.verify.errorMessage.phoneNumber;

                        $(emVerifyPhoneNumber).html(self.renderText('strErrorPhoneNumber')).show();
                        $(inputPhoneNumber).focus();
                        $(inputPhoneNumber).on('keydown', function() {
                            $(emVerifyPhoneNumber).hide().html('');
                        });
                        return false;
                    }
                    return true;
                },
                triggerOTPCountdown: function(timerMinute = 5) {
                    var self = this;
                    self.allowRequestOTP = false;

                    var timer = timerMinute * 60,
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
                            self.requestOTPText = self.renderText('strResendTAC')
                        }
                    }, 1000);
                },
                ajaxGenerateOTPForGuestLogin: function() {
                    var self = this;
                    axios.post(apiEndpointURL + '/generate-otp-for-guest-login' + '?nonce='+yesObj.nonce, {
                            'phone_number': '0' + self.verify.input.phoneNumber,
                            'locale': self.apiLocale
                        })
                        .then((response) => {
                            $('.panel-otpMessage').show();
                            $('.panel-otpMessage .span-message').html(response.data.displayResponseMessage);
                            $(self.verify.input.inputOTPPassword).focus();
                            self.triggerOTPCountdown(response.data.otpExpiryTime);
                        })
                        .catch((error) => {
                            var response = error.response;
                            var data = response.data;
                            var errorMsg = '';
                            if (error.response.status == 500 || error.response.status == 503) {
                                errorMsg = "<p>There's an error in generating your TAC code.<br /> Please try again later.</p>";
                            } else {
                                errorMsg = data.message
                            }
                            
                            $(self.verify.errorMessage.phoneNumber).html(errorMsg).show();

                            $(self.verify.input.inputOTPPassword).focus();
                            $(self.verify.input.inputOTPPassword).on('keydown', function() {
                                $(self.verify.errorMessage.otpPassword).hide().html('');
                            });
                        })
                        .finally(() => {
                            toggleOverlay(false);
                        });
                },
                generateOTPForGuestLogin: function() {
                    var self = this;

                    $(self.verify.errorMessage.phoneNumber).hide().html('');

                    if (self.validateOTPNumber()) {
                        toggleOverlay();
                        self.ajaxGenerateOTPForGuestLogin();

                        $(self.verify.errorMessage).hide().html('');
                    }
                },

                ajaxGenerateOTPForGuestLoginNew: function() {
                    toggleOverlay(true);
                    var self = this;
                    axios.post(apiEndpointURL + '/api/app/sms-notification/generate-oTP', {
                            'MobileNumber': '0' + self.verify.input.phoneNumber,
                            'locale': self.apiLocale
                        })
                        .then((response) => {
                            
                            if(response.data != 'ERR1'){
                                $('.panel-otpMessage').show();
                                $('.panel-otpMessage .span-message').html(response.data.displayResponseMessage);
                                $(self.verify.input.inputOTPPassword).focus();
                                self.triggerOTPCountdown(response.data.otpExpiryTime);
                            }
                        })
                        .catch((error) => {
                            var response = error.response;
                            var data = response.data;
                            var errorMsg = '';
                            if (error.response.status == 500 || error.response.status == 503) {
                                errorMsg = "<p>There's an error in generating your TAC code.<br /> Please try again later.</p>";
                            } else {
                                errorMsg = data.message
                            }
                            
                            $(self.verify.errorMessage.phoneNumber).html(errorMsg).show();
                            $(self.verify.input.inputOTPPassword).focus();
                            $(self.verify.input.inputOTPPassword).on('keydown', function() {
                                $(self.verify.errorMessage.otpPassword).hide().html('');
                            });
                        })
                        .finally(() => {
                            toggleOverlay(false);
                        });
                },
                generateOTPForGuestLoginNew: function() {
                    var self = this;
                    $(self.verify.errorMessage.phoneNumber).hide().html('');
                    if (self.validateOTPNumber()) {
                        toggleOverlay(true);
                        self.ajaxGenerateOTPForGuestLoginNew();

                        $(self.verify.errorMessage).hide().html('');
                    }
                },

                checkForeignerDeposit: function() {
                    var self = this;
                    if (self.orderSummary.plan.planType == 'postpaid') {
                        var foreignerDeposit = parseFloat(self.orderSummary.plan.foreignerDeposit);
                        if (self.customerDetails.securityType == 'PASSPORT' && ywos.lsData.meta.orderSummary.due.foreignerDeposit == 0.00) {
                            self.orderSummary.due.foreignerDeposit = foreignerDeposit;
                            self.orderSummary.due.total = parseFloat(self.orderSummary.due.total) + parseFloat(foreignerDeposit);
                        } else if (self.customerDetails.securityType == 'NRIC' && ywos.lsData.meta.orderSummary.due.foreignerDeposit != 0.00) {
                            self.orderSummary.due.foreignerDeposit = 0.00;
                            self.orderSummary.due.total = parseFloat(self.orderSummary.due.total) - parseFloat(foreignerDeposit);
                        }
                    }
                },
                checkInput: function (event) {
                    var self = this;
                    var type = 'alphanumeric';
                    if (self.customerDetails.securityType == 'NRIC') {
                        type = 'numeric';
                        if (self.customerDetails.securityId.length > 11) {
                            event.preventDefault();
                        } else {
                            checkInputCharacters(event, type, false);
                        }
                    } else if (self.customerDetails.securityType == 'PASSPORT') {
                        checkInputCharacters(event, type, false);
                    } else {
                        return true;
                    }
                }, 
                watchSecurityType: function() {
                    var self = this;
                    self.deliveryInfo.securityType = self.customerDetails.securityType;
                    self.checkForeignerDeposit();
                    self.watchAllowNext();

                    self.customerDetails.securityId = '';
                    $('#input-securityId').focus();
                },
                watchAgree: function() {
                    var self = this;
                    self.watchAllowNext();
                },
                watchAllowNext: function() {
                    var self = this;
                    var isFilled = true;

                    if (!ywos.lsData.meta.isLoggedIn) {
                        if (
                            (!self.customerDetails.securityType) ||
                            (!self.customerDetails.securityId) ||
                            !self.isAgree ||
                            !self.verify.input.phoneNumber.trim().length ||
                            !self.verify.input.otpPassword.trim().length
                        ) {
                            isFilled = false;
                        }
                    } else if (!self.isAgree) {
                        isFilled = false;
                    }

                    if (isFilled) {
                        self.allowNext = true;
                    } else {
                        self.allowNext = false;
                    }
                },
                renderText: function(strID) {
                    return ywos.renderText(strID, this.pageText);
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>