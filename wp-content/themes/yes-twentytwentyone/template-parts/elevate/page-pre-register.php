<?php require_once 'includes/header.php' ?>


<style type="text/css">
    .layer-invitationText {
        margin: 0 0 30px;
    }

    .layer-invitationText h3 {
        margin: 0 0 15px;
    }

    .layer-invitationText p {
        margin-bottom: 0;
    }

    .layer-selectPlan {
        margin: 0 0 50px;
    }

    .layer-selectPlan .flex-nowrap {
        overflow-y: auto;
        padding: 0 0 15px;
    }

    .layer-planDevice {
        background-color: #FFF;
        border-radius: 10px;
        box-shadow: 0px 4px 10px 3px rgb(0 0 0 / 15%);
        height: 100%;
        padding: 40px 30px;
    }

    .layer-planDevice h2,
    .layer-planDevice h3 {
        font-size: 18px;
        line-height: 23px;
        letter-spacing: -0.02em;
        margin: 0 0 20px;
        text-align: center;
    }

    .layer-planDevice h3 {
        font-size: 20px;
        line-height: 22px;
    }

    .layer-planDevice p.panel-deviceImg {
        margin: 0 0 20px;
        text-align: center;
    }

    .layer-planDevice p.panel-deviceImg img {
        max-height: 148px;
    }

    .layer-planDevice p.panel-btn {
        margin: 0 0 20px;
        text-align: center;
    }

    .layer-planDevice p.panel-btn a,
    #cart-body .layer-planDevice p.panel-btn a {
        background-color: #2F3BF5;
        border-radius: 50px;
        color: #FFF !important;
        font-weight: 800;
        letter-spacing: 0.1em;
        padding: 8px 40px;
        text-transform: uppercase;
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
        #cart-body {
            padding: 30px 0;
        }
    }

    @media (min-width: 1200px) {
        .layer-selectPlan .flex-nowrap {
            overflow-y: visible;
            padding-bottom: 0;
        }

        .layer-planDevice h3 {
            font-size: 23px;
            line-height: 28px;
        }
    }
</style>


<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title_checkout p-3">Pre-Register</h1>
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
                    <span>1. Select Plan</span>
                </li>
                <li ui-sref="secondStep">
                    <span>2. Pay</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->

    <section id="cart-body" style="display: none;">
        <div class="container " style="border: 0">
            <div id="main-vue">
                <div class="layer-invitationText">
                    <h3>Dear {{ deliveryInfo.name }},</h3>
                    <p>We are pleased to invite you to our special promotion, just for you. Please select a plan, and proceed.</p>
                </div>
                <div class="subtitle mb-4">Select Plan</div>

                <div class="layer-selectPlan">
                    <div class="row flex-nowrap flex-xl-wrap gx-5">
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                            <div class="layer-planDevice">
                                <h2>Infinite+ Basic 99</h2>
                                <h3>XIAOMI Redmi 10</h3>
                                <p class="panel-deviceImg"><img src="https://site.yes.my/wp-content/uploads/2021/09/Xiaomi-Redmi-10.jpg" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(8960)" data-productid="8960">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                            <div class="layer-planDevice">
                                <h2>Infinite+ Standard 128</h2>
                                <h3>SAMSUNG A33</h3>
                                <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/samsung-a33.jpg" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(8980)" data-productid="8980">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                            <div class="layer-planDevice">
                                <h2>Infinite+ Premium 188</h2>
                                <h3>SAMSUNG S22 Ultra</h3>
                                <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/samsung-s22-ultra-black.png" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(9000)" data-productid="9000">Select</a></p>
                            </div>
                        </div>


                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                            <div class="layer-planDevice">
                                <h2>Infinite+ Standard 128</h2>
                                <h3>SAMSUNG A33</h3>
                                <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/samsung-a33.jpg" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(8980)" data-productid="8980">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                            <div class="layer-planDevice">
                                <h2>Infinite+ Premium 188</h2>
                                <h3>SAMSUNG S22 Ultra</h3>
                                <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/samsung-s22-ultra-black.png" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(9000)" data-productid="9000">Select</a></p>
                            </div>
                        </div>
                        <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                            <div class="layer-planDevice">
                                <h2>Infinite+ Basic 99</h2>
                                <h3>XIAOMI Redmi 10</h3>
                                <p class="panel-deviceImg"><img src="https://site.yes.my/wp-content/uploads/2021/09/Xiaomi-Redmi-10.jpg" /></p>
                                <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-selectPlan" v-on:click="selectPlan(8960)" data-productid="8960">Select</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layer-planDetails" id="section-planDetails" style="display: none;">
                    <div class="subtitle mb-4">Plan Details</div>
                    <div class="row gx-5">
                        <div class="col-lg-8 col-12">
                            <div class="border-box">
                                <div class="row">
                                    <div class="col-md-3 leftColor">
                                        <div class="p-3"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png?x41595" width="150"></div>
                                    </div>
                                    <div class="col-md-9 p-4">
                                        <div class="row mt-3">
                                            <div class="col-md-9">
                                                <div class="text-20">
                                                    <div class="subtitle2" style="margin-bottom: 0px;">Samsung S22 Ultra</div>
                                                    <div class="subtitle2">Infinite+ Premium 188</div>
                                                </div>
                                                <div class="hr_line"></div>
                                                <div class="text-bold">
                                                    Infinite+
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 col-12">
                                    <div class="border-box" style="width: 100%; padding: 20px;">
                                        <div class="subtitle2">Plan</div>
                                        <div class="accordion-wrap hlv_3">
                                            <div class="accordion-header" v-on:click="showPlanDetail()"> Infinite+ Premium 188 <i class="icon icon_arrow_down"></i></div>
                                            <div class="text-description mt-3">Infinite+ Premium 188</div>
                                            <ul class="accordion-body list-1 mt-3" style="overflow: hidden; display: block;">
                                                <li>250GB 4G Data</li>
                                                <li>Bonus: Unlimited 5G Data until 31st March 2022</li>
                                                <li>Unlimited On-net Voice and Off-net Voice</li>
                                                <li>Unlimited On-net SMS and pay-as-you-use Offnet SMS </li>
                                            </ul>
                                        </div>
                                        <div class="text-description mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3 mb-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mt-3 item_info">
                                            <div class="label text-bold">To: {{ deliveryInfo.name }}</div>
                                            <div class="content">
                                                <div>{{ deliveryInfo.email }}</div>
                                                <div>+60 {{ deliveryInfo.phone }}</div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 item_info">
                                            <div class="label">Delivery Address</div>
                                            <div class="content">
                                                <span v-if="deliveryInfo.addressMore">{{ deliveryInfo.addressMore }},</span> {{deliveryInfo.address}}, <br />
                                                {{deliveryInfo.city}}, <br />
                                                {{deliveryInfo.state}}, <br />
                                                {{deliveryInfo.postcode}}, {{deliveryInfo.country}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div style="float: right;"><a href="/elevate/personal" class="btn-edit">(Edit)</a></div> -->
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
                                        <h3>RM188.00/mth</h3>
                                    </div>
                                </div>
                                <div class="monthly mb-4">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <p>Samsung S22 Ultra - Black</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM0.00/ mth</p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <p>Infinite+ Premium 188</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM188.00/ mth</p>
                                        </div>
                                    </div>
                                    <div class="hr_line"></div>
                                    <div class="row mt-2 ">
                                        <div class="col-1"><input type="checkbox" id="subscribe" name="subscribe" value="1" v-on:change="watchAllowNext" /></div>
                                        <div class="col-11 text-12">
                                            <label for="subscribe" style="cursor: pointer; font-size: 12px; line-height: 14px;">I here by agree to subscribe to the plan selected in the online form submitted by me, and to be bound by the First to 5G Campaign Terms and Conditions available at <a target="_blank" href="https://www.yes.my/tnc/ongoing-campaigns-tnc">www.yes.my/tnc/ongoing-campaigns-tnc</a>.</label>
                                        </div>
                                    </div>
                                    <div class="row mt-2 ">
                                        <div class="col-1"><input type="checkbox" id="consent" name="consent" value="1" v-on:change="watchAllowNext" /></div>
                                        <div class="col-11 text-12">
                                            <label for="consent" style="cursor: pointer; font-size: 12px; line-height: 14px;">I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a target="_blank" href="https://www.ytl.com/privacypolicy.asp">www.ytl.com/privacypolicy.asp</a>.</label>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-12">
                                            <button class="pink-btn-disable d-block text-uppercase w-100" :class=" allowSubmit?'pink-btn':'pink-btn-disable'" v-on:click="goNext" type="button">Order</button>
                                            <div id="error" class="mt-3"></div>
                                        </div>
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


<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                selectedPlanID: '',
                deliveryInfo: {
                    uid: '',
                    productId: '',
                    mykad: '',
                    name: 'John Doe',
                    phone: '187001234',
                    email: 'john.doe@domain.com',
                    address: 'Jalan Bukit Bintang',
                    addressMore: 'Menara YTL, 205',
                    addressLine: '',
                    postcode: '51200',
                    state: 'Wilayah Persekutuan-Kuala Lumpur',
                    stateCode: '',
                    city: 'Kuala Lumpur',
                    cityCode: '',
                    country: 'Malaysia',
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
                orderSummary: {
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems: []
                    },
                },
                allowSubmit: false
            },
            created: function() {
                var self = this;
                setTimeout(function() {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function() {
                    setTimeout(function() {
                        $('#cart-body').show();
                        toggleOverlay(false);
                    }, 500);
                },
                selectPlan: function(selectedPlanID = 0) {
                    var self = this;
                    toggleOverlay();
                    self.selectedPlanID = selectedPlanID;
                    setTimeout(function() {
                        self.orderSummary.product = {

                        };
                        $('#section-planDetails').show();
                        self.jumpToSection('section-planDetails');
                        toggleOverlay(false);
                    }, 1000);
                },
                jumpToSection: function(sectionID) {
                    var targetSection = $('#' + sectionID);
                    if (targetSection.length > 0) {
                        var targetOffset = $(targetSection).offset().top;
                        $('html, body').animate({
                            scrollTop: targetOffset
                        }, 100);
                    }
                    return false;
                },
                showPlanDetail: function() {
                    $('.accordion-wrap').toggleClass("active");
                    $(".accordion-body").slideToggle();
                },
                watchAllowNext: function() {
                    var self = this;
                    if ($('#subscribe').is(':checked') && $('#consent').is(':checked')) {
                        self.allowSubmit = true
                    } else {
                        self.allowSubmit = false
                    }
                },
                goNext: function() {
                    var self = this;
                    if (self.allowSubmit) {
                        toggleOverlay();
                        // elevate.redirectToPage('contract');
                    }
                }
            }
        });
    });
</script>

<?php require_once('includes/footer.php'); ?>