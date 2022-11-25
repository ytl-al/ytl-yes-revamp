<?php include('header-no-menu.php'); ?>


<style type="text/css">
    #grey-innerbanner {
        background-color: #F9F7F4;
        padding: 25px 0px;
    }

    #grey-innerbanner h1 {
        font-size: 42px;
        color: #2B2B2B;
        font-weight: 800;
    }

    #cart-body {
        padding: 30px 0px;
    }

    #cart-body .packagebox {
        background: #FFFFFF;
        box-sizing: border-box;
        border: 2px solid #00B4F0;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-bottom: 40px;
    }

    #cart-body .packagebox .visualbg {
        background: linear-gradient(16.65deg, #00B4F0 -123.85%, #CF5396 74.76%);
        text-align: center;
        padding: 15px 12px;
    }
    
    #cart-body .packagebox .visualbg .img-fluid { max-width: 50%; padding-left: 12px; }

    #cart-body .packagebox h3 {
        font-weight: 800;
        font-size: 24px;
        line-height: 28px;
        color: #2B2B2B;
    }

    #cart-body .packagebox p {
        font-size: 20px;
        line-height: 24px;
        color: #525252;
    }

    #cart-body .packagebox h3.price {
        font-weight: 800;
        font-size: 42px;
        color: #2B2B2B;
    }

    #cart-body .packagebox .package-info {
        width: 100%;
        display: flex;
        flex-direction: column;
        border-top: solid 1px #00B4F0;
        padding-top: 15px;
        font-size: 16px;
        color: #2B2B2B;
    }

    #cart-body p {
        font-size: 18px;
        font-weight: 600;
        color: #000000;
    }

    #cart-body p a {
        color: #00B4F0;
        text-decoration: underline;
    }

    .summary-box {
        box-shadow: 0px 5px 15px rgba(112, 144, 176, 0.2);
        border-radius: 8px;
        width: 100%;
        background-color: #FFF;
        padding: 20px;
    }

    .summary-box h1 {
        font-size: 24px;
        font-weight: 800;
        color: #2B2B2B;
        margin-bottom: 20px;
    }

    .summary-box h2 {
        width: 100%;
        font-size: 18px;
        color: #525252;
        font-weight: 700;
        border-bottom: solid 1px #C5C5C5;
        padding-bottom: 5px;
    }

    .summary-box h3 {
        font-size: 24px;
        font-weight: 800;
        color: #00B4F0;
        text-transform: uppercase;
    }

    .summary-box .monthly {
        width: 100%;
        border-bottom: solid 1px #C5C5C5;
        border-top: solid 1px #C5C5C5;
    }

    .summary-box .monthly p {
        font-size: 14px !important;
        color: #525252 !important;
    }

    .summary-box .referral-box {
        width: 100%;
        border: 1px solid #C5C5C5;
        border-radius: 8px;
        position: relative;
    }

    .summary-box .referral-box .referral-check {
        position: absolute;
        right: 10px;
        top: 6px;
    }

    .summary-box input.referral {
        width: 100%;
        font-size: 13px;
        border: none;
        border-radius: 8px;
        color: #7A7A7A;
        padding: 5px;
        padding-left: 30px;
        background-repeat: no-repeat;
        background-position: 9px 6px;
    }

    .summary-box .pink-btn {
        padding: 7px 10px;
    }

    .addons-container h1 {
        font-size: 29px;
        color: #2B2B2B;
        font-weight: 800;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .addons-container .addon-box {
        background-color: #FFF;
        border-radius: 5px;
        box-shadow: 0px 3.44867px 10.346px rgba(112, 144, 176, 0.2);
        display: flex;
        flex-direction: column;
        width: 100%;
        position: relative;
        padding: 15px;
    }

    .addons-container .addon-box:hover {
        box-shadow: 0px 8.45px 10.346px rgba(112, 144, 176, 0.27);
    }

    .addons-container .addon-box img {
        position: absolute;
        right: 15px;
        top: 40px;
    }

    .addons-container .addon-box h1 {
        color: #00B4F0;
        font-weight: 800;
        font-size: 20px;
        margin: 0px;
    }

    .addons-container .addon-box p {
        color: #525252;
        font-size: 14px;
    }

    .addons-container .addon-box p.small {
        font-size: 12px;
        color: #7A7A7A;
    }

    .packagebox .accordion-button:not(.collapsed) {
        background-color: transparent;
        box-shadow: none;
    }

    .packagebox .accordion-button {
        width: auto;
        padding: 0;
        float: right;
        padding-right: 20px;
    }

    .packagebox .accordion-button h3 {
        margin-right: 10px;
    }

    .packagebox .accordion-button:focus,
    .packagebox .accordion-button:active {
        outline: none;
        box-shadow: none;
        border: none;
    }

    #cart-accordion .accordion-body {
        padding: 1.5rem;
        border: 1px solid #C5C5C5;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    #cart-accordion .accordion-body h1 {
        margin: 0;
        font-weight: 600;
        font-size: 24px;
        color: #2B2B2B;
        width: 100%;
        border-bottom: 1px solid #C5C5C5;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }

    #cart-accordion .accordion-body h2 {
        font-size: 16px;
        font-weight: 700;
        color: #2B2B2B;
        margin-bottom: 15px;
    }

    #cart-accordion .accordion-body p {
        font-size: 16px;
        color: #2B2B2B;
    }

    #cart-accordion .accordion-body p.bold {
        font-weight: 600;
    }

    #cart-accordion .accordion-body p a {
        color: #ED028C;
        text-decoration: underline;
    }

    #cart-accordion .accordion-body p.small {
        font-size: 12px;
        color: #2B2B2B;
    }

    #cart-accordion .accordion-body p.large {
        font-size: 20px;
        font-weight: 700;
    }

    #login-modal .modal-body {
        padding: 30px;
    }

    #login-modal .white-btn2,
    #login-modal .pink-btn {
        padding: 5px 20px;
    }

    #login-modal .btn-close {
        position: absolute;
        right: 20px;
        top: 20px;
        z-index: 999;
    }

    #login-modal h1 {
        position: relative;
        font-family: 'Nunito Sans', sans-serif;
        font-size: 20px;
        font-weight: 400;
        color: #2B2B2B;
        z-index: 1;
        overflow: hidden;
        text-align: center;
    }

    #login-modal h1:before,
    #login-modal h1:after {
        position: absolute;
        top: 51%;
        overflow: hidden;
        width: 45%;
        height: 1px;
        content: '\a0';
        background-color: #2B2B2B;
    }

    #login-modal h1:after {
        margin-left: 5%;
    }

    #login-modal h1:before {
        margin-left: -50%;
        text-align: right;
    }

    #login-modal p.bold {
        font-size: 16px;
        color: #2B2B2B;
        font-weight: 700;
    }

    #login-modal .nav-pills .nav-link.active,
    #login-modal .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #00B4F0;
    }

    #login-modal .nav-pills .nav-link {
        border-radius: 90px;
        font-size: 14px;
        padding: 0.2rem 1.3rem;
        background-color: #D7D7D7;
        color: #FFF;
        min-width: 100px;
    }

    #login-modal .input-box {
        border-radius: 8px;
        width: 100%;
        border: 0.75px solid rgba(122, 122, 122, 0.4);
        margin-bottom: 10px;
    }

    #login-modal .input-box input {
        border: none;
        text-align: center;
        font-size: 15px;
        color: #2B2B2B;
        padding: 11px;
        background-repeat: no-repeat;
        background-position: 13px 9px;
        border-radius: 8px;
    }

    #login-modal .input-box input:focus,
    #login-modal .input-box input:active {
        outline: none;
        border: none;
        box-shadow: none;
    }

    #login-modal .forgotpassword {
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        text-decoration: underline;
        color: #525252;
    }

    #cart-body .addons-container .addon-box-disabled {
        cursor: not-allowed;
        opacity: 0.6;
    }

    .addon-content {
        padding-right: 38px;
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
        #cart-body .packagebox .visualbg {
            padding: 0px 12px;
        }

        #cart-body .packagebox h3 {
            font-size: 20px;
        }

        #cart-body .packagebox p {
            font-size: 15px;
        }

        #cart-body .packagebox h3.price {
            font-size: 31px;
        }

        .addons-container .addon-box {
            margin-bottom: 10px;
        }
    }

    @media (min-width: 922px) {
        #cart-body .packagebox .visualbg .img-fluid { max-width: 100%; }
    }

    .nav-container { background-color: #1A1E47; }
    .nav-container .navbar { padding-top: 8px; padding-bottom: 8px; }
    .nav-container .navbar-brand { padding-top: 0; padding-bottom: 0; }
    .nav-container a, .nav-container .login-btn {}
    .logo-top { width: 35px; }
</style>


<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <h1>{{ renderText('pageTitle') }}</h1>
        </div>
    </section>
    <!-- Banner End -->


    <!-- Body STARTS -->
    <section id="cart-body">
        <div class="container" id="container-empty" v-if="isTargetedPromo && tpValidation != ''">
            <div class="row mb-5 gx-5">
                <div class="col-lg-8 col-12">
                    <div class="accordion">
                        <div class="packagebox mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-12 visualbg d-none">
                                    <img src="/wp-content/uploads/2022/05/ft5g-cart-visual.jpg" class="img-fluid" alt="" />
                                </div>
                                <div class="col-12 p-3 px-5">
                                    <template v-if="tpValidation == 'has_purchased'">
                                        <h3 class="mt-3 mt-lg-0">Link has expired!</h3>
                                        <p class="mb-3">Your link has been redeemed. Only one purchase can be made per unique link.</p>
                                    </template>

                                    <template v-if="tpValidation == 'not_valid'">
                                        <h3 class="mt-3 mt-lg-0">Failed to add to cart!</h3>
                                        <p class="mb-3">Your request is not valid. The Unique ID and Promo ID provided cannot be validated. Please <a href="javascript:void(0)" onClick="history.back();">go back</a> and try again.</p>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="container-empty" v-if="isCartEmpty">
            <div class="row mb-5 gx-5">
                <div class="col-lg-8 col-12">
                    <div class="accordion">
                        <div class="packagebox mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-12 visualbg d-none">
                                    <img src="/wp-content/uploads/2022/05/ft5g-cart-visual.jpg" class="img-fluid" alt="" />
                                </div>
                                <div class="col-12 p-3 px-5">
                                    <h3 class="mt-3 mt-lg-0">No item in the cart</h3>
                                    <p class="mb-3">You may browse the plans available <a href="/#popular-deals">here</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="container-hasItem" v-if="hasFetchPlan">
            <div class="row mb-5 gx-5">
                <div class="col-lg-8 col-12">
                    <div class="accordion" id="cart-accordion">
                        <div class="packagebox mb-3">
                            <div class="row">
                                <div class="col-lg-3 col-12 visualbg d-flex align-items-center justify-content-center" v-if="orderSummary.plan.planType == 'postpaid'">
                                    <img src="/wp-content/uploads/2022/06/ft5g-cart-visual.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col-lg-3 col-12 visualbg prepaid d-flex align-items-center" v-if="orderSummary.plan.planType == 'prepaid'">
                                    <img src="/wp-content/uploads/2022/06/ft5g-cart-visual.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col-lg-6 col-12 pt-lg-4 pb-1 px-4 px-lg-5 ps-lg-4">
                                    <h3 class="mt-3 mt-lg-0">{{ orderSummary.plan.displayName }}</h3>
                                    <p class="mb-3" v-if="orderSummary.plan.internetData">RM{{ parseFloat(orderSummary.plan.totalAmount).toFixed(0) }} for {{ orderSummary.plan.internetData }}</p>
                                    <div class="package-info" v-if="packageInfos.length">
                                        <div class="row">
                                            <div class="col-6 mb-3" v-for="(packageInfo, index) in packageInfos.slice(0, 4)">
                                                <span class="span-checkList">{{ packageInfo }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12 mt-3 mb-3 mt-lg-0 mb-lg-0 d-flex align-items-center justify-content-lg-end justify-content-center">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h3 class="price">RM{{ (orderSummary.plan.totalAmount % 1 != 0) ? parseFloat(orderSummary.plan.totalAmount).toFixed(2) : formatPrice(parseFloat(orderSummary.plan.totalAmount)) }}</h3>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#cart-accordion">
                            <div class="accordion-body">
                                <div v-if="packageInfos.slice(4).length">
                                    <h1>{{ renderText('summaryMoreBenefits') }}</h1>
                                    <div class="row mb-4">
                                        <div class="col-lg-6 mb-3" v-for="(packageInfo, index) in packageInfos.slice(4)"><span class="span-itemList">{{ packageInfo }}</span></div>
                                    </div>
                                </div>

                                <h1>{{ renderText('summaryOneTimeCharges') }}</h1>
                                <h2>{{ renderText('summaryRatePlan') }}</h2>

                                <template v-for="(price) in orderSummary.due.priceBreakdown.plan">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>{{ price.name }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ price.value }}</p>
                                        </div>
                                    </div>
                                </template>
                                <div class="mt-2 pt-2 border-top pb-2 border-bottom" v-if="orderSummary.plan.bundleName || orderSummary.plan.hasDevice">
                                    <!-- <p class="bold mb-0" v-if="orderSummary.plan.bundleName">Device Bundle: <span class="fw-bold">{{ orderSummary.plan.bundleName }}</span></p> -->
                                    <template v-for="(price, index) in orderSummary.due.priceBreakdown.device">
                                        <div class="row">
                                            <div class="col-6">
                                                <p>{{ price.name }}</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p>RM{{ price.value }}</p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div class="row mb-3 mt-5">
                                    <div class="col-8 pb-1 border-bottom">
                                        <p>{{ renderText('summaryAddOns') }}</p>
                                        <p v-if="orderSummary.addOn != null">{{ orderSummary.addOn.displayAddonName }} <a href="javascript:void(0)" class="btn-sm pink-btn text-white mx-lg-3" v-on:click="removeAddOn()">Remove</a></p>
                                    </div>
                                    <div class="col-4 pb-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.addOns).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>{{ renderText('summaryTaxes') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.taxesSST).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom" v-if="orderSummary.due.foreignerDeposit > 0">
                                        <p>{{ renderText('summaryForeignerDeposit') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end" v-if="orderSummary.due.foreignerDeposit > 0">
                                        <p>RM{{ parseFloat(orderSummary.due.foreignerDeposit).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>{{ renderText('summaryShipping') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.shippingFees).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>{{ renderText('summaryRounding') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>{{ (orderSummary.due.rounding < 0) ? '-' : '' }}RM{{ parseFloat(orderSummary.due.rounding.replace('-', '')).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="fw-bold">{{ renderText('summaryTotalDue') }}</p>
                                        <p class="small d-none">{{ renderText('summaryNotInvoice') }}</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p class="large">RM{{ formatPrice(parseFloat(orderSummary.due.total).toFixed(2)) }}</p>
                                    </div>
                                </div>
                                <div v-if="orderSummary.plan.planType != 'prepaid'">
                                    <h1>{{ renderText('summaryMonthlyCharges') }}</h1>
                                    <h2>{{ renderText('summaryRatePlan') }}</h2>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p>{{ orderSummary.plan.displayName }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p>RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-3" v-if="orderSummary.plan.supplementaryBundlePlans && orderSummary.plan.supplementaryBundlePlans.length">
                                        <h4 style="font-size: 16px; font-weight: 700;">{{ renderText('summarySupplimentaryBundleLines') }}</h4>
                                        <div class="row mb-0" v-for="(subPlan) in orderSummary.plan.supplementaryBundlePlans">
                                            <div class="col-6">
                                                <p class="mb-0 ps-2">{{ subPlan.planName }}</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="mb-0">RM{{ parseFloat(subPlan.planPrice).toFixed(2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="bold">{{ renderText('summaryTotalMonthly') }}</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="bold">RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p v-if="orderSummary.plan.bundleName != 'Home Broadband'" v-html="renderText('keepNumberOption')"></p>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="summary-box">
                        <h1>{{ renderText('osTitle') }}</h1>
                        <h2>{{ renderText('osDueToday') }}</h2>
                        <div class="row">
                            <div class="col-6 pt-2 pb-2">
                                <h3>{{ renderText('osTotal') }}</h3>
                            </div>
                            <div class="col-6 pt-2 pb-2 text-end">
                                <h3>RM{{ formatPrice(parseFloat(orderSummary.due.total).toFixed(2)) }}</h3>
                            </div>
                        </div>
                        <div class="monthly mb-4" v-if="orderSummary.plan.monthlyCommitment > 0">
                            <div class="row">
                                <div class="col-6">
                                    <p>{{ renderText('osMonthlyDue') }}</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p>RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="referral-box mb-3 d-none"><input class="form-control referral" type="text" placeholder="Enter referral code (if any)"><img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/referral-tick.png" class="referral-check" alt=""></div>
                        <a href="javascript:void(0)" class="pink-btn d-block" v-on:click="checkLoggedIn">{{ renderText('osCheckout') }}</a>
                    </div>
                </div>
            </div>
            <div class="addons-container border-top" v-if="planAddOns.length">
                <h1>Customise your plan with {{ orderSummary.plan.planType }} data Add-Ons</h1>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-12 mb-3" v-for="(addOn, index) in planAddOns">
                        <a href="javascript:void(0)" class="addon-box" v-on:click="addAddOn(index)">
                            <h1>{{ addOn.displayAmount }}</h1>
                            <div class="addon-content">
                                <p class="mb-2">{{ addOn.displayAddonName }}</p>
                                <p class="small">
                                    Valid for {{ addOn.validityDays }}
                                    <span v-if="addOn.validityDays > 1">days</span><span v-else="">day</span>
                                    only*
                                </p>
                            </div>
                            <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/add-icon.png" alt="" v-if="orderSummary.addOn == null || orderSummary.addOn.addonName != addOn.addonName" />
                            <img src="/wp-content/themes/yes-twentytwentyone/template-parts/ywos/assets/images/icon-added.png" width="38" alt="" v-if="orderSummary.addOn != null && orderSummary.addOn.addonName == addOn.addonName" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Body ENDS -->


    <!-- Login Modal STARTS -->
    <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body pt-5 pb-5">
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-9 col-12 mb-lg-0 mb-2 align-self-center">
                            <a href="javascript:void(0)" class="white-btn2 d-block" v-on:click="redirectLoggedIn('guest')">{{ renderText('checkoutGuest') }}</a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 mb-lg-0 mb-2 align-self-center">
                            <h1 class="mb-4">{{ renderText('checkoutSignIn') }}</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-12 mb-lg-0 mb-2 align-self-center">
                            <p class="bold text-center mb-3">{{ renderText('checkoutPreference') }}</p>
                            <ul class="nav justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-loginTac-tab" data-bs-toggle="pill" data-bs-target="#pills-loginTac" type="button" role="tab" aria-controls="pills-loginTac" aria-selected="true">TAC</button>
                                </li>
                                <li class="nav-item" role="presentation" style="margin-left: -20px;">
                                    <button class="nav-link" id="pills-loginPassword-tab" data-bs-toggle="pill" data-bs-target="#pills-loginPassword" type="button" role="tab" aria-controls="pills-loginPassword" aria-selected="false">{{ renderText('checkoutPassword') }}</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-loginTac" role="tabpanel" aria-labelledby="pills-loginTac-tab">
                                    <form class="form-loginTac" @submit="otpLoginSubmit">
                                        <div class="input-box">
                                            <div class="w-100">
                                                <input type="text" class="form-control userid" id="input-otpYesNumber" v-model="login.input.otp.yesNumber" @input="watchOTPLoginFields" :placeholder="renderText('checkoutYesID')" />
                                            </div>
                                            <div class=" w-100 border-top item-otpPassword" id="box-otpPassword" style="display: none;">
                                                <input type="password" class="form-control password" id="input-otpPassword" v-model="login.input.otp.password" @input="watchOTPLoginFields" placeholder="******" maxlength="6" />
                                            </div>
                                        </div>
                                        <div class="w-100 text-center mb-4">
                                            <p class="mb-3 text-center item-otpPassword panel-otpMessage" style="display: none;"><span class="span-message">Your TAC code has been sent.</span><br /> TAC code is valid for <span class="span-timer">5:00</span>.</p>
                                            <button type="button" class="white-btn2 mt-3 mt-lg-0" v-on:click="generateOTPForLogin" :disabled="!allowRequestOTP">{{ requestOTPText }}</button>
                                            <div class="invalid-feedback mt-1" id="em-otpLogin"></div>
                                        </div>
                                        <!-- <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Keep me logged in</label>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-lg-10 offset-lg-1 mb-lg-0 mb-2 text-center">
                                                <input type="submit" :value="renderText('checkoutLogin')" class="pink-btn d-block mb-3 w-100" :disabled="!login.submitButton.allowOtp" />
                                                <!-- <a href="https://selfcare.yes.my/myselfcare/doForgotPasswordLink.do" class="forgotpassword">FORGOT PASSWORD?</a> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-loginPassword" role="tabpanel" aria-labelledby="pills-loginPassword-tab">
                                    <form class="form-loginPassword" @submit="basicLoginSubmit">
                                        <div class="input-box">
                                            <div class="w-100 border-bottom">
                                                <input type="text" class="form-control userid" id="input-basicYesNumber" v-model="login.input.basic.yesNumber" @input="watchBasicLoginFields" :placeholder="renderText('checkoutYesID')" />
                                            </div>
                                            <div class="w-100">
                                                <input type="password" class="form-control password" id="input-basicPassword" v-model="login.input.basic.password" @input="watchBasicLoginFields" placeholder="********" />
                                            </div>
                                        </div>
                                        <div class="w-100 text-center">
                                            <div class="invalid-feedback mb-4" id="em-basicLogin"></div>
                                        </div>
                                        <!-- <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">Keep me logged in</label>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-lg-10 offset-lg-1 mb-lg-0 mb-2 text-center">
                                                <input type="submit" :value="renderText('checkoutLogin')" class="pink-btn d-block mb-3 w-100" :disabled="!login.submitButton.allowBasic" />
                                                <!-- <a href="https://selfcare.yes.my/myselfcare/doForgotPasswordLink.do" class="forgotpassword">FORGOT PASSWORD?</a> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal ENDS -->

    <div class="modal fade" id="modal-addOnRemove" tabindex="-1" aria-labelledby="modal-addOnRemove" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove Add-On?</h5>
                </div>
                <div class="modal-body text-center">
                    <p class="panel-message">Do you want to remove add on from this purchase?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" v-on:click="alertAddOnRemove">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vue Wrapper ENDS -->

<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();

        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                ywosLSData: null,
                planID: null,
                isCartEmpty: false,
                hasFetchPlan: false,
                requestOTPText: '',
                loginInfo: {
                    type: 'guest',
                    yes_number: '',
                    password: ''
                },
                login: {
                    input: {
                        otp: {
                            inputYesNumber: '#input-otpYesNumber',
                            inputPassword: '#input-otpPassword',
                            yesNumber: '',
                            password: ''
                        },
                        basic: {
                            inputYesNumber: '#input-basicYesNumber',
                            inputPassword: '#input-basicPassword',
                            yesNumber: '',
                            password: ''
                        }
                    },
                    errorMessage: {
                        otp: '#em-otpLogin',
                        basic: '#em-basicLogin'
                    },
                    submitButton: {
                        allowOtp: false,
                        allowBasic: false
                    }
                },
                planAddOns: [],
                taxRate: {
                    sst: 0.06
                },
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
                packageInfos: [],
                currentStep: 0,
                allowRequestOTP: true,
                ywos: null,
                addOn: {
                    allowAddOn: true,
                    modalRemove: '#modal-addOnRemove'
                },
                isTargetedPromo: false, 
                tpValidation: '', 
                tpMeta: {}, 

                apiLocale: 'EN', 
                pageText: {
                    pageTitle: { 'en-US': 'Your Cart', 'ms-MY': 'Kart Anda', 'zh-hans': 'Your Cart' },
                    summaryMoreBenefits: { 'en-US': 'More Benefits', 'ms-MY': 'Lebih Manfaat', 'zh-hans': 'More Benefits' },
                    summaryOneTimeCharges: { 'en-US': 'Total Payable Now', 'ms-MY': 'Jumlah Perlu Dibayar Sekarang', 'zh-hans': 'Total Payable Now' },
                    summaryRatePlan: { 'en-US': 'Rate plan', 'ms-MY': 'Kadar pelan', 'zh-hans': 'Rate plan' },
                    summaryAddOns: { 'en-US': 'Add-Ons', 'ms-MY': 'Tambahan', 'zh-hans': 'Add-Ons' }, 
                    summaryTaxes: { 'en-US': 'SST @6%', 'ms-MY': 'SST @6%', 'zh-hans': 'SST @6%' }, 
                    summaryForeignerDeposit: { 'en-US': 'Deposit for Foreigner', 'ms-MY': 'Deposit Warga Asing', 'zh-hans': 'Deposit for Foreigner' }, 
                    summaryShipping: { 'en-US': 'Delivery Fee', 'ms-MY': 'Caj Penghantaran', 'zh-hans': 'Delivery Fee' }, 
                    summaryRounding: { 'en-US': 'Rounding Adjustment', 'ms-MY': 'Penyelarasan Pembundaran', 'zh-hans': 'Rounding Adjustment' }, 
                    summaryTotalDue: { 'en-US': 'Total charges due now', 'ms-MY': 'Jumlah perlu dibayar sekarang', 'zh-hans': 'Total charges due now' }, 
                    summaryNotInvoice: { 'en-US': 'This summary is not an invoice', 'ms-MY': 'Ringkasan ini bukanlah invois', 'zh-hans': 'This summary is not an invoice' }, 
                    summaryMonthlyCharges: { 'en-US': 'Monthly Charges', 'ms-MY': 'Caj Bulanan', 'zh-hans': 'Monthly Charges' }, 
                    summarySupplimentaryBundleLines: { 'en-US': 'Supplementary Bundled Lines', 'ms-MY': 'Talian Tambahan Bundle', 'zh-hans': 'Supplementary Bundled Lines' }, 
                    summaryTotalMonthly: { 'en-US': 'Total monthly charges', 'ms-MY': 'Jumlah caj bulanan', 'zh-hans': 'Total monthly charges' }, 
                    keepNumberOption: { 'en-US': 'You have the option to <a href="/keep-your-number" target="_blank">Switch to Yes</a> during or after SIM activation.', 'ms-MY': 'Anda mempunyai pilihan untuk <a href="/ms/keep-your-number" target="_blank">Kekalkan Nombor Anda</a> semasa atau selepas pengaktifan SIM.', 'zh-hans': 'You have the option to <a href="/zh-hans/keep-your-number" target="_blank">Switch to Yes</a> during or after SIM activation.' },
                    osTitle: { 'en-US': 'Order summary', 'ms-MY': 'Ringkasan pesanan', 'zh-hans': 'Order summary' },
                    osDueToday: { 'en-US': 'Due today after taxes and shipping', 'ms-MY': 'Perlu dibayar hari ini selepas cukai dan penghantaran', 'zh-hans': 'Due today after taxes and shipping' },
                    osTotal: { 'en-US': 'Total', 'ms-MY': 'Jumlah', 'zh-hans': 'Total' },
                    osMonthlyDue: { 'en-US': 'Due Monthly', 'ms-MY': 'Perlu dibayar bulanan', 'zh-hans': 'Due Monthly' },
                    osCheckout: { 'en-US': 'Checkout', 'ms-MY': 'Terus ke Pembayaran', 'zh-hans': 'Checkout' },
                    checkoutGuest: { 'en-US': 'Continue checkout as Guest', 'ms-MY': 'Sambung ke Pembayaran Sebagai Tetamu', 'zh-hans': 'Continue checkout as Guest' },
                    checkoutSignIn: { 'en-US': 'or sign in with your Yes ID / Number', 'ms-MY': 'atau daftar masuk dengan ID Yes / Nombor', 'zh-hans': 'or sign in with your Yes ID / Number' },
                    checkoutPreference: { 'en-US': 'Select your preference', 'ms-MY': 'Buat pilihan', 'zh-hans': 'Select your preference' },
                    checkoutPassword: { 'en-US': 'Password', 'ms-MY': 'Kata Laluan', 'zh-hans': 'Password' },
                    checkoutYesID: { 'en-US': 'Yes ID / Number', 'ms-MY': 'ID Yes / Nombor', 'zh-hans': 'Yes ID / Number' },
                    checkoutLogin: { 'en-US': 'Login', 'ms-MY': 'Daftar masuk', 'zh-hans': 'Login' },
                    checkoutTACRequest: { 'en-US': 'Request TAC', 'ms-MY': 'Minta TAC', 'zh-hans': 'Request TAC' },
                    checkoutTACResend: { 'en-US': 'Resend TAC', 'ms-MY': 'Minta Semula TAC', 'zh-hans': 'Resend TAC' },

                    errorValidNumber: { 'en-US': 'Please insert valid Yes Number', 'ms-MY': 'Sila masukkan Nombor Yes yang sah', 'zh-hans': 'Please insert valid Yes Number' }
                }
            },
            created: function() {
                var self = this;
                setTimeout(function() {
                    ywos.init();
                    self.getPlanData();
                }, 500);
            },
            methods: {
                getPlanData: function() {
                    var self = this;

                    if (ywos.validateSession(self.currentStep)) {
                        self.planID = ywos.lsData.meta.planID;

                        if (ywos.lsData.isTargetedPromo) {
                            self.initTargetedPromo()
                        } else {
                            if (ywos.lsData.meta.isLoggedIn) {
                                self.orderSummary = ywos.lsData.meta.orderSummary;
                                self.updateAddOns(self.orderSummary.plan.addonListServiceTypes);
                                self.updatePlan();
                            } else {
                                self.ajaxGetPlanData();
                            }
                        }

                        self.apiLocale = (ywos.lsData.siteLang == 'ms-MY') ? 'MY' : 'EN';
                    } else {
                        self.isCartEmpty = true;
                        setTimeout(function() {
                            toggleOverlay(false);
                        }, 1500);
                    }

                    self.requestOTPText = self.renderText('checkoutTACRequest');
                },
                initTargetedPromo: function() {
                    var self = this;
                    self.isTargetedPromo = (ywos.lsData.isTargetedPromo) ? ywos.lsData.isTargetedPromo : false;
                    self.tpMeta = ywos.lsData.tpMeta;
                    var userID = self.tpMeta.userID;
                    var promoID = self.tpMeta.promoID;

                    axios.post(apiEndpointURL + '/tp-url-check', {
                            'unique_id': userID,
                            'promo_id': promoID
                        })
                        .then((response) => {
                            var data = response.data;
                            if (data.has_purchased == '1') {
                                self.tpValidation = 'has_purchased';
                                toggleOverlay(false);
                            } else {
                                if (ywos.lsData.meta.isLoggedIn) {
                                    self.orderSummary = ywos.lsData.meta.orderSummary;
                                    self.updateAddOns(self.orderSummary.plan.addonListServiceTypes);
                                    self.updatePlan();
                                } else {
                                    self.ajaxGetPlanData();

                                    ywos.lsData.meta.loginType = 'targetedPromo';
                                    // ywos.lsData.meta.customerDetails = data.user_meta;
                                    ywos.updateYWOSLSData();
                                }
                            }
                        })
                        .catch((error) => {
                            self.tpValidation = 'not_valid';
                            toggleOverlay(false);
                            console.log(error);
                        })
                        .finally(() => {
                            // console.log('finally');
                        });
                }, 
                ajaxGetPlanData: function() {
                    var self = this;
                    axios.get(apiEndpointURL + '/get-plan-by-id/' + self.planID)
                        .then((response) => {
                            var data = response.data;
                            if (data.internetData == '∞') {
                                data.internetData = 'Unlimited';
                            }

                            self.orderSummary.plan = data;

                            var planPriceBreakdown = [];
                            var planDevicePriceBreakdown = [];
                            var planSimplifiedBreakdown = [];
                            for (var key in data) {
                                var keyPricingComponentList = 'pricingComponentList';
                                if (key == keyPricingComponentList) {
                                    var pricingComponentList = data[keyPricingComponentList];
                                    pricingComponentList.map(function(pricingComponent) {
                                        var componentName = pricingComponent.pricingComponentName;
                                        var componentValue = formatPrice(pricingComponent.pricingComponentValue);
                                        var objArr = {
                                            name: componentName,
                                            value: componentValue
                                        };
                                        if (['Postpaid Device Price', 'Postpaid Device Upfront Payment'].includes(componentName)) {
                                            planDevicePriceBreakdown.push(objArr);
                                        } else if (['Postpaid Foreigner Deposit'].includes(componentName)) {
                                            self.orderSummary.plan.foreignerDeposit = componentValue;
                                        } else {
                                            planPriceBreakdown.push(objArr);
                                        }
                                    });
                                }
                                var keySimplifiedItemPricingList = 'simplifiedItemPricingList';
                                if (key == keySimplifiedItemPricingList) {
                                    planSimplifiedBreakdown = data[keySimplifiedItemPricingList];
                                }
                            };
                            self.orderSummary.due.priceBreakdown = {
                                plan: planPriceBreakdown,
                                device: planDevicePriceBreakdown,
                                simplified: planSimplifiedBreakdown
                            };
                            // console.log(self.orderSummary.due);

                            var hasDevice = false;
                            for (var i = 0; i < planDevicePriceBreakdown.length; i++) {
                                if (parseFloat(planDevicePriceBreakdown[i].value) > 0) {
                                    hasDevice = true;
                                    break;
                                }
                            }
                            self.orderSummary.plan.hasDevice = hasDevice;

                            self.updateAddOns(data.addonListServiceTypes);
                            self.updatePlan(true);
                        })
                        .catch((error) => {
                            // console.log('error', error);
                        })
                },
                updateAddOns: function(dataAddOns = {}) {
                    var self = this;
                    if (dataAddOns) {
                        dataAddOns.map(function(data) {
                            data.addonPackageInfoList.map(function(addOn) {
                                // addOn.taxSST = addOn.totalAmount * self.taxRate.sst;
                                var indPaymentDeduction = addOn.paymentDeductionInfoList.filter(paymentDeduction => {
                                    return paymentDeduction.type == 'SST';
                                });
                                if (indPaymentDeduction) {
                                    indPaymentDeduction = indPaymentDeduction[0];
                                    addOn.taxSST = parseFloat(indPaymentDeduction.value).toFixed(2);
                                }
                                self.planAddOns.push(addOn);
                            });
                        });

                        var planAddOn = self.orderSummary.addOn;
                        if (planAddOn) {
                            self.orderSummary.due.taxesSST += planAddOn.taxSST;
                            self.orderSummary.due.total += planAddOn.taxSST;

                            setTimeout(function() {
                                self.addOn.allowAddOn = (self.orderSummary.addOn == null) ? true : false;
                                if (self.addOn.allowAddOn) {
                                    $('.addon-box').removeClass('addon-box-disabled');
                                } else {
                                    $('.addon-box').addClass('addon-box-disabled');
                                }
                            }, 500);
                        }
                    }

                },
                updatePlan: function(closeOverlay = true) {
                    var self = this;

                    self.hasFetchPlan = true;

                    self.updateSummary();

                    self.sendAnalytics('addToCart');

                    if (closeOverlay) {
                        setTimeout(function() {
                            toggleOverlay(false);
                        }, 500);
                    }

                    if (self.orderSummary.plan.notes) {
                        var arrNotes = self.orderSummary.plan.notes.split(',');
                        self.packageInfos = arrNotes.sort(function(a, b) {
                            return a.length - b.length;
                        });
                    }
                },
                updateSummary: function() {
                    var self = this;
                    var total = 0;
                    // self.orderSummary.due.amount = (self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.plan.totalAmount) + parseFloat(self.orderSummary.addOn.amount) : parseFloat(self.orderSummary.plan.totalAmount);
                    // self.orderSummary.due.planAmount = parseFloat(self.orderSummary.plan.totalAmount);
                    // self.orderSummary.due.taxesSST = parseFloat(self.orderSummary.plan.totalSST + ((self.orderSummary.addOn != null) ? self.orderSummary.addOn.taxSST : 0));
                    // self.orderSummary.due.total = roundAmount(parseFloat(self.orderSummary.plan.totalAmount) + parseFloat(self.orderSummary.due.addOns) + parseFloat(self.orderSummary.due.taxesSST) + parseFloat(self.orderSummary.due.shippingFees));
                    // self.orderSummary.due.rounding = getRoundingAdjustmentAmount(self.orderSummary.due.total.toFixed(2));
                    // self.orderSummary.due.total += parseFloat(self.orderSummary.due.rounding);

                    // self.orderSummary.due.taxesSST = parseFloat(self.orderSummary.plan.totalSST);
                    // self.orderSummary.due.rounding = parseFloat(self.orderSummary.plan.roundingAdjustment);
                    // self.orderSummary.due.totalWithoutSST = parseFloat(self.orderSummary.plan.totalAmountWithoutSST);
                    // self.orderSummary.due.total = parseFloat(self.orderSummary.plan.totalAmountWithSST);
                    // self.orderSummary.due.total += parseFloat(self.orderSummary.due.addOns);

                    // self.orderSummary.due.addOns = (self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.amount) : 0;
                    // self.orderSummary.due.planAmount = parseFloat(self.orderSummary.plan.totalAmount);
                    // self.orderSummary.due.amount = parseFloat(self.orderSummary.plan.totalAmount) + ((self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.amount) : 0);
                    // self.orderSummary.due.taxesSST = (self.orderSummary.due.amount * self.taxRate.sst).toFixed(2);
                    // self.orderSummary.due.total = roundAmount(parseFloat(self.orderSummary.due.amount) + parseFloat(self.orderSummary.due.taxesSST) + parseFloat(self.orderSummary.due.shippingFees));
                    // self.orderSummary.due.rounding = parseFloat(getRoundingAdjustmentAmount(self.orderSummary.due.total.toFixed(2)));
                    // self.orderSummary.due.total += parseFloat(self.orderSummary.due.rounding);

                    self.orderSummary.due.addOns = (self.orderSummary.addOn != null) ? roundAmount(self.orderSummary.addOn.amount) : 0;
                    self.orderSummary.due.planAmount = parseFloat(self.orderSummary.plan.totalAmount).toFixed(2);
                    self.orderSummary.due.amount = (parseFloat(self.orderSummary.plan.totalAmountWithoutSST.replace(/,/g, '')) + ((self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.amount) : 0)).toFixed(2);
                    self.orderSummary.due.taxesSST = (parseFloat(self.orderSummary.plan.totalSST) + ((self.orderSummary.addOn != null) ? parseFloat(self.orderSummary.addOn.taxSST) : 0)).toFixed(2);
                    self.orderSummary.due.total = roundAmount(parseFloat(self.orderSummary.due.amount) + parseFloat(self.orderSummary.due.taxesSST) + parseFloat(self.orderSummary.due.shippingFees)) + parseFloat(self.orderSummary.due.foreignerDeposit);
                    // self.orderSummary.due.rounding = parseFloat(getRoundingAdjustmentAmount(self.orderSummary.due.total.toFixed(2))).toFixed(2);
                    self.orderSummary.due.rounding = parseFloat(self.orderSummary.plan.roundingAdjustment).toFixed(2);
                    self.orderSummary.due.total = (parseFloat(self.orderSummary.due.total) + parseFloat(self.orderSummary.due.rounding)).toFixed(2);
                    // self.orderSummary.due.total = parseFloat(self.orderSummary.plan.totalAmountWithSST).toFixed(2);
                },
                checkLoggedIn: function() {
                    var self = this;
                    if ((typeof ywos.lsData.meta.isLoggedIn === 'undefined' || !ywos.lsData.meta.isLoggedIn) && !ywos.lsData.isTargetedPromo) {
                        self.login.input.otp.password = '';
                        self.login.input.basic.yesNumber = '';
                        self.login.input.basic.password = '';

                        $('#login-modal').on('hidden.bs.modal', function() {
                            $('.invalid-feedback').hide();
                            $('#pills-loginTac-tab').trigger('click');
                            if (self.allowRequestOTP) {
                                $('.item-otpPassword').hide();
                                self.requestOTPText = self.renderText('checkoutTACRequest');
                            } else {
                                self.login.input.otp.yesNumber = '';
                            }
                        });

                        $('#login-modal').modal('show');
                    } else {
                        toggleOverlay();
                        self.redirectLoggedIn();
                    }
                },
                validateBasicLogin: function() {
                    var self = this;
                    var yesNumber = self.login.input.basic.yesNumber.trim();
                    var password = self.login.input.basic.password;
                    if (yesNumber.length == 0 || password.length == 0) {
                        self.toggleErrorMessageLoginBasic('Please insert valid login credentials.');
                        return false;
                    }
                    return true;
                },
                ajaxValidateLogin: function() {
                    var self = this;
                    axios.post(apiEndpointURL + '/validate-login', {
                            'yes_number': self.loginInfo.yes_number,
                            'password': self.loginInfo.password,
                            'auth_type': self.loginInfo.type, 
                            'locale': self.apiLocale
                        })
                        .then((response) => {
                            var data = response.data;
                            ywos.lsData.meta.customerDetails = data.customerDetails;
                            ywos.lsData.meta.loginType = self.loginInfo.type;
                            ywos.updateYWOSLSData();

                            self.redirectLoggedIn();
                        })
                        .catch((error) => {
                            var errorMsg = "There's an error in validating login. Please try again later.";
                            var response = error.response;
                            if (typeof response !== 'undefined') {
                                var data = response.data;
                                errorMsg = data.message;
                            }

                            self.toggleErrorMessageLoginBasic(errorMsg);

                            toggleOverlay(false);
                        });
                },
                basicLoginSubmit: function(e) {
                    var self = this;
                    if (self.validateBasicLogin()) {
                        toggleOverlay();
                        self.loginInfo = {
                            type: 'password',
                            yes_number: self.login.input.basic.yesNumber,
                            password: self.login.input.basic.password
                        };
                        self.ajaxValidateLogin();
                    }
                    e.preventDefault();
                },
                validateYesNumberOTP: function() {
                    var self = this;
                    var otpYesNumber = self.login.input.otp.yesNumber.trim();
                    if (otpYesNumber.length == 0) {
                        var inputOTPYesNumber = self.login.input.otp.inputYesNumber;
                        var emOTPForLogin = self.login.errorMessage.otp;

                        $(emOTPForLogin).html(self.renderText('errorValidNumber')).show();
                        $(inputOTPYesNumber).focus();
                        $(inputOTPYesNumber).on('keydown', function() {
                            $(emOTPForLogin).hide().html('');
                        });
                        return false;
                    }
                    return true;
                },
                ajaxGenerateOTPForLogin: function() {
                    var self = this;
                    axios.post(apiEndpointURL + '/generate-otp-for-login', {
                            'yes_number': self.login.input.otp.yesNumber, 
                            'locale': self.apiLocale
                        })
                        .then((response) => {
                            $('.item-otpPassword').show();
                            $('#input-otpPassword').show();
                            $('.panel-otpMessage .span-message').html(response.data.displayResponseMessage);
                            $(self.login.input.otp.inputPassword).focus();
                            self.triggerOTPCountdown(response.data.otpExpiryTime);
                        })
                        .catch((error) => {
                            var response = error.response;
                            var data = response.data;
                            var errorMsg = '';
                            if (error.response.status == 500 || error.response.status == 503) {
                                errorMsg = "<p>There's an error in generating your TAC code.<br /> Please try again later.</p>";
                            } else {
                                errorMsg = data.message
                            }
                            $(self.login.errorMessage.otp).html(errorMsg).show();

                            $(self.login.input.otp.inputPassword).focus();
                            $(self.login.input.otp.inputPassword).on('keydown', function() {
                                $(self.login.errorMessage.otp).hide().html('');
                            });
                        })
                        .finally(() => {
                            toggleOverlay(false);
                        });
                },
                generateOTPForLogin: function(event) {
                    var self = this;
                    if (self.validateYesNumberOTP()) {
                        toggleOverlay();
                        self.ajaxGenerateOTPForLogin();

                        $(self.login.errorMessage.otp).hide().html('');
                    }
                },
                triggerOTPCountdown: function(timerMinute = 5) {
                    var self = this;
                    self.allowRequestOTP = false;

                    var timer = timerMinute * 60,
                        minutes, seconds;
                    var interval = setInterval(function() {
                        timer -= 1;

                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        $('.span-timer').html(minutes + ':' + seconds);
                        if (timer == 0) {
                            $('#input-otpPassword').hide();
                            clearInterval(interval);
                            self.allowRequestOTP = true;
                            self.requestOTPText = self.renderText('checkoutTACResend');
                        }
                    }, 1000);
                },
                otpLoginSubmit: function(e) {
                    var self = this;
                    toggleOverlay();
                    self.loginInfo = {
                        type: 'otp',
                        yes_number: self.login.input.otp.yesNumber,
                        password: self.login.input.otp.password
                    };
                    self.ajaxValidateLogin()
                    e.preventDefault();
                },
                toggleErrorMessageLoginBasic: function(errorMessage) {
                    var self = this;
                    var loginType = self.loginInfo.type;
                    var inputYesNumber = (loginType == 'otp') ? self.login.input.otp.inputYesNumber : self.login.input.basic.inputYesNumber;
                    var inputPassword = (loginType == 'otp') ? self.login.input.otp.inputPassword : self.login.input.basic.inputPassword;
                    var emBasicLogin = (loginType == 'otp') ? self.login.errorMessage.otp : self.login.errorMessage.basic;

                    $(emBasicLogin).html(errorMessage).show();
                    $(inputPassword).focus();
                    $(inputYesNumber).on('keydown', function() {
                        $(emBasicLogin).hide().html('');
                    });
                    $(inputPassword).on('keydown', function() {
                        $(emBasicLogin).hide().html('');
                    });
                },
                redirectLoggedIn: function() {
                    var self = this;
                    var toPage = 'verification';
                    var isLoggedIn = (ywos.lsData.meta.isLoggedIn) ? ywos.lsData.meta.isLoggedIn : true;
                    var currentStep = self.currentStep;
                    var loginType = (ywos.lsData.meta.loginType) ? ywos.lsData.meta.loginType : self.loginInfo.type;

                    if (loginType == 'otp' || loginType == 'password') {
                        toPage = 'delivery';
                        currentStep += 1;

                        if (!ywos.lsData.meta.isLoggedIn && ywos.lsData.meta.customerDetails.securityType == 'PASSPORT' && self.orderSummary.plan.planType == 'postpaid' && self.orderSummary.due.foreignerDeposit == 0.00) {
                            self.orderSummary.due.foreignerDeposit = self.orderSummary.plan.foreignerDeposit;
                            self.updateSummary();
                        }
                    } else if (loginType == 'guest' || loginType == 'targetedPromo') {
                        if (!ywos.lsData.meta.isLoggedIn) {
                            isLoggedIn = false;
                            ywos.lsData.meta.customerDetails = {
                                securityType: '',
                                securityId: '',
                                msisdn: '',
                                nric: '',
                                gender: '',
                                mobileNumber: '',
                                homeNumber: '',
                                officeNumber: '',
                                name: '',
                                email: '',
                                address: '',
                                state: '',
                                city: '',
                                postcode: '',
                                country: '',
                                citizenship: '',
                                yesId: '',
                                accountNumber: '',
                                dateOfBirth: '',
                                salutation: '',
                                preferredLanguage: 0
                            };
                        }
                    }

                    if (ywos.lsData.meta.isLoggedIn) {
                        ywos.lsData.meta.orderSummary.addOn = self.orderSummary.addOn;
                        self.orderSummary = ywos.lsData.meta.orderSummary;
                        currentStep = ywos.lsData.meta.completedStep;
                    } else {
                        self.sendAnalytics('checkout');
                    }

                    ywos.lsData.meta.loginType = loginType;
                    ywos.lsData.meta.isLoggedIn = isLoggedIn;
                    ywos.lsData.meta.completedStep = currentStep;
                    ywos.lsData.meta.orderSummary = self.orderSummary;
                    ywos.updateYWOSLSData();

                    ywos.redirectToPage(toPage);
                },
                addAddOn: function(index) {
                    var self = this;
                    var addOn = self.planAddOns[index];
                    if (self.addOn.allowAddOn && self.orderSummary.addOn == null && addOn) {
                        self.addOn.allowAddOn = false;
                        self.orderSummary.addOn = self.planAddOns[index];

                        self.updateSummary();

                        $('.addon-box').addClass('addon-box-disabled');
                    }
                },
                removeAddOn: function() {
                    var self = this;
                    $(self.addOn.modalRemove).modal('show');
                },
                alertAddOnRemove: function(remove = true) {
                    var self = this;
                    self.addOn.allowAddOn = true;
                    self.orderSummary.addOn = null;

                    self.updateSummary();

                    $('.addon-box').removeClass('addon-box-disabled');
                    $(self.addOn.modalRemove).modal('hide');
                },
                watchOTPLoginFields: function() {
                    var self = this;
                    var yesNumber = self.login.input.otp.yesNumber;
                    var password = self.login.input.otp.password;
                    if (yesNumber.length && password.length) {
                        self.login.submitButton.allowOtp = true;
                    } else {
                        self.login.submitButton.allowOtp = false;
                    }
                },
                watchBasicLoginFields: function() {
                    var self = this;
                    var yesNumber = self.login.input.basic.yesNumber;
                    var password = self.login.input.basic.password;
                    if (yesNumber.length && password.length) {
                        self.login.submitButton.allowBasic = true;
                    } else {
                        self.login.submitButton.allowBasic = false;
                    }
                },
                sendAnalytics: function(eventType) {
                    var self = this;
                    var pushData = [];
                    switch (eventType) {
                        case 'addToCart': 
                            pushData = [{
                                'name': self.orderSummary.plan.planName, 
                                'id': self.orderSummary.plan.mobilePlanId, 
                                'category': self.orderSummary.plan.planType, 
                                'price': self.orderSummary.plan.totalAmountWithoutSST
                            }];
                            break;
                        case 'checkout':
                            pushData = [{
                                'name': self.orderSummary.plan.planName, 
                                'id': self.orderSummary.plan.mobilePlanId, 
                                'category': self.orderSummary.plan.planType, 
                                'price': self.orderSummary.plan.totalAmountWithoutSST
                            }];

                            if (self.orderSummary.addOn) {
                                pushData.push({
                                    'name': self.orderSummary.addOn.addonName, 
                                    'id': 0, 
                                    'category': 'addOn', 
                                    'price': self.orderSummary.addOn.amount
                                });
                            }
                            break;
                        default: 
                            return;
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


<?php include('footer-no-newsletter.php'); ?>