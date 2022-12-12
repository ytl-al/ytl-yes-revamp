<?php include('templates/header.php'); ?>

<style type="text/css">
    @font-face { font-family: 'Barlow'; font-weight: 400; src: url('/wp-content/themes/yes-twentytwentyone/assets/fonts/Barlow-Regular.ttf'); }
    @font-face { font-family: 'Barlow'; font-weight: 500; src: url('/wp-content/themes/yes-twentytwentyone/assets/fonts/Barlow-SemiBold.ttf'); }
    @font-face { font-family: 'Barlow'; font-weight: 600; src: url('/wp-content/themes/yes-twentytwentyone/assets/fonts/Barlow-Bold.ttf'); }
    @font-face { font-family: 'Barlow'; font-weight: 700; src: url('/wp-content/themes/yes-twentytwentyone/assets/fonts/Barlow-ExtraBold.ttf'); }
    @font-face { font-family: 'Barlow'; font-weight: 300; src: url('/wp-content/themes/yes-twentytwentyone/assets/fonts/Barlow-Medium.ttf'); }
    @font-face { font-family: 'Barlow'; font-weight: 200; src: url('/wp-content/themes/yes-twentytwentyone/assets/fonts/Barlow-Light.ttf'); }

    .page-header, #newsletter, footer.footer, .layer-breadcrumb, .fm-form-container.fm-theme16 { display: none !important; }

    html, body {}
    body { background-color: #000; color: #FFF; display: flex; }
    .layer-page { display: flex; width: 100%; }
    .site-main { width: 100%; }

    .layer-cgMain { display: flex; flex-direction: column; font-family: 'Barlow'; overflow: visible; width: 100%; }
    .layer-cgMain h1, .layer-cgMain h2, .layer-cgMain h3, .layer-cgMain h4, .layer-cgMain p { font-family: 'Barlow'; }

    .layer-cgMain .layer-cgHeader { padding: 15px 0; }
    .layer-cgMain .layer-cgBody { flex: auto; }
    .layer-cgMain .layer-cgFooter { padding: 30px 0; }

    .layer-cgHeader img { height: 40px; }

    .layer-cgBody .section-banner { height: 70vh; position: relative; }
    .section-banner .layer-bgBanner { background-size: cover; height: 100%; width: 100%; position: absolute; }
    .section-banner #video-cgBanner { right: -1000px; height: auto; width: auto; max-height: 100%; min-height: 100%; min-width: 100%; }
    .section-banner .layer-bgBanner.mobile {}
    .section-banner .layer-contentBannerWrapper { height: 100%; left: 0; position: absolute; top: 0; width: 100%; }
    .layer-contentBannerWrapper .layer-contentBanner { padding: 30px 0 0; }
    .layer-contentBanner h3 { color: #76B900; font-size: 15px; font-weight: 200; letter-spacing: 15px; margin-bottom: 30px; }
    .layer-contentBanner h2 { font-size: 30px; font-weight: 700; line-height: 35px; margin-bottom: 30px; }
    .layer-contentBanner p { font-size: 16px; font-weight: 300; margin-bottom: 30px; }
    .layer-contentBanner p.panel-btn { margin-bottom: 0; }
    .layer-contentBanner p.panel-copyright { bottom: 10px; color: #666; font-size: 12px; margin-bottom: 0; max-width: 100%; position: absolute; }

    .layer-cgMain .btn-cgCTA { background: linear-gradient(80.9deg, #FF0084 16.48%, #6F29D2 85.6%, #2F3BF5 96.9%); border: 0; border-radius: 6px; color: #FFF; display: inline-block; font-size: 18px; font-weight: 600; padding: 12px 35px; transition: all 230ms ease-in-out; }
    .layer-cgMain .btn-cgCTA:hover {}

    .layer-cgBody .section-form { padding: 80px 0; }
    .section-form .layer-formRegister {}
    .layer-formRegister h4 { color: #76B900; font-size: 48px; font-weight: 600; margin-bottom: 30px; text-align: center; }
    .section-form .standardForm { background-color: #262626; border-radius: 15px; padding: 30px 15px; }
    .standardForm .form-group { font-size: 20px; margin: 0 0 20px; }
    .standardForm label { cursor: pointer; display: block; font-weight: 300; margin-bottom: 5px; }
    .standardForm label span { color: #D01600; margin-left: 7px; }
    .standardForm .form-control {}
    .standardForm .form-check-label { font-size: 14px; font-weight: 400; text-align: justify; }
    .standardForm .panel-small { font-size: 12px; font-weight: 300; margin: 5px 0 0; }

    .layer-cgFooter p { color: #666; font-size: 12px; }

    @media (min-width: 768px) {
        .layer-contentBannerWrapper .layer-contentBanner { padding-top: 0; }
        .layer-cgBody .section-banner { height: 60vh; }
        .layer-contentBanner h3 { margin-bottom: 15px; }
        .layer-contentBanner h2 { margin-bottom: 15px; }
        .layer-contentBanner p { margin-bottom: 15px; max-width: 70%; }
        .layer-contentBanner p.panel-btn { margin-bottom: 0; }

        .section-form .standardForm { padding-left: 80px; padding-right: 80px; }
    }

    @media (min-width: 840px) {
        .layer-cgBody .section-banner { height: 90vh; }
        .layer-contentBanner p { max-width: 100%; }
        .layer-contentBanner p.panel-copyright { bottom: 0; margin-top: 15px; position: relative; }
    }

    @media (min-width: 992px) {
        .layer-cgHeader img { height: 55px; }

        .layer-cgBody .section-banner { height: 80vh; }
        .section-banner #video-cgBanner { right: -400px; }
        .layer-contentBanner h3 { font-size: 34px; letter-spacing: 34px; margin-bottom: 30px; }
        .layer-contentBanner h2 { font-size: 64px; line-height: 64px; margin-bottom: 30px; }
        .layer-contentBanner p { font-size: 21px; margin-bottom: 30px; max-width: 80%; }
        .layer-contentBanner p.panel-copyright { bottom: 10px; margin-top: 0; position: absolute; }

        .section-form .standardForm { padding: 30px 100px; }
    }

    @media (min-width: 1180px) {
        .layer-cgBody .section-banner { height: 70vh; }
        .layer-contentBanner p { max-width: 70%; }
    }
</style>

<div class="layer-cgMain">
    <div class="layer-cgHeader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="https://cdn.yes.my/site/static/cloudgaming/logo-geforcexyes.png" alt="GeForce x Yes" title="GeForce x Yes" />
                </div>
            </div>
        </div>
    </div>
    <div class="layer-cgBody">
        <section class="section-banner">
            <!-- <div class="layer-bgBanner d-none d-md-block" style="background-image: url('https://cdn.yes.my/site/static/cloudgaming/bg-cloudgaming.gif');"></div> -->
            <video class="layer-bgBanner d-none d-lg-block" autoplay muted loop id="video-cgBanner">
                <source src="https://cdn.yes.my/site/static/cloudgaming/bg-cloudgaming.mp4" type="video/mp4">
            </video>
            <div class="layer-bgBanner mobile d-lg-none" style="background-image: url('https://cdn.yes.my/site/static/cloudgaming/bg-cloudgaming-mobile.png');"></div>
            <div class="layer-contentBannerWrapper">
                <div class="container h-100">
                    <div class="row h-100 justify-content-start">
                        <div class="col-md-10 col-xl-7 d-flex align-items-start align-items-md-center justify-content-start">
                            <div class="layer-contentBanner">
                                <h3>COMING SOON</h3>
                                <h2>#GameTheImpossible <br />with GeForce Now | Yes</h2>
                                <p>Sign up today to receive an exclusive newsletter and be the first to receive the latest updates from us!</p>
                                <p class="panel-btn"><a href="javascript:void(0)" title="Register Your Interest" class="btn btn-cgCTA link-jumpSection" data-targetsection="placeholder-jumpsection">Register Your Interest</a></p>
                                <p class="panel-copyright">All copyrights are property of their respective owners</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="placeholder-jumpsection"></div>
        <section class="section-form" id="section-formRegister" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-lg-10 offset-lg-1 col-xl-6 offset-xl-3">
                        <div class="layer-formRegister">
                            <h4>Register Your Interest</h4>
                            <div class="standardForm">
                                <form>
                                    <div class="form-group">
                                        <label for="input-name">Name<span>*</span></label>
                                        <input type="text" class="form-control" id="input-name" placeholder="Enter name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="input-email">Email<span>*</span></label>
                                        <input type="email" class="form-control" id="input-email" placeholder="Enter email address" />
                                    </div>
                                    <div class="form-group">
                                        <label for="input-contact">Contact Number<span>*</span></label>
                                        <div class="row">
                                            <div class="col-3">
                                                <select class="form-control">
                                                    <option value="010">010</option>
                                                    <option value="011">011</option>
                                                    <option value="012">012</option>
                                                    <option value="013">013</option>
                                                    <option value="014">014</option>
                                                    <option value="016">016</option>
                                                    <option value="017">017</option>
                                                    <option value="018">018</option>
                                                    <option value="019">019</option>
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="input-contact" placeholder="" />
                                            </div>
                                        </div>
                                        <p class="panel-small"><em>Enter your Yes mobile number to get access to exclusive cloud gaming features</em></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="select-provider">Current Telco Provider<span>*</span></label>
                                        <select class="form-control" id="select-provider">
                                            <option value="Yes" selected="selected">Yes</option>
                                            <option value="Maxis">Maxis</option>
                                            <option value="Digi">Digi</option>
                                            <option value="Celcom">Celcom</option>
                                            <option value="Umobile">Umobile</option>
                                            <option value="Unifi">Unifi</option>
                                            <option value="Time">Time</option>
                                            <option value="Redone">Redone</option>
                                            <option value="Hotlink">Hotlink</option>
                                            <option value="XOX">XOX</option>
                                            <option value="Hellosim">Hellosim</option>
                                            <option value="TuneTalk">TuneTalk</option>
                                            <option value="Yodoo">Yodoo</option>
                                            <option value="Tonewow">Tonewow</option>
                                        </select>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="agree" id="input-agreeConsent">
                                        <label class="form-check-label" for="input-agreeConsent">I agree to Yes <a href="https://www.yes.my/docs/tnc/general-terms-and-conditions/terms-of-use-of-website/" target="_blank">Terms and Conditions</a>, <a href="https://www.ytl.com/privacypolicy.asp" target="_blank">Privacy Policy</a> (collectively, "Terms") and by clicking "Submit", I agree to be bound by the Terms. I consent to the collection and processing of my details above for marketing and profiling purposes as described in our Privacy Policy, which I have read and understood its contents.</label>
                                    </div>
                                    <button type="submit" class="btn btn-cgCTA w-100 mt-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="layer-cgFooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; YTL Communications 2022. All rights reserved. | &copy; 2022 NVIDIA Corporation. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>