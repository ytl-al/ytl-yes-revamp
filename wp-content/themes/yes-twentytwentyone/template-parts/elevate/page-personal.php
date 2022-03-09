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

        <!-- Banner Start -->
        <section id="grey-innerbanner">
            <div class="container">
                <ul class="wizard">
                    <li ui-sref="firstStep" class="completed">
                        <span>1. Personal Details</span>
                    </li>
                    <li ui-sref="secondStep">
                        <span>2. Yes Face ID</span>
                    </li>
                    <li ui-sref="thirdStep">
                        <span>3. Review & Order</span>
                    </li>

                </ul>
            </div>
        </section>
        <!-- Banner End -->

        <section id="cart-body">
            <div class="container p-lg-5 p-3">
                <div class="row gx-5">
                    <form class="col-lg-8 col-12 needs-validation" novalidate>
                        <div>
                            <h2 class="subtitle">Personal Details</h2>
                            <p class="sub mb-4">Delivery only available in Malaysia.<br>
                                Ensure all information is correct before proceeding.</p>

                            <div class="text-bold">ID Verification</div>
                            <div class="row mb-4 mt-3">
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">* MyKad number</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="mykad_number" placeholder=""
                                               required>
                                        <a href="#" class="ms-2" data-bs-toggle="tooltip" data-bs-placement="right"
                                           data-bs-html="true"
                                           title="<div class='box'><div><i></i></div><div><div class='text-bold'></div>Your full name must match your MyKad for verification purposes for successfull SIM card activation. </div></div>"><img
                                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/info-icon.png"/></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">* Full Name (as per MyKad)</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="full_name" placeholder="" required>
                                        <a href="#" class="ms-2" data-bs-toggle="tooltip" data-bs-placement="right"
                                           data-bs-html="true"
                                           title="<div class='box'><div><i></i></div><div><div class='text-bold'></div>Your full name must match your MyKad for verification purposes for successfull SIM card activation. </div></div>"><img
                                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/info-icon.png"/></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 align-items-center g-2">
                                <div class="col-12">
                                    <label class="form-label">*Phone number</label>
                                </div>
                                <div class="col-lg-2 col-5">
                                    <input type="text" class="form-control text-center" id="ic_passport_number"
                                           placeholder="MY +60" readonly>
                                </div>
                                <div class="col-lg-4 col-7">
                                    <input type="text" class="form-control" id="ic_passport_number"
                                           placeholder="Phone number">
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">* Email address</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="email"
                                               placeholder="jane.doe@gmail.com" required>
                                        <a href="#" class="ms-2" data-bs-toggle="tooltip" data-bs-placement="right"
                                           data-bs-html="true"
                                           title="<div class='box'><div><i></i></div><div><div class='text-bold'></div>Your full name must match your MyKad for verification purposes for successfull SIM card activation. </div></div>"><img
                                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/info-icon.png"/></a>
                                        <p class="note mt-2">Email is required for receipt and order confirmation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">* Confirm email address</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="confirm-email" placeholder=""
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">* Address</label>
                                    <a href="#" class="note float-end">Can’t find your address?</a>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="address" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">Apartment, Office, House, Floor number (optional)</label>
                                    <div class="input-group align-items-center">
                                        <input type="text" class="form-control" id="address-more" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-2 col-12">
                                    <label class="form-label">* Postcode</label>
                                    <div class="input-group align-items-center">
                                        <select class="select2 form-select" required>
                                            <option selected></option>
                                            <option value="1">82100</option>
                                            <option value="2">81920</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                    <label class="form-label">* City</label>
                                    <div class="input-group align-items-center">
                                        <select class="select2 form-select" required>
                                            <option selected></option>
                                            <option value="1">Ayer Baloi</option>
                                            <option value="2">Ayer Tawar 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                    <label class="form-label">* State</label>
                                    <div class="input-group align-items-center">
                                        <select class="select2 form-select" required>
                                            <option selected></option>
                                            <option value="1">Johor</option>
                                            <option value="2">Kedah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">Delivery Notes (optional)</label>
                                    <div class="align-items-center">
                                        <input type="text" class="form-control" id="delivery-notes" placeholder="">
                                        <p class="note mt-2">Nearby landmarks or more detailed directions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-12">
                                    <div class="address-accuracy">
                                        <img src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/info-red-icon.png" alt="" class="float-start me-3">
                                        <div class="ps-5">
                                            <h1>Address Accuracy</h1>
                                            <p>Addresses that are entered incorrectly may delay your oder, so please
                                                double-check for errors. If you wish to enter specific dispatch
                                                instructions, please do so under Delivery Notes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button class="btn-round-dark" type="submit">Continue</button>
                                </div>
                            </div>

                        </div>
                    </form>
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
    });

    $(document).ready(function(){
        $('.select2').select2();
    })

</script>
