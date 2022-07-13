<?php include('templates/header.php'); ?>

<style type="text/css">
    .layer-step h2 { font-size: 23px; margin: 0 0 8px; }
    .layer-step .panel-stepHeading { color: #1A1E47; font-size: 18px; font-weight: 800; margin: 0 0 15px; text-transform: uppercase; }
    .panel-stepHeading .icon-stepHeading { background-color: #1A1E47; border-radius: 100%; display: inline-block; margin: 0 12px 0 0; height: 53px; padding: 10px 0 0; text-align: center; vertical-align: middle; width: 53px; }
    .icon-stepHeading img { max-height: 32px; max-width: 32px; }

    .section-bg-grey { background-color: #F7F8F9; }

    .layer-accordionPlan .layer-accordionPlanDetails { background-color: #FFF; border-radius: 10px; box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1); margin: 45px 0 0; padding: 30px; }

    .layer-accordionPlanDetails .img-infinite { margin-bottom: 12px; max-width: 230px; }
    .layer-accordionPlanDetails p.panel-textGradient { font-size: 28px; font-weight: 800; letter-spacing: -0.02em; margin: 0; }
    p.panel-textGradient span { background: linear-gradient(80.9deg, #FF0084 16.48%, #6F29D2 85.6%, #2F3BF5 96.9%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-fill-color: transparent; }
    .layer-accordionPlanDetails p.panel-hotspot { font-size: 33px; font-weight: 800; line-height: 33px; vertical-align: sub; }
    .layer-accordionPlanDetails p.panel-hotspot sup { font-size: 18px; line-height: 23px; margin: 0 0 0 5px; }
    .layer-accordionPlanDetails p.panel-permonth { font-size: 23px; line-height: 28px; }
    .layer-accordionPlanDetails ul.listing-planCheck, ul.listing-planCheck { margin: 0; padding: 0; }
    .layer-accordionPlanDetails ul.listing-planCheck li, ul.listing-planCheck li { list-style-type: none; margin: 0 0 12px; padding: 0 0 0 25px; position: relative; }
    .layer-accordionPlanDetails ul.listing-planCheck li:before, .ul.listing-planCheck li:before { background-image: url('https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-check.png'); background-size: contain; content: ''; display: inline-block; height: 20px; width: 20px; position: absolute; top: 2px; left: 0px; }
    .layer-accordionPlanDetails .accordion-button, .layer-accordionPlanDetails .btn-viewMore { background-color: #FF0084; border-radius: 50px; color: #FFF; font-weight: 800; justify-content: center; padding: 10px 40px; text-transform: uppercase; }
    .layer-accordionPlanDetails .accordion-button::after, .layer-accordionPlanDetails .btn-viewMore::after { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e"); margin-left: 15px; }
    .layer-accordionPlanDetails .accordion-button:not(.collapsed)::after, .layer-accordionPlanDetails .btn-viewMore:not(.collapsed)::after { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important; }
    
    .layer-accordionPlan .layer-accordionPlanDevices { border-bottom: 1px solid #C5C5C5; margin: 18px 0 48px; padding: 0 0 33px; }
    .layer-accordionPlanDevices .layer-accordionPlanDevicesBody .flex-nowrap { overflow-y: auto; padding: 0 0 15px; }
    .layer-accordionPlanDevices .layer-planDevice { background-color: #FFF; border-radius: 10px; box-shadow: 0px 4px 10px 3px rgba(0, 0, 0, 0.15); height: 100%; padding: 40px 30px; }
    .layer-planDevice h2, .layer-planDevice h3 { font-size: 18px; line-height: 23px; letter-spacing: -0.02em; margin: 0 0 20px; text-align: center; }
    .layer-planDevice h3 { font-size: 23px; line-height: 28px; }

    .layer-planDevice p.panel-deviceImg { margin: 0 0 20px; position: relative; text-align: center; }
    .layer-planDevice p.panel-deviceImg img { max-height: 148px; }
    .layer-planDevice p.panel-deviceImg .span-oosDeviceText { align-items: center; background-color: rgba(255, 255, 255, 0.8); border-radius: 100%; color: #000; display: flex; font-size: 14px; font-weight: 700; height: 100px; left: 50%; line-height: 18px; margin: -50px 0 0 -50px; position: absolute; text-align: center; top: 50%; width: 100px; }
    .layer-planDevice p.panel-btn { margin: 0 0 20px; text-align: center; }
    .layer-planDevice p.panel-btn a { background-color: #2F3BF5; border-radius: 50px; color: #FFF; font-weight: 800; letter-spacing: 0.1em; padding: 8px 40px; text-transform: uppercase; }
    .layer-planDevice p.panel-btn span.span-oos { background-color: transparent; color: #333; cursor: text; display: inline-block; font-style: italic; font-weight: 800; letter-spacing: 0.1em; line-height: 1.5; padding: 9px 40px; text-transform: uppercase; }
    .layer-planDevice ul.listing-deviceDesc { margin-bottom: 20px; padding-left: 20px; }

    .panel-colors { align-items: center; }
    .panel-colors .span-colorAvailableText { color: #000; display: block; font-weight: 700; margin: 0 0 8px; }
    .panel-colors .span-color { background-color: transparent; border: 2px solid #333; border-radius: 100%; box-sizing: border-box; display: inline-block; height: 30px; margin: 0 4px 0 0; padding: 2px; width: 30px; }
    .panel-colors .span-color:last-of-type { margin-right: 0; }
    .span-color:after { background-color: #D9D9D9; border-radius: 100%; content: ''; display: inline-block; height: 22px; width: 22px; }
    .span-color.blue:after { background-color: #ADBBDE; }
    .span-color.black:after { background-color: #1B1F22; }
    .span-color.white:after { background-color: #EFEFEF; }
    .span-color.red:after { background-color: #FE0003; }
    .span-color.grey:after { background-color: #D9D9D9; }
    .span-color.light-blue:after { background-color: #84C8EC; }
    .span-color.pearl-white:after { background-color: #D7E8F7; }
    .span-color.light-dark-blue:after { background-color: #8ECDED; }
    .span-color.midnight-green:after { background-color: #405855; }
    .span-color.orange:after { background-color: #F06329; }
    .span-color.peach:after { background-color: #D8A89D; }
    .span-color.pink:after { background-color: #BC9792; }
    
    #infinity-banner { background-image: url(https://cdn.yes.my/site/wp-content/uploads/2022/07/infinite-banner-new-home-bg-scaled.jpg); background-size: cover; background-repeat: no-repeat; overflow: hidden; padding: 64px 0px; background-position:right; }
    #infinity-banner h1 { font-size: 48px; font-weight: 800; color:#FFF; line-height: 56px; }
    #infinity-banner h2 { font-size: 21px; font-weight: 700; color:#FFF; }
    #infinity-banner p { font-size: 10px; color:#FFF; }

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
        #infinity-banner { background-image: url(https://cdn.yes.my/site/wp-content/uploads/2022/07/infinite-banner-new-home-bg-mobile-new.jpg); padding:0px; padding-top: 20px; }
        #infinity-banner h1 { font-size: 35px !important; line-height: 36px !important; }
        #infinity-banner h2 { font-size: 13px !important; line-height: 20px !important; padding-bottom: 123px; }
        #infinity-banner .pink-btn { font-size: 10px; padding: 0.7rem 1.3rem; }
    }
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
        #infinity-banner h1{font-size: 68px;}
        #infinity-banner h2{font-size: 33px;}
        #infinity-banner{background-position: -250px 0px; padding: 46px 0px;}
    }
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) {
        #infinity-banner{ background-position: -370px 0px; }
    }

    @media (min-width: 768px) {
        .layer-step h2 { margin-bottom: 16px; }
        .layer-step .panel-stepHeading { margin-bottom: 24px; }
    }

    @media (min-width: 1024px) {
        .layer-accordionPlanDetails .img-infinite { max-width: 256px; }
        .layer-accordionPlanDetails .accordion-button, .layer-accordionPlanDetails .btn-viewMore { width: 80%; }

        .panel-colors .span-color { height: 40px; margin-right: 8px; width: 40px; }
        .span-color:after { height: 32px; width: 32px; }
    }

    @media (min-width: 1200px) {
        .layer-accordionPlanDevices .layer-accordionPlanDevicesBody .flex-nowrap { overflow-y: visible; padding-bottom: 0; }
    }

    #slider-yes-home .slider-content h1 { font-size: 48px; line-height: 56px; font-weight: 800; color: #000; }
    #slider-yes-home .slider-content h2 { font-size: 21px; line-height: 28px; font-weight: 700; color: #000; }
    #slider-yes-home .slider-content h1 span { font-weight: 800; }
    #slider-yes-home .slider-content h1.white, #slider-yes-home .slider-content h2.white { color: #FFF; }
    #slider-yes-home .slider-content p { color: #000; font-size: 20px; line-height: 24px; }
    #slider-yes-home .slider-content p span { font-weight: 700; }
    #slider-yes-home .slider-content p.small { font-size: 16px; }
    #slider-yes-home .slider-content p.white { color: #FFF; }
    #slider-yes-home .slider-content { position: absolute; width: 100%; height: 100%; z-index: 1; left: 0; top: 0; }

    .fm-form .button-submit { background-color: #FF0084; border-radius: 50px; border: 0; color: #FFF; float: right !important; font-weight: 800; justify-content: center; padding: 10px 40px; text-transform: uppercase; width: 100% !important; }
    .fm-form .button-submit:hover { background-color: #D00072; }
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
            <section id="infinity-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-8 col-md-8 col-lg-12 col-xl-6 d-flex align-items-start align-items-lg-center justify-content-start" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div>
                                <img src="https://cdn.yes.my/site/wp-content/uploads/2022/07/infinite-bundle-banner-infinite-new.png" alt="" class="mb-2 mb-lg-2">
                                <h1 class="white mb-2 text-start">Get a Free*<br>5G Phone</h1>
                                <h2 class="white mb-4 text-start">when you #SwitchTo5G</h2>
                                <img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/infinite-bundle-banner-price.png" alt="" class="mb-2 d-none d-lg-block">
                                <p class="white text-start small d-none d-lg-block">*Terms and conditions apply.</p>
                                <p class="panel-btn mt-3 mb-3 mb-lg-0">
                                    <a href="javascript:void(0)" class="btn link-jumpSection pink-btn" data-targetsection="section-plans">Check our plans</a>
                                </p>
                            </div>
                        </div>
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
                            <h2>Pick a Yes Infinite Plan.</h2>
                            <p>Our Yes Infinite Plans consist of 4 tiers: Basic, Standard, Premium and Ultra. Pick a plan that suits your needs.</p>
                        </div>
                        <div class="col-12 col-md-4 mb-5 mb-md-0 layer-step flex-column" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-step-2.png" /></span> Step 2</p>
                            <h2>Choose a FREE* 5G Phone.</h2>
                            <p>Choose a FREE* 5G smartphon from the list of phone models available based on the plan you have selected. <br /><br />*Terms and conditions apply.</p>
                        </div>
                        <div class="col-12 col-md-4 layer-step flex-column" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-step-3.png" /></span> Step 3</p>
                            <h2>Checkout & Enjoy!</h2>
                            <p>Confirm your purchase and you're all set to unlock infinite possibilities.</p>
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
                                                <p class="panel-textGradient"><span>Basic</span></p>
                                                <!-- <p class="panel-hotspot">200<sup>GB Hotspot</sup></p> -->
                                                <p class="panel-permonth"><strong>58</strong>/mth</p>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <ul class="listing-planCheck">
                                                    <li>Unlimited full speed 5G + 4G data</li>
                                                    <li>Unlimited calls</li>
                                                    <li>10GB hotspot data</li>
                                                    <li>FREE* 5G smartphone<br />*Terms and conditions apply.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-lg-end justify-content-lg-end">
                                                <button class="accordion-button btn-viewMore collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlan-1" aria-expanded="true" aria-controls="collapsePlan-1">Show Free Phones</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer-accordionPlanDevices accordion-collapse collapse" id="collapsePlan-1" aria-labelledby="accordionPlanHeading-1" data-bs-parent="accordion-plans">
                                        <div class="layer-accordionPlanDevicesBody">
                                            <div class="row flex-nowrap flex-xl-wrap">
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Yes Infinite+ Basic</h2>
                                                        <h3>VIVO Y55+ 5G</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/vivo-y55.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>FREE 5G smartphone (RRP RM1,099)</li>
                                                            <li>6GB RAM</li>
                                                            <li>128GB Storage</li>
                                                            <li>36-month contract</li>
                                                        </ul>
                                                        <p class="panel-colors">Available in: <span class="span-color light-blue" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Light Blue"></span></p>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
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
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layer-accordionPlan" id="accordionPlan-2" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                                    <div class="layer-accordionPlanDetails accordion-header" id="accordionPlanHeading-2">
                                        <div class="row gx-5">
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-infinite.png" class="img-fluid img-infinite" alt="INFINITE+" title="INFINITE+" />
                                                <p class="panel-textGradient"><span>Standard</span></p>
                                                <!-- <p class="panel-hotspot">200<sup>GB Hotspot</sup></p> -->
                                                <p class="panel-permonth"><strong>88</strong>/mth</p>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <ul class="listing-planCheck">
                                                    <li>Unlimited full speed 5G + 4G data</li>
                                                    <li>Unlimited calls</li>
                                                    <li>40GB hotspot data</li>
                                                    <li>FREE* 5G smartphone<br />*Terms and conditions apply.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-lg-end justify-content-lg-end">
                                                <button class="accordion-button btn-viewMore collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlan-2" aria-expanded="true" aria-controls="collapsePlan-2">Show Free Phones</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer-accordionPlanDevices accordion-collapse collapse" id="collapsePlan-2" aria-labelledby="accordionPlanHeading-2" data-bs-parent="accordion-plans">
                                        <div class="layer-accordionPlanDevicesBody">
                                            <div class="row flex-nowrap flex-xl-wrap">
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Yes Infinite+ Standard</h2>
                                                        <h3>Samsung Galaxy A33 5G</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/samsung-galaxy-a33.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>FREE 5G smartphone (RRP RM1,499)</li>
                                                            <li>8GB RAM</li>
                                                            <li>128GB Storage</li>
                                                            <li>36-month contract</li>
                                                        </ul>
                                                        <p class="panel-colors">Available in: <span class="span-color pearl-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pearl White"></span></p>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Yes Infinite+ Standard</h2>
                                                        <h3>Xiaomi RedMi Note II Pro 5G</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/xiaomi-redmi-note2-pro.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>FREE 5G smartphone (RRP RM1,299)</li>
                                                            <li>8GB RAM</li>
                                                            <li>128GB Storage</li>
                                                            <li>36-month contract</li>
                                                        </ul>
                                                        <p class="panel-colors">Available in: <span class="span-color black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Black"></span></p>
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
                                                <p class="panel-textGradient"><span>Premium</span></p>
                                                <!-- <p class="panel-hotspot">200<sup>GB Hotspot</sup></p> -->
                                                <p class="panel-permonth"><strong>188</strong>/mth</p>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <ul class="listing-planCheck">
                                                    <li>Unlimited full speed 5G + 4G data</li>
                                                    <li>Unlimited calls</li>
                                                    <li>70GB hotspot data</li>
                                                    <li>FREE* 5G smartphone<br />*Terms and conditions apply.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-lg-end justify-content-lg-end">
                                                <button class="accordion-button btn-viewMore collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlan-3" aria-expanded="true" aria-controls="collapsePlan-3">Show Free Phones</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer-accordionPlanDevices accordion-collapse collapse" id="collapsePlan-3" aria-labelledby="accordionPlanHeading-3" data-bs-parent="accordion-plans">
                                        <div class="layer-accordionPlanDevicesBody">
                                            <div class="row flex-nowrap flex-xl-wrap">
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Yes Infinite+ Premium</h2>
                                                        <h3>Samsung Galaxy A53 5G</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/samsung-galaxy-a53.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>FREE 5G smartphone (RRP RM1,849)</li>
                                                            <li>8GB RAM</li>
                                                            <li>256GB Storage</li>
                                                            <li>36-month contract</li>
                                                        </ul>
                                                        <p class="panel-colors">Available in: <span class="span-color white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="White"></span></p>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Yes Infinite+ Premium</h2>
                                                        <h3>OPPO Reno7 5G</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/oppo-reno7.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>FREE 5G smartphone (RRP RM1,999)</li>
                                                            <li>8GB RAM</li>
                                                            <li>256GB Storage</li>
                                                            <li>36-month contract</li>
                                                        </ul>
                                                        <p class="panel-colors">Available in: <span class="span-color light-dark-blue" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Light Dark Blue"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layer-accordionPlan" id="accordionPlan-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="700">
                                    <div class="layer-accordionPlanDetails accordion-header" id="accordionPlanHeading-4">
                                        <div class="row gx-5">
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <img src="https://cdn.yes.my/site/wp-content/uploads/2022/04/icon-elevate-infinite.png" class="img-fluid img-infinite" alt="INFINITE+" title="INFINITE+" />
                                                <p class="panel-textGradient"><span>Ultra</span></p>
                                                <!-- <p class="panel-hotspot">200<sup>GB Hotspot</sup></p> -->
                                                <p class="panel-permonth"><strong>178</strong>/mth</p>
                                            </div>
                                            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                                                <ul class="listing-planCheck">
                                                    <li>Unlimited full speed 5G + 4G data</li>
                                                    <li>Unlimited calls</li>
                                                    <li>100GB hotspot data</li>
                                                    <li>FREE* 5G smartphone<br />*Terms and conditions apply.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 mt-md-4 mt-lg-0 d-flex align-items-lg-end justify-content-lg-end">
                                                <button class="accordion-button btn-viewMore collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlan-4" aria-expanded="true" aria-controls="collapsePlan-3">Show Free Phones</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer-accordionPlanDevices accordion-collapse collapse" id="collapsePlan-4" aria-labelledby="accordionPlanHeading-4" data-bs-parent="accordion-plans">
                                        <div class="layer-accordionPlanDevicesBody">
                                            <div class="row flex-nowrap flex-xl-wrap">
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Yes Infinite+ Ultra</h2>
                                                        <h3>Samsung Galaxy S22 5G</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/samsung-galaxy-s22.png" /><span class="span-oosDeviceText">Temporarily Out of Stock</span></p>
                                                        <p class="panel-btn"><a href="javascript:void(0)" onClick="triggerModalNotify('Samsung Galaxy S22')">Notify Me</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>FREE 5G smartphone (RRP RM3,699)</li>
                                                            <li>8GB RAM</li>
                                                            <li>256GB Storage</li>
                                                            <li>36-month contract</li>
                                                        </ul>
                                                        <p class="panel-colors"><span class="span-colorAvailableText">Available in:</span> <span class="span-color black" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Black" aria-label="Black"></span><span class="span-color white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="White" aria-label="White"></span><span class="span-color midnight-green" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Midnight Green" aria-label="Midnight Green"></span><span class="span-color pink" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Pink" aria-label="Pink"></span></p>
                                                    </div>
                                                </div>
                                                <div class="col-10 col-md-5 col-xl-4 mb-xl-4 flex-column">
                                                    <div class="layer-planDevice">
                                                        <h2>Yes Infinite+ Ultra</h2>
                                                        <h3>VIVO X80 5G</h3>
                                                        <p class="panel-deviceImg"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/vivo-x80.png" /></p>
                                                        <p class="panel-btn"><a href="" class="btn btn-getplan" title="">Get Plan</a></p>
                                                        <ul class="listing-deviceDesc">
                                                            <li>FREE 5G smartphone (RRP RM3,499)</li>
                                                            <li>12GB RAM</li>
                                                            <li>256GB Storage</li>
                                                            <li>36-month contract</li>
                                                        </ul>
                                                        <p class="panel-colors">Available in: <span class="span-color orange" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Orange"></span></p>
                                                    </div>
                                                </div>
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

<div class="modal fade" tabindex="-1" id="modal-notify">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notify Me!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Enter your email address to get notified on the stock availability of this phone. (<span id="span-phoneModel"></span>)</p>
                <form>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control" id="input-notifyEmail" placeholder="Email Address" value="" />
                                <input type="hidden" name="phone-model" id="input-phoneModel" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn pink-btn w-100 float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var modalNotify = new bootstrap.Modal(document.getElementById('modal-notify'), {});
    function triggerModalNotify(phoneModel = '') {
        $('#span-phoneModel').html(phoneModel);
        $('#input-phoneModel').val(phoneModel);
        modalNotify.show();
    }
</script>

<?php include('templates/footer.php'); ?>