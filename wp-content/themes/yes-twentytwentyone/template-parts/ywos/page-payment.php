<?php include('header-ywos.php'); ?>


<style type="text/css">
    #cart-body .nav-pills .nav-link {
        width: 80px;
        height: 80px;
        background: #FFF;
        box-shadow: 2px 2px 12px rgba(112, 144, 176, 0.25);
        border-radius: 8px;
    }

    #cart-body .nav-pills .nav-link.active {
        background: #F9F7F4;
    }

    #cart-body .nav-pills .nav-link img {
        width: 100%;
    }

    #cart-body .nav-pills .nav-item {
        margin-right: 30px;
    }
    #cart-body .listing-quickSelectBanks li.nav-item,#cart-body .listing-quickSelectWallets li.nav-item { cursor: pointer; margin-right: 10px; max-width: 60px; text-align: center; }
    .listing-quickSelectBanks li.nav-item .img-quickSelectBank, .listing-quickSelectWallets li.nav-item .img-quickSelectWallet { border: 1px solid #D9D9D9; border-radius: 4px; box-shadow: 2px 2px 12px rgb(112 144 176 / 25%); margin: 0 0 10px; padding: 3px; }
    .listing-quickSelectBanks li.nav-item.selected .img-quickSelectBank, .listing-quickSelectWallets li.nav-item.selected .img-quickSelectWallet { border-color: rgb(61, 140, 255); }
    .listing-quickSelectBanks li.nav-item img, .listing-quickSelectWallets li.nav-item img { height: 44px; margin: 0 auto; width: 44px; }
    .listing-quickSelectBanks li.nav-item span, .listing-quickSelectWallets li.nav-item span { display: inline-block; font-size: 11px; line-height: 12px; }

    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
        #cart-body .nav-pills .nav-item {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        #cart-body .nav-pills .nav-link {
            width: 60px;
            height: 60px;
        }
    }

    .panel-weaccept { margin: 15px 0 10px; }
    .panel-weaccept img { margin: 0 8px; }

    .layer-selectedCard {}
    .layer-selectedCard img { display: none; }
</style>

<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
    <!-- Banner Start -->
    <section id="grey-innerbanner" v-if='(upFrontPayment=="true")'>
        <div class="container">
            <ul class="wizard">
                <li ui-sref="firstStep" class="completed">
                    <span>1. {{ renderText('strVerification') }}</span>
                </li>
                <!-- <li ui-sref="secondStep" class="completed">
                    <span>2. {{ renderText('strSelectSimType') }}</span>
                </li> -->
                <li ui-sref="secondStep" class="completed">
                    <span>3. {{ renderText('strDelivery') }}</span>
                </li>
                <li ui-sref="thirdStep" class="completed">
                    <span>4. {{ renderText('strReview') }}</span>
                </li>
                <li ui-sref="fourthStep" class="completed">
                    <span>5. {{ renderText('strPayment') }}</span>
                </li>
            </ul>
        </div>
    </section>
    <section id="grey-innerbanner" v-else>
        <div class="container">
		<ul class="wizard" v-if="(eSimSupportPlan != true)">
                <li ui-sref="firstStep" class="completed">
                    <span>1. {{ renderText('strVerification') }}</span>
                </li>
               
                <li ui-sref="secondStep" class="completed">
                    <span>2. {{ renderText('strDelivery') }}</span>
                </li>
                <li ui-sref="threeStep" class="completed">
                    <span>3. {{ renderText('strReview') }}</span>
                </li>
                <li ui-sref="fourthStep"class="completed"> 
                    <span>4. {{ renderText('strPayment') }}</span>
                </li>
            </ul>
            <ul class="wizard" v-else>
                <li ui-sref="firstStep" class="completed">
                    <span>1. {{ renderText('strVerification') }}</span>
                </li>
                <li ui-sref="secondStep" class="completed">
                    <span>2. {{ renderText('strSelectSimType') }}</span>
                </li>
                <li ui-sref="thirdStep" class="completed">
                    <span v-if="(simType == 'true')">3. {{ renderText('strDeliveryBilling') }}</span>
                    <span v-else>3. {{ renderText('strDelivery') }}</span>

                </li>
                <li ui-sref="fourthStep" class="completed">
                    <span>4. {{ renderText('strReview') }}</span>
                </li>
                <li ui-sref="fifthStep" class="completed">
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
                <div class="col">
                    <h1>{{ renderText('strPayment') }}</h1>
                    <p class="sub mb-4 pe-5">{{ renderText('strPaymentSub') }}</p>
                </div>
            </div>
            <div class="row gx-5" v-if="pageValid">
                <div class="col-lg-5 col-12 order-lg-2">
                    <?php include('section-order-summary.php'); ?>
                </div>
                <form class="col-lg-7 col-12 order-lg-1 mt-3 mt-lg-0" autocomplete="off" @submit="paymentSubmit">
                    <div>
                        <h1 class="mb-4 d-none d-lg-block">{{ renderText('strPayment') }}</h1>
                        <p class="sub mb-4 pe-5 d-none d-lg-block">{{ renderText('strPaymentSub') }}</p>
                        <h2>{{ renderText('strPaymentSelect') }}</h2>
                        <div class="alert alert-warning mb-4" role="alert">{{ renderText('strPaymentInfo') }}</div>
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
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" id="nav-rm" role="tab" data-paymentnav="RM" data-bs-toggle="pill" data-bs-target="#tab-rm" aria-controls="tab-fpx" aria-selected="false" v-on:click="selectPaymentMethod('REVENUE_M_YOS')">
                                    <img src="/wp-content/uploads/2022/11/rm-logo.png" />
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
                                                <h4 class="my-3">{{ renderText('strPaymentTypeCard') }}</h4>
                                                <p class="panel-weaccept">
                                                    {{ renderText('strWeAccept') }}
                                                    <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/visa.png" />
                                                    <!-- <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/amex.png" /> -->
                                                    <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/mastercard.png" />
                                                </p>
                                            </div>
                                        </div>
                                    </template>
                                    <div v-bind:class="{ 'd-none': (maybankIPP.disabled || paymentInfo.paymentMethod != 'CREDIT_CARD_IPP') }">
                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <h4 class="my-3">Maybank 0% EzyPay ({{ renderText('strInstalmentPayment') }})</h4>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <label class="form-label" for="select-tenure">{{ renderText('strInstalmentType') }}</label>
                                                <div class="form-group">
                                                    <select class="form-control form-select" id="select-tenure" data-live-search="false" name="ipp-tenure" v-model="paymentInfo.ippType" @change="watchTenureChange">
                                                        <option value="" disabled="disabled" selected="selected">{{ renderText('selectInstallmentType') }}</option>
                                                        <option v-for="ippType in maybankIPP.ippTypeList" :value="ippType.ippTenureType">{{ ippType.ippTenureTypeDisplay }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-12">
                                            <label class="form-label" for="input-chName">* {{ renderText('labelCardName') }}</label>
                                            <div class="input-group align-items-center">
                                                <input type="text" class="form-control" id="input-chName" v-model="paymentInfo.nameOnCard" @input="watchAllowSubmit" placeholder="John Doe" @keypress="checkInputCharacters(event, 'alpha')" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label class="form-label" for="input-chNumber1">* {{ renderText('labelCardNumber') }}</label>
                                            <div class="float-end layer-selectedCard">
                                                <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/visa.png" height="15" v-bind:class="{ 'd-block': (paymentInfo.cardType == 'VISA') }" />
                                                <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/amex.png" height="25" v-bind:class="{ 'd-block': (paymentInfo.cardType == 'AMEX') }" />
                                                <img src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/cc-icons/mastercard.png" height="30" v-bind:class="{ 'd-block': (paymentInfo.cardType == 'MASTERCARD') }" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 align-items-center g-2">
                                        <div class="col-lg-6 col-12 mb-1">
                                            <div class="input-group align-items-center">
                                                <input type="text" class="form-control text-center" id="input-cardInput1" v-model="cardholder.number1" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(1, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                <input type="text" class="form-control text-center" id="input-cardInput2" v-model="cardholder.number2" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(2, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                <input type="text" class="form-control text-center" id="input-cardInput3" v-model="cardholder.number3" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(3, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /><span class="mx-1">-</span>
                                                <input type="text" class="form-control text-center" id="input-cardInput4" v-model="cardholder.number4" placeholder="xxxx" maxlength="4" @input="checkCardInputJump(4, event)" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                            </div>
                                        </div>
                                        <p class="info mb-3">{{ renderText('infoCardNumber') }}</p>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-12">
                                            <label class="form-label" for="input-cardInput5">* {{ renderText('labelCardExpiry') }}</label>
                                            <div class="input-group align-items-center">
                                                <input type="text" class="form-control text-center" id="input-cardInput5" autocomplete="off" v-model="paymentInfo.cardExpiryMonth" placeholder="00" maxlength="2" @input="checkCardInputJump(5, event)" @keypress="checkInputCharacters(event, 'numeric', false)" /> <span class="mx-2">/</span>
                                                <input type="text" class="form-control text-center" id="input-cardInput6" autocomplete="off" v-model="paymentInfo.cardExpiryYear" placeholder="0000" maxlength="4" @input="checkCardInputJump(6, event)" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-12">
                                            <label class="form-label" for="input-cardInput7">* CVV</label>
                                            <div class="input-group align-items-center">
                                                <input type="password" class="form-control text-center" id="input-cardInput7" autocomplete="off" v-model="paymentInfo.cardCVV" @input="watchAllowSubmit" placeholder="***" maxlength="3" @keypress="checkInputCharacters(event, 'numeric', false)" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row mb-4">
                                        <div class="col-lg-6 col-12">
                                            <label class="form-label" for="select-chCountry">Issuing Country</label>
                                            <div class="input-group align-items-center">
                                                <select class="form-control form-select" id="select-chCountry" v-model="cardholder.country" data-live-search="true">
                                                    <option value="" disabled="disabled" selected="selected">Select Issuing Country</option>
                                                    <option v-for="country in countries" :value="country.value">{{ country.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-fpx" role="tabpanel" aria-labelledby="nav-fpx">
                                <div class="tab-paneContent">
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <h4 class="my-3">{{ renderText('strPaymentTypeFPX') }}</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <ul class="nav nav-pills listing-quickSelectBanks">
                                            <li class="nav-item" v-for="quickSelectBank in quickSelectBanks" v-on:click="selectBank(quickSelectBank.value, event)"><div class="img-quickSelectBank"><img :src="quickSelectBank.imgSrc" alt="{{ quickSelectBank.name }}" title="{{ quickSelectBank.name }}" /></div><span>{{ quickSelectBank.name }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <select class="form-control form-select" id="select-bank" data-live-search="true" name="fpx-bank" v-model="paymentInfo.bankCode" @change="watchBankSelect">
                                                    <option value="" disabled="disabled" selected="selected">{{ renderText('selectSelectBank') }}</option>
                                                    <option v-for="fpxBank in fpxBankList" :value="fpxBank.bankCode" :disabled="!fpxBank.available" :data-bankname="fpxBank.bankName">{{ fpxBank.bankName }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-rm" role="tabpanel" aria-labelledby="nav-rm">
                                <div class="tab-paneContent">
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <h4 class="my-3">{{ renderText('strPaymentTypeRM') }}</h4>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <ul class="nav nav-pills listing-quickSelectWallets">
                                                <li class="nav-item" v-for="quickSelectWallet in rmWallets" :id="quickSelectWallet.eWalletMethodCode" v-on:click="selectWallet(quickSelectWallet.eWalletMethodCode, event)"><div class="img-quickSelectWallet"><img width="52" :src="quickSelectWallet.eWalletLogoUrl" :alt="quickSelectWallet.eWalletMethodName" :title="quickSelectWallet.eWalletMethodName" /></div><span>{{ quickSelectWallet.eWalletMethodName }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <button type="submit" class="pink-btn w-100" :disabled="!allowSubmit">{{ renderText('strBtnPay') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Body ENDS -->
</div>
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
                simType:'',
                dealer: [],
                currentStep: 5,
                pageValid: false,
				eSimSupportPlan:'',
                allowSubmit: false,
                upFrontPayment:'false',
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
                    addOn: null
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
                rmWallets: [],
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

                isTargetedPromo: false,
                tpMeta: {},

                apiLocale: 'EN',
                pageText: {
                    strVerification: { 'en-US': 'Verification', 'ms-MY': 'Pengesahan', 'zh-hans': 'Verification' },
                    strSelectSimType: { 'en-US': 'Select Sim Type', 'ms-MY': 'Select Sim Type', 'zh-hans': 'Select Sim Type' },

                    strDelivery: { 'en-US': 'Delivery Details', 'ms-MY': 'Butiran Penghantaran', 'zh-hans': 'Delivery Details' },
                    strDeliveryBilling: {'en-US': 'Billing Details','ms-MY': 'Billing Details','zh-hans': 'Billing Details'},
                    strReview: { 'en-US': 'Review', 'ms-MY': 'Semak', 'zh-hans': 'Review' },
                    strPayment: { 'en-US': 'Payment Info', 'ms-MY': 'Maklumat Pembayaran', 'zh-hans': 'Payment Info' },

                    strFillIn: { 'en-US': 'Please fill in your ID information and mobile number to proceed', 'ms-MY': 'Sila isikan maklumat ID dan nombor mudah alih untuk teruskan', 'zh-hans': 'Please fill in your ID information and mobile number to proceed' },
                    strPaymentSub: { 'en-US': 'This information is required for online purchases and is used to verify and protect your identity. We keep this information safe and will not use it for any other purposes.', 'ms-MY': 'Maklumat ini diperlukan untuk pembelian dalam talian dan digunakan untuk mengesahkan dan melindungi identiti anda. Kami menyimpan maklumat ini dengan selamat dan tidak akan menggunakannya untuk tujuan lain.', 'zh-hans': 'This information is required for online purchases and is used to verify and protect your identity. We keep this information safe and will not use it for any other purposes.' },
                    strPaymentSelect: { 'en-US': 'Select payment', 'ms-MY': 'Pilih bayaran', 'zh-hans': 'Select payment' },
                    strPaymentInfo: { 'en-US': 'Please ensure your web browser and/or 3rd party software pop-up blocker is disabled before you proceed with your transactions.', 'ms-MY': 'Sila pastikan pelayar web dan/atau perisian penyekat jendela timbul pihak ketiga telah dilumpuhkan sebelum anda meneruskan transaksi.', 'zh-hans': 'Please ensure your web browser and/or 3rd party software pop-up blocker is disabled before you proceed with your transactions.' },

                    strPaymentTypeCard: { 'en-US': 'Credit/Debit Card', 'ms-MY': 'Kad Kredit/Debit', 'zh-hans': 'Credit/Debit Card' },
                    strWeAccept: { 'en-US': 'We accept', 'ms-MY': 'Kami terima', 'zh-hans': 'We accept' },

                    strInstalmentPayment: { 'en-US': 'Instalment Payment', 'ms-MY': 'Bayaran Ansuran', 'zh-hans': 'Instalment Payment' },
                    strInstalmentType: { 'en-US': 'Instalment Type', 'ms-MY': 'Jenis Ansuran', 'zh-hans': 'Instalment Type' },
                    selectInstallmentType: { 'en-US': 'Select Installment Type', 'ms-MY': 'Pilih Jenis Ansuran', 'zh-hans': 'Select Installment Type' },

                    labelCardName: { 'en-US': 'Cardholder Name', 'ms-MY': 'Nama Pemegang Kad', 'zh-hans': 'Cardholder Name' },
                    labelCardNumber: { 'en-US': 'Card Number', 'ms-MY': 'Nombor Kad', 'zh-hans': 'Card Number' },
                    infoCardNumber: { 'en-US': 'Numbers must contain 16 digits', 'ms-MY': 'Nombor mesti mempunyai 16 digit', 'zh-hans': 'Numbers must contain 16 digits' },
                    labelCardExpiry: { 'en-US': 'Exp Date', 'ms-MY': 'Tarikh Luput', 'zh-hans': 'Exp Date' },

                    strPaymentTypeFPX: { 'en-US': 'Online Banking (FPX)', 'ms-MY': 'Perbankan Dalam Talian (FPX)', 'zh-hans': 'Online Banking (FPX)' },
                    strPaymentTypeRM: { 'en-US': 'E-Wallet', 'ms-MY': 'E-Wallet', 'zh-hans': 'E-Wallet' },
                    selectSelectBank: { 'en-US': 'Select a Bank', 'ms-MY': 'Pilih Bank', 'zh-hans': 'Select a Bank' },

                    strBtnPay: { 'en-US': 'Pay', 'ms-MY': 'Bayar', 'zh-hans': 'Pay' },

                    errorCreateOrder: { 'en-US': "There's an error in creating your order.<br />Please try again later.", 'ms-MY': 'Terdapat ralat dalam membuat pesanan.<br />Sila cuba lagi kemudian.', 'zh-hans': "There's an error in creating your order.<br />Please try again later." },
                    errorProcessingPayment: { 'en-US': "There's an error in processing your payment.<br />Please try again later.", 'ms-MY': 'Terdapat ralat dalam pemprosesan bayaran.<br />Sila cuba lagi kemudian.', 'zh-hans': "There's an error in processing your payment.<br />Please try again later." },
                    errorPaymentNotSuccessful: { 'en-US': 'Your payment is not successful.<br />Please try again.', 'ms-MY': 'Pembayaran anda tidak berjaya.<br />Sila cuba lagi kemudian.', 'zh-hans': 'Your payment is not successful.<br />Please try again.' },
                    errorPaymentExceed: { 'en-US': 'You have exceeds the time for payment window. Please try again.', 'ms-MY': 'Anda telah melebihi waktu pembayaran. Sila cuba lagi.', 'zh-hans': 'You have exceeds the time for payment window. Please try again.' },
                    errorPromoLinkExpired: { 'en-US': 'Your unique link is expired as it is already been used for purchase.<br />You may reach out to Yes for more information.', 'ms-MY': 'Link unik anda telah tamat tempoh kerana ia telah digunakan untuk pembelian.<br />Sila hubungi Yes untuk tahu lebih lanjut.', 'zh-hans': 'Your unique link is expired as it is already been used for purchase.<br />You may reach out to Yes for more information.' },
                    errorPromoLinkError: { 'en-US': 'Cannot verify your promo link. Please try again.', 'ms-MY': 'Promo link anda tidak dapat disahkan. Sila cuba lagi.', 'zh-hans': 'Cannot verify your promo link. Please try again.' },
                    modalErrorPaymentTitle: { 'en-US': 'Payment Error', 'ms-MY': 'Ralat Pembayaran', 'zh-hans': 'Payment Error' },
                    modalErrorTitle: { 'en-US': 'Error', 'ms-MY': 'Ralat', 'zh-hans': 'Error' },
                }
            },
            mounted: function() {},
            created: function() {
                var self = this;
                axios.get(apiEndpointURL + '/get-rm-wallet-merchant' + '?nonce='+yesObj.nonce)
                    .then((response) => {
                        var data = response?.data?.rmEwalletList;
                        
                        if(data) {
                            data.forEach((list, index) => {
                                if( list['eWalletMethodCode'] == 'GRABPAY_MY' ) {
                                    data[index].eWalletLogoUrl = '/wp-content/uploads/2022/11/GrabPayLogo.png'
                                }else if( list['eWalletMethodCode'] == 'SHOPEEPAY_MY' ) {
                                    data[index].eWalletLogoUrl = '/wp-content/uploads/2022/11/shopeePayLogo.png';
                                }else if( list['eWalletMethodCode'] == 'TNG_MY' ) {
                                    data[index].eWalletLogoUrl = '/wp-content/uploads/2022/11/TouchNGoLogo.png';
                                }
                            });
                            self.rmWallets = data;
                        }
                    })
                    .catch((error) => {
                        console.log('error',error);
                    });
                setTimeout(function() {
                    self.pageInit();
                }, 500);
                self.initTabs();
            },
            computed: {

                quickSelectWallets: function() {
                    return this.rmWallets.filter(function(wallet) {
                        return wallet.quickSelect
                    })
                },
                quickSelectBanks: function() {
                    return this.fpxBanks.filter(function(bank) {
                        return bank.quickSelect
                    })
                }
            },
            methods: {
                pageInit: function() {
                    var self = this;
                    if (ywos.validateSession(self.currentStep)) {
                        self.pageValid = true;
                        self.apiLocale = (ywos.lsData.siteLang == 'ms-MY') ? 'MY' : 'EN';
                        self.ajaxGetFPXBankList();
                        self.updateData();

                        self.isTargetedPromo = ywos.lsData.isTargetedPromo;
                        self.tpMeta = ywos.lsData.tpMeta;
                        self.dealer = ywos.lsData.meta.dealer;
                        self.upFrontPayment = ywos.lsData.meta.customerDetails.upFrontPayment;
                        self.simType=ywos.lsData.meta.esim;
						self.eSimSupportPlan=ywos.lsData.meta.orderSummary.plan.eSim;
                        
                        

                    } else {
                        ywos.redirectToPage('cart');
                    }


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
                                // toggleOverlay(false);
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
                    self.orderSummary = ywos.lsData.meta.orderSummary;
                    self.deliveryInfo = ywos.lsData.meta.deliveryInfo;

                    self.paymentInfo.amount = self.orderSummary.due.amount;
                    self.paymentInfo.sst = self.orderSummary.due.taxesSST;
                    self.paymentInfo.totalAmount = self.orderSummary.due.total;

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
                        'session_key': ywos.lsData.sessionKey,
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

                                self.ajaxUpdateTPPurchasedFlag();

                                setTimeout(function() {
                                    self.redirectThankYou(1);
                                }, 2000);
                            } else if (responseCode == -1) {
                                if (paymentId == 'Not Available') {         // Payment in progress
                                    recheck = true;
                                } else if (paymentId != 'Not Available') {  // Payment failed
                                    closePaymentWindow = true;
                                    toggleOverlay(false);
                                    self.toggleModalAlert(self.renderText('modalErrorPaymentTitle'), self.renderText('errorPaymentNotSuccessful'));
                                }
                            } else if (responseCode == -2 && paymentId != 'Not Available') {   // No response from bank
                                self.paymentResponse = data;
                                closePaymentWindow = true;
                                self.redirectThankYou(2);
                            }

                            if (recheck) {
                                if (self.checkPaymentStatusCount <= self.checkPaymentStatusCountLimit) {
                                    self.checkPaymentStatusCount++;
                                    setTimeout(function() {
                                        if (!self.paymentTimeout) self.ajaxCheckOrderPaymentStatus(timeoutObj);
                                    }, 5000);
                                } else {
                                    toggleOverlay(false);
                                    self.toggleModalAlert(self.renderText('modalErrorPaymentTitle'), self.renderText('errorPaymentNotSuccessful'));
                                    closePaymentWindow = true;
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
                                self.toggleModalAlert(self.renderText('modalErrorPaymentTitle'), self.renderText('errorProcessingPayment'));

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

                    var timeoutObject = setTimeout(function() {
                        if (mainwin != null && !mainwin.closed) {
                            mainwin.focus();
                            mainwin.close();
                        }
                        // self.redirectThankYou();

                        clearTimeout(timeoutObj);
                        self.paymentTimeout = true;
                        self.checkPaymentStatusCount = 0;
                        toggleOverlay(false);
                        self.toggleModalAlert(self.renderText('modalErrorPaymentTitle'), self.renderText('errorPaymentExceed'));
                    }, 360000);

                    mainwin = postPayment({ order_id: xpayOrderId,  encrypted_string: encryptedValue });

                    setTimeout(function() {
                        self.paymentTimeout = false;
                        self.checkPaymentStatusCount = 0;
                        self.ajaxCheckOrderPaymentStatus(timeoutObject);
                    }, 10000);
                },
                ajaxCreateYOSOrder: function() {
                    var self = this;
                     if(ywos.lsData.meta.customerDetails.upFrontPayment=='true'){
                    self.upFontpayemtTotal=(self.paymentInfo.totalAmount)-(self.orderSummary.due.foreignerDeposit)
                    }else{
                        self.upFontpayemtTotal=self.paymentInfo.totalAmount
                    }
                    // alert(self.upFontpayemtTotal)
                    // alert(self.paymentInfo.paymentMethod);
                    var params = {
                        'session_key'       : ywos.lsData.sessionKey,

                        'phone_number'      : self.deliveryInfo.msisdn,
                        'customer_name'     : self.deliveryInfo.name,
                        'dob'               : self.deliveryInfo.dob,
                        'gender'            : self.deliveryInfo.gender,
                        'email'             : self.deliveryInfo.email,
                        'login_yes_id'      : '',
                        'security_type'     : self.deliveryInfo.securityType,   
                        'security_id'       : self.deliveryInfo.securityId,
                        'school_name'       : '',
                        'school_code'       : '',
                        'university_name'   : '',
                        'dealer_code'       : self.dealer.dealer_code,
                        'dealer_login_id'   : self.dealer.dealer_id,

                        'plan_name'         : self.orderSummary.plan.planName,
                        'plan_type'         : self.orderSummary.plan.planType,
                        'product_bundle_id' : self.orderSummary.plan.mobilePlanId,
                        'referral_code'     : self.deliveryInfo.referralCode,
                        'addon_name'        : (self.orderSummary.addOn && self.orderSummary.addOn.addonName) ? self.orderSummary.addOn.addonName : '',

                        'address_line'      : self.deliveryInfo.sanitize.address + ' ' + self.deliveryInfo.sanitize.addressMore,
                        'city'              : self.deliveryInfo.city,
                        'city_code'         : self.deliveryInfo.cityCode,
                        'postal_code'       : self.deliveryInfo.postcode,
                        'state'             : self.deliveryInfo.state,
                        'state_code'        : self.deliveryInfo.stateCode,
                        'country'           : 'Malaysia',
                        'payment_method'    : self.paymentInfo.paymentMethod,
                        'process_name'      : self.paymentInfo.processName,
                        'amount'            : roundAmount(self.paymentInfo.amount, 2),
                        'amount_sst'        : roundAmount(self.paymentInfo.sst, 2),
                        'total_amount'      : roundAmount(self.upFontpayemtTotal, 2),
                        'bank_code'         : self.paymentInfo.bankCode,
                        'bank_name'         : self.paymentInfo.bankName,
                        'card_number'       : self.paymentInfo.cardNumber,
                        'card_type'         : self.paymentInfo.cardType,
                        'name_on_card'      : self.paymentInfo.nameOnCard,
                        'card_cvv'          : self.paymentInfo.cardCVV,
                        'card_expiry_month' : self.paymentInfo.cardExpiryMonth,
                        'card_expiry_year'  : self.paymentInfo.cardExpiryYear,
                        'ippType'           : self.paymentInfo.ippType,
                        'locale'            : self.apiLocale,
                        'walletType'        : self.paymentInfo.walletType,
                        'esim'              : ywos.lsData.meta.orderSummary.plan.eSim,
                        'applicationSource'  : "YOS"
                    };
                    axios.post(apiEndpointURL + '/create-yos-order' + '?nonce='+yesObj.nonce, params)
                        .then((response) => {
                            var data = response.data;
                            self.orderResponse = data;
                            self.initXpay();
                        })
                        .catch((error) => {
                            var response = error.response;
                            if (typeof response != 'undefined') {
                                var data = response.data;
                                var errorMsg = '';
                                if (error.response.status == 500 || error.response.status == 503) {
                                    errorMsg = self.renderText('errorCreateOrder');
                                } else {
                                    errorMsg = data.message
                                }
                                toggleOverlay(false);
                                self.toggleModalAlert(self.renderText('modalErrorTitle'), errorMsg);
                            }
                            // console.log(error, response);
                        })
                        .finally(() => {
                            // console.log('finally');
                        });

                    // console.log(JSON.stringify(params));
                },
                paymentSubmit: function(e) {
                    toggleOverlay();
                    var self = this;
                    if (self.isTargetedPromo) {
                        axios.post(apiEndpointURL + '/tp-url-check' + '?nonce='+yesObj.nonce, {
                                'promo_id': self.tpMeta.promoID,
                                'unique_id': self.tpMeta.userID
                            })
                            .then((response) => {
                                var data = response.data;
                                if (data.has_purchased == '1') {
                                    self.toggleModalAlert(self.renderText('modalErrorTitle'), self.renderText('errorPromoLinkExpired'));
                                    toggleOverlay(false);
                                } else {
                                    self.ajaxCreateYOSOrder();
                                }
                            })
                            .catch((error) => {
                                self.toggleModalAlert(self.renderText('modalErrorTitle'), self.renderText('errorPromoLinkError'));
                                toggleOverlay(false);
                            });
                    } else {
                        self.ajaxCreateYOSOrder();
                    }
                    e.preventDefault();
                },
                ajaxUpdateTPPurchasedFlag: function() {
                    var self = this;
                    if (self.isTargetedPromo) {
                        axios.post(apiEndpointURL + '/tp-update-purchase' + '?nonce='+yesObj.nonce, {
                                'promo_id': self.tpMeta.promoID,
                                'unique_id': self.tpMeta.userID,
                                'yos_order_id': self.orderResponse.orderNumber,
                                'yos_order_display_id': self.orderResponse.displayOrderNumber
                            })
                            .then((response) => {
                                // console.log(response);
                            })
                            .catch((error) => {
                                // console.log(error);
                            })
                            .finally(() => {
                                // console.log('finally');
                            });
                    }
                },
                redirectThankYou: function(paymentStatus) {
                    var self = this;

                    ywos.lsData.meta.completedStep = self.currentStep;
                    ywos.lsData.meta.paymentInfo = self.paymentInfo;
                    ywos.lsData.meta.orderResponse = self.orderResponse;
                    ywos.lsData.meta.paymentResponse = self.paymentResponse;
                    ywos.updateYWOSLSData();

                    setTimeout(function() {
                        ywos.redirectToPage('thank-you?status=' + paymentStatus);
                    }, 2000);
                    self.sendAnalytics();
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
                selectWallet: function(wallet, event) {
                    var self = this;
                    $('.listing-quickSelectWallets .nav-item').removeClass('selected');
                    $(event.currentTarget).addClass('selected');
                    self.paymentInfo.walletType = wallet;
                    self.watchWalletSelect();
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
                        if (inputVal.length == 4 && inputStep == 4 && self.cardholder.number1.length == 4 && self.cardholder.number2.length == 4 && self.cardholder.number3.length == 4 && self.cardholder.number4.length >= 2) {
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
                watchWalletSelect: function(e) {
                    var self = this;
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
                            self.paymentInfo.cardExpiryMonth.trim().length < 2 ||
                            self.paymentInfo.cardExpiryYear.trim().length < 4 ||
                            self.paymentInfo.cardCVV.trim().length < 3
                        ) {
                            isFilled = false;
                        }
                    } else if (paymentMethod == 'FPX') {
                        if (self.paymentInfo.bankCode.trim() == '' || self.paymentInfo.bankName.trim() == '') {
                            isFilled = false;
                        }
                    }else if( paymentMethod == 'REVENUE_M_YOS' ) {
                        if ( self.paymentInfo.walletType.trim() == '' ) {
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
                        'transaction_id': self.orderResponse.displayOrderNumber,
                        'currency': 'MYR',
                        'value': self.orderSummary.due.total,
                        'tax': self.orderSummary.due.taxesSST,
                        'shipping': self.orderSummary.due.shippingFees,
                        'foreigner_deposit': self.orderSummary.due.foreignerDeposit,
                        'payment_method': self.paymentInfo.paymentMethod,
                        'rounding_adjustment': self.orderSummary.due.rounding,
                        'items': [{
                            'name': self.orderSummary.plan.planName,
                            'id': self.orderSummary.plan.mobilePlanId,
                            'category': self.orderSummary.plan.planType,
                            'price': self.orderSummary.plan.totalAmountWithoutSST
                        }]
                    };
                    if (self.orderSummary.addOn) {
                        pushData.items.push({
                            'name': self.orderSummary.addOn.addonName,
                            'id': 0,
                            'category': 'addOn',
                            'price': self.orderSummary.addOn.amount
                        });
                    }
                    pushAnalytics(eventType, pushData);
                },
                renderText: function(strID) {
                    return ywos.renderText(strID, this.pageText);
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>
