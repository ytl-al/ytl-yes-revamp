<?php require_once('includes/header.php') ?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back to Homepage</a>
                </div>
            </div>
            <div class="col-lg-4 col-6 text-lg-center text-end">
                <h1 class="title_checkout p-3"></h1>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</header>
<main class="clearfix site-main">

    <section id="cart-body">
        <div class="container" style="border: 0">
            <div id="main-vue">
            <div class="border-box thanks_bg p-lg-5">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-12 offset-md-6 thank-mb">
                        <h1 class="title">Thank you!</h1>
                        <!--div class="mt-5">Order Number</div>
                        <div class="subtitle"><?php //echo $_GET['orderNumber']?></div>
                        <div class="text-12 mt-2">Placed on <?php echo date("l, jS F Y")?></div-->
                        <div class="mt-5">Thank you for your interest. We will get in touch with you by 6th June on your application.</div>
                    </div>
                </div>
                <div style="height: 300px" class="d-none d-md-block"></div>

            </div>
            </div>
        </div>
    </section>

</main>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                qrcode: null,
                contract:{},
                contract_signed:"",
                eligibility: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                deliveryInfo: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    addressMore: '',
                    addressLine: '',
                    postcode: '',
                    state: '',
                    stateCode: '',
                    city: '',
                    cityCode: '',
                    country: '',
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
                orderSummary: {
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems: []
                    },
                    orderInfo:{}
                },
                currentStep: 0,
                allowSubmit: false
            },

            created: function () {
                var self = this;
                setTimeout(function () {
                    self.pageInit();
                }, 500);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    if (elevate.validateSession(self.currentStep)) {

                        if (elevate.lsData.orderInfo) {
                            self.orderSummary.orderInfo = elevate.lsData.orderInfo;
                        }

                        //console.log(self.orderSummary.orderInfo);
                        elevate.removeElevateLSData();

                    } else {
                        //elevate.redirectToPage('cart');
                    }
                }
            }
        });
    });
</script>