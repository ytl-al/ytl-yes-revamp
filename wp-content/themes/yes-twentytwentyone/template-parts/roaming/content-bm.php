<!-- Styles -->

<?php get_template_part('template-parts/roaming/styles'); ?>

<!-- Breadcrumb Start -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/ms">Laman Utama</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Perayauan</a></li>
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
                <img src="/wp-content/uploads/2023/12/hero-banner-bg1-mob-bm.png" class="w-100 d-block d-md-block d-lg-none"
                    alt="...">
                    <div class="inner-content-sec-bm d-lg-block d-none">
                    <div class="title-sec">
                    <img decoding="async" src="/wp-content/uploads/2023/12/infinite-icon.png" class="" alt="...">
                        <h2>Perayauan 5G tanpa had di<br> Singapura secara PERCUMA </h2>
                        <p>dengan Pelan Pascabayar Yes Infinite</p>
                     </div>
                        <div class="pricing-bm mt-4 mt-lg-0 align-items-center justify-content-center">
                            <div class="mt-3">
                            <p>DARI </p>
                                <h4 class="d-block">
                               <sup><b>RM</b></sup>58</h4>
                                <p class="month-sec">/bln</p>
                            </div>
                        </div>
                        <div class="d-flex content-section-mid">
                            <div class="content-sec">                                
                            Data & Kelajuan<br> 5G Tanpa Batasan
                            </div>
                            <div class="content-sec">                                
                            Hotspot<br> Sehingga 110GB
                            </div>
                            <div class="content-sec">
                            Panggilan<br> Tanpa Had
                            </div>
                        </div>
                        
                    </div>
            </a>
        </div>
        
        <div>
            <a href="#">
                <img src="/wp-content/uploads/2023/12/hero-banner-bg2.png" class="w-100 d-none d-lg-block" alt="...">
                <img src="/wp-content/uploads/2023/12/hero-banner-bg2-mob-bm.png" class="w-100 d-block d-md-block d-lg-none" alt="...">

                <div class="inner-content-sec-bm d-lg-block d-none">
                    <div class="title-sec mt-5">
                    <!-- <img decoding="async" src="/wp-content/uploads/2023/12/infinite-icon.png" class="" alt="..."> -->
                        <h2>Kekal terhubung bila-bila masa,<br> di mana jua dengan YesRoam</h2>
                        <p>Rayau dengan bebas bersama operator rakan<br> kongsi kami apabila anda di luar negara.</p>
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
                    <h1>Ke luar negara?</h1>
                    <p>Ketahui kadar perayauan kami untuk destinasi anda.</p>
                    <div class="search-box dropdown">
                        <?php get_template_part('template-parts/roaming/dropdown-roaming', '', ['data_roaming' => $args['data_roaming']]); ?>
                        <input id="roamingSelect" name="roamingSelect" type="hidden" />
                        <button data-button="openRoaming" class="btn">Semak kadar rayauan</button>
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
         <div class="col-12 mt-0" data-country="Singapore" style="display: block;">
                <div style="background:#fff; border-radius: 15px;" >
                    <h1>
                        YesRoam <span>SG Monthly</span>
                    </h1>

                    <div class="row row-roaming">
                        <div class="col-12 col-lg-2">
                            <div class="row">
                                <div class="col-12 border-b-sec">
                                    <h3>Pelan</h3>
                                    <h4><span style="font-weight:500">Hanya di Singapura dengan mana-mana<span> 
                                        <strong>Pelan Yes Infinite</strong> atau 
                                    <strong>Yes Infinite+</strong></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10">
                            <fieldset id="">
                                <div class="row">
                                    <div class="col-12 col-lg-3 border-b-sec">
                                        <h3>Operator Perayauan</h3>
                                        <p class="brand">
                                        <h4 class="blue">SIMBA</h4>
                                        </p>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                    <div class="border-b-sec">
                                        <h3>Kadar Internet</h3>   
                                        <p class="blue">Percuma Perayauan Data Tanpa Had</p>
                                        <p class="small">(10GB data berkelajuan tinggi dan 512kbps kemudian)</p>
                                        <p class="blue mt-3">
                                        <a href="/ms/yes-postpaid-plans/#postpaid-plans" target="_blank" style="text-decoration: underline; font-weight: normal;color: #000;">
                                        Semak pelan kami</a>.</p>
                                      </div>
                                      <div class="border-b-sec">
                                        <p class="blue mt-3 pt-3">Pilihan Tambahan</p>
                                        <p class="blue mt-2">YesRoam SG Daily Top-Up</p>
                                        <p class="blue mt-2">Tanpa Had</p>   
                                        <p class="small">(1GB data berkelajuan tinggi dan 512kbps kemudian)</p> 
                                        <h4 class="blue mt-2">RM8 /<span>sehari</span></h4>
                                       </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Kadar Panggilan &amp; SMS</h3>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Panggilan ke nombor SG</p>
                                                <h4 class="blue">RM3.00 /min</h4>
                                            </div>  
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Panggilan ke nombor di lain-lain negara</p>
                                                <h4 class="blue">RM28.00 /min</h4>
                                            </div>
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Panggilan ke nombor MY</p>
                                                <h4 class="blue">PERCUMA</h4>
                                            </div> 
                                        
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Terima panggilan</p>
                                                <h4 class="blue">PERCUMA</h4>
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
                <div style="background:#fff; border-radius: 15px;">
                    <h1>
                        YesRoam <span>SG Daily</span>
                    </h1>

                    <div class="row row-roaming">
                        <div class="col-12 col-lg-2">
                            <div class="row">
                                <div class="col-12 border-b-sec">
                                    <h3>Pelan</h3>
                                    <h4>Lain-lain Pelan Pascabayar Yes</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10">
                            <fieldset id="">
                                <div class="row">
                                    <div class="col-12 col-lg-3 border-b-sec">
                                        <h3>Operator Perayauan</h3>
                                        <p class="brand">
                                        <h4 class="blue">SIMBA</h4>
                                        </p>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                    <div class="border-b-sec">
                                        <h3>Kadar Internet</h3>
                                        <h4 class="internet-rates">
                                            <span>RM</span>8<sub>/sehari</sub>
                                        </h4>
                                      </div>
                                      <div class="border-b-sec">
                                        <p class="blue">Perayauan Data Tanpa Had</p>
                                        <p class="small">(1GB data berkelajuan tinggi dan 512kbps kemudian)</p>
                                       </div>
                                       <div class="border-b-sec">
                                        <p class="blue mt-3 pt-3">Pilihan Tambahan</p>
                                        <p class="blue mt-2">YesRoam SG Daily Top-Up</p>
                                        <p class="blue mt-2">Tanpa Had</p>   
                                        <p class="small">(1GB data berkelajuan tinggi dan 512kbps kemudian)</p> 
                                        <h4 class="blue mt-2">RM8 /<span>sehari</span></h4>
                                       </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Kadar Panggilan &amp; SMS</h3>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Panggilan ke nombor SG</p>
                                                <h4 class="blue">RM3.00 /min</h4>
                                            </div>  
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Panggilan ke nombor di lain-lain negara</p>
                                                <h4 class="blue">RM28.00 /min</h4>
                                            </div>
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Panggilan ke nombor MY</p>
                                                <h4 class="blue">PERCUMA</h4>
                                            </div> 
                                        
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Terima panggilan</p>
                                                <h4 class="blue">PERCUMA</h4>
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
                        YesRoam <span>Pay As You Use</span>
                    </h1>

                    <div class="row row-roaming">
                        <div class="col-12 col-lg-2">
                            <div class="row">
                                <div class="col-12 border-b-sec">
                                    <h3>Pelan</h3>
                                    <h4>Pelan Pascabayar Yes</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10">
                            <fieldset id="">
                                <div class="row">
                                    <div class="col-12 col-lg-3 border-b-sec">
                                        <h3>Operator Perayauan</h3>
                                        <p class="brand">
                                        <h4 class="blue">StarHub / M1</h4>
                                        </p>
                                    </div>

                                    <!-- <div class="col-12 col-lg-3">
                                    <div class="border-b-sec">
                                        <h3>Internet Rates</h3>  
                                        <p class="blue">Unlimited Data Roaming</p>
                                        <p class="small">(1GB highspeed data and 512kbps thereafter)</p>
                                        <p class="blue mt-3">
                                        <a href="/yes-postpaid-plans/#postpaid-plans" target="_blank" style="text-decoration: underline; font-weight: normal;color: #000;">
                                        Check out our plans</a>.</p>
                                      </div>
                                      <div class="border-b-sec">
                                        <p class="blue mt-3 pt-3">Add-On Availability</p>
                                        <p class="blue mt-2">YesRoam SG Daily Top-Up</p>
                                        <p class="blue mt-2">Unlimited</p>   
                                        <p class="small">(1GB highspeed data and 512Kbps thereafter)</p> 
                                        <h4 class="blue mt-2">RM8 /<span>day</span></h4>
                                       </div>
                                    </div> -->

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Kadar Panggilan &amp; SMS</h3>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Panggilan ke nombor SG</p>
                                                <h4 class="blue">RM3.00 /Min</h4>
                                            </div>  
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Panggilan ke nombor di lain-lain negara</p>
                                                <h4 class="blue">RM28.00 /min</h4>
                                            </div>
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Panggilan ke nombor MY</p>
                                                <h4 class="blue">RM1.80/min</h4>
                                            </div> 
                                        
                                            <div class="col-6 col-lg-6 mt-2">
                                                <p class="ctitle">Terima panggilan</p>
                                                <h4 class="blue">RM1.40/min</h4>
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
                    YesRoam <span data-title="PAYU">Day Pass</span>
                </h1>
                <div class="row row-roaming">
                    <div class="col-12 col-lg-2">
                        <div class="row">
                            <div class="col-12">
                                <h3>Pelan</h3>
                                <h4 data-name="planName">Pelan Pascabayar Yes</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10">
                        <fieldset id="roaming-table">
                            <div class="row" data-template="roamingTemplate" style="display: none;">
                                <div class="col-12 col-lg-3 border-b-sec">
                                    <h3>Operator Perayauan</h3>
                                    <p class="brand">
                                    <h4 data-name="telcoName" class="blue">Personal</h4>
                                    </p>
                                </div>

                                <div class="col-12 col-lg-3 border-b-sec">
                                    <h3>Kadar Internet</h3>                            
                                    <h4 class="internet-rates">
                                        <span>RM</span><b data-name="planDayRateAmt">38</b><sub data-name="planDayRateSubset">/MB</sub>
                                    </h4>
                                    <p class="blue mt-3" data-name="planDayRateQuota">Perayauan Data Tanpa Had</p>
                                    <p class="small" data-name="planDayRateTnc">(500MB data berkelajuan tinggi dan 64kbps kemudian)</p>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>Kadar Panggilan &amp; SMS</h3>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle" data-name="planCallWithinCountryTxt">Panggilan dalam Australia</p>
                                            <h4 class="blue" data-name="planCallWithinCountryRate">RM6.00 /Min</h4>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle">Panggilan ke nombor di lain-lain negara</p>
                                            <h4 class="blue" data-name="planCallToOtherCountriesRate">RM9.00 /Min</h4>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle">Panggilan ke Malaysia</p>
                                            <h4 class="blue" data-name="planCallToMalaysiRate">RM6.00 /Min</h4>
                                        </div>

                                        <div class="col-6 col-lg-6 mt-2">
                                            <p class="ctitle">Terima panggilan</p>
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
                            <h3>Operator Perayauan</h3>
                            <h4 data-name="topupTelcoName">Telstra</h4>
                        </div>
                    </div>

                    <div class="col-12 col-lg-10">
                        <fieldset id="roaming-table">
                            <div class="row d-flex" style="display: block;">
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">100MB<br>
                                            <span data-name="topupPlanDayRateSubset">sehari</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_100"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">150MB<br>
                                            <span data-name="topupPlanDayRateSubset">sehari</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_150"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">200MB<br>
                                            <span data-name="topupPlanDayRateSubset">sehari</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_200"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">300MB<br>
                                            <span data-name="topupPlanDayRateSubset">sehari</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_300"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">400MB<br>
                                            <span data-name="topupPlanDayRateSubset">sehari</span>
                                        </h4>
                                        <h5 class="internet-rates">
                                            <span data-name="topupPlanDayRateAmt_400"><sub>RM</sub>0</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="inner-sec-bg">
                                        <h4 data-name="topupPlanDayRateQuota">500MB<br>
                                            <span data-name="topupPlanDayRateSubset">sehari</span>
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
                <p>• Harga yang tertera adalah tertakluk kepada cukai perkhidmatan 6%.</p>
                <p>• Kadar panggilan tertera tidak tertakluk kepada panggilan ke Nombor Premium, Satelit dan Perkhidmatan Khas.</p>
                <p>• Untuk maklumat lanjut, sila hubungi YesCare melalui e-mel <a href="mailto:yescare@yes.my">yescare@yes.my</a>.</p>
                <h3 class="text-center questions-head mt-3">
                Pertanyaan?
                </h3>
                 <p class="text-center mt-3 mb-0"><a href="/faq/roaming" class="viewall-btn">
                    KLIK DI SINI UNTUK SOALAN LAZIM <span class="iconify" data-icon="akar-icons:arrow-right"></span> </a></p>
            </div>
        </div>
        <div class="col-12 mt-5 text-center">
     <a href="#" data-link="closeRoaming" class="pink-btn">Close <span class="iconify" data-icon="carbon:close-filled"></span></a>
        </div>
    </div>
</section>
<!--Roaming Rates Section End-->

<!--Roaming Tips Start-->
<!-- <section id="roaming-tips" data-roaming="roaming-rates" style="display:none;">
    <div class="container">
        <div class="row">
            <div class="col">&nbsp;
                <h1>Roaming Tips</h1>
                <div class="row gx-5 row-roaming-step">
                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="selfcare" class="mb-4" src="/wp-content/uploads/2022/08/yes-selfcare.png">
                        <p>Activate International Roaming service via Selfcare</p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="credit-limit" class="mb-4" src="/wp-content/uploads/2022/08/credit-limit.png">
                        <p>Increase your credit limit via Selfcare to avoid any service distruption.</p>
                    </div>

                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="deactivate" class="mb-4" src="/wp-content/uploads/2022/08/deactivate.png">
                        <p>Turn off your Data Roaming &amp; Mobile Data in your phone setting if you don't wish to use data service while abroad
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3 text-center">
                        <img alt="bills" class="mb-4" src="/wp-content/uploads/2022/08/bills.png">
                        <p>Settle all outstanding bills.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--Roaming Tips End-->

<!--Start Roaming Start data-roaming="roaming-rates"-->
<section id="start-roaming" style="display:block;">
    <div class="container">
        <h1>Cara memulakan perayauan<br> pada peranti anda?</h1>
        <div class="row justify-content-center">
            <div class="col-12 gx-5">
                <div class="row">
                <div class="col-12 col-lg-3 start-roaming-cont">
                        <img src="/wp-content/uploads/2022/03/roaming-setting-icon.jpg" class="mb-4 d-none" alt="">
                        <!-- <p class="small">Step 1:</p> -->
                        <h2 class="num-box"><span>1</span> <strong>Buka Aplikasi MyYes</strong></h2>
                        <p class="mt-3">Aktifkan servis Perayauan antarabangsa menerusi aplikasi MyYes.</p>
                    </div>
                    <div class="col-12 col-lg-3 start-roaming-cont">
                        <img src="/wp-content/uploads/2022/03/roaming-setting-icon.jpg" class="mb-4 d-none" alt="">
                        <!-- <p class="small">Step 1:</p> -->
                        <h2 class="num-box"><span>2</span> <strong>Pergi ke Tetapan</strong></h2>
                        <p class="mt-3">Pilih Rangkaian Mudah Alih.</p>
                    </div>
                    <div class="col-12 col-lg-3 start-roaming-cont">
                        <img src="/wp-content/uploads/2022/03/roaming-network-icon.jpg" class="mb-4 d-none" alt="">
                        <!-- <p class="small">Step 2:</p> -->
                        <h2 class="num-box"><span>3</span> <strong>Klik pada Operator Rangkaian</strong></h2>
                        <p class="mt-3">Setelah senarai rangkaian dipaparkan, pilih operator perayauan pilihan untuk sambungan.</p>
                        
                    </div>
                    <div class="col-12 col-lg-3 start-roaming-cont">
                        <img src="/wp-content/uploads/2022/03/roaming-mobile-icon.jpg" class="mb-4 d-none" alt="">
                        <!-- <p class="small">Step 3:</p> -->
                        <h2 class="num-box"><span>4</span> <strong>Pergi ke Rangkaian Mudah Alih</strong></h2>
                        <p class="mt-3">Aktifkan Data Perayauan dan Data Mudah Alih mengikut tetapan pada peranti mudah alih anda.</p>
                        <p class="mt-3">Untuk sesetengah telefon Android, anda mungkin perlu memilih SIM anda untuk mengaktifkan Data Perayauan.</p>
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
<!-- <section id="countries-section" class="d-none">
    <h1>RM38/hari, sehingga 500MB di 22 negara.</h1>
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
</section> -->
<!--Countries Section End-->

<!-- Banner2 Start -->
<section id="roaming-banner" class="roaming-bg2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-8 d-flex align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
              <div class="m-auto">
                    <h1>Buat panggilan ke luar negara?</span></h1>
                    <p>Nikmati nilai hebat dengan kadar International Direct Dialling (IDD) berikut.</p>
                    <div class="search-box dropdown">
                        <?php get_template_part('template-parts/roaming/dropdown-idd', '', ['data_idd' => $args['data_idd']]); ?>
                        <input id="iddSelect" name="iddSelect" type="hidden" />
                        <button class="btn" data-button="openIdd">Semak kadar IDD</button>
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
            <h2>Kadar IDD dengan nilai<br> hebat untuk anda</h2>
            <div class="col-8 m-auto">
                <div class="row header">
                    <div class="col-12">
                        <p class="sub">&nbsp;</p>
                    </div>

                    <div class="col-12 country-sec-t">
                        <h3 class="pb-0 mb-0">Negara (Kod)</h3>
                        <h4 class="pb-0 mb-0" data-name="iddName">Afghanistan (93)</h4>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <h4 class="pb-0 mb-0" data-name="iddName">Afghanistan (93)</h4>                        
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
                        <h3>Pelan</h3>
                    </div>

                    <div class="col-3 text-center">
                        <h3>Tetap</h3>
                    </div>

                    <div class="col-3 text-center">
                        <h3>Mudah Alih</h3>
                    </div>

                    <div class="col-3 text-center">
                        <h3>Kadar SMS (RM)</h3>
                    </div>
                </div>
                <div class="row" data-filter="postpaid">
                <div class="col-3">
                        <p class="plan-n-t">Pascabayar Mudah Alih</p>
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
                        <p class="plan-n-t">Prabayar Mudah Alih </p>
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
            <!-- <div class="col-12 col-lg-2">
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
            </div>-->
        </div> 


        <div class="row">
            <div class="col-8 m-auto text-left idd-rate">&nbsp;
                <p>• Harga yang tertera tertakluk kepada cukai perkhidmatan 6%.</p>
                <p>• Panggilan IDD dicaj mengikut blok 30 saat.</p>
                <p>• Kadar adalah tertakluk kepada perubahan tanpa notis terlebih dahulu.</p>
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
            <h1 class="mb-3">Soalan Lazim</h1>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-12">
                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                Apakah Perayauan Yes (YesRoam)?
                            </button></h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Perayauan Yes (YesRoam) memberikan anda data perayauan tanpa had apabila anda disambungkan ke operator rakan perayauan pilihan Yes semasa melancong ke luar negara.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                Bagaimanakah cara untuk saya melanggan Perayauan Yes (YesRoam)?
                            </button></h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush- 
                             headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>
                                Perayauan Yes (YesRoam) adalah tersedia untuk pelanggan Pascabayar Yes. Selepas mengaktifkan servis bagi langgan perayauan, sila pastikan perayauan anda diaktifkan melalui aplikasi MyYes > Perayauan Yes (YesRoam) > Pengaktifan Roaming. Deposit perayauan mungkin diperlukan. Anda akan dilanggan secara automatik sama ada bagi Perayauan Yes (YesRoam) Daily atau Perayauan Yes (YesRoam) Monthly apabila anda tiba di negara yang dilawati dan disambungkan ke operator perayauan pilihan.
                                </p>

                                <p><b>Nota:</b> <i>Jika anda adalah pengguna talian utama, anda boleh membantu talian tambahan anda untuk mengaktifkan Perayauan Yes (YesRoam) dengan meningkatkan had kredit atau membayar deposit perayauan melalui aplikasi MyYes. Log masuk ke akaun utama > Pilih talian tambahan pada meny pilihan > Klik Lagi > Roaming > Aktifkan Langganan > Tambah Sekarang untuk tingkatkan had kredit atau bayar deposit > Pengaktifan Roaming.</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree"><button class="accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                aria-expanded="false" aria-controls="flush-collapseThree">
                                Apakah Perayauan Yes (YesRoam) Monthly?</button></h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Perayauan Yes (YesRoam) Monthly menawarkan data perayauan tanpa had percuma di bwah Pelan Pascabayar Yes Infinite dan Yes Infinite+ Yes. Tawaran ini juga termasuk panggilan masuk percuma dari semua negara dan panggilan keluar percuma ke mana-mana nombor Malaysia semasa berada di negara perayauan. SMS akan dikenakan caj mengikut kadar perayauan di 
                                    <a href="/ms/roaming/">www.yes.my/ms/roaming.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center mb-0"><a href="/ms/docs/faq/roaming-idd/" class="viewall-btn">Lihat semua soalan lazim
                    <!-- <img src="/wp-content/uploads/2023/10/next-arrow-icon.png" alt="..." style="width: 10px;"> -->
                        <span class="iconify" data-icon="akar-icons:arrow-right"></span> </a></p>
            </div>
        </div>
    </div>
</section>
<!-- Footer FAQs ENDS -->

<?php get_template_part('template-parts/roaming/scripts'); ?>