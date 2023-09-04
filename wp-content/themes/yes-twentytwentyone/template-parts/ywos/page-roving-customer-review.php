<?php include('header-no-menu.php'); ?>

<style type="text/css">
    #cart-body .packagebox .visualbg .img-fluid {
        padding-left: 12px;
    }

    .nav-container {
        background-color: #1A1E47;
    }

    .nav-container .navbar {
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .nav-container .navbar-brand {
        padding-top: 0;
        padding-bottom: 0;
    }

    .nav-container a,
    .nav-container .login-btn {}

    .logo-top {
        width: 35px;
    }
</style>


<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. {{ renderText('strReview') }}</span>
                </li>
                <li ui-sref="secondStep">
                    <span>2. {{ renderText('strPayment') }}</span>
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
                    <h1>{{ renderText('strReviewPay') }}</h1>
                </div>
            </div>
            <div class="row gx-5" v-if="pageValid">
                <div class="col-lg-4 col-12 order-lg-2">
                    <?php include('section-order-summary.php'); ?>
                </div>
                <div class="col-lg-8 col-12 order-lg-1 mt-3 mt-lg-0">
                    <h1 class="mb-4 d-none d-lg-block">{{ renderText('strReviewPay') }}</h1>
                    <div class="accordion" id="cart-accordion">
                        <div class="packagebox mb-3">
                            <div class="row">
                                <div class="col-lg-3 col-12 visualbg d-flex align-items-center"
                                    v-if="orderSummary.plan.planType == 'postpaid'">
                                    <img src="/wp-content/uploads/2022/06/ft5g-cart-visual.png" class="img-fluid"
                                        alt="" />
                                </div>
                                <div class="col-lg-3 col-12 visualbg prepaid d-flex align-items-center"
                                    v-if="orderSummary.plan.planType == 'prepaid'">
                                    <img src="/wp-content/uploads/2022/06/ft5g-cart-visual.png" class="img-fluid"
                                        alt="" />
                                </div>
                                <div class="col-lg-6 col-12 pt-lg-4 pb-1 px-4 px-lg-5 ps-lg-4">
                                    <h3 class="mt-3 mt-lg-0">{{ orderSummary.plan.displayName }}</h3>
                                    <p class="mb-3" v-if="orderSummary.plan.internetData">RM{{
                                        parseFloat(orderSummary.plan.totalAmount).toFixed(0) }} for {{
                                        orderSummary.plan.internetData }}</p>
                                    <div class="package-info" v-if="packageInfos.length">
                                        <div class="row">
                                            <div class="col-6 mb-3"
                                                v-for="(packageInfo, index) in packageInfos.slice(0, 4)">
                                                <span class="span-checkList">{{ packageInfo }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12 mt-3 mb-3 mt-lg-0 mb-lg-0 d-flex align-items-center justify-content-lg-end justify-content-center">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h3 class="price">RM{{ (orderSummary.plan.totalAmount % 1 != 0) ? parseFloat(orderSummary.plan.totalAmount).toFixed(2) : formatPrice(parseFloat(orderSummary.plan.totalAmount)) }}</h3>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#cart-accordion">
                            <div class="accordion-body">
                                <div v-if="packageInfos.slice(4).length">
                                    <h1>{{ renderText('summaryMoreBenefits') }}</h1>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 mb-3"
                                            v-for="(packageInfo, index) in packageInfos.slice(4)"><span
                                                class="span-itemList">{{ packageInfo }}</span></div>
                                    </div>
                                </div>

                                <h1>{{ renderText('summaryOneTimeCharges') }}</h1>
                                <h2>{{ renderText('summaryRatePlan') }}</h2>

                                <template v-for="(price) in orderSummary.due.priceBreakdown.plan">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>{{ price.name }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ price.value }}</p>
                                        </div>
                                    </div>
                                </template>
                                <div class="mt-2 pt-2 border-top pb-2 border-bottom"
                                    v-if="orderSummary.plan.bundleName || orderSummary.plan.hasDevice">
                                    <p class="bold mb-0" v-if="orderSummary.plan.bundleName">Device Bundle: <span
                                            class="fw-bold">{{ orderSummary.plan.bundleName }}</span></p>
                                    <template v-for="(price, index) in orderSummary.due.priceBreakdown.device">
                                        <div class="row">
                                            <div class="col-6">
                                                <p>{{ price.name }}</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p>RM{{ price.value }}</p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div class="row mb-3 mt-5">
                                    <div class="col-6 pb-1 border-bottom">
                                        <p>{{ renderText('summaryAddOns') }}</p>
                                        <p v-if="orderSummary.addOn != null">{{ orderSummary.addOn.displayAddonName }} <a href="javascript:void(0)" class="btn-sm pink-btn text-white mx-lg-3" v-on:click="removeAddOn()">Remove</a></p>
                                    </div>
                                    <div class="col-6 pb-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.addOns).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>{{ renderText('summaryTaxes') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.taxesSST).toFixed(2) }}</p>
                                    </div>
                                    <div v-if="(ywos?.lsData?.meta?.customerDetails?.upFrontPayment=='!true')">
                                        <div class="col-6 pb-1 pt-1 border-bottom" v-if="orderSummary.due.foreignerDeposit > 0">
                                            <p>{{ renderText('summaryForeignerDeposit') }}</p>
                                        </div>
                                        <div class="col-6 pb-1 pt-1 border-bottom text-end"
                                            v-if="orderSummary.due.foreignerDeposit > 0">
                                            <p>RM{{ parseFloat(orderSummary.due.foreignerDeposit).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>{{ renderText('summaryShipping') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.shippingFees).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>{{ renderText('summaryRounding') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.rounding).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="fw-bold">{{ renderText('summaryTotalDue') }}</p>
                                        <p class="small d-none">{{ renderText('summaryNotInvoice') }}</p>
                                    </div>
                                    <div class="col-6 text-end" v-if="(ywos?.lsData?.meta?.customerDetails?.upFrontPayment=='true')">
                                        <p class="large">RM{{
                                            formatPrice(parseFloat((orderSummary.due.total)-(orderSummary.due.foreignerDeposit)).toFixed(2))
                                            }}</p>
                                    </div>
                                    <div class="col-6 text-end" v-else>
                                        <p class="large">RM{{ formatPrice(parseFloat(orderSummary.due.total).toFixed(2))
                                            }}</p>
                                    </div>
                                </div>
                                <div v-if="orderSummary.plan.planType != 'prepaid'">
                                    <h1>{{ renderText('summaryMonthlyCharges') }}</h1>
                                    <h2>{{ renderText('summaryRatePlan') }}</h2>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p>{{ orderSummary.plan.displayName }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-3" v-if="orderSummary.plan.supplementaryBundlePlans && orderSummary.plan.supplementaryBundlePlans.length">
                                        <h4 style="font-size: 16px; font-weight: 700;">{{ renderText('summarySupplimentaryBundleLines') }}</h4>
                                        <div class="row mb-0" v-for="(subPlan) in orderSummary.plan.supplementaryBundlePlans">
                                            <div class="col-6">
                                                <p class="mb-0 ps-2">{{ subPlan.planName }}</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="mb-0">RM{{ parseFloat(subPlan.planPrice).toFixed(2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="bold">{{ renderText('summaryTotalMonthly') }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="bold">RM{{
                                                parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3 text-end order-2">
                            <!-- <a href="javascript:void(0)" class="grey-link" style="text-decoration: none;" v-on:click="ywos.redirectToPage('delivery')">(<u>Edit</u>)</a> -->
                        </div>
                        <div class="col-9 order-1">
                            <p class="mb-3"><strong>{{ renderText('strTo') }}: {{ deliveryInfo.name }}</strong><br> {{
                                deliveryInfo.email }}<br> +60 {{ deliveryInfo.mobileNumber }}</p>
                            <p><strong>{{ renderText('strShippingAddress') }}</strong><br> {{
                                deliveryInfo.sanitize.address }} <br /><template v-if="deliveryInfo.sanitize.addressMore">{{ deliveryInfo.sanitize.addressMore }}
                                    <br /></template>{{ deliveryInfo.postcode }}, {{ deliveryInfo.sanitize.city }}
                                <br />{{ deliveryInfo.sanitize.state }} <br /> {{ deliveryInfo.sanitize.country }}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <div class="col-9">
                            <p><strong>Billing Address</strong><br> 111, Menara YTL, Jalan Bukit<br> Bintang, Kuala
                                Lumpur, 58000,<br> Malaysia</p>
                        </div>
                        <div class="col-3 text-end">
                            <a href="#" class="grey-link">(Edit)</a>
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <div class="col-9">
                            <p><strong>Cardholder: Jane Doe</strong><br> Card Type: Visa that ends in ****4567</p>
                        </div>
                        <div class="col-3 text-end">
                            <a href="#" class="grey-link">(Edit)</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" v-model="agree.terms"
                                    id="checkbox-terms" @change="watchSubmit" />
                                <label class="form-check-label" for="checkbox-terms"
                                    v-html="renderText('strAgreeTerms')"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" v-model="agree.privacy"
                                    id="checkbox-privacy" @change="watchSubmit" />
                                <label class="form-check-label" for="checkbox-privacy"
                                    v-html="renderText('strAgreePrivacy')"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-12">
                            <button class="pink-btn d-block w-100" type="submit" v-on:click="validateReview"
                                :disabled="!allowSubmit">{{ renderText('strBtnPayNow') }}</button>
                            <!-- <a href="checkout-payment.html" class="pink-btn d-block w-100">Pay Now</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Body ENDS -->
</div>
<!-- Vue Wrapper ENDS -->
<div class="modal fade" id="modal-alert" tabindex="-1" aria-labelledby="modal-alert" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="modal-titleLabel"></h5>
            </div>
            <div class="modal-body text-center">
                <p id="modal-bodyText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="location.href = '/'" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        toggleOverlay();

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                currentStep: 4,
                simType: '',
                StagingOrderNumber: '',
                upFrontPayment: false,
                eSimSupportPlan: '',
                pageValid: false,
                ywos: null,
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
                customerDetails: {
                    securityType: '',
                    securityId: '',
                    msisdn: '',
                    upFrontPayment: false
                },
                planID: null,
                deliveryInfo: {
                    name: '',
                    email: '',
                    emailConfirm: '',
                    address: '',
                    addressMore: '',
                    addressLine: '',
                    postcode: '',
                    state: '',
                    city: '',
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
                dealer: {},
                packageInfos: [],
                slicedMobileNumber: '',
                agree: {
                    terms: false,
                    privacy: false
                },
                allowSubmit: false,

                apiLocale: 'EN',
                pageText: {
                    strVerification: {
                        'en-US': 'Verification',
                        'ms-MY': 'Pengesahan',
                        'zh-hans': 'Verification'
                    },
                    strSelectSimType: {
                        'en-US': 'Select Sim Type',
                        'ms-MY': 'Select Sim Type',
                        'zh-hans': 'Select Sim Type'
                    },

                    strDelivery: {
                        'en-US': 'Delivery Details',
                        'ms-MY': 'Butiran Penghantaran',
                        'zh-hans': 'Delivery Details'
                    },
                    strDeliveryBilling: {
                        'en-US': 'Billing Details',
                        'ms-MY': 'Billing Details',
                        'zh-hans': 'Billing Details'
                    },
                    strReview: {
                        'en-US': 'Review',
                        'ms-MY': 'Semak',
                        'zh-hans': 'Review'
                    },
                    strPayment: {
                        'en-US': 'Payment Info',
                        'ms-MY': 'Maklumat Pembayaran',
                        'zh-hans': 'Payment Info'
                    },

                    strReviewPay: {
                        'en-US': 'Review & Pay',
                        'ms-MY': 'Semak & Bayar',
                        'zh-hans': 'Review & Pay'
                    },

                    summaryMoreBenefits: {
                        'en-US': 'More Benefits',
                        'ms-MY': 'Lebih Manfaat',
                        'zh-hans': 'More Benefits'
                    },
                    summaryOneTimeCharges: {
                        'en-US': 'Total Payable Now',
                        'ms-MY': 'Jumlah Perlu Dibayar Sekarang',
                        'zh-hans': 'Total Payable Now'
                    },
                    summaryRatePlan: {
                        'en-US': 'Rate plan',
                        'ms-MY': 'Kadar pelan',
                        'zh-hans': 'Rate plan'
                    },
                    summaryAddOns: {
                        'en-US': 'Add-Ons',
                        'ms-MY': 'Tambahan',
                        'zh-hans': 'Add-Ons'
                    },
                    summaryTaxes: {
                        'en-US': 'SST @6%',
                        'ms-MY': 'SST @6%',
                        'zh-hans': 'SST @6%'
                    },
                    summaryForeignerDeposit: {
                        'en-US': 'Deposit for Foreigner',
                        'ms-MY': 'Deposit Warga Asing',
                        'zh-hans': 'Deposit for Foreigner'
                    },
                    summaryShipping: {
                        'en-US': 'Delivery Fee',
                        'ms-MY': 'Caj Penghantaran',
                        'zh-hans': 'Delivery Fee'
                    },
                    summaryRounding: {
                        'en-US': 'Rounding Adjustment',
                        'ms-MY': 'Penyelarasan Pembundaran',
                        'zh-hans': 'Rounding Adjustment'
                    },
                    summaryTotalDue: {
                        'en-US': 'Total charges due now',
                        'ms-MY': 'Jumlah perlu dibayar sekarang',
                        'zh-hans': 'Total charges due now'
                    },
                    summaryNotInvoice: {
                        'en-US': 'This summary is not an invoice',
                        'ms-MY': 'Ringkasan ini bukanlah invois',
                        'zh-hans': 'This summary is not an invoice'
                    },
                    summaryMonthlyCharges: {
                        'en-US': 'Monthly Charges',
                        'ms-MY': 'Caj Bulanan',
                        'zh-hans': 'Monthly Charges'
                    },
                    summarySupplimentaryBundleLines: {
                        'en-US': 'Supplementary Bundled Lines',
                        'ms-MY': 'Talian Tambahan Bundle',
                        'zh-hans': 'Supplementary Bundled Lines'
                    },
                    summaryTotalMonthly: {
                        'en-US': 'Total monthly charges',
                        'ms-MY': 'Jumlah caj bulanan',
                        'zh-hans': 'Total monthly charges'
                    },

                    strTo: {
                        'en-US': 'To',
                        'ms-MY': 'Ke',
                        'zh-hans': 'To'
                    },
                    strShippingAddress: {
                        'en-US': 'Shipping Address',
                        'ms-MY': 'Alamat Penghantaran',
                        'zh-hans': 'Shipping Address'
                    },
                    strAgreeTerms: {
                        'en-US': 'I hereby agree to subscribe to the Postpaid/Prepaid Service Plan selected in the online form submitted by me, and to be bound by the terms and conditions available at <a href="/tnc/general-tnc" target="_blank">www.yes.my/tnc/general-tnc</a>.',
                        'ms-MY': 'Saya dengan ini bersetuju untuk melanggan pilihan Pelan Perkhidmatan Pascabayar/Prabayar dalam borang dalam talian yang saya hantar, dan akan terikat dengan terma dan syarat terkandung di <a href="/ms/tnc/general-tnc" target="_blank">www.yes.my/tnc/general-tnc</a>.',
                        'zh-hans': 'I hereby agree to subscribe to the Postpaid/Prepaid Service Plan selected in the online form submitted by me, and to be bound by the terms and conditions available at <a href="/zh-hans/tnc/general-tnc" target="_blank">www.yes.my/tnc/general-tnc</a>.'
                    },
                    strAgreePrivacy: {
                        'en-US': 'I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a>.',
                        'ms-MY': 'Saya selanjutnya memberi kebenaran kepada YTLC untuk memproses data peribadi saya mengikut Polisi Privasi Kumpulan YTL yang terkandung di <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a>.',
                        'zh-hans': 'I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a>.'
                    },

                    strBtnPayNow: {
                        'en-US': 'Next',
                        'ms-MY': 'Next',
                        'zh-hans': 'Next'
                    },
                    modalCreateStagingError: {
                        'en-US': 'Invalid Order Id',
                        'ms-MY': 'Invalid Order Id',
                        'zh-hans': 'Invalid Order Id'
                    },
                }
            },
            mounted: function () { },
            created: function () {
                var self = this;
                setTimeout(function() {
                    // self.pageInit();
                    self.validateStagingOrder();
                }, 500);
            },
            methods: {
                validateStagingOrder: function() {
                    var self = this;
                    self.ajaxValidateStagingOrder();
                },
                ajaxValidateStagingOrder: function() {
                    var self = this;
                    // var currentUrl = window.location.href;
                    // var parsedUrl = new URL(currentUrl);
                    // var orderId = parsedUrl.searchParams.get('orderId');
                    // console.log(parsedUrl);

                    var currentUrl = window.location.href;
                var parsedUrl = new URL(currentUrl);
                var orderIdRaw = parsedUrl.search;
                var orderId = orderIdRaw.split('=')[1];
                // console.log(orderId);
                    // return false;
                    var params = {
                        'encStagingOrderNumber': orderId !== null ? orderId : null,
                        'locale': self.apiLocale,
                        'source': 'YOS'
                    };

                    axios.post(apiEndpointURL + '/validate-ywos-roving-order' + '?nonce=' + yesObj.nonce, params)
                        .then((response) => {
                            var data = response.data;
                             var inputDate = data.dob; // Replace with your date
                            // Split the input date into parts
                            var parts = inputDate.split("-");
                            // Reformat the date parts
                            var formattedDate = parts[2] + "/" + parts[1] + "/" + parts[0];
                   
                            self.planID = data.bundleMapId;

                            ywos.initLocalStorage(self.planID);
                            self.ajaxGetPlanData();
                            if (data.responseCode == 0) {
                            console.log(data);
                                self.deliveryInfo = {
                                    "name": data.fullName,
                                    "mobileNumber": data.mobileNumber,
                                    "msisdn": data.mobileNumber,
                                    "securityType": data.securityType,
                                    "securityId": data.securityNumber,
                                    "dob": formattedDate,
                                    "gender": data.gender,
                                    "email": data.email,
                                    "emailConfirm": data.email,
                                    "address": data.addressLine1,
                                    "addressMore": data.addressLine2,
                                    "addressLine": data.addressLine1,
                                    "postcode": data.postalCode,
                                    "state": data.state,
                                    "stateCode": data.stateCode,
                                    "city": data.city,
                                    "cityCode": data.cityCode,
                                    "country": data.country,
                                    "deliveryNotes": "",
                                    'stagingOrderNumber':data.stagingOrderNumber,
                                    "sanitize": {
                                        "address": data.addressLine1,
                                        "addressMore": "",
                                        "addressLine": data.addressLine1,
                                        "state": data.state,
                                        "city": data.city,
                                        "country": data.country,
                                    },
                                    "referralCode": data.referralCode,
                                };
                                self.customerDetails = {
                                    "securityType": data.securityType,
                                    "securityId": data.securityNumber,
                                    "msisdn": data.mobileNumber,
                                    upFrontPayment: 'false'
                                };
                                self.dealer = {
                                    'dealer_code': data.dealerCode,
                                    'dealer_id': data.dealerLoginId,
                                    'referral_code': data.referralCode,
                                };

                                 
                                // self.validateReview();
                                // ywos.redirectToPage('payment');
                            } else {
                                self.toggleModalAlert(self.renderText('modalCreateStagingError'), errorMsg);
                            }
                        })
                        .catch((error) => {
                            var response = error.response;
                            if (response != '') {
                                var data = response.data;
                                var errorMsg = '';
                                if (error.response.status == 500 || error.response.status == 503) {
                                    errorMsg = self.renderText('modalCreateStagingError');
                                } else {
                                    errorMsg = data.message

                                }
                                toggleOverlay(false);
                                self.toggleModalAlert(self.renderText('modalCreateStagingError'), errorMsg);
                            }

                            // // console.log(error, response);
                        })
                        .finally(() => {
                            // console.log('finally');
                        });
                },
                ajaxGetPlanData: function() {
                    var self = this;
                    axios.get(apiEndpointURL + '/get-plan-by-id/' + self.planID + '/?nonce=' + yesObj.nonce)
                        .then((response) => {
                            var data = response.data;
                            if (data.internetData == '∞') {
                                data.internetData = 'Unlimited';
                            }

                            self.orderSummary.plan = data;
                            var planPriceBreakdown = [];
                            var planDevicePriceBreakdown = [];
                            var planSimplifiedBreakdown = [];
                            for (var key in data) {
                                var keyPricingComponentList = 'pricingComponentList';
                                if (key == keyPricingComponentList) {
                                    var pricingComponentList = data[keyPricingComponentList];
                                    pricingComponentList.map(function(pricingComponent) {
                                        var componentName = pricingComponent.pricingComponentName;
                                        var componentValue = formatPrice(pricingComponent.pricingComponentValue);
                                        var objArr = {
                                            name: componentName,
                                            value: componentValue
                                        };
                                        if (['Postpaid Device Price', 'Postpaid Device Upfront Payment'].includes(componentName)) {
                                            planDevicePriceBreakdown.push(objArr);
                                        } else if (['Postpaid Foreigner Deposit'].includes(componentName)) {
                                            self.orderSummary.plan.foreignerDeposit = componentValue;
                                        } else {
                                            planPriceBreakdown.push(objArr);
                                        }
                                    });
                                }
                                var keySimplifiedItemPricingList = 'simplifiedItemPricingList';
                                if (key == keySimplifiedItemPricingList) {
                                    planSimplifiedBreakdown = data[keySimplifiedItemPricingList];
                                }
                            };
                            self.orderSummary.due.priceBreakdown = {
                                plan: planPriceBreakdown,
                                device: planDevicePriceBreakdown,
                                simplified: planSimplifiedBreakdown
                            };
                            // console.log(self.orderSummary.due);

                            var hasDevice = false;
                            for (var i = 0; i < planDevicePriceBreakdown.length; i++) {
                                if (parseFloat(planDevicePriceBreakdown[i].value) > 0) {
                                    hasDevice = true;
                                    break;
                                }
                            }
                            self.orderSummary.plan.hasDevice = hasDevice;

                            self.updatePlan(true);
                        })
                        .catch((error) => {
                            // console.log('error', error);
                        })
                },
                updatePlan: function(closeOverlay = true) {
                    var self = this;
                    self.updateSummary();
                    if (closeOverlay) {
                        setTimeout(function() {
                            toggleOverlay(false);
                        }, 500);
                    }
                    if (self.orderSummary.plan.notes) {
                        var arrNotes = self.orderSummary.plan.notes.split(',');
                        self.packageInfos = arrNotes.sort(function (a, b) {
                            return a.length - b.length;
                        });
                    }

                    // self.updateData();
                    self.validateSession();  
                },
                updateSummary: function() {
                    var self = this;
                    var total = 0;
                    self.orderSummary.due.addOns = (self.orderSummary.addOn != null) ? roundAmount(self.orderSummary.addOn.amount) : 0;
                    self.orderSummary.due.planAmount = parseFloat(self.orderSummary.plan.totalAmount).toFixed(2);
                    self.orderSummary.due.amount = (parseFloat(self.orderSummary.plan.totalAmountWithoutSST.replace(/,/g, '')) + ((self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.amount) : 0)).toFixed(2);
                    self.orderSummary.due.taxesSST = (parseFloat(self.orderSummary.plan.totalSST) + ((self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.taxSST) : 0)).toFixed(2);
                    self.orderSummary.due.total = roundAmount(parseFloat(self.orderSummary.due.amount) + parseFloat(self.orderSummary.due.taxesSST) + parseFloat(self.orderSummary.due.shippingFees)) + parseFloat(self.orderSummary.due.foreignerDeposit);
                    self.orderSummary.due.rounding = parseFloat(self.orderSummary.plan.roundingAdjustment).toFixed(2);
                    self.orderSummary.due.total = (parseFloat(self.orderSummary.due.total) + parseFloat(self.orderSummary.due.rounding)).toFixed(2);

                },
                validateSession: function() {

                    var self = this;
                    if (ywos.validateSessionRoving(self.currentStep, true)) {
                        self.updateData();
                    } else {
                        // history.back();
                    }
                },
                updateData: function() {
                    var self = this;
                    ywos.lsData.meta.orderSummary = self.orderSummary;
                    ywos.lsData.meta.customerDetails = self.customerDetails;
                    ywos.lsData.meta.dealer = self.dealer;
                    ywos.lsData.meta.deliveryInfo= self.deliveryInfo; 
                    ywos.lsData.trxType = 'roving';
                    self.checkForeignerDeposit();
                    ywos.updateYWOSLSData();
                    self.pageInit();
                },
                checkForeignerDeposit: function() {
					var self = this;
					if (self.orderSummary.plan.planType == 'postpaid') {
                        var foreignerDeposit = parseFloat(self.orderSummary.plan.foreignerDeposit);
                        console.log(foreignerDeposit);
                        if (self.deliveryInfo.securityType == 'PASSPORT' && ywos.lsData.meta.orderSummary.due.foreignerDeposit == 0.00) {
							self.orderSummary.due.foreignerDeposit = foreignerDeposit;
                            self.orderSummary.due.total = parseFloat(self.orderSummary.due.total) + parseFloat(foreignerDeposit);
                        } else if (self.deliveryInfo.securityType == 'NRIC' && ywos.lsData.meta.orderSummary.due.foreignerDeposit != 0.00) {
                            self.orderSummary.due.foreignerDeposit = 0.00;
                            self.orderSummary.due.total = parseFloat(self.orderSummary.due.total) - parseFloat(foreignerDeposit);
                        }
					}
				},
                pageInit: function() {
                    var self = this;

                    self.pageValid = true;
                },

                pageInit_bak: function() {
                    var self = this;
                    this.validateStagingOrder();
                    self.pageValid = true;
                    self.apiLocale = (ywos.lsData.siteLang == 'ms-MY') ? 'MY' : 'EN';

                },
                generateSessionKey: function() {
                    return '_' + Math.random().toString(36).substr(2, 9);
                },

                validateReview: function() {
                    var self = this;
                    toggleOverlay();

                    // self.watchSubmit();
                    // ywos.lsData.meta.completedStep = self.currentStep;
                    // var data =JSON.parse(localStorage.getItem('yesYWOS'))
                    // data.meta.agree = self.agree;
                    // localStorage.setItem('yesYWOS', JSON.stringify(data))
                    ywos.lsData.meta.completedStep = self.currentStep;
                    ywos.lsData.meta.agree = self.agree;
                    ywos.updateYWOSLSData();
                    // ywos.updateYWOSLSData();
                    ywos.redirectToPage('payment');
                },

                toggleModalAlert: function(modalHeader = '', modalText = '') {
                    $('#modal-titleLabel').html(modalHeader);
                    $('#modal-bodyText').html(modalText);
                    $('#modal-alert').modal('show');
                    $('#modal-alert').on('hidden.bs.modal', function() {
                        $('#modal-titleLabel').html('');
                        $('#modal-bodyText').html('');
                    });
                },
                watchSubmit: function() {
                    var self = this;
                    var isValid = true;
                    if (!self.agree.terms || !self.agree.privacy) {
                        isValid = false;
                    }
                    if (isValid) {
                        self.allowSubmit = true;
                    } else {
                        self.allowSubmit = false;
                    }
                },
                renderText: function (strID) {
                    return ywos.renderText(strID, this.pageText);
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>