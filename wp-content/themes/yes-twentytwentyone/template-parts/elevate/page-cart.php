<?php require_once 'includes/header.php' ?>

<header class="page-header">
    <div class="nav-container">
        <div class="container g-lg-0">
            <div class="row g-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <?php if (function_exists('display_yes_logo')) display_yes_logo(); ?>
                        <div class="justify-content-end" id="navbarSupportedContent">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#" class="mx-3">Help</a>
                                <!-- <?php if (function_exists('yes_language_switcher')) echo yes_language_switcher(); ?> -->
                                <a href="#" class="login-btn"><span class="iconify" data-icon="bx:bxs-cart"></span> <span id="totalItemCart">1</span> item</a>
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
        <div class="row mt-5 mb-5">
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
    <div id="container-hasItem" v-if="hasFetchPlan">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <h1 class="title">{{ orderSummary.product.selected.nameEN }}</h1>
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
                                        <div v-for="(image, index) in orderSummary.product.images" class="carousel-item" :class="(index==0)?'active':''">
                                            <img :src="image.img"
                                                 class="d-block w-100" alt="">
                                        </div>

                                    </div>

                                    <div class="carousel-indicators">
                                        <button v-for="(image, index) in orderSummary.product.images" type="button" data-bs-target="#productSlide" :data-bs-slide-to="index"
                                                :class="(index==0)?'active':''" aria-current="true" aria-label="Slide 1">
                                            <img :src="image.img"
                                                 width="60" height="70" class="d-block w-100"
                                                 alt="">
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="pad-mobile">
                                    <h2 class="subtitle">{{ orderSummary.product.selected.nameEN }}</h2>
                                    <div class="mt-3">
                                        <div class="text-bold">Capacity</div>
                                        <div class="hlv_3">
                                            {{ orderSummary.product.selected.capacity }}
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-bold">Plan</div>
                                        <div class="accordion-wrap hlv_3">
                                            <div class="accordion-header" @click="showPlanDetail()"> {{orderSummary.product.selected.plan.nameEN}} <i
                                                        class="icon icon_arrow_down"></i></div>
                                            <div class="text-description mt-3">{{orderSummary.product.selected.plan.shortDescriptionEN}}</div>
                                            <ul class="accordion-body list-1 mt-3" style="display: none">
                                                <li v-for="(list, index) in orderSummary.product.selected.plan.longDescriptionEN">{{list}}</li>
                                            </ul>
                                        </div>
                                        <div class="text-description mt-3">

                                        </div>
                                    </div>
                                    <div class="hr_line"></div>
                                    <div class="text-bold mt-3">Select color</div>
                                    <div class="selectColorWrap mt-3">
                                        <ul>
                                            <li v-for="(image, index) in orderSummary.product.images" @click="changeColor(image.color)"
                                                data-bs-target="#productSlide" :data-bs-slide-to="index" class="color_select" :class="'color-'+image.color +((orderSummary.orderDetail.color == image.color.toLowerCase())?' selected':'')"><a></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-bold mt-3" v-if="orderSummary.orderDetail.color">Select contract type</div>
                                    <div class="selectContractWrap mt-3" v-if="orderSummary.orderDetail.color">
                                        <ul>
                                            <li v-for="(contract, index) in orderSummary.product.colors[orderSummary.orderDetail.color]" @click="changeContract(contract.productCode)" :data-contract-id="contract.productCode" class="text-uppercase" :class="'contract_' + contract.productCode + ((parseFloat(orderSummary.orderDetail.productCode) == parseFloat(contract.productCode))?' selected':'')"><a>
                                                    <span v-if="contract.contractName == 'Normal'">Normal {{contract.contract}} Months</span>
                                                    <span v-else >Infinite {{contract.contract}} Months</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="hr_line"></div>
                                    <div class="text-note" v-if="orderSummary.orderDetail.productCode">
                                        <div v-for="(detail, index) in orderSummary.product.selected.productNoteEN">{{detail | trim}}</div>
                                    </div>
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
                                <h3>RM{{ formatPrice(orderSummary.orderDetail.total) }}/mth</h3>
                            </div>
                        </div>
                        <div class="monthly mb-4">
                            <div v-for="(item, index) in orderSummary.orderDetail.orderItems" class="row mt-2">
                                <div class="col-6">
                                    <p>{{item.name}}</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>RM{{formatPrice(item.price)}}/ mth</p>
                                </div>
                            </div>

                            <div class="hr_line"></div>
                            <div class="row mt-2 cart_bold" v-if="isUpfront">
                                <div class="col-6">
                                    <p>Upfront Payment</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>*RM{{ formatPrice(parseFloat(orderSummary.product.selected.upFrontPayment).toFixed(2)) }}</p>
                                </div>
                            </div>
                            <div class="row mt-2 cart_bold">
                                <div class="col-6">
                                    <p>Taxes (SST)</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>*RM{{ formatPrice(parseFloat(orderSummary.orderDetail.sstAmount).toFixed(2)) }}</p>
                                </div>
                            </div>
                            <div class="hr_line"></div>
                        </div>

                        <a href="javascript:void(0)" @click="goNext" class="pink-btn-disable d-block" :class="allowSubmit?'pink-btn':'pink-btn-disable'">Continue</a>
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

        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                elevateLSData: null,
                productId: null,
                isCartEmpty: false,
                hasFetchPlan: false,
                ywos_contract:"Normal",
                taxRate: {
                    sst: 0.06
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
                        sstAmount: 0.00,
                        color: null,
                        productCode: null,
                        orderItems:[]
                    },
                },
                packageInfos: [],
                currentStep: 0,
                elevate: null,
                allowSubmit: false,
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

                        if(elevate.lsData.product){
                            self.orderSummary.product = elevate.lsData.product;
                        }
                        if(elevate.lsData.orderDetail){
                            self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                        }

                        self.ajaxGetPlanData();

                    } else {
                        self.isCartEmpty = true;
                        self.hasFetchPlan = false;
                        $('#totalItemCart').text("0");
                        setTimeout(function() {
                            toggleOverlay(false);
                        }, 1500);
                    }

                },
                ajaxGetPlanData: function() {
                    var self = this;
                    toggleOverlay();
                    axios.get(apiEndpointURL_elevate + '/getProduct/?code=' + self.productId)
                        .then((response) => {
                            var data = response.data;
                            if (data.internetData == '∞') {
                                data.internetData = 'Unlimited';
                            }

                            self.orderSummary.product = data;

                            self.updatePlan();
                            self.hasFetchPlan = true;

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
                    self.orderSummary.orderDetail.productCode = self.orderSummary.product.selected.productCode;

                },
                updateSummary: function() {
                    var self = this;
                    var total = 0;

                    self.orderSummary.orderDetail.orderItems = [
                        {name: self.orderSummary.product.selected.nameEN + ' - ' + self.orderSummary.product.selected.color,price:parseFloat(self.orderSummary.product.selected.devicePriceMonth).toFixed(2)},
                        {name: self.orderSummary.product.selected.plan.nameEN,price:parseFloat(self.orderSummary.product.selected.planPerMonth).toFixed(2)},
                    ];

                    // total = parseFloat(self.orderSummary.product.selected.devicePriceMonth) + parseFloat(self.orderSummary.product.selected.planPerMonth);
                    total = parseFloat(self.orderSummary.product.selected.plan.monthlyAmount);
                    var sstAmount = parseFloat(self.orderSummary.product.selected.plan.sstAmount);
                    self.orderSummary.orderDetail.total = total.toFixed(2);
                    self.orderSummary.orderDetail.sstAmount = sstAmount.toFixed(2);
                    //console.log("selected product",self.orderSummary.product.selected);
                    //update store
                    self.isValidCart();

                },
                isUpfront: function (){
                    var self = this;
                    return (parseFloat(self.orderSummary.product.selected.upFrontPayment) > 0);
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

                    self.updateSummary();

                },
                changeContract: function (contract){
                    var self = this;

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

                isValidCart: function (){

                    var self = this;
                    var valid = true;


                    if(!self.orderSummary.orderDetail.productCode){
                        valid = false;
                    }

                    self.allowSubmit = valid;

                },

                goNext: function(){
                    var self = this;
                    //check normal contract
                    //console.log(self.orderSummary.orderDetail.productCode,self.orderSummary.product.selected.contractName);
                    //return ;
                    toggleOverlay();

                    if(self.orderSummary.product.selected.contractName == self.ywos_contract){
                        ywos.buyPlan(self.orderSummary.orderDetail.productCode);
                    }else{
                        if(!self.orderSummary.orderDetail.productCode){
                            return false;
                        }
                        elevate.lsData.product =  self.orderSummary.product;
                        elevate.lsData.orderDetail =  self.orderSummary.orderDetail;
                        elevate.updateElevateLSData();

                        elevate.redirectToPage('eligibilitycheck');
                    }
                }

            }
        });
    });

    function string_to_slug(str, separator) {
        str = str.trim();
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        const from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
        const to = "aaaaaaeeeeiiiioooouuuunc------";

        for (let i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
        }

        return str
            .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
            .replace(/\s+/g, "-") // collapse whitespace and replace by -
            .replace(/-+/g, "-") // collapse dashes
            .replace(/^-+/, "") // trim - from start of text
            .replace(/-+$/, "") // trim - from end of text
            .replace(/-/g, separator);
    }
</script>