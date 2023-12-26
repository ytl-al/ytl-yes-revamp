<?php include('header-ywos.php'); ?>
<style>
    .grid {
        display: grid;
        grid-gap: 1em;
        margin: 35px auto;
        padding: 0;
        grid-template-columns: repeat(2, 250px);
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        position: relative;
        min-height: 260px;
        box-shadow: 2px 2px 12px rgba(112, 144, 176, 0.25);
    }

    .radio {
        display: none;
    }

    .plan-details {
        border: 2px solid #ffffff;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        min-height: 260px;
        flex-direction: column;
        transition: border-color 0.2s ease-out;
    }

    .radio:checked~.plan-details {
        border-color: #000000;
    }

    .panel-img {
        max-width: 100%;
        height: 180px;
        position: relative;
        overflow: hidden;
    }

    .card-panal-img {
        position: absolute;
        margin: auto;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        max-width: 100%;
        max-height: 100%;
        overflow: hidden;
    }

    .panel-body {
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 40px;
        padding-bottom: 10px;
        text-align: center;
        letter-spacing: -0.02em;
        color: #000000;
    }

    .layer-delivery h1 {
        color: #2B2B2B;
        font-weight: 800;
        font-size: 28px;
    }

    .summary-box-free {
        font-size: 14px;
        color: #525252;
    }

    .elevate-disable .disable {
        cursor: not-allowed !important;
        opacity: 0.5 !important;
    }

    .eSIM {
        background: #FFFFFF;
        box-shadow: 1px 1px 20px 5px rgba(112, 144, 176, 0.25);
        border-radius: 8px;
        padding: 20px 20px 32px 20px;
        gap: 10px;
        font-family: 'Nunito Sans';
        font-style: normal;
        color: #525252;
        display: flex;
        align-items: start;
    }

    #eSIM_msg p {
        font-weight: 700 !important;
        font-size: 14px !important;
        line-height: 20px !important;
        color: #525252 !important;
        margin-bottom: 9px !important;
    }

    .eSIM p:nth-child(2) {
        line-height: 12px;
    }

    .eSIM span {
        font-size: 12px;
        font-weight: 400;
        line-height: 1.3;
        margin-top: 20px;
    }

    .esim-link {
        display: flex;
    }

    .esim-link a {
        color: #757575 !important;
        padding-left: 5px;
        text-decoration: underline;
    }

    .disable .plan-details {
        cursor: not-allowed !important;
        opacity: 0.5 !important;
    }

    .panel-body .content {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        .grid {
            grid-template-rows: repeat(2, auto);
            grid-template-columns: none;
            margin: 0px auto;
        }

        .card {
            min-height: auto;

        }

        .plan-details {
            min-height: auto;
            flex-direction: row;
            padding: 2px;
            gap: 10px;
            align-items: center;
        }

        .panel-img {
            height: auto;
        }

        .card-panal-img {
            position: unset;
            height: auto;
            width: 170px;
        }

        .panel-body {
            line-height: 1.5;
            text-align: left;
            width: 100%;
        }

        .panel-body .content {
            display: block;
        }

        #cart-body h1 {
            font-size: 18px !important;
            margin-bottom: 20px;
        }
    }
</style>
<!-- Vue Wrapper STARTS -->
<div id="main-vue">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. {{ renderText('strVerification') }}</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>2. {{ renderText('strSelectSimType') }}</span>
                </li>
                <li ui-sref="thirdStep">
                    <span v-if="(simType == 'eSIM')">3. {{ renderText('strDeliveryBilling') }}</span>
                    <span v-else>3. {{ renderText('strDelivery') }}</span>

                </li>
                <li ui-sref="fourthStep">
                    <span>4. {{ renderText('strReview') }}</span>
                </li>
                <li ui-sref="fifthStep">
                    <span>5. {{ renderText('strPayment') }}</span>
                </li>
            </ul>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Body STARTS -->
    <section id="cart-body">
        <div class="container p-lg-5 p-3">
            <div class="row d-lg-none mb-3">
            </div>
            <div class="row gx-5" v-if="pageValid">
                <div class="col-lg-5 col-12 order-lg-2">
                    <?php include('section-order-summary.php'); ?>

                </div>
                <form class="col-lg-7 col-12 order-lg-1 mt-4 mt-lg-0" @submit="simTypeSubmit">
                    <div class="row gx-5">
                        <div class="col-lg-7">
                            <div class="layer-delivery">
                                <div class="d-lg-block">
                                    <h1>{{ renderText('strSelectSimType') }}</h1>
                                </div>
                            </div>

                            <div class="form-group mb-4" v-if="(isUpFrontPlanAvailable == 'false')">
                                <div class=" grid main-card">
                                    <label class="card" v-bind:class="{ 'disable' : disabled !== true}">
                                        <input name="plan" class="radio" type="radio" id="eSim" name="simType"
                                            value="eSIM" v-model="simType" :disabled="disabled !== true">
                                        <span class="plan-details">
                                            <div class="panel-img">
                                                <img src="/wp-content/uploads/2023/09/e-sim.png" alt="..."
                                                    class="card-panal-img">
                                            </div>
                                            <div class="panel-body">
                                                eSIM
                                                <div class="content">
                                                    <p>Embedded SIM built into your device</p>
                                                </div>
                                            </div>
                                        </span>

                                    </label>
                                    <label class="card">
                                        <input name="plan" class="radio" type="radio" id="physicalSIM" name="simType"
                                            value="physicalSIM" v-model="simType" checked>
                                        <span class="plan-details">
                                            <div class="panel-img">
                                                <img src="/wp-content/uploads/2023/09/Visuals.png" alt="..."
                                                    class="card-panal-img">
                                            </div>
                                            <div class="panel-body">
                                                Physical SIM
                                                <div class="content">
                                                    <p>A removable card that connect you to network</p>
                                                </div>
                                            </div>

                                        </span>
                                    </label>
                                    <div class="eSIM " v-if="(simType == 'eSIM')">

                                        <div>
                                            <p>eSIM Compatibility </p>
                                            <p><span>Please ensure that your device is eSIM supported</span></p>
                                            <span class="esim-link">Learn more about eSIM <a
                                                    href="/e-sim">here</a></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4" v-if="(isUpFrontPlanAvailable == 'true')">
                            <div class=" grid main-card">
                                <label class="card" v-bind:class="{ 'disable' : PlanSupportEsim != true}">
                                    <input name="plan" class="radio" type="radio" id="eSim" name="simType"
                                        :disabled="PlanSupportEsim != true" value="eSIM" v-model="simType"
                                        @click="showErrorEsimMsg()">
                                    <span class="plan-details">
                                        <div class="panel-img">
                                            <img src="/wp-content/uploads/2023/09/e-sim.png" alt="..."
                                                class="card-panal-img">
                                        </div>
                                        <div class="panel-body">
                                            eSIM
                                            <div class="content">
                                                <p>Embedded SIM built into your device</p>
                                            </div>
                                        </div>
                                    </span>

                                </label>
                                <label class="card physical-button">
                                    <input name="plan" class="radio" type="radio" id="physicalSIM" name="simType"
                                        value="physicalSIM" v-model="simType" checked @click="hideErrorEsimMsg()">
                                    <span class="plan-details">
                                        <div class="panel-img">
                                            <img src="/wp-content/uploads/2023/09/Visuals.png" alt="..."
                                                class="card-panal-img">
                                        </div>
                                        <div class="panel-body">
                                            Physical SIM
                                            <div class="content">
                                                <p>A removable card that connect you to network</p>
                                            </div>
                                        </div>

                                    </span>
                                </label>
                                <div class="eSIM d-none" id="eSIM_msg">
                                    
                                    <div>
                                        <p>Device eSIM Compatibility</p>
                                        <p><span>The device you have selected is not eSIM compatible.</span></p>
                                        <span class="esim-link">However, you can use the eSIM purchased with this
                                            plan on an alternative compatible device.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group align-items-center">
                            <!-- <input type="radio" class="" id="simType" name="simType"
                                        v-model="deliveryInfo.simType" @input="" placeholder="" required />
                                    </div> -->
                            <!-- <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="right" class="ms-2" title="Tooltip text here"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/info-icon.png" /></a> -->
                            <div class="invalid-feedback mt-1" id="em-name"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" class="pink-btn" :value="renderText('strBtnSubmit')"
                                :disabled="!(simType != '')" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Body ENDS -->
    <script type="text/javascript" src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/data/rahmah-plan.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            toggleOverlay();

            var pageSimType = new Vue({
                el: '#main-vue',
                data: {
                    rahmahPlan:ywosDataRahmahPlans??'',
                    isUpFrontPlanAvailable: 'false',
                    simType: '',
                    currentStep: 2,
                    planID: '',
                    pageValid: false,
                    isBillingDifferent: false,
                    upFrontPayment: 'false',
                    orderSummary: {
                        plan: {},
                        due: {
                            addOns: 0.00,
                            taxesSST: 0.00,
                            shippingFees: 0.00,
                            rounding: 0.00,
                            foreignerDeposit: 0.00,
                            total: 0.00
                        },
                        addOn: null
                    },

                    // customerDetails: {},
                    deliveryInfo: {
                        eSIM: '',
                        physicalSIM: '',

                    },

                    disabled: true,
                    DeviceSupportEsim: '',
                    PlanSupportEsim: '',
                    // allowSelectCity: false,
                    // allowSubmit: false,

                    apiLocale: 'EN',
                    pageText: {
                        strVerification: {
                            'en-US': 'Verification',
                            'ms-MY': 'Pengesahan',
                            'zh-hans': 'Verification'
                        },
                        strSelectSimType: {
                            'en-US': 'Select Sim Type',
                            'ms-MY': 'Pengesahan',
                            'zh-hans': 'Select Sim  Type'
                        },
                        strDelivery: {
                            'en-US': 'Delivery Details',
                            'ms-MY': 'Butiran Penghantaran',
                            'zh-hans': 'Delivery Details'
                        },
                        strDeliveryBilling: {
                            'en-US': 'Billing Details',
                            'ms-MY': 'Billing Details',
                            'zh-hans': 'Billing Details'
                        },
                        strReview: {
                            'en-US': 'Review',
                            'ms-MY': 'Semak',
                            'zh-hans': 'Review'
                        },
                        strPayment: {
                            'en-US': 'Payment Info',
                            'ms-MY': 'Maklumat Pembayaran',
                            'zh-hans': 'Payment Info'
                        },
                        strBtnSubmit: {
                            'en-US': 'Next',
                            'ms-MY': 'Next',
                            'zh-hans': 'Next'
                        },
                        labeleSIM: {
                            'en-US': 'eSIM',
                            'ms-MY': 'eSIM',
                            'zh-hans': 'eSIM'
                        },
                        labelePhysicalSIM: {
                            'en-US': 'Physical SIM',
                            'ms-MY': 'Physical SIM',
                            'zh-hans': 'Physical SIM'
                        },


                    }
                },
                mounted: function () { },
                created: function () {
                    var self = this;
                    setTimeout(function () {
                        self.pageInit();
                    }, 500);
                },
                methods: {
                    pageInit: function () {
                        var self = this;
                        if (ywos.validateSession(self.currentStep)) {
                            toggleOverlay(true);
                            self.pageValid = true;
                            self.orderSummary = ywos.lsData.meta.orderSummary;

                            self.apiLocale = (ywos.lsData.siteLang == 'ms-MY') ? 'MY' : 'EN';

                            // var data = JSON.parse(localStorage.getItem('yesElevate'));

                            if (ywos.lsData.meta.completedStep == 1) {
                                localStorage.removeItem('yesElevate');

                            }
                            var data = JSON.parse(localStorage.getItem('yesElevate'));
                            if (data) {
                                self.isUpFrontPlanAvailable = data.meta.isUpFrontPlanAvailable;
                                // console.log(data);
                                // console.log(self.isUpFrontPlanAvailable);
                                if (data && self.isUpFrontPlanAvailable == 'true') {
                                    // alert(self.isUpFrontPlanAvailable);
                                    self.upFrontPlanID = data.meta.productId;
                                    const apiEndpoint_elevate = window.location.origin + '/wp-json/elevate/v1';
                                    axios.get(apiEndpoint_elevate + '/getProduct/?code=' + self.upFrontPlanID + '&nonce=' + yesObj.nonce)
                                        .then((response) => {
                                            toggleOverlay(true);
                                            var data = response.data;

                                            self.DeviceSupportEsim = data?.selected?.esim;
                                            self.PlanSupportEsim = data?.selected?.plan.esim;
                                            toggleOverlay(false);
                                        })
                                        .catch((error) => {
                                            // console.log('error', error);
                                        })
                                } else {
                                    self.planID = ywos.lsData.meta.planID;
                                    // console.log(self.planID);
                                    axios.get(apiEndpointURL + '/get-plan-by-id/' + self.planID + '/?nonce=' + yesObj.nonce)
                                        .then((response) => {
                                            toggleOverlay(true);

                                            var data = response.data;
                                            self.isUpFrontPlanAvailable = 'false',
                                                self.disabled = data.eSim
                                            // console.log(self.disabled,'<<<<<');
                                            toggleOverlay(false);
                                        })
                                        .catch((error) => {
                                            // console.log('error', error);
                                        })
                                }
                            }
                            else {
                                self.planID = ywos.lsData.meta.planID;
                                console.log(self.planID);
                                axios.get(apiEndpointURL + '/get-plan-by-id/' + self.planID + '/?nonce=' + yesObj.nonce)
                                    .then((response) => {
                                        toggleOverlay(true);
                                        var data = response.data;
                                        self.isUpFrontPlanAvailable = 'false',
                                            self.disabled = data.eSim
                                        // console.log(self.disabled,'>>>>>');
                                        toggleOverlay(false);
                                    })
                                    .catch((error) => {
                                        // console.log('error', error);
                                    })
                            }

                        } else {
                            ywos.redirectToPage('cart');
                        }
                    },



                    redirectVerified: function () {
                        var self = this;
                        ywos.lsData.meta.completedStep = self.currentStep;
                        ywos.lsData.meta.esim = (self.simType == 'eSIM') ? 'true' : 'false';
                        ywos.updateYWOSLSData();

                    },

                    simTypeSubmit: function (e) {
                        toggleOverlay(true);
                        var self = this;
                        var validSubmit = true;
                        this.redirectVerified();
                        ywos.redirectToPage('delivery');
                        e.preventDefault();
                        toggleOverlay(false);
                    },

                    renderText: function (strID) {
                        return ywos.renderText(strID, this.pageText);
                    },
                    showErrorEsimMsg: function () {
                        var element = document.getElementById("eSIM_msg");
                        element.classList.remove("d-none");
                    },
                    hideErrorEsimMsg: function () {
                        var element = document.getElementById("eSIM_msg");
                        element.classList.add("d-none");
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            if (window.location.pathname == '/ywos/sim-type/') {
                let backButton = document.querySelector('.back-btn');
                if (ywosLSData.meta.customerDetails.upFrontPayment == 'true') {
                    backButton.href = '/elevate/eligibility-fail-upfront';
                } else {
                    backButton.href = '/ywos/verification';
                }
            }
        })
    </script>
    <?php include('footer-ywos.php'); ?>