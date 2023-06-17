<?php require_once('includes/header.php') ?>
<style>
    #cart-body .nav-pills .nav-link.active {
        color: #FF0084 !important;
        border: 0 !important;
        border-bottom: 8px solid #FF0084 !important;
    }

    .item-plans {
        align-items: center;
        justify-content: center;
        padding: 70px 0px;
        padding-top: 0px;
        background-color: #F7F8F9;
    }

    .item-plans h1 {
        font-size: 39px;
        font-weight: 800;
        line-height: 47px;
        color: #000;
        padding-top: 60px;
    }

    .item-plans .plan-table {
        border-spacing: 8px 0px;
        border-collapse: initial;
    }

    .item-plans .plan-table th {
        padding: 9px 30px;
        vertical-align: middle;
        background-color: #FFF;
        border: none;
        border-radius: 10px;
        width: 20%;
        text-align: center;
    }

    .item-plans .plan-table th .pink-btn {
        padding: .375rem .75rem;
        display: inline-block;
    }

    .item-plans .plan-table th.visual {
        background-color: transparent;
        border: none;
    }

    .item-plans .plan-table th h1 {
        color: #2B2B2B;
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        line-height: 24px;
        font-weight: 400;
        text-align: center;
        margin-bottom: 15px;
        padding-top: 0px;
    }

    .item-plans .plan-table th h2 {
        color: #000;
        font-size: 18px;
        line-height: 23px;
        font-weight: 800;
        text-align: center;
        margin-bottom: 15px;
    }

    .item-plans .plan-table tr td {
        padding: 20px;
        text-align: center;
        background-color: #FFF;
        border-bottom: solid 1.5px #d5d5d5;
        color: #2B2B2B;
        font-size: 15px;
        font-weight: 600;
        vertical-align: middle;
    }

    .item-plans .plan-table tr:last-child td {
        border-bottom: none;
    }

    .item-plans .plan-table tr td.blue-col {
        background-color: #1A1E47;
        border-bottom: none;
        position: relative;
        color: #F9F7F4;
        text-align: left;
    }

    .item-plans .plan-table tr td.blue-col .info-icon {
        /* position: absolute;
        right: 22px;
        top: 22px; */
        float: right;
    }

    .item-plans .plan-table tr td.blue-col:after {
        clear: both;
        content: '';
        display: block;
    }

    .item-plans .plan-table tr td.empty-row {
        background-color: transparent;
        border: none;
        padding: 0;
        height: 10px;
    }

    .plan-item {
        border: 3px solid transparent !important;
        box-sizing: border-box;
        border-radius: 8px;
        background: #FFFFFF;
        box-shadow: none;
        cursor: pointer;
        position: relative;
    }

    .plan-item-selected,
    .plan-item:hover {
        border: 3px solid blue !important;
    }

    .subtitle3 {
        font-family: Montserrat;
        font-style: normal;
        font-weight: 400;
        font-size: 18px;
        line-height: 24px;
        color: #2B2B2B;
        margin-bottom: 10px;
        letter-spacing: -1px;
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
<main id="main-vue">
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>{{ renderText('elevate_step_1') }}</span>
                </li>
                <li ui-sref="secondStep" class="completed">
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

    <section id="cart-body" v-if="isUpFrontPlanAvailable">
        <div class="container" style="border: 0">
            <div>
                <div class="border-box">
                    <div class="row">
                        <div class="col-md-5 p-5 flex-column bg-checkout3" style="display: flex;justify-content: center;">
                            <div class="title text-white">{{ renderText('compasia_fail_error1_1') }}</div>
                            <br>
                            <div class="title text-white">{{ renderText('compasia_fail_error1_2') }}</div><br>
                            <div class="subtitle3 text-white">{{ renderText('compasia_fail_error1_3') }}</div><br>
                            <div class="subtitle3 text-white">{{ renderText('compasia_fail_error1_4') }}</div>
                        </div>
                        <div class="col-md-7  p-5">
                            <div class="flex-container mt-3">
                                <div>
                                    <div class="row" v-if="!isUpFrontPlanAvailable">
                                        <div class="col-1">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.721 5.14645L2.42767 23.9998C2.19483 24.403 2.07163 24.8602 2.07032 25.3258C2.06902 25.7914 2.18966 26.2493 2.42024 26.6538C2.65082 27.0583 2.98331 27.3954 3.38461 27.6316C3.78592 27.8677 4.24207 27.9947 4.70767 27.9998H27.2943C27.7599 27.9947 28.2161 27.8677 28.6174 27.6316C29.0187 27.3954 29.3512 27.0583 29.5818 26.6538C29.8124 26.2493 29.933 25.7914 29.9317 25.3258C29.9304 24.8602 29.8072 24.403 29.5743 23.9998L18.281 5.14645C18.0433 4.75459 17.7086 4.43061 17.3093 4.20576C16.9099 3.98092 16.4593 3.86279 16.001 3.86279C15.5427 3.86279 15.0921 3.98092 14.6927 4.20576C14.2934 4.43061 13.9587 4.75459 13.721 5.14645V5.14645Z"
                                                    stroke="#EF4444" stroke-width="4" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M16 12V17.3333" stroke="#EF4444" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16 22.6665H16.0133" stroke="#EF4444" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="col-11 text-bold">
                                            {{ renderText('compasia_fail_error2') }}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row px-5">
                                            <div class="col-md-6">
                                                <img class="img-responsive w-100" v-bind:src="PlanImageUrl">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="device-detail">
                                                    <h2>{{deviceName}}</h2>
                                                    <h2>{{PlanName}}</h2>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <table width="100%" class="device-price-table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-start">Device Upfront Payment<br>(rebated
                                                                over 18 months)</td>
                                                            <td class="text-end"><b>RM:{{totalAmountWithoutSST}}</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-start">SST</td>
                                                            <td class="text-end"><b>RM:{{totalSST}}</b></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-start">
                                                                <h4><b>TOTAL</b></h4>
                                                            </th>
                                                            <th class="text-end">
                                                                <h4><b>RM:{{totalAmountWithSST}}</b></h4>
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- <div class="mt-2 text-end">
                                                    <a href="#" class="btn-cancel text-uppercase mr-2">Cancel</a>
                                                    <a id="btnChoosePlan" class="pink-btn text-uppercase">Proceed</a>
                                                </div> -->

                                                <div class="mt-2 text-end">
                                                    <a href="/infinite-phone-bundles/"
                                                        class="btn-cancel text-uppercase">{{
                                                        renderText('back_to_infinite') }}</a>
                                                    <div style="display: inline;" v-if="isUpFrontPlanAvailable" @click="buyPlan">
                                                        <button id="btnChoosePlan"
                                                            class="pink-btn text-uppercase">Proceed</button>
                                                    </div>
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
            </div>
        </div>

    </section>
    <section id="cart-body" V-else>
        <div class="container" style="border: 0">
            <div>
                <div class="border-box pad-mobile">
                    <div class="text-center p-lg-5">
                        <h2 class="subtitle mt-3">Sorry! We ran a check and you did not pass our ID verification</h2>
                        <p style="max-width: 750px; margin: auto">
                            It seems like you did not qualify, however we’ve picked out some other<br> plans that you
                            might be interested in.
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
                        <div id="tab-postpaid" class="item-plans mt-3 p-lg-5 tabcontent">
                            <div class="table-responsive">
                                <table class="table plan-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center visual"><img
                                                    src="https://cdn.yes.my/site/wp-content/uploads/2021/09/kasiup-postpaid-visual.png"
                                                    class="img-fluid d-none"></th>
                                            <th class="plan-item p-3" data-planid="915">
                                                <div>
                                                    <h1>Yes Infinite Basic</h1>
                                                    <h2>RM58/mth <span class="circle"><i class=""></i></span></h2>
                                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span
                                                            class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
                                                </div>
                                            </th>
                                            <th class="plan-item p-3" data-planid="793">
                                                <div>
                                                    <h1>Yes Infinite Standard</h1>
                                                    <h2>RM88/mth<span class="circle"><i class=""></i></span></h2>
                                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span
                                                            class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
                                                </div>
                                            </th>
                                            <th class="plan-item p-3" data-planid="794">
                                                <div>
                                                    <h1>Yes Infinite Premium</h1>
                                                    <h2>RM118/mth<span class="circle"><i class=""></i></span></h2>
                                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span
                                                            class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
                                                </div>
                                            </th>

                                            <th class="plan-item p-3" data-planid="795">
                                                <div>
                                                    <h1>Yes Infinite Ultra</h1>
                                                    <h2>RM178/mth<span class="circle"><i class=""></i></span></h2>
                                                    <a href="javascript:void(0)" class="btn pink-btn">Select<span
                                                            class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="empty-row"><img
                                                    src="https://cdn.yes.my/site/wp-content/uploads/2021/09/spacer.gif"
                                                    height="10px"></td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col rounded-top">Data
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                                            <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                                            <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                                            <td class="rounded-top">Unlimited 5G + 4G<sup>*</sup></td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col">Speed
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td>Infinite</td>
                                            <td>Infinite</td>
                                            <td>Infinite</td>
                                            <td>Infinite</td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col">Calls
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td>Infinite</td>
                                            <td>Infinite</td>
                                            <td>Infinite</td>
                                            <td>Infinite</td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col">Validity
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td>30 days</td>
                                            <td>30 days</td>
                                            <td>30 days</td>
                                            <td>30 days</td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col rounded-bottom">Hotspot
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td class="rounded-bottom">10GB</td>
                                            <td class="rounded-bottom">40GB</td>
                                            <td class="rounded-bottom">70GB</td>
                                            <td class="rounded-bottom">100GB</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab-prepaid" class="item-plans mt-3 p-lg-5 tabcontent" style="display: none">
                            <div class="table-responsive">
                                <table class="table plan-table">

                                    <thead>
                                        <tr>
                                            <th class="text-center visual"><img
                                                    src="https://cdn.yes.my/site/wp-content/uploads/2021/10/kasiup-prepaid-visual.png"
                                                    class="img-fluid d-none"></th>
                                            <th class="plan-item p-3" data-planid="689">
                                                <div>
                                                    <h1>Yes Prepaid FT5G Unlimited <span class="circle"><i
                                                                class=""></i></span></h1>
                                                    <h2>RM30</h2>
                                                    <a href="javascript:void(0)" class="pink-btn">Select<span
                                                            class="d-none d-lg-inline-block">&nbsp;Plan</span></a>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="empty-row"><img
                                                    src="https://cdn.yes.my/site/wp-content/uploads/2021/09/spacer.gif"
                                                    height="10px"></td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col rounded-top">Data
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td class="rounded-top">Unlimited 5G<sup>*</sup> + 4G<sup>**</sup></td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col">Speed
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td>Uncapped</td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col">Calls
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td>Unlimited</td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col">Validity
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td>30 days</td>
                                        </tr>
                                        <tr>
                                            <td class="blue-col rounded-bottom">Hotspot
                                                <a href="javascript:void(0)" class="info-icon"><img
                                                        src="https://cdn.yes.my/site/wp-content/uploads/2021/09/icon-info-circle.png"></a>
                                            </td>
                                            <td>9GB</td>
                                        </tr>
                                    </tbody>
                                </table>

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
                selectedPlan: 0,
                taxRate: {
                    sst: 0.06
                },
                eligibility: {
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                orderSummary: {
                    product: {
                        selected: {
                            productCode: '',
                            code: '',
                            nameEN: '',
                            shortDescriptionEN: '',
                            productBundleId: '',
                            extraProperties: '',
                            contractName: '',
                            capacity: '',
                            color: '',
                            contract: '',
                            devicePriceMonth: '',
                            planPerMonth: '',
                            upFrontPayment: 0.0,
                            plan: {
                                planId: '',
                                nameEN: '',
                                shortDescriptionEN: '',
                            }
                        },
                        colors: []
                    },
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        productCode: null,
                        orderItems: []
                    },
                },
                customer: {
                    id: '',
                    securityNumber: '',
                    fullName: '',
                    productSelected: ''
                },
                allowSubmit: false,
                isUpFrontPlanAvailable: false,
                deviceName: '',
                PlanImageUrl: '',
                PlanName: '',
                sstAmount: '',
                totalAmountWithoutSST: '',
                totalSST: '',
                totalAmountWithSST: '',
            },

            created: function () {
                var self = this;
                setTimeout(function () {
                    toggleOverlay();
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
                    if (elevate.lsData.product) {
                        self.orderSummary.product = elevate.lsData.product;
                    }

                    
                    if (self.orderSummary.product.selected.productCode) {
                        const mapPlanId = {
                            1097: {
                                planID: 1127,
                                deviceID: 2,
                            },
                            1096: {
                                planID: 1126,
                                deviceID: 2,
                            },
                            1095: {
                                planID: 1125,
                                deviceID: 2,
                            },
                            1101: {
                                planID: 1123,
                                deviceID: 3,
                            },
                            1093: {
                                planID: 1131,
                                deviceID: 4,
                            },
                            1198: {
                                planID: 1196,
                                deviceID: 5,
                            },
                            1194: {
                                planID: 1192,
                                deviceID: 6,
                            },
                            1202: {
                                planID: 1200,
                                deviceID: 7,
                            }
                        };

                        if (mapPlanId[self.orderSummary.product.selected.productCode]) {
                            self.isUpFrontPlanAvailable = true;
                            self.upFrontPlanID = mapPlanId[self.orderSummary.product.selected.productCode].planID;
                            axios.get(apiEndpointURL + '/get-plan-by-id/' + self.upFrontPlanID + '/?nonce=' + yesObj.nonce)
                                .then((response) => {
                                    toggleOverlay(true);
                                    var self = this;
                                    self.data = response.data;
                                    self.totalAmountWithoutSST = self.data.totalAmountWithoutSST;
                                    self.totalSST = self.data.totalSST;
                                    self.totalAmountWithSST = self.data.totalAmountWithSST;

                                    toggleOverlay(false);
                                })
                        }
                        if (elevate.lsData.orderDetail) {
                            self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                        }

                        self.deviceName = elevate.lsData.product.selected.name;
                        self.PlanName = elevate.lsData.product.selected.contractName;
                        self.PlanImageUrl = elevate.lsData.product.selected.imageURL;
                        // self.planPerMonth = elevate.lsData.product.selected.planPerMonth;
                        self.sstAmount = elevate.lsData.product.selected.sstAmount;
                        // ywos.creditCheckFailedPlan(planID);
                    }
                },
                buyPlan: function () {
                    var self = this;
                    if (self.isUpFrontPlanAvailable) {
                        ywos.creditCheckFailedPlan(self.upFrontPlanID);
                    }
                },
                redirectYWOS: function () {
                    var self = this;
                    toggleOverlay();
                    ywos.buyPlan(self.selectedPlan);
                },
                renderText: function (strID) {
                    return elevate.renderText(strID, Elevate_lang);
                },
                goNext: function () {
                    var self = this;
                    self.selectedPlan = selectedPlan;
                    if (self.selectedPlan) {
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