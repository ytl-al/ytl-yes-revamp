<?php require_once('includes/header.php') ?>
<style>
#cart-body .nav-pills .nav-link.active {
    color: #FF0084 !important;
    border: 0 !important;
    border-bottom: 8px solid #FF0084 !important;
}
</style>
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
                    <span>2. MyKAD verification</span>
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
                <div class="border-box pad-mobile">
                    <div class="text-center p-lg-5">
                        <h2 class="subtitle mt-3">Sorry! We ran a check and you did not pass our ID verification</h2>
                        <p style="max-width: 750px; margin: auto">
                            It seems like you did not qualify, however we’ve picked out some other<br> plans that you might be interested in.
                        </p>
                    </div>
                    <div class="tabs_content">
                        <div class="plan_tabs">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" onclick="changeTab(this,'postpaid')">Postpaid</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="changeTab(this,'prepaid')">Prepaid</a>
                                </li>
                            </ul>
                        </div>
                        <div id="tab-postpaid" class="mt-3 p-lg-5 tabcontent">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="plan-item p-3" data-planid="707">
										<div>Postpaid 49</div>
                                        <div class="subtitle">RM49 for 100GB<span class="circle"><i class=""></i></span></div>
                                        <ul class="plan-list mt-3 mb-3">
                                            <li>100GB</li>
                                            <li>24 months Contract</li>
                                            <li>Kasi Up rewards</li>
                                            <li>6 months free</li>
                                            <li>4G paling power</li>
                                            <li>Unlimited borak</li>
                                        </ul>
                                        <br/>
                                        <div class="plan_price">RM49 for 100GB</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="plan-item p-3" data-planid="706">
										<div>Postpaid 49(No Contract)</div>
                                        <div class="subtitle">RM49 for 100GB<span class="circle"><i class=" "></i></span></div>
                                        <ul class="plan-list mt-3 mb-3">
                                            <li>100GB</li>
                                            <li>Kasi Up rewards</li>
                                            <li>4G paling power</li>
                                            <li>Unlimited borak</li>
                                        </ul>
                                        <br/><br/><br/>
                                        <div class="plan_price">RM49 for 100GB</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="plan-item p-3" data-planid="708">
									<div>Postpaid 15 Phone Bundle 12m</div>
                                        <div class="subtitle">RM15 for 10GB<span class="circle"><i class=" "></i></span></div>
                                        <ul class="plan-list mt-3 mb-3">
                                            <li>20GB</li>
                                            <li>24 Months</li>
                                            <li>Kasi Up rewards</li>
                                            <li>Free YES phone</li>
                                            <li>4G paling power</li>
                                            <li>On-Net: Unlimited<br>
                                                Off-Net: RM 0.09</li>
                                        </ul>
                                        <div class="plan_price">RM15 for 10GB</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-prepaid" class="mt-3 p-lg-5 tabcontent" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="plan-item p-3" data-planid="710">
										<div>Prepaid 15</div>
                                        <div class="subtitle">RM15 for 10GB<span class="circle"><i class=""></i></span></div>
                                        <ul class="plan-list mt-3 mb-3">
                                            <li>10GB</li>
                                            <li>Kasi Up rewards</li>
                                            <li>30 day validity</li>
                                            <li>Lowest RM per GB</li>
                                            <li>4G paling power</li>
                                            <li>No hidden fees</li>
                                        </ul><br/>
                                        <div class="plan_price">RM15 for 10GB</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="plan-item p-3" data-planid="767">
									<div>Prepaid Unlimited</div>
                                        <div class="subtitle">RM30 for Unlimited</br>
                                            <span class="circle"><i class=""></i></span></div>
                                        <ul class="plan-list mt-3 mb-3">
                                            <li>20GB</li>
                                            <li>Kasi Up rewards</li>
                                            <li>30 day validity</li>
                                            <li>Lowest RM per GB</li>
                                            <li>4G paling power</li>
                                            <li>No hidden fees</li>
                                        </ul><br/>
                                        <div class="plan_price">RM30 for Unlimited</div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="p-lg-5 text-end">
                            <a id="btnChoosePlan" @click="goNext" class="pink-btn-disable mr-2 text-uppercase">choose plan</a>
                            <a href="/infinite-phone-bundles/" id class="btn-cancel text-uppercase ">Cancel</a>

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
                selectedPlan:0,
                taxRate: {
                    sst: 0.06
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

                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                redirectYWOS:function (){
                    var self = this;
                    toggleOverlay();
                    ywos.buyPlan(self.selectedPlan);
                },
                goNext: function(){
                    var self = this;
                    self.selectedPlan = selectedPlan;
                    if(self.selectedPlan){
                        self.redirectYWOS()
                    }
                }
            }
        });
    });
</script>

<script type="text/javascript">
    var selectedPlan = 0;
    $(document).ready(function () {
        $(document).on('click', '.plan-item', function () {
            selectedPlan = $(this).data('planid');
            $('#btnChoosePlan').removeClass('pink-btn-disable');
            $('#btnChoosePlan').addClass('pink-btn');
            $('.plan-item-selected').removeClass('plan-item-selected');
            $(this).addClass('plan-item-selected');
        });

    });

    function changeTab(obj, tab) {
        $('.plan_tabs .active').removeClass('active');
        $(obj).addClass('active');
        $('.tabs_content .tabcontent').hide();
        $('#tab-' + tab).show();
    }
</script>