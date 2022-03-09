<?php get_header(); ?>

<style>
    .breadcrumb-section {
        background-color: #DEE5EF;
    }

    #keluarga-body {
        background-image: url('/wp-content/uploads/2022/01/keluarga-bodybg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top;
    }

    #keluarga-topbanner h1 {
        color: #293854;
        font-size: 24px;
        line-height: 28px;
        font-weight: 400;
        text-align: center;
        margin-bottom: 15px;
        padding: 0 21%;
    }

    #keluarga-topbanner h1 span {
        font-weight: 800;
    }

    #keluarga-table {
        margin-bottom: 300px;
    }

    #keluarga-table .pink-btn,
    #keluarga-table .white-btn {
        display: block;
    }

    #plan-family h1 {
        color: #2B2B2B;
        font-size: 50px;
        line-height: 50px;
        font-weight: 800;
        text-align: center;
    }

    #plan-family p.subheading {
        color: #2B2B2B;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 800;
        margin-bottom: 20px;
        text-align: center;
    }

    #plan-family p.greytext {
        color: #525252;
        font-size: 24px;
        line-height: 28px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 60px;
        padding: 0 20%;
    }

    #plan-family .tab-content h2 {
        color: #000;
        font-size: 29px;
        font-weight: 800;
        line-height: 32px;
        margin-bottom: 10px;
    }

    #plan-family .tab-content h2 span {
        color: #00B4F0;
    }

    #plan-family .tab-content p {
        color: #000;
        font-size: 20px;
        line-height: 24px;
    }

    #plan-family .whitebox {
        background: #F9F7F4;
        box-shadow: 8px 12px 32px rgba(26, 31, 113, 0.25);
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 20px;
    }

    #plan-family .whitebox h3 {
        color: #00B4F0;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    #plan-family .whitebox p {
        color: #525252;
        font-size: 24px;
        line-height: 28px;
        font-weight: 600;
    }

    #plan-family .tab-content {
        padding-top: 100px;
    }

    #plan-family .nav-item {
        margin: 0px 20px
    }

    #plan-family .nav-wrapper {
        border-bottom: solid 1px #C5C5C5;
    }

    #plan-family .nav-pills .nav-link {
        color: #525252;
        font-size: 24px;
        font-weight: 600;
        border-radius: 0;
    }

    #plan-family .nav-pills .nav-link.active {
        color: #ED028C;
        border-bottom: solid 4px #ED028C;
        background-color: transparent;
        font-weight: 700;
    }

    /* IPAD Portrait */

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {}

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
        #keluarga-topbanner h1 {
            padding: 0 10%;
            font-size: 20px;
        }

        #keluarga-table .pink-btn,
        #keluarga-table .white-btn {
            padding: 14px 10px;
        }

        #keluarga-table {
            margin-bottom: 80px;
        }

        #plan-family .whitebox h3 {
            font-size: 28px;
        }

        #plan-family .whitebox p {
            font-size: 20px;
            line-height: 23px;
        }

        #plan-family h1 {
            font-size: 38px;
            line-height: normal;
        }

        #plan-family p.subheading {
            font-size: 11px;
        }

        #plan-family p.greytext {
            padding: 0 4%;
        }

        #plan-family .nav-pills .nav-link {
            font-size: 17px;
        }

        #plan-family .tab-content {
            padding-top: 50px;
        }
    }
</style>

<div class="container breadcrumb-section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Pakej Keluarga Malaysia</li>
        </ol>
    </nav>
</div>

<section id="keluarga-body">
    <!-- Banner Start -->
    <section id="keluarga-topbanner" class="mb-5">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <img src="/wp-content/uploads/2022/01/keluargra-banner.png" class="img-fluid mb-5" alt="">
                </div>
                <div class="col-12 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <h1>Choose <span>yes</span> plans for quality online experience at the best price. With Pakej Peranti and Pakej Remaja, you get higher data, better connectivity and faster speeds.</h1>
                    <a href="#" class="pink-btn mt-4">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!--Kaluarga Table Start-->
    <section id="keluarga-table">
        <div class="container">
            <div class="row gx-5">
                <div class="col-12 col-lg-6 mb-4 mb-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <img src="/wp-content/uploads/2022/01/keluargra-postpaid.png" class="img-fluid" alt="">
                    <div class="row gx-5 mt-4">
                        <div class="col-6 text-center">
                            <a href="#" class="pink-btn">Buy Now</a>
                        </div>
                        <div class="col-6 text-center">
                            <a href="#" class="white-btn">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <img src="/wp-content/uploads/2022/01/keluargra-prepaid.png" class="img-fluid" alt="">
                    <div class="row gx-5 mt-4">
                        <div class="col-6 text-center">
                            <a href="#" class="pink-btn">Buy Now</a>
                        </div>
                        <div class="col-6 text-center">
                            <a href="#" class="white-btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Kaluarga Table End-->

    <!--Plan Family Start-->
    <section id="plan-family" class="mb-5 aos-init" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
        <div class="container aos-init" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <div class="row">
                <h1>Plans for every family</h1>
                <p class="subheading">Registration period from 15 October 2021 to 15 April 2022</p>
                <p class="greytext">With Pakej Peranti and Pakej Remaja, you get higher data, better connectivity and faster speeds.</p>
            </div>
        </div>
        <div class="nav-wrapper d-flex align-items-center justify-content-center">
            <ul class="nav nav-pills d-md-flex align-items-center justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-postpaid-tab" data-bs-toggle="tab" data-bs-target="#nav-postpaid" type="button" role="tab" aria-controls="nav-postpaid" aria-selected="true">Pakej Peranti Keluarga Malaysia (Postpaid)</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-prepaid-tab" data-bs-toggle="tab" data-bs-target="#nav-prepaid" type="button" role="tab" aria-controls="nav-prepaid" aria-selected="false">Pakej Remaja Keluarga Malaysia (Prepaid)</button>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-postpaid" role="tabpanel" aria-labelledby="nav-postpaid-tab">
                            <div class="row gx-5 gy-5 justify-content-center">
                                <div class="col-12 col-lg-6">
                                    <h2>Subscribe to <span>yes</span> Pakej Peranti and own the Samsung Galaxy A02 for FREE</h2>
                                    <p>What’s more, with 100GB data for only RM49 per month, it’s the best value you can find. Enjoy higher data, better connectivity and faster speeds for the best internet experience.</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="whitebox h-100">
                                        <div class="row align-items-center">
                                            <div class="col-8 d-flex align-content-center">
                                                <div>
                                                    <h3>1GB</h3>
                                                    <p>High speed<br>data a day</p>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex justify-content-center">
                                                <img src="/wp-content/uploads/2022/01/1gb-visual.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="whitebox h-100">
                                        <div class="row align-items-center">
                                            <div class="col-8 d-flex align-content-center">
                                                <div>
                                                    <h3>Samsung<br>Galaxy A02</h3>
                                                    <p>For FREE</p>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex justify-content-center">
                                                <img src="/wp-content/uploads/2022/01/samsung-a02-visual.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="whitebox h-100">
                                        <div class="row align-items-center h-100">
                                            <div class="col-5 d-flex justify-content-center">
                                                <img src="/wp-content/uploads/2022/01/100gb-visual.png" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-7 d-flex align-content-center">
                                                <div>
                                                    <h3>100GB</h3>
                                                    <p>Only RM49/ month</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="#" class="pink-btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-prepaid" role="tabpanel" aria-labelledby="nav-prepaid-tab">
                            <div class="row gx-5 gy-5 justify-content-center">
                                <div class="col-12 col-lg-6">
                                    <h2>Subscribe to <span>yes</span> Pakej Remaja with 90 days validity to keep you online for longer!</h2>
                                    <p class="mb-4">Claim 1GB daily for FREE for an extra data boost. Cover everything from your daily online learning needs, social media feeds, streaming your favorite videos and much more!</p>
                                    Package open to:
                                    <ul>
                                        <li>Malaysian citizen with valid MyKad;</li>
                                        <li>Ages 12-20 years old; or</li>
                                        <li>Valid student card holders aged 21 and above.</li>
                                    </ul>
                                    <div class="whitebox mt-4">
                                        <div class="row align-items-center">
                                            <div class="col-8 d-flex align-content-center">
                                                <div>
                                                    <h3>90 Days</h3>
                                                    <p>Validity</p>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex justify-content-center">
                                                <img src="/wp-content/uploads/2022/01/validity-visual.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="row h-100">
                                        <div class="col-12">
                                            <div class="whitebox mb-5 mb-lg-0">
                                                <div class="row align-items-center">
                                                    <div class="col-8 d-flex align-content-center">
                                                        <div>
                                                            <h3>1GB</h3>
                                                            <p>High speed<br>data a day</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <img src="/wp-content/uploads/2022/01/1gb-visual.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="whitebox h-100">
                                                <div class="row align-items-center h-100">
                                                    <div class="col-8 d-flex align-content-center">
                                                        <div>
                                                            <h3>20GB</h3>
                                                            <p>Only RM30</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <img src="/wp-content/uploads/2022/01/100gb-visual.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="#" class="pink-btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Plan Family End-->
</section>

<section id="faq-section" class="mt-5 mt-lg-0">
    <div class="container">
        <div class="row">
            <h1 class="mb-5">Frequently Asked Questions about YES</h1>
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
            <a href="/faq" class="viewall-btn">View All FAQs <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--akar-icons" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="akar-icons:arrow-right">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16m-7-7l7 7l-7 7"></path>
                </svg></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>