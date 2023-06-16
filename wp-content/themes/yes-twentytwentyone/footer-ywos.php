<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yes-twentytwentyone
 */

?>

		<?php get_template_part('template-parts/footer/site-footer-ywos'); ?>
	</div>
	<!-- Layer Page ENDS -->
	
	<div class="layer-overlay"></div>

	<?php wp_footer(); ?>
	
	<script src="https://ipmeta.io/plugin.js"></script>
	<script>
		provideGtagPlugin({
			apiKey: '<?php echo IPMETA_API_KEY ?>',
			serviceProvider: 'dimension1',
			networkDomain: 'dimension2',
			networkType: 'dimension3',
		});
	</script>

</body>

</html>