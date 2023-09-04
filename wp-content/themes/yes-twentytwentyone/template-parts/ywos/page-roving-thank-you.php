<?php include('header-ywos.php'); ?>


<style type="text/css">
    /* updated Thankyou page CSS */
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
        padding: 20px 0;
    }

    .step_sec span {
        background: #1A1E47;
        color: #fff;
        padding: 1px 9px;
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
        gap: 5px;
    }

    .step_sec_inner p {
        font-weight: 400;
        font-size: 16px;
        line-height: 22px;
        padding: 0 0 0 8px;
        width: 175px;
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

    .check {
        width: 70px;
    height: 70px;
    background: #78b13f;
    border-radius: 50px;
    margin: 0 auto 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .check:after {
        content: '';
    display: inline-block;
    transform: rotate(45deg);
    height: 35PX;
    width: 18PX;
    border-bottom: 7px solid #fff;
    border-right: 7px solid #fff;
    position: relative;
    margin: 0 0 10px;
    }
</style>


<div id="main-vue"
    class="container tx_box p-5 col-orderResponse h-100 d-flex align-items-center justify-content-center">
    <div  class="text-center">
        <div class="check"></div>
        <h1 class="mb-2">Thank you for the order</h1>
        <p class="tx">We have sent an email to the customer with payment link. Please inform the customer to check the email and guide them to proceed with the payment process.<br></p>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        toggleOverlay(false);

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                simType: '',
                highlightPlanIDs: [710, 759, 758],
                highlightPlans: [],
                orderDisplayID: '',
                paymentStatus: '',
                currentStep: 4,
                pageValid: false,
                trxType:'null',
                purchaseInfo: {
                    displayOrderNumber: '',
                    deliveryFromDate: '',
                    deliveryToDate: '',
                    orderCreationDate: ''
                },

                // pageText: {
                //     strThankYou: {
                //         'en-US': 'Thank you!',
                //         'ms-MY': 'Terima kasih!',
                //         'zh-hans': 'Thank you!'
                //     },
                //     strOrderNumber: {
                //         'en-US': 'Tracking number/Order number',
                //         'ms-MY': 'Tracking Number/Nombor Pesanan',
                //         'zh-hans': 'Tracking Number/Order Number'
                //     },
                //     strPlacedOn: {
                //         'en-US': 'Placed on',
                //         'ms-MY': 'Dipesan pada',
                //         'zh-hans': 'Placed on'
                //     },
                //     strEstimatedDelivery: {
                //         'en-US': 'Estimated Delivery',
                //         'ms-MY': 'Estimated Delivery',
                //         'zh-hans': 'Estimated Delivery'
                //     },
                //     strOrderSummary: {
                //         'en-US': 'A summary of your order has been sent to your email',
                //         'ms-MY': 'Ringkasan pesanan telah dihantar ke emel anda',
                //         'zh-hans': 'A summary of your order has been sent to your email'
                //     },
                //     strOrderPaymentPending: {
                //         'en-US': 'We have received your order and are waiting for payment clearance. You will receive confirmation email once payment is cleared.',
                //         'ms-MY': 'Kami telah menerima pesanan anda dan menunggu pelepasan bayaran yang telah dibuat. Anda akan memerima emel pengesahan setelah pembayaran teleh diterima.',
                //         'zh-hans': 'We have received your order and are waiting for payment clearance. You will receive confirmation email once payment is cleared.'
                //     },
                //     strPhysicalSimActivate: {
                //         'en-US': 'How to activate SIM.',
                //         'ms-MY': 'How to activate SIM.',
                //         'zh-hans': 'How to activate SIM.'
                //     },
                //     strPhysicalSimActivateStepOne: {
                //         'en-US': "Open MyYes app, choose New User' & 'Activate SIM'..",
                //         'ms-MY': "Open MyYes app, choose 'New User' & 'Activate SIM'..",
                //         'zh-hans': "Open MyYes app, choose 'New User' & 'Activate SIM'.."
                //     },
                //     strPhysicalSimActivateStepTwo: {
                //         'en-US': "Scan barcode on the back of the SIM jacket or manually enter SIM serial.",
                //         'ms-MY': "Scan barcode on the back of the SIM jacket or manually enter SIM serial.",
                //         'zh-hans': "Scan barcode on the back of the SIM jacket or manually enter SIM serial."
                //     },
                //     strPhysicalSimActivateStepThree: {
                //         'en-US': "Select ID & key in personal information, then select preferred plan and number.",
                //         'ms-MY': "Select ID & key in personal information, then select preferred plan and number.",
                //         'zh-hans': "Select ID & key in personal information, then select preferred plan and number."
                //     },
                //     strPhysicalSimActivateStepFour: {
                //         'en-US': "Complete eKYC & create login password for MyYes app.",
                //         'ms-MY': "Complete eKYC & create login password for MyYes app.",
                //         'zh-hans': "Complete eKYC & create login password for MyYes app."
                //     },
                //     strPhysicalSimActivateStepFive: {
                //         'en-US': "A confirmation message of your activation will be sent.",
                //         'ms-MY': "A confirmation message of your activation will be sent.",
                //         'zh-hans': "A confirmation message of your activation will be sent."
                //     },
                //     strEsimActivate: {
                //         'en-US': "How to activate eSIM",
                //         'ms-MY': "How to activate eSIM",
                //         'zh-hans': "How to activate eSIM"
                //     },
                //     strEsimActivateStepOne: {
                //         'en-US': "Start your purchase journey by selecting your preferred plan.",
                //         'ms-MY': "Start your purchase journey by selecting your preferred plan.",
                //         'zh-hans': "Start your purchase journey by selecting your preferred plan."
                //     },
                //     strEsimActivateStepTwo: {
                //         'en-US': "You will receive an eSIM barcode in your email",
                //         'ms-MY': "You will receive an eSIM barcode in your email",
                //         'zh-hans': "You will receive an eSIM barcode in your email"
                //     },
                //     strEsimActivateStepThree: {
                //         'en-US': "Download MyYes App, available in App Store & Google Playstore.",
                //         'ms-MY': "Download MyYes App, available in App Store & Google Playstore.",
                //         'zh-hans': "Download MyYes App, available in App Store & Google Playstore."
                //     },
                //     strEsimActivateStepFour: {
                //         'en-US': "Click on ‘Activate SIM’ and scan the barcode. Upon activation success, you will be auto-logged in to MyYes App.",
                //         'ms-MY': "Click on ‘Activate SIM’ and scan the barcode. Upon activation success, you will be auto-logged in to MyYes App.",
                //         'zh-hans': "Click on ‘Activate SIM’ and scan the barcode. Upon activation success, you will be auto-logged in to MyYes App."
                //     },
                //     strEsimActivateStepFive: {
                //         'en-US': "Click on ‘Install’ to get your eSIM.",
                //         'ms-MY': "Click on ‘Install’ to get your eSIM.",
                //         'zh-hans': "Click on ‘Install’ to get your eSIM."
                //     },

                // }
            },
            mounted: function () { },
            created: function () {
                var self = this;
                var url_string = window.location.href;
                var url = new URL(url_string);
                self.orderDisplayID = url.searchParams.get('order_display_id');
                self.paymentStatus = url.searchParams.get('status');

                setTimeout(function () {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (self.orderDisplayID) {
                        self.pageValid = true;
                        self.ajaxGetOrderByDisplayID();
                        // self.getHighlightPlans();
                        toggleOverlay(false);
                    } else if (ywos.validateSession(self.currentStep)) {
                        self.pageValid = true;
                        self.simType = ywos?.lsData?.meta?.esim;
                        // console.log(ywos?.lsData?.trxType);

                        self.updateData();
                        // self.getHighlightPlans();
                        toggleOverlay(false);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
 
                updateData: function () {
                    var self = this;
                    if (typeof ywos.lsData.meta.orderResponse != 'undefined') {
                        self.purchaseInfo.displayOrderNumber = ywos.lsData.meta.orderResponse.displayOrderNumber;
                        self.purchaseInfo.deliveryFromDate = moment(ywos.lsData.meta.orderResponse.deliveryFromDate, 'DD-MM-YYYY').format('Do MMM').split(' ');
                        self.purchaseInfo.deliveryFromDate = self.purchaseInfo.deliveryFromDate[0] + self.nthNumber(self.purchaseInfo.deliveryFromDate[0]) + ' ' + (self.purchaseInfo.deliveryFromDate[1]);
                        self.purchaseInfo.deliveryToDate = moment(ywos.lsData.meta.orderResponse.deliveryToDate, 'DD-MM-YYYY').format('Do MMM').split(' ');
                        self.purchaseInfo.deliveryToDate = self.purchaseInfo.deliveryToDate[0] + self.nthNumber(self.purchaseInfo.deliveryToDate[0]) + ' ' + (self.purchaseInfo.deliveryToDate[1]);

                        // self.purchaseInfo.orderCreationDate =moment(ywos.lsData.meta.orderResponse
                        //     .orderCreationDate,'dd-MM-yyyy hh:mm:ss').format("mm-yyyy").split(' ');
                        // self.purchaseInfo.orderCreationDate=ywos.lsData.meta.orderResponse.orderCreationDate;
                        // self.purchaseInfo.orderCreationDate= self.purchaseInfo.orderCreationDate[0] +  (self.purchaseInfo.orderCreationDate[1] + self.nthNumber(self.purchaseInfo.orderCreationDate[1]))+ ' ' + (self.purchaseInfo.orderCreationDate[2]) 
                    } else if (ywos.lsData.meta.purchaseInfo) {
                        self.purchaseInfo = ywos.lsData.meta.purchaseInfo;
                    }
                    self.clearLocalData(ywos.lsData.meta.planID, ywos.lsData.meta.completedStep);
                },
                clearLocalData: function (planID = 0, completedStep = 0) {
                    ywos.lsData.meta = {};
                    ywos.lsData.meta.planID = planID;
                    ywos.lsData.meta.completedStep = completedStep;
                    ywos.lsData.meta.purchaseInfo = this.purchaseInfo;
                    ywos.lsData.meta.purchaseCompleted = true;
                    ywos.updateYWOSLSData();
                },
                renderText: function (strID) {
                    return ywos.renderText(strID, this.pageText);
                },
                nthNumber: function (number) {
                    return number > 0
                        ? ["th", "st", "nd", "rd"][
                        (number > 3 && number < 21) || number % 10 > 3 ? 0 : number % 10
                        ]
                        : "";
                },

            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>