<!-- Styles -->

<?php get_template_part('template-parts/roaming/styles'); ?>

<!-- Breadcrumb Start -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Roaming</a></li>
            </ol>
        </nav>
    </div>
</section>
<!-- Breadcrumb End -->

<!-- Slider Start -->
<section class="hero-slider-section">
    <div class="hero-slider slider">

        <div>
            <a href="#">
                <img src="/wp-content/uploads/2023/12/hero-banner-bg1.png" class="w-100 d-none d-lg-block" alt="...">
                <img src="/wp-content/uploads/2023/12/hero-banner-bg1-mob.png" class="w-100 d-block d-md-block d-lg-none"
                    alt="...">
                    <div class="inner-content-sec d-lg-block d-none">
                    <div class="title-sec">
                    <img decoding="async" src="/wp-content/uploads/2023/12/infinite-icon.png" class="" alt="...">
                        <h2>FREE unlimited 5G roaming in Singapore </h2>
                        <p>with Yes Infinite Postpaid Plan</p>
                     </div>
                        <div class="pricing mt-4 mt-lg-0 align-items-center justify-content-center">
                            <div class="mt-3">
                            <p>From </p>
                                <h4 class="d-block">
                               <sup><b>RM</b></sup>58</h4>
                                <p class="month-sec">/mth</p>
                            </div>
                        </div>
                        <div class="d-flex content-section-mid">
                            <div class="content-sec">
                                <img decoding="async" src="/wp-content/uploads/2023/09/calander-icon.png" class="" alt="...">
                                Uncapped 5G <br> Data & Speed
                            </div>
                            <div class="content-sec">
                                <img decoding="async" src="/wp-content/uploads/2023/09/data-icon-b.png" class="" alt="...">
                                Up to 110GB<br> Hotspot
                            </div>
                            <div class="content-sec">
                                <img decoding="async" src="/wp-content/uploads/2023/09/data-icon-b.png" class="" alt="...">
                                Unlimited<br> Calls
                            </div>
                        </div>
                        
                    </div>
            </a>
        </div>
        <div>
            <a href="#">
                <img src="/wp-content/uploads/2023/12/hero-banner-bg2.png" class="w-100 d-none d-lg-block" alt="...">
                <img src="/wp-content/uploads/2023/12/hero-banner-bg2-mob.png" class="w-100 d-block d-md-block d-lg-none" alt="...">

                <div class="inner-content-sec d-lg-block d-none">
                    <div class="title-sec">
                    <img decoding="async" src="/wp-content/uploads/2023/12/infinite-icon.png" class="" alt="...">
                        <h2>Stay conncted anytime, anywhere with YesRoam</h2>
                        <p>Roam freely with our partnering operators when you’re travelling.</p>
                     </div>
                       
                        <div class="d-flex content-section-mid">
                            <div class="content-sec">
                                <img decoding="async" src="/wp-content/uploads/2023/09/calander-icon.png" class="" alt="...">
                                Uncapped 5G <br> Data & Speed
                            </div>
                            <div class="content-sec">
                                <img decoding="async" src="/wp-content/uploads/2023/09/data-icon-b.png" class="" alt="...">
                                Up to 110GB<br> Hotspot
                            </div>
                            <div class="content-sec">
                                <img decoding="async" src="/wp-content/uploads/2023/09/data-icon-b.png" class="" alt="...">
                                Unlimited<br> Calls
                            </div>
                        </div>
                        
                    </div>
            </a>
        </div>       

    </div>
</section>
<!-- Slider End -->

<!-- Banner1 Start -->
<section id="roaming-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-8 d-flex align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="m-auto">
                    <h1>Where are you travelling to?</h1>
                    <p>Find all our roaming rates for your upcoming destination.</p>
                    <div class="search-box dropdown">
                        <?php get_template_part('template-parts/roaming/dropdown-roaming', '', ['data_roaming' => $args['data_roaming']]); ?>
                        <input id="roamingSelect" name="roamingSelect" type="hidden" />
                        <button data-button="openRoaming" class="btn">Check roaming rates</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner1 End -->

<!--Roaming Rates Section Start-->
<section id="roaming-rates-section" data-fieldset="roaming" data-roaming="roaming-rates" style="display:none;">
    <div class="container">
        <div class="row">

            <!--Singapore -->
            <div class="col-12" data-country="Singapore" style="display: block;">
                <div style="background:#fff; border-radius: 15px;">
                    <h1>
                        YesRoam <span>SG Daily</span>
                    </h1>

                    <div class="row row-roaming">
                        <div class="col-12 col-lg-2">
                            <div class="row">
                                <div class="col-12">
                                    <h3>Plans</h3>
                                    <h4>Yes Postpaid</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10">
                            <fieldset id="">
                                <div class="row">
                                    <div class="col-12 col-lg-3">
                                        <h3>Roaming Operator</h3>
                                        <p class="brand">
                                        <h4 class="blue">SIMBA</h4>
                                        </p>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <h3>Internet Rates</h3>
                                        <!-- <h4 class="blue">RM</h4> -->
                                        <h4 class="internet-rates">
                                            <span>RM</span>8<sub>/Day</sub>
                                        </h4>
                                        <p class="blue">Unlimited Data Roaming</p>
                                        <p class="small">(1GB highspeed data and 512kbps thereafter)</p>
                                        <p class="blue mt-3">Add-On Availability</p>
                                        <p class="blue mt-3">YesRoam SG Daily Top-Up</p>
                                        <p class="blue mt-3">Unlimited</p>   
                                        <p class="small">(1GB highspeed data and 512Kbps thereafter)</p> 
                                        <h4 class="blue mt-3">RM8 /day</h4>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Call &amp; SMS Rates</h3>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Call Within Singapore</p>
                                                <h4 class="blue">RM3.00 /Min</h4>
                                            </div>  
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Call To Other Countries</p>
                                                <h4 class="blue">RM28.00 /Min</h4>
                                            </div>
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Call To Malaysia</p>
                                                <h4 class="blue">FREE</h4>
                                            </div> 
                                        
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Receiving Calls</p>
                                                <h4 class="blue">FREE</h4>
                                            </div>  

                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">SMS</p>
                                                <h4 class="blue">RM1.00 /SMS</h4>
                                            </div>                            
                                        
                                            

                                            
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-12 mt-3" data-country="Singapore" style="display: block;">
                <div style="background:#fff; border-radius: 15px;" >
                    <h1>
                        YesRoam <span>SG Monthly</span>
                    </h1>

                    <div class="row row-roaming">
                        <div class="col-12 col-lg-2">
                            <div class="row">
                                <div class="col-12">
                                    <h3>Plans</h3>
                                    <h4>Only in Singapore​
                                    with any <strong>Yes Infinite Plan</strong> or 
                                    <strong>Yes Infinite+ Plan​</strong></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10">
                            <fieldset id="">
                                <div class="row">
                                    <div class="col-12 col-lg-3">
                                        <h3>Roaming Operator</h3>
                                        <p class="brand">
                                        <h4 class="blue">SIMBA</h4>
                                        </p>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <h3>Internet Rates</h3>                           
                                        <!-- <h4 class="internet-rates">
                                            <span>RM</span>8<sub>/Day</sub>
                                        </h4> -->
                                        <p class="blue">Unlimited Data Roaming</p>
                                        <p class="small">(1GB highspeed data and 512kbps thereafter)</p>
                                        <p class="blue mt-3">
                                        <a href="/yes-postpaid-plans/#postpaid-plans" target="_blank" style="text-decoration: underline; font-weight: normal;color: #000;">
                                        Check out our plans</a>.</p>
                                        <p class="blue mt-4">Add-On Availability</p>
                                        <p class="blue mt-3">YesRoam SG Daily Top-Up</p>
                                        <p class="blue mt-3">Unlimited</p>   
                                        <p class="small">(1GB highspeed data and 512Kbps thereafter)</p> 
                                        <h4 class="blue mt-3">RM8 /day</h4>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Call &amp; SMS Rates</h3>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Call Within Singapore</p>
                                                <h4 class="blue">RM3.00 /Min</h4>
                                            </div>  
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Call To Other Countries</p>
                                                <h4 class="blue">RM28.00 /Min</h4>
                                            </div>
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Call To Malaysia</p>
                                                <h4 class="blue">FREE</h4>
                                            </div> 
                                        
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Receiving Calls</p>
                                                <h4 class="blue">FREE</h4>
                                            </div>  

                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">SMS</p>
                                                <h4 class="blue">RM1.00 /SMS</h4>
                                            </div>     
                                            
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>

                </div>
            </div>

            <!--end Singapore -->

            <!--other country -->
                <div class="col-12 mt-3" data-country="OtherCountry">
                <div style="background:#fff; border-radius: 15px;">
                <h1>
                    YesRoam <span>Day Pass</span>
                </h1>

                <div class="row row-roaming">
                    <div class="col-12 col-lg-2">
                        <div class="row">
                            <div class="col-12">
                                <h3>Plans</h3>
                                <h4 data-name="planName">Yes Postpaid</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10">
                        <fieldset id="roaming-table">
                            <div class="row" data-template="roamingTemplate" style="display: none;">
                                <div class="col-12 col-lg-3">
                                    <h3>Roaming Operator</h3>
                                    <p class="brand">
                                    <h4 data-name="telcoName" class="blue">Personal</h4>
                                    </p>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <h3>Internet Rates</h3>                            
                                    <h4 class="internet-rates">
                                        <span>RM</span><b data-name="planDayRateAmt">38</b><sub data-name="planDayRateSubset">/Day</sub>
                                    </h4>
                                    <p class="blue mt-3" data-name="planDayRateQuota">Up to 100MB Data</p>
                                    <p class="small" data-name="planDayRateTnc">Once the quota is finished, the data speed will
                                        be reduced until your day pass expires without additional cost.</p>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>Call &amp; SMS Rates</h3>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle" data-name="planCallWithinCountryTxt">Call Within Argentina</p>
                                            <h4 class="blue" data-name="planCallWithinCountryRate">RM6.00 /Min</h4>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle">Call To Other Countries</p>
                                            <h4 class="blue" data-name="planCallToOtherCountriesRate">RM9.00 /Min</h4>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle">Call To Malaysia</p>
                                            <h4 class="blue" data-name="planCallToMalaysiRate">RM6.00 /Min</h4>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle">Receiving Calls</p>
                                            <h4 class="blue" data-name="planReceivingCallRate">RM5.00 /Min</h4>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle">SMS</p>
                                            <h4 class="blue" data-name="planSmsRate">RM1.00 /SMS</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                        </div>

                    </div>
                </div>
         <!--end other country -->

           <!-- section roam top-up -->
           <fieldset id="topup-roaming-table" data-name="topUp">
            <div class="col-12 mt-3"  data-template="topupRoamingTemplate" style="display: none;" >
                <div class="row roam-topup" id="topUpRoamingTemp">
                    <div class="col-12 col-lg-2">
                        <h2 data-name="topuptitle">YesRoam</h2>
                        <h3>Top-up</h3>
                        <div class="operator-sec">
                            <h3>Roaming Operator</h3>
                            <h4 data-name="topupTelcoName">Telstra</h4>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10">
                        <fieldset id="roaming-table">
                            <div class="row d-flex" style="display: block;">
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">100MB<br>
                                            <span data-name="topupPlanDayRateSubset">per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_100"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">150MB<br>
                                            <span data-name="topupPlanDayRateSubset">per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_150"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">200MB<br>
                                            <span data-name="topupPlanDayRateSubset">per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_200"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">300MB<br>
                                            <span data-name="topupPlanDayRateSubset">per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_300"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">400MB<br>
                                            <span data-name="topupPlanDayRateSubset">per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_400"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">500MB<br>
                                            <span data-name="topupPlanDayRateSubset">per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_500"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>

                                <!-- <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4>300MB<br>
                                            <span>per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span><sub>RM</sub>25</span>
                                        </h5>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4>500MB<br>
                                            <span>per day</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span><sub>RM</sub>38</span>
                                        </h5>
                                    </div>
                                </div> -->
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
         </fieldset>

            <!-- end section roam top-up -->

            <div class="col-12 text-left" style="font-size:12px;">&nbsp;
                <p>• Prices shown above are subject to 6% service tax.</p>
                <p>• The call rates shown above are not applicable for calls to Premium Numbers, Satellites and special services.</p>
                <p>• For more information, please contact YesCare via email <a href="mailto:yescare@yes.my">yescare@yes.my</a>.</p>
                <h3 class="text-center questions-head mt-3">
                Got questions?
                </h3>
                 <p class="text-center mt-3 mb-0"><a href="/faq/roaming" class="viewall-btn">Click here to View FAQs 
                        <span class="iconify" data-icon="akar-icons:arrow-right"></span> </a></p>
            </div>
         </div>
        <div class="col-12 mt-5 text-center">
     <a href="#" data-link="closeRoaming" class="pink-btn">Close <span class="iconify" data-icon="carbon:close-filled"></span></a>
        </div>
    </div>
</section>
<!--Roaming Rates Section End-->

<!--Roaming Tips Start data-roaming="roaming-rates"-->
<section id="roaming-tips"  style="display:block;">
    <div class="container">
        <div class="row">
            <div class="col">&nbsp;
                <h1>Roaming Tips</h1>
                <div class="row gx-5 row-roaming-step">
                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="selfcare" class="mb-4" src="/wp-content/uploads/2023/12/yes-icon.png">
                        <p>Activate International Roaming service via Selfcare</p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="credit-limit" class="mb-4" src="/wp-content/uploads/2023/12/credit-icon.png">
                        <p>Increase your credit limit via Selfcare to avoid any service distruption.</p>
                    </div>

                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="deactivate" class="mb-4" src="/wp-content/uploads/2023/12/roaming-icon.png">
                        <p>Turn off your Data Roaming &amp; Mobile Data in your phone setting if you don't wish to use data service while abroad
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="bills" class="mb-4" src="/wp-content/uploads/2023/12/bill-icon.png">
                        <p>Settle all outstanding bills.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Roaming Tips End-->

<!--Start Roaming Start data-roaming="roaming-rates"-->
<section id="start-roaming" style="display:block;">
    <div class="container">
        <h1>How to start roaming</h1>
        <div class="row justify-content-center">
            <div class="col-12 gx-5">
                <div class="row">
                    <div class="col-12 col-lg-4 start-roaming-cont">
                        <img src="/wp-content/uploads/2022/03/roaming-setting-icon.jpg" class="mb-4" alt="">
                        <!-- <p class="small">Step 1:</p> -->
                        <p class="num-box"><span>1</span> <strong>Go to Settings.</strong></p>
                        <p class="mt-3">Select “Mobile Network”.</p>
                    </div>
                    <div class="col-12 col-lg-4 start-roaming-cont">
                        <img src="/wp-content/uploads/2022/03/roaming-network-icon.jpg" class="mb-4" alt="">
                        <!-- <p class="small">Step 2:</p> -->
                        <p class="num-box"><span>2</span> <strong>Click Network Operators.</strong></p>
                        <p class="mt-3">Wait for 1 to 2 minutes for the list of networks to show up. Select our preferred roaming operator to connect.</p>
                        
                    </div>
                    <div class="col-12 col-lg-4 start-roaming-cont">
                        <img src="/wp-content/uploads/2022/03/roaming-mobile-icon.jpg" class="mb-4" alt="">
                        <!-- <p class="small">Step 3:</p> -->
                        <p class="num-box"><span>3</span> <strong>Go to Mobile Network.</strong></p>
                        <p class="mt-3">Turn on your Data Roaming & Mobile Data in your phone setting if you wish to use data service while abroad.</p>
                        <p class="mt-3">On some Android phones, you may need to select your SIM to turn on Data Roaming.</p>
                    </div>
                    <!-- <div class="col-12 mt-5 start-roaming-cont">
                        <p class="small"><strong>Tip:</strong> For Partnering Operators who do not have 4G LTE roaming service, kindly select the mobile network mode to 2G/3G in your phone setting to avoid any connection or compatibility issue.</p>
                        <a href="/faq/roaming" class="viewall-btn mt-5">Have problems connecting? Click here<span class="iconify" data-icon="akar-icons:arrow-right"></span></a>
                    </div> -->
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--Start Roaming End-->

<!--Countries Section Start-->
<section id="countries-section" style="display:none;">
    <h1>Roam internationally at these 22 of countries</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="carousel-roaming">
                    <div>
                        <div class="row gy-5 row-roaming-country">
                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/australia.png">
                                <h2>Australia</h2>
                                <p>Telstra</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/austria.png">
                                <h2>Austria</h2>
                                <p>Hutchison - 3 (Drei)</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/bangladesh.png">
                                <h2>Bangladesh</h2>
                                <p>GrameenPhone</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/brunei.png">
                                <h2>Brunei Darussalam</h2>
                                <p>DSTCom</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/cambodia.png">
                                <h2>Cambodia</h2>
                                <p>Viettel - Metfone</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/canada.png">
                                <h2>Canada</h2>
                                <p>Rogers Communications</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/china.png">
                                <h2>China</h2>
                                <p>China Mobile</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/denmark.png">
                                <h2>Denmark</h2>
                                <p>TDC</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/hong-kong.png">
                                <h2>Hong Kong</h2>
                                <p>China Mobile HK</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/india.png">
                                <h2>India</h2>
                                <p>Vodafone</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/indonesia.png">
                                <h2>Indonesia</h2>
                                <p>PT Indosat Tbk</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/south-korea.png">
                                <h2>Republic of Korea</h2>
                                <p>SK Telecom (SKT)</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row gy-5 row-roaming-country">
                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/macau.png">
                                <h2>Macau</h2>
                                <p>Hutchison (3)</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/maynmar.png">
                                <h2>Myanmar</h2>
                                <p>Telenor</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/saudi.png">
                                <h2>Saudi Arabia</h2>
                                <p>Zain SA</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/singapore.png">
                                <h2>Singapore</h2>
                                <p>StarHub/M1</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/sweden.png">
                                <h2>Sweden</h2>
                                <p>H3G Access AB (3)</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/taiwan.png">
                                <h2>Taiwan</h2>
                                <p>APTG</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/thailand.png">
                                <h2>Thailand</h2>
                                <p>True Move</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/uk.png">
                                <h2>United Kingdom</h2>
                                <p>Hutchison (3)</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/us.png">
                                <h2>United States</h2>
                                <p>T-Mobile</p>
                            </div>

                            <div class="col-6 col-md-4 col-lg-2"><img src="/wp-content/uploads/2022/06/vietnam.png">
                                <h2>Vietnam</h2>
                                <p>Vietnamobile</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Countries Section End-->

<!-- Banner2 Start -->
<section id="roaming-banner" class="roaming-bg2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-8 d-flex align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="m-auto">
                    <h1>Making an overseas call?</span></h1>
                    <p>Here are the affordable International Direct Dailing (IDD) rates you’ll like.</p>
                    <div class="search-box dropdown">
                        <?php get_template_part('template-parts/roaming/dropdown-idd', '', ['data_idd' => $args['data_idd']]); ?>
                        <input id="iddSelect" name="iddSelect" type="hidden" />
                        <button class="btn" data-button="openIdd">Check IDD rates</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner2 End -->

<!--Roaming Rates Section Start-->
<section id="roaming-rates-section" data-fieldset="idd" style="display:none;">
    <div class="container">
        <div class="row row-roaming idd-call-sec">
            <h2><span>Affordable</span> IDD rates just the<br> way you like it.</h2>
            <div class="col-8 m-auto">
                <div class="row header">
                    <div class="col-12">
                        <p class="sub">&nbsp;</p>
                    </div>

                    <div class="col-12 country-sec-t">
                        <h3 class="pb-0 mb-0">Country (Code)</h3>
                        <h4 class="pb-0 mb-0" data-name="iddName">Afghanistan (93)</h4>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <h4 data-name="iddName">Afghanistan (93)</h4>
                    </div>
                </div> -->
            </div>

            <div class="col-12 col-lg-8 m-auto">
                <div class="row header">
                    <!-- <div class="col-5"></div>
                    <div class="col-6 text-center">
                        <p class="sub my-2 my-lg-0">Call Rate (RM/Min)</p>
                    </div> -->
                    <div class="col-3">
                        <h3>Plan</h3>
                    </div>

                    <div class="col-3 text-center">
                        <h3>Fixed</h3>
                    </div>

                    <div class="col-3 text-center">
                        <h3>Mobile</h3>
                    </div>

                    <div class="col-3 text-center">
                        <h3>SMS Rate (RM)</h3>
                    </div>

                </div>

                <div class="row" data-filter="postpaid">
                    <div class="col-3">
                        <p class="plan-n-t">Mobile Postpaid Plan</p>
                    </div>

                    <div class="col-3 text-center">
                        <h4 data-name="iddPostpaidFixed" class="price-color">1.80</h4>
                    </div>

                    <div class="col-3 text-center">
                        <h4 data-name="iddPostpaidMobile" class="price-color">1.80</h4>
                    </div>
                    <div class="col-3 text-center">
                        <h4  data-name="iddPostpaidSms" class="price-color">0.28</h4>
                    </div>
                </div>

                <div class="row" data-filter="prepaid">
                    <div class="col-3">
                        <p class="plan-n-t">Mobile Prepaid Plan </p>
                    </div>

                    <div class="col-3 text-center">
                        <h4 data-name="iddPrepaidFixed" class="price-color">1.80</h4>
                    </div>

                    <div class="col-3 text-center">
                        <h4 data-name="iddPrepaidMobile" class="price-color">1.80</h4>
                    </div>
                    <div class="col-3 text-center">
                        <h4 data-name="iddPrepaidSms" class="price-color">0.28</h4>
                    </div>
                </div>

               



            </div>

            <!-- <div class="col-12 col-lg-2 d-none">
                <div class="row header">
                    <div class="col-12">
                        <p class="sub">&nbsp;</p>
                    </div>

                    <div class="col-5 d-lg-none">
                        <h3>Plan</h3>
                    </div>

                    <div class="col-6 col-lg-12 text-center">
                        <h3>SMS Rate (RM)</h3>
                    </div>
                </div>
                <div class="row" data-filter="postpaid">
                    <div class="col-5 d-lg-none">
                        <p>Mobile Postpaid Plan</p>
                    </div>

                    <div class="col-6 col-lg-12 text-center">
                        <h4 data-name="iddPostpaidSms">0.28</h4>
                    </div>
                </div>

                <div class="row" data-filter="prepaid">
                    <div class="col-5 d-lg-none">
                        <p>Mobile Prepaid Plan </p>
                    </div>

                    <div class="col-6 col-lg-12 text-center">
                        <h4 data-name="iddPrepaidSms">0.28</h4>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-8 m-auto text-left idd-rate" >&nbsp;
                <p>• Prices shown above are subject to 6% service tax.</p>

                <p>• IDD calls are charged at 30 seconds block.</p>

                <p>• Rates are subject to change without prior notice.</p>
                <a href="#" data-button="closeIdd" class="pink-btn mt-5">Close <span class="iconify" data-icon="carbon:close-filled"></span></a>
            </div>
        </div>
    </div>
</section>
<!--Roaming Rates Section End-->

<!-- Footer FAQs STARTS -->
<section class="layer-footerFAQ mt-4 mt-lg-0" id="faq-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <h1 class="mb-3">Frequently Asked Questions</h1>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-9">
                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                What is Insentif Pascabayar RAHMAH Penjawat Awam (Civil Servant) plan?
                            </button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>The Insentif Pascabayar RAHMAH Penjawat Awam (Civil Servant) is a special plan that
                                    offers a RM10 discount for 12 months on your monthly commitment fee to all civil
                                    servants in Malaysia in conjunction with the National Month.You may visit <a
                                        href="/">yes.my</a> or
                                    refer to <a
                                        href="/docs/non-knowledgebase/ongoing-campaigns-campaigns-terms-and-conditions/insentif-pascabayar-rahmah-penjawat-awam-civil-servant-2/">
                                        Insentif Pascabayar RAHMAH Penjawat Awam (Civil Servant) Terms and
                                        Conditions</a> for more information on the services and rate plan offerings.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                What is the duration of the plan?
                            </button></h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush- 
                             headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>
                                    The period will be from 16th September 2023 until further notice.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                aria-expanded="false" aria-controls="flush-collapseThree">
                                How many Insentif Pascabayar RAHMAH Penjawat Awam (Civil Servant) can I register?</button></h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>You may register once, provided always that you do not have more than a maximum of
                                    six (6) postpaid service accounts with Yes. Each customer can only enjoy a total
                                    discount of RM120.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center mb-0"><a href="/faq/" class="viewall-btn">View All FAQs 
                    <!-- <img src="/wp-content/uploads/2023/10/next-arrow-icon.png" alt="..." style="width: 10px;"> -->
                        <span class="iconify" data-icon="akar-icons:arrow-right"></span> </a></p>
            </div>
        </div>
    </div>
</section>
<!-- Footer FAQs ENDS -->

<?php get_template_part('template-parts/roaming/scripts'); ?>