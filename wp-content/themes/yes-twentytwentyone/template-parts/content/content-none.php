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
<section class="no-results not-found py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
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
			</div>
		</div>
	</div>
</section>
<!-- Section ENDS -->