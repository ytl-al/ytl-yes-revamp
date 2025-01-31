<?php require_once 'includes/header.php'; ?>
<style>
	body{
		background: url(/wp-content/uploads/2021/09/amazing-things-bg.png);
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
<input type="hidden" value="" id="guid"/>
<div id="main-vue" style="display: none;">
    <header class="white-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-6 d-none">
                    <div class="mt-4">

                    </div>
                </div>
                <div class="col-lg-12 text-lg-center text-end">
                    <h1 class="title_checkout p-3">{{ renderText('pre_register_checkout') }}</h1>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </header>
    <!-- Vue Wrapper STARTS -->
    <main class="clearfix site-main">
    <div >
        <!-- Banner Start -->
        <section id="grey-innerbanner">
            <div class="container">
                <ul class="wizard">
                    <li ui-sref="firstStep" class="completed">
                        <span>{{ renderText('pre-qualified_step1') }}</span>
                    </li>
                    <li ui-sref="firstStep" class="completed">
                        <span>{{ renderText('pre-qualified_step2') }}</span>
                    </li>
                    <li ui-sref="secondStep" class="completed">
                        <span>{{ renderText('pre-qualified_step3') }}</span>
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
                        <h1>{{ renderText('payment_info') }}</h1>
                        <p class="sub mb-4 pe-5">{{ renderText('payment_info_label_1') }}</p>
                    </div>
                </div>
                <div class="row gx-5" v-if="pageValid">
                    <div class="col-lg-4 col-12 order-lg-2">
                        <?php include('pre-order-summary.php'); ?>
                    </div>
                    <form class="col-lg-8 col-12 order-lg-1 mt-3 mt-lg-0" autocomplete="off" @submit="paymentSubmit">
                        <div>
                            <h1 class="mb-4 d-none d-lg-block">{{ renderText('payment_info') }}</h1>
                            <p class="sub mb-4 pe-5 d-none d-lg-block">{{ renderText('payment_info_label_1') }}</p>
                            <h2>{{ renderText('select_payment') }}</h2>
                            <div class="alert alert-warning mb-4" role="alert">{{ renderText('payment_info_label_2') }}</div>
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
                                                    <h4 class="my-3">{{ renderText('card_payment') }}</h4>
                                                    <p class="panel-weaccept">
                                                        {{ renderText('we_accept') }}
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
                                                    <h4 class="my-3">{{ renderText('instalment_payment') }}</h4>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-lg-6">
                                                    <label class="form-label" for="select-tenure">{{ renderText('instalment_type') }}</label>
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
                                                <label class="form-label" for="input-chName">{{ renderText('cardholder_name') }}</label>
                                                <div class="input-group align-items-center">
                                                    <input type="text" class="form-control" id="input-chName" v-model="paymentInfo.nameOnCard" @input="watchAllowSubmit" placeholder="John Doe"  @keypress="checkInputFullName(event)" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center g-2">
                                            <div class="col-12">
												<div class="row">
                                                <div class="col-lg-6 col-12">
												<label class="form-label" for="input-chNumber1">{{ renderText('card_number') }}</label>
												<div class="float-end layer-selectedCard">
													<img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/visa.png" height="15" v-if="paymentInfo.cardType == 'VISA'" />
													<img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/amex.png" height="25" v-if="paymentInfo.cardType == 'AMEX'" />
													<img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/mastercard.png" height="30" v-if="paymentInfo.cardType == 'MASTERCARD'" />
												</div>
												</div>
												</div>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-1">
                                                <div class="input-group align-items-center">
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput1" v-model="cardholder.number1" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(1, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput2" v-model="cardholder.number2" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(2, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput3" v-model="cardholder.number3" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(3, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput4" v-model="cardholder.number4" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(4, event)" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                                </div>
                                            </div>
                                            <p class="info mb-3">{{ renderText('card_number_hint') }}</p>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-3 col-12">
                                                <label class="form-label" for="input-cardInput5">{{ renderText('exp_date') }}</label>
                                                <div class="input-group align-items-center">
													<input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput5" autocomplete="off" v-model="paymentInfo.cardExpiryMonth" placeholder="MM" maxlength="2" @input="checkCardInputJump(5, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /> <span class="mx-2">/</span>
                                                    <input type="text" pattern="[0-9]+" class="form-control text-center" id="input-cardInput6" autocomplete="off" v-model="paymentInfo.cardExpiryYear" placeholder="YYYY" maxlength="4" @input="checkCardInputJump(6, event)" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-12">
                                                <label class="form-label" for="input-cardInput7">{{ renderText('cvv') }}</label>
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
                                                <h4 class="my-3">{{ renderText('online_bank') }})</h4>
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
                                                        <option value="" disabled="disabled" selected="selected">{{ renderText('select_bank') }}</option>
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
                                    <button type="submit" class="pink-btn w-100" :disabled="!allowSubmit">{{ renderText('pay') }}</button>
                                </div>
								<div id="error" style="color:red"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Body ENDS -->
    </div>
    </main>
</div>
    <!-- Vue Wrapper ENDS -->


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
                    checkPaymentStatusCountLimit: 78, // times every 5 seconds (5000), total = 6.5 minutes, excluding 10 seconds before first check
                    paymentTimeout: false,
                    paymentResponse: null,
                    analyticItems: []
                },
                mounted: function() {},
                created: function() {
                    var self = this;

                    self.pageInit();
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
							self.guid = elevate.lsData.guid;

							if (elevate.lsData.deliveryInfo) {
								self.deliveryInfo = elevate.lsData.deliveryInfo;
                                self.deliveryInfo.address = self.deliveryInfo.addressLine1 + ' ' + self.deliveryInfo.addressLine2;
							}else{
								 elevate.redirectToPage('pre-register-complete/?id='+self.guid);
							}

							if (elevate.lsData.orderSummary) {
								self.orderSummary = elevate.lsData.orderSummary;
							}else{
								 elevate.redirectToPage('pre-register-complete/?id='+self.guid);
							}

							if (elevate.lsData.contract) {
								self.contract = elevate.lsData.contract;
								self.contractSigned = true;
							}

                            if (elevate.lsData.analyticItems) {
                                self.analyticItems = elevate.lsData.analyticItems;
                            }

							$('#guid').val(self.guid);

							self.productId = self.orderSummary.orderDetail.productCode;

							self.ajaxGetFPXBankList();
							self.updateData();

						}else{
							elevate.redirectToPage('pre-register-complete/?id=error');
						}

						setTimeout(function(){
							$('#main-vue').show();
							toggleOverlay(false);
						},500);
                    },
                    ajaxGetFPXBankList: function() {
                        var self = this;
                        axios.get(apiEndpointURL + '/get-fpx-bank-list' + '?nonce='+yesObj.nonce)
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
                                    toggleOverlay(false);
                                }, 500);
                            });
                    },
                    ajaxGetMaybankIPPTenures: function() {

                        var self = this;
                        axios.post(apiEndpointURL + '/get-ipp-tenures' + '?nonce='+yesObj.nonce, {
                            'plan_name': self.orderSummary.plan.planName
                        })
                            .then((response) => {
                                var data = response.data;
                                self.maybankIPP.ippTypeList = data.ippTypList;

                                self.getMaybankIPPInstallments();
                            })
                            .catch((error) => {
                                console.log(error);
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
                        axios.post(apiEndpointURL + '/get-ipp-monthly-installments' + '?nonce='+yesObj.nonce, {
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
                                console.log(error.response.data);
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

                        // self.ajaxGetMaybankIPPTenures();
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
                        // console.log(self.orderResponse);
                        axios.post(apiEndpointURL + '/check-order-payment-status' + '?nonce='+yesObj.nonce, params)
                            .then((response) => {
                                var data = response.data;
                                var responseCode = data.responseCode;
                                var paymentId = data.paymentId;
                                var recheck = false;
                                var closePaymentWindow = false;

                                if (responseCode == 0) {                        // Payment success
                                    self.paymentResponse = data;
                                    closePaymentWindow = true;
                                    setTimeout(function() {
                                        self.updatePaymentStatus(2);
                                    }, 2000);
                                } else if (responseCode == -1) {
                                    if (paymentId == 'Not Available') {         // Payment in progress
                                        recheck = true;
                                    } else if (paymentId != 'Not Available') {  // Payment failed
                                        closePaymentWindow = true;
                                        toggleOverlay(false);
                                        self.toggleModalAlert(this.renderText('error_payment'),this.renderText('your_payment_is_not_successful'));
                                        setTimeout(function() {
                                            self.updatePaymentStatus(-1, false);
                                        }, 500);
                                    }
                                } else if (responseCode == -2 && paymentId != 'Not Available') {   // No response from bank
                                    self.paymentResponse = data;
                                    closePaymentWindow = true;
                                    self.updatePaymentStatus(3);
                                }

                                if (recheck) {
                                    if (self.checkPaymentStatusCount <= self.checkPaymentStatusCountLimit) {
                                        self.checkPaymentStatusCount++;
                                        setTimeout(function() {
                                            if (!self.paymentTimeout) self.ajaxCheckOrderPaymentStatus(timeoutObj);
                                        }, 5000);
                                    } else {
                                        toggleOverlay(false);
                                        self.toggleModalAlert(this.renderText('error_payment'), this.renderText('your_payment_is_not_successful'));
                                        closePaymentWindow = true;
                                        setTimeout(function() {
                                            self.updatePaymentStatus(-1, false);
                                        }, 500);
                                    }
                                }

                                if (closePaymentWindow) {
                                    clearTimeout(timeoutObj);
                                    self.paymentTimeout = true;
                                    self.checkPaymentStatusCount = 0;
                                    if (mainwin != null && !mainwin.closed) {
                                        mainwin.focus();
                                        mainwin.close();
                                    }
                                }
                            })
                            .catch((error) => {
                                if (self.checkPaymentStatusCount <= self.checkPaymentStatusCountLimit) {
                                    self.checkPaymentStatusCount++;
                                    setTimeout(function() {
                                        self.ajaxCheckOrderPaymentStatus(timeoutObj);
                                    }, 5000);
                                } else {
                                    toggleOverlay(false);
                                    self.toggleModalAlert(this.renderText('error_payment'), this.renderText('error_processing_payment'));

                                    clearTimeout(timeoutObj);
                                    self.paymentTimeout = true;
                                    self.checkPaymentStatusCount = 0;
                                    if (mainwin != null && !mainwin.closed) {
                                        mainwin.focus();
                                        mainwin.close();
                                    }
                                }
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
                             //self.redirectThankYou();
							 errorMsg = "Payment Timeout.";
							//  self.cancelElevateOrder(errorMsg);
							 self.updatePaymentStatus(3);

                            clearTimeout(timeoutObj);
                            self.paymentTimeout = true;
                            self.checkPaymentStatusCount = 0;
                            toggleOverlay(false);
                            self.toggleModalAlert(this.renderText('error_payment'), this.renderText('payment_exceeds_time'));
                        }, 360000);

                        mainwin = postPayment({ order_id: xpayOrderId,  encrypted_string: encryptedValue });

                        setTimeout(function() {
                            self.paymentTimeout = false;
                            self.checkPaymentStatusCount = 0;
                            self.ajaxCheckOrderPaymentStatus(timeoutObject);
                        }, 10000);
                    },
                    getGender: function (){
                        var self = this;
                        var genderDigit = self.deliveryInfo.mykad.substring(11);
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
                        var dateString = self.deliveryInfo.mykad.substring(0, 6);
                        console.log(self.deliveryInfo.mykad, dateString);

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
                            "plan_name": self.orderSummary.plan.planName,
                            "plan_type": self.orderSummary.plan.planType,
                            "product_bundle_id": self.productId,
                            "referral_code": self.deliveryInfo.referralCode,
                            "addon_name": "",
                            "conversion": self.deliveryInfo.isConversion,
                            "existingMsisdn": self.deliveryInfo.msisdnToUpgrade,
                            "existingPlanName": self.deliveryInfo.currentPlan,
                            "existingPlanType": self.deliveryInfo.currentPlanType,
                            "address_line": self.deliveryInfo.address,
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
                        axios.post(apiEndpointURL_elevate + '/create-yos-order' + '?nonce='+yesObj.nonce, params)
                            .then((response) => {
                                var data = response.data.data;
                                self.orderResponse = data;

                                $('#displayOrderNumber').val(data.displayOrderNumber);

                                elevate.lsData.YOSOrder = data;
                                elevate.updateElevateLSData();

                                self.initXpay();
                            })
                            .catch((error) => {
								toggleOverlay(false);
                                var response = error.response;
                                if (typeof response != 'undefined') {
                                    var data = response.data;
                                    var errorMsg = '';
                                    if (error.response.status == 500 || error.response.status == 503) {
                                        errorMsg = this.renderText('error_create_order');
                                    } else {
                                        errorMsg = data.message
                                    }
                                    toggleOverlay(false);
                                    self.toggleModalAlert('Error', errorMsg);

                                    self.cancelElevateOrder(errorMsg);
									self.updatePaymentStatus(-1);
                                }
                                console.log(error, response);
                            })
                            .finally(() => {
                                // console.log('finally');
                            });

                        // console.log(JSON.stringify(params));
                    },
                    paymentSubmit: function(e) {
                        toggleOverlay();
                        this.ajaxCreateYOSOrder();
                        e.preventDefault();
                    },
                    redirectThankYou: function(status) {

                        var self = this;

                        elevate.lsData.meta.completedStep = self.currentStep;
                        elevate.lsData.meta.paymentInfo = self.paymentInfo;
                        elevate.lsData.meta.orderResponse = self.orderResponse;
                        elevate.lsData.meta.paymentResponse = self.paymentResponse;
                        elevate.updateElevateLSData();

                        setTimeout(function() {
                            elevate.redirectToPage('pre-register-thanks?status='+status+'&orderNumber='+$('#displayOrderNumber').val());
                        }, 2000);
                        if (status == 2 || status == 3) {
                            self.sendAnalytics();
                        }
                    },

                    updateElevateOrder: function (){
                        var self = this;

                        toggleOverlay();
                        var param = elevate.lsData.orderInfo;
                        param.orderNumber = self.orderResponse.orderNumber;

                        axios.post(apiEndpointURL_elevate + '/order/update' + '?nonce='+yesObj.nonce, param)
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){

                                }else{
                                    toggleOverlay(false);
                                    $('#error').html(this.renderText('system_error'));
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

                        axios.post(apiEndpointURL_elevate + '/order/cancel'+ '?nonce='+yesObj.nonce, param)
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){

                                }else{
                                    toggleOverlay(false);
                                    $('#error').html(this.renderText('system_error'));
                                    console.log(data);
                                }
                            })
                            .catch((error) => {
                                toggleOverlay(false);
                                console.log(error, response);
                            });

                    },

					updatePaymentStatus: function (status, redirect = true){
                        var self = this;

                        if (redirect) {
                            toggleOverlay();
                        }
                        var param = {};

						if(self.orderResponse){
							param.orderNumber = self.orderResponse.orderNumber;
						}else{
							return;
						}
						if(self.orderResponse && self.paymentResponse){
							param.paymentRef = self.paymentResponse.referenceNo;
						}else{
							param.paymentRef = "";
						}
                        param.status = status.toString();

                        axios.post(apiEndpointURL_elevate + '/order/updatePayment' + '?nonce='+yesObj.nonce, param )
                            .then((response) => {
                                var data = response.data;
                                if(data.status == 1){
									console.log(data);
									if (redirect) {
                                        self.redirectThankYou(status);
                                    }
                                }else{
                                    toggleOverlay(false);
                                    $('#error').html(this.renderText('system_error'));
                                    console.log(data);
                                }
                            })
                            .catch((error) => {
                                toggleOverlay(false);
								$('#error').html(error);
                                console.log(error, response);
                            });

                    },

					removePrequalifiedCustomer: function () {
						var self = this;
						var params = {
							id: self.deliveryInfo.id
						};

						toggleOverlay();
						$('#status_mesage').html('Remove data...');

						axios.post(apiEndpointURL_elevate + '/del-prequalified-customer' + '?nonce='+yesObj.nonce, params)
							.then((response) => {
								var data = response.data;
								if(data.status == 1){

								}else{
									toggleOverlay(false);
									$('#error').html("System error, please try again.");
									$('#status_mesage').html('');
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
                    renderText: function(strID) {
                        return elevate.renderText(strID, Elevate_lang);
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
                    },
                    sendAnalytics: function() {
                        var self = this;
                        var eventType = 'purchase';
                        var pushData = {
                            'transaction_id': $('#displayOrderNumber').val(),
                            'currency': 'MYR',
                            'value': self.orderSummary.orderDetail.total,
                            'tax': self.orderSummary.orderDetail.sstAmount,
                            'shipping': 0,
                            'foreigner_deposit': 0,
                            'rounding_adjustment': self.orderSummary.orderDetail.roundingAdjustment,
                            'payment_method': self.paymentInfo.paymentMethod,
                            'items': self.analyticItems
                        };
                        pushAnalytics(eventType, pushData);
                    }
                }
            });
        });
    </script>


<?php require_once('includes/footer.php'); ?>