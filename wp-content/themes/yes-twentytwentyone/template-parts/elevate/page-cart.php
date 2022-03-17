<?php require_once 'includes/header.php' ?>

<header class="page-header">
    <div class="nav-container">
        <div class="container g-lg-0">
            <div class="row g-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand d-flex justify-content-start" href="/"><img
                                    src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/logo.svg"
                                    class="logo-top"/></a>
                        <div class="justify-content-end" id="navbarSupportedContent">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#">Help</a>
                                <div class="dropdown language-drop float-end">
                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                       id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="iconify" data-icon="bi:globe"></span> English
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-start"
                                        aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">English</a></li>
                                        <li><a class="dropdown-item" href="#">Bhasa Malay</a></li>
                                        <li><a class="dropdown-item" href="#">中文</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="login-btn"><span class="iconify" data-icon="bx:bxs-cart"></span>
                                    1 item</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div id="main-vue" style="display: none">
<main class="clearfix site-main" id="primary" >
    <div id="container-empty" v-if="isCartEmpty">
        <section id="grey-innerbanner">
            <div class="container">
                <h1 class="title">Elevate cart</h1>
            </div>
        </section>
        <section id="cart-body">
            <div class="container no-border">
        <div class="row mb-5">
            <div class="col-lg-8 col-12">
                <div class="accordion">
                    <div class="packagebox mb-3">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-12 visualbg d-none">
                                <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/kasiup-postpaid-visual.png" class="img-fluid" alt="" />
                            </div>
                            <div class="col-12 p-3 px-5">
                                <h3 class="mt-5 mt-lg-0">No item in the cart</h3>
                                <p class="mb-3">You may browse the plans available <a href="/5gplans/">here</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </section>
    </div>
    <div id="container-hasItem" v-if="!isCartEmpty">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <h1 class="title">{{ orderSummary.product.nameEN }}</h1>
        </div>
    </section>
    <!-- Banner End -->

    <section id="cart-body">
        <div class="container body_container no-border">
            <div class="row mb-5 gx-5">
                <div class="col-lg-8 col-12">
                    <div class="product-box">
                        <div class="row">
                            <div class="col-md-5">
                                <div id="productSlide" class="carousel slide" data-bs-interval="false"
                                     data-ride="carousel" data-pause="hover">
                                    <div class="carousel-inner">
                                        <div v-for="(image, index) in orderSummary.product.imageURL" class="carousel-item" :class="(index==0)?'active':''">
                                            <img :src="'/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/' + image"
                                                 class="d-block w-100" alt="">
                                        </div>

                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                    <div class="carousel-indicators">
                                        <button v-for="(image, index) in orderSummary.product.imageURL" type="button" data-bs-target="#productSlide" :data-bs-slide-to="index"
                                                :class="(index==0)?'active':''" aria-current="true" aria-label="Slide 1">
                                            <img :src="'/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/' + image"
                                                 width="60" height="70" class="d-block w-100"
                                                 alt="">
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2 class="subtitle">{{ orderSummary.product.nameEN }}</h2>
                                <div class="mt-3">
                                    <div class="text-bold">Capacity</div>
                                    <div class="hlv_3">
                                        {{ orderSummary.product.capacity }}
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="text-bold">Plan</div>
                                    <div class="accordion-wrap hlv_3">
                                        <div class="accordion-header" @click="showPlanDetail()"> {{ orderSummary.product.planName}} <i
                                                    class="icon icon_arrow_down"></i></div>
                                        <ul class="accordion-body list-1 mt-3" style="display: none">
                                            <li>250GB 4G Data</li>
                                            <li>FREE Unlimited 5G Data* until 31st March 2022</li>
                                            <li>Unlimited calls to ALL networks</li>
                                            <li>Unlimited SMS to YES networks</li>
                                            <li>Pay-as-you-use SMS to other networks</li>
                                            <li>24 months contract</li>
                                        </ul>
                                    </div>
                                    <div class="text-description mt-3">
                                        Enjoy 100GB 4G data and Unlimited 5G data in Kuala Lumpur, Cyberjaya &
                                        Putrajaya
                                    </div>
                                </div>
                                <div class="hr_line"></div>
                                <div class="text-bold mt-3">Select color</div>
                                <div class="selectColorWrap mt-3">
                                    <ul>
                                        <li v-for="(color, index) in orderSummary.product.color" @click="changeColor(color)"
                                            data-bs-target="#productSlide" :data-bs-slide-to="index" class="color_select" :class="'color-'+color" :class="orderSummary.orderDetail.color.toString() == color.toString()?'selected':''"><a></a></li>
                                    </ul>
                                </div>
                                <div class="text-bold mt-3">Select contract type</div>
                                <div class="selectContractWrap mt-3">
                                    <ul>
                                        <li v-for="(contract, index) in orderSummary.product.contract" @click="changeContract(contract.id)" :data-contract-id="contract.id" :class="'contract_' + contract.id" :class="parseFloat(orderSummary.orderDetail.contract_id) == parseFloat(contract.id)?'selected':''"><a>{{contract.name}}</a></li>
                                    </ul>
                                </div>
                                <div class="hr_line"></div>
                                <div class="text-note">
                                    Enjoy 24 month installment on your new smart phone.</br>
                                    *RM0 upfront payment and 0% interest.</br>
                                    *Subject to eligibility and only for MyKad holders
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
                            <div class="row mt-2 cart_bold" v-if="isUpfront">
                                <div class="col-6">
                                    <p>Upfront Payment</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>*RM{{ formatPrice(parseFloat(orderSummary.orderDetail.upfront).toFixed(2)) }}</p>
                                </div>
                            </div>
                            <div class="hr_line"></div>
                        </div>

                        <a href="javascript:void(0)" @click="goNext" class="d-block" :class="isValidCart()?'pink-btn':'pink-btn-disable'">Continue</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</main>
</div>
<?php get_footer('no-newsletter'); ?>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        setTimeout(function (){
            $('#primary').show();
        },500);

    })
    ;
</script>


<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                elevateLSData: null,
                productId: null,
                isCartEmpty: false,
                hasFetchPlan: false,
                ywos_contract:695,
                taxRate: {
                    sst: 0.06
                },
                orderSummary: {
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems:[]
                    },
                },
                packageInfos: [],
                currentStep: 0,
                elevate: null,
            },
            created: function() {
                var self = this;
                setTimeout(function() {
                    elevate.init();
                    self.getPlanData();
                }, 500);
            },
            methods: {
                getPlanData: function() {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {

                        self.productId = elevate.lsData.meta.productId;
                        self.ajaxGetPlanData()
                    } else {
                        self.isCartEmpty = true;
                        setTimeout(function() {
                            toggleOverlay(false);
                        }, 1500);
                    }
                },
                ajaxGetPlanData: function() {
                    var self = this;
                    axios.get(apiEndpointURL_elevate + '/getProduct/?code=' + self.productId)
                        .then((response) => {
                            var data = response.data;
                            if (data.internetData == '∞') {
                                data.internetData = 'Unlimited';
                            }

                            self.orderSummary.product = data;
                            /*if(elevate.lsData.orderDetail){
                                self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                            }else{
                                self.orderSummary.orderDetail.color = null;
                                self.orderSummary.orderDetail.contract_id = data.contract[0].id;
                            }*/
                            self.updatePlan();


                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log('error', error);
                        })
                },
                updatePlan: function() {
                    var self = this;

                    self.hasFetchPlan = true;

                    self.updateSummary();


                },
                updateSummary: function() {
                    var self = this;
                    var total = 0;

                    self.orderSummary.orderDetail.total = 150;
                    self.orderSummary.orderDetail.orderItems = [
                        {name:'Xiaomi 11T 5G NE with Elevate 24 months',price:100},
                        {name:'Yes Postpaid FT5G',price:50},
                    ];
                    self.orderSummary.orderDetail.upfront = 10;
                    //update store
                    elevate.lsData.product = self.orderSummary.product;
                    elevate.updateElevateLSData();
                },
                isUpfront: function (){
                    var self = this;
                    return (self.orderSummary.orderDetail.upfront > 0);
                },
                showPlanDetail: function(){
                    $('.accordion-wrap').toggleClass("active");
                    $(".accordion-body").slideToggle();
                },
                changeColor: function (color){
                    var self = this;

                    $('.selectColorWrap .selected').removeClass('selected');
                    $('.selectColorWrap .color-'+color).addClass('selected');
                    self.orderSummary.orderDetail.color = color;
                    elevate.lsData.orderDetail =  self.orderSummary.orderDetail;
                    elevate.updateElevateLSData();
                },
                changeContract: function (contract){
                    var self = this;

                    $('.selectContractWrap .selected').removeClass('selected');
                    $('.selectContractWrap .contract_' + contract).addClass('selected');

                    self.orderSummary.orderDetail.contract_id = contract;
                    elevate.lsData.orderDetail =  self.orderSummary.orderDetail;
                    elevate.updateElevateLSData();
                },

                isValidCart: function (){

                    var self = this;
                    var valid = true;


                    if(!self.orderSummary.orderDetail.contract_id || !self.orderSummary.orderDetail.color){
                        valid = false;
                    }

                    if(self.orderSummary.orderDetail.contract_id == self.ywos_contract){
                        valid = true;
                    }

                    return valid;

                },

                goNext: function(){
                    var self = this;
                    //check normal contract
                    if(self.orderSummary.orderDetail.contract_id == self.ywos_contract){
                        ywos.buyPlan(self.orderSummary.orderDetail.contract_id);
                    }else{
                        if(!self.orderSummary.orderDetail.contract_id || !self.orderSummary.orderDetail.color){
                            return false;
                        }
                        elevate.redirectToPage('eligibilitycheck');
                    }
                }

            }
        });
    });
</script>