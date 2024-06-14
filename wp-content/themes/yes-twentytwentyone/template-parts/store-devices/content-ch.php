<?php get_template_part('template-parts/supported-devices/styles'); ?>

<section id="supported-top-banner">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div>
                    <h1>4G LTE & 5G Supported Devices</h1>
                    <p>Is your device 4G LTE or 5G compatible?</p>
                </div>
            </div>
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="search-box">
                    <input class="form-control" type="text" id="q" placeholder="Enter phone brand and model" aria-label="default input example">
                    <a href="#" class="search-btn"><img src="/wp-content/uploads/2022/03/supported-device-search-icon.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dblock flexbox" id="main-content">
    <div class="flexible">
        <div class="container container-filter oversized-1440">
            <div class="row">
                <?php get_template_part('template-parts/supported-devices/filter'); ?>

                <div class="col">
                    <div class="row filter-storeitem storeitem-supported-devices">
                        <?php get_template_part('template-parts/supported-devices/devices'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer FAQs STARTS -->
<section class="layer-footerFAQ mt-4 mt-lg-0" id="faq-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <h1 class="mb-5">Frequently Asked Questions</h1>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-9">
                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">How do I keep my number?</button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Switch To Yes without changing your number, visit <a href="https://www.yes.my/docs/faq/switch-to-yes/yes-mobile-number-portability-prepaid/">here</a> for more info.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">Where are the Yes 5G coverage areas in Malaysia?</button></h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>To check out our 5G coverage areas, you can visit <a href="https://www.yes.my/coverage/">here</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Is there any contract period if I subscribe to Yes Infinite Postpaid Service Plans?</button></h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>There is no contract for Yes Infinite Postpaid Plans.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center mb-0"><a href="/faq" class="viewall-btn">View All FAQs <span class="iconify" data-icon="akar-icons:arrow-right"></span></a></p>
            </div>
        </div>
    </div>
</section>
<!-- Footer FAQs ENDS -->

<?php get_template_part('template-parts/supported-devices/scripts'); ?>