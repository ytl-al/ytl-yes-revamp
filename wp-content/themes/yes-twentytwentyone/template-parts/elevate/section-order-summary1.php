<div class="summary-box">
    <h1 class="subtitle">{{ renderText('order_summary') }}</h1>
    <div class="">
        <div class="hr_line"></div>
        <div class="row cart_total">
            <div class="col-5 pt-2 pb-2">
                <h3>{{ renderText('due_today') }}</h3>
            </div>
            <div class="col-7 pt-2 pb-2 text-end">
                <h3>RM{{ formatPrice(parseFloat(orderSummary.orderDetail.total).toFixed(2)) }}</h3>
            </div>
        </div>
        <div class="monthly mb-4" style="border-bottom:0!important;">
            <div v-for="(item, index) in orderSummary.orderDetail.orderItems" class="row mt-2">
                <div class="col-6">
                    <p>{{item.name}}</p>
                </div>
                <div class="col-6 text-end">
                    <p>RM{{item.price}}</p>
                </div>
            </div>
			 <div class="row mt-2 cart_bold">
                <div class="col-6">
                    <p>{{ renderText('tax_rounding') }}</p>
                </div>
                <div class="col-6 text-end">
                    <p>RM{{ formatPrice((parseFloat(orderSummary.orderDetail.sstAmount) + parseFloat(orderSummary.orderDetail.roundingAdjustment)).toFixed(2)) }}</p>
                </div>
            </div>
            <div class="hr_line"></div>
            <div class="row mt-2 cart_bold">
                <div class="col-6">
                    <p>{{ renderText('monthly_charges') }}</p>
                </div>
                <div class="col-6 text-end">
                    <p>RM{{ formatPrice(parseFloat(orderSummary.product.selected.plan.upFrontPayment).toFixed(2)) }}*</p>
                </div>
            </div>
			 <div class="hr_line"></div>
			<div class="mt-2 note" style="font-size:12px; color:#999;">
                {{ renderText('price_uncludsive_of_sales') }}
			</div>
    </div>
    </div>


    <template v-if="typeof paymentInfo != 'undefined' && typeof maybankIPP != 'undefined' && paymentInfo.paymentMethod == 'CREDIT_CARD_IPP' && maybankIPP.ippInstallmentSelected.duration && maybankIPP.ippInstallmentSelected.monthlyInstallment != ''">
        <div class="row">
            <div class="col-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-6"><p class="large">{{ renderText('payment_duration') }}</p></div>
            <div class="col-6 text-end"><p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.duration }} months</strong></p></div>
        </div>
        <div class="row">
            <div class="col-6"><p class="large">{{ renderText('administration_payment') }}</p></div>
            <div class="col-6 text-end"><p class="large"><strong>RM{{ maybankIPP.ippInstallmentSelected.administrationPayment.toFixed(2) }}</strong></p></div>
        </div>
        <div class="row">
            <div class="col-6"><p class="large">{{ renderText('payment_duration') }}</p></div>
            <div class="col-6 text-end"><p class="large"><strong>{{ maybankIPP.ippInstallmentSelected.monthlyInstallment.replace(' ', '') }} <sup>**</sup></strong></p></div>
        </div>
        <div class="row">
            <div class="col-12 mt-3"><p class="text-danger"><sup>**</sup> {{ renderText('payment_note') }}</p></div>
        </div>
    </template>
</div>