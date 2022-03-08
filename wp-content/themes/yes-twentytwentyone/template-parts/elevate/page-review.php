<?php require_once 'includes/header.php' ?>
<style type="text/css">
    <?php require_once 'assets/css/mycart.css'?>
</style>

    <header class="white-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="mt-4">
                        <a href="#" class="back-btn "><img src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png" alt=""> Back</a>
                    </div>
                </div>
                <div class="col-lg-4 col-6 text-lg-center text-end">
                    <h1 class="title_checkout p-3">Check Out</h1>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </header>
    <main>

        <!-- Banner Start -->
        <section id="grey-innerbanner">
            <div class="container">
                <ul class="wizard">
                    <li ui-sref="firstStep" class="completed">
                        <span>1. Personal Details</span>
                    </li>
                    <li ui-sref="secondStep" class="completed">
                        <span>2. Yes Face ID</span>
                    </li>
                    <li ui-sref="thirdStep" class="completed">
                        <span>3. Review & Order</span>
                    </li>

                </ul>
            </div>
        </section>
        <!-- Banner End -->

        <section id="cart-body">
            <div class="container p-lg-5 p-3" style="border: 0">
                <div class="row gx-5">
                    <div class="col-lg-8 col-12">
                        <div class="border-box p-4">
                            <h2 class="subtitle">Order Details</h2>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="text-20">
                                        Your device plan -
                                    </div>
                                    <div class="text-bold text-23">
                                        Xiaomi 11T 5G NE 99 Yes Postpaid FT5G
                                    </div>
                                    <div class="text-20 mt-3">
                                        Your contract -
                                    </div>
                                    <div class="text-bold text-23">
                                        Normal 24 months
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <div class="subtitle text-end">
                                            RMxx.00/ mth
                                        </div>
                                    </div>
                                    <div class="mt-5 text-end">
                                        <a class="btn-pink-border">
                                            <i class="icon icon-signup"></i> Sign Contract
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-box mt-3 mb-5 p-4">
                            <div class="row">
                                <div class="col-8">
                                    <h2 class="subtitle">Customer Details</h2>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="#" class="btn-link"><i class="icon icon_edit"></i> Edit Detail</a>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="row mt-3 item_info">
                                        <div class="label">Name</div>
                                        <div class="content">JANE DOE</div>
                                    </div>
                                    <div class="row mt-3 item_info">
                                        <div class="label">Email</div>
                                        <div class="content">jan@gmail.com</div>
                                    </div>
                                    <div class="row mt-3 item_info">
                                        <div class="label">Delivery Address</div>
                                        <div class="content">205, Menara YTL, Jalan Bukit
                                            Bintang, Kuala Lumpur, 58000, Malaysia
                                        </div>
                                    </div>
                                    <div class="row mt-3 item_info">
                                        <div class="label">Billing Preferences</div>
                                        <div class="content">111, Menara YTL, Jalan Bukit
                                            Bintang, Kuala Lumpur, 58000, Malaysia
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mt-3 item_info">
                                        <div class="label">ID Number</div>
                                        <div class="content">9605674356</div>
                                    </div>
                                    <div class="row mt-3 item_info">
                                        <div class="label">Contact Number</div>
                                        <div class="content">0186664356</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="summary-box">
                            <h1 class="subtitle">Order summary</h1>
                            <h3 class="plan_price">Monthly Payment</h3>
                            <div class="hr_line"></div>
                            <div class="row cart_total">
                                <div class="col-6 pt-2 pb-2">
                                    <h3>TOTAL</h3>
                                </div>
                                <div class="col-6 pt-2 pb-2 text-end">
                                    <h3>RMxx.00/mth</h3>
                                </div>
                            </div>
                            <div class="monthly mb-4">
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <p>Xiaomi 11T 5G NE with Elevate 24 months</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p>RMxx.00/ mth</p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <p>Yes Postpaid FT5G</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p>RMxx.00/ mth</p>
                                    </div>
                                </div>
                                <div class="hr_line"></div>
                                <div class="row mt-2 cart_bold">
                                    <div class="col-6">
                                        <p>Upfront Payment</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p>*RMxx.00</p>
                                    </div>
                                </div>
                                <div class="hr_line"></div>
                                <div class="row mt-2 ">
                                    <div class="col-1">
                                        <input type="checkbox" id="subscribe" name="subscribe" value="1">
                                    </div>
                                    <div class="col-11 text-12">
                                        <p>I here by agree to subscribe to the plan selected in the online form
                                            submitted by me, and to be bound by the First to 5G Campaign Terms and
                                            Conditions available at <a target="_blank"
                                                                       href="https://www.yes.my/tnc/ongoing-campaigns-tnc">www.yes.my/tnc/ongoing-campaigns-tnc</a>.
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-1">
                                        <input type="checkbox" id="consent" name="consent" value="1">
                                    </div>
                                    <div class="col-11 text-12">
                                        <p>I further give consent to YTLC to process my personal data in accordance with
                                            the YTL Group Privacy Policy available at <a target="_blank"
                                                                                         href="https://www.ytl.com/privacypolicy.asp">www.ytl.com/privacypolicy.asp</a>.
                                        </p>
                                    </div>
                                </div>


                                <div class="row mt-3 ">
                                    <div class="col-12">
                                        <button class="btn-round-dark w-100" type="button">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
<?php require_once ('includes/footer.php');?>
<script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll("[data-bs-toggle=\"tooltip\"]"))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
