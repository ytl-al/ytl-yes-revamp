<?php include('header-ywos.php'); ?>

<style type="text/css">
    #cart-body .packagebox .visualbg .img-fluid {
        padding-left: 12px;
    }
</style>


<!-- Vue Wrapper STARTS -->
<div id="main-vue" style="display: none;">
    <!-- Banner Start -->
	<section id="grey-innerbanner">
		<div class="container">
			<ul class="wizard">
				<li ui-sref="firstStep" class="completed">
					<span>1. {{ renderText('strDelivery') }}</span>
				</li>
				<li ui-sref="secondStep" class="completed">
					<span>2. {{ renderText('strReview') }}</span>
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
                    <h1>{{ renderText('strReviewPay') }}</h1>
                </div>
            </div>
            <div class="row gx-5" v-if="pageValid">
                <div class="col-lg-4 col-12 order-lg-2">
                    <?php include('section-order-summary.php'); ?>
                </div>
                <div class="col-lg-8 col-12 order-lg-1 mt-3 mt-lg-0">
                    <h1 class="mb-4 d-none d-lg-block">{{ renderText('strReviewPay') }}</h1>
                    <div class="accordion" id="cart-accordion">
                        <div class="packagebox mb-3">
                            <div class="row">
                                <div class="col-lg-3 col-12 visualbg d-flex align-items-center" v-if="orderSummary.plan.planType == 'postpaid'">
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h3 class="price">RM{{ (orderSummary.plan.totalAmount % 1 != 0) ? parseFloat(orderSummary.plan.totalAmount).toFixed(2) : formatPrice(parseFloat(orderSummary.plan.totalAmount)) }}</h3>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#cart-accordion">
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
                                    <p class="bold mb-0" v-if="orderSummary.plan.bundleName">Device Bundle: <span class="fw-bold">{{ orderSummary.plan.bundleName }}</span></p>
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
                                    <div class="col-6 pb-1 border-bottom">
                                        <p>{{ renderText('summaryAddOns') }}</p>
                                        <p v-if="orderSummary.addOn != null">{{ orderSummary.addOn.displayAddonName }} <a href="javascript:void(0)" class="btn-sm pink-btn text-white mx-lg-3" v-on:click="removeAddOn()">Remove</a></p>
                                    </div>
                                    <div class="col-6 pb-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.addOns).toFixed(2) }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom">
                                        <p>{{ renderText('summaryTaxes') }}</p>
                                    </div>
                                    <div class="col-6 pb-1 pt-1 border-bottom text-end">
                                        <p>RM{{ parseFloat(orderSummary.due.taxesSST).toFixed(2) }}</p>
                                    </div>
                                    <div v-if="(ywos.lsData.meta.customerDetails.upFrontPayment=='!true')">
                                        <div class="col-6 pb-1 pt-1 border-bottom" v-if="orderSummary.due.foreignerDeposit > 0">
                                            <p>{{ renderText('summaryForeignerDeposit') }}</p>
                                        </div>
                                        <div class="col-6 pb-1 pt-1 border-bottom text-end" v-if="orderSummary.due.foreignerDeposit > 0">
                                            <p>RM{{ parseFloat(orderSummary.due.foreignerDeposit).toFixed(2) }}</p>
                                        </div>
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
                                        <p>RM{{ parseFloat(orderSummary.due.rounding).toFixed(2) }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="fw-bold">{{ renderText('summaryTotalDue') }}</p>
                                        <p class="small d-none">{{ renderText('summaryNotInvoice') }}</p>
                                    </div>
                                    <div class="col-6 text-end" v-if="(ywos.lsData.meta.customerDetails.upFrontPayment=='true')">
                                        <p class="large">RM{{ formatPrice(parseFloat((orderSummary.due.total)-(orderSummary.due.foreignerDeposit)).toFixed(2)) }}</p>
                                    </div>
                                    <div class="col-6 text-end" v-else>
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
                    <div class="row mb-4">
                        <div class="col-3 text-end order-2">
                            <a href="javascript:void(0)" class="grey-link" style="text-decoration: none;" v-on:click="history.back()">(<u>Edit</u>)</a>
                        </div>
                        <div class="col-9 order-1">
                            <p class="mb-3"><strong>{{ renderText('strTo') }}: {{ deliveryInfo.name }}</strong><br> {{ deliveryInfo.email }}<br> +60 {{ slicedMobileNumber }}</p>
                            <p><strong>{{ renderText('strShippingAddress') }}</strong><br> {{ deliveryInfo.sanitize.address }} <br /><template v-if="deliveryInfo.sanitize.addressMore">{{ deliveryInfo.sanitize.addressMore }} <br /></template>{{ deliveryInfo.postcode }}, {{ deliveryInfo.sanitize.city }} <br />{{ deliveryInfo.sanitize.state }} <br /> {{ deliveryInfo.sanitize.country }}</p>
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <div class="col-9">
                            <p><strong>Billing Address</strong><br> 111, Menara YTL, Jalan Bukit<br> Bintang, Kuala Lumpur, 58000,<br> Malaysia</p>
                        </div>
                        <div class="col-3 text-end">
                            <a href="#" class="grey-link">(Edit)</a>
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <div class="col-9">
                            <p><strong>Cardholder: Jane Doe</strong><br> Card Type: Visa that ends in ****4567</p>
                        </div>
                        <div class="col-3 text-end">
                            <a href="#" class="grey-link">(Edit)</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" v-model="agree.terms" id="checkbox-terms" @change="watchSubmit" />
                                <label class="form-check-label" for="checkbox-terms" v-html="renderText('strAgreeTerms')"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" v-model="agree.privacy" id="checkbox-privacy" @change="watchSubmit" />
                                <label class="form-check-label" for="checkbox-privacy" v-html="renderText('strAgreePrivacy')"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-12">
                            <button class="pink-btn d-block w-100" type="submit" v-on:click="validateReview" :disabled="!allowSubmit">{{ renderText('strBtnPayNow') }}</button>
                            <!-- <a href="checkout-payment.html" class="pink-btn d-block w-100">Pay Now</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Body ENDS -->
</div>
<!-- Vue Wrapper ENDS -->

<script type="text/javascript">
    $(document).ready(function() {
        toggleOverlay();

        var pageDelivery = new Vue({
            el: '#main-vue',
            data: {
                currentStep: 4,
                simType: '',
                upFrontPayment: 'fasle',
                eSimSupportPlan: '',
                pageValid: false,
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
                dealer: {},
                packageInfos: [],
                slicedMobileNumber: '',
                agree: {
                    terms: false,
                    privacy: false
                },
                allowSubmit: false,

                apiLocale: 'EN',
                pageText: {
                    strVerification: {
                        'en-US': 'Verification',
                        'ms-MY': 'Pengesahan',
                        'zh-hans': 'Verification'
                    },
                    strSelectSimType: {
                        'en-US': 'Select Sim Type',
                        'ms-MY': 'Select Sim Type',
                        'zh-hans': 'Select Sim Type'
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

                    strReviewPay: {
                        'en-US': 'Review & Pay',
                        'ms-MY': 'Semak & Bayar',
                        'zh-hans': 'Review & Pay'
                    },

                    summaryMoreBenefits: {
                        'en-US': 'More Benefits',
                        'ms-MY': 'Lebih Manfaat',
                        'zh-hans': 'More Benefits'
                    },
                    summaryOneTimeCharges: {
                        'en-US': 'Total Payable Now',
                        'ms-MY': 'Jumlah Perlu Dibayar Sekarang',
                        'zh-hans': 'Total Payable Now'
                    },
                    summaryRatePlan: {
                        'en-US': 'Rate plan',
                        'ms-MY': 'Kadar pelan',
                        'zh-hans': 'Rate plan'
                    },
                    summaryAddOns: {
                        'en-US': 'Add-Ons',
                        'ms-MY': 'Tambahan',
                        'zh-hans': 'Add-Ons'
                    },
                    summaryTaxes: {
                        'en-US': 'SST @6%',
                        'ms-MY': 'SST @6%',
                        'zh-hans': 'SST @6%'
                    },
                    summaryForeignerDeposit: {
                        'en-US': 'Deposit for Foreigner',
                        'ms-MY': 'Deposit Warga Asing',
                        'zh-hans': 'Deposit for Foreigner'
                    },
                    summaryShipping: {
                        'en-US': 'Delivery Fee',
                        'ms-MY': 'Caj Penghantaran',
                        'zh-hans': 'Delivery Fee'
                    },
                    summaryRounding: {
                        'en-US': 'Rounding Adjustment',
                        'ms-MY': 'Penyelarasan Pembundaran',
                        'zh-hans': 'Rounding Adjustment'
                    },
                    summaryTotalDue: {
                        'en-US': 'Total charges due now',
                        'ms-MY': 'Jumlah perlu dibayar sekarang',
                        'zh-hans': 'Total charges due now'
                    },
                    summaryNotInvoice: {
                        'en-US': 'This summary is not an invoice',
                        'ms-MY': 'Ringkasan ini bukanlah invois',
                        'zh-hans': 'This summary is not an invoice'
                    },
                    summaryMonthlyCharges: {
                        'en-US': 'Monthly Charges',
                        'ms-MY': 'Caj Bulanan',
                        'zh-hans': 'Monthly Charges'
                    },
                    summarySupplimentaryBundleLines: {
                        'en-US': 'Supplementary Bundled Lines',
                        'ms-MY': 'Talian Tambahan Bundle',
                        'zh-hans': 'Supplementary Bundled Lines'
                    },
                    summaryTotalMonthly: {
                        'en-US': 'Total monthly charges',
                        'ms-MY': 'Jumlah caj bulanan',
                        'zh-hans': 'Total monthly charges'
                    },

                    strTo: {
                        'en-US': 'To',
                        'ms-MY': 'Ke',
                        'zh-hans': 'To'
                    },
                    strShippingAddress: {
                        'en-US': 'Shipping Address',
                        'ms-MY': 'Alamat Penghantaran',
                        'zh-hans': 'Shipping Address'
                    },
                    strAgreeTerms: {
                        'en-US': 'I hereby agree to subscribe to the Postpaid/Prepaid Service Plan selected in the online form submitted by me, and to be bound by the terms and conditions available at <a href="/tnc/general-tnc" target="_blank">www.yes.my/tnc/general-tnc</a>.',
                        'ms-MY': 'Saya dengan ini bersetuju untuk melanggan pilihan Pelan Perkhidmatan Pascabayar/Prabayar dalam borang dalam talian yang saya hantar, dan akan terikat dengan terma dan syarat terkandung di <a href="/ms/tnc/general-tnc" target="_blank">www.yes.my/tnc/general-tnc</a>.',
                        'zh-hans': 'I hereby agree to subscribe to the Postpaid/Prepaid Service Plan selected in the online form submitted by me, and to be bound by the terms and conditions available at <a href="/zh-hans/tnc/general-tnc" target="_blank">www.yes.my/tnc/general-tnc</a>.'
                    },
                    strAgreePrivacy: {
                        'en-US': 'I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a>.',
                        'ms-MY': 'Saya selanjutnya memberi kebenaran kepada YTLC untuk memproses data peribadi saya mengikut Polisi Privasi Kumpulan YTL yang terkandung di <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a>.',
                        'zh-hans': 'I further give consent to YTLC to process my personal data in accordance with the YTL Group Privacy Policy available at <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">https://www.ytl.com/privacypolicy.asp</a>.'
                    },

                    strBtnPayNow: {
                        'en-US': 'Next',
                        'ms-MY': 'Next',
                        'zh-hans': 'Next'
                    }
                },
                curURL: "<?php echo get_site_url(); ?>"
            },
            mounted: function() {},
            created: function() {
                var self = this;
                setTimeout(function() {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function() {
                    var self = this;
                    if (ywos.validateSession(self.currentStep)) {
                        self.pageValid = true;
                        self.updateData();
                        self.apiLocale = (ywos.lsData.siteLang == 'ms-MY') ? 'MY' : 'EN';
                        self.upFrontPayment = ywos.lsData.meta.customerDetails.upFrontPayment;
                        self.simType = ywos.lsData.meta.esim;
                        self.eSimSupportPlan = ywos.lsData.meta.orderSummary.plan.eSim;

                        toggleOverlay(false);
                    } else {
                        ywos.redirectToPage('cart');
                    }
                },
                updateData: function() {
                    var self = this;
                    self.orderSummary = ywos.lsData.meta.orderSummary;
                    self.deliveryInfo = ywos.lsData.meta.deliveryInfo;
                    self.dealer = ywos.lsData.meta.dealer;
                    self.slicedMobileNumber = self.deliveryInfo.mobileNumber.slice(1);
                    self.agree = (ywos.lsData.meta.agree) ? ywos.lsData.meta.agree : self.agree;
                    self.watchSubmit();

                    if (self.orderSummary.plan.notes) {
                        var arrNotes = self.orderSummary.plan.notes.split(',');
                        self.packageInfos = arrNotes.sort(function(a, b) {
                            return a.length - b.length;
                        });
                    }
                },
                ajaxCreateStagingYOSOrder: function() {
                    var self = this;
                    var deliveryInfo = self.deliveryInfo;
                    var orderSummary = self.orderSummary;
                    var dealer = self.dealer;
                    var params = {
                        'mobileNumber'  : '0' + deliveryInfo.mobileNumber,
                        'fullName'      : deliveryInfo.name,
                        'dob'           : deliveryInfo.dob,
                        'gender'        : deliveryInfo.gender,
                        'email'         : deliveryInfo.email,
                        'planName'      : orderSummary.plan.planName,
                        'planType'      : orderSummary.plan.planType,
                        'securityType'  : deliveryInfo.securityType,
                        'securityId'    : deliveryInfo.securityId,
                        'dealerCode'    : dealer.dealer_code,
                        'dealerLoginId' : dealer.dealer_id,
                        'bundleMapId'   : orderSummary.plan.mobilePlanId,
                        'referralCode'  : deliveryInfo.referralCode,
                        'addonName'     : (deliveryInfo.addOn && deliveryInfo.addOn.addonName) ? deliveryInfo.addOn.addonName : '',
                        'esim'          : self.simType,
                        'emailPaymentUrl': self.curURL + '/ywos/roving-customer-review/?orderId=$$PARAM$$',
                        'addressLine1'  : deliveryInfo.address,
                        'addressLine2'  : deliveryInfo.addressMore,
                        'city'          : deliveryInfo.city,
                        'cityCode'      : deliveryInfo.cityCode,
                        'postalCode'    : deliveryInfo.postcode,
                        'state'         : deliveryInfo.state,
                        'stateCode'     : deliveryInfo.stateCode,
                        'country'       : deliveryInfo.country,
                        'locale'        : self.apiLocale,
                        'source'        : 'YOS'
                    };
                    console.log(params);
                    
                    // axios.post()
                },
                validateReview: function() {
                    var self = this;
                    toggleOverlay();

                    ywos.lsData.meta.completedStep = self.currentStep;
                    ywos.lsData.meta.agree = self.agree;
                    ywos.updateYWOSLSData();
                    
                    self.ajaxCreateStagingYOSOrder();
                    // ywos.redirectToPage('thank-you');
                },
                watchSubmit: function() {
                    var self = this;
                    var isValid = true;
                    if (!self.agree.terms || !self.agree.privacy) {
                        isValid = false;
                    }
                    if (isValid) {
                        self.allowSubmit = true;
                    } else {
                        self.allowSubmit = false;
                    }
                },
                renderText: function(strID) {
                    return ywos.renderText(strID, this.pageText);
                }
            }
        });
    });
</script>


<?php include('footer-ywos.php'); ?>