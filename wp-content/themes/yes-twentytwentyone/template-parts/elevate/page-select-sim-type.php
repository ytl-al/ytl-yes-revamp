<?php require_once('includes/header.php') ?>
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
        padding:20px 20px 32px 20px;
        gap: 10px;
        font-family: 'Nunito Sans';
        font-style: normal;
        color: #525252;
        display: flex;
        align-items: start;
    }

    .eSIM p {
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        color: #525252;
        margin-bottom: 9px;
    }
    .eSIM p:nth-child(2){
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

    .disable .plan-details{
        cursor: not-allowed !important;
        opacity: 0.5 !important;
    }
</style>
<div id="main-vue">
    <header class="white-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="mt-4">
                        <a href="/elevate/eligibilitycheck/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> {{ renderText('back') }}</a>
                    </div>
                </div>
                <div class="col-lg-4 col-6 text-lg-center text-end">
                    <h1 class="title_checkout p-3">{{ renderText('check_out') }}</h1>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </header>


    <section id="grey-innerbanner">
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>{{ renderText('elevate_step_1') }}</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>{{ renderText('elevate_step_2') }}</span>
                </li>
                <li ui-sref="thirdStep" class="completed">
                    <span>{{ renderText('elevate_step_3') }}</span>
                </li>
                <li ui-sref="fourthStep" v-if="(simType == 'eSIM')">
                    <span>{{ renderText('elevate_step_4_1') }}</span>
                </li>
                <li ui-sref="fourthStep" v-else>
                    <span>{{ renderText('elevate_step_4') }}</span>
                </li>
                <li ui-sref="fifthStep">
                    <span>{{ renderText('elevate_step_5') }}</span>
                </li>
            </ul>
        </div>
    </section>

    <section>
        <div class="container p-lg-5 p-3">
            <div class="row">
                <div class="col-lg-7">
                    <div class="layer-delivery">
                        <div class="">
                            <h1>Select Sim Type</h1>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class=" grid main-card">
                            <label class="card" v-bind:class="{ 'disable' : PlanSupportEsim != true}" >
                                <input name="plan" class="radio" type="radio" id="eSim"  :disabled="PlanSupportEsim != true" name="simType" value="eSIM"
                                    v-model="simType" @click="showErrorEsimMsg()">
                                <span class="plan-details">
                                    <div class="panel-img">
                                        <img src="/wp-content/uploads/2023/06/sim.png" alt="..." class="card-panal-img">
                                    </div>
                                    <div class="panel-body">
                                        eSIM
                                    </div>
                                </span>
                            </label>
                            <label class="card                                                                                                      " >
                                <input name="plan" class="radio" type="radio" name="simType" value="physicalSIM"
                                    v-model="simType" checked @click="hideErrorEsimMsg()">
                                <span class="plan-details">
                                    <div class="panel-img">
                                        <img src="/wp-content/uploads/2023/06/Physical-sim.png" alt="..."
                                            class="card-panal-img">
                                    </div>
                                    <div class="panel-body">
                                        Physical SIM
                                    </div>
                                </span>
                            </label>
                            <div class="eSIM d-none" id="eSIM_msg" >
                                <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/exclamation-circle-Regular-1.png"
                                    alt="...">
                                <div>
                                <p>Device eSIM Compatibility</p>
                                <p><span>The device you have selected is not eSIM compatible.</span></p>
                                <span class="esim-link">However, you can use the eSIM purchased with this plan on an alternative compatible device.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 mt-lg-3 pt-lg-5">
                    <div class="summary-box">
                        <h1 class="subtitle">{{ renderText('order_summary') }}</h1>
                        <h3 class="plan_price">{{ renderText('monthly_payment') }}</h3>
                        <div class="hr_line"></div>
                        <div class="row cart_total">
                            <div class="col-4 pt-2 pb-2">
                                <h3>{{ renderText('total') }}</h3>
                            </div>
                            <div class="col-8 pt-2 pb-2 text-end">
                                <h3>RM{{ orderSummary.orderDetail.subtotal }}/mth</h3>
                            </div>
                        </div>
                        <div class="monthly">
                            <div v-for="(item, index) in orderSummary.orderDetail.orderItems" class="row mt-2">
                                <div class="col-6">
                                    <p>{{item.name}}</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>RM{{item.price}}/ mth</p>
                                </div>
                            </div>
                        </div>
                        <div class="summary-box-free" v-if="(simType == 'eSIM')" >
                            <div class="row mt-2">
                                <div class="col-6">
                                    <p>eSIM</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>FREE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 elevate-disable">
                        <input type="button" @click="goNext" class="pink-btn" :disabled="!(simType != '')"
                            v-bind:class="{ 'disable' : !(simType != '')}" :value="renderText('strBtnSubmit')" />
                    </div>
                </div>
    </section>
</div>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var pageSimType = new Vue({
            el: '#main-vue',
            data: {
                simType: '',
                contract: {},
                contract_signed: "",
                eligibility: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                PlanSupportEsim:'',
                DeviceSupportEsim :'',
                deliveryInfo: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    addressMore: '',
                    addressLine: '',
                    postcode: '',
                    state: '',
                    stateCode: '',
                    city: '',
                    cityCode: '',
                    country: '',
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
                orderDetail: '',
                orderSummary: {
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems: []
                    },
                    orderInfo: {}
                },
                currentStep: 0,
                allowSubmit: false
            },

            created: function () {
                var self = this;
                setTimeout(function () {
                    toggleOverlay(true);
                    self.pageInit();
                }, 300);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {
                        toggleOverlay(true);
                        self.pageValid = true;
                        self.productId = elevate.lsData.meta.productId;
                        axios.get(apiEndpointURL_elevate + '/getProduct/?code=' + self.productId + '&nonce='+yesObj.nonce)
                        .then((response) => {
                            var data = response.data;
                            self.DeviceSupportEsim=data?.selected?.esim;
                            console.log(self.DeviceSupportEsim);
                            self.PlanSupportEsim=data?.selected?.plan.esim;
                            console.log(self.PlanSupportEsim);
                            
                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        })
                        if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
                        } else {
                            elevate.redirectToPage('eligibilitycheck');
                        }
                        if (elevate.lsData.customer) {
                            self.customer = elevate.lsData.customer;
                        }
                        if (elevate.lsData.orderDetail) {
                            self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                        }
                    } else {
                        elevate.redirectToPage('cart');
                    }
                },
                goNext: function () {
                    var self = this;
                    toggleOverlay();
                    elevate.lsData.meta.esim = (self.simType == 'eSIM') ? 'true' : 'false';
                    elevate.updateElevateLSData();
                    elevate.redirectToPage('personal');

                },
                renderText: function (strID) {
                    return elevate.renderText(strID, Elevate_lang);
                },                   
                showErrorEsimMsg:function(){
                    var element = document.getElementById("eSIM_msg");
                    console.log(element);
                    element.classList.remove("d-none");
                },
                hideErrorEsimMsg: function(){
                    var element = document.getElementById("eSIM_msg");
                    element.classList.add("d-none");       
                }
            }
        });
    });
</script>
