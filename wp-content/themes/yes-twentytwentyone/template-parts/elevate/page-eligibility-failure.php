<?php require_once('includes/header.php') ?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back to Cart</a>
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
<main>
    <section id="cart-body">
        <div class="container" style="border: 0">

            <div class="border-box p-lg-5">
                <div class="text-center">
                    <h2 class="subtitle">You’re not eligible, but here’s what we can offer you!</h2>
                    <p style="max-width: 750px; margin: auto">
                        You are currently not elligible for our current plan with Elevate, however we’ve picked out some
                        amanzing plans more suited to your needs!
                    </p>
                </div>
                <div class="tabs_content mt-5">
                    <div class="plan_tabs">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Postpaid</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Prepaid</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="plan-item p-3">
                                    <div class="subtitle">Kasi Up<br>Postpaid 30</div>
                                    <ul class="plan-list mt-3 mb-3">
                                        <li>20GB for RM30</li>
                                        <li>Unlimited refferals and earnings</li>
                                        <li>Free YES Altitude phone</li>
                                    </ul>
                                    <div class="plan_price">RM30.00 /month</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="plan-item p-3">
                                    <div class="subtitle">Merdeka Device<br> Bundle</div>
                                    <ul class="plan-list mt-3 mb-3">
                                        <li>Free YES Altitude phone</li>
                                        <li>Unlimited refferals and earnings</li>
                                        <li>Unlimited Borak</li>
                                    </ul>
                                    <div class="plan_price">RM49.00 /month</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="plan-item p-3">
                                    <div class="subtitle">Kasi Up<br> Postpaid 49</div>
                                    <ul class="plan-list mt-3 mb-3">
                                        <li>Unlimited data for RM30</li>
                                        <li>Unlimited refferals and earnings</li>
                                        <li>Unlimited Borak</li>
                                    </ul>
                                    <div class="plan_price">RM49.00 /month</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 text-end">
                        <a href="/5gplans/" class="btn-cancel text-uppercase mr-2">Cancel</a> <a
                                class="pink-btn text-uppercase">choose plan</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll("[data-bs-toggle=\"tooltip\"]"))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>