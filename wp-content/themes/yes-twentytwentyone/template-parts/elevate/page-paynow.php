<?php require_once 'includes/header.php'; ?>
    <header class="white-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="mt-4">
                        <a href="/elevate/contract/" class="back-btn "><img
                                    src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                    alt=""> Back</a>
                    </div>
                </div>
                <div class="col-lg-4 col-6 text-lg-center text-end">
                    <h1 class="title_checkout p-3">Check Out</h1>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </header>
    <!-- Vue Wrapper STARTS -->
    <main class="clearfix site-main">
    <div id="main-vue" style="display: none;">
        <!-- Banner Start -->
        <section id="grey-innerbanner">
            <div class="container">
                <ul class="wizard">
                    <li ui-sref="firstStep" class="completed">
                        <span>1. Eligibility check</span>
                    </li>
                    <li ui-sref="secondStep" class="completed">
                        <span>2. ID verification</span>
                    </li>
                    <li ui-sref="thirdStep" class="completed">
                        <span>3. Delivery details</span>
                    </li>
                    <li ui-sref="fourthStep" class="completed">
                        <span>4. Review and order</span>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Banner End -->

        <!-- Body STARTS -->
        <section id="cart-body">
            <input type="hidden" id="displayOrderNumber" value=""/>
            <div class="container p-lg-5 p-3">
                <div class="row d-lg-none mb-3">
                    <div class="col">
                        <h1>Payment Info</h1>
                        <p class="sub mb-4 pe-5">This information is required for online purchases and is used to verify and protect your identity. We keep this information safe and will not use it for any other purposes.</p>
                    </div>
                </div>
                <div class="row gx-5" v-if="pageValid">
                    <div class="col-lg-4 col-12 order-lg-2">
                        <?php include('section-order-summary.php'); ?>
                    </div>
                    <form class="col-lg-8 col-12 order-lg-1 mt-3 mt-lg-0" autocomplete="off" @submit="paymentSubmit">
                        <div>
                            <h1 class="mb-4 d-none d-lg-block">Payment Info</h1>
                            <p class="sub mb-4 pe-5 d-none d-lg-block">This information is required for online purchases and is used to verify and protect your identity. We keep this information safe and will not use it for any other purposes.</p>
                            <h2>Select payment</h2>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" id="nav-creditcard" role="tab" data-paymentnav="CREDIT_CARD" data-bs-toggle="pill" data-bs-target="#tab-creditcard" aria-controls="tab-creditcard" aria-selected="false" v-on:click="selectPaymentMethod('CREDIT_CARD')">
                                        <img src="/wp-content/uploads/2022/02/creditcard.png" />
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" id="nav-fpx" role="tab" data-paymentnav="FPX" data-bs-toggle="pill" data-bs-target="#tab-fpx" aria-controls="tab-fpx" aria-selected="false" v-on:click="selectPaymentMethod('FPX')">
                                        <img src="/wp-content/uploads/2022/02/fpx-logo.png" />
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation" v-if="!maybankIPP.disabled">
                                    <button type="button" class="nav-link" id="nav-creditcard" role="tab" data-paymentnav="CREDIT_CARD_IPP" data-bs-toggle="pill" data-bs-target="#tab-creditcard" aria-controls="tab-creditcard" aria-selected="false" v-on:click="selectPaymentMethod('CREDIT_CARD_IPP')">
                                        <img src="/wp-content/uploads/2022/02/maybank-ipp-logo.png" />
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane" id="tab-creditcard" role="tabpanel" aria-labelledby="nav-creditcard">
                                    <div class="tab-paneContent">
                                        <template v-if="paymentInfo.paymentMethod == 'CREDIT_CARD'">
                                            <div class="row mb-4">
                                                <div class="col-lg-6">
                                                    <h4 class="my-3">Credit/Debit Card</h4>
                                                    <p class="panel-weaccept">
                                                        We accept
                                                        <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/visa.png" />
                                                        <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/amex.png" />
                                                        <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/mastercard.png" />
                                                    </p>
                                                </div>
                                            </div>
                                        </template>
                                        <div v-bind:class="{ 'd-none': (maybankIPP.disabled || paymentInfo.paymentMethod != 'CREDIT_CARD_IPP') }">
                                            <div class="row mb-4">
                                                <div class="col-lg-6">
                                                    <h4 class="my-3">Maybank 0% EzyPay (Instalment Payment)</h4>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-6">
                                                    <label class="form-label" for="select-tenure">Installment Type</label>
                                                    <div class="form-group">
                                                        <select class="form-control form-select" id="select-tenure" data-live-search="false" name="ipp-tenure" v-model="paymentInfo.ippType" @change="watchTenureChange">
                                                            <option value="" disabled="disabled" selected="selected">Select Installment Type</option>
                                                            <option v-for="ippType in maybankIPP.ippTypeList" :value="ippType.ippTenureType">{{ ippType.ippTenureTypeDisplay }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-6 col-12">
                                                <label class="form-label" for="input-chName">* Cardholder Name</label>
                                                <div class="input-group align-items-center">
                                                    <input type="text" class="form-control" id="input-chName" v-model="paymentInfo.nameOnCard" @input="watchAllowSubmit" placeholder="John Doe"  @keypress="checkInputFullName(event)" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center g-2">
                                            <div class="col-12">
                                                <label class="form-label" for="input-chNumber1">* Card Number</label>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-1">
                                                <div class="input-group align-items-center">
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput1" v-model="cardholder.number1" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(1, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput2" v-model="cardholder.number2" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(2, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput3" v-model="cardholder.number3" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(3, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput4" v-model="cardholder.number4" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(4, event)" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                                </div>
                                            </div>
                                            <p class="info mb-3">Numbers must contain 16 digits</p>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-3 col-12">
                                                <label class="form-label" for="input-cardInput5">* Exp Date</label>
                                                <div class="input-group align-items-center">
													<input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput5" autocomplete="off" v-model="paymentInfo.cardExpiryMonth" placeholder="MM" maxlength="2" @input="checkCardInputJump(5, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /> <span class="mx-2">/</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput6" autocomplete="off" v-model="paymentInfo.cardExpiryYear" placeholder="YYYY" maxlength="4" @input="checkCardInputJump(6, event)" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-12">
                                                <label class="form-label" for="input-cardInput7">* CVV</label>
                                                <div class="input-group align-items-center">
                                                    <input type="password" class="form-control text-center" id="input-cardInput7" autocomplete="off" v-model="paymentInfo.cardCVV" @input="watchAllowSubmit" placeholder="***" maxlength="3" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-fpx" role="tabpanel" aria-labelledby="nav-fpx">
                                    <div class="tab-paneContent">
                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <h4 class="my-3">Online Banking (FPX)</h4>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-12">
                                                <ul class="nav nav-pills listing-quickSelectBanks">
                                                    <li class="nav-item text-center" v-for="quickSelectBank in quickSelectBanks" v-on:click="selectBank(quickSelectBank.value, event)"><div class="img-quickSelectBank"><img :src="quickSelectBank.imgSrc" :alt="quickSelectBank.name" :title="quickSelectBank.name" /></div><span>{{ quickSelectBank.name }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control form-select" id="select-bank" data-live-search="true" name="fpx-bank" v-model="paymentInfo.bankCode" @change="watchBankSelect">
                                                        <option value="" disabled="disabled" selected="selected">Select a Bank</option>
                                                        <option v-for="fpxBank in fpxBankList" :value="fpxBank.bankCode" :disabled="!fpxBank.available" :data-bankname="fpxBank.bankName">{{ fpxBank.bankName }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <button type="submit" class="pink-btn w-100" :disabled="!allowSubmit">Pay</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Body ENDS -->
    </div>
    </main>
    <!-- Vue Wrapper ENDS -->

    <div class="modal fade" id="modal-alert" tabindex="-1" aria-labelledby="modal-alert" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="modal-titleLabel"></h5>
                </div>
                <div class="modal-body text-center">
                    <p id="modal-bodyText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var mainwin;
        $(document).ready(function() {
            toggleOverlay();

            var pageDelivery = new Vue({
                el: '#main-vue',
                data: {
                    currentStep: 0,
                    pageValid: false,
                    allowSubmit: false,
                    orderSummary: {
                        plan: {},
                        due: {
                            amount: 0.00,
                            addOns: 0.00,
                            planAmount: 0.00,
                            taxesSST: 0.00,
                            shippingFees: 0.00,
                            rounding: 0.00,
                            foreignerDeposit: 0.00,
                            total: 0.00
                        },
                        addOn: null,
                        product: {
                            selected:{
                                productCode:'',
                                code:'',
                                nameEN:'',
                                shortDescriptionEN:'',
                                productBundleId:'',
                                extraProperties:'',
                                contractName:'',
                                capacity:'',
                                color:'',
                                contract:'',
                                devicePriceMonth:'',
                                planPerMonth:'',
                                upFrontPayment:0.0,
                                plan:{
                                    planId:'',
                                    nameEN:'',
                                    shortDescriptionEN:'',
                                }
                            },
                            colors:[]
                        },
                        orderDetail: {
                            total: 0.00,
                            color: null,
                            productCode: null,
                            orderItems:[]
                        },
                    },
                    deliveryInfo: {
                        name: '',
                        email: '',
                        emailConfirm: '',
                        address: '',
                        addressMore: '',
                        addressLine: '',
                        postcode: '',
                        state: '',
                        city: '',
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
                    paymentInfo: {
                        paymentMethod: 'CREDIT_CARD',
                        processName: 'NEW_YOS_ORDER',
                        amount: 0.00,
                        sst: 0.00,
                        totalAmount: 0.00,
                        bankCode: '',
                        bankName: '',
                        cardNumber: '',
                        cardType: '',
                        nameOnCard: '',
                        cardCVV: '',
                        cardExpiryMonth: '',
                        cardExpiryYear: '',
                        isAutoSubscribe: false,
                        isSaveMyCard: false,
                        ippType: ''
                    },
                    YOSOrder:{
                        displayOrderNumber:null,
                        orderNumber:null
                    },
                    fpxBanks: [
                        { value: "alliance-bank", name: "Alliance Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/alliance.png" },
                        { value: "bank-islam", name: "Bank Islam", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/islam.png", quickSelect: false },
                        { value: "bank-muamalat", name: "Muamalat Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/muamalat.png", quickSelect: false },
                        { value: "bank-rakyat", name: "Bank Rakyat", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/rakyat.png", quickSelect: false },
                        { value: "bsn", name: "BSN", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/bsn.png", quickSelect: false },

                        { value: "BCBB0235", name: "CIMB Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/cimb.png", quickSelect: true },
                        { value: "HLB0224", name: "Hong Leong Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/hong-leong.png", quickSelect: true },
                        { value: "hsbc-bank", name: "HSBC Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/hsbc.png", quickSelect: false },
                        { value: "kfh", name: "KFH", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/kfh.png", quickSelect: false },
                        { value: "maybank-2e", name: "Maybank2E", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/maybank.png", quickSelect: false },

                        { value: "MB2U0227", name: "Maybank2U", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/maybank.png", quickSelect: true },
                        { value: "ocbc-bank", name: "OCBC Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/ocbc.png", quickSelect: false },
                        { value: "PBB0233", name: "Public Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/public.png", quickSelect: true },
                        { value: "rhb-bank", name: "RHB Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/rhb.png", quickSelect: false },
                        { value: "sbi-bank-a", name: "SBI Bank A", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/sbi.png", quickSelect: false },

                        { value: "sbi-bank-b", name: "SBI Bank B", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/sbi.png", quickSelect: false },
                        { value: "sbi-bank-c", name: "SBI Bank C", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/sbi.png", quickSelect: false },
                        { value: "standard-chartered", name: "Standard Chartered", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/standard-chartered.png", quickSelect: false },
                        { value: "uob-bank", name: "UOB Bank", imgSrc: "https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/bank-icons/uob.png", quickSelect: false }
                    ],
                    fpxBankList: [],
                    cardholder: {
                        number1: '',
                        number2: '',
                        number3: '',
                        number4: '',
                        number5: '',
                        number6: '',
                        number7: ''
                    },
                    maybankIPP: {
                        disabled: true,
                        ippTypeList: [],
                        ippInstallments: [],
                        ippInstallmentSelected: {
                            duration: 0,
                            administrationPayment: 0.00,
                            monthlyInstallment: ''
                        }
                    },
                    countries: [
                        { "value": "Malaysia", "name": "Malaysia" },
                        { "value": "Argentina", "name": "Argentina" },
                        { "value": "Australia", "name": "Australia" },
                        { "value": "Austria", "name": "Austria" },
                        { "value": "Azerbaijan", "name": "Azerbaijan" },
                        { "value": "Bahamas", "name": "Bahamas" },
                        { "value": "Bahrain", "name": "Bahrain" },
                        { "value": "Bangladesh", "name": "Bangladesh" },
                        { "value": "Belarus", "name": "Belarus" },
                        { "value": "Belgium", "name": "Belgium" },
                        { "value": "Benin", "name": "Benin" },
                        { "value": "Brazil", "name": "Brazil" },
                        { "value": "Brunei Darussalam", "name": "Brunei Darussalam" },
                        { "value": "Bulgaria", "name": "Bulgaria" },
                        { "value": "Cambodia", "name": "Cambodia" },
                        { "value": "Canada", "name": "Canada" },
                        { "value": "Cape Verde", "name": "Cape Verde" },
                        { "value": "Chad", "name": "Chad" },
                        { "value": "Chile", "name": "Chile" },
                        { "value": "China", "name": "China" },
                        { "value": "Colombia", "name": "Colombia" },
                        { "value": "Congo", "name": "Congo" },
                        { "value": "Congo, Democratic Republic of the", "name": "Congo, Democratic Republic of the" },
                        { "value": "Costa Rica", "name": "Costa Rica" },
                        { "value": "Cote d'Ivoire", "name": "Cote d'Ivoire" },
                        { "value": "Croatia", "name": "Croatia" },
                        { "value": "Cyprus", "name": "Cyprus" },
                        { "value": "Czech Republic", "name": "Czech Republic" },
                        { "value": "Denmark", "name": "Denmark" },
                        { "value": "Ecuador", "name": "Ecuador" },
                        { "value": "Egypt", "name": "Egypt" },
                        { "value": "El Salvador", "name": "El Salvador" },
                        { "value": "Estonia", "name": "Estonia" },
                        { "value": "Fiji", "name": "Fiji" },
                        { "value": "Finland", "name": "Finland" },
                        { "value": "France", "name": "France" },
                        { "value": "French Polynesia", "name": "French Polynesia" },
                        { "value": "Gabon", "name": "Gabon" },
                        { "value": "Gambia", "name": "Gambia" },
                        { "value": "Germany", "name": "Germany" },
                        { "value": "Ghana", "name": "Ghana" },
                        { "value": "Gibraltar", "name": "Gibraltar" },
                        { "value": "Greece", "name": "Greece" },
                        { "value": "Guam", "name": "Guam" },
                        { "value": "Guatemala", "name": "Guatemala" },
                        { "value": "Guinea-Bissau", "name": "Guinea-Bissau" },
                        { "value": "Guyana", "name": "Guyana" },
                        { "value": "Hong Kong", "name": "Hong Kong" },
                        { "value": "Hungary", "name": "Hungary" },
                        { "value": "Iceland", "name": "Iceland" },
                        { "value": "India", "name": "India" },
                        { "value": "Indonesia", "name": "Indonesia" },
                        { "value": "International Airspace", "name": "International Airspace" },
                        { "value": "Iran", "name": "Iran" },
                        { "value": "Ireland", "name": "Ireland" },
                        { "value": "Italy", "name": "Italy" },
                        { "value": "Japan", "name": "Japan" },
                        { "value": "Jordan", "name": "Jordan" },
                        { "value": "Kazakhstan", "name": "Kazakhstan" },
                        { "value": "Kenya", "name": "Kenya" },
                        { "value": "Korea, Republic of", "name": "Korea, Republic of" },
                        { "value": "Latvia", "name": "Latvia" },
                        { "value": "Liechtenstein", "name": "Liechtenstein" },
                        { "value": "Lithuania", "name": "Lithuania" },
                        { "value": "Luxembourg", "name": "Luxembourg" },
                        { "value": "Macau", "name": "Macau" },
                        { "value": "Madagascar", "name": "Madagascar" },
                        { "value": "Malawi", "name": "Malawi" },
                        { "value": "Mauritius", "name": "Mauritius" },
                        { "value": "Mexico", "name": "Mexico" },
                        { "value": "Montenegro, Republic of", "name": "Montenegro, Republic of" },
                        { "value": "Morocco", "name": "Morocco" },
                        { "value": "Myanmar", "name": "Myanmar" },
                        { "value": "Netherlands", "name": "Netherlands" },
                        { "value": "New Zealand", "name": "New Zealand" },
                        { "value": "Nicaragua", "name": "Nicaragua" },
                        { "value": "Niger", "name": "Niger" },
                        { "value": "Nigeria", "name": "Nigeria" },
                        { "value": "Norway", "name": "Norway" },
                        { "value": "Oman", "name": "Oman" },
                        { "value": "Pakistan", "name": "Pakistan" },
                        { "value": "Panama", "name": "Panama" },
                        { "value": "Papua New Guinea", "name": "Papua New Guinea" },
                        { "value": "Paraguay", "name": "Paraguay" },
                        { "value": "Peru", "name": "Peru" },
                        { "value": "Philippines", "name": "Philippines" },
                        { "value": "Poland", "name": "Poland" },
                        { "value": "Puerto Rico", "name": "Puerto Rico" },
                        { "value": "Qatar", "name": "Qatar" },
                        { "value": "Romania", "name": "Romania" },
                        { "value": "Russian Federation", "name": "Russian Federation" },
                        { "value": "Rwanda", "name": "Rwanda" },
                        { "value": "Samoa", "name": "Samoa" },
                        { "value": "Saudi Arabia", "name": "Saudi Arabia" },
                        { "value": "Seychelles", "name": "Seychelles" },
                        { "value": "Singapore", "name": "Singapore" },
                        { "value": "Slovakia (Slovak Republic)", "name": "Slovakia (Slovak Republic)" },
                        { "value": "Slovenia", "name": "Slovenia" },
                        { "value": "South Africa", "name": "South Africa" },
                        { "value": "Spain", "name": "Spain" },
                        { "value": "Sri Lanka", "name": "Sri Lanka" },
                        { "value": "Suriname", "name": "Suriname" },
                        { "value": "Swaziland", "name": "Swaziland" },
                        { "value": "Sweden", "name": "Sweden" },
                        { "value": "Switzerland", "name": "Switzerland" },
                        { "value": "Taiwan", "name": "Taiwan" },
                        { "value": "Tanzania, United Republic of", "name": "Tanzania, United Republic of" },
                        { "value": "Thailand", "name": "Thailand" },
                        { "value": "Tonga", "name": "Tonga" },
                        { "value": "Trinidad and Tobago", "name": "Trinidad and Tobago" },
                        { "value": "Turkey", "name": "Turkey" },
                        { "value": "Uganda", "name": "Uganda" },
                        { "value": "Ukraine", "name": "Ukraine" },
                        { "value": "United Arab Emirates", "name": "United Arab Emirates" },
                        { "value": "United Kingdom", "name": "United Kingdom" },
                        { "value": "United States", "name": "United States" },
                        { "value": "Uruguay", "name": "Uruguay" },
                        { "value": "Vanuatu", "name": "Vanuatu" },
                        { "value": "Venezuela", "name": "Venezuela" },
                        { "value": "Vietnam", "name": "Vietnam" },
                        { "value": "Zambia", "name": "Zambia"}
                    ],
                    orderResponse: {
                        orderNumber: '',
                        displayOrderNumber: '',
                        xpayOrderId: '',
                        encryptedValue: '',
                        grandTotal: 0.00,
                        roundingAdjustment: 0.00,
                        gstTotal: 0.00,
                        totalWithOutGST: 0.00,
                        shippingCharges: 0.00,
                        shippingChargesWithGST: 0.00,
                        foreignerDeposit: 0.00,
                        deliveryFromDate: '',
                        deliveryToData: '',
                        deliveryType: ''
                    },
                    checkPaymentStatusCount: 0,
                    paymentResponse: null
                },
                mounted: function() {},
                created: function() {
                    var self = this;
                    setTimeout(function() {
                        self.pageInit();
                    }, 500);
                    self.initTabs();
                },
                computed: {
                    quickSelectBanks: function() {
                        return this.fpxBanks.filter(function(bank) {
                            return bank.quickSelect
                        })
                    }
                },
                methods: {
                    pageInit: function() {
                        var self = this;

                        if (elevate.validateSession(self.currentStep)) {
                            self.pageValid = true;
                            if (elevate.lsData.eligibility) {
                            self.eligibility = elevate.lsData.eligibility;
							}else{
								 elevate.redirectToPage('eligibilitycheck');
							}
							if (elevate.lsData.deliveryInfo) {
								self.deliveryInfo = elevate.lsData.deliveryInfo;
							}else{
								 elevate.redirectToPage('personal');
							}
                            if (elevate.lsData.customer) {
                                self.customer = elevate.lsData.customer;
                            }

                            if (elevate.lsData.orderDetail) {
                                self.orderSummary.orderDetail = elevate.lsData.orderDetail;
                            }else{
								 elevate.redirectToPage('contract');
							}
                            if (elevate.lsData.product) {
                                self.orderSummary.product = elevate.lsData.product;
                            }

                            if (elevate.lsData.contract) {
                                self.contract = elevate.lsData.contract;
                                self.contractSigned = true;
                            }

                            self.productId = elevate.lsData.product.selected.productCode;
                            self.dealer = elevate.lsData.meta.dealer;

                            self.ajaxGetFPXBankList();
                            self.updateData();
                        } else {
                            elevate.redirectToPage('cart');
                        }
                    },
                    ajaxGetFPXBankList: function() {
                        var self = this;
                        axios.get(apiEndpointURL + '/get-fpx-bank-list')
                            .then((response) => {
                                var data = response.data;
                                if (!data.fpxServiceDown) {
                                    var fpxBankTypeDetailList = data.fpxBankTypeDetailList;
                                    var fpxBankPersonal = fpxBankTypeDetailList.filter(list => {
                                        return list.bankType == 'PERSONALBANKLIST';
                                    })
                                    if (fpxBankPersonal) {
                                        fpxBankPersonal = fpxBankPersonal[0];
                                        var fpxBankList = fpxBankPersonal.fpxDataList;
                                        for (var i = 0; i < fpxBankList.length; i++) {
                                            var bankName = fpxBankList[i].bankName;
                                            fpxBankList[i].bankName = bankName.replace('(Offline)', ' (Offline)');
                                        }
                                        self.fpxBankList = fpxBankList;
                                    }
                                }
                            })
                            .catch((error) => {
                                // console.log(error);
                            })
                            .finally(() => {
                                setTimeout(function() {
                                    $('.form-select#select-bank').selectpicker('refresh');
                                    // toggleOverlay(false);
                                }, 500);
                            });
                    },
                    ajaxGetMaybankIPPTenures: function() {
                        var self = this;
                        axios.post(apiEndpointURL + '/get-ipp-tenures', {
                            'plan_name': self.orderSummary.product.selected.plan.planName
                        })
                            .then((response) => {
                                var data = response.data;
                                self.maybankIPP.ippTypeList = data.ippTypList;

                                self.getMaybankIPPInstallments();
                            })
                            .catch((error) => {
                                // console.log(error.response.data);
                            })
                            .finally(() => {
                                setTimeout(function() {
                                    $('.form-select#select-tenure').selectpicker('refresh');
                                    toggleOverlay(false);
                                }, 500);
                            });
                    },
                    ajaxGetMaybankIPPInstallments: function(totalAmount, tenure) {
                        var self = this;
                        var ippInstallment = {};
                        axios.post(apiEndpointURL + '/get-ipp-monthly-installments', {
                            'total_amount': totalAmount,
                            'tenure_type': tenure
                        })
                            .then((response) => {
                                var data = response.data;
                                ippInstallment = {
                                    tenure,
                                    displayIPPMonthlyInstalment: data.displayIPPMonthlyInstalment,
                                    displayResponseMessage: data.displayResponseMessage,
                                    ippMonthlyInstalment: data.ippMonthlyInstalment
                                };
                                self.maybankIPP.ippInstallments.push(ippInstallment);
                            })
                            .catch((error) => {
                                // console.log(error.response.data);
                            });
                    },
                    getMaybankIPPInstallments: function() {
                        var self = this;
                        var totalAmount = self.orderSummary.due.total;
                        var tenure = '';

                        if (self.maybankIPP.ippTypeList.length) {
                            self.maybankIPP.disabled = false;
                            self.maybankIPP.ippTypeList.map(function(type) {
                                tenure = type.ippTenureType;
                                self.ajaxGetMaybankIPPInstallments(totalAmount, tenure);
                            });
                        }
                    },
                    updateData: function() {
                        var self = this;
                        self.paymentInfo.amount = self.orderSummary.orderDetail.total;
                        self.paymentInfo.sst = self.orderSummary.orderDetail.sstAmount;
                        self.paymentInfo.totalAmount = self.orderSummary.orderDetail.total;

                        self.ajaxGetMaybankIPPTenures();
                    },
                    toggleModalAlert: function(modalHeader = '', modalText = '') {
                        $('#modal-titleLabel').html(modalHeader);
                        $('#modal-bodyText').html(modalText);
                        $('#modal-alert').modal('show');
                        $('#modal-alert').on('hidden.bs.modal', function() {
                            $('#modal-titleLabel').html('');
                            $('#modal-bodyText').html('');
                        });
                    },
                    ajaxCheckOrderPaymentStatus(timeoutObj) {
                        var self = this;
                        var params = {
                            'session_key': elevate.lsData.sessionKey,
                            'yos_order_id': self.orderResponse.orderNumber
                        };
                        console.log(self.orderResponse);
                        axios.post(apiEndpointURL + '/check-order-payment-status', params)
                            .then((response) => {
                                var data = response.data;
                                if (data != null && data.responseCode != null) {
                                    console.log('payment through');
                                    self.paymentResponse = data;
                                    clearTimeout(timeoutObj);

                                    if (mainwin && !mainwin.closed) {
                                        mainwin.focus();
                                        mainwin.close();
                                    }

                                    self.redirectThankYou();
                                } else {
                                    setTimeout(function() {
                                        self.ajaxCheckOrderPaymentStatus(timeoutObj);
                                    }, 10000);
                                }
                            })
                            .catch((error) => {
                                var response = error.response;
                                self.checkPaymentStatusCount++;
                                if (typeof response != 'undefined' && self.checkPaymentStatusCount > 4) {
                                    var data = response.data;
                                    var errorMsg = '';
                                    if (error.response.status == 500 || error.response.status == 503) {
                                        errorMsg = "There's an error in processing your payment.<br />Please try again later.";
                                    } else {
                                        errorMsg = data.message
                                    }
                                    toggleOverlay(false);
                                    self.toggleModalAlert('Error Payment', errorMsg);
                                    self.cancelElevateOrder(errorMsg);

                                    //cancel Elevate order

                                    clearTimeout(timeoutObj);

                                    if (mainwin && !mainwin.closed) {
                                        mainwin.focus();
                                        mainwin.close();
                                    }
                                } else {
                                    setTimeout(function() {
                                        self.ajaxCheckOrderPaymentStatus(timeoutObj);
                                    }, 10000);
                                }
                                console.log(error, response);
                            });
                    },
                    initXpay: function() {
                        var self = this;
                        var xpayOrderId = self.orderResponse.xpayOrderId;
                        var encryptedValue = self.orderResponse.encryptedValue;
                        console.log("orderResponse",self.orderResponse);

                        self.updateElevateOrder();

                        var timeoutObject = setTimeout(function() {
                            if (mainwin != null && !mainwin.closed) {
                                mainwin.focus();
                                mainwin.close();
                            }
                             self.redirectThankYou();
                        }, 300000);

                        mainwin = postPayment({ order_id: xpayOrderId,  encrypted_string: encryptedValue });

                        setTimeout(function() {
                            self.checkPaymentStatusCount = 0;
                            self.ajaxCheckOrderPaymentStatus(timeoutObject);
                        }, 10000);
                    },
                    getGender: function (){
                        var self = this;
                        var genderDigit = self.eligibility.mykad.substring(11);
                        //console.log(self.eligibility.mykad, genderDigit);
                        if (genderDigit % 2 == 0) //even
                        {
                            return "FEMALE"; //female
                        }
                        else //odd
                        {
                            return "MALE"; //male
                        }
                    },
                    getDOB: function (){
                        var self = this;
                        var dateString = self.eligibility.mykad.substring(0, 6);
                        console.log(self.eligibility.mykad, dateString);

                        var year = dateString.substring(0, 2); //year
                        var month = dateString.substring(2, 4); //month
                        var date = dateString.substring(4, 6); //date

                        if (year > 20) {
                            year = "19" + year;
                        }
                        else {
                            year = "20" + year;
                        }

                        var dob = date + "/" + month + "/" + year;
                        return dob;
                    },

                    ajaxCreateYOSOrder: function() {
                        var self = this;
                        var params = {
                            "session_key": elevate.lsData.sessionKey,
                            "phone_number": self.deliveryInfo.phone,
                            "customer_name": self.deliveryInfo.name,
                            "dob": self.getDOB(),
                            "gender": self.getGender(),
                            "email": self.deliveryInfo.email,
                            "login_yes_id": "",
                            "security_type": "NRIC",
                            "security_id": self.deliveryInfo.mykad,
                            "school_name": "",
                            "school_code": "",
                            "university_name": "",
                            "dealer_code": "",
                            "dealer_login_id": "",
                            "plan_name": self.orderSummary.product.selected.plan.planName,
                            "plan_type": self.orderSummary.product.selected.plan.planType,
                            "product_bundle_id": self.productId,
                            "referral_code": self.deliveryInfo.referralCode,
                            "addon_name": "",
                            "address_line": (self.deliveryInfo.addressMore)?self.deliveryInfo.addressMore+', '+self.deliveryInfo.address:self.deliveryInfo.address,
                            "city": self.deliveryInfo.city,
                            "city_code": self.deliveryInfo.cityCode,
                            "postal_code": self.deliveryInfo.postcode,
                            "state": self.deliveryInfo.state,
                            "state_code": self.deliveryInfo.stateCode,
                            "country": "Malaysia",
                            "payment_method":self.paymentInfo.paymentMethod,
                            "process_name": self.paymentInfo.processName,
                            "amount": roundAmount(self.paymentInfo.amount, 2),
                            "amount_sst": roundAmount(self.paymentInfo.sst, 2),
                            "total_amount": roundAmount(self.paymentInfo.totalAmount, 2),
                            "bank_code": self.paymentInfo.bankCode,
                            "bank_name": self.paymentInfo.bankName,
                            "card_number": self.paymentInfo.cardNumber,
                            "card_type": self.paymentInfo.cardType,
                            "name_on_card": self.paymentInfo.nameOnCard,
                            "card_cvv": self.paymentInfo.cardCVV,
                            "card_expiry_month": self.paymentInfo.cardExpiryMonth,
                            'card_expiry_year'  : self.paymentInfo.cardExpiryYear,
                            'ippType'       : self.paymentInfo.ippType
                        }

                        //console.log("params",params); return;
                        axios.post(apiEndpointURL + '/create-yos-order', params)
                            .then((response) => {
                                var data = response.data;
                                self.orderResponse = data;

                                $('#displayOrderNumber').val(data.displayOrderNumber);

                                elevate.lsData.YOSOrder = data;
                                elevate.updateElevateLSData();

                                self.initXpay();
                            })
                            .catch((error) => {
                                var response = error.response;
                                if (typeof response != 'undefined') {
                                    var data = response.data;
                                    var errorMsg = '';
                                    if (error.response.status == 500 || error.response.status == 503) {
                                        errorMsg = "There's an error in creating your order.<br />Please try again later.";
                                    } else {
                                        errorMsg = data.message
                                    }
                                    toggleOverlay(false);
                                    self.toggleModalAlert('Error', errorMsg);

                                    self.cancelElevateOrder(errorMsg);
                                }
                                console.log(error, response);
                            })
                            .finally(() => {
                                // console.log('finally');
                            });

                        // console.log(JSON.stringify(params));
                    },
                    paymentSubmit: function(e) {
                        var self = this;
                        toggleOverlay();
                        if(self.orderResponse.orderNumber){
                            this.initXpay();
                        }else{
                            this.ajaxCreateYOSOrder();
                        }

                        e.preventDefault();
                    },
                    redirectThankYou: function() {

                        var self = this;

                        elevate.lsData.meta.completedStep = self.currentStep;
                        elevate.lsData.meta.paymentInfo = self.paymentInfo;
                        elevate.lsData.meta.orderResponse = self.orderResponse;
                        elevate.lsData.meta.paymentResponse = self.paymentResponse;
                        elevate.updateElevateLSData();

                        elevate.redirectToPage('thanks?orderNumber='+$('#displayOrderNumber').val());
                    },
                    updateElevateOrder: function (){
                        var self = this;

                        toggleOverlay();
                        var param = elevate.lsData.orderInfo;
                        param.orderNumber = self.orderResponse.orderNumber;

                        axios.post(apiEndpointURL_elevate + '/order/update', param)
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){

                                }else{
                                    toggleOverlay(false);
                                    $('#error').html("Systm error, please try again.");
                                    console.log(data);
                                }
                            })
                            .catch((error) => {
                                toggleOverlay(false);
                                console.log(error, response);
                            });

                    },

                    cancelElevateOrder: function (error){
                        var self = this;

                        toggleOverlay();
                        var param = elevate.lsData.orderInfo;
                        param.orderNumber = self.orderResponse.orderNumber;
                        param.error = error;

                        axios.post(apiEndpointURL_elevate + '/order/cancel', param)
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){

                                }else{
                                    toggleOverlay(false);
                                    $('#error').html("Systm error, please try again.");
                                    console.log(data);
                                }
                            })
                            .catch((error) => {
                                toggleOverlay(false);
                                console.log(error, response);
                            });

                    },
                    selectBank: function(bank, event) {
                        var self = this;
                        $('.listing-quickSelectBanks .nav-item').removeClass('selected');
                        $(event.currentTarget).addClass('selected');
                        self.paymentInfo.bankCode = bank;
                        self.watchBankSelect();
                        setTimeout(function() {
                            $('#select-bank').trigger('change');
                            $('#select-bank').selectpicker('refresh');
                        }, 100);
                    },
                    checkCardInputJump: function(inputStep, event) {
                        var self = this;
                        var objInd = 'number' + inputStep;
                        var inputVal = '';
                        var nextStep = inputStep + 1;
                        if (inputStep <= 4) {
                            inputVal = self.cardholder[objInd];
                            if (inputVal.length > 3) {
                                $('#input-cardInput' + nextStep).focus();
                            }
                            if (inputVal.length == 4 && inputStep == 4 && self.cardholder.number1.length == 4 && self.cardholder.number2.length == 4 && self.cardholder.number3.length == 4 && self.cardholder.number4.length == 4) {
                                self.paymentInfo.cardNumber = self.cardholder.number1 + self.cardholder.number2 + self.cardholder.number3 + self.cardholder.number4;
                                self.paymentInfo.cardType = getCreditCardType(self.paymentInfo.cardNumber);
                            } else {
                                self.paymentInfo.cardNumber = '';
                                self.paymentInfo.cardType = '';
                            }
                        } else if (inputStep == 5) {
                            inputVal = self.paymentInfo.cardExpiryMonth;
                            if (inputVal.length == 2) {
                                $('#input-cardInput' + nextStep).focus();
                            }
                        } else if (inputStep == 6) {
                            inputVal = self.paymentInfo.cardExpiryYear;
                            if (inputVal.length == 4) {
                                $('#input-cardInput' + nextStep).focus();
                            }
                        }
                        self.watchAllowSubmit();
                    },
                    watchTenureChange: function(e) {
                        var self = this;
                        var selectedTenure = self.maybankIPP.ippInstallments.filter(installment => { return installment.tenure == self.paymentInfo.ippType });
                        if (selectedTenure) {
                            selectedTenure = selectedTenure[0];
                            self.maybankIPP.ippInstallmentSelected = {
                                duration: selectedTenure.tenure,
                                administrationPayment: 0.00,
                                monthlyInstallment: selectedTenure.displayIPPMonthlyInstalment
                            };
                            self.watchAllowSubmit();
                        } else {
                            self.maybankIPP.ippInstallmentSelected = {
                                duration: 0,
                                administrationPayment: 0.00,
                                monthlyInstallment: ''
                            };
                        }
                    },
                    watchBankSelect: function(e) {
                        var self = this;
                        var bankListSelected = self.fpxBankList.filter(bank => { return bank.bankCode == self.paymentInfo.bankCode; });
                        if (bankListSelected) {
                            self.paymentInfo.bankName = bankListSelected[0].bankName;
                        }
                        self.watchAllowSubmit();
                    },
                    watchAllowSubmit: function() {
                        var self = this;
                        var isFilled = true;
                        var paymentInfo = self.paymentInfo;
                        var paymentMethod = self.paymentInfo.paymentMethod;

                        if (paymentMethod == 'CREDIT_CARD' || paymentMethod == 'CREDIT_CARD_IPP') {
                            if (
                                self.paymentInfo.nameOnCard.trim() == '' ||
                                self.paymentInfo.cardNumber.trim() == '' ||
                                self.paymentInfo.cardExpiryMonth.trim() == '' ||
                                self.paymentInfo.cardExpiryYear.trim() == '' ||
                                self.paymentInfo.cardCVV.trim() == ''
                            ) {
                                isFilled = false;
                            }
                        } else if (paymentMethod == 'FPX') {
                            if (self.paymentInfo.bankCode.trim() == '' || self.paymentInfo.bankName.trim() == '') {
                                isFilled = false;
                            }
                        }

                        if (paymentMethod == 'CREDIT_CARD_IPP' && self.paymentInfo.ippType == '') {
                            isFilled = false;
                        }

                        if (isFilled) {
                            self.allowSubmit = true;
                        } else {
                            self.allowSubmit = false;
                        }
                    },
                    initTabs: function() {
                        var self = this;
                        var paymentMethod = self.paymentInfo.paymentMethod;
                        $('.nav-link[data-paymentnav="' + paymentMethod + '"]').tab('show');
                    },
                    selectPaymentMethod: function(paymentMethod) {
                        this.paymentInfo.paymentMethod = paymentMethod;
                        this.watchAllowSubmit();
                    }
                }
            });
        });
    </script>


<?php require_once('includes/footer.php'); ?>