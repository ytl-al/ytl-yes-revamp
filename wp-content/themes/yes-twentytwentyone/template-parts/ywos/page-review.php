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
                <li ui-sref="thirdStep" class="completed">
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
                    <h1>Review & Pay</h1>
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
                </div>
                <div class="col-lg-8 col-12 order-lg-1 mt-3 mt-lg-0">
                    <h1 class="mb-4 d-none d-lg-block">Review & Pay</h1>
                    <div class="accordion mb-4" id="cart-accordion">
                        <div class="packagebox mb-3">
                            <div class="row">
                                <div class="col-lg-3 col-12 visualbg d-flex align-items-center" v-if="orderSummary.plan.planType == 'postpaid'">
                                    <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/kasiup-postpaid-visual.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col-lg-3 col-12 visualbg prepaid d-flex align-items-center" v-if="orderSummary.plan.planType == 'prepaid'">
                                    <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/kasiup-prepaid-visual.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col-lg-6 col-12 pt-lg-4 pb-1 px-4 px-lg-4">
                                    <h3 class="mt-3 mt-lg-0">{{ orderSummary.plan.displayName }}</h3>
                                    <p class="mb-3">RM{{ parseFloat(orderSummary.plan.totalAmount).toFixed(0) }} for {{ orderSummary.plan.internetData }}</p>
                                    <div class="package-info" v-if="packageInfos.length">
                                        <div class="row">
                                            <div class="col-6 mb-3" v-for="(packageInfo, index) in packageInfos.slice(0, 4)">
                                                <span class="span-checkList">{{ packageInfo }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12 mt-3 mb-3 mt-lg-0 mb-lg-0 d-flex align-items-center justify-content-lg-end justify-content-center">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h3 class="price">RM{{ parseFloat(orderSummary.plan.totalAmount).toFixed(0) }}</h3>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#cart-accordion">
                            <div class="accordion-body">
                                <div v-if="packageInfos.slice(3).length">
                                    <h1>More Benefits</h1>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 mb-3" v-for="(packageInfo, index) in packageInfos.slice(3)"><span class="span-itemList">{{ packageInfo }}</span></div>
                                    </div>
                                </div>

                                <h1>One-time Charges (due now)</h1>
                                <h2>Rate plan</h2>
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <p>{{ orderSummary.plan.displayName }}</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p>RM{{ parseFloat(orderSummary.plan.totalAmount).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 pb-1 border-bottom">
                                        <p>Add-Ons</p>
                                        <p v-if="orderSummary.addOn != null">{{ orderSummary.addOn.displayAddonName }}</p>
                                    </div>
                                    <div class="col-6 pb-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.addOns).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>Taxes</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.taxesSST).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>Shipping Fee</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.shippingFees).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom" v-if="deliveryInfo.securityType == 'PASSPORT' && orderSummary.due.foreignerDeposit > 0">
                                        <p>Deposit for Foreigner</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end" v-if="deliveryInfo.securityType == 'PASSPORT' && orderSummary.due.foreignerDeposit > 0">
                                        <p>RM{{ parseFloat(orderSummary.due.foreignerDeposit).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>Rounding Adjustment</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.rounding).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div v-if="orderSummary.plan.bundlePlan">
                                    <p class="bold mb-2">Device Bundle: <span class="fw-bold">{{ orderSummary.plan.bundleName }}</span></p>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p>Device payment</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ parseFloat(orderSummary.plan.totalPostpaidDevice).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="fw-bold">Total charges due now</p>
                                        <p class="small">This summary is not an invoice</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p class="large">RM{{ parseFloat(orderSummary.due.total).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div v-if="orderSummary.plan.planType != 'prepaid'">
                                    <h1>Monthly Charges</h1>
                                    <h2>Rate plan</h2>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p>{{ orderSummary.plan.displayName }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="bold">Total monthly charges</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="bold">RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 text-end order-2">
                            <a href="javascript:void(0)" class="grey-link" v-on:click="ywos.redirectToPage('delivery')">(Edit)</a>
                        </div>
                        <div class="col-9 order-1">
                            <p class="mb-3"><strong>To: {{ deliveryInfo.name }}</strong><br> {{ deliveryInfo.email }}<br> +60 {{ slicedMobileNumber }}</p>
                            <p><strong>Shipping Address</strong><br> {{ deliveryInfo.sanitize.address }}, <br /><template v-if="deliveryInfo.sanitize.addressMore">{{ deliveryInfo.sanitize.addressMore }}, <br /></template>{{ deliveryInfo.sanitize.city }}, <br />{{ deliveryInfo.sanitize.state }}, <br />{{ deliveryInfo.postcode }}, {{ deliveryInfo.sanitize.country }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <div class="col-9">
                            <p><strong>Billing Address</strong><br> 111, Menara YTL, Jalan Bukit<br> Bintang, Kuala Lumpur, 58000,<br> Malaysia</p>
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
                    <div class="row mt-5">
                        <div class="col-lg-5 col-12">
                            <button class="pink-btn d-block w-100" type="submit" v-on:click="validateReview">Pay Now</button>
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

<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                currentStep: 3,
                pageValid: false,
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
                packageInfos: [],
                slicedMobileNumber: ''
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
                        self.updateData();
                        toggleOverlay(false);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
                updateData: function() {
                    var self = this;
                    self.orderSummary = ywos.lsData.meta.orderSummary;
                    self.deliveryInfo = ywos.lsData.meta.deliveryInfo;
                    self.slicedMobileNumber = self.deliveryInfo.mobileNumber.slice(1);

                    var arrNotes = self.orderSummary.plan.notes.split(',');
                    self.packageInfos = arrNotes.sort(function(a, b) {
                        return a.length - b.length;
                    });
                },
                validateReview: function() {
                    var self = this;
                    toggleOverlay();

                    ywos.lsData.meta.completedStep = self.currentStep;
                    ywos.updateYWOSLSData();

                    ywos.redirectToPage('payment');
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>