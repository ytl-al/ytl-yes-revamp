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

		<?php get_template_part('template-parts/footer/site-footer'); ?>
	</div>
	<!-- Layer Page ENDS -->
	
	<div class="layer-overlay"></div>

	<?php wp_footer(); ?>

	<script type="text/javascript">
		$(document).ready(function() {
			var bdSearchField = $('.betterdocs-search-field');
			if ($(bdSearchField).length) {
				$(bdSearchField).attr('pattern', '/^[a-zA-Z0-9 ]+$/');
				$(bdSearchField).on('input', function() {
					var v = this.value.replace(/[^a-zA-Z0-9 ]+$/g, '');
					if (v != this.value) {
						this.value = v;
						$(bdSearchField).trigger('input').trigger('propertychange').trigger('paste').trigger('keyup').trigger('keypress');
					}

					if (this.value == '5g' || this.value == '4g' || this.value == '5G' || this.value == '4G') {
						$(bdSearchField).val(this.value + ' ');
						$(bdSearchField).trigger('input').trigger('propertychange').trigger('paste').trigger('keyup').trigger('keypress');
					}
				});
			}
		});
	</script>
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