<?php require_once ('includes/header.php')?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png" alt="">  Back to Cart</a>
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

                <div class="border-box">
                    <div class="row">
                        <div class="col-md-5 p-5 flex-column bg-checkout2">
                            <div class="title text-white checkout-left2">
                                You’re not elligible for Yes Elevate, but here’s the next best thing!
                            </div>
                        </div>
                        <div class="col-md-7  p-5">
                            <div class="flex-container mt-5">
                                <div>
                            <div class="subtitle2">
                                Normal Contract 24 months
                            </div>
                            <p>You can with our Normal 24 months contract option. </p>
                            <ul class="mt-3 mb-3 list-1">
                                <li>250GB 4G Data </li>
                                <li>FREE Unlimited 5G Data* until 31st March 2022</li>
                                <li>Unlimited calls to ALL networks</li>
                                <li>Unlimited SMS to YES networks</li>
                                <li>Pay-as-you-use  SMS to other networks</li>
                                <li>24 months contract </li>
                                <li>Upfront payment</li>
                            </ul>
                            <p>
                                You will be redirected to another check out page for payment.
                            </p>
                            <p>Would you like to proceed?</p>
                            <div class="p-3">
                                 <a class="pink-btn text-uppercase  mr-2">choose plan</a> <a href="/5gplans/" class="btn-cancel text-uppercase">Cancel</a>
                            </div>
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