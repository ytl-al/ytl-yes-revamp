<?php get_template_part('templates/supported-devices/styles'); ?>

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
                <?php get_template_part('templates/supported-devices/filter'); ?>

                <div class="col">
                    <div class="row filter-storeitem storeitem-supported-devices">
                        <?php get_template_part('templates/supported-devices/devices'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="faq-section">
    <div class="container">
        <div class="row">
            <h1 class="mb-5">Most Searched Topics</h1>
        </div>
        <div class="row">
            <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">YES Mobile Number Portability</button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">YES ID, YES Number &amp; Password</button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Billing &amp; Payment</button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but
                            just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.
                        </div>
                    </div>
                </div>
            </div>
            <a href="/faq" class="viewall-btn">View All FAQ <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="akar-icons:arrow-right">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16m-7-7l7 7l-7 7"></path>
                </svg></a>
        </div>
    </div>
</section>

<?php get_template_part('templates/supported-devices/scripts'); ?>