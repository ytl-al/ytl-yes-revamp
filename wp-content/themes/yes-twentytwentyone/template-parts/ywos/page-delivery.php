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
                    <span>3. Review</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>4. Payment Info</span>
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
                    <h1>Delivery Details</h1>
                    <p class="sub mb-0">Delivery only available in Malaysia</p>
                </div>
            </div>
            <div class="row gx-5" v-if="pageValid">
                <div class="col-lg-4 col-12 order-lg-2">
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
                            <div class="col-6" v-if="deliveryInfo.securityType == 'PASSPORT' && orderSummary.due.foreignerDeposit > 0">
                                <p class="large">Deposit for Foreigner</p>
                            </div>
                            <div class="col-6 text-end" v-if="deliveryInfo.securityType == 'PASSPORT' && orderSummary.due.foreignerDeposit > 0">
                                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.foreignerDeposit).toFixed(2) }}</strong></p>
                            </div>
                            <div class="col-6">
                                <p class="large">Rounding Adjustment</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.rounding).toFixed(2) }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="summary-box mt-3" v-if="referralCode.applicable">
                        <div class="row">
                            <div class="col">
                                <div class="referral-box">
                                    <input type="text" class="form-control referral" id="input-referralCode" v-model="referralCode.code" placeholder="Enter referral code (if any)" />
                                    <img src="/wp-content/uploads/2022/02/referral-tick.png" class="referral-check" v-if="referralCode.verified" />
                                </div>
                                <div class="invalid-feedback mt-1" id="em-referralCode"></div>
                                <div class="valid-feedback mt-1" id="sm-referralCode"></div>
                                <button type="button" class="btn-sm pink-btn mt-2 w-100" v-on:click="verifyReferralCode">Verify Referral Code</button>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="col-lg-8 col-12 order-lg-1 mt-4 mt-lg-0" @submit="deliveryDetailsSubmit">
                    <div class="row gx-5">
                        <div class="col-lg-6">
                            <div class="layer-delivery">
                                <div class="d-none d-lg-block">
                                    <h1>Delivery Details</h1>
                                    <p class="sub mb-4">Delivery only available in Malaysia</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label" for="input-name">* Full Name (as per IC/ Passport)</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="input-name" name="name" v-model="deliveryInfo.name" @input="watchAllowNext" placeholder="" required />
                                        <!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-name"></div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="input-email">* Email address</label>
                                    <div class="input-group align-items-center">
                                        <input type="email" class="form-control" id="input-email" name="email" v-model="deliveryInfo.email" @input="watchAllowNext" placeholder="jane.doe@gmail.com" required />
                                        <!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                        <p class="info">Email is required for receipt and order confirmation</p>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-email"></div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="input-emailConfirm">* Confirm email address</label>
                                    <div class="input-group align-items-center">
                                        <input type="email" class="form-control" id="input-emailConfirm" name="emailConfirm" v-model="deliveryInfo.emailConfirm" @input="watchAllowNext" placeholder="" required />
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-emailConfirm"></div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="input-address">* Address</label>
                                    <!-- <a href="#" class="grey-link float-end">Can't find your address?</a> -->
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="input-address" name="address" v-model="deliveryInfo.address" @input="watchAllowNext" placeholder="" required />
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-address"></div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="input-addressMore">Apartment, Office, House, Floor number (optional)</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="input-addressMore" name="addressMore" v-model="deliveryInfo.addressMore" placeholder="" />
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-addressMore"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-4">
                                            <label class="form-label" for="input-postcode">* Postcode</label>
                                            <div class="input-group align-items-center">
                                                <input type="text" class="form-control" id="input-postcode" name="postcode" v-model="deliveryInfo.postcode" @input="watchAllowNext" placeholder="" required />
                                            </div>
                                            <div class="invalid-feedback mt-1" id="em-postcode"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group mb-4">
                                            <label class="form-label" for="select-state">* State</label>
                                            <div class="input-group align-items-center">
                                                <select class="form-select" id="select-state" name="state" data-live-search="true" v-model="deliveryInfo.state" @change="watchChangeState" required>
                                                    <option value="" selected="selected" disabled="disabled">Select State</option>
                                                    <option v-for="state in selectOptions.states" :value="state.value">{{ state.name }}</option>
                                                </select>
                                            </div>
                                            <div class="invalid-feedback mt-1" id="em-state"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label">* City</label>
                                    <div class="input-group align-items-center">
                                        <select class="form-select" id="select-city" name="city" data-live-search="true" v-model="deliveryInfo.city" @change="watchAllowNext" :disabled="!allowSelectCity" required>
                                            <option v-for="city in selectOptions.cities" :value="city.value">{{ city.name }}</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-city"></div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="textarea-deliveryNotes">Delivery Notes (optional)</label>
                                    <div class="input-group align-items-center">
                                        <textarea class="form-control" id="textarea-deliveryNotes" name="deliveryNotes" v-model="deliveryInfo.deliveryNotes" placeholder=""></textarea>
                                        <p class="info">Nearby landmarks or more detailed directions</p>
                                    </div>
                                    <div class="invalid-feedback mt-1" id="em-deliveryNotes"></div>
                                </div>
                                <div class="address-accuracy mb-4">
                                    <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-red-icon.png" alt="" class="float-start me-3">
                                    <div class="ps-5">
                                        <h1>Address Accuracy</h1>
                                        <p>Addresses that are entered incorrectly may delay your oder, so please double-check for errors. If you wish to enter specific dispatch instructions, please do so under Delivery Notes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="layer-billing d-none">
                                <h2 style="color: #282828; font-size: 29px; font-weight: 800; margin-bottom: 0;">Billing</h2>
                                <div class="form-group mb-4" style="color: 525252; font-size: 17px;">
                                    <!-- <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="input-billingDifferent" role="switch" v-model="isBillingDifferent" @change="watchBillingDifferent" />
                                        <label class="form-check-label" for="input-billingDifferent">Same as shipping address</label>
                                    </div> -->
                                </div>

                                <div class="layer-billingFieldset" v-if="isBillingDifferent">
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="input-name">* Full Name (as per IC/ Passport)</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="input-name" name="name" v-model="billingInfo.name" :disabled="!isBillingDifferent" placeholder="" required />
                                            <!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="input-email">* Email address</label>
                                        <div class="input-group align-items-center">
                                            <input type="email" class="form-control" id="input-email" name="email" v-model="billingInfo.email" :disabled="!isBillingDifferent" placeholder="jane.doe@gmail.com" required />
                                            <!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                                            <p class="info">Email is required for receipt and order confirmation</p>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="input-emailConfirm">* Confirm email address</label>
                                        <div class="input-group align-items-center">
                                            <input type="email" class="form-control" id="input-emailConfirm" name="emailConfirm" v-model="billingInfo.emailConfirm" :disabled="!isBillingDifferent" placeholder="" required />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="input-address">* Address</label>
                                        <!-- <a href="#" class="grey-link float-end">Can't find your address?</a> -->
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="input-address" name="address" v-model="billingInfo.address" :disabled="!isBillingDifferent" placeholder="" required />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="input-addressMore">Apartment, Office, House, Floor number (optional)</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="input-addressMore" name="addressMore" v-model="billingInfo.addressMore" :disabled="!isBillingDifferent" placeholder="" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-4">
                                                <label class="form-label" for="input-postcode">* Postcode</label>
                                                <div class="input-group align-items-center">
                                                    <input type="text" class="form-control" id="input-postcode" name="postcode" v-model="billingInfo.postcode" :disabled="!isBillingDifferent" placeholder="" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group mb-4">
                                                <label class="form-label" for="select-state">* State</label>
                                                <div class="input-group align-items-center">
                                                    <select class="form-select" id="select-state" name="state" data-live-search="true" v-model="billingInfo.state" @change="watchChangeState" required>
                                                        <option value="" selected="selected" disabled="disabled">Select State</option>
                                                        <option v-for="state in selectOptions.states" :value="state.value">{{ state.name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label">* City</label>
                                        <div class="input-group align-items-center">
                                            <select class="form-select" id="select-city" name="city" data-live-search="true" v-model="billingInfo.city" :disabled="!allowSelectCity" required>
                                                <option v-for="city in selectOptions.cities" :value="city.value">{{ city.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <input type="submit" class="pink-btn" value="Next: Review & Pay" :disabled="!allowSubmit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Body ENDS -->

    <div class="modal fade" id="modal-referralAlert" tabindex="-1" aria-labelledby="modal-referralAlert" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Referral Code</h5>
                </div>
                <div class="modal-body text-center">
                    <p>Would you like to continue without a referral code?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" v-on:click="alertReferral">No</button>
                    <button type="button" class="btn btn-primary" v-on:click="alertReferral(false)">Proceed without referral code</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-referralEmptyAlert" tabindex="-1" aria-labelledby="modal-referralAlert" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Referral Code</h5>
                </div>
                <div class="modal-body text-center">
                    <p>Please verify the referral code</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" v-on:click="alertReferral">Ok</button>
                    <button type="button" class="btn btn-primary" v-on:click="alertReferral(false)">Proceed without referral code</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-errorEligibilityCheck" tabindex="-1" aria-labelledby="modal-errorEligibilityCheck" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eligibility Check</h5>
                </div>
                <div class="modal-body text-center">
                    <p class="panel-errMsg"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vue Wrapper ENDS -->

<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                currentStep: 2,
                pageValid: false, 
                isBillingDifferent: false,
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
                selectOptions: {
                    states: [{
                            'stateCode': 'KUL',
                            'value': 'WILAYAH PERSEKUTUAN-KUALA LUMPUR',
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
                    cities: [] 
                },
                customerDetails: {}, 
                deliveryInfo: {
                    name: '',
                    email: '',
                    emailConfirm: '',
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
                referralCode: {
                    applicable: false, 
                    code: '', 
                    alert: false, 
                    toUse: false,
                    verified: false 
                }, 
                input: {
                    name: { field: '#input-name', errorMessage: '#em-name' }, 
                    email: { field: '#input-email', errorMessage: '#em-email' }, 
                    emailConfirm: { field: '#input-emailConfirm', errorMessage: '#em-emailConfirm' }, 
                    address: { field: '#input-address', errorMessage: '#em-address' }, 
                    addressMore: { field: '#input-addressMore', errorMessage: '#em-addressMore' }, 
                    postcode: { field: '#input-postcode', errorMessage: '#em-postcode' }, 
                    state: { field: '#select-state', errorMessage: '#em-state' }, 
                    city: { field: '#select-city', errorMessage: '#em-city' }, 
                    deliveryNotes: { field: '#textarea-deliveryNotes', errorMessage: '#em-deliveryNotes' }, 
                    referralCode: { field: '#input-referralCode', errorMessage: '#em-referralCode', successMessage: '#sm-referralCode' }
                },
                billingInfo: {
                    name: '',
                    email: '',
                    emailConfirm: '',
                    address: '',
                    addressMore: '',
                    postcode: '',
                    state: '',
                    city: '',
                },
                allowSelectCity: false,
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
                        self.pageValid = true;
                        self.orderSummary = ywos.lsData.meta.orderSummary;
                        self.updateFields();
                        toggleOverlay(false);

                        setTimeout(function() {
                            $('.form-select').selectpicker('refresh');
                        }, 100);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
                updateFields: function() {
                    var self = this;
                    var deliveryInfo = ywos.lsData.meta.deliveryInfo;
                    var customerDetails = ywos.lsData.meta.customerDetails;
                    if (deliveryInfo) {
                        Object.keys(deliveryInfo).map(function(key) {
                            self.deliveryInfo[key] = deliveryInfo[key];
                        });
                        self.watchChangeState();
                    } else if (customerDetails) {
                        Object.keys(customerDetails).map(function(key) {
                            self.deliveryInfo[key] = customerDetails[key];
                        });
                        self.deliveryInfo.emailConfirm = '';
                        self.watchChangeState();
                    }
                    self.deliveryInfo.stateCode = (self.deliveryInfo.state) ? self.getStateCode(self.deliveryInfo.state) : '';
                    self.deliveryInfo.cityCode = self.deliveryInfo.city;
                    self.deliveryInfo.country = 'MALAYSIA';
                    
                    self.referralCode.applicable = (self.orderSummary.plan.referralApplicable) ? true : false;

                    if (ywos.lsData.meta.referralCode) {
                        self.referralCode.code = ywos.lsData.meta.referralCode.referral_code;
                        self.referralCode.alert = true;
                        self.referralCode.toUse = true;
                        self.referralCode.verified = true;

                        var smReferralCode = self.input.referralCode.successMessage;
                        setTimeout(function() {
                            $(smReferralCode).html('Referral code applied successfully.').show();
                        }, 300);
                    }
                },
                getStateCode: function(stateVal) {
                    var self = this;
                    var objState = self.selectOptions.states.filter(state => state.value == stateVal);
                    return objState[0].stateCode;
                },
                ajaxGetCitiesByState: function(state = null) {
                    var self = this;
                    var stateCode = self.getStateCode(state);
                    
                    toggleOverlay();

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
                                    name: value.masterValue,

                                });
                            })
                            self.selectOptions.cities = options;
                            self.allowSelectCity = true;
                            
                            var objCity = self.selectOptions.cities.filter(city => city.value == self.deliveryInfo.city);
                            if (objCity.length == 0) {
                                self.deliveryInfo.city = '';
                                self.deliveryInfo.cityCode = '';
                            }

                            setTimeout(function() {
                                $('.form-select').selectpicker('refresh');
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
                validateConfirmEmail: function() {
                    var self = this;
                    if (self.deliveryInfo.email != self.deliveryInfo.emailConfirm) {
                        var inputEmailConfirm = self.input.emailConfirm.field;
                        var emEmailConfirm = self.input.emailConfirm.errorMessage;
                        $(emEmailConfirm).html('Confirm email address must be same as Email address.').show();
                        $(inputEmailConfirm).focus();
                        $(inputEmailConfirm).on('keydown', function() { $(emEmailConfirm).hide().html(''); });

                        return false;
                    }
                    return true;
                },
                checkReferralCode: function() {
                    var self = this;
                    if (!self.referralCode.alert) {
                        $('#modal-referralAlert').modal('show');
                        return false;
                    } else if (self.referralCode.toUse && self.referralCode.code.trim() == '') {
                        $('#modal-referralEmptyAlert').modal('show');
                        return false;
                    } else if (self.referralCode.toUse && !self.referralCode.verified) {
                        $('#modal-referralEmptyAlert').modal('show');
                        return false;
                    }
                    return true;
                }, 
                validateReferralCodeField: function(errorMsg = '') {
                    var self = this;
                    var inputReferralCode = self.input.referralCode.field;
                    var emReferralCode = self.input.referralCode.errorMessage;
                    var smReferralCode = self.input.referralCode.successMessage;
                    $(smReferralCode).html('').hide();
                    $(emReferralCode).html(errorMsg).show();
                    $(inputReferralCode).focus();
                    $(inputReferralCode).on('keydown', function() { $(emReferralCode).hide().html(''); });
                }, 
                ajaxVerifyReferralCode: function() {
                    var self = this;
                    $(self.input.referralCode.errorMessage).hide().html('');

                    var params = {
                        'referral_code': self.referralCode.code, 
                        'security_type': self.deliveryInfo.securityType,
                        'security_id': self.deliveryInfo.securityId
                    };
                    axios.post(apiEndpointURL + '/verify-referral-code', params)
                        .then((response) => {
                            self.referralCode.verified = true;
                            ywos.lsData.meta.referralCode = params;

                            var data = response.data;
                            var successMsg = data.displayResponseMessage;
                            var smReferralCode = self.input.referralCode.successMessage;
                            $(smReferralCode).html(successMsg).show();
                        })
                        .catch((error) => {
                            var response = error.response;
                            var data = response.data;
                            var errorMsg = '';
                            if (error.response.status == 500 || error.response.status == 503) {
                                errorMsg = "<p>There's an error in verifying the referral code.</p>";
                            } else {
                                errorMsg = data.message
                            }

                            self.validateReferralCodeField(errorMsg);
                        })
                        .finally(() => {
                            toggleOverlay(false);
                        });
                },
                verifyReferralCode: function() {
                    var self = this;
                    self.referralCode.alert = true;
                    self.referralCode.toUse = true;

                    toggleOverlay();
                    if (self.deliveryInfo.securityType == '' || self.deliveryInfo.securityId == '') {
                        self.validateReferralCodeField('Please verify your identity in verification page.');
                        toggleOverlay(false);
                    } else if (self.referralCode.code.trim() == '') {
                        self.validateReferralCodeField('Please fill in the referral code.');
                        toggleOverlay(false);
                    } else {
                        self.ajaxVerifyReferralCode();
                    }
                }, 
                alertReferral: function(useReferral = true) {
                    var self = this;
                    $('#modal-referralAlert, #modal-referralEmptyAlert').modal('hide');

                    if (useReferral) {
                        $(self.input.referralCode.field).focus();
                        self.referralCode.toUse = true;
                    } else {
                        self.referralCode.toUse = false;
                        self.ajaxValidateCustomerEligibility();
                    }
                    self.referralCode.alert = true;
                },
                sanitizeDeliveryInfo: function() {
                    var self = this;
                    self.deliveryInfo.sanitize = {
                        address: self.deliveryInfo.address.toCamelCase(),
                        addressMore: self.deliveryInfo.addressMore.toCamelCase(), 
                        addressLine: (self.deliveryInfo.addressMore) ? self.deliveryInfo.address + '<br />' + self.deliveryInfo.addressMore : self.deliveryInfo.address,
                        state: self.deliveryInfo.state.replace('-', ' ').toCamelCase(), 
                        city: self.deliveryInfo.city.toCamelCase(), 
                        country: self.deliveryInfo.country.toCamelCase()
                    };
                }, 
                redirectVerified: function() {
                    var self = this;

                    self.sanitizeDeliveryInfo();

                    self.deliveryInfo.referralCode = self.referralCode.code;

                    ywos.lsData.meta.completedStep = self.currentStep;
                    ywos.lsData.meta.deliveryInfo = self.deliveryInfo;
                    ywos.updateYWOSLSData();

                    ywos.redirectToPage('review');
                },
                ajaxValidateCustomerEligibility: function() {
                    toggleOverlay();

                    var self = this;
                    var params = {
                        'phone_number': self.deliveryInfo.msisdn, 
                        'customer_name': self.deliveryInfo.name,
                        'email': self.deliveryInfo.email, 
                        'security_type': self.deliveryInfo.securityType, 
                        'security_id': self.deliveryInfo.securityId, 
                        'address_line': self.deliveryInfo.address + ' ' + self.deliveryInfo.addressMore, 
                        'state': self.deliveryInfo.state, 
                        'state_code': self.getStateCode(self.deliveryInfo.state),
                        'city': self.deliveryInfo.city, 
                        'city_code': self.deliveryInfo.city, 
                        'postal_code': self.deliveryInfo.postcode, 
                        'country': self.deliveryInfo.country, 
                        'plan_bundle_id': self.orderSummary.plan.mobilePlanId, 
                        'plan_type': self.orderSummary.plan.planType, 
                        'plan_name': self.orderSummary.plan.planName 
                    };
                    axios.post(apiEndpointURL + '/validate-customer-eligibilities', params)
                        .then((response) => {
                            self.redirectVerified()
                        })
                        .catch((error) => {
                            toggleOverlay(false);

                            var response = error.response;
                            var data = response.data;
                            var errorMsg = '';
                            if (error.response.status == 500 || error.response.status == 503) {
                                errorMsg = "<p>There's an error in validating your eligibility.</p>";
                            } else {
                                errorMsg = data.message
                            }
                            errorMsg += '<br /> Please verify your identity and phone number in verification page.';
                            $('#modal-errorEligibilityCheck .panel-errMsg').html(errorMsg);
                            $('#modal-errorEligibilityCheck').modal('show');
                        })
                        .finally(() => {
                        });
                }, 
                checkCustomerEligibility: function() {
                    var self = this;
                    self.ajaxValidateCustomerEligibility();
                }, 
                deliveryDetailsSubmit: function(e) {
                    var self = this;
                    var validSubmit = true;

                    if (!self.validateConfirmEmail()) {
                        validSubmit = false;
                    }
                    if (validSubmit) {
                        if (self.referralCode.applicable) {
                            if (self.checkReferralCode()) {
                                self.checkCustomerEligibility();
                            }
                        } else {
                            self.checkCustomerEligibility();
                        }
                    }
                    e.preventDefault();
                },
                watchChangeState: function() {
                    var self = this;
                    if (typeof self.deliveryInfo.state !== 'undefined' && self.deliveryInfo.state.length) {
                        self.ajaxGetCitiesByState(self.deliveryInfo.state);
                    }
                },
                watchAllowNext: function() {
                    var self = this;
                    var isFilled = true;
                    
                    if (
                        self.deliveryInfo.name.trim() == '' ||
                        self.deliveryInfo.email.trim() == '' ||
                        self.deliveryInfo.emailConfirm.trim() == '' ||
                        self.deliveryInfo.address.trim() == '' ||
                        self.deliveryInfo.postcode.trim() == '' ||
                        self.deliveryInfo.state.trim() == '' ||
                        (typeof self.deliveryInfo.city == 'undefined' || self.deliveryInfo.city.trim() == '')
                    ) {
                        isFilled = false;
                    }

                    if (isFilled) {
                        self.allowSubmit = true;
                    } else {
                        self.allowSubmit = false;
                    }
                },
                watchBillingDifferent: function() {},
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>