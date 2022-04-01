<div class="summary-box">
    <h1 class="subtitle">Order summary</h1>
    <h3 class="plan_price">Monthly Payment</h3>
    <div class="row">
        <div class="hr_line"></div>
        <div class="row cart_total">
            <div class="col-6 pt-2 pb-2">
                <h3>TOTAL</h3>
            </div>
            <div class="col-6 pt-2 pb-2 text-end">
                <h3>RM{{ formatPrice(parseFloat(orderSummary.orderDetail.total).toFixed(2)) }}/mth</h3>
            </div>
        </div>
        <div class="row monthly mb-4">
            <div v-for="(item, index) in orderSummary.orderDetail.orderItems" class="row mt-2">
                <div class="col-6">
                    <p>{{item.name}}</p>
                </div>
                <div class="col-6 text-end">
                    <p>RM{{item.price}}/ mth</p>
                </div>
            </div>
            <div class="hr_line"></div>
            <div class="row mt-2 cart_bold">
                <div class="col-6">
                    <p>Upfront Payment</p>
                </div>
                <div class="col-6 text-end">
                    <p>*RM{{ formatPrice(parseFloat(orderSummary.product.selected.upFrontPayment).toFixed(2)) }}</p>
                </div>
            </div>
            <div class="row mt-2 cart_bold">
                <div class="col-6">
                    <p>Taxes (SST)</p>
                </div>
                <div class="col-6 text-end">
                    <p>*RM{{ formatPrice(parseFloat(orderSummary.orderDetail.sstAmount).toFixed(2)) }}</p>
                </div>
            </div>
            <div class="hr_line"></div>
    </div>
    </div>


    <template v-if="typeof paymentInfo != 'undefined' && typeof maybankIPP != 'undefined' && paymentInfo.paymentMethod == 'CREDIT_CARD_IPP' && maybankIPP.ippInstallmentSelected.duration && maybankIPP.ippInstallmentSelected.monthlyInstallment != ''">
        <div class="row">
            <div class="col-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-6"><p class="large">Payment Duration</p></div>
            <div class="col-6 text-end"><p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.duration }} months</strong></p></div>
        </div>
        <div class="row">
            <div class="col-6"><p class="large">Administration Payment</p></div>
            <div class="col-6 text-end"><p class="large"><strong>RM{{ maybankIPP.ippInstallmentSelected.administrationPayment.toFixed(2) }}</strong></p></div>
        </div>
        <div class="row">
            <div class="col-6"><p class="large">Payment Duration</p></div>
            <div class="col-6 text-end"><p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.monthlyInstallment.replace(' ', '') }} <sup>**</sup></strong></p></div>
        </div>
        <div class="row">
            <div class="col-12 mt-3"><p class="text-danger"><sup>**</sup> The Monthly Instalment payment amount generated is just an estimate. To confirm the exact amount. Kindly get in touch with Maybank.</p></div>
        </div>
    </template>
</div>