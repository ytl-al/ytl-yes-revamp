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
                        <div class="flex-container mt-3">
                            <div>
                                 <div class="row">
                                     <div class="col-1">
                                         <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M13.721 5.14645L2.42767 23.9998C2.19483 24.403 2.07163 24.8602 2.07032 25.3258C2.06902 25.7914 2.18966 26.2493 2.42024 26.6538C2.65082 27.0583 2.98331 27.3954 3.38461 27.6316C3.78592 27.8677 4.24207 27.9947 4.70767 27.9998H27.2943C27.7599 27.9947 28.2161 27.8677 28.6174 27.6316C29.0187 27.3954 29.3512 27.0583 29.5818 26.6538C29.8124 26.2493 29.933 25.7914 29.9317 25.3258C29.9304 24.8602 29.8072 24.403 29.5743 23.9998L18.281 5.14645C18.0433 4.75459 17.7086 4.43061 17.3093 4.20576C16.9099 3.98092 16.4593 3.86279 16.001 3.86279C15.5427 3.86279 15.0921 3.98092 14.6927 4.20576C14.2934 4.43061 13.9587 4.75459 13.721 5.14645V5.14645Z" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M16 12V17.3333" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M16 22.6665H16.0133" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                         </svg>
                                     </div>
                                     <div class="col-11 text-bold">
                                         Sorry, you do not qualify for the Yes Elevate contract option, please select another contract option:
                                     </div>
                                     <div class="col-md-12 mt-3">
                                         <div>Select a new contract option:</div>
                                         <div class="selectContractWrap contractNormal mt-2">
                                             <ul>
                                                 <li v-for="(contract, index) in orderSummary.product.colors[orderSummary.orderDetail.color]" @click="changeContract(contract.productCode)" :data-contract-id="contract.productCode" class="text-uppercase" :class="(contract.contractName == 'Normal'?'contract_'+ contract.productCode :'contract_'+ contract.productCode +' contract-disabled')"><a>
                                                         <span v-if="contract.contractName == 'Normal'">Normal {{contract.contract}} Months</span>
                                                         <span v-else >Infinite {{contract.contract}} Months</span>
                                                     </a></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                                <div class="row" style="min-height: 450px;">
                                    <div class="col-md-12" v-if="allowSubmit">
                                        <div class="hr_line"></div>
                                        <div class="text-note" v-if="orderSummary.orderDetail.productCode">
                                            <div v-for="(detail, index) in orderSummary.product.selected.productNoteEN">{{detail | trim}}</div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-3">
                                                <img :src="orderSummary.product.selected.imageURL" width="100"/>
                                            </div>
                                            <div class="col-md-9">
                                                <h2 class="subtitle" style="margin-bottom: 0">{{ orderSummary.product.selected.nameEN }}</h2>
                                                <h2 class="subtitle">{{orderSummary.product.selected.plan.nameEN }}</h2>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="text-description mt-3">{{orderSummary.product.selected.plan.shortDescriptionEN}}</div>
                                            <ul class="accordion-body list-1 mt-3">
                                                <li v-for="(list, index) in orderSummary.product.selected.plan.longDescriptionEN">{{list}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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

                        // console.log("selectedPlan", self.selectedPlan);

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

                changeContract: function (contract){
                    var self = this;
                    if($('.selectContractWrap .contract_' + contract).hasClass('contract-disabled')){
                        return;
                    }

                    $('.selectContractWrap .selected').removeClass('selected');
                    $('.selectContractWrap .contract_' + contract).addClass('selected');

                    self.orderSummary.orderDetail.productCode = contract;
                    self.orderSummary.product.selected = self.selectedProduct(self.orderSummary.orderDetail.color,contract);

                    self.updateSummary();
                },

                selectedProduct: function (color,contract){
                    var self = this;

                    for(var i=0; i< self.orderSummary.product.colors[color].length; i++){

                        if(self.orderSummary.product.colors[color][i].productCode == contract){
                            return self.orderSummary.product.colors[color][i];
                        }
                    }

                    return self.orderSummary.product.colors[color][0];
                },

                updateSummary: function (){
                    var self = this;
                    self.allowSubmit = true;
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