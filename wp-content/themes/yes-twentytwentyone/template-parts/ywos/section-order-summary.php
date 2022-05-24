<div class="summary-box">
    <h1>Order summary</h1>
    <template v-if="orderSummary.due.priceBreakdown.simplified.length">
        <template v-for="item in orderSummary.due.priceBreakdown.simplified">
            <template v-if="item.parentFlag">
                <div class="row" v-if="item.displayOrder > 1">
                    <div class="col-7 pe-0 ">
                        <p class="large">Add-Ons</p>
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
                <p style="color: #00B4F0;">Total Payment</p>
            </div>
            <div class="col-5 py-2 text-end">
                <p class="large" style="color: #00B4F0;">RM{{ formatPrice(parseFloat(orderSummary.due.total).toFixed(2)) }}</p>
            </div>
        </div>
        <div v-if="orderSummary.plan.planType != 'prepaid'">
            <div class="monthly mb-4">
                <div class="row">
                    <div class="col-8">
                        <p>Due Monthly</p>
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
                <p class="large">Add-Ons</p>
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
                <p class="large">Deposit for Foreigner</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.foreignerDeposit).toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row d-none">
            <div class="col-8">
                <p class="large">Shipping</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ parseFloat(orderSummary.due.shippingFees).toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 pe-0">
                <p class="large">Rounding Adjustment</p>
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
                <p class="large">Payment Duration</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.duration }} months</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 pe-0">
                <p class="large">Administration Payment</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>RM{{ maybankIPP.ippInstallmentSelected.administrationPayment.toFixed(2) }}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 pe-0">
                <p class="large">Estimated Monthly Instalment</p>
            </div>
            <div class="col-4 text-end">
                <p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.monthlyInstallment.replace(' ', '') }} <sup>**</sup></strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <p class="text-danger"><sup>**</sup> The Monthly instalment payment amount generated is just an estimate. To confirm the exact amount, kindly get in touch with Maybank.</p>
            </div>
        </div>
    </template>
</div>