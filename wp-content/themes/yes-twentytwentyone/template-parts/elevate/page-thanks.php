<?php require_once('includes/header.php') ?>
<style>
    .tx_box_inner h1 {
        font-weight: 800 !important;
        font-size: 39px !important;
        line-height: 47px !important;
        letter-spacing: -0.02em !important;
        color: #000000;
    }

    .tx_box_inner .tx {
        font-weight: 700;
        font-size: 16px;
        line-height: 24px;
        color: #525252;
    }

    .tx_box_inner p {
        font-weight: 400;
        font-size: 16px;
        line-height: 22px;
        color: #525252;
    }

    .tx-img {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .step_sec .content {
        display: flex;
        align-items: flex-start;
        padding: 20px;
    }

    .step_sec span {
        background: #1A1E47;
        color: #fff;
        padding: 1px 9px;
        margin-right: 7px;
        text-align: center;
        border-radius: 50%;
    }

    .step_sec p {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        text-align: left;
        letter-spacing: -0.02em;
        color: #000000;
    }

    .step_sec_inner {
        display: flex;
        justify-content: center;
    }

    .step_sec_inner p {
        font-weight: 400;
        font-size: 16px;
        line-height: 22px;
        padding: 0 12px;
        width: 170px;
        color: #525252;
    }

    .tx_box h1 {
        font-weight: 800;
        font-size: 28px;
        line-height: 34px;
        letter-spacing: -0.02em;
        color: #000000;
    }

    .step_sec {
        background: #FFFFFF;
        box-shadow: 0px 4px 10px 3px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        margin: 30px 0;
        padding: 20px;
    }

    .viewall-btn {
        display: inline-block;
        text-transform: uppercase;
        text-align: center;
        text-decoration: none !important;
        font-family: 'Montserrat', sans-serif;
        color: #2F3BF5;
        letter-spacing: 0.1em;
        font-weight: 700;
        font-size: 18px;
    }

    .rs {
        display: flex;
        justify-content: space-between;
        margin: 30px 0;
    }

    .list p {
        display: inline;
    }

    .bottom_sec {
        display: flex;
        padding-top: 35px;
        justify-content: space-between;
        align-items: center;
    }

    .price-sec {
        background: #FFFFFF;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0px 4px 10px 3px rgba(0, 0, 0, 0.15);
    }

    .list {
        margin-bottom: 15px;
    }

    .list img {
        padding-bottom: 3px;
    }

    .price-sec h3 {
        font-weight: 800;
        font-size: 23px;
        line-height: 28px;
        letter-spacing: -0.02em;
        color: #2B2B2B;
        margin-bottom: 20px;
    }

    .bottom_sec h5 {
        font-weight: 800;
        font-size: 18px;
        line-height: 23px;
        letter-spacing: -0.02em;
        color: #1A1E47;
    }

    @media only screen and (max-width: 991px) {
        .step_sec_inner {
            flex-direction: column;
        }

        .step_sec .content {
            padding: 10px 0;
        }

        .price-sec {
            margin-bottom: 10px;
        }
    }
</style>
<div id="main-vue" style="display: none;">
    <header class="white-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="mt-4">
                        <a href="/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> {{ renderText('back_to_homepage') }}</a>
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
    <main class="clearfix site-main">

        <div class="container tx_box p-5">
            <div class="row">
                <div class="col-md-6 tx_box_inner">
                    <?php if ($_GET['status'] == 2) { ?>
                        <h1 class="mb-4">{{ renderText('thank_you') }}</h1>
                        <p class="tx">Tracking number/Order number<br></p>
                        <div class="subtitle">
                            <?php 
							
							if (isset($_GET['orderNumber'])) {
								$parts = explode('/', $_GET['orderNumber']);
							
								
								$orderNumber = $parts[0];
								echo $orderNumber; 
								
								} 
								
							?>
                        </div>
                        <div class="text-12 mt-2">Placed on
                            <?php echo date("l, jS F Y") ?>
                        </div>
                        <!-- Estimated Delivery: 14th Feb - 28th Feb --></p> 
                        <div class="mt-5">{{ renderText('summary_sent') }}
                            
                        <?php } else if ($_GET['status'] == 3) { ?>
                                <h1 class="title">{{ renderText('thank_you') }}</h1>
                                <div class="mt-5" v-html="renderText('received_your_order_msg')"></div>
                            <?php } else {
                        ?>
                                <h1 class="title"></h1>
                                <div class="subtitle" style="color:red">{{ renderText('payment_failure') }}</div>
                                <div class="mt-5">{{ renderText('sorry_payment_failure') }}</div>
                                <?php
                    } ?>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="tx-img">
                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/banner-side.png"
                        class="img-fluid" alt="...">
                </div>
            </div>
                <div class="row" v-if="(simType=='true')">
                    <div class="step_sec">
                        <h1>How to activate eSIM</h1>
                        <div class="step_sec_inner">
                            <div class="content">
                                <span>1</span>
                                <p>Start your purchase journey by selecting your preferred plan.</p>
                            </div>
                            <div class="content">
                                <span>2</span>
                                <p>You will receive an eSIM barcode in your email.</p>
                            </div>
                            <div class="content">
                                <span>3</span>
                                <p>Download MyYes App, available in App Store & Google Playstore.</p>
                            </div>
                            <div class="content">
                                <span>4</span>
                                <p>Click on ‘Activate SIM’ and scan the barcode. Upon activation success, you will be
                                    auto-logged in to MyYes App.</p>
                            </div>
                            <div class="content">
                                <span>5</span>
                                <p>Click on ‘Install’ to get your eSIM.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-else>
                    <div class="step_sec">
                        <h1>How to activate SIM</h1>
                        <div class="step_sec_inner">
                            <div class="content">
                                <span>1</span>
                                <p>Open MyYes app, choose 'New User' & 'Activate SIM'.</p>
                            </div>
                            <div class="content">
                                <span>2</span>
                                <p>Scan barcode on the back of the SIM jacket or manually enter SIM serial.</p>
                            </div>
                            <div class="content">
                                <span>3</span>
                                <p>Select ID & key in personal information, then select preferred plan and number.</p>
                            </div>
                            <div class="content">
                                <span>4</span>
                                <p>Complete eKYC & create login password for MyYes app.</p>
                            </div>
                            <div class="content">
                                <span>5</span>
                                <p>A confirmation message of your activation will be sent.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row price">
                    <div class="rs">
                        <h1>
                            You may also like
                        </h1>
                        <a href="/keep-your-number" class="viewall-btn">continue shopping<svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em"
                                height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                                data-icon="akar-icons:arrow-right">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M4 12h16m-7-7l7 7l-7 7"></path>
                            </svg></a>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="price-sec">
                                <h3>Kasi Up <br>
                                    Postpaid 30</h3>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>20GB for RM30</p>
                                </div>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>Unlimited refferals and earnings</p>
                                </div>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>Free Yes Altitude phone</p>
                                </div>
                                <div class="bottom_sec">
                                    <h5>RM30.00 /month</h5>
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/cards-1.png"
                                        class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="price-sec">
                                <h3>Merdeka Device<br> Bundle</h3>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>20GB for RM30</p>
                                </div>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>Unlimited refferals and earnings</p>
                                </div>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>Free Yes Altitude phone</p>
                                </div>
                                <div class="bottom_sec">
                                    <h5>RM30.00 /month</h5>
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/cards-1.png"
                                        class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="price-sec">
                                <h3>Kasi Up <br>
                                    Prepaid Unlimited 30</h3>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>20GB for RM30</p>
                                </div>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>Unlimited refferals and earnings</p>
                                </div>
                                <div class="list">
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/check-circle.png"
                                        class="img-fluid" alt="...">
                                    <p>Free Yes Altitude phone</p>
                                </div>
                                <div class="bottom_sec">
                                    <h5>RM30.00 /month</h5>
                                    <img src="https://yesmy-dev.azurewebsites.net/wp-content/uploads/2023/06/cards-1.png"
                                        class="img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </main>
</div>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                qrcode: null,
                simType:'',
                contract: {},
                contract_signed: "",
                eligibility: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
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
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {

                        if (elevate.lsData.orderInfo) {
                            self.orderSummary.orderInfo = elevate.lsData.orderInfo;
                        }
                        self.simType =elevate.lsData.meta.esim;
                        //console.log(self.orderSummary.orderInfo);
                        elevate.removeElevateLSData();

                    } else {
                        //elevate.redirectToPage('cart');
                    }
                },
                renderText: function (strID) {
                    return elevate.renderText(strID, Elevate_lang);
                }
            }
        });
    });
</script>