<?php require_once 'includes/header.php' ?>

<style type="text/css">
    .nav-container .navbar { padding-top: 8px; padding-bottom: 8px; }
    .deviceContract-text{font-size: 14.5px !important;}
    .eSIM {
        background: #FFFFFF;
        box-shadow: 1px 1px 20px 0px rgba(112, 144, 176, 0.25);
        border-radius: 8px;
        padding: 32px 32px 20px 20px;
        gap: 10px;
        font-family: 'Nunito Sans';
        font-style: normal;
        color: #525252;
        display: flex;
        align-items: start;
    }

    .eSIM  p {
        font-weight: 700 !important;
        font-size: 12px !important;
        line-height: 20px !important;
        color: #525252 !important;
        margin-bottom: 9px !important;
    }
    .eSIM  h6{
     font-size: 20px;
    font-weight: 700;
    line-height: 20px;
    color:#525252;
    }
    .color-orange a{
    background: #FF5733 !important;
}
.color-yellow a{
	background: #f9f7aa !important;
}
.color-light-blue a{
background: #4d5166;
}
.color-v_blue a {
    background: #a7c9d2;
}
.color-v-blue a {
    background: #a7c9d2;
}
.color-ocean-teal a {
    background: #29777B;
}
</style>
<div id="main-vue">
<header class="page-header">
    <div class="nav-container">
        <div class="container g-lg-0">
            <div class="row g-0">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand d-flex justify-content-start py-0" href="/"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/03/yes-logo-new-white.png" class="logo-top"></a>
                        <div class="justify-content-end" id="navbarSupportedContent">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#" class="mx-3">{{ renderText('help') }}</a>
                                <!-- <?php if (function_exists('yes_language_switcher')) echo yes_language_switcher(); ?> -->
                                <a href="#" class="login-btn"><span class="iconify" data-icon="bx:bxs-cart"></span> <span id="totalItemCart">1</span> {{ renderText('items') }}</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div>
<main class="clearfix site-main" id="primary" >
    <div id="container-empty" v-if="isCartEmpty">
        <section id="grey-innerbanner">
            <div class="container">
                <h1 class="title">Yes Infinite+ Cart</h1>
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
                                <h3 class="mt-5 mt-lg-0">{{ renderText('no_item_in_cart') }}</h3>
                                <p class="mb-3" v-html="renderText('browse_plan_here')"></p>
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
            <h1 class="title">{{ orderSummary.product.selected.name }}</h1>
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
                                    <h2 class="subtitle">{{ orderSummary.product.selected.name }}</h2>
                                    <div class="mt-3">
                                        <div class="text-bold">{{ renderText('capacity') }}</div>
                                        <div class="hlv_3">
                                            {{ orderSummary.product.selected.capacity }}
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-bold">{{ renderText('plan') }}</div>
                                        <div class="accordion-wrap hlv_3">
                                            <div class="accordion-header" @click="showPlanDetail()"> {{orderSummary.product.selected.plan.name}} <i
                                                        class="icon icon_arrow_down"></i></div>
                                            <div class="text-description mt-3">{{orderSummary.product.selected.plan.shortDescription}}</div>
                                            <!-- <ul class="accordion-body list-1 mt-3">
                                                <li v-for="(list, index) in orderSummary.product.selected.plan.longDescriptionEN">{{list}}</li>
                                            </ul> -->
                                            <ul class="accordion-body list-1 mt-3" v-if="getLang!='ms-MY'" >
                
                                                <li v-for="(list, index) in orderSummary.product.selected.plan.longDescriptionEN">{{list}}</li>
                                            </ul>
                                            <ul class="accordion-body list-1 mt-3" v-else>
                                                <li v-for="(list, index) in orderSummary.product.selected.plan.longDescriptionBM">{{list}}</li>
                                            </ul>
                                        </div>
                                        <div class="text-description mt-3">

                                        </div>
                                    </div>
                                    <div class="hr_line"></div>
                                    <div class="text-bold mt-3">{{ renderText('select_color') }}</div>
                                    <div class="selectColorWrap mt-3">
                                        <ul>
                                            <li v-for="(image, index) in orderSummary.product.images" @click="changeColor(image.color)"
                                                data-bs-target="#productSlide" :data-bs-slide-to="index" class="color_select" :class="'color-'+image.color +((orderSummary.orderDetail.color == image.color.toLowerCase())?' selected':'')"><a></a></li>
                                        </ul>
                                    </div>
									<div style="display:none;">
                                    <div class="text-bold mt-3" v-if="orderSummary.orderDetail.color">{{ renderText('select_contract_type') }}</div>
                                    <div class="selectContractWrap mt-3" v-if="orderSummary.orderDetail.color">
                                        <ul>
                                            <li v-for="(contract, index) in orderSummary.product.colors[orderSummary.orderDetail.color]" @click="changeContract(contract.productCode)" :data-contract-id="contract.productCode" class="text-uppercase" :class="'contract_' + contract.productCode + ((parseFloat(orderSummary.orderDetail.productCode) == parseFloat(contract.productCode))?' selected':'')"><a>
                                                    <span v-if="contract.contractName == 'Normal'">Normal {{contract.contract}} Months</span>
                                                    <span v-else >Elevate {{contract.contract}} Months</span>
                                                </a></li>
                                        </ul>
                                    </div>
									</div>
                                    <div class="hr_line"></div>
                                    <!-- <div class="text-note" v-if="orderSummary.orderDetail.productCode">
                                        <div v-for="(detail, index) in orderSummary.product.selected.productNote">{{detail | trim}}</div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="summary-box">
                        <h1 class="subtitle">{{ renderText('order_summary') }}</h1>
                        <h3 class="plan_price">{{ renderText('monthly_payment') }}</h3>
                        <div class="hr_line"></div>
                        <div class="row cart_total">
                            <div class="col-4 pt-2 pb-2">
                                <h3>{{ renderText('total') }}</h3>
                            </div>
                            <div class="col-8 pt-2 pb-2 text-end">
                                <h3>RM{{ formatPrice(orderSummary.orderDetail.subtotal) }}/mth</h3>
                            </div>
                        </div>
                        <div class="monthly mb-4">
                            <div v-for="(item, index) in orderSummary.orderDetail.orderItems" class="row mt-2">
                                <div class="col-6">
                                    <p>{{item.name}}</p>
                                    <small class="deviceContract-text" v-if="index == 0 && parseFloat(item.price) > 0.00">{{renderText('deviceContract')}}</small>
                                </div>
                                <div class="col-6 text-end">
                                    <p>RM{{formatPrice(item.price)}}/ mth</p>
                                </div>
                            </div>
                        </div>
                        <!-- Model Notify Me STARTS -->
                        <div class="modal fade" tabindex="-1" id="modal-notify">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Notify Me!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-3">Enter your email address to get notified on the stock availability of this phone. {{orderSummary.product.selected.name}}</p>
                                    <?php echo do_shortcode('[Form id="10"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Model Notify Me ENDS -->
                    <div class="eSIM" v-if="(StockBalance == 0)">
                        <img src="/wp-content/uploads/2023/09/exclamation-circle-Regular-1.png" alt="...">
                     <div>
                      <h6>This device is temporarily out of stock. </h6>
                      <p>Click below to be notified of when this device is available.</p>
                      </div>
                    </div>

                         <!-- ----------- -->
                           <div>
                                <div v-if="(StockBalance == 0)">
                                    <a href="javascript:void(0)" @Click="triggerModalNotify" class="pink-btn text-uppercase d-block" >NOTIFY ME</a>
                                </div>
                                <div v-else>
                                    <a href="javascript:void(0)" @click="goNext" class="pink-btn text-uppercase d-block" >{{ renderText('checkout') }}</a>
                                </div>
                           </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</main>
</div>
</div>
<?php require_once('includes/footer.php'); ?>
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
                StockBalance:1,
                elevateLSData: null,
                productId: null,
                getLang:null,
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
                            name:'',
                            nameEN:'',
                            shortDescription:'',
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
                                name:'',
                                shortDescription:'',
                            }
                        },
                        colors:[]
                    },
                    orderDetail: {
                        subtotal: 0.00,
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
                        self.getLang = elevate.lsData.siteLang;
                        self.productId = elevate.lsData.meta.productId;
                        self.dealer = elevate.lsData.meta.dealer;

                        if(elevate.lsData.product){
                            self.orderSummary.product = elevate.lsData.product;
                        }
                        if(elevate.lsData.orderDetail){
                            self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                        }

                        self.ajaxGetPlanData();

                    } else {
                        self.isCartEmpty = true;

                        $('#totalItemCart').text("0");
                        setTimeout(function() {
                            $('#container-hasItem').show();
                            $('#main-vue').css({'height':'auto'});
                            toggleOverlay(false);
                        }, 1500);
                    }

                },
                ajaxGetPlanData: function() {
                    var self = this;
                    toggleOverlay();
                    axios.get(apiEndpointURL_elevate + '/getProduct/?code=' + self.productId + '&nonce='+yesObj.nonce)
                        .then((response) => {
                            var data = response.data;
                            
                            if (data.internetData == '∞') {
                                data.internetData = 'Unlimited';
                            }

                            var filteredBalance = data.images.filter((image) => { return data.colors[image.color][0].balance >= 0; })
                            data.images = filteredBalance;

                            
                            data = self.updateLang(data);

                            self.orderSummary.product = data;
                                self.StockBalance=data.selected.balance;

                            self.updatePlan();
                            $('#container-hasItem').show();
                            $('#main-vue').css({'height':'auto'});

							setTimeout(function(){
								$('.selectColorWrap li:first-child').trigger("click");
							},100);

                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        })
                },
                updateLang: function (data){
                    switch (elevate.getCurrentLang()){
                        case 'ms-MY':
                            data.selected.name = data.selected.nameBM;
                            data.selected.shortDescription = data.selected.shortDescriptionBM;
                            data.selected.longDescription = data.selected.longDescriptionBM;
                            data.selected.productNote = data.selected.productNoteBM;

                            data.selected.plan.name = data.selected.plan.nameBM;
                            data.selected.plan.shortDescription = data.selected.plan.shortDescriptionBM;
                            data.selected.plan.longDescription = data.selected.plan.longDescriptionBM;
                            break;
                        default:
                            data.selected.name = data.selected.nameEN;
                            data.selected.shortDescription = data.selected.shortDescriptionEN;
                            data.selected.longDescription = data.selected.longDescriptionEN;
                            data.selected.productNote = data.selected.productNoteEN;

                            data.selected.plan.name = data.selected.plan.nameEN;
                            data.selected.plan.shortDescription = data.selected.plan.shortDescriptionEN;
                            data.selected.plan.longDescription = data.selected.plan.longDescriptionEN;
                            break;
                    }
                    return data;
                },

                updatePlan: function() {
                    var self = this;

                    self.updateSummary();
                    self.orderSummary.orderDetail.productCode = self.orderSummary.product.selected.productCode;

                },
                updateSummary: function() {
                    var self = this;
                    var total = 0;

                    self.orderSummary.orderDetail.orderItems = [
                        {name: self.orderSummary.product.selected.name + ' - ' + self.orderSummary.product.selected.color,price:parseFloat(self.orderSummary.product.selected.devicePriceMonth).toFixed(2)},
                        {name: self.orderSummary.product.selected.plan.name,price:parseFloat(self.orderSummary.product.selected.plan.monthlyAmount).toFixed(2)},
                    ];

                    var subtotal = parseFloat(self.orderSummary.product.selected.devicePriceMonth) + parseFloat(self.orderSummary.product.selected.plan.monthlyAmount);

					var amount = parseFloat(self.orderSummary.product.selected.plan.monthlyAmount);
                    var sstAmount = parseFloat(self.orderSummary.product.selected.plan.sstAmount);
                    var rounding = parseFloat(self.orderSummary.product.selected.plan.roundingAdjustment);
                    self.orderSummary.orderDetail.amount = amount.toFixed(2);
					var total =  subtotal +  sstAmount + rounding;
                    self.orderSummary.orderDetail.total = total.toFixed(2);
                    self.orderSummary.orderDetail.sstAmount = sstAmount.toFixed(2);
                    self.orderSummary.orderDetail.roundingAdjustment = rounding.toFixed(2);
					self.orderSummary.orderDetail.subtotal = subtotal.toFixed(2);
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
                    // self.StockBalance
                    // console.log(self.orderSummary.product.selected.balance);
                    // alert(self.orderSummary.product.selected.balance);
                    $('.selectColorWrap .selected').removeClass('selected');
                    $('.selectColorWrap .color-'+color).addClass('selected');
                    self.orderSummary.orderDetail.color = color;

                    self.updateSummary();
					setTimeout(function(){
						$('.selectContractWrap li:first-child').trigger("click");
					},100);

                },
                changeContract: function (contract){
                    var self = this;

                    $('.selectContractWrap .selected').removeClass('selected');
                    $('.selectContractWrap .contract_' + contract).addClass('selected');

                    self.orderSummary.orderDetail.productCode = contract;
                    self.orderSummary.product.selected = self.selectedProduct(self.orderSummary.orderDetail.color,contract);
                    self.StockBalance = self.orderSummary.product.selected.balance;
                    
                    self.orderSummary.product = self.updateLang(self.orderSummary.product);

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

                renderText: function(strID) {
                    return elevate.renderText(strID, Elevate_lang);
                },
                goNext: function(){
                    var self = this;
                    //check normal contract
                    //console.log(self.orderSummary.orderDetail.productCode,self.orderSummary.product.selected.contractName);
                    //return ;

                    if(!self.allowSubmit) return ;

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
                        self.sendAnalytics();
                        setTimeout(function() {
                            elevate.redirectToPage('eligibilitycheck');
                        }, 2000);
                    }
                },
                sendAnalytics: function() {
                    var self = this;
                    var pushData = [];
                    pushData.push({
                        'name': self.orderSummary.product.selected.nameEN + ' - ' + self.orderSummary.product.selected.color,
                        'id': self.orderSummary.product.selected.code,
                        'category': 'DEVICE',
                        'price': parseFloat(self.orderSummary.product.selected.devicePriceMonth).toFixed(2)
                    });
                    pushData.push({
                        'name': self.orderSummary.product.selected.plan.nameEN,
                        'id': self.orderSummary.product.selected.plan.planId,
                        'category': self.orderSummary.product.selected.plan.planType,
                        'price': parseFloat(self.orderSummary.product.selected.plan.monthlyAmount).toFixed(2)
                    });

                    pushAnalytics('addToCart', pushData);
                    pushAnalytics('checkout', pushData);

                    elevate.lsData.analyticItems =  pushData;
                    elevate.updateElevateLSData();
                },
             triggerModalNotify: function(phoneModel='') {
                
                const modalBody = document.querySelector('.modal-body');
                const paragraph = modalBody.querySelector('p.mb-3');
                const DeviceName = paragraph.textContent.trim();
                var  phoneModel = DeviceName.split('.').pop().trim();
                var modalNotify = new bootstrap.Modal(document.getElementById('modal-notify'), {});
                $('#wdform_3_element10').val(phoneModel);
                modalNotify.show();
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