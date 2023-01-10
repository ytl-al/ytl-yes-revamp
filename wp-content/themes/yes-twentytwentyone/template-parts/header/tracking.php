    <?php if (defined('SITE_ENV') && SITE_ENV == 'PDC') : ?>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71589028-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-71589028-2');
        </script>
        <!-- END Global site tag (gtag.js) - Google Analytics -->

        <!-- Global site tag (gtag.js) - Google Ads: 10904758864 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10904758864"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'AW-10904758864');
        </script>
        <!-- END Global site tag (gtag.js) - Google Ads: 10904758864 -->

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T8K5HSR');</script>
        <!-- End Google Tag Manager -->

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '255543333392474');
            fbq('track', 'PageView');
        </script>
        <noscript>
        <img height="1" width="1" style="display:none" 
            src="https://www.facebook.com/tr?id=255543333392474&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->

    <?php elseif (defined('SITE_ENV') && SITE_ENV == 'IOT' || SITE_ENV == 'LOCAL') : ?>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-W0E2SCW7Y0"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-W0E2SCW7Y0');
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-231711637-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-231711637-1');
        </script>
        <!-- END Global site tag (gtag.js) - Google Analytics -->

        <!-- Meta Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '620928779523684');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=620928779523684&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->


        <!-- Twitter conversion tracking base and event code -->
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='https://static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');

twq('config','o5rd5');

</script>
<!-- End Twitter conversion tracking base and event code -->
        
    <?php endif; ?>