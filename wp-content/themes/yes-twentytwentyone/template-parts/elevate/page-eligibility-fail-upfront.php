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
            <ul class="wizard" v-if="(isUpFrontPlanAvailable=='true')">
                <li ui-sref="firstStep" class="completed">
                    <span>{{ renderText('elevate_step_1') }}</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>2. UpFrontPayment</span>
                </li>
                <li ui-sref="thirdStep">
                    <span>{{ renderText('elevate_step_3') }}</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>{{ renderText('elevate_step_4') }}</span>
                </li>
                <li ui-sref="fourthStep">
                    <span>{{ renderText('elevate_step_5') }}</span>
                </li>
            </ul>
            <ul class="wizard"v-else>
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

    <section id="cart-body">
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
                                                            <td class="text-end"><b>RM{{totalAmountWithoutSST}}</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-start">SST</td>
                                                            <td class="text-end"><b>RM{{totalSST}}</b></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-start">
                                                                <h4><b>TOTAL</b></h4>
                                                            </th>
                                                            <th class="text-end">
                                                                <h4><b>RM{{totalAmountWithSST}}</b></h4>
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
                                                    <div style="display: inline;" @click="buyPlan">
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
                    toggleOverlay(true);
                    self.pageInit();
                }, 200);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        self.upFrontPlanID= elevate.lsData.meta.upFrontPlanID;
                        self.isUpFrontPlanAvailable= elevate.lsData.meta.isUpFrontPlanAvailable;

                        // console.log(self.upFrontPlanID);
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
                    } else {
                        elevate.redirectToPage('cart');
                    }
                    
                    if (elevate.lsData.product.selected.productCode) {
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