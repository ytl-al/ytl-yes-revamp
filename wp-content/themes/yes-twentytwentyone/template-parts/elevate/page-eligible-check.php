<?php require_once ('includes/header.php')?>

<header class="white-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="mt-4">
                    <a href="/elevate/cart/" class="back-btn "><img src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png" alt=""> Back</a>
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
        <section id="cart-body">
            <div class="container" style="border: 0">

                <div class="border-box p-lg-5">

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