<?php require_once('includes/header.php') ?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back</a>
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
<main class="clearfix site-main">

    <!-- Banner Start -->
    <section id="grey-innerbanner">
        <div class="container">
            <section id="grey-innerbanner">
                <div class="container">
                    <ul class="wizard">
                        <li ui-sref="firstStep" class="completed">
                            <span>1. Eligibility check</span>
                        </li>
                        <li ui-sref="secondStep">
                            <span>2. MyKAD verification</span>
                        </li>
                        <li ui-sref="thirdStep">
                            <span>3. Delivery details</span>
                        </li>
                        <li ui-sref="fourthStep">
                            <span>4. Review and order</span>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </section>
    <!-- Banner End -->

    <section id="cart-body">
        <div class="container" style="border: 0">

            <div class="verify-body p-lg-5">
                <div class="mt-5 mb-5">
                    <h1 class="title mt-3 mb-3">Eligibility check unsuccessful</h1>
                    <?php if($_GET['ca']=='failure'):?>
                        <p>Unfortunately, we could not confirm your eligibility for the Yes Infinite+ plan online. Please either retry in an hour or proceed to our <a target="_blank" href="https://www.yes.my/support/store-locator/">Yes Stores</a> for further assistance.</p>
                    <?php else:?>
                        <p>Unfortunately, we could not verify your identity online.<br> Please either retry and ensure that you are following the ekyc steps or proceed to our <a target="_blank" href="https://www.yes.my/support/store-locator/">Yes Stores</a> for further assistance.</p>
                    <?php endif;?>
                </div>
                <div class="mt-5 mb-5 text-center">
                    <a href="/elevate/eligibilitycheck" class="btn-black w130" style="margin-right:10px;">Retry</a>
                    <a href="https://www.yes.my/support/store-locator/" target="_blank" class="btn-black w180">Yes Store Locations</a>
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