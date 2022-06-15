<?php require_once('includes/header.php') ?>
<style>
    body {
        background: url(/wp-content/uploads/2021/09/amazing-things-bg.png);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .contract_section {
        margin-top: 30px;
    }

    .contract_term {
        max-height: 350px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 3px;
        margin-bottom: 10px;
    }

    .contract_term {
        margin-top: 20px;
    }

    :root {
        --code-color: darkred;
        --code-bg-color: #aaaaaa;
        --code-font-size: 14px;
        --code-line-height: 1.4;
        --scroll-bar-color: #c5c5c5;
        --scroll-bar-bg-color: #fff;
    }

    * {
        scrollbar-width: thin;
        scrollbar-color: var(--scroll-bar-color) var(--scroll-bar-bg-color);
    }


    *::-webkit-scrollbar {
        width: 12px;
    }

    *::-webkit-scrollbar-track {
        background: var(--scroll-bar-bg-color);
    }

    *::-webkit-scrollbar-thumb {
        background-color: var(--scroll-bar-color);
        border-radius: 20px;
        border: 3px solid var(--scroll-bar-bg-color);
    }
    ol.number {
        list-style-type: none;
        counter-reset: item;
        margin: 0;
        padding: 0;
    }

    ol.number > li {
        display: table;
        counter-increment: item;
        margin-bottom: 0.6em;
    }

    ol.number > li:before {
        content: counters(item, ".") ". ";
        display: table-cell;
        padding-right: 0.6em;
    }

    ol.number li ol > li {
        margin: 0;
    }

    ol.number li ol > li:before {
        content: counters(item, ".") " ";
    }

    ol table { border-collapse: collapse; border-color: #333; border-style: solid; border-width: 1px 0 0 1px; margin: 20px 0; text-align: center; width: 100%; }
    ol table th, td { border-color: #333; border-style: solid; border-width: 0 1px 1px 0; padding: 5px; }
    ol table th { background-color: #0EADF1; color: #FFF; }
    ol table td {}
</style>
<input type="hidden" value="" id="guid"/>
<header class="white-top">
    <div class="container"
    ">
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="mt-4">
                <a onclick="goBack()" style="cursor:pointer" class="back-btn "><img
                                src="/wp-content/themes/yes-twentytwentyone/template-parts/elevate/assets/images/back-icon.png"
                                alt=""> Back</a>
            </div>
        </div>
        <div class="col-lg-4 col-6 text-lg-center text-end">
            <h1 class="title_checkout p-3">Pre-Register Contract</h1>
        </div>
        <div class="col-lg-4">

        </div>
    </div>
    </div>
</header>
<main class="clearfix site-main">
<!-- Banner Start -->
    <section id="grey-innerbanner">
            <div class="container">
                <ul class="wizard">
                    <li ui-sref="firstStep" class="completed">
                        <span>1. REVIEW AND ORDER</span>
                    </li>
                    <li ui-sref="secondStep" class="completed">
                        <span>2. SIGN CONTRACT </span>
                    </li>
					 <li ui-sref="secondStep">
                        <span>3. PAYMENT</span>
                    </li>
                </ul>
            </div>
        </section>
    <!-- Banner End -->
    <section id="cart-body">
        <div class="container" style="border: 0">
            <div id="main-vue">
                <div class="p-lg-5">
                    <div class="mb-5 pad-mobile">
                        <h2 class="subtitle mt-3 mb-3">Yes Infinite+ Contract Permissions</h2>
                        <p>Read our contract conditions before proceeding.</p>
                        <div class="mt-3 content">
                            <div class="contract_section">
                                <h3>YES Terms and Condition</h3>
                                <div class="contract_term">

                                    <ol>
                                        <li><strong>The Service Plan.<br>
                                        </strong>The Yes Infinite+ Postpaid Service Plans Programme is a time limited programme (“<strong>Programme</strong>”) launched by YTL Communications Sdn Bhd (Company No. 200701035605(793634-V)) (“<strong>YTLC</strong>”) in collaboration with CompAsia
                                            Sdn Bhd (Company No. 201201022161 (1006653-T)) (“<strong>CompAsia</strong>”) and Terra Optimus Pearl Sdn Bhd (Company No. 201401027003 (1103093-X)) (“<strong>TOP</strong>”).<br> YTLC, CompAsia and TOP may be referred to collectively as “<strong>Parties</strong>”.<br>        1.2&nbsp; By Your subscription or use of any of the Yes Infinite+ Postpaid Service Plans (as defined below) You acknowledge that You understand the terms and conditions contained herein (“<strong>Yes Infinite+ T&amp;Cs</strong>” and agree to abide
                                            by them.</li>
                                        <li>This Programme is open to all individuals who are Malaysian citizens and satisfies the following pre-conditions:<br> 2.1 individuals between the ages of 18 and 65 years at the time of subscription to the Yes Infinite+ Postpaid Service Plan;<br> 2.2
                                            in possession of a valid MyKad or MyTentera; and<br> 2.3 successfully pass the credit check process.
                                            <p></p>
                                            <p>(hereinafter shall be referred to as “<strong>Eligible Subscribers</strong>”).</p>
                                        </li>
                                        <li><strong>Applicable Terms and Conditions.<br>
                                        </strong>In addition to these Yes Infinite+ <strong>T&amp;Cs</strong>, all other terms and conditions incorporated in the Postpaid Service Terms and Conditions and Postpaid Service Plans Terms &amp; Conditions available @&nbsp;<a href="https://www.yes.my/tnc">www.yes.my/tnc</a>&nbsp;shall
                                            remain valid and applicable to this Programme (collectively referred as “<strong>General T&amp;Cs”</strong>). In the event of any inconsistency between the General T&amp;Cs and these Yes Infinite+ T&amp;Cs, these Yes Infinite+ T&amp;Cs shall prevail
                                            to the extent of any such inconsistency. Capitalised words not defined herein shall have the same meaning ascribed to them in the General T&amp;Cs.</li>
                                        <li><strong>Programme Period<br>
                                        </strong>The Programme commences on 9 June 2022, 00:00 a.m. (or such later date as may be determined by YTLC and announced on its website) (“<strong>Commencement Date</strong>”) and will continue for such period unless otherwise notified by YTLC (“<strong>Programme Period</strong>”).</li>
                                        <li><strong>Registration of Interest<br>
                                        </strong>5.1 With effect from 26 May 2022 and up to the Commencement Date, an individual who satisfies the pre-conditions stated in Clauses 2.1 and 2.2 herein (“<strong>Individual</strong>”), may register his/her interest to subscribe to the Yes Infinite+
                                            Postpaid Service Plan @ <a href="https://www.yes.my/">yes.my</a> (“<strong>Pre-registration of Interest</strong>”). For clarity, Pre-registration of Interest does not mean that the application to subscribe for any of the Yes Infinite+ Postpaid
                                            Service Plans is automatically approved, as it is still subjected to the eligibility checks in Clause 2.1 and Clause 2.2 and the credit check process stated in Clause 2.3 on and after the Commencement Date.
                                            <p></p>
                                            <p>5.2 On and from the Commencement Date, the Parties will determine the Individuals eligibility to subscribe to the Yes Infinite+ Postpaid Service Plans in accordance with the pre-conditions stated in Clauses 2.1 – 2.3 herein. Thereafter, YTLC will
                                                notify such Individuals vide e-mail (or such other mode of communications as determined by YTLC) on their eligibility status (“<strong>Notification</strong>”). Notwithstanding the foregoing, the Parties reserves the right to decline any Eligible
                                                Subscribers at its sole and absolute discretion without assigning any reasons whatsoever. The Parties’ decision on all matters pertaining to eligibility of an Individual to this Programme shall be final and binding.</p>
                                            <p>5.3 If an Individual receives Notification indicating him/her –<br> (a) to be an Eligible Subscriber, such Individual is required, within a period of three (3) working days from the date of Notification, to settle all payment for the subscription
                                                of the related Yes Infinite+ Postpaid Service Plan to complete his/her subscription of the related Yes Infinite+ Postpaid Service Plan, failing which YTLC will deem such Individual is no longer interested to subscribe to the Yes Infinite+
                                                Postpaid Service Plan; or</p>
                                            <p>(b) not to be an Eligible Subscriber, he/she may continue to subscribe to any other Postpaid Service Plans or Prepaid Service Plans made available by YTLC, subject to the terms and conditions thereof. For more information on the Postpaid Service
                                                Plans and Prepaid Service Plans made available by YTLC for subscription, please refer to <a href="https://www.yes.my/">https://www.yes.my/</a>.<br> 5.4 Upon receipt of the payments in Clause 5.3(a)_above, YTLC will deliver the SIM Card and
                                                Device in relation to the Yes Infinite+ Postpaid Service Plan subscribed by Eligible Subscribers to the address provided by such Eligible Subscribers during the Pre-registration of Interest.</p>
                                        </li>
                                        <li><strong>Programme Selection &amp; Acceptance<br>
                                        </strong>6.1 Subject to Clause 7.4 herein, on or from the Commencement Date, an Eligible Subscriber may subscribe to Yes Infinite+ Postpaid Service Plan by selecting one (1) Yes Infinite+ Postpaid Service Plan, from the list of Yes Infinite+ Postpaid
                                            Service Plans made available by YTLC @ <a href="https://www.yes.my/">yes.my</a>, for subscription.
                                            <p></p>
                                            <p>6.2 All Eligible Subscribers are bound by the following terms and conditions:-<br> (a) Yes Infinite+ T&amp;Cs available @ <a href="https://www.yes.my/docs/tnc/">https://www.yes.my/docs/tnc/</a> on the subscription of any of the Yes Infinite+ Postpaid
                                                Service Plan;<br> (b) <span style="color: initial;">TOP’s Device Rental Agreement Terms and Conditions;</span></p>
                                            <p>(c) YTL’s Group Privacy Privacy available @ <a href="https://www.ytl.com/privacypolicy.asp">https://www.ytl.com/privacypolicy.asp</a>;<br> (d) TOP’s Privacy Notice available @ <a href="_wp_link_placeholder" data-wplink-edit="true">http://yes.compasia.com/TOP_PRIVACY_POLICY.PDF</a>;
                                                and<br> (e) CompAsia’s Privacy Policy available @ <a href="https://shop.compasia.com/pages/privacy-policy">https://shop.compasia.com/pages/privacy-policy</a></p>
                                        </li>
                                        <li><strong>Yes Infinite+ Postpaid Service Plans &amp; Service Offerings<br>
                                        </strong><strong>Yes Infinite+ Postpaid Service Plans<br>
                                        </strong>7.1 The Postpaid Service Plans rate offerings made available under this Programme are listed<br> below, as &nbsp;may be amended from time to time at YTLC’s sole discretion. Please refer to YTLC’s product page @ <a href="https://www.yes.my/">yes.my</a>        from time to time on any updates on the Yes Infinite+ Postpaid Service Plans:<br> (a) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Infinite+ Basic Postpaid Service Plan;<br> (b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Infinite+ Standard
                                            Postpaid Service Plan;<br> (c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Infinite+ Premium Postpaid Service Plan; and<br> (d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Infinite+ Ultra Postpaid Service Plan
                                            <p></p>
                                            <p>hereinafter shall be collectively referred to as the “<strong>Yes Infinite+ Postpaid Service Plans</strong>”).</p>
                                            <p>7.2 Each of the Yes Infinite+ Postpaid Service Plan is a Postpaid Service Plan consisting of:<br> (a) &nbsp; a smartphone (please refer to <a href="http://www.yes.my">www.yes.my</a> on the type of smartphone provided under the respective Yes Infinite+
                                                Postpaid Service Plan (“<strong>Device</strong>”);<br> (b) &nbsp; &nbsp;5G-enabled SIM Card; and<br> (c)&nbsp;&nbsp; pre-assigned YES Mobile Number.<br>
                                                <strong><br>
                                        Service Offerings<br>
                                        </strong>7.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The service offerings under the respective Yes Infinite+ Postpaid Service Plans are:</p>
                                            <table width="669">
                                                <tbody>
                                                    <tr>
                                                        <th width="134" style="background-color: rgb(14, 173, 241); border-width: 1px; border-style: solid; border-color: black; height: 8px; width: 134px;"><strong>Plan Name</strong></th>
                                                        <th width="134"><strong>Infinite+ Basic</strong></th>
                                                        <th width="134"><strong>Infinite+ Standard</strong></th>
                                                        <th width="134"><strong>Infinite+ Premium</strong></th>
                                                        <th width="134"><strong>Infinite+ Ultra</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Monthly Commitment Fee</th>
                                                        <td width="134">RM58
                                                            <p></p>
                                                            <p>(RM61.48 including SST)</p>
                                                        </td>
                                                        <td width="134">RM88
                                                            <p></p>
                                                            <p>(RM93.28 including SST)</p>
                                                        </td>
                                                        <td width="134">RM118
                                                            <p></p>
                                                            <p>(RM125.08 including SST)</p>
                                                        </td>
                                                        <td width="134">RM178
                                                            <p></p>
                                                            <p>(RM188.68 including SST)</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Data Capacity Allocation (4G+5G)</th>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Hotspot</th>
                                                        <td width="134">10GB</td>
                                                        <td width="134">40GB</td>
                                                        <td width="134">70GB</td>
                                                        <td width="134">100GB</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">*Device Type</th>
                                                        <td width="134">You may refer to <a href="https://www.yes.my/">yes.my</a> for more information</td>
                                                        <td width="134">You may refer to <a href="https://www.yes.my/">yes.my</a> for more information</td>
                                                        <td width="134">You may refer to <a href="https://www.yes.my/">yes.my</a> for more information</td>
                                                        <td width="134">You may refer to <a href="https://www.yes.my/">yes.my</a> for more information</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Contract Period</th>
                                                        <td width="134">36 months from date of activation of the SIM Card</td>
                                                        <td width="134">36 months from date of activation of the SIM Card</td>
                                                        <td width="134">36 months from date of activation of the SIM Card</td>
                                                        <td width="134">36 months from date of activation of the SIM Card</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">On-Net Services of domestic voice calls</th>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Off-Net Services of domestic voice calls</th>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">On-Net Services of domestic SMS</th>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                        <td width="134">Unlimited</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Off-Net Services of domestic SMS</th>
                                                        <td width="134">RM 0.09 per SMS</td>
                                                        <td width="134">RM 0.09 per SMS</td>
                                                        <td width="134">RM 0.09 per SMS</td>
                                                        <td width="134">RM 0.09 per SMS</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">*Device Price</th>
                                                        <td width="134">–</td>
                                                        <td width="134">–</td>
                                                        <td width="134">–</td>
                                                        <td width="134">–</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Plan Advance Payment</th>
                                                        <td width="134">RM58
                                                            <p></p>
                                                            <p>(RM61.48 including SST)</p>
                                                            <p>(rebated in the 1<sup>st</sup> month)</p>
                                                        </td>
                                                        <td width="134">RM88
                                                            <p></p>
                                                            <p>(RM93.28 including SST)<br> (rebated in the 1<sup>st</sup> month)</p>
                                                        </td>
                                                        <td width="134">RM118
                                                            <p></p>
                                                            <p>(RM125.08 including SST)</p>
                                                            <p>(rebated in the 1<sup>st</sup> month)</p>
                                                        </td>
                                                        <td width="134">RM178
                                                            <p></p>
                                                            <p>(RM188.68 including SST)</p>
                                                            <p>(rebated in the 1<sup>st</sup> month)</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Device Upfront Payment</th>
                                                        <td width="134">–</td>
                                                        <td width="134">–</td>
                                                        <td width="134">–</td>
                                                        <td width="134">–</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="134">Total Payment Upon Registration (consisting of the Plan Advance Payment and/or the Device Upfront Payment)</th>
                                                        <td width="134">RM58
                                                            <p></p>
                                                            <p>(RM61.48 including SST)</p>
                                                        </td>
                                                        <td width="134">RM88
                                                            <p></p>
                                                            <p>(RM93.28 including SST)</p>
                                                        </td>
                                                        <td width="134">RM118
                                                            <p></p>
                                                            <p>(RM125.08 including SST)</p>
                                                        </td>
                                                        <td width="134">RM178
                                                            <p></p>
                                                            <p>(RM188.68 including SST)</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>*<span style="font-style: normal !msorm;"><em>Subject to TOP’s Device Rental Agreement and </em></span><span style="font-style: normal !msorm;"><em>successful completion of </em></span><span style="font-style: normal !msorm;"><em>the Contract Period</em></span>
                                                <span
                                                    style="font-style: normal !msorm;"><em>. </em></span>.</p>
                                            <p>7.4 An Eligible Subscriber is entitled to register one (1) Yes Infinite+ Postpaid Service Plan only per valid MyKad or MyTentera, provided that he/she does not have, in aggregate, more than six (6) Postpaid Service accounts with YTLC.</p>
                                            <p>7.5 Upon subscription to any of Our Yes Infinite+ Postpaid Service Plan, an Eligible Subscriber is required to perform a one-time activation of the SIM Card within seven (7) days from the date he/she receives the SIM Card under the Yes Infinite+
                                                Postpaid Service Plan. In the event an Eligible Subscriber fails to activate the SIM Card, after the expiry of the period of seven (7) days mentioned hereinbefore, the SIM Card will be automatically activated.</p>
                                            <p>7.6 Eligible Subscribers &nbsp;will not be able to use tethering service if they &nbsp;have fully utilised the hotspot internet data allocated under the Yes Infinite+ Postpaid Service Plan. In such instance, we advise such Eligible Subscribers
                                                &nbsp;to purchase any of the Postpaid Hotspot Add-On denomination available @ <a href="https://www.yes.my/">yes.my</a> &nbsp;to continue to enjoy the tethering service.</p>
                                            <p>7.7 The Hotspot Data Capacity Allocation may only be used during the relevant Billing Cycle. In the event there is any unused Hotspot Data Capacity Allocation at the end of a particular Billing Cycle, such unused balance Hotspot Data Capacity
                                                Allocation will not be carried forward to any of the succeeding Billing Cycle and there shall be no refund or liability on YTLCs.</p>
                                            <p>7.8 Please take note that certain areas may not be within 5G network coverage. Where an area is not within the 5G network coverage range, Eligible Subscribers will continue to enjoy 4G connectivity on our Yes network.</p>
                                            <p>7.9 The 5G internet speed on the Yes Infinite+ Postpaid Service Plan fully depends on the 5G network coverage in such area.</p>
                                            <p>7.10&nbsp; If an Eligible Subscriber’s Yes Infinite+ Postpaid Plan Service account is suspended, YTLC reserves the rights to block such Device’s IMEI. YTLC will proceed to unblock such Device’ IMEI within three (3) working days upon settlement
                                                of all outstanding payment due under such Yes Infinite + Postpaid Plan Service account. Notwithstanding the suspension of such Yes Infinite+ Postpaid Plan Service account, an Eligible Subscriber’s commitment to pay the Commitment Fee shall
                                                continue during the period of suspension.</p>
                                            <p>7.11 Upon suspension or termination of an Eligible Subscriber’s &nbsp;&nbsp;Yes Infinite+ Postpaid Plan Service account, YTLC reserves the rights to forward such Eligible Subscribers details &nbsp;to CTOS for the purposes of blacklisting under
                                                the CTOS record. In such event, an Eligible Subscriber shall settle all outstanding payment in order for him/her to be removed from CTOS as blacklist. Please take note that the process of being removed from CTOS as blacklist may take at least
                                                two (2) working days after settlement of all outstanding payment.</p>
                                            <p>7.12 If an Eligible Subscriber terminates his/her Yes Infinite+ Postpaid Service Plan during the Contract Period, such Eligible Subscriber will be subject to Early Termination Charges (“<strong>ETC</strong>”).</p>
                                            <p>7.13 The unlimited On-Net Services are exclusive for Eligible Subscriber’s use in Malaysia only and applicable for communications between person-to-person personal use and not commercial use. Therefore, conference calling, re-supply, call centre
                                                usage, telemarketing, bulk messaging, application-to-person communication, continuously call forwarding, auto-dialling, machine-to-machine communication (including by using Your SIM Card in any other devices), Cellular Trunking Units (CTUs),
                                                or any other activities are considered non-standard usage and is therefore prohibited.</p>
                                        </li>
                                        <li><strong>Subscription Channels<br>
                                        </strong>An Eligible Subscriber may subscribe to the Yes Infinite+ Postpaid Plan through&nbsp;<a href="https://onelink.to/6e8tqc">MyYes</a>&nbsp;app,&nbsp;<a href="https://appstore.yes.my/ywos/signup">Yes Online Store</a>, Yes Authorised Dealer, Yes
                                            Authorised Phone Dealer&nbsp;and Yes Store.</li>
                                        <li><strong>Warranty.</strong> The Yes Infinite+ Postpaid Plan is subject to the respective Device manufacturer’s standard warranty. Please refer to the manufacturer’s warranty provided with the Device or on the manufacturer’s website to understand the
                                            details on protection coverage and duration of the manufacturer’s warranty.</li>
                                        <li><strong>Exclusion of liability for use of the Device.&nbsp;</strong>Parties shall not be liable to any Eligible Subscriber or any person(s) claiming through them for any loss, damages or injury arising from the use or inability to use the Device from
                                            any cause whatsoever.</li>
                                        <li><strong>Charges &amp; SST<br>
                                        </strong>11.1 Save as expressly provided herein, there will be no additional charges imposed for domestic On-Net Services and domestic Off-Net voice calls, subject to Clause 7 above. However, the following charges will be imposed for domestic Off-Net
                                            SMS:
                                            <p></p>
                                            <table width="91%">
                                                <tbody>
                                                    <tr>
                                                        <th width="33%"><strong>Type of Off Net Services</strong></th>
                                                        <th width="33%"><strong>Rates (RM)</strong></th>
                                                        <th width="32%"><strong>Charging Block (in seconds)</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <td width="33%">SMS</td>
                                                        <td width="33%">RM 0.09/SMS</td>
                                                        <td width="32%">–</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>11.2 Charges will be imposed for all International Roaming Service and IDD Service in accordance with the voice calls and SMS rates published @ <a style="font-size: revert;" href="https://site.yes.my/tnc/products-services-tnc/y/roaming">https://www.yes.my/roaming</a>
                                                <span
                                                    style="font-size: revert; color: initial;">.</span>
                                            </p>
                                            <p>11.3 For clarity, charges will apply for voice calls to special and toll free numbers, including but not limited to those numbers listed below:</p>
                                            <table width="93%">
                                                <tbody>
                                                    <tr>
                                                        <th width="34%"><strong>Destination</strong></th>
                                                        <th width="17%"><strong>Prefix</strong></th>
                                                        <th width="17%"><strong>Rates(RM)</strong></th>
                                                        <th width="31%"><strong>Charging Block (in seconds)</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Freephone</td>
                                                        <td>1800</td>
                                                        <td>FREE</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Toll Free</td>
                                                        <td>1300</td>
                                                        <td>0.09/min</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TM Customer</td>
                                                        <td>100</td>
                                                        <td>2.00/call</td>
                                                        <td width="31%">Flat Rate/Per</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Careline</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td width="31%">Call</td>
                                                    </tr>
                                                    <tr>
                                                        <td>General Emergency Service</td>
                                                        <td>999 / 112</td>
                                                        <td>FREE</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TM Directory Enquiry</td>
                                                        <td>103</td>
                                                        <td>2.00/call</td>
                                                        <td width="31%">Flat Rate/Per Call</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Electricity Fault Reporting</td>
                                                        <td>15454</td>
                                                        <td>0.15/min</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengurusan Air Selangor</td>
                                                        <td>15300</td>
                                                        <td>0.15/min</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Syarikat Air Melaka</td>
                                                        <td>15800</td>
                                                        <td>0.15/min</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Talian Nur</td>
                                                        <td>15999</td>
                                                        <td>FREE</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Time Announcement</td>
                                                        <td>1051</td>
                                                        <td>0.10/min</td>
                                                        <td width="31%">30</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p>11.4 The charges stated in this Clause 11 are exclusive of SST.</p>
                                        </li>
                                        <li><strong>Upgrade/Downgrade.&nbsp;</strong>Eligible Subscribers are not allowed to upgrade or downgrade their Yes Infinite+ Postpaid Service Plan during the Contract Period.</li>
                                        <li><strong>Early Termination Charges.&nbsp;</strong>If an Eligible Subscriber terminates his/her Service account or ports out to another service provider at any time before the expiry of the Contract Period or if the Service account is terminated by
                                            Yes as a result of such Eligible Subscriber’s breach of these Yes Infinite+ T&amp;Cs and/or the General T&amp;Cs, such Eligible Subscriber shall be subjected to ETC. Please refer to the General Applicable Terms and Conditions for further details
                                            on the ETC.</li>
                                        <li><strong>Limitation of Liability.&nbsp;</strong>Parties shall not be liable for any loss or damage (including without limitation loss of use, loss of income, profits or goodwill, direct or indirect, incidental, consequential, exemplary, punitive or
                                            special damages of any party including third parties) howsoever arising whether in contract, tort, negligence or otherwise, in connection with this Yes Infinite+ T&amp;Cs.</li>
                                        <li><strong>Governing Law.&nbsp;</strong>This Programme shall be governed by the laws of Malaysia under the jurisdiction of the Malaysian courts.</li>
                                        <li><strong>Modifications.&nbsp;</strong>YTLC reserves the right to, at any time, add to, delete, vary or amend the terms and conditions herein or change or modify any aspect of the Yes Infinite+ T&amp;Cs, in whole or in part, at any time and from time
                                            to time and at its sole discretion without notice and without liability to the Eligible Subscribers or any other party. Without prejudice to the aforesaid, YTLC reserves the right to cancel, terminate or suspend the Yes Infinite+ Postpaid Service
                                            Plan at any time before or during the Programme Period with notice but without any liability or compensation whatsoever.</li>
                                    </ol>
                                </div>
                                <div><label><input type="checkbox" id="term1" name="term1" @click="check_sign"
                                                   value="agree" checked/> I Agree</label></div>
                            </div>
                            <div class="contract_section">
                                <h3>Terra Optimus Pearl Device Rental Agreement</h3>
                                <div class="contract_term">
                                    <ol>
                                        <li>
                                            <div><strong>RECITAL</strong></div>
                                            <ol type="a">
                                                <li>This Device Rental Agreement (<strong>“Agreement”</strong>) is between Terra Optimus
                                                    Pearl Sdn Bhd (Registration No:
                                                    201401027003(1103093-X)) (<strong>“Owner”</strong>) and the person whose name and
                                                    particulars are as specified in Item 1 of
                                                    the Schedule to this Agreement (<strong>“Customer”</strong>).
                                                </li>
                                                <li>
                                                    At the request of the Customer, the Owner has agreed to enter into
                                                    this Agreement which sets out the
                                                    terms and conditions relating to the rental of the mobile wireless
                                                    device as described in Item 2 of the
                                                    Schedule to this Agreement which include all accessories, additions,
                                                    and/or replacements (<strong>“Mobile
                                                        Device”</strong>).
                                                </li>
                                            </ol>
                                            <p></p>
                                            <p></p>
                                        </li>
                                        <li>
                                            <div><strong>TERMS AND CONDITIONS OF THE RENTAL OF MOBILE DEVICE</strong>
                                            </div>
                                            <ol type="a">
                                                <li> The Mobile Device will only be used by the Customer in a proper
                                                    manner, and in accordance with the
                                                    operating instructions/manual for the Mobile Device and the terms
                                                    and conditions as set out by the Owner
                                                    from time to time.
                                                </li>
                                                <li> The Customer shall keep the Mobile Device in the possession and
                                                    control of the Customer at all times.
                                                </li>
                                                <li>The Customer will take due and proper care of the Mobile Device, and
                                                    the Customer shall ensure that the
                                                    Mobile Device is not defaced and/or modified in any way.
                                                </li>
                                                <li>If applicable, the Customer shall conduct and carry out daily and/or
                                                    routine maintenance and service of
                                                    the Mobile Device in accordance with the recommendations, conditions
                                                    and specifications made or prescribed
                                                    by the manufacturer of the Mobile Device.
                                                </li>
                                                <li> Any regulatory or certification markers affixed to the Mobile
                                                    Device will not be removed, defaced or
                                                    obstructed.
                                                </li>
                                                <li> The Customer shall assume all responsibility, liability and risks
                                                    for the Mobile Device.
                                                </li>
                                                <li> The Customer shall not use the Mobile Device for the purpose of
                                                    drawing, designing or developing any
                                                    nuclear or lethal weapons which may in any way pose as a threat or
                                                    danger to the nations or contravener any
                                                    law or regulation.
                                                </li>
                                                <li> The Mobile Device may only be repaired in accordance with the
                                                    Owner’s instructions and requirements as
                                                    set out in this Agreement and as may be further determined by the
                                                    Owner from time to time.
                                                </li>
                                                <li> The Customer shall not without the prior written consent of the
                                                    Owner make any alterations, additions or
                                                    improvements to the Mobile Device or any changes of the working
                                                    order or function of the Mobile Device.
                                                </li>
                                                <li>All additions, replacements or improvements made to the Mobile
                                                    Device (with or without the consent of the
                                                    Owner) shall be deemed to form part of the Mobile Device and be the
                                                    property of the Owner and as such, be
                                                    subject to this Agreement.
                                                </li>
                                                <li> If there is any alterations or changes to the Mobile Device done
                                                    without the Owner’s consent, the
                                                    Customer shall immediately (upon instruction by the Owner) remove
                                                    such alterations or changes and restore
                                                    the Mobile Device to the same quality function and condition as
                                                    before at the expense of the Customer.
                                                </li>
                                                <li> The Customer hereby consents for the Owner to install a mobile
                                                    application on the Mobile Device (where
                                                    applicable) for the purpose of, inter alia, monitoring matters
                                                    relating to payments and other obligations of
                                                    the Customer under this Agreement, notifying the Customer on any
                                                    payment due and payable to the Owner under
                                                    this Agreement and immobilising the Mobile Device if necessary
                                                    (<strong>“Mobile Application”</strong>).
                                                </li>
                                                <li> Upon expiration or termination of the rental of the Mobile Device,
                                                    the Customer shall return to the Owner
                                                    the Mobile Device in accordance with Paragraph 8 of this Agreement.
                                                </li>
                                                <li> The Customer hereby agrees and acknowledges that the Owner shall
                                                    not be responsible for any issue or
                                                    matter relating to any mobile line/services which are used by
                                                    Customer for the Mobile Device. The Customer
                                                    shall be solely responsible to pay all charges and costs in
                                                    connection with the mobile line/services,
                                                    directly to the relevant telecommunications provider.
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <div><strong>RENTAL PERIOD</strong></div>
                                            <p>The rental period of the Mobile Device by the Customer is as specified in
                                                Item 3 of the Schedule to this
                                                Agreement (<strong>“Rental Period”</strong>), commencing from the date of this Agreement
                                                or any other date as specified by
                                                the Owner.</li>

                                        </li>
                                        <li>
                                            <div><strong>RENTAL AND OTHER CHARGES</strong></div>
                                            <ol type="a">
                                                <li>
                                                    During the Rental Period and unless the rental of the Mobile Device
                                                    is terminated in accordance with this
                                                    Agreement, the Customer shall pay to the Owner the rental as
                                                    specified in Item 4 of the Schedule to this
                                                    Agreement which is payable on a monthly basis (<strong>“Monthly Rental”</strong>).
                                                </li>
                                                <li> The first Monthly Rental shall be paid by the Customer to the Owner
                                                    on the date when the Mobile Device is
                                                    registered as being rented by the Customer (<strong>“Commencement Date”</strong>).
                                                </li>
                                                <li> The subsequent Monthly Rentals shall be paid by the Customer
                                                    directly to the Owner by Credit Card, Debit
                                                    Card or online banking, until the expiry of the Rental Period,
                                                    subject to the following provisions:
                                                    <ol type="i">
                                                        <li> rental in respect of any month or in respect of a Rental
                                                            Period not exceeding one (1) month shall not be
                                                            apportioned notwithstanding the termination of the rental of
                                                            the Mobile Device for any reason whatsoever
                                                            before the last day of any month or the Rental Period; and
                                                        </li>
                                                        <li>the termination of the rental of the Mobile Device shall not
                                                            discharge or release the Customer from its
                                                            obligation to pay any and all rentals due prior to
                                                            termination, and all the other charges referred to in
                                                            Item 5 of the Schedule to this Agreement (<strong>“Other Charges”</strong>).
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li> On the Commencement Date, the Customer shall pay the Other Charges
                                                    to the Owner.
                                                </li>
                                                <li>All payments relating to the rental shall be paid to the Owner or to
                                                    any other person/party authorised by
                                                    the Owner in the manner determined by the Owner and/or any such
                                                    other person/party authorised by the Owner,
                                                    and notified to the Customer.
                                                </li>
                                                <li>All tax imposed on the Monthly Rental, Other Charges and any other
                                                    fees or payments relating to the
                                                    rental of the Mobile Device, if any, shall be borne by the Customer.
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <div><strong>DELIVERY/COLLECTION OF THE MOBILE DEVICE</strong></div>
                                            <ol type="a">
                                                <li>The Mobile Device shall be delivered to the Customer on the
                                                    Commencement Date by the Owner’s appointed
                                                    retailer of the Mobile Device and the Customer shall accept the
                                                    Mobile Device upon delivery of the same on
                                                    the terms and conditions of this Agreement.
                                                </li>
                                                <li>The Customer is not allowed to nominate any other person to
                                                    receive/collect the Mobile Device on behalf
                                                    of the Customer. For the purpose of delivery/collection of the
                                                    Mobile Device under this Paragraph 5, only
                                                    the Customer, being the person whose name is stated and registered
                                                    on the application form, is allowed to
                                                    receive/collect the Mobile Device.
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <div><strong>TERMINATION OF RENTAL BY THE OWNER</strong></div>

                                            <p>In the event Customer fails, neglects and/or omits to the pay the Monthly
                                                Rental or any part thereof for the
                                                Mobile Device under this Agreement for a period of three (3) months,
                                                and/or upon the occurrence of any of
                                                the following events, where:</p>
                                            <ol type="a">
                                                <li>the Customer fails to observe or perform any of the express or
                                                    implied terms and conditions of this
                                                    Agreement;
                                                </li>
                                                <li>the Customer does or conduct any act or thing which may prejudice or
                                                    jeopardise the Owner’s rights in
                                                    respect of the Mobile Device; and
                                                </li>
                                                <li> a petition for bankruptcy of the Customer is presented in Malaysia
                                                    or elsewhere
                                                </li>
                                            </ol>
                                            <p>the Owner may terminate the rental of the Mobile Device under this
                                                Agreement by giving notice of such
                                                termination to the Customer and/or the Owner may exercise any other
                                                means, as deemed necessary, including
                                                outsourcing the collection to a debt recovery agency, for the recovery
                                                of the Monthly Rental and Other
                                                Charges, and the Customer agrees to bear the costs for such recovery,
                                                and the same shall be a debt due from
                                                the Customer.</p>
                                            <p>The termination of rental of the Mobile Device under this Paragraph 6
                                                shall not affect or discharge the
                                                Customer from any obligations and liabilities, including but not limited
                                                to the Penalty Fee (as defined in
                                                Paragraph 7 below) and payment of any rental or any sum due and payable
                                                under this Agreement.</p>
                                            <p>Upon the Termination of this Agreement, the Customer no longer be in
                                                possession of the Mobile Device with the
                                                Owner’s consent and shall forthwith deliver up the Mobile Device to the
                                                Owner in accordance to Clause 8
                                                below.</p>


                                        </li>
                                        <li>
                                            <div><strong>TERMINATION OF RENTAL BY THE CUSTOMER</strong></div>
                                            <ol type="a">
                                                <li> The Customer may terminate the rental of the Mobile Device under
                                                    this Agreement by giving seven (7) days’
                                                    prior notice of such termination to the Owner, and the Customer
                                                    shall pay the penalty fee for terminating
                                                    the rental of the Mobile Device during the Rental Period (<strong>“Penalty
                                                        Fee”</strong>).
                                                </li>
                                                <li>The Penalty Fee is calculated based on the following formula:</li>

                                                <p>(Monthly Rental x Remaining Months Balance) + Estimated Replacement
                                                    Value (if applicable) + Administration
                                                    Fee</p>

                                                <p>whereby,</p>

                                                <p>“Remaining Months Balance” means the balance of the Monthly Rental
                                                    which has not been paid to fulfil the
                                                    remaining Rental Period</p>
                                                <p>“Estimated Replacement Value” means the amount payable by the
                                                    Customer to replace the Mobile Device which
                                                    shall be equivalent to its current worth (as determined by the
                                                    Owner)</p>
                                                <p>“Administration Fee” means charges imposed by the Owner and the
                                                    relevant telecommunication provider (as may
                                                    be notified to the Customer)</p>
                                                </li>
                                                <li> Notwithstanding the provisions of this Paragraph 7, the termination
                                                    of rental of the Mobile Device under
                                                    this Paragraph 7 shall not in any way affect or discharge the
                                                    Customer from any of its obligations and
                                                    liabilities under this Agreement, including but not limited to the
                                                    payment of any rental or any sum due and
                                                    payable under this Agreement.
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <div><strong>RETURN OF MOBILE DEVICE</strong></div>
                                            <ol type="a">
                                                <li> Upon the expiry of Rental Period in accordance with Paragraph 3
                                                    above or termination of rental of the
                                                    Mobile Device in accordance with Paragraph 6 or Paragraph 7 above,
                                                    the Customer (at its own cost and
                                                    expense) shall return the Mobile Device to the Owner within seven
                                                    (7) days from the date of expiry of the
                                                    Rental Period or (if applicable) the date of termination of rental
                                                    of the Mobile Device, at the return
                                                    address as specified by the Owner and to any person authorised and
                                                    as specified by the Owner.
                                                </li>
                                                <li> The Customer shall return the Mobile Device to the Owner in good
                                                    working order and condition, and shall
                                                    ensure that all data and applications installed by the Customer in
                                                    the Mobile Device are deleted from the
                                                    Mobile Device, at the time that the Customer returns the Mobile
                                                    Device. The Customer hereby agrees to
                                                    indemnify the Owner against any claim, loss and liability arising
                                                    from any use by any third party of any
                                                    data and/or applications that were installed by the Customer in the
                                                    Mobile Device but were not deleted by
                                                    the Customer in compliance with this Paragraph 8(b).
                                                </li>
                                            </ol>
                                            <p>In the event the Customer fails, neglects and/or omits to return the
                                                Mobile Device to the Owner in accordance
                                                with this Clause, the Customer hereby agrees that the Owner may exercise
                                                any means necessary to recover the
                                                Mobile Device including blocking and/or blacklisting the Mobile Device,
                                                and the Customer agrees to bear the
                                                costs incurred for the same, and the costs shall be a debt due from the
                                                Customer.</p>

                                        </li>
                                        <li>
                                            <div><strong>EXPIRY AND EXTENSION OF THE RENTAL PERIOD</strong></div>
                                            <ol type="a">
                                                <li> Save and except for the termination of rental by the Owner in
                                                    accordance with Paragraph 6 and the
                                                    termination of rental by the Customer in accordance with Paragraph
                                                    7, the rental of the Mobile Device under
                                                    this Agreement is terminated upon expiry of the Rental Period.
                                                </li>
                                                <li> If the Customer wishes to extend the Rental Period, the Customer
                                                    must notify the Owner in writing of its
                                                    intention to extend the Rental Period within six (6) weeks before
                                                    the expiry of the Rental Period, and all
                                                    terms and conditions relating to the rental of the Mobile Device by
                                                    the Customer under this Agreement
                                                    (including but not limited to the Monthly Rental) shall be
                                                    applicable in respect of such extension.
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <div><strong>AMENDMENT/VARIATION</strong></div>

                                            <p>Any amendment and/or variation of any terms and conditions of this
                                                Agreement will be announced and/or posted
                                                by the Owner on the official website at <a href="http://www.yes.my/docs/tnc/" target="_blank">http://www.yes.my/docs/tnc/</a>
                                                .Such amendment and/or variation as
                                                announced and/or posted on the official website of the Owner shall be
                                                deemed to become effective seven (7)
                                                days after the date of such announcement and/or posting.</p>

                                        </li>
                                        <li>
                                            <div><strong>NOTICES/COMMUNICATION AND SERVICE OF LEGAL PROCESS</strong>
                                            </div>
                                            <ol type="a">
                                                <li> Any notice or other communications from the Customer to the Owner
                                                    pursuant to this Agreement may be
                                                    communicated by way of:
                                                    <ol type="i">
                                                        <li>electronic mail to phonerental@orix.com.my for billing &
                                                            rental related issues; or
                                                        </li>
                                                        <li>any other method as may be specified by the Owner to the
                                                            Customer from time to time.
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li> Any notice or other communications from the Owner to the Customer
                                                    (other than amendments or variations to
                                                    this Agreement as set out in Paragraph 10 above) pursuant to this
                                                    Agreement may be given by way of:
                                                    <ol type="i">
                                                        <li>electronic mail to the address provided by the Customer to
                                                            the Owner on the day of registration for the
                                                            rental of Mobile Device; or
                                                        </li>
                                                        <li>notification through the Mobile Application in respect of
                                                            any payment due and payable under this
                                                            Agreement.
                                                        </li>
                                                        <li>For the avoidance of doubt, service of any formal notice or
                                                            writ used by a court to exercise
                                                            jurisdiction over a person or property in the form of a
                                                            summons, mandate, subpoena, warrant or other written
                                                            demand issued by such court (<strong>“Legal Process”</strong>) may be given
                                                            by prepaid AR registered post sent to, or may be
                                                            delivered by hand to, the respective address for service of
                                                            the parties. Such Legal Process is deemed to
                                                            have been duly served (unless there is contrary evidence
                                                            that such Legal Process was not in fact served)
                                                            after five (5) days from the date it is posted and if
                                                            delivered by hand, on the day when it is delivered and
                                                            duly acknowledged.
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li> For any general or technical enquiries on Mobile Device, the
                                                    Customer is to email to
                                                    renew.plus@compasia.com
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <div><strong>COMPLIANCE WITH LAWS</strong></div>

                                            <p>The parties shall comply with all applicable laws, rules, regulations and
                                                guidelines governing the duties,
                                                obligations and business practices of the parties, including but not
                                                limited to compliance with the
                                                Anti-Money Laundering, Anti-Terrorism Financing and Proceeds of Unlawful
                                                Activities Act 2001 and any
                                                subsequent additions, amendments or revisions thereto. Further, the
                                                parties shall not do or omit to do
                                                anything that violates any applicable law, rule, regulation and
                                                guideline that could result in liability
                                                being imposed on the other party.</p>

                                        </li>
                                        <li>
                                            <div><strong>ANTI-CORRUPTION/BRIBERY</strong></div>

                                            <p>Each party undertakes that neither party nor any party acting on the
                                                party's behalf has offered, promised,
                                                given, authorised, requested or accepted any undue financial or other
                                                advantage of any kind in any way
                                                connected with any purpose including the entering into this Agreement,
                                                nor has either party made any
                                                improper payments, given gifts or inducements of any kind to and
                                                received from any person, including
                                                officials in the public or private sector, customers and suppliers.</p>
                                            <p>Each party shall maintain in place throughout the term of this Agreement,
                                                the party's own policies and
                                                procedures to ensure compliance with anti-bribery and anti-corruption
                                                laws, statutes and regulations
                                                including the maintaining of detailed and accurate accounting records
                                                for transactions, including cash and
                                                bank accounts and shall enforce them where appropriate.</p>
                                            <p>Each party shall immediately report to the relevant authority and to the
                                                other party any offer, request or
                                                demand for any undue financial or other advantage of any kind made by or
                                                received from the other party or
                                                any party acting on the party's behalf and/or from any officials in the
                                                public or private sector, customers
                                                and suppliers.</p>
                                        </li>
                                    </ol>
                                </div>
                                <div><label><input type="checkbox" id="term2" name="term2" @click="check_sign"
                                                   value="agree" checked/> I Agree</label></div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>Customer Signature</div>
                                    <div style="height: 50px;"></div>
                                    <div><input type="text" @keyup="check_sign()" autocomplete="off"
                                                v-model="contract_signed" class="form-control user_sign text-uppercase"
                                                placeholder="Type your full name as per MyKAD" id="fname"/></div>
                                    <div></div>
                                    <div class="mt-4">
                                        <a class="btn-signup" :class="allowSubmit?'btn-signed':'btn-signup'"
                                           @click="sign_contract"><i class="icon icon-signup2"></i> <span
                                                    v-if="allowSubmit">Signed</span><span
                                                    v-else>Fill and Sign</span></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>Date & Time</div>
                                    <div class="mt-3 text-bold text-uppercase" id="contract_time" style="display:none">
                                        <span>{{ time }}</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <button class="mt-3 pink-btn-disable text-uppercase w300"
                                            :class="allowSubmit?'pink-btn':'pink-btn-disable'" @click="goNext"
                                            type="button">Submit Contract
                                    </button>
                                    <div id="error" class="mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

</main>
<?php require_once('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var pageCart = new Vue({
            el: '#main-vue',
            data: {
                qrcode: null,
                interval: null,
                time: null,
                dealer: {
                    dealer_code: '',
                    dealer_id: '',
                    referral_code: ''
                },
                contract: {},
                contract_signed: "",
                contractSigned: false,
                eligibility: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: ''
                },
                deliveryInfo: {
                    uid: '',
                    mykad: '',
                    name: '',
                    phone: '',
                    email: '',
                    address: '',
                    addressMore: '',
                    addressLine: '',
                    postcode: '',
                    state: '',
                    stateCode: '',
                    city: '',
                    cityCode: '',
                    country: '',
                    deliveryNotes: '',
                    sanitize: {
                        address: '',
                        addressMore: '',
                        addressLine: '',
                        city: '',
                        country: '',
                        state: ''
                    }
                },
                orderSummary: {
                    product: {},
                    orderDetail: {
                        total: 0.00,
                        color: null,
                        contract_id: null,
                        orderItems: []
                    },
                    orderInfo: {}
                },
                currentStep: 0,
                allowSubmit: false
            },

            beforeDestroy() {
                // prevent memory leak
                clearInterval(this.interval)
            },

            created: function () {
                var self = this;
                setTimeout(function () {
                    self.pageInit();
                }, 500);
                $('#contract_time').show();
                this.interval = setInterval(() => {
                    // Concise way to format time according to system locale.
                    var today = new Date();
                    var d = today.getDate();
                    if(d<10) d = '0' + d;
                    var m = (today.getMonth()+1);
                    if(m<10) m = '0' + m;
                    var date = d+'/'+ m +'/'+today.getFullYear();

                    var hours = today.getHours();
                    var minutes = today.getMinutes();
                    var ampm = hours >= 12 ? 'pm' : 'am';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0'+minutes : minutes;
                    var strTime = hours + ':' + minutes + ' ' + ampm;

                    this.time = dateTime = date+' '+strTime;
                }, 1000);
            },
            methods: {
                pageInit: function () {
                    var self = this;
                    var self = this;

                    if (elevate.validateSession(self.currentStep)) {
                        self.pageValid = true;

						if (elevate.lsData.deliveryInfo) {
								self.deliveryInfo = elevate.lsData.deliveryInfo;
						}else{
							 elevate.redirectToPage('pre-register-complete/?id='+self.guid);
						}

						if(elevate.lsData.orderSummary){
							self.orderSummary = elevate.lsData.orderSummary;
							self.dealer.dealer_code = self.orderSummary.order.dealerCode;
							self.dealer.dealer_id = self.orderSummary.order.dealerUID;
							self.dealer.referral_code = self.orderSummary.order.referralCode;
						}else{
							 elevate.redirectToPage('pre-register-complete/?id='+self.guid);
						}
                        self.guid = elevate.lsData.guid;

						$('#guid').val(self.guid);

						if (elevate.lsData.contract) {
							self.contract = elevate.lsData.contract;
							self.contractSigned = true;
						}

						self.productId = self.orderSummary.orderDetail.productCode;
                        self.check_sign();
                    }else{
						elevate.redirectToPage('pre-register-complete/?id=error');
					}
                },
                sign_contract: function () {
                    var self = this;
                    $('#fname').focus();
                },
                check_sign: function () {
                    var self = this;
                    self.allowSubmit = true;

                    if (!self.contract_signed) {
                        self.allowSubmit = false;
                    }

                    if (!$('#term1').is(':checked') || !$('#term2').is(':checked')) {
                        self.allowSubmit = false
                    }

                    if (!self.contract_signed.toUpperCase() || (self.contract_signed && self.contract_signed.trim().toUpperCase() != self.deliveryInfo.name.toUpperCase())) {
                        self.allowSubmit = false;
                    }

                },

                makeOrder: function () {
                    var self = this;
                    var params = self.deliveryInfo;
                    params.productSelected = self.orderSummary.plan.planId;

                    params.referralCode = self.dealer.referral_code;
                    params.dealerUID = self.dealer.dealer_id;
                    params.dealerCode = self.dealer.dealer_code;

                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/order/create', params)
                        .then((response) => {
                            var data = response.data;
                            if (data.status == 1) {
                                //save contract info
                                self.orderSummary.orderInfo = data.data;
                                elevate.lsData.orderInfo = data.data;
                                elevate.updateElevateLSData();

                                self.submit_contract();
                            } else {
                                toggleOverlay(false);
                                toggleModalAlert('Error', 'Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                            }
                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });
                },

                updateElevateOrder: function () {
                    var self = this;

                    toggleOverlay();
                    var param = elevate.lsData.orderInfo;

                    axios.post(apiEndpointURL_elevate + '/order/update', param)
                        .then((response) => {
                            var data = response.data;
                            if (data.status == 1) {
                                elevate.redirectToPage('thanks');
                            } else {
                                toggleOverlay(false);
                                toggleModalAlert('Error', 'Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                            }
                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });

                },

                submit_contract: function () {
                    var self = this;
                    var params = self.deliveryInfo;
                    params.orderId = self.orderSummary.orderInfo.id;
                    params.contract = self.orderSummary.device.contract;
                    toggleOverlay();
                    axios.post(apiEndpointURL_elevate + '/contract', params)
                        .then((response) => {
                            var data = response.data;
                            if (data.status == 1) {
                                //save contract info
                                self.contract = data.data;

                                elevate.lsData.contract = data.data;
                                elevate.updateElevateLSData();
                                toggleOverlay();
                                elevate.redirectToPage('pre-register-paynow');
                            } else {
                                toggleOverlay(false);
                                toggleModalAlert('Error', 'Dear valued customer,<br>Unfortunately, your submission was not successful due to the system that is currently unavailable.')
                            }
                            toggleOverlay(false);

                        })
                        .catch((error) => {
                            toggleOverlay(false);
                            console.log(error);
                        });

                },
                goNext: function () {
                    var self = this;
                    $('#error').html("");
                    if (self.allowSubmit) {

                        if (self.orderSummary.orderInfo && self.orderSummary.orderInfo.id) {
                            self.submit_contract();
                        } else {
                            self.makeOrder();
                        }

                    }

                }
            }
        });
    });

	function goBack(){
		elevate.redirectToPage('pre-register-complete/?id='+ $('#guid').val());
	}
</script>