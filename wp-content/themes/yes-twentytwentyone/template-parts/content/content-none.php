<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */

?>

<!-- Section STARTS -->
<section class="no-results not-found">
	<!-- Entry Header STARTS -->
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e('Nothing Found', 'yes.my'); ?></h1>
	</header>
	<!-- Entry Header ENDS -->

	<!-- Entry Content STARTS -->
	<div class="page-content">
		<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'yes.my'); ?></p>
		<?php get_search_form(); ?>
	</div>
	<!-- Entry Content ENDS -->
</section>
<!-- Section ENDS -->