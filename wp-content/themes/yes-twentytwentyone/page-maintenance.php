<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yes-twentytwentyone
 */

?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache" />

    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <title><?php wp_title(''); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&display=swap" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/css/aos.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/css/yes-overwrite.css" />

    <!-- <script type="text/javascript">
        var $ = jQuery.noConflict();
    </script> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71589028-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-71589028-2');
    </script>
    <!-- END Global site tag (gtag.js) - Google Analytics -->

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-T8K5HSR');
    </script>
    <!-- END Google Tag Manager -->

    <!-- Resulticks -->
    <!-- <script resulconfig="/resulticks/resulconfig.json" src="https://sdk.rsut.io/handlers/6bed952814264982be0edbc93fde1501.sdk" defer="defer"></script>
	<script type="text/javascript">
		window.addEventListener('load', (event) => {
			window.ReWebSDK.conversionTracking();
		});
	</script> -->
    <!-- END Resulticks -->

    <style type="text/css">
        #staytuned {
            background-color: #FFF;
            background-image: url('https://cdn.yes.my/site/wp-content/uploads/2022/05/maintenance-bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }

        #staytuned h1 {
            font-size: 39px;
            font-weight: 700;
            line-height: 43px;
            color: #000;
            text-align: center;
        }

        #staytuned h2 {
            font-size: 16px;
            line-height: 24px;
            color: #000;
            font-weight: 500;
            text-align: center;
        }

        /* IPAD Portrait */

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
            #staytuned {
                background-position: top;
            }
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
            #staytuned h1 {
                font-size: 30px;
            }

            #staytuned {
                background-position: top;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T8K5HSR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Layer Page STARTS -->
    <div class="layer-page">

        <main>
            <!--Stay Tuned Start-->
            <section id="staytuned">
                <div class="container h-100">
                    <div class="row justify-content-center align-content-center d-flex h-100">
                        <div class="col-12 col-lg-8 d-flex align-content-center justify-content-center flex-wrap ps-4 ps-lg-0 h-100">
                            <h1 class="mb-3 w-100" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Stay tuned to unlock<br>infinite possibilities.</h1>
							<h2 class="mb-3 w-100" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" style="font-weight:700;">A new standard for unlimited will be introduced at 6pm so don’t miss out.</h2>
                            <h2 class="mb-3 w-100" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">We are still available on our MyYes app in the mean time. Download MyYes app now on:</h2>
                            <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <a href="https://onelink.to/6e8tqc" target="_blank"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/maintenance-googleplay-btn.png" alt="Google Play" class="me-3 img-fluid"></a>
                                    </div>
                                    <div class="col-4">
                                        <a href="https://onelink.to/6e8tqc" target="_blank"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/maintenance-appstore-btn.png" alt="App Store" class="me-3 img-fluid"></a>
                                    </div>
                                    <div class="col-4">
                                        <a href="https://appgallery.huawei.com/#/app/C105172881" target="_blank"><img src="https://cdn.yes.my/site/wp-content/uploads/2022/05/maintenance-huawei-btn.png" alt="App Gallery" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Stay Tuned End-->
        </main>

    </div>
    <!-- Layer Page ENDS -->

    <script type="text/javascript" src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/js/iconify.min.js"></script>
    <script type="text/javascript" src="https://cdn.yes.my/site/wp-content/themes/yes-twentytwentyone/assets/js/aos.js"></script>

    <script type="text/javascript">
        AOS.init();
    </script>

</body>

</html>