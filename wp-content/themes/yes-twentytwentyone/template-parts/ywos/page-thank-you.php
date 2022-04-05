<?php include('header-ywos.php'); ?>


<style type="text/css">
    /* Cart Modal Styling START */

    body {
        background-color: #FFF;
    }

    .white-top {
        width: 100%;
        padding: 20px 0px;
    }

    .white-top h1 {
        font-size: 32px;
        color: #2B2B2B;
        font-weight: 700;
    }

    .white-top .back-btn {
        display: inline-block;
        font-size: 20px;
        color: #2B2B2B;
    }

    #grey-innerbanner {
        background-color: #F9F7F4;
        padding: 25px 0px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.07);
    }

    #grey-innerbanner h1 {
        font-size: 42px;
        color: #2B2B2B;
        font-weight: 800;
    }

    #cart-body {
        padding: 0px 0px;
        padding-bottom: 0px;
    }

    #cart-body h1 {
        font-size: 50px;
        color: #2B2B2B;
        font-weight: 800;
        margin-bottom: 20px;
    }

    #cart-body h2 {
        font-size: 29px;
        font-weight: 800;
        color: #2B2B2B;
    }

    #cart-body p {
        font-size: 16px;
        color: #525252;
    }

    #cart-body .package-box {
        width: 100%;
        border: 0.5px solid #C5C5C5;
        box-shadow: 0px 5px 15px rgba(112, 144, 176, 0.2);
        border-radius: 8px;
        padding: 15px;
        display: flex;
        flex-direction: column;
    }

    #cart-body .package-box h1 {
        font-size: 24px;
        color: #525252;
        font-weight: 800;
        margin-bottom: 25px;
    }

    #cart-body .package-box p {
        font-size: 16px;
        color: #525252;
        width: 100%;
    }

    #cart-body .package-box h2 {
        font-size: 32px;
        font-weight: 800;
        color: #00B4F0;
    }

    #cart-body .package-box h2 span {
        font-size: 24px;
    }

    #cart-body .shopping-link {
        color: #ED028C;
        font-weight: 800;
        font-size: 16px;
        text-transform: uppercase;
        display: inline-block;
        margin-top: 5px;
    }

    #cart-body .shopping-link img {
        vertical-align: middle;
        margin-top: -2px;
    }

    #cart-body .container {
        border: 0.5px solid #ebebeb;
        border-radius: 10px;
        padding-left: 6% !important;
        padding-right: 6% !important;
        background-image: url('/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/thankyou-bg.jpg');
        background-position: top left;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    #cart-body .offer-box {
        border: 1px solid #C5C5C5;
        width: 100%;
        border-radius: 6px;
        padding: 20px;
        text-align: center;
    }

    #cart-body .offer-box p {
        color: #525252;
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    #cart-body .grey-link {
        font-weight: 700;
        color: #525252;
        text-decoration: underline;
    }

    .footer {
        background-color: #FFF;
        padding-top: 0px;
    }

    .footer .copyright {
        margin-top: 0px;
        padding: 20px 0px;
    }

    .footer .copyright p {
        color: #525252;
        font-size: 20px;
        font-weight: 600;
    }

    .footer .copyright p a {
        color: #525252;
        text-decoration: underline;
    }

    .col-orderResponse {
        padding-bottom: 100px;
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 992px) {
        #cart-body .container {
            background-image: none;
        }

        .col-orderResponse {
            padding-bottom: 1.5rem !important;
        }
    }
</style>


<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
    <!-- Cart Body STARTS -->
    <section id="cart-body" v-if="pageValid">
        <div class="container p-lg-5 p-3">
            <div class="row gx-5">
                <div class="col-12 pb-4">
                    <div class="row">
                        <div class="col-lg-5 col-12 offset-lg-6 col-orderResponse">
                            <h1>Thank you!</h1>
                            <p class="mb-3">
                                Order Number <br />
                                <!-- <a v-bind:href="'/ywos/thank-you/?order_display_id=' + purchaseInfo.displayOrderNumber" class="grey-link">{{ purchaseInfo.displayOrderNumber }}</a> <br /> -->
                                <a href="javascript:void(0)" class="grey-link">{{ purchaseInfo.displayOrderNumber }}</a> <br />
                                Placed on {{ purchaseInfo.orderCreationDate }} <br />
                                <!-- Estimated Delivery: {{ purchaseInfo.deliveryFromDate }} - {{ purchaseInfo.deliveryToDate }} <br /><br /> -->
                                A summary of your order has been sent to your email
                            </p>
                            <div class="offer-box d-none">
                                <p>Send me amazing Offers and Promotions</p>
                                <a href="#" class="pink-btn d-block">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-4 d-none">
                    <h2>You may also like</h2>
                </div>
                <div class="col-6 mt-4 text-end d-none">
                    <a href="/#popular-deals" class="shopping-link">Continue shopping <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/right-arrow.png" class="ms-2" alt=""></a>
                </div>
            </div>
            <div class="row gx-5 row-highlightPlans" style="display: none;">
                <template v-for="plan in highlightPlans">
                    <div class="col-lg-4 col-12 mt-4">
                        <div class="package-box">
                            <h1>{{ plan.displayName }}</h1>
                            <p class="mb-2" v-for="planInfo in plan.planInfos.slice(0, 3)"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/tickoutline.png" class="me-1" alt="">{{ planInfo }}</p>
                            <div class="row mt-4">
                                <div class="col-10">
                                    <h2 v-if="plan.planType == 'prepaid'">RM{{ plan.totalAmount }}</h2>
                                    <h2 v-if="plan.planType == 'postpaid'">RM{{ plan.totalAmount }}<span>/month</span></h2>
                                </div>
                                <div class="col-2">
                                    <a href="javascript:void(0)" v-on:click="buyPlan(plan.mobilePlanId)"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cart-pink-icon.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
    <!-- Cart Body ENDS -->
</div>
<!-- Vue Wrapper ENDS -->

<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                highlightPlanIDs: [710, 759, 758],
                highlightPlans: [],
                orderDisplayID: '',
                currentStep: 5,
                pageValid: false,
                purchaseInfo: {
                    displayOrderNumber: '',
                    deliveryFromDate: '',
                    deliveryToDate: '',
                    orderCreationDate: ''
                }
            },
            mounted: function() {},
            created: function() {
                var self = this;
                var url_string = window.location.href;
                var url = new URL(url_string);
                self.orderDisplayID = url.searchParams.get('order_display_id');

                setTimeout(function() {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function() {
                    var self = this;
                    if (self.orderDisplayID) {
                        self.pageValid = true;
                        self.ajaxGetOrderByDisplayID();
                        // self.getHighlightPlans();
                        toggleOverlay(false);
                    } else if (ywos.validateSession(self.currentStep)) {
                        self.pageValid = true;
                        self.updateData();
                        // self.getHighlightPlans();
                        toggleOverlay(false);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
                ajaxGetOrderByDisplayID: function() {
                    var self = this;
                    axios.get(apiEndpointURL + '/get-order-by-display-id/' + self.orderDisplayID)
                        .then((response) => {
                            var data = response.data;
                            var yosOrderResponse = data.yos_order_response;
                            self.purchaseInfo = {
                                displayOrderNumber: self.orderDisplayID,
                                deliveryFromDate: yosOrderResponse.deliveryFromDate,
                                deliveryToDate: yosOrderResponse.deliveryToDate,
                                orderCreationDate: yosOrderResponse.orderCreationDate
                            }
                            $('#main-vue').show();
                        })
                        .catch((error) => {
                            // console.log(error);
                        })
                        .finally(() => {
                            // console.log('finally');
                        });
                },
                ajaxGetHighlightPlan: function(planID) {
                    var self = this;
                    axios.get(apiEndpointURL + '/get-plan-by-id/' + planID)
                        .then((response) => {
                            var planData = response.data;
                            if (planData.notes) {
                                var arrNotes = planData.notes.split(',');
                                planData.planInfos = arrNotes.sort(function(a, b) {
                                    return a.length - b.length;
                                });
                            }
                            self.highlightPlans.push(planData);
                            if (self.highlightPlanIDs.length >= self.highlightPlans.length) {
                                setTimeout(function() {
                                    $('.row-highlightPlans').show();
                                    toggleOverlay(false);
                                }, 1000);
                            }
                        })
                        .catch((error) => {
                            console.log('error', error);
                        })
                },
                getHighlightPlans: function() {
                    var self = this;
                    self.highlightPlanIDs.map(function(planID) {
                        self.ajaxGetHighlightPlan(planID);
                    });
                },
                updateData: function() {
                    var self = this;
                    if (typeof ywos.lsData.meta.orderResponse != 'undefined') {
                        self.purchaseInfo.displayOrderNumber = ywos.lsData.meta.orderResponse.displayOrderNumber;
                        self.purchaseInfo.deliveryFromDate = ywos.lsData.meta.orderResponse.deliveryFromDate;
                        self.purchaseInfo.deliveryToDate = ywos.lsData.meta.orderResponse.deliveryToDate;
                        self.purchaseInfo.orderCreationDate = ywos.lsData.meta.orderResponse.orderCreationDate;
                    } else if (ywos.lsData.meta.purchaseInfo) {
                        self.purchaseInfo = ywos.lsData.meta.purchaseInfo;
                    }
                    self.clearLocalData(ywos.lsData.meta.planID, ywos.lsData.meta.completedStep);
                },
                clearLocalData: function(planID = 0, completedStep = 0) {
                    ywos.lsData.meta = {};
                    ywos.lsData.meta.planID = planID;
                    ywos.lsData.meta.completedStep = completedStep;
                    ywos.lsData.meta.purchaseInfo = this.purchaseInfo;
                    ywos.lsData.meta.purchaseCompleted = true;
                    ywos.updateYWOSLSData();
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>