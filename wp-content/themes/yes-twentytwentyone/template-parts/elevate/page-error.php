<?php require_once('includes/header.php') ?>
<div id="main-vue">
<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> {{ renderText('back') }}</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3">{{ renderText('error') }}</h1>
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
            <section id="grey-innerbanner">
                <div class="container">
                    <ul class="wizard">
                        <li ui-sref="firstStep" class="completed">
                            <span>{{ renderText('elevate_step_1') }}</span>
                        </li>
                        <li ui-sref="secondStep">
                            <span>{{ renderText('elevate_step_2') }}</span>
                        </li>
                        <li ui-sref="thirdStep">
                            <span>{{ renderText('elevate_step_3') }}</span>
                        </li>
                        <li ui-sref="fourthStep">
                            <span>{{ renderText('elevate_step_4') }}</span>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </section>
    <!-- Banner End -->

    <section id="cart-body">
        <div class="container" style="border: 0">

            <div class="verify-body p-lg-5">
                <div class="mt-5 mb-5">

                    <?php if($_GET['ca']=='failure'):?>
                        <h1 class="title mt-3 mb-3">{{ renderText('eligibility_check_unsuccessful') }}</h1>
                        <p v-html="renderText('page_error_label1')"></p>
                    <?php else:?>
                        <h1 class="title mt-3 mb-3">{{ renderText('EKYC_check_unsuccessful') }}</h1>
                        <p v-html="renderText('page_error_label2')"></p>
                    <?php endif;?>
                </div>
                <div class="mt-5 mb-5 text-center">
                    <a href="/elevate/eligibilitycheck" class="btn-black w130" style="margin-right:10px;">{{ renderText('retry') }}</a>
                    <a href="https://www.yes.my/support/store-locator/" target="_blank" class="btn-black w180">{{ renderText('yes_store_location') }}</a>
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

                        if (elevate.lsData.orderSummary) {
                            self.orderSummary = elevate.lsData.orderSummary;
                        }
                        if(elevate.lsData.orderDetail){
                            self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                        }

                        self.productId = elevate.lsData.product.selected.productCode;


                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                renderText: function(strID) {
                    return elevate.renderText(strID, Elevate_lang);
                }
            }
        });
    });
</script>
<script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll("[data-bs-toggle=\"tooltip\"]"))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>