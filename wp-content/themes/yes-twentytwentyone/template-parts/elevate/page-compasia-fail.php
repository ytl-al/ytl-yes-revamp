<?php require_once('includes/header.php') ?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back to Cart</a>
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
<main>
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. Eligibility check</span>
                </li>
                <li ui-sref="secondStep" class="completed">
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
            <div id="main-vue">
            <div class="border-box">
                <div class="row">
                    <div class="col-md-5 p-5 flex-column bg-checkout3">
                        <div class="title text-white checkout-left3">
                            Sorry! We’ve checked and you currently do not qualify for the Yes Elevate contract option
                        </div>
                    </div>
                    <div class="col-md-7  p-5">
                        <div class="flex-container mt-5">
                            <div>
                                <div class="subtitle2">
                                    You could still continue with our Normal {{selectedPlan.contract}} months contract option.
                                </div>
                                <p>
                                <div class="text-bold">{{selectedPlan.nameEN}}</div>
                                    {{selectedPlan.plan.nameEN}}
                                </p>
                                <ul class="mt-3 mb-3 list-1">
                                    <li>{{selectedPlan.plan.shortDescriptionEN}}</li>
                                </ul>

                                <p class="mt-3">You will be redirected to another check out page for payment.</p>
                                <p class="mt-3">Would you like to proceed?</p>
                                <div class="p-3">
                                    <a class="pink-btn-disable text-uppercase mr-2" :class="(allowSubmit)?'pink-btn':'pink-btn-disable'" @click="goNext">choose plan</a>
                                    <a href="/5gplans/" class="btn-cancel text-uppercase">Cancel</a>
                                </div>
                                <div id="error" class="mt-3"></div>
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
                isCAEligibilityCheck: false,
                selectedPlan:{
                    productCode:'',
                    contract:'',
                    contractName:'',
                    color:'',
                    imageURL:'',
                    nameEN:'',
                    shortDescriptionEN:'',
                    plan:{
                        nameEN:'',
                        shortDescriptionEN:''
                    }

                },
                taxRate: {
                    sst: 0.06
                },
                plan:{
                    displayName:'',
                    features:[],
                    notes:[],
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
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                        }
                        if (elevate.lsData.product) {
                            self.orderSummary.product  = elevate.lsData.product;
                        }
                        if (elevate.lsData.deliveryInfo) {
                            self.deliveryInfo = elevate.lsData.deliveryInfo;
                        }
                        if (elevate.lsData.orderSummary) {
                            self.orderSummary = elevate.lsData.orderSummary;
                        }
                        if(elevate.lsData.orderDetail){
                            self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                        }

                        self.productId = elevate.lsData.orderDetail.productCode;
                        self.getNormalContract();

                        if(self.selectedPlan.productCode){
                            self.allowSubmit = true;
                        }else {
                            self.allowSubmit = false;
                            $('#error').html('Sorry, No Normal Contract available.');
                        }

                        console.log("selectedPlan", self.selectedPlan);

                    } else {
                        elevate.redirectToPage('cart');
                    }
                },

                getNormalContract: function(){
                    var self = this;
                    var color = self.orderSummary.orderDetail.color;
                    for (var i = 0 ; i < self.orderSummary.product.colors[color].length; i++){
                        if(self.orderSummary.product.colors[color][i].contractName == 'Normal'){
                            self.selectedPlan = self.orderSummary.product.colors[color][i];
                        }
                    }
                },

                redirectYWOS:function (){
                    var self = this;
                    toggleOverlay();
                    if(self.selectedPlan.productCode) {
                        ywos.buyPlan(self.selectedPlan.productCode);
                    }
                },
                goNext: function(){
                    $('#error').html('');
                    var self = this;
                    self.redirectYWOS();
                }
            }
        });
    });
</script>