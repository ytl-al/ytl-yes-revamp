<div class="summary-box">
    <h1>{{ renderSummaryText('strSummaryTitle') }}</h1>
    <template v-if="orderSummary.due.priceBreakdown.simplified.length">
        <template v-for="item in orderSummary.due.priceBreakdown.simplified">
            <template v-if="item.parentFlag">
                <div class="row" v-if="item.displayOrder > 1">
                    <div class="col-7 pe-0 ">
                        <p class="large">{{ renderSummaryText('strAddOns') }}</p>
                    </div>
                    <div class="col-5 text-end">
                        <p class="large"><strong>RM{{ parseFloat(orderSummary.due.addOns).toFixed(2) }}</strong></p>
                    </div>
                </div>
                <div class="row" v-bind:class="{ 'mt-2': item.displayOrder > 1 }">
                    <div class="col-7 pe-0 py-2">
                        <p style="color: #00B4F0;">{{ item.priceDisplayName }}</p>
                    </div>
                    <div class="col-5 py-2 text-end">
                        <p class="large" style="color: #00B4F0;" v-if="deliveryInfo.securityType == '' || deliveryInfo.securityType == 'NRIC'"><strong>{{ item.malaysianPriceValue }}</strong></p>
                        <p class="large" style="color: #00B4F0;" v-if="deliveryInfo.securityType != '' && deliveryInfo.securityType != 'NRIC'"><strong>{{ item.nonMalaysianPriceValue }}</strong></p>
                    </div>
                </div>
            </template>
            <template v-else>
                <div class="row" v-if="!['Deposit for Foreigner', 'SST @6%', 'Rounding Adjustment'].includes(item.priceDisplayName)">
                    <div class="col-7 pe-0">
                        <p>{{ item.priceDisplayName }}</p>
                    </div>
                    <div class="col-5 text-end">
                        <p class="large" v-if="deliveryInfo.securityType == '' || deliveryInfo.securityType == 'NRIC'"><strong>{{ item.malaysianPriceValue.replace('(-1)', '(-1) ') }}</strong></p>
                        <p class="large" v-if="deliveryInfo.securityType != '' && deliveryInfo.securityType != 'NRIC'"><strong>{{ item.nonMalaysianPriceValue.replace('(-1)', '(-1) ') }}</strong></p>
                    </div>
                </div>
            </template>
        </template>
    </template>
    <template v-else>
        <!-- <h2>Due today after taxes and shipping</h2> -->
        <div class="row">
            <div class="col-7 py-2">
                <p style="color: #00B4F0;">{{ renderSummaryText('strTotal') }}</p>
            </div>
            <div class="col-5 py-2 text-end">
                <p class="large" style="color: #00B4F0;">RM{{ formatPrice(parseFloat(orderSummary.due.total).toFixed(2)) }}</p>
            </div>
        </div>
        <div v-if="orderSummary.plan.planType != 'prepaid'">
            <div class="monthly mb-4">
                <div class="row">
                    <div class="col-8">
                        <p>{{ renderSummaryText('strDueMonthly') }}</p>
                    </div>
                    <div class="col-4 text-end">
                        <p>RM{{ parseFloat(orderSummary.plan.monthlyCommitment).toFixed(2) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="orderSummary.plan.planType != 'prepaid'">
            <div class="col-12 mb-3">
                <p class="large">{{ orderSummary.plan.displayName }}</p>
            </div>
        </div>

        <template v-for="(price) in orderSummary.due.priceBreakdown.plan">
            <div class="row">
                <div class="col-8 pe-0">
                    <p>{{ price.name }}</p>
                </div>
                <div class="col-4 text-end">
                    <p class="large"><strong>RM{{ price.value }}</strong></p>
                </div>
            </div>
        </template>

        <div class="row mt-2" v-if="orderSummary.plan.hasDevice">
            <template v-for="(price, index) in orderSummary.due.priceBreakdown.device">
                <div class="col-8 pe-0">
                    <p>{{ price.name }}</p>
                </div>
                <div class="col-4 text-end">
                    <p class="large"><strong>RM{{ price.value }}</strong></p>
                </div>
            </template>
        </div>

        <div class="row mt-2">
            <div class="col-8">
                <p class="large">{{ renderSummaryText('strAddOns') }}</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.addOns).toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <p class="large">SST @6%</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.taxesSST).toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row" v-if="deliveryInfo.securityType == 'PASSPORT' && orderSummary.due.foreignerDeposit > 0">
            <div class="col-8">
                <p class="large">{{ renderSummaryText('strForeignerDeposit') }}</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.foreignerDeposit).toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row d-none">
            <div class="col-8">
                <p class="large">{{ renderSummaryText('strShipping') }}</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.shippingFees).toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 pe-0">
                <p class="large">{{ renderSummaryText('strRounding') }}</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.rounding).toFixed(2) }}</strong></p>
            </div>
        </div>
    </template>


    <template v-if="typeof paymentInfo != 'undefined' && typeof maybankIPP != 'undefined' && paymentInfo.paymentMethod == 'CREDIT_CARD_IPP' && maybankIPP.ippInstallmentSelected.duration && maybankIPP.ippInstallmentSelected.monthlyInstallment != ''">
        <div class="row">
            <div class="col-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-8 pe-0">
                <p class="large">{{ renderSummaryText('strPaymentDuration') }}</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.duration }} {{ renderSummaryText('strPaymentMonth') }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 pe-0">
                <p class="large">{{ renderSummaryText('strPaymentAdministration') }}</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ maybankIPP.ippInstallmentSelected.administrationPayment.toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 pe-0">
                <p class="large">{{ renderSummaryText('strPaymentEstimated') }}</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.monthlyInstallment.replace(' ', '') }} <sup>**</sup></strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <p class="text-danger"><sup>**</sup> {{ renderSummaryText('strPaymentNote') }}</p>
            </div>
        </div>
    </template>
</div>

<script type="text/javascript">
    var summaryText = {
        strSummaryTitle: { 'en-US': 'Order summary', 'ms-MY': 'Ringkasan pesanan', 'zh-hans': 'Order summary' },
        strTotal: { 'en-US': 'Total Payment', 'ms-MY': 'Jumlah Bayaran', 'zh-hans': 'Total Payment' },
        strDueMonthly: { 'en-US': 'Due Monthly', 'ms-MY': 'Perlu Dibayar Setiap Bulan', 'zh-hans': 'Due Monthly' },
        strAddOns: { 'en-US': 'Add-Ons', 'ms-MY': 'Tambahan', 'zh-hans': 'Add-Ons' },
        strForeignerDeposit: { 'en-US': 'Deposit for Foreigner', 'ms-MY': 'Deposit Warga Asing', 'zh-hans': 'Deposit for Foreigner' },
        strShipping: { 'en-US': 'Shipping', 'ms-MY': 'Penghantaran', 'zh-hans': 'Shipping' },
        strRounding: { 'en-US': 'Rounding Adjustment', 'ms-MY': 'Penyelarasan Pembundaran', 'zh-hans': 'Rounding Adjustment' },
        strPaymentDuration: { 'en-US': 'Payment Duration', 'ms-MY': 'Tempoh Bayaran', 'zh-hans': 'Payment Duration' },
        strPaymentMonth: { 'en-US': 'months', 'ms-MY': 'bulan', 'zh-hans': 'months' },
        strPaymentAdministration: { 'en-US': 'Administration Payment', 'ms-MY': 'Bayaran Pentadbiran', 'zh-hans': 'Administration Payment' },
        strPaymentEstimated: { 'en-US': 'Estimated Monthly Instalment', 'ms-MY': 'Anggaran Ansuran Bulanan', 'zh-hans': 'Estimated Monthly Instalment' },
        strPaymentNote: { 'en-US': 'The Monthly instalment payment amount generated is just an estimate. To confirm the exact amount, kindly get in touch with Maybank.', 'ms-MY': 'The Monthly instalment payment amount generated is just an estimate. To confirm the exact amount, kindly get in touch with Maybank.', 'zh-hans': 'The Monthly instalment payment amount generated is just an estimate. To confirm the exact amount, kindly get in touch with Maybank.' },
    };

    function renderSummaryText(strID) {
        return ywos.renderText(strID, summaryText);
    }
</script>