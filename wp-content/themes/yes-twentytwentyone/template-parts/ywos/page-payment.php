<?php include('header-ywos.php'); ?>


<style type="text/css">
    #cart-body .nav-pills .nav-link {
        width: 80px;
        height: 80px;
        background: #FFF;
        box-shadow: 2px 2px 12px rgba(112, 144, 176, 0.25);
        border-radius: 8px;
    }

    #cart-body .nav-pills .nav-link.active {
        background: #F9F7F4;
    }

    #cart-body .nav-pills .nav-link img {
        width: 100%;
    }

    #cart-body .nav-pills .nav-item {
        margin-right: 30px;
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
        #cart-body .nav-pills .nav-item {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        #cart-body .nav-pills .nav-link {
            width: 60px;
            height: 60px;
        }
    }
</style>

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
                <li ui-sref="fourthStep" class="completed">
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
                <form class="col-lg-8 col-12 order-lg-1 mt-3 mt-lg-0" @submit="paymentSubmit">
                    <div>
                        <h1>Payment Info</h1>
                        <p class="sub mb-4 pe-5">This information is required for online purchases and is used to verify and protect your identity. We keep this information safe and will not use it for any other purposes.</p>
                        <h2>Select payment</h2>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-creditcard-tab" data-bs-toggle="pill" data-bs-target="#creditcard" type="button" role="tab" aria-controls="pills-creditcard" aria-selected="true"><img src="/wp-content/uploads/2022/02/creditcard.png" alt=""></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-fpx-tab" data-bs-toggle="pill" data-bs-target="#fpx" type="button" role="tab" aria-controls="pills-fpx" aria-selected="false"><img src="/wp-content/uploads/2022/02/fpx-logo.png" alt=""></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-grabpay-tab" data-bs-toggle="pill" data-bs-target="#grabpay" type="button" role="tab" aria-controls="pills-grabpay" aria-selected="false"><img src="/wp-content/uploads/2022/02/grabpay.png" alt=""></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-boost-tab" data-bs-toggle="pill" data-bs-target="#boost" type="button" role="tab" aria-controls="pills-boost" aria-selected="false"><img src="/wp-content/uploads/2022/02/boost.png" alt=""></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-touchgo-tab" data-bs-toggle="pill" data-bs-target="#touchgo" type="button" role="tab" aria-controls="pills-touchgo" aria-selected="false"><img src="/wp-content/uploads/2022/02/touchgo.png" alt=""></button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="creditcard" role="tabpanel" aria-labelledby="pills-creditcard-tab">
                                <div class="row mb-4">
                                    <div class="col-lg-6 col-12">
                                        <label class="form-label">Cardholder Name</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="full-name" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center g-2">
                                    <div class="col-12">
                                        <label class="form-label">Card Number</label>
                                    </div>
                                    <div class="col-lg-6 col-12 mb-1">
                                        <div class="input-group align-items-center">
                                            <input class="text-center form-control me-2" type="text" id="first" maxlength="4" />
                                            <input class="text-center form-control me-2" type="text" id="second" maxlength="4" />
                                            <input class="text-center form-control me-2" type="text" id="third" maxlength="4" />
                                            <input class="text-center form-control me-2" type="text" id="fourth" maxlength="4" />
                                        </div>
                                    </div>
                                    <p class="info mb-3">Numbers must contain 16 digits</p>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-12">
                                        <label class="form-label">Exp Date</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control text-center" id="expiry-date" placeholder="00/00" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <label class="form-label">CVC</label>
                                        <!-- <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" class="ms-2 float-end" title="Tooltip text here"><img src="/wp-content/uploads/2022/02/question-icon.png" /></a> -->
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control text-center" id="cvv" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6 col-12">
                                        <label class="form-label">Issuing Country</label>
                                        <div class="input-group align-items-center">
                                            <input type="text" class="form-control" id="full-name" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <button type="submit" class="pink-btn w-100">Pay</button>
                                        <!-- <a href="thankyou.html" class="pink-btn w-100">Pay</a> -->
                                    </div>
                                </div>
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
                currentStep: 4,
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
                    }
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
                paymentSubmit: function() {
                    return
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>