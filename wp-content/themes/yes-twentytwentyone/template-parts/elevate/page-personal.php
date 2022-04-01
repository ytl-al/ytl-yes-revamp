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
<div>
    <main class="clearfix site-main">

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
                    <li ui-sref="thirdStep" class="completed">
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
            <div class="container p-lg-5 p-3">
                <div class=" gx-5" id="main-vue">
                    <form class="row needs-validation" novalidate>
                        <div class="col-md-12">
                            <h2 class="subtitle">Personal Details</h2>
                            <p class="sub mb-4">Delivery only available in Malaysia.<br>
                                Ensure all information is correct before proceeding.</p>
                            <div class="text-bold mb-3">ID Verification</div>
                        </div>
                        <div class="col-lg-5 col-12">

                            <div class="row mb-4">
                                <div class="col-lg-12 col-12">
                                    <label class="form-label">* MyKad number</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" maxlength="12" class="form-control" id="mykad_number"
                                               name="mykad" v-model="deliveryInfo.mykad" @input="watchAllowNext"
                                               @keypress="checkInputCharacters(event, 'numeric', false)" placeholder="" readonly
                                               required>

                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-mykad"></div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-12 col-12">
                                    <label class="form-label">* Full Name (as per MyKad)</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="full_name" name="name"
                                               v-model="deliveryInfo.name" @input="watchAllowNext" placeholder="" readonly
                                               required>

                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-name"></div>
                                </div>
                            </div>
                            <div class="row mb-4 align-items-center g-2">
                                <div class="col-12">
                                    <label class="form-label">*Phone number</label>
                                </div>
                                <div class="col-lg-4 col-5">
                                    <input type="text" class="form-control text-center" id="ic_passport_number"
                                           placeholder="MY +60" readonly>
                                </div>
                                <div class="col-lg-8 col-7">
                                    <input type="text" class="form-control" maxlength="11" id="ic_phone_number"
                                           name="phone" v-model="deliveryInfo.phone" @input="watchAllowNext"
                                           @keypress="checkInputCharacters(event, 'numeric', false)"
                                           placeholder="Phone number" readonly>
                                </div>
                                <div class="invalid-feedback mt-1" id="em-phone"></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label">* Email address</label>
                                    <div class="align-items-center">
                                        <input type="text" class="form-control" id="email" name="email"
                                               v-model="deliveryInfo.email" @input="watchAllowNext"
                                               placeholder="" readonly required>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-email"></div>
                                </div>
                            </div>
                            <div class="row d-none d-md-block">
                                <div class="col-6">
                                    <button class="pink-btn-disable text-uppercase" @click="goNext"
                                            :class="allowSubmit?'pink-btn':'pink-btn-disable'" type="button">Continue
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label class="form-label">* Address</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="address" name="address"
                                               v-model="deliveryInfo.address" @input="watchAllowNext" placeholder=""
                                               required>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-address"></div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12 col-12">
                                    <label class="form-label">Unit number (optional)</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="address-more" name="addressMore"
                                               v-model="deliveryInfo.addressMore" @input="watchAllowNext"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                            <div class="col-md-12 col-12">
                                <label class="form-label">* Postcode</label>
                                <div class="input-group mt-2 align-items-center">
                                    <input type="text" maxlength="5" class="form-control" id="postcode"
                                           name="postcode" v-model="deliveryInfo.postcode" @input="watchChangePostcode"
                                           @keypress="checkInputCharacters(event, 'numeric', false)" placeholder=""
                                           required/>
                                </div>
                                <div class="invalid-feedback mt-1" id="em-postcode"></div>
                            </div>
                            </div>
                            <div class="row mb-4">

                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="select-state">* State</label>
                                    <div class="input-group align-items-center">
                                        <!--select class="form-select" id="state" name="state" data-live-search="true"
                                                v-model="deliveryInfo.state" @change="watchChangeState" required readonly="">
                                            <option value="" selected="selected" disabled="disabled">Select State
                                            </option>
                                            <option v-for="state in postCode.state" :value="state">{{state}}
                                            </option>
                                        </select-->
                                        <input type="text"  class="form-control"  id="state" name="state"
                                               v-model="deliveryInfo.state"  @input="watchAllowNext"
                                               placeholder=""
                                               required readonly/>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-state"></div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label">* City</label>
                                    <div class="input-group align-items-center">
                                        <!--select class="form-select" id="city" name="city" data-live-search="true"
                                                v-model="deliveryInfo.city" @change="watchChangeCity" required readonly>
                                            <option v-for="city in postCode.city" :value="city">{{city}}
                                            </option>
                                        </select-->
                                        <input type="text" class="form-control"  id="city" name="city"
                                               v-model="deliveryInfo.city"  @input="watchAllowNext"
                                               placeholder=""
                                               required readonly/>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-city"></div>
                                </div>

                                <div class="row d-block d-md-none">
                                    <div class="col-6">
                                        <button class="pink-btn-disable text-uppercase" @click="goNext"
                                                :class="allowSubmit?'pink-btn':'pink-btn-disable'" type="button">Continue
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-12">
                            <div id="error"></div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>
</div>
<?php require_once('includes/footer.php'); ?>

<?php
    $file = dirname(__FILE__).'/'.'postcodes.json';
    $postcode = json_decode(file_get_contents($file));

    $code = [];
    $state = [];
    $city = [];
    $stateCity = [];
    foreach ($postcode as $item){
        $code[$item->code] = $item;
        if(!@in_array($item->state,$state)){
            $state[] = $item->state;
        }
        if(!@in_array($item->city,$city)){
            $city[] = $item->city;
        }
        if(!@in_array($item->city,$stateCity[$item->state])){
            $stateCity[$item->state][] = $item->city;
        }
    }

?>

<script type="text/javascript">


    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                productId: null,
                isCartEmpty: false,
                taxRate: {
                    sst: 0.06
                },
                orderSummary: {
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems: []
                    },
                },
                currentStep: 0,
                elevate: null,
                postCode : <?php echo json_encode(array('data'=>$code,'state'=>$state,'stateCity'=>$stateCity,'city'=>$city))?>,
                selectOptions: {
                    states: [{
                        'stateCode': 'KUL',
                        'value': 'WILAYAH PERSEKUTUAN-KUALA LUMPUR',
                        'name': 'Wilayah Persekutuan Kuala Lumpur'
                        },
                        {
                            'stateCode': 'PJY',
                            'value': 'WILAYAH PERSEKUTUAN-PUTRAJAYA',
                            'name': 'Wilayah Persekutuan Putrajaya'
                        },
                        {
                            'stateCode': 'LBN',
                            'value': 'WILAYAH PERSEKUTUAN-LABUAN',
                            'name': 'Wilayah Persekutuan Labuan'
                        },
                        {
                            'stateCode': 'JHR',
                            'value': 'JOHOR',
                            'name': 'Johor'
                        },
                        {
                            'stateCode': 'KDH',
                            'value': 'KEDAH',
                            'name': 'Kedah'
                        },
                        {
                            'stateCode': 'KTN',
                            'value': 'KELANTAN',
                            'name': 'Kelantan'
                        },
                        {
                            'stateCode': 'MLK',
                            'value': 'MELAKA',
                            'name': 'Melaka'
                        },
                        {
                            'stateCode': 'NSN',
                            'value': 'NEGERI SEMBILAN',
                            'name': 'Negeri Sembilan'
                        },
                        {
                            'stateCode': 'PHG',
                            'value': 'PAHANG',
                            'name': 'Pahang'
                        },
                        {
                            'stateCode': 'PNG',
                            'value': 'PULAU PINANG',
                            'name': 'Pulau Pinang'
                        },
                        {
                            'stateCode': 'PRK',
                            'value': 'PERAK',
                            'name': 'Perak'
                        },
                        {
                            'stateCode': 'PLS',
                            'value': 'PERLIS',
                            'name': 'Perlis'
                        },
                        {
                            'stateCode': 'SBH',
                            'value': 'SABAH',
                            'name': 'Sabah'
                        },
                        {
                            'stateCode': 'SRW',
                            'value': 'SARAWAK',
                            'name': 'Sarawak'
                        },
                        {
                            'stateCode': 'SGR',
                            'value': 'SELANGOR',
                            'name': 'Selangor'
                        },
                        {
                            'stateCode': 'TRG',
                            'value': 'TERENGGANU',
                            'name': 'Terengganu'
                        }
                    ],
                    cities: []
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
                deliveryInfo: {
                    uid: '',
                    productId: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    addressMore: '',
                    addressLine: '',
                    postcode: '',
                    state: '',
                    stateCode: '',
                    city: '',
                    cityCode: '',
                    country: '',
                    deliveryNotes: '',
                    sanitize: {
                        address: '',
                        addressMore: '',
                        addressLine: '',
                        city: '',
                        country: '',
                        state: ''
                    }
                },
                input: {
                    mykad: {field: '#mykad_number', errorMessage: '#em-mykad'},
                    name: {field: '#full_name', errorMessage: '#em-name'},
                    phone: {field: '#ic_phone_number', errorMessage: '#em-phone'},
                    email: {field: '#email', errorMessage: '#em-email'},
                    address: {field: '#address', errorMessage: '#em-address'},
                    addressMore: {field: '#input-addressMore', errorMessage: '#em-addressMore'},
                    postcode: {field: '#postcode', errorMessage: '#em-postcode'},
                    state: {field: '#select-state', errorMessage: '#em-state'},
                    city: {field: '#select-city', errorMessage: '#em-city'},
                    note: {field: '#delivery-notes', errorMessage: '#em-note'}
                },
                billingInfo: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    addressMore: '',
                    postcode: '',
                    state: '',
                    city: '',
                    note: '',
                },
                allowSelectCity: false,
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
                    console.log("postCode",self.postCode);

                    if (elevate.validateSession(self.currentStep)) {
                        self.pageValid = true;
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                        }
                        if (elevate.lsData.customer) {
                            self.customer = elevate.lsData.customer;
                        }
                        if (elevate.lsData.deliveryInfo) {
                            self.deliveryInfo = elevate.lsData.deliveryInfo;
                        }
                        self.productId = elevate.lsData.product.selected.productCode;

                        self.updateFields();
                        toggleOverlay(false);

                        setTimeout(function () {
                            $('.form-select').selectpicker('refresh');
                            self.watchAllowNext();
                        }, 100);
                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                updateFields: function () {
                    var self = this;
                    var eligibility = self.eligibility;
                    if (eligibility && !self.deliveryInfo.mykad) {
                        // self.deliveryInfo.uid = eligibility.uid;
                        self.deliveryInfo.mykad = eligibility.mykad;
                        self.deliveryInfo.name = eligibility.name;
                        self.deliveryInfo.phone = eligibility.phone;
                        self.deliveryInfo.email = eligibility.email;
                    }

                    self.watchChangeState();
                    self.deliveryInfo.stateCode = (self.deliveryInfo.state) ? self.getStateCode(self.deliveryInfo.state) : '';
                    self.deliveryInfo.cityCode = self.deliveryInfo.city;
                    self.deliveryInfo.country = 'MALAYSIA';

                },
                watchChangeState: function (event) {
                    var self = this;
                    if (event && event.target.value) {
                        self.deliveryInfo.state = event.target.value;
                    }
                    if (typeof self.deliveryInfo.state !== 'undefined' && self.deliveryInfo.state.length) {
                        self.postCode.city = self.postCode.stateCity[self.deliveryInfo.state];
                        console.log(self.postCode.city);
                        setTimeout(function () {
                            $('.form-select').selectpicker('refresh');
                            if (self.deliveryInfo.city) {
                                $('#city').val(self.deliveryInfo.city)
                            }
                            toggleOverlay(false);
                        }, 500);
                    }
                },
                watchChangeCity: function (event) {
                    var self = this;
                    self.deliveryInfo.city = event.target.value;
                    self.watchAllowNext();
                },
                watchChangePostcode: function(event){
                    var self = this;
                    var postcode = event.target.value;
                    if(self.postCode.data[postcode]){
                        self.postCode.city = self.postCode.stateCity[self.postCode.data[postcode].state];
                        self.deliveryInfo.state = self.postCode.data[postcode].state;
                        self.deliveryInfo.city = self.postCode.data[postcode].city;
                        self.deliveryInfo.stateCode = self.getStateCode(self.deliveryInfo.state);
                        setTimeout(function () {
                            $('#state').val(self.postCode.data[postcode].state);
                            $('#city').val(self.postCode.data[postcode].city);
                            $('.form-select').selectpicker('refresh');
                            self.updateCityCode();
                        }, 500);
                    }else{
                        self.deliveryInfo.state = '';
                        self.deliveryInfo.city = '';
                        setTimeout(function () {
                            $('#state').val('');
                            $('#city').val('');
                            $('.form-select').selectpicker('refresh');


                        }, 500);
                    }

                    self.watchAllowNext();
                },
                getStateCode: function (stateVal) {
                    var self = this;
                    var objState = self.selectOptions.states.filter(state => state.value == stateVal);
                    return objState[0].stateCode;
                },
                ajaxGetCitiesByState: function (state = null) {
                    var self = this;
                    var stateCode = self.getStateCode(state);

                    toggleOverlay();

                    self.allowSelectCity = false;
                    setTimeout(function () {
                        $('.form-select').selectpicker('refresh');
                    }, 100);

                    axios.get(apiEndpointURL + '/get-cities-by-state/' + stateCode)
                        .then((response) => {
                            var options = [];
                            var data = response.data;
                            var masterlist = data.masterDataList[0].masterList;
                            masterlist.map((value, index) => {
                                options.push({
                                    value: value.masterCode,
                                    name: value.masterValue
                                });
                            })
                            self.selectOptions.cities = options;
                            self.allowSelectCity = true;

                            var objCity = self.selectOptions.cities.filter(city => city.value == self.deliveryInfo.city);
                            if (objCity.length == 0) {
                                self.deliveryInfo.city = '';
                                self.deliveryInfo.cityCode = '';
                            }

                            setTimeout(function () {
                                $('.form-select').selectpicker('refresh');
                                if (self.deliveryInfo.city) {
                                    $('#city').val(self.deliveryInfo.city)
                                }
                                toggleOverlay(false);
                            }, 500);
                        })
                        .catch((error) => {
                            // console.log(error);
                        })
                        .finally(() => {
                            self.watchAllowNext();
                            toggleOverlay(false);
                        });
                },

                updateCityCode: function () {
                    var self = this;
                    var stateCode = self.deliveryInfo.stateCode;

                    toggleOverlay();

                    self.allowSelectCity = false;

                    axios.get(apiEndpointURL + '/get-cities-by-state/' + stateCode)
                        .then((response) => {
                            var options = [];
                            var data = response.data;
                            var masterlist = data.masterDataList[0].masterList;
                            masterlist.map((value, index) => {
                                options.push({
                                    value: value.masterCode,
                                    name: value.masterValue
                                });
                                if(value.masterValue == self.deliveryInfo.city){
                                    self.deliveryInfo.cityCode = value.masterCode;
                                }
                            })
                            self.selectOptions.cities = options;
                            self.allowSelectCity = true;

                            var objCity = self.selectOptions.cities.filter(city => city.value == self.deliveryInfo.city);
                            if (objCity.length == 0) {
                                self.deliveryInfo.city = '';
                                self.deliveryInfo.cityCode = '';
                            }
                            elevate.lsData.deliveryInfo = self.deliveryInfo;
                            elevate.updateElevateLSData();
                            console.log("self.deliveryInfo",self.deliveryInfo);
                        })
                        .catch((error) => {
                            // console.log(error);
                        })
                        .finally(() => {
                            self.watchAllowNext();
                            toggleOverlay(false);
                        });
                },

                checkIsNumber: function (event) {
                    event = (event) ? event : window.event;
                    var charCode = (event.which) ? event.which : event.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                        event.preventDefault();
                    } else {
                        return true;
                    }
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
                    var isFilled = true;
                    if (
                        self.deliveryInfo.mykad.trim() == '' ||
                        self.deliveryInfo.name.trim() == '' ||
                        self.deliveryInfo.email.trim() == '' ||
                        self.deliveryInfo.phone.trim() == '' ||
                        self.deliveryInfo.address.trim() == '' ||
                        self.deliveryInfo.postcode.trim() == '' ||
                        self.deliveryInfo.state.trim() == '' ||
                        (typeof self.deliveryInfo.city == 'undefined' || self.deliveryInfo.city.trim() == '')
                    ) {
                        isFilled = false;
                    }
                    var mykad = /[0-9]{12}$/g;
                    if (self.deliveryInfo.mykad.trim() && !mykad.test(self.deliveryInfo.mykad.trim())) {
                        isFilled = false;
                        $('#mykad_number').addClass('input_error');
                    }

                    /*var phone = /^[0-46-9]*[0-9]{7,11}$/g;
                    if (self.deliveryInfo.phone.trim() && !phone.test(self.deliveryInfo.phone.trim())) {
                        isFilled = false;
                        $('#ic_phone_number').addClass('input_error');
                    }*/

                    if(!self.validateMobile(self.deliveryInfo.phone)){
                        isFilled = false;
                        $('#ic_phone_number').addClass('input_error');
                    }

                    var email = /\S+@\S+\.\S+/;
                    if (self.deliveryInfo.email.trim() && !email.test(self.deliveryInfo.email.trim())) {
                        isFilled = false;
                        $('#email').addClass('input_error');
                    }

                    var postcode = /^[0-9]{5}$/g;
                    if (self.deliveryInfo.postcode && !postcode.test(self.deliveryInfo.postcode.trim())) {
                        isFilled = false;
                        $('#postcode').addClass('input_error');
                    }else if(self.deliveryInfo.postcode && !self.postCode.data[self.deliveryInfo.postcode]){
                        isFilled = false;
                        $('#postcode').addClass('input_error');
                    }

                    if (isFilled) {
                        self.allowSubmit = true;
                    } else {
                        self.allowSubmit = false;
                    }
                },
                updateCustomer: function () {
                    var self = this;

                    toggleOverlay();
                    var param = self.deliveryInfo;
                    param.uid = self.customer.id;
                    param.productId = self.productId;

                    axios.post(apiEndpointURL_elevate + '/customer/update', param)
                        .then((response) => {
                            var data = response.data;
                            if(data.status == 1){
                                elevate.redirectToPage('review');
                            }else{
                                toggleOverlay(false);
                                $('#error').html("Systm error, please try again.");
                                console.log(data);
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error, response);
                        });

                },
                goNext: function () {
                    var self = this;
                    self.getStateCode(self.deliveryInfo.state);
                    $('#error').html("");
                    if (self.allowSubmit) {
                        //update store
                        elevate.lsData.deliveryInfo = self.deliveryInfo;
                        elevate.updateElevateLSData();
                        self.updateCustomer();
                    }
                }

            }
        });
    });
</script>
