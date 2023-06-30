<?php require_once 'includes/header.php' ?>
<div id="main-vue">
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/personal/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> {{ renderText('back') }}</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3">{{ renderText('check_out') }}</h1>
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
                <span>{{ renderText('elevate_step_1') }}</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>{{ renderText('elevate_step_2') }}</span>
                </li>
                <li ui-sref="thirdStep" class="completed">
                    <span>{{ renderText('elevate_step_3') }}</span>
                </li>
                <li ui-sref="fourthStep" v-if="(simType=='true')" class="completed">
                    <span>{{ renderText('elevate_step_4_1') }}</span>
                </li>
                <li ui-sref="fourthStep" class="completed" v-else>
                    <span>{{ renderText('elevate_step_4') }}</span>
                </li>
                <li ui-sref="fifthStep" class="completed">
                    <span>{{ renderText('elevate_step_5') }}</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->

    <section id="cart-body"  style="display: none;">
        <div class="container p-lg-5 p-3" style="border: 0">
            <div >
                <div class="subtitle">{{ renderText('review_and_pay') }}</div>
                <div class="row gx-5" >
                    <div class="col-lg-7 col-12">

                        <div class="border-box">
                            <div class="row">
                                <div class="col-md-4 leftColor">
                                    <div class="p-3" v-if="orderSummary.product.selected"><img :src="getProductImage()" width="150"></div>
                                </div>
                                <div class="col-md-8 p-4">
                                    <div class="row mt-3">
                                        <div class="col-md-9">
                                            <div class="text-20">
                                                <div class="subtitle2" style="margin-bottom: 0">{{orderSummary.product.selected.name}}</div>
                                                <div class="subtitle2">{{orderSummary.product.selected.plan.name}}</div>
                                            </div>
                                            <div class="hr_line"></div>
                                            <div class="text-bold">
                                                {{contractTitle}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 col-12">
                                <div class="border-box" style="width:100%; padding:20px;">
                                    <div class="subtitle2">{{ renderText('plan') }}</div>
                                    <div class="accordion-wrap hlv_3">
                                        <div class="accordion-header" @click="showPlanDetail()"> {{orderSummary.product.selected.plan.nameEN}} <i
                                                    class="icon icon_arrow_down"></i></div>
                                        <div class="text-description mt-3">{{orderSummary.product.selected.plan.shortDescriptionEN}}</div>
                                        <ul class="accordion-body list-1 mt-3">
                                            <li v-for="(list, index) in orderSummary.product.selected.plan.longDescriptionEN">{{list}}</li>
                                        </ul>
                                    </div>
                                    <div class="text-description mt-3">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" mt-3 mb-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mt-3 item_info">
                                        <div class="label text-bold">{{ renderText('to') }}: {{eligibility.name}}</div>
                                        <div class="content">
                                            <div>{{eligibility.email}}</div>
                                            <div>+60 {{eligibility.inphone}}</div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 item_info">
                                        <div class="label">{{ renderText('delivery_address') }}</div>
                                        <div class="content"><span v-if="deliveryInfo.addressMore">{{deliveryInfo.addressMore}},</span> {{deliveryInfo.address}}, {{deliveryInfo.city}}, {{deliveryInfo.state}}, {{deliveryInfo.postcode}}, {{deliveryInfo.country}}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div style="float: right">
                                        <a href="/elevate/personal" class="btn-edit">({{ renderText('edit') }})</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="summary-box">
                            <h1 class="subtitle">{{ renderText('order_summary') }}</h1>
                            <h3 class="plan_price">{{ renderText('monthly_payment') }}</h3>
                            <div class="hr_line"></div>
                            <div class="row cart_total">
                                <div class="col-4 pt-2 pb-2">
                                    <h3>{{ renderText('total') }}</h3>
                                </div>
                                <div class="col-8 pt-2 pb-2 text-end">
                                    <h3>RM{{ formatPrice(parseFloat(orderSummary.orderDetail.subtotal).toFixed(2)) }}/mth</h3>
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
                                <div class="summary-box-free" v-if="(simType == 'true')" >
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <p>eSIM</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>FREE</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 ">
                                    <div class="col-12">
                                        <button class="pink-btn-disable d-block text-uppercase w-100" :class=" allowSubmit?'pink-btn':'pink-btn-disable'"  @click="goNext" type="button">{{ renderText('order') }}</button>
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
</div>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                productId: null,
                isCartEmpty: false,
                hasPlan: false,
                contractSigned: false,
                interval: null,
                contractTitle: '',
                taxRate: {
                    sst: 0.06
                },
                dealer: {
                    dealer_code: '',
                    dealer_id: '',
                    referral_code: ''
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
                    orderInfo: {}
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
                allowSubmit: false,
                simType:'',
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
                        }else{
                            elevate.redirectToPage('eligibilitycheck');
                        }
                        if (elevate.lsData.customer) {
                            self.customer = elevate.lsData.customer;
                        }
                        if (elevate.lsData.deliveryInfo) {
                            self.deliveryInfo = elevate.lsData.deliveryInfo;
                        }else{
                            elevate.redirectToPage('personal');
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
                            self.contractTitle = 'Yes Infinite+';
                        }

                        self.hasPlan = true;
                        self.simType =elevate.lsData.meta.esim;

                        self.watchAllowNext();
                        toggleOverlay(false);


                        setTimeout(function () {
                            $('#cart-body').show();
                        }, 500);
                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                showPlanDetail: function(){
                    $('.accordion-wrap').toggleClass("active");
                    $(".accordion-body").slideToggle();
                },
                getProductImage: function(){
                    var self = this;
                    var url = self.orderSummary.product.selected.imageURL.split(';');
                    console.log(url);
                    return url[0];

                },
                watchAllowNext:function (){
                    var self = this;
                    self.allowSubmit = true
                },
                renderText: function(strID) {
                    return elevate.renderText(strID, Elevate_lang);
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