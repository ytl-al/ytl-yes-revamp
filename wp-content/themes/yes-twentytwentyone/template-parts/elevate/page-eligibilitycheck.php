<?php require_once('includes/header.php') ?>
<style>
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>
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
                <h1 class="title_checkout p-3"></h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main class="clearfix site-main">
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. Eligibility check</span>
                </li>
                <li ui-sref="secondStep">
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
    <section id="cart-body">
        <div class="container" style="border: 0">

            <div class="border-box" id="main-vue">
                <div class="row">
                    <div class="col-md-5 p-5 flex-column bg-checkout1">
                        <div class="title text-white checkout-left">
                            Check if you are eligible for the Yes Infinite+ contract option
                        </div>
                    </div>
                    <div class="col-md-7 p-5">
                        <form class="needs-validation" novalidate>
                            <div class="mt-2 mb-2">
                                <h2 class="subtitle">Eligibility Check</h2>
                                <p class="sub mb-4">Please fill in your MyKad/MyTentera information, mobile<br> number and email
                                    to proceed</p>

                                <div class="text-bold">MyKAD Verification</div>
                                <div class="row mb-4 align-items-center g-2">
                                    <div class="col-lg-8 col-12">
                                        <label class="form-label">* MyKad/MyTentera number</label>
                                        <div class="">
                                            <div class="row">
                                                <div class="col-lg-4 col-5">
                                                    <select v-model="eligibility.cardtype" class="" style="width:100%"
                                                            id="cardtype" name="cardtype">
                                                        <option value="1">MyKad</option>
                                                        <option value="2" >MyTentera</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-8 col-7">
                                                    <input type="text" pattern="[0-9]+" minlength="12" maxlength="12" class="form-control text-uppercase"
                                                           id="mykad_number"
                                                           name="mykad" v-model="eligibility.mykad" @input="watchAllowNext" @change="watchAllowNext"
                                                           @keypress="isNumber($event)" min="0"
                                                           placeholder=""
                                                           required>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="invalid-feedback mt-1" id="em-mykad"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-8 col-12">
                                        <label class="form-label">* Full Name (as per MyKad)</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control text-uppercase" id="full_name" name="name"
                                                   v-model="eligibility.name" @keypress="checkInputFullName(event)" @input="watchAllowNext" @change="watchAllowNext" placeholder=""
                                                   required>

                                        </div>
                                        <div class="invalid-feedback mt-1" id="em-name"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-8 col-12">
                                        <label class="form-label">* Date Of Birth</label>
                                        <div class="align-items-center">
                                            <input type="text" class="form-control text-uppercase" id="dob" name="dob"
                                                   v-model="eligibility.dob"
                                                   placeholder="" readonly>
                                        </div>
                                        <div class="invalid-feedback mt-1" id="em-email"></div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center g-2">
                                    <div class="col-12">
                                        <label class="form-label">* Key in your mobile number</label>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-5">
                                                <input type="text" class="form-control text-center"
                                                       id="ic_passport_number"
                                                       placeholder="MY +60" readonly>
                                            </div>
                                            <div class="col-lg-8 col-7">
                                                <input type="text" pattern="[0-9]+" min="0" class="form-control text-uppercase" maxlength="10"
                                                       id="ic_phone_number"
                                                       name="phone" v-model="eligibility.inphone" @input="watchAllowNext"
                                                       @keypress="isNumber($event)"
                                                       placeholder="Phone number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-phone"></div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-8 col-12">
                                        <label class="form-label">* Email address</label>
                                        <div class="align-items-center">
                                            <input type="text" class="form-control text-uppercase" id="email" name="email"
                                                   v-model="eligibility.email" @input="watchAllowNext"
                                                   placeholder="" required>
                                        </div>
                                        <div class="invalid-feedback mt-1" id="em-email"></div>
                                    </div>
                                </div>


                                <div class="row mt-2 ">
                                    <div class="col-1">
                                        <input type="checkbox" id="subscribe" @click="watchAllowNext" name="subscribe" value="1">
                                    </div>
                                    <div class="col-11 text-12" >
                                        <label for="subscribe" style="line-height:20px;">I here by agree to subscribe to the plan selected in the online form
                                            submitted by me, and to be bound by the First to 5G Campaign Terms and
                                            Conditions available at <a target="_blank"
                                                                       href="https://www.yes.my/tnc/ongoing-campaigns-tnc">www.yes.my/tnc/ongoing-campaigns-tnc</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-1">
                                        <input type="checkbox" id="consent" @click="watchAllowNext" name="consent" value="1">
                                    </div>
                                    <div class="col-11 text-12">
                                        <label for="consent" style="line-height:20px;">
                                            I further give consent to YTLC to process my personal data in accordance with YTL Group Privacy Policy available at <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a> and also give consent to TOP to process my personal data in accordance with TOP Privacy Policy available at (<a href="http://yes.compasia.com/TOP_PRIVACY_POLICY.PDF" target="_blank">http://yes.compasia.com/TOP_PRIVACY_POLICY.PDF</a>) for the purposes of my agreement with TOP.
                                        </label>
                                    </div>
                                </div>

                                <div class="row mt-2 mb-5">
                                    <div class="col-md-6">
                                        <button class="text-uppercase" @click="goNext"
                                                :class="allowSubmit?'pink-btn':'pink-btn-disable'" type="button">Check
                                            Eligibility
                                        </button>
                                    </div>
                                    <div id="error" class="mt-3"></div>
                                    <div id="status_mesage"></div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
<?php require_once('includes/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                productId: null,
                isCartEmpty: false,
                isEligibilityCheck: false,
                isCAEligibilityCheck: false,
                notActiveContract: false,
                taxRate: {
                    sst: 0.06
                },
                eligibility: {
                    cardtype: 1,
                    mykad: '',
                    name: '',
                    dob: '',
                    phone: '',
                    inphone: '',
                    email: '',
                    alternative_name: '',
                    alternative_phone: '',
                    registrationChannel: 'WEB',
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
                input: {
                    mykad: {field: '#mykad_number', errorMessage: '#em-mykad'},
                    name: {field: '#full_name', errorMessage: '#em-name'},
                    phone: {field: '#ic_phone_number', errorMessage: '#em-phone'},
                    email: {field: '#email', errorMessage: '#em-email'}
                },
                allowSubmit: false
            },

            created: function () {
                var self = this;
                setTimeout(function () {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        self.pageValid = true;
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                            var zero = self.eligibility.phone.substring(0,1);

                            if(zero =="0"){
                                self.eligibility.phone = self.eligibility.phone.substring(1,11);
                            }
                        }

                        self.productId = elevate.lsData.product.selected.productCode;
                        self.dealer = elevate.lsData.meta.dealer;

                        self.updateFields();
                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                updateFields: function () {
                    var self = this;

                    self.watchAllowNext();
                },

                eligibilityCheck: function () {
                    var self = this;
                    var params = {
                        "mykad": self.eligibility.mykad.trim(),
                        "plan_type": elevate.lsData.product.selected.plan.planType,
                        "bundleId": elevate.lsData.product.selected.productCode,
                    };

                    $('#status_mesage').html('Checking eligibility...');

                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/verify-eligibility', params)
                        .then((response) => {

                            var data = response.data;

                            if (data.data.eligibilityStatus == 'ALLOWED') {
                                self.isEligibilityCheck = true;
                                // self.elevateCustomer();      // Commented by AL

                                self.checkActiveContract();     // Moved by AL
                            } else {

                                toggleOverlay(false);
                                if(data.status == 0){
                                    toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                                }else{
                                    toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful because your NRIC is not eligible.',"elevate.redirectToPage('compasia-fail')")
                                }
                                // $('#error').html(data.data.displayResponseMessage);
                                // $('#status_mesage').html('');
                                // console.log(data);



                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });

                },

                CAEligibility: function () {
                    var self = this;
                    var params = {
                        mykad: self.eligibility.mykad,
                        name:self.eligibility.name,
                        phone:self.eligibility.phone,
                        email:self.eligibility.email,
                    };
                    toggleOverlay();
                    $('#status_mesage').html('Checking compAsia...');
                    axios.post(apiEndpointURL_elevate + '/verify-caeligibility', params)
                        .then((response) => {

                            var data = response.data;
                            if (data.status == 1) {
                                self.isCAEligibilityCheck = true;
                                // self.checkActiveContract();      // Commented by AL

                                self.elevateCustomer();             // Moved by AL
                            } else {
                                toggleOverlay(false);
                                $('#status_mesage').html('');
                                toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful because your NRIC is not eligible.',"elevate.redirectToPage('eligibility-failure')");

                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            $('#status_mesage').html('');
                            console.log(error);
                        });
                },

                checkActiveContract: function () {
                    var self = this;
                    var params = {
                        mykad: self.eligibility.mykad
                    };
                    toggleOverlay();
                    $('#status_mesage').html('Checking contract...');
                    var t = new Date().getTime();
                    axios.post(apiEndpointURL_elevate + '/check-active-contract?t='+t, params)
                        .then((response) => {

                            var data = response.data;
                            if (data.status == 1) {
                                self.notActiveContract = true;
                                // elevate.redirectToPage('verification');      // Commented by AL

                                //check compAsia Eligibility
                                self.CAEligibility();                           // Moved by AL
                            } else {
                                toggleOverlay(false);
                                $('#status_mesage').html('');
                                toggleModalAlert('Error','Dear valued customer,<br>Your submission was not successful as you already have an existing installment plan that is currently active.',"elevate.redirectToPage('eligibility-failure')")
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });
                },

                elevateCustomer: function () {
                    var self = this;
                    var params = self.eligibility;
                    params.productId = self.productId;

                    if(self.dealer){
                        params.referralCode = self.dealer.referral_code;
                        params.dealerUID = self.dealer.dealer_id;
                        params.dealerCode = self.dealer.dealer_code;
                    }else{
                        params.referralCode ="";
                        params.dealerUID = "";
                        params.dealerCode = "";
                    }

                    toggleOverlay();
                    $('#status_mesage').html('Checking customer...');

                    axios.post(apiEndpointURL_elevate + '/customer', params)
                        .then((response) => {

                            var data = response.data;
                            if (data.status == 1) {
                                elevate.lsData.customer = data.data;
                                elevate.updateElevateLSData();

                                // //check compAsia Eligibility                 // Commented by AL
                                // self.CAEligibility();                        // Commented by AL

                                elevate.redirectToPage('verification');         // Moved by AL

                                //elevate.redirectToPage('verification');
                            } else {
                                toggleOverlay(false);
                                toggleModalAlert('Error','Dear valued customer,<br>'+data.error)

                            }
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                validateMobile: function (mob) {

                    if (mob.length < 9 && mob.length > 10) {
                        return false;
                    }
                    if (mob.slice(0, 1) != '1') {
                        return false;
                    }

                    if (mob.slice(0, 2) == '11') {
                        if (mob.length < 10) {
                            return false;
                        }
                    }

                    return true;
                },

                getDOB: function (){
                    var self = this;
                    var dateString = self.eligibility.mykad.substring(0, 6);

                    var year = dateString.substring(0, 2); //year
                    var month = dateString.substring(2, 4); //month
                    var date = dateString.substring(4, 6); //date

                    if (year > 20) {
                        year = "19" + year;
                    }
                    else {
                        year = "20" + year;
                    }

                    var dob = date + "/" + month + "/" + year;
                    return dob;
                },

                getDOBIso: function (){
                    var self = this;
                    var dateString = self.eligibility.mykad.substring(0, 6);

                    var year = dateString.substring(0, 2); //year
                    var month = dateString.substring(2, 4); //month
                    var date = dateString.substring(4, 6); //date

                    if (year > 20) {
                        year = "19" + year;
                    }
                    else {
                        year = "20" + year;
                    }

                    var dob = year + "-" + month + "-" + date;
                    return dob;
                },

                isValidDate: function(d) {
                    return (new Date(d) !== "Invalid Date") && !isNaN(new Date(d));
                },

                validateAge: function(){
                    var self = this;
                    var dateString = self.eligibility.mykad.substring(0, 6);

                    var year = dateString.substring(0, 2); //year
                    var month = dateString.substring(2, 4); //month
                    var date = dateString.substring(4, 6); //date

                    if (year > 20) {
                        year = "19" + year;
                    }
                    else {
                        year = "20" + year;
                    }

                    var dob = new Date(year+'-'+month+'-'+date);
                    var today = new Date();
                    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

                    return (age>=18 && age <=65);
                },

                isNumber: function(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                        evt.preventDefault();;
                    } else {
                        return true;
                    }
                },

                validateEmail: function(emailAddress) {
                    emailAddress = emailAddress.toLowerCase();;
                    var re = /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)+(com|asia|au|biz|cn|co|de|edu|giv|hk|id|in|jp|my|net|nz|org|sg|tw|uk)$/;
                    return re.test(emailAddress);
                },

                watchAllowNext: function () {
                    $('#error').html("");
                    $('.input_error').removeClass('input_error');
                    var self = this;

                    var error = new Array();

                    self.isEligibilityCheck = false;
                    self.isCAEligibilityCheck = false;

                    self.eligibility.phone = '0'+self.eligibility.inphone;

                    var isFilled = true;
                    if (
                        self.eligibility.mykad.trim() == '' ||
                        self.eligibility.name.trim() == '' ||
                        self.eligibility.email.trim() == '' ||
                        self.eligibility.inphone.trim() == ''
                    ) {
                        isFilled = false;
                    }

                    var mykad = /[0-9]{12}$/g;
                    if (self.eligibility.mykad.trim() && !mykad.test(self.eligibility.mykad.trim())) {
                        isFilled = false;
                        $('#mykad_number').addClass('input_error');
                    }



                    if(self.eligibility.mykad.trim().length >= 12){

                        var bod = self.getDOBIso();

                        if(self.isValidDate(bod)){
                            self.eligibility.dob = self.getDOB();
                            if(!self.validateAge()){
                                isFilled = false;
                                $('#mykad_number').addClass('input_error');
                                toggleModalAlert('Error','Dear valued customer,<br>Unfortunately, your submission was not successful due to your age not meeting the requirement.');
                            }
                        }else{
                            isFilled = false;
                            $('#mykad_number').addClass('input_error');
                            self.eligibility.dob = '';
                            error.push('Invalid MyKad number');
                        }
                    }else{
                        if(self.eligibility.mykad.trim().length > 0 && self.eligibility.mykad.trim().length < 12){
                            error.push('Invalid MyKad number');
                            $('#mykad_number').addClass('input_error');
                        }
                        self.eligibility.dob = '';
                    }

                    var pattern = /^\d+\.?\d*$/;
                    if(self.eligibility.mykad && !pattern.test(self.eligibility.mykad)){
                        error.push('Invalid MyKad number');
                        $('#mykad_number').addClass('input_error');
                        self.eligibility.dob = '';
                        isFilled = false
                    }

                    var pattern =  /^[a-zA-Z,\.,\/,@,\s]+$/;
                    if(self.eligibility.name && !pattern.test(self.eligibility.name)){
                        error.push('Invalid Full Name');
                        $('#full_name').addClass('input_error');
                        isFilled = false
                    }

                    var phone = /^[1][0-9].{7,}$/g;
                    if (self.eligibility.inphone.trim() && (!phone.test(self.eligibility.inphone.trim()) || !self.validateMobile(self.eligibility.inphone))) {
                        isFilled = false;
                        $('#ic_phone_number').addClass('input_error');
                        error.push('Invalid mobile number');
                    }

                    if (self.eligibility.email.trim() && !self.validateEmail(self.eligibility.email.trim())) {
                        isFilled = false;
                        $('#email').addClass('input_error');
                        error.push('Invalid email');
                    }

                    if(!$('#subscribe').is(':checked') ||  !$('#consent').is(':checked')){
                        isFilled = false
                    }

                    if (isFilled) {
                        self.allowSubmit = true;
                    } else {
                        self.allowSubmit = false;
                        if(error.length){
                            var uniqueArray = error.filter(function(item, pos, self) {
                                return self.indexOf(item) == pos;
                            })
                            $('#error').html("Sorry: " + uniqueArray.join(', ')+'.');
                        }
                    }
                },
                goNext: function () {
                    var self = this;
                    $('#status_mesage').html('');
                    if (self.allowSubmit) {
                        $('#error').html('');
                        //update store
                        self.eligibility.phone = '0'+self.eligibility.inphone;

                        self.eligibility.name = self.eligibility.name.toUpperCase();
                        self.eligibility.email = self.eligibility.email.toUpperCase();

                        elevate.lsData.eligibility = self.eligibility;
                        elevate.updateElevateLSData();
                        if(!self.isEligibilityCheck){
                            self.eligibilityCheck();
                        }else if(!self.isCAEligibilityCheck){
                            self.CAEligibility();
                        }else{
                            self.elevateCustomer();
                        }

                    }
                }

            }
        });
    });
</script>
