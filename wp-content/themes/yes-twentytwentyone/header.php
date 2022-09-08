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
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

	<?php wp_head(); ?>
	
	<script type="text/javascript">var $ = jQuery.noConflict();</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71589028-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-71589028-2');
	</script> -->
	<!-- END Global site tag (gtag.js) - Google Analytics -->

	<!-- Global site tag (gtag.js) - Google Ads: 10904758864 -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10904758864"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'AW-10904758864');
	</script> -->
	<!-- END Global site tag (gtag.js) - Google Ads: 10904758864 -->

	<!-- Facebook Pixel Code -->
	<!-- <script>
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
	</noscript> -->
	<!-- End Facebook Pixel Code -->
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<!-- Layer Page STARTS -->
	<div class="layer-page">
		<?php get_template_part('template-parts/header/site-header'); ?>