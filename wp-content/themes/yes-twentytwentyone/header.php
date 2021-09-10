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
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? '' : wp_title(''); ?></title>

	<?php wp_head(); ?>
	
	<script type="text/javascript">var $ = jQuery.noConflict();</script>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Layer Page STARTS -->
	<div class="layer-page">
		<?php get_template_part('template-parts/header/site-header'); ?>