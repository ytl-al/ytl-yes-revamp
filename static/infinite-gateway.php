<?php include('templates/header.php'); ?>

<style type="text/css">
    #section-gateway-banner{background-image: url('https://www.yes.my/wp-content/uploads/2022/09/infinite-fibre-banner-bg.jpg'); background-size:cover; background-repeat:no-repeat; background-position:center bottom; padding:200px 0px;}
    #section-gateway-banner h2{font-size:59px; color:#FFF; font-weight:800;}
    #section-gateway-banner h1{font-size:100px; color:#FFF; font-weight:800; line-height:100px;}
    #section-gateway-banner .pricing{}
    #section-gateway-banner .pricing h4{color:#FFF; font-weight:400; font-size:20px;}
    #section-gateway-banner .pricing h5{color:#FFF; font-weight:800; font-size:48px;}
    #section-gateway-banner .pricing h5 sub{font-size:18px;}
    #best-solution{background-color:#E6E6E6; padding-bottom:0px !important; overflow: hidden;}
    #best-solution h1{font-size:30px; color:#000; font-weight:800; text-align:center;}
    #best-solution h2{font-size:25px; color:#000; font-weight:400; text-align:center;}
    #best-solution .layer-solutionBox {text-align:center;}
    #best-solution .layer-solutionBox img {margin-bottom:20px; width:64px;}
    #best-solution .layer-solutionBox h2 {font-size:26px; color:#000; font-weight:800;}
    #best-solution .layer-solutionBox h3 {font-size:16px; color:#000; font-weight:400;}

    #section-infinite-gateway-banner{background-image: url('https://www.yes.my/wp-content/uploads/2022/09/first-ever-banner-bg.jpg'); background-size:cover; background-repeat:no-repeat; background-position:center bottom; padding:200px 0px;}
    #section-infinite-gateway-banner h2{font-size:38px; color:#000; font-weight:800;}
    #section-infinite-gateway-banner h1{font-size:70px; color:#000; font-weight:800; line-height:65px;}

    .layer-comparison { padding: 60px 0; text-align: center; }
    .layer-comparison h3 {}
    .layer-comparison .layer-gradientText p { font-size: 25px; }
    .layer-gradientText {}
    .layer-gradientText h3, .layer-gradientText p { background: linear-gradient(80.9deg, #FF0084 16.48%, #6F29D2 85.6%, #2F3BF5 96.9%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-fill-color: transparent; }
    .layer-comparison p {}
    .layer-comparison .layer-contentBox { background-color: #F2F2F2; border-radius: 10px; padding: 25px; text-align: left; }
    .layer-contentBox.box-gradient { background: linear-gradient(45.9deg, #FF0084 16.48%, #6F29D2 55.6%, #2F3BF5 96.9%); }
    .layer-contentBox p { font-size: 18px; margin: 8px 0; }
    .layer-contentBox .span-hideLarge { font-weight: 700; margin: 0 12px 0 0; }
    .layer-contentBox .panel-lineHeightDouble { line-height: normal; }
    .layer-contentBox.box-gradient p { color: #FFF; }
    .layer-comparison .layer-smallgrey{font-size:12px; color:#525252;}

    .layer-steps { padding: 60px 0; }
    .layer-steps h2 { color: #000; font-size: 39px; font-weight: 800; line-height: 47px; }
    .layer-steps .layer-step {}
    .layer-step .panel-stepHeading { font-size: 25px; font-weight: 800; text-transform: uppercase; }
    .layer-step p {}

    .layer-sectionGradient { background: linear-gradient(80.9deg, #FF0084 16.48%, #6F29D2 85.6%, #2F3BF5 96.9%); }
    .layer-plans { padding: 60px 0; }
    .layer-plans h2 { color: #FFF; font-size: 39px; font-weight: 800; line-height: 47px; }
    .layer-plans p {}
    .layer-plans .row-sectionHeader h2, .layer-plans .row-sectionHeader p { color: #FFF; }
    .layer-plans .row-sectionHeader p { color: #FFF; font-size: 20px; }
    .layer-plans .blue-arrow-link{color:#FFF !important;}

    .layer-planBox { background-color: transparent; border: 0; }
    .layer-planBox .card-body { background-color: #FFF; border-radius: 20px 20px 0 0; padding: 20px 30px; }
    .layer-planBox .card-body p { font-size: 22px; }
    .layer-planBox h3 {}
    .layer-planBox p {}
    .layer-planBox hr { background-color: #000; opacity: 1; }
    .layer-planBox ul { margin: 0; padding: 0 0 0 20px; }
    .layer-planBox ul li {}
    .layer-planBox .span-slash { text-decoration: line-through; }
    .layer-planBox .card-footer { background-color: #F4F4F4; border-radius: 0 0 20px 20px; margin: 0 0 30px; text-align: center; }
    .layer-planBox .card-footer p { font-size: 20px; }
    .layer-planBox .panel-price { font-weight: 800; }
    .layer-planBox .panel-price .span-large { font-size: 30px; }
    .layer-planBox .panel-tnc { font-size: 10px !important; }
    .layer-plans p.panel-btnBuy { text-align: center; }
    .layer-plans p.panel-btnBuy a {}

    @media (min-width: 992px) {
        .layer-comparison .layer-contentBox { text-align: center; }
        .layer-contentBox .panel-lineHeightDouble { line-height: 54px; }
        .span-hideLarge { display: none; }
    }
    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
        #section-gateway-banner h2 {font-size: 25px;}
        #section-gateway-banner h1{font-size: 53px; line-height: 50px;}
        #section-gateway-banner {padding: 13px 0px;}
        #section-gateway-banner .banner-5g {width:57px;}
        #section-gateway-banner .yes-logo-banner{width:54px;}
        #section-infinite-gateway-banner {background-position: left bottom; padding: 33px 0px;}
        #section-infinite-gateway-banner h2{font-size: 25px;}
        #section-infinite-gateway-banner .banner-5g{width:50px;}
        #section-infinite-gateway-banner h1{font-size: 32px; line-height: 33px;}
        .layer-steps h2{font-size: 34px;}
        .layer-sectionGradient{margin-bottom:30px;}
        
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
                            <li class="breadcrumb-item active"><a href="/static/infinite-phone-bundle.php">Infinite Wireless Fibre</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Breadcrumb ENDS -->

            <!-- Slider Start -->
            <section id="section-gateway-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex align-items-start align-items-lg-center justify-content-start" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div>
                                <div class="row">
                                    <div class="col-10 col-lg-8">
                                        <img src="https://www.yes.my/wp-content/uploads/2022/09/infinite-fibre-banner-yes.png" alt="" class="yes-logo-banner mb-3 mb-lg-3 d-block">
                                        <h2 class="d-inline align-middle">Wireless Fibre</h2> <img src="https://www.yes.my/wp-content/uploads/2022/09/infinite-fibre-banner-5g.png" alt="" class="banner-5g d-inline align-middle ps-1 ps-lg-3">
                                        <h1 class="mb-4 mt-4">Home fibre is now wireless.</h1>
                                        <p class="panel-btn"><a href="javascript:void(0)" class="btn link-jumpSection pink-btn mt-3" data-targetsection="infinite-wireless-fibre-plans">Get It Now</a></p>
                                    </div>
                                    <div class="col-12 col-lg-4 d-flex align-items-end justify-content-start justify-content-lg-end">
                                        <div class="pricing mt-4 mt-lg-0">
                                            <h4>Launch offer</h4>
                                            <h5>RM119<sub>/mth</sub></h5>
                                            <h4 class="text-decoration-line-through">RM148</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Slider End -->

            <!-- Solution STARTS -->
            <section id="best-solution" class="layer-solutions py-5">
                <div class="container">
                    <h1 class="mb-1 text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">The best solution to all your home fibre issues.</h1>
                    <p class="mb-5 text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Tired of always buffering? Can't get whole home coverage? Hate messy and dusty cables?<br>Too busy to schedule a date for installation? This is the Wi-Fi your home needs.</p>
                    <div class="row">
                        <div class="col-12 col-xl-3 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <div class="layer-solutionBox">
                                <div class="mb-auto">
                                    <img src="https://www.yes.my/wp-content/uploads/2022/09/free-router-icon.png" alt="">
                                </div>
                                <div>
                                    <h2>FREE router with 7 days trial.</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-6 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="layer-solutionBox">
                                <div class="mb-auto">
                                    <img src="https://www.yes.my/wp-content/uploads/2022/09/fastes-broadband-icon.png" alt="">
                                </div>
                                <div>
                                    <h2>Fastest broadband in Malaysia.</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-6 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                            <div class="layer-solutionBox">
                                <div class="mb-auto">
                                    <img src="https://www.yes.my/wp-content/uploads/2022/09/wireless-portable-icon.png" alt="">
                                </div>
                                <div>
                                    <h2>Plug & Use.</h2>
                                    <h3>No installation required.</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-6 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="layer-solutionBox">
                                <div class="mb-auto">
                                    <img src="https://www.yes.my/wp-content/uploads/2022/09/plug-use-icon.png" alt="">
                                </div>
                                <div>
                                    <h2>Wireless & Portable.</h2>
                                    <h3>Use it anywhere, anytime.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <div class="col-12 text-center">
                            <img src="https://www.yes.my/wp-content/uploads/2022/09/best-solution-bg.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
            <!-- Solution ENDS -->

            <!-- Layer Comparison STARTS -->
            <section id="section-comparison" data-aos="fade-up" class="layer-comparison">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="row align-items-center mb-3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                <div class="col-lg-4 offset-lg-4 py-2">
                                    <div class="layer-gradientText">
                                        <h3>Wireless Fibre 5G</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 py-2 d-none d-lg-block">
                                    <h3>Other wired fibre plans</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 d-none d-lg-block" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <div class="layer-contentBox bg-white">
                                        <p class="mb-3">Unlimited 5G</p>
                                        <p class="mb-3">Bands</p>
                                        <p class="mb-3">Coverage range<br><br></p>
                                        <p class="mb-3">Installation required</p>
                                        <p>Portable</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <div class="layer-contentBox box-gradient">
                                        <p class="mb-3"><span class="span-hideLarge">Unlimited 5G:</span>Yes</p>
                                        <p class="mb-3"><span class="span-hideLarge">Bands:</span>2.4GHz or 5GHz</p>
                                        <p class="panel-lineHeightDouble mb-3"><span class="span-hideLarge">Coverage range:</span>2.4GHz - up to 100m<br>5GHz - up to 50m</p>
                                        <p class="mb-3"><span class="span-hideLarge">Installation required:</span>No</p>
                                        <p class="panel-lineHeightDouble mb-0"><span class="span-hideLarge">Portable:</span>Yes</p>
                                    </div>
                                </div>
                                <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                    <h3 class="mb-3 d-lg-none">Other wired fibre plans</h3>
                                    <div class="layer-contentBox">
                                        <p class="mb-3"><span class="span-hideLarge">Unlimited 5G:</span>No</p>
                                        <p class="mb-3"><span class="span-hideLarge">Bands:</span>2.4GHz or 5GHz</p>
                                        <p class="panel-lineHeightDouble mb-3"><span class="span-hideLarge">Coverage range:</span>2.4GHz - up to 30m<br>5GHz - up to 25m</p>
                                        <p class="mb-3"><span class="span-hideLarge">Installation required:</span>Yes</p>
                                        <p class="panel-lineHeightDouble mb-0"><span class="span-hideLarge">Portable:</span>No</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="layer-smallgrey mt-3">*Yes Unlimited 5G is only available within selected coverage areas. Outside of the coverage area,<br>you will be running on your 4G data. Terms and conditions apply. For the latest updates on Yes 5G coverage map, visit yes.my/coverage.</p>
                        <a href="/coverage/" class="blue-arrow-link mt-3">Check broadband coverage in your area<span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                    </div>
                </div>
            </section>
            <!-- Layer Comparison ENDS -->

            <!-- Layer Infinite Gateway Banner STARTS -->
            <section id="section-infinite-gateway-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex align-items-start align-items-lg-center justify-content-start" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div>
                                <div class="row">
                                    <div class="col-8 col-lg-5">
                                        <h2 class="d-inline align-middle">Yes Wireless Fibre</h2> <img src="https://www.yes.my/wp-content/uploads/2022/09/infinite-fibre-banner-5g.png" alt="" class="banner-5g d-inline align-middle ps-0 ps-lg-3" />
                                        <h1 class="mb-4 mt-4">The first-ever wireless 5G home fibre in Malaysia.</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Layer Infinite Gateway Banner ENDS -->

            <!-- Layer Steps STARTS -->
            <section class="layer-steps" id="section-steps">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h2 class="text-center">Here's how to get it.</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row gx-5 text-md-start text-center">
                        <div class="col-12 col-md-4 mb-4 mb-md-0 layer-step flex-column" data-aos="fade-up" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"></span> Step 1</p>
                            <p>Choose Infinite Gateway Plan</p>
                        </div>
                        <div class="col-12 col-md-4 mb-4 mb-md-0 layer-step flex-column" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"></span> Step 2</p>
                            <p>Fill up delivery form and check out</p>
                        </div>
                        <div class="col-12 col-md-4 mb-4 mb-md-0 layer-step flex-column" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                            <p class="panel-stepHeading justify-content-md-start justify-content-center"><span class="icon-stepHeading"></span> Step 3</p>
                            <p>FREE router & SIM to be delivered to your address</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Layer Steps ENDS -->

            <!-- Layer Plans STARTS -->
            <div class="layer-sectionGradient layer-plans" id="infinite-wireless-fibre-plans" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="container">
                    <div class="row mb-5 row-sectionHeader">
                        <div class="col-lg-12 text-center">
                            <h2>Wireless Fibre Plans​</h2>
                            <p>Unlock the power of wireless fibre at home with ease.​</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
                                <div class="col">
                                    <div class="layer-planBox card h-100">
                                        <div class="card-body">
                                            <h3>Wireless 5G+4G <br />Home Fibre</h3>
                                            <p>Device only plan</p>
                                            <hr />
                                            <ul>
                                                <li>Unlimited 5G data</li>
                                                <li>Uncapped 4G LTE data (150GB)​</li>
                                                <li>FREE Router (RRP: <span class="span-slash">RM1,199</span>)</li>
                                                <li>7 days free trial</li>
                                                <li>24-month contract</li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <p>120Mbps at</p>
                                            <p class="panel-price"><span class="span-large">RM119</span> /mth</p>
                                            <p class="panel-tnc">*Terms and conditions apply</p>
                                        </div>
                                    <p class="panel-btnBuy"><a href="javascript:void(0)" class="btn pink-btn btn-buyplan">Try it for Free</a></p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="layer-planBox card h-100">
                                        <div class="card-body">
                                            <h3>Wireless 5G+4G <br />Home Fibre</h3>
                                            <p>Bundle plan</p>
                                            <hr />
                                            <ul>
                                                <li>Unlimited 5G data</li>
                                                <li>Uncapped 4G LTE data (150GB)</li>
                                                <li>FREE Router (RRP: <span class="span-slash">RM1,199</span>)</li>
                                                <li>7 days free trial</li>
                                                <li>2 mobile lines with Infinite full speed data & calls</li>
                                                <li>24-month contract</li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <p>120Mbps at</p>
                                            <p class="panel-price"><span class="span-large">RM148</span> /mth</p>
                                            <p class="panel-tnc">*Terms and conditions apply</p>
                                        </div>
                                    <p class="panel-btnBuy"><a href="javascript:void(0)" class="btn pink-btn btn-buyplan">Try it for Free</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                    <a href="/coverage/" class="blue-arrow-link mt-5">Check broadband coverage in your area<span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                    </div>
                </div>
            </div>
            <!-- Layer Plans ENDS -->

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
                                    <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Where are the Yes 5G coverage areas in Malaysia?</button></h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <p>In terms of 5G coverage areas, you can already enjoy Yes 5G connectivity in selected areas of Selangor, KL, Cyberjaya, Putrajaya, Johor, Perak and Penang. Based on Digital Nasional Berhad's (DNB) plans, the 5G network is expanding fast and it is expected to reach 80% of Malaysia's population by 2024. To keep up with our Yes 5G coverage area updates, head over to yes.my/coverage.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">I am an existing Yes customer. Can I keep my existing number and subscribed to Yes Wireless Fibre Service Plan?</button></h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <p>No, Yes Wireless Fibre Service Plan only applicable for new customer and customers who port in (MNP).</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">What happens if I terminate my 24-month contract?</button></h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <p>If you terminates the Yes Wireless Fibre Service Plans during the contract period, you will be subject to Early Termination Charges (“ETC”).</p>
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
<style>
    #easy-steps .content {
        padding: 0px 60px;
    }
</style>

            <?php include('templates/footer-faq.php'); ?>
        </div>
        <!-- Entry Content ENDS -->
    </article>
    <!-- Article ENDS -->
</main>

<?php include('templates/footer.php'); ?>