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
                <li ui-sref="secondStep" class="completed">
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
                <form class="col-lg-8 col-12" @submit="deliveryDetailsSubmit">
                    <div>
                        <h1>Delivery Details</h1>
                        <p class="sub mb-4">Delivery only available in Malaysia</p>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <label class="form-label" for="input-name">* Full Name (as per IC/ Passport)</label>
                                <div class="input-group align-items-center">
                                    <input type="text" class="form-control" id="input-name" name="name" v-model="deliveryInfo.name" placeholder="" required />
                                    <!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <label class="form-label" for="input-email">* Email address</label>
                                <div class="input-group align-items-center">
                                    <input type="email" class="form-control" id="input-email" name="email" v-model="deliveryInfo.email" placeholder="jane.doe@gmail.com" required />
                                    <!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                    <p class="info">Email is required for receipt and order confirmation</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <label class="form-label" for="input-emailConfirm">* Confirm email address</label>
                                <div class="input-group align-items-center">
                                    <input type="email" class="form-control" id="input-emailConfirm" name="emailConfirm" v-model="deliveryInfo.emailConfirm" placeholder="" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <label class="form-label" for="input-address">* Address</label>
                                <!-- <a href="#" class="grey-link float-end">Can't find your address?</a> -->
                                <div class="input-group align-items-center">
                                    <input type="text" class="form-control" id="input-address" name="address" v-model="deliveryInfo.address" placeholder="" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <label class="form-label" for="input-addressMore">Apartment, Office, House, Floor number (optional)</label>
                                <div class="input-group align-items-center">
                                    <input type="text" class="form-control" id="input-addressMore" name="addressMore" v-model="deliveryInfo.addressMore" placeholder="" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-2 col-12">
                                <label class="form-label" for="input-postcode">* Postcode</label>
                                <div class="input-group align-items-center">
                                    <input type="text" class="form-control" id="input-postcode" name="postcode" v-model="deliveryInfo.postcode" placeholder="" required />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <label class="form-label" for="select-state">* State</label>
                                <div class="input-group align-items-center">
                                    <select class="form-select" id="select-state" name="state" data-live-search="true" v-model="deliveryInfo.state" @change="watchChangeState" required>
                                        <option value="" selected="selected" disabled="disabled">Select State</option>
                                        <option v-for="state in selectOptions.states" :value="state.value">{{ state.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <label class="form-label">* City</label>
                                <div class="input-group align-items-center">
                                    <select class="form-select" id="select-city" name="city" data-live-search="true" v-model="deliveryInfo.city" :disabled="!allowSelectCity" required>
                                        <option v-for="city in selectOptions.cities" :value="city.value">{{ city.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <label class="form-label" for="textarea-deliveryNotes">Delivery Notes (optional)</label>
                                <div class="input-group align-items-center">
                                    <textarea class="form-control" id="textarea-deliveryNotes" name="deliveryNotes" v-model="deliveryInfo.deliveryNotes" placeholder=""></textarea>
                                    <p class="info">Nearby landmarks or more detailed directions</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <div class="address-accuracy">
                                    <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-red-icon.png" alt="" class="float-start me-3">
                                    <div class="ps-5">
                                        <h1>Address Accuracy</h1>
                                        <p>Addresses that are entered incorrectly may delay your oder, so please double-check for errors. If you wish to enter specific dispatch instructions, please do so under Delivery Notes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input type="submit" class="pink-btn" value="Next: Choose payment method" :disabled="!allowSubmit" />
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
                orderSummary: {
                    plan: {},
                    due: {
                        addOns: 0.00,
                        taxesSST: 0.00,
                        shippingFees: 0.00,
                        total: 0.00
                    }
                },
                selectOptions: {
                    states: [{
                            'stateCode': 'KUL',
                            'value': 'KUALA LUMPUR',
                            'name': 'Wilayah Persekutuan Kuala Lumpur'
                        },
                        {
                            'stateCode': 'PJY',
                            'value': 'PUTRAJAYA',
                            'name': 'Wilayah Persekutuan Putrajaya'
                        },
                        {
                            'stateCode': 'LBN',
                            'value': 'LABUAN',
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
                    cities: [],
                    cityOptions: []
                },
                deliveryInfo: {
                    name: '',
                    email: '',
                    emailConfirm: '',
                    address: '',
                    addressMore: '',
                    postcode: '',
                    state: '',
                    city: '',
                    deliveryNotes: ''
                },
                allowSelectCity: false,
                currentStep: 2,
                allowSubmit: false
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
                        self.updateFields();
                        toggleOverlay(false);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
                updateFields: function() {
                    var self = this;
                    if (ywos.lsData.meta.customerDetails) {
                        self.deliveryInfo = ywos.lsData.meta.customerDetails;
                        self.watchChangeState();
                    }
                },
                getStateCode: function(stateVal) {
                    var self = this;
                    var objState = self.selectOptions.states.filter(state => state.value == stateVal);
                    return objState[0].stateCode;
                },
                watchChangeState: function() {
                    var self = this;
                    if (typeof self.deliveryInfo.state !== 'undefined' && self.deliveryInfo.state.length) {
                        self.ajaxGetCitiesByState(self.deliveryInfo.state);
                    }
                },
                ajaxGetCitiesByState: function(state = null) {
                    var self = this;
                    var stateCode = self.getStateCode(state);
                    
                    self.allowSelectCity = false;
                    setTimeout(function() {
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
                            setTimeout(function() {
                                $('.form-select').selectpicker('refresh');
                                toggleOverlay(false);
                            }, 500);
                        })
                        .catch((error) => {
                            // console.log(error);
                        })
                        .finally(() => {
                            // console.log('finally');
                        });
                },
                deliveryDetailsSubmit: function() {}
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>