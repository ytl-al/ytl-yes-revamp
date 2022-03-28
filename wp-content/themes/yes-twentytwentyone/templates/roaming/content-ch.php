<section class="dblock flexbox light" id="searchRoaming" style="background-image:url('/wp-content/themes/yes.my/images/yes2018/Group 2709.jpg');">
    <div class="fullscreen centerize">
        <div class="container">
            <div class="row">
                <div class="col" style="max-width:700px;">
                    <p class="shoutout lg" style="line-height:1.3;">Travelling? <br />Stay close to home with <b>YesRoam.</b></p>
                    <p class="shoutout-note"><b>Roam freely</b> anywhere with our Partnering Operators.</p>
                    &nbsp;

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown" type="button">Try “Australia“</button>
                                    <?php get_template_part('templates/roaming-idd/dropdown-roaming', '', ['data_roaming' => $args['data_roaming']]); ?>
                                    <input name="roamingSelect" type="hidden" />
                                </div>

                                <ul class="error-msg">
                                    <li type="sample">Uh-oh! Something is wrong.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-4"><button class="btn btn-primary" data-button="openRoaming" type="button">Check roaming rates</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom centerize">
        <span class="link-group">
            <a class="btn-scroll-down" href="#main-content">
                <svg class="ia ia-below">
                    <use xlink:href="/ia-defs.svg#ia-below"></use>
                </svg>
            </a>
        </span>
    </div>
</section>

<div id="main-content" style="font-size:0;">&nbsp;</div>

<fieldset data-fieldset="roaming" style="display:none;">
    <section class="dblock flexbox">
        <div class="centerize">
            <div class="container">
                <div class="row">
                    <div class="col-12">&nbsp;
                        <p class="shoutout lg brand center-text">Enjoy roaming in <b class="accent" data-name="countryName">Australia</b> with our Partnering Operators.</p>
                        &nbsp;

                        <div class="row row-roaming">
                            <div class="col-12 col-lg-2">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Plans</h3>

                                        <p><b data-name="planName">4G LTE Postpaid</b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-10">
                                <fieldset id="roaming-table">&nbsp;</fieldset>

                                <div class="row" data-template="roamingTemplate" style="display:none">
                                    <div class="col-12 col-lg-3">
                                        <h3>Roaming Operator</h3>

                                        <p class="brand">
                                            <b data-name="telcoName">Telstra</b>
                                            <svg class="ia ia-4g-lte32" data-name="telcoIs4g">
                                                <use xlink:href="/ia-defs.svg#ia-4g-lte32"></use>
                                            </svg>
                                        </p>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <h3>Internet Rates</h3>

                                        <p><b class="brand">RM</b></p>

                                        <p class="shoutout hyperset lg brand">
                                            <b data-name="planDayRateAmt">38</b>
                                            <span class="subset" data-name="planDayRateSubset">/Day</span>
                                        </p>

                                        <p class="brand" data-name="planDayRateQuota">Up to 500MB Data</p>

                                        <p class="snote" data-name="planDayRateTnc">Once the quota is finished, the data
                                            speed will be reduced until your day pass expires without additional cost.
                                        </p>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Call &amp; SMS Rates</h3>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle" data-name="planCallWithinCountryTxt">Call Within Australia</p>

                                                <p class="brand">
                                                    <b data-name="planCallWithinCountryRate">RM3.00 /Min</b>
                                                </p>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Call To Other Countries</p>

                                                <p class="brand">
                                                    <b data-name="planCallToOtherCountriesRate">RM25.00 /Min</b>
                                                </p>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Call To Malaysia</p>

                                                <p class="brand">
                                                    <b data-name="planCallToMalaysiRate">RM5.90 /Min</b>
                                                </p>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">Receiving Calls</p>

                                                <p class="brand">
                                                    <b data-name="planReceivingCallRate">RM3.50 /Min</b>
                                                </p>
                                            </div>

                                            <div class="col-6 col-lg-6">
                                                <p class="ctitle">SMS</p>

                                                <p class="brand">
                                                    <b data-name="planSmsRate">RM1.50 /SMS</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 center-text" style="font-size:12px;">&nbsp;
                        <p>• Prices shown above are subject to 6% service tax.</p>

                        <p>• The call rates shown above are not applicable for calls to Premium Numbers, Satellites and
                            special services.</p>

                        <p>• For more info, please contact Yes Customer Careline.</p>
                        <br />
                        <a href="/faq/roaming"><b><u class="accent">Got questions? Click here for FAQ.</u></b></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dblock flexbox" data-group="internet">
        <div class="flexible">
            <div class="container">
                <div class="row">
                    <div class="col">&nbsp;
                        <p class="shoutout lg brand center-text">Roaming Tips:</p>
                        &nbsp;

                        <div class="bullet-row">
                            <div class="row row-roaming-step">
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="icon">
                                        <span class="lg-icon bg">
                                            <img alt="selfcare" data-entity-type="file" data-entity-uuid="addef58c-9bb4-4173-be57-30a2955c5860" src="/wp-content/themes/yes.my/images/yes2018/yes-selfcare.png" />
                                        </span>
                                    </div>
                                    &nbsp;

                                    <p class="grey" style="max-width:245px;">Activate International Roaming service via Selfcare</p>
                                </div>

                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="icon">
                                        <span class="lg-icon bg">
                                            <img alt="credit-limit" data-entity-type="file" data-entity-uuid="01c4d375-8309-45a3-8de3-56d73f584e68" src="/wp-content/themes/yes.my/images/yes2018/credit-limit.png" />
                                        </span>
                                    </div>
                                    &nbsp; &nbsp;

                                    <p class="grey" style="max-width:245px;">Increase your credit limit via Selfcare to avoid any service distruption.</p>
                                </div>

                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="icon">
                                        <span class="lg-icon bg">
                                            <img alt="deactivate" data-entity-type="file" data-entity-uuid="d0d74b4e-79ec-4688-8389-3af42e08c108" src="/wp-content/themes/yes.my/images/yes2018/deactivate.png" />
                                        </span>
                                    </div>
                                    &nbsp;

                                    <p class="grey" style="max-width:245px;">Turn off your Data Roaming &amp; Mobile
                                        Data in your phone setting if you don't wish to use data service while abroad
                                    </p>
                                </div>

                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="icon">
                                        <span class="lg-icon bg">
                                            <img alt="bills" data-entity-type="file" data-entity-uuid="9875ebe7-0c42-466f-928d-61d4d3146839" src="/wp-content/themes/yes.my/images/yes2018/bills.png" />
                                        </span>
                                    </div>
                                    &nbsp;

                                    <p class="grey" style="max-width:245px;">Settle all outstanding bills.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dblock flexbox" data-group="internet">
        <div class="flexible">
            <div class="container">
                <div class="row">
                    <div class="col">&nbsp;
                        <p class="shoutout lg brand center-text">How to start roaming.</p>
                        &nbsp;

                        <div class="bullet-row">
                            <div class="row row-roaming-step">
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="icon">
                                        <span class="lg-icon bg">
                                            <svg class="ia ia-cog">
                                                <use xlink:href="/ia-defs.svg#ia-cog"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    &nbsp;

                                    <p style="font-size:14px;">Step 1:</p>

                                    <p><b>Go to Settings.</b></p>
                                    &nbsp;

                                    <p class="grey" style="max-width:245px;">Select “Mobile Network”.</p>
                                </div>

                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="icon">
                                        <span class="lg-icon bg">
                                            <svg class="ia ia-roaming">
                                                <use xlink:href="/ia-defs.svg#ia-roaming"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    &nbsp;

                                    <p style="font-size:14px;">Step 2:</p>

                                    <p><b>Click Network Operators.</b></p>
                                    &nbsp;

                                    <p class="grey" style="max-width:245px;">
                                        Wait for 1 to 2 minutes for the list of networks to show up.<br /><br />
                                        Select our preferred roaming operator to connect.
                                    </p>
                                </div>

                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="icon">
                                        <span class="lg-icon bg">
                                            <svg class="ia ia-link">
                                                <use xlink:href="/ia-defs.svg#ia-link"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    &nbsp;

                                    <p style="font-size:14px;">Step 3:</p>

                                    <p><b>Go to Mobile Network.</b></p>
                                    &nbsp;

                                    <p class="grey" style="max-width:245px;">
                                        Turn on your Data Roaming &amp; Mobile Data in your phone setting if you wish to use data service while abroad.<br /> <br />
                                        On some Android phones, you may need to select your SIM to turn on Data Roaming.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 center-text" style="font-size:12px;">&nbsp;
                                <p style="max-width:770px;margin:0 auto;"><b>Tip:</b> For Partnering Operators who do not have 4G LTE roaming service, kindly select the mobile network mode to 2G/3G in your phone setting to avoid any connection or compatibility issue.</p>
                                <br />
                                <a href="/faq/roaming">
                                    <b>
                                        <u class="accent">Have problems connecting? Click here.</u>
                                    </b>
                                </a><br /><br /><br />
                                <button class="btn btn-expand" data-button="closeRoaming" type="button">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</fieldset>

<section class="dblock flexbox">
    <div class="fullscreen centerize">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="shoutout lg brand center-text" style="max-width:1000px;margin:0 auto;"><b>RM38/day</b>, up to <b>500MB</b> at these <b>24 countries</b>.</p>
                    &nbsp;

                    <div class="carousel-roaming">
                        <div>
                            <div class="row row-roaming-country">
                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/australia.png" />
                                    <p><b>Australia</b></p>

                                    <p>Telstra</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/austria.png" />
                                    <p><b>Austria</b></p>

                                    <p>Hutchison - 3 (Drei)</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/bangladesh.png" />
                                    <p><b>Bangladesh</b></p>

                                    <p>GrameenPhone</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/brunei.png" />
                                    <p><b>Brunei Darussalam</b></p>

                                    <p>DSTCom</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/cambodia.png" />
                                    <p><b>Cambodia</b></p>

                                    <p>Viettel - Metfone</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/canada.png" />
                                    <p><b>Canada</b></p>

                                    <p>Rogers Communications</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/china.png" />
                                    <p><b>China</b></p>

                                    <p>China Mobile</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/denmark.png" />
                                    <p><b>Denmark</b></p>

                                    <p>H3G (3)</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/hong-kong.png" />
                                    <p><b>Hong Kong</b></p>

                                    <p>Hutchison (3)</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/india.png" />
                                    <p><b>India</b></p>

                                    <p>Vodafone</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/indonesia.png" />
                                    <p><b>Indonesia</b></p>

                                    <p>PT Indosat Tbk</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/south-korea.png" />
                                    <p><b>Republic of Korea</b></p>

                                    <p>SK Telecom (SKT)</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row row-roaming-country">
                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/macau.png" />
                                    <p><b>Macau</b></p>

                                    <p>Hutchison (3)</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/maynmar.png" />
                                    <p><b>Myanmar</b></p>

                                    <p>Telenor</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/philippines.png" />
                                    <p><b>Philippines</b></p>

                                    <p>Smart</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/qatar.png" />
                                    <p><b>Qatar</b></p>

                                    <p>Ooredoo / Qtel</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/saudi.png" />
                                    <p><b>Saudi Arabia</b></p>

                                    <p>Zain SA</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/singapore.png" />
                                    <p><b>Singapore</b></p>

                                    <p>StarHub</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/sweden.png" />
                                    <p><b>Sweden</b></p>

                                    <p>H3G Access AB (3)</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/taiwan.png" />
                                    <p><b>Taiwan</b></p>

                                    <p>APTG</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/thailand.png" />
                                    <p><b>Thailand</b></p>

                                    <p>True Move</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/uk.png" />
                                    <p><b>United Kingdom</b></p>

                                    <p>Hutchison (3)</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/us.png" />
                                    <p><b>United States</b></p>

                                    <p>T-Mobile</p>
                                </div>

                                <div class="col-6 col-md-4 col-lg-3">
                                    <img alt="" data-entity-type="" data-entity-uuid="" src="/wp-content/themes/yes.my/images/yes2018/country/vietnam.png" />
                                    <p><b>Vietnam</b></p>

                                    <p>Vietnamobile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dblock flexbox light" id="searchIdd" style="background-image:url('/wp-content/themes/yes.my/images/yes2018/Group 2710.jpg');">
    <div class="fullscreen centerize">
        <div class="container">
            <div class="row">
                <div class="col" style="max-width:887px;">
                    <p class="shoutout lg" style="line-height:1.3;">From Malaysia to <b>anywhere in the world.</b></p>
                    &nbsp;

                    <p class="shoutout-note">Here are affordable IDD rates you’ll like.</p>
                    &nbsp;

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown" type="button">Try “Cambodia”</button>
                                    <?php get_template_part('templates/roaming-idd/dropdown-idd', '', ['data_idd' => $args['data_idd']]); ?>
                                    <input name="iddSelect" type="hidden" />
                                </div>

                                <ul class="error-msg">
                                    <li type="sample">Uh-oh! Something is wrong.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-md-4"><button class="btn btn-primary" data-button="openIdd" type="button">Check IDD rates</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<fieldset data-fieldset="idd" style="display:none;">
    <section class="dblock flexbox">
        <div class="centerize">
            <div class="container">
                <div class="row row-idd">
                    <div class="col-12">&nbsp;
                        <p class="shoutout lg brand center-text"><b>Affordable</b> IDD rates just the way you like it.</p>
                        &nbsp;

                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <div class="row header">
                                    <div class="col-12">
                                        <p class="sub">&nbsp;</p>
                                    </div>

                                    <div class="col-12">
                                        <p>Country (Code)</p>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-12">
                                        <p><b data-name="iddName">Cambodia (85)</b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7">
                                <div class="row header">
                                    <div class="col-5"></div>

                                    <div class="col-6" style="text-align:center">
                                        <p class="sub">Call Rate (RM/Min)</p>
                                    </div>

                                    <div class="col-5">
                                        <p>Plan</p>
                                    </div>

                                    <div class="col-3" style="text-align:center">
                                        <p><b>Fixed</b></p>
                                    </div>

                                    <div class="col-3" style="text-align:center">
                                        <p><b>Mobile</b></p>
                                    </div>
                                </div>

                                <hr />
                                <div class="row" data-filter="postpaid">
                                    <div class="col-5">
                                        <p>4G LTE Postpaid</p>
                                    </div>

                                    <div class="col-3" style="text-align:center">
                                        <p><b data-name="iddPostpaidFixed">0.00</b></p>
                                    </div>

                                    <div class="col-3" style="text-align:center">
                                        <p><b data-name="iddPostpaidMobile">0.00</b></p>
                                    </div>
                                </div>

                                <div class="row" data-filter="prepaid">
                                    <div class="col-5">
                                        <p>4G LTE Prepaid</p>
                                    </div>

                                    <div class="col-3" style="text-align:center">
                                        <p><b data-name="iddPrepaidFixed">0.00</b></p>
                                    </div>

                                    <div class="col-3" style="text-align:center">
                                        <p><b data-name="iddPrepaidMobile">0.00</b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-2">
                                <div class="row header">
                                    <div class="col-12">
                                        <p class="sub">&nbsp;</p>
                                    </div>

                                    <div class="col-5 d-lg-none">
                                        <p>Plan</p>
                                    </div>

                                    <div class="col-6 col-lg-12">
                                        <p>SMS Rate (RM)</p>
                                    </div>
                                </div>

                                <hr />
                                <div class="row" data-filter="postpaid">
                                    <div class="col-5 d-lg-none">
                                        <p>4G LTE Postpaid</p>
                                    </div>

                                    <div class="col-6">
                                        <p><b data-name="iddPostpaidSms">0.00</b></p>
                                    </div>
                                </div>

                                <div class="row" data-filter="prepaid">
                                    <div class="col-5 d-lg-none">
                                        <p>4G LTE Prepaid</p>
                                    </div>

                                    <div class="col-6 col-lg-12">
                                        <p><b data-name="iddPrepaidSms">0.00</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 center-text" style="font-size:12px;">&nbsp;
                        <p>• Prices shown above are subject to 6% service tax.</p>

                        <p>• IDD calls are charged at 30 seconds block.</p>

                        <p>• Rates are subject to change without prior notice.</p>
                        <br />
                        <br />
                        <button class="btn btn-expand" data-button="closeIdd" type="button">Close</button><br />
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </section>
</fieldset>