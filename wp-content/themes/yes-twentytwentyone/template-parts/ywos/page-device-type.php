<?php include(get_stylesheet_directory() . '/template-parts/elevate/includes/header.php'); ?>

<style type="text/css">
    .nav-container .navbar {
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .main-content {
        height: 100vh;
    }

    .ytl_vue-content-load {
        display: none;
    }

    .cart_total h3{
        font-weight: 900 !important;
    }

    #cart-body h2 {
        font-weight: 900 !important;
        margin-bottom: 10px !important;
    }

    .accordion-header {
        cursor: pointer !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
        gap: 5px !important;
    }

    .accordion-body {
        margin: 10px 0 !important;
    }

    #cart-body p{
        font-weight: 600 !important;
    }

    .main-content.page-main-content-loaded{
        height: auto !important;
    }

     @media(max-width:768px){
        .page-footer .row {
            gap: 15px;
        }
        
        .page-footer .row > div {
            justify-content: center !important;
            align-items: center !important;
            gap: 15px;
        }
     }
</style>
<main class="main-content">
    <header class="page-header">
        <div class="nav-container">
            <div class="container g-lg-0">
                <div class="row g-0">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container">
                            <a class="navbar-brand d-flex justify-content-start py-0" href="/"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/03/yes-logo-new-white.png" class="logo-top"></a>
                            <div class="justify-content-end" id="navbarSupportedContent">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="#" class="mx-3" data-render-text="help">Help</a>
                                    <a href="#" class="login-btn"><span class="iconify" data-icon="bx:bxs-cart"></span> <span id="totalItemCart">1 </span> <span data-render-text="items"> Items </span></a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="ytl_vue-content-load">
        <div id="main-vue">
            <section id="grey-innerbanner">
                <div class="container">
                    <h1 class="title">{{deviceData.device_name}}</h1>
                </div>
            </section>
            <section id="cart-body">
                <div class="container body_container no-border p-0">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="product-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="productSlide" data-bs-interval="false" data-ride="carousel" data-pause="hover" class="carousel slide">
                                            <div class="carousel-inner">
                                                <div v-for="(plan, index) in deviceData.planData" class="carousel-item" :class="(index==0)?'active':''">
                                                    <img :src="plan.device_image" alt="" class="d-block w-100" />
                                                </div>
                                            </div>
                                            <div class="carousel-indicators">
                                                <button v-for="(plan, index) in deviceData.planData" type="button" data-bs-target="#productSlide" :data-bs-slide-to="index" :class="(index==0)?'active':''" aria-current="true" aria-label="Slide 1">
                                                    <img :src="plan.device_image" width="60" height="70" alt="" class="d-block w-100" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="pad-mobile">
                                            <h2 class="subtitle">{{deviceData.device_name}}</h2>
                                            <div class="mt-3">
                                                <div class="text-bold">{{renderText('capacity')}}</div>
                                                <div v-for="capacity in deviceData.capacity" class="hlv_3">{{capacity}}</div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="text-bold">{{renderText('plan')}}</div>
                                                <div class="accordion-wrap hlv_3">
                                                    <div class="accordion-header" @click="showPlanDetail()">
                                                        {{deviceData.plan_name}}
                                                        <i class="icon icon_arrow_down"></i>
                                                    </div>
                                                    <!-- <div class="text-description mt-3">
                                                    Infinite Plus Basic
                                                </div> -->
                                                    <ul class="accordion-body list-1 mt-3" v-if="selectedPlanData.planDetails.length > 0">
                                                        <li v-for="detail in selectedPlanData.planDetails">{{detail}}</li>
                                                    </ul>
                                                </div>
                                                <div class="text-description mt-3"></div>
                                            </div>
                                            <div class="hr_line"></div>
                                            <div class="text-bold mt-3">{{renderText('select_color')}}</div>
                                            <div class="selectColorWrap mt-3">
                                                <ul>
                                                    <li v-for="(plan, index) in deviceData.planData" v-on:click="changePlan(index)" data-bs-target="#productSlide" :data-bs-slide-to="index" :class="'color_select color-'+plan.color_name.toLowerCase() +((selectedPlanData.color_name.toLowerCase() == plan.color_name.toLowerCase())?' selected':'')">
                                                        <a :style="'background:'+plan.color_code+';'"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="hr_line"></div>
                                            <div class="text-note">
                                                <div v-for="remark in deviceData.remark">
                                                    {{remark}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="summary-box">
                                <h1 class="subtitle">{{renderText('order_summary')}}</h1>
                                <h6>{{renderText('order_summary_subtext')}}</h6>
                                <div class="hr_line"></div>
                                <div class="row cart_total">
                                    <div class="col-4 pt-2 pb-2">
                                        <h3>{{renderText('total')}}</h3>
                                    </div>
                                    <div class="col-8 pt-2 pb-2 text-end">
                                        <h3>RM{{ selectedPlanData.totalAmount }}</h3>
                                    </div>
                                </div>
                                <div class="monthly mb-4 d-none">
                                    <div class="row mt-2">
                                        <div class="col-6 text-capitalize">
                                            <p>{{deviceData.device_name}} - {{selectedPlanData.color_name}}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM0.00</p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <p>{{renderText('due_monthly')}}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ parseFloat(selectedPlanData.monthlyCommitment).toFixed(2)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" @click="goToCartPage" class="pink-btn-disable text-uppercase d-block pink-btn">{{renderText('add_to_cart')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
<?php include(get_stylesheet_directory() . '/template-parts/elevate/includes/footer.php'); ?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-render-text]').each(function() {
            const pageText = {
                help: {
                    'en-US': 'Help',
                    'ms-MY': 'Tolong',
                    'zh-hans': 'Help'
                },
                items: {
                    'en-US': 'Items',
                    'ms-MY': 'Barang',
                    'zh-hans': 'Items'
                },
            }
            const renderText = ywos.renderText(jQuery(this).data('render-text'), pageText);
            $(this).html(renderText);
        });
        setTimeout(function() {
            $('#primary').show();
        }, 500);
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                deviceData: {
                    capacity: [],
                    details: [],
                    device_name: '',
                    planData: [],
                    plan_name: [],
                    remark: []
                },
                productId: null,
                selectedPlanData: {
                    color_name: '',
                    color_code: '',
                    monthlyCommitment: '',
                    totalAmount: '',
                    plan_id: '',
                    planDetails: []
                },
                ywos: null,
                ywosLSName: 'yesYWOS',
                pageText: {
                    capacity: {
                        'en-US': 'Capacity',
                        'ms-MY': 'Kapasiti',
                        'zh-hans': 'Capacity'
                    },
                    plan: {
                        'en-US': 'Plan',
                        'ms-MY': 'Pelan',
                        'zh-hans': 'Plan'
                    },
                    select_color: {
                        'en-US': 'Select color',
                        'ms-MY': 'Pilih warna',
                        'zh-hans': 'Select color'
                    },
                    order_summary: {
                        'en-US': 'Order summary',
                        'ms-MY': 'Ringkasan pesanan',
                        'zh-hans': 'Order summary'
                    },
                    order_summary_subtext: {
                        'en-US': 'Due today after taxes and shipping',
                        'ms-MY': 'Perlu dibayar hari ini selepas cukai dan penghantaran',
                        'zh-hans': 'Due today after taxes and shipping'
                    },
                    total: {
                        'en-US': 'TOTAL',
                        'ms-MY': 'JUMLAH',
                        'zh-hans': 'TOTAL'
                    },
                    due_monthly: {
                        'en-US': 'Due Monthly',
                        'ms-MY': 'Perlu dibayar bulanan',
                        'zh-hans': 'Due Monthly'
                    },
                    add_to_cart: {
                        'en-US': 'Add to Cart',
                        'ms-MY': 'Tambah ke Troli',
                        'zh-hans': 'Add to Cart'
                    },
                    monthly_payment: {
                        'en-US': 'Monthly Payment',
                        'ms-MY': 'Bayaran bulanan',
                        'zh-hans': 'Monthly Payment'
                    }
                }
            },
            created: function() {
                var self = this;
                setTimeout(function() {
                    ywos.init();
                    self.getPlanData();
                }, 500);
            },
            methods: {
                getPlanData: function() {
                    var self = this;
                    if (ywos.validateSession(self.currentStep)) {
                        self.productId = ywos.lsData.meta.deviceID;
                        self.ajaxGetPlanData();
                    }
                },
                ajaxGetPlanData: function() {
                    var self = this;
                    toggleOverlay();
                    axios.get(apiEndpointURL + '/get-bundlePlan-by-id/' + self.productId)
                        .then((response) => {
                            var data = response.data;
                            data = self.updateLang(data);
                            self.deviceData = data;
                            if (localStorage.getItem(ywosLSName) !== null && JSON.parse(localStorage.getItem(ywosLSName)).meta.planID != '') {
                                self.deviceData?.planData.map((data, index) => {
                                    console.log(JSON.parse(localStorage.getItem(ywosLSName)).meta.planID);
                                    if (JSON.parse(localStorage.getItem(ywosLSName)).meta.planID == data?.plan_id) {
                                        self.changePlan(index);
                                    } else {
                                        self.changePlan(0);
                                    }
                                });
                            } else {
                                self.changePlan(0);
                            }

                            $('#main-vue').css({
                                'height': 'auto'
                            });
                            $('.main-content').addClass('page-main-content-loaded');
                            $('.ytl_vue-content-load').css({
                                'display': 'block'
                            });
                            toggleOverlay(false);
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                        })
                },
                updateLang: function(data) {
                    return data;
                },
                changePlan: function(index) {
                    console.log(index);
                    var self = this;
                    const selectedData = self.deviceData.planData[index];
                    const planDetails = self.deviceData.planData[index]?.data?.notes?.split(',').filter(elm => elm);
                    self.selectedPlanData = {
                        color_name: selectedData.color_name,
                        color_code: selectedData.color_code,
                        monthlyCommitment: selectedData.data.monthlyCommitment,
                        totalAmount: selectedData.data.totalAmountWithSST,
                        plan_id: selectedData.plan_id,
                        planDetails: planDetails
                    };

                },
                showPlanDetail: function() {
                    $('.accordion-wrap').toggleClass("active");
                    $(".accordion-body").slideToggle();
                },
                goToCartPage: function() {
                    ywos.buyPlan(this.selectedPlanData.plan_id, false, 'bundle_plan');
                },
                renderText: function(strID) {
                    return ywos.renderText(strID, this.pageText);
                }
            }
        });
    });
</script>