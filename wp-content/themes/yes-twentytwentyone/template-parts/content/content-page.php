<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yes-twentytwentyone
 */

?>

<!-- Article STARTS -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Entry Content STARTS -->
	<div class="entry-content">
		<?php get_template_part('template-parts/content/breadcrumbs'); ?>

		<?php the_content(); ?>
	</div>
	<!-- Entry Content ENDS -->
</article>
<!-- #post-<?php the_ID(); ?> -->
<!-- Article ENDS -->