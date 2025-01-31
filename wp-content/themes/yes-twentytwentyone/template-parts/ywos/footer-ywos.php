</main>
<?php get_footer('ywos'); ?>

<script type="text/javascript">
    var layoutText = {
        titleCheckout: { 'en-US': 'Check Out', 'ms-MY': 'Pembayaran', 'zh-hans': 'Check Out' },

        strBackTo: { 'en-US': 'Back to', 'ms-MY': 'Kembali ke', 'zh-hans': 'Back to' }, 
        pageTitleCart: { 'en-US': 'Cart', 'ms-MY': 'Kart', 'zh-hans': 'Cart' }, 
        pageTitleVerification: { 'en-US': 'Verification', 'ms-MY': 'Pengesahan', 'zh-hans': 'Verification' }, 
        pageTitleSelectSimType:{ 'en-US': 'Select Sim Type', 'ms-MY': 'Select Sim Type', 'zh-hans': 'Select Sim Type' }, 
        pageTitleDeliveryDetails: { 'en-US': 'Delivery Details', 'ms-MY': 'Butiran Penghantaran', 'zh-hans': 'Delivery Details' }, 
        pageTitleBillingDetails: { 'en-US': 'Billing Details', 'ms-MY': 'Billing Penghantaran', 'zh-hans': 'Billing Details' }, 
        pageTitleEligibilityFailure: { 'en-US': 'Upfront Payment', 'ms-MY': 'Upfront Payment', 'zh-hans': 'Upfront Payment' }, 
        pageTitleReview: { 'en-US': 'Review', 'ms-MY': 'Semak', 'zh-hans': 'Review' }, 

        footerNeedHelp: { 'en-US': 'Need help? See <a href="/faq">Help Pages</a> or <a href="mailto:yescare@yes.my">Contact Us</a>', 'ms-MY': 'Perlukan bantuan? Lihat <a href="/faq">Help Pages</a> atau <a href="mailto:yescare@yes.my">Hubungi Kami</a>', 'zh-hans': 'Need help? See <a href="/faq">Help Pages</a> or <a href="mailto:yescare@yes.my">Contact Us</a>' }
    };
    $(document).ready(function() {
        $('#heading-titleCheckout').html(getLayoutTranslation('titleCheckout', layoutText));
        $('#span-strBackTo').html(getLayoutTranslation('strBackTo', layoutText));

        var backPageID = "<?php if(isset($back_page_id)) echo $back_page_id; ?>";
        // console.log(backPageID);
        var backPageStrID = '';
        switch (backPageID) {
            case 'cart':
                backPageStrID = 'pageTitleCart';
                break;
            case 'verification':
                if (ywosLSData.meta.customerDetails.upFrontPayment == "true") {
                    backPageStrID = 'pageTitleEligibilityFailure';
                    break;
                } else {
                    backPageStrID = 'pageTitleVerification';
                    break;
                }
            case 'sim type':
                if (ywosLSData.meta.orderSummary.plan.eSim != true) {
                    backPageStrID = 'pageTitleVerification';
                    break;
                } else {
                    backPageStrID = 'pageTitleSelectSimType';
                    break;
                }
            case 'delivery':
                if (ywosLSData.meta.esim == 'true') {
                    backPageStrID = 'pageTitleBillingDetails';
                    break;
                } else {
                    backPageStrID = 'pageTitleDeliveryDetails';
                    break;
                }
            case 'review':
                backPageStrID = 'pageTitleReview';
                break;
            case 'roving-delivery':
                backPageStrID = 'pageTitleDeliveryDetails';
                break;
            default:
                backPageStrID = 'pageTitleCart';
        }
        $('#span-pageTitle').html(getLayoutTranslation(backPageStrID, layoutText));

        $('#panel-footerNeedHelp').html(getLayoutTranslation('footerNeedHelp', layoutText));

        if (backPageID == 'review') {
            if (ywosLSData.trxType && ywosLSData.trxType == 'roving') {
                $('a.back-btn').attr('href', 'javascript:void(0)');
                $('a.back-btn').on('click', function() {
                    history.back();
                });
            }
        }


        function getLayoutTranslation(strID, objText) {
            var siteLang = (ywosLSData && ywosLSData.siteLang) ? ywosLSData.siteLang : 'en-US';
            if (siteLang && layoutText) {
                if (layoutText[strID] && layoutText[strID][siteLang]) {
                    return layoutText[strID][siteLang];
                }
            }
            return;
        }
    });
</script>