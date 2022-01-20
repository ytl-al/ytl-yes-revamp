<?php include('header-ywos.php'); ?>


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
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
                                <h3>RM56.00</h3>
                            </div>
                        </div>
                        <div class="monthly mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <p>Due Monthly</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>RM49.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="large">Kasi Up Postpaid 49</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM49.00</strong></p>
                            </div>
                            <div class="col-6">
                                <p class="large">Add-Ons</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM5.00</strong></p>
                            </div>
                            <div class="col-6">
                                <p class="large">Taxes (SST)</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM2.00</strong></p>
                            </div>
                            <div class="col-6">
                                <p class="large">Shipping</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="large"><strong>RM5.00</strong></p>
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

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {});
    var pageDelivery = new Vue({
        el: '#main-vue',
        data: {
            endpointURL: window.location.origin + '/wp-json/ywos/v1',
            ywosLocalStorageName: 'yesYWOS',
            ywosLocalStorageData: null,
            expiryYWOSCart: 60,
            selectOptions: {
                states: [{
                        'value': 'KL',
                        'name': 'Wilayah Persekutuan Kuala Lumpur'
                    },
                    {
                        'value': 'PUTRAJAYA',
                        'name': 'Wilayah Persekutuan Putrajaya'
                    },
                    {
                        'value': 'LABUAN',
                        'name': 'Wilayah Persekutuan Labuan'
                    },
                    {
                        'value': 'JOHOR',
                        'name': 'Johor'
                    },
                    {
                        'value': 'KEDAH',
                        'name': 'Kedah'
                    },
                    {
                        'value': 'KELANTAN',
                        'name': 'Kelantan'
                    },
                    {
                        'value': 'MELAKA',
                        'name': 'Melaka'
                    },
                    {
                        'value': 'NEGERI SEMBILAN',
                        'name': 'Negeri Sembilan'
                    },
                    {
                        'value': 'PAHANG',
                        'name': 'Pahang'
                    },
                    {
                        'value': 'PULAU PINANG',
                        'name': 'Pulau Pinang'
                    },
                    {
                        'value': 'PERAK',
                        'name': 'Perak'
                    },
                    {
                        'value': 'PERLIS',
                        'name': 'Perlis'
                    },
                    {
                        'value': 'SABAH',
                        'name': 'Sabah'
                    },
                    {
                        'value': 'SARAWAK',
                        'name': 'Sarawak'
                    },
                    {
                        'value': 'SELANGOR',
                        'name': 'Selangor'
                    },
                    {
                        'value': 'TERENGGANU',
                        'name': 'Terengganu'
                    }
                ],
                cities: [],
                cityOptions: [{
                        'state': 'KL',
                        'list': [{
                                'value': 'KUALA LUMPUR',
                                'name': 'Kuala Lumpur'
                            },
                            {
                                'value': 'SUNGAI BESI',
                                'name': 'Sungai Besi'
                            },
                            {
                                'value': 'OTHERS',
                                'name': 'Others'
                            }
                        ]
                    },
                    {
                        'state': 'JOHOR',
                        'list': [{
                                'value': 'AYER BALOI',
                                'name': 'Ayer Baloi'
                            },
                            {
                                'value': 'AYER HITAM',
                                'name': 'Ayer Hitam'
                            },
                            {
                                'value': 'AYER TAWAR',
                                'name': 'Ayer Tawar'
                            },
                            {
                                'value': 'CHAAH',
                                'name': 'Chaah'
                            }
                        ]
                    }
                ]
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
            allowSubmit: false
        },
        mounted: function() {},
        created: function() {
            var self = this;
            self.ywosLocalStorageData = JSON.parse(localStorage.getItem(self.ywosLocalStorageName));
            self.updateFields();
            self.watchChangeState();
        },
        methods: {
            initSelectPicker: function() {
                this.$nextTick(function() {
                    $('.select-picker').selectpicker();
                });
            },
            updateFields: function() {
                var self = this;
                var deliveryInfo = self.deliveryInfo;
                if (self.ywosLocalStorageData.ywosCart.meta.customerDetails) {
                    var customerDetails = self.ywosLocalStorageData.ywosCart.meta.customerDetails;
                    self.deliveryInfo = customerDetails;
                }
            },
            watchChangeState: function() {
                var self = this;
                if (self.deliveryInfo.state.length) {
                    var findCities = self.selectOptions.cityOptions.find(x => x.state == self.deliveryInfo.state);
                    console.log(findCities);
                    if (typeof findCities != 'undefined') {
                        self.selectOptions.cities = findCities.list;
                        self.allowSelectCity = true;
                    } else {
                        self.selectOptions.cities = [];
                        self.allowSelectCity = false
                    }
                } else {
                    self.allowSelectCity = false
                }
            },
            deliveryDetailsSubmit: function() {}
        }
    });
</script>


<?php include('footer-ywos.php'); ?>