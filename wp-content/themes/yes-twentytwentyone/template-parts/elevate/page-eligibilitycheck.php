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
    <section id="cart-body">
        <div class="container" style="border: 0">

            <div class="border-box" id="main-vue">
                <div class="row">
                    <div class="col-md-5 p-5 flex-column bg-checkout1">
                        <div class="title text-white checkout-left">
                            Amazing things happen when you say yes.
                        </div>
                    </div>
                    <div class="col-md-7 p-5">
                        <form class="needs-validation" novalidate>
                            <div class="mt-2 mb-2">
                                <h2 class="subtitle">Eligibility Check</h2>
                                <p class="sub mb-4">Please fill in your MyKad information, mobile<br> number and email
                                    to proceed</p>

                                <div class="text-bold">ID Verification</div>
                                <div class="row mb-4 mt-3">
                                    <div class="col-lg-8 col-12">
                                        <label class="form-label">* MyKad number</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" minlength="12" maxlength="12" class="form-control"
                                                   id="mykad_number"
                                                   name="mykad" v-model="eligibility.mykad" @input="watchAllowNext"
                                                   @keypress="checkInputCharacters(event, 'numeric', false)"
                                                   placeholder=""
                                                   required>

                                        </div>
                                        <div class="invalid-feedback mt-1" id="em-mykad"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-8 col-12">
                                        <label class="form-label">* Full Name (as per MyKad)</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="full_name" name="name"
                                                   v-model="eligibility.name" @keypress="checkInputCharacters(event, 'alpha', true)" @input="watchAllowNext" placeholder=""
                                                   required>

                                        </div>
                                        <div class="invalid-feedback mt-1" id="em-name"></div>
                                    </div>
                                </div>
                                <div class="row mb-4 align-items-center g-2">
                                    <div class="col-12">
                                        <label class="form-label">*Key in your mobile number</label>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-5">
                                                <input type="text" class="form-control text-center"
                                                       id="ic_passport_number"
                                                       placeholder="MY +60" readonly>
                                            </div>
                                            <div class="col-lg-8 col-7">
                                                <input type="text" class="form-control" maxlength="11"
                                                       id="ic_phone_number"
                                                       name="phone" v-model="eligibility.phone" @input="watchAllowNext"
                                                       @keypress="checkInputCharacters(event, 'numeric', false)"
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
                                            <input type="text" class="form-control" id="email" name="email"
                                                   v-model="eligibility.email" @input="watchAllowNext"
                                                   placeholder="" required>
                                        </div>
                                        <div class="invalid-feedback mt-1" id="em-email"></div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-8 col-12">
                                        <div class="sub">
                                            <p>By submitting this information you are agreeing to recieve exclusive Yes
                                                offers and promotions</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-6">
                                        <button class="text-uppercase" @click="goNext"
                                                :class="allowSubmit?'pink-btn':'pink-btn-disable'" type="button">Check
                                            Eligibility
                                        </button>
                                    </div>
                                    <div id="error" class="mt-3"></div>
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
                taxRate: {
                    sst: 0.06
                },
                eligibility: {
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
                        }

                        self.productId = elevate.lsData.orderDetail.productCode;

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
                        "plan_type": elevate.lsData.product.selected.plan.planType
                    };

                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/verify-eligibility', params)
                        .then((response) => {

                            var data = response.data;

                            if (data.data && data.data.eligibilityStatus == 'ALLOWED') {
                                self.isEligibilityCheck = true;
                                self.CAEligibility();
                            } else {
                                toggleOverlay(false);
                                if(data.status == 0){
                                    $('#error').html(data.error);
                                }else{
                                    $('#error').html(data.data.displayResponseMessage);
                                }
                                $('#error').html(data.data.displayResponseMessage);
                                console.log(data);

                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });

                },

                CAEligibility: function () {
                    var self = this;
                    var params = {
                        mykad: self.eligibility.mykad,
                        name:self.eligibility.name,
                    };
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/verify-caeligibility', params)
                        .then((response) => {

                            var data = response.data;
                            if (data.status == 1) {
                                self.isCAEligibilityCheck = true;
                                self.elevateCustomer();
                            } else {
                                toggleOverlay(false);
                                elevate.redirectToPage('eligibility-failure');
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            $('#error').html("System error, please try again.");
                            console.log(error, response);
                        });
                },

                elevateCustomer: function () {
                    var self = this;
                    var params = self.eligibility;
                    params.productId = self.productId;
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/customer', params)
                        .then((response) => {

                            var data = response.data;
                            if (data.status == 1) {
                                elevate.lsData.customer = data.data;
                                elevate.updateElevateLSData();
                                elevate.redirectToPage('verification');
                            } else {
                                toggleOverlay(false);
                                $('#error').html(data.error);
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });
                },

                validateMobile: function (mob) {
                    if (mob.length < 10 && mob.length > 11) {
                        return false;
                    }
                    if (mob.slice(0, 2) != '01') {
                        return false;
                    }

                    if (mob.slice(0, 3) == '011') {
                        if (mob.length < 11) {
                            return false;
                        }
                    }

                    return true;
                },

                watchAllowNext: function () {
                    $('.input_error').removeClass('input_error');
                    var self = this;

                    self.isEligibilityCheck = false;
                    self.isCAEligibilityCheck = false;

                    var isFilled = true;
                    if (
                        self.eligibility.mykad.trim() == '' ||
                        self.eligibility.name.trim() == '' ||
                        self.eligibility.email.trim() == '' ||
                        self.eligibility.phone.trim() == ''
                    ) {
                        isFilled = false;
                    }

                    var mykad = /[0-9]{12}$/g;
                    if (self.eligibility.mykad.trim() && !mykad.test(self.eligibility.mykad.trim())) {
                        isFilled = false;
                        $('#mykad_number').addClass('input_error');
                    }

                    /*var phone = /^[0-46-9]*[0-9]{9,10}$/g;
                    if (self.eligibility.phone.trim() && !phone.test(self.eligibility.phone.trim())) {
                        isFilled = false;
                        $('#ic_phone_number').addClass('input_error');
                    }*/
                    if(!self.validateMobile(self.eligibility.phone)){
                        isFilled = false;
                        $('#ic_phone_number').addClass('input_error');
                    }

                    var email = /\S+@\S+\.\S+/;
                    if (self.eligibility.email.trim() && !email.test(self.eligibility.email.trim())) {
                        isFilled = false;
                        $('#email').addClass('input_error');
                    }

                    if (isFilled) {
                        self.allowSubmit = true;
                    } else {
                        self.allowSubmit = false;
                    }
                },
                goNext: function () {
                    var self = this;
                    $('#error').html('');
                    if (self.allowSubmit) {
                        //update store
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
