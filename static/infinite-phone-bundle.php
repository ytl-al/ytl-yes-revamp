<?php include('templates/header.php'); ?>

<style type="text/css">
    .layer-steps {}

    .layer-steps .layer-step,
    .layer-step {}

    .layer-step h2 {
        font-size: 23px;
        margin: 0 0 8px;
    }

    .layer-step p {}

    .layer-step .panel-stepHeading {
        color: #1A1E47;
        font-size: 18px;
        font-weight: 800;
        margin: 0 0 15px;
        text-transform: uppercase;
    }

    .panel-stepHeading .icon-stepHeading {
        background-color: #1A1E47;
        border-radius: 100%;
        display: inline-block;
        margin: 0 12px 0 0;
        height: 53px;
        padding: 10px 0 0;
        text-align: center;
        vertical-align: middle;
        width: 53px;
    }

    .icon-stepHeading img {
        max-height: 32px;
        max-width: 32px;
    }

    .section-bg-grey {
        background-color: #F7F8F9;
    }

    .layer-accordionPlans {}

    .layer-accordionPlans .layer-accordionPlan {}

    .layer-accordionPlan .layer-accordionPlanDetails {
        background-color: #FFF;
        border-radius: 10px;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
        margin: 45px 0 0;
        padding: 30px;
    }

    .layer-accordionPlanDetails .img-infinite {
        margin-bottom: 12px;
        max-width: 230px;
    }

    .layer-accordionPlanDetails p {}

    .layer-accordionPlanDetails p.panel-textGradient {
        font-size: 28px;
        font-weight: 800;
        letter-spacing: -0.02em;
        margin: 0;
    }

    p.panel-textGradient span {
        background: linear-gradient(80.9deg, #FF0084 16.48%, #6F29D2 85.6%, #2F3BF5 96.9%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
    }

    .layer-accordionPlanDetails p.panel-hotspot {
        font-size: 33px;
        font-weight: 800;
        line-height: 33px;
        vertical-align: sub;
    }

    .layer-accordionPlanDetails p.panel-hotspot sup {
        font-size: 18px;
        line-height: 23px;
        margin: 0 0 0 5px;
    }

    .layer-accordionPlanDetails p.panel-permonth {
        font-size: 23px;
        line-height: 28px;
    }

    .layer-accordionPlanDetails ul.listing-planCheck,
    ul.listing-planCheck {
        margin: 0;
        padding: 0;
    }

    .layer-accordionPlanDetails ul.listing-planCheck li,
    ul.listing-planCheck li {
        list-style-type: none;
        margin: 0 0 12px;
        padding: 0 0 0 25px;
        position: relative;
    }

    .layer-accordionPlanDetails ul.listing-planCheck li:before,
    .ul.listing-planCheck li:before {
        background-image: url('https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-check.png');
        background-size: contain;
        content: '';
        display: inline-block;
        height: 20px;
        width: 20px;
        position: absolute;
        top: 2px;
        left: 0px;
    }

    .layer-accordionPlanDetails .accordion-button,
    .layer-accordionPlanDetails .btn-viewMore {
        background-color: #FF0084;
        border-radius: 50px;
        color: #FFF;
        font-weight: 800;
        justify-content: center;
        padding: 10px 40px;
        text-transform: uppercase;
    }

    .layer-accordionPlanDetails .accordion-button::after,
    .layer-accordionPlanDetails .btn-viewMore::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        margin-left: 15px;
    }

    .layer-accordionPlanDetails .accordion-button:not(.collapsed)::after,
    .layer-accordionPlanDetails .btn-viewMore:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
    }

    .layer-accordionPlan .layer-accordionPlanDevices {
        border-bottom: 1px solid #C5C5C5;
        margin: 18px 0 48px;
        padding: 0 0 33px;
    }

    .layer-accordionPlanDevices .layer-accordionPlanDevicesBody {}

    .layer-accordionPlanDevices .layer-accordionPlanDevicesBody .flex-nowrap {
        overflow-y: auto;
        padding: 0 0 15px;
    }

    .layer-accordionPlanDevices .layer-planDevice {
        background-color: #FFF;
        border-radius: 10px;
        box-shadow: 0px 4px 10px 3px rgba(0, 0, 0, 0.15);
        height: 100%;
        padding: 40px 30px;
    }

    .layer-planDevice h2,
    .layer-planDevice h3 {
        font-size: 18px;
        line-height: 23px;
        letter-spacing: -0.02em;
        margin: 0 0 20px;
        text-align: center;
    }

    .layer-planDevice h2 {}

    .layer-planDevice h3 {
        font-size: 23px;
        line-height: 28px;
    }

    .layer-planDevice p {}

    .layer-planDevice p.panel-deviceImg {
        margin: 0 0 20px;
        text-align: center;
    }

    .layer-planDevice p.panel-deviceImg img {
        max-height: 148px;
    }

    .layer-planDevice p.panel-btn {
        margin: 0 0 20px;
        text-align: center;
    }

    .layer-planDevice p.panel-btn a {
        background-color: #2F3BF5;
        border-radius: 50px;
        color: #FFF;
        font-weight: 800;
        letter-spacing: 0.1em;
        padding: 8px 40px;
        text-transform: uppercase;
    }

    .layer-planDevice ul.listing-deviceDesc { margin-bottom: 20px; padding-left: 20px; }

    .layer-planDevice ul.listing-deviceDesc li {}

    .panel-colors { display: flex; align-items: center; }
    .panel-colors .span-color { background-color: transparent; border: 2px solid #999; border-radius: 100%; box-sizing: border-box; display: inline-block; height: 40px; margin: 0 0 0 8px; padding: 2px; width: 40px; }
    .span-color:after { background-color: #D9D9D9; border-radius: 100%; content: ''; display: inline-block; height: 32px; width: 32px; }
    .span-color.blue:after { background-color: #ADBBDE; }
    .span-color.black:after { background-color: #282524; }
    .span-color.white:after { background-color: #FFF; }
    .span-color.red:after { background-color: #FE0003; }
    .span-color.grey:after { background-color: #D9D9D9; }


    @media (min-width: 768px) {
        .layer-step h2 {
            margin-bottom: 16px;
        }

        .layer-step .panel-stepHeading {
            margin-bottom: 24px;
        }
    }

    @media (min-width: 1024px) {
        .layer-accordionPlanDetails .img-infinite {
            max-width: 256px;
        }

        .layer-accordionPlanDetails .accordion-button,
        .layer-accordionPlanDetails .btn-viewMore {
            width: 80%;
        }
    }

    @media (min-width: 1200px) {
        .layer-accordionPlanDevices .layer-accordionPlanDevicesBody .flex-nowrap {
            overflow-y: visible;
            padding-bottom: 0;
        }
    }
</style>

<main class="clearfix site-main" id="primary" role="main">
    <!-- Article STARTS -->
    <article>
        <!-- Entry Content STARTS -->
        <div class="entry-content">

            <!-- Breadcrumb STARTS -->
            <div class="layer-breadcrumb">
                <div class="container breadcrumb-section">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/static/infinite-phone-bundle.php">Infinite + Phone Bundles</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Breadcrumb ENDS -->

            <!-- Slider Start -->
            <section>
                <div id="slider-yes-home" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true" data-bs-interval="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#slider-yes-home" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#slider-yes-home" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#slider-yes-home" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000">
                            <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/banner-elevate-xiaomi-11t-1-scaled.jpg" class="w-100 d-none d-lg-block" alt="...">
                            <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/banner-elevate-xiaomi-11t-1-mobile.jpg" class="w-100 d-block d-md-block d-lg-none" alt="...">
                            <div class="slider-content">
                                <div class="container h-100">
                                    <div class="row h-100 justify-content-start">
                                        <div class="col-12 col-lg-6 d-flex align-items-lg-center justify-content-lg-center" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                                            <div>
                                                <h1 class="white mt-2 mt-lg-0">Make it yours for only <br />RMxx.xx/mth</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/banner-elevate-xiaomi-11t-1-scaled.jpg" class="w-100 d-none d-lg-block" alt="...">
                            <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/banner-elevate-xiaomi-11t-1-mobile.jpg" class="w-100 d-block d-md-block d-lg-none" alt="...">
                            <div class="slider-content">
                                <div class="container h-100">
                                    <div class="row h-100 justify-content-start">
                                        <div class="col-12 col-lg-6 d-flex align-items-lg-center justify-content-lg-center" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                                            <div>
                                                <h1 class="white mt-2 mt-lg-0">Make it yours for only <br />RMxx.xx/mth</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/banner-elevate-xiaomi-11t-1-scaled.jpg" class="w-100 d-none d-lg-block" alt="...">
                            <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/banner-elevate-xiaomi-11t-1-mobile.jpg" class="w-100 d-block d-md-block d-lg-none" alt="...">
                            <div class="slider-content">
                                <div class="container h-100">
                                    <div class="row h-100 justify-content-start">
                                        <div class="col-12 col-lg-6 d-flex align-items-lg-center justify-content-lg-center" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                                            <div>
                                                <h1 class="white mt-2 mt-lg-0">Make it yours for only <br />RMxx.xx/mth</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev d-none" type="button" data-bs-target="#slider-yes-home" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next d-none" type="button" data-bs-target="#slider-yes-home" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>
            <!-- Slider End -->

            <!-- Section Steps STARTS -->
            <section class="layer-steps my-5" id="section-steps">
                <div class="container my-5">
                    <div class="row gx-5 text-md-start text-center">
                        <div class="col-12 col-md-4 mb-5 mb-md-0 layer-step flex-column" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-step-1.png" /></span> Step 1</p>
                            <h2>Select Plan</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br />asdfasdf as</p>
                        </div>
                        <div class="col-12 col-md-4 mb-5 mb-md-0 layer-step flex-column" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-step-2.png" /></span> Step 2</p>
                            <h2>Select Free Phone</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col-12 col-md-4 layer-step flex-column" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-step-3.png" /></span> Step 3</p>
                            <h2>Checkout</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section Steps ENDS -->

            <!-- Section Plans STARTS -->
            <section class="section-bg-grey py-5" id="section-plans">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="layer-accordionPlans accordion py-4" id="accordion-plans">
                                <div class="layer-accordionPlan" id="accordionPlan-1" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                                    <div class="layer-accordionPlanDetails accordion-header mt-0" id="accordionPlanHeading-1">
                                        <div class="row gx-5">
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-infinite.png" class="img-fluid img-infinite" alt="INFINITE+" title="INFINITE+" />
                                                <p class="panel-textGradient"><span>Basic 99</span></p>
                                                <p class="panel-hotspot">200<sup>GB Hotspot</sup></p>
                                                <p class="panel-permonth"><strong>99</strong>/mth</p>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <ul class="listing-planCheck">
                                                    <li>Unlimited 5G data until further notice</li>
                                                    <li>99GB 4G data</li>
                                                    <li>RM99 per month for 36 months</li>
                                                    <li>Free device. Select from below</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-lg-end justify-content-lg-end">
                                                <button class="accordion-button btn-viewMore collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlan-1" aria-expanded="true" aria-controls="collapsePlan-1">View More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer-accordionPlanDevices accordion-collapse collapse" id="collapsePlan-1" aria-labelledby="accordionPlanHeading-1" data-bs-parent="accordion-plans">
                                        <div class="layer-accordionPlanDevicesBody">
                                            <div class="row flex-nowrap flex-xl-wrap">
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11 LITE 5G NE 8 RAM and 128 RAM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11lite.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T 5G NE 8 RAM and 128 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T PRO 8 RAM and 256 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11tpro.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T 5G NE 8 RAM and 128 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T PRO 8 RAM and 256 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11tpro.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11 LITE 5G NE 8 RAM and 128 RAM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11lite.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layer-accordionPlan" id="accordionPlan-2" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                                    <div class="layer-accordionPlanDetails accordion-header" id="accordionPlanHeading-2">
                                        <div class="row gx-5">
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-infinite.png" class="img-fluid img-infinite" alt="INFINITE+" title="INFINITE+" />
                                                <p class="panel-textGradient"><span>Standard 128</span></p>
                                                <p class="panel-hotspot">200<sup>GB Hotspot</sup></p>
                                                <p class="panel-permonth"><strong>128</strong>/mth</p>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <ul class="listing-planCheck">
                                                    <li>Unlimited 5G data until further notice</li>
                                                    <li>99GB 4G data</li>
                                                    <li>RM99 per month for 36 months</li>
                                                    <li>Free device. Select from below</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-lg-end justify-content-lg-end">
                                                <button class="accordion-button btn-viewMore collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlan-2" aria-expanded="true" aria-controls="collapsePlan-2">View More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer-accordionPlanDevices accordion-collapse collapse" id="collapsePlan-2" aria-labelledby="accordionPlanHeading-2" data-bs-parent="accordion-plans">
                                        <div class="layer-accordionPlanDevicesBody">
                                            <div class="row flex-nowrap flex-xl-wrap">
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11 LITE 5G NE 8 RAM and 128 RAM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11lite.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T 5G NE 8 RAM and 128 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T PRO 8 RAM and 256 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11tpro.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T 5G NE 8 RAM and 128 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11t.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11T PRO 8 RAM and 256 ROM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11tpro.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>YES Postpaid FT5G RM99</h2>
                                                        <h3>XIAOMI 11 LITE 5G NE 8 RAM and 128 RAM</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2021/12/xiaomi_11lite.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layer-accordionPlan" id="accordionPlan-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                                    <div class="layer-accordionPlanDetails accordion-header" id="accordionPlanHeading-3">
                                        <div class="row gx-5">
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-infinite.png" class="img-fluid img-infinite" alt="INFINITE+" title="INFINITE+" />
                                                <p class="panel-textGradient"><span>Premium 188</span></p>
                                                <p class="panel-hotspot">200<sup>GB Hotspot</sup></p>
                                                <p class="panel-permonth"><strong>188</strong>/mth</p>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <ul class="listing-planCheck">
                                                    <li>Unlimited 5G data until further notice</li>
                                                    <li>99GB 4G data</li>
                                                    <li>RM99 per month for 36 months</li>
                                                    <li>Free device. Select from below</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-lg-end justify-content-lg-end">
                                                <button class="accordion-button btn-viewMore collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlan-3" aria-expanded="true" aria-controls="collapsePlan-3">View More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer-accordionPlanDevices accordion-collapse collapse" id="collapsePlan-3" aria-labelledby="accordionPlanHeading-3" data-bs-parent="accordion-plans">
                                        <div class="layer-accordionPlanDevicesBody">
                                            <div class="row flex-nowrap flex-xl-wrap">
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Infinite+ Premium 188</h2>
                                                        <h3>SAMSUNG S22 Ultra (Black)</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/samsung-s22-ultra-black.png"></p>
                                                        <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-elevate-buyplan btn-getplan" data-productid="9000">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                        <p class="panel-colors">Available in: <span class="span-color black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Black"></span><span class="span-color blue" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Blue"></span></p>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Infinite+ Premium 188</h2>
                                                        <h3>SAMSUNG S22 Ultra (Blue)</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/samsung-s22-ultra-blue.png"></p>
                                                        <p class="panel-btn"><a href="javascript:void(0)" class="btn btn-elevate-buyplan btn-getplan" data-productid="9000">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>250GB 4G Data</li>
                                                            <li>30 Megapixels front camera</li>
                                                            <li>Dual SIM</li>
                                                            <li>5G Enabled</li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section Plans ENDS -->

            <?php include('templates/footer-faq.php'); ?>
        </div>
        <!-- Entry Content ENDS -->
    </article>
    <!-- Article ENDS -->
</main>

<?php include('templates/footer.php'); ?>