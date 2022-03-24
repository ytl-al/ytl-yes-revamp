<?php require_once 'includes/header.php' ?>

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
                <li ui-sref="fourthStep" class="completed">
                    <span>4. Review and order</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->

    <section id="cart-body">
        <div class="container p-lg-5 p-3" style="border: 0">
            <div id="main-vue">
                <div class="subtitle">Review & Pay</div>
            <div class="row gx-5">
                <div class="col-lg-8 col-12">

                    <div class="border-box">
                        <div class="row">
                            <div class="col-md-3 leftColor">
                                <div class="p-3">
                                <img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595" width="150"/>
                                </div>
                            </div>
                            <div class="col-md-9 p-4">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="text-20">
                                        <div class="subtitle2" style="margin-bottom: 0">{{orderSummary.product.selected.nameEN}}</div>
                                        <div class="subtitle2">{{orderSummary.product.selected.plan.nameEN}}</div>
                                        </div>
                                        <div class="hr_line"></div>
                                        <div class="text-bold">
                                            {{contractTitle}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <div class="subtitle text-end">
                                                RM{{formatPrice(parseFloat(orderSummary.product.selected.devicePriceMonth).toFixed(2))}}/ mth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=" mt-3 mb-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mt-3 item_info">
                                    <div class="label text-bold">To: {{deliveryInfo.name}}</div>
                                    <div class="content">
                                        <div>{{deliveryInfo.email}}</div>
                                        <div>+60 {{deliveryInfo.phone}}</div>
                                    </div>
                                </div>

                                <div class="row mt-3 item_info">
                                    <div class="label">Delivery Address</div>
                                    <div class="content"><span v-if="deliveryInfo.addressMore">{{deliveryInfo.addressMore}},</span> {{deliveryInfo.address}}, {{deliveryInfo.city}}, {{deliveryInfo.state}}, {{deliveryInfo.postcode}}, {{deliveryInfo.country}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div style="float: right">
                                    <a href="/elevate/personal" class="btn-edit">(Edit)</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="summary-box">
                        <h1 class="subtitle">Order summary</h1>
                        <h3 class="plan_price">Monthly Payment</h3>
                        <div class="hr_line"></div>
                        <div class="row cart_total">
                            <div class="col-6 pt-2 pb-2">
                                <h3>TOTAL</h3>
                            </div>
                            <div class="col-6 pt-2 pb-2 text-end">
                                <h3>RM{{ formatPrice(parseFloat(orderSummary.orderDetail.total).toFixed(2)) }}/mth</h3>
                            </div>
                        </div>
                        <div class="monthly mb-4">
                            <div v-for="(item, index) in orderSummary.orderDetail.orderItems" class="row mt-2">
                                <div class="col-6">
                                    <p>{{item.name}}</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>RM{{item.price}}/ mth</p>
                                </div>
                            </div>
                            <div class="hr_line"></div>
                            <div class="row mt-2 cart_bold">
                                <div class="col-6">
                                    <p>Upfront Payment</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>*RM{{ formatPrice(parseFloat(orderSummary.product.selected.upFrontPayment).toFixed(2)) }}</p>
                                </div>
                            </div>
                            <div class="hr_line"></div>
                            <div class="row mt-2 ">
                                <div class="col-1">
                                    <input type="checkbox" id="subscribe" @click="watchAllowNext" name="subscribe" value="1">
                                </div>
                                <div class="col-11 text-12">
                                    <p>I here by agree to subscribe to the plan selected in the online form
                                        submitted by me, and to be bound by the First to 5G Campaign Terms and
                                        Conditions available at <a target="_blank"
                                                                   href="https://www.yes.my/tnc/ongoing-campaigns-tnc">www.yes.my/tnc/ongoing-campaigns-tnc</a>.
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-2 ">
                                <div class="col-1">
                                    <input type="checkbox" id="consent" @click="watchAllowNext" name="consent" value="1">
                                </div>
                                <div class="col-11 text-12">
                                    <p>I further give consent to YTLC to process my personal data in accordance with
                                        the YTL Group Privacy Policy available at <a target="_blank"
                                                                                     href="https://www.ytl.com/privacypolicy.asp">www.ytl.com/privacypolicy.asp</a>.
                                    </p>
                                </div>
                            </div>


                            <div class="row mt-3 ">
                                <div class="col-12">
                                    <button class="pink-btn-disable d-block text-uppercase w-100" :class=" allowSubmit?'pink-btn':'pink-btn-disable'"  @click="goNext" type="button">Order</button>
                                    <div id="error" class="mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                contractSigned: false,
                interval: null,
                contractTitle: '',
                taxRate: {
                    sst: 0.06
                },
                contract:{},
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
                eligibility: {
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                customer: {
                    id: '',
                    securityNumber: '',
                    fullName: '',
                    productSelected: ''
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

                        if (elevate.lsData.orderDetail) {
                            self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                        }
                        if (elevate.lsData.product) {
                            self.orderSummary.product = elevate.lsData.product;
                        }

                        if (elevate.lsData.contract) {
                            self.contract = elevate.lsData.contract;
                            self.contractSigned = true;
                        }

                        self.productId = elevate.lsData.product.productID;

                        if(self.orderSummary.product.selected.contractName){
                            self.contractTitle = self.orderSummary.product.selected.contractName;
                        }else{
                            self.contractTitle = 'Elevate ' + self.orderSummary.product.selected.contract +' months';
                        }


                        self.watchAllowNext();
                        toggleOverlay(false);

                    } else {
                        elevate.redirectToPage('cart');
                    }
                },

                watchAllowNext:function (){
                    var self = this;
                    if($('#subscribe').is(':checked')&& $('#consent').is(':checked')){
                        self.allowSubmit = true
                    }else{
                        self.allowSubmit = false
                    }
                },

                goNext: function () {
                    var self = this;
                    if(self.allowSubmit){
                        toggleOverlay();
                        elevate.redirectToPage('contract');
                    }
                }

            }
        });
    });
</script>